<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    function test(){
        // GET USER WITH ID 1 FROM DATABASE
        $user = User::find(1);
        // SHOW DATA
        // var_dump($user);

        // SENDING USER REGISTER TO welcome VIEW
        return view('welcome',['user' => $user]);
    }
}
