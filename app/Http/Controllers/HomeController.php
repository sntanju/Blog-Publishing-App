<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all posts
        // $blogs = Blog::all();

        // // Return the view with posts data
        // return view('home', compact('blogs'));
        // //return view('welcome');

        $blogs = Blog::paginate(9);
        return view('home', compact('blogs'));
        
    }
}
