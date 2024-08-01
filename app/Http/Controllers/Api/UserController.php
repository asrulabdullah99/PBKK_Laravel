<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function index()
    {
       $user = User::latest()->paginate(10);
       return new UserResource(true,'List Data User', $user);
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(),
        [
            'username'  => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'level'     => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $user = User::create([
            'username'          => $request->username,
            'email'             => $request->email,
            'password'          => Hash::make($request['password']), 
            'level'             => $request->level,
        ]);
        //redirect to index
        return new UserResource(true, 'Data User berhasil ditambahkan', $user);
    }

    public function show($id){
        $user = User::find($id);

        return new UserResource(true,'Detail Data User', $user);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),
        [
            'username'  => 'required',
            'email'     => 'required',
            'password'  => 'required',
            'level'     => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }

        $user = User::find($id);

        $user->update([
                'username'  => $request->username,
                'email'     => $request->email,
                'password'  => Hash::make($request['password']),
                'level'     => $request->level
            ]);

        return new UserResource(true,'Data User Berhasil Diubah', $user);
    }

    public function destroy($id){
        $user = User::find($id);
        //delete user
        $user->delete();

        //return response
        return new UserResource(true, 'Data User Berhasil Dihapus!', null);
    }
}
