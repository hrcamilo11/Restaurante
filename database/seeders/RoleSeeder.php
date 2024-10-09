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
        // Creación de roles
        $Admin = Role::firstOrCreate(['name' => 'admin']);
        $Empleado = Role::firstOrCreate(['name' => 'empleado']);
        $Client = Role::firstOrCreate(['name' => 'client']);

       //Creación de permisos
       // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //USER
       // - Create
      Permission::firstOrCreate(['name'=>'Users.Create.admin'])->SyncRoles(['admin']);
      Permission::firstOrCreate(['name'=>'Users.Create.empleado'])->SyncRoles(['admin']);
      Permission::firstOrCreate(['name'=>'Users.Create.client'])->SyncRoles(['admin','client']);
      // - Edit
      Permission::firstOrCreate(['name'=>'Users.Edit.admin'])->SyncRoles(['admin']);
      Permission::firstOrCreate(['name'=>'Users.Edit.empleado'])->SyncRoles(['admin']);
      Permission::firstOrCreate(['name'=>'Users.Edit.client'])->SyncRoles(['admin','client']);
      // - Read
      Permission::firstOrCreate(['name'=>'Users.Read.admin'])->SyncRoles(['admin']);
      Permission::firstOrCreate(['name'=>'Users.Read.empleado'])->SyncRoles(['admin','empleado']);
      Permission::firstOrCreate(['name'=>'Users.Read.client'])->SyncRoles(['admin','client']);
      // - Delete
      Permission::firstOrCreate(['name'=>'Users.Delete.admin'])->SyncRoles(['admin']);
      Permission::firstOrCreate(['name'=>'Users.Delete.empleado'])->SyncRoles(['admin']);
      Permission::firstOrCreate(['name'=>'Users.Delete.client'])->SyncRoles(['admin','client']);


       // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //ROLE
       // - Create
      Permission::firstOrCreate(['name'=>'Role.Create'])->SyncRoles(['admin']);
      // - Edit
      Permission::firstOrCreate(['name'=>'Role.Edit'])->SyncRoles(['admin']);
      // - Read
      Permission::firstOrCreate(['name'=>'Role.Read'])->SyncRoles(['admin']);
      // - Delete
      Permission::firstOrCreate(['name'=>'Role.Delete'])->SyncRoles(['admin']);

      // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //PRODUCT
       // - Create
      Permission::firstOrCreate(['name'=>'Product.Create'])->SyncRoles(['admin','empleado']);
      // - Edit
      Permission::firstOrCreate(['name'=>'Product.Edit'])->SyncRoles(['admin','empleado','client']);
      // - Read
      Permission::firstOrCreate(['name'=>'Product.Read'])->SyncRoles(['admin','empleado','client']);
      // - Delete
      Permission::firstOrCreate(['name'=>'Product.Delete'])->SyncRoles(['admin','empleado']);

      // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
       //SHOP
       // - Add
      Permission::firstOrCreate(['name'=>'Shop.Add'])->SyncRoles(['admin','empleado','client']);
      // - Sale
      Permission::firstOrCreate(['name'=>'Shop.Sale'])->SyncRoles(['admin','empleado','client']);
      // - Pay
      Permission::firstOrCreate(['name'=>'Shop.Pay'])->SyncRoles(['admin','empleado','client']);


    }
}
