$(document).ready(function () {
  if (localStorage.getItem("email")) {
  } else {
    window.location.replace("./../login.html");
  }

  $("<h3>" + localStorage.getItem("name") + "</h3>").appendTo("#name");
  $("<h3>" + localStorage.getItem("dob") + "</h3>").appendTo("#date");
  $("<h3>" + localStorage.getItem("contact") + "</h3>").appendTo("#phone");
  $("<h3>" + localStorage.getItem("email") + "</h3>").appendTo("#email");

  if (window.XMLHttpRequest) {
    xmlHTTP = new XMLHttpRequest();
  } else {
    xmlHTTP = new ActiveXObject("Microsoft.XMLHTTP");
  }
});
