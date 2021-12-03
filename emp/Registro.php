<?php
    require '../database.php';

    $strSql = "SELECT * FROM emp_mstr WHERE emp_id = '".$_POST['empId']."'";
    $records = $conn->prepare($strSql);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $nombre = $results['emp_name'];
    
    echo '<div class="container">';

        echo '<div id="signupbox" style=" margin-top:20px" class="mainbox col-md-10 col-md-offset-1 col-sm-20 col-sm-offset-1">';
            echo '<div class="panel panel-info">';
                echo '<div style="background-color: #3C7E7B;" class="panel-heading">';
                    echo '<div style="color: white;" class="panel-title">Registro de Usuarios</div>';
                    echo '</div>';
                    echo '<div class="panel-body">';
                    echo '<form method="post" action=".">';
                        echo "<input type='hidden' name='csrfmiddlewaretoken' value='XFe2rTYl9WOpV8U6X5CfbIuOZOELJ97S' />";
                        echo '<hr class="border">';

                        echo '<form class="form-horizontal" id="formularioh" name="historial" method="POST">';

                            echo '<div class="form-group">';
                                echo '<h3>Datos de Usuario</h3> <br>';
                                echo '<label><b>No. Usuario</b></label>';
                                echo '<input class="datosg" type="text" id="nombrep" value='.$results['emp_id'].' disabled>';
                                echo '<label><b>Fecha de ingreso</b></label>';
                                echo '<input class="datosp" type="date" id="f_elab" data-date-format="DD-MM-YYYY" value='.$results['emp_date'].'>';

                            echo '</div>';
                            echo '<hr class="border">';
                            echo '<div class="fila">';
                                echo '<h3>Datos personales del Usuario</h3> <br>';
                                echo '<label class="nombrelabel"><b>Nombres</b></label>';
                                
                                echo '<input class="datosg" type="text" id="nombrelb" value="'.$nombre.'">';
                                echo '<label>     </label>';
                                echo '<label for="id_gender" class="gender"><b>Genero</b></label>';
                                if($results['emp_gend']==1){
                                    echo '<label class="radio-inline"> <input type="radio" name="gender" id="id_gender_1" value="M"  style="margin-bottom: 10px" checked>Masculino</label>';
                                    echo '<label class="radio-inline"> <input type="radio" name="gender" id="id_gender_2" value="F"  style="margin-bottom: 10px">Femenino</label>';
                                }else{
                                    echo '<label class="radio-inline"> <input type="radio" name="gender" id="id_gender_2" value="M"  style="margin-bottom: 10px">Masculino</label>';
                                    echo '<label class="radio-inline"> <input type="radio" name="gender" id="id_gender_1" value="F"  style="margin-bottom: 10px" checked>Femenino</label>';
                                }
                                
                                echo '<br><br>';
                            echo '</div>';
                            echo '<div class="fila">';
                                echo '<h4>Apellidos</h4><br>';
                                echo '<div class="form-group">';
                                    echo '<label><b>Paterno:</b></label>';
                                    echo '<input class="datosg" type="text" id="paterno" value="'.$results['emp_paternal'].'">';
                                    echo '<label><b>Materno:</b></label>';
                                    echo '<input class="datosg" type="text" id="materno" value="'.$results['emp_maternal'].'">';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="fila">';
                                echo '<h4>Direccion</h4><br>';
                                echo '<div class="form-group">';
                                    echo '<label><b>Colonia:</b></label>';
                                    echo '<input class="datos3" type="text" id="colonia" value="'.$results['emp_col'].'">';
                                    echo '<label><b>Calle:</b></label>';
                                    echo '<input class="datos3" type="text" id="calle" value="'.$results['emp_street'].'">';
                                    echo '<label><b>Numero:</b></label>';
                                    echo '<input class="datos3" type="text" id="numero" value="'.$results['emp_num'].'">';
                                echo '</div>';
                            echo '</div>';
                            echo '<div class="fila">';
                                echo '<h4>Datos de contacto</h4><br>';
                                 echo '<div class="form-group">';
                                    echo '<label><b>Correo electronico:</b></label>';
                                    echo '<input class="datos2" type="text" id="e-mail" value="'.$results['emp_email'].'">';
                                    echo '<label><b>Telefono:</b></label>';
                                    echo '<input class="datos2" type="text" id="tel" value="'.$results['emp_tel'].'">';
                                echo'</div>';
                            echo'</div>';
                    echo '</div>';

                  echo '</form>';

                echo '<footer>';
                    echo '<a onclick="changeStatus()">Guardar</a>';
                    echo '<a onclick="erraseUser()">Borrar</a>';
                    echo '<a onclick="reloadPage()">Regresar</a>';
                echo '</footer>';
        echo '</div>';
?>
