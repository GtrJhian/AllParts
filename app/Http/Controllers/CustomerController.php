<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CustomerController extends Controller
{
    //
    function Create(Request $request){
       // var_dump($request->input());
       DB::insert('INSERT into Customer(F_Name, L_Name, M_Name, Contact_No, Address, TIN_no, OSCA_PWD_ID , Company) VALUES(?,?,?,?,?,?,?,?)',[
            $request->input('F_Name'),
            $request->input('L_Name'),
            $request->input('M_Name'),
            $request->input('Contact_No'),
            $request->input('Address'),
            $request->input('TIN_no'),
            $request->input('OSCA_PWD_ID'),
            $request->input('Company')
       ]);
       return back();
    }
    function ShowAll(Request $request){
        if($request->has('term')){
            $search = '%'.$request->input('term').'%';
            $result = DB::select('SELECT Cus_ID as id,concat(L_Name,\', \',F_name,\' \',M_Name) as text FROM  customer 
                                  WHERE concat(L_Name,\', \',F_Name) LIKE ?
                                  AND Cus_Archived = 0;',
                                  [$search]);

            return ['results'=>$result];
        }
        $result = DB::select('SELECT Cus_ID, concat(L_Name,\', \', F_Name,\' \', M_Name) FROM customer WHERE Cus_Archived = ?', [0]);
        $dt=array();
        for($ctr=0; $ctr<count($result); $ctr++){
            $dt[$ctr] = array();
            $y=0;
            foreach($result[$ctr] as $el){
                $dt[$ctr][$y++] = $el;
            }
        }
        return ['data' => $dt];
    }
    function Select($id){
        return json_encode(DB::select('SELECT * FROM customer WHERE Cus_Id=?',[$id])[0]);
    }
    function update(Request $request){
        
        DB::update('UPDATE customer SET 
                                        F_Name = ?,
                                        L_Name = ?,
                                        M_Name = ?,
                                        Contact_No = ?,
                                        Address = ?,
                                        Company = ?,
                                        TIN_no = ?,
                                        OSCA_PWD_ID = ?
                                    WHERE Cus_ID = ?;'
                    ,[        
                        $request->input('F_Name'),
                        $request->input('L_Name'),
                        $request->input('M_Name'),
                        $request->input('Contact_No'),
                        $request->input('Address'),
                        $request->input('Company'),
                        $request->input('TIN_no'),
                        $request->input('OSCA_PWD_ID'),
                        $request->input('id')
                    ]);
        return back();
    }

    function Delete(Request $request){
        DB::update('UPDATE customer SET Cus_Archived = 1 WHERE Cus_ID = ?',[$request->input('id')]);
        return $request->input('id');
    }
}
