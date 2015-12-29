<?php
/**
 * Single Product tabs
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */ ?>
<div id="tab-description" class="panel entry-content wc-tab" style="display: block;">
				
  <h2>Product Description</h2>
<?php 
the_content();
?>
			</div>
