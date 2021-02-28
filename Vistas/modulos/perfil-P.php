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
    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php
               
                    $editarPerfil = new PacientesC();
                    $editarPerfil -> EditarPerfilPacienteC();
                    $editarPerfil -> ActualizarPerfilPacienteC();
               
                ?>
            </div>
        </div>
    </section>

</div>