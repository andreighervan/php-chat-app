<?php 
	global $layout, $class, $image_class, $infor_class;
 ?>
<div class="<?php echo esc_attr( $image_class ); ?> product-images">
	<?php
		/**
		 * woocommerce_before_single_product_summary hook
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>
</div><!-- Product images/ END -->

<?php 
    if($layout == 'large') {
        ?>
        </div>
        <div class="row">
        <?php
    } 
?>

<div class="<?php echo esc_attr( $infor_class ); ?> product-information">
    <div class="product-information-inner">
        <div class="fixed-content">
            <?php if(!etheme_get_option('product_name_signle')):  ?>
                <h4 class="title"><?php esc_html_e('Product Information', 'xstore'); ?></h4>
            <?php endif; ?>
        
    		<?php
    			/**
    			 * woocommerce_single_product_summary hook
    			 *
    			 * @hooked woocommerce_template_single_title - 5 
    			 * @hooked woocommerce_template_single_rating - 10
    			 * @hooked woocommerce_template_single_price - 10
    			 * @hooked woocommerce_template_single_excerpt - 20
    			 * @hooked woocommerce_template_single_add_to_cart - 30
    			 * @hooked woocommerce_template_single_meta - 40
    			 * @hooked woocommerce_template_single_sharing - 50
    			 */
    			do_action( 'woocommerce_single_product_summary' );
    		?>
           
    		<?php if(etheme_get_option('share_icons')): ?>
                <div class="product-share">
                    <?php echo do_shortcode('[share title="'.__('Share Social', 'xstore').'" text="'.get_the_title().'"]'); ?>
                </div>
            <?php endif; ?>

            <?php if(etheme_get_option('product_posts_links')): ?>
                <?php etheme_project_links(array()); ?>
            <?php endif; ?>
        </div>
    </div>
</div><!-- Product information/ END -->
<?php 
    if($layout == 'large') {
        ?>
            <div class="<?php echo esc_attr( $infor_class ); ?>">
                <?php do_action( 'woocommerce_after_single_product_summary' ); ?>
            </div>
        <?php
    } 
?>