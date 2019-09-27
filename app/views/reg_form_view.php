<script src="/js/form_validation.js"></script>
<div class="container">
    <div class="alert alert-danger alert-dismissible" role="alert">
        <span class="alert-text"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
  <form action="/leads/add" method="post" class="interr-form">
    <div class="firststep">
      <p class="description-text">С какими продуктами Битрикс вы работаете?</p>
      <div class="form-check  custom-control custom-checkbox">
        <input class="form-check-input custom-control-input" type="checkbox" value="1" name="crm" id="crm">
        <label class="form-check-label custom-control-label" for="crm">
          CRM
        </label>
      </div>
      <div class="form-check  custom-control custom-checkbox">
        <input class="form-check-input custom-control-input" type="checkbox" value="1" name="b24" id="b24">
        <label class="form-check-label custom-control-label" for="b24">
          Корп. портал
        </label>
      </div>
      <div class="form-check  custom-control custom-checkbox">
        <input class="form-check-input custom-control-input" type="checkbox" value="1" name="cms" id="cms">
        <label class="form-check-label custom-control-label" for="cms">
          Управление сайтом
        </label>
      </div>
      <p class="description-text description-partner">Хотели бы вы получать дополнительную прибыль, сотрудничая с
          FirstVDS?</p>
      <div class="row">
        <div class="col-4">
          <div class="form-check custom-control custom-radio">
            <input class="form-check-input custom-control-input" type="radio" name="partner" id="partner1" value="00" required>
            <label class="form-check-label custom-control-label" for="partner1">
              Да
            </label>
          </div>
          <div class="form-check custom-control custom-radio">
            <input class="form-check-input custom-control-input" type="radio" name="partner" id="partner2" value="01">
            <label class="form-check-label custom-control-label" for="partner2">
              Нет
            </label>
          </div>
        </div>
        <div class="col-8">
          <div class="form-check custom-control custom-radio">
            <input class="form-check-input custom-control-input" type="radio" name="partner" id="partner3" value="10">
            <label class="form-check-label custom-control-label" for="partner3">
              Не знаю
            </label>
          </div>
          <div class="form-check custom-control custom-radio">
            <input class="form-check-input custom-control-input" type="radio" name="partner" id="partner4" value="11">
            <label class="form-check-label custom-control-label" for="partner4">
              Уже сотрудничаю
            </label>
          </div>
        </div>
      </div>
      <button type="button" class="btn btn-interr btn-interr--show-second">Далее 🡲</button>
    </div>
    <div class="secondstep">
        <div class="description-text">Заполните обязательные поля:</div>
      <input class="form-control" name="name" id="name" type="text" required placeholder="Имя">
      <input name="card_id" id="card_id" type="hidden" value="<?php echo $data['card_number']?>">
      <input class="form-control" name="surname" id="surname" type="text" required placeholder="Фамилия">
      <input class="form-control" name="company" id="company" type="text" required placeholder="Компания">
      <input class="form-control" name="position" id="position" type="text" required placeholder="Должность">
      <input class="form-control" name="phone" id="phone" type="text" required placeholder="+7(___)___-__-__">
      <input class="form-control" name="email" id="email" type="text" required placeholder="Email"
             aria-describedby="emailHelp" >
      <p class="description-text description-text--small">
          на этот email будет отправлен купон
          для участия в розыгрыше, без которого
          вы не сможете забрать выигрыш
      </p>
      <button type="submit" disabled class="btn btn-interr send-form-button">Зарегистрироваться</button>
      <div class="form-check custom-control custom-checkbox">
        <input class="form-check-input custom-control-input" type="checkbox" value="" id="condition" checked>
        <label class="form-check-label custom-control-label description-text description-text--small" for="condition">
          Заполняя форму вы соглашаетесь с&nbsp;<a href="https://firstvds.ru/content/processing-personal-data" target="_blank"
            >политикой конфиденциальности</a>
        </label>
      </div>
    </div>
  </form>
</div>
<script>
  $(document).ready(function(){
    // $("#phone").inputmask("+7(999)999-99-99");
    // $("#phone").css("background","red");
  });
</script>
<?php
