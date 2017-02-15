<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
  public function feature()
  {
    //Use Eloquent (Can use relation model but eat more resource)
    $categories = Category::where('parent_id',16)->orderBy('order')->get();
    $posts = Post::join('categories', 'posts.category_id', '=', 'categories.id')
      ->select('posts.*', 'categories.parent_id')
      ->where('categories.parent_id',16)->where('status','PUBLISHED')
      ->get();

    return view('content.feature',compact('categories','posts'));
  }
  public function pr()
  {
    //Use Eloquent (Can use relation model but eat more resource)
    $categories = Category::where('parent_id',17)->orderBy('order')->get();
    $posts = Post::where('category_id',17)->where('status','PUBLISHED')->get();
    return view('content.pr',compact('categories','posts'));
  }
  public function review()
  {
    //Use Eloquent (Can use relation model but eat more resource)
    $categories = Category::where('parent_id',18)->orderBy('order')->get();
    $posts = Post::where('category_id',18)->where('status','PUBLISHED')->get();
    return view('content.review',compact('categories','posts'));
  }
  public function show($id)
  {
    //Use Eloquent (Can use relation model but eat more resource)
    $post = Post::where('id',$id)->where('status','PUBLISHED')->get();
    DB::table('posts')->where('id',$id)->increment('pageview');

    //gallery of this post
    $gallery_model = app("TCG\Voyager\Models\Gallery");
    $galleries = $gallery_model->where('post_id',$id)->orderBy('id','desc')->get();

    if (count($post) >= 1) {
      $post = $post[0];

      //related post with same category
      $related_posts = Post::where('category_id',$post->category_id)->where('status','PUBLISHED')->get();

      //ads
      $ads_model = app("TCG\Voyager\Models\Ads");
      $ads = $ads_model->inRandomOrder()->get();
      if (count($ads) >= 1) {
        $ads = $ads[0];
        return view('content.show',compact('post','related_posts','galleries','ads'));
      }
      else return view('content.show',compact('post','related_posts','galleries'));
    }
    else return view('errors.404');
  }
}
