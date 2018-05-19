<?php
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$token = $_SESSION['token'];
?>

<html lang="en">
<head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="144123911335-3hkig5vl02m9cmohu4rtd990tkohck28.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>
<div class="login-page">
    <div class="form">
        <form class="login-form" action="CSRFTokenExample.php" method="post">
            <input type="hidden" name="token" value="<?php echo $token; ?>" />
            <label for="name">Name</label>
            <input type="text" name='name' label='name' placeholder="name"/>
            <label for="email">Email</label>
            <input type="text" name='email' label='email' placeholder="email"/>
            <label for="question">Question</label>
            <input type="text" name='question' label='question' placeholder="question"/>
            <button>Send</button>
        </form>
    </div>
</div>

