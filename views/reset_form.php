<?php
$token = $token ?? false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="css/password_reset.css">
</head>
<body>
<header>
    <a href="/">
        <img src="data:image/png;base64,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" alt="twitterClone">
    </a>
    <h4>Password Reset</h4>
</header>
<article>
    <div class="wrap">
        <h2>Reset Password</h2>
        <form action="/reset_form" method="post">
            <p>Enter new password</p>
            <input type="password" name="password" id="pass1">
            <p>Confirm password</p>
            <input type="password" name="confirmPassword" id="pass2">
            <input type="hidden" name="token" value="<?php if(isset($token)) echo $token; ?>">
            <button class="btn btn-primary" type="submit" id="sbm" disabled>Change</button>
        </form>
    </div>
</article>
<script>
     var inputs = document.querySelectorAll('input[type="password"]');
     for (let i = 0;i<inputs.length;i++) {
         inputs[i].addEventListener('change', validate);
     }
     function validate(){
         var sbm = document.getElementById('sbm');
         var pass1 = document.getElementById('pass1').value;
         var pass2 = document.getElementById('pass2').value;
         if (pass1 == pass2) sbm.disabled = false;
     }
</script>
</body>
</html>