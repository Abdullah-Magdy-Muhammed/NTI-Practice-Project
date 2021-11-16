<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stdResource;
use Validator;

class studentController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = stdResource::select('Students.id','Students.name','Students.email','Students.created_at as RegisterTime')->join('departments','departments.id','=','students.dep_id')->get();
        return response()->json(['data'=>$data],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $validate = Validator::make($request->all(),[
                "name"     => "required|min:6",
                "email"    => "required|email",
                "password" => "required|min:6|max:10",
                "dep_id"   => "required" 
            ]);
            if($validate->fails()){
                return response()->json(['errors'=>$validate->errors()],400);
            }else {
                $op = stdResource::create(['name'=>$request->name,'password'=>bcrypt($request->password),'email'=>$request->email,'dep_id'=>$request->dep_id]);
                if($op) {
                    $message =  "data added";
                } else {
                    $message = "Error Try Again";
                }
                return response()->json(['data'=>$message],200);
            }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = stdResource::select('Students.id','Students.name','Students.email','Students.created_at as RegisterTime')->join('departments','departments.id','=','students.dep_id')->where('students.id',$id)->get();
        return response()->json(['data'=>$data],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $validate = Validator::make($request->all(),[
            "name"     => "required|min:6",
            "email"    => "required|email",
            "dep_id"   => "required" 
        ]);
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],400);
        }else {
            $op = stdResource::where('students.id',$id)->update(['name'=>$request->name,'email'=>$request->email,'dep_id'=>$request->dep_id]);
            if($op) {
                $message =  "data updated";
            } else {
                $message = "Error Try Again";
            }
            return response()->json(['data'=>$message],200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $op = stdResource::where('students.id',$id)->delete();
        if($op) {
            $message =  "data Deleted";
        } else {
            $message = "Error Try Again";
        }
        return response()->json(['data'=>$message],200);
    
    }
}
