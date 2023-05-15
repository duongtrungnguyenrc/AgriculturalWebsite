const token = "c3ccf572-dd29-11ed-921c-de4829400020";

$(document).ready(function () {
  $("#notification-btn").click((e) => {
    e.stopPropagation();
    $("#notification-popup").toggle(300);
  })
  
  $("#hide-notification-popup").click(() => {
      $("#notification-popup").hide(200);
  })
});

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
