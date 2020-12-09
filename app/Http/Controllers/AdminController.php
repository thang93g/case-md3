<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showHomeAdmin()
    {
        return view('back-end.home');
    }
}
