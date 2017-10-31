<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    public function index()
    {
        return view('start');
    }

    public function registshow()
    {
        return view('registr');
    }

    public function admin()
    {
        return view('panel');
    }
}
