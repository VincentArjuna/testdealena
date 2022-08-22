<?php

namespace App\Http\Controllers\API\Store;

use App\Http\Controllers\Controller;
use App\Models\Store\Rekening;
use Illuminate\Http\Request;

class RekeningController extends Controller
{
    public function list(Request $request)
    {
        $rekenings = Rekening::where('store_id', $request->user()->store->id)->get();
        return response()->json([
            'rekening' => $rekenings
        ]);
    }

    public function insert(Request $request)
    {
        $rekening = Rekening::create([
            'store_id' => $request->user()->store->id,
            'bank_id' => $request->bank_id,
            'atas_nama' => $request->atas_nama,
            'no_rek' => $request->no_rek
        ]);

        return response()->json([
            'message' => 'Sukses Menambahkan Rekening',
            'rekening' => $rekening
        ], 200);
    }

    public function delete($id)
    {
        Rekening::destroy($id);
        return response()->json([
            'message' => 'Sukses Menghapus Rekening',
        ], 200);
    }
}
