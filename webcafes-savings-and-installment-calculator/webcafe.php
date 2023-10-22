<?php

// author: Nika dangadze
// FB: https://www.facebook.com/nickolas.danga.3
// Gmail: Nicolas.danga1997@gmail.com
// Tel : 595519091



// დანაზოგის კოდი
function display_product_savings() {
global $product;
global $wpdb;

if ( $product->is_on_sale() ) {
$regular_price = $product->get_regular_price();
$sale_price = $product->get_sale_price();
$savings_percentage = round( ( ( $regular_price - $sale_price ) / $regular_price ) * 100 );

if ( $savings_percentage > 0 ) {
echo '<span class="webcafe_danazogi">' . esc_html__('დანაზოგი -', 'webcafe') . esc_html( $savings_percentage ). '% ' . '</span>';
echo '<link rel="stylesheet" type="text/css" href="' . '/wp-content/plugins/webcafes-savings-and-installment-calculator/css/webcafege.css">';
}
}
}
// დანაზოგის კოდი *სად გინდა რომ გამოჩდეს*
add_action('woocommerce_after_shop_loop_item_title', 'display_product_savings', 15);
add_action('woocommerce_single_product_summary', 'display_product_savings', 15);


// განვადების მთვლელი
function display_installment_price() {
global $product;

if ($product->is_type('simple') || $product->is_type('variable')) {
$regular_price = $product->get_regular_price();
$installment_price = $regular_price / 12; // მიუთითე რამდენ თვეზე გინდა გაყოს საწყისი თანხა

echo '<div class="webcafe_gaanvadeba">განვადება: ' . number_format($installment_price, 2) . ' ₾ -დან</div>';
}
}

// განვადების მთვლელი *სად გინდა რომ გამოჩდეს*
add_action('woocommerce_after_shop_loop_item_title', 'display_installment_price', 25);
add_action('woocommerce_single_product_summary', 'display_installment_price', 16);

