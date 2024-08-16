<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Add logic to fetch data, if needed
        return view('dashboard.create');
    }

    public function create()
    {
        // Add logic to fetch data, if needed
        return view('dashboard.create');
    }
    

    public function show()
    {
        // Add logic to fetch data, if needed
        //return view('dashboard.show');
    }

    public function edit()
    {
        // Add logic to fetch data, if needed
        return view('dashboard.edit');
    }
}
