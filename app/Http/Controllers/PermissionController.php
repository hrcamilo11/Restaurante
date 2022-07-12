<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PermissionController extends Controller
{

        public function __construct(){
        $this->middleware('can:Role.Edit')->only([
            'ProductAll',
            'RoleAll',
            'UserAllClient',
            'UserAllEmpleado',
            'UserAllAdmin',
            'index',
            'Show',
            'UsersCreateadmin',
            'UsersCreateempleado',
            'UsersCreateclient',
            'UsersEditadmin',
            'UsersEditempleado',
            'UsersEditclient',
            'UsersReadadmin',
            'UsersReadempleado',
            'UsersReadclient',
            'UsersDeleteadmin',
            'UsersDeleteempleado',
            'UsersDeleteclient',
            'ProductCreate',
            'ProductEdit',
            'ProductRead',
            'ProductDelete',
            'RoleCreate',
            'RoleEdit',
            'RoleRead',
            'RoleDelete',
    ]);
        }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Permission = Permission::all();
        return $Permission;
    }

    public function Show(Request $request)
    {
        $id=Permission::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Current permissions',
            'Permission' => $id,
            ],201);;
    }

    public function ProductAll(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo([
            'Product.Create',
            'Product.Edit',
            'Product.Read',
            'Product.Delete',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function RoleAll(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo([
            'Role.Create',
            'Role.Edit',
            'Role.Read',
            'Role.Delete',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UserAllClient(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo([
            'User.Create.client',
            'User.Edit.client',
            'User.Read.client',
            'User.Delete.client',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UserAllEmpleado(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo([
            'User.Create.empleado',
            'User.Edit.empleado',
            'User.Read.empleado',
            'User.Delete.empleado',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UserAllAdmin(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo([
            'User.Create.admin',
            'User.Edit.admin',
            'User.Read.admin',
            'User.Delete.admin',
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function RoleCreate(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Role.Create');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function RoleEdit(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Role.Edit');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function RoleRead(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Role.Read');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function RoleDelete(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Role.Delete');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function ProductCreate(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Product.Create');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function ProductEdit(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Product.Edit');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function ProductRead(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Product.Read');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function ProductDelete(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Product.Delete');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersCreateadmin(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Create.admin');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersCreateempleado(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Create.empleado');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersCreateclient(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Create.client');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersEditadmin(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Edit.admin');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersEditempleado(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Edit.empleado');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersEditclient(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Edit.client');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersReadadmin(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Read.admin');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersReadempleado(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Read.empleado');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersReadclient(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Read.client');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersDeleteadmin(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Delete.admin');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersDeleteempleado(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Delete.empleado');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }

    public function UsersDeleteclient(Request $request)
    {
        $id=Role::findById($request->id);

        $validator = Validator::make($request->all(),[
            'id' => 'required',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $id->givePermissionTo('Users.Delete.client');

        return response()->json([
            'status' => 'success',
            'message' => 'Permission assingned successfully',
            'Role' => $id,
            ],201);;
    }



}
