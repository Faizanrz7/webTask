<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getClassList', $_POST['token'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        // $uid = $_POST['uid'];
        $query = $db->prepare('SELECT class.cname, university.uname FROM class JOIN university on class.uid = university.uid;');
        $data = array();
        $execute = $query->execute($data);
?>

        <!-- <select name="class" id="class" class="form-control">
            <option value="0">SELECT CLASS</option> -->
            <table class="table-bordered">
                <tr>
                    <td>S.No</td>
                    <!-- <td>Name</td> -->
                    <td>Class</td>
                    <td>University</td>
                </tr>
<?php
            $SNo = 1;
            while($datarow=$query->fetch()){
?>
            <tr>
                <td><?php echo $SNo?></td>
                
                <td><?php echo $datarow['cname']?></td>
                <td><?php echo $datarow['uname']?></td>
            </tr>
<?php
                $SNo++;
            }
?>
        <!-- </select> -->
        </table>
<?php
    }
    else {
        echo "Server Error";
    }
?>