<script src="js/jquery-3.1.1.min.js, js/bootstrap.min.js"></script>

function inviaForm() {
  var modello = $("#modello").val();

  $.ajax({
    type: "post",
    url: "carrello.php?p=add",
    data: "modello=" + modello,
    success: function (msg) {
      alert("Success Insert data");
    },
  });
}
