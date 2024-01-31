<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>
<section class="woocommerce-order-details">
	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

	<h2 class="woocommerce-order-details__title"><?php esc_html_e( 'Order details', 'woocommerce' ); ?></h2>

	<table class="woocommerce-table woocommerce-table--order-details shop_table order_details">

		<thead>
			<tr>
				<th class="woocommerce-table__product-name product-name" style="font-family: 'SharpSansNo1 Bold', sans-serif;color:#000;border-width: 1px 0px 0px;}"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
				<th class="woocommerce-table__product-name product-name" style="font-family: 'SharpSansNo1 Bold', sans-serif;color:#000;border-width: 1px 0px 0px;}"><?php esc_html_e( ' ', 'woocommerce' ); ?></th>
				<th class="woocommerce-table__product-table product-total" style="font-family: 'SharpSansNo1 Bold', sans-serif;color:#000; border-width: 1px 0px 0px;"><?php esc_html_e( 'Item Price', 'woocommerce' ); ?></th>
				<th class="woocommerce-table__product-name product-name" style="font-family: 'SharpSansNo1 Bold', sans-serif;color:#000; border-width: 1px 0px 0px; text-align:center;"><?php esc_html_e( 'Qunatity', 'woocommerce' ); ?></th>
				<th class="woocommerce-table__product-table product-total" style="font-family: 'SharpSansNo1 Bold', sans-serif;color:#000; border-width: 1px 0px 0px; text-align:center;"><?php esc_html_e( 'Total Price', 'woocommerce' ); ?></th>
			</tr>
		</thead>

		<tbody>
			<?php
			do_action( 'woocommerce_order_details_before_order_table_items', $order );

			foreach ( $order_items as $item_id => $item ) {
				$product = $item->get_product();

				wc_get_template(
					'order/order-details-item.php',
					array(
						'order'              => $order,
						'item_id'            => $item_id,
						'item'               => $item,
						'show_purchase_note' => $show_purchase_note,
						'purchase_note'      => $product ? $product->get_purchase_note() : '',
						'product'            => $product,
						'show_image'         => $show_image,
						'image_size'         => $image_size,
					)
				);
			}

			do_action( 'woocommerce_order_details_after_order_table_items', $order );
			?>
		</tbody>
		<tfoot>
		
    <?php
        if ( $totals = $order->get_order_item_totals() ) {
            $i = 0;
            foreach ( $totals as $key => $total ) {
                $i++;
                if ( $key !== 'payment_method' ){
                    ?><tr>
						<th style="font-family: 'SharpSansNo1 Bold', sans-serif;color:#000;border-width: 0px 0px 0px;"><?php echo $total['label']; ?></th>
						<td style="font-family: 'SharpSansNo1 Bold', sans-serif;color:#000;border-width: 0px 0px 0px;"><?php echo $total['value']; ?></td>
					  </tr>
                    <?php
                }
				}
        }
    ?>
	
</tfoot> 


	</table>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action( 'woocommerce_after_order_details', $order );

if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
