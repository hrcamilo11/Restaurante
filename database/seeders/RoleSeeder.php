<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use HasRoles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /*
      Antes de migrar las bases de datos y realizar el comando bd:seed se debe de pasar el archivo de migración de roles con los siguientes comandos en orden:

      php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"

      php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"

      Luego de esto se ejecutan las migraciones y seeders.

      */
      //Creación de roles
       $rol1 = Role::create(['name' => 'admin']);
       $rol2 = Role::create(['name' => 'empleado']);
       $rol3 = Role::create(['name' => 'client']);

       //Creación de permisos
       // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //USER
       // - Create
      $PermisoUser1 = Permission::create(['name'=>'Users.Create.admin']);
      $PermisoUser2 = Permission::create(['name'=>'Users.Create.empleado']);
      $PermisoUser3 = Permission::create(['name'=>'Users.Create.client']);
      // - Edit
      $PermisoUser4 = Permission::create(['name'=>'Users.Edit.admin']);
      $PermisoUser5 = Permission::create(['name'=>'Users.Edit.empleado']);
      $PermisoUser6 = Permission::create(['name'=>'Users.Edit.client']);
      // - Read
      $PermisoUser7 = Permission::create(['name'=>'Users.Read.admin']);
      $PermisoUser8 = Permission::create(['name'=>'Users.Read.empleado']);
      $PermisoUser9 = Permission::create(['name'=>'Users.Read.client']);
      // - Delete
      $PermisoUser10 = Permission::create(['name'=>'Users.Delete.admin']);
      $PermisoUser11 = Permission::create(['name'=>'Users.Delete.empleado']);
      $PermisoUser12 = Permission::create(['name'=>'Users.Delete.client']);


       // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //ROLE
       // - Create
      $PermisoRole1 = Permission::create(['name'=>'Role.Create']);
      // - Edit
      $PermisoRole2 = Permission::create(['name'=>'Role.Edit']);
      // - Read
      $PermisoRole3 = Permission::create(['name'=>'Role.Read']);;
      // - Delete
      $PermisoRole4 = Permission::create(['name'=>'Role.Delete']);

      // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //PRODUCT
       // - Create
      $PermisoProduct1 = Permission::create(['name'=>'Product.Create']);
      // - Edit
      $PermisoProduct2 = Permission::create(['name'=>'Product.Edit']);
      // - Read
      $PermisoProduct3 = Permission::create(['name'=>'Product.Read']);
      // - Delete
      $PermisoProduct4 = Permission::create(['name'=>'Product.Delete']);


    }
}
