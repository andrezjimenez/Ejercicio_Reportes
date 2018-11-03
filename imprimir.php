<?php
    require 'Classes/PHPExcel.php';
	include "Classes/conexion.php";
    include "Classes/responserate.php";

    $objConexion = new conexion();
	$conexion = $objConexion->conectar();
	
    $objPHPExcel = new PHPExcel();

    $fila=2;

    $objPHPExcel->getProperties()
        ->setCreator('Reportes')
        ->setTitle ('responseRate_result')
        ->SetDescription('Reporte');

    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle('Locales');

    $objPHPExcel->getActiveSheet()->setCellValue('A1','ChoiceText');
    $objPHPExcel->getActiveSheet()->setCellValue('B1','Invited');
    $objPHPExcel->getActiveSheet()->setCellValue('C1','Bounced');
    $objPHPExcel->getActiveSheet()->setCellValue('D1','Received');
    $objPHPExcel->getActiveSheet()->setCellValue('E1','Responses');
    $objPHPExcel->getActiveSheet()->setCellValue('F1','ResponseRatePercent');

    $sql = "Select * from noges order by 7 desc";
    $consulta=mysqli_query($conexion,$sql);
    while($row=mysqli_fetch_array($consulta))
    
    //while ($row=$respuesta -> fetch_assoc())
    {
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,$row['ChoiceText']);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$row['Invited']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$row['Bounced']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$row['Received']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,$row['Responses']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,$row['ResponseRatePercent'].' %');
        $fila++;
    }
    $sql2 = "CALL Total_responserate_gsc";
    $consulta2=mysqli_query($conexion,$sql2);
    while($row2=mysqli_fetch_array($consulta2)){ 
        $fila++;
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,'Total');
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$row2['Suma1']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$row2['Suma2']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$row2['Suma3']);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,$row2['Suma4']);
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,$row2['Total'].' %');

    }
            // Create a new worksheet called "My Data"
        $myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'GSE');

        // Attach the "My Data" worksheet as the first worksheet in the PHPExcel object
        
        $fila=2;
        $sql3 = "Select * from siges)";
        $consulta3=mysqli_query($conexion,$sql3);
        
        $objPHPExcel->addSheet($myWorkSheet, 1);
        $objPHPExcel->setActiveSheetIndex(1);

        $objPHPExcel->getActiveSheet()->setCellValue('A1','ChoiceText');
        $objPHPExcel->getActiveSheet()->setCellValue('B1','Invited');
        $objPHPExcel->getActiveSheet()->setCellValue('C1','Bounced');
        $objPHPExcel->getActiveSheet()->setCellValue('D1','Received');
        $objPHPExcel->getActiveSheet()->setCellValue('E1','Responses');
        $objPHPExcel->getActiveSheet()->setCellValue('F1','ResponseRatePercent');
        
        
        
        /*
        $sql3 = "Select * from siges";
        $consulta3=mysqli_query($conexion,$sql3);
        $fila=2;
        while($row3=mysqli_fetch_array($consulta3))    
        //while ($row=$respuesta -> fetch_assoc())
        {
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,$row3['ChoiceText']);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$row3['Invited']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$row3['Bounced']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$row3['Received']);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,$row3['Responses']);
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila,$row3['ResponseRatePercent']);
            $fila++;
        }
        */

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="responseRate_result.xls');
    header('Cache-Control: max-age=0');
    
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
?>