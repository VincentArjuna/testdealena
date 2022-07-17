<?php

namespace App\Http\Controllers\API\Midtrans;

use App\Http\Controllers\Controller;
use App\Models\Member\Member;
use App\Models\Payments\Payment;
use App\Models\Product\Transaction;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Midtrans\Midtrans;
use App\Services\Midtrans\TopUpSnapTokenService;
use App\Services\NotificationService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Midtrans\Config;

class MidtransController extends Controller
{
    /**
     * Get Midtrans SnapToken
     *
     * @param integer $transaction_id
     * @return void \Illuminate\Http\Response
     */
    public function getToken($transaction_id)
    {
        $midtrans = new CreateSnapTokenService($transaction_id);
        $snapToken = $midtrans->getSnapToken();

        return response()->json([
            'token' => $snapToken,
            'redirect_url' => "https://app.sandbox.midtrans.com/snap/v2/vtweb/" . $snapToken,
        ]);
    }

    public function topUp(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric'
        ]);

        if ($request->amount < 10000) {
            $response['status'] = false;
            $response['message'] = 'Minimal TopUp adalah Rp10.000!';

            throw new HttpResponseException(response()->json($response, 422));
        }

        $payments = Payment::create([
            'member_id' => $request->user()->member->id,
            'member_detail' => $request->user()->member,
            'amount' => $request->amount,
            'type' => 'TopUp',
            'status' => 'waiting_payment'
        ]);
        $service = new TopUpSnapTokenService($payments->id);
        $snapToken = $service->getSnapToken();
        return response()->json([
            'token' => $snapToken,
            'redirect_url' => "https://app.sandbox.midtrans.com/snap/v2/vtweb/" . $snapToken,
        ]);
    }

    public function checkPayment()
    {
        $midtrans = new Midtrans;
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $fraud = $notif->fraud_status;
        $input = $notif->order_id . $notif->status_code . $notif->gross_amount . Config::$serverKey;
        $signature = openssl_digest($input, 'sha512');
        if ($signature == $notif->signature_key) {
            if ($transaction === "settlement") {
                // TODO Set payment status in merchant's database to 'accepted'
                if (Str::contains($notif->order_id, 'DEA-TU')) {
                    $topup = Payment::where('order_id', $notif->order_id)->first();
                    $topup->status = 'processed';
                    $topup->save();
                    $member = Member::find($topup->member_id);
                    $member->saldo += $topup->amount;
                    $member->save();
                } else if (Str::contains($notif->order_id, 'DEA-PA')) {
                    $transaction = Transaction::where('payment_id', $notif->order_id)->first();
                    $transaction->status = 'processed';
                    $transaction->save();
                    (new NotificationService)->auctionPaid($transaction);
                }
            } else if ($transaction == 'capture') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'challenge'
                } else if ($fraud == 'accept') {
                    // TODO Set payment status in merchant's database to 'success'
                }
            } else if ($transaction == 'cancel') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'failure'
                } else if ($fraud == 'accept') {
                    // TODO Set payment status in merchant's database to 'failure'
                }
            } else if ($transaction == 'deny') {
                // TODO Set payment status in merchant's database to 'failure'
            }
        }
    }

    public function getPaymentHistory(Request $request)
    {
        $member = $request->user()->member;
        $payments = Payment::where('member_id', $member->id)
            ->where('status', 'processed')
            ->latest()->get();

        return response()->json([
            'payments' => $payments
        ]);
    }
}
