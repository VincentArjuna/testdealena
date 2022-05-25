<?php

namespace App\Http\Controllers;

use App\Models\Product\Transaction;
use App\Services\Midtrans\CreateSnapTokenService;

class MidtransController extends Controller
{
    public function index($transaction_id)
    {
        $transaction = Transaction::find($transaction_id);
        $midtrans = new CreateSnapTokenService($transaction);
        $snapToken = $midtrans->getSnapToken();

        return $snapToken;
    }
}
