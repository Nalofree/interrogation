<?php
class Controller_Leads extends Controller
{
  function __construct()
  {
    $this->model = new Model_Leads();
    $this->view = new View();
  }

  function action_index()
  {

//    function randomNumber($length) {
//      $min = 1 . str_repeat(0, $length-1);
//      $max = str_repeat(9, $length);
//      return mt_rand($min, $max);
//    }
//
//    $data = $this->model;
//    var_dump($data->get_data());
//    var_dump($data->get_prop('id'));
//    var_dump($data->get_props());
//    $props = $data->get_props();
//    foreach ($props as $key => $val) {
//      $data->set_prop($val,$_POST[$val]?$_POST[$val]:null);
//    }
//    $new_mwmber_id = randomNumber(4);
//    $member_ids = $this->model->get_all('member_id');
//    array_search($new_mwmber_id,$member_ids);
//    do {
//      $data->set_prop('member_id', $new_mwmber_id);
//    } while (array_search($new_mwmber_id,$member_ids) !== FALSE);
//    // Получить все номера участников лидов, проверить на уникальность сгенерить номер участника
//    var_dump($data->get_data());
//    var_dump($data->set_data());
//    echo "<br><br>";
//    var_dump($this->model->get_all('member_id'));
//
//
//    echo "<br><br>";
//    $this->view->generate('reg_form_view.php', 'template_view.php');
  }
//  function action_add() {
//
//    function randomNumber($length) {
//      $min = 1 . str_repeat(0, $length-1);
//      $max = str_repeat(9, $length);
//      return mt_rand($min, $max);
//    }
//
//    $props = $this->model->get_props();
//    foreach ($props as $key => $val) {
//      $this->model->set_prop($val,$_POST[$val]?$_POST[$val]:NULL);
//    }
//
//    $new_member_id = randomNumber(4);
//    $member_ids = $this->model->get_all('member_id');
//    array_search($new_member_id,$member_ids);
//    do {
//      $this->model->set_prop('member_id', $new_member_id);
//    } while (array_search($new_member_id,$member_ids) !== FALSE);
//    $this->model->record_lead();
//  }

  function action_check_email(){
    $emails = $this->model->get_all('email');
    if (isset($_POST['email'])) {
      if (array_search($_POST['email'],$emails) === FALSE) {
        $data = array("err"=>NULL,"is_not_exist"=>TRUE);
      }else{
        $data = array("err"=>"This email is already used", "is_not_exist"=>FALSE);
      }
    }else{
      $data = array("err"=>"Something wents wrong. Email is not exist.", "is_not_exist"=>FALSE);
    }
    echo json_encode($data);
    return $data;
  }

  function action_add() {
    $data = $this->model;
    $data->get_data();
    $card_ids = $this->model->get_all('card_id');
    function randomNumber($length) {
      $min = 1 . str_repeat(0, $length-1);
      $max = str_repeat(9, $length);
      return mt_rand($min, $max);
    }

    $data = $this->model;
    $props = $data->get_props();
    foreach ($props as $key => $val) {
      $data->set_prop($val,$_POST[$val]?$_POST[$val]:"NULL");
    }
    $new_member_id = randomNumber(4);
    $member_ids = $this->model->get_all('member_id');
    array_search($new_member_id,$member_ids);
    do {
      $data->set_prop('member_id', $new_member_id);
    } while (array_search($new_member_id,$member_ids) !== FALSE);

    $result = $data->record_lead();
    if ($result['err']){
      echo "err";
    }else{
      $this->view->generate('final_view.php', 'template_view.php',$result['data']);
    }
  }
}