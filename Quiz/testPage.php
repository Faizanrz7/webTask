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
    <script src=" https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Hello <?php echo $_SESSION['studentName']?></h1>
    <h1>Available Tests for TestID <?php echo $_SESSION['activeTest']?></h1>
    <div class="questionSet">
        <div class="question"></div>
        <div class="answers"></div>
    </div>
    <!-- <table></table> -->
    <!-- <div id="testList"></div> -->
    <div class="table-container" style = "margin-top: 50px;"></div>


    <script>
        // $('form').submit(function(e) {
        //     e.preventDefault();
        // });

        getQuestion();

        function getQuestion(){
            // var uid = $('#university').val();
            var token = "<?php echo password_hash("getQuestions", PASSWORD_DEFAULT);?>";
            // var activeTest = "<?php echo $_SESSION['activeTest']?>";
            // alert(activeTest);
            $.ajax({
                type:'POST',
                url:"ajax/getQuestions.php",
                data:{token:token},
                success:function(data){
                    // $('.tab').html(data);
                    alert(data);
                    // $('.table-container').html(data);
                    // $('#uniListInClass').html(data);
                }
            });
        }

       

        // function takeTest(tid) {

        //     $.ajax({
        //             type:'POST',
        //             url:"ajax/activateTest.php",
        //             data:{activatedTest:tid},
        //             success:function(data){
        //                 // alert(data);
        //                 // window.location = "./dashboard.php";
        //                 // if(data == 0){
        //                 //     window.location = "dashboard.php";
        //                 // }
        //                 // else {
        //                 //     alert(data); 
        //                 // }
        //                 alert("Starting Test");
        //                 window.location = "testPage.php";
        //             }
        //         });
        // }
    </script>
</body>
</html>