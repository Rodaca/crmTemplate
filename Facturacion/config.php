<?php


ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("db.php");

    class Config{
        private $categoriaId;
        private $categoriaNombre;
        private $descripcion;
        private $imagen;

        public function __construct($categoriaId=0,$categoriaNombre="",$descripcion="",$imagen=""){

            $this->categoriaId=$categoriaId;
            $this->categoriaNombre=$categoriaNombre;
            $this->descripcion=$descripcion;
            $this->imagen=$imagen;
            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] );
        }
        
        
        
         
        public function setCategoriaId($categoriaId)
        {
                $this->categoriaId = $categoriaId;

                return $this;
        }

         
        public function getCategoriaNombre()
        {
                return $this->categoriaNombre;
        }

        
         
        public function setCategoriaNombre($categoriaNombre)
        {
                $this->categoriaNombre = $categoriaNombre;

                return $this;
        }

         
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        
         
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }

         
        public function getImagen()
        {
                return $this->imagen;
        }

        
         
        public function setImagen($imagen)
        {
                $this->imagen = $imagen;

                return $this;
        }

        public function insertData(){
            try {
                $stm = $this -> dbCnx ->prepare("INSERT INTO categorias (categoriaNombre,descripcion,imagen) values(?,?,?)");
                $stm ->execute([$this->categoriaNombre, $this->descripcion,$this->imagen]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM categorias");
                $stm-> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function delete(){
            try {
                $stm= $this->dbCnx->prepare("DELETE FROM categorias where categoriaId = ?");
                $stm-> execute([$this->categoriaId]);
                return $stm->fetchAll();
                echo "<script>alert('Borrados exitosamente');document.location='facturacion.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectOne(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM categorias where categoriaId = ?");
                $stm-> execute([$this->categoriaId]);
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function update(){
            try {
                $stm= $this->dbCnx->prepare("UPDATE categorias SET categoriaNombre = ?, descripcion=?,imagen=? where categoriaId = ?");
                $stm ->execute([$this->categoriaNombre, $this->descripcion,$this->imagen,$this->categoriaId]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }







    }