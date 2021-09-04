<?php
    session_start();
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
</head>
<body>
    <div class="listContainer">
        <div class="list">
            <ul>
                <!-- <li id="uniLi" class="active" onclick="showUni()"><a src = "addUniversity.php">Add University</a></li>
                <li id="teacherLi" onclick="showTeacher()"><a src = "addTeacher.php">Add Teacher</a></li>
                <li id="classLi" onclick="showClass()"><a src = "addClass.php">Add Class</a></li> -->
                <li class="active"><a href="addUniversity.php">Add University</a></li>
                <li><a href="addClass.php">Add Class</a></li>
                <li><a href="addTeacher.php">Add Teacher</a></li>
            </ul>
        </div>
    </div>
    <div class="mainContainer">
        <div class="heading">
            <h1>Admin Page</h1>
        </div>
        <div class="formContainer">
            <div class="container" id = "addUni">
                <h1>University Details</h1>
                <form action="">
                    <input type="text" id="uname" placeholder="University Name" class="form-control">
                    <input type="submit" onclick="addUniversity()" class="form-control">
                </form>
            </div>
            <div class="container hide" id="addTeacher">
                <h1>Teacher Details</h1>
                <form action="">
                    <input type="text" id="tname" placeholder="Teacher Name" class="form-control">
                    <div id="uniListInTeacher"></div>
                    <div id="classList"></div>
                    <input type="submit" onclick="addTe()" class="form-control">
                </form>
            </div>
            <div class="container hide" id="adClass">
            <h1>Class Details</h1>
                <form action="">
                    <input type="text" id="className" placeholder="Class Name" class="form-control">
                    <div id="uniListInClass"></div>
                    <input type="submit" onclick="addClass()" class="form-control">
                </form>
            </div>
        </div>
    </div>

    <script>
        var addUni = $('#addUni');
        var addTeacher = $('#addTeacher');
        var adclass = $('#adClass');
        
        var uniLi = $('#uniLi');
        var teacherLi = $('#teacherLi');
        var classLi = $('#classLi');

        // console.log(addUni);

        $('form').submit(function(e) {
            e.preventDefault();
        });

        function getUni() {
            var token = "<?php echo password_hash("getUni", PASSWORD_DEFAULT);?>";
            $.ajax({
                type:'POST',
                url:"ajax/getUni.php",
                data:{token:token},
                success:function(data){
                    $('#uniListInTeacher').html(data);
                    $('#uniListInClass').html(data);
                }
            });
        }

        function addUniversity() {
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
                    }
                });
            }
            else {
                alert("Fill all the fields");
            }
        }

        function addTe() {
            alert('Teacher');
            var tname = $('#tname').val();
            // alert(email + "  " + password);
            var token = "<?php echo password_hash("addTeacher", PASSWORD_DEFAULT);?>";
            if(tname != ""){
                $.ajax({
                    type:'POST',
                    url:"ajax/addTeacher.php",
                    data:{tname: tname, token:token},
                    success:function(data){
                        alert(data);
                    }
                });
            }
            else {
                alert("Fill all the fields");
            }
        }

        function showUni() {
            addUni.removeClass('hide');
            addTeacher.addClass('hide');
            adclass.addClass('hide');

            uniLi.addClass('active');
            teacherLi.removeClass('active');
            classLi.removeClass('active');
        }
        function showTeacher() {
            getUni();
            addUni.addClass('hide');
            addTeacher.removeClass('hide');
            adclass.addClass('hide');

            uniLi.removeClass('active');
            teacherLi.addClass('active');
            classLi.removeClass('active');
        }
        function showClass() {
            getUni();
            addUni.addClass('hide');
            addTeacher.addClass('hide');
            adclass.removeClass('hide');

            uniLi.removeClass('active');
            teacherLi.removeClass('active');
            classLi.addClass('active');
        }
    </script>
</body>
</html>