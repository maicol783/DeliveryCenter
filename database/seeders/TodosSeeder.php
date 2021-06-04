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

    }
}
