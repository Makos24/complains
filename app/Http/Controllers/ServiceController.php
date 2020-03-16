<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index');
    }

    public function types()
    {
        return view('services.types');
    }

    public function options()
    {
        return view('services.options');
    }
}
