<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        dd('index');
    }

    public function store(Request $request)
    {
        dd('store');
    }
}
