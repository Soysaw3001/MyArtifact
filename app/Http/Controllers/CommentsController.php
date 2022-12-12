<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    /**
     * バリデーション、登録データの整形など
     */
    public function Store(CommentRequest $request)
    {
        $savedata = [
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment,
        ];
 
        $comment = new Comment;
        $comment->fill($savedata)->save();
 
        return redirect('/posts/' . $comment->post_id);
    }
}
