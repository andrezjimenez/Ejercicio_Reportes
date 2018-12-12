<?php
    require 'Classes/PHPExcel.php';
	include "Classes/conexion.php";
    include "Classes/q11.php";

    $objConexion = new conexion();
	$conexion = $objConexion->conectar();
    $conexion2 = $objConexion->conectar();
    
    $objPHPExcel = new PHPExcel();

    $suma=0;
    $suma1=0;
    $suma3=0;
    $suma4=0;
    $suma5=0;
    $fila=2;
    
    $sqlpais = "Select * from buscarpaisq11";
	$consultapais=mysqli_query($conexion,$sqlpais);	
	while($rowpais=mysqli_fetch_array($consultapais	)){
			$pais=$rowpais['pais'];
		//	echo $pais;
        }

        $sqlresultado = "Call q11locals ('$pais')";
        $consulta=mysqli_query($conexion2,$sqlresultado);
        while($row2=mysqli_fetch_array($consulta	)){
            $n1=$row2['n1'];
            $n2=$row2['n2'];
            $n3=$row2['n3'];
            $n4=$row2['n4'];
            $n5=$row2['n5'];
            $n6=$row2['n6'];
            $n7=$row2['n7'];
            $n8=$row2['n8'];
            $n9=$row2['n9'];
            $n10=$row2['n10'];
            $suma16=$row2['n1']+ $row2['n2']+ $row2['n3']+ $row2['n4']+ $row2['n5']+ $row2['n6'];
            $suma910=$row2['n9']+ $row2['n10'];
        }


    $objPHPExcel->getProperties()
        ->setCreator('Reportes')
        ->setTitle ('Q11_result')
        ->SetDescription('Reporte');

    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle('Locales');

    $objPHPExcel->getActiveSheet()->setCellValue('A1','Choice');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','1');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','2');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','3');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','4');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','5');
    $objPHPExcel->getActiveSheet()->setCellValue('G1','6');
    $objPHPExcel->getActiveSheet()->setCellValue('H1','7');
    $objPHPExcel->getActiveSheet()->setCellValue('I1','8');
    $objPHPExcel->getActiveSheet()->setCellValue('J1','9');
    $objPHPExcel->getActiveSheet()->setCellValue('K1','10');
    $objPHPExcel->getActiveSheet()->setCellValue('L1','Mean');
    $objPHPExcel->getActiveSheet()->setCellValue('M1','Q 1-6');
    $objPHPExcel->getActiveSheet()->setCellValue('N1','Q 7-8');
    $objPHPExcel->getActiveSheet()->setCellValue('O1','Q 9-10');
    $objPHPExcel->getActiveSheet()->setCellValue('P1','SCORE 8,9,10');
    $objPHPExcel->getActiveSheet()->setCellValue('Q1','SCORE 1 A 10	');
    $objPHPExcel->getActiveSheet()->setCellValue('R1','Porcentaje');

    //$sql = "Select * from q11localclientes";
	$sql = "Call BuscarClientesPaisq11 ('$pais')";
	$consulta=mysqli_query($conexion,$sql);
	while($row=mysqli_fetch_array($consulta	))
    
    {
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,$row['Choice']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$row['n1']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$row['n2']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$row['n3']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,$row['n4']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,$row['n5']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,$row['n6']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,$row['n7']);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,$row['n8']);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila,$row['n9']);
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila,$row['n10']);
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila,$row['mean']);

        $resultado3=$row['n1']+ $row['n2']+ $row['n3']+$row['n4']+ $row['n5']+ $row['n6'];
        $resultado4=$row['n7']+ $row['n8'];
        $resultado5=$row['n9']+ $row['n10'];
        $resultado2=$row['n7']+$row['n8']+ $row['n9']+ $row['n10'];
        $resultado=$row['n1']+ $row['n2']+ $row['n3']+ $row['n4']+ $row['n5']+ $row['n6']+ $row['n7']+ $row['n8']+ $row['n9']+ $row['n10'];
        $promedio=($resultado2/$resultado)*100;
        
        $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila,$resultado3);
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila,$resultado4);
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila,$resultado5);
        $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila,$resultado2);
        $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila,$resultado);
        $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila,$promedio);
        
        $fila++;
        $suma5 = $suma5+$resultado5;
        $suma4 = $suma4+$resultado4;
        $suma3 = $suma3+$resultado3;
        $suma1 = $suma1+$resultado2;
        $suma = $suma+$resultado;
    }

    $fila++;
    $promerdio=($suma1/$suma)*100;
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,'Total');       
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$n1);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$n2);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$n3);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,$n4);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,$n5);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,$n6);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,$n7);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,$n8);
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila,$n9);
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila,$n10);
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila);

    $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila);
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila);
    $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila,$suma1);
    $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila,$suma);
    $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila,$promerdio);

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Q11_result_'.$pais.'.xls');
    header('Cache-Control: max-age=0');
    
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
?>