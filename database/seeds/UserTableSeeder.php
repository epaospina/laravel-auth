<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        /* Usuario normal*/
        $user = new User();
        $user->name = 'Usuario';
        $user->email = 'user@mcvehiculos.com';
        $user->password = bcrypt('*VehiculosMc2019*');
        $user->save();
        $user->roles()->attach($role_user);

        /* Usuario normal*/
        $user = new User();
        $user->name = 'Usuario';
        $user->email = 'user1@mcvehiculos.com';
        $user->password = bcrypt('Us3r*VehiculosMc2019*');
        $user->save();
        $user->roles()->attach($role_user);

        /* Usuario administrador*/
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('Admin1strad0r*VehiculosMc');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
