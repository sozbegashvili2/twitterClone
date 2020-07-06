<!Doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register on twitter</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/sign_up_style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>
<body>
<header>
    <i class="fab fa-twitter"></i>
</header>
<div class="evrth">
    <div class="row">
        <form class="sup_form" method="post" action="/signup">
            <h4>
                Name
            </h4>
            <input type="text" name="full_name">
            <h4>
                Email
            </h4>
            <input type="email" name="email" id="txt_email">
            <div id="email_response" ></div>
            <h4>
                Username
            </h4>
            <input type="text" name="username" id="txt_username">
            <!-- Response -->
            <div id="uname_response" ></div>
            <h4>
                Password
            </h4>
            <input type="password" name="psswd">
            <h4>
                Country
            </h4>
            <input type="text" name="location">
            <h4>
                Gender
            </h4>
            <select name="gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
            </select>
            <h4 id="bold">
                Date of Birth
            </h4>
            <p>
                This will not be shown publicly. Confirm your age to receive the appropriate experience
            </p>
            <input type="date" name="Birthdate">

    </div>
    <div class="row txt">
        <h3>
            Customize your experience
        </h3>
        <h4>
            Track where you see Twitter content across the web
        </h4>
        <p>
            Twitter uses this data to personalize your experience.
            This web browsing history will never be stored with your name, email, or phone number
        </p>
        <p>
            For more details about these setting please visit the <a href=#>Help Center.</a>
        </p>

    </div>
    <button id="signUp" type="submit">Sign Up</button>
</div>
</form>
<script>
    $(document).ready(function(){
        $("#txt_username").keyup(function(){
            var username = $(this).val().trim();
            if(username != ''){
                $.ajax({
                    url: 'check.php',
                    type: 'post',
                    data: {username: username},
                    success: function(response){
                         $('#uname_response').html(response);
                         var resp = document.getElementById('response').innerHTML;
                         var button = document.getElementById('signUp');
                        if (resp == 'Available.') {
                           button.disabled = false;
                        }
                        else if (resp == 'Not Available.')
                        {
                            button.disabled = true;
                        }
                    }

                });
            }

        });
// ---------------------------------------------------------------------------
        $("#txt_email").keyup(function(){
            var email = $(this).val().trim();
            if(email != ''){
                $.ajax({
                    url: 'check.php',
                    type: 'post',
                    data: {email: email},
                    success: function(response){
                        $('#email_response').html(response);
                        var resp = document.getElementById('response').innerHTML;
                        var button = document.getElementById('signUp');
                        if (resp == 'Available.') {
                            button.disabled = false;
                        }
                        else if (resp == 'Not Available.')
                        {
                            button.disabled = true;
                        }
                    }

                });
            }

        });

    });
</script>
</body>
</html>