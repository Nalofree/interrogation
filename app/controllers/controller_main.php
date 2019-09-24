<?php
class Controller_Main extends Controller
{
  function action_index()
  {
    $this->view->generate('main_view.php', 'template_view.php');
  }

  function action_get_form () {
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
  }
}