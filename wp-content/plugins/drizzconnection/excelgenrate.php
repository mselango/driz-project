<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2014 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2014 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.8.0, 2014-03-02
 */

/** Error reporting */
//error_reporting(E_ALL);

/** Include PHPExcel */


 $plugin_dir = ABSPATH . 'wp-content/plugins/chadder/';
 /** PHPExcel_IOFactory */
//extract($_POST);

require_once $plugin_dir . 'phpexcel/Classes/PHPExcel.php';


// Create new PHPExcel object
//echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
//echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("chadder website")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("chadder website quote")
							 ->setSubject("chadder website quote")
							 ->setDescription("Chadder website quote excel")
							 ->setCategory("Test result file");


$objPHPExcel->setActiveSheetIndex(0);
//create global cart object
global $wc;
$colautosize =array("A","B","C","D","E","F","G");
foreach($colautosize as $col){
 

      /* $objPHPExcel->getActiveSheet()->getStyle($col)->applyFromArray(
    array(
        'fill' => array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID,
            'color' => array('rgb' => '808080')
        )
    )
);*/
}
$objPHPExcel->getActiveSheet()->setCellValue('B2', 'BathShield UK Ltd. T/A Chadder & Co');
$objPHPExcel->getActiveSheet()->setCellValue('B3', 'Blenheim Studio, London Road, Forest Row');
$objPHPExcel->getActiveSheet()->setCellValue('B4', 'East Sussex, RH18 5EZ (VAT Reg No: 528 7357 16)');
$objPHPExcel->getActiveSheet()->setCellValue('B5', '01342 823243 www.chadder.com');

$colautosize =array("A","B","C","D","E","F","G");

$objPHPExcel->getActiveSheet()->setCellValue('E2', 'Quotation');
$objPHPExcel->getActiveSheet()->setCellValue('F2', 'Page1');
$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->getStyle('F2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
//$objPHPExcel->getActiveSheet()->getStyle('F2')->getFont()->setBold(true)->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->setCellValue('E3', 'Quotation NO');
$objPHPExcel->getActiveSheet()->setCellValue('E4', 'Invoice/Tax Date');
$objPHPExcel->getActiveSheet()->setCellValue('E5', 'Cust. Order No.');
$rand_order_id  = rand(0,1231313);
$objPHPExcel->getActiveSheet()->setCellValue('F3', $rand_order_id);
$objPHPExcel->getActiveSheet()->getStyle('F3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('F3')->getFont()->setName('Times New Roman');
$created_date = date("d")." ".date("M")." ".date("Y");
$objPHPExcel->getActiveSheet()->setCellValue('F4',$created_date);
$objPHPExcel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle('F4')->getFont()->setName('Times New Roman');
$objPHPExcel->getActiveSheet()->setCellValue('B7', 'Quotation');


$merge7 = "B7:F7";
$objPHPExcel->getActiveSheet()->mergeCells($merge7);
$objPHPExcel->getActiveSheet()->getStyle('B7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B7')->getFont()->setBold(true)->setName('Times New Roman')->setSize(18);

$objPHPExcel->getActiveSheet()->setCellValue('B9', $_POST['en_name']);
$en_add = implode(",",explode(" ",$_POST['en_address'])) .",".$_POST['en_postcode'].", TelePhone: ".$_POST['en_phone'];
$objPHPExcel->getActiveSheet()->setCellValue('B10',$en_add);
$objPHPExcel->getActiveSheet()->setCellValue('B11',$_POST['en_email']);

$objPHPExcel->getActiveSheet()->setCellValue('B14','Details');
$objPHPExcel->getActiveSheet()->getRowDimension('14')->setRowHeight(30);
$objPHPExcel->getActiveSheet()->getStyle('B14')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('B14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('B14')->getFont()->setBold(true)->setName('Times New Roman');

$objPHPExcel->getActiveSheet()->setCellValue('C14','Finish');
$objPHPExcel->getActiveSheet()->getStyle('C14')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('C14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C14')->getFont()->setBold(true)->setName('Times New Roman');

$objPHPExcel->getActiveSheet()->setCellValue('D14','Quantity');
$objPHPExcel->getActiveSheet()->getStyle('D14')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('D14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D14')->getFont()->setBold(true)->setName('Times New Roman');

$objPHPExcel->getActiveSheet()->setCellValue('E14','Unit(£)');
$objPHPExcel->getActiveSheet()->getStyle('E14')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('E14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('E14')->getFont()->setBold(true)->setName('Times New Roman');

$objPHPExcel->getActiveSheet()->setCellValue('F14','Net(£)');
$objPHPExcel->getActiveSheet()->getStyle('F14')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_TOP);
$objPHPExcel->getActiveSheet()->getStyle('F14')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('F14')->getFont()->setBold(true)->setName('Times New Roman');
$inc = 15;

$no_of_cart_items = 1;
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
   /* echo "<pre>";
    print_r($cart_item);*/
 $bkey = "B".$inc;  
 $objPHPExcel->getActiveSheet()->setCellValue($bkey,get_the_title($cart_item['data']->id));
 $ckey = "C".$inc;  
 $var_dis_option =  $cart_item['var_option'].$cart_item['data_sele_option'];
 $objPHPExcel->getActiveSheet()->setCellValue($ckey,$var_dis_option);
 $dkey = "D".$inc;  
 $objPHPExcel->getActiveSheet()->setCellValue($dkey,$cart_item['quantity']);
 $objPHPExcel->getActiveSheet()->getStyle($dkey)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
 $objPHPExcel->getActiveSheet()->getStyle($dkey)->getFont()->setName('Times New Roman');
 $ekey = "E".$inc;  
 $objPHPExcel->getActiveSheet()->setCellValue($ekey,floatval($cart_item['var_price']));
 $objPHPExcel->getActiveSheet()->getStyle($ekey)->getNumberFormat()->setFormatCode('0.00'); 

 $objPHPExcel->getActiveSheet()->getStyle($ekey)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->getStyle($ekey)->getFont()->setName('Times New Roman');
 $fkey = "F".$inc;  

 $objPHPExcel->getActiveSheet()->setCellValue($fkey,$cart_item['line_subtotal']);
 $objPHPExcel->getActiveSheet()->getStyle($fkey)->getNumberFormat()->setFormatCode('0.00'); 
 $objPHPExcel->getActiveSheet()->getStyle($fkey)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
 $objPHPExcel->getActiveSheet()->getStyle($fkey)->getFont()->setName('Times New Roman');
 $inc++;
 $no_of_cart_items++;
}
$total_cart_rows = 31;
$no_of_cart_items - $no_of_cart_items - 2;
$free_rows = $total_cart_rows - $no_of_cart_items;
$inc = $inc+$free_rows;
$cart_content_range = "B15:"."F".$inc;
//Cart cotent border range calc
$border_end_range = $inc + 1;
$cart_border_range  = "B15:"."F".$inc;

//$objPHPExcel->getActiveSheet()->setCellValue('B45','Notes');

$inc = $inc + 1;
$tot_col_start = $inc;
$nettotalcolt = "D".$inc;  


$objPHPExcel->getActiveSheet()->setCellValue($nettotalcolt,'Total Net');
$objPHPExcel->getActiveSheet()->getStyle($nettotalcolt)->getFont()->setName('Times New Roman');

$merge1 = $nettotalcolt.":"."E".$inc;
$objPHPExcel->getActiveSheet()->mergeCells($merge1);
$cal_next_tot_column = $inc + 1;
$merge5 = "D".$cal_next_tot_column.":"."E".$cal_next_tot_column;
$objPHPExcel->getActiveSheet()->mergeCells($merge5);

$cal_next_tot_column = $cal_next_tot_column+1;
$merge6  = "D".$cal_next_tot_column.":"."E".$cal_next_tot_column;
$objPHPExcel->getActiveSheet()->mergeCells($merge6);

$objPHPExcel->getActiveSheet()->getStyle($nettotalcolt)->getFont()->setBold(true)->setName('Times New Roman');


$notcol_start = "B".$inc;
$objPHPExcel->getActiveSheet()->setCellValue($notcol_start,'Notes');
$objPHPExcel->getActiveSheet()->getStyle($notcol_start)->getFont()->setBold(true)->setName('Times New Roman');

$not_content = $inc;
$not_content = $not_content+1;
$notcol_con = "B".$not_content;
$objPHPExcel->getActiveSheet()->setCellValue($notcol_con,$_POST['en_notes']);

$nettotalcol = "F".$inc; 
$objPHPExcel->getActiveSheet()->setCellValue($nettotalcol,str_replace("&pound;","£",strip_tags(WC()->cart->get_cart_subtotal())));
$objPHPExcel->getActiveSheet()->getStyle($nettotalcol)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle($nettotalcol)->getFont()->setName('Times New Roman');

/*Packing & Carriage subtotals*/
$inc= $inc+1;


if ( WC()->cart->tax_display_cart == 'excl' ) {
    if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) {
        $inc =$inc +2;
        $tax_colmn = $inc;
        foreach ( WC()->cart->get_tax_totals() as $code => $tax ) {
        $dcolumn = "D".$tax_colmn; 
        $objPHPExcel->getActiveSheet()->setCellValue($dcolumn,$tax->label);
        $objPHPExcel->getActiveSheet()->getStyle($dcolumn)->getFont()->setBold(true)->setName('Times New Roman')->setSize(12);

        //Tax column merge
        $merge3 = $dcolumn.":"."E".$tax_colmn;
        $objPHPExcel->getActiveSheet()->mergeCells($merge3);

        $fcolumn = "F".$tax_colmn; 
        $objPHPExcel->getActiveSheet()->setCellValue($fcolumn,str_replace("&pound;","£",strip_tags($tax->formatted_amount)));
        $objPHPExcel->getActiveSheet()->getStyle($fcolumn)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
        $objPHPExcel->getActiveSheet()->getStyle($fcolumn)->getFont()->setName('Times New Roman')->setSize(12);
        $tax_colmn++;
        }
    } 
}

 $merge4 = "D".$tax_colmn.":"."E".$tax_colmn;
 $objPHPExcel->getActiveSheet()->mergeCells($merge4);


$tax_colmn = $tax_colmn+1;

$note_col_end = $tax_colmn;
$totalcoltext = "D".$tax_colmn;
$objPHPExcel->getActiveSheet()->setCellValue($totalcoltext,"Invoice Total");
//Invoice total merge column
$merge2 = $totalcoltext.":"."E".$tax_colmn;
$objPHPExcel->getActiveSheet()->mergeCells($merge2);

$objPHPExcel->getActiveSheet()->getStyle($totalcoltext)->getFont()->setBold(true)->setName('Times New Roman')->setSize(12);
$totalcol = "F".$tax_colmn;
$objPHPExcel->getActiveSheet()->setCellValue($totalcol,str_replace("&pound;","£",strip_tags(WC()->cart->get_total())));
$objPHPExcel->getActiveSheet()->getStyle($totalcol)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
$objPHPExcel->getActiveSheet()->getStyle($totalcol)->getFont()->setBold(true)->setName('Times New Roman');

$nettotcolend = "F".$tax_colmn;
$cell_range = $notcol_start.":".$nettotcolend;  
$tot_col_rang = "D".$tot_col_start.":F".$tax_colmn;



//width set the cells
$objPHPExcel->getDefaultStyle()->getFont()
    ->setName('Times New Roman')
     ->setSize(12);



$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(13);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(12);

/*Dropdows set*/
  $objValidation = $objPHPExcel->getActiveSheet()->getCell('E2')->getDataValidation();
    $objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
    $objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
    $objValidation->setAllowBlank(false);
    $objValidation->setShowInputMessage(true);
    $objValidation->setShowErrorMessage(true);
    $objValidation->setShowDropDown(true);
    $objValidation->setFormula1('"Quotation ,Order Confirmation ,Invoice ,Pro-forma invoice ,Delivery note "');

    
   $objPHPExcel->getActiveSheet()
    ->setCellValue('B7','=E2');
/*Dropdowns set*/


//$objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(-1);

$objPHPExcel->getActiveSheet()->getStyle('A1:z100')->applyFromArray(
    array('fill'    => array(
                                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                                'color'     => array('rgb' => '808080')
                            ),
         )
    );

$objPHPExcel->getActiveSheet()->getStyle('B9:F12')->applyFromArray(
    array('fill'    => array(
                                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                                'color'     => array('rgb' => 'FFFFFFFF')
                            ),
         )
    );
//cart cotent  design
$objPHPExcel->getActiveSheet()->getStyle($cart_content_range)->applyFromArray(
    array('fill'    => array(
                                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                                'color'     => array('rgb' => 'FFFFFFFF')
                            ),
         )
    ); 
//Total column design
   $objPHPExcel->getActiveSheet()->getStyle($tot_col_rang)->applyFromArray(
    array('fill'    => array(
                                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                                'color'     => array('rgb' => 'FFFFFFFF')
                            ),
         )
    );

$not_shade_range = $notcol_start.":B".$note_col_end;
$objPHPExcel->getActiveSheet()->getStyle($not_shade_range)->applyFromArray(
    array('fill'    => array(
                                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                                'color'     => array('rgb' => 'FFFFFFFF')
                            ),
         )
    ); 

 $objPHPExcel->getActiveSheet()->getStyle("E2")->applyFromArray(
    array('fill'    => array(
                                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                                'color'     => array('rgb' => 'FFFFFFFF')
                            ),
         )
    );
$objPHPExcel->getActiveSheet()->getStyle("F2:F5")->applyFromArray(
    array('fill'    => array(
                                'type'      => PHPExcel_Style_Fill::FILL_SOLID,
                                'color'     => array('rgb' => 'FFFFFFFF')
                            ),
         )
    );
//const BORDER_THICK = "thick";
 $styleArray = array(
 'borders' => array(
    'left' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),
    'right' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),
    'bottom' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
    ),
    'top' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN,
    ), 
));

$objPHPExcel->getActiveSheet()->getStyle("B9:F12")->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle("B14:F14")->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle($cart_border_range)->applyFromArray($styleArray);

$objPHPExcel->getActiveSheet()->getStyle($not_shade_range)->applyFromArray($styleArray);


unset($styleArray);

$styleArray = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);

$objPHPExcel->getActiveSheet()->getStyle($tot_col_rang)->applyFromArray($styleArray);
$objPHPExcel->getActiveSheet()->getStyle("E2:F5")->applyFromArray($styleArray);
unset($styleArray);
$objPHPExcel->getDefaultStyle()->getFont()
    ->setName('Times New Roman');
//Set font style bold
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true)->setSize(14);
$objPHPExcel->getActiveSheet()->getStyle('C7')->getFont()->setBold(true)->setSize(18);
$objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B9')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B14:F14')->getFont()->setBold(true);

$objPHPExcel->getDefaultStyle()->getFont()
    ->setName('Times New Roman');
$objPHPExcel->createSheet();

$objPHPExcel->setActiveSheetIndex(0);
