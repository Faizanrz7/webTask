<?php
    session_start();
    if(isset($_SESSION['teacherName'])){
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
    <title>Add Student</title>

    <style>
        .container {
            height: 350px;
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
    <span id="Name">WELCOME <?php echo $_SESSION['teacherName'];?></span>
        <div class="list">
            <ul>
                <li><a href="dashboard.php">HOME</a></li>
                <li class="active"><a href="addStudent.php">Add Student</a></li>
                <li><a href="addTest.php">Add Test</a></li>
                <li><a href="addQuestion.php">Add Question</a></li>
                <!-- <li><a href="addTeacher.php">Add Teacher</a></li> -->
                <li><a onclick="logout()">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="mainContainer">
        <div class="heading">
            <h1>Add Student</h1>
        </div>
        <div class="formContainer">
            <div class="container" id="addTeacher">
                <h1>Student Details</h1>
                <form action="">
                    <input type="text" id="sname" placeholder="Student Name">
                    <input type="email" id = "email" placeholder="Email">
                    <!-- <div id="uniList"></div> -->
                    <!-- <div id="classList"></div> -->
                    <!-- <select name="university" id="university" onchange="getClass()">
                        <option value="0">SELECT UNIVERSITY</option>
                    </select> -->
                    <!-- <select name="class" id="class">
                        <option value="0">SELECT CLASS</option>
                    </select> -->
                    <input type="submit" onclick="addStudent()">
                </form>
            </div>
            <div class="table-container" style = "margin-top: 20px; width: 900px;  height: 300px; overflow: auto;"></div>
        </div>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
        });

        // getUniForClass();
        // getTeacher();
        getStudentList();
        
        function getStudentList(){
            // var uid = $('#university').val();
            var token = "<?php echo password_hash("getStudentList", PASSWORD_DEFAULT);?>";
            var cid = "<?php echo $_SESSION['cid'];?>";
            $.ajax({
                type:'POST',
                url:"ajax/getStudentList.php",
                data:{token:token, cid:cid},
                success:function(data){
                    // $('.tab').html(data);
                    // alert(data);
                    $('.table-container').html(data);
                    // $('#uniListInClass').html(data);
                }
            });
        }


        function addStudent(){
            var sname = $('#sname').val();
            // var uid = $('#university').val();
            // var cid = $('#class').val();
            // alert(cid);
            var email = $('#email').val();
            // alert(email + "  " + password);
            var token = "<?php echo password_hash("addStudent", PASSWORD_DEFAULT);?>";
            var cid = "<?php echo $_SESSION['cid'];?>";
            if(sname != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/addStudent.php",
                    data:{sname: sname,email:email, cid:cid, token:token},
                    success:function(data){
                        alert(data);
                        window.location.reload();
                        // window.location = "./dashboard.php";
                        // if(data == 0){
                        //     // window.location = "dashboard.php";
                        //     alert("University Added");
                        // }
                        // else {
                        //     alert(data); 
                        // }
                    }
                });
            }
            else {
                alert("Fill all the fields");
            }
        }

        function deleteStudent(sid) {
            console.log(sid);
            var token = "<?php echo password_hash("deleteStudent", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/delete.php",
                data:{sid:sid, token: token},
                success:function(data){
                    if(data == 0){
                        alert("Student Successfully Deleted");
                        window.location.reload();
                    }
                }
            });
        }

        function logout(){
            // alert("logout");
            $.ajax({
                type:'POST',
                url:"ajax/logout.php",
                data:{},
                success:function(data){
                    // $('.tab').html(data);
                    // $('.table-container').html(data);
                    // $('#uniListInClass').html(data);
                    // alert("Redirecting")
                    window.location.href = "../index.html"
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