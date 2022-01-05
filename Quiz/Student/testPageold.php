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
        .questionSet {
            /* background-color: black; */
            align-items: center;
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <h1>Hello <?php echo $_SESSION['studentName']?></h1>
    <h1>Questions for TestID <?php echo $_SESSION['activeTest']?></h1>
    <div class="questionSet"></div>
    <button id="previous" onclick="previousQuestion()">Previous</button>
    <button id="next" onclick="nextQuestion()">Next</button>
    <button id="submit" onclick="submitTest()">Submit</button>
    <div class="table-container" style = "margin-top: 50px;"></div>

    <script>
        getQuestion();
        
        let questionNumber = 0;
        let questions = {};
        let answers = {};
        function nextQuestion(){
            var selectQuestion = document.getElementsByName(`options${questionNumber}`);
            // console.log(selectQuestion[0].value);
            
            for(var i = 0; i < selectQuestion.length; i++) {
                if(selectQuestion[i].checked == true) {
                    answers[questionNumber] = selectQuestion[i].value;
                    break;
                }
            }
            // console.log(questions);
            // questionNumber++;
            // console.log(questionNumber);
            $('#previous').prop('disabled', false);
            if(questionNumber == questions.length - 1){
                // console.log(questionNumber);
                $('#next').prop('disabled', true);
                alert("Questions Ended Submit Test");

            }
            else {
                questionNumber++;
            }
            createDivForQuestion(questions);
        }
        function previousQuestion(){
            var selectQuestion = document.getElementsByName(`options${questionNumber}`);
            for(var i = 0; i < selectQuestion.length; i++) {
                if(selectQuestion[i].checked == true) {
                answers[questionNumber] = selectQuestion[i].value;
                break;
                }
            }
            questionNumber--;
                $('#next').prop('disabled', false);
                if(questionNumber == 0){
                $('#previous').prop('disabled', true);
            }
            createDivForQuestion(questions);
        }
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
                    // $('.tab').html(data);
                    // alert(data);
                    data = JSON.parse(data);
                    // for(i in data){
                    //     alert(data[i].question);
                    // }
                    createDivForQuestion(data);
                    // $('.table-container').html(data);
                    // $('#uniListInClass').html(data);
                }
            });
        }

        function submitTest() {
            let marksObtained = 0;
            // console.log(questions[0]);
            if(confirm("Submit Test")){
                for(var i = 0; i < questions.length; i++) {
                    // console.log(questions);
                    // console.log(questions[i].answer);
                    if(answers[i] == questions[i].answer) {
                        marksObtained += 1;
                    }
                }
                console.log("Marks Obtained ", marksObtained);
                window.location = "dashboard.php";
            }

        }

       function createDivForQuestion(data){
            // questionNumber++;
            // alert("in create ");
            // alert(Object.keys(data).length);
            questions = data;
            // alert('Questions : ' + questions[0].question);
            $(".questionSet").html(
                `<div class="form-check question">
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

    </script>
</body>
</html>