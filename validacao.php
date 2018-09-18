<?php
 if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))){

    header("Location: loginTest.php");
     exit; 
   
}

 $conexao = mysql_connect("localhost","root",""); 

  mysql_select_db('usuarios');


$usuario = mysql_real_escape_string($_POST['usuario']);
$senha = mysql_real_escape_string($_POST['senha']);

$sql = "SELECT 'id', 'nome', 'nivel' FROM 'usuarios' WHERE ('usuario'='".$usuario ."') AND ('senha' = '".sha1($senha) ."') AND ('ativo'=1) LIMIT 1  ";
$query = mysql_query($sql);
$row= mysql_num_rows($query);

 if($row!=1){

    echo "Login Inválido"; exit;
 }else {

    $resultado= mysql_fetch_assoc($query);
 }
if(!isset($_SESSION)) session_start();


$_SESSION['UsuarioID'] = $resultado['id'];
$_SESSION['UsuarioNome'] = $resultado['nome'];
$_SESSION['UsuarioNivel'] = $resultado['nivel'];

 header("Location : restrito.php"); exit;
?>
