<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\Controller;
use App\Models\Product\Transaction;
use App\Services\Midtrans\CreateSnapTokenService;
use App\Services\Product\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display member transactions
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();

        return response()->json([
            'transactions' => $user->member
                ->transactions()->paginate(10)
        ]);
    }

    /**
     * Get transaction detail
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function detail($id, Request $request)
    {
        $transaction = $request->user()->member
            ->transactions()
            ->where('id', $id)
            ->first();

        return response()->json([
            'transaction' => $transaction
        ]);
    }

    /**
     * Get Midtrans SnapToken
     *
     * @param integer $transaction_id
     * @return void \Illuminate\Http\Response
     */
    public function getToken($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $midtrans = new CreateSnapTokenService($transaction);
        $snapToken = $midtrans->getSnapToken();

        return response()->json([
            'token' => $snapToken,
            'redirect_url' => "https://app.sandbox.midtrans.com/snap/v2/vtweb/" . $snapToken,
        ]);
    }

    /**
     * Add Waybill Cost in transaction
     * and update Grand Total
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addWayBillCost(Request $request)
    {
        $response['status'] = true;
        $response['message'] = 'Successfully updated transaction';
        $response['data'] = (new TransactionService)->addWayBillCost($request);

        return response()->json($response);
    }
}
