<?php
    include('connection.php');
    session_start();


    if(isset($_POST['token']) && password_verify('addTeacher', $_POST['token'])){
        $tname = test_input($_POST['tname']);
        $email = test_input($_POST['email']);
        $uid = test_input($_POST['uid']);
        $cid = test_input($_POST['cid']);

        $query = $db->prepare('SELECT * FROM teacher where email=?');
        $data = array($email);
        $execute =  $query->execute($data);

        if($query->rowcount()>0){
            echo "Teacher Already Exist";
        }
        else{
            if(($tname !='')){
                $query = $db->prepare('INSERT INTO teacher(name,email,uid,cid, password) values(?,?,?,?,?)');
                $data = array($tname,$email,$uid,$cid,password_hash(123456, PASSWORD_DEFAULT));
                $execute = $query->execute($data);
                if($execute){
                    echo "Teacher Added successfully";
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