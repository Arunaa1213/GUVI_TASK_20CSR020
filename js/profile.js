function ajaxCall() {
  $.ajax({
    type: "GET",
    url: "php/profile.php",
    dataType: "html",
    success: function (data) {
      $("#mydata").html(data);
    },
  });
}
ajaxCall();
