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


        $strSql = "UPDATE emp_mstr SET emp_date = '$myDate', emp_name = '$myName', emp_gend = $myGen, emp_paternal = '$myDad', emp_maternal = '$myMomo', emp_col = '$myCol', emp_street = '$myStreet', emp_num = $myNum, emp_email = '$myMail', emp_tel = $myTel WHERE emp_id = $myId";
        $records = $conn->prepare($strSql);
        $records->execute();
        
        echo '<script>console.log('.$myDate.')</script>'
    
    

?>