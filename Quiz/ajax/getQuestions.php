<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    // echo "Faizan";
    if(isset($_POST['token']) && password_verify('getQuestions', $_POST['token'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        // echo "Faizan";
        $activeTest = $_SESSION['activeTest'];
        // $query = $db->prepare('SELECT test.name, class.cname, university.uname FROM test JOIN class on test.cid = class.id JOIN university on class.uid = university.uid WHERE cid=?;');
        $query = $db->prepare('SELECT * FROM questions WHERE tid=?;');
        $data = array($activeTest);
        $execute = $query->execute($data);
        while($datarow=$query->fetch();){
            echo $datarow;
        }
    }
    else {
        echo "Server Error";
    }
?>