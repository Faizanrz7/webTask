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
            height: 350px;
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
                <li><a href="addUniversity.php">Add University</a></li>
                <li class="active"><a href="addClass.php">Add Class</a></li>
                <li><a href="addTeacher.php">Add Teacher</a></li>
                <li><a onclick="logout()">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="mainContainer">
        <div class="heading">
            <h1>Add Class</h1>
        </div>
        <div class="formContainer">
        <div class="container" id="adClass">
            <h1>Class Details</h1>
            <form action="">
                <input type="text" id="cname" placeholder="Class Name">
                    <select name="university" id="university" onchange="getClass()">
                        <option value="0">SELECT UNIVERSITY</option>
                    </select>
                <input type="submit" onclick="adClass()">
            </form>
        </div>
        <div class="table-container" style = "margin-top: 20px; width: 900px;  height: 230px; overflow: auto;"></div>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
        });

        getUni();
        getClassList();

        countEverything();

        function getUni() {
            var token = "<?php echo password_hash("getUni", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getUni.php",
                data:{token:token},
                success:function(data){
                    $('#university').html(data);
                }
            });
        }

        function adClass() {
            var cname = $('#cname').val();
            var uid = $('#university').val();

            var token = "<?php echo password_hash("addClass", PASSWORD_DEFAULT);?>";
            if(cname != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/addClass.php",
                    data:{cname: cname,uid:uid, token:token},
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

        function getClassList(){
            var token = "<?php echo password_hash("getClassList", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getClassList.php",
                data:{token:token},
                success:function(data){
                    $('.table-container').html(data);
                }
            });
        }

        function logout(){
            $.ajax({
                type:'POST',
                url:"../ajax/logout.php",
                data:{},
                success:function(data){
                    window.location.href = "../index.html"
                }
            });
        }

        function deleteClass(cid) {
            console.log(cid);
            var token = "<?php echo password_hash("deleteClass", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/deleteUni.php",
                data:{cid:cid, token: token},
                success:function(data){
                    if(data == 0){
                        alert("Class Successfully Deleted");
                        window.location.reload();
                    }
                }
            });
        }

        function countEverything(){
            var token = "<?php echo password_hash("countEverything", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/count.php",
                data:{token:token},
                success:function(data){
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