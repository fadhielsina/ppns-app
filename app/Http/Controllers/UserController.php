<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<br>";
        echo "<a href='logout'>Logout >> </a>";
    }
}
