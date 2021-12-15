
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>

    <style>
        .container {
            height: 300px;
            width: 800px;
            display: flex;
            /* align-items: center; */
            flex-direction: column;
            text-align:center;
            /* justify-content: center; */
            color: white;
            box-shadow: 0 0 30px black;
            /* background: blue; */

        }

        .formContainer {
        display: flex;
        gap: 15px;
        width: 100%;
        margin-top: 50px;
    }

    .card {
        border: 2px solid black;
        height: 180px;
        padding: 10px;
        width: 100%;
        background-color: #333;
        color: #fff;
    }

    .card h1 {
        font-weight: 900;
    }


    .count {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: center;
        gap: 50px;
    }

    i {
        font-size: xxx-large;
        font-weight: 800;
    }
        /* .teacherList {
            height: 400px;
            flex-direction: column;
            overflow: auto;
            gap: 15px;
        } */
        input {
            width: 100%;
            margin-bottom: 20px;
            border: none;
            /* border-bottom: 1px solid #fff; */
            border-bottom: 1px solid #fff;
            background: transparent;
            outline: none;
            height: 40px;
            color: #fff;
            /* color: #333; */
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
        td {
            padding: 3px;
        }
        .table-container {
            width: 100%;
            align-items: center;
        }
        table {
            width: 100%
        }
    </style>
</head>
<body>
    <div class="listContainer">
        <span id="Name">QUIZ PORTAL</span>
        <div class="list">
            <ul>
                <li class="active"><a href="dashboard.php">HOME</a></li>
                <li><a href="addStudent.php">Add Student</a></li>
                <li><a href="addTest.php">Add Test</a></li>
                <li><a href="addQuestion.php">Add Question</a></li>
                <li><a onclick="logout()">Log Out</a></li>
                <!-- <li><a href="addTeacher.php">Add Teacher</a></li> -->
            </ul>
        </div>
    </div>
    <div class="mainContainer">
        <div class="heading">
            <!-- <h1>Hello </h1> -->
            <h1>WELCOME <?php echo $_SESSION['teacherName'];?></h1>
        </div>
        <!-- <div class="formContainer">
            <div class="teacherList container">
                <h3>Teacher List</h3>
                <div class="table-container"></div>
            </div>
            <!-- <div class="container">
                Class List
            </div>
            <div class="container">
                Teacher List
            </div> -->
        <!-- </div> -->
        <div class="formContainer col-sm-12">
            <!-- <div class="teacherList container">
                <h3>Teacher List</h3>
                <div class="table-container"></div>
            </div>
            <!-- <div class="container">
                Class List
            </div>
            <div class="container">
                Teacher List
            </div> -->
            <div class="col-sm-2"></div>
            <div class="card col-sm-4">
                <h1>Students</h1>
                <div class="count">
                    <i class="fas fa-user-graduate"></i>
                    <h1>1</h1>
                </div>
            </div>
            <div class="card col-sm-4">
                <h1>Tests</h1>
                <div class="count">
                    <i class="fas fa-file-alt"></i>
                    <h1>1</h1>
                </div>
            </div>
            
            <div class="col-sm-2"></div>
        </div>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
        });

        // getTeacher();
        function addUni() {
            var uname = $('#uname').val();
            // alert(email + "  " + password);
            var token = "<?php echo password_hash("addUni", PASSWORD_DEFAULT);?>";
            if(uname != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/addUni.php",
                    data:{uname: uname, token:token},
                    success:function(data){
                        alert(data);
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