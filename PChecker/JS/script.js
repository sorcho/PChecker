function filtro(str) {
  var xhttp;

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("stampaFiltrata").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "filtro.php?tipologia=" + str, true);
  xhttp.send();
}