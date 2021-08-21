<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src=" https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Teacher Login</h1>
        <form action="">
            <input type="email" id="email" placeholder="Email">
            <input type="password" id="password" placeholder="Password" >
            <input type="submit" onclick="login()">
        </form>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
        });

        function login() {
            var email = $('#email').val();
            var password = $('#password').val();
            // alert(email + "  " + password);
            var token = "<?php echo password_hash("studentlogin", PASSWORD_DEFAULT);?>";
            if(password != "" && email !=""){
                $.ajax({
                    type:'POST',
                    url:"ajax/login.php",
                    data:{email: email, password: password, token:token},
                    success:function(data){
                        // alert(data);
                        // window.location = "./dashboard.php";
                        if(data == 0){
                            window.location = "dashboard.php";
                        }
                        else {
                            alert(data); 
                        }
                    }
                });
            }
            else {
                alert("Fill all the fields");
            }
        }
    </script>
</body>
</html>