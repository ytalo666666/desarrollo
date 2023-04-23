<?php
    // Definiendo una Clase : Cliente
    class Usuario
    {
        // Atributos de la Clase
        private $cod; 
        private $usu;
        private $cor;
        private $cla;
        private $recla;
        private $des;
        
        // Gets
        public function __GET($k){
            return $this->$k;
        }

        // Sets
        // k es el atributo de la clase
        public function __SET($k,$v){
            return $this->$k = $v;
        }
    }
?>