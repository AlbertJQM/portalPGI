<?php 
    require "../config/Conexion.php";

    Class Personal{
        public function __construct(){
        }

        public function insertar($ci, $nombre, $paterno, $materno, $telefono, $usuario, $contraseña, $rol){
            $sql="INSERT INTO personal(CI, Nombre, Paterno, Materno, Telefono, Usuario, Contraseña, Rol)
            VALUES ('$ci','$nombre','$paterno','$materno','$telefono','$usuario','$contraseña','$rol')";
            return ejecutarConsulta($sql);
        }

        public function editar($idpersonal, $ci, $nombre, $paterno, $materno, $telefono, $usuario, $contraseña, $rol){
            $sql="UPDATE personal SET CI='$ci',Nombre='$nombre',Paterno='$paterno',Materno='$materno',Telefono='$telefono',Usuario='$usuario',Contraseña='$contraseña',Rol='$rol' WHERE IdPersonal='$idpersonal'";
            return ejecutarConsulta($sql);
        }

        public function mostrar($idpersonal){
            $sql="SELECT * FROM personal WHERE IdPersonal='$idpersonal'";
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql="SELECT * FROM personal";
            return ejecutarConsulta($sql);		
        }

        public function verificar($usuario,$contraseña){
            $sql="SELECT IdPersonal, Nombre, Usuario, Contraseña, Rol FROM personal WHERE Usuario='$usuario' AND Contraseña='$contraseña'";            
            return ejecutarConsulta($sql);
        }

        public function eliminar($idpersonal){
            $sql ="DELETE FROM personal
            WHERE IdPersonal='$idpersonal'";
            return ejecutarConsulta($sql);
        }
    }
?>