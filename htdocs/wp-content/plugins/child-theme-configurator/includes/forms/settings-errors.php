<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
        if ( count( $this->ctc()->errors ) ): ?>

<div class="error notice is-dismissible">
  <ul>
    <?php
            foreach ( $this->ctc()->errors as $err ):
                echo '<li>' . $err . '</li>' . LF;
            endforeach; ?>
  </ul>
</div>
<?php
        elseif ( isset( $_GET[ 'updated' ] ) ):
            $child_theme = wp_get_theme( $this->ctc()->get( 'child' ) ); ?>
<div class="updated notice is-dismissible">
  <?php
            if ( 4 == $_GET[ 'updated' ] ): ?>
  <p> <?php printf( __( 'Child Theme <strong>%s</strong> has been reset. Please configure it using the settings below.', 'child-theme-configurator' ), $child_theme->Name ); ?> </p>
  <?php
            elseif ( 7 == $_GET[ 'updated' ] ): ?>
  <p>
    <?php _e( 'Update Key saved successfully.', 'child-theme-configurator' ); ?>
  </p>
  <?php
            elseif ( 8 == $_GET[ 'updated' ] ): ?>
  <p>
    <?php _e( 'Child Theme files modified successfully.', 'child-theme-configurator' ); ?>
  </p>
  <?php       else: ?>
  <p class="ctc-success-response"><?php echo apply_filters( 'chld_thm_cfg_update_msg', sprintf( __( 'Child Theme <strong>%s</strong> has been generated successfully.', 'child-theme-configurator' ), $child_theme->Name ), $this->ctc() ); ?>
    <?php
                if ( $this->ctc()->is_theme() ): ?>
    <strong>
    <?php _e( 'IMPORTANT:', 'child-theme-configurator' ); ?>
    <?php
                    if ( is_multisite() && !$child_theme->is_allowed() ): 
                        printf( __( 'You must %sNetwork enable%s your child theme.', 'child-theme-configurator' ), 
                            sprintf( '<a href="%s" title="%s" class="ctc-live-preview">',
                                network_admin_url( '/themes.php' ),
                                __( 'Go to Themes', 'child-theme-configurator' ) ),
                            '</a>'
                        );
                    else: 
                        printf( __( '%sPreview your child theme%s before activating.', 'child-theme-configurator' ),
                            sprintf( '<a href="%s" title="%s" class="ctc-live-preview">',
                                admin_url( '/customize.php?theme=' . $this->ctc()->css->get_prop( 'child' ) ),
                                __( 'Live Preview', 'child-theme-configurator' ) ),
                            '</a>'
                        );
                    endif; ?>
    </strong></p>
  <?php
                endif;
             endif; ?>
</div>
<?php
        endif;

