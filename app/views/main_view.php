<div class="container">
  <script src="//www.google.com/recaptcha/api.js?render=6Lc_lrgUAAAAANrPi6AwZTaU91vBVRbUeyD2n8Th"></script>
  <script>
    grecaptcha.ready(function() {
      // $(".cart_number_form").show();
      $(".alert-loading").show();
      $(".alert-error").hide();
      grecaptcha.execute('6Lc_lrgUAAAAANrPi6AwZTaU91vBVRbUeyD2n8Th', {action: 'homepage'}).then(function(token) {
        $.ajax({
          url: '/main/get_form',
          type: 'POST',
          data:({
            secret:'6Lc_lrgUAAAAAMrepDB6Db8JvN6AQD_IZAdqpe7t',
            response: token
          }),
          success: function (data, status, error) {
            console.log(data, status,error);
            $(".alert-loading").hide();
            $(".alert-error").hide();
            var resContent = JSON.parse(data);
            if (resContent["success"]) {
              $(".cart_number_form").show();
              $(".alert-error").hide();
            }else{
              $(".cart_number_form").hide();
              $(".alert-error").show();
            }
          },
          error: function (data, status, error) {
            console.log(data, status,error);
            $(".alert-loading").hide();
            $(".alert-error").show();
            console.log('error');
            console.log(data, status,error);
            $(".cart_number_form").hide();
          },
        });
        console.log(token);
      });
    });
  </script>
    <div class="row heading-row">
        <div class="col-5 ">
            <img src="/images/logo.png" alt="" class="logo" width="100%">
        </div>
        <div class="col-7">
            <h1 class="heading">Розыгрыш<br>
                Playstation 4</h1>
        </div>
    </div>
    <div class="alert alert-info alert-loading" role="alert">
        Загрузка..
    </div>
    <div class="alert alert-danger alert-error" role="alert" style="display: none;">
       Что-то пошло не так, перезагрузите страницу, пожалуйста.
    </div>
    <div class="ps4-main">
        <img src="/images/ps4.png" alt="">
    </div>
  <div class="row">
    <div class="col-md-12">
      <form action="/cards" class="cart_number_form" method="POST" style="display: none;">
        <div class="form-group">
          <label for="card_number">Введите номер с карты,<br>
              выданной вам на стенде FirstVDS</label>
          <input class="form-control" type="text" name="card_number" id="card_number"
                 placeholder="" required>
        </div>
        <button type="submit" class="btn btn-interr">Далее <i class="fas fa-arrow-right"></i></button>
      </form>
    </div>
  </div>
</div>
<?php
