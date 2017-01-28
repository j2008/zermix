<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactUs;
use App\Http\CustomClass\mailDetail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
  public function index()
  {
    return view('contact.index');
  }

  public function ship(Request $request)
  {
    $detail = new mailDetail;
    $detail->title = $request->input('title');
    $detail->email_reply = $request->input('email_reply');
    $detail->text = $request->input('comment');

    //for test email view
    /* return view('contact.email',compact('detail')); */

    //real sending
    Mail::to("zermixofficial@gmail.com")->send(new ContactUs($detail));

    return redirect('contact')->with('status', 'Email Send success!');
  }
}
