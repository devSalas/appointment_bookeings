<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
    
    public function workers(){
        return this->belognsToMany("App\Models\Worker");
    }

    public function appointments(){
        return this->belognsToMany("App\Models\appointment");
    }
}
