<?php

session_start();
unset($_SESSION["login-adm"]);

header("Location: login-admin.php");