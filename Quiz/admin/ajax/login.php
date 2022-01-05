<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('adminlogin', $_POST['token'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $query = $db->prepare('SELECT * FROM users_details WHERE email=? AND roles=?');
        $data = array($email, 'admin');
        $execute = $query->execute($data);
        if($query->rowcount() > 0){
            while($datarow=$query->fetch()){
                if(password_verify($password, $datarow['password'])){
                    $_SESSION['id'] = $datarow['uid'];
                    $_SESSION['adminName'] = $datarow['name'];
                    echo 0;
                }
                else {
                    echo "Password NOT Correct";
                }
            }
            // Counting datarow and storing in session variables
            $query = $db->prepare('SELECT * FROM class');
            $data = array();
            $execute =  $query->execute($data);

            $_SESSION['classCount'] = $query->rowcount();

            $query = $db->prepare('SELECT * FROM university');
            $data = array();
            $execute =  $query->execute($data);

            $_SESSION['universityCount'] = $query->rowcount();

            $query = $db->prepare('SELECT * FROM teacher');
            $data = array();
            $execute =  $query->execute($data);

            $_SESSION['teacherCount'] = $query->rowcount();
        }
        else {
            echo "You are not an Admin.";
        }
    }
    else {
        echo "Server Error";
    }
?>