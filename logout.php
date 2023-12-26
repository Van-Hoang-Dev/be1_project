<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});
$util = new Util();
session_unset();
$_SESSION["member_phone"] = "";
session_destroy();

// clear cookies
// $util->clearUserCookie();

header('location: index');

