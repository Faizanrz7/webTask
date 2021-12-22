<?php

    include("Classes/PHPExcel.php");
    include('connection.php');

    // echo $_FILES[];
    if(!empty($_FILES["excel_file"])){
        $file_array = explode(".", $_FILES["excel_file"]["name"]);
        $tid = $_POST['test'];
        // echo $tid;
        // echo $file_array[0];
        if($file_array[1] == "xls" || $file_array[1] == "xlsx") {
            $uploadFilePath = 'uploads/'.basename($_FILES['excel_file']['name']);
            move_uploaded_file($_FILES['excel_file']['tmp_name'], $uploadFilePath);
            $filename = $_FILES["excel_file"]["name"];
            // echo $filename;
            $object = PHPExcel_IOFactory::load($uploadFilePath);
            foreach($object->getWorksheetIterator() as $worksheet) {
                $rowcount = $worksheet->getHighestRow();
                for($row = 2; $row <= $rowcount; $row++) {
                    $question = $worksheet->getCellByColumnAndRow(0, $row)->getValue();
                    $option1 = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
                    $option2 = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $option3 = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $option4 = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $canswer = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $query = $db->prepare('INSERT INTO questions(tid, question, option1, option2, option3, option4, canswer) values(?, ?, ?, ?, ?, ?, ?)');
                    
                    $data = array($tid, $question, $option1, $option2, $option3, $option4, $canswer);
                    $execute = $query->execute($data);
                }
                if($row == $rowcount + 1){
                    echo "All Questions Added Successfully.";
                }
                else {
                    echo "Problem in adding Question.";
                }
                // echo $rowcount." ".$row;
            }
        }
        else {
            echo "Upload excel file";
        }
        
    }
    else {
        echo "Please Select file";
    }
?>