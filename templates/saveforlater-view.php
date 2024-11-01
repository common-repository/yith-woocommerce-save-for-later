<?php
/**
 * SaveForLater List page template
 *
 * @author Your Inspiration Themes
 * @package YITH Save for Later
 * @version 1.0.0
 */
$elements=count( $savelist_items );
$show_wishlist_link =   defined('YITH_WCWL') && get_option('ywsfl_show_wishlist_link');
?>
<div id="ywsfl_general_content" data-num-elements="<?php echo $elements;?>">
<?php

if($elements > 0):?>
    <?php
    $text = sprintf( _n( '1 Product', '%s Products', count( $savelist_items ), 'yith-woocommerce-save-for-later' ), count( $savelist_items ) );
    ?>
    <div id="ywsfl_title_save_list"><h3><?php echo $title_list.'('.$text.' )';?></h3></div>
    <div id="ywsfl_container_list">
        <?php
            foreach( $savelist_items as $item ):
                global $product;
              $product_id   =    $item['product_id'];
                $product_var = null;

                if( function_exists( 'wc_get_product' ) ) {
                    $product = wc_get_product( $product_id );
                }
                else{
                    $product = get_product( $product_id );
                }
                if( $product !== false && $product->exists() ) :
                    $availability = $product->get_availability();
                    $stock_status = $availability['class'];
                    $url = empty( $current_page ) ? wp_get_referer() : $current_page;
                ?>
                    <div class="row" id="row-<?php echo $item['product_id'];?>" data-row-id="<?php echo $item['product_id'];?>">
                        <div class="delete_col"><a href="<?php echo esc_url( add_query_arg( 'remove_from_savelist', $item['product_id'] ), $url ) ?>" class="remove_from_savelist" data-product-id="<?php echo $item['product_id'];?>" title="Remove this product">&times;</a></div>

                        <div class="sub_container_product">
                            <div class="product_name">
                               <p class="display_name"><?php echo apply_filters( 'woocommerce_in_cartproduct_obj_title', $product->get_title(), $product ) ?></p>
                                <p class="display_price">
                                    <?php
                                    if( is_a( $product, 'WC_Product_Bundle' ) ){
                                        if( $product->min_price != $product->max_price ){
                                            echo sprintf( '%s - %s', wc_price( $product->min_price ), wc_price( $product->max_price ) );
                                        }
                                        else{
                                            echo wc_price( $product->min_price );
                                        }
                                    }
                                    elseif( $product->get_price() != '0' ) {
                                        echo $product->get_price_html();
                                    }
                                    else {
                                        echo apply_filters( 'yith_free_text', __( 'Free!', 'yith-woocommerce-save-for-later' ) );
                                    }
                                    ?>
                                </p>
                                <p class="display_product_status">
                                    <?php
                                    if( $stock_status == 'out-of-stock' ) {
                                    $stock_status = "Out";
                                    echo '<span class="savelist-out-of-stock">' . __( 'Out of Stock', 'yith-woocommerce-save-for-later' ) . '</span>';
                                    } else {
                                    $stock_status = "In";
                                    echo '<span class="savelist-in-stock">' . __( 'In Stock', 'yith-woocommerce-save-for-later' ) . '</span>';
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endif;?>
        <?php endforeach;?>
    </div>
<?php endif;?>
</div>
