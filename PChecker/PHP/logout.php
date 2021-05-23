<?php
session_start();
session_unset();

echo "<script>
          alert('Log-out succesfully executed, you will now be redirected at the Homepage!');
          window.location= 'index.php'
      </script>";