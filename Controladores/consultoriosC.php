<?php

class ConsultoriosC {
    public function CrearConsultorioC(){
        if (isset($_POST["consultorioN"])) {
            $tablaBD = "consultorios";
            $consultorio = array(
                "nombre" => $_POST["consultorioN"]
            );

            $resultado = ConsultoriosM::CrearConsultorioM($tablaBD, $consultorio);

            if ($resultado == true) {
                echo '<script>
                window.location="http://localhost/clinica/consultorios"
                </script>';
            }
        }
    }

    static public function VerConsultoriosC($columna, $valor){
        $tablaBD = "consultorios";

        $resultado = ConsultoriosM::VerConsultoriosM($tablaBD, $columna, $valor);

        return $resultado;
    }

    public function BorrarConsultorioC(){
        if (substr($_GET["url"], 13)) { //substraemos la var get de la url, contamos desde consultorio 13 lugares para que empiece a contar el id, si esto es true
            $tablaBD = "consultorios";
             
             $id = substr($_GET["url"], 13);
            
             $resultado = ConsultoriosM::BorrarConsultorioM($tablaBD, $id);

             if ($resultado == true) {
                echo '<script>
                window.location="http://localhost/clinica/consultorios"
                </script>';
            }

        }
    }

    public function EditarConsultorioC(){
        $tablaBD = "consultorios";

        $id = substr($_GET["url"], 4);

        $resultado = ConsultoriosM::EditarConsultorioM($tablaBD, $id);

        echo 
        '<div class="form-group">
            <h2>Nombre:</h2>
            <input type="text" class="form-control input-md" name = "consultorioE" value ="'.$resultado["nombre"].'">
            <input type="hidden" class="form-control input-md" name = "Cid" value ="'.$resultado["id"].'">
            <br>
            <button class="btn btn-success" type="submit">Guardar Cambios</button>
        </div>';
    }

    public function ActualizarConsultorioC(){
        if (isset($_POST["consultorioE"])) {
            $tablaBD = "consultorios"; 
            $datosC = array(
                "id" => $_POST["Cid"],
                "nombre" => $_POST["consultorioE"]
            );
            
            $resultado = ConsultoriosM::ActualizarConsultorioM($tablaBD, $datosC);

            if ($resultado == true) {
                echo '<script>
                window.location="http://localhost/clinica/consultorios"
                </script>';
            }
        }
        
    }
}


?>