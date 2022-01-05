<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    // echo "Faizan";
    if(isset($_POST['token']) && password_verify('getTestList', $_POST['token'])){
        $cid = $_POST['cid'];
        $query = $db->prepare('SELECT * FROM test WHERE cid=?;');
        $data = array($cid);
        $execute = $query->execute($data);
?>

            <table class="table table-striped table-bordered ">
                <tr>
                    <th>S.No</th>
                    <th>Test</th>
                    <th>Duration (in hrs)</th>
                    <th>Total Marks</th>
                    <th>Date</th>
                    <th>Start</th>
                </tr>
<?php
            $SNo = 1;
            while($datarow=$query->fetch()){
?>
            <tr>
                <td><?php echo $SNo?></td>
                <td><?php echo $datarow['name']?></td>
                <td><?php echo $datarow['duration']?></td>
                <td><?php echo $datarow['marks']?></td>
                <td><?php echo $datarow['date']?></td>
                <?php
                    $testDate = $datarow['date'];
                    if($testDate == date("Y-m-d")){
                    ?>
                        <td><button class="btn" value = "<?php echo $datarow['id']?>" onclick = "takeTest(this.value)">Take Test</button></td>
                    <?php
                    }
                    else{
                    ?> 
                        <td><b>Test Not Scheduled For Today</b></td>
                    <?php
                    }
                    ?>
                
            </tr>
<?php
                $SNo++;
            }
?>
        </table>
<?php
    }
    else {
        echo "Server Error";
    }
?>