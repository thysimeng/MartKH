<?php

namespace App\Http\Controllers\UsersController\temp;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class testController extends Controller
{
    public function index (){
        return view('users.temp.test');
    }
}
