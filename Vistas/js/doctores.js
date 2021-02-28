//1 permitir archivo en plantilla.php
$(".DT").on("click", ".EditarDoctor", function(){ //jquery - clase DT cuando se haga click en la clase que tiene EditarDoctor, nos ejecute una funcion
    var Did = $(this).attr("Did"); // var Dic = this. atributo Did del button
    var datos = new FormData(); //var datos = Fordata que es una clase de js
    datos.append("Did", Did);// le hacemos un apend de lo que venga en la var post Did del input con la var Did de arriba

    //usamos ajax para traer los datos
    $.ajax({ 
        //envio parametros
        url:"Ajax/doctoresA.php", // donde estará nuestro archivo de ajax
        method: "POST",
        data: datos,
        dataType: "json",
        contentType: false,
        cache: false, 
        processData: false,

        
        success: function(resultado){ 
            $("#Did").val(resultado["id"]); //colocamos el id del input entre $(), donde este ese id en su value queremos el resultado de lo que mande id
            $("#apellidoE").val(resultado["apellido"]); //como id es oculto mostramos apellido
            $("#nombreE").val(resultado["nombre"]);
            $("#usuarioE").val(resultado["usuario"]);
            $("#claveE").val(resultado["clave"]);
            $("#sexoE").html(resultado["sexo"]); 
            $("#sexoE").val(resultado["sexo"]);
          //  $("#consultorioE").val(resultado["id_consultorio"]);
        }
    })
})


$(".DT").on("click", ".EliminarDoctor", function(){ 
    var Did = $(this).attr("Did");
    var imgD = $(this).attr("imgD");
    window.location = "index.php?url=doctores&Did="+Did+"&imgD="+imgD; //& concateno
})
/*
$(".DT").DataTable({
    "language": {

		"sSearch": "Buscar:",
		"sEmptyTable": "No hay datos en la Tabla",
		"sZeroRecords": "No se encontraron resultados",
		"sInfo": "Mostrando registros del _START_ al _END_ de un total _TOTAL_",
		"SInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
		"sInfoFiltered": "(filtrando de un total de _MAX_ registros)",
		"oPaginate": {

			"sFirst": "Primero",
			"sLast": "Último",
			"sNext": "Siguiente",
			"sPrevious": "Anterior"

		},

		"sLoadingRecords": "Cargando...",
		"sLengthMenu": "Mostrar _MENU_ registros"
	}
}) //donde tengamos la clase DT (la que pusimos en nuestra tabla en doctores.php)*/