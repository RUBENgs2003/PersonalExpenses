<?php include 'templates/header.php' ?>

<div class="animated bounceInDown">
  <div class="container">
    <span class="error animated tada" id="msg"></span>
    <form name="form1" class="box" action="functions/crear-cuenta.php" method="post" id="create-account">
      <h4>Personal<span>Expenses</span></h4>
      <h5>¿A qué esperas? ¡Regístrate!.</h5>
      <input type="text" name="name" placeholder="Nombre completo" autocomplete="off">
        <input type="text" name="email" placeholder="Email" autocomplete="off">
        <i class="typcn typcn-eye" id="eye"></i>
        <input type="password" name="password" placeholder="Contraseña" id="pwd" autocomplete="off">
        <input type="password" name="password2" placeholder="Confirmar contraseña" id="confirm" autocomplete="off">
        <input type="submit" value="Registrarse" class="btn1" onclick="return checkStuff()">
        <div class="register"><span>¿Ya tienes una cuenta? <b><a href="../../index.php">Inicia sesión</a></b>!!</span></div>
      </form>
  </div> 

<?php include 'templates/footer.php' ?>
