<?php

namespace App\Models;

use App\Models\Member\Member;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Notification extends Model
{
    use HasFactory, FilterQueryString;

    protected $guarded = ['id'];
    protected $filters = [
        'type',
        'category'
    ];
    protected $appends = ['past_times'];

    public function getPastTimesAttribute()
    {
        $remaining_times = collect();
        $days = now()->diffInDays($this->created_at);
        $hours = now()->diffInHours($this->createad_at);
        $minutes = now()->diffInMinutes($this->created_at);
        $remaining_times->put('days', $days);
        $remaining_times->put('hours', $hours);
        $remaining_times->put('minutes', $minutes);

        return $remaining_times;
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }
}
