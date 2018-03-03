<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use ZipArchive;

use Zip;

#use ZipArchive;

class HelloController extends Controller
{
    //
  public function index()
  {
dd(date('Y/m/d H:i:s', filemtime("/var/www/mokotan")));
//dl('zip');
//dd(var_dump(extension_loaded('zip')));
//    dd(phpinfo());
//    new ZipArchive();

//dd(setlocale(LC_ALL, 0) . PHP_EOL);

touch('file.txt');
$zip_path  = "./test.zip";      // ZIP ファイルパス
$dest_dir1 = "./";          // 展開するディレクトリパス（その１）
$dest_dir2 = "/path/to/dir2";          // 展開するディレクトリパス（その２）

 
//$zip = new ZipArchive();
//$res = $zip->open($zip_path);
//if ($res === true) {
    // 圧縮ファイル内のすべてのファイルを解凍先に展開する場合
//    $zip->extractTo($dest_dir1);
 
//    $zip->close();
//dd("aa");
//}

$destination_path = ".";
$encodeCharset="UTF-8";
$decodeCharset="CP932";
 
$zip = new ZipArchive;

$zz = Zip::open("$zip_path");
$zz->extract($dest_dir1);


$zz->close();

exit();

if ($zip->open("$zip_path") === TRUE) {
  $index = 0;
  while($zip->statIndex($index)) {
//dd($zip->getNameIndex($index, ZipArchive::FL_ENC_RAW));
// $z = $zip->getNameIndex($index, ZipArchive::FL_ENC_RAW);
 $z = $zip->getNameIndex($index, ZipArchive::FL_UNCHANGED);
 $r = mb_convert_encoding($z, $encodeCharset, $decodeCharset);
dd($r);
    $zipEntry = $zip->statIndex($index);
//dd($zipEntry); 
   $zipEntryName = $zipEntry['name'];
    $destName = mb_convert_encoding($zipEntry['name'], $encodeCharset, $decodeCharset);
    echo $zipEntryName . "\n";
    echo $destName . "\n";
    $zip->renameName($zipEntryName, $destName);
    $zip->extractTo($destination_path, $destName);
    $zip->renameName($destName, $zipEntryName);
    $index++;
  }
  $zip->close();
}



    return view('hello.index');
  }

}
