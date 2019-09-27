<?php
class Model_Leads extends Model {

  public function __construct($id = NULL, $crm = NULL,$b24 = NULL,$cms = NULL,$partner = NULL,$name = NULL,$surname = NULL,$company = NULL,$position = NULL,$phone = NULL,$email = NULL,$card_id = NULL,$member_id = NULL)
  {
    $this->id = $id;
    $this->crm = $crm;
    $this->b24 = $b24;
    $this->cms = $cms;
    $this->partner = $partner;
    $this->name = $name;
    $this->surname = $surname;
    $this->company = $company;
    $this->position = $position;
    $this->phone = $phone;
    $this->email = $email;
    $this->card_id = $card_id;
    $this->member_id = $member_id;
    $this->connect();
  }

  private function connect()
  {
    $this->link = new mysqli("127.0.0.1", "db_user_n", "db_user_n", "interr_db");
  }

  public function __get($name) {
    return $this->$name;
  }

  public function __set($name, $value) {
    return $this->$name = $value;
  }

  public function record_lead() {
    $this->connect();

    $prop_keys = '';
    $prop_keys_arr = [];
    $captions = '';
    $i=0;

    foreach ($this as $key => $val) {
      if ($key != 'id' && $key != 'link') {
        $prop_keys = $i!=0 ? $prop_keys.",".$key :$prop_keys.$key;
        $i++;
      }
    }

    foreach ($prop_keys_arr as $prop_key) {
      $this->$prop_key = $this->$prop_key ? $this->$prop_key : 0;
    }

    $captions = $this->crm.",".$this->b24.",".$this->cms.",'"
    .$this->partner."','".$this->name."','"
    .$this->surname."','"
    .$this->company ."','".$this->position."','"
    .$this->phone."','"
    .$this->email."',".$this->card_id.",'"
    .$this->member_id."'";

    $card_ids = $this->get_all("card_id");
//
//    var_dump(array_search($this->card_id,$card_ids));
//    echo "<br><br>";
//    echo "<br><br>";
//    var_dump($card_ids);
//    echo "<br><br>";
//    echo "<br><br>";

    if ($card_ids) {
      if (array_search($this->card_id,$card_ids) === FALSE) {
        $record = $this->link->query("INSERT INTO leads (".$prop_keys.") VALUES (".$captions.")");
        if ($record) {
          $data = array("err"=>NULL,"data"=>array("member_id"=>$this->member_id));
          $send = mail( $this->email, "Номер участника", "Ваш номер участника\n\r $this->member_id\n\rпо нему вы сможете забрать выигрыш");
          if (!$send) {
            throw new Exception("Ошибка отправки письма");
          }
        }else{
          $data = array("err"=>"Что-то пошло не так","data"=>NULL);
        }
      }else{
        $data = array("err"=>"Этот номер карты уже использован","data"=>NULL);
      }
    } else {
      $record = $this->link->query("INSERT INTO leads (".$prop_keys.") VALUES (".$captions.")");
      if ($record) {
        $data = array("err"=>NULL,"data"=>array("member_id"=>$this->member_id));
        $send = mail( $this->email, "Номер участника", "Ваш номер участника\n\r $this->member_id\n\rпо нему вы сможете забрать выигрыш");
        if (!$send) {
          throw new Exception("Ошибка отправки письма");
        }
      }else{
        $data = array("err"=>"Что-то пошло не так","data"=>NULL);
      }
    }
//    $data = array("err"=>NULL,"data"=>array("member_id"=>$this->member_id));
    return $data;
  }

  private $id = null;
  private $crm = null;
  private $b24 = null;
  private $cms = null;
  private $partner = '';
  private $name = '';
  private $surname = '';
  private $company = '';
  private $position = '';
  private $phone = '';
  private $email = '';
  private $card_id = null;
  private $member_id = null;

  public function get_all($field = NULL) {
    $this->connect();

    $field_set = $field ? $field : "*";

    $records = $this->link->query("SELECT ".$field_set." FROM leads", MYSQLI_USE_RESULT);

    while ($row = $records->fetch_assoc()){
      $leads_arr[] = $row[$field];
    }

    $records->close();

    return $leads_arr;
  }

  public function get_data($id = null) {
    return $this;
  }
  public function get_prop($prop = null) {
    return $this->$prop;
  }

  public function set_prop($prop = null, $value = null) {
    $this->$prop = $value;
  }

  public function get_props() {
    $props = array();
    foreach ($this as $key => $val) {
      array_push($props,$key);
    }
    return $props;
  }

  public function set_data() {
    $link = mysqli_connect("127.0.0.1", "db_user_n", "db_user_n", "interr_db");

    if (!$link) {
      echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
      echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }

    $prop_keys = '';
    $captions = '';
    $i=0;

    foreach ($this as $key => $val) {
      if ($key != 'id') {
        $prop_keys = $i!=0 ? $prop_keys.",".$key :$prop_keys.$key;
        $i++;
      }
    }

    $captions = $this->crm?$this->crm:"NULL".",".$this->b24?$this->b24:"NULL".",".$this->cms?$this->cms:"NULL".",'"
    .$this->partner?$this->partner:"NULL"."','".$this->name?$this->name:"NULL"."','"
    .$this->surname?$this->surname:"NULL"
    ."','"
      .$this->company ?$this->company :"NULL"."','".$this->position?$this->position:"NULL"."','"
    .$this->phone?$this->phone:"NULL"."','"
    .$this->email?$this->email:"NULL"."',".$this->card_id?$this->card_id:"NULL".",'"
      .$this->member_id?$this->member_id:"NULL"."'";

    $record = $link->query("INSERT INTO leads (".$prop_keys.") VALUES (".$captions.")");
    return $record;
  }
}