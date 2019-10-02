<div class="container">
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
    <h2 class="err-heading"><?php echo $data['err'] ?></h2>
    <p class="err-text">Проверьте номер с карты,<br>
        выданной вам на стенде FirstVDS</p>
<!--    <div class="row">-->
<!--        <div class="col-md-12">-->
<!--            <form action="/cards" class="cart_number_form" method="POST" style="display: none;">-->
<!--                <div class="form-group">-->
<!--                    <label for="card_number">Введите номер с карты,<br>-->
<!--                        выданной вам на стенде FirstVDS</label>-->
<!--                    <input class="form-control" type="text" name="card_number" id="card_number"-->
<!--                           placeholder="">-->
<!--                </div>-->
<!--                <button type="submit" class="btn btn-interr">Далее 🡲</button>-->
<!--            </form>-->
<!--        </div>-->
<!--    </div>-->
    <div class="links">
        <a href="/" class="links-item">Перейти в начало</a>
        <a href="https://firstvds.ru/partner/profits" class="links-item">Перейти на FirstVDS</a>
    </div>
</div>
<?php
