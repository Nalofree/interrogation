<script src="/js/form_validation.js"></script>
<div class="container">
    <div class="row">
        <div class="col-5 ">
            <img src="/images/logo.png" alt="" class="logo" width="100%">
        </div>
        <div class="col-7">
            <h1 class="heading">Спасибо<br>
                <small>за участие в розыгрыше</small></h1>
        </div>
    </div>
    <h2 class="result-heading">Ваш номер участника</h2>
    <div class="result-number"><?php echo $data['member_id'];?></div>
    <p class="description-text description-result">
        этот номер был отправлен вам на эмэйл,<br>
        по нему вы сможете забрать выигрыш
    </p>
</div>
<?php
