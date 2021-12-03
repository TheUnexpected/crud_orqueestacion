<?php
    require '../database.php';
    
        $myId = $_POST['id'];
        $myDate = $_POST['date'];
        $myName = $_POST['name'];
        $myGen = $_POST['gender'];
        if(strtoupper($myGen) == 'M'){
            $myGen = 1;
        } else {
            $myGen = 0;
        }
        $myDad = $_POST['dad'];
        $myMomo = $_POST['mom'];
        $myCol = $_POST['col'];
        $myStreet = $_POST['street'];
        $myNum = $_POST['num'];
        $myMail = $_POST['mail'];
        $myTel = $_POST['tel'];


        $strSql = "INSERT INTO emp_mstr (emp_id, emp_date, emp_name, emp_gend, emp_paternal, emp_maternal, emp_col, emp_street, emp_num, emp_email, emp_tel) " +
                  " VALUES( ".$myId.", '".$myDate."', '".$myName."', '".$myGen."', '".$myDad."', '".$myMomo."', '".$myCol."' ,'".$myStreet."', ".$myNum.", '".$myMail."', ".$myTel.")";
        if ($conn->query($strSql) == TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $strSql . "<br>" . $conn->error;
        }
         
?>