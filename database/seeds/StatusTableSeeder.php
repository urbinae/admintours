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
        Status::create([
            'name'          => 'En proceso',
        ]);
        Status::create([
            'name'          => 'Cancelado',
        ]);
        Status::create([
            'name'          => 'Aprobado',
        ]);
    }
}
