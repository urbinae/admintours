<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 20)->create();

        $user = array(
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => \Hash::make('123456'),
                'created_at' => new DateTime,
                'updated_at' => new DateTime
            ]);
        User::insert($user);

        Role::create([
        	'name'		=> 'Admin',
        	'slug'  	=> 'slug',
        	'special' 	=> 'all-access'
        ]);
    }
}
