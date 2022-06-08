<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Show all Users
    public function index(){
        return view('backend.user.index',[
            'users'=> User::get(),
        ]);
    }
    //Create new User
    public function create(){
        return view('backend.user.create');
    }
    //Store new User in DB
    public function store(UserRequest $request){
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'Dashboard/img/avatars');
        }else{
            $file_name = "A";
        }
        User::create([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password,
            'is_admin' => $request -> is_admin,
            'photo'=>$file_name,
        ],$request->validated());

        return redirect()->route('admin.users.index')->with(['success'=>'User Added Successfully']) ;
    }
    //Edit User
    public function edit(User $user){
        return view('backend.user.update',compact('user'));
    }
    //update User && Store in DB
    public function update(User $user,UpdateUserRequest $request){
        if(($request -> photo) != Null){
            $file_name = $this -> saveImages($request -> photo,'Dashboard/img/avatars');
        }else{
            $file_name = "A";
        }
        $user->update([
            'name' => $request -> name,
            'email' => $request -> email,
            'password' => $request -> password,
            'is_admin' => $request -> is_admin,
            'photo'=>$file_name,
        ],$request->validated());

        return redirect()->route('admin.users.index')->with(['success'=>'User Updated Successfully']) ;
    }
    //update User && Store in DB
    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users.index')->with(['success'=>'User Deleted Successfully']) ;
    }
    //Function to save photo of Users
    protected function saveImages($photo,$folder)
    {
        $file_ex = $photo->getClientOriginalExtension();
        $file_name = time() . '.' . $file_ex;
        $path = $folder;
        $photo->move($path, $file_name);
        return $file_name;
    }
}
