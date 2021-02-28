0<?php

    if ($_SESSION["id"] != substr($_GET["url"], 10)) {
        echo 
        '<script>
            window.location = "inicio";
        </script>';

        return;
    }

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestión de Doctores</h1>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#CrearDoctor">Crear Doctor</button>
                </div>

                <div class="box-body">
                    <table class="table table-bordered table-hover table-striped DT">
                        <head>
                            <tr>
                                
                                <th>Fecha y Hora</th>
                                <th>Doctor</th>
                                <th>Consultorio</th>
                                
                            </tr>
                        </head>
                        <tbody>

                            <?php
                                $resultado = CitasC::VerCitasC();

                                foreach ($resultado as $key => $value) {
                                    if ($_SESSION["documento"] == $value["documento"]) {
                                        echo '
                                            <tr>
                                                <td>'.$value["inicio"].'</td>';

                                                $columna = "id";
                                                $valor = $value["id_doctor"];

                                                $doctor = DoctoresC::DoctorC($columna, $valor);
                                                echo '<td>'.$doctor["apellido"].', '.$doctor["nombre"].'</td>';

                                                $columna = "id";
                                                $valor = $value["id_consultorio"];

                                                $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);
                                                echo '<td>'.$consultorio["nombre"].'</td>
                                            </tr>';    
                                    }
                                    
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</div>

