<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pushdayController extends Controller
{
    public function index()
    {
        return view('push-day');
    }
}
