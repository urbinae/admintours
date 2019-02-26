<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Status::create([
            'name'          => 'En proceso',
        ]);
        App\Status::create([
            'name'          => 'Cancelado',
        ]);
        App\Status::create([
            'name'          => 'Aprobado',
        ]);
    }
}
