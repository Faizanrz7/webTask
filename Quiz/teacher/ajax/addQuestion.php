<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";


    if(isset($_POST['token']) && password_verify('addQuestion', $_POST['token'])){
        $tid = test_input($_POST['testId']);
        $question = $_POST['question'];
        $option1 = $_POST['option1'];
        $option2 = $_POST['option2'];
        $option3 = $_POST['option3'];
        $option4 = $_POST['option4'];
        $cOption = $_POST['cOption'];
        // $uid = test_input($_POST['uid']);
        // $cid = test_input($_POST['cid']);

        
        // $execute =  $query->execute($data);

        // if($query->rowcount()>0){
        //     echo "Question Already Exist";
        // }
        // else{
            // if(($sname !='')){
                $query = $db->prepare('INSERT INTO questions(tid, question, option1, option2, option3, option4, canswer) values(?, ?, ?, ?, ?, ?, ?)');
                $data = array($tid, $question, $option1, $option2, $option3, $option4, $cOption);
                $execute = $query->execute($data);
                if($execute){
                    echo "Question Added successfully";
                }
                else {
                    echo "Something went wrong";
                }
            // }
        // }

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