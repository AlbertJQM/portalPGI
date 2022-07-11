<?php
    session_start();
    require_once "../models/Personal.php";

    $personal=new Personal();

    $idpersonal=isset($_POST["idpersonal"])? limpiarCadena($_POST["idpersonal"]):"";
    $ci=isset($_POST["ci"])? limpiarCadena($_POST["ci"]):"";
    $nombre=isset($_POST["nombre"])? limpiarCadena($_POST["nombre"]):"";
    $paterno=isset($_POST["paterno"])? limpiarCadena($_POST["paterno"]):"";
    $materno=isset($_POST["materno"])? limpiarCadena($_POST["materno"]):"";
    $telefono=isset($_POST["telefono"])? limpiarCadena($_POST["telefono"]):"";
    $usuario=isset($_POST["usuario"])? limpiarCadena($_POST["usuario"]):"";
    $contraseña=isset($_POST["contraseña"])? limpiarCadena($_POST["contraseña"]):"";
    $rol=isset($_POST["rol"])? limpiarCadena($_POST["rol"]):"";

    switch ($_GET["op"]){
        case 'guardaryeditar':
            if (empty($idpersonal)){
                $rspta=$personal->insertar($ci, $nombre, $paterno, $materno, $telefono, $usuario, $contraseña, $rol);
                echo $rspta ? "Personal registrado" : "Personal no se pudo registrar";
            }
            else {
                $rspta=$personal->editar($idpersonal, $ci, $nombre, $paterno, $materno, $telefono, $usuario, $contraseña, $rol);
                echo $rspta ? "Personal actualizado" : "Personal no se pudo actualizar";
            }
        break;

        case 'mostrar':
            $rspta=$personal->mostrar($idpersonal);
            echo json_encode($rspta);
        break;

        case 'eliminar':
            $rspta=$personal->eliminar($idpersonal);
            echo $rspta ? "Personal Eliminado" : "Personal no se puede eliminar";
        break;

        case 'listar':
            $rspta=$personal->listar();
            $data= Array();
            while ($reg=$rspta->fetch_object()){
                $data[]=array(
                    "0"=>'<button class="btn btn-warning" onclick="mostrar('.$reg->IdPersonal.')"><i class="fa fa-pencil"></i></button> <button class="btn btn-danger" onclick="eliminarFila('.$reg->IdPersonal.')"><i class="fa fa-trash"></button>',
                    "1"=>$reg->CI,
                    "2"=>$reg->Nombre,
                    "3"=>$reg->Paterno,
                    "4"=>$reg->Materno,
                    "5"=>$reg->Telefono,
                    "6"=>$reg->Usuario,
                    "7"=>$reg->Rol
                );
            }
            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case 'verificar':
            $usuario=$_POST['usuario'];
            $contraseña=$_POST['contraseña'];
            $rspta=$personal->verificar($usuario, $contraseña);

            $fetch=$rspta->fetch_object();
            echo json_encode($fetch);

            if (isset($fetch)){
                $_SESSION['nombre']=$fetch->Nombre;
                $_SESSION['usuario']=$fetch->Usuario;
                $_SESSION['idpersonal']=$fetch->IdPersonal;
                $_SESSION['rol']=$fetch->Rol;
            }
        break;

        case "salir": 
            session_unset();
            session_destroy();
            header("Location: ../index.php");
        break;
    }
?>