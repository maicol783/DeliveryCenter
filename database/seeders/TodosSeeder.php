<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TodosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin=user::create([
            'name'=> 'U Admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make('1234'),
            'tipo'=> '1',
            'codigo' => 'Admin1',

        ]);

        $useradmin=user::create([
            'name'=> 'U CENTRAl',
            'email'=> 'central@gmail.com',
            'password'=> Hash::make('1234'),
            'tipo'=> '2',
            'codigo' => 'Central1',

        ]);

        $useradmin=user::create([
            'name'=> 'U Sede',
            'email'=> 'sede@gmail.com',
            'password'=> Hash::make('1234'),
            'tipo'=> '3',
            'codigo' => 'sede1',

        ]);
    }
}
