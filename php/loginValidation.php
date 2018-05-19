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
    $email = $_POST['email'];
    $password = $_POST['password'];

    $DatabaseLayer = new DatabaseLayer();

    $DatabaseLayer->createUserNormal($email, $password);
    
}
