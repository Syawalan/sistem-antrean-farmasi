<?php

namespace App\Models;

use App\Models\User;
use App\Models\Queue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Counter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function queues(){
        return $this->hasMany(Queue::class);
    }
}
