<?php
    class q9 {
        public function agregarq9($conexion,$Choice,$Npersona1,$Npersona2,$Npersona3,$Npersona4,$Npersona5,$Npersona6,$Npersona7,$Npersona8,$Npersona9,$Npersona10,$Mean){
            $query="CALL agregarq9('$Choice','$Npersona1','$Npersona2','$Npersona3','$Npersona4','$Npersona5','$Npersona6','$Npersona7','$Npersona8','$Npersona9','$Npersona10','$Mean')";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Q8 Registrada Exitosamente";
            }else{
                $respuesta="Problema al registrar Q8";
            }
            return $respuesta;
        }
            public function Eliminaranteriorq9($conexion){
            $query="Delete from q9";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Registros eliminados exitosamente";
            }else{
                $respuesta="Problemas al eliminar Registros";
            }
            return $respuesta;
        }   
        
        public function Q9local($conexion){
            $query="Select * from q9localclientes";
            $consulta=mysqli_query($conexion,$query);
            if($consulta){
                $respuesta="Consulta realizada exitosamente";
            }else{
                $respuesta="Problemas al realizar consulta";
            }
            return $respuesta;
        }

       /* public function NoGES($conexion){
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
        } */
        
    }
