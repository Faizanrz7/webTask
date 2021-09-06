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
    </style>
</head>
<body>
    <div class="listContainer">
    <span id="Name">WELCOME <?php echo $_SESSION['adminName'];?></span>
        <div class="list">
            <ul>
                <li><a href="dashboard.php">HOME</a></li>
                <li><a href="addUniversity.php">Add University</a></li>
                <li class="active"><a href="addClass.php">Add Class</a></li>
                <li><a href="addTeacher.php">Add Teacher</a></li>
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
                <!-- <div id="uniList"> -->
                    <select name="university" id="university" onchange="getClass()">
                        <option value="0">SELECT UNIVERSITY</option>
                    </select>
                <!-- </div> -->
                <input type="submit" onclick="adClass()">
            </form>
        </div>
    </div>

    <script>
        $('form').submit(function(e) {
            e.preventDefault();
        });

        getUni();
        // getClass();

        function getUni() {
            var token = "<?php echo password_hash("getUni", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getUni.php",
                data:{token:token},
                success:function(data){
                    $('#university').html(data);
                    // $('#uniListInClass').html(data);
                }
            });
        }

        // function adClass() {
        //     var tname = $('#cname').val();
            // var uid = $('#university').val();
        //     // var email = $('#email').val();
        //     // alert(email + "  " + password);
        //     if(tname != ""){
        //         $.ajax({
        //             type:'POST',
        //             url:"ajax/addClass.php",
        //             data:{cname: cname, uid:uid, token:token},
        //             success:function(data){
        //                 alert(data);
        //                 // window.location = "./dashboard.php";
        //                 // if(data == 0){
        //                 //     // window.location = "dashboard.php";
        //                 //     alert("University Added");
        //                 // }
        //                 // else {
        //                 //     alert(data); 
        //                 // }
        //             }
        //         });
        //     }
        //     else {
        //         alert("Fill all the fields");
        //     }
        // }
        
        function adClass() {
            var cname = $('#cname').val();
            var uid = $('#university').val();

            // alert(email + "  " + password);
            var token = "<?php echo password_hash("addClass", PASSWORD_DEFAULT);?>";
            if(cname != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/addClass.php",
                    data:{cname: cname,uid:uid, token:token},
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

        
    </script>
</body>
</html>

<?php
    }
else {
    echo "You are not authorized";
}
?>