<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\student;

class studentController extends Controller
{
    public function __construct() {
        $this->middleware('studentCheck',['except'=>['login','dologin']]);
    }

    public function index() {
        $data = student::get();
        return view('student.display',['data'=>$data]) ;
    }

    public function create() {
        return view('student\create');
    }

    public function store(Request $request) {
    $data = $this->validate($request,[
                "name" => "required|min:6",
                "email" => "required|email",
                "password" => "required|min:6|max:10"
        ]);

        $data['password'] = bcrypt($data['password']);
        $op = student :: create($data);
        if($op) {
            $message = 'Data Inserted';
        } else {
            $message = 'Error please try again';
        }
        session()->flash('message',$message);

        return redirect(url('/Student'));
    
    }

    public function edit($id) {
        $data = student::findorfail($id);      
        return view('student.edit',['data' => $data]);
    }

    public function update(Request $request,$id) {
        $data = $this->validate($request,[
                    "name" => "required|min:6",
                    "email" => "required|email",
            ]);
    
            $data['password'] = bcrypt($data['password']);
           $op = student :: where('id',$id)->update($data);
           if($op) {
                $message = 'Data Updated';
            } else {
                $message = 'Error please try again';
            }
            session()->flash('message',$message);
    
            return redirect(url('/Student')); 
        
        }

    public function delete($id) {
        $op = student::where('id',$id)->delete();
        if($op) {
            $message = 'Deleted';
        } else {
            $message = 'Error please try again';
        }
        session()->flash('message',$message);

        return redirect(url('/Student'));
    }

    public function login() {
        return view('student.login');
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

      if(auth()->attempt($data,$status)) {
          return redirect(url('/Student'));
      }else {
           session()->flash('message','Error');
           return redirect(url('/login'));
      }
    }

    public function logout() {
        auth()->logout();
        return redirect(url('/login'));
    }
}
