$(document).ready(function () {
  function showError(text, element){
    $(".alert-danger .alert-text").text(text);
    $(".alert-danger").show();
  }

  $(".btn-interr--show-second").click(function () {
    var partnerCheckerd = false;
    $("input[name='partner']").each(function (e) {
      console.log($(this));
      if($(this).prop('checked')) {
        partnerCheckerd = true;
      }
    });
    if(partnerCheckerd) {
      $(".alert-danger").hide();
      $(".description-partner").css("color","#fff");
      $(".form-check-label[for *='partner']").css("color","#fff");
      $(".firststep").hide();
      $(".secondstep").show();
      $(".alert-danger").hide();
    }else{
      showError("Отметьте обязательные пункты, пожалуйста");
      $(".description-partner").css("color","red");
      $(".form-check-label[for *='partner']").css("color","red");
    }
  });

  $("input[name='partner']").click(function () {
    $(".alert-danger").hide();
    $(".description-partner").css("color","#fff");
    $(".form-check-label[for *='partner']").css("color","#fff");
  });

  $("#phone").inputmask("+7(999)999-99-99");

  $("#email").focus(function () {
    $("#email").css("border-color","#ced4da");
    $(".alert-danger").hide();
  });

  $("#condition").click(function () {
    if($(this).prop('checked')){
      $(".send-form-button").prop( "disabled", false );
    }else{
      $(".send-form-button").prop( "disabled", true );
    }
  });

  $("#email").change(function (e) {
    e.preventDefault();
    var email = $("#email").val();
    $.ajax({
      url: "/leads/check_email",
      data: {"email":email},
      method: "POST",
      success: function (data, status, error) {
        console.log(data, status, error);
        var $result = JSON.parse(data);
        if ($result.err != null) {
          showError($result.err);
          $("#email").css("border-color","#FF0000");
        }else{
          if (ValidateEmail(email)) {
            $(".send-form-button").prop( "disabled", false );
          }else{
            $("#email").css("border-color","#FF0000");
            showError("Wrong email");
            $(".send-form-button").prop( "disabled", true );
          }
        }
      },
      error:function (data, status, error) {
        console.log(data, status, error);
        showError("Something wents wrong");
      },
    });
  });

  function ValidateEmail(mail)
  {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w+)+$/.test(mail))
    {
      return true;
    }else{
      return false;
    }
  }
});