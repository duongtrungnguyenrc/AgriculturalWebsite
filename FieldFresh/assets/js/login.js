
$(document).ready(function () {
  $.ajax({
    url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/province',
    type: 'GET',
    headers: {
      'Token': token,
    },
    success: function(response) {
      response.data.forEach(province => {
        $(`<option value="${province.ProvinceID + "-" + province.ProvinceName}">${province.ProvinceName}</option>`).appendTo($("#rg-province"));
      });
    },
    error: function(xhr, status, error) {
        console.log(error);
    }
  });
  $("#rg-province").change((e) => {
    var provinceID = parseInt(e.target.value.split("-")[0]);
    $.ajax({
      url: 'https://online-gateway.ghn.vn/shiip/public-api/master-data/district',
      type: 'GET',
      data: {
        'province_id' : provinceID,
      },
      headers: {
        'Token': token,
      },
      beforeSend: function() {
        $.blockUI({ message: '<div class="spinner-border text-light"></div>' , css: {backgroundColor: "transparent", padding: "100px", border: "none"}});
      },
      success: function(response) {
        response.data.forEach(district => {
          $(`<option value="${district.DistrictID + "-" + district.DistrictName}">${district.DistrictName}</option>`).appendTo($("#rg-district"));
        });
      },
      error: function(xhr, status, error) {
          console.log(error);
      }
      ,
      complete: function() {
          $.unblockUI();
      }
    });
  })

  $("#rg-district").change((e) => {
    var districtID = parseInt(e.target.value.split("-")[0]);
    $.ajax({
      url: `https://online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id=${districtID}`,
      type: 'GET',
      headers: {
        'Token': token,
      },
      beforeSend: function() {
        $.blockUI({ message: '<div class="spinner-border text-light"></div>' , css: {backgroundColor: "transparent", padding: "100px", border: "none"}});
      },
      success: function(response) {
        response.data.forEach(ward => {
          $(`<option value="${ward.WardCode + "-" + ward.WardName}">${ward.WardName}</option>`).appendTo($("#rg-ward"));
        });
      },
      error: function(xhr, status, error) {
          console.log(error);
      }
      ,
      complete: function() {
          $.unblockUI();
      }
    });
  })

  $("#lg-password").on("input", function(e) {
    if (e.target.value == "") {
      $("#login").removeClass("active");
    }
    else {
      $("#login").addClass("active");
    }
  });

  $("#register-navigation a").click( (e) => {
    e.preventDefault();
    showRegisterForm();
  })

  $("#login-navigation a").click( (e) => {
    e.preventDefault();
    showLoginForm();
  })

  $("#login-form").submit((e) => {
    e.preventDefault();
    $.post("../api/customer/login.php", {userName: $("#lg-user").val(), password: $("#lg-password").val()},
      function (data) {
        if(data.status) {
          showSuccessNotifycation(data.description);
          data.role != 'admin' ? window.location.href = "../home/home.php" : window.location.href = "../admin/dashboard.php";
        }
        else {
          showFailedNotifycation(data.description);
        }
      },
      "json"
    );
  })

  $("#register-button").click((e) => {
    e.preventDefault();
    var user = {
      userName: $("#rg-user").val(),
      password: $("#rg-password").val(),
      confirm: $("#rg-confirm").val(),
      fullName: $("#rg-name").val(),
      birth: $("#rg-birth").val(),
      gender: $("#rg-gender").val(),
      email: $("#rg-email").val(),
      phone: $("#rg-phone").val(),
      address: $("#rg-province").val() + "," + $("#rg-district").val() + "," + $("#rg-ward").val() + "," + $("#rg-address").val(),
    }
    console.log(user);
    $.post("../api/customer/addNewUser.php", user,
      function (data) {
        if(data.status) {
          $("input").val("");
          $("textarea").val("");
          showLoginForm();
          showSuccessNotifycation(data.description);
        }
        else {
          showFailedNotifycation(data.description);
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
