<?php
session_start();
if (!empty($_POST['token'])) {
    if (hash_equals($_SESSION['token'], $_POST['token'])) {
        echo "correct CSRF token";
    } else {
        echo "wrong token";
    }
}