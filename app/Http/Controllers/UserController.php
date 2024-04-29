<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;


class UserController extends Controller
{
    public function tampilData(string $id):View {

        return view('user.profile',[
        'user' => User::findOrFail($id)
        ]);
    }

    public function index(): View
    {
       $user = User::latest()->paginate(10);
       return view('user.index',compact('user'));
    }

    public function add(): View
    {
       $user = User::latest()->paginate(10);
       return view('user.index',compact('user'));
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'username'      => 'required|min:5|unique:user:username',
            'email'         => 'required|min:5|unique:user:email|email',
            'password'      => 'required|min:5',
        ]);

        //create product
        User::create([
            'username'          => $request->username,
            'email'             => $request->email,
            'password'          => md5($request->price),
        ]);

        //redirect to index
        return redirect()->route('user.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    


}
