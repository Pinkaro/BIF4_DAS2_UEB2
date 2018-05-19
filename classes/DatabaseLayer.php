<?php
/**
 * Created by PhpStorm.
 * User: schal
 * Date: 14/05/2018
 * Time: 14:41
 */

class DatabaseLayer
{
    public function __construct()
    {

    }

    private $host = "localhost";
    private $user = "Servah";
    private $password = "Patrisch";
    private $dbname = "bif4_das2_ueb2_db";

    public function connectToDB() {
        $conn = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        return $conn;
    }

    public function checkUser($email, $password) {

    }

    // only used for creating users with right hashes
    public function createUserNormal($email, $password){
        $connection = $this->connectToDB();

        $query = "INSERT INTO user ()";

        $statement = $connection->prepare("");
    }

    public function createUserGoogle(){

    }

}
