<?php
    
    require "code-login.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title> Monterrey IV </title>
	<link rel="stylesheet" href="css/estilos.css">

	<meta name="viewport" content="width=device-width, user-scalable=no, inicial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
</head>
<body>

	<div class="container-all">
		<div class="ctn-form">
			<img src="images/logo.jpg" alt="" class="logo">
			<h1 class="title">Iniciar Sesion</h1>


				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<label for="">Email</label>
					<input type="text" name="email">
					<span class="msg-error"><?php echo $email_err; ?></span>
					<label for="">Contraseña</label>
					<input type="password" name="password">
					<span class="msg-error"><?php echo $password_err; ?></span>

					<input type="submit" value="Iniciar">
				</form>

				<span class="text-footer">¿Aun no te has registrado?
					<a href="register.php"> Registrate </a></span>
				</div> 
	<div class="ctn-text">
		<div class="capa"> </div> 
		<h1 class="title-description"> TEXTO TEXTO </h1>
		<p class="text-description"> OTRO TEXTO </p>
		</div>

		</div> 

</body>
</html>