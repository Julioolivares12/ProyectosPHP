<?php 
   /* clase que envuelve una instancia de la clase PDO
   para el manejo de la base de datos */
    
   require_once 'mysql_login.php';

   class Database {
       /* unica instancia de la clase */
       private static $db= null;

       /**instancia de PDO */
       private static $pdo;

       final private function __construct(){
           try{
               /**crea una nueva conexion con PDO */
               self::getDb();
               $this->getDb()->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
           }catch(PDOException $e){
               // para manejar excepciones
           }
       }

       /**Retorna en la unica instancia de la clase 
        * @return Database| null
        */
        public static function getInstance(){
            if(self::$db===null){
                self::$db=new self();
            }
            return self::$db;
        }
        /**crear una nueva conexion PDO basada en los datos de conexion
         * @return PDO objeto PDO
         */
        public function getDb(){
            if(self::$pdo==null){
                self::$pdo= new PDO('mysql:dbname='.DATABASE.
                ';host='.HOSTNAME.
                ';port:3306;',
                USERNAME
                ,PASSWORD
                ,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
            );
            // hablita las execepciones
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
            return self::$pdo;
        }
        /**Evita la clonacion del objeto */
        final protected function __clone(){

        }
        function __destructor(){
            self::$pdo=null;
        }
   }