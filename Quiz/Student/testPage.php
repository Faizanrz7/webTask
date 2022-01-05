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
    <title>Test</title>

    <style>
        body {
            display: flex;
            flex-direction: column;
        }
        .container {
            /* height: 300px;
            width: 800px; */
            display: flex;
            /* align-items: center; */
            flex-direction: column;
            text-align:center;
            /* justify-content: center; */
            color: white;
            box-shadow: 0 0 30px black;
            /* background: blue; */

        }
        .heading {
            display: flex;
            flex-direction: column;
            color: white;
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
    .questionSet {
        /* background: blue; */
        width: 80%;
        margin-top: 10vh;
        height: 50vh;
        /* color: white; */
        overflow: auto;
        /* display: flex;
        flex-direction: column;
        align-items: center; */
        border: 5px solid #03a9f4;
        border-radius: 5px;
        padding: 15px;
    }
    .question {
        font-size: 50px;
        font-weight: bold;
        width: 100%;
    }
    .answers {
        margin-top: 50px;
        font-size: 40px;

    }
    .buttons {
        display: flex;
        flex-direction: column;
        gap: 15px;
        align-items: center;
        font-size: 50px;
        width: 20px;
        margin-top: 30vh;
    }
    button {
        width: 200px;
        height: 50px;
    }
    .b-text {
        font-size: 30px;
        font-weight: bold;
    }
    </style>
</head>
<body>
    <div class="mainContainer">
        <div class="heading">
            <!-- <h1>Hello </h1> -->
            <h1>WELCOME <?php echo $_SESSION['studentName'];?></h1>
            <h2>Test ID : <?php echo $_SESSION['activeTest'];?></h2>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="col-sm-12" style="width= 100%">
                <div class="questionSet"></div>
            </div>
        </div>
        <div class="col-sm-2">
            <div class="buttons">
                <button class="btn btn-info" id="next" onclick="nextQuestion()">
                    <div class="b-text">
                        Next
                    </div>
                </button>
                <button class="btn btn-info"  id="next" onclick="submitTest()">
                    <div class="b-text">
                        Submit Test
                    </div>
                </button>
                <button class="btn btn-danger"  id="next" onclick="homepage()">
                    <div class="b-text">
                        Home Page
                    </div>
                </button>
            </div>
        </div>
    </div>
    
</body>
</html>

    <script>
        getQuestion();

        let questionNumber = 0;
        let questions = {};
        let answers = {};

        function getQuestion(){
                // var uid = $('#university').val();
                var token = "<?php echo password_hash("getQuestions", PASSWORD_DEFAULT);?>";
                var activeTest = "<?php echo $_SESSION['activeTest']?>";
                // alert(activeTest);
                $.ajax({
                    type:'POST',
                    url:"ajax/getQuestions.php",
                    data:{token:token},
                    success:function(data){
                        data = JSON.parse(data);
                        createDivForQuestion(data);
                    }
                });
            }

            function createDivForQuestion(data){
            questions = data;
            $(".questionSet").html(
                `<div class="question">
                    ${questions[questionNumber].question}
                </div>
                <div class="answers">
                    <input type="radio" id="option1" name="options${questionNumber}" value="A">
                    <label for="option1">${data[questionNumber].option1}</label><br>
                    <input type="radio" id="option2" name="options${questionNumber}" value="B">
                    <label for="css">${data[questionNumber].option2}</label><br>
                    <input type="radio" id="option3" name="options${questionNumber}" value="C">
                    <label for="javascript">${data[questionNumber].option3}</label> <br>
                    <input type="radio" id="option4" name="options${questionNumber}" value="D">
                    <label for="javascript">${data[questionNumber].option4}</label>  
                </div>`);
       }

       function nextQuestion(){
            var selectQuestion = document.getElementsByName(`options${questionNumber}`);
            
            for(var i = 0; i < selectQuestion.length; i++) {
                if(selectQuestion[i].checked == true) {
                    answers[questionNumber] = selectQuestion[i].value;
                    break;
                }
            }
            $('#previous').prop('disabled', false);
            if(questionNumber == questions.length - 1){
                $('#next').prop('disabled', true);
                alert("Questions Ended Submit Test");

            }
            else {
                questionNumber++;
            }
            createDivForQuestion(questions);
        }

        // function previousQuestion(){
        //     var selectQuestion = document.getElementsByName(`options${questionNumber}`);
        //     for(var i = 0; i < selectQuestion.length; i++) {
        //         if(selectQuestion[i].checked == true) {
        //         answers[questionNumber] = selectQuestion[i].value;
        //         break;
        //         }
        //     }
        //     questionNumber--;
        //     console.log(questionNumber);
        //         $('#next').prop('disabled', false);
        //         if(questionNumber < 0){
        //             console.log("disable");
        //             $('#previous').prop('disabled', true);
        //         }
        //         else {
        //             createDivForQuestion(questions);
        //         }
        // }
        function getQuestion(){
            // var uid = $('#university').val();
            var token = "<?php echo password_hash("getQuestions", PASSWORD_DEFAULT);?>";
            var activeTest = "<?php echo $_SESSION['activeTest']?>";
            // alert(activeTest);
            $.ajax({
                type:'POST',
                url:"ajax/getQuestions.php",
                data:{token:token},
                success:function(data){
                    data = JSON.parse(data);
                    createDivForQuestion(data);
                }
            });
        }

        function submitTest() {
            let marksObtained = 0;
            // console.log(questions[0]);
            var token = "<?php echo password_hash("saveMarks", PASSWORD_DEFAULT);?>";
            if(confirm("Submit Test")){
                for(var i = 0; i < questions.length; i++) {
                    // console.log(questions);
                    // console.log(questions[i].answer);
                    if(answers[i] == questions[i].answer) {
                        marksObtained += 1;
                    }
                }
                $.ajax({
                type:'POST',
                url:"ajax/saveMarks.php",
                data:{token:token, marks: marksObtained},
                success:function(data){
                    if(data == 0){
                        alert("Marks Added");
                    }
                    else {
                        alert("Marks Not Added");
                    }
                }
            });
                // window.location = "dashboard.php";
            }

        }

        function homepage(){
                    window.location.href = "./dashboard.php"
        }
    </script>

<?php
    }
else {
    echo "You are not authorized";
}
?>