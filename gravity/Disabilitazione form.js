/* Da inserire inn un file js */

document.addEventListener("DOMContentLoaded", function() {
  var form = document.getElementById("gform_2"); // cambia 2 con l'ID della tua form
  if(form) {
    var inputs = form.querySelectorAll("input, select, textarea, button");
    inputs.forEach(function(input) {
      input.disabled = true;
    });
  }
});