<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getClass', $_POST['token'])){
        $uid = $_POST['uid'];
        $query = $db->prepare('SELECT * FROM class WHERE uid=?');
        $data = array($uid);
        $execute = $query->execute($data);
?>
<?php
            while($datarow=$query->fetch()){
?>
            <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['cname'];?></option>
<?php
            }
?>
<?php
    }
    else {
        echo "Server Error";
    }
?>