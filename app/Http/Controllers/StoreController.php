<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
  public function index()
  {
    return view('store.index');
  }
  public function show($location)
  {
    return view('store.show');
  }
}
