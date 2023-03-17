// $(document).ready(function () {
//   $("#form").validate();
// });

$("#submit").on("click", function () {
  $.ajax({
    type: "POST",
    url: "php/login.php",
    data: $("#form").serialize(),
    success: function (response) {
      // console.log(response);
      // alert("Your Successfully logged");
    },
    error: function () {
      alert("error");
    },
  }).done(function () {
    // localStorage.setItem("name", response.name);
    var value = localStorage.getItem("name");
    console.log(value);
    // var url = "http://localhost:81/GUVI_TASK_20CSR020/profile.html";
    // $(location).attr("href", url);
  });
});
