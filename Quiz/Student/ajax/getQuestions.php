<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    // echo "Faizan";

    class QuestionSet {
        public $question;
        public $option1;
        public $option2;
        public $option3;
        public $option4;
        public $answer;
    }

    if(isset($_POST['token']) && password_verify('getQuestions', $_POST['token'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        // echo "Faizan";
        $activeTest = $_SESSION['activeTest'];
        // $query = $db->prepare('SELECT test.name, class.cname, university.uname FROM test JOIN class on test.cid = class.id JOIN university on class.uid = university.uid WHERE cid=?;');
        $query = $db->prepare('SELECT * FROM questions WHERE tid=?;');
        $data = array($activeTest);
        $execute = $query->execute($data);
        $questions = array();
        while($datarow=$query->fetch()){
            $q = new QuestionSet();
            $q->question = $datarow['question'];
            $q->option1 = $datarow['option1'];
            $q->option2 = $datarow['option2'];
            $q->option3 = $datarow['option3'];
            $q->option4 = $datarow['option4'];
            $q->answer = $datarow['canswer'];
            
            array_push($questions, $q);
        }

        $data = json_encode($questions);
        echo $data;
?>

<?php  
    }
    else {
        echo "Server Error";
    }
?>