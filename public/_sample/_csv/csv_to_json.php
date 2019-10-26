<?php
setlocale(LC_ALL, 'ja_JP.UTF-8');

//ファイル
$file = './11saitam.csv';

//ファイルゲットして、文字コード変更
$data = file_get_contents($file);
$data = mb_convert_encoding($data, 'UTF-8', 'sjis-win');

//csvデーターを連想配列に変更
$data = to_array_from_csv($data);
$data = to_array_fron_arry($data);

//連想配列データーから余分な行や列を削除
$data = key_check_from_arrey($data);
$data = gyou_check_form_array($data);

//改行を<br>へ変更
$data = to_br_form_n($data);

//配列をjsonに変換
echo json_encode($data);

//-------------------- functions ------------------


//CSVを配列に変換-------------
function to_array_from_csv($data){
  $lines = explode("\r\n", $data);
  foreach ($lines as $line) {
    $records[] = str_getcsv($line);
  }
  return $records;
}


//連想配列に変換-------------
function to_array_fron_arry($data){
  $isFirst = true;
  foreach($data as $line) {
    if ($isFirst) { // タイトル行を取得
      $keyData = $line;
      $isFirst = false;
    } else {//連想配列に変換
      $_saveData = array();
      foreach($line as $key => $val){
        $_saveData[$keyData[$key]] = $val;
      }
      $records[] = $_saveData;
    }
  }
  return $records;
}

//keyが空白の列を削除-------------
function key_check_from_arrey($data){
  foreach($data as $line){
    $_saveData = array();
    foreach($line as $key => $val ){
      if($key){
        $_saveData[$key] = $val;
      }
    }
    $records[] = $_saveData;
  }
  return $records;
}

//空白しかない行を削除-------------
function gyou_check_form_array($data){
  foreach($data as $key => $val ){
    $_judge = array_filter($val);
    if(!empty($_judge)){
      $records[] = $val;
    }
  }
  return $records;
}

//改行コードに改行追加
function to_br_form_n($data){

  foreach($data as $line ){
    $_saveData = array();
    foreach($line as $key => $val ){

      $key = nl2br($key);
      $key = str_replace(array("\r\n", "\r", "\n"), '', $key);

      $val = nl2br($val);
      $val = str_replace(array("\r\n", "\r", "\n"), '', $val);

      $_saveData[$key] = $val;
    }
    $records[] = $_saveData;
  }
  return $records;
}


?>