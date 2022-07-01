<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function destroy(){
        // ddd('Log the user out');
        auth()->logout();

        return redirect('/');
    }

    public function create(){
        return view('login.create');
    }

    public function store(Request $request){
        
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email' , $request->email)->first();

        // @dd($request->password);
        // @dd($request->password == $user->password);
        if( !$user || !($request->password == $user->password)){
            throw ValidationException::withMessages([
                'email' => 'Could not verify your credentials'
            ]); 
        }
        else{
            return response([
                'error' => ["Everything is good"]
            ]);
        }

        // dd(auth()->check());
            // if( auth()->attempt($attributes) ){
            //      session()->regenerate();
            //      return redirect('/');
                 
            //     // return response()->json(['dg' => 'okay']);
            //  }
            
            
            

    }
}


        // $u = User::all();
        // dd(request()->email);
        // dd($u->where('email' , request()->email));