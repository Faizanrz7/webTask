<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('teacherlogin', $_POST['token'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        // $query = $db->prepare('SELECT * FROM teacher WHERE email=?');
        $query = $db->prepare('SELECT * FROM teacher WHERE email=?');

        $data = array($email);
        $execute = $query->execute($data);
        // echo $query->fetch();
        if($query->rowcount() > 0){
            while($datarow=$query->fetch()){
                // echo $datarow;
                if(password_verify($password, $datarow['password'])){
                    $_SESSION['teacherName'] = $datarow['name'];
                    $_SESSION['cid'] = $datarow['cid'];
                    echo 0;
                }
                else {
                    echo "Password NOT Correct";
                }
            }
        }
        else {
            echo "You are not registered.";
        }
    }
    else {
        echo "Server Error";
    }
?>