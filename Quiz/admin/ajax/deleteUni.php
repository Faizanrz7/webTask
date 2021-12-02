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
            $query = $db->prepare('DELETE FROM CLASS WHERE UID=?');
            $data = array($uid);
            $execute =  $query->execute($data);

            $query = $db->prepare('DELETE FROM TEACHER WHERE UID=?');
            $data = array($uid);
            $execute =  $query->execute($data);
        }
        else {
            echo 5;
        }
    }
    elseif(isset($_POST['token']) && password_verify('deleteClass', $_POST['token'])){
        $cid = test_input($_POST['cid']);

        $query = $db->prepare('DELETE FROM CLASS WHERE ID=?');
        $data = array($cid);
        $execute =  $query->execute($data);
        if($execute){
            echo 0;
            $query = $db->prepare('DELETE FROM TEACHER WHERE CID=?');
            $data = array($cid);
            $execute =  $query->execute($data);
        }
        else {
            echo 5;
        }
    }
    elseif(isset($_POST['token']) && password_verify('deleteTeacher', $_POST['token'])){
        $tid = test_input($_POST['tid']);

        $query = $db->prepare('DELETE FROM teacher WHERE ID=?');
        $data = array($tid);
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