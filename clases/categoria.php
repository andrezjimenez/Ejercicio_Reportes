<?php
    class categoria {
        public function registrar($conexion,$nombre,$descripcion){
            $query="CALL insert_categoria('$nombre','$descripcion')";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Categoria Registrada Exitosamente";
            }else{
                $respuesta="Problema al registrar Categoria";
            }
            return $respuesta;
        }
        public function consultar_lista ($conexion){
            $query="SELECT id_cat, nombre FROM categoria ";
            $consulta=mysqli_query($conexion,$query);
            return $consulta;
        }
        public function consultar_categoria ($conexion,$id){
            $query="SELECT  nombre, descripcion FROM categoria where id_cat=$id";
            $consulta=mysqli_query($conexion,$query);
            return $consulta;
        }
        public function consultar_vista ($conexion){
            $query="SELECT * FROM vista_cat ";
            $consulta=mysqli_query($conexion,$query);
            return $consulta;
        }
        public function Eliminar ($conexion,$ID){
            $query="CALL eliminar_categoria ('$ID') ";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Categoria Eliminada Exitosamente";
            }else{
                $respuesta="Problema al Eliminar Categoria <br> es posible que existan productos sujetos a esta categoria <br> Busque los productos y cambielos de categoria";
            }
            return $respuesta;
        }
        public function Editar ($conexion,$nombre,$descripcion,$id){
            $query="UPDATE categoria set nombre='$nombre', descripcion='$descripcion' WHERE id_cat=$id";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Categoria Actualizada Exitosamente";
            }else{
                $respuesta="Problema al Actualizar Categoria ";
            }
            return $respuesta;

        }

    }
