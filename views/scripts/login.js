$("#frmLogin").on('submit',function(e){
    e.preventDefault();
    usuario=$("#usuario").val();
    contraseña=$("#contraseña").val();

    $.post("../ajax/personal.php?op=verificar",
        {"usuario":usuario,"contraseña":contraseña},
        function(data)
		{
			if (data!="null"){
				$(location).attr("href","personal.php");
			}
			else{
				bootbox.alert("Usuario y/o Password incorrectos");
			}
		}
	);
})