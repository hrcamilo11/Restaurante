<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
       $Admin = Role::create(['name' => 'admin']);
       $Empleado = Role::create(['name' => 'empleado']);
       $Client = Role::create(['name' => 'client']);

       //Creación de permisos
       // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //USER
       // - Create
      Permission::create(['name'=>'Users.Create.admin'])->SyncRoles(['admin'])->name('');
      Permission::create(['name'=>'Users.Create.empleado'])->SyncRoles(['admin']);
      Permission::create(['name'=>'Users.Create.client'])->SyncRoles(['admin','client']);
      // - Edit
      Permission::create(['name'=>'Users.Edit.admin'])->SyncRoles(['admin']);
      Permission::create(['name'=>'Users.Edit.empleado'])->SyncRoles(['admin']);
      Permission::create(['name'=>'Users.Edit.client'])->SyncRoles(['admin','client']);
      // - Read
      Permission::create(['name'=>'Users.Read.admin'])->SyncRoles(['admin']);
      Permission::create(['name'=>'Users.Read.empleado'])->SyncRoles(['admin','empleado']);
      Permission::create(['name'=>'Users.Read.client'])->SyncRoles(['admin','client']);
      // - Delete
      Permission::create(['name'=>'Users.Delete.admin'])->SyncRoles(['admin']);
      Permission::create(['name'=>'Users.Delete.empleado'])->SyncRoles(['admin']);
      Permission::create(['name'=>'Users.Delete.client'])->SyncRoles(['admin','client']);


       // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //ROLE
       // - Create
      Permission::create(['name'=>'Role.Create'])->SyncRoles(['admin']);
      // - Edit
      Permission::create(['name'=>'Role.Edit'])->SyncRoles(['admin']);
      // - Read
      Permission::create(['name'=>'Role.Read'])->SyncRoles(['admin']);
      // - Delete
      Permission::create(['name'=>'Role.Delete'])->SyncRoles(['admin']);

      // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //PRODUCT
       // - Create
      Permission::create(['name'=>'Product.Create'])->SyncRoles(['admin','empleado']);
      // - Edit
      Permission::create(['name'=>'Product.Edit'])->SyncRoles(['admin','empleado','client']);
      // - Read
      Permission::create(['name'=>'Product.Read'])->SyncRoles(['admin','empleado','client']);
      // - Delete
      Permission::create(['name'=>'Product.Delete'])->SyncRoles(['admin','empleado']);


    }
}
