<?php
require_once "config.php";
require_once "src/Quiz.php";
if( isset( $_POST['quiz'])){
    $quiz = new Quiz();
    $quiz->set($_POST['quiz']);
    $quiz->add();
}
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
    <form action="" method="post">

        <div class="form-group">
            <label for="pergunta">Pergunta</label>
            <input id= "pergunta" class="form-control"  type="pergunta" name="quiz[pergunta]"><br>
        </div>
        <div class="form-group">
            <label for="a">a)</label>
            <input id="a" class="form-control"  type="text" name="quiz[a]">
        </div>
        <div class="form-group">
            <label for="b">b)</label>
            <input id="b" class="form-control"  type="text" name="quiz[b]">
        </div>
        <div class="form-group">
            <label for="c">c)</label>
            <input id="c" class="form-control"  type="text" name="quiz[c]">
        </div>
        <div class="form-group">
            <label for="d">d)</label>
            <input id="d" class="form-control"  type="text" name="quiz[d]">
        </div>
        <div class="form-group">
            <label for="e">e)</label>
            <input id="e" class="form-control"  type="text" name="quiz[e]">
        </div>
		<div class="form-group">
            <label for="resposta">Resposta Correta)</label>
            <input id="resposta" class="form-control"  type="text" name="quiz[resposta]">
        </div>

        <a href="./" class="btn btn-default">Voltar</a>
        <button type="submit" class="btn btn-success">Cadastrar</button>

    </form>

</div>
</body>
</html>

