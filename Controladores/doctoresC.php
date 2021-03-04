<?php

class DoctoresC{

    public function CrearDoctorC(){
        if (isset($_POST["rolD"])) {

            $tablaBD = "doctores";

            $datosC = array(
                "rol" => $_POST["rolD"],
                "apellido" => $_POST["apellido"],
                "nombre" => $_POST["nombre"],
                "sexo" => $_POST["sexo"],
                "id_consultorio" => $_POST["consultorio"],
                "usuario" => $_POST["usuario"],
                "clave" => $_POST["clave"]
            );

            $resultado = DoctoresM::CrearDoctorM($tablaBD, $datosC);
            
            if ($resultado == true) {
                echo '<script>
                window.location = "doctores";
                </script>';
            }
        
        }
    }

    static public function VerDoctoresC($columna, $valor){
        $tablaBD = "doctores";

        $resultado = DoctoresM::VerDoctoresM($tablaBD, $columna, $valor);

        return $resultado;
    }

    static public function DoctorC($columna, $valor){
        $tablaBD = "doctores";

        $resultado = DoctoresM::DoctorM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function ActualizarDoctorC(){
        if (isset($_POST["Did"])) {
            $tablaBD = "doctores";
            $datosC = array("id" => $_POST["Did"],
            "apellido" => $_POST["apellidoE"],
            "nombre" => $_POST["nombreE"],
            "sexo" => $_POST["sexoE"],
            "usuario" => $_POST["usuarioE"],
            "clave" => $_POST["claveE"]);
            
            $resultado = DoctoresM::ActualizarDoctorM($tablaBD, $datosC);
            
            if ($resultado == true) {
                echo '<script>
                window.location = "doctores";
                </script>';
            }
        
        }

    }
                    
    public function BorrarDoctorC(){
       if (isset($_GET["Did"])) { // las var get son las var mediante URL

           $tablaBD = "doctores";

           $id = $_GET["Did"];

           if ($_GET["imgD"] != "") {
               unlink($_GET["imgD"]); //la eliminamos
           }
                                   
           $resultado = DoctoresM::BorrarDoctorM($tablaBD, $id);
           if ($resultado == true) {
            echo '<script>
            window.location = "doctores";
            </script>';
            }
        } 
    }

    public function IngresarDoctorC(){
        if (isset($_POST["usuario-Ing"])) {
            if (preg_match('/^[a-z-Z0-9]+$/', $_POST["usuario-Ing"]) && preg_match('/^[a-z-Z0-9]+$/', $_POST["clave-Ing"])) { //evitar entrada de codigo malicioso
                $tablaBD = "doctores";
                $datosC = array("usuario" => $_POST["usuario-Ing"],
                                "clave" => $_POST["clave-Ing"]);

                $resultado = DoctoresM::IngresarDoctorM($tablaBD, $datosC);

                if ($resultado["usuario"] == $_POST["usuario-Ing"] && $resultado["clave"] == $_POST["clave-Ing"]) {
        
                    $_SESSION["Ingresar"] = true; //iniciar sesion

                    
                    $_SESSION["id"] = $resultado["id"];  
                    $_SESSION["usuario"] = $resultado["usuario"];
                    $_SESSION["clave"] = $resultado["clave"];
                    $_SESSION["nombre"] = $resultado["nombre"];
                    $_SESSION["apellido"] = $resultado["apellido"];
                    $_SESSION["foto"] = $resultado["foto"];
                    $_SESSION["sexo"] = $resultado["sexo"];
                    $_SESSION["rol"] = $resultado["rol"];
                
                    echo '<script>
                    window.location = "inicio";
                    </script>'; //script js que recarga la pag
                }else{
                 
                    echo "<br><div class='alert alert-danger'>Error al ingresar</div>";
                }

            }
        }
    }

    public function VerPerfilDoctorC(){
        $tablaBD = "doctores";

        $id = $_SESSION["id"];

        $resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);
        
        echo'
        <tr>
            <td>'.$resultado["usuario"].'</td>
            <td>'.$resultado["clave"].'</td>
            <td>'.$resultado["nombre"].'</td>
            <td>'.$resultado["apellido"].'</td>
            <td>Desde: '.$resultado["horarioE"].'
            <br>
            Hasta: '.$resultado["horarioS"].'</td>';
        
            if ($resultado["foto"] != "") {
                echo '<td><img src="http://localhost/clinica/'.$resultado["foto"].'" class="img-responsive" width="40px"></td>';
                
              } else{
                 echo '<td><img src="http://localhost/clinica/Vistas/img/defecto.png" class="img-responsive" width="40px"></td>';
             }

             $columna = "id";
             $valor = $resultado["id_consultorio"];
             $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);
        echo '<td>'.$consultorio["nombre"].'</td>';
        
        echo'
            <td>
                <a href="http://localhost/clinica/perfil-D/'.$resultado["id"].'">
                    <button class="btn btn-success">
                        <i class="fa fa-pencil"></i>
                    </button>
                </a>
            </td>
        </tr>';

    }

    public function EditarPerfilDoctorC(){
       $tablaBD = "doctores";
       $id = $_SESSION["id"];

       $resultado = DoctoresM::VerPerfilDoctorM($tablaBD, $id);

       echo '<form method="post" enctype="multipart/form-data">
       <div class="row">
            <div class="col-md-6 col-xs-12">
                    <h3>Nombre:</h3>
                    <input type="text" class="input-lg" name="nombrePerfil" value="'.$resultado["nombre"].'">
                    <input type="hidden" name="Did" value="'.$resultado["id"].'">

                    <h3>Apellido:</h3>
                    <input type="text" class="input-lg" name="apellidoPerfil" value="'.$resultado["apellido"].'">

                    <h3>Usuario:</h3>
                    <input type="text" class="input-lg" name="usuarioPerfil" value="'.$resultado["usuario"].'">

                    <h3>Contraseña:</h3>
                    <input type="text" class="input-lg" name="clavePerfil" value="'.$resultado["clave"].'">

                    

                    <h3>Consultorio:</h3>
                    <select class="input-lg" name="consultorioPerfil">';
                            $columna = null;
                            $valor = null;
                            $consultorio = ConsultoriosC::VerConsultoriosC($columna, $valor);

                            foreach ($consultorio as $key => $value) {
                                echo '<option value="'.$value["id"].'">'.$value["nombre"].'</option>';
                            }
                    echo'</select>

                <div class="form-group">
                    <h3>Horario:</h3>
                    Desde: <input type="time" class="input-lg" name="hePerfil" value="'.$resultado["horarioE"].'">
                    Hasta: <input type="time" class="input-lg" name="hsPerfil" value="'.$resultado["horarioS"].'">
                </div>
            </div>

            <div class="col-md-6 col-xs-12">
               <br><br>
                    
               <input type="file" name="imgPerfil">
               <br>';
                
               if ($resultado["foto"] == "") {
                echo '<img src="http://localhost/clinica/Vistas/img/defecto.png" width="200px">';
                }
                else{
                    echo '<img src="http://localhost/clinica/'.$resultado["foto"].'" width="200px">';
                }    

                echo'
               <input type="hidden" name="imgActual" value="'.$resultado["foto"].'">
               <br><br>

               <button type="submit" class="btn btn-success">Guardar Cambios</button>
            </div>

        </div>

     </form>
    ';
    }

    public function ActualizarPerfilDoctorC(){
        if (isset($_POST["Did"])) {
            $rutaImg = $_POST["imgActual"];

            if (isset($_FILES["imgPerfil"]["tmp_name"]) && !empty($_FILES["imgPerfil"]["tmp_name"])) {
                if (!empty($_POST["imgActual"])) {
                    
                    unlink($_POST["imgActual"]);
                }

                if ($_FILES["imgPerfil"]["type"] == "image/png") {
                    $nombre = mt_rand(100,999);
                    $rutaImg = "Vistas/img/Doctores/D-".$nombre.".png";

                    $foto = imagecreatefrompng($_FILES["imgPerfil"]["tmp_name"]);
                    imagepng($foto, $rutaImg);
                }

                if ($_FILES["imgPerfil"]["type"] == "image/jpeg") {
                    $nombre = mt_rand(100,999);
                    $rutaImg = "Vistas/img/Doctores/D-".$nombre.".jpg";

                    $foto = imagecreatefromjpeg($_FILES["imgPerfil"]["tmp_name"]);
                    imagejpeg($foto, $rutaImg);
                }                 
            }

            $tablaBD = "doctores";
            $datosC = array ("id" => $_POST["Did"],
            "nombre" => $_POST["nombrePerfil"],
            "apellido" => $_POST["apellidoPerfil"],
            "usuario" => $_POST["usuarioPerfil"],
            "clave" => $_POST["clavePerfil"],
            "id_consultorio" => $_POST["consultorioPerfil"],
            "horarioE" => $_POST["hePerfil"],
            "horarioS" => $_POST["hsPerfil"],
            "foto" => $rutaImg);

            $resultado = DoctoresM::ActualizarPerfilDoctorM($tablaBD, $datosC);

            if ($resultado == true) {
                echo '<script>
                window.location = "http://localhost/clinica/perfil-D/'.$resultado["id"].'";
                </script>';

            }
        }

    }

}

?>