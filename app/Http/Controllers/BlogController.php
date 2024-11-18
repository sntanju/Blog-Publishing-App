<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::paginate(10);
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }    

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $blog = new Blog;
        
        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $file_name);
            $blog->image = $file_name;
        }
            
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->user_id = auth()->id(); 

        $blog->save();
        return redirect()->route('home')->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        Gate::authorize('update', $blog);
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        Gate::authorize('update', $blog);
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $blog->update($request->only('title', 'content'));
        return redirect()->route('home')->with('success', 'Blog updated successfully.');
    }

    public function vote(Request $request, Blog $blog)
    {
        $request->validate([
            'upvote' => 'required|boolean',
        ]);

        $existingVote = $blog->votes()->where('user_id', auth()->id())->first();

        if ($existingVote) {
            if ($existingVote->upvote == $request->upvote) {
               
                $existingVote->delete();
                $newVoteState = 'none'; 
            } else {
                
                $existingVote->update(['upvote' => $request->upvote]);
                $newVoteState = $request->upvote ? 'upvote' : 'downvote'; 
            }
        } else {
           
            $blog->votes()->create([
                'user_id' => auth()->id(),
                'upvote' => $request->upvote,
            ]);
            $newVoteState = $request->upvote ? 'upvote' : 'downvote'; 
        }
        return back();
    }


    public function destroy(Blog $blog)
    {
        Gate::authorize('delete', $blog);
        $blog->delete();

        return redirect()->route('home')->with('success', 'Blog deleted successfully.');
    }
}