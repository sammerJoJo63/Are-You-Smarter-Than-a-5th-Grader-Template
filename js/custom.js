$(document).ready(function() {
  //var id = $(this).data("id");
  $.ajax({
    //type: "POST",
    url: "../ajax/updatedbfreshgame.php",
    context: document.body,
    success: console.log("here"),
  });
});
// Set another completion function for the request above
