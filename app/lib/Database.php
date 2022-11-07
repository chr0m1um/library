<?php

// class to connect to database and run PDO queries
class Database 
{
    private $host = HOST;
    private $user = USER;
    private $password = PASSWORD;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct() 
    {
        // set up connection
        $con = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $options = [
            PDO::ATTR_PERSISTENT  => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        // create a PDO instance
        try {
            $this->dbh = new PDO($con, $this->user, $this->password, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql) 
    {
        $this->stmt = $this->dbh->prepare($sql);
    }
    // bind the query
    public function bind($param, $value, $type = null) 
    {
        if(is_null($type)) {
            switch(true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                break;
                default:
                    $type = PDO::PARAM_STR;
                break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // run the query
    public function execute() 
    {
        return $this->stmt->execute();
    }

    // get the records
    public function records() 
    {
        $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ); //PDO returns an object with the column names
    }

    // get the one record
    public function record() 
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // get number of rows
    public function rowCount() 
    {
        $this->execute();
        return $this->stmt->rowCount();
    }
}

?>