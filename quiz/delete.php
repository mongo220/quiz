<?php
require_once "config.php";
require_once "src/Quiz.php";
$quiz = new Quiz($_GET['id']);
$quiz->delete();
?>