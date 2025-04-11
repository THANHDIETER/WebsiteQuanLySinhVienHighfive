<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //git status
    public function index()
    {
        return view('admin.products.home');
    }
    
}
