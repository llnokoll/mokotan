<?php

namespace App\Http\Controllers;

// TODO
// use Illuminate\Http\Request;

use Request;
use Carbon\Carbon;

class WeightInputController extends Controller
{
  public function weightinput1()
  {
    // Get date that input weight data of user
    $today = Carbon::now()->today()->format('Y/m/d');

    // Get a weights list of login user
    // $weightlist = \App\Model\weight::all();
    $weightlist = \App\Model\weight::where('id', '1')->orderBy('date', 'ASC')->get();

    return view('weightinput1.index', compact('today','weightlist'));

  }

  public function weightinput2()
  {
    // Get date that input weight data of user
    $today = Carbon::now()->today()->format('Y/m/d');

    // Get a weights list of login user
    // $weightlist = \App\Model\weight::all();
    $weightlist = \App\Model\weight::where('id', '2')->orderBy('date', 'ASC')->get();

    return view('weightinput2.index', compact('today','weightlist'));

  }

  public function weightinput3()
  {
    // Get date that input weight data of user
    $today = Carbon::now()->today()->format('Y/m/d');

    // Get a weights list of login user
    $weightlist = \App\Model\weight::where('id', '3')->orderBy('date', 'ASC')->get();

    return view('weightinput3.index', compact('today','weightlist'));

  }

  public function weightoutput1()
  {
    //test
    $weight = Request::input('weight');
    $date = Request::input('date');
    $fatper = Request::input('fatper');
    $savedata = \App\Model\weight::updateOrCreate(
      ['date' => $date, 'id' => 1],
      ['weight' => $weight, 'fatper' => $fatper]
    );

    $savedata->save();

    $weightlist = \App\Model\weight::where('id', '1')->orderBy('date', 'ASC')->get();
  return redirect()->action('WeightInputController@weightinput1');

  }

  public function weightoutput2()
  {
    //test
    $weight = Request::input('weight');
    $date = Request::input('date');
    $fatper = Request::input('fatper');
    $savedata = \App\Model\weight::updateOrCreate(
      ['date' => $date, 'id' => 2],
      ['weight' => $weight, 'fatper' => $fatper]
    );

    $savedata->save();

    //$weightlist = \App\Model\weight::all();
    $weightlist = \App\Model\weight::where('id', '2')->orderBy('date', 'ASC')->get();
  return redirect()->action('WeightInputController@weightinput2');

  }

  public function weightoutput3()
  {
    //test
    $weight = Request::input('weight');
    $date = Request::input('date');
    $fatper = Request::input('fatper');
    $savedata = \App\Model\weight::updateOrCreate(
      ['date' => $date, 'id' => 3],
      ['weight' => $weight, 'fatper' => $fatper]
    );

    $savedata->save();

    $weightlist = \App\Model\weight::where('id', '3')->orderBy('date', 'ASC')->get();
  return redirect()->action('WeightInputController@weightinput3');

  }
}
