<?php

namespace App\Http\Controllers;

use App\Http\Requests\updateUserRequest;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = User::All();
        return view('Users.show', compact('users'));
    }

    public function profile($user_id)
    {
        $user = User::find($user_id);
        return view('Users.adminProfile', compact('user'));
    }

    public function add_user(Request $request){

        $this->validate($request,[
            'name' => 'required|max:120',
            'email' => 'required|email',
            'password' => 'required',
            'address'=>'required',
            'phone'=>'required'
        ]);

        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = $request['password'];
        $user->address = $request['address'];
        $user->phone = $request['phone'];
        $user->save();
        return redirect()->route('allUsers')->with(['success' => 'User successfully created!']);

    }
    public function get_add_user (){
        return view('Users.addUser');
    }

    public function get_update_user($user_id){
        $user = User::find($user_id);
        return view('Users.updateUser',compact('user'));
    }

//    public function update_user(Request $request){
//        dd($request['name']);
//        $this->validate($request, [
//            'name' => 'required|max:120',
//            'email' => 'required|email',
//            'password' => 'required' ,
//            'address'=>'required',
//            'phone'=>'required'. $request['user_id']
//        ]);
//
//        $user = User::find($request['user_id']);
//        $password = '';
//
//
//        $user->name = $request['name'];
//        $user->email = $request['email'];
//        $user->password = $request['password'];
//        $user->address = $request['address'];
//        $user->phone = $request['phone'];
//        $user->save();
//
//
//        return redirect()->route('allUsers')->with(['success' => 'User Successfully Updated.']);
//
//    }

    public function update_user(updateUserRequest $request)
    {
        $user_update = User::find($request->user);
        $user_update->update($request->only(['name', 'email','address' , 'phone']));

        return redirect()->route('allUsers')->with(['success' => 'User Successfully Updated.']);
    }

    public function destroy($user_id)
    {
        User::find($user_id)->delete();
        return redirect()->route('allUsers')->with(['success' => 'User Successfully deleted.']);
    }


}
