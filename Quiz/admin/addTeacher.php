<?php
    session_start();
    if(isset($_SESSION['adminName'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/dashboard.css">
    <script src=" https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <title>Document</title>

    <style>
        .container {
            height: 500px;
            margin-top: 30px;
        }
        input,select {
            width: 100%;
            margin-bottom: 20px;
            border: none;
            /* border-bottom: 1px solid #fff; */
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            /* color: #fff; */
            color: #333;
            font-size: 16px;
        }
        

        input[type=submit]{
            border: none;
            outline: none;
            background: #fff;
            /* background: #03a9f4; */
            /* color: #333; */
            color: #333;
            font-size: 20px;
            display: block;
            margin-top: 25px;
        }
        tr {
            text-align: center;
        }
        th {
            text-align: center;
        }
        .table-container {
            width: 100%
            align-items: center;
        }
        table {
            width: 100%
        }
    </style>
</head>
<body>
    <div class="listContainer">
    <span id="Name"><?php echo $_SESSION['adminName'];?></span>
        <div class="list">
            <ul>
                <li><a href="dashboard.php">HOME</a></li>
                <li><a href="addUniversity.php">Add University</a></li>
                <li><a href="addClass.php">Add Class</a></li>
                <li  class="active"><a href="addTeacher.php">Add Teacher</a></li>
                <li><a onclick="logout()">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="mainContainer">
        <div class="heading">
            <h1>Add Teacher</h1>
        </div>
        <div class="formContainer">
            <div class="container" id="addTeacher">
                <h1>Teacher Details</h1>
                <form action="">
                    <input type="text" id="tname" placeholder="Teacher Name">
                    <input type="email" id = "email" placeholder="Email">
                    <select name="university" id="university" onchange="getClass()">
                        <option value="0">SELECT UNIVERSITY</option>
                    </select>
                    <select name="class" id="class">
                        <option value="0">SELECT CLASS</option>
                    </select>
                    <input type="submit" onclick="addTe()">
                </form>
            </div>
            <div class="table-container" style = "margin-top: 20px; width: 900px;  height: 150px; overflow: auto;"></div>
        </div>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
        });

        getUniForClass();
        getTeacher();
        countEverything();

        function addTe() {
            var tname = $('#tname').val();
            var uid = $('#university').val();
            var cid = $('#class').val();
            var email = $('#email').val();
            var token = "<?php echo password_hash("addTeacher", PASSWORD_DEFAULT);?>";
            if(tname != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/addTeacher.php",
                    data:{tname: tname,email:email,uid:uid,cid:cid, token:token},
                    success:function(data){
                        alert(data);
                        window.location.reload();
                    }
                });
            }
            else {
                alert("Fill all the fields");
            }
        }

        function getUniForClass() {
            var token = "<?php echo password_hash("getUni", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getUniForClass.php",
                data:{token:token},
                success:function(data){
                    $('#university').html(data);
                }
            });
        }
        function getClass() {
            var uid = $('#university').val();
            var token = "<?php echo password_hash("getClass", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getClass.php",
                data:{token:token,uid:uid},
                success:function(data){
                    $('#class').html(data);
                }
            });
        }


        function getTeacher(){
            // var uid = $('#university').val();
            var token = "<?php echo password_hash("getTeacherList", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getTeacher.php",
                data:{token:token},
                success:function(data){
                    $('.table-container').html(data);
                }
            });
        }

        function logout(){
            // alert("logout");
            $.ajax({
                type:'POST',
                url:"../ajax/logout.php",
                data:{},
                success:function(data){
                    window.location.href = "../index.html"
                }
            });
        }

        function deleteTeacher(tid){
            // alert(tid);
            var token = "<?php echo password_hash("deleteTeacher", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/deleteUni.php",
                data:{tid:tid, token: token},
                success:function(data){
                    if(data == 0){
                        alert("Teacher Deleted Successfully");
                        window.location.reload();
                    }
                }
            });
        }

        function countEverything(){
            // alert("Run");
            var token = "<?php echo password_hash("countEverything", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/count.php",
                data:{token:token},
                success:function(data){
                    // alert(data);
                }
            });
        }

    </script>
</body>
</html>

<?php
    }
else {
    echo "You are not authorized";
}
?>