<?php
session_start();
if (!isset($_SESSION['usuario']))
  Header("Location: login.php");
else
    Header("Location: gantt.php");
?>