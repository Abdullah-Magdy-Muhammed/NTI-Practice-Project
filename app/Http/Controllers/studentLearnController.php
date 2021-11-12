<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentLearnController extends Controller
{  /*
    public function message() {
        echo 'mesage from controller';
    }
*/
    public function createView() {
        return view('create');
    }

   public function store(Request $request) {
       // dd($request);
       // echo $request->name;
       // echo($request->method());
       // dd($request->ismethod('get'));
       // dd($request->except(['_token','name']));
       //  dd($request->only(['email']));

   

    $name = $request->name;
    $email = $request->email;

    $errors = [];
    if(empty($name)) {
        $errors['Name'] = "field required";
    }
    if(empty($email)) {
        $errors['Email'] = "field required";
    }
    if (count($errors) > 0 ) {
        foreach($errors as $key => $value) {
            echo '*'.$key.' : '.$value;
        }
    } else {

        //session()->put('name',$request->name);

        session()->flash('UserData',$request->except(['_token']));

        //return view('StudentProfile',['data' => $request->except(['_token'])]);

        return redirect(url('/Profile'));
    }
    }

   /*public function StudentProfile() {
        //$stdData = ['root','root@gmail.com',3.14];
        //return view('StudentProfile',['data'=>$stdData]);
        //return view('StudentProfile')->with('data',$stdData);
        //return view('StudentProfile',compact('stdData'));
    }*/
}
