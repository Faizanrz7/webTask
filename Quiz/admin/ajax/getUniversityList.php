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

        <!-- <select name="class" id="class" class="form-control">
            <option value="0">SELECT CLASS</option> -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.No</td>
                        <!-- <td>Name</td>
                        <td>Class</td> -->
                        <th>University</td>
                        <th>DELETE</td>
                    </tr>
                </thead>
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
        <!-- </select> -->
        </table>
<?php
    }
    else {
        echo "Server Error";
    }
?>