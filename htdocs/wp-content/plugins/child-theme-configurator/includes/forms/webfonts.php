<?php  
if ( !defined( 'ABSPATH' ) ) exit;
// @imports Panel
$ctcpage = apply_filters( 'chld_thm_cfg_admin_page', CHLD_THM_CFG_MENU );
?>

<div id="import_options_panel" 
        class="ctc-option-panel<?php echo 'import_options' == $active_tab ? ' ctc-option-panel-active' : ''; ?>" <?php echo $hidechild; ?>>
  <form id="ctc_import_form" method="post" action=""><!-- ?page=<?php echo $ctcpage; ?>" -->
    <?php wp_nonce_field( apply_filters( 'chld_thm_cfg_action', 'ctc_update' ) ); ?>
    <div class="ctc-input-row clearfix" id="ctc_child_imports_row">
      <div class="ctc-input-cell">
        <div class="ctc-textarea-button-cell" id="ctc_save_imports_cell">
          <input type="button" class="button ctc-save-input" id="ctc_save_imports" 
            name="ctc_save_imports" value="<?php _e( 'Save', 'child-theme-configurator' ); ?>"  disabled />
        </div>
        <strong>
        <?php _e( 'Linked Stylesheets', 'child-theme-configurator' ); ?>
        </strong>
        <p><?php _e( 'Use <code>@import url( [path] );</code> to link additional stylesheets. Child Theme Configurator uses the <code>@import</code> keyword to identify them and convert them to <code>&lt;link&gt;</code> tags. <strong>Example:</strong>');?></p> 
        <p><code>@import url(http://fonts.googleapis.com/css?family=Oswald);</code></p> 
      </div>
      <div class="ctc-input-cell-wide">
        <textarea id="ctc_child_imports" name="ctc_child_imports" wrap="off"><?php 
    if ( !empty( $imports ) ):
        foreach ( $imports as $import ):
            echo esc_textarea( $import . ';' . LF );
        endforeach; 
    endif; ?>
</textarea>
      </div>
    </div>
  </form>
</div>
