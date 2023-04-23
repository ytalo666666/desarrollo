<?php
    session_start();
    require_once ('../../controlador/serv.php');
    if(isset($_SESSION['usuario'])){
        header('Content-Type: text/html; charset=UTF-8');
?>
<?php
    // incluir 2 archivos php   
    require_once '../../modelo/cliente.entidad.php'; // 
    require_once '../../controlador/cliente.model.php'; // 


    // Logica creas dos objetos de modelo y cliente 
    //cliente entidad
    $alm = new cliente();
   
    //clientemodelo
    $model = new clienteModel();



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
                $alm->__SET('nom', $_REQUEST['nom']);
                $alm->__SET('ape', $_REQUEST['ape']);
                $alm->__SET('dir', $_REQUEST['dir']);
                $alm->__SET('fnac', $_REQUEST['fnac']);
                $alm->__SET('sex', $_REQUEST['sex']);
                $model->Actualizar($alm);
                header('Location: cliente.php');
                break;
//en este caaso asemos la  el caso   de regisdtrar y asi todos 
            case 'registrar':
                $alm->__SET('cod', $_REQUEST['cod']);
                $alm->__SET('nom', $_REQUEST['nom']);
                $alm->__SET('ape', $_REQUEST['ape']);
                $alm->__SET('dir', $_REQUEST['dir']);
                $alm->__SET('fnac', $_REQUEST['fnac']);
                $alm->__SET('sex', $_REQUEST['sex']);               
                $model->Registrar($alm);
                header('Location: cliente.php');
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
                                    <label for="nom" >Nombre de cliente :</label>
                                    <input type="text" name="nom" placeholder="Nombre" required size="50" class="form-control" value="<?php echo $alm->__GET('nom'); ?>"><br>
                                    <label for="ape" >Apellido de cliente :</label>
                                    <input type="text" name="ape" placeholder="Marca" required size="50" class="form-control" value="<?php echo $alm->__GET('ape'); ?>"><br>
                                    <label for="dir" >Dirección de cliente :</label>
                                    <input type="text" name="dir" placeholder="Dirección" required size="50" class="form-control" value="<?php echo $alm->__GET('dir'); ?>"><br>
                                    <label for="fnac" >Fecha de nacimiento :</label>
                                    <input type="date" name="fnac" placeholder="" required size="50" class="form-control" value="<?php echo $alm->__GET('fnac'); ?>"><br>
                                    <label for="sex" >Sexo de cliente :</label>
                                    <input type="text" name="sex" placeholder="M" required size="50" class="form-control" value="<?php echo $alm->__GET('sex'); ?>"><br>
                                    <br>
                                    <br>
                                    <br>
                                </fieldset>
                                 <center>
                                     <input type="submit" value="Añadir cliente"><br><br>
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
                                    <td><?php echo $r->__GET('nom'); ?></td>
                                    <td><?php echo $r->__GET('ape'); ?></td>
                                    <td><?php echo $r->__GET('dir'); ?></td>
                                    <td><?php echo $r->__GET('fnac'); ?></td>
                                    <td><?php echo $r->__GET('sex'); ?></td>
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
