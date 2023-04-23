



	

<!DOCTYPE HTML>
<html lang="es-pe">
	<head>
		<title>Pruebas</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/estilos.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>	
	<body>
		<header>
			<!-- Contenedor -->
            <div class="container">
				<!-- fila -->
            	<div class="row">
					<!-- col de 3 -->
                    <div class="col-md-3">                        
                    </div>
					<!-- col de 6 -->
                    <div class="col-md-6">
                        
						<h1 class="text-center">APLICACIÓN CONSORCIO</h1>
					</div>
					<!-- col de 3 -->
                    <div class="col-md-3">					
                    </div>
                </div>
			</div>
		</header>
		<section>
			<!-- Contenedor -->
            <div class="container">
				<!--fila  -->
				<div class="row">
					<div class="col-md-4">						
					</div>
					<div class="col-md-4">


















						<h3 class="text-center">Recuperar Contraseña</h3>		
						
						

						<form method="post" action="../controlador/validar_correo.php">
							<div class="form-group">
								<input type="text" 
									name="usu" 									
									placeholder="Usuario" 
									maxlength="50"
									class="form-control" 
									required/><br>
								<input type="text" 
									name="cor" 
									placeholder="Correo" 
									maxlength="50"
									class="form-control"  
									required/><br>								
							</div>			
							
							



							<input type="submit" 
								value="Ingresar" 
								name="logincontra" 
								class="btn btn-primary"/>
							
							
							
								<input type="reset" 
								value="Borrar" 
								name="restaura" 
								class="btn btn-info"/>
							
							
								<a href="usuario/usuario.php" 
								class="btn btn-success">Regresar</a>
							<br><br>
							
							
							<a href="nuevoregistro.php" class="texto-centrado">Volver a Registrarse?</a>							
					

					
						</form>
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					</div>


					<div class="col-md-4">					
					</div>
				</div>
			</div>
		</section>	
	</body>
</html>
<?php

?>

