<?php

namespace App\Http\Controllers;

// TODO
// use Illuminate\Http\Request;

use Request;
use Carbon\Carbon;
use App\Model\weight;
use Illuminate\Support\Facades\DB;
use App\Http\Component\Exfunction;
use App\Http\Component;

class WeightInputController extends Controller
{
  public function weightinput($uid)
  {
    // Get date that input weight data of user
    $today = Carbon::now()->today()->format('Y/m/d');
    // $tblPersonal = DB::table('personal');

    // Get uid
    $accessUserData = DB::table('personal')->where('uri', $uid)->first();
    $rivalUserData  = DB::table('personal')->where('id', $accessUserData->rival_id)->first();

    // Get a weights list of login user
    $weightdate = DB::table('weights')->distinct()->pluck('date');
    $weightFirstUser = DB::table('weights AS w1')
                     ->where('w1.id', $accessUserData->id)
                     ->select('date', 'w1.weight')
                     ->get();
    $weightSecondUser = DB::table('weights AS w1')
                      ->where('w1.id', $accessUserData->rival_id)
                      ->select('date', 'w1.weight AS weight2')
                     ->get();

    // Modify Associative array
    $result = array();
    $i = 0;
    foreach ( $weightdate as $datekey ){
      $resultCheck = $weightFirstUser->contains('date','=',$datekey);
      if($resultCheck == 'true') {
        $result[$i] = array(
          'date'=>$datekey
        );
      }
      $i++;
    }
    var_dump($result);

    $weightlist = weight::where('id', $accessUserData->id)->orderBy('date', 'ASC')->get();
    $weightlistJson = json_encode($weightlist);
    $weightlist_rival = weight::where('id', $rivalUserData->id)->orderBy('date', 'ASC')->get();
    $weightlist_rivalJson = json_encode($weightlist_rival);

Request::session()->put('sUid',$uid);

    // return view('weightinput.index', compact('today','weightlist','weightlist_rival'));
    return view('weightinput.index')->with([
      "today" => $today,
      "weightlist" => $weightlist,
      "weightlistJson" => $weightlistJson,
      "weightlist_rival" => $weightlist_rival,
      "accessUserData" => $accessUserData,
      "rivalUserData" => $rivalUserData,
      ]);

  }

  public function weightoutput()
  {
    //test
    $weight = Request::input('weight');
    $date = Request::input('date');
    $fatper = Request::input('fatper');
    $comment = Request::input('comment');
    $id = Request::input('id');
    $rival_id = Request::input('rival_id');
    $savedata = weight::find(1);
    $savedata = weight::where('date', $date)
                        ->where('id', $id)
                        ->first();
    if (!empty($savedata)) {
      weight::where('date', $date)
                ->where('id', $id)
                ->update(['weight' => $weight, 'fatper' => $fatper, 'comment' => $comment]);
    }
    else {
      $savedata = new weight;
      $savedata->id = $id ;
      $savedata->date = $date;
      $savedata->weight = $weight;
      $savedata->fatper = $fatper;
      $savedata->comment = $comment;

    }

    // Get uname
    $accessUserData = DB::table('personal')->where('id', $savedata->id)->first();

    $savedata->save();

    // send messages to line
    $wic = new Exfunction();
    $wic->post_message("
       name:$accessUserData->name
       date:$savedata->date
       weight:$savedata->weight
       fatper:$savedata->fatper
       comment:$savedata->comment"
       );

    $weightlist = weight::where('id', $id)->orderBy('date', 'ASC')->get();
    $weightlist_rival = weight::where('id', $rival_id)->orderBy('date', 'ASC')->get();

$sUid = Request::session()->get('sUid');
return redirect("weight/$sUid/input");
//  return redirect()->action('WeightInputController@weightinput');

  }
}
