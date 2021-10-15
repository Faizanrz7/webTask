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
    <title>Document</title>

    <style>
        .container {
            height: 350px;
            /* margin-top: 30px; */
            overflow: auto;
        }
        input,select {
            width: 100%;
            /* margin-bottom: 20px; */
            border: none;
            /* border-bottom: 1px solid #fff; */
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            /* height: 40px; */
            /* color: #fff; */
            color: #333;
            font-size: 16px;
        }
        .questionDiv {
            display: flex;
            flex-direction: column;
            overflow: auto;
        }
        .answersDiv {
            display: flex;
            flex-direction: column;
            overflow: auto;
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
                <li><a href="addStudent.php">Add Student</a></li>
                <li><a href="addTest.php">Add Test</a></li>
                <!-- <li><a href="addTeacher.php">Add Teacher</a></li> -->
                <li  class="active"><a href="addQuestion.php">Add Question</a></li>
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
                <!-- <h1>Student Details</h1> -->
                <form action="">
                    <!-- <input type="text" id="sname" placeholder="Student Name"> -->
                    <!-- <input type="email" id = "email" placeholder="Email"> -->
                    <!-- <div id="uniList"></div> -->
                    <!-- <div id="classList"></div> -->
                    <!-- <select name="university" id="university" onchange="getClass()">
                        <option value="0">SELECT UNIVERSITY</option>
                    </select> -->
                    <select name="test" id="test">
                        <!-- <option value="0">SELECT TEST</option> -->
                    </select>
                    <div class="questionDiv">
                        <label for="Question">Question</label>
                        <textarea id = "question" name = "question"></textarea>
                    </div>
                    <div class="answersDiv">
                        <label for="options">Options</label>
                        <label for="option1">Option 1</label>
                        <textarea id = "option1" name = "option1"></textarea>
                        <label for="option2">Option 2</label>
                        <textarea id = "option2" name = "option2"></textarea>
                        <label for="option3">Option 3</label>
                        <textarea id = "option3" name = "option3"></textarea>
                        <label for="option4">Option 4</label>
                        <textarea id = "option4" name = "option4"></textarea>
                        <label for="cAnswer">Correct Answer</label>
                        <select name="correctAnswer" id="cAnswer">
                            <option value="0">Select Correct Option</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>

                    <input type="submit" onclick="addQuestion()">
                </form>
            </div>
            <div class="table-container" style = "margin-top: 50px;"></div>
        </div>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
        });

        // getUniForClass();
        // getTeacher();
        // getStudentList();
        getTest();

        function addQuestion(){
            var testId = $('#test').val();
            var question = $('#question').val();
            var option1 = $('#option1').val();
            var option2 = $('#option2').val();
            var option3 = $('#option3').val();
            var option4 = $('#option4').val();
            var cOption = $('#cAnswer').val();

            var token = "<?php echo password_hash("addQuestion", PASSWORD_DEFAULT);?>";
            if(testId != "0" && cOption != "0" &&  question != "" && option1 != "" && option2 != "" && option3 != "" && option4 != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/addQuestion.php",
                    data:{testId: testId, question : question, option1: option1, option2: option2, option3:option3, option4:option4, cOption:cOption, token:token},
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

            // alert(testId);
            // alert(question);
            // alert(option1);
            // alert(option2);
            // alert(option3);
            // alert(option4);
            // alert(cOption);
        }

        function addTe() {
            var sname = $('#sname').val();
            var uid = $('#university').val();
            var cid = $('#class').val();
            // alert(cid);
            var email = $('#email').val();
            // alert(email + "  " + password);
            var token = "<?php echo password_hash("addTeacher", PASSWORD_DEFAULT);?>";
            if(sname != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/addTeacher.php",
                    data:{sname: sname,email:email,uid:uid,cid:cid, token:token},
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

        function getUniForClass() {
            var token = "<?php echo password_hash("getUni", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getUniForClass.php",
                data:{token:token},
                success:function(data){
                    $('#university').html(data);
                    // $('#uniListInClass').html(data);
                }
            });
        }
        function getTest() {
            var classId = <?php echo $_SESSION['cid'];?>;
            // alert(classId);
            var token = "<?php echo password_hash("getTest", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getTest.php",
                data:{token:token,classId:classId},
                success:function(data){
                    // alert(data);
                    $('#test').html(data);
                    // $('#uniListInClass').html(data);
                }
            });
        }

        
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


        function getTeacher(){
            // var uid = $('#university').val();
            var token = "<?php echo password_hash("getTeacherList", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getTeacher.php",
                data:{token:token},
                success:function(data){
                    // $('.tab').html(data);
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
                    window.location.href = "./index.php"
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