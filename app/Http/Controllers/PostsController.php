<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Categories;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsController extends Controller
{

    public function __construct (){
      $this->middleware('auth')->except(['index', 'show', 'sortReports', 'search', 'sortDate']);
    }

    public function index()
    {
      $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year', 'month')
      ->orderBy('created_at', 'desc')
      ->get();

      $categories = Categories::orderBy('id', 'desc')
      ->get();
      $posts = Post::orderBy('id', 'desc')
      ->get();
      return view('posts.index', compact('posts', 'categories', 'archives'));
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
      $categories = Categories::orderBy('id', 'desc')
      ->get();
      $posts = Post::find($id);
      return view('posts.show', compact('posts', 'categories'));
    }

    public function sortReports($category)
    {
      $posts = Post::where('category', $category)
      ->orderBy('id', 'desc')
      ->get();
      return view('posts.reports', compact('posts'));
    }

      public function sortDate($category)
      {
        $month_number = date("n",strtotime($category));


        $posts = Post::whereMonth('created_at', $month_number)
        ->orderBy('id', 'desc')
        ->get();
        return view('posts.reports', compact('posts'));
      }



    public function createCategory(){
        $category = new Categories;
        $category->category = request('addcategory');
        $category->save();
        return back();
    }

    public function search(Request $request) {
      $archives = Post::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
      ->groupBy('year', 'month')
      ->orderBy('created_at', 'desc')
      ->get();

      $categories = Categories::orderBy('id', 'desc')
      ->get();
      $type = $request->searchfield;

      $search = $request->search;
      $posts = Post::where('body', 'LIKE', '%' . $search . '%')
      ->orwhere ('title', 'LIKE', '%' . $search . '%')
      ->orwhere ('category', 'LIKE', '%' . $search . '%')
      ->orderBy('id', 'desc')
      ->get();

      return view('posts.index', compact('posts', 'categories', 'archives'));
    }

    public function update(Request $request){
        $id = $request->id;
        $value = $request->value;
        $comment = Post::find($id);
        $comment->controlcomments = $value;
        $comment->save();
        return back();
    }

    public function edit(Request $request){
        $id = $request->id;
        $body = $request->body;
        $title = $request->title;
        $category = $request->category;
        $posts = Post::find($id);
        $posts->body = $body;
        $posts->title = $title;
        $posts->category = $category;
        $posts->save();
        return back();
    }




}
