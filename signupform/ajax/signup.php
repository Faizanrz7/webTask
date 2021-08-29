<?php
    include('connection.php');
    if(isset($_POST['token']) && password_verify('signuptoken', $_POST['token'])){
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        $query = $db->prepare('SELECT * FROM signupdata where email=?');
        $data = array($email);
        $execute =  $query->execute($data);

        if($query->rowcount()>0){
            echo "User Already Exist";
        }
        else{
            if(($email !='' && $password !='' && $name !='' && $gender != '')){
                $query = $db->prepare('INSERT INTO signupdata(name,gender, email, password) values(?,?,?,?)');
                $data = array($name,$gender, $email, password_hash($password, PASSWORD_DEFAULT));
                $execute = $query->execute($data);
                if($execute){
                    echo "user created successfully";
                }
                else {
                    echo "something went wrong";
                }
            }
        }

    }
    else {
        echo "token not generated";
    }
?>


$2y$10$LkiVkIKFpKVAwUT4/AQCs.4Zrj6IipfEyUr/Jjc0KRaMxvCcEfhaO

$2y$10$rJ6FF4DahQAp2ylUwRyfB.0Pb2eiPSm9NwBdCUHAUuo24Vr6RVKFO


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}