<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_root= Role::where('nombre','SuperUsuario')->first();
        //$role_admin= Role::where('nombre','Administrador')->first();

        $usuario= new User();
        $usuario->name='Administrador Principal';
        $usuario->email='admin@hseqperusac.com';
        $usuario->username='admin';
        $usuario->password=Hash::make('admin');
        $usuario->role_id=$role_root->id;
        $usuario->api_token=str_random(60);
        $usuario->status=1;
        $usuario->save();
    }
}
