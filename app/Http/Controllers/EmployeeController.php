<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\employee;
use Illuminate\view\view;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function EmployeeList(){
        return employee::all();
    }//end method
    function CreateEmployee(Request $request){
        try{
            $request->validate([
                'name'=>'required|string',
                'email'=>'required|unique:employees,email',
                'phone'=>'required|string'
            ]);
            $create = employee::create([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone')
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'Data created successful'
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status'=>'failed',
                'message'=>'Requiest failled'
            ]);
        }
    }//end method
    function UpdateEmployee(Request $request){
        employee::where('id',$request->input('id'))->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone')
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Data updated successful'
        ],200);
    }//end method
    function DeleteEmployee(Request $request){
        return employee::where('id',$request->input('id'))->delete();
    }//end method
    function EmployeeById(Request $request){
        return employee::where('id',$request->input('id'))->first();
    }//end method

    //page method
    function EmployeePage():view{
        return view('employee-page');
    }
}
