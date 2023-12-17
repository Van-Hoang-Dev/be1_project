<?php
require_once 'config/database.php';
//Autoloading spl NOT sql
spl_autoload_register(function ($classname) {
    require_once "app/models/$classname.php";
});

$template = new Template();

$data = [
    "title" => "Home",
    "slot" => $template->render("blocks/home_layout", [])
];

$template->view("layout", $data);
