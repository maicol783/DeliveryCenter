<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=> 'Admin']);
        $role2 = Role::create(['name'=> 'Central']);
        $role3 = Role::create(['name'=> 'Sede']);


        Permission::create(['name'=>'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.edit'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.users.update'])->syncRoles([$role1]);


        Permission::create(['name'=>'empleado.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'empleado.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'empleado.form'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'empleado.create'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name'=>'entradaproducto.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'entradaproducto.form'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'entradaproducto.create'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name'=>'informe.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'informe.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'informe.form'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'informe.create'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name'=>'pedido.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'pedido.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'pedido.form'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'pedido.create'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name'=>'producto.index'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'producto.edit'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'producto.form'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name'=>'producto.create'])->syncRoles([$role1, $role2, $role3]);

        Permission::create(['name'=>'sede.index'])->syncRoles([$role1,]);
        Permission::create(['name'=>'sede.edit'])->syncRoles([$role1,]);
        Permission::create(['name'=>'sede.form'])->syncRoles([$role1,]);
        Permission::create(['name'=>'sede.create'])->syncRoles([$role1,]);

        
    }
}
