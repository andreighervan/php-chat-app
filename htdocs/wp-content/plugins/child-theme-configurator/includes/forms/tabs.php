<?php  
if ( !defined( 'ABSPATH' ) ) exit;
// Tabs Bar

$active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'parent_child_options'; 
?>

<h2 class="nav-tab-wrapper clearfix">
<a id="parent_child_options" href="" 
                    class="nav-tab<?php echo 'parent_child_options' == $active_tab ? ' nav-tab-active' : ''; ?>">
<?php _e( 'Parent/ Child', 'child-theme-configurator' ); ?>
</a><?php if ( $enqueueset ): ?><a id="query_selector_options" href="" 
                    class="nav-tab<?php echo 'query_selector_options' == $active_tab ? ' nav-tab-active' : ''; ?>" <?php echo $hidechild; ?>>
<?php _e( 'Query/ Selector', 'child-theme-configurator' ); ?>
</a><a id="rule_value_options" href="" 
                    class="nav-tab<?php echo 'rule_value_options' == $active_tab ? ' nav-tab-active' : ''; ?>" <?php echo $hidechild; ?>>
<?php _e( 'Property/ Value', 'child-theme-configurator' ); ?>
</a><?php
    if ( $this->ctc()->is_theme() ):  
    ?><a id="import_options" href="" 
                    class="nav-tab<?php echo 'import_options' == $active_tab ? ' nav-tab-active' : ''; ?>" <?php echo $hidechild; ?>>
<?php _e( 'Web Fonts', 'child-theme-configurator' ); ?>
</a><?php 
    endif; ?><a id="view_parnt_options" href="" 
                    class="nav-tab<?php echo 'view_parnt_options' == $active_tab ? ' nav-tab-active' : ''; ?>" <?php echo $hidechild; ?>>
<?php _e( 'Baseline Styles', 'child-theme-configurator' ); ?>
</a><a id="view_child_options" href="" 
                    class="nav-tab<?php echo 'view_child_options' == $active_tab ? ' nav-tab-active' : ''; ?>" <?php echo $hidechild; ?>>
<?php _e( 'Child Styles', 'child-theme-configurator' ); ?>
</a><?php 
    if ( '' == $hidechild && $this->ctc()->is_theme() ):  
    ?><a id="file_options" href="" class="nav-tab<?php echo 'file_options' == $active_tab ? ' nav-tab-active' : ''; ?>" <?php echo $hidechild; ?>>
<?php _e( 'Files', 'child-theme-configurator' ); ?>
</a><?php 
    endif; 
do_action( 'chld_thm_cfg_tabs', $active_tab, $hidechild );
endif; ?>
  <i id="ctc_status_preview"></i>
</h2>