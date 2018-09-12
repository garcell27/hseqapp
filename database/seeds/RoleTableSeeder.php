<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_root=new Role();
        $role_root->nombre='SuperUsuario';
        $role_root->descripcion='Privilegios de Superusuario';
        $role_root->estado=1;
        $role_root->save();

        $role_admin=new Role();
        $role_admin->nombre='Administrador';
        $role_admin->descripcion='Privilegios de Administrador';
        $role_admin->estado=1;
        $role_admin->save();
    }
}
