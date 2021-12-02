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
    <title>Document</title>

    <style>
        .container {
            height: 300px;
        }
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
        th {
            text-align: center;
        }
        
    </style>
</head>
<body>
    <div class="listContainer">
        <span id="Name"><?php echo $_SESSION['adminName'];?></span>
        <div class="list">
            <ul>
                <li><a href="dashboard.php">HOME</a></li>
                <li class="active"><a href="addUniversity.php">Add University</a></li>
                <li><a href="addClass.php">Add Class</a></li>
                <li><a href="addTeacher.php">Add Teacher</a></li>
                <li><a onclick="logout()">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="mainContainer">
        <div class="heading">
            <h1>Add University</h1>
        </div>
        <div class="formContainer">
        <div class="container" id="addUni">
            <h1>University Details</h1>
            <form action="">
                <input type="text" id="uname" placeholder="University Name">
                <input type="submit" onclick="addUni()">
            </form>
        </div>
        <div class="table-container" style = "margin-top: 20px; width: 900px; text-align; center; height: 300px; overflow: auto;"></div>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
        });

        getUniversityList();
        countEverything();
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
                        window.location.reload();
                    }
                });
            }
            else {
                alert("Fill all the fields");
            }
        }

        function getUniversityList(){
            // var uid = $('#university').val();
            var token = "<?php echo password_hash("getUniversityList", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getUniversityList.php",
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
                    window.location.href = "./index.php"
                }
            });
        }

        function deleteUni(uid) {
            console.log(uid);
            var token = "<?php echo password_hash("deleteUni", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/deleteUni.php",
                data:{uid:uid, token: token},
                success:function(data){
                    if(data == 0){
                        alert("University Deleted Successfully");
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