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
         User::create([
            'name'=> 'U Admin',
            'email'=> 'admin@gmail.com',
            'password'=> Hash::make('12345678'),
        ])->assignRole('Admin');

        User::create([
            'name'=> 'U sede',
            'email'=> 'sede@gmail.com',
            'password'=> Hash::make('12345678'),
        ])->assignRole('Sede');

        User::create([
            'name'=> 'U central',
            'email'=> 'central@gmail.com',
            'password'=> Hash::make('12345678'),
        ])->assignRole('Central');

    }
}
