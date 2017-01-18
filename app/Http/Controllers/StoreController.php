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
    $post = Post::where('slug',$location)->get()[0];
    return view('store.show',compact('post'));
  }
}
