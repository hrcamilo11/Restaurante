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
            'UserCreateAdmin',
            'ProductAll',
            'RoleAll',
            'UserAllClient',
            'UserAllEmpleado',
            'UserAllAdmin',
            'index',
            'Show',
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

        return response()->json([
            'status' => 'success',
            'message' => 'Current permissions',
            'Role' => $id,
            ],201);;
    }

    public function UserCreateAdmin(Request $request)
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

}
