<?php
////var_dump($_POST);
////print_r($_POST);
//
//// Создаем поток
//$data = [
//  'secret' => "6Lc_lrgUAAAAAMrepDB6Db8JvN6AQD_IZAdqpe7t",
//  'response' => $_POST['token']
//];
//$opts = array(
//  'http'=>array(
//    'method'=>"POST",
//      "Access-Control-Allow-Origin: *\r\n".
//    'content' => $data
//  )
//);
//
//$context = stream_context_create($opts);
//
////var_dump($opts);
////var_dump($context);
//
//// Открываем файл с помощью установленных выше HTTP-заголовков
//$file = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
//
////echo json_encode($file);
//echo $file;

function http_post ($url, $data)
{
  $data_url = http_build_query ($data);
  $data_len = strlen ($data_url);

  return array ('content'=>file_get_contents ($url, false, stream_context_create (array ('http'=>array ('method'=>'POST'
  , 'header'=>"Connection: close\r\nContent-Length: $data_len\r\n"
  , 'content'=>$data_url
  ))))
  , 'headers'=>$http_response_header
  );
}

$data = [
  'secret' => "6Lc_lrgUAAAAAMrepDB6Db8JvN6AQD_IZAdqpe7t",
  'response' => $_REQUEST['response']
];
//var_dump($_REQUEST);
echo json_encode(http_post('https://www.google.com/recaptcha/api/siteverify', $data));