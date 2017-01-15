<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Page;

class AboutController extends Controller
{
  public function index()
  {
    $page = Page::all()[0];
    return view('about.index',compact('page'));
  }
}
