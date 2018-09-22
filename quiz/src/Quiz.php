<?php
class guidedog{

    private $id;
    private $nome;
    private $email;
    private $senha;
    private $nivel_acesso;
    private $d;
    private $e;
	private $resposta;
	private $respu;


    public function __construct($id=NULL){
        $this->id = $id;
        if ( $id ){
            $con = new PDO(SERVIDOR, USUARIO, SENHA);
            $sql = $con->prepare("SELECT * FROM quiz WHERE id=?");
            $sql->execute(array($this->id));
            $r = $sql->fetchObject();
            if ( $r ){
                $this->pergunta = $r->pergunta;
                $this->a = $r->a;
                $this->b = $r->b;
                $this->c = $r->c;
                $this->d = $r->d;
                $this->e = $r->e;
				$this->resposta = $r->resposta;
				$this->respu = $r->respu;
            }
        }
    }

    public function getPergunta(){ return $this->pergunta; }
    public function getA(){ return $this->a; }
    public function getB(){ return $this->b; }
    public function getC(){ return $this->c; }
    public function getD(){ return $this->d; }
    public function getE(){ return $this->e; }
	public function getresposta(){ return $this->resposta; }

    public function set($u){
        $this->pergunta = $u['pergunta'];
        $this->a = $u['a'];
        $this->b = $u['b'];
        $this->c = $u['c'];
        $this->d = $u['d'];
        $this->e = $u['e'];
		$this->resposta = $u['resposta'];
		//$this->respu = $u['respu'];
    }

    public function view(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT * FROM quiz WHERE id=?");
        $sql->execute(array($this->id));
        $r = $sql->fetchObject();

        if ( $r ){
            $this->pergunta = $r->pergunta;
            $this->a = $r->a;
            $this->b = $r->b;
            $this->c = $r->c;
            $this->d = $r->d;
            $this->e = $r->e;
			$this->resposta = $r->resposta;
        }
		//echo "<style> .table1{ background-color: black; color: white } </style>";
        echo "<table class='table table-bordered table1'>";
        echo "<tr><td class='col-md-2'>ID</td><td class='col-md-10'>$this->id</td></tr>";
        echo "<tr><td>Pergunta</td><td>$this->pergunta</td></tr>";
        echo "<tr><td>a)</td><td>$this->a</td></tr>";
        echo "<tr><td>b)</td><td>$this->b</td></tr>";
        echo "<tr><td>c)</td><td>$this->c</td></tr>";
        echo "<tr><td>d)</td><td>$this->d</td></tr>";
        echo "<tr><td>e)</td><td>$this->e</td></tr>";
		echo "<tr><td>RESPOSTA)</td><td>$this->resposta</td></tr>";
        echo "</table>";
    }

    public function add(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("INSERT INTO quiz (id, pergunta, a, b, c, d, e, resposta) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
        $sql->execute(array($this->pergunta, $this->a, $this->b, $this->c, $this->d, $this->e, $this->resposta));

        if ( $sql->errorCode()=='00000' ){
            $_SESSION['msg']="<div class='alert alert-success'>Registro inserido</div>";
            header("Location: ./");
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[2]."</div>";
        }
    }
	
	
	public function resp(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("INSERT INTO quiz (id, pergunta, a, b, c, d, e, resposta) VALUES (NULL, null, null, null, null, null, null, ?)");
        $sql->execute(array($this->respu));

        if ( $sql->errorCode()=='00000' ){
            $_SESSION['msg']="<div class='alert alert-success'>Registro inserido</div>";
            header("Location: ./");
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[2]."</div>";
        }
    }

    public function update(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        if ( isset($_POST['quiz'])){
            $this->pergunta = $_POST['quiz']['pergunta'];
            $this->a = $_POST['quiz']['a'];
            $this->b = $_POST['quiz']['b'];
            $this->c = $_POST['quiz']['c'];
            $this->d = $_POST['quiz']['d'];
            $this->e = $_POST['quiz']['e'];
			$this->resposta = $_POST['quiz']['resposta'];

            $sql = $con->prepare("UPDATE quiz SET pergunta=?, a=?, b=?, c=?, d=?, e=?, resposta=? WHERE id=?");
            $sql->execute(array($this->pergunta, $this->a, $this->b, $this->c, $this->d, $this->e, $this->resposta, $this->id));

            echo $sql->errorInfo()[2];

            if ( $sql->errorCode()=='00000' ){
                $_SESSION['msg']="<div class='alert alert-success'>Registro alterado</div>";
                header("Location: ./");
            }else{
                $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[2]."</div>";
            }

        }

        $sql = $con->prepare("SELECT * FROM quiz WHERE id=?");
        $sql->execute(array($this->id));
        $r = $sql->fetchObject();

        $this->pergunta = $r->pergunta;
        $this->a = $r->a;
        $this->b = $r->b;
        $this->c = $r->c;
        $this->d = $r->d;
        $this->e = $r->e;
		$this->resposta = $r->resposta;
		$this->respu = $r->respu;
    }

    public function delete(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("DELETE FROM quiz WHERE id=?");
        $sql->execute(array($this->id ));
        if ( $sql->errorCode()=='00000' ){
            $_SESSION['msg']="<div class='alert alert-success'>Registro excluído</div>";
        }else{
            $_SESSION['msg']="<div class='alert alert-danger'><b>ERRO</b> ".$sql->errorCode()[2]."</div>";
        }
        header("Location: ./");
    }

    public function __toString(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT * FROM quiz");
        $sql->execute();
        $quiz = $sql->fetchAll(PDO::FETCH_CLASS);

        $html='';
        $html.= "<div class='pull-right'><a href='add.php' class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Incluir</a></div><br><br>";
		$html.= "<a href='respota.php' class='btn btn-info'>Responder</a> ";
		$html.= "<a href='grafico/grafico.php' class='btn btn-info'>Grafico</a> ";
        if ($quiz){
            $html.= "<table class='table table-bordered'>";
            $html.= "<tr><td>ID</td><td>PERGUNTA</td><td>RESPOSTAS</td><td>Resposta Correta</td></tr>";
            foreach($quiz as $r){
                $html.= "<tr><td>$r->id</td><td>$r->pergunta</td><td>$r->a<br>$r->b<br>$r->c<br>$r->d<br>$r->e</td><td>$r->resposta</td><td>";
                $html.= "<a href='view.php?id=$r->id' class='btn btn-info'>Ver</a> ";
                $html.= "<a href='update.php?id=$r->id' class='btn btn-primary'>Alterar</a> ";
                $html.= "<button type='button' class='btn btn-danger btn-excluir' data-toggle='modal' data-target='#delete-modal-quiz' data-id='$r->id'><i class='fa fa-trash-o' aria-hidden='true'></i> Excluir</button>";
				
                $html.= "</td></tr>";
            }
            $html.= "</table>";
        } else {
            $html.= 'Nenhum registro encontrado';
        }

        return $html;
    }

    public function salvarresp($dados)
    {


       $con = new PDO(SERVIDOR, USUARIO, SENHA);

        foreach($dados as $pergunta => $resposta)
        {
            $sql = $con->prepare("insert into resposta (id, quiz_id, resposta) values(null, ?, ?)");

            $sql -> execute(array($pergunta, $resposta));

            $_SESSION['msg']="<div class='alert alert-success'>Resposta registrada com sucesso</div>";

            header("Location: respota.php");

        }

    }


	
	    public function form(){
        $con = new PDO(SERVIDOR, USUARIO, SENHA);
        $sql = $con->prepare("SELECT * FROM quiz");
        $sql->execute();
        $quiz = $sql->fetchAll(PDO::FETCH_CLASS);

        $html = "<form method='post' action='resp.php'>";

        if ($quiz){
            $html.= "<table class='table table-bordered'>";
            $html.= "<tr><td>ID</td><td>PERGUNTA</td><td>Alternativas</td></tr>";
            foreach($quiz as $r){
                $html.= "<tr><td>$r->id</td>
                         <td>$r->pergunta</td>
                         <td>
                         <input type='radio' value='a' name='$r->id'>$r->a<br>
                         <input type='radio' value='b' name='$r->id'>$r->b<br>
                         <input type='radio' value='c' name='$r->id'>$r->c<br>
                         <input type='radio' value='d' name='$r->id'>$r->d<br>
                         <input type='radio' value='e' name='$r->id'>$r->e</td>";
                $html.= "</td></tr>";

            }
            $html.= "</table>";
        } else {
            $html.= 'Nenhum registro encontrado';
        }

        $html.="<button type='submit' class='btn btn-success'>Enviar Resposta</button>";
        $html.= "<a href='index.php' class='btn btn-info'>Voltar</a> ";
        $html.="</form>";
        return $html;
    }
}