<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login on twitter/Twitter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>
<body>
     <div class="wrapper">
        <svg viewBox="0 0 24 24">
            <g>
                <path d="M23.643 4.937c-.835.37-1.732.62-2.675.733.962-.576 1.7-1.49 2.048-2.578-.9.534-1.897.922-2.958 1.13-.85-.904-2.06-1.47-3.4-1.47-2.572 0-4.658 2.086-4.658 4.66 0 .364.042.718.12 1.06-3.873-.195-7.304-2.05-9.602-4.868-.4.69-.63 1.49-.63 2.342 0 1.616.823 3.043 2.072 3.878-.764-.025-1.482-.234-2.11-.583v.06c0 2.257 1.605 4.14 3.737 4.568-.392.106-.803.162-1.227.162-.3 0-.593-.028-.877-.082.593 1.85 2.313 3.198 4.352 3.234-1.595 1.25-3.604 1.995-5.786 1.995-.376 0-.747-.022-1.112-.065 2.062 1.323 4.51 2.093 7.14 2.093 8.57 0 13.255-7.098 13.255-13.254 0-.2-.005-.402-.014-.602.91-.658 1.7-1.477 2.323-2.41z"></path>
            </g>
        </svg>
            <h2>Log in to Twitter</h2>
            <form action="">
                <div class="email">
                    <label for="email">Email</label>
                    <input id="email" type="text" name="email">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input id="pass" type="password" name="password">                   
                </div>
                <button id="login" type="submit" class="btn btn-outline-primary" disabled>Log in</button>
            </form>
     </div>
     <div class="forgot-signup">
         <a href="#">Forgot Password?</a>
         <span>*</span>
         <a href="sign_up.html">Sign up for twitter</a>
     </div>
     <script src="login-validation.js"></script>
</body>
</html>