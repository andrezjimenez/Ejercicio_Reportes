<?php
    require 'Classes/PHPExcel.php';
	include "Classes/conexion.php";
    include "Classes/q8.php";

    $objConexion = new conexion();
	$conexion = $objConexion->conectar();
	
    $objPHPExcel = new PHPExcel();

    //q8
    $suma=0;
    $suma1=0;
    $suma3=0;
    $suma4=0;
    $suma5=0;
    $promediomean =0;
    $fila=4;
    $contador=0;

    //q9
    $fila2=4;
    $q9suma5 = 0;
    $q9suma4 = 0;
    $q9suma3 = 0;
    $q9suma1 = 0;
    $q9suma = 0;
    $q9promediomean = 0;

    //q11
    $fila3=4;
    $q11suma5 = 0;
    $q11suma4 = 0;
    $q11suma3 = 0;
    $q11suma1 = 0;
    $q11suma = 0;
    $q11promediomean = 0;

    $fecha= Date("F");
    $objPHPExcel->getProperties()
        ->setCreator('Reportes')
        ->setTitle ('Nivel de Respuesta')
        ->SetDescription('Nivel de Respuesta');

    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle('Promedio Customer Exprience');

    $estilo0 =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => 'FFFFFF') ) );

    $objPHPExcel->getActiveSheet()->setCellValue('A1',$fecha);

    $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(66); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(16); 
    $objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(16); 
    
    $objPHPExcel->getActiveSheet()->mergeCells('B1:O1');
    

    $objPHPExcel->getActiveSheet()->setCellValue('A2',"");
    $objPHPExcel->getActiveSheet()->mergeCells('B2:E2');
    $objPHPExcel->getActiveSheet()->setCellValue('B2',"Customer Satisfaction \n  Q8");    
    $objPHPExcel->getActiveSheet()->getStyle('B2')->getAlignment()->setWrapText(true);

    $estilo =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => 'ff694b') ),
        'font'  => array(
                'bold'  => TRUE,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 11) ,
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN)
            ),
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
            );
    $objPHPExcel->getActiveSheet()->getStyle('B2:O2')->applyFromArray($estilo);    
    $objPHPExcel->getActiveSheet()->mergeCells('F2:J2');
    $objPHPExcel->getActiveSheet()->setCellValue('F2',"LYX \n  Q9");
    $objPHPExcel->getActiveSheet()->getStyle('F2')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->mergeCells('K2:O2');
    $objPHPExcel->getActiveSheet()->setCellValue('K2',"Customer Effort \n Q11");
    $objPHPExcel->getActiveSheet()->getStyle('K2')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(35); 
    $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(35); 

    $objPHPExcel->getActiveSheet()->setCellValue('A3',"Cliente");
    $objPHPExcel->getActiveSheet()->setCellValue('B3',"Promoter - \n Range % (9, 10)");
    $objPHPExcel->getActiveSheet()->getStyle('B3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('C3',"Passive - \n Range % (7, 8)");
    $objPHPExcel->getActiveSheet()->getStyle('c3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('D3',"Detractor -\n  Range % (1, 6)");
    $objPHPExcel->getActiveSheet()->getStyle('D3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('E3',"Promedio \n Satisfacción");
    $objPHPExcel->getActiveSheet()->getStyle('E3')->getAlignment()->setWrapText(true);
    
    $objPHPExcel->getActiveSheet()->setCellValue('F3',"Cliente");
    $objPHPExcel->getActiveSheet()->setCellValue('G3',"Promoter - \n  Range % (9, 10)");
    $objPHPExcel->getActiveSheet()->getStyle('G3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('H3',"Passive -\n  Range % (7, 8)");
    $objPHPExcel->getActiveSheet()->getStyle('H3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('I3',"Detractor - R\n ange % (1, 6)");
    $objPHPExcel->getActiveSheet()->getStyle('I3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('J3',"Promedio \n  Recomendacion");
    $objPHPExcel->getActiveSheet()->getStyle('j3')->getAlignment()->setWrapText(true);

    $objPHPExcel->getActiveSheet()->setCellValue('K3',"Cliente");
    $objPHPExcel->getActiveSheet()->setCellValue('L3',"Promoter - \n  Range % (9, 10)");
    $objPHPExcel->getActiveSheet()->getStyle('L3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('M3',"Passive -  \n Range % (7, 8)");
    $objPHPExcel->getActiveSheet()->getStyle('M3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('N3',"Detractor -\n Range % (1, 6)");
    $objPHPExcel->getActiveSheet()->getStyle('N3')->getAlignment()->setWrapText(true);
    $objPHPExcel->getActiveSheet()->setCellValue('O3',"Promedio \n Recomendacion");
    $objPHPExcel->getActiveSheet()->getStyle('O3')->getAlignment()->setWrapText(true);

    $objPHPExcel->getActiveSheet()->getStyle('A3:O3')->applyFromArray($estilo);
     
    


    
    $estilo2 =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => 'E4D8D5') ),
        'borders' => array(
        'allborders' => array(
            'style' => PHPExcel_Style_Border::BORDER_THIN
        )
    )     
            );

    
    $estilo3 =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => 'DAEEF3') ),
             'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )      ,
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
            
        );
    
     $estilo4 =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => 'FDE9D9') ),
             'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ) ,
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
            );

     $estilo5 =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => 'D8E4BC') ),
               'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ) ,
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
         );
 $estilo7 =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => '92cddc') ),
               'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ) ,
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
         );
 $estilo8 =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => 'fabf8f') ),
               'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ) ,
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
         );
         
 $estilo9 =     array( 
        'fill' => array(
             'type' => PHPExcel_Style_Fill::FILL_SOLID, 
             'color' => array('rgb' => 'c4d79b') ),
               'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            ) ,
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
            )
         );
    $sql = "Select * from Q8local";

	$consulta=mysqli_query($conexion,$sql);
	while($row=mysqli_fetch_array($consulta	))
    
    //while ($row=$respuesta -> fetch_assoc())
    {   
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$fila,$row['Choice']);
        
        $objPHPExcel->getActiveSheet()->getRowDimension($fila)->setRowHeight(29); 

        $objPHPExcel->getActiveSheet()->getStyle('A'.$fila)->applyFromArray($estilo2);
        
        $resultado3=$row['n1']+ $row['n2']+ $row['n3']+$row['n4']+ $row['n5']+ $row['n6'];
        $resultado4=$row['n7']+ $row['n8'];
        $resultado5=$row['n9']+ $row['n10'];
        $resultado2=$row['n8']+ $row['n9']+ $row['n10'];
        $resultado=$row['n1']+ $row['n2']+ $row['n3']+ $row['n4']+ $row['n5']+ $row['n6']+ $row['n7']+ $row['n8']+ $row['n9']+ $row['n10'];
        $promedio=($resultado2/$resultado)*100;
        $mean =$row['mean'];

        $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$resultado5);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$resultado4);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$resultado3);
        $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,$row['mean']);

        $objPHPExcel->getActiveSheet()->getStyle('B'.$fila.':E'.$fila)->applyFromArray($estilo3);
        
        $fila++;
        $suma5 = $suma5+$resultado5;
        $suma4 = $suma4+$resultado4;
        $suma3 = $suma3+$resultado3;
        $suma1 = $suma1+$resultado2;
        $suma = $suma+$resultado;
        $promediomean = $promediomean+$mean;
        $contador++;
    }
    
    $q8mean = $promediomean/$contador;
    $fila++;
    // Resltado q8
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$suma5);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$suma4);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$suma3);
    $objPHPExcel->getActiveSheet()->setCellValue('E'.$fila,$q8mean);

    $objPHPExcel->getActiveSheet()->getStyle('B'.$fila.':D'.$fila)->applyFromArray($estilo3);
   
         
    $objPHPExcel->getActiveSheet()->getStyle('E'.$fila)->applyFromArray($estilo7);

    
    $sumatotal18=$suma5+$suma4+$suma3;
    $promedio1=($suma5/$sumatotal18)*100;
    $promedio2=($suma4/$sumatotal18)*100;
    $promedio3=($suma3/$sumatotal18)*100;

    // resultado 2 Q8
    $fila++;
    $objPHPExcel->getActiveSheet()->setCellValue('B'.$fila,$promedio1);
    $objPHPExcel->getActiveSheet()->setCellValue('C'.$fila,$promedio2);
    $objPHPExcel->getActiveSheet()->setCellValue('D'.$fila,$promedio3);
    $objPHPExcel->getActiveSheet()->getStyle('B'.$fila.':D'.$fila)->applyFromArray($estilo3);

    
    
    // 
    // Q9 reporte
    // 
    $contador=0;
    
    $sql = "Select * from q9localclientes";
	$consulta=mysqli_query($conexion,$sql);
    while($row=mysqli_fetch_array($consulta	))
    
    //while ($row=$respuesta -> fetch_assoc())
    {   
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$fila2,$row['Choice']);
        
        $resultado3=$row['n1']+ $row['n2']+ $row['n3']+$row['n4']+ $row['n5']+ $row['n6'];
        $resultado4=$row['n7']+ $row['n8'];
        $resultado5=$row['n9']+ $row['n10'];
        $resultado2=$row['n8']+ $row['n9']+ $row['n10'];
        $resultado=$row['n1']+ $row['n2']+ $row['n3']+ $row['n4']+ $row['n5']+ $row['n6']+ $row['n7']+ $row['n8']+ $row['n9']+ $row['n10'];
        $promedio=($resultado2/$resultado)*100;
        $mean =$row['mean'];

        $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila2,$resultado5);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila2,$resultado4);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila2,$resultado3);
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila2,$row['mean']);

        $objPHPExcel->getActiveSheet()->getStyle('G'.$fila2.':J'.$fila2)->applyFromArray($estilo4);
        
        $fila2++;
        $q9suma5 = $q9suma5+$resultado5;
        $q9suma4 = $q9suma4+$resultado4;
        $q9suma3 = $q9suma3+$resultado3;
        $q9suma1 = $q9suma1+$resultado2;
        $q9suma = $q9suma+$resultado;
        $q9promediomean = $q9promediomean+$mean;
        $contador++;
    }
    $q9mean = $q9promediomean/$contador;

    $fila=$fila-1;
    // Resltado q8
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,$q9suma5);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,$q9suma4);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,$q9suma3);
    $objPHPExcel->getActiveSheet()->setCellValue('J'.$fila,$q9mean);
    
    $objPHPExcel->getActiveSheet()->getStyle('G'.$fila.':I'.$fila)->applyFromArray($estilo4);
    
    $objPHPExcel->getActiveSheet()->getStyle('J'.$fila)->applyFromArray($estilo8);
    
    $sumatotal18=$q9suma5+$q9suma4+$q9suma3;
    $promedio1=($q9suma5/$sumatotal18)*100;
    $promedio2=($q9suma4/$sumatotal18)*100;
    $promedio3=($q9suma3/$sumatotal18)*100;

    // resultado 2 Q8
    $fila++;
    $objPHPExcel->getActiveSheet()->setCellValue('G'.$fila,$promedio1);
    $objPHPExcel->getActiveSheet()->setCellValue('H'.$fila,$promedio2);
    $objPHPExcel->getActiveSheet()->setCellValue('I'.$fila,$promedio3);

    $objPHPExcel->getActiveSheet()->getStyle('G'.$fila.':I'.$fila)->applyFromArray($estilo4);


    
    
    // 
    // Q11 reporte
    // 
    
    $contador=0;
    
    $sql = "Select * from q11localclientes";
	$consulta=mysqli_query($conexion,$sql);
    while($row=mysqli_fetch_array($consulta	))
    

    //while ($row=$respuesta -> fetch_assoc())
    {   
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$fila3,$row['Choice']);
        
        $resultado3=$row['n1']+ $row['n2']+ $row['n3']+$row['n4']+ $row['n5']+ $row['n6'];
        $resultado4=$row['n7']+ $row['n8'];
        $resultado5=$row['n9']+ $row['n10'];
        $resultado2=$row['n8']+ $row['n9']+ $row['n10'];
        $resultado=$row['n1']+ $row['n2']+ $row['n3']+ $row['n4']+ $row['n5']+ $row['n6']+ $row['n7']+ $row['n8']+ $row['n9']+ $row['n10'];
        $promedio=($resultado2/$resultado)*100;
        $mean =$row['mean'];

        $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila3,$resultado5);
        $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila3,$resultado4);
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila3,$resultado3);
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila3,$row['mean']);

        $objPHPExcel->getActiveSheet()->getStyle('L'.$fila3.':O'.$fila3)->applyFromArray($estilo5);

        $fila3++;
        $q11suma5 = $q11suma5+$resultado5;
        $q11suma4 = $q11suma4+$resultado4;
        $q11suma3 = $q11suma3+$resultado3;
        $q11suma1 = $q11suma1+$resultado2;
        $q11suma = $q11suma+$resultado;
        $q11promediomean = $q11promediomean+$mean;
        $contador++;
    }
    $q11mean = $q11promediomean/$contador;

    $fila=$fila-1;
    // Resltado q11
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila,$q11suma5);
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila,$q11suma4);
    $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila,$q11suma3);
    $objPHPExcel->getActiveSheet()->setCellValue('O'.$fila,$q11mean);

    $objPHPExcel->getActiveSheet()->getStyle('L'.$fila.':N'.$fila)->applyFromArray($estilo5);
    
    $objPHPExcel->getActiveSheet()->getStyle('O'.$fila)->applyFromArray($estilo9);
    
    $sumatotal18=$q11suma5+$q11suma4+$q11suma3;
    $promedio1=($q11suma5/$sumatotal18)*100;
    $promedio2=($q11suma4/$sumatotal18)*100;
    $promedio3=($q11suma3/$sumatotal18)*100;

    // resultado 2 Q11
    $fila++;
    $objPHPExcel->getActiveSheet()->setCellValue('L'.$fila,$promedio1);
    $objPHPExcel->getActiveSheet()->setCellValue('M'.$fila,$promedio2);
    $objPHPExcel->getActiveSheet()->setCellValue('N'.$fila,$promedio3);
    
    $objPHPExcel->getActiveSheet()->getStyle('L'.$fila.':N'.$fila)->applyFromArray($estilo5);
    

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Nivel de Respuesta.xls');
    header('Cache-Control: max-age=0');
    
    $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
?>