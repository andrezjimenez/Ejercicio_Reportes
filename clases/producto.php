<?php
    class producto {
        public function registrar($conexion,$nombre,$valor,$cantidad,$categoria){
            $query="CALL insert_producto('$categoria','$nombre','$valor','$cantidad')";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Producto Registrado Exitosamente";
            }else{
                $respuesta="Problema al Registrar Producto";
            }
            return $respuesta;
        }
        public function consultar_vista ($conexion){
            $query="SELECT * FROM productos ";
            $consulta=mysqli_query($conexion,$query);
            return $consulta;
        }
        public function Eliminar ($conexion,$ID){
            $query="DELETE FROM producto WHERE id_prod= $ID ";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Producto  Eliminado Exitosamente";
            }else{
                $respuesta="Problema al Eliminar categoria ";
            }
            return $respuesta;
        }
        public function consultar_producto ($conexion,$id){
            $query="SELECT  ca.nombre as nombrep, cat.id_cat , cat.nombre, ca.valor,ca.cantidad FROM producto ca inner join  categoria  cat on ca.id_cat = cat.id_cat  where id_prod=$id";
            $consulta=mysqli_query($conexion,$query);
            return $consulta;
        }
        public function Editar ($conexion,$nombre,$valor,$cantidad,$id_prod,$id_cat){
            $query="UPDATE producto set nombre='$nombre', valor='$valor' ,cantidad='$cantidad',id_cat=$id_cat WHERE id_prod=$id_prod";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Producto Actualizado Exitosamente";
            }else{
                $respuesta="Problema al Editar Producto ";
            }
            return $respuesta;

        }
    }
