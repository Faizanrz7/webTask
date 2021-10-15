<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";


    if(isset($_POST['token']) && password_verify('addTest', $_POST['token'])){
        $testName = test_input($_POST['testName']);
        // $email = test_input($_POST['email']);
        // $uid = test_input($_POST['uid']);
        $cid = test_input($_POST['cid']);

        $query = $db->prepare('SELECT * FROM test where name=?');
        $data = array($testName);
        $execute =  $query->execute($data);

        if($query->rowcount()>0){
            echo "Test Already Exist";
        }
        else{
            if(($testName !='')){
                $query = $db->prepare('INSERT INTO test(name, cid) values(?,?)');
                $data = array($testName, $cid);
                $execute = $query->execute($data);
                if($execute){
                    echo "Test Added successfully";
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