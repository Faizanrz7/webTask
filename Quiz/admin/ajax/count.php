<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";

    if(isset($_POST['token']) && password_verify('countEverything', $_POST['token'])){
    
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
        echo "Server Error";
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>