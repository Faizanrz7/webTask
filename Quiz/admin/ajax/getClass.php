<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getClass', $_POST['token'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        $uid = $_POST['uid'];
        $query = $db->prepare('SELECT * FROM class WHERE uid=?');
        $data = array($uid);
        $execute = $query->execute($data);
?>

        <!-- <select name="class" id="class" class="form-control">
            <option value="0">SELECT CLASS</option> -->
<?php
            while($datarow=$query->fetch()){
?>
            <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['cname'];?></option>
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