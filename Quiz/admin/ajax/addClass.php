<?php
    include('connection.php');
    session_start();

    if(isset($_POST['token']) && password_verify('addClass', $_POST['token'])){
        $cname = test_input($_POST['cname']);
        $uid = test_input($_POST['uid']);

        $query = $db->prepare('SELECT * FROM class where cname=?');
        $data = array($cname);
        $execute =  $query->execute($data);

        if($query->rowcount()>0){
            echo "Class Already Exist";
        }
        else{
            if(($cname !='')){
                $query = $db->prepare('INSERT INTO class(cname, uid) values(?,?)');
                $data = array($cname,$uid);
                $execute = $query->execute($data);
                if($execute){
                    echo "Class Added successfully";
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