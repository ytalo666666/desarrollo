<?php
    session_start();
    include ('serv.php');
    if(isset($_SESSION['usuario'])){
    header('Content-Type: text/html; charset=UTF-8');
?>
<html>
	<head>
		<title>BIENVENIDOS</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
        <div class="container">
           <div class="row">
                <div class="col-md-2">
                <img src="img/consorcio.png" class="img img-responsive"><br><br>
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
                                <li><a href="registro.php">Registro</a></li>
                                <li ><a href="lista.php">Lista</a></li>
                                <li class="active"><a href="consulta.php">Consulta</a></li>
                            </ul>
                        </div>
                    </nav>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                           <h2>Datos a consultar</h2>
                            <form action="consultapersonal.php" method="POST">
                                <div class="form-group">
                                    <label>Descripcion del personal: </label>
                                    <input type="text" name="query" class="form-control"/>
                                    <input type="submit" name="buscar" value="Buscar" class="btn btn-primary"/>
                                </div>                       
                            </form>
                            <?php
                               if (isset($_POST['query'])){ 
                                   include("serv.php"); 
                                   $letras=$_POST['query'];
                                    $results = "SELECT * FROM personal WHERE nom LIKE '%$letras%'";
                                    echo '<table class="table table-condensed">';
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Codigo</th>";
                                    echo "<th>Nombre</th>";
                                    echo "<th>Apellido</th>";
                                    echo "<th>Dirección</th>";
                                    echo "<th>Fecha nac</th>";
                                    echo "<th>Sexo</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                   foreach($db->query($results) as $fila) {

                                        echo "<tr>";
                                        echo "<td>" .$fila['cod'] . "</td>";
                                        echo "<td>" .$fila['nom'] . "</td>";
                                        echo "<td>" .$fila['ape'] . "</td>";
                                        echo "<td>" .$fila['dir'] . "</td>";
                                        echo "<td>" .$fila['fnac'] . "</td>";
                                        echo "<td>" .$fila['sex'] . "</td>";
                                        echo "</tr>";
                                    }
                                    $dbh = null;
                                    echo "</tbody>";
                                    echo "</table>";
                               }
                            ?>
                        </div>
                        <div class="col-md-1"></div>
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