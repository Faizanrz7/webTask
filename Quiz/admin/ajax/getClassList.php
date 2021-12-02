<?php
    include('connection.php');
    session_start();
    $_SESSION['nam'] = "Faizan";
    if(isset($_POST['token']) && password_verify('getClassList', $_POST['token'])){
        $query = $db->prepare('SELECT class.id, class.cname, university.uname FROM class JOIN university on class.uid = university.uid;');
        $data = array();
        $execute = $query->execute($data);
?>
            <table class="table table-striped table-bordered">
                <tr>
                    <th>S.No</th>
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
                
                <td><?php echo $datarow['cname']?></td>
                <td><?php echo $datarow['uname']?></td>
                <td><button onclick="deleteClass('<?php echo $datarow['id']?>');" class="btn btn-danger">DELETE</button></td>
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