
$(document).ready(function() {

  setInterval(function() {
    var valid = true;
    var uname = $("#username");
    var r_uname = new RegExp("^[a-zA-Z0-9]+$");
    var mail = $("#email");
    var r_mail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var pwd = $("#password");
    var pwd_c = $("#password_verification");

    if(uname.val() == null || uname.val() == "" || !r_uname.test(uname.val()))
    {
      uname.parent().attr("class", "form-group has-error");
      valid = false;
    }
    else
    {
      uname.parent().attr("class", "form-group has-success");
    }

    if(mail.val() == null || mail.val() == "" || !r_mail.test(mail.val()))
    {
      mail.parent().attr("class", "form-group has-error");
      valid = false;
    }
    else
    {
      mail.parent().attr("class", "form-group has-success");
    }

    if(pwd.val() == null || pwd.val() == "" || pwd.val().length < 6)
    {
      pwd.parent().attr("class", "form-group has-error");
      valid = false;
    }
    else
    {
      pwd.parent().attr("class", "form-group has-success");
    }

    if(pwd_c.val() == null || pwd_c.val() == "" || pwd_c.val() != pwd.val())
    {
      pwd_c.parent().attr("class", "form-group has-error");
      valid = false;
    }
    else
    {
      pwd_c.parent().attr("class", "form-group has-success");
    }

    if(valid)
    {
      $("#submit_register").removeAttr("disabled");
    }
    else
    {
      $("#submit_register").attr("disabled","disabled");
    }

   }
  , 100);

});
