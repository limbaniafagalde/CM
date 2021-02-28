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
}

?>