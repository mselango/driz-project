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
$objPHPExcel->getActiveSheet()->setCellValue('E3', 'Quotation NO');
$objPHPExcel->getActiveSheet()->setCellValue('E4', 'Invoice/Tax Date');
$objPHPExcel->getActiveSheet()->setCellValue('E5', 'Cust. Order No.');
$rand_order_id  = rand(0,1231313);
$objPHPExcel->getActiveSheet()->setCellValue('F3', $rand_order_id);
$created_date = date("d")." ".date("M")." ".date("Y");
$objPHPExcel->getActiveSheet()->setCellValue('F4',$created_date);
$objPHPExcel->getActiveSheet()->setCellValue('C6', 'Quotation');
$objPHPExcel->getActiveSheet()->setCellValue('B9', $_POST['en_name']);
$en_add = implode(",",explode(" ",$_POST['en_address'])) .",".$_POST['en_postcode'].", TelePhone: ".$_POST['en_phone'];
$objPHPExcel->getActiveSheet()->setCellValue('B10',$en_add);
$objPHPExcel->getActiveSheet()->setCellValue('B11',$_POST['en_email']);

$objPHPExcel->getActiveSheet()->setCellValue('B14','Details');
$objPHPExcel->getActiveSheet()->setCellValue('C14','Finish');
$objPHPExcel->getActiveSheet()->setCellValue('D14','Quantity');
$objPHPExcel->getActiveSheet()->setCellValue('E14','Unit      (£)');
$objPHPExcel->getActiveSheet()->setCellValue('F14','Net          (£)');
$inc = 15;
foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
 $bkey = "B".$inc;  
 $objPHPExcel->getActiveSheet()->setCellValue($bkey,get_the_title($cart_item['data']->id));
 $ckey = "C".$inc;  
 $var_dis_option =  $cart_item['var_option'].$cart_item['data_sele_option'];
 $objPHPExcel->getActiveSheet()->setCellValue($ckey,$var_dis_option);
 $dkey = "D".$inc;  
 $objPHPExcel->getActiveSheet()->setCellValue($dkey,$cart_item['quantity']);
 $ekey = "E".$inc;  
 $objPHPExcel->getActiveSheet()->setCellValue($ekey,floatval($cart_item['var_price']));
 $fkey = "F".$inc;  
 $objPHPExcel->getActiveSheet()->setCellValue($fkey,$cart_item['line_subtotal']);
 $inc++;
}

$cart_content_range = "B15:"."F".$inc;
//Cart cotent border range calc
$border_end_range = $inc + 1;
$cart_border_range  = "B15:"."F".$inc;

//$objPHPExcel->getActiveSheet()->setCellValue('B45','Notes');
$inc = $inc+1;
$tot_col_start = $inc;
$nettotalcolt = "D".$inc; 
$objPHPExcel->getActiveSheet()->setCellValue($nettotalcolt,'Total Net');
$objPHPExcel->getActiveSheet()->getStyle($nettotalcolt)->getFont()->setBold(true);

$notcol_start = "B".$inc;
$objPHPExcel->getActiveSheet()->setCellValue($notcol_start,'Notes');
$objPHPExcel->getActiveSheet()->getStyle($notcol_start)->getFont()->setBold(true);

$not_content = $inc;
$not_content = $not_content+1;
$notcol_con = "B".$not_content;
$objPHPExcel->getActiveSheet()->setCellValue($notcol_con,$_POST['en_notes']);

$nettotalcol = "F".$inc; 
$objPHPExcel->getActiveSheet()->setCellValue($nettotalcol,str_replace("&pound;","£",strip_tags(WC()->cart->get_cart_subtotal())));


if ( WC()->cart->tax_display_cart == 'excl' ) {
    if ( get_option( 'woocommerce_tax_total_display' ) == 'itemized' ) {
        $inc =$inc +2;
        $tax_colmn = $inc;
        foreach ( WC()->cart->get_tax_totals() as $code => $tax ) {
        $dcolumn = "D".$tax_colmn; 
        $objPHPExcel->getActiveSheet()->setCellValue($dcolumn,$tax->label);
        $objPHPExcel->getActiveSheet()->getStyle($dcolumn)->getFont()->setBold(true);

        $fcolumn = "F".$tax_colmn; 
        $objPHPExcel->getActiveSheet()->setCellValue($fcolumn,str_replace("&pound;","£",strip_tags($tax->formatted_amount)));
        $tax_colmn++;
        }
    } 
}
$tax_colmn = $tax_colmn+2;

$note_col_end = $tax_colmn;
$totalcoltext = "D".$tax_colmn;
$objPHPExcel->getActiveSheet()->setCellValue($totalcoltext,"Invoice Total");
$objPHPExcel->getActiveSheet()->getStyle($totalcoltext)->getFont()->setBold(true);
$totalcol = "F".$tax_colmn;
$objPHPExcel->getActiveSheet()->setCellValue($totalcol,str_replace("&pound;","£",strip_tags(WC()->cart->get_total())));

$nettotcolend = "F".$tax_colmn;
$cell_range = $notcol_start.":".$nettotcolend;  
$tot_col_rang = "D".$tot_col_start.":F".$tax_colmn;
//$objPHPExcel->setActiveSheetIndex(0)->mergeCells($cell_range);

foreach($colautosize as $col){
 $objPHPExcel->getActiveSheet()->getColumnDimension($col)
        ->setAutoSize(true);
    
}


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
//Set font style bold
$objPHPExcel->getActiveSheet()->getStyle('B2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('E2')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('C6')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B9')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('B14:F14')->getFont()->setBold(true);
$objPHPExcel->createSheet();

$objPHPExcel->setActiveSheetIndex(0);
