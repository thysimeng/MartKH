<?php

namespace App\Http\Controllers\UsersController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductDisplayController extends Controller
{
    public function index() {
        return view('users.productDisplay');
    }
}
