<?php

namespace App\Http\Controllers\API\Setting;

use App\Http\Controllers\Controller;
use App\Models\Setting\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{
    /**
     * Get entity based on name query
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function get(Request $request)
    {
        $times = Entity::query()
            ->where('name', $request->name)
            ->get();

        return response()->json(compact('times'));
    }
}
