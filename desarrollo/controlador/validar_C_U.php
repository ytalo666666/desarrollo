<?php

// iniciando
session_start();
// incluir archivo
require_once ('../controlador/serv.php');
// si hay una sesion con un usuario
if(isset($_SESSION['usuario'])){
    // configurar el header de la pagina
    header('Content-Type: text/html; charset=UTF-8');









	// si viene del iniciar.php si se preciono el sutmit
	if(isset($_POST['loginuser'])){

		$entro=false;
		$usu=$_POST['usu'];
		$cor=$_POST['cor'];
        // incluir archivo serv.php
	    require_once('serv.php');
		$registros = "SELECT usuario FROM usuario WHERE usuario ='$usu' AND correo='$cor'";
		// bucle



		// LE PASO LA CONECCION que tambien es un objeto pdo  $b con el metodo query () pasandole la consulta y almasenandola en $fila
		foreach($db->query($registros) as $fila) {
            $entro = true;
		
		}	
		$db = null;
		if ($entro){
            // msj en javascript
			echo '<script>alert("Usuario y Correo correcto"); </script>';
			// ir al panel.php
			echo '<script>window.location="../vista/usuario/usuario.php"; </script>';	
        }else{
			// error
			echo '<script>alert("DATOS incorrecto"); </script>';
			// ir a iniciar.php
			echo '<script>window.location="../vista/validar_user.php"; </script>';	
		}
	
	
	
	
	
	
	
	
	
	}
	
	
	
	
	
	else{
		echo '<script>window.location="../vista/iniciar.php"; </script>';
	}












}
?>

