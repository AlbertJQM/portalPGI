<?php 
require_once "../models/Noticia.php";
session_start();
$noticia=new Noticia();

$idnoticia=isset($_POST["idnoticia"])? limpiarCadena($_POST["idnoticia"]):"";
$idpersonal=isset($_POST["idpersonal"])? limpiarCadena($_POST["idpersonal"]):"";
$titulo=isset($_POST["titulo"])? limpiarCadena($_POST["titulo"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";
$fecha=isset($_POST["fecha"])? limpiarCadena($_POST["fecha"]):"";
$portada=isset($_POST["portada"])? limpiarCadena($_POST["portada"]):"";
$archivo=isset($_POST["archivo"])? limpiarCadena($_POST["archivo"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
        if (!file_exists($_FILES['portada']['tmp_name']) || !is_uploaded_file($_FILES['portada']['tmp_name'])){
			$portada=$_POST["imagenactual"];
		}else{
			$ext = explode(".", $_FILES["portada"]["name"]);
			if ($_FILES['portada']['type'] == "image/jpg" || $_FILES['portada']['type'] == "image/jpeg" || $_FILES['portada']['type'] == "image/png"){
				$portada = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["portada"]["tmp_name"], "../files/portadas/" . $portada);
			}
		}
        
        if (!file_exists($_FILES['archivo']['tmp_name']) || !is_uploaded_file($_FILES['archivo']['tmp_name'])){
			$archivo=$_POST["archivoactual"];
		}else{
			$ext = explode(".", $_FILES["archivo"]["name"]);
			if ($_FILES['archivo']['type'] == "application/pdf"){
				$archivo = round(microtime(true)) . '.' . end($ext);
				move_uploaded_file($_FILES["archivo"]["tmp_name"], "../files/archivos/" . $archivo);
			}
		}
        $idpersonal = $_SESSION['idpersonal'];
		if (empty($idnoticia)){
			$rspta=$noticia->insertar($idpersonal,$titulo,$descripcion,$fecha,$portada,$archivo);
			echo $rspta ? "Noticia Registrada" : "Noticia no se pudo registrar";
		}
		else {
			$rspta=$noticia->editar($idnoticia,$idpersonal,$titulo,$descripcion,$fecha,$portada,$archivo);
			echo $rspta ? "Noticia actualizada" : "Noticia no se pudo actualizar";
		}
	break;

	case 'desactivar':
		$rspta=$noticia->desactivar($idnoticia);
 		echo $rspta ? "Noticia Desactivada" : "Noticia no se puede desactivar";
	break;

	case 'activar':
		$rspta=$noticia->activar($idnoticia);
 		echo $rspta ? "Noticia activada" : "Noticia no se puede activar";
	break;

	case 'mostrar':
		$rspta=$noticia->mostrar($idnoticia);
 		echo json_encode($rspta);
	break;

	case 'listar':
		$rspta=$noticia->listar();
 		$data= Array();

 		while ($reg=$rspta->fetch_object()){
 			$data[]=array(
 				"0"=>($reg->Condicion)?'<button class="btn btn-warning" onclick="mostrar('.$reg->IdNoticia.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-danger" onclick="desactivar('.$reg->IdNoticia.')"><i class="fa fa-close"></i></button>':
 					'<button class="btn btn-warning" onclick="mostrar('.$reg->IdNoticia.')"><i class="fa fa-pencil"></i></button>'.
 					' <button class="btn btn-primary" onclick="activar('.$reg->IdNoticia.')"><i class="fa fa-check"></i></button>',
 				"1"=>$reg->Titulo,
                "2"=>$reg->Descripcion,
                "3"=>$reg->Fecha,
                "4"=>"<img src='../files/portadas/".$reg->Portada."' height='50px' width='50px'>",
                "5"=>"<a href='../files/archivos/'".$reg->Archivo.">".$reg->Archivo."</a>",
 				"6"=>($reg->Condicion)?'<span class="label bg-green">Activado</span>':
 				'<span class="label bg-red">Desactivado</span>'
 			);
 		}
 		$results = array(
 			"sEcho"=>1,
 			"iTotalRecords"=>count($data),
 			"iTotalDisplayRecords"=>count($data),
 			"aaData"=>$data);
 		echo json_encode($results);
	break;
}
?>