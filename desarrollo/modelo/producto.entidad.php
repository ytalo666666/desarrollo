<?php
    class Producto
    {
        private $cod;
        private $nom;
        private $mar;
        private $pre;
        private $codprov;
        private $codcat;
        
        public function __GET($k){
            return $this->$k;
        }
        public function __SET($k,$v){
            return $this->$k = $v;
        }
    }
?>