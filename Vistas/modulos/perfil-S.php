<?php
//solo los q tienen el rol secretaria pueden ingresar a esta pag
if ($_SESSION["rol"] != "Secretaria") {
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
                    $editarPerfil = new SecretariasC();
                    $editarPerfil -> EditarPerfilSecretariaC();
                    $editarPerfil -> ActualizarPerfilSecretariaC();
                
                ?>
            </div>
        </div>
    </section>

</div>