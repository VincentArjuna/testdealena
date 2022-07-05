<?php

namespace App\Models\Product;

use App\Models\Member\Member;
use App\Models\Store\Store;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'datetime' => 'datetime',
        'member_detail' => 'collection',
        'store_detail' => 'collection',
        'products' => 'collection',
    ];

    protected $appends = ['status_list', 'status_text'];

    public function getStatusListAttribute()
    {
        return collect([
            ['code' => 'waiting_payment', 'label' => 'Waiting Payment'],
            ['code' => 'processed', 'label' => 'Processed'],
            ['code' => 'on_delivery', 'label' => 'On Delivery'],
            ['code' => 'delivered', 'label' => 'Delivered'],
            ['code' => 'completed', 'label' => 'Completed'],
            ['code' => 'cancelled', 'label' => 'Cancelled']
        ]);
    }

    public function getStatusTextAttribute()
    {
        $text = $this->status_list
            ->where('code', $this->status)
            ->first();

        return $text['label'];
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }
}
