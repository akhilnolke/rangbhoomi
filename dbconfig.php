<?php
class Database
{
   
    private $host = "localhost";
    private $db_name = "mit_rangbhoomi";
    private $username = "mit_rangbhoomi";
    private $password = "9U*sh^rz?AQX";
    public $conn;
     
    public function dbConnection()
   {
     
       $this->conn = null;    
        try
      {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
         $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
        }
      catch(PDOException $exception)
      {
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}

   $DB_HOST = 'localhost';
   $DB_USER = 'mit_rangbhoomi';
   $DB_PASS = '9U*sh^rz?AQX';
   $DB_NAME = 'mit_rangbhoomi';
   
   try{
      $DB_con = new PDO("mysql:host={$DB_HOST};dbname={$DB_NAME}",$DB_USER,$DB_PASS);
      $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }
   catch(PDOException $e){
      echo $e->getMessage();
   }
$connection=mysqli_connect("localhost","mit_rangbhoomi","9U*sh^rz?AQX","mit_rangbhoomi");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>
 