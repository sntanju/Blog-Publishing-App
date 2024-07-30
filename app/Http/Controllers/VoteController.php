<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function vote(Request $request, Blog $blog)
    {
        $request->validate(['upvote' => 'required|boolean']);

        $vote = Vote::updateOrCreate(
            ['user_id' => auth()->id(), 'blog_id' => $blog->id],
            ['upvote' => $request->upvote]
        );

        return redirect()->route('blogs.index')->with('success', 'Vote recorded.');
    }
}
