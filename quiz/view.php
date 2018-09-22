<?php
require_once "config.php";
require_once "src/Quiz.php";
$quiz = new Quiz($_GET['id']);
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <title>TPA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<style>
	
	.jumbo{
		
		background-color: darkgreen;
		color: black;
		
	}
	
	
	
	</style>
	
</head>
<body>
<div class="jumbotron text-center jumbo">

    <h1>Cadastro de Perguntas</h1>
	
</div>

<div class="container">
    <?php $quiz->view(); ?>

    <a href="./" class="btn btn-default">Voltar</a>

</div>
</body>
</html>
