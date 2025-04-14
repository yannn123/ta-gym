<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pulldayController extends Controller
{
    public function pullDay()
    {
        return view('pull-day');
    }
}
