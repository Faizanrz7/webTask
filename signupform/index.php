<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src=" https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Signup Form</title>
</head>
<body>
    <section>
		<div class="col-sm-12">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="col-sm-12">
                    <form class=" formContainer">
                        <div class="form" id="signup">
                            <div class="heading">
                                <p>Signup Form</p>
                            </div>
                            <div class="name">
                                <input type="text" id="signup-fname" name="signup-fname" placeholder="First Name" class="form-control">
                                <input type="text" id="signup-lname" name="signup-lname" placeholder="Last Name" class="form-control">
                            </div>
                            <div>
                                <input type="email" id="signup-email" name="signup-email" placeholder="Email" class="form-control">
                            </div>
                            <div>
                                <select name="gender" id="gender" placeholder="Gender" class="form-control">
                                    <option value="" selected>Gender</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div>
                                <input type="password" id="signup-password" name="signup-password" placeholder="Password" class="form-control">
                            </div>
                            <div>
                                <input type="password" id="signup-confirmpassword" name="signup-confirmpassword" placeholder="Confirm Password" class="form-control">
                            </div>
                            <div class="submit-button">
                                <input type="submit" id="signup-submit" name="submit" onclick="signup()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </section>

    <script>
        $('form').submit(function(e) {
        e.preventDefault();
        });

        function signup() {
            var fname = $('#signup-fname').val();
            var lname = $('#signup-lname').val();
            var name = fname + " " + lname;
            console.log(name);
            var signupEmail = $('#signup-email').val();
            var gender = $('#gender').val();
            var signupPass = $('#signup-password').val();
            var signupConfrmPass = $('#signup-confirmpassword').val();
            var token = "<?php echo password_hash("signuptoken", PASSWORD_DEFAULT);?>";
            if(signupEmail != "" && signupPass != "" && signupConfrmPass != "" && name !="" && gender != ""){
                if(signupPass === signupConfrmPass){
                    $.ajax({
                        type:'POST',
                        url:"ajax/signup.php",
                        data:{email: signupEmail, password: signupPass, confirmPass: signupConfrmPass, name: name,gender: gender, token:token},
                        success:function(data){
                            alert(data);
                        }
                    });
                }
                else {
                    alert("Password and Confirm Password should match")
                }
            }
            else {
                alert("Fill all the fields");
            }
        }
        
        </script>
</body>
</html>