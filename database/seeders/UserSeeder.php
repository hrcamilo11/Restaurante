<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use app\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Asignamos variables a cada rol
        $RolAdmin = Role::where('name','admin')->first();
        $RolClient = Role::where('name','client')->first();
        $RolEmpleado = Role::where('name','empleado')->first();

        //Creamos usuarios



        //ADMIN
        $UserAdmin = \App\Models\User::factory()->create([
        'name'=> 'Admin',
        'email'=> 'admin@test.com',
        'password'=> bcrypt('123456789'),
        ])->assignRole('admin');


        //EMPLEADO
        $UserEmpleado = \App\Models\User::factory()->create([
        'name'=> 'Empleado',
        'email'=> 'empleado@test.com',
        'password'=> bcrypt('123456789'),
        ])->assignRole('empleado');


        //CLIENTE
        $UserClient = \App\Models\User::factory()->create([
        'name'=> 'Client',
        'email'=> 'client@test.com',
        'password'=> bcrypt('123456789'),
        ])->assignRole('client');
    }
}
