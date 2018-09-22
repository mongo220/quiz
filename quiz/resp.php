<?php
require_once "config.php";
require_once "src/Quiz.php";
$quiz = new Quiz();

$quiz->salvarresp($_POST);


?>

