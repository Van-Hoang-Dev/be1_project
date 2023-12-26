<?php 
require_once 'config/database.php';

$template = new Template();

$data = [
    "title" => "Comment",
    "slot" => $template->render("blocks/comment_layout", [])
];
$template->view("layout", $data);

