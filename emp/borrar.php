<?php
    require '../database.php';
    
    $myId = $_POST['id'];
    

    $strSql = "DELETE FROM emp_mstr WHERE emp_id = $myId";
    $records = $conn->prepare($strSql);
    $records->execute();
    
    echo '<script>console.log('.$myDate.')</script>'

?>