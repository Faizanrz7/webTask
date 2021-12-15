<?php
    include('connection.php');
    session_start();

    if(isset($_POST['token']) && password_verify('deleteStudent', $_POST['token'])){
        $sid = test_input($_POST['sid']);

        $query = $db->prepare('DELETE FROM Student WHERE ID=?');
        $data = array($sid);
        $execute =  $query->execute($data);
        if($execute){
            echo 0;
        }
        else {
            echo 5;
        }
    }
    elseif(isset($_POST['token']) && password_verify('deleteTest', $_POST['token'])){
        $tid = test_input($_POST['tid']);

        $query = $db->prepare('DELETE FROM TEST WHERE ID=?');
        $data = array($tid);
        $execute =  $query->execute($data);
        if($execute){
            echo 0;
            // $query = $db->prepare('DELETE FROM TEACHER WHERE CID=?');
            // $data = array($cid);
            // $execute =  $query->execute($data);
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