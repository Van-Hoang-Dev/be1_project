<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

session_destroy();
setcookie("remember-account", $random_selector, time() - (3600*24*30), "/");

header('location: index');