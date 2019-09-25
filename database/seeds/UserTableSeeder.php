<?php

use App\DriverData;
use Carbon\Carbon;
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
        $user->email = 'admin@mcvehiculos.com';
        $user->password = bcrypt('Admin1strad0r*McVehiculos');
        $user->save();
        $user->roles()->attach($role_admin);

        /* Usuario conductor*/
        $user = new User();
        $user->name = 'Conductor';
        $user->email = 'conductor@mcvehiculos.com';
        $user->password = bcrypt('ConductorMcVehiculos');
        $user->save();
        $user->roles()->attach($role_user);

        $driver_data = new DriverData();
        $driver_data->user_id   = $user->id;
        $driver_data->cap       = 'AB123$ERw';
        $driver_data->date_cap  = Carbon::now();
        $driver_data->save();
    }
}
