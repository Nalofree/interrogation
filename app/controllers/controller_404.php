<?php
class Controller_404 extends Controller
{
  function action_index()
  {
    $this->view->generate('err_view.php', 'template_view.php',array("err"=>"404<br>Страница не найдена"));
  }
}