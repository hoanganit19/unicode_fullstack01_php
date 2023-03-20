<?php

session_start();
unset($_SESSION['userLogin']);
header("Location: login.php");
