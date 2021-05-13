/* Script per menù a tendina
   Quando l'utente clicca, mostra la tendina */
function tendina() {
    document.getElementById("myDropdown").classList.toggle("show");
  }
  
  // Chiudi il menu se si clicca di nuovo o da qualche altra parte
  window.onclick = function(e) {
    if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
    }
  }

  //Script per la DarkMode
  function darkMode() {
    var element = document.body;
    element.classList.toggle("dark-mode");
    document.getElementById("tt").classList.toggle('test');
    document.getElementById("email").classList.toggle('niggatext');
    document.getElementById("password").classList.toggle('niggatext');
    document.getElementById("nome").classList.toggle('niggatext');
    document.getElementById("cognome").classList.toggle('niggatext');
    document.getElementById("tel").classList.toggle('niggatext');
}