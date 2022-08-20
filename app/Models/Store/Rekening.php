<?php

namespace App\Models\Store;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['bank_name'];

    public function getBankNameAttribute()
    {
        return Bank::select('name')->where('id', $this->bank_id);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
