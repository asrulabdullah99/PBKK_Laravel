<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\View\View;


class UserController extends Controller
{
    public function tampilData(string $id):View {

        return view('user.profile',[
        'user' => User::findOrFail($id)
        ]);
    }

    public function index(User $user):View
    {
        dd($user->username);
        return view('user.index', compact('user'));
    }


}
