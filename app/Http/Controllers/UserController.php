<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;


class UserController extends Controller
{
    //
    public function Register(Request $request){
        $access = 0;
        foreach($request->input('access') as $index => $state){
            $access |= 1 << intval($index);
        }
        
        DB::insert('INSERT INTO users(F_Name, M_Name, L_Name, Contact_No, user_access, password,username)
                                VALUES(?,?,?,?,?,?,?)',[
                                    $request->input('F_Name'),
                                    $request->input('M_Name'),
                                    $request->input('L_Name'),
                                    $request->input('Contact_No'),
                                    $access,
                                    Hash::make($request->input('password')),
                                    $request->input('username')
        ]);
        //return $request->all();
        return back();
    }
    public function Login(Request $request){
        $credentials = ['username' => $request->input('username'), 'password' => $request->input('password')];
        if(Auth::attempt($credentials)){
            //return redirect('/');
            return Auth::user();
        }
        echo json_encode(Auth::user());
        return $request->all();
    }
    public function Logout(){
        Auth::logout();
        return redirect('/login');
    }
}
