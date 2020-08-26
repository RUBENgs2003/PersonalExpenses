<?php 
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$cerrar_sesion = $_GET['cerrar_sesion'];
if($cerrar_sesion){
  session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PersonalExpenses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="img/coin.ico">
</head>
<body id="particles-js"></body>
<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" method="post" action="functions/login.php" id="login">
      <h4>Personal<span>Expenses</span></h4>
      <h5>Inicia sesión para acceder.</h5>
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
        <input type="submit" value="Iniciar sesión" class="btn1" onclick=" return checkStuff()">
        <div class="register"><span>¿No tienes cuenta? <b><a href="pages/register/index.php">Regístrate</a></b>!!</span></div>
      </form>
  </div> 
       <div class="footer">
      <span>Desarrollado por <b>Rubén García</b></span>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="https://cldup.com/S6Ptkwu_qA.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="js/app.js"></script>
</html>

