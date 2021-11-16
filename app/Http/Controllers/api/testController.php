<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function message() {
        return response()->json(['data'=>'message from apis ya boda'],200);
    }
}
