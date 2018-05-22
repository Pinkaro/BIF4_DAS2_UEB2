<?php
/**
 * Created by PhpStorm.
 * User: schal
 * Date: 14/05/2018
 * Time: 13:24
**/
include '../classes/DatabaseLayer.php';

if($_POST && !empty($_POST))
{

    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($_POST['remember']))
    {
        setcookie('email', $email, time()+60+60*7, '/', null, true, true);
        setcookie('password', $password, time()+60+60*7, '/', null, true, true);
    }

    $DatabaseLayer = new DatabaseLayer();

    //$DatabaseLayer->createUserNormal($email, $password);
    if($DatabaseLayer->login($email, $password)){
        header("Location: http://localhost/BIF4_DAS2_UEB2/php/contactUsForm.php");
        die();
    }else{
        header("Location: http://localhost/BIF4_DAS2_UEB2/index.php?error=1");
        die();
    }
}
