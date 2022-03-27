<?php

session_start();

unset($_SESSION['Id']);
unset($_SESSION['name']);
unset($_SESSION['emale']);
unset($_SESSION['age']);

header('location: index.php');


?>