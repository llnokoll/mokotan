<?php

namespace App\Http\Component;

class Exfunction 
{
  public function post_message($message)
  {

    $data = array("message" => $message);
    $data = http_build_query($data, "", "&");

    $options = array(
      'http'=>array(
        'method'=>'POST',
        'header'=>"Authorization: Bearer " . config('const.LINE_API_TOKEN') . "\r\n"
          . "Content-Type: application/x-www-form-urlencoded\r\n"
          . "Content-Length: ".strlen($data)  . "\r\n" ,
          'content' => $data
        )
    );
    $context = stream_context_create($options);
    $resultJson = file_get_contents(config('const.LINE_API_URL'),FALSE,$context);
    $resutlArray = json_decode($resultJson,TRUE);
    if( $resutlArray['status'] != 200)  {
        return false;
    }
    return true;
  }
}
