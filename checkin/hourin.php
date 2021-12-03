<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"/>
<link rel="stylesheet" href="systechour.css">
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>

<?php
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="../node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
</head>

<body>

<nav class="navbar navbar-default" id="navigation-purple">
        <div class="container">
            <a href=""></a>
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
                    <li><a href="../index.php?login=false">Menu</a></li>
                    <li><a href="../emp/employee.php">Consultar</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                </ul>
            </div>
        </div>
    </nav>

<div class="card border-secondary mb-3">
<div class="container">

<div id="signupbox" style=" margin-top:20px" class="mainbox col-md-10 col-md-offset-1 col-sm-20 col-sm-offset-1">
    <div class="panel panel-info">
        <div style="background-color: #3C7E7B;" class="panel-heading">
            <div style="color: white;" class="panel-title"><h1>Agegar Usuario</h1></div>
            </div>
            <div class="panel-body">
            
                <input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />
                <hr class="border">

                <form class="form-horizontal" id="formularioh" name="historial" method="POST">

                    <div class="form-group">
                        <h3>Datos de empleado</h3> <br>
                        <label><b>No. Empleado</b></label>
                        <?php
 
                            require '../database.php';
                        
                            $strSql = "SELECT emp_id FROM emp_mstr ORDER BY emp_id DESC LIMIT 1";
                            $records = $conn->prepare($strSql);
                            $records->execute();
                            $results = $records->fetch(PDO::FETCH_ASSOC);
                            $id = $results['emp_id'];
                            echo '<input class="datosg" type="text" id="nombrep" name="nombrep" value='.($id + 1).' disabled>';
                        
                            if(isset($_POST['button'])) {
                                $myDate = $_POST['f_elab'];
                                $myName = $_POST['nombrelb'];
                        
                                $myGen = $_POST['gender'];
                                if(strtoupper($myGen) == 'M'){
                                    $myGen = 1;
                                } else {
                                    $myGen = 0;
                                }
                        
                                $myDad = $_POST['paterno'];
                                $myMomo = $_POST['materno'];
                                $myCol = $_POST['colonia'];
                                $myStreet = $_POST['calle'];
                                $myNum = $_POST['numero'];
                                $myMail = $_POST['e-mail'];
                                $myTel = $_POST['tel'];
                        
                        
                                $strSql = "INSERT INTO emp_mstr (emp_id, emp_date, emp_name, emp_gend, emp_paternal, emp_maternal, emp_col, emp_street, emp_num, emp_email, emp_tel) VALUES( ".($id + 1).", '".$myDate."', '".$myName."', '".$myGen."', '".$myDad."', '".$myMomo."', '".$myCol."' ,'".$myStreet."', ".$myNum.", '".$myMail."', ".$myTel.")";
                                if ($conn->query($strSql) == TRUE) {
                                    echo "<script type='text/javascript'>Swal.fire({title:'Usuario agregado con Éxito',text: '', icon: 'success'}) </script>";
                                } else {
                                    echo "Error ".$strSql;
                                }                        
                            }                                                       
                           
                        ?>
                        <label><b>Fecha de ingreso</b></label>
                        <input class="datosp" type="date" id="f_elab" name="f_elab" data-date-format="DD-MM-YYYY">

                    </div>
                    <hr class="border">
                    <div class="fila">
                        <h3>Datos personales del empleado</h3> <br>
                        <label class="nombrelabel"><b>Nombres</b></label>
                        
                        <input class="datosg" type="text" id="nombrelb" name="nombrelb">
                        <label>     </label>    
                        <label for="id_gender" class="gender"><b>Genero</b></label>
                        
                            <label class="radio-inline"> <input type="radio" name="gender"  value="M"  style="margin-bottom: 10px">Masculino</label>
                            <label class="radio-inline"> <input type="radio" name="gender"  value="F"  style="margin-bottom: 10px">Femenino</label>
                        
                        <br><br>
                    </div>
                    <div class="fila">
                        <h4>Apellidos</h4><br>
                        <div class="form-group">
                            <label><b>Paterno:</b></label>
                            <input class="datosg" type="text" id="paterno" name="paterno">
                            <label><b>Materno:</b></label>
                            <input class="datosg" type="text" id="materno" name="materno">
                        </div>
                    </div>
                    <div class="fila">
                        <h4>Direccion</h4><br>
                        <div class="form-group">
                            <label><b>Colonia:</b></label>
                            <input class="datos3" type="text" id="colonia" name="colonia">
                            <label><b>Calle:</b></label>
                            <input class="datos3" type="text" id="calle" name="calle">
                            <label><b>Numero:</b></label>
                            <input class="datos3" type="text" id="numero" name="numero">
                        </div>
                    </div>
                    <div class="fila">
                        <h4>Datos de contacto</h4><br>
                         <div class="form-group">
                            <label><b>Correo electronico:</b></label>
                            <input class="datos2" type="text" id="e-mail"  name="e-mail">
                            <label><b>Telefono:</b></label>
                            <input class="datos2" type="text" id="tel" name="tel">
                    </div>
                    </div>
            </div>
        <footer>
            <input type="submit" id="btnSession" name="button" class="button" value="Guardar">
        </footer>
    </form>
</div>
</div>

    <div id=dvTable></div>

<script type="text/javascript">
    function emptyStatus(){
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
            url: 'agregar.php',
            type: 'POST',
            async: true,
            data: {'id':myId,'date':myDate,'name':myName,'gender':myGender,'dad':myDad,'mom':myMom,'col':myCol,'street':myStreet,'num':myNum,'mail':myMail,'tel':myTel},

            success: function(response){
                Swal.fire({
                    title:'Usuario agregado con Éxito',
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