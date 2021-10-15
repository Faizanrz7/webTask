<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getTest', $_POST['token'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        $classid = $_POST['classId'];
        $query = $db->prepare('SELECT * FROM test WHERE cid=?');
        $data = array($classid);
        $execute = $query->execute($data);
?>

        <!-- <!-- <select name="class" id="class" class="form-control"> -->
            <option value="0">SELECT TEST</option>
<?php
            while($datarow=$query->fetch()){
?>
            <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['name'];?></option>
<?php
            }
?>
        <!-- </select> -->
<?php
    }
    else {
        echo "Server Error";
    }
?>