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

        return back();
    }
    public function Login(Request $request){
        $credentials = ['username' => $request->input('username'), 'password' => $request->input('password'),'user_archived' => 0];
        if(Auth::attempt($credentials, true)){
            return redirect('/');
        }
        return redirect('login');
    }
    public function Logout(){
        Auth::logout();
        return redirect('/login');
    }
    public function ShowAll(){
        $users = DB::select('SELECT concat(F_Name," ",L_Name) as name, position, Contact_No, username,  id   FROM users WHERE user_archived = 0');
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
        return Auth::user();
    }
    public function Delete(Request $request){
        DB::update('UPDATE users SET user_archived = 1 WHERE id = ?', [$request->input('id')]);
    }
    public function Edit(Request $request){
        $access = 0;
        foreach($request->input('access') as $index => $state){
            $access |= 1 << intval($index);
        }
        
        DB::insert('UPDATE users 
                    SET F_Name = ?, M_Name = ?, L_Name = ?, Contact_No = ?, user_access = ? ,username = ?,position = ?
                    WHERE id = ?',[
                                    $request->input('F_Name'),
                                    $request->input('M_Name'),
                                    $request->input('L_Name'),
                                    $request->input('Contact_No'),
                                    $access,
                                    $request->input('username'),
                                    $request->input('position'),
                                    $request->input('id')
        ]);
        return back();
    }
    public function Select(Request $request){
        return json_encode(DB::select('SELECT * FROM users WHERE id = ?', [$request->input('id')])[0]);
    }
    public function ChangePassword(Request $request){
        DB::update('UPDATE users SET password = ? WHERE id = ?',[Hash::make($request->input('password')), $request->input('id')]);
        return back();
    }
}
