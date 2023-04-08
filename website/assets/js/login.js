$(document).ready(function () {
    $("#register-navigation a").click( (e) => {
      e.preventDefault();
      showRegisterForm();
      })
    $("#login-navigation a").click( (e) => {
      e.preventDefault();
      showLoginForm();
    })

    $("#register-button").click((e) => {
      e.preventDefault();
      var user = {
        user: $("#rg-user").val(),
        password: $("#rg-password").val(),
        name: $("#rg-name").val(),
        birth: $("#rg-birth").val(),
        gender: $("#rg-gender").val(),
        phone: $("#rg-phone").val(),
        address: $("#rg-address").val()
      }
      console.log(user);
      $.post("../api/customer/addNewUser.php", user,
        function (data) {
          if(data.status) {
            $("input").val("");
            $("textarea").val("");
            showLoginForm();
            showSuccessNotifycation("Successfully to create new user!");
          }
          else {
            showFailedNotifycation("Failed to create new user!");
          }
        },
        "json"
      );
    })

  setTimeout(() => {
    $("#notifycation").remove();
  }, 5000);

});

function showRegisterForm() {
  $("#container .content").addClass("register");
  $("form.login").removeClass("show");
  $("form.register").addClass("show");
}

function showLoginForm() {
  $("#container .content").removeClass("register");
  $("form.login").addClass("show");
  $("form.register").removeClass("show");
}

function showSuccessNotifycation(text) {
  $(`<div id="notifycation" class="success">${text}</div>`).appendTo("#container");
  setTimeout(() => {
      $("#notifycation").remove();
  }, 3000);
}

function showFailedNotifycation(text) {
  $(`<div id="notifycation">${text}</div>`).appendTo("#container");
  setTimeout(() => {
      $("#notifycation").remove();
  }, 3000);
}