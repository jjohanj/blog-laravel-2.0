<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Categories;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function index()
    {
      $categories = Categories::orderBy('id', 'desc')
      ->get();
      $posts = Post::orderBy('id', 'desc')
      ->get();
      return view('posts.index', compact('posts', 'categories'));
    }

    public function create()
    {
      $categories = Categories::orderBy('id', 'desc')
      ->get();
      return view('posts.create', compact('categories'));
    }

    public function store()
    {
      //validation
      $this->validate(request(), [
        'title' => 'required|max:20',
        'body' => 'required'
      ]);
      //short version: Post::create(request(['title', 'body', 'category']));
      // create a new post using the request data
      $post = new Post;
      $post->controlcomments = request('comments');
      $post->title = request('title');
      $post->body = request('body');
      $post->category = request ('category');
      // save it to the database
      $post->save();
      //and then redirect to the main page
      return redirect('/');
    }

    public function show($id)
    {
      $posts = Post::find($id);
      return view('posts.show', compact('posts'));
    }

    public function sortReports($category)
    {
      $posts = Post::where('category', $category)
      ->orderBy('id', 'desc')
      ->get();
      return view('posts.reports', compact('posts'));
    }

    public function sortResults()
    {
      $posts = Post::where('category', 'result')
      ->orderBy('id', 'desc')
      ->get();
      return view('posts.results', compact('posts'));
    }


}
