<?php
require_once "../config.php";

$con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT * FROM quiz WHERE id=?");
       
		
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Grafico</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="lib/bootstrap.min.css">
    <link rel="stylesheet" href="lib/ionicons.min.css">
    <link rel="stylesheet" href="lib/morris.css">
    <link rel="stylesheet" href="lib/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
	
	<style>
		
		.jumbo{
			background-color: green;
			color: black;
		}
		
		.btn1
		{
			width: 50%;
		}
		
	
	</style>
</head>
<body>
<div class = "jumbotron text-center jumbo">
<h1>Grafico de respostas</h1>
</div>

<div class="container">
    <div class="box-body chart-responsive">
        <div class="chart" id="bar-chart" style="height: 300px;"></div>
		
		<a href="../" class="btn1 btn btn-danger">Voltar</a>
    </div>
</div>

</body>

<script src="lib/jquery.min.js"></script>
<script src="lib/bootstrap.min.js"></script>
<script src="lib/raphael.min.js"></script>
<script src="lib/morris.min.js"></script>
<div>
<script>
    $(function () {
        var data4 = {};

        $.ajax({
            url: "data4.php",
            async: false,
            dataType: 'json',
            success: function(data) {
                data4 = data;
            }
        });

        var bar = new Morris.Bar({
            element: 'bar-chart',
            resize: true,
            data: data4,
            barColors: ['blck', 'red', 'green', 'blue', 'gray'],
            xkey: 'y',
            ykeys: ['a', 'b','c','d','e'],
            labels: ['resposta a', 'resposta b', 'resposta c', 'resposta d', 'resposta e'],
            hideHover: 'auto'
        });

    });
	
		
</script>

</div>
</body>
</html>
