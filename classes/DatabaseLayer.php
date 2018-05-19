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

    public function checkUser($email, $password)
    {
        $connection = $this->connectToDB();

        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "SELECT * FROM user 
                  WHERE Email = ? AND Password = ?";

        $statement = $connection->prepare($query);

        $statement->bind_param("ss", $email, $password);
        $statement->execute();
        $statement->store_result();

        $returnValue = false;

        if ($statement->num_rows > 0) {
            $returnValue = true;
        }

        $connection->close();
        $statement->close();

        return $returnValue;
    }

    // only used for creating users with right hashes
    public function createUserNormal($email, $password){
        $connection = $this->connectToDB();

        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO user (email, password)
                  VALUES (?,?)";

        $statement = $connection->prepare($query);
        $statement->bind_param("ss",$email, $password);
        $statement->execute();

        $connection->close();
        $statement->close();
    }

    public function createUserGoogle(){

    }

    public function checkGoogleUser(){

    }
}
