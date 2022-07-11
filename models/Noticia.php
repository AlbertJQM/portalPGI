<?php 
    require "../config/Conexion.php";

    Class Noticia{
        public function __construct(){
        }

        public function insertar($idpersonal, $titulo, $descripcion, $fecha, $portada, $archivo){
            $sql="INSERT INTO noticia(IdPersonal, Titulo, Descripcion, Fecha, Portada, Archivo, Condicion)
            VALUES ('$idpersonal','$titulo','$descripcion','$fecha','$portada','$archivo','1')";
            return ejecutarConsulta($sql);
        }

        public function editar($idnoticia, $idpersonal, $titulo, $descripcion, $fecha, $portada, $archivo){
            $sql="UPDATE noticia SET IdPersonal='$idpersonal',Titulo='$titulo',Descripcion='$descripcion',Fecha='$fecha',Portada='$portada',Archivo='$archivo' WHERE IdNoticia='$idnoticia'";
            return ejecutarConsulta($sql);
        }

        public function desactivar($idnoticia){
            $sql="UPDATE noticia SET Condicion='0' WHERE IdNoticia='$idnoticia'";
            return ejecutarConsulta($sql);
        }
    
        public function activar($idnoticia){
            $sql="UPDATE noticia SET Condicion='1' WHERE IdNoticia='$idnoticia'";
            return ejecutarConsulta($sql);
        }

        public function mostrar($idnoticia){
            $sql="SELECT * FROM noticia WHERE IdNoticia='$idnoticia'";
            return ejecutarConsultaSimpleFila($sql);
        }

        public function listar(){
            $sql="SELECT * FROM noticia";
            return ejecutarConsulta($sql);		
        }
        public function select(){
            $sql="SELECT * FROM noticia where Condicion='1'";
            return ejecutarConsulta($sql);		
        }
    }
?>