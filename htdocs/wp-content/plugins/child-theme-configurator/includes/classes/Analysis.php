<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/*
    Class: ChildThemeConfiguratorAnalysis
    Plugin URI: http://www.childthemeconfigurator.com/
    Description: Theme Analyzer Class
    Version: 2.1.3
    Author: Lilaea Media
    Author URI: http://www.lilaeamedia.com/
    Text Domain: child-theme-configurator
    Domain Path: /lang
    License: GPLv2
    Copyright (C) 2014-2016 Lilaea Media
*/
class ChildThemeConfiguratorAnalysis {
    
    private $params;
    private $url;
    private $response;
    private $analysis;

    function __construct(){
        $this->params = array(
            'template'      => isset( $_POST[ 'template' ] ) ? $_POST[ 'template' ] : '',
            'stylesheet'    => isset( $_POST[ 'stylesheet' ] ) ? $_POST[ 'stylesheet' ] : '',
            'preview_ctc'   => wp_create_nonce(),
            'now'           => time(),
        );

    }

    // helper function to globalize ctc object
    function ctc() {
        return ChildThemeConfigurator::ctc();
    }
    
    
    function is_child(){
        return $this->params[ 'template' ] !== $this->params[ 'stylesheet' ];
    }
    
    function fetch_page(){
        $this->url = get_home_url() . '?' . build_query( $this->params );
        $args = array(
            'cookies'   => $_COOKIE,
        );
        $this->response = wp_remote_get( $this->url, $args );    
    }
    
    function do_analysis(){
        
        $this->fetch_page();
        
        $this->analysis = array(
            'url'           => $this->url,
            'queue'         => array(),
            'imports'       => array(),
            'irreg'         => array(),
            'dependencies'  => array(),
            'errors'        => array(),
            'deps'          => array( array(), array() ),
            'signals'       => array(
                /*
                err_fatal:          0,
                err_fnf:            0,
                err_other:          0,
                ctc_sep_loaded:     0,
                ctc_ext_loaded:     0,
                ctc_child_loaded:   0,
                ctc_parnt_loaded:   0,
                thm_wrong_order:    0,
                thm_past_wphead:    0,
                thm_unregistered:   0,
                thm_parnt_loaded:   0,
                thm_child_loaded:   0,
                thm_is_ctc:         0,
                thm_no_styles:      0,
                thm_notheme:        0
                */
            ),
        );
        if ( is_wp_error( $this->response ) ):
            $this->analysis[ 'signals' ][ 'failure' ] = 1;
            return;
        else:
            $body = $this->response[ 'body' ];
        endif;
        $themepath      = preg_replace( "|^https?://|", '', get_theme_root_uri() );
        $escaped        = preg_quote( $this->params[ 'template' ] ) . ( $this->is_child() ? '|' . preg_quote( $this->params[ 'stylesheet' ] ) : '' );
        $regex_link     = '%<link( rel=["\']stylesheet["\'] id=[\'"]([^\'"]+?)[\'"])?[^>]+?' .
            preg_quote( $themepath ) . '/(' . $escaped . ')/([^"\']+\.css)(\?[^"\']+)?["\'][^>]+>%si';
        $regex_err      = '%<br \/>\n[^\n]+?(fatal|strict|notice|warning|error).+?<br \/>%si'; //[\s\S]
        
        $themeloaded    = 0; // flag when style.css link is detected
        $testloaded     = 0; // flag when test link is detected
        $this->ctc()->debug( 'regex link: ' . $regex_link . ' regex err: ' . $regex_err, __FUNCTION__ );
        // retrieve enqueued stylesheet ids 
        if ( preg_match( '/BEGIN WP QUEUE\n(.*?)\nEND WP QUEUE/s', $body, $matches ) ):
            $this->analysis[ 'queue' ] = explode( "\n", $matches[ 1 ] );
            //console.log( 'QUEUE:' );
            //console.log( analysis.queue );
        else:
            $this->analysis[ 'queue' ] = array();
            $this->analysis[ 'signals' ][ 'thm_noqueue' ] = 1;
            //analysis.signals.failure = 1;
            //console.log( 'NO QUEUE' );
        endif;
        if ( preg_match( '/BEGIN IMPORT STYLESHEETS\n(.*?)\nEND IMPORT STYLESHEETS/s', $body, $matches ) ):
            $this->analysis[ 'imports' ] = explode( "\n", $matches[ 1 ] );
        else:
            $this->analysis[ 'imports' ] = array();
        endif;
        if ( preg_match( '/BEGIN CTC IRREGULAR\n(.*?)\nEND CTC IRREGULAR/s', $body, $matches ) ):
            $this->analysis[ 'irreg' ] = explode( "\n", $matches[ 1 ] );
        else:
            $this->analysis[ 'irreg' ] = array();
        endif;
        if ( preg_match( "/CHLD_THM_CFG_IGNORE_PARENT/", $body ) ):
            $this->analysis[ 'signals' ][ 'thm_ignoreparnt' ] = 1;
            //console.log( 'thm_ignoreparnt' );
        endif;
        if ( preg_match( "/IS_CTC_THEME/", $body ) ):
            $this->analysis[ 'signals' ][ 'thm_is_ctc' ] = 1;
            //console.log( 'thm_is_ctc' );
        endif;

        if ( preg_match( "/NO_CTC_STYLES/", $body ) ):
            $this->analysis[ 'signals' ][ 'thm_no_styles' ] = 1;
            //console.log( 'thm_no_styles' );
        endif;
        if ( preg_match( "/HAS_CTC_IMPORT/", $body ) ):
            $this->analysis[ 'signals' ][ 'thm_has_import' ] = 1;
            //console.log( 'thm_has_import' );
        endif;

        // remove comments to avoid flagging conditional stylesheets ( IE compatability, etc. )
        $body = preg_replace( '/<!\-\-.*?\-\->/s', '', $body );
        //console.log( 'PARSE:' );
        preg_match_all( $regex_err, $body, $regexmatch );
        foreach( $regexmatch[ 0 ] as $msg ):
            $msg = preg_replace( "/<.*?>/s", '', $msg );
            $this->analysis[ 'errors' ][] = $msg;
            $this->analysis[ 'signals' ][ 'err_php' ] = 1;
            if ( strstr( $msg, "Fatal error" ) )
                $this->analysis[ 'signals' ][ 'err_fatal' ] = 1;

            //else if ( errstr.match( /(FileNotFoundException|Failed opening|failed to open stream)/i ) ) {
                //analysis.signals.err_fnf = 1;
            //}
        endforeach;
        preg_match_all( $regex_link, $body, $regexmatch );
        foreach( $regexmatch[ 0 ] as $msg ):
            $stylesheetid    = preg_replace( '/\-css$/', '', array_shift( $regexmatch[ 2 ] ) );
            $stylesheettheme = array_shift( $regexmatch[ 3 ] ); 
            $stylesheetpath  = array_shift( $regexmatch[ 4 ] );

            $linktheme       = $this->params[ 'template' ] == $stylesheettheme ? 'parnt' : 'child';
            $noid            = 0;
                //console.log( 'stylesheetid: ' + stylesheetid + ' stylesheetpath: ' + stylesheetpath );
                // flag stylesheet links that have no id or are not in wp_styles 
            if ( '' == $stylesheetid || !in_array( $stylesheetid, $this->analysis[ 'queue' ] ) ):
                $noid = 1;
                //console.log( 'no id for ' + stylesheetpath + '!' );
            elseif ( 0 === strpos( $stylesheetid, 'chld_thm_cfg' ) ): // handle ctc-generated links
                // console.log( 'ctc link detected: ' + stylesheetid + ' themeloaded: ' + themeloaded );
                if ( preg_match( '/^ctc\-style([\-\.]min)?\.css$/', $stylesheetpath ) ):
                    //console.log( 'separate stylesheet detected' );
                    $themeloaded = 1;
                    $this->analysis[ 'signals' ][ 'ctc_sep_loaded' ] = 1; // flag that separate stylesheet has been detected
                elseif ( preg_match( '/^ctc\-genesis([\-\.]min)?\.css$/', $stylesheetpath ) ):
                    //console.log( 'genesis stylesheet detected' );
                    $themeloaded = 1;
                    $this->analysis[ 'signals' ][ 'ctc_gen_loaded' ] = 1; // flag that genesis "parent" has been detected
                elseif ( preg_match( '/^chld_thm_cfg_ext/', $stylesheetid ) ):
                    $this->analysis[ 'signals' ][ 'ctc_ext_loaded' ] = 1; // flag that external stylesheet link detected
                    $this->analysis[ 'deps' ][ $themeloaded ][] = array( $stylesheetid, $stylesheetpath );
                elseif ( 'chld_thm_cfg_child' == $stylesheetid ):
                    $this->analysis[ 'signals' ][ 'ctc_child_loaded' ] = 1; // flag that ctc child stylesheet link detected
                    $this->analysis[ 'deps' ][ $themeloaded ][] = array( $stylesheetid, $stylesheetpath );
                elseif ( 'chld_thm_cfg_parent' == $stylesheetid ):
                    $this->analysis[ 'signals' ][ 'ctc_parnt_loaded' ] = 1; // flag that ctc parent stylesheet link detected
                    $this->analysis[ 'deps' ][ $themeloaded ][] = array( $stylesheetid, $stylesheetpath );
                    if ( $themeloaded )
                        //console.log( 'parent link out of sequence' );
                        $this->analysis[ 'signals' ][ 'ctc_parnt_reorder' ] = 1; // flag that ctc parent stylesheet link out of order
                endif;
                continue;
            endif;
            // flag main theme stylesheet link
            if ( preg_match( '/^style([\-\.]min)?\.css$/', $stylesheetpath ) ):
                //console.log( linktheme + ' theme stylesheet detected: ' + stylesheettheme + '/' + stylesheetpath ); 
                $themeloaded = 1; // flag that main theme stylesheet has been detected
                // if main theme stylesheet link has no id then it is unregistered ( hard-wired )
                if ( 'parnt' == $linktheme ):
                    if ( $noid ):
                        $this->analysis[ 'signals' ][ 'thm_parnt_loaded' ] = 'thm_unregistered';
                    else:
                        $this->analysis[ 'signals' ][ 'thm_parnt_loaded' ] = $stylesheetid;
                        // check that parent stylesheet is loaded before child stylesheet
                        if ( 'child' == $themetype && $this->analysis[ 'signals' ][ 'thm_child_loaded' ] ):
                            $this->analysis[ 'signals' ][ 'ctc_parnt_reorder' ] = 1;
                        endif;
                    endif;
                else:
                    $this->analysis[ 'signals' ][ 'thm_child_loaded' ] = $noid ? 'thm_unregistered' : $stylesheetid;
                endif;
                if ( $noid ):
                    if ( $testloaded ):
                        $this->analysis[ 'signals' ][ 'thm_past_wphead' ] = 1;
                        $this->analysis[ 'deps' ][ $themeloaded ][] = array( 'thm_past_wphead', $stylesheetpath );
                        //console.log( 'Unreachable theme stylesheet detected' );
                    else:
                        $this->analysis[ 'signals' ][ 'thm_unregistered' ] = 1;
                        $this->analysis[ 'deps' ][ $themeloaded ][] = array( 'thm_unregistered', $stylesheetpath );
                        //console.log( 'Unregistered theme stylesheet detected' );
                    endif;
                else:
                    $this->analysis[ 'deps' ][ $themeloaded ][] = array( $stylesheetid, $stylesheetpath );
                    //console.log( 'Theme stylesheet OK!' );
                endif;

            elseif ( 'ctc-test.css' == $stylesheetpath ): // flag test stylesheet link
                //console.log( 'end of queue reached' );
                $testloaded = 1; // flag that test queue has been detected ( end of wp_head )
            else:
                $err = NULL;
                // if stylesheet link has id and loads before main theme stylesheet, add it as a dependency
                // otherwise add it as a parse option
                if ( $noid )
                    $err = 'dep_unregistered';

                if ( $testloaded ):
                    if ( $themeloaded ):
                        //console.log( 'Unreachable stylesheet detected!' + stylesheetpath );
                        $err = 'css_past_wphead';
                    else:
                        $err = 'dep_past_wphead';
                    endif;
                endif;
                // Flag stylesheet links that have no id and are loaded after main theme stylesheet. 
                // This indicates loading outside of wp_head()
                if ( $err ):
                    $this->analysis[ 'signals' ][ $err ] = 1;
                    $stylesheetid = $err;
                else:
                    // add to no force options
                    $this->analysis[ 'dependencies' ][ $stylesheetid ] = 1;
                endif;
                $this->analysis[ 'deps' ][ $themeloaded ][] = array( $stylesheetid, $stylesheetpath );
            endif;
        endforeach;
        if ( ! $themeloaded )
            $this->analysis[ 'signals' ][ 'thm_notheme' ] = 1; // flag that no theme stylesheet has been detected
                
    }
    
    function get_analysis(){
        return $this->analysis;
    }
}
