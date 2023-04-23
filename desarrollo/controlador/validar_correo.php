<?php




require_once '../modelo/usuario.entidad.php'; // 
require_once 'usuario.model.php'; // 


	// si viene del iniciar.php si se preciono el sutmit
	if(isset($_POST['logincontra'])){

								$entro=false;
								
								$email=$_POST['cor'];
								// incluir archivo serv.php
								require_once('serv.php');
								$registros = "SELECT usuario FROM usuario WHERE  correo='$email'";
								// bucle






								// LE PASO LA CONECCION que tambien es un objeto pdo  $b con el metodo query () pasandole la consulta y almasenandola en $fila
								foreach($db->query($registros) as $fila) {
									$entro = true;
								
								}	


								$db = null;
								if ($entro){

											
												// Logica creas dos objetos de modelo y cliente 
												//cliente entidad
												$alm = new usuario();
											
												//clientemodelo
												$model = new usuarioModel();
													


												$alm = $model->Obtenercontra($email);


												$contra = $alm->__GET('cla');



														$asunto ="RECUPERAR CONTRASEÑA";
														$mensaje = "contraseña  :  $contra\n";
														$mensaje .= "Correo electrónico  :  $email\n";
													

														$headers = 'From: RECUPERAR@ejemplo.com' . "\r\n" .
														'Reply-To: RECUPERAR@ejemplo.com' . "\r\n" .
														'X-Mailer: PHP/' . phpversion();
													
													$resul = @mail( $email,$asunto, $mensaje, $headers);




                                                     // msj en javascript
													// echo '<script>alert("te llegara un mensaje al correo con tu contraseña=  '.$contra.'   "); </script>';

														echo '<script>alert("Te llegara un mensaje a '.$email.' con tu contraseña  "); </script>';
														// ir al login.php
														echo '<script>window.location="../vista/iniciar.php"; </script>';	





								}else{
														// error
														echo '<script>alert("Correo y Usuario no estan registrados "); </script>';
														// ir a iniciar.php
														echo '<script>window.location="../vista/R_contra.php"; </script>';	
								}
	
	
	
	
	
	
	
	
	
	}
	
	
	
	
	
	else{
	
		echo '<script>window.location="../vista/R_contra.php"; </script>';
	}













?>

