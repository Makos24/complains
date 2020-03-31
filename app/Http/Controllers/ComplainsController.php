<?php

namespace App\Http\Controllers;

use App\Account;
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

    public function today()
    {
        return view('complains.today');
    }

    public function print(Complain $complain)
    {
        $account = Account::first();
        return view('complains.print', compact('complain','account'));
    }
}
