<?php
    include('connection.php');
    session_start();
    // echo "Faizan";
    if(isset($_POST['token']) && password_verify('getResult', $_POST['token'])){
        $sid = $_POST['sid'];
        $query = $db->prepare('SELECT test.name,test.marks as totalMarks, results.marks FROM results JOIN test on results.testID = test.id WHERE studentID=?;');
        $data = array($sid);
        $execute = $query->execute($data);
?>

            <table class="table table-striped table-bordered ">
                <tr>
                    <th>S.No</th>
                    <th>Test ID</th>
                    <th>Marks Obtained</th>
                    <th>Total Marks</th>
                    <!-- <td>Class</td> -->
                    <!-- <td>University</td> -->
                </tr>
<?php
            $SNo = 1;
            while($datarow=$query->fetch()){
?>
            <tr>
                <td><?php echo $SNo?></td>
                <td><?php echo $datarow['name']?></td>
                <td><?php echo $datarow['marks']?></td>
                <td><?php echo $datarow['totalMarks']?></td>
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
        echo "Server Error In Result";
    }
?>