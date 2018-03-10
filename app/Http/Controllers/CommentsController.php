<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;

class CommentsController extends Controller
{

  public function store2(Post $post){

  $post = new Comment;
  $post->body = request('body');
  $post->user = request('user');
  $post->post_id = request('post_id');
  // save it to the database
  $post->save();

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

      public function color(Request $request){
          $id = $request->id;
          $value = $request->color;
          $style = User::find($id);
          $style->color = $value;
          $style->save();
          return back();
      }






}
