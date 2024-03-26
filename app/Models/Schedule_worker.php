<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule_worker extends Model
{
    use HasFactory;

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }
}
