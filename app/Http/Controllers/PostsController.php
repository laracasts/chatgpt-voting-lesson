<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::withCount('votes')->get();

        foreach ($posts as $post) {
            $userVote = null;

            if (Auth::check()) {
                $userVote = $post->votes()
                    ->where('user_id', Auth::id())
                    ->value('vote'); // up, down
            }

            $post->userVote = $userVote;
        }

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        $votes = $post->votes;
        $post->upvotes_count = $votes->where('vote', 'up')->count();
        $post->downvotes_count = $votes->where('vote', 'down')->count();

        if (Auth::check()) {
            $userVote = $post->votes()
                ->where('user_id', Auth::id())
                ->value('vote'); // up, down

            $post->userVote = $userVote;
        }

        return view('posts.show', [
            'post' => $post
        ]);
    }
}
