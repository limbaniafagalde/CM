<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Clínica Médica</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/dist/css/skins/_all-skins.min.css">

  
  <!-- fullCalendar -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.print.min.css" media="print">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini login-page">
<!-- Site wrapper -->


<?php
//condiciones para inicio de sesion
if (isset($_SESSION["Ingresar"]) && $_SESSION["Ingresar"] == true) {
  
    echo '<div class="wrapper">';
    include "modulos/cabecera.php";

    if ($_SESSION["rol"] == "Secretaria") {
      include "modulos/menuSecretaria.php";
    }
    elseif ($_SESSION["rol"] == "Paciente") {
      include "modulos/menuPaciente.php";
    }

    $url = array();
    if (isset($_GET["url"])) {
      $url = explode("/", $_GET["url"]); // devuelve un array con cadenas
      if ($url[0] == "inicio" || $url[0] == "salir" || $url[0] == "perfil-Secretaria" ||
       $url[0] == "perfil-S" || $url[0] == "consultorios" || $url[0] == "E-C" || 
       $url[0] == "doctores" || $url[0] == "pacientes" || $url[0] == "perfil-Paciente" ||
       $url[0] == "perfil-P" || $url[0] == "Ver-consultorios" || $url[0] == "Doctor" ||
       $url[0] == "historial") { //cada modulo nuevo se agrega aqui
        include "modulos/".$url[0].".php";
      }
    }
    else{
      include "modulos/inicio.php";
    }

    echo '</div>';  
  }else if(isset($_GET["url"])){
    if ($_GET["url"] == "seleccionar") {
      include "modulos/seleccionar.php";
    
    }else if ($_GET["url"]=="ingreso-Secretaria") { //la var get es la que pido en el archivo .htaccess
      include "modulos/ingreso-Secretaria.php";

    }else if ($_GET["url"]=="ingreso-Paciente") { //la var get es la que pido en el archivo .htaccess
      include "modulos/ingreso-Paciente.php";  
    }

  }else{
    include "modulos/seleccionar.php";
  }

  
?>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="http://localhost/clinica/Vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://localhost/clinica/Vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://localhost/clinica/Vistas/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/clinica/Vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/clinica/Vistas/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/clinica/Vistas/dist/js/demo.js"></script>

<script src="http://localhost/clinica/Vistas/js/doctores.js"></script>

<script src="http://localhost/clinica/Vistas/js/pacientes.js"></script>

                             
<!-- Datatables -->
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.css"></>
  
  <link rel="stylesheet" href="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<script src="http://localhost/clinica/Vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net/js/jquery.dataTables.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- fullCalendar -->
<script src="http://localhost/clinica/Vistas/bower_components/moment/moment.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="http://localhost/clinica/Vistas/bower_components/fullcalendar/dist/locale/es.js"></script>                   



<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    $('#calendar').fullCalendar({
      hiddenDays: [0,6],// no muestro domingo ni sabado (respectivamente 0 y 6)
      defaultView: "agendaWeek",

      events:[
        <?php
          
          $resultado = CitasC::VerCitasC();

          foreach ($resultado as $key => $value) {
            if ($value["id_doctor"] == substr($_GET["url"], 7)) {
              echo '{
                id: '.$value["id"].',
                title: "'.$value["nyaP"].'",
                start: "'.$value["inicio"].'",
                end: "'.$value["fin"].'"

              },';
            }
          }
        ?>
      ],

      dayClick:function(date, jsEvent, view){
        $('#CitaModal').modal();

        var fecha = date.format();
        var hora2 = ("01:00:00").split(":"); //turnos de 1 hora

        fecha = fecha.split("T");
        var dia = fecha[0];

        var hora = (fecha[1].split(":"));
        var h1 = parseFloat(hora[0]);
        var h2 = parseFloat(hora2[0]);

        var horaFinal = h1 + h2; // hora final del turno, si empieza a las 9 la hora final seria a las 10

        $('#fechaC').val(dia); //a un id html a su value le asigno lo que esta entre ()

        $('#horaC').val(h1+":00:00"); // formula para no poder seleccionar hora y media

        $('#fyhIC').val(fecha[0] + " " + h1+":00:00"); //inicio del turno
        $('#fyhFC').val(fecha[0] + " " + horaFinal+":00:00"); //fin del turno
      }
    
    })

</script>
</body>
</html>
