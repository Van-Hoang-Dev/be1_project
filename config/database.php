<?php
define("DB_HOST", "localhost");
define("DB_NAME", "be1_project");
define("DB_USER", "root");
define("DB_PASS", "");

define('BASE_URL', $_SERVER['DOCUMENT_ROOT'] . '/be/project/');

session_start();
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once BASE_URL . "app/models/$classname.php";
});
