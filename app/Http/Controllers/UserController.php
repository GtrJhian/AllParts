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
        
        DB::insert('INSERT INTO users(F_Name, M_Name, L_Name, Contact_No, user_access, password,username,position,email,address)
                                VALUES(?,?,?,?,?,?,?,?,?,?)',[
                                    $request->input('F_Name'),
                                    $request->input('M_Name'),
                                    $request->input('L_Name'),
                                    $request->input('Contact_No'),
                                    $access,
                                    Hash::make($request->input('password')),
                                    $request->input('username'),
                                    $request->input('position'),
                                    $request->input('email'),
                                    $request->input('address')
        ]);
        //return $request->all();
        return back();
    }
    public function Login(Request $request){
        $credentials = ['username' => $request->input('username'), 'password' => $request->input('password')];
        if(Auth::attempt($credentials, true)){
            return redirect('/');
            //return Auth::user();
        }
        echo json_encode(Auth::user());
        return $request->all();
    }
    public function Logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function ShowAll(){
        $users = DB::select('SELECT concat(F_Name," ",L_Name) as name, position, Contact_No, username,  id   FROM users');
        $array = array();
        for($ctr=0; $ctr<count($users); $ctr++){
            $x=0;
            foreach($users[$ctr] as $field){
                $array[$ctr][$x++]=$field;
            }
        }
        return ['data' => $array];
    }
    public function Current(Request $request){
        return $request->session()->all();
    }
}
