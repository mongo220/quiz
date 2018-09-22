<?php
require_once "../config.php";
	
	$con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT quiz_id as id,
SUM(CASE WHEN resposta='a' THEN 1 ELSE 0 END) AS 'a',
SUM(CASE WHEN resposta='b' THEN 1 ELSE 0 END) AS 'b',
SUM(CASE WHEN resposta='c' THEN 1 ELSE 0 END) AS 'c',
SUM(CASE WHEN resposta='d' THEN 1 ELSE 0 END) AS 'd',
SUM(CASE WHEN resposta='e' THEN 1 ELSE 0 END) AS 'e'
FROM resposta
GROUP BY quiz_id;");
		$sql->execute();
        $quiz = $sql->fetchAll(PDO::FETCH_CLASS);
		
		$i=0;
		foreach($quiz as $r)
		{
			$a[$i]=array("y"=>$r->id,"a"=>$r->a,"b"=>$r->b,"c"=>$r->c,"d"=>$r->d,"e"=>$r->e);
			
			$i++;
		}
		
		
		
	

echo json_encode($a);


$_SESSION['a']=$a;


?>