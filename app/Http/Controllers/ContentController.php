<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;

class ContentController extends Controller
{
  public function feature()
  {
    //Use Eloquent (Can use relation model but eat more resource)
    $categories = Category::where('parent_id',16)->orderBy('order')->get();
    $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')
      ->select('posts.*', 'categories.parent_id')
      ->where('categories.parent_id',16)
      ->get();

    return view('content.feature',compact('categories','posts'));
  }
  public function pr()
  {
    //Use Eloquent (Can use relation model but eat more resource)
    $categories = Category::where('parent_id',16)->orderBy('order')->get();
    $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')
      ->select('posts.*', 'categories.parent_id')
      ->where('categories.parent_id',17)
      ->get();
    return view('content.pr',compact('categories','posts'));
  }
  public function review()
  {
    //Use Eloquent (Can use relation model but eat more resource)
    $categories = Category::where('parent_id',16)->orderBy('order')->get();
    $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')
      ->select('posts.*', 'categories.parent_id')
      ->where('categories.parent_id',18)
      ->get();
    return view('content.review',compact('categories','posts'));
  }
}
