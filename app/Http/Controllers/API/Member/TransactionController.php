<?php

namespace App\Http\Controllers\API\Member;

use App\Http\Controllers\Controller;
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
    public function detail(Request $request)
    {
        $user = $request->user();
        $transaction = $user->member
            ->transactions()->paginate(10);

        return response()->json([
            'transaction' => $transaction
        ]);
    }
}
