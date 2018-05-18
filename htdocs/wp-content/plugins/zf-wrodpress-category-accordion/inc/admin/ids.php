<?php
/**
 * @version    $Id$
 * @package    ZF WordPress Category Accordion
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
$id = isset($_GET['element_id']) ? $_GET['element_id'] : '';
$cat_type = isset($_GET['cat_type']) ? $_GET['cat_type'] : '';
$action = isset($_GET['action']) ? $_GET['action'] : '';

?>

<div id="wrap">
    <?php
    if ($cat_type == 'page') { ?>

        <?php
        $pages = get_pages();
        if ($pages) {
            ?>
            <select id="zfwca-choose-ids" multiple="multiple">
            <?php
            foreach ( $pages as $page ) {
                $option = '<option value="' . $page->ID . '">';
                $option .= $page->post_title;
                $option .= '</option>';
                echo $option;
            } ?>
            </select>
        <?php } else { ?>
        <?php _e('Empty', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG);?>
        <?php } ?>


        <?php } else { ?>

        <?php
        $terms = get_terms( $cat_type);
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ ?>
            <select id="zfwca-choose-ids" multiple="multiple">
            <?php
            foreach ( $terms as $term ) {
                $option = '<option value="' . $term->term_id . '">';
                $option .= $term->name;
                $option .= '</option>';
                echo $option;
            }
            ?>
            </select>
        <?php } else { ?>
            <?php _e('Empty', ZF_WORDPRESS_CATEGORY_ACCORDION_LANG);?>
        <?php } ?>

    <?php } ?>
    <div class="clear"></div>
    <br>
    <input type="button" value="Insert" class="button" id="zfa_insert_ids">
</div>

<script type="text/javascript">

    jQuery('#zfa_insert_ids').on('click', function (event) {
        event.preventDefault();
        var select_ids = jQuery('#zfwca-choose-ids').val();

        if (select_ids) {
            select_ids = select_ids.join(',');
        }
        window.parent.jQuery('#<?php echo $id;?>').val(select_ids);
        window.parent.tb_remove();
        return false;
    });

</script>

<?php
exit();