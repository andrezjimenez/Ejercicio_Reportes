<?php
    class responseRate {
        public function Eliminaranterior($conexion){
            $query="Delete from responserate";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Registros eliminados exitosamente";
            }else{
                $respuesta="Problemas al eliminar Registros";
            }
            return $respuesta;
        }
        public function agregar($conexion,$ChoiceText,$Invited,$Bounced,$Received,$Responses,$ResponseRatePercent){
            $query="CALL agregar('$ChoiceText','$Invited','$Bounced','$Received','$Responses','$ResponseRatePercent')";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="responseRate Registrada Exitosamente";
            }else{
                $respuesta="Problema al registrar responseRate";
            }
            return $respuesta;
        }
        public function NoGES($conexion){
            //$query="Call NoGES";
            $query="Select * from NoGes";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Registros NO-GES eliminados exitosamente";
            }else{
                $respuesta="Problemas al eliminar Registros NO-GES";
            }
            return $respuesta;
        }
        public function ConsultaGES($conexion){
            $query="Select * from responserate";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Consulta realizada exitosamente";
            }else{
                $respuesta="Problemas al realizar consulta";
            }
            return $respuesta;
        }
        public function Total($conexion){
            $query="CALL Total_responserate";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $total="Consulta realizada exitosamente";
            }else{
                $total="Problemas al realizar consulta";
            }
            return $total;
        }
        public function Mostrar_Clocal($conexion){
            $query="Select name from clienteges";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $total="Consulta realizada exitosamente";
            }else{
                $total="Problemas al realizar consulta";
            }
            return $total;
        }
        public function registrarclienteges($conexion,$nombreges){
            $query="Insert into clientesges (Name) values ('$nombreges')";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $total="Cliente Local Registrado Exitosamente";
            }else{
                $total="Problemas al Registrar Cliente Local";
            }
            return $total;
        }
        
    }
