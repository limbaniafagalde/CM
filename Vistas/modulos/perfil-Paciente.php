<?php
//solo los q tienen el rol secretaria pueden ingresar a esta pag
if ($_SESSION["rol"] != "Paciente") {
    echo '<script>
        window.location = "inicio";
    </script>';

    return;

}


?>
<!-- maquetamos!-->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestor de Perfil</h1>   
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Documento</th>
                            <th>Foto</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //para traer los datos de la bd
                            $perfil = new PacientesC();
                            $perfil -> VerPerfilPacienteC();
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>