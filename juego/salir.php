<?php
  session_start();
  unset($_SESSION["nombre"]);
  header('location: ../');
?>
