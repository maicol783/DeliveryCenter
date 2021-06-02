<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use spatie\Permission\Models\Role;
use spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role:create(['name'=> 'Admin']);
        $role1 = Role:create(['name'=> 'Central']);
        $role1 = Role:create(['name'=> 'Sede']);

        Permission::Create
    }
}
