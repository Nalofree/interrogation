<script src="/js/form_validation.js"></script>
<div class="container" id="print_zone">
    <div class="row heading-row">
        <div class="col-5 ">
            <img src="/images/logo.png" alt="" class="logo" width="100%">
        </div>
        <div class="col-7">
            <div class="heading">
                <div class="heading--uppercase">Спасибо</div>
                <div class="heading--small">за участие в розыгрыше</div>
            </div>
        </div>
    </div>
    <h2 class="result-heading">Ваш номер участника</h2>
    <div class="result-number"><?php echo $data['member_id'];?></div>
    <p class="description-text description-result">
        этот номер был отправлен вам на email.<br>
        Сохраните pdf-купон с номером до конца розыгрыша
    </p>
</div>
<div class="conceptcar">
    <img src="/images/concept_car.png" alt="" width="100%">
</div>
<div class="links">
    <a id="get_pdf" href="#" class="links-item btn btn-interr">Скачать pdf-купон</a>
    <a href="https://firstvds.ru/partner/profits" class="links-item">Перейти на FirstVDS</a>
</div>
<?php
