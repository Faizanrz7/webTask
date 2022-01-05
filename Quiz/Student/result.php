<?php
    session_start();
    if(isset($_SESSION['studentName'])){
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/brands.min.css" integrity="sha512-sVSECYdnRMezwuq5uAjKQJEcu2wybeAPjU4VJQ9pCRcCY4pIpIw4YMHIOQ0CypfwHRvdSPbH++dA3O4Hihm/LQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Result Page</title>

    <style>
        .container {
            width: 800px; */
            display: flex;
            flex-direction: column;
            text-align:center;
            color: white;
            box-shadow: 0 0 30px black;
        }



    .formContainer {
        display: flex;
        flex-direction: column;
        gap: 15px;
        width: 40vw;
        margin-top: 50px;

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
                <li><a href="dashboard.php">HOME</a></li>
                <li class="active"><a href="result.php">Result</a></li>
                <li><a onclick="logout()">Log Out</a></li>
            </ul>
        </div>
    </div>
    <div class="mainContainer">
        <div class="heading">
            <!-- <h1>Hello </h1> -->
            <h1>WELCOME <?php echo $_SESSION['studentName'];?></h1>
        </div>
        <div class="formContainer col-sm-12">
            <h1>Available Tests</h1>
            <div class="table-container" style = "margin-top: 50px;">
        </div>
    </div>

    <script>
        getResult();

        function getResult(){
            // var uid = $('#university').val();
            var token = "<?php echo password_hash("getResult", PASSWORD_DEFAULT);?>";
            var sid = "<?php echo $_SESSION['sid'];?>";
            // alert(cid);
            $.ajax({
                type:'POST',
                url:"ajax/getResult.php",
                data:{token:token, sid: sid},
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

    </script>
</body>
</html>

<?php
    }
else {
    echo "You are not authorized";
}
?>