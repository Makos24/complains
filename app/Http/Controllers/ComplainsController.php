<?php

namespace App\Http\Controllers;

use App\Complain;
use Illuminate\Http\Request;

class ComplainsController extends Controller
{
    public function index()
    {
        return view('complains.index');
    }

    public function pending()
    {
        return view('complains.pending');
    }

    public function resolved()
    {
        return view('complains.resolved');
    }

    public function print(Complain $complain)
    {
        return view('complains.print', compact('complain'));
    }
}
