<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        return view('blogs.index', ['blogs' => $blogs]);
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function show(Blog $blog)
    {
       
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Create a new instance of Blog model
        $blog = new Blog;
        
        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $file_name);
            $blog->image = $file_name;
        }
            

        // Assign the validated data to the Blog model
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = auth()->id(); 

        // Save the blog post to the database
        $blog->save();

        // Redirect to the blogs index with a success message
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        //$this->authorize('update', $blog);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        //$this->authorize('update', $blog);
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $blog->update($request->only('title', 'content'));
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        //$this->authorize('delete', $blog);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
