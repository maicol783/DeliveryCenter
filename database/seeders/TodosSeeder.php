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
            'codigo'=> '01'
        ])->assignRole('Admin');

        User::create([
            'name'=> 'U central',
            'email'=> 'central@gmail.com',
            'password'=> Hash::make('12345678'),
            'codigo'=> '02'
        ])->assignRole('Central');

        User::create([
            'name'=> 'U sedeFloresta',
            'email'=> 'sede@gmail.com',
            'password'=> Hash::make('12345678'),
            'codigo'=> '03'
        ])->assignRole('Sede');

        User::create([
            'name'=> 'U sedeCastilla',
            'email'=> 'sede2@gmail.com',
            'password'=> Hash::make('12345678'),
            'codigo'=> '04'
        ])->assignRole('Sede');
        
        User::create([
            'name'=> 'U sedeManrique',
            'email'=> 'sede3@gmail.com',
            'password'=> Hash::make('12345678'),
            'codigo'=> '05'
        ])->assignRole('Sede');

    }
}
