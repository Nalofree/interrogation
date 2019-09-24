<?php
class Controller_Cards extends Controller
{
  function __construct()
  {
    $this->model = new Model_Cards();
    $this->view = new View();
  }

  function action_index()
  {
    if(isset($_POST["card_number"])) {
      $response = $this->model->get_card_by_number($_POST["card_number"]);
      if($response['data'] !== NULL){
        $this->view->generate('reg_form_view.php', 'template_view.php', $data = array("card_number"=>
          $_POST["card_number"]));
      }else{
        var_dump($response['err']);
      }
    }else{
      var_dump("Card number is not exist");
    }
  }
}