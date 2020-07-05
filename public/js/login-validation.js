            var myinput = document.querySelectorAll('input');
            for(var i=0; i<myinput.length; i++)
            myinput[i].addEventListener('change', validateForm);

        function validateForm(){
    var sbm = document.getElementById('login');
    var email = document.getElementById('email').value;
    var password = document.getElementById('pass').value;
     if (email !== '' && password !== '') sbm.disabled = false;
    }