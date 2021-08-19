<?php
    include('connection.php');
    if(isset($_POST['token']) && password_verify('signuptoken', $_POST['token'])){
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        if(($email !='' && $password !='' && $name !='' && $gender != '')){
            $query = $db->prepare('INSERT INTO signupdata(name,gender, email, password) values(?,?,?,?)');
            $data = array($name,$gender, $email, password_hash($password, PASSWORD_DEFAULT));
            $execute = $query->execute($data);
            if($execute){
                echo "user created successfully";
            }
            else {
                echo "something went wrong";
            }
        }
    }
    else {
        echo "token not generated";
    }
?>