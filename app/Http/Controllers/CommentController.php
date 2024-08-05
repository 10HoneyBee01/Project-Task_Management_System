<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $taskId)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        $task = Task::findOrFail($taskId);

        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::id();
        $comment->task_id = $task->id;
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);

        // Ensure the user deleting the comment is the owner or authorized in another way
        if (Auth::check() && Auth::id() === $comment->user_id) {
            $comment->delete();
            return redirect()->back()->with('success', 'Comment deleted successfully.');
        }

        return redirect()->back()->with('error', 'Unauthorized.');
    }
}