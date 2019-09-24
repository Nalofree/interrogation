<?php
class Controller_check_number extends Controller
{
  function __construct()
  {
    include "app/models/model_cards.php";
    $this->model = new Model_Cards();
    $this->view = new View();
  }

  function action_index()
  {

    $link = mysqli_connect("127.0.0.1", "db_user_n", "db_user_n", "interr_db");

    if (!$link) {
      echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
      echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }

//    var_dump($this->model->get_data());
//    var_dump($_POST);

    $num = $_POST['card_number'];

    if (!$num) {
      throw new Exception('Something went wrong. Number is not exist.');
    }

//    echo "Checking card number";
    if ($result_cards = $link->query("SELECT number FROM cards WHERE cards.number = '".$num."'")) { //INNER JOIN
      // users ON
      // users.card_id = cards.id
//      var_dump($result_cards);
      // Check card is exist
      if ($result_cards->num_rows > 0) {
//        echo "Card is exist, work in progress";
        // check registred lead
        if ($result_leads = $link->query("SELECT id FROM leads WHERE leads.card_id = '".$num."'")) {
          if ($result_leads->num_rows > 0) {
            echo "Lead is exist, send err message";
          }else{
//            echo "Lead is not exist, work in progress";
//            echo "<br><br> redirect to firststep";
            $host  = $_SERVER['HTTP_HOST'];
//            echo $host.'/leads/index/?card='.$num;
//            header('Location: /leads/index/?card='.$num);
            $data = array('card'=>$num);
            $this->view->generate('reg_form_view.php', 'template_view.php',$data);
          }
        }else {
          var_dump($result_leads);
          throw new Exception('Something went wrong');
        }
      }else{
        echo "Card is not exist, send err message";
      }
    }else{
      var_dump($result_cards);
      throw new Exception('Something went wrong');
    }

//    $this->view->generate('404_view.php', 'template_view.php');
  }

  function action_preset() {

    $link = mysqli_connect("127.0.0.1", "db_user_n", "db_user_n", "interr_db");

    if (!$link) {
      echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
      echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
      echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }

    function randomNumber($length) {
      $min = 1 . str_repeat(0, $length-1);
      $max = str_repeat(9, $length);
      return mt_rand($min, $max);
    }

    if ($result = $link->query("SELECT number FROM cards")) {
//      printf("Select вернул %d строк.\n", $result->num_rows);
//      return $result->num_rows;


      if ($result->num_rows > 0) {
        return false;
      } else {
        echo "Fill cards <br><br>";
        $card_numbers = array();
        $types = array(
          "000"=>"hot",
          "001"=>"warm",
          "010"=>"cold",
          "011"=>"staff",
          "100"=>"hugarden",
        );
        foreach ($types as $key => $type) {
          $count_card_numbers = 0;
          do {
            $num = randomNumber(6);
            if (!array_search($num, $card_numbers)) {
              array_push($card_numbers,randomNumber(6));
              $count_card_numbers++;
              $record = $link->query("INSERT INTO cards (number, type) VALUES ('".$num."','".$key."')");
              if (!$record) {
                throw new Exception('Filling card numbers to database error');
              }
            }
          } while ($count_card_numbers < 600);
        }
      }
      echo count($card_numbers);

      /* очищаем результирующий набор */
      $result->close();
    }
  }
}