<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPpns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $data['jumlah_ppns'] = DataPpns::all()->count();
        return view('admin/dashboard', compact('data'));
    }
}
