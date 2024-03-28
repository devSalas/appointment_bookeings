<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    public function appointment()
    {
        return $this->hasMany(appointment::class);
   }

   protected $fillable = [
    'nombre', 'email', 'contraseña',
];
    protected $hidden=[
        "password"
    ];

}
