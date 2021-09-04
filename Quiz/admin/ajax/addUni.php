<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";

    if(isset($_POST['token']) && password_verify('addUni', $_POST['token'])){
        $uname = test_input($_POST['uname']);

        $query = $db->prepare('SELECT * FROM university where uname=?');
        $data = array($uname);
        $execute =  $query->execute($data);

        if($query->rowcount()>0){
            echo "University Already Exist";
        }
        else{
            if(($uname !='')){
                $query = $db->prepare('INSERT INTO university(uname) values(?)');
                $data = array($uname);
                $execute = $query->execute($data);
                if($execute){
                    echo "University Added successfully";
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