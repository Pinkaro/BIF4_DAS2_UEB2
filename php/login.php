<html lang="en">
<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="144123911335-3hkig5vl02m9cmohu4rtd990tkohck28.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
<div class="login-page">
    <div class="form">
        <div class="status">
            <?php
            if(isset($_GET['error'])){
                $error = $_GET['error'];

                if($error == 1){
                    echo "<h3>Incorrect login. Try again.</h3>";
                }
            }
            ?>
        </div>
        <form class="login-form" action="./php/loginValidation.php" method="post">
            <label for="email">Email</label>
            <input type="email" required name="email" id="email" placeholder="Email"/>
            <label for="password">Password</label>
            <input type="password" required name="password" id="password" placeholder="password"/>
            <button>login</button>
            <p>Remember me?<input type="checkbox" name="remember" value="1"></p>
            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" align="center"></div>
        </form>
    </div>
</div>

<?php
/**
 * Created by PhpStorm.
 * User: Patrick
 * Date: 22/5/2018
 * Time: 02:31
 */

if(isset($_COOKIE['email'], $_COOKIE['password']))
{
    $email = $_COOKIE['email'];
    $password = $_COOKIE['password'];

    echo "<script>
        document.getElementById('email').value = '$email';
        document.getElementById('password').value = '$password';
        
        </script>";
}


?>

<script>
    function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend:
        var id_token = googleUser.getAuthResponse().id_token;
        console.log("ID Token: " + id_token);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'https://localhost/google/tokensignin.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            console.log('Signed in as: ' + xhr.responseText);
        };
        xhr.send('idtoken=' + id_token);
    };

    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
    }
</script>
</body>
</html>
</html>