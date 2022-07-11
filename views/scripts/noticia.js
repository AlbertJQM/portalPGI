var tabla;

function init(){
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
    $("#imagenmuestra").hide();
}

function limpiar()
{
	
	$("#idpersonal").val("");
	$("#titulo").val("");
	$("#descripcion").val("");
    $("#fecha").val("");
    $("#portada").val("");
    $("#archivo").val("");
    $("#idnoticia").val("");
}

function mostrarform(flag)
{
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

function cancelarform()
{
	limpiar();
	mostrarform(false);
}

function listar()
{
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
					url: '../ajax/noticia.php?op=listar',
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

function guardaryeditar(e)
{
	e.preventDefault();
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/noticia.php?op=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	          mostrarform(false);
	          tabla.ajax.reload();
	    }

	});
	limpiar();
}

function mostrar(idnoticia)
{
	$.post("../ajax/noticia.php?op=mostrar",{idnoticia : idnoticia}, function(data, status)
	{
		data = JSON.parse(data);		
		mostrarform(true);

		$("#idpersonal").val(data.IdPersonal);
		$("#titulo").val(data.Titulo);
        $("#descripcion").val(data.Descripcion);
        $("#fecha").val(data.Fecha);
        $("#imagenmuestra").show();
        $("#imagenmuestra").attr("src","../files/portadas/"+data.Portada);
        $("#imagenactual").val(data.Portada);
        $("#archivomuestra").show();
        $("#archivomuestra").attr("href","../files/archivos/"+data.Archivo);
        $("#archivoactual").val(data.Archivo);
 		$("#idnoticia").val(data.IdNoticia);
 	})
}

function desactivar(idnoticia)
{
	bootbox.confirm("¿Está Seguro de desactivar la Noticia?", function(result){
		if(result)
        {
        	$.post("../ajax/noticia.php?op=desactivar", {idnoticia : idnoticia}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}

function activar(idnoticia)
{
	bootbox.confirm("¿Está Seguro de activar la Noticia?", function(result){
		if(result)
        {
        	$.post("../ajax/noticia.php?op=activar", {idnoticia : idnoticia}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})
}
init();