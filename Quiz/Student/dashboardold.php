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

    <style>
        .table-container {
            width: 450px;
            
        }

        table {
            width: 100%;        
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Hello <?php echo $_SESSION['studentName']?></h1>
    <h1>Available Tests for classId <?php echo $_SESSION['cid']?></h1>
    <!-- <table></table> -->
    <!-- <div id="testList"></div> -->
    <div class="table-container" style = "margin-top: 50px;">
        
    </div>


    <script>
        // $('form').submit(function(e) {
        //     e.preventDefault();
        // });

        getTest();

        function getTest(){
            // var uid = $('#university').val();
            var token = "<?php echo password_hash("getTestList", PASSWORD_DEFAULT);?>";
            var cid = "<?php echo $_SESSION['cid'];?>";
            // alert(cid);
            $.ajax({
                type:'POST',
                url:"ajax/getTestList.php",
                data:{token:token, cid: cid},
                success:function(data){
                    // $('.tab').html(data);
                    // alert(data);
                    $('.table-container').html(data);
                    // $('#uniListInClass').html(data);
                }
            });
        }

        function takeTest(tid) {
            alert(tid);
            $.ajax({
                    type:'POST',
                    url:"ajax/activateTest.php",
                    data:{activeTest:tid},
                    success:function(data){
                        // alert(data);
                        // window.location = "./dashboard.php";
                        // if(data == 0){
                        //     window.location = "dashboard.php";
                        // }
                        // else {
                        //     alert(data); 
                        // }
                        alert("Starting Test " + data);
                        window.location = "testPage.php";
                    }
                });
        }
    </script>
</body>
</html>