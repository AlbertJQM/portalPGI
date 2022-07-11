var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e){
		guardaryeditar(e);	
	});
}

function limpiar(){
	$("#ci").val("");
	$("#nombre").val("");
	$("#paterno").val("");
	$("#materno").val("");
    $("#telefono").val("");
	$("#usuario").val("");
	$("#contraseña").val("");
    $("#rol").val("");
	$("#idpersonal").val("");
}

function mostrarform(flag){
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

function cancelarform(){
	limpiar();
	mostrarform(false);
}

function listar(){
	tabla=$('#tbllistado').dataTable(
	{
		"lengthMenu": [ 5, 10, 25, 75, 100],
		"aProcessing": true,
	    "aServerSide": true,
	    dom: '<Bl<f>rtip>',
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: '../ajax/personal.php?op=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"language": {
            "lengthMenu": "Mostrar : _MENU_ registros",
            "buttons": {
            "copyTitle": "Tabla Copiada",
            "copySuccess": {
                    _: '%d líneas copiadas',
                    1: '1 línea copiada'
                }
            }
        },
		"bDestroy": true,
		"iDisplayLength": 5,
	    "order": [[ 0, "desc" ]]
	}).DataTable();
}

function guardaryeditar(e){
	e.preventDefault();
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/personal.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos){                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idpersonal){
	$.post("../ajax/personal.php?op=mostrar",{idpersonal : idpersonal}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#ci").val(data.CI);
		$("#nombre").val(data.Nombre);
		$("#paterno").val(data.Paterno);
		$("#materno").val(data.Materno);
		$("#telefono").val(data.Telefono);
		$("#usuario").val(data.Usuario);
		$("#contraseña").val(data.Contraseña);
        $("#rol").val(data.Rol);
        $("#idpersonal").val(data.IdPersonal);

 	})
}

function eliminarFila(idpersonal)
{
	bootbox.confirm("¿Está Seguro de eliminar al Personal?", function(result)
	{ 
        if(result)
        {
            $.post("../ajax/personal.php?op=eliminar", {idpersonal : idpersonal}, function(e)
            {
	            bootbox.alert(e);
	            tabla.ajax.reload();
            });
        }
    })
}
init();