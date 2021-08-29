<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('studentlogin', $_POST['token'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = $db->prepare('SELECT * FROM users_details WHERE email=?');
        $data = array($email);
        $execute = $query->execute($data);
        if($query->rowcount() > 0){
            while($datarow=$query->fetch()){
                // echo $password;
                // echo password_needs_rehash($datarow['password'], PASSWORD_DEFAULT);
                if(password_verify($password, $datarow['password'])){
                // if($password == $datarow['password']){
                    // echo  $datarow['password'];
                    $_SESSION['id'] = $datarow['uid'];
                    $_SESSION['name'] = $datarow['name'];
                    echo 0;
                }
                else {
                    echo "Password NOT Correct";
                }
            }
        }
        else {
            echo "Please Ask your Teacher to add you.";
        }
    }
    else {
        echo "Server Error";
    }
?>