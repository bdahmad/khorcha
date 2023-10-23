<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecycleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
}
