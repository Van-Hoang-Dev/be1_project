<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

session_destroy();
setcookie("remember-account", "", time() - 1, "/");

header('location: index.php');