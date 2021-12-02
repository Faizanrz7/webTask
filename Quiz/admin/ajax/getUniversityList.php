<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getUniversityList', $_POST['token'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        // $uid = $_POST['uid'];
        $query = $db->prepare('SELECT * FROM university;');
        $data = array();
        $execute = $query->execute($data);
?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>University</th>
                    <th>Delete</th>
                </tr>
            <tbody>
<?php
            $SNo = 1;
            while($datarow=$query->fetch()){
?>
            <tr>
                <td><?php echo $SNo?></td>
                <td><?php echo $datarow['uname']?></td>
                <td><button onclick="deleteUni('<?php echo $datarow['uid']?>');" class="btn btn-danger">DELETE</button></td>
            </tr>
<?php
                $SNo++;
            }
?>
            </tbody>
        </table>
<?php
    }
    else {
        echo "Server Error";
    }
?>