<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getUni', $_POST['token'])){
        $query = $db->prepare('SELECT * FROM university');
        $data = array();
        $execute = $query->execute($data);
?>

        <select name="university" id="university" class="form-control">
            <option value="0">SELECT UNIVERSITY</option>
<?php
            while($datarow=$query->fetch()){
?>
            <option value="<?php echo $datarow['uid'];?>"><?php echo $datarow['uname'];?></option>
<?php
            }
?>
        </select>
<?php
    }
    else {
        echo "Server Error";
    }
?>