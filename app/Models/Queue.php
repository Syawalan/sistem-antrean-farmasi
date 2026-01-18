<?php

namespace App\Models;

use App\Models\Counter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Queue extends Model
{
    use HasFactory;

    protected $fillable = [
        'queue_number',
        'device_token',
        'counter_id',
        'status',
        'called_at'
    ];

    public function counter() {
        return $this->belongsTo(Counter::class);
    }

    public function getPeopleAheadAttribute() {
        return self::where('status', 'waiting')
            ->where('counter_id')
            ->where('id', '<', $this->id)
            ->count();
    }
}
