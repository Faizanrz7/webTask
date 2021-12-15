<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getStudentList', $_POST['token'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        $cid = $_POST['cid'];
        // echo $cid;
        $query = $db->prepare('SELECT student.id, student.name, class.cname, university.uname FROM student JOIN class on student.cid = class.id JOIN university on class.uid = university.uid WHERE student.cid=?;');
        $data = array($cid);
        $execute = $query->execute($data);
?>

        <!-- <select name="class" id="class" class="form-control">
            <option value="0">SELECT CLASS</option> -->
            <table class="table table-striped table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>University</th>
                    <th>Delete</th>
                </tr>
<?php
            $SNo = 1;
            while($datarow=$query->fetch()){
?>
            <tr>
                <td><?php echo $SNo?></td>
                <td><?php echo $datarow['name']?></td>
                <td><?php echo $datarow['cname']?></td>
                <td><?php echo $datarow['uname']?></td>
                <td><button onclick="deleteStudent('<?php echo $datarow['id']?>');" class="btn btn-danger">DELETE</button></td>
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