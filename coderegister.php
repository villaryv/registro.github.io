<?php 

// Incluir archivo de conexion a la base de datos
require_once "conexion.php";

//Definir variables e inicializar con valores vacios

$username = $email = $password = "";
$username_err = $email_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

// VALIDAR IMPUT DE NOMBRE DE USUARIO
if(empty(trim($_POST ["username"]))){

	$username_err = "Por favor,ingrese un nombre de usuario ";

}else{

// prepara una declaracion de seleccion
	$sql = "SELECT id FROM usuarios WHERE usuario = ?";

	if($stmt = mysqli_prepare ($link, $sql)){

		mysqli_stmt_bind_param ($stmt, "s", $param_username);

		$param_username = trim($_POST["username"]);

		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result ($stmt);

			if (mysqli_stmt_num_rows($stmt) ==1) {
				$username_err = "Este nombre de usuario ya esta en uso";

				}else {
					$username =trim($_POST["username"] );
			}

				}else {
					echo "Ups: Algo salio mal, Intentalo mas tarde";

}

}

}


// VALIDAR IMPUT DE NOMBRE DE EMAIL
if(empty(trim($_POST ["email"]))){

	$email_err = "Por favor, ingrese un correo ";

}else{

// prepara una declaracion de seleccion
	$sql = "SELECT id FROM usuarios WHERE email = ?";

	if($stmt = mysqli_prepare ($link, $sql)){

		mysqli_stmt_bind_param ($stmt, "s", $param_email);

		$param_email = trim($_POST["email"]);

		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result ($stmt);

			if (mysqli_stmt_num_rows($stmt) ==1) {
				$email_err = "Este correo ya esta en uso";

				}else {
					$email =trim($_POST["email"] );
			}

				}else {
					echo "Ups: Algo salio mal, Intentalo mas tarde";

}

}

}


// VALIDAR CONTRASEÑA

if(empty(trim($_POST ["password"]))){

	$password_err = "Por favor, ingrese una contraseña ";

}elseif (strlen(trim($_POST["password"]))<4){

	$password_err ="La contraseña debe de tener al menos 4 caracteres";

}else {

	$password = trim($_POST ["password"]);
}


// Comprobando los errores de entrada antes de insertar los datos en la base de datos

if(empty($username_err) && empty($email_err) && empty($password_err)){


	$sql = "INSERT INTO usuarios(usuario, email, clave) VALUES (?, ?, ?)";

	if ($stmt = mysqli_prepare ($link, $sql)){
		mysqli_stm_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

		// Estableciendo parametro
		$param_username = $username;
		$param_email= $email;
		$param_password = password_hash($password, PASSWORD_DEFAULT); // ENCRIPTANDO CONTRASEÑA

		if (mysqli_stmt_execute ($stmt)) {
			header("location: index.php");

			}else{
				echo "Algo salio mal, Intentalo despues";

			
		}

}

}


mysqli_close($link);



}

?>