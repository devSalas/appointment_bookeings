<?php

namespace Database\Seeders;

use App\Models\service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        service::create([
            'name' => 'corte de cabello',
            'price' => 20.00,
            'duration' => 30
        ]);
        service::create([
            'name' => 'ondulaciónes',
            'price' => 40.00,
            'duration' => 240
        ]);
        service::create([
            'name' => 'corte de cejas',
            'price' => 20.00,
            'duration' => 20
        ]);
    }
}
