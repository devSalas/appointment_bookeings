<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    public function services(){
        return this->belognsToMany("App\Models\service");
    }
    public function appointments(){
        return this->belognsToMany("App\Models\appoinment");
    }
}
