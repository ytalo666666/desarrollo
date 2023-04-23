<?php
    session_start();
    require_once ('../../controlador/serv.php');
    if(isset($_SESSION['usuario'])){
        header('Content-Type: text/html; charset=UTF-8');
?>
<?php
    // incluir 2 archivos php   
    require_once '../../modelo/usuario.entidad.php'; // 
    require_once '../../controlador/usuario.model.php'; // 


    // Logica creas dos objetos de modelo y cliente 
    //cliente entidad
    $alm = new usuario();
   
    //clientemodelo
    $model = new usuarioModel();



 //action bienene del el formulario en el metodo post de cliente
    if(isset($_REQUEST['action']))
    {

         // un switch paradependiendoe el action
        switch($_REQUEST['action'])   
        {

            //al precionar el sumit del for mulario se se inserta los datos pero ala bes para que los veas esos datos deven actualisarrse
            //osea dos cosas ala ves el insertar y actualisar
            //_REQUEST resibe los datos de post o get mientras que esos dos solo se resiven a ellos mismos  en metodo post o get 
            case 'actualizar':
                $alm->__SET('cod', $_REQUEST['cod']);
                $alm->__SET('usu', $_REQUEST['usu']);
                $alm->__SET('cor', $_REQUEST['cor']);
                $alm->__SET('cla', $_REQUEST['cla']);
                $alm->__SET('recla', $_REQUEST['recla']);
                $alm->__SET('des', $_REQUEST['des']);
                $model->Actualizar($alm);
                header('Location: usuario.php');
                break;
//en este caaso asemos la  el caso   de regisdtrar y asi todos 
            case 'registrar':
              
                $alm->__SET('usu', $_REQUEST['usu']);
                $alm->__SET('cor', $_REQUEST['cor']);
                $alm->__SET('cla', $_REQUEST['cla']);
                $alm->__SET('recla', $_REQUEST['recla']);
                $alm->__SET('des', $_REQUEST['des']);               
                $model->Registrar($alm);
                header('Location: usuario.php');
                break;

//en esta funcion asemos un switch case dependiendo pero toodo esta en el mismo archibo



                
            case 'eliminar':
                $model->Eliminar($_REQUEST['cod']);
                header('Location: cliente.php');
                break;

                
            case 'editar':
                $alm = $model->Obtener($_REQUEST['cod']);
                break;
        
        }
    }
?>
<!DOCTYPE HTML>
<html lang="es-pe">
	<head>
		<title>BIENVENIDOS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
        <div class="container">
           <div class="row">
                <div class="col-md-2">
                <img src="../img/consorcio.png" class="img img-responsive"><br><br>
                        <a href="#" class="btn btn-info btn-block" role="button">Foros</a> 
                        <a href="#" class="btn btn-info btn-block" role="button">Personal</a>
                        <a href="#" class="btn btn-info btn-block" role="button">Normas técnicas</a>
                        <a href="#" class="btn btn-info btn-block" role="button">Boletines</a>
                        <a href="#" class="btn btn-info btn-block" role="button">Sistema ISO</a>
                        <a href="#" class="btn btn-info btn-block" role="button">Sugerencias</a>
                        <a href="../../controlador/logout.php" class="btn btn-danger btn-block" role="button">Cerrar sesión</a>
                      
                </div>
                <div class="col-md-9">
                    <h1>CONSORCIO</h1>
                   <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">CONSORCIO</a>
                            </div>
                                <ul class="nav navbar-nav">
                                <li><a href="panel.php">Inicio</a></li>
                                <li class="active"><a href="../registro.php">Registro</a></li>
                                <li><a href="../lista.php">Lista</a></li>
                                <li><a href="../consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-12">








                            <form action="?action=<?php echo $alm->cod ?'actualizar' : 'registrar'; ?>" method="post" role="form" enctype="multipart/form-data">
                                
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <center><h2>Ingrese los datos requeridos</h2></center>
                                <fieldset class="form-group">
                                   
                                    
                                <input type="hidden" name="cod" placeholder="Código " required size="10" class="form-control" value="<?php echo $alm->__GET('cod'); ?>"><br>

                                    <input type="text" name="usu" placeholder="Nombre" required size="50" class="form-control" value="<?php echo $alm->__GET('usu'); ?>"><br>
                                    
                                    
                                    <input type="text" name="cor" placeholder="Correo" required size="50" class="form-control" value="<?php echo $alm->__GET('cor'); ?>"><br>
                                    
                                    
                                    <input type="text" name="cla" placeholder="Escribe la contraseña" required size="50" class="form-control" value="<?php echo $alm->__GET('cla'); ?>"><br>
                                    
                                    
                                    <input type="text" name="recla" placeholder="Escribe denuevo la contraseña" required size="50" class="form-control" value="<?php echo $alm->__GET('recla'); ?>"><br>
                                    
                                    
                                    <input type="text" name="des" placeholder="Descripcion" required size="50" class="form-control"  value="<?php echo $alm->__GET('des'); ?>"><br>
                                    
                                    
                                    <br>
                                    <br>
                                    <br>
                                </fieldset>
                                 <center>
                                     <input type="submit" value="Añadir cliente"><br><br>
                                     <a    href="../validar_user.php" class="btn btn-info btn-block" role="button"   style="width: 200px; ">validar user y correo</a>                                 
                                    </center>
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                          
                                </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">	
                            <header>
                                <h2>REGISTRO</h2>
                            </header>
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <th>CÓDIGO</th>
                                        <th>NOMBRES</th>
                                        <th>APELLIDOS</th>
                                        <th>DIRECCIÓN</th>
                                        <th>FECHA NAC</th>
                                        <th>SEXO</th>	
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <?php foreach($model->Listar() as $r): ?>
                                <tr>
                                    <td><?php echo $r->__GET('cod'); ?></td>
                                    <td><?php echo $r->__GET('usu'); ?></td>
                                    <td><?php echo $r->__GET('cor'); ?></td>
                                    <td><?php echo $r->__GET('cla'); ?></td>
                                    <td><?php echo $r->__GET('recla'); ?></td>
                                    <td><?php echo $r->__GET('des'); ?></td>
                                    <td>
                                        <a href="?action=editar&cod=<?php echo $r->cod; ?>">Editar</a>
                                    </td>
                                    <td>
                                        <a href="?action=eliminar&cod=<?php echo $r->cod; ?>">Eliminar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-1">
                    <header>
                        <h2><small>Bienvenido </small><b><?php echo $_SESSION['usuario']; ?></b></h2>
					</header>                   
                </div>
            </div>
			
        </div> 
	</body>
</html>
<?php
}
else{
echo '<script>window.location="iniciar.php"; </script>';
}
$profile=$_SESSION['usuario'];
?>
