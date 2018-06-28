<?php
class ReporteController extends BaseController
{
    public function postAlumnos()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);

        set_time_limit(300);
        ini_set('memory_limit','1024M');

        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $azcount=array(5,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);
        // aqui s el tamaña de las celdas

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo");
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );

        $objPHPExcel->getActiveSheet()->setCellValue("A2","Alumno");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);

        $cabecera=array('Nº','ODE','DISTRITO','PROVINCIA','DEPARTAMENTO','AP_PATERNO','AP_MATERNO','NOMBRES','SEXO','EDAD','GRADO','SECCION','TURNO','TELEFONO FIJO','CELULAR 1','CORREO ELEC.','FACEBOOK','INSTAGAM','DIRECCION','REFERENCIA','DISTRITO','PROVINCIA','DEPARTAMENTO','COLEGIO','TIPO (PQ,N,P)','DIRECCION','REFERENCIA','CONO','DISTRITO','PROVINCIA','DEPARTAMENTO','PENSION',
            'CARRERA PROFESIONAL (5 AÑOS)','PRECIO','Año Postula','Tipo Universidad','Resultado TEST',
            'CARRERA PROFESIONAL (3 AÑOS)','PRECIO','Año Postula','Tipo Universidad','Resultado TEST',
            'CARRERA PROFESIONAL (1 AÑO)','PRECIO','Año Postula','Tipo Universidad','Resultado TEST',
            'APELLIDOS Y NOMBRES','FECHA','APELLIDOS Y NOMBRES','FECHA');

        $objPHPExcel->getActiveSheet()->mergeCells('A3:A4');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:'.$az[(count($cabecera)-1)].'2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[(count($cabecera)-1)].'2')->applyFromArray($styleAlignmentBold);

         $objPHPExcel->getActiveSheet()->setCellValue("A3",'Nº');
        $objPHPExcel->getActiveSheet()->setCellValue("B3",'I DATOS ODE');
        $objPHPExcel->getActiveSheet()->setCellValue($az[5]."3",'II DATOS DEL ALUMNO');
        $objPHPExcel->getActiveSheet()->setCellValue($az[21+2]."3",'III DATOS DEL COLEGIO');
        $objPHPExcel->getActiveSheet()->setCellValue($az[29+3]."3",'IV DATOS EDUCATIVOS 5 AÑOS');
        $objPHPExcel->getActiveSheet()->setCellValue($az[34+3]."3",'IV DATOS EDUCATIVOS 3 AÑOS');
        $objPHPExcel->getActiveSheet()->setCellValue($az[39+3]."3",'IV DATOS EDUCATIVOS 1 AÑO');
        $objPHPExcel->getActiveSheet()->setCellValue($az[44+3]."3",'V DIGITACION');
        $objPHPExcel->getActiveSheet()->setCellValue($az[46+3]."3",'VI VISITA');

        $objPHPExcel->getActiveSheet()->mergeCells('B3:'.$az[4].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[5].'3:'.$az[20+2].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[21+2].'3:'.$az[28+3].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[29+3].'3:'.$az[33+3].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[34+3].'3:'.$az[38+3].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[39+3].'3:'.$az[43+3].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[44+3].'3:'.$az[45+3].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[46+3].'3:'.$az[47+3].'3');

        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[(count($cabecera)-1)].'3')->applyFromArray($styleAlignmentBold);

            for($i=0;$i<count($cabecera);$i++){
            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."4",$cabecera[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."4")->getAlignment()->setWrapText(true);
            //Para darle tamaño a las columnas
            $objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($azcount[$i]);
            }
        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[($i-1)].'4')->applyFromArray($styleAlignmentBold);
        //$objPHPExcel->getActiveSheet()->getStyle("A3:".$az[($i-1)]."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

        $objPHPExcel->getActiveSheet()->getStyle('A3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');

        $objPHPExcel->getActiveSheet()->getStyle('B3:'.$az[4].'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');
        $objPHPExcel->getActiveSheet()->getStyle('B4:'.$az[4].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('ffff00');
        $objPHPExcel->getActiveSheet()->getStyle($az[5]."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('fce4d6');
        $objPHPExcel->getActiveSheet()->getStyle($az[5].'4:'.$az[20+2].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('fce4d6');
        $objPHPExcel->getActiveSheet()->getStyle($az[21+2]."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('e2efda');
        $objPHPExcel->getActiveSheet()->getStyle($az[21+2].'4:'.$az[28+3].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('e2efda');
        $objPHPExcel->getActiveSheet()->getStyle($az[29+3]."3:".$az[43+3].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('d9e1f2');
        $objPHPExcel->getActiveSheet()->getStyle($az[29+3].'4:'.$az[43+3].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('d9e1f2');
        $objPHPExcel->getActiveSheet()->getStyle($az[44+3]."3:".$az[47+3].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('f8cbad');
        $objPHPExcel->getActiveSheet()->getStyle($az[44+3].'4:'.$az[47+3].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('f8cbad');
            /****   Filtro ***************************************************/

            $array=array();
            $array['where']='';
            $array['limit']='';
            $array['order']='';

            

                if( Input::has("slct_ode") ){
                    $ode_id=implode(',',Input::get('slct_ode'));
                    $array['where'].=" AND o.id IN (".$ode_id.")";
                }

                if( Input::has("slct_distrito") ){
                    $distrito_id=implode(',',Input::get('slct_distrito'));
                    $array['where'].=" AND d.id IN (".$distrito_id.")";
                }

        /***************************************************************/
        $cont=0;
        $valorinicial=4;
        $azcant=1;
        $aData = Alumno::DataAlumno( $array );
        //$objPHPExcel->getActiveSheet()->setCellValue("A1",$aData[1]);

        foreach($aData as $key => $r){
        $cont++;
        $valorinicial++;
        $azcant=0;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);$azcant++;

        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ode);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito_ode);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->provincia_ode);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->departamento_ode);$azcant++;

        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->paterno);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->materno);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->nombre);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sexo);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->edad);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->grado);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->seccion);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->turno);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->telefono);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->celular);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->email);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->facebook);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->instagram);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->referencia);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito_alu);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->provincia_alu);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->departamento_alu);$azcant++;

        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegio);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegio_tipo);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->referencia1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->zona_cole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito_cole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->provincia_cole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->departamento_cole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->pension);$azcant++;
        
        $cd=array(array(),array(),array());
        $md=array(array(),array(),array());
        $ad=array(array(),array(),array());
        $tud=array(array(),array(),array());
        $td=array(array(),array(),array());
        
        $c3=explode("||",$r->carrera3);
        $m3=explode("||",$r->monto3);
        $a3=explode("||",$r->año3);
        $tu3=explode("||",$r->tipo_universidad3);
        $t3=explode("||",$r->test3);
        for ($i=0; $i < count($c3); $i++) { 
            $cd3=explode("|",$c3[$i]);
            $md3=explode("|",$m3[$i]);
            $ad3=explode("|",$a3[$i]);
            $tud3=explode("|",$tu3[$i]);
            $td3=explode("|",$t3[$i]);
            if( count($cd3)==2 ){
            array_push($cd[0],$cd3[1]);
            array_push($md[0], $md3[1]);
            array_push($ad[0], $ad3[1]);
            array_push($tud[0], $tud3[1]);
            array_push($td[0], $td3[1]);
            }
        }

        $c2=explode("||",$r->carrera2);
        $m2=explode("||",$r->monto2);
        $a2=explode("||",$r->año2);
        $tu2=explode("||",$r->tipo_universidad2);
        $t2=explode("||",$r->test2);
        for ($i=0; $i < count($c2); $i++) { 
            $cd2=explode("|",$c2[$i]);
            $md2=explode("|",$m2[$i]);
            $ad2=explode("|",$a2[$i]);
            $tud2=explode("|",$tu2[$i]);
            $td2=explode("|",$t2[$i]);
            if( count($cd2)==2 ){
            array_push($cd[1],$cd2[1]);
            array_push($md[1], $md2[1]);
            array_push($ad[1], $ad2[1]);
            array_push($tud[1], $tud2[1]);
            array_push($td[1], $td2[1]);
            }
        }

        $c1=explode("||",$r->carrera1);
        $m1=explode("||",$r->monto1);
        $a1=explode("||",$r->año1);
        $tu1=explode("||",$r->tipo_universidad1);
        $t1=explode("||",$r->test1);
        for ($i=0; $i < count($c1); $i++) { 
            $cd1=explode("|",$c1[$i]);
            $md1=explode("|",$m1[$i]);
            $ad1=explode("|",$a1[$i]);
            $tud1=explode("|",$tu1[$i]);
            $td1=explode("|",$t1[$i]);
            if( count($cd1)==2 ){
            array_push($cd[2],$cd1[1]);
            array_push($md[2], $md1[1]);
            array_push($ad[2], $ad1[1]);
            array_push($tud[2], $tud1[1]);
            array_push($td[2], $td1[1]);
            }
        }
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$cd[0]) );$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$md[0]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$ad[0]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$tud[0]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$td[0]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$cd[1]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$md[1]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$ad[1]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$tud[1]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$td[1]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$cd[2]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$md[2]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$ad[2]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$tud[2]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$td[2]));$azcant++;

        //$objPHPExcel->getActiveSheet()->getStyle($az[$azcant-6].$valorinicial.":".$az[$azcant-1].$valorinicial)->getAlignment()->setWrapText(true);// Ajustar formato indicado

        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->digitador);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_digitador);$azcant++;

        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->visitador);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_visita);$azcant++;
        }
        
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant-1].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);

        $objPHPExcel->getActiveSheet()->setTitle('Listado');
        $objPHPExcel->setActiveSheetIndex(0);
        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="datacole_'.date('Y_m_d_H_i_s').'.xlsx"');
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');

        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function postProduccion()
    {

        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $azcount=array(5,40,15,15,15,15,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,5,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);
        // aqui s el tamaña de las celdas
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );


        $objPHPExcel->getActiveSheet()->setCellValue("A2","Producción");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);

        $cabecera0=array('Nª','NOMBRES Y APELLIDOS','HORARIO','CODIGO','FECHA INGRESO','FECHA RETIRO','ACUMULADO','','','','MES 1','','','','MES 2','','','','CONSOLIDADO DEL MES','','','','','','','','','','','');

        $cabecera=array('','','','','','','DATA','C. VISITADOS','CONVENIO','MATRICULAS','DATA','C. VISITADOS','CONVENIO','MATRICULAS','DATA','C. VISITADOS','CONVENIO','MATRICULAS','ALUMNO','','','','','','C.E VISITADO','','','CITAS','CONVENIO','MATRICULAS');

        $cabecera1=array('','','','','','','','','','','','','','','','','','','TOTAL','5TO','4TO','3ERO','2DO','1ERO','TOTAL','NACIONAL','PARTICULAR','','','');
        //////////// PRIMER NIVEL ///////////////////////////////////////
        $objPHPExcel->getActiveSheet()->mergeCells($az[0].'3:'.$az[0].'5');
        $objPHPExcel->getActiveSheet()->mergeCells($az[1].'3:'.$az[1].'5');
        $objPHPExcel->getActiveSheet()->mergeCells($az[2].'3:'.$az[2].'5');
        $objPHPExcel->getActiveSheet()->mergeCells($az[3].'3:'.$az[3].'5');
        $objPHPExcel->getActiveSheet()->mergeCells($az[4].'3:'.$az[4].'5');
        $objPHPExcel->getActiveSheet()->mergeCells($az[5].'3:'.$az[5].'5');

        /////////////////// CABECERA /////////////////////////
        $objPHPExcel->getActiveSheet()->mergeCells($az[6].'3:'.$az[9].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[10].'3:'.$az[13].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[14].'3:'.$az[17].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[18].'3:'.$az[29].'3');


        /////////////////////////////////////////////////////////
        $objPHPExcel->getActiveSheet()->mergeCells($az[18].'4:'.$az[23].'4');
        $objPHPExcel->getActiveSheet()->mergeCells($az[24].'4:'.$az[26].'4');
        //////////////////////////////////////////////////////////
        $objPHPExcel->getActiveSheet()->mergeCells($az[27].'4:'.$az[27].'5');
        $objPHPExcel->getActiveSheet()->mergeCells($az[28].'4:'.$az[28].'5');
        $objPHPExcel->getActiveSheet()->mergeCells($az[29].'4:'.$az[29].'5');
        /////////////////////////////////////////////////////////
         $objPHPExcel->getActiveSheet()->mergeCells($az[6].'4:'.$az[6].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[7].'4:'.$az[7].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[8].'4:'.$az[8].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[9].'4:'.$az[9].'5');
         

         $objPHPExcel->getActiveSheet()->mergeCells($az[10].'4:'.$az[10].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[11].'4:'.$az[11].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[12].'4:'.$az[12].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[13].'4:'.$az[13].'5');

         $objPHPExcel->getActiveSheet()->mergeCells($az[14].'4:'.$az[14].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[15].'4:'.$az[15].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[16].'4:'.$az[16].'5');
         $objPHPExcel->getActiveSheet()->mergeCells($az[17].'4:'.$az[17].'5');
         /////////////////////// rotacion de texto y dimension de row ////////////////////////

         $objPHPExcel->getActiveSheet()->getStyle($az[6].'4:'.$az[17].'4')->getAlignment()->setTextRotation(90);
         $objPHPExcel->getActiveSheet()->getStyle($az[27].'4:'.$az[29].'4')->getAlignment()->setTextRotation(90);
         $objPHPExcel->getActiveSheet()->getStyle($az[18].'5:'.$az[26].'5')->getAlignment()->setTextRotation(90);
         $objPHPExcel->getActiveSheet()->getRowDimension('5')->setRowHeight(69); 

         //////////////////////////////////////////////////////////
         

        $objPHPExcel->getActiveSheet()->mergeCells('A2:'.$az[(count($cabecera)-1)].'2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[(count($cabecera)-1)].'2')->applyFromArray($styleAlignmentBold);


        $objPHPExcel->getActiveSheet()->mergeCells($az[6].'3:'.$az[9].'3');
        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[(count($cabecera)-1)].'3')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->getStyle('S5:AA5')->applyFromArray($styleAlignmentBold);

            for($i=0;$i<count($cabecera);$i++){
            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."3",$cabecera0[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."3")->getAlignment()->setWrapText(true);

            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."4",$cabecera[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."4")->getAlignment()->setWrapText(true);

            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."5",$cabecera1[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."5")->getAlignment()->setWrapText(true);

            $objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($azcount[$i]);
            }
        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[($i-1)].'4')->applyFromArray($styleAlignmentBold);
        //$objPHPExcel->getActiveSheet()->getStyle("A3:".$az[($i-1)]."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[15].'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('d6dce4');
        $objPHPExcel->getActiveSheet()->getStyle('G4:'.$az[17].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('d6dce4');
        $objPHPExcel->getActiveSheet()->getStyle($az[18].'3:'.$az[25].'3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('e2efda');
        $objPHPExcel->getActiveSheet()->getStyle($az[18].'4:'.$az[29].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('e2efda');
        $objPHPExcel->getActiveSheet()->getStyle($az[18].'5:'.$az[29].'5')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('e2efda');
            /****   Filtro ************************//***************************/

            $array=array();
            $array['where']='';
            $array['usuario']=Auth::user()->id;
            $array['limit']='';
            $array['order']='';

            if( Input::has("slct_mes") AND Input::has("slct_año") ){
                $año=Input::get("slct_año");
                $mes=Input::get("slct_mes");
                $array['finit']=date($año."-".str_pad(($mes-2),2,0,0)."-01");
                $array['ffint']=date($año."-".str_pad($mes,2,0,0)."-t");
                $array['fini1']=date($año."-".str_pad($mes,2,0,0)."-01");
                $array['ffin1']=date($año."-".str_pad($mes,2,0,0)."-t");$mes--;
                $array['fini2']=date($año."-".str_pad($mes,2,0,0)."-01");
                $array['ffin2']=date($año."-".str_pad($mes,2,0,0)."-t");$mes--;
                $array['fini3']=date($año."-".str_pad($mes,2,0,0)."-01");
                $array['ffin3']=date($año."-".str_pad($mes,2,0,0)."-t");
            }
            /***************************************************************/
        $cont=0;
        $valorinicial=5;
        $azcant=0;
        $aData = Produccion::getCargar( $array );

        foreach($aData as $r){
        $completo=$r->paterno.' '.$r->materno.' '.$r->nombre;
        $cont++;
        $valorinicial++;
        $azcant=0;
        $cabecera=array('Paterno','Materno','Nombre','Horario','Código','Fecha Ingreso','Fecha Retiro','Fecha Campaña','Data','Seminario','Colegio Visitado','Padrinazgo','Data','Seminario','Colegio Visitado','Padrinazgo','Data','Seminario','Colegio Visitado','Padrinazgo','Total','5TO','4TO','3RO','2DO','1RO','Total','Nacional','Particular','Total','Mañana','Tarde','Citas','Convenio','Padrinazgo');
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$completo);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->horario);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->codigo);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_ingreso);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_retiro);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->datast);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegiost);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->conveniost);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->matriculadost);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->datast1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegiost1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->conveniost1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->matriculadost1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->datast2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegiost2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->conveniost2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->matriculadost2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->datacole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c5);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c4);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c3);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegios);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->nacional);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->particular);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->citas);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->convenios);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->matriculas);$azcant++;
        }
        
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant-1].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);

        $objPHPExcel->getActiveSheet()->setTitle('Listado');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Listado_'.date("Y-m-d_H-i-s").'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function postPrueba()
    {

        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $azcount=array(5,17,17,25,25,25,15,12,12,15,17,18,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);
        // aqui s el tamaña de las celdas
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );


        $objPHPExcel->getActiveSheet()->setCellValue("A2","Listado de Visitas Programdas");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);

        $cabecera=array('N°','Fecha Visita','Ode','Colegio','Persona que visitará','Persona que contactó','Nro que contactó','Condicional');

        $objPHPExcel->getActiveSheet()->mergeCells('A2:'.$az[(count($cabecera)-1)].'2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[(count($cabecera)-1)].'2')->applyFromArray($styleAlignmentBold);

            for($i=0;$i<count($cabecera);$i++){
            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."3",$cabecera[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."3")->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($azcount[$i]);
            }
        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[($i-1)].'3')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->getStyle("A3:".$az[($i-1)]."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');
            /****   Filtro ***************************************************/
            $array=array();
            $array['where']='';$array['usuario']=Auth::user()->id;
            $array['limit']='';$array['order']='';

            if( Input::get("slct_todo")=='0' ){

                if( Input::has("txt_colegio") ){
                    $array['where'].=" AND c.nombre LIKE '%".Input::get("txt_colegio")."%' ";
                }

                if( Input::has("txt_fecha_visita") ){
                    $array['where'].=" AND v.fecha_visita='".Input::get("txt_fecha_visita")."' ";
                }

                if( Input::has("txt_ode") ){
                    $array['where'].=" AND o.nombre LIKE '%".Input::get("txt_ode")."%' ";
                }

                if( Input::has("txt_persona") ){
                    $array['where'].=" AND CONCAT(pv.paterno,' ',pv.materno,', ',pv.nombre) LIKE '%".Input::get("txt_persona")."%' ";
                }

                if( Input::has("txt_personac") ){
                    $array['where'].=" AND CONCAT(pc.paterno,' ',pc.materno,', ',pc.nombre) LIKE '%".Input::get("txt_personac")."%' ";
                }

                if( Input::has("txt_nro_tel") ){
                    $array['where'].=" AND v.nro_tel LIKE '%".Input::get("txt_nro_tel")."%' ";
                }

                if (Input::has('draw')) {
                    if (Input::has('order')) {
                        $inorder=Input::get('order');
                        $incolumns=Input::get('columns');
                        $array['order']=  ' ORDER BY '.
                                          $incolumns[ $inorder[0]['column'] ]['name'].' '.
                                          $inorder[0]['dir'];
                    }

                    $array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
                    $retorno["draw"]=Input::get('draw');
                }
            }
            /***************************************************************/
            $aData = Visita::getCargar( $array );

        $cont=0;
        $valorinicial=3;
        $azcant=0;

        foreach($aData as $r){
        $cont++;
        $valorinicial++;
        $azcant=0;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_visita);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ode);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegio);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->persona_id);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->personac_id);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->nro_tel);$azcant++;
            if( $r->nro_tel!='' ){
                $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,"No tiene Cel :(");
            }
            else{
                $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,"Tiene Cel");
            }
            //$azcant++;  aqui yano porq no abra otro
        }
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
        $objPHPExcel->getActiveSheet()->setTitle('Listado');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Listado_'.date("Y-m-d_H-i-s").'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }

    public function postSeminario()
    {

        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $azcount=array(15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);
        // aqui s el tamaña de las celdas
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );


        $objPHPExcel->getActiveSheet()->setCellValue("A2","Listado de Seminarios");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);

        $cabecera=array('Ode','Tipo','Nombre Colegio','Telefono','Direccion','Cono','Distrito','Persona','Telefono','Cargo','Horario');

        $objPHPExcel->getActiveSheet()->mergeCells('A2:'.$az[(count($cabecera)-1)].'2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[(count($cabecera)-1)].'2')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("A3",'Datos Colegio');
        $objPHPExcel->getActiveSheet()->setCellValue($az[6]."3",'Datos Del Participante');
        $objPHPExcel->getActiveSheet()->mergeCells('A3:'.$az[5+1].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[6+1].'3:'.$az[9+1].'3');
        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[(count($cabecera)-1)].'3')->applyFromArray($styleAlignmentBold);

            for($i=0;$i<count($cabecera);$i++){
            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."4",$cabecera[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."4")->getAlignment()->setWrapText(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($azcount[$i]);
            }
        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[($i-1)].'4')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->getStyle("A3:".$az[($i-1)]."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');
            /****   Filtro ***************************************************/

            $array=array();
            $array['where']=' WHERE 1=1 ';
            $array['usuario']=Auth::user()->id;
            $array['limit']='';
            $array['order']='';

            if( Input::get("slct_todo")=='0' ){
                if( Input::has("ode") ){
                    $array['where'].=" AND a.ode LIKE '%".Input::get("ode")."%' ";
                }
                if( Input::has("tipo_colegio") ){
                    $array['where'].=" AND ct.nombre LIKE '%".Input::get("tipo_colegio")."%' ";
                }
                if( Input::has("colegio") ){
                    $array['where'].=" AND co.nombre LIKE '%".Input::get("colegio")."%' ";
                }
                if( Input::has("telefono") ){
                    $array['where'].=" AND co.telefono LIKE '%".Input::get("telefono")."%' ";
                }
                if( Input::has("direccion") ){
                    $array['where'].=" AND co.direccion LIKE '%".Input::get("direccion")."%' ";
                }
                if( Input::has("distrito") ){
                    $array['where'].=" AND d.nombre LIKE '%".Input::get("distrito")."%' ";
                }
                if( Input::has("persona") ){
                    $array['where'].=" AND cs.persona LIKE '%".Input::get("persona")."' ";
                }
                if( Input::has("cargo") ){
                    $array['where'].=" AND cs.cargo LIKE '%".Input::get("cargo")."' ";
                }
                if( Input::has("celular") ){
                    $array['where'].=" AND cs.celular LIKE '%".Input::get("celular")."' ";
                }
                if( Input::has("horario") ){
                    $array['where'].=" AND cs.horario LIKE '%".Input::get("horario")."' ";
                }
            }
            /***************************************************************/
        $cont=0;
        $valorinicial=4;
        $azcant=0;
        $aData = Seminario::getCargar( $array );

        foreach($aData as $r){
        $cont++;
        $valorinicial++;
        $azcant=0;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ode);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->tipo_colegio);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegio);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->telefono);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->zona);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->persona);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->cargo);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->celular);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->horario);
        }
        
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);

        $objPHPExcel->getActiveSheet()->setTitle('Listado');
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="Listado_'.date("Y-m-d_H-i-s").'.xlsx"');
        header('Cache-Control: max-age=0');

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }

	public function getDistribucion()
	{
		$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Vic Omar");
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

		$styleThinBlackBorderAllborders = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$styleAlignmentBold= array(
			'font'    => array(
				'bold'      => true
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			),
		);
		$styleAlignment= array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			),
		);

		$aHeadColegio[] = "N°";
		$aHeadColegio[] = "Ode";
		$aHeadColegio[] = "Tipo";
		$aHeadColegio[] = "Nombre de Colegio";
		$aHeadColegio[] = "Teléfono";
        $aHeadColegio[] = "Dirección";
        $aHeadColegio[] = "Referencia";
        $aHeadColegio[] = "Cono";
		$aHeadColegio[] = "Distrito";

		$aHeadSeccion[] = "1";
		$aHeadSeccion[] = "2";
		$aHeadSeccion[] = "3";
		$aHeadSeccion[] = "4";
		$aHeadSeccion[] = "5";
		$aHeadSeccion[] = "Total";

		$objPHPExcel->getActiveSheet()->setCellValue("A2","DISTRIBUCIÓN DE COLEGIOS");
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$objPHPExcel->getActiveSheet()->mergeCells('A2:AE2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:AE2')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A3","DATOS DEL COLEGIO");
		$objPHPExcel->getActiveSheet()->getStyle('A3:I4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:I4');

		$objPHPExcel->getActiveSheet()->setCellValue("J3","PROGRAMACIÓN");
		$objPHPExcel->getActiveSheet()->mergeCells('J3:Z3');
		$objPHPExcel->getActiveSheet()->getStyle('J3:Z3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('64b5f6');

		for($i=0;$i<count($aHeadColegio);$i++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$i]."5",$aHeadColegio[$i]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$i]."5")->getAlignment()->setWrapText(true);
		}
		$objPHPExcel->getActiveSheet()->getStyle("A5:".$az[($i-1)]."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("J4","Fecha");
		$objPHPExcel->getActiveSheet()->mergeCells('J4:J5');

		$objPHPExcel->getActiveSheet()->setCellValue("K4","Hora");
		$objPHPExcel->getActiveSheet()->mergeCells('K4:K5');

		$objPHPExcel->getActiveSheet()->setCellValue("L4","Tiempo");
		$objPHPExcel->getActiveSheet()->mergeCells('L4:L5');

		$objPHPExcel->getActiveSheet()->setCellValue("M4","Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('M4:R4');

		$nInicioSeccion = 12;
		for($x=0;$x<count($aHeadSeccion);$x++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioSeccion]."5",$aHeadSeccion[$x]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioSeccion]."5")->getAlignment()->setWrapText(true);
			$nInicioSeccion++;
		}
		$objPHPExcel->getActiveSheet()->getStyle("M5:R5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("S4","Data");
		$objPHPExcel->getActiveSheet()->mergeCells('S4:X4');

		$nInicioData = 18;
		for($z=0;$z<count($aHeadSeccion);$z++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioData]."5",$aHeadSeccion[$z]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioData]."5")->getAlignment()->setWrapText(true);
			$nInicioData++;
		}
		$objPHPExcel->getActiveSheet()->getStyle("S5:X5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("Y4","Observación");
		$objPHPExcel->getActiveSheet()->mergeCells('Y4:Y5');

		$objPHPExcel->getActiveSheet()->setCellValue("Z4","Promotor que ingreso");
		$objPHPExcel->getActiveSheet()->mergeCells('Z4:Z5');

		$objPHPExcel->getActiveSheet()->setCellValue("AA3","REPORTE");
		$objPHPExcel->getActiveSheet()->mergeCells('AA3:AE3');
		$objPHPExcel->getActiveSheet()->getStyle('AA3:AE3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('a5d6a7');

		$objPHPExcel->getActiveSheet()->setCellValue("AA4","Grados y Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('AA4:AB4');

		$objPHPExcel->getActiveSheet()->setCellValue("AA5","Realizadas");

		$objPHPExcel->getActiveSheet()->setCellValue("AA5","Pendientes");

		$objPHPExcel->getActiveSheet()->setCellValue("AC4","Motivo (Por que no se recopilo data)");
		$objPHPExcel->getActiveSheet()->mergeCells('AC4:AC5');

        $objPHPExcel->getActiveSheet()->setCellValue("AD4","Fecha Telecita");
        $objPHPExcel->getActiveSheet()->mergeCells('AD4:AD5');

        $objPHPExcel->getActiveSheet()->setCellValue("AE4","Persona Telecita");
        $objPHPExcel->getActiveSheet()->mergeCells('AE4:AE5');

		$objPHPExcel->getActiveSheet()->getStyle('A3:AE5')->applyFromArray($styleAlignmentBold);

		$array=array();
		$array['where']=' WHERE 1=1 ';
		$array['usuario']=Auth::user()->id;
		$array['limit']='';
		$array['order']='';

        if( Input::has("fecha_inicio") AND Input::has("fecha_final") ){
            $array['where'].=" 
            AND DATE(a.fecha_visita) BETWEEN '".Input::get("fecha_inicio")."' 
            AND '".Input::get("fecha_final")."' ";
        }
		/*if( Input::get("slct_todo")=='0' )
		{
			if( Input::has("txt_ode") ){
				$array['where'].=" AND a.ode LIKE '%".Input::get("txt_ode")."%' ";
			}
			if( Input::has("txt_tipo_colegio") ){
				$array['where'].=" AND a.tipo_colegio LIKE '%".Input::get("txt_tipo_colegio")."%' ";
			}
			if( Input::has("txt_colegio") ){
				$array['where'].=" AND a.colegio LIKE '%".Input::get("txt_colegio")."%' ";
			}
			if( Input::has("txt_telefono") ){
				$array['where'].=" AND a.telefono LIKE '%".Input::get("txt_telefono")."%' ";
			}
			if( Input::has("txt_distrito") ){
				$array['where'].=" AND a.distrito LIKE '%".Input::get("txt_distrito")."%' ";
			}
			if( Input::has("txt_fecha_visita") ){
				$array['where'].=" AND a.fecha_visita LIKE '%".Input::get("txt_fecha_visita")."%' ";
			}
			if( Input::has("txt_hora") ){
				$array['where'].=" AND a.hora LIKE '%".Input::get("txt_hora")."%' ";
			}
			if( Input::has("txt_tiempo") ){
				$array['where'].=" AND a.tiempo LIKE '%".Input::get("txt_tiempo")."%' ";
			}
			if( Input::has("txt_sec_1") ){
				$array['where'].=" AND a.sec_1='".Input::get("txt_sec_1")."' ";
			}
			if( Input::has("txt_sec_2") ){
				$array['where'].=" AND a.sec_2='".Input::get("txt_sec_2")."' ";
			}
			if( Input::has("txt_sec_3") ){
				$array['where'].=" AND a.sec_3='".Input::get("txt_sec_3")."' ";
			}
			if( Input::has("txt_sec_4") ){
				$array['where'].=" AND a.sec_4='".Input::get("txt_sec_4")."' ";
			}
			if( Input::has("txt_sec_5") ){
				$array['where'].=" AND a.sec_5='".Input::get("txt_sec_5")."' ";
			}
			if( Input::has("txt_total_sec") ){
				$array['where'].=" AND a.total_sec='".Input::get("txt_total_sec")."' ";
			}
			if( Input::has("txt_dat_1") ){
				$array['where'].=" AND a.dat_1='".Input::get("txt_dat_1")."' ";
			}
			if( Input::has("txt_dat_2") ){
				$array['where'].=" AND a.dat_2='".Input::get("txt_dat_2")."' ";
			}
			if( Input::has("txt_dat_3") ){
				$array['where'].=" AND a.dat_3='".Input::get("txt_dat_3")."' ";
			}
			if( Input::has("txt_dat_4") ){
				$array['where'].=" AND a.dat_4='".Input::get("txt_dat_4")."' ";
			}
			if( Input::has("txt_dat_5") ){
				$array['where'].=" AND a.dat_5='".Input::get("txt_dat_5")."' ";
			}
			if( Input::has("txt_total_dat") ){
				$array['where'].=" AND a.total_dat='".Input::get("txt_total_dat")."' ";
			}
			if( Input::has("txt_observacion") ){
				$array['where'].=" AND a.observacion LIKE '%".Input::get("txt_observacion")."%' ";
			}
			if( Input::has("txt_promotor") ){
				$array['where'].=" AND a.promotor LIKE '%".Input::get("txt_promotor")."' ";
			}
			if( Input::has("txt_realizada") ){
				$array['where'].=" AND a.realizada='".Input::get("txt_realizada")."' ";
			}
			if( Input::has("txt_pendiente") ){
				$array['where'].=" AND a.pendiente='".Input::get("txt_pendiente")."' ";
			}

			if (Input::has('draw'))
			{
				if (Input::has('order'))
				{
					$inorder=Input::get('order');
					$incolumns=Input::get('columns');
					$array['order']=  ' ORDER BY '.$incolumns[ $inorder[0]['column'] ]['name'].' '.$inorder[0]['dir'];
				}

				$array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
				$retorno["draw"]=Input::get('draw');
			}
		}*/

		$aData = Visita::getCargaDistribucion($array);
		$cont=0;
		$valorinicial=5;
        $azcant=0;

		foreach($aData as $r)
		{
			$cont++;
			$valorinicial++;
			$azcant=0;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ode);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->tipo_colegio);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegio);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->telefono);
				$azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->referencia);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->zona);
                $azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_visita);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->hora);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->tiempo);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_1);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_2);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_3);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_4);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_5);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_sec);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_1);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_2);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_3);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_4);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_5);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_dat);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->observacion);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->promotor);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->realizada);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->pendiente);
				$azcant++;$azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fechat);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->personat);
		}
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
		$objPHPExcel->getActiveSheet()->setTitle('Distribución');
		$objPHPExcel->setActiveSheetIndex(0);
		foreach ($az as $nK => $sV) {
            if($sV=="A" OR ($sV>="M" AND $sV<="X") ){
			     $objPHPExcel->getActiveSheet()->getColumnDimension($sV)->setAutoSize(true);
            }
			if($sV=="AC")
			{
				break;
			}
		}
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Distribucion_'.date("Y-m-d_H-i-s").'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

	}

	public function postVisita()
	{
		$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Vic Omar");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );


		$aHeadColegio[] = "N°";
		$aHeadColegio[] = "Ode";
		$aHeadColegio[] = "Tipo";
		$aHeadColegio[] = "Nombre de Colegio";
		$aHeadColegio[] = "Teléfono";
		$aHeadColegio[] = "Contacto (Contesta)";
		$aHeadColegio[] = "Contacto (Recibe)";
        $aHeadColegio[] = "Dirección";
        $aHeadColegio[] = "Localidad";
        $aHeadColegio[] = "Referencia";
        $aHeadColegio[] = "Cono";
		$aHeadColegio[] = "Distrito";
		$aHeadColegio[] = "Ugel";

		$aHeadSeccion[] = "1";
		$aHeadSeccion[] = "2";
		$aHeadSeccion[] = "3";
		$aHeadSeccion[] = "4";
		$aHeadSeccion[] = "5";
		$aHeadSeccion[] = "Total";

		$objPHPExcel->getActiveSheet()->setCellValue("A2","VISITAS DE COLEGIOS");
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$objPHPExcel->getActiveSheet()->mergeCells('A2:AG2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:AG2')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A3","DATOS DEL COLEGIO");
		$objPHPExcel->getActiveSheet()->getStyle('A3:M4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:M4');

		$objPHPExcel->getActiveSheet()->setCellValue("N3","PROGRAMACIÓN");
		$objPHPExcel->getActiveSheet()->mergeCells('N3:AD3');
		$objPHPExcel->getActiveSheet()->getStyle('N3:AD3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('64b5f6');

        $objPHPExcel->getActiveSheet()->setCellValue("AF3","TELECITA");
        $objPHPExcel->getActiveSheet()->mergeCells('AF3:AG3');
        $objPHPExcel->getActiveSheet()->getStyle('AF3:AG3')
            ->applyFromArray($styleAlignmentBold)->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('64b5f6');

		for($i=0;$i<count($aHeadColegio);$i++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$i]."5",$aHeadColegio[$i]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$i]."5")->getAlignment()->setWrapText(true);
		}
		$objPHPExcel->getActiveSheet()->getStyle('A5:'.$az[($i-1)].'5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("A5:".$az[($i-1)]."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("N4","Fecha");
		$objPHPExcel->getActiveSheet()->mergeCells('N4:N5');
		$objPHPExcel->getActiveSheet()->getStyle('N4:N5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("O4","Hora");
		$objPHPExcel->getActiveSheet()->mergeCells('O4:O5');
		$objPHPExcel->getActiveSheet()->getStyle('O4:O5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("P4","Tiempo");
		$objPHPExcel->getActiveSheet()->mergeCells('P4:P5');
		$objPHPExcel->getActiveSheet()->getStyle('P4:P5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("Q4","Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('Q4:V4');
		$objPHPExcel->getActiveSheet()->getStyle('Q4:V4')->applyFromArray($styleAlignmentBold);

		$nInicioSeccion = 16;
		for($x=0;$x<count($aHeadSeccion);$x++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioSeccion]."5",$aHeadSeccion[$x]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioSeccion]."5")->getAlignment()->setWrapText(true);
			$nInicioSeccion++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('Q5:V5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("Q5:V5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("W4","Data");
		$objPHPExcel->getActiveSheet()->mergeCells('W4:AB4');
		$objPHPExcel->getActiveSheet()->getStyle('W4:AB4')->applyFromArray($styleAlignmentBold);

		$nInicioData = 22;
		for($z=0;$z<count($aHeadSeccion);$z++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioData]."5",$aHeadSeccion[$z]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioData]."5")->getAlignment()->setWrapText(true);
			$nInicioData++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('W5:AB5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("W5:AB5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("AC4","Observación");
		$objPHPExcel->getActiveSheet()->mergeCells('AC4:AC5');
		$objPHPExcel->getActiveSheet()->getStyle('AC4:AC5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AD4","Promotor que ingreso");
		$objPHPExcel->getActiveSheet()->mergeCells('AD4:AD5');
		$objPHPExcel->getActiveSheet()->getStyle('AD4:AD5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AE3","REPORTE");
		$objPHPExcel->getActiveSheet()->mergeCells('AE3:AE3');
		$objPHPExcel->getActiveSheet()->getStyle('AE3:AE3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('a5d6a7');

		$objPHPExcel->getActiveSheet()->setCellValue("AE4","Convenido");
		$objPHPExcel->getActiveSheet()->mergeCells('AE4:AE4');
		$objPHPExcel->getActiveSheet()->getStyle('AE4:AE4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AE5","Fecha");
		$objPHPExcel->getActiveSheet()->getStyle('AE5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("AF4","Persona");
        $objPHPExcel->getActiveSheet()->mergeCells('AF4:AF5');
        $objPHPExcel->getActiveSheet()->getStyle('AF4:AF5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("AG4","Fecha");
        $objPHPExcel->getActiveSheet()->mergeCells('AG4:AG5');
        $objPHPExcel->getActiveSheet()->getStyle('AG4:AG5')->applyFromArray($styleAlignmentBold);

		$array=array();
		$array['where']=' WHERE 1=1 ';
		$array['usuario']=Auth::user()->id;
		$array['limit']='';
		$array['order']='';

		if( Input::get("slct_todo")=='0' )
		{
			if( Input::has("txt_ode") ){
				$array['where'].=" AND a.ode LIKE '%".Input::get("txt_ode")."%' ";
			}
			if( Input::has("txt_tipo_colegio") ){
				$array['where'].=" AND a.tipo_colegio LIKE '%".Input::get("txt_tipo_colegio")."%' ";
			}
			if( Input::has("txt_colegio") ){
				$array['where'].=" AND a.colegio LIKE '%".Input::get("txt_colegio")."%' ";
			}
			if( Input::has("txt_telefono") ){
				$array['where'].=" AND a.telefono LIKE '%".Input::get("txt_telefono")."%' ";
			}
			if( Input::has("txt_contesta") ){
				$array['where'].=" AND a.contesta LIKE '%".Input::get("txt_contesta")."%' ";
			}
			if( Input::has("txt_recibe") ){
				$array['where'].=" AND a.recibe LIKE '%".Input::get("txt_recibe")."%' ";
			}
			if( Input::has("txt_direccion") ){
				$array['where'].=" AND a.direccion LIKE '%".Input::get("txt_direccion")."%' ";
			}
			if( Input::has("txt_localidad") ){
				$array['where'].=" AND a.localidad LIKE '%".Input::get("txt_localidad")."%' ";
			}
			if( Input::has("txt_referencia") ){
				$array['where'].=" AND a.referencia LIKE '%".Input::get("txt_referencia")."%' ";
			}
			if( Input::has("txt_ugel") ){
				$array['where'].=" AND a.ugel LIKE '%".Input::get("txt_ugel")."%' ";
			}
			if( Input::has("txt_distrito") ){
				$array['where'].=" AND a.distrito LIKE '%".Input::get("txt_distrito")."%' ";
			}
			if( Input::has("txt_fecha_visita") ){
				$array['where'].=" AND a.fecha_visita LIKE '%".Input::get("txt_fecha_visita")."%' ";
			}
			if( Input::has("txt_hora") ){
				$array['where'].=" AND a.hora LIKE '%".Input::get("txt_hora")."%' ";
			}
			if( Input::has("txt_tiempo") ){
				$array['where'].=" AND a.tiempo LIKE '%".Input::get("txt_tiempo")."%' ";
			}
			if( Input::has("txt_sec_1") ){
				$array['where'].=" AND a.sec_1='".Input::get("txt_sec_1")."' ";
			}
			if( Input::has("txt_sec_2") ){
				$array['where'].=" AND a.sec_2='".Input::get("txt_sec_2")."' ";
			}
			if( Input::has("txt_sec_3") ){
				$array['where'].=" AND a.sec_3='".Input::get("txt_sec_3")."' ";
			}
			if( Input::has("txt_sec_4") ){
				$array['where'].=" AND a.sec_4='".Input::get("txt_sec_4")."' ";
			}
			if( Input::has("txt_sec_5") ){
				$array['where'].=" AND a.sec_5='".Input::get("txt_sec_5")."' ";
			}
			if( Input::has("txt_total_sec") ){
				$array['where'].=" AND a.total_sec='".Input::get("txt_total_sec")."' ";
			}
			if( Input::has("txt_dat_1") ){
				$array['where'].=" AND a.dat_1='".Input::get("txt_dat_1")."' ";
			}
			if( Input::has("txt_dat_2") ){
				$array['where'].=" AND a.dat_2='".Input::get("txt_dat_2")."' ";
			}
			if( Input::has("txt_dat_3") ){
				$array['where'].=" AND a.dat_3='".Input::get("txt_dat_3")."' ";
			}
			if( Input::has("txt_dat_4") ){
				$array['where'].=" AND a.dat_4='".Input::get("txt_dat_4")."' ";
			}
			if( Input::has("txt_dat_5") ){
				$array['where'].=" AND a.dat_5='".Input::get("txt_dat_5")."' ";
			}
			if( Input::has("txt_total_dat") ){
				$array['where'].=" AND a.total_dat='".Input::get("txt_total_dat")."' ";
			}
			if( Input::has("txt_observacion") ){
				$array['where'].=" AND a.observacion LIKE '%".Input::get("txt_observacion")."%' ";
			}
			if( Input::has("txt_promotor") ){
				$array['where'].=" AND a.promotor LIKE '%".Input::get("txt_promotor")."' ";
			}
			if( Input::has("txt_convenio") ){
				$array['where'].=" AND a.convenio='".Input::get("txt_convenio")."' ";
			}

			if (Input::has('draw'))
			{
				if (Input::has('order'))
				{
					$inorder=Input::get('order');
					$incolumns=Input::get('columns');
					$array['order']=  ' ORDER BY '.$incolumns[ $inorder[0]['column'] ]['name'].' '.$inorder[0]['dir'];
				}

				$array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
				$retorno["draw"]=Input::get('draw');
			}
		}

		$aData = Visita::getCargaVisitaColegio($array);
		$cont=0;
		$valorinicial=5;

		foreach($aData as $r)
		{
			$cont++;
			$valorinicial++;
			$azcant=0;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ode);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->tipo_colegio);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegio);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->telefono);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->contesta);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->recibe);
				$azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->localidad);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->referencia);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->zona);
                $azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ugel);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_visita);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->hora);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->tiempo);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_1);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_2);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_3);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_4);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->sec_5);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_sec);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_1);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_2);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_3);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_4);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dat_5);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_dat);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->observacion);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->promotor);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->convenio);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->personat);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fechat);
		}
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
		$objPHPExcel->getActiveSheet()->setTitle('Visitas');
		$objPHPExcel->setActiveSheetIndex(0);
		foreach ($az as $nK => $sV) {
            if($sV=="A" OR ($sV>="L" AND $sV<="W") ){
			     $objPHPExcel->getActiveSheet()->getColumnDimension($sV)->setAutoSize(true);
            }
			if($sV=="AB")
			{
				break;
			}
		}
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Visitas_'.date("Y-m-d_H-i-s").'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

	}

	public function postData()
	{
        set_time_limit(300);
        ini_set('memory_limit','1024M');
		$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Vic Omar");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );


		$aHeadColegio[] = "N°";
		$aHeadColegio[] = "Ode";
		$aHeadColegio[] = "Tipo";
		$aHeadColegio[] = "Nombre de Colegio";
		$aHeadColegio[] = "Nivel";
		$aHeadColegio[] = "Genero";
		$aHeadColegio[] = "Turno";
		$aHeadColegio[] = "Director";
		$aHeadColegio[] = "Teléfono";
		$aHeadColegio[] = "Correo";
		$aHeadColegio[] = "Dirección";
        $aHeadColegio[] = "Localidad";
        $aHeadColegio[] = "Referencia";
        $aHeadColegio[] = "Cono";
		$aHeadColegio[] = "Distrito";
		$aHeadColegio[] = "Provincia";
		$aHeadColegio[] = "Departamento";
		$aHeadColegio[] = "Ugel";
		$aHeadColegio[] = "Contacto (Contesta)";
		$aHeadColegio[] = "Contacto (Recibe)";

		$aHeadSeccion[] = "1";
		$aHeadSeccion[] = "2";
		$aHeadSeccion[] = "3";
		$aHeadSeccion[] = "4";
		$aHeadSeccion[] = "5";
		$aHeadSeccion[] = "Total";

		$objPHPExcel->getActiveSheet()->setCellValue("A2","DATA DE COLEGIOS");
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$objPHPExcel->getActiveSheet()->mergeCells('A2:BJ2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:BJ2')->applyFromArray($styleAlignmentBold);

		/*$objPHPExcel->getActiveSheet()->setCellValue("A3","DATOS DEL COLEGIO");
		$objPHPExcel->getActiveSheet()->getStyle('A3:S4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:S4');

		$objPHPExcel->getActiveSheet()->setCellValue("T3","PROGRAMACIÓN");
		$objPHPExcel->getActiveSheet()->mergeCells('T3:AL3');
		$objPHPExcel->getActiveSheet()->getStyle('T3:AL3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('64b5f6');

		for($i=0;$i<count($aHeadColegio);$i++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$i]."5",$aHeadColegio[$i]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$i]."5")->getAlignment()->setWrapText(true);
		}
		$objPHPExcel->getActiveSheet()->getStyle('A5:'.$az[($i-1)].'5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("A5:".$az[($i-1)]."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("T4","Telecitas");
		$objPHPExcel->getActiveSheet()->mergeCells('T4:U4');
		$objPHPExcel->getActiveSheet()->getStyle('T4:U4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("T5","Apellidos y Nombres");
		$objPHPExcel->getActiveSheet()->mergeCells('T5:T5');
		$objPHPExcel->getActiveSheet()->getStyle('T5:T5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("U5","Fecha de la Cita");
		$objPHPExcel->getActiveSheet()->mergeCells('U5:U5');
		$objPHPExcel->getActiveSheet()->getStyle('U5:U5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("V4","Fecha");
		$objPHPExcel->getActiveSheet()->mergeCells('V4:V5');
		$objPHPExcel->getActiveSheet()->getStyle('V4:V5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("W4","Hora");
		$objPHPExcel->getActiveSheet()->mergeCells('W4:W5');
		$objPHPExcel->getActiveSheet()->getStyle('W4:W5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("X4","Tiempo");
		$objPHPExcel->getActiveSheet()->mergeCells('X4:X5');
		$objPHPExcel->getActiveSheet()->getStyle('X4:X5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("Y4","Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('Y4:AD4');
		$objPHPExcel->getActiveSheet()->getStyle('Y4:AD4')->applyFromArray($styleAlignmentBold);

		$nInicioSeccion = 24;
		for($x=0;$x<count($aHeadSeccion);$x++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioSeccion]."5",$aHeadSeccion[$x]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioSeccion]."5")->getAlignment()->setWrapText(true);
			$nInicioSeccion++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('Y5:AD5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("Y5:AD5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("AE4","Data");
		$objPHPExcel->getActiveSheet()->mergeCells('AE4:AJ4');
		$objPHPExcel->getActiveSheet()->getStyle('AE4:AJ4')->applyFromArray($styleAlignmentBold);

		$nInicioData = 30;
		for($z=0;$z<count($aHeadSeccion);$z++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioData]."5",$aHeadSeccion[$z]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioData]."5")->getAlignment()->setWrapText(true);
			$nInicioData++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('AE5:AJ5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("AE5:AJ5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("AK4","Observación");
		$objPHPExcel->getActiveSheet()->mergeCells('AK4:AK5');
		$objPHPExcel->getActiveSheet()->getStyle('AK4:AK5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AL4","Promotor que ingreso");
		$objPHPExcel->getActiveSheet()->mergeCells('AL4:AL5');
		$objPHPExcel->getActiveSheet()->getStyle('AL4:AL5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AM3","REPORTE");
		$objPHPExcel->getActiveSheet()->mergeCells('AM3:BI3');
		$objPHPExcel->getActiveSheet()->getStyle('AM3:BI3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('a5d6a7');

		$objPHPExcel->getActiveSheet()->setCellValue("AM4","Contacto del Colegio");
		$objPHPExcel->getActiveSheet()->mergeCells('AM4:AP4');
		$objPHPExcel->getActiveSheet()->getStyle('AM4:AP4')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AM5","Apellidos y Nombres");
		$objPHPExcel->getActiveSheet()->getStyle('AM5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AN5","Cargo");
		$objPHPExcel->getActiveSheet()->getStyle('AN5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AO5","Correo");
		$objPHPExcel->getActiveSheet()->getStyle('AO5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AP5","Telefono");
		$objPHPExcel->getActiveSheet()->getStyle('AP5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AQ4","Convenio");
		$objPHPExcel->getActiveSheet()->mergeCells('AQ4:AT4');
		$objPHPExcel->getActiveSheet()->getStyle('AQ4:AT4')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AQ5","Inicio");
		$objPHPExcel->getActiveSheet()->getStyle('AQ5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AR5","Termino");
		$objPHPExcel->getActiveSheet()->getStyle('AR5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AS5","Quien suscribe");
		$objPHPExcel->getActiveSheet()->getStyle('AS5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AT5","Promotor");
		$objPHPExcel->getActiveSheet()->getStyle('AT5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AU4","Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('AU4:AZ4');
		$objPHPExcel->getActiveSheet()->getStyle('AU4:AZ4')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AU5","1");
		$objPHPExcel->getActiveSheet()->getStyle('AU5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AV5","2");
		$objPHPExcel->getActiveSheet()->getStyle('AV5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AW5","3");
		$objPHPExcel->getActiveSheet()->getStyle('AW5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AX5","4");
		$objPHPExcel->getActiveSheet()->getStyle('AX5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AY5","5");
		$objPHPExcel->getActiveSheet()->getStyle('AY5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("AZ5","Total");
		$objPHPExcel->getActiveSheet()->getStyle('AZ5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("BA4","Data");
		$objPHPExcel->getActiveSheet()->mergeCells('BA4:BF4');
		$objPHPExcel->getActiveSheet()->getStyle('BA4:BF4')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("BA5","1");
		$objPHPExcel->getActiveSheet()->getStyle('BA5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("BB5","2");
		$objPHPExcel->getActiveSheet()->getStyle('BB5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("BC5","3");
		$objPHPExcel->getActiveSheet()->getStyle('BC5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("BD5","4");
		$objPHPExcel->getActiveSheet()->getStyle('BD5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("BE5","5");
		$objPHPExcel->getActiveSheet()->getStyle('BE5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("BF5","Total");
		$objPHPExcel->getActiveSheet()->getStyle('BF5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("BG4","Grados y Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('BG4:BH4');
		$objPHPExcel->getActiveSheet()->getStyle('BG4:BH4')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("BG5","Realizadas");
		$objPHPExcel->getActiveSheet()->getStyle('BG5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->setCellValue("BH5","Pendientes");
		$objPHPExcel->getActiveSheet()->getStyle('BH5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("BI4","Motivo (Porque no se recopilo data)");
		$objPHPExcel->getActiveSheet()->mergeCells('BI4:BI5');
		$objPHPExcel->getActiveSheet()->getStyle('BI4:BI5')->applyFromArray($styleAlignmentBold);*/

		/*$array=array();
		$array['where']=' WHERE 1=1 ';
		$array['usuario']=Auth::user()->id;
		$array['limit']=' LIMIT 0,4 ';
		$array['order']='';

		if( Input::get("slct_todo")=='0' )
		{
			if( Input::has("txt_ode") ){
				$array['where'].=" AND a.ode LIKE '%".Input::get("txt_ode")."%' ";
			}
			if( Input::has("txt_tipo_colegio") ){
				$array['where'].=" AND a.tipo_colegio LIKE '%".Input::get("txt_tipo_colegio")."%' ";
			}
			if( Input::has("txt_colegio") ){
				$array['where'].=" AND a.colegio LIKE '%".Input::get("txt_colegio")."%' ";
			}
			if( Input::has("txt_nivel_cole") ){
				$array['where'].=" AND a.nivel_cole LIKE '%".Input::get("txt_nivel_cole")."%' ";
			}
			if( Input::has("txt_genero") ){
				$array['where'].=" AND a.genero LIKE '%".Input::get("txt_genero")."%' ";
			}
			if( Input::has("txt_turno") ){
				$array['where'].=" AND a.turno LIKE '%".Input::get("txt_turno")."%' ";
			}
			if( Input::has("txt_director") ){
				$array['where'].=" AND a.director LIKE '%".Input::get("txt_director")."%' ";
			}
			if( Input::has("txt_telefono") ){
				$array['where'].=" AND a.telefono LIKE '%".Input::get("txt_telefono")."%' ";
			}
			if( Input::has("txt_email") ){
				$array['where'].=" AND a.email LIKE '%".Input::get("txt_email")."%' ";
			}
			if( Input::has("txt_direccion") ){
				$array['where'].=" AND a.direccion LIKE '%".Input::get("txt_direccion")."%' ";
			}
			if( Input::has("txt_localidad") ){
				$array['where'].=" AND a.localidad LIKE '%".Input::get("txt_localidad")."%' ";
			}
			if( Input::has("txt_distrito") ){
				$array['where'].=" AND a.distrito LIKE '%".Input::get("txt_distrito")."%' ";
			}
			if( Input::has("txt_referencia") ){
				$array['where'].=" AND a.referencia LIKE '%".Input::get("txt_referencia")."%' ";
			}
			if( Input::has("txt_provincia") ){
				$array['where'].=" AND a.provincia LIKE '%".Input::get("txt_provincia")."%' ";
			}
			if( Input::has("txt_departamento") ){
				$array['where'].=" AND a.departamento LIKE '%".Input::get("txt_departamento")."%' ";
			}
			if( Input::has("txt_ugel") ){
				$array['where'].=" AND a.ugel LIKE '%".Input::get("txt_ugel")."%' ";
			}
			if( Input::has("txt_contesta") ){
				$array['where'].=" AND a.contesta LIKE '%".Input::get("txt_contesta")."%' ";
			}
			if( Input::has("txt_recibe") ){
				$array['where'].=" AND a.recibe LIKE '%".Input::get("txt_recibe")."%' ";
			}
			if( Input::has("txt_tele_nombre") ){
				$array['where'].=" AND a.tele_nombre LIKE '%".Input::get("txt_tele_nombre")."%' ";
			}
			if( Input::has("txt_tele_fecha") ){
				$array['where'].=" AND a.tele_fecha LIKE '%".Input::get("txt_tele_fecha")."%' ";
			}
			if( Input::has("txt_fecha_visita") ){
				$array['where'].=" AND a.fecha_visita LIKE '%".Input::get("txt_fecha_visita")."%' ";
			}
			if( Input::has("txt_hora") ){
				$array['where'].=" AND a.hora LIKE '%".Input::get("txt_hora")."%' ";
			}
			if( Input::has("txt_tiempo") ){
				$array['where'].=" AND a.tiempo LIKE '%".Input::get("txt_tiempo")."%' ";
			}
			if( Input::has("txt_sec_1") ){
				$array['where'].=" AND a.sec_1='".Input::get("txt_sec_1")."' ";
			}
			if( Input::has("txt_sec_2") ){
				$array['where'].=" AND a.sec_2='".Input::get("txt_sec_2")."' ";
			}
			if( Input::has("txt_sec_3") ){
				$array['where'].=" AND a.sec_3='".Input::get("txt_sec_3")."' ";
			}
			if( Input::has("txt_sec_4") ){
				$array['where'].=" AND a.sec_4='".Input::get("txt_sec_4")."' ";
			}
			if( Input::has("txt_sec_5") ){
				$array['where'].=" AND a.sec_5='".Input::get("txt_sec_5")."' ";
			}
			if( Input::has("txt_total_sec") ){
				$array['where'].=" AND a.total_sec='".Input::get("txt_total_sec")."' ";
			}
			if( Input::has("txt_dat_1") ){
				$array['where'].=" AND a.dat_1='".Input::get("txt_dat_1")."' ";
			}
			if( Input::has("txt_dat_2") ){
				$array['where'].=" AND a.dat_2='".Input::get("txt_dat_2")."' ";
			}
			if( Input::has("txt_dat_3") ){
				$array['where'].=" AND a.dat_3='".Input::get("txt_dat_3")."' ";
			}
			if( Input::has("txt_dat_4") ){
				$array['where'].=" AND a.dat_4='".Input::get("txt_dat_4")."' ";
			}
			if( Input::has("txt_dat_5") ){
				$array['where'].=" AND a.dat_5='".Input::get("txt_dat_5")."' ";
			}
			if( Input::has("txt_total_dat") ){
				$array['where'].=" AND a.total_dat='".Input::get("txt_total_dat")."' ";
			}
			if( Input::has("txt_observacion") ){
				$array['where'].=" AND a.observacion LIKE '%".Input::get("txt_observacion")."%' ";
			}
			if( Input::has("txt_promotor") ){
				$array['where'].=" AND a.promotor LIKE '%".Input::get("txt_promotor")."' ";
			}
			if( Input::has("txt_contacto") ){
				$array['where'].=" AND a.contacto='".Input::get("txt_contacto")."' ";
			}
			if( Input::has("txt_cargo") ){
				$array['where'].=" AND a.cargo='".Input::get("txt_cargo")."' ";
			}
			if( Input::has("txt_c_email") ){
				$array['where'].=" AND a.c_email='".Input::get("txt_c_email")."' ";
			}
			if( Input::has("txt_c_telefono") ){
				$array['where'].=" AND a.c_telefono='".Input::get("txt_c_telefono")."' ";
			}

			if (Input::has('draw'))
			{
				if (Input::has('order'))
				{
					$inorder=Input::get('order');
					$incolumns=Input::get('columns');
					$array['order']=  ' ORDER BY '.$incolumns[ $inorder[0]['column'] ]['name'].' '.$inorder[0]['dir'];
				}

				$array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
				$retorno["draw"]=Input::get('draw');
			}
		}

		$aData = Visita::getCargaDataColegio($array);
		$cont=0;
		$valorinicial=5;
        //////////////////////////////////////////////////////////////////////////////////////////////
        $buscar = array(chr(13) . chr(10), "\r\n", "\n", "�", "\r", "\n\n", "\xEF", "\xBB", "\xBF");
        $reemplazar = ' | ';
        //////////////////////////////////////////////////////////////////////////////////////////////
        $azcant=30;
        */

        /*foreach($aData as $r)
        {
            $cont++;
            $valorinicial++;
            $azcant=0;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);
                $azcant++;
            $r->ode = '|';
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->ode));
                $azcant++;
            $r->tipo_colegio = '|';
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->tipo_colegio));
                $azcant++;
            $r->colegio = '|';
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->colegio));
                $azcant++;
            $r->nivel_cole = '|';
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->nivel_cole));
                $azcant++;
            $r->genero = '|';
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->genero));
                $azcant++;
            $r->turno = '|';
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->turno));
                $azcant++;
            $r->director = '|';
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->director));
                $azcant++;
            $r->telefono = trim(str_replace($buscar, $reemplazar, $r->telefono));
            $r->telefono = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->telefono));
				$azcant++;
            $r->email = trim(str_replace($buscar, $reemplazar, $r->email));
            $r->email = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->email));
				$azcant++;
            $r->direccion = trim(str_replace($buscar, $reemplazar, $r->direccion));
            $r->direccion = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->direccion));
				$azcant++;
            $r->localidad = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->localidad));
				$azcant++;
            $r->referencia = trim(str_replace($buscar, $reemplazar, $r->referencia));
			$r->referencia = '|';
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->referencia));
				$azcant++;
            $r->distrito = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->distrito));
				$azcant++;
            $r->provincia = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->provincia));
				$azcant++;
            $r->departamento = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->departamento));
				$azcant++;
            $r->ugel = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->ugel));
				$azcant++;
            $r->contesta = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->contesta));
				$azcant++;
            $r->recibe = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->recibe));
				$azcant++;
            $r->tele_nombre = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->tele_nombre));
				$azcant++;
            $r->tele_fecha = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->tele_fecha));
				$azcant++;
            $r->fecha_visita = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->fecha_visita));
				$azcant++;
            $r->hora = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->hora));
				$azcant++;
            $r->tiempo = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->tiempo));
				$azcant++;
            $r->sec_1 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_1));
				$azcant++;
            $r->sec_2 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_2));
				$azcant++;
            $r->sec_3 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_3));
				$azcant++;
            $r->sec_4 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_4));
				$azcant++;
            $r->sec_5 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_5));
				$azcant++;
            $r->total_sec = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->total_sec));
				$azcant++;
            $r->dat_1 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_1));
				$azcant++;
            $r->dat_2 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_2));
				$azcant++;
            $r->dat_3 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_3));
				$azcant++;
            $r->dat_4 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_4));
				$azcant++;
            $r->dat_5 = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_5));
				$azcant++;
            $r->total_dat = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->total_dat));
				$azcant++;
            $r->observacion = trim(str_replace($buscar, $reemplazar, $r->observacion));
            $r->observacion = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->observacion));
				$azcant++;
            $r->promotor = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->promotor));
				$azcant++;
            $r->contacto = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->contacto));
				$azcant++;
            $r->cargo = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->cargo));
				$azcant++;
            $r->c_email = trim(str_replace($buscar, $reemplazar, $r->c_email));
            $r->c_email = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->c_email));
				$azcant++;
            $r->c_telefono = trim(str_replace($buscar, $reemplazar, $r->c_telefono));
            $r->c_telefono = '|';
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->c_telefono));
		}*/
		/*$objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant+19].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
		$objPHPExcel->getActiveSheet()->setTitle('Data');
		$objPHPExcel->setActiveSheetIndex(0);
		foreach ($az as $nK => $sV) {
			if($sV=="A" OR ($sV>="L" AND $sV<="W") ){
				$objPHPExcel->getActiveSheet()->getColumnDimension($sV)->setAutoSize(true);
			}
			if($sV=="AB")
			{
				break;
			}
		}*/
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Data_'.date("Y-m-d_H-i-s").'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

    }

    public function postIndice()
    {
        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
		
        $objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Vic Omar");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
        
        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );


		$sCadenaFecha = DateTime::createFromFormat('Y-m-d', Input::get("txt_fecha_actual"));
		$sD6 = date_create(Input::get("txt_fecha_actual"));
		$sD5 = date_create(Input::get("txt_fecha_actual"));
		$sD4 = date_create(Input::get("txt_fecha_actual"));
		$sD3 = date_create(Input::get("txt_fecha_actual"));
		$sD2 = date_create(Input::get("txt_fecha_actual"));
		$sD1 = date_create(Input::get("txt_fecha_actual"));
		$sFecha = $sCadenaFecha->format('Y-m-d');
		$sFechaVista = $sCadenaFecha->format('d/m/Y');

		$objPHPExcel->getActiveSheet()->setCellValue("A1","FECHA DE ACTUALIZACIÓN : ".$sFechaVista);
		$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
		$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A2","INDICE DE COLEGIOS");
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$objPHPExcel->getActiveSheet()->mergeCells('A2:W2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:W2')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A3","#");
		$objPHPExcel->getActiveSheet()->getStyle('A3:A4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->mergeCells('A3:A4');

		$objPHPExcel->getActiveSheet()->setCellValue("B3","Ode");
		$objPHPExcel->getActiveSheet()->getStyle('B3:B4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('B3:B4');

		$objPHPExcel->getActiveSheet()->setCellValue("C3","Colegios Visitados");
		$objPHPExcel->getActiveSheet()->mergeCells('C3:D3');
		$objPHPExcel->getActiveSheet()->getStyle('C3:D3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('64b5f6');
		$objPHPExcel->getActiveSheet()->setCellValue("C4","Nacional");
		$objPHPExcel->getActiveSheet()->setCellValue("D4","Particular");
		$objPHPExcel->getActiveSheet()->getStyle('C4:D4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("E3","Colegios");
		$objPHPExcel->getActiveSheet()->mergeCells('E3:G3');
		$objPHPExcel->getActiveSheet()->getStyle('E3:G3')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->setCellValue("E4","Visitados");
		$objPHPExcel->getActiveSheet()->setCellValue("F4","X Visitar");
		$objPHPExcel->getActiveSheet()->setCellValue("G4","Meta");
		$objPHPExcel->getActiveSheet()->getStyle('E4:G4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("H3","Campaña");
		$objPHPExcel->getActiveSheet()->mergeCells('H3:I3');
		$objPHPExcel->getActiveSheet()->getStyle('H3:I3')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->setCellValue("H4","Inicio");
		$objPHPExcel->getActiveSheet()->setCellValue("I4","Termino");
		$objPHPExcel->getActiveSheet()->getStyle('H4:I4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("J3","Dias (1 Semana)");
		$objPHPExcel->getActiveSheet()->mergeCells('J3:Q3');
		$objPHPExcel->getActiveSheet()->getStyle('J3:Q3')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->setCellValue("J4",$sD6->modify('-6 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("K4",$sD5->modify('-5 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("L4",$sD4->modify('-4 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("M4",$sD3->modify('-3 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("N4",$sD2->modify('-2 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("O4",$sD1->modify('-1 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("P4", $sFechaVista);
		$objPHPExcel->getActiveSheet()->setCellValue("Q4","Total de Colegio");
		$objPHPExcel->getActiveSheet()->getStyle('J4:Q4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("R3","Dia Camp");
		$objPHPExcel->getActiveSheet()->mergeCells('R3:R4');
		$objPHPExcel->getActiveSheet()->getStyle('R3:R4')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

		$objPHPExcel->getActiveSheet()->setCellValue("S3","Dias Falt Camp");
		$objPHPExcel->getActiveSheet()->mergeCells('S3:S4');
		$objPHPExcel->getActiveSheet()->getStyle('S3:S4')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

		$objPHPExcel->getActiveSheet()->setCellValue("T3","Total Dias");
		$objPHPExcel->getActiveSheet()->mergeCells('T3:T4');
		$objPHPExcel->getActiveSheet()->getStyle('T3:T4')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

		$objPHPExcel->getActiveSheet()->setCellValue("U3","Indice Diario");
		$objPHPExcel->getActiveSheet()->getStyle('U3:U4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('U3:U4');

		$objPHPExcel->getActiveSheet()->setCellValue("V3","Indice Proyectado");
		$objPHPExcel->getActiveSheet()->getStyle('V3:V4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('V3:V4');

		$objPHPExcel->getActiveSheet()->setCellValue("W3","Total a fin de Camp");
		$objPHPExcel->getActiveSheet()->mergeCells('W3:W4');
		$objPHPExcel->getActiveSheet()->getStyle('W3:W4')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

		$array=array();
		$array['where']=' WHERE 1=1 ';
		$array['usuario']=Auth::user()->id;
		$array['limit']='';
		$array['order']='';

		if( Input::has("txt_fecha_actual") ){
			$array['fecha_actual']=Input::get("txt_fecha_actual");
		} else {
			$array['fecha_actual']=date("Y-m-d");
		}

		if( Input::get("slct_todo")=='0' )
		{
			if( Input::has("txt_ode") ){
				$array['where'].=" AND c.ode LIKE '%".Input::get("txt_ode")."%' ";
			}
			if( Input::has("txt_nacional") ){
				$array['where'].=" AND c.nacional LIKE '%".Input::get("txt_nacional")."%' ";
			}
			if( Input::has("txt_particular") ){
				$array['where'].=" AND c.particular LIKE '%".Input::get("txt_particular")."%' ";
			}
			if( Input::has("txt_visitados") ){
				$array['where'].=" AND c.visitados LIKE '%".Input::get("txt_visitados")."%' ";
			}
			if( Input::has("txt_por_visitar") ){
				$array['where'].=" AND c.por_visitar LIKE '%".Input::get("txt_por_visitar")."%' ";
			}
			if( Input::has("txt_meta") ){
				$array['where'].=" AND c.meta LIKE '%".Input::get("txt_meta")."%' ";
			}
			if( Input::has("txt_inicio") ){
				$array['where'].=" AND c.inicio LIKE '%".Input::get("txt_inicio")."%' ";
			}
			if( Input::has("txt_termino") ){
				$array['where'].=" AND c.termino LIKE '%".Input::get("txt_termino")."%' ";
			}
			if( Input::has("txt_d1") ){
				$array['where'].=" AND c.d1 LIKE '%".Input::get("txt_d1")."%' ";
			}
			if( Input::has("txt_d2") ){
				$array['where'].=" AND c.d2 LIKE '%".Input::get("txt_d2")."%' ";
			}
			if( Input::has("txt_d3") ){
				$array['where'].=" AND c.d3 LIKE '%".Input::get("txt_d3")."%' ";
			}
			if( Input::has("txt_d4") ){
				$array['where'].=" AND c.d4 LIKE '%".Input::get("txt_d4")."%' ";
			}
			if( Input::has("txt_d5") ){
				$array['where'].=" AND c.d5 LIKE '%".Input::get("txt_d5")."%' ";
			}
			if( Input::has("txt_d6") ){
				$array['where'].=" AND c.d6 LIKE '%".Input::get("txt_d6")."%' ";
			}
			if( Input::has("txt_d7") ){
				$array['where'].=" AND c.d7 LIKE '%".Input::get("txt_d7")."%' ";
			}
			if( Input::has("txt_total_cole") ){
				$array['where'].=" AND c.total_cole LIKE '%".Input::get("txt_total_cole")."%' ";
			}
			if( Input::has("txt_dia_camp") ){
				$array['where'].=" AND c.dia_camp LIKE '%".Input::get("txt_dia_camp")."%' ";
			}
			if( Input::has("txt_dia_falta_camp") ){
				$array['where'].=" AND c.dia_falta_camp LIKE '%".Input::get("txt_dia_falta_camp")."%' ";
			}
			if( Input::has("txt_total_dia_camp") ){
				$array['where'].=" AND c.total_dia_camp LIKE '%".Input::get("txt_total_dia_camp")."%' ";
			}
			if( Input::has("txt_indice_diario") ){
				$array['where'].=" AND c.indice_diario LIKE '%".Input::get("txt_indice_diario")."%' ";
			}
			if( Input::has("txt_inicio_proyectado") ){
				$array['where'].=" AND c.inicio_proyectado LIKE '%".Input::get("txt_inicio_proyectado")."%' ";
			}
			if( Input::has("txt_total_fin_camp") ){
				$array['where'].=" AND c.total_fin_camp LIKE '%".Input::get("txt_total_fin_camp")."%' ";
			}

			if (Input::has('draw'))
			{
				if (Input::has('order'))
				{
					$inorder=Input::get('order');
					$incolumns=Input::get('columns');
					$array['order']=  ' ORDER BY '.$incolumns[ $inorder[0]['column'] ]['name'].' '.$inorder[0]['dir'];
				}

				$array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
				$retorno["draw"]=Input::get('draw');
			}
		}

		$aData = Visita::getCargaIndiceColegio($array);
		$cont=0;
		$valorinicial=4;

		foreach($aData as $r)
		{
			$cont++;
			$valorinicial++;
			$azcant=0;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ode);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->nacional);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->particular);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->visitados);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->por_visitar);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->meta);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->inicio);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->termino);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d1);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d2);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d3);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d4);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d5);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d6);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d7);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_cole);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dia_camp);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dia_falta_camp);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_dia_camp);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->indice_diario);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->inicio_proyectado);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_fin_camp);
		}
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
		$objPHPExcel->getActiveSheet()->setTitle('Data');
		$objPHPExcel->setActiveSheetIndex(0);
		foreach ($az as $nK => $sV) {
			if($sV=="A" OR ($sV>="L" AND $sV<="W") ){
				$objPHPExcel->getActiveSheet()->getColumnDimension($sV)->setAutoSize(true);
			}
			if($sV=="AB")
			{
				break;
			}
		}
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Indice_'.date("Y-m-d_H-i-s").'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

	}

	public function postIndicedata()
	{
		$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Vic Omar");
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

		$styleThinBlackBorderAllborders = array(
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$styleAlignmentBold= array(
			'font'    => array(
				'bold'      => true
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			),
		);
		$styleAlignment= array(
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
			),
		);

		$sCadenaFecha = DateTime::createFromFormat('Y-m-d', Input::get("txt_fecha_actual"));
		$sD6 = date_create(Input::get("txt_fecha_actual"));
		$sD5 = date_create(Input::get("txt_fecha_actual"));
		$sD4 = date_create(Input::get("txt_fecha_actual"));
		$sD3 = date_create(Input::get("txt_fecha_actual"));
		$sD2 = date_create(Input::get("txt_fecha_actual"));
		$sD1 = date_create(Input::get("txt_fecha_actual"));
		$sFecha = $sCadenaFecha->format('Y-m-d');
		$sFechaVista = $sCadenaFecha->format('d/m/Y');

		$objPHPExcel->getActiveSheet()->setCellValue("A1","FECHA DE ACTUALIZACIÓN : ".$sFechaVista);
		$objPHPExcel->getActiveSheet()->mergeCells('A1:F1');
		$objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A2","INDICE DE DATA");
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$objPHPExcel->getActiveSheet()->mergeCells('A2:Z2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:Z2')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A3","#");
		$objPHPExcel->getActiveSheet()->getStyle('A3:A4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->mergeCells('A3:A4');

		$objPHPExcel->getActiveSheet()->setCellValue("B3","Ode");
		$objPHPExcel->getActiveSheet()->getStyle('B3:B4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('B3:B4');

		$objPHPExcel->getActiveSheet()->setCellValue("C3","Data Recopilada");
		$objPHPExcel->getActiveSheet()->mergeCells('C3:G3');
		$objPHPExcel->getActiveSheet()->getStyle('C3:G3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('64b5f6');
		$objPHPExcel->getActiveSheet()->setCellValue("C4","1ro");
		$objPHPExcel->getActiveSheet()->setCellValue("D4","2do");
		$objPHPExcel->getActiveSheet()->setCellValue("E4","3ro");
		$objPHPExcel->getActiveSheet()->setCellValue("F4","4to");
		$objPHPExcel->getActiveSheet()->setCellValue("G4","5to");
		$objPHPExcel->getActiveSheet()->getStyle('C4:G4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("H3","Data");
		$objPHPExcel->getActiveSheet()->mergeCells('H3:J3');
		$objPHPExcel->getActiveSheet()->getStyle('H3:J3')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->setCellValue("H4","Recopilada");
		$objPHPExcel->getActiveSheet()->setCellValue("I4","X Recopilar");
		$objPHPExcel->getActiveSheet()->setCellValue("J4","Meta");
		$objPHPExcel->getActiveSheet()->getStyle('H4:J4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("K3","Campaña");
		$objPHPExcel->getActiveSheet()->mergeCells('K3:L3');
		$objPHPExcel->getActiveSheet()->getStyle('K3:L3')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->setCellValue("K4","Inicio");
		$objPHPExcel->getActiveSheet()->setCellValue("L4","Termino");
		$objPHPExcel->getActiveSheet()->getStyle('K4:L4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("M3","Dias (1 Semana)");
		$objPHPExcel->getActiveSheet()->mergeCells('M3:T3');
		$objPHPExcel->getActiveSheet()->getStyle('M3:T3')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
		$objPHPExcel->getActiveSheet()->setCellValue("M4",$sD6->modify('-6 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("N4",$sD5->modify('-5 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("O4",$sD4->modify('-4 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("P4",$sD3->modify('-3 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("Q4",$sD2->modify('-2 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("R4",$sD1->modify('-1 day')->format('d/m/Y'));
		$objPHPExcel->getActiveSheet()->setCellValue("S4", $sFechaVista);
		$objPHPExcel->getActiveSheet()->setCellValue("T4","Total de Colegio");
		$objPHPExcel->getActiveSheet()->getStyle('M4:T4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("U3","Dia Camp");
		$objPHPExcel->getActiveSheet()->mergeCells('U3:U4');
		$objPHPExcel->getActiveSheet()->getStyle('U3:U4')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

		$objPHPExcel->getActiveSheet()->setCellValue("V3","Dias Falt Camp");
		$objPHPExcel->getActiveSheet()->mergeCells('V3:V4');
		$objPHPExcel->getActiveSheet()->getStyle('V3:V4')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

		$objPHPExcel->getActiveSheet()->setCellValue("W3","Total Dias");
		$objPHPExcel->getActiveSheet()->mergeCells('W3:W4');
		$objPHPExcel->getActiveSheet()->getStyle('W3:W4')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

		$objPHPExcel->getActiveSheet()->setCellValue("X3","Indice Diario");
		$objPHPExcel->getActiveSheet()->getStyle('X3:X4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('X3:X4');

		$objPHPExcel->getActiveSheet()->setCellValue("Y3","Indice Proyectado");
		$objPHPExcel->getActiveSheet()->getStyle('Y3:Y4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('Y3:Y4');

		$objPHPExcel->getActiveSheet()->setCellValue("Z3","Total a fin de Camp");
		$objPHPExcel->getActiveSheet()->mergeCells('Z3:Z4');
		$objPHPExcel->getActiveSheet()->getStyle('Z3:Z4')
			->applyFromArray($styleAlignmentBold)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);

		$array=array();
		$array['where']=' WHERE 1=1 ';
		$array['usuario']=Auth::user()->id;
		$array['limit']='';
		$array['order']='';

		if( Input::has("txt_fecha_actual") ){
			$array['fecha_actual']=Input::get("txt_fecha_actual");
		} else {
			$array['fecha_actual']=date("Y-m-d");
		}

		if( Input::get("slct_todo")=='0' )
		{
			if( Input::has("txt_ode") ){
				$array['where'].=" AND c.ode LIKE '%".Input::get("txt_ode")."%' ";
			}
			if( Input::has("txt_g1") ){
				$array['where'].=" AND c.g1 LIKE '%".Input::get("txt_g1")."%' ";
			}
			if( Input::has("txt_g2") ){
				$array['where'].=" AND c.g2 LIKE '%".Input::get("txt_g2")."%' ";
			}
			if( Input::has("txt_g3") ){
				$array['where'].=" AND c.g3 LIKE '%".Input::get("txt_g3")."%' ";
			}
			if( Input::has("txt_g4") ){
				$array['where'].=" AND c.g4 LIKE '%".Input::get("txt_g4")."%' ";
			}
			if( Input::has("txt_g5") ){
				$array['where'].=" AND c.g5 LIKE '%".Input::get("txt_g5")."%' ";
			}
			if( Input::has("txt_recopilada") ){
				$array['where'].=" AND c.recopilada LIKE '%".Input::get("txt_recopilada")."%' ";
			}
			if( Input::has("txt_por_recopilar") ){
				$array['where'].=" AND c.por_recopilar LIKE '%".Input::get("txt_por_recopilar")."%' ";
			}
			if( Input::has("txt_meta") ){
				$array['where'].=" AND c.meta LIKE '%".Input::get("txt_meta")."%' ";
			}
			if( Input::has("txt_inicio") ){
				$array['where'].=" AND c.inicio LIKE '%".Input::get("txt_inicio")."%' ";
			}
			if( Input::has("txt_termino") ){
				$array['where'].=" AND c.termino LIKE '%".Input::get("txt_termino")."%' ";
			}
			if( Input::has("txt_d1") ){
				$array['where'].=" AND c.d1 LIKE '%".Input::get("txt_d1")."%' ";
			}
			if( Input::has("txt_d2") ){
				$array['where'].=" AND c.d2 LIKE '%".Input::get("txt_d2")."%' ";
			}
			if( Input::has("txt_d3") ){
				$array['where'].=" AND c.d3 LIKE '%".Input::get("txt_d3")."%' ";
			}
			if( Input::has("txt_d4") ){
				$array['where'].=" AND c.d4 LIKE '%".Input::get("txt_d4")."%' ";
			}
			if( Input::has("txt_d5") ){
				$array['where'].=" AND c.d5 LIKE '%".Input::get("txt_d5")."%' ";
			}
			if( Input::has("txt_d6") ){
				$array['where'].=" AND c.d6 LIKE '%".Input::get("txt_d6")."%' ";
			}
			if( Input::has("txt_d7") ){
				$array['where'].=" AND c.d7 LIKE '%".Input::get("txt_d7")."%' ";
			}
			if( Input::has("txt_total_cole") ){
				$array['where'].=" AND c.total_cole LIKE '%".Input::get("txt_total_cole")."%' ";
			}
			if( Input::has("txt_dia_camp") ){
				$array['where'].=" AND c.dia_camp LIKE '%".Input::get("txt_dia_camp")."%' ";
			}
			if( Input::has("txt_dia_falta_camp") ){
				$array['where'].=" AND c.dia_falta_camp LIKE '%".Input::get("txt_dia_falta_camp")."%' ";
			}
			if( Input::has("txt_total_dia_camp") ){
				$array['where'].=" AND c.total_dia_camp LIKE '%".Input::get("txt_total_dia_camp")."%' ";
			}
			if( Input::has("txt_indice_diario") ){
				$array['where'].=" AND c.indice_diario LIKE '%".Input::get("txt_indice_diario")."%' ";
			}
			if( Input::has("txt_inicio_proyectado") ){
				$array['where'].=" AND c.inicio_proyectado LIKE '%".Input::get("txt_inicio_proyectado")."%' ";
			}
			if( Input::has("txt_total_fin_camp") ){
				$array['where'].=" AND c.total_fin_camp LIKE '%".Input::get("txt_total_fin_camp")."%' ";
			}

			if (Input::has('draw'))
			{
				if (Input::has('order'))
				{
					$inorder=Input::get('order');
					$incolumns=Input::get('columns');
					$array['order']=  ' ORDER BY '.$incolumns[ $inorder[0]['column'] ]['name'].' '.$inorder[0]['dir'];
				}

				$array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
				$retorno["draw"]=Input::get('draw');
			}
		}

		$aData = Visita::getCargaIndiceData($array);
		$cont=0;
		$valorinicial=4;

		foreach($aData as $r)
		{
			$cont++;
			$valorinicial++;
			$azcant=0;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ode);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->g1);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->g2);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->g3);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->g4);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->g5);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->recopilada);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->por_recopilar);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->meta);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->inicio);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->termino);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d1);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d2);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d3);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d4);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d5);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d6);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->d7);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_cole);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dia_camp);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->dia_falta_camp);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_dia_camp);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->indice_diario);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->inicio_proyectado);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->total_fin_camp);
		}
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
		$objPHPExcel->getActiveSheet()->setTitle('Data');
		$objPHPExcel->setActiveSheetIndex(0);
		foreach ($az as $nK => $sV) {
			if($sV=="A" OR ($sV>="L" AND $sV<="W") ){
				$objPHPExcel->getActiveSheet()->getColumnDimension($sV)->setAutoSize(true);
			}
			if($sV=="Z")
			{
				break;
			}
		}
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="IndiceData_'.date("Y-m-d_H-i-s").'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

	}

    public function postDatacole()
    {
        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);

        set_time_limit(300);
        ini_set('memory_limit','1024M');

        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Vic Omar");
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $styleThinBlackBorderAllborders = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array('argb' => 'FF000000'),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'font'    => array(
                'bold'      => true
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );


        $aHeadColegio[] = "N°";
        $aHeadColegio[] = "Ode";
        $aHeadColegio[] = "Tipo";
        $aHeadColegio[] = "Nombre de Colegio";
        $aHeadColegio[] = "Nivel";
        $aHeadColegio[] = "Genero";
        $aHeadColegio[] = "Turno";
        $aHeadColegio[] = "Director";
        $aHeadColegio[] = "Teléfono";
        $aHeadColegio[] = "Correo";
        $aHeadColegio[] = "Dirección";
        $aHeadColegio[] = "Localidad";
        $aHeadColegio[] = "Referencia";
        $aHeadColegio[] = "Cono";
        $aHeadColegio[] = "Distrito";
        $aHeadColegio[] = "Provincia";
        $aHeadColegio[] = "Departamento";
        $aHeadColegio[] = "Ugel";
        $aHeadColegio[] = "Contacto (Contesta)";
        $aHeadColegio[] = "Contacto (Recibe)";

        $aHeadSeccion[] = "1";
        $aHeadSeccion[] = "2";
        $aHeadSeccion[] = "3";
        $aHeadSeccion[] = "4";
        $aHeadSeccion[] = "5";
        $aHeadSeccion[] = "Total";

        $objPHPExcel->getActiveSheet()->setCellValue("A2","DATA DE COLEGIOS");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
        $objPHPExcel->getActiveSheet()->mergeCells('A2:BJ2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:BJ2')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("A3","DATOS DEL COLEGIO");
        $objPHPExcel->getActiveSheet()->getStyle('A3:T4')
            ->applyFromArray($styleAlignmentBold)->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('fff176');
        $objPHPExcel->getActiveSheet()->mergeCells('A3:T4');

        $objPHPExcel->getActiveSheet()->setCellValue("U3","PROGRAMACIÓN");
        $objPHPExcel->getActiveSheet()->mergeCells('U3:AM3');
        $objPHPExcel->getActiveSheet()->getStyle('U3:AM3')
            ->applyFromArray($styleAlignmentBold)->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('64b5f6');

        for($i=0;$i<count($aHeadColegio);$i++)
        {
            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."5",$aHeadColegio[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."5")->getAlignment()->setWrapText(true);
        }
        $objPHPExcel->getActiveSheet()->getStyle('A5:'.$az[($i-1)].'5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->getStyle("A5:".$az[($i-1)]."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

        $objPHPExcel->getActiveSheet()->setCellValue("U4","Telecitas");
        $objPHPExcel->getActiveSheet()->mergeCells('U4:V4');
        $objPHPExcel->getActiveSheet()->getStyle('U4:V4')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("U5","Apellidos y Nombres");
        $objPHPExcel->getActiveSheet()->mergeCells('U5:U5');
        $objPHPExcel->getActiveSheet()->getStyle('U5:U5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("V5","Fecha de la Cita");
        $objPHPExcel->getActiveSheet()->mergeCells('V5:V5');
        $objPHPExcel->getActiveSheet()->getStyle('V5:V5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("W4","Fecha");
        $objPHPExcel->getActiveSheet()->mergeCells('W4:W5');
        $objPHPExcel->getActiveSheet()->getStyle('W4:W5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("X4","Hora");
        $objPHPExcel->getActiveSheet()->mergeCells('X4:X5');
        $objPHPExcel->getActiveSheet()->getStyle('X4:X5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("Y4","Tiempo");
        $objPHPExcel->getActiveSheet()->mergeCells('Y4:Y5');
        $objPHPExcel->getActiveSheet()->getStyle('Y4:Y5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("Z4","Secciones");
        $objPHPExcel->getActiveSheet()->mergeCells('Z4:AE4');
        $objPHPExcel->getActiveSheet()->getStyle('Z4:AE4')->applyFromArray($styleAlignmentBold);

        $nInicioSeccion = 25;
        for($x=0;$x<count($aHeadSeccion);$x++)
        {
            $objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioSeccion]."5",$aHeadSeccion[$x]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$nInicioSeccion]."5")->getAlignment()->setWrapText(true);
            $nInicioSeccion++;
        }
        $objPHPExcel->getActiveSheet()->getStyle('Z5:AE5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->getStyle("Z5:AE5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

        $objPHPExcel->getActiveSheet()->setCellValue("AF4","Data");
        $objPHPExcel->getActiveSheet()->mergeCells('AF4:AK4');
        $objPHPExcel->getActiveSheet()->getStyle('AF4:AK4')->applyFromArray($styleAlignmentBold);

        $nInicioData = 31;
        for($z=0;$z<count($aHeadSeccion);$z++)
        {
            $objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioData]."5",$aHeadSeccion[$z]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$nInicioData]."5")->getAlignment()->setWrapText(true);
            $nInicioData++;
        }
        $objPHPExcel->getActiveSheet()->getStyle('AF5:AK5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->getStyle("AF5:AK5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

        $objPHPExcel->getActiveSheet()->setCellValue("AL4","Observación");
        $objPHPExcel->getActiveSheet()->mergeCells('AL4:AL5');
        $objPHPExcel->getActiveSheet()->getStyle('AL4:AL5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("AM4","Promotor que ingreso");
        $objPHPExcel->getActiveSheet()->mergeCells('AM4:AM5');
        $objPHPExcel->getActiveSheet()->getStyle('AM4:AM5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("AN3","REPORTE");
        $objPHPExcel->getActiveSheet()->mergeCells('AN3:BJ3');
        $objPHPExcel->getActiveSheet()->getStyle('AN3:BJ3')
            ->applyFromArray($styleAlignmentBold)->getFill()
            ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
            ->getStartColor()->setARGB('a5d6a7');

        $objPHPExcel->getActiveSheet()->setCellValue("AN4","Contacto del Colegio");
        $objPHPExcel->getActiveSheet()->mergeCells('AN4:AQ4');
        $objPHPExcel->getActiveSheet()->getStyle('AN4:AQ4')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AO5","Apellidos y Nombres");
        $objPHPExcel->getActiveSheet()->getStyle('AO5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AO5","Cargo");
        $objPHPExcel->getActiveSheet()->getStyle('AO5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AP5","Correo");
        $objPHPExcel->getActiveSheet()->getStyle('AP5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AQ5","Telefono");
        $objPHPExcel->getActiveSheet()->getStyle('AQ5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("AR4","Convenio");
        $objPHPExcel->getActiveSheet()->mergeCells('AR4:AU4');
        $objPHPExcel->getActiveSheet()->getStyle('AR4:AU4')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AR5","Inicio");
        $objPHPExcel->getActiveSheet()->getStyle('AR5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AS5","Termino");
        $objPHPExcel->getActiveSheet()->getStyle('AS5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AT5","Quien suscribe");
        $objPHPExcel->getActiveSheet()->getStyle('AT5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AU5","Promotor");
        $objPHPExcel->getActiveSheet()->getStyle('AU5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("AV4","Secciones");
        $objPHPExcel->getActiveSheet()->mergeCells('AV4:BA4');
        $objPHPExcel->getActiveSheet()->getStyle('AV4:BA4')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AV5","1");
        $objPHPExcel->getActiveSheet()->getStyle('AV5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AW5","2");
        $objPHPExcel->getActiveSheet()->getStyle('AW5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AX5","3");
        $objPHPExcel->getActiveSheet()->getStyle('AX5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AY5","4");
        $objPHPExcel->getActiveSheet()->getStyle('AY5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("AZ5","5");
        $objPHPExcel->getActiveSheet()->getStyle('AZ5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BA5","Total");
        $objPHPExcel->getActiveSheet()->getStyle('BA5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("BB4","Data");
        $objPHPExcel->getActiveSheet()->mergeCells('BB4:BG4');
        $objPHPExcel->getActiveSheet()->getStyle('BB4:BG4')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BB5","1");
        $objPHPExcel->getActiveSheet()->getStyle('BB5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BC5","2");
        $objPHPExcel->getActiveSheet()->getStyle('BC5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BD5","3");
        $objPHPExcel->getActiveSheet()->getStyle('BD5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BE5","4");
        $objPHPExcel->getActiveSheet()->getStyle('BE5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BF5","5");
        $objPHPExcel->getActiveSheet()->getStyle('BF5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BG5","Total");
        $objPHPExcel->getActiveSheet()->getStyle('BG5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("BH4","Grados y Secciones");
        $objPHPExcel->getActiveSheet()->mergeCells('BH4:BI4');
        $objPHPExcel->getActiveSheet()->getStyle('BH4:BI4')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BH5","Realizadas");
        $objPHPExcel->getActiveSheet()->getStyle('BH5')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->setCellValue("BI5","Pendientes");
        $objPHPExcel->getActiveSheet()->getStyle('BI5')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("BJ4","Motivo (Porque no se recopilo data)");
        $objPHPExcel->getActiveSheet()->mergeCells('BJ4:BJ5');
        $objPHPExcel->getActiveSheet()->getStyle('BJ4:BJ5')->applyFromArray($styleAlignmentBold);

        $array=array();
        $array['where']=' WHERE 1=1 ';
        $array['usuario']=Auth::user()->id;
        $array['limit']='';
        $array['order']='';

        if( Input::get("slct_todo")=='0' )
        {
            if( Input::has("txt_ode") ){
                $array['where'].=" AND a.ode LIKE '%".Input::get("txt_ode")."%' ";
            }
            if( Input::has("txt_tipo_colegio") ){
                $array['where'].=" AND a.tipo_colegio LIKE '%".Input::get("txt_tipo_colegio")."%' ";
            }
            if( Input::has("txt_colegio") ){
                $array['where'].=" AND a.colegio LIKE '%".Input::get("txt_colegio")."%' ";
            }
            if( Input::has("txt_nivel_cole") ){
                $array['where'].=" AND a.nivel_cole LIKE '%".Input::get("txt_nivel_cole")."%' ";
            }
            if( Input::has("txt_genero") ){
                $array['where'].=" AND a.genero LIKE '%".Input::get("txt_genero")."%' ";
            }
            if( Input::has("txt_turno") ){
                $array['where'].=" AND a.turno LIKE '%".Input::get("txt_turno")."%' ";
            }
            if( Input::has("txt_director") ){
                $array['where'].=" AND a.director LIKE '%".Input::get("txt_director")."%' ";
            }
            if( Input::has("txt_telefono") ){
                $array['where'].=" AND a.telefono LIKE '%".Input::get("txt_telefono")."%' ";
            }
            if( Input::has("txt_email") ){
                $array['where'].=" AND a.email LIKE '%".Input::get("txt_email")."%' ";
            }
            if( Input::has("txt_direccion") ){
                $array['where'].=" AND a.direccion LIKE '%".Input::get("txt_direccion")."%' ";
            }
            if( Input::has("txt_localidad") ){
                $array['where'].=" AND a.localidad LIKE '%".Input::get("txt_localidad")."%' ";
            }
            if( Input::has("txt_distrito") ){
                $array['where'].=" AND a.distrito LIKE '%".Input::get("txt_distrito")."%' ";
            }
            if( Input::has("txt_referencia") ){
                $array['where'].=" AND a.referencia LIKE '%".Input::get("txt_referencia")."%' ";
            }
            if( Input::has("txt_provincia") ){
                $array['where'].=" AND a.provincia LIKE '%".Input::get("txt_provincia")."%' ";
            }
            if( Input::has("txt_departamento") ){
                $array['where'].=" AND a.departamento LIKE '%".Input::get("txt_departamento")."%' ";
            }
            if( Input::has("txt_ugel") ){
                $array['where'].=" AND a.ugel LIKE '%".Input::get("txt_ugel")."%' ";
            }
            if( Input::has("txt_contesta") ){
                $array['where'].=" AND a.contesta LIKE '%".Input::get("txt_contesta")."%' ";
            }
            if( Input::has("txt_recibe") ){
                $array['where'].=" AND a.recibe LIKE '%".Input::get("txt_recibe")."%' ";
            }
            if( Input::has("txt_tele_nombre") ){
                $array['where'].=" AND a.tele_nombre LIKE '%".Input::get("txt_tele_nombre")."%' ";
            }
            if( Input::has("txt_tele_fecha") ){
                $array['where'].=" AND a.tele_fecha LIKE '%".Input::get("txt_tele_fecha")."%' ";
            }
            if( Input::has("txt_fecha_visita") ){
                $array['where'].=" AND a.fecha_visita LIKE '%".Input::get("txt_fecha_visita")."%' ";
            }
            if( Input::has("txt_hora") ){
                $array['where'].=" AND a.hora LIKE '%".Input::get("txt_hora")."%' ";
            }
            if( Input::has("txt_tiempo") ){
                $array['where'].=" AND a.tiempo LIKE '%".Input::get("txt_tiempo")."%' ";
            }
            if( Input::has("txt_sec_1") ){
                $array['where'].=" AND a.sec_1='".Input::get("txt_sec_1")."' ";
            }
            if( Input::has("txt_sec_2") ){
                $array['where'].=" AND a.sec_2='".Input::get("txt_sec_2")."' ";
            }
            if( Input::has("txt_sec_3") ){
                $array['where'].=" AND a.sec_3='".Input::get("txt_sec_3")."' ";
            }
            if( Input::has("txt_sec_4") ){
                $array['where'].=" AND a.sec_4='".Input::get("txt_sec_4")."' ";
            }
            if( Input::has("txt_sec_5") ){
                $array['where'].=" AND a.sec_5='".Input::get("txt_sec_5")."' ";
            }
            if( Input::has("txt_total_sec") ){
                $array['where'].=" AND a.total_sec='".Input::get("txt_total_sec")."' ";
            }
            if( Input::has("txt_dat_1") ){
                $array['where'].=" AND a.dat_1='".Input::get("txt_dat_1")."' ";
            }
            if( Input::has("txt_dat_2") ){
                $array['where'].=" AND a.dat_2='".Input::get("txt_dat_2")."' ";
            }
            if( Input::has("txt_dat_3") ){
                $array['where'].=" AND a.dat_3='".Input::get("txt_dat_3")."' ";
            }
            if( Input::has("txt_dat_4") ){
                $array['where'].=" AND a.dat_4='".Input::get("txt_dat_4")."' ";
            }
            if( Input::has("txt_dat_5") ){
                $array['where'].=" AND a.dat_5='".Input::get("txt_dat_5")."' ";
            }
            if( Input::has("txt_total_dat") ){
                $array['where'].=" AND a.total_dat='".Input::get("txt_total_dat")."' ";
            }
            if( Input::has("txt_observacion") ){
                $array['where'].=" AND a.observacion LIKE '%".Input::get("txt_observacion")."%' ";
            }
            if( Input::has("txt_promotor") ){
                $array['where'].=" AND a.promotor LIKE '%".Input::get("txt_promotor")."' ";
            }
            if( Input::has("txt_contacto") ){
                $array['where'].=" AND a.contacto='".Input::get("txt_contacto")."' ";
            }
            if( Input::has("txt_cargo") ){
                $array['where'].=" AND a.cargo='".Input::get("txt_cargo")."' ";
            }
            if( Input::has("txt_c_email") ){
                $array['where'].=" AND a.c_email='".Input::get("txt_c_email")."' ";
            }
            if( Input::has("txt_c_telefono") ){
                $array['where'].=" AND a.c_telefono='".Input::get("txt_c_telefono")."' ";
            }

            if (Input::has('draw'))
            {
                if (Input::has('order'))
                {
                    $inorder=Input::get('order');
                    $incolumns=Input::get('columns');
                    $array['order']=  ' ORDER BY '.$incolumns[ $inorder[0]['column'] ]['name'].' '.$inorder[0]['dir'];
                }

                $array['limit']=' LIMIT '.Input::get('start').','.Input::get('length');
                $retorno["draw"]=Input::get('draw');
            }
        }

        $aData = Visita::getCargaDataColegio($array);
        $cont=0;
        $valorinicial=5;
        //////////////////////////////////////////////////////////////////////////////////////////////
        $buscar = array(chr(13) . chr(10), "\r\n", "\n", "�", "\r", "\n\n", "\xEF", "\xBB", "\xBF");
        $reemplazar = ' | ';
        //////////////////////////////////////////////////////////////////////////////////////////////

        foreach($aData as $r)
        {
            $cont++;
            $valorinicial++;
            $azcant=0;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$cont);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->ode));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->tipo_colegio));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->colegio));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->nivel_cole));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->genero));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->turno));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->director));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->telefono));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->email));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->direccion));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->localidad));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->referencia));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->zona));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->distrito));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->provincia));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->departamento));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->ugel));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->contesta));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->recibe));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->tele_nombre));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->tele_fecha));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->fecha_visita));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->hora));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->tiempo));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_1));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_2));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_3));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_4));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->sec_5));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->total_sec));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_1));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_2));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_3));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_4));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->dat_5));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->total_dat));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->observacion));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->promotor));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->contacto));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->cargo));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->c_email));
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,trim($r->c_telefono));
        }
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant+19].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
        $objPHPExcel->getActiveSheet()->setTitle('DataCole');
        $objPHPExcel->setActiveSheetIndex(0);
        foreach ($az as $nK => $sV) {
            if($sV=="A" OR ($sV>="L" AND $sV<="W") ){
                $objPHPExcel->getActiveSheet()->getColumnDimension($sV)->setAutoSize(true);
            }
            if($sV=="AB")
            {
                break;
            }
        }

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="datacole_'.date('Y_m_d_H_i_s').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;
    }

    public function getDatacole()
    {
        /** Error reporting */
        error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);


        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');

        // Create new PHPExcel object
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo");
        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);
        //$styleThinBlackBorderAllborders = new PHPExcel_Style();

        $styleThinBlackBorderAllborders=array(
            'fill' => array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID,
            ),
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                    'color' => array(
                        'argb' => 'FF000000'
                    ),
                ),
            ),
        );
        $styleAlignmentBold= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        $styleAlignment= array(
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            ),
        );
        // Add some data
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Hello')
                    ->setCellValue('B2', 'world!')
                    ->setCellValue('C1', 'Hello')
                    ->setCellValue('D2', 'world!');

        // Miscellaneous glyphs, UTF-8
        $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A4', 'Miscellaneous glyphs')
                    ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

        $objPHPExcel->getActiveSheet()->getStyle('A1:D5')->applyFromArray($styleThinBlackBorderAllborders);

        // Rename worksheet
        $objPHPExcel->getActiveSheet()->setTitle('Simple');

        // Redirect output to a client’s web browser (Excel2007)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="datacole_'.date('Y_m_d').'.xlsx"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

        // If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save('php://output');
        exit;

    }


}
