<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\validator;
use App\Models\User;

class AuthController extends Controller{

    public function __construct(){
        $this->middleware('auth:api', ['except' => ['login','registerclient']]);
        $this->middleware('can:Users.Edit.admin')->only('update');
        $this->middleware('can:Users.Delete.admin')->only('destroy');
        }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
                'status' => 'success',
                'user' => $user,
                'authorisation' => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]);
    }

    public function registeradmin(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'id_rol' => 'required|numeric',
        ]);

        $user = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'id_rol'   => $request->id_rol,
        ]);

        $token = Auth::login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);

        // Le asignamos el rol de Cliente
        $user->assignRole('client');
    }

    public function registerclient(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_rol' => '3',
        ])->assignRole('client');

        $token = Auth::login($user);

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user,
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);

    }

    public function logout(){
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh(){

        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function profile(){

        return response()->json(auth()->user());
    }

    public function update(Request $request){
            $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'id_rol' => 'required|numeric',

        ]);
        if($validator->fails()){
            return response()->json([
                $validator->errors()->toJson(),
                'status'  => false,
                'code' => 409
            ]);
        }

        $User = User::findOrFail($request->id);
            $User->name = $request->name;
            $User->email = $request->email;
            $User->password = $request->password;
            $User->id_rol = $request->id_rol;
            $User->save();


        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully',
            'User' => $User,
            ]);
    }

    public function destroy(Request $request){

        $UserTemp=User::findOrFail($request->id);

        $User = User::destroy($request->id);
        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully',
            'User' => $UserTemp,
            ]);;
    }

}