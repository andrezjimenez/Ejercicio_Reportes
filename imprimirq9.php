<?php
    require 'Classes/PHPExcel.php';
	include "Classes/conexion.php";
    include "Classes/q9.php";

    $objConexion = new conexion();
	$conexion = $objConexion->conectar();
	
    $objPHPExcel = new PHPExcel();

    $suma=0;
    $suma1=0;
    $suma3=0;
    $suma4=0;
    $suma5=0;
    $fila=2;

    $objPHPExcel->getProperties()
        ->setCreator('Reportes')
        ->setTitle ('Q8_result')
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

    $sql = "Select * from q9localclientes";
	$consulta=mysqli_query($conexion,$sql);
	while($row=mysqli_fetch_array($consulta	))
    
    //while ($row=$respuesta -> fetch_assoc())
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
        $resultado2=$row['n8']+ $row['n9']+ $row['n10'];
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
    
    $promerdio=($suma1/$suma)*100;

    $sql2 = "Select * from Q9local";
	$consulta2=mysqli_query($conexion,$sql2);
	while($row2=mysqli_fetch_array($consulta2	)){

    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,'Total');       
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$row2['n1']);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$row2['n2']);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$row2['n3']);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,$row2['n4']);
    $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,$row2['n5']);
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,$row2['n6']);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,$row2['n7']);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,$row2['n8']);
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila,$row2['n9']);
    $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila,$row2['n10']);
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila);

    $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila);
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila);
    $objPHPExcel->getActiveSheet()->setCellValue('P'.$fila,$suma1);
    $objPHPExcel->getActiveSheet()->setCellValue('Q'.$fila,$suma);
    $objPHPExcel->getActiveSheet()->setCellValue('R'.$fila,$promerdio);
    $suma16=$row2['n1']+ $row2['n2']+ $row2['n3']+ $row2['n4']+ $row2['n5']+ $row2['n6'];
    $suma910=$row2['n9']+ $row2['n10'];
    }
    $fila++;
    $resultado6=($suma910/$suma)*100;
    $resultado7=($suma16/$suma)*100;
    
    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,'Promedio 1 - 6'); 
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,'Promedio 9 - 10');
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,'Resultado '); 
    
    $fila++;

    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,$suma16); 
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$suma910);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$resultado6-$resultado7);

    $fila++;

    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,$suma); 
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$suma);
    
    $fila++;

    $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,$resultado7);
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$resultado6);
    

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Q9_result.xls');
    header('Cache-Control: max-age=0');
    
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
?>