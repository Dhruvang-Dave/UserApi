<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function all(){

            $user = User::all()->where('isAdmin' , 0);
            return $user;
            // return response($user)->json();

        // return redirect('/')
        //     ->withErrors(['Sorry, you do not have permission to access this']);

    }
        
    public function delete($id){

        $user = User::where('id', $id)->firstorfail()->delete();
        print("User Record deleted successfully.");
        return $user;
    }

        
    public function update($id ,  Request $request){
        
        $user = User::find($id);
        // dd($user);
        $user->firstname = $request->firstname;
        $user->lastname = $request->astname;
        $user->birthdate = $request->birthdate;
        $user->phone = $request->lasphonetname;
        $user->password = $request->password;
        $user->isAdmin = $request->isAdmin;
        // return 'okay';
        $user->save();
        return  print("Record updated successfully.");
            // return $user->response();
    }

    public function info($id){

        $user = User::where('id', $id)->first();
        return $user;

    }
}
// return $user->firstname;