<?php

namespace App\Http\Controllers;


use App\Models\User;
use Request;
use App\Http\Requests\Users\UpdateProfileRequest;

class UsersController extends Controller
{
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }
    public function edit()
    {
        return view('users.edit')->with('user',auth()->user());
    }

    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        session()->flash('success', '{{$user}} is now an admin!');
        return redirect()->back();
    }
    public function makeEmployee(User $user)
    {
        $user->role = 'employee';
        $user->save();
        session()->flash('success', '{{$user}} is now an employee!');
        return redirect()->back();
    }
        
    public function update(UpdateProfileRequest $request)
    {
        
            $user = auth()->user();
           
            $user->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
            ]);
    
            return redirect('/users/profile')->with('success', 'Information updated!');

    }
}
