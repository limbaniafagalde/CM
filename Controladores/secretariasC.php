<?php
class SecretariasC{
    
    public function IngresarSecretariaC(){
        if (isset($_POST["usuario-Ing"])) {
            if (preg_match('/^[a-z-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-z-Z0-9]+$/', $_POST["clave-Ing"])) {
               $tablaBD = "secretarias";
               $datosC = array("usuario" => $_POST["usuario-Ing"],
                                "clave" => $_POST["clave-Ing"]);
               
               $resultado = SecretariasM::IngresarSecretariaM($tablaBD, $datosC);
                
               if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {
                //creamos una var de sesion, que sirve para que una sesion sea privada y que para ingresar tenemos que usar un usuario y contraseña ya registrada 
                   $_SESSION["Ingresar"] = true; //se iniciaria la sesion
                   //desde cabecera.php empezaremos a enviar los datos con estas variables de sesion
                   $_SESSION["id"] = $resultado["id"];   
                   $_SESSION["usuario"] = $resultado["usuario"];
                   $_SESSION["clave"] = $resultado["clave"];
                   $_SESSION["nombre"] = $resultado["nombre"];
                   $_SESSION["apellido"] = $resultado["apellido"];
                   $_SESSION["foto"] = $resultado["foto"];
                   $_SESSION["rol"] = $resultado["rol"];

                   echo '<script>
                   window.location = "inicio";
                   </script>'; //script js que recarga la pag
                }else{
                    echo "<br><div class='alert alert-danger'>Error al ingresar</div>";
                }
                
            }//evitar ataques a la BD
        }
    }
    public function VerPerfilSecretariaC(){
        $tablaBD = "secretarias";
        $id = $_SESSION["id"]; //id de ese usuario
        
        $resultado = SecretariasM::VerPerfilSecretariaM($tablaBD, $id);
        
        echo '
        <tr>
            <td>'.$resultado["usuario"].'</td>
            <td>'.$resultado["clave"].'</td>
            <td>'.$resultado["nombre"].'</td>
            <td>'.$resultado["apellido"].'</td>
            ';
           
           if ($resultado["foto"] != "") {
              echo '<td><img src="http://localhost/clinica/'.$resultado["foto"].'" class="img-responsive" width="40px"></td>';
              
            } else{
               echo '<td><img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"></td>';
           }

        echo' 
            <td>
                <a href="http://localhost/clinica/perfil-S/'.$resultado["id"].'">
                    <button class="btn btn-succes"><i class="fa fa-pencil"></i></button>
                </a>
            </td>
        </tr>
        ';
    }

    public function EditarPerfilSecretariaC(){
        $tablaBD = "secretarias";
        
        $id = $_SESSION["id"]; //id de ese usuario
        
        $resultado = SecretariasM::VerPerfilSecretariaM($tablaBD, $id);
        
        echo '
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 col-xs-12">
                    <input type="hidden" class="input-lg" name="idP" value="'.$resultado["id"].'">
                    <h2>Nombre:</h2>
                    <input type="text" class="input-lg" name="nombreP" value="'.$resultado["nombre"].'">
                    <h2>Apellido:</h2>
                    <input type="text" class="input-lg" name="apellidoP" value="'.$resultado["apellido"].'">
                    <h2>Usuario:</h2>
                    <input type="text" class="input-lg" name="usuarioP" value="'.$resultado["usuario"].'">
                    <h2>Clave:</h2>
                    <input type="text" class="input-lg" name="claveP" value="'.$resultado["clave"].'">
                </div>
                <div class="col-md-6 col-xs-12">
                    <br><br>
                    <input type="file" name ="imgP">
                    <br>';
                    if ($resultado["foto"] == "") {
                        echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" width="100px">';
                    }else{
                        echo '<img src="http://localhost/clinica/'.$resultado["foto"].'" width="100px">';
                    }
                    
                    echo '<input type="hidden" name="imgActual" value="'.$resultado["foto"].'">

                    <br><br>

                    <button type="submit" class="btn btn-success">Guardar Cambios</button>

                    
                </div>
            </div>
         </form>';
    }

    public function ActualizarPerfilSecretariaC(){
    
        if (isset($_POST["idP"])) {
            $rutaImg = $_POST["imgActual"];
            if (isset($_FILES["imgP"]["tmp_name"]) && !empty($_FILES["imgP"]["tmp_name"])) { // si viene con info la var de tipo file/archivo en imgP y debemos colocar el archivo temporal  
                if (!empty($_POST["imgActual"])) {
                    unlink( $_POST["imgActual"]); //eliminar la var post de imagen actual
                }

                //jpeg
                if ($_FILES["imgP"]["type"] == "image/jpeg") { // si la var file de imgP en su type es = a image/jpeg
                    $nombre = mt_rand(10,99); // rango de 10 a 99
                    $rutaImg = "Vistas/img/Secretarias/S-".$nombre.".jpg";
                    $foto = imagecreatefromjpeg($_FILES["imgP"]["tmp_name"]);
                    imagejpeg($foto, $rutaImg);
                }

                //png
                if ($_FILES["imgP"]["type"] == "image/png") { // si la var file de imgP en su type es = a image/png
                    $nombre = mt_rand(10,99); // rango de 10 a 99
                    $rutaImg = "Vistas/img/Secretarias/S-".$nombre.".png";
                    $foto = imagecreatefrompng($_FILES["imgP"]["tmp_name"]);
                    imagepng($foto, $rutaImg);
                }
            }

            $tablaBD = "secretarias";
            $datosC = array("id"=> $_POST["idP"],
            "usuario"=> $_POST["usuarioP"],
            "clave"=> $_POST["claveP"],
            "apellido"=> $_POST["apellidoP"],
            "nombre"=> $_POST["nombreP"],
            "foto"=> $rutaImg);

            $resultado = SecretariasM::ActualizarPerfilSecretariaM($tablaBD, $datosC);
        
            if ($resultado == true) {
                echo '<script>
                    window.location = "http://localhost/clinica/perfil-S/'.$_SESSION["id"].'"; //recargo la pagina
                </script>';
            }
        }      


    }

}
?>