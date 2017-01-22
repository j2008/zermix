<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContentController extends Controller
{
  public function feature()
  {
    return view('content.feature',compact(0));
  }
  public function pr()
  {
    return view('content.pr',compact(0));
  }
  public function review()
  {
    return view('content.review',compact(0));
  }
}
