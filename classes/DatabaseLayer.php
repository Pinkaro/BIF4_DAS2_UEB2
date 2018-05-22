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

    private $salt = "#Ssa1&T";
    private $host = "localhost";
    private $user = "Servah";
    private $db_password = "Patrisch";
    private $dbname = "bif4_das2_ueb2_db";

    public function connectToDB() {
        $conn = new mysqli($this->host, $this->user, $this->db_password, $this->dbname);
        return $conn;
    }

    public function checkUser($email, $password){
        $connection = $this->connectToDB();
        $dbUser_password = $password . $this->salt;
        $query = "SELECT Password FROM user 
                  WHERE Email = ?";

        $statement = $connection->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $statement->store_result();
        $statement->get_result();

        if($statement->num_rows > 1){
            die("Expected single result but got multiple.");
        }

        $statement->bind_result($hash);

        $statement->fetch();

        $connection->close();
        $statement->close();

        return password_verify($dbUser_password, $hash);
    }

    public function login($email, $password)
    {
        $connection = $this->connectToDB();
        $dbUser_password = $password . $this->salt;
        $query = "SELECT Password FROM user 
                  WHERE Email = ?";

        $statement = $connection->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $statement->store_result();
        $statement->get_result();

        if($statement->num_rows > 1){
            die("Expected single result but got multiple.");
        }

        $statement->bind_result($hash);

        $statement->fetch();

        $connection->close();
        $statement->close();

        if(password_verify($dbUser_password, $hash)){
            echo "Password correct";
            $user_browser = $_SERVER['HTTP_USER_AGENT'];
            $_SESSION['username'] = $email;
            $_SESSION['login_string'] = hash('sha512',
                $hash . $user_browser);
            return true;
        }
        else{
            echo "Password incorrect";
            return false;
        }
    }

    // only used for creating users with right hashes
    public function createUserNormal($email, $password){
        $connection = $this->connectToDB();

        $password = $password . $this->salt;
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO user (email, password)
                  VALUES (?,?)";

        $statement = $connection->prepare($query);
        $statement->bind_param("ss",$email, $password);
        $statement->execute();

        $connection->close();
        $statement->close();
    }

    public function getDigestHash($email){
        $connection = $this->connectToDB();

        $query = "SELECT DigestHash FROM user
                  WHERE Email = ?";

        $statement = $connection->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        $statement->store_result();
        $statement->get_result();

        if($statement->num_rows > 1){
            die("Expected single result but got multiple.");
        }

        $statement->bind_result($digestHash);
        $statement->fetch();

        $statement->close();
        $connection->close();

        return $digestHash;
    }

    public function updateUserDigestHash($email, $realm, $password){
        $connection = $this->connectToDB();
        $digestHash = md5($email.":".$realm.":".$password);

        $query = "UPDATE user
                  SET DigestHash = ?
                  WHERE Email = ?";

        $statement = $connection->prepare($query);
        $statement->bind_param("ss", $digestHash, $email);
        $statement->execute();

        $connection->close();
        $statement->close();
    }

    public function checkLogin(){
        if(isset($_SESSION['username'], $_SESSION['login_string'])){
            $username = $_SESSION['username'];
            $login_string = $_SESSION['login_string'];

            $user_agent = $_SERVER['HTTP_USER_AGENT'];

            $dbConnection = $this->connectToDB();
            $query = "SELECT Password FROM user
                      WHERE Email = ? LIMIT 1";

            if($statement = $dbConnection->prepare($query)){
                $statement->bind_param("s", $username);
                $statement->execute();
                $statement->store_result();

                if($statement->num_rows == 1){
                    $statement->bind_result($password);
                    $statement->fetch();

                    $login_checkString = hash('sha512', $password . $user_agent);

                    if(hash_equals($login_checkString, $login_string)){
                        return true;
                    }
                    else{
                        return false;
                    }
                }
                else{

                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function createUserGoogle(){

    }

    public function checkGoogleUser(){

    }
}
