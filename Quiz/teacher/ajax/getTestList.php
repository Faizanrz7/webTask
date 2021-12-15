<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getTestList', $_POST['token'])){
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        $cid = $_POST['cid'];
        $query = $db->prepare('SELECT id, date, duration, marks, numberOfQuestions, name FROM test WHERE cid=?;');
        $data = array($cid);
        $execute = $query->execute($data);
?>

        <!-- <select name="class" id="class" class="form-control">
            <option value="0">SELECT CLASS</option> -->
            <table class="table table-striped table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Total Marks</th>
                    <th>Number Of Questions</th>
                    <th>Delete</th>
                </tr>
<?php
            $SNo = 1;
            while($datarow=$query->fetch()){
?>
            <tr>
                <td><?php echo $SNo?></td>
                <td><?php echo $datarow['name']?></td>
                <td><?php echo $datarow['date']?></td>
                <td><?php echo $datarow['duration']?></td>
                <td><?php echo $datarow['marks']?></td>
                <td><?php echo $datarow['numberOfQuestions']?></td>
                <td><button onclick="deleteTest('<?php echo $datarow['id']?>');" class="btn btn-danger">DELETE</button></td>
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