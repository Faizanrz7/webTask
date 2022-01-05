<?php
    include('connection.php');
    session_start();
    if(isset($_POST['token']) && password_verify('saveMarks', $_POST['token'])){
        $sid = $_SESSION['sid'];
        $tid = $_SESSION['activeTest'];
        $cid = $_SESSION['cid'];
        $marks = $_POST['marks'];
        // $query = $db->prepare('SELECT test.name, class.cname, university.uname FROM test JOIN class on test.cid = class.id JOIN university on class.uid = university.uid WHERE cid=?;');
        $query = $db->prepare('INSERT INTO results(studentID, testID, classID, marks) values(?,?,?,?)');
        $data = array($sid,$tid,$cid,$marks);
        $execute = $query->execute($data);
        if($execute){
            echo 0;
        }
        else {
            echo "Something went wrong";
        }    
    }
    else {
        echo "Server Error";
    }
?>