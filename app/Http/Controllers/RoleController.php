<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{


    public function __construct(){
        $this->middleware('auth:api');
        $this->middleware('can:Role.Read')->only('index');
        $this->middleware('can:Role.Create')->only('store');
        $this->middleware('can:Role.Edit')->only('update');
        $this->middleware('can:Role.Delete')->only('destroy');

    }

    public function index()
    {
        $Role = Role::all();

        return $Role;
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255|unique:roles',
        ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $Role = Role::create([
            'name' => $request->name,
        ]);
        $Role->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Role created successfully',
            'Role' => $Role,
            ],201);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }
        $Role = Role::update([
            'name' => $request->name,
            ]);
        $Role->save();


        return response()->json([
            'status' => 'success',
            'message' => 'Role updated successfully',
            'Role' => $Role,
            ]);
    }

    public function destroy(Request $request)
    {
        $Role = Role::destroy($request->id);
        return response()->json([
            'status' => 'success',
            'message' => 'Role deleted successfully',
            ]);
    }
}
