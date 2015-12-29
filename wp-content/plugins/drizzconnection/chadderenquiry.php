<?php
function enquiryform( $atts, $content = "" ) { 
	  global $woocommerce, $product;
                                 

	if(isset($_POST['en_submit'])){

	
    	$insert_enquiry = array(
		  'post_title'    => $_POST['en_name'],
		  'post_content'  => $_POST['en_notes'],
		  'post_status'   => 'publish',
		  'post_author'   => 1,
		  'post_type'=>'enquiry'
		  );

		// Insert the post into the database
	    $enquiry_id = wp_insert_post( $insert_enquiry );
	    global $wc;
	    $en_product = array();
	    if($enquiry_id){
	       	 
			update_post_meta($enquiry_id,"_enquiry_item",$en_product);
			update_post_meta($enquiry_id,"_enquiry_email",$_POST['en_email']);
			update_post_meta($enquiry_id,"_enquiry_phone",$_POST['en_phone']);
			update_post_meta($enquiry_id,"_enquiry_postcode",$_POST['en_postcode']);
			update_post_meta($enquiry_id,"_enquiry_address",$_POST['en_address']);
	
			
			$rand_order_id = rand(0,1321321);
			
			update_post_meta($enquiry_id,"_enquiry_total_amt",WC()->cart->get_total());
			update_post_meta($enquiry_id,"_enquiry_sub_total",WC()->cart->get_cart_subtotal());
	    }


	
		add_filter( 'wp_mail_content_type', 'set_html_content_type' );
		//echo $file_save_path;
		
		$admin_email =  get_option('admin_email');
		//$admin_email ="pradeep@cgvakindia.com";
		$attachments = array( $file_save_path);
		//$headers = "From: Chadder ". "\r\n";
		$headers = 'From: Drizzconnection <'.$admin_email.'>'."\r\n";
		$subject = "Product Enquiry";
		$message .= "";
		$message .= "<p>Hi Admin,</p>";
		
		$message .= "<p>".$_POST['en_name']." has sent product enquiry .<p>";

		$message .= "<h3 class='od-info'>Customer Information</h3>";
		$message .= "<table border='1' cellpadding='5' cellspacing='0'>";
		
		$message .= "<tr><td>Name :</td><td>".$_POST['en_name']."</td></tr>";
		$message .= "<tr><td>Email: </td><td>".$_POST['en_email']."</td></tr>";
		$message .= "<tr><td>Phone: </td><td>".$_POST['en_phone']."</td></tr>";
		$message .= "<tr><td>Postcode: </td><td>".$_POST['en_postcode']."</td></tr>";
		$message .= "<tr><td>Address: </td><td>".$_POST['en_address']."</td></tr>";
		$message .="</table>";

		$message .= "<br/><h3 class='od-info'>Order Information</h3>";
		$message .= "<table border='1' cellpadding='5' cellspacing='0'>";
		//$message .= "<tr><td>Hi,</td></tr>";
		//$message .= "<tr><td>".$_POST['en_name']." has sent product enquiry .Please find the attchement</td></tr>";
		$message .= "<tr><th>Product name</th><th>Variations</th><th>Price</th><th>Qty</th><th>Total</th></tr>";
		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
	       	 
	       	 	$var_array = $cart_item['variation'];
	       	 	$att_html = "";
	       	 	foreach($var_array as $key=>$value){
	       	 			$att = explode("_",$key);
	       	 			$att_name = $att[1];
	       	 			$att_value = $value;
	       	 			
	       	 			$att_html .= $att_name.":".$att_value."<br/>";

	       	 	}
	       	 	$_pf = new WC_Product_Factory();
                $_product = $_pf->get_product($cart_item['product_id']);
	       	 	$product_quantity = $cart_item['quantity'];
	  $message .= "<tr><td>".get_the_title($cart_item['product_id'])."</td><td>".$att_html."</td><th>".apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key )."</th>
	  <th>".$product_quantity."</th><th>".$cart_item['line_total']."</th></tr>";   
			}
		
			$message .="<tr><td colspan='4'>Total:</td><td>".WC()->cart->get_total()."</td></tr>";
		$message .="</table>";
		//$message .="<p>Total:".WC()->cart->get_total()."</p>";
		//echo $message;break;
		$ret = wp_mail( $admin_email,$subject,$message,$headers);
		
		remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
		 $thankyou_link =  ot_get_option( 'enquiry_thank_you_page' ); 
		$redirect = get_permalink($thankyou_link);
		global $woocommerce;
		$woocommerce->cart->empty_cart();
		wp_safe_redirect($redirect);
		exit;
}
	ob_start();
	?>
	<form action="<?php echo get_permalink(); ?>" method="POST" name="enquiry_form" id="enquiry_form">
	<?php if(isset($_POST['en_submit'])){ ?>
	<?php 
		
	?>
	<?php } ?>
	<div class="woocommerce-billing-fields">
		<h3>Enquiry Form</h3>

		<p class="form-row form-row "> <label>Name</label><input name="en_name" id="en_name" type="text" required="required"></p>
		<p class="form-row form-row "><label>Address</label><textarea name="en_address" required="required" cols="25" rows="25"></textarea></p>
		<p class="form-row form-row "><label>Post code</label><input name="en_postcode" id="en_postcode" type="text" required="required"></p>
		<p class="form-row form-row"><label>Email</label><input name="en_email" id="en_email" type="text" required="required">
		</p>
		<p style="display:none;" id="email_valid"><label>&nbsp;</label><span style="font-size:15px;color:#FF0000">Invalid email address</span></p>
		<p class="form-row form-row"><label>Telephone</label><input name="en_phone" id="en_phone" type="text" required="required"></p>
		
			<p class="form-row form-row"> <label>Notes</label><textarea name="en_notes" required="required" cols="25" rows="25"></textarea></p>
		<p><input type="submit" class="enq-subt" name="en_submit" value="Send Enquiry"></p>
	</form>
	</div>
	<?php
	$s = ob_get_contents();
	ob_clean();
	return $s;
}
add_shortcode('enquiryform','enquiryform');
function set_html_content_type() {
				return 'text/html';
}