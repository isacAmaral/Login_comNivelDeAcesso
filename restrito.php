<?php
// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION))session_start();
$nivel_necessario=2;

// Verifica se não há a variável da sessão que identifica o usuário
if(!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)){

    // Redireciona o visitante de volta pro login
    session_destroy();
    header("Location: index.php");
}?>
<h1>Pagina restrita</h1>
<p>Olá, <?php echo $_SESSION['UsuarioNome'];?></p>
<form action="logout.php">
  <input type="submit" value="Sair">
</form>
