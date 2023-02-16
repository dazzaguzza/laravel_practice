<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        // $users = User::all();

        $users = [
            'users'=>User::all(),
            'ip'=> request()->ip()
        ];
        return view('users.index',$users);
    }

    public function create(){
        $roles = [
            'roles' => Role::get(),
            'ip'=> request()->ip()
        ];

        return view('users.create',$roles);
    }

    public function store(UserCreateRequest $request){
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
  
        User::create($data);

        return redirect('/users');
    }

    public function password_edit($id){
        $user = ['user' => User::find($id), 'ip'=> request()->ip()];
        return view('users.password_edit', $user);
    }

    public function password_update(ChangePasswordRequest $request, $id){
        $user = User::find($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/users');
    
    }

    public function edit($id){
        $user = User::find($id);
        $ip = request()->ip();
        $roles = Role::get();
        return view('users.edit',compact('user','roles','ip'));
    }

    public function update(UserUpdateRequest $request, $id){

        $user = User::find($id);
        $user->name = $request->name;
        $user->role_id = $request->role_id;
        $user->save();

        return redirect('/users');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();

        return redirect('/users');
    }

}
