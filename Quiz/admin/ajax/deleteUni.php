<?php
    include('connection.php');
    session_start();

    if(isset($_POST['token']) && password_verify('deleteUni', $_POST['token'])){
        $uid = test_input($_POST['uid']);

        $query = $db->prepare('DELETE FROM UNIVERSITY WHERE UID=?');
        $data = array($uid);
        $execute =  $query->execute($data);
        if($execute){
            echo 0;
        }
        else {
            echo 5;
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