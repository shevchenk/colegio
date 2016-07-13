<?php

class ReporteController extends \BaseController
{
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

	public function postDistribucion()
	{

	}

}
