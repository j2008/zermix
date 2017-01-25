<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;

class StoreController extends Controller
{
  public function index()
  {
    return view('store.index');
  }
  public function show($location)
  {
    if($location == "bangkok") {
      $posts = Post::where('category_id',12)->get();
    }
    else $posts = Post::where('slug',$location)->get();
    return view('store.show',compact('posts'));
  }
}
