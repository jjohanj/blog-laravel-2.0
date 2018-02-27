<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{

      public function store(Post $post)
      {
        $this->validate(request(), [
        'body' => 'required'
        ]);

        $post->addComment(request('body'));

        return back();
      }

      public function comments()
      {
        $comments = Comment::orderBy('id', 'desc')
        ->get();
        return view('admin-comments', compact('comments'));
      }

      public function articles()
      {
        $posts = Post::orderBy('id', 'desc')
        ->get();
        return view('admin-articles', compact('posts'));
      }

      public function delete(Request $request){
          $id = $request->id;
          Comment::destroy($id);
          return back();
      }

      public function update(Request $request){
          $id = $request->id;
          $value = $request->value;
          $comment = Post::find($id);
          $comment->controlcomments = $value;
          $comment->save();
          return back();
      }






}
