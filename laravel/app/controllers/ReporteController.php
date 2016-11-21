<?php

class ReporteController extends BaseController
{
    public function postAlumnos()
    {

        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $azcount=array(5,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);
        // aqui s el tamaña de las celdas
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

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo")
                                     ->setLastModifiedBy("Jorge Salcedo")
                                     ->setTitle("Office 2007 XLSX Test Document")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $objPHPExcel->getActiveSheet()->setCellValue("A2","Alumno");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);

        $cabecera=array('Nº','ODE','DISTRITO','PROVINCIA','DEPARTAMENTO','AP_PATERNO','AP_MATERNO','NOMBRES','SEXO','EDAD','GRADO','SECCION','TURNO','TELEFONO FIJO','CELULAR 1','CORREO ELEC.','DIRECCION','REFERENCIA','DISTRITO','PROVINCIA','DEPARTAMENTO','COLEGIO','TIPO (PQ,N,P)','DIRECCION','REFERENCIA','DISTRITO','PROVINCIA','DEPARTAMENTO','PENSION','CARRERA PROFESIONAL (5 AÑOS)','PRECIO','CARRERA PROFESIONAL (3 AÑOS)','PRECIO','CARRERA PROFESIONAL (1 AÑO)','PRECIO','APELLIDOS Y NOMBRES','FECHA','APELLIDOS Y NOMBRES','FECHA');

        $objPHPExcel->getActiveSheet()->mergeCells('A3:A4');
        $objPHPExcel->getActiveSheet()->mergeCells('A2:'.$az[(count($cabecera)-1)].'2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[(count($cabecera)-1)].'2')->applyFromArray($styleAlignmentBold);

         $objPHPExcel->getActiveSheet()->setCellValue("A3",'Nº');
        $objPHPExcel->getActiveSheet()->setCellValue("B3",'I DATOS ODE');
        $objPHPExcel->getActiveSheet()->setCellValue($az[5]."3",'II DATOS DEL ALUMNO');
        $objPHPExcel->getActiveSheet()->setCellValue($az[21]."3",'III DATOS DEL COLEGIO');
        $objPHPExcel->getActiveSheet()->setCellValue($az[29]."3",'IV DATOS EDUCATIVOS');
        $objPHPExcel->getActiveSheet()->setCellValue($az[35]."3",'V DIGITACION');
        $objPHPExcel->getActiveSheet()->setCellValue($az[37]."3",'VI VISITA');

        $objPHPExcel->getActiveSheet()->mergeCells('B3:'.$az[4].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[5].'3:'.$az[20].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[21].'3:'.$az[28].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[29].'3:'.$az[34].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[35].'3:'.$az[36].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[37].'3:'.$az[38].'3');

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
        $objPHPExcel->getActiveSheet()->getStyle($az[5].'4:'.$az[20].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('fce4d6');
        $objPHPExcel->getActiveSheet()->getStyle($az[21]."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('e2efda');
        $objPHPExcel->getActiveSheet()->getStyle($az[21].'4:'.$az[28].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('e2efda');
        $objPHPExcel->getActiveSheet()->getStyle($az[29]."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('d9e1f2');
        $objPHPExcel->getActiveSheet()->getStyle($az[29].'4:'.$az[34].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('d9e1f2');
        $objPHPExcel->getActiveSheet()->getStyle($az[35]."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('f8cbad');
        $objPHPExcel->getActiveSheet()->getStyle($az[35].'4:'.$az[36].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('f8cbad');
        $objPHPExcel->getActiveSheet()->getStyle($az[37]."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('f8cbad');
        $objPHPExcel->getActiveSheet()->getStyle($az[37].'4:'.$az[38].'4')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('f8cbad');
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
        $azcant=0;
        $aData = Alumno::DataAlumno( $array );

        foreach($aData as $r){
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
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->referencia);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito_alu);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->provincia_alu);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->departamento_alu);$azcant++;

        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegio);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegio_tipo);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->referencia1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito_cole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->provincia_cole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->departamento_cole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->pension);$azcant++;

        $cd=array(array(),array(),array());
        $md=array(array(),array(),array());
        
        $c3=explode("||",$r->carrera3);
        $m3=explode("||",$r->monto3);
        for ($i=0; $i < count($c3); $i++) { 
            $cd3=explode("|",$c3[$i]);
            $md3=explode("|",$m3[$i]);
            if( count($cd3)==2 ){
            array_push($cd[0],$cd3[1]);
            array_push($md[0], $md3[1]);
            }
        }

        $c2=explode("||",$r->carrera2);
        $m2=explode("||",$r->monto2);
        for ($i=0; $i < count($c2); $i++) { 
            $cd2=explode("|",$c2[$i]);
            $md2=explode("|",$m2[$i]);
            if( count($cd2)==2 ){
            array_push($cd[1],$cd2[1]);
            array_push($md[1], $md2[1]);
            }
        }

        $c1=explode("||",$r->carrera1);
        $m1=explode("||",$r->monto1);
        for ($i=0; $i < count($c1); $i++) { 
            $cd1=explode("|",$c1[$i]);
            $md1=explode("|",$m1[$i]);
            if( count($cd1)==2 ){
            array_push($cd[2],$cd1[1]);
            array_push($md[2], $md1[1]);
            }
        }
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$cd[0]) );$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$md[0]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$cd[1]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$md[1]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$cd[2]));$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,implode("\n",$md[2]));$azcant++;

        $objPHPExcel->getActiveSheet()->getStyle($az[$azcant-6].$valorinicial.":".$az[$azcant-1].$valorinicial)->getAlignment()->setWrapText(true);// Ajustar formato indicado

        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->digitador);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_digitador);$azcant++;

        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->visitador);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_visita);$azcant++;
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

    public function postProduccion()
    {

        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $azcount=array(15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);
        // aqui s el tamaña de las celdas
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

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo")
                                     ->setLastModifiedBy("Jorge Salcedo")
                                     ->setTitle("Office 2007 XLSX Test Document")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $objPHPExcel->getActiveSheet()->setCellValue("A2","Producción");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);

        $cabecera=array('Paterno','Materno','Nombre','Horario','Código','Fecha Ingreso','Fecha Retiro','Fecha Campaña','Data','Seminario','Colegio Visitado','Padrinazgo','Data','Seminario','Colegio Visitado','Padrinazgo','Data','Seminario','Colegio Visitado','Padrinazgo','Total','5TO','4TO','3RO','2DO','1RO','Total','Nacional','Particular','Total','Mañana','Tarde','Citas','Convenio','Padrinazgo');

        $objPHPExcel->getActiveSheet()->mergeCells('A2:'.$az[(count($cabecera)-1)].'2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[(count($cabecera)-1)].'2')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("A3",'Datos Colegio');
        $objPHPExcel->getActiveSheet()->setCellValue($az[6]."3",'Datos Del Participante');
        $objPHPExcel->getActiveSheet()->mergeCells('A3:'.$az[5].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[6].'3:'.$az[9].'3');
        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[(count($cabecera)-1)].'3')->applyFromArray($styleAlignmentBold);

            for($i=0;$i<count($cabecera);$i++){
            $objPHPExcel->getActiveSheet()->setCellValue($az[$i]."4",$cabecera[$i]);
            $objPHPExcel->getActiveSheet()->getStyle($az[$i]."4")->getAlignment()->setWrapText(true);
            //$objPHPExcel->getActiveSheet()->getColumnDimension($az[$i])->setWidth($azcount[$i]);
            }
        $objPHPExcel->getActiveSheet()->getStyle('A3:'.$az[($i-1)].'4')->applyFromArray($styleAlignmentBold);
        $objPHPExcel->getActiveSheet()->getStyle("A3:".$az[($i-1)]."4")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');
            /****   Filtro ***************************************************/

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
        $valorinicial=4;
        $azcant=0;
        $aData = Produccion::getCargar( $array );

        foreach($aData as $r){
        $cont++;
        $valorinicial++;
        $azcant=0;
        $cabecera=array('Paterno','Materno','Nombre','Horario','Código','Fecha Ingreso','Fecha Retiro','Fecha Campaña','Data','Seminario','Colegio Visitado','Padrinazgo','Data','Seminario','Colegio Visitado','Padrinazgo','Data','Seminario','Colegio Visitado','Padrinazgo','Total','5TO','4TO','3RO','2DO','1RO','Total','Nacional','Particular','Total','Mañana','Tarde','Citas','Convenio','Padrinazgo');
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->paterno);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->materno);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->nombre);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->horario);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->codigo);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_ingreso);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_retiro);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->fecha_campaña);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->datast);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->seminariost);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegiost);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,'');$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->datast1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->seminariost1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegiost1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,'');$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->datast2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->seminariost2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegiost2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,'');$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->datacole);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c5);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c4);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c3);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c2);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c1);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->colegios);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->nacional);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->particular);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->seminarios);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->mañana);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->tarde);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->citas);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->convenios);$azcant++;
        $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,'');$azcant++;
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

    public function postPrueba()
    {

        $az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
        $azcount=array(5,17,17,25,25,25,15,12,12,15,17,18,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15,15);
        // aqui s el tamaña de las celdas
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

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo")
                                     ->setLastModifiedBy("Jorge Salcedo")
                                     ->setTitle("Office 2007 XLSX Test Document")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

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

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("Jorge Salcedo")
                                     ->setLastModifiedBy("Jorge Salcedo")
                                     ->setTitle("Office 2007 XLSX Test Document")
                                     ->setSubject("Office 2007 XLSX Test Document")
                                     ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                                     ->setKeywords("office 2007 openxml php")
                                     ->setCategory("Test result file");

        $objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

        $objPHPExcel->getActiveSheet()->setCellValue("A2","Listado de Seminarios");
        $objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);

        $cabecera=array('Ode','Tipo','Nombre Colegio','Telefono','Direccion','Distrito','Persona','Telefono','Cargo','Horario');

        $objPHPExcel->getActiveSheet()->mergeCells('A2:'.$az[(count($cabecera)-1)].'2');
        $objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[(count($cabecera)-1)].'2')->applyFromArray($styleAlignmentBold);

        $objPHPExcel->getActiveSheet()->setCellValue("A3",'Datos Colegio');
        $objPHPExcel->getActiveSheet()->setCellValue($az[6]."3",'Datos Del Participante');
        $objPHPExcel->getActiveSheet()->mergeCells('A3:'.$az[5].'3');
        $objPHPExcel->getActiveSheet()->mergeCells($az[6].'3:'.$az[9].'3');
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

	public function postDistribucion()
	{
		$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
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

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Vic Omar");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

		$aHeadColegio[] = "N°";
		$aHeadColegio[] = "Ode";
		$aHeadColegio[] = "Tipo";
		$aHeadColegio[] = "Nombre de Colegio";
		$aHeadColegio[] = "Teléfono";
        $aHeadColegio[] = "Dirección";
        $aHeadColegio[] = "Referencia";
		$aHeadColegio[] = "Distrito";

		$aHeadSeccion[] = "1";
		$aHeadSeccion[] = "2";
		$aHeadSeccion[] = "3";
		$aHeadSeccion[] = "4";
		$aHeadSeccion[] = "5";
		$aHeadSeccion[] = "Total";

		$objPHPExcel->getActiveSheet()->setCellValue("A2","DISTRIBUCIÓN DE COLEGIOS");
		$objPHPExcel->getActiveSheet()->getStyle('A2')->getFont()->setSize(20);
		$objPHPExcel->getActiveSheet()->mergeCells('A2:AD2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:AD2')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A3","DATOS DEL COLEGIO");
		$objPHPExcel->getActiveSheet()->getStyle('A3:H4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:H4');

		$objPHPExcel->getActiveSheet()->setCellValue("I3","PROGRAMACIÓN");
		$objPHPExcel->getActiveSheet()->mergeCells('I3:Y3');
		$objPHPExcel->getActiveSheet()->getStyle('I3:Y3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('64b5f6');

		for($i=0;$i<count($aHeadColegio);$i++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$i]."5",$aHeadColegio[$i]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$i]."5")->getAlignment()->setWrapText(true);
		}
		$objPHPExcel->getActiveSheet()->getStyle("A5:".$az[($i-1)]."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("I4","Fecha");
		$objPHPExcel->getActiveSheet()->mergeCells('I4:I5');

		$objPHPExcel->getActiveSheet()->setCellValue("J4","Hora");
		$objPHPExcel->getActiveSheet()->mergeCells('J4:J5');

		$objPHPExcel->getActiveSheet()->setCellValue("K4","Tiempo");
		$objPHPExcel->getActiveSheet()->mergeCells('K4:K5');

		$objPHPExcel->getActiveSheet()->setCellValue("L4","Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('L4:Q4');

		$nInicioSeccion = 11;
		for($x=0;$x<count($aHeadSeccion);$x++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioSeccion]."5",$aHeadSeccion[$x]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioSeccion]."5")->getAlignment()->setWrapText(true);
			$nInicioSeccion++;
		}
		$objPHPExcel->getActiveSheet()->getStyle("L5:Q5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("R4","Data");
		$objPHPExcel->getActiveSheet()->mergeCells('R4:W4');

		$nInicioData = 17;
		for($z=0;$z<count($aHeadSeccion);$z++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioData]."5",$aHeadSeccion[$z]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioData]."5")->getAlignment()->setWrapText(true);
			$nInicioData++;
		}
		$objPHPExcel->getActiveSheet()->getStyle("R5:W5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("X4","Observación");
		$objPHPExcel->getActiveSheet()->mergeCells('X4:X5');

		$objPHPExcel->getActiveSheet()->setCellValue("Y4","Promotor que ingreso");
		$objPHPExcel->getActiveSheet()->mergeCells('Y4:Y5');

		$objPHPExcel->getActiveSheet()->setCellValue("Z3","REPORTE");
		$objPHPExcel->getActiveSheet()->mergeCells('Z3:AD3');
		$objPHPExcel->getActiveSheet()->getStyle('Z3:AD3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('a5d6a7');

		$objPHPExcel->getActiveSheet()->setCellValue("Z4","Grados y Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('Z4:AA4');

		$objPHPExcel->getActiveSheet()->setCellValue("Z5","Realizadas");

		$objPHPExcel->getActiveSheet()->setCellValue("AA5","Pendientes");

		$objPHPExcel->getActiveSheet()->setCellValue("AB4","Motivo (Por que no se recopilo data)");
		$objPHPExcel->getActiveSheet()->mergeCells('AB4:AB5');

        $objPHPExcel->getActiveSheet()->setCellValue("AC4","Fecha Telecita");
        $objPHPExcel->getActiveSheet()->mergeCells('AC4:AC5');

        $objPHPExcel->getActiveSheet()->setCellValue("AD4","Persona Telecita");
        $objPHPExcel->getActiveSheet()->mergeCells('AD4:AD5');

		$objPHPExcel->getActiveSheet()->getStyle('A3:AD5')->applyFromArray($styleAlignmentBold);

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
		}

		$aData = Visita::getCargaDistribucion($array);
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
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion);
                $azcant++;
            $objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->referencia);
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
            if($sV=="A" OR ($sV>="L" AND $sV<="W") ){
			     $objPHPExcel->getActiveSheet()->getColumnDimension($sV)->setAutoSize(true);
            }
			if($sV=="AB")
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

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Vic Omar");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

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
		$objPHPExcel->getActiveSheet()->mergeCells('A2:AD2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:AD2')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A3","DATOS DEL COLEGIO");
		$objPHPExcel->getActiveSheet()->getStyle('A3:L4')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('fff176');
		$objPHPExcel->getActiveSheet()->mergeCells('A3:L4');

		$objPHPExcel->getActiveSheet()->setCellValue("M3","PROGRAMACIÓN");
		$objPHPExcel->getActiveSheet()->mergeCells('M3:AC3');
		$objPHPExcel->getActiveSheet()->getStyle('M3:AC3')
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

		$objPHPExcel->getActiveSheet()->setCellValue("M4","Fecha");
		$objPHPExcel->getActiveSheet()->mergeCells('M4:M5');
		$objPHPExcel->getActiveSheet()->getStyle('M4:M5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("N4","Hora");
		$objPHPExcel->getActiveSheet()->mergeCells('N4:N5');
		$objPHPExcel->getActiveSheet()->getStyle('N4:N5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("O4","Tiempo");
		$objPHPExcel->getActiveSheet()->mergeCells('O4:O5');
		$objPHPExcel->getActiveSheet()->getStyle('O4:O5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("P4","Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('P4:U4');
		$objPHPExcel->getActiveSheet()->getStyle('P4:U4')->applyFromArray($styleAlignmentBold);

		$nInicioSeccion = 15;
		for($x=0;$x<count($aHeadSeccion);$x++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioSeccion]."5",$aHeadSeccion[$x]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioSeccion]."5")->getAlignment()->setWrapText(true);
			$nInicioSeccion++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('P5:U5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("P5:U5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("V4","Data");
		$objPHPExcel->getActiveSheet()->mergeCells('V4:AA4');
		$objPHPExcel->getActiveSheet()->getStyle('V4:AA4')->applyFromArray($styleAlignmentBold);

		$nInicioData = 21;
		for($z=0;$z<count($aHeadSeccion);$z++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioData]."5",$aHeadSeccion[$z]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioData]."5")->getAlignment()->setWrapText(true);
			$nInicioData++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('V5:AA5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("V5:AA5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("AB4","Observación");
		$objPHPExcel->getActiveSheet()->mergeCells('AB4:AB5');
		$objPHPExcel->getActiveSheet()->getStyle('AB4:AB5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AC4","Promotor que ingreso");
		$objPHPExcel->getActiveSheet()->mergeCells('AC4:AC5');
		$objPHPExcel->getActiveSheet()->getStyle('AC4:AC5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AD3","REPORTE");
		$objPHPExcel->getActiveSheet()->mergeCells('AD3:AD3');
		$objPHPExcel->getActiveSheet()->getStyle('AD3:AD3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('a5d6a7');

		$objPHPExcel->getActiveSheet()->setCellValue("AD4","Convenido");
		$objPHPExcel->getActiveSheet()->mergeCells('AD4:AD4');
		$objPHPExcel->getActiveSheet()->getStyle('AD4:AD4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AD5","Fecha");
		$objPHPExcel->getActiveSheet()->getStyle('AD5')->applyFromArray($styleAlignmentBold);

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
		$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
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

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Vic Omar");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

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
		$objPHPExcel->getActiveSheet()->mergeCells('A2:BI2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:BI2')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("A3","DATOS DEL COLEGIO");
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
		$objPHPExcel->getActiveSheet()->getStyle('BI4:BI5')->applyFromArray($styleAlignmentBold);

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
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->nivel_cole);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->genero);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->turno);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->director);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->telefono);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->email);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->direccion);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->localidad);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->referencia);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->distrito);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->provincia);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->departamento);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->ugel);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->contesta);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->recibe);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->tele_nombre);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->tele_fecha);
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
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->contacto);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->cargo);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c_email);
				$azcant++;
			$objPHPExcel->getActiveSheet()->setCellValue($az[$azcant].$valorinicial,$r->c_telefono);
		}
		$objPHPExcel->getActiveSheet()->getStyle('A2:'.$az[$azcant+19].$valorinicial)->applyFromArray($styleThinBlackBorderAllborders);
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
		header('Content-Disposition: attachment;filename="Data_'.date("Y-m-d_H-i-s").'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;

	}

	public function postIndice()
	{
		$az=array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ');
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

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Vic Omar");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

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

		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setCreator("Vic Omar");
		$objPHPExcel->getDefaultStyle()->getFont()->setName('Bookman Old Style');
		$objPHPExcel->getDefaultStyle()->getFont()->setSize(8);

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

}
