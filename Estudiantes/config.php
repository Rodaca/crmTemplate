<?php


ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);


    require_once("db.php");

    class Config{

        private $id;
        private $nombres;
        private $direccion;
        private $logros;
        private $skill;
        private $ingles;
        private $ser;
        private $review;
        private $especialidad;
        protected $dbCnx;

        public function __construct($id=0,$nombres="",$direccion="",$logros="",$skill="",$ingles="",$ser="",$review="",$especialidad="",){

            $this->id=$id;
            $this->nombres=$nombres;
            $this->direccion=$direccion;
            $this->logros=$logros;
            $this->skill=$skill;
            $this->ingles=$ingles;
            $this->ser=$ser;
            $this->review=$review;
            $this->especialidad=$especialidad;

            $this->dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC] );
        }

        public function setID($id){
            $this-> id =$id;
        }
        
        public function getId(){
            return $this->id;
        }

        public function setNombres($nombres){
            $this->nombres=$nombres;
        }

        public function getNombres(){
            return $this->nombres;
        }

        public function setDireccion($direccion){
            $this->direccion=$direccion;
        }

        public function getDireccion(){
            return $this->direccion;
        }

        public function setLogros($logros){
            $this->logros=$logros;
        }

        public function getLogros(){
            return $this->logros;
        }

        public function getSkill()
        {
                return $this->skill;
        }
        public function setSkill($skill)
        {
                $this->skill = $skill;
        }

        public function getIngles()
        {
                return $this->ingles;
        }
        public function setIngles($ingles)
        {
                $this->ingles = $ingles;
        }

        public function getReview()
        {
                return $this->review;
        }

        public function setReview($review)
        {
                $this->review = $review;
        }

        public function getSer()
        {
                return $this->ser;
        }

        public function setSer($ser)
        {
                $this->ser = $ser;
        }


        public function getEspecialidad()
        {
                return $this->especialidad;
        }

        public function setEspecialidad($especialidad)
        {
                $this->especialidad = $especialidad;
        }

        /* private $id;
        private $nombres;
        private $direccion;
        private $logros;
        private $skill;
        private $ingles;
        private $ser;
        private $review;
        private $especialidad;
        protected $dbCnx; */
        public function insertData(){
            try {
                $stm = $this -> dbCnx ->prepare("INSERT INTO campers (nombres,direccion,logros,skill,ingles,ser,review,especialidad) values(?,?,?,?,?,?,?,?)");
                $stm ->execute([$this->nombres,$this->direccion, $this->logros,$this->skill,$this->ingles,$this->ser,$this->review,$this->especialidad]);
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function selectAll(){
            try {
                $stm= $this->dbCnx->prepare("SELECT * FROM campers");
                $stm-> execute();
                return $stm->fetchAll();
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }
        public function delete(){
            try {
                $stm= $this->dbCnx->prepare("DELETE FROM campers where id = ?");
                $stm-> execute([$this->id]);
                return $stm->fetchAll();
                echo "<script>alert('Borrados exitosamente');document.location='estudiantes.php'</script>";
            } catch (Exception $e) {
                return $e->getMessage();
            }
        }


      

        
    }

    



?>