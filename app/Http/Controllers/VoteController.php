<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(Request $request, $postId)
    {
         $request->validate([
            'vote' => 'required|in:up,down',
        ]);

        $user = $request->user();
        $vote = Vote::updateOrCreate(
            ['user_id' => $user->id, 'post_id' => $postId],
            ['vote' => $request->vote]
        );

        return back();
    }

    public function destroy(Request $request, $postId)
    {
        $user = $request->user();
        $vote = Vote::where('user_id', $user->id)
            ->where('post_id', $postId)
            ->first();

        if (!$vote) {
            return response()->json([
                'message' => 'Vote not found',
            ], 404);
        }

        $vote->delete();

        return response()->json([
            'message' => 'Vote deleted',
        ]);
    }
}
