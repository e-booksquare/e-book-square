<?php

unset($_SESSION['ID_user']);
session_destroy();
header("Location: ../View/pages/login.php");
die();

