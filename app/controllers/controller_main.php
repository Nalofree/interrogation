<?php
class Controller_Main extends Controller
{
  function action_index()
  {
    $this->view->generate('main_view.php', 'template_view.php');
  }

  function action_get_form () {

    $ch = curl_init();

    curl_setopt_array($ch, [
      CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
      CURLOPT_POST => true,
      CURLOPT_POSTFIELDS => [
        'secret' => "6Lc_lrgUAAAAAMrepDB6Db8JvN6AQD_IZAdqpe7t",
        'response' => $_REQUEST['response'],
        'remoteip' => $_SERVER['REMOTE_ADDR']
      ],
      CURLOPT_RETURNTRANSFER => true
    ]);

    $output = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($output);

//    function http_post ($url, $data)
//    {
//      $data_url = http_build_query ($data);
//      $data_len = strlen ($data_url);
//
//      return array ('content'=>file_get_contents ($url, false, stream_context_create (array ('http'=>array ('method'=>'POST'
//      , 'header'=>"\"Content-Type: application/x-www-form-urlencoded\r\n\".Connection: close\r\nContent-Length: $data_len\r\n".'"User-Agent:MyAgent/1.0\r\n"'
//      , 'content'=>$data_url
//      ))))
//      , 'headers'=>$http_response_header
//      );
//    }
//
//    $data = [
//      'secret' => "6Lc_lrgUAAAAAMrepDB6Db8JvN6AQD_IZAdqpe7t",
//      'response' => $_REQUEST['response']
//    ];
//    echo http_post('https://www.google.com/recaptcha/api/siteverify', $data);
    echo $output;
  }
}