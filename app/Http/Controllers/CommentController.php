<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function containerComment($id) {

        $comment = Comment::where('id', $id);
        $announcement = Announcement::findOrFail($id);

        return view('comment.comment', ['comment' => $comment, 'announcement' => $announcement]);
    }
    public function addComment(Request $request,$id) {

        dd($request->content);

        $user = Auth::user();

        $newComment = new Comment;
        $newComment->content = $request->content;
        $newComment->user_id = $user->id;
        $newComment->announcement_id = $id;
        $newComment->save();

        return redirect()->back();

    }
}
