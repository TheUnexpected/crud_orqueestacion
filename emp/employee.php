<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
<link rel="stylesheet" href="stylemp.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Empleados</title>
</head>

<body>


<nav class="navbar navbar-default" id="navigation-purple">
        <div class="container">
            <a href="../welcome.php"></a>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                     <!-- Menus vacios por si se llegan a utilizar esta preparado -->
                    <li><a href="../index.php?login=false">Menú</a></li>
                    <li><a href="../checkin/hourin.php">Crear Usuario</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header-nightsky">
        <div class="hero">
            <h1>Lista de Usuarios</h1>
        </div>
    </div>
   

<?php

    require '../database.php';

    $strSql = 'SELECT * FROM emp_mstr';
    $records = $conn->prepare($strSql);
    $records->execute();
    
        echo  "<div class='card'>";
            echo "<div class='card-body'>";
                echo "<table id='empTable' class='table table-bordered table-condensed table-sm table-hover'>";
                    echo "<tr>";
                        echo "<th style='width: 10%'>ID</th>";
                        echo "<th style='width: 30%'>Nombre Usuario</th>";
                        echo "<th style='width: 30%'>Email</th>";
                        echo "<th style='width: 30%'></th>";
                    echo "</tr>";
                while( $results = $records->fetch(PDO::FETCH_ASSOC)) {        
                    echo"<tr>";
                        echo "<td>".$results['emp_id']."</td><td>".$results['emp_name']."</td><td>".$results['emp_email']."</td><td><button class='bnEdit' id='id".$results['emp_id']."$' onclick='editTable(this)'>Editar</button></td>";
                    echo"</tr>";
                }
                echo "</table>";
            echo "</div>";
        echo  "</div>";
      
?>

<br/><br/><br/><br/><br/><br/>
<div id=dvTable></div>

<button id="btChange" type="button" onclick='changeStatus()' style="display:none;"></button>

<script type="text/javascript">
    function editTable(status){
        const myEmp = status.id;
        const myTemp = myEmp.substring(myEmp.indexOf('id') + 2,myEmp.indexOf('$'));
        
        $.ajax({            
            url: 'Registro.php',
            type: 'POST',
            async: true,
            data: {
                'empId': myTemp
            },
            success: function(data) {
                dvTable.innerHTML = data;
        }
        });
    }

    function reloadPage(){
        window.location.reload();
    }

    function changeStatus(){
        const myId  = document.getElementById('nombrep').value;
        const myPreDate = document.getElementById('f_elab').value;
        var myDate = myPreDate;
        const myName = document.getElementById('nombrelb').value;
        const myGender = document.getElementById('id_gender_1').value;
        const myDad = document.getElementById('paterno').value;
        const myMom = document.getElementById('materno').value;
        const myCol = document.getElementById('colonia').value;
        const myStreet = document.getElementById('calle').value;
        const myNum = document.getElementById('numero').value;
        const myMail = document.getElementById('e-mail').value;
        const myTel =  document.getElementById('tel').value;
        
        $.ajax({
            url: 'actualiza.php',
            type: 'POST',
            async: true,
            data: {'id':myId,'date':myDate,'name':myName,'gender':myGender,'dad':myDad,'mom':myMom,'col':myCol,'street':myStreet,'num':myNum,'mail':myMail,'tel':myTel},

            success: function(response){
                Swal.fire(
                    'Usuario Actualizado con Éxito',
                    '',
                    'success'
                );
            },
            error: function(error){
                console.log(error);
            }

        }); 
    }

    function erraseUser(){
        const myId  = document.getElementById('nombrep').value;

        $.ajax({
            url: 'borrar.php',
            type: 'POST',
            async: true,
            data: {'id':myId},

            success: function(response){
                Swal.fire({
                    title:'Usuario borrado con Éxito',
                    text: '',
                    icon: 'success'
                }).then((result) => {
                    if(result.isConfirmed){
                        window.location.reload();
                    }
                })
            },
            error: function(error){
                console.log(error);
            }

        }); 
    }
    
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>