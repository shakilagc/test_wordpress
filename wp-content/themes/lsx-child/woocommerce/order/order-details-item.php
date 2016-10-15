<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
//echo "<pre>";			print_r($product->is_visible());
if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>
<tr class="<?php echo esc_attr( apply_filters( 'woocommerce_order_item_class', 'order_item', $item, $order ) ); ?>">
	<td class="product-name">
		<?php
			$is_visible = $product && $product->is_visible();

			echo apply_filters( 'woocommerce_order_item_name', $is_visible ? sprintf( '<a href="%s">%s</a>', get_permalink( $item['product_id'] ), $item['name'] ) : $item['name'], $item, $is_visible );
			echo apply_filters( 'woocommerce_order_item_quantity_html', ' <strong class="product-quantity">' . sprintf( '&times; %s', $item['qty'] ) . '</strong>', $item );

			do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order );

			$order->display_item_meta( $item );
			//$order->display_item_downloads( $item );
			$display_item_downloads = display_item_downloads_custom($item);
			echo $display_item_downloads;
			do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order );
		?>
	</td>
	<td class="product-total">
		<?php echo $order->get_formatted_line_subtotal( $item ); ?>
	</td>
</tr>
<?php if ( $show_purchase_note && $purchase_note ) : ?>
<tr class="product-purchase-note">
	<td colspan="3"><?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); ?></td>
</tr>

<?php endif;

function get_download_url_custom( $product_id, $download_id, $user_email ) {
		return add_query_arg( array(
			'download_file' => $product_id,
			'order'         => $_GET['key'],
			'email'         => urlencode( $user_email ),
			'key'           => $download_id
		), trailingslashit( home_url() ) );
	}
function get_item_downloads_custom( $item ) {
		global $wpdb;
		$product_id   = $item['variation_id'] > 0 ? $item['variation_id'] : $item['product_id'];
		$product      = wc_get_product( $product_id );
		if ( ! $product ) {
			/**
			 * $product can be `false`. Example: checking an old order, when a product or variation has been deleted.
			 * @see \WC_Product_Factory::get_product
			 */
			return array();
		}
		$download_ids = $wpdb->get_results( $wpdb->prepare("
			SELECT download_id, download_count, downloads_remaining,user_email
			FROM {$wpdb->prefix}woocommerce_downloadable_product_permissions
			WHERE order_key = %s
			AND product_id = %s
			ORDER BY permission_id
		",  $_GET['key'], $product_id ) );
		$files = array();

		foreach ( $download_ids as $download ) {
			$download_id = $download->download_id;
			$download_count = $download->download_count;
			$downloads_remaining = $download->downloads_remaining;
			$user_email = $download->user_email;
			if ( $product->has_file( $download_id ) ) {
				$files[ $download_id ] = $product->get_file( $download_id );
				$files[ $download_id ]['download_count'] = $download_count;
				$files[ $download_id ]['downloads_remaining'] = $downloads_remaining;
				$files[ $download_id ]['download_url'] = get_download_url_custom( $product_id, $download_id, $user_email);
			}
		}
		return $files;
	}
function get_product_from_item_custom( $item ) {
		if ( ! empty( $item['variation_id'] ) && 'product_variation' === get_post_type( $item['variation_id'] ) ) {
			$_product = wc_get_product( $item['variation_id'] );
		} elseif ( ! empty( $item['product_id']  ) ) {
			$_product = wc_get_product( $item['product_id'] );
		} else {
			$_product = false;
		}

		return $_product;
	}

function display_item_downloads_custom($item){
	$product = get_product_from_item_custom( $item );
		if ( $product && $product->exists() && $product->is_downloadable()) {
			$download_files = get_item_downloads_custom( $item );
			$i              = 0;
			$links          = array();

			/*foreach ( $download_files as $download_id => $file ) {
				$i++;
				$prefix  = count( $download_files ) > 1 ? sprintf( __( 'Download %d', 'woocommerce' ), $i ) : __( 'Download', 'woocommerce' );
				$links[] = '<small class="download-url">' . $prefix . ': <a href="' . esc_url( $file['download_url'] ) . '" target="_blank">' . esc_html( $file['name'] ) . '</a></small>' . "\n";
			}*/
			$files = array();
			echo "<div id='saveAll' class='saveAllnew'><div class='arrow'><div><div id='saveAllWrap' class='saveAllWrap'></div></div>";
			foreach ( $download_files as $download_id => $file ) {
				$i++;
				$filename = esc_html( $file['file'] );
				$filename = substr($filename, 42);
				if($file['downloads_remaining'] > 0){
					$prefix  = count( $download_files ) > 1 ? sprintf( __( 'Download %d', 'woocommerce' ), $i ) : __( 'Download', 'woocommerce' );
					$files[] = array('url' => esc_url( $file['download_url']), 'filename' => $filename );
					$links[] = '<div class="full-box">
									<div class="pdf-text">'.esc_html( $file['name'] ) .'</div>
									<div class="drop-down">' . $prefix . ': <small class="download-url">
										<i class="fa fa-sort-asc"></i><a href="' . esc_url( $file['download_url'] ) . '" class="save_pc">Save To PC</a> 
										<button id="Dropbox">' . esc_html( $file['name'] ) . '</button>
										</small>
									</div>
								</div>' . "\n";
				} else {
					$links[] = '<div class="full-box"><div class="pdf-text">'.esc_html( $file['name'] ) .'</div><div class="download_exceeds">Download Limit Exceeds</div></div>' . "\n";
				}

			}
			
			$allfiles = json_encode($files);
			$data = $file['download_url'];    
			$whatIWant = substr($data, strpos($data, "?") + 1);    
			?>
			<script type="text/javascript">
				jQuery(document).ready(function(){
    				jQuery("#Dropbox").click(function(){ //split up each li into an array item
				        jQuery.ajax({
				        	type: "GET",
				            url: "../wp-content/plugins/woocommerce/includes/class-wc-download-handler.php",
				            data: "<?php echo $whatIWant; ?>",
				            success: function(data){
				            	location.reload();
				            },
				            error: function(){
				                location.reload();
				            }
				        })
				    });
				});
			</script>
			<?php
			//echo $prefix;
			echo '<br/>' . implode( '<br/>', $links );
		}
}

?>

