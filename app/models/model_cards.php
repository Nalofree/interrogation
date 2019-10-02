<?php
class Model_Cards extends Model {

  public function __construct($id = null, $number = null, $type = null)
  {
    $this->id = $id;
    $this->number = $number;
    $this->type = $type;
    $this->connect();
  }

  private function connect()
  {
    $this->link = new mysqli("127.0.0.1", "db_user_n", "230p88gt7~db_user_n", "interr_db");
  }

  public function __get($name) {
    return $this->$name;
  }

  public function __set($name, $value) {
    return $this->$name = $value;
  }

  public function get_card_by_id($id) {
    $this->connect();
    $result = $this->link->query("SELECT * FROM cards WHERE cards.id = ".mysqli_real_escape_string($this->link, $id));
    return $result;
  }

  public function get_card_by_number($number = 0) {
    $this->connect();
    $result = $this->link->query("SELECT * FROM cards WHERE cards.number = ".mysqli_real_escape_string($this->link,$number));
    if ($result->num_rows > 0) {
      $cards_arr = [];
      while ($row = $result->fetch_assoc()){
        $cards_arr[] = $row;
      }
      $lead_alr_reg = $this->link->query("SELECT * FROM leads  WHERE leads.card_id = ".mysqli_real_escape_string($this->link, $number));
      if ($lead_alr_reg->num_rows > 0) {
        $data = array("err"=>"Этот номер карты уже использован","data"=>NULL); // cards is already used
      }else{
        $data = array("err"=>NULL,"data"=>$cards_arr[0]);
      }
    }else{
      $data = array("err"=>"Карты с таким номером не существует","data"=>NULL); // cards is not exist
    }
    return $data;
  }

  public function get_card_numbers() {
    $this->connect();
    $result = $this->link->query("SELECT number FROM cards");
    $cards_arr = [];
    while ($row = $result->fetch_assoc()){
      $cards_arr[] = $row['number'];
    }
    return $cards_arr;
  }

  public function get_cards() {
    $this->connect();
    $result = $this->link->query("SELECT * FROM cards");
    $cards_arr = [];
    while ($row = $result->fetch_assoc()){
      $cards_arr[] = $row;
    }
    return $cards_arr;
  }

  public function get_data() {
    return $this->get_card_by_number(616431);
  }

}