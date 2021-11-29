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
    <div class="questionSet">
        <div class="question">
            QQQQQQQQQQQQQQQ
        </div>
        <div class="answers">
            <input type="radio" id="option1" value="data[i].option1">
            <label for="option1">data[i].option1</label><br>
            <input type="radio" id="option2"  value="data[i].option2">
            <label for="css">data[i].option2</label><br>
            <input type="radio" id="option3" value="data[i].option3">
            <label for="javascript">data[i].option3</label> <br>
            <input type="radio" id="option4" +value="data[i].option4">
            <label for="javascript">data[i].option4</label>  
        </div>
    </div>
    <div class="table-container" style = "margin-top: 50px;"></div>

    <script>
        getQuestion();
        
        let questionNumber = 0;
        let questions = {};
        function changeQuestionNumber(number){
            questionNumber++;
            // createDivForQuestion(questionNumber);
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
                    alert(data);
                    data = JSON.parse(data);
                    for(i in data){
                        alert(data[i].question);
                    }
                    createDivForQuestion(data);
                    // $('.table-container').html(data);
                    // $('#uniListInClass').html(data);
                }
            });
        }

       function createDivForQuestion(data){
            alert("in create ");
            alert(Object.keys(data).length);
            questions = data;
            alert('Questions : ' + questions[0].question);
       }

    </script>
</body>
</html>