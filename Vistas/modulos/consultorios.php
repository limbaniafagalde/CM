<?php

    if ($_SESSION["rol"] != "Secretaria") {
        echo 
        '<script>
            window.location = "inicio";
        </script>';

        return;
    }

?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestión de Consultorios</h1>

        <section class="content">
            <div class="box">
                <div class="box-header">
                    <form method ="post">
                        <div class="col-md-6 col-xs-12">
                            <input type="text" class="form-control" name="consultorioN" placeholder="Ingrese nuevo consultorio" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear Consultorio</button>
                    </form>
                    
                    <?php
                        $crearC = new ConsultoriosC();
                        $crearC -> CrearConsultorioC();
                    
                    ?>

                </div>

                <div class="box-body">
                    <table class="table table-bordered table-hover tabler -striped">
                        <head>
                            <tr>
                                <th>N°</th>
                                <th>Nombre</th>
                                <th>Editar/Borrar</th>
                            </tr>
                        </head>
                        <tbody>
                            <?php
                                $columna = null;
                                $valor = null;

                                $resultado = ConsultoriosC::VerConsultoriosC($columna, $valor);

                                foreach ($resultado as $key => $value) { //$resultado es el array a recorrer. en cada iteacion el valor del elemento actual se asigna a $value y avanza una posicion. $key le asigna la clave del elemento actual en cada iteracion
                                    //$value nombre es lo que viene en la BD
                                    echo'<tr>
                                    <td>'.($key+1).'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="http://localhost/clinica/E-C/'.$value["id"].'">
                                                <button class="btn btn-success">
                                                    <i class="fa fa-pencil"></i>
                                                    Editar
                                                </button>
                                            </a>
                                            <a href="http://localhost/clinica/consultorios/'.$value["id"].'">
                                                <button class="btn btn-danger">
                                                    <i class="fa fa-times"></i>
                                                    Borrar
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                </tr>';
                                }

                            ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</div>



<?php

$borrarC = new ConsultoriosC();

$borrarC -> BorrarConsultorioC();

?>