<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
  public function hello()
  {
    //test
    return view('hello.index');
  }
}
