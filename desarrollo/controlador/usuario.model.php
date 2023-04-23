<?php
    // Clase ClienteModel
    class UsuarioModel
    {
        // Atributo pdo
        private $pdo;

        // Constructor de ClienteModel
        public function __CONSTRUCT()
        {
            // bloque detectar errores
            try 
            {
                //$this->pdo = new PDO('mysql:host=localhost;dbname=id20511542_consorcio','id20511542_ytalo','M$z}bXiC\r148lw(');
                $this->pdo = new PDO('mysql:host=localhost;dbname=consorcio','root','');
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            }
            catch(Exception $e)
            {
                die($e->getMessage());
            }
        }






















        // Metodo Listar
        public function Listar(){
            try
            {
              // arreglo   
              $result = array();
              // consulta sql
              $stm = $this->pdo->prepare("SELECT * FROM usuario");
              // ejecutar consulta
              $stm->execute();
              // revisar los resultados
              foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
                {
                    // Objeto Cliente
                  $alm = new Usuario();
                  // Asignar valores a los atributos
                  $alm->__SET('cod', $r->idusuario);
                  $alm->__SET('usu', $r->usuario);
                  $alm->__SET('cor', $r->correo);
                  $alm->__SET('cla', $r->clave);
                  $alm->__SET('recla', $r->reclave);
                  $alm->__SET('des', $r->descripcion);


                  // el arreglo recibe datos del objeto
                  $result[] = $alm;
                }
                // se acaba el for
                // devuelve el listado
                return $result;
            }
            catch(Exception $e)
            {
                // si existe un error 
              die($e->getMessage());
            }
        }





























        // Metodo Obtener solo el registro del codigo
        public function Obtener($cod)
        {
            try
            {
                $stm = $this->pdo
                ->prepare("SELECT * FROM usuario WHERE idusuario = ?");

                $stm->execute(array($cod));

                $r = $stm->fetch(PDO::FETCH_OBJ);

                $alm = new Usuario();

                $alm->__SET('cod', $r->idusuario);
                $alm->__SET('usu', $r->usuario);
                $alm->__SET('cor', $r->correo);
                $alm->__SET('cla', $r->clave);
                $alm->__SET('recla', $r->reclave);
                $alm->__SET('des', $r->descripcion);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }   
        }







        // Metodo Obtener solo contraseña por el correo
        public function Obtenercontra($cor)
        {
            try
            {
                $stm = $this->pdo
                ->prepare("SELECT * FROM usuario WHERE correo = ?");

                $stm->execute(array($cor));

                $r = $stm->fetch(PDO::FETCH_OBJ);

                $alm = new Usuario();

                $alm->__SET('cod', $r->idusuario);
                $alm->__SET('usu', $r->usuario);
                $alm->__SET('cor', $r->correo);
                $alm->__SET('cla', $r->clave);
                $alm->__SET('recla', $r->reclave);
                $alm->__SET('des', $r->descripcion);
                return $alm;
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }   
        }


























        // Metodo Eliminar
        public function Eliminar($cod)
        {
            try
            {
                // Eliminar
                $stm = $this->pdo
                ->prepare("DELETE FROM cliente WHERE cod = ?");
                // Ejecutar orden
                $stm->execute(array($cod));
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }



























        // Metodo Actualizar
        public function Actualizar(usuario $data)
        {
            try
            {

                $sql = "UPDATE usuario SET
                usuario = ?,
                correo = ?,
                clave = ?,
                reclave= ?,
                descripcion = ?
                WHERE idusuario = ?";
                $this->pdo->prepare($sql)
                ->execute(
                array(
                $data->__GET('usu'),
                $data->__GET('cor'),
                $data->__GET('cla'),                
                $data->__GET('recla'),
                $data->__GET('des'),
                $data->__GET('cod')
                )
                );
            } 
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }



























        // Metodo Registrar
        public function Registrar(Usuario $data)
        {
            try
            {
                $sql = "INSERT INTO usuario (usuario,correo,clave,reclave,descripcion) VALUES ( ?, ?, ?,?,?)";

                $this->pdo->prepare($sql)->execute (  array(
                
                    $data->__GET('usu'),
                $data->__GET('cor'),
                $data->__GET('cla'),
                $data->__GET('recla'),
                $data->__GET('des'),
               
               
                )
               
            
               );

            }   
            catch (Exception $e)
            {
                die($e->getMessage());
            }
        }
    } 
    
    






















?>