<?php
session_start();
session_unset();

echo "<script>
          alert('Log-out effettuato correttamente, verrai ora reindirizzato alla Home!');
          window.location= 'index.php'
      </script>";