<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
      $posts = Post::orderBy('id', 'desc')->get();
      return view('posts.index', compact('posts'));
    }

    public function create()
    {
      return view('posts.create');
    }

    public function store()
    {
      //validation
      $this->validate(request(), [
        'title' => 'required|max:20',
        'body' => 'required'
      ]);
      //short version: Post::create(request(['title', 'body']));
      // create a new post using the request data
      $post = new Post;
      $post->title = request('title');
      $post->body = request('body');
      // save it to the database
      $post->save();
      //and then redirect to the main page
      return redirect('/');

    }

}
