<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";


    if(isset($_POST['token']) && password_verify('addStudent', $_POST['token'])){
        $sname = test_input($_POST['sname']);
        $email = test_input($_POST['email']);
        // $uid = test_input($_POST['uid']);
        $cid = test_input($_POST['cid']);

        $query = $db->prepare('SELECT * FROM student where email=?');
        $data = array($email);
        $execute =  $query->execute($data);

        if($query->rowcount()>0){
            echo "Student Already Exist";
        }
        else{
            if(($sname !='')){
                $query = $db->prepare('INSERT INTO student(name,email, cid, password) values(?,?,?,?)');
                $data = array($sname,$email,$cid,password_hash(123456, PASSWORD_DEFAULT));
                $execute = $query->execute($data);
                if($execute){
                    echo "Student Added successfully";
                }
                else {
                    echo "Something went wrong";
                }
            }
        }

    }
    else {
        echo "Server Error";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>