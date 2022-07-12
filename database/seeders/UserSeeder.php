<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
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

        //Creamos usuarios

        //ADMIN
        $UserAdmin = \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'id_rol' => '1',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10)
        ])->assignRole('admin');


        //EMPLEADO
            $UserEmpleado = \App\Models\User::create([
            'name' => 'Empleado',
            'email' => 'empleado@test.com',
            'id_rol' => '2',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10)
        ])->assignRole('empleado');


        //CLIENTE
            $UserClient = \App\Models\User::create([
            'name' => 'Client',
            'email' => 'client@test.com',
            'id_rol' => '3',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10)
        ])->assignRole('client');

    }
}
