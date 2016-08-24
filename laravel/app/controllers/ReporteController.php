<?php

class ReporteController extends BaseController
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
		$objPHPExcel->getActiveSheet()->mergeCells('A2:Z2');
		$objPHPExcel->getActiveSheet()->getStyle('A2:Z2')->applyFromArray($styleAlignmentBold);

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
		$objPHPExcel->getActiveSheet()->getStyle('A5:'.$az[($i-1)].'5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("A5:".$az[($i-1)]."5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("I4","Fecha");
		$objPHPExcel->getActiveSheet()->mergeCells('I4:I5');
		$objPHPExcel->getActiveSheet()->getStyle('I4:I5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("J4","Hora");
		$objPHPExcel->getActiveSheet()->mergeCells('J4:J5');
		$objPHPExcel->getActiveSheet()->getStyle('J4:J5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("K4","Tiempo");
		$objPHPExcel->getActiveSheet()->mergeCells('K4:K5');
		$objPHPExcel->getActiveSheet()->getStyle('K4:K5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("L4","Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('L4:Q4');
		$objPHPExcel->getActiveSheet()->getStyle('L4:Q4')->applyFromArray($styleAlignmentBold);

		$nInicioSeccion = 11;
		for($x=0;$x<count($aHeadSeccion);$x++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioSeccion]."5",$aHeadSeccion[$x]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioSeccion]."5")->getAlignment()->setWrapText(true);
			$nInicioSeccion++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('L5:Q5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("L5:Q5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("R4","Data");
		$objPHPExcel->getActiveSheet()->mergeCells('R4:W4');
		$objPHPExcel->getActiveSheet()->getStyle('R4:W4')->applyFromArray($styleAlignmentBold);

		$nInicioData = 17;
		for($z=0;$z<count($aHeadSeccion);$z++)
		{
			$objPHPExcel->getActiveSheet()->setCellValue($az[$nInicioData]."5",$aHeadSeccion[$z]);
			$objPHPExcel->getActiveSheet()->getStyle($az[$nInicioData]."5")->getAlignment()->setWrapText(true);
			$nInicioData++;
		}
		$objPHPExcel->getActiveSheet()->getStyle('R5:W5')->applyFromArray($styleAlignmentBold);
		$objPHPExcel->getActiveSheet()->getStyle("R5:W5")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('FFCCCCCC');

		$objPHPExcel->getActiveSheet()->setCellValue("X4","Observación");
		$objPHPExcel->getActiveSheet()->mergeCells('X4:X5');
		$objPHPExcel->getActiveSheet()->getStyle('X4:X5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("Y4","Promotor que ingreso");
		$objPHPExcel->getActiveSheet()->mergeCells('Y4:Y5');
		$objPHPExcel->getActiveSheet()->getStyle('Y4:Y5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("Z3","REPORTE");
		$objPHPExcel->getActiveSheet()->mergeCells('Z3:AB3');
		$objPHPExcel->getActiveSheet()->getStyle('Z3:AB3')
			->applyFromArray($styleAlignmentBold)->getFill()
			->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB('a5d6a7');

		$objPHPExcel->getActiveSheet()->setCellValue("Z4","Grados y Secciones");
		$objPHPExcel->getActiveSheet()->mergeCells('Z4:AA4');
		$objPHPExcel->getActiveSheet()->getStyle('Z4:AA4')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("Z5","Realizadas");
		$objPHPExcel->getActiveSheet()->getStyle('Z5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AA5","Pendientes");
		$objPHPExcel->getActiveSheet()->getStyle('AA5')->applyFromArray($styleAlignmentBold);

		$objPHPExcel->getActiveSheet()->setCellValue("AB4","Motivo (Por que no se recopilo data)");
		$objPHPExcel->getActiveSheet()->mergeCells('AB4:AB5');
		$objPHPExcel->getActiveSheet()->getStyle('AB4:AB5')->applyFromArray($styleAlignmentBold);

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
				$azcant++;
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

}
