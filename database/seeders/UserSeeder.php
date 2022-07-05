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



        //Se asignan los permisos como variables

        //PERMISOS DE USUARIO
        $PermisoUser1 = Permission::where('name','Users.Create.admin')->first();
        $PermisoUser2 = Permission::where('name','Users.Create.empleado')->first();
        $PermisoUser3 = Permission::where('name','Users.Create.client')->first();

        $PermisoUser4 = Permission::where('name','Users.Edit.admin')->first();
        $PermisoUser5 = Permission::where('name','Users.Edit.empleado')->first();
        $PermisoUser6 = Permission::where('name','Users.Edit.client')->first();

        $PermisoUser7 = Permission::where('name','Users.Read.admin')->first();
        $PermisoUser8 = Permission::where('name','Users.Read.empleado')->first();
        $PermisoUser9 = Permission::where('name','Users.Read.client')->first();

        $PermisoUser10 = Permission::where('name','Users.Delete.admin')->first();
        $PermisoUser11 = Permission::where('name','Users.Delete.empleado')->first();
        $PermisoUser12 = Permission::where('name','Users.Delete.client')->first();

        //PERMISOS DE ROL
        $PermisoRole1 = Permission::where('name','Role.Create')->first();
        $PermisoRole2 = Permission::where('name','Role.Edit')->first();
        $PermisoRole3 = Permission::where('name','Role.Read')->first();
        $PermisoRole4 = Permission::where('name','Role.Delete')->first();

        //PERMISOS DE PRODUCTOS
        $PermisoProduct1 = Permission::where('name','Product.Create')->first();
        $PermisoProduct2 = Permission::where('name','Product.Edit')->first();
        $PermisoProduct3 = Permission::where('name','Product.Read')->first();
        $PermisoProduct4 = Permission::where('name','Product.Delete')->first();


        //Asignacion de permisos para admin

        $RolAdmin->givePermissionTo([
            //Permisos de usuario
            $PermisoUser1,
            $PermisoUser2,
            $PermisoUser3,
            $PermisoUser4,
            $PermisoUser5,
            $PermisoUser6,
            $PermisoUser7,
            $PermisoUser8,
            $PermisoUser9,
            $PermisoUser10,
            $PermisoUser11,
            $PermisoUser12,

            //Permisos Role

            $PermisoRole1,
            $PermisoRole2,
            $PermisoRole3,
            $PermisoRole4,


            //Permisos Productos

            $PermisoProduct1,
            $PermisoProduct2,
            $PermisoProduct3,
            $PermisoProduct4,

        ]);

        //Asignacion de permisos para Empleado

        $RolEmpleado->givePermissionTo([
            //Permisos de usuario

            $PermisoUser3,
            $PermisoUser6,
            $PermisoUser8,
            $PermisoUser9,
            $PermisoUser12,

            //Permisos Productos

            $PermisoProduct1,
            $PermisoProduct2,
            $PermisoProduct3,
            $PermisoProduct4,

        ]);

        //Asignacion de permisos para Client

        $RolClient->givePermissionTo([

            //Permisos de usuario

            $PermisoUser3,
            $PermisoUser6,
            $PermisoUser9,
            $PermisoUser12,

            //Permisos Productos

            $PermisoProduct2,
            $PermisoProduct3,

        ]);




    }
}
