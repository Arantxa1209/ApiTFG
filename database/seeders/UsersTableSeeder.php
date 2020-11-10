<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Limpiar la tabla de usuarios
        User::truncate();

        $faker = \Faker\Factory::create();

        //Todos con la misma contraseña
        //$password = Hash::make('netireki');

        User::create([
        	'name' => 'Arantxa',
        	'email' => 'arantxa@test.com',
        	'password' => '1234',
        ]);

        //Genero usuarios 
        for($i = 0; $i < 10; $i++){
        	User::create([
        	'name' => $faker->name,
        	'email' => $faker->email,
        	'password' => $faker->password,
        ]);
        }

    }
}
