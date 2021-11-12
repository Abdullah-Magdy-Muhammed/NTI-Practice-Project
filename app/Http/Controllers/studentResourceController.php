<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\stdResource;

use App\Models\department;


class studentResourceController extends Controller
{

    public function __construct() {
        $this->middleware('studentResourceCheck',['except'=>['login','dologin']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = stdResource::orderby('id','desc')->paginate(5);
        return view('ResourceStd.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dep_data = department::get();
        // return view of insert page
        return view('ResourceStd.create',['data'=>$dep_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // insert data into database table
        $data = $this->validate($request,[
            "name"     => "required|min:6",
            "email"    => "required|email",
            "password" => "required|min:6|max:10",
            "dep_id"   => "required" 
    ]);

        $data['password'] = bcrypt($data['password']);
        $op = stdResource :: create($data);
        if($op) {
            $message = 'Data Inserted';
        } else {
            $message = 'Error please try again';
        }
        session()->flash('message',$message);

        return redirect(url('/Users'));
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
        $data = stdResource::findorfail($id);      
        return view('ResourceStd.edit',['data' => $data]);   
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
        $data = $this->validate($request,[
            "name" => "required|min:6",
            "email" => "required|email",
    ]);

   $op = stdResource :: where('id',$id)->update($data);
   if($op) {
        $message = 'Data Updated';
    } else {
        $message = 'Error please try again';
    }
    session()->flash('message',$message);

    return redirect(url('/Users')); 
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
        $op = stdResource::where('id',$id)->delete();
        if($op) {
            $message = 'Deleted';
        } else {
            $message = 'Error please try again';
        }
        session()->flash('message',$message);

        return redirect(url('/Users'));
    }

    public function login() {
        return view('ResourceStd.login');
    }
    public function dologin(Request $request) {
        // logic of login 
        $data = $this->validate($request,[
            "email" => "required|email",
            "password" => "required|min:6"
    ]);

    $status = false;
    if($request->has('R_me')) {
        $status = true;
    }

      if(auth()->guard('student')->attempt($data,$status)) {
          return redirect(url('/Users'));
      }else {
           session()->flash('message','Error');
           return redirect(url('/Student/login'));
      }
    }

    public function logout() {
        auth()->guard('student')->logout();
        return redirect(url('/Student/login'));
    }
}
