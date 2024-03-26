<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointment extends Model
{
    use HasFactory;

    public function services(){
        return this->belognsToMany("App\Models\service");
    }
    public function workers(){
        return this->belognsToMany("App\Models\Worker");
    }

    public function Clients(){
        return this->belognsTo("App\Models\Client");
    }

}
