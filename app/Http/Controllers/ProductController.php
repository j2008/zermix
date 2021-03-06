<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\video;
use Illuminate\Support\Facades\DB;
use LaravelQRCode\Facades\QRCode;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$posts = Post::whereNotNull('category_id')->orderBy('id', 'desc')->take(10)->get();

      //Use Query Builder
      $posts = DB::table('posts')
           ->join('categories', 'posts.category_id', '=', 'categories.id')
           ->select('posts.*', 'categories.parent_id')
           ->where('categories.parent_id',3)->where('status','PUBLISHED')->orderBy('posts.order','ASC')
           ->get();

      $categories = Category::where('parent_id','3')->get();
      return view('product.index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('product.show',compact('post'));
    }

    public function showProduct($slug)
    {
        //Use Eloquent (Can use relation model but eat more resource)
        $post = Post::where('slug',$slug)->where('status','PUBLISHED')->get();

        //gallery of this post
        $gallery_model = app("TCG\Voyager\Models\Gallery");

        if (count($post) >= 1) {
          $post = $post[0];

          DB::table('posts')->where('id',$post->id)->increment('pageview');
          $galleries = $gallery_model->where('post_id',$post->id)->orderBy('id','desc')->get();

          $product_cats = array(3, 4, 5, 6);
          if( in_array($post->category_id, $product_cats) ) {
            $is_product = true;
          } else {
            $is_product = false;
          }

          if( $is_product ) {
            //related product post with all product category
            $related_posts = Post::whereIn('category_id', $product_cats )->where('status','PUBLISHED')->get();
          } else {
            //related content post with same category
            $related_posts = Post::where('category_id',$post->category_id)->where('status','PUBLISHED')->get();
          }

          // QR CODE
          if (!file_exists(storage_path('app/public/qr_code/').$slug.'.png')) {
            QRCode::text('http://www.zermix.com/product/'.$slug)->setSize(10)->setOutfile(storage_path('app/public/qr_code/').$slug.'.png')->png();
          }  
          $qr_path = '/storage/qr_code/'.$slug.'.png';

          //video
          $videos = Video::where('page','PRODUCT')->where('post_id',$post->id)->where('active',1)->get();

          //ads
          $ads_model = app("TCG\Voyager\Models\ads");
          $ads = $ads_model->inRandomOrder()->get();
          if (count($ads) >= 1) {
            $ads = $ads[0];
            return view('content.show',compact('post','related_posts','galleries','ads','is_product','videos','qr_path'));
          }
          else return view('content.show',compact('post','related_posts','galleries','is_product','videos','qr_path'));
        }
        else return view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
