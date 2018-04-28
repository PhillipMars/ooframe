<?php
/**
 * #00b1b3
 */
// Singliton Pattern
// REgistry Pattern
// Factory Pattern
  class DB extends PDO {
    private static $_instance;// property
    private $table_name;
    private $where;

    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;

    public function __construct(){
      echo "DB Construct<br>";
      $this->engine = 'mysql';
      $this->host = "localhost";
      $this->database = 'wpa28db';
      $this->user = 'root';
      $this->pass = '1234';

      $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
      parent::__construct($dns,$this->user,$this->pass);

    }
    public function __destruct(){
      echo "DB Destruct<br>";
    }
    /**
     * self--> static mathod
     */
    /**
     * $this --> dynamic mathod
     */
    public static function table($table_name){
      if(!self::$_instance instanceof DB){
          self::$_instance = new DB(); // now become dynamic

      }
      self::$_instance->table_name = $table_name;
      return self::$_instance;
    }
    // Get id
    public function where($id, $value) {
     $valuetype = gettype($value);
     // $this->sql = "SELECT * FROM " . $this->table_name . " WHERE " . $id . " = ";
     $this->where = " WHERE " . $id . " = ";
     if($valuetype == "string") {
       $this->where .= "'" . $value . "'";
     } else {
       $this->where .= $value;
     }
     // var_dump($this->sql);
     return $this;
   }

    public function get(){
      $sql = "SELECT * FROM " . $this->table_name . $this->where;
      $this->where = "";
      $prep = $this->prepare($sql);
      $prep->execute();
      $result = $prep->fetchAll(PDO::FETCH_OBJ);
      if($result==false){
        trigger_error("Data Table Not Found ", E_USER_ERROR);
      }
      return $result;
    }

    public function paginate() {
      $this->paginate_status = true;
      $value = ($val - 1) * 4;
      $this->paginate_sql = sprinf("limit 4 offset %s", $value);
      return $this;

    }
  }
 ?>
