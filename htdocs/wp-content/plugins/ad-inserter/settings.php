<?php

require_once AD_INSERTER_PLUGIN_DIR.'constants.php';

function generate_settings_form (){
  global $ai_db_options, $block_object;

  $save_url = $_SERVER ['REQUEST_URI'];
  if (isset ($_GET ['tab'])) {
    $save_url = preg_replace ("/&tab=\d+/", "", $save_url);
  }

  $generate_all = false;
  if (isset ($_GET ['generate-all']) && $_GET ['generate-all'] == 1) {
    $generate_all = true;
  }

  $subpage = 'main';
  $start =  1;
  $end   = 16;
  if (function_exists ('ai_settings_parameters')) ai_settings_parameters ($subpage, $start, $end);

  if (isset ($_GET ['tab'])) $active_tab = $_GET ['tab']; else
    $active_tab = isset ($_POST ['ai-active-tab']) ? $_POST ['ai-active-tab'] : 1;
  if (!is_numeric ($active_tab)) $active_tab = 1;
  if ($active_tab != 0)
    if ($active_tab < $start || $active_tab > $end) $active_tab = $start;

  $adH  = $block_object [AI_HEADER_OPTION_NAME];
  $adF  = $block_object [AI_FOOTER_OPTION_NAME];

  $syntax_highlighter_theme = get_syntax_highlighter_theme ();
  $block_class_name         = get_block_class_name ();

  $default = $block_object [0];

?>

<div id="data" style="display: none;" version="<?php echo AD_INSERTER_VERSION; ?>" theme="<?php echo $syntax_highlighter_theme; ?>" javascript_debugging="<?php echo get_javascript_debugging () ? '1' : '0'; ?>" ></div>

<div id="ai-settings" style="float: left;">

<form id="ai-form" class="ai-form no-select" action="<?php echo $save_url; ?>" method="post" id="ai-form" name="ai_form" style="float: left;" start="<?php echo $start; ?>" end="<?php echo $end; ?>">

  <div id="header" class="ai-form header" style="margin: 8px 0; padding: 0 8px; border: 1px solid rgb(221, 221, 221); border-radius: 5px;">
<?php
  if (function_exists ('ai_settings_header')) ai_settings_header ($start, $active_tab); else { ?>

    <div style="float: left;">
      <h2 id="plugin_name" style="display: inline-block; margin: 13px 0;"><?php echo AD_INSERTER_NAME . ' ' . AD_INSERTER_VERSION ?></h2>
    </div>
    <div id="header-buttons">
      <a style="text-decoration: none;" href="http://adinserter.pro/documentation" target="_blank"><button type="button" style="display: none; margin: 0 10px 0 0; width: 62px;">Doc</button></a>
      <a style="text-decoration: none;" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LHGZEMRTR7WB4" target="_blank"><button type="button" style="display: none; margin: 0 10px 0 0; width: 62px;">Donate</button></a>
      <a style="text-decoration: none;" href="http://adinserter.pro/" target="_blank"><button type="button" title="If you need more than 16 blocks, more viewports, GEO targeting, scheduling, import/export settings, multisite support" style="display: none; margin: 0 10px 0 0; width: 62px;">Go&nbsp;Pro</button></a>
      <a style="text-decoration: none;" href="https://wordpress.org/support/plugin/ad-inserter/reviews/" target="_blank"><button type="button" title="If you like Ad Inserter please write a nice review" style="display: none; margin: 0 10px 0 0; width: 62px;">Review</button></a>
    </div>

    <div style="clear: both;"></div>
<?php
  }
?>
  </div>

  <div id="javascript-warning" class="ai-form" style="padding: 2px 8px 2px 8px; margin: 8px 0 8px 0; border: 1px solid rgb(221, 221, 221); border-radius: 5px; display: none;">
    <h2 id="javascript-version" style="float: left; color: red;" title="Loaded plugin javascript version">&nbsp;</h2>
    <div style="float: right; text-align: right; margin: 8px 18px 0px 0;">
        <span id="javascript-version-parameter" style="display: none;">Wrong version parameter for the javscript file, probably due to inappropriate caching.<br /></span>
        <span id="javascript-version-parameter-missing" style="display: none;">Missing version parameter for the javscript file, probably due to inappropriate caching.<br /></span>
        Incompatible (old) javscript file loaded, probably due to inappropriate caching.<br />
        Please delete browser's cache and all other caches used and then reload this page.
    </div>
    <div style="clear: both;"></div>
  </div>

  <div id="css-warning" class="ai-form" style="padding: 2px 8px 2px 8px; margin: 8px 0 8px 0; border: 1px solid rgb(221, 221, 221); border-radius: 5px; display: none;">
    <h2 id="css-version" style="float: left; color: red;" title="Loaded plugin CSS version">&nbsp;</h2>
    <div style="float: right; text-align: right; margin: 8px 18px 0px 0;">
        <span id="css-version-parameter" style="display: none;">Wrong version parameter for the CSS file, probably due to inappropriate caching.<br /></span>
        <span id="css-version-parameter-missing" style="display: none;">Missing version parameter for the CSS file, probably due to inappropriate caching.<br /></span>
        Incompatible (old) CSS file loaded, probably due to inappropriate caching.<br />
        Please delete browser's cache and all other caches used and then reload this page.
    </div>
    <div style="clear: both;"></div>
  </div>

  <div id="blocked-warning" class="ai-form warning-enabled" style="padding: 2px 8px 2px 8px; margin: 8px 0 8px 0; border: 1px solid rgb(221, 221, 221); border-radius: 5px;">
    <h2 class="blocked-warning-text" style="float: left; color: red;" title="Error loading page">PAGE BLOCKED</h2>
    <div style="float: right; text-align: right; margin: 8px 18px 0px 0;">
       This page was not loaded properly. Please check browser and plugins that may block CSS/javascript<br />
       files for this page. For <strong>Ad Blocker</strong> select "Disable on this page" or "Don't run on this page".
    </div>
    <div style="clear: both;"></div>
  </div>

<?php
  if ($subpage == 'exceptions') {
?>
<div id="ai-exceptions" style="padding: 8px 8px 8px 8px; border: 1px solid rgb(221, 221, 221); border-radius: 5px;">

  <table class="exceptions">
    <tbody>
    <?php

      $pages = get_pages ();
      $posts_pages = array ('pages' => $pages);

      $args = array( 'posts_per_page' => -1);
      $posts_pages ['posts'] = get_posts ($args);

      $table_header = '<tr><th class="id">ID</th><th class="page">Page / Post</th>';
      for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
        $table_header .= '<th class="block">' . $block . '</th>';
      }
      $table_header .= '</tr>';

      $header_written = false;
      foreach ($posts_pages as $type => $post_page) {
        foreach ($post_page as $page) {
          $post_meta = get_post_meta ($page->ID, '_adinserter_block_exceptions', true);
          if ($post_meta == '') continue;
          $selected_blocks = explode (",", $post_meta);

          if (!$header_written) {
            echo $table_header;
            $header_written = true;
          }
          echo '<tr><td class="id"><a href="', get_edit_post_link ($page->ID), '" target="_blank" title="Edit">', $page->ID, '</a></td>
               <td class="page"><a href="', get_permalink ($page->ID), '" target="_blank" title="View">', $page->post_title, '</a></td>';

          for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {

            $obj = $block_object [$block];
            if ($type == 'posts') {
              $enabled_on_text  = $obj->get_ad_enabled_on_which_posts ();
              $general_enabled  = $obj->get_display_settings_post();
            } else {
                $enabled_on_text = $obj->get_ad_enabled_on_which_pages ();
                $general_enabled = $obj->get_display_settings_page();
              }

            $individual_option_enabled  = $general_enabled && ($enabled_on_text == AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED || $enabled_on_text == AD_ENABLED_ONLY_ON_SELECTED);
            $individual_text_enabled    = $enabled_on_text == AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED;

            echo '<td class="block">', /*$individual_option_enabled && */in_array ($block, $selected_blocks) ? ($individual_text_enabled? '&cross;' : '&check;') : '', '</td>';
          }

          echo '<tr>';
        }
      }
    ?>
    </tbody>
  </table>

</div>
<?php
  } else {
?>
<div id="ai-tab-container" class="ai-form" style="padding: 8px 8px 1px 8px; border: 1px solid rgb(221, 221, 221); border-radius: 5px;">
  <div id="dummy-tabs" style="height: 29px; padding: .2em .2em 0;"></div>

  <div id="ai-scroll-tabs" class="scroll_tabs_theme_light" style="display: none;">
<?php

  for ($ad_number = $start; $ad_number <= $end; $ad_number ++){
    echo "    <span id='ai-scroll-tab-$ad_number' rel='$ad_number'>$ad_number</span>";
  }
?>
    <span rel='0'>0</span>
  </div>

  <ul id="ai-tabs" style="display: none;">
<?php

  $sidebar_widgets = wp_get_sidebars_widgets();
  $widget_options = get_option ('widget_ai_widget');

  $sidebars_with_widgets = array ();
  for ($ad_number = $start; $ad_number <= $end; $ad_number ++){
    $sidebars_with_widget [$ad_number]= array ();
  }
  foreach ($sidebar_widgets as $sidebar_index => $sidebar_widget) {
    if (is_array ($sidebar_widget) && isset ($GLOBALS ['wp_registered_sidebars'][$sidebar_index]['name'])) {
      $sidebar_name = $GLOBALS ['wp_registered_sidebars'][$sidebar_index]['name'];
      if ($sidebar_name != "") {
        foreach ($sidebar_widget as $widget) {
          if (preg_match ("/ai_widget-([\d]+)/", $widget, $widget_id)) {
            if (isset ($widget_id [1]) && is_numeric ($widget_id [1])) {
              $widget_option = $widget_options [$widget_id [1]];
              $widget_block = $widget_option ['block'];
              if ($widget_block >= $start && $widget_block <= $end && !in_array ($sidebar_name, $sidebars_with_widget [$widget_block])) {
                $sidebars_with_widget [$widget_block] []= $sidebar_name;
              }
            }
          }
        }
      }
    }
  }

  $manual_widget        = array ();
  $manual_shortcode     = array ();
  $manual_php_function  = array ();
  $manual               = array ();
  $sidebars             = array ();

  for ($ad_number = $start; $ad_number <= $end; $ad_number ++){
    $obj = $block_object [$ad_number];

    $manual_widget        [$ad_number] = $obj->get_enable_widget()    == AD_SETTINGS_CHECKED;
    $manual_shortcode     [$ad_number] = $obj->get_enable_manual()    == AD_SETTINGS_CHECKED;
    $manual_php_function  [$ad_number] = $obj->get_enable_php_call()  == AD_SETTINGS_CHECKED;
    $manual               [$ad_number] = ($manual_widget [$ad_number] && !empty ($sidebars_with_widget [$ad_number])) || $manual_shortcode [$ad_number] || $manual_php_function [$ad_number];

    $ad_name = $obj->get_ad_name();
    $automatic = $obj->get_display_type() != AD_SELECT_NONE;

    $ad_name_functions = false;
    if ($automatic) {
      $ad_name .= ": ".$obj->get_display_type();
      $ad_name_functions = true;
    }

    $style = "";

    if ($automatic && $manual [$ad_number]) $style = "font-weight: bold; color: #c4f;";
    elseif ($automatic) $style = "font-weight: bold; color: #e44;";
    elseif ($manual [$ad_number]) $style = "font-weight: bold; color: #66f;";

    if (!empty ($sidebars_with_widget [$ad_number])) $sidebars [$ad_number] = implode (", ", $sidebars_with_widget [$ad_number]); else $sidebars [$ad_number] = "";
    if ($manual_widget [$ad_number]) {
      if ($sidebars [$ad_number] != "") {
        $ad_name .= $ad_name_functions ? ", " : ": ";
        $ad_name .= "Widget used in: [".$sidebars [$ad_number]."]";
        $ad_name_functions = true;
      }
    } else {
        if (!empty ($sidebars_with_widget [$ad_number])) {
          $ad_name .= $ad_name_functions ? ", " : ": ";
          $ad_name .= "Widget DISABLED but used in: [".$sidebars [$ad_number]."]";
          $ad_name_functions = true;
        }
      }

    if ($manual_shortcode     [$ad_number]) {
      $ad_name .= $ad_name_functions ? ", " : ": ";
      $ad_name .= "Shortcode";
      $ad_name_functions = true;
    }
    if ($manual_php_function  [$ad_number]) {
      $ad_name .= $ad_name_functions ? ", " : ": ";
      $ad_name .= "PHP function";
      $ad_name_functions = true;
    }

    echo "
      <li id=\"ai-tab$ad_number\" class=\"ai-tab\" title=\"$ad_name\"><a href=\"#tab-$ad_number\"><span style=\"", $style, "\">$ad_number</span></a></li>";

  }

  $title_hf = "";
  if ($adH->get_enable_manual () && $adH->get_ad_data() != "") $title_hf .= ", Header code";
  if ($adF->get_enable_manual () && $adF->get_ad_data() != "") $title_hf .= ", Footer code";

  $enabled_h = $adH->get_enable_manual () && $adH->get_ad_data() != "";
  $enabled_f = $adF->get_enable_manual () && $adF->get_ad_data() != "";
  if ($enabled_h || $enabled_f) $class_hf = " on"; else $class_hf = "";
?>
      <li id="ai-tab0" class="ai-tab" title="<?php echo AD_INSERTER_NAME ?> Settings<?php echo $title_hf ?>"><a href="#tab-0" style="padding: 5px 14px 6px 12px;"><div class="ai-icon-gear<?php echo $class_hf ?>" /></div></a></li>
  </ul>

<?php
  for ($ad_number = $start; $ad_number <= $end; $ad_number ++){

    $default->number = $ad_number;
    $default->wp_options [AI_OPTION_NAME] = AD_NAME." ".$ad_number;

    $tab_visible = $ad_number == $active_tab || $generate_all;

    $obj = $block_object [$ad_number];

    $show_devices = $obj->get_detection_client_side () == AD_SETTINGS_CHECKED || $obj->get_detection_server_side () == AD_SETTINGS_CHECKED;
    if ($show_devices) $devices_style = "font-weight: bold; color: #66f;"; else $devices_style = "";

    $cat_list = $obj->get_ad_block_cat();
    $tag_list = $obj->get_ad_block_tag();
    $id_list  = $obj->get_id_list();
    $url_list = $obj->get_ad_url_list();
    $url_parameter_list = $obj->get_url_parameter_list();
    $domain_list = $obj->get_ad_domain_list();
    if (function_exists ('ai_lists')) $lists = ai_lists ($obj); else $lists = false;
    $show_lists = $cat_list != '' || $tag_list != '' || $id_list != '' || $url_list != '' || $url_parameter_list != '' || $domain_list != '' || $lists;
    if ($show_lists) $lists_style = "font-weight: bold; color: #66f;"; else $lists_style = "";

    $show_manual = $manual [$ad_number];
    if ($show_manual) $manual_style = "font-weight: bold; color: " . ($manual_widget [$ad_number] || empty ($sidebars_with_widget [$ad_number]) ? "#66f;" : "#e44;"); else $manual_style = "";

    $scheduling_active = $obj->get_scheduling() != AI_SCHEDULING_OFF;

    $show_misc = $scheduling_active || intval ($obj->get_maximum_insertions ()) != 0 || intval ($obj->get_call_filter()) != 0 || $obj->get_display_for_users() != AD_DISPLAY_ALL_USERS || $obj->get_enable_404 () == AD_SETTINGS_CHECKED || $obj->get_enable_feed () == AD_SETTINGS_CHECKED;
    if ($show_misc) $misc_style = "font-weight: bold; color: #66f;"; else $misc_style = "";

    $get_display_type = $obj->get_display_type();

    $paragraph_settings = $get_display_type == AD_SELECT_BEFORE_PARAGRAPH || $get_display_type == AD_SELECT_AFTER_PARAGRAPH;
    $content_settings   = $get_display_type == AD_SELECT_BEFORE_PARAGRAPH || $get_display_type == AD_SELECT_AFTER_PARAGRAPH || $get_display_type == AD_SELECT_BEFORE_CONTENT || $get_display_type == AD_SELECT_AFTER_CONTENT;

    $paragraph_counting =
      $obj->get_direction_type()            != $default->get_direction_type() ||
      $obj->get_paragraph_tags()            != $default->get_paragraph_tags() ||
      $obj->get_minimum_paragraph_words()   != $default->get_minimum_paragraph_words() ||
      $obj->get_maximum_paragraph_words()   != $default->get_maximum_paragraph_words() ||
      $obj->get_paragraph_text_type()       != $default->get_paragraph_text_type() ||
      $obj->get_paragraph_text()            != $default->get_paragraph_text() ||
      $obj->get_paragraph_number_minimum()  != $default->get_paragraph_number_minimum() ||
      $obj->get_count_inside_blockquote()   != $default->get_count_inside_blockquote();

    $paragraph_clearance =
      ($obj->get_avoid_text_above() != $default->get_avoid_text_above() && intval ($obj->get_avoid_paragraphs_above()) != 0) ||
      ($obj->get_avoid_text_below() != $default->get_avoid_text_below() && intval ($obj->get_avoid_paragraphs_below()) != 0);

?>
<div id="tab-<?php echo $ad_number; ?>" style="padding: 0;<?php echo $tab_visible ? "" : " display: none;" ?>">
  <div class="max-input" style="margin: 8px 0; height: 28px; margin-bottom: 2px;">
    <span id="name-label-container-<?php echo $ad_number; ?>" style="display: table-cell; padding: 0; font-weight: bold; cursor: pointer;">
      <input id="name-edit-<?php echo $ad_number; ?>" style="width: 100%; vertical-align: middle; font-size: 14px; border-radius: 4px; display: none;" type="text" name="<?php echo AI_OPTION_NAME, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_name(); ?>" value="<?php echo $obj->get_ad_name() ?>" size="56" maxlength="120" />
      <span id="name-label-<?php echo $ad_number; ?>" class="select" style="width: 100%; max-width: 440px; vertical-align: middle; font-size: 14px; display: inline-block; margin-top: 4px; margin-left: 7px; white-space: nowrap; overflow: hidden;"><?php echo $obj->get_ad_name() ?></span>
    </span>
<?php if (function_exists ('ai_settings_top_buttons')) ai_settings_top_buttons ($ad_number); ?>
<?php if (AI_SYNTAX_HIGHLIGHTING) : ?>
    <span style="display: table-cell; vertical-align: middle; width: 110px; padding: 2px 0 0 10px;">
      <input type="checkbox" style="border-radius: 5px;" value="0" id="simple-editor-<?php echo $ad_number; ?>" />
      <label for="simple-editor-<?php echo $ad_number; ?>" title="Toggle Syntax Highlighting / Simple editor for mobile devices">Simple editor</label>
    </span>
<?php endif; ?>
    <span style="display: table-cell; vertical-align: middle; width: 110px; padding: 2px 0 0 10px;">
      <input type="hidden"   style="border-radius: 5px;" name="<?php echo AI_OPTION_PROCESS_PHP, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
      <input type="checkbox" style="border-radius: 5px;" name="<?php echo AI_OPTION_PROCESS_PHP, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_process_php (); ?>" id="process-php-<?php echo $ad_number; ?>" <?php if ($obj->get_process_php () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
      <label for="process-php-<?php echo $ad_number; ?>" title="Process PHP code in block">Process PHP</label>
    </span>
  </div>

<?php if (function_exists ('ai_settings_container')) ai_settings_container ($ad_number, $obj); ?>

  <div style="margin: 8px 0;">
    <textarea id="block-<?php echo $ad_number; ?>" class="simple-editor" style="background-color:#F9F9F9; font-family: Courier, 'Courier New', monospace; font-weight: bold;" name="<?php echo AI_OPTION_CODE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"><?php echo esc_textarea ($obj->get_ad_data()); ?></textarea>
  </div>

  <div style="padding: 0; min-height: 28px;">
    <div style="float: left;">
      <button id="misc-button-<?php echo $ad_number; ?>" type="button" style="display: none; margin-right: 4px;" title="Limit / Filter / Delay insertions, general tag, check for users, insert on error 404 page or in feeds"><span style="<?php echo $misc_style; ?>">Misc</span></button>
      <button id="device-detection-button-<?php echo $ad_number; ?>" type="button" style="display: none; margin-right: 4px;" title="Client/Server-side Device Detection (Desktop, Tablet, Phone,...)"><span style="<?php echo $devices_style; ?>">Devices</span></button>
      <button id="lists-button-<?php echo $ad_number; ?>" type="button" style="display: none; margin-right: 4px;" title="White/Black-list Category, Tag, Url, Referer (domain) or Country"><span style="<?php echo $lists_style; ?>">Lists</span></button>
      <button id="manual-button-<?php echo $ad_number; ?>" type="button" style="display: none; margin-right: 4px;" title="Widget, Shortcode and PHP function call"><span style="<?php echo $manual_style; ?>">Manual</span></button>
      <button id="preview-button-<?php echo $ad_number; ?>" type="button" style="display: none; margin-right: 4px;" title="Preview saved code above" nonce="<?php echo wp_create_nonce ("adinserter_data"); ?>" site-url="<?php echo wp_make_link_relative (get_site_url()); ?>">Preview</button>
    </div>
    <div style="float: right;">
<?php if (function_exists ('ai_settings_bottom_buttons')) ai_settings_bottom_buttons ($start, $end); else { ?>
      <input style="display: none; border-radius: 5px; font-weight: bold;" name="<?php echo AI_FORM_SAVE; ?>" value="Save All Settings" type="submit" />
<?php } ?>
    </div>
    <div style="clear: both;"></div>
  </div>

  <div style="padding:8px 8px 6px 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;">
    <div style="float: left;">
      Automatic Insertion:
      <select style="border-radius: 5px; margin-bottom: 3px;" id="display-type-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_DISPLAY_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_display_type(); ?>" style="width:200px;">
         <option value="<?php echo AD_SELECT_NONE; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_NONE) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_NONE; ?></option>
         <option value="<?php echo AD_SELECT_BEFORE_POST; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_BEFORE_POST) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_BEFORE_POST; ?></option>
         <option value="<?php echo AD_SELECT_BEFORE_CONTENT; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_BEFORE_CONTENT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_BEFORE_CONTENT; ?></option>
         <option value="<?php echo AD_SELECT_BEFORE_PARAGRAPH; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_BEFORE_PARAGRAPH) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_BEFORE_PARAGRAPH; ?></option>
         <option value="<?php echo AD_SELECT_AFTER_PARAGRAPH; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_AFTER_PARAGRAPH) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_AFTER_PARAGRAPH; ?></option>
         <option value="<?php echo AD_SELECT_AFTER_CONTENT; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_AFTER_CONTENT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_AFTER_CONTENT; ?></option>
         <option value="<?php echo AD_SELECT_AFTER_POST; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_AFTER_POST) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_AFTER_POST; ?></option>
         <option value="<?php echo AD_SELECT_BEFORE_EXCERPT; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_BEFORE_EXCERPT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_BEFORE_EXCERPT; ?></option>
         <option value="<?php echo AD_SELECT_AFTER_EXCERPT; ?>" <?php echo ($obj->get_display_type()==AD_SELECT_AFTER_EXCERPT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_SELECT_AFTER_EXCERPT; ?></option>
      </select>
    </div>

    <div style="float: right;">
      Block Alignment and Style:&nbsp;&nbsp;&nbsp;
      <select style="border-radius: 5px; width:120px;" id="block-alignment-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_ALIGNMENT_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_alignment_type(); ?>">
         <option value="<?php echo AD_ALIGNMENT_NO_WRAPPING; ?>" <?php echo ($obj->get_alignment_type()==AD_ALIGNMENT_NO_WRAPPING) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ALIGNMENT_NO_WRAPPING; ?></option>
         <option value="<?php echo AD_ALIGNMENT_CUSTOM_CSS; ?>" <?php echo ($obj->get_alignment_type()==AD_ALIGNMENT_CUSTOM_CSS) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ALIGNMENT_CUSTOM_CSS; ?></option>
         <option value="<?php echo AD_ALIGNMENT_NONE; ?>" <?php echo ($obj->get_alignment_type()==AD_ALIGNMENT_NONE) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ALIGNMENT_NONE; ?></option>
         <option value="<?php echo AD_ALIGNMENT_LEFT; ?>" <?php echo ($obj->get_alignment_type()==AD_ALIGNMENT_LEFT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ALIGNMENT_LEFT; ?></option>
         <option value="<?php echo AD_ALIGNMENT_RIGHT; ?>" <?php echo ($obj->get_alignment_type()==AD_ALIGNMENT_RIGHT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ALIGNMENT_RIGHT; ?></option>
         <option value="<?php echo AD_ALIGNMENT_CENTER; ?>" <?php echo ($obj->get_alignment_type()==AD_ALIGNMENT_CENTER) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ALIGNMENT_CENTER; ?></option>
         <option value="<?php echo AD_ALIGNMENT_FLOAT_LEFT; ?>" <?php echo ($obj->get_alignment_type()==AD_ALIGNMENT_FLOAT_LEFT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ALIGNMENT_FLOAT_LEFT; ?></option>
         <option value="<?php echo AD_ALIGNMENT_FLOAT_RIGHT; ?>" <?php echo ($obj->get_alignment_type()==AD_ALIGNMENT_FLOAT_RIGHT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ALIGNMENT_FLOAT_RIGHT; ?></option>
      </select>
      &nbsp;
      <button id="show-css-button-<?php echo $ad_number; ?>" type="button" style="min-width: 85px; margin-right: 0px;">Show CSS</button>
    </div>
    <div style="clear: both;"></div>

    <div id="css-code-<?php echo $ad_number; ?>" style="height: 26px; margin: 4px 0 2px; display: none;">
      <div class="max-input">
        <span id="css-label-<?php echo $ad_number; ?>" style="display: table-cell; width: 34px; padding: 0; height: 26px; vertical-align: middle; margin: 4px 0 0 0;">CSS &nbsp;</span>
        <input id="custom-css-<?php echo $ad_number; ?>" style="width: 100%; border-radius: 4px; display: none; font-family: Courier, 'Courier New', monospace; font-weight: bold;" type="text" name="<?php echo AI_OPTION_CUSTOM_CSS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_custom_css(); ?>" value="<?php echo $obj->get_custom_css(); ?>" maxlength="160" title="Custom CSS code for wrapping div" />
        <span style="display: table-cell; vertical-align: middle; font-family: Courier, 'Courier New', monospace; font-size: 12px; font-weight: bold;">
          <span id="css-no-wrapping-<?php echo $ad_number; ?>" style="height: 18px; padding-left: 7px; display: none;"></span>
          <span id="css-none-<?php echo $ad_number; ?>" style="height: 18px; padding-left: 7px; display: none;" title="CSS code for wrapping div"><?php echo $obj->alignmet_style (AD_ALIGNMENT_NONE); ?></span>
          <span id="css-left-<?php echo $ad_number; ?>" style="height: 18px; padding-left: 7px; display: none;" title="CSS code for wrapping div"><?php echo $obj->alignmet_style (AD_ALIGNMENT_LEFT); ?></span>
          <span id="css-right-<?php echo $ad_number; ?>" style="height: 18px; padding-left: 7px; display: none;" title="CSS code for wrapping div"><?php echo $obj->alignmet_style (AD_ALIGNMENT_RIGHT); ?></span>
          <span id="css-center-<?php echo $ad_number; ?>" style="height: 18px; padding-left: 7px; display: none;" title="CSS code for wrapping div"><?php echo $obj->alignmet_style (AD_ALIGNMENT_CENTER); ?></span>
          <span id="css-float-left-<?php echo $ad_number; ?>" style="height: 18px; padding-left: 7px; display: none;" title="CSS code for wrapping div"><?php echo $obj->alignmet_style (AD_ALIGNMENT_FLOAT_LEFT); ?></span>
          <span id="css-float-right-<?php echo $ad_number; ?>" style="height: 18px; padding-right: 7px; display: none;" title="CSS code for wrapping div"><?php echo $obj->alignmet_style (AD_ALIGNMENT_FLOAT_RIGHT); ?></span>
        </span>
        <span style="display:table-cell; width: 46px;" ><button id="edit-css-button-<?php echo $ad_number; ?>" type="button" style="display: table-cell; padding: 0; margin: 0 0 0 8px;">Edit</button></span>
      </div>
    </div>
  </div>

  <div class="responsive-table" style="padding: 7px 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;">
    <table>
      <tr>
        <td style="width: 70%">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DISPLAY_ON_POSTS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_DISPLAY_ON_POSTS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_display_settings_post(); ?>" id="display-posts-<?php echo $ad_number; ?>" title="Enable or disable insertion on posts" <?php if ($obj->get_display_settings_post()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />

          <select style="border-radius: 5px; margin: 0 0 3px 10px;" title="Default insertion for posts - exceptions can be configured on individual post editor pages" id="enabled-on-which-posts-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_ENABLED_ON_WHICH_POSTS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_enabled_on_which_posts(); ?>" style="width:160px">
             <option value="<?php echo AD_ENABLED_ON_ALL; ?>" <?php echo ($obj->get_ad_enabled_on_which_posts()==AD_ENABLED_ON_ALL) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ENABLED_ON_ALL; ?></option>
             <option value="<?php echo AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED; ?>" <?php echo ($obj->get_ad_enabled_on_which_posts()==AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED; ?></option>
             <option value="<?php echo AD_ENABLED_ONLY_ON_SELECTED; ?>" <?php echo ($obj->get_ad_enabled_on_which_posts()==AD_ENABLED_ONLY_ON_SELECTED) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ENABLED_ONLY_ON_SELECTED; ?></option>
          </select>
          &nbsp;
          <label for="display-posts-<?php echo $ad_number; ?>">Posts</label>
        </td>
        <td style="padding-left: 8px;">
        </td>
        <td style="padding-left: 8px;">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DISPLAY_ON_HOMEPAGE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input id= "display-homepage-<?php echo $ad_number; ?>" style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_DISPLAY_ON_HOMEPAGE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_display_settings_home(); ?>" <?php if ($obj->get_display_settings_home()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="display-homepage-<?php echo $ad_number; ?>" title="Enable or disable insertion on homepage: latest posts (including sub-pages), static page or theme homepage">Homepage</label>
        </td>
        <td style="padding-left: 8px;">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DISPLAY_ON_CATEGORY_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input id= "display-category-<?php echo $ad_number; ?>" style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_DISPLAY_ON_CATEGORY_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_display_settings_category(); ?>" <?php if ($obj->get_display_settings_category()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="display-category-<?php echo $ad_number; ?>" title="Enable or disable insertion on category blog pages (including sub-pages)">Category pages</label>
        </td>
      </tr>

      <tr>
        <td style="width: 70%">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DISPLAY_ON_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_DISPLAY_ON_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_display_settings_page(); ?>" id="display-pages-<?php echo $ad_number; ?>" title="Enable or disable insertion on static pages" <?php if ($obj->get_display_settings_page()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />

          <select style="border-radius: 5px; margin: 0 0 3px 10px;" title="Default insertion for pages - exceptions can be configured on individual page editor pages" id="enabled-on-which-pages-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_ENABLED_ON_WHICH_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_enabled_on_which_pages(); ?>" style="width:160px">
             <option value="<?php echo AD_ENABLED_ON_ALL; ?>" <?php echo ($obj->get_ad_enabled_on_which_pages()==AD_ENABLED_ON_ALL) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ENABLED_ON_ALL; ?></option>
             <option value="<?php echo AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED; ?>" <?php echo ($obj->get_ad_enabled_on_which_pages()==AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED; ?></option>
             <option value="<?php echo AD_ENABLED_ONLY_ON_SELECTED; ?>" <?php echo ($obj->get_ad_enabled_on_which_pages()==AD_ENABLED_ONLY_ON_SELECTED) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ENABLED_ONLY_ON_SELECTED; ?></option>
          </select>
          &nbsp;
          <label for="display-pages-<?php echo $ad_number; ?>">Static pages</label>
        </td>
        <td style="padding-left: 8px;">
        </td>
        <td style="padding-left: 8px;">
          <input style="border-radius: 5px;;" type="hidden" name="<?php echo AI_OPTION_DISPLAY_ON_SEARCH_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input id= "display-search-<?php echo $ad_number; ?>" style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_DISPLAY_ON_SEARCH_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_display_settings_search(); ?>" <?php if ($obj->get_display_settings_search()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="display-search-<?php echo $ad_number; ?>" title="Enable or disable insertion on search blog pages">Search pages</label>
        </td>
        <td style="padding-left: 8px;">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input id= "display-archive-<?php echo $ad_number; ?>" style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_display_settings_archive(); ?>" <?php if ($obj->get_display_settings_archive()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="display-archive-<?php echo $ad_number; ?>" title="Enable or disable insertion on tag or archive blog pages">Tag / Archive pages</label>
        </td>
      </tr>
    </table>
  </div>

  <div id="paragraph-settings-<?php echo $ad_number; ?>" style="padding:4px 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;<?php echo $paragraph_settings ? "" : " display: none;" ?>">
    <div style="margin: 4px 0; height: 26px;">
      <div style="float: left; margin-top: 1px;">
        Paragraph number
        <input style="border-radius: 5px;" type="text"
          name="<?php echo AI_OPTION_PARAGRAPH_NUMBER, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
          default="<?php echo $default->get_paragraph_number(); ?>"
          value="<?php echo $obj->get_paragraph_number(); ?>"
          title="0 means random paragraph, value between 0 and 1 means relative position on page: 0.2 means paragraph at 20% of page height, 0.5 means paragraph halfway down the page, 0.9 means paragraph at 90% of page paragraphs, etc."
          size="2"
          maxlength="4" />
      </div>

      <div style="float: right;">
        <button id="counting-button-<?php echo $ad_number; ?>" type="button" style="min-width: 85px; margin-right: 8px; display: none;">Counting</button>
        <button id="clearance-button-<?php echo $ad_number; ?>" type="button" style="min-width: 85px; margin-right: 0px; display: none;">Clearance</button>
      </div>
    </div>
  </div>

  <div id="paragraph-counting-<?php echo $ad_number; ?>" style="padding:4px 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;<?php echo $paragraph_counting ? "" : " display: none;" ?>">
    <div class="max-input" style="margin: 4px 0 8px 0;">
      <span style="display: table-cell; width: 1px; white-space: nowrap;">
        Count&nbsp;
        <select style="border-radius: 5px;" name="<?php echo AI_OPTION_DIRECTION_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_direction_type(); ?>">
          <option value="<?php echo AD_DIRECTION_FROM_TOP; ?>" <?php echo ($obj->get_direction_type()==AD_DIRECTION_FROM_TOP) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DIRECTION_FROM_TOP; ?></option>
          <option value="<?php echo AD_DIRECTION_FROM_BOTTOM; ?>" <?php echo ($obj->get_direction_type()==AD_DIRECTION_FROM_BOTTOM) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DIRECTION_FROM_BOTTOM; ?></option>
        </select>
        paragraphs with tags&nbsp;
      </span>
      <span style="display: table-cell;">
        <input
          style="border-radius: 5px; width: 100%;"
          title="Comma separated HTML tags, usually only 'p' tags are used"
          type="text" name="<?php echo AI_OPTION_PARAGRAPH_TAGS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
          default="<?php echo $default->get_paragraph_tags(); ?>"
          value="<?php echo $obj->get_paragraph_tags(); ?>"
          size="12"
          maxlength="50"/>
      </span>
      <span style="display: table-cell; width: 1px; white-space: nowrap;">
      &nbsp;
      that have between
      <input
        style="border-radius: 5px;"
        type="text"
        name="<?php echo AI_OPTION_MIN_PARAGRAPH_WORDS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
        default="<?php echo $default->get_minimum_paragraph_words(); ?>"
        value="<?php echo $obj->get_minimum_paragraph_words(); ?>"
        size="4"
        maxlength="5" />
      and
      <input
        style="border-radius: 5px;"
        type="text"
        name="<?php echo AI_OPTION_MAX_PARAGRAPH_WORDS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
        default="<?php echo $default->get_maximum_paragraph_words(); ?>"
        value="<?php echo $obj->get_maximum_paragraph_words(); ?>"
        title="Maximum number of paragraph words, leave empty for no limit"
        size="4"
        maxlength="5" />
      words
      </span>
    </div>

    <div class="max-input" style="margin: 8px 0 8px 0;">
      <span style="display: table-cell; width: 1px; white-space: nowrap;">
      and
        <select style="border-radius: 5px; margin-bottom: 3px;" name="<?php echo AI_OPTION_PARAGRAPH_TEXT_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_paragraph_text_type(); ?>">
          <option value="<?php echo AD_CONTAIN; ?>" <?php echo ($obj->get_paragraph_text_type() == AD_CONTAIN) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_CONTAIN; ?></option>
          <option value="<?php echo AD_DO_NOT_CONTAIN; ?>" <?php echo ($obj->get_paragraph_text_type() == AD_DO_NOT_CONTAIN) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DO_NOT_CONTAIN; ?></option>
        </select>
      </span>
      <span class="small-input-tags" style="display: table-cell;">
      <input
        style="border-radius: 5px; width: 100%;"
        title="Comma separated text"
        type="text"
        name="<?php echo AI_OPTION_PARAGRAPH_TEXT, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
        default="<?php echo $default->get_paragraph_text(); ?>"
        value="<?php echo $obj->get_paragraph_text(); ?>"
        maxlength="200" />
      </span>
      <span style="display: table-cell; width: 1px; white-space: nowrap; padding-left: 20px;">
      <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_COUNT_INSIDE_BLOCKQUOTE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
      <input id= "ignore_blockquote-<?php echo $ad_number; ?>" style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_COUNT_INSIDE_BLOCKQUOTE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_count_inside_blockquote(); ?>" <?php if ($obj->get_count_inside_blockquote()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
      <label for="ignore_blockquote-<?php echo $ad_number; ?>" title="Count also paragraphs inside &lt;blockquote&gt;...&lt;/blockquote&gt; elements">Count also inside <pre style="margin: 0; display: inline; color: blue; font-size: 11px;">&lt;blockquote&gt;</pre> elements</label>
      </span>
    </div>

    <div style="margin: 8px 0 4px 0;">
        Minimum number of paragraphs
        <input
        style="border-radius: 5px;"
        type="text"
        name="<?php echo AI_OPTION_MIN_PARAGRAPHS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
        default="<?php echo $default->get_paragraph_number_minimum(); ?>"
        value="<?php echo $obj->get_paragraph_number_minimum() ?>"
        size="2"
        maxlength="3" />
      <div style="float: right;">
      </div>
      <div style="clear: both;"></div>
    </div>
  </div>

  <div id="paragraph-clearance-<?php echo $ad_number; ?>" style="padding:4px 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;<?php echo $paragraph_clearance ? "" : " display: none;" ?>">
    <div class="max-input" style="margin: 4px 0 8px 0;">
      <span style="display: table-cell; width: 1px; white-space: nowrap;">
        In
        <input
        style="border-radius: 5px;"
        type="text"
        name="<?php echo AI_OPTION_AVOID_PARAGRAPHS_ABOVE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
        default="<?php echo $default->get_avoid_paragraphs_above(); ?>"
        value="<?php echo $obj->get_avoid_paragraphs_above(); ?>"
        title="Number of paragraphs above to check, leave empty to disable checking"
        size="2"
        maxlength="3" />
        paragraphs above avoid&nbsp;
      </span>
      <span style="display: table-cell;">
        <input
          style="border-radius: 5px; width: 100%;"
          title="Comma separated text"
          type="text"
          name="<?php echo AI_OPTION_AVOID_TEXT_ABOVE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
          default="<?php echo $default->get_avoid_text_above(); ?>"
          value="<?php echo $obj->get_avoid_text_above(); ?>"
          maxlength="100" />
      </span>
    </div>

    <div class="max-input" style="margin: 4px 0 8px 0;">
      <span style="display: table-cell; width: 1px; white-space: nowrap;">
        In
        <input
        style="border-radius: 5px;"
        type="text"
        name="<?php echo AI_OPTION_AVOID_PARAGRAPHS_BELOW, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
        default="<?php echo $default->get_avoid_paragraphs_below(); ?>"
        value="<?php echo $obj->get_avoid_paragraphs_below(); ?>"
        title="Number of paragraphs below to check, leave empty to disable checking"
        size="2"
        maxlength="3" />
        paragraphs below avoid&nbsp;
      </span>
      <span style="display: table-cell;">
        <input
          style="border-radius: 5px; width: 100%;"
          title="Comma separated text"
          type="text"
          name="<?php echo AI_OPTION_AVOID_TEXT_BELOW, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
          default="<?php echo $default->get_avoid_text_below(); ?>"
          value="<?php echo $obj->get_avoid_text_below(); ?>"
          maxlength="100" />
      </span>
    </div>

    <div style="margin: 8px 0 4px 0;">
      If text is found
      <select  id="avoid-action-<?php echo $ad_number; ?>" style="border-radius: 5px; margin-bottom: 3px;" name="<?php echo AI_OPTION_AVOID_ACTION, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_avoid_action(); ?>">
        <option value="<?php echo AD_DO_NOT_INSERT; ?>" <?php echo ($obj->get_avoid_action() == AD_DO_NOT_INSERT) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DO_NOT_INSERT; ?></option>
        <option value="<?php echo AD_TRY_TO_SHIFT_POSITION; ?>" <?php echo ($obj->get_avoid_action() == AD_TRY_TO_SHIFT_POSITION) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_TRY_TO_SHIFT_POSITION; ?></option>
      </select>
      <span id="check-up-to-<?php echo $ad_number; ?>">
        &mdash; check up to
        <input
        style="border-radius: 5px;"
        type="text"
        name="<?php echo AI_OPTION_AVOID_TRY_LIMIT, WP_FORM_FIELD_POSTFIX, $ad_number; ?>"
        default="<?php echo $default->get_avoid_try_limit(); ?>"
        value="<?php echo $obj->get_avoid_try_limit(); ?>"
        size="2"
        maxlength="3" />
        paragraphs
        <select style="border-radius: 5px; margin-bottom: 3px;" name="<?php echo AI_OPTION_AVOID_DIRECTION, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_avoid_direction(); ?>">
          <option value="<?php echo AD_ABOVE; ?>" <?php echo ($obj->get_avoid_direction() == AD_ABOVE) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ABOVE; ?></option>
          <option value="<?php echo AD_BELOW; ?>" <?php echo ($obj->get_avoid_direction() == AD_BELOW) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_BELOW; ?></option>
          <option value="<?php echo AD_ABOVE_AND_THEN_BELOW; ?>" <?php echo ($obj->get_avoid_direction() == AD_ABOVE_AND_THEN_BELOW) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_ABOVE_AND_THEN_BELOW; ?></option>
          <option value="<?php echo AD_BELOW_AND_THEN_ABOVE; ?>" <?php echo ($obj->get_avoid_direction() == AD_BELOW_AND_THEN_ABOVE) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_BELOW_AND_THEN_ABOVE; ?></option>
        </select>
      </span>
    </div>
  </div>

  <div id="content-settings-<?php echo $ad_number; ?>" style="padding: 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;<?php echo $content_settings ? "" : " display: none;" ?>">
    Post/Static page must have between
    <input style="border-radius: 5px;" type="text" name="<?php echo AI_OPTION_MIN_WORDS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_minimum_words(); ?>" value="<?php echo $obj->get_minimum_words() ?>" size="4" maxlength="6" />
    and
    <input style="border-radius: 5px;" type="text" name="<?php echo AI_OPTION_MAX_WORDS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" title="Maximum number of post/static page words, leave empty for no limit" default="<?php echo $default->get_maximum_words(); ?>" value="<?php echo $obj->get_maximum_words() ?>" size="4" maxlength="6" />
    words
  </div>

  <div class="responsive-table" id="list-settings-<?php echo $ad_number; ?>" style="margin: 8px 0; border: 1px solid #ddd; border-radius: 5px; <?php if (!$show_lists) echo 'display: none;'; ?>">
    <table style="padding: 8px 8px 10px 8px;">
      <tbody>
        <tr>
          <td style="padding-right: 7px;">
            Categories
          </td>
          <td style="padding-right: 7px; width: 70%;">
            <input style="border-radius: 5px; width: 100%;" title="Comma separated category slugs" type="text" name="<?php echo AI_OPTION_CATEGORY_LIST, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_block_cat(); ?>" value="<?php echo $cat_list; ?>" size="54" maxlength="500" />
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_CATEGORY_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="category-blacklist-<?php echo $ad_number; ?>" default="<?php echo $default->get_ad_block_cat_type() == AD_BLACK_LIST; ?>" value="<?php echo AD_BLACK_LIST; ?>" <?php if ($obj->get_ad_block_cat_type() == AD_BLACK_LIST) echo 'checked '; ?> />
            <label for="category-blacklist-<?php echo $ad_number; ?>" title="Blacklist categories"><?php echo AD_BLACK_LIST; ?></label>
          </td>
          <td>
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_CATEGORY_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="category-whitelist-<?php echo $ad_number; ?>" default="<?php echo $default->get_ad_block_cat_type() == AD_WHITE_LIST; ?>" value="<?php echo AD_WHITE_LIST; ?>" <?php if ($obj->get_ad_block_cat_type() == AD_WHITE_LIST) echo 'checked '; ?> />
            <label for="category-whitelist-<?php echo $ad_number; ?>" title="Whitelist categories"><?php echo AD_WHITE_LIST; ?></label>
          </td>
        </tr>
        <tr>
          <td style="padding-right: 7px;">
            Tags
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px; width: 100%;" title="Comma separated tags" type="text" name="<?php echo AI_OPTION_TAG_LIST, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_block_tag(); ?>" value="<?php echo $tag_list; ?>" size="54" maxlength="500"/>
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_TAG_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="tag-blacklist-<?php echo $ad_number; ?>" default="<?php echo $default->get_ad_block_tag_type() == AD_BLACK_LIST; ?>" value="<?php echo AD_BLACK_LIST; ?>" <?php if ($obj->get_ad_block_tag_type() == AD_BLACK_LIST) echo 'checked '; ?> />
            <label for="tag-blacklist-<?php echo $ad_number; ?>" title="Blacklist tags"><?php echo AD_BLACK_LIST; ?></label>
          </td>
          <td>
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_TAG_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="tag-whitelist-<?php echo $ad_number; ?>" default="<?php echo $default->get_ad_block_tag_type() == AD_WHITE_LIST; ?>" value="<?php echo AD_WHITE_LIST; ?>" <?php if ($obj->get_ad_block_tag_type() == AD_WHITE_LIST) echo 'checked '; ?> />
            <label for="tag-whitelist-<?php echo $ad_number; ?>" title="Whitelist tags"><?php echo AD_WHITE_LIST; ?></label>
          </td>
        </tr>
        <tr>
          <td style="padding-right: 7px;">
            Post IDs
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px; width: 100%;" title="Comma separated post/page IDs" type="text" name="<?php echo AI_OPTION_ID_LIST, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_id_list(); ?>" value="<?php echo $id_list; ?>" size="54" maxlength="500"/>
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_ID_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="id-blacklist-<?php echo $ad_number; ?>" default="<?php echo $default->get_id_list_type() == AD_BLACK_LIST; ?>" value="<?php echo AD_BLACK_LIST; ?>" <?php if ($obj->get_id_list_type() == AD_BLACK_LIST) echo 'checked '; ?> />
            <label for="id-blacklist-<?php echo $ad_number; ?>" title="Blacklist IDs"><?php echo AD_BLACK_LIST; ?></label>
          </td>
          <td>
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_ID_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="id-whitelist-<?php echo $ad_number; ?>" default="<?php echo $default->get_id_list_type() == AD_WHITE_LIST; ?>" value="<?php echo AD_WHITE_LIST; ?>" <?php if ($obj->get_id_list_type() == AD_WHITE_LIST) echo 'checked '; ?> />
            <label for="id-whitelist-<?php echo $ad_number; ?>" title="Whitelist IDs"><?php echo AD_WHITE_LIST; ?></label>
          </td>
        </tr>
        <tr>
          <td style="padding-right: 7px;">
            Urls
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px; width: 100%;" title="SPACE separated urls (page addresses) starting with / after domain name (e.g. /permalink-url, use only when you need to taget a specific url not accessible by other means). You can also use partial urls with * (/url-start*. *url-pattern*, *url-end)" type="text" name="<?php echo AI_OPTION_URL_LIST, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_url_list(); ?>" value="<?php echo $url_list; ?>" size="54" maxlength="500"/>
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_URL_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="url-blacklist-<?php echo $ad_number; ?>" default="<?php echo $default->get_ad_url_list_type() == AD_BLACK_LIST; ?>" value="<?php echo AD_BLACK_LIST; ?>" <?php if ($obj->get_ad_url_list_type() == AD_BLACK_LIST) echo 'checked '; ?> />
            <label for="url-blacklist-<?php echo $ad_number; ?>" title="Blacklist urls"><?php echo AD_BLACK_LIST; ?></label>
          </td>
          <td>
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_URL_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="url-whitelist-<?php echo $ad_number; ?>" default="<?php echo $default->get_ad_url_list_type() == AD_WHITE_LIST; ?>" value="<?php echo AD_WHITE_LIST; ?>" <?php if ($obj->get_ad_url_list_type() == AD_WHITE_LIST) echo 'checked '; ?> />
            <label for="url-whitelist-<?php echo $ad_number; ?>" title="Whitelist urls"><?php echo AD_WHITE_LIST; ?></label>
          </td>
        </tr>
        <tr>
          <td style="padding-right: 7px;">
            Url parameters
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px; width: 100%;" title="Comma separated url query parameters with optional values (use either 'prameter' or 'prameter=value')" type="text" name="<?php echo AI_OPTION_URL_PARAMETER_LIST, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_url_parameter_list(); ?>" value="<?php echo $url_parameter_list; ?>" size="54" maxlength="500"/>
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_URL_PARAMETER_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="url-parameter-blacklist-<?php echo $ad_number; ?>" default="<?php echo $default->get_url_parameter_list_type() == AD_BLACK_LIST; ?>" value="<?php echo AD_BLACK_LIST; ?>" <?php if ($obj->get_url_parameter_list_type() == AD_BLACK_LIST) echo 'checked '; ?> />
            <label for="url-parameter-blacklist-<?php echo $ad_number; ?>" title="Blacklist url parameters"><?php echo AD_BLACK_LIST; ?></label>
          </td>
          <td>
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_URL_PARAMETER_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="url-parameter-whitelist-<?php echo $ad_number; ?>" default="<?php echo $default->get_url_parameter_list_type() == AD_WHITE_LIST; ?>" value="<?php echo AD_WHITE_LIST; ?>" <?php if ($obj->get_url_parameter_list_type() == AD_WHITE_LIST) echo 'checked '; ?> />
            <label for="url-parameter-whitelist-<?php echo $ad_number; ?>" title="Whitelist url parameters"><?php echo AD_WHITE_LIST; ?></label>
          </td>
        </tr>
        <tr>
          <td style="padding-right: 7px;">
            Referers
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px; width: 100%;" title="Comma separated domains, use # for no referer" type="text" name="<?php echo AI_OPTION_DOMAIN_LIST, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_domain_list(); ?>" value="<?php echo $domain_list; ?>" size="54" maxlength="500"/>
          </td>
          <td style="padding-right: 7px;">
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_DOMAIN_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="referer-blacklist-<?php echo $ad_number; ?>" default="<?php echo $default->get_ad_domain_list_type() == AD_BLACK_LIST; ?>" value="<?php echo AD_BLACK_LIST; ?>" <?php if ($obj->get_ad_domain_list_type() == AD_BLACK_LIST) echo 'checked '; ?> />
            <label for="referer-blacklist-<?php echo $ad_number; ?>" title="Blacklist referers"><?php echo AD_BLACK_LIST; ?></label>
          </td>
          <td>
            <input style="border-radius: 5px;" type="radio" name="<?php echo AI_OPTION_DOMAIN_LIST_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="referer-whitelist-<?php echo $ad_number; ?>" default="<?php echo $default->get_ad_domain_list_type() == AD_WHITE_LIST; ?>" value="<?php echo AD_WHITE_LIST; ?>" <?php if ($obj->get_ad_domain_list_type() == AD_WHITE_LIST) echo 'checked '; ?> />
            <label for="referer-whitelist-<?php echo $ad_number; ?>" title="Whitelist referers"><?php echo AD_WHITE_LIST; ?></label>
          </td>
        </tr>
<?php if (function_exists ('ai_list_rows')) ai_list_rows ($ad_number, $default, $obj); ?>
      </tbody>
    </table>
  </div>

  <div id="manual-settings-<?php echo $ad_number; ?>" class="small-button" style="padding:7px; margin: 8px 0; text-align: left; border: 1px solid #ddd; border-radius: 5px; <?php if (!$show_manual) echo 'display: none;'; ?>">
    <table>
      <tr>
        <td style="padding: 4px 10px 4px 0;">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_ENABLE_WIDGET, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input style="border-radius: 5px;" id="enable-widget-<?php echo $ad_number; ?>" type="checkbox" name="<?php echo AI_OPTION_ENABLE_WIDGET, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_enable_widget(); ?>" <?php if ($obj->get_enable_widget () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-widget-<?php echo $ad_number; ?>" title="Enable or disable widget for this code block">
            Widget
          </label>
        </td>
        <td>
          <pre style= "margin: 0; display: inline; color: blue;" title="Sidebars (or widget positions) where this widged is used"><?php echo $sidebars [$ad_number], !empty ($sidebars [$ad_number]) ? " &nbsp;" : ""; ?></pre>
          <button id="widgets-button-<?php echo $ad_number; ?>" type="button" style="display: none; width: 15px; height: 15px;" title="Manage Widgets"></button>
        </td>
      </tr>
      <tr>
        <td style="padding: 4px 10px 4px 0;">
          <input style="border-radius: 5px;" type="hidden"   name="<?php echo AI_OPTION_ENABLE_MANUAL, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input style="border-radius: 5px;" type="checkbox" id="enable-shortcode-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_ENABLE_MANUAL, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_enable_manual(); ?>" <?php if ($obj->get_enable_manual () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-shortcode-<?php echo $ad_number; ?>" title="Enable or disable shortcode for manual insertion of this code block in posts and pages">
            Shortcode
          </label>
        </td>
        <td>
          <pre class="select" style="margin: 0; display: inline; color: blue; font-size: 11px;">[adinserter block="<?php echo $ad_number; ?>"]</pre>
          or <pre class="select" style="margin: 0; display: inline; color: blue;">[adinserter name="<?php echo $obj->get_ad_name(); ?>"]</pre>
        </td>
      </tr>
      <tr>
        <td style="padding: 4px 10px 4px 0;">
          <input style="border-radius: 5px;" type="hidden"   name="<?php echo AI_OPTION_ENABLE_PHP_CALL, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input style="border-radius: 5px;" id="enable-php-call-<?php echo $ad_number; ?>" type="checkbox" name="<?php echo AI_OPTION_ENABLE_PHP_CALL, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_enable_php_call(); ?>" <?php if ($obj->get_enable_php_call () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-php-call-<?php echo $ad_number; ?>" title="Enable or disable PHP function call to insert this code block at any position in template file. If function is disabled for block it will return empty string.">
            PHP function
          </label>
        </td>
        <td class="select">
          <pre style="margin: 0; display: inline; color: blue; font-size: 11px;">&lt;?php if (function_exists ('adinserter')) echo adinserter (<?php echo $ad_number; ?>); ?&gt;</pre>
        </td>
      </tr>
    </table>
  </div>

  <div id="misc-settings-<?php echo $ad_number; ?>" style="margin: 8px 0; padding: 0 8px; border: 1px solid #ddd; border-radius: 5px; <?php if (!$show_misc) echo 'display: none;'; ?>">
    <div class="max-input" style="margin: 8px 0;">
      <span style="display: table-cell;">
        Insert for
        <select style="border-radius: 5px; margin-bottom: 3px;" id="display-for-users-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_DISPLAY_FOR_USERS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_display_for_users(); ?>" style="width:160px">
           <option value="<?php echo AD_DISPLAY_ALL_USERS; ?>" <?php echo ($obj->get_display_for_users()==AD_DISPLAY_ALL_USERS) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_ALL_USERS; ?></option>
           <option value="<?php echo AD_DISPLAY_LOGGED_IN_USERS; ?>" <?php echo ($obj->get_display_for_users()==AD_DISPLAY_LOGGED_IN_USERS) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_LOGGED_IN_USERS; ?></option>
           <option value="<?php echo AD_DISPLAY_NOT_LOGGED_IN_USERS; ?>" <?php echo ($obj->get_display_for_users()==AD_DISPLAY_NOT_LOGGED_IN_USERS) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_NOT_LOGGED_IN_USERS; ?></option>
           <option value="<?php echo AD_DISPLAY_ADMINISTRATORS; ?>" <?php echo ($obj->get_display_for_users()==AD_DISPLAY_ADMINISTRATORS) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_ADMINISTRATORS; ?></option>
        </select>
      </span>
      <span style="display: table-cell;">
        Max <input style="border-radius: 5px;" type="text" name="<?php echo AI_OPTION_MAXIMUM_INSERTIONS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_maximum_insertions (); ?>" value="<?php echo $obj->get_maximum_insertions (); ?>" size="2" maxlength="3" title="Empty or 0 means no limit" /> insertions
      </span>
      <span style="display: table-cell;">
        General tag
      </span>
      <span style="display: table-cell;">
        <input style="border-radius: 5px; width: 100%;" type="text" name="<?php echo AI_OPTION_GENERAL_TAG, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_general_tag(); ?>" value="<?php echo $obj->get_ad_general_tag(); ?>" maxlength="40" title="Used for {tags} when no page data is found" />
      </span>
    </div>

    <div style="margin: 8px 0;">
      <div class="max-input" style="margin: 8px 0;">
        <span style="display: table-cell;">
          Filter insertions
        </span>
        <span style="display: table-cell;">
          <input style="border-radius: 5px; width: 100%; padding-right: 10px;" type="text" name="<?php echo AI_OPTION_EXCERPT_NUMBER, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_call_filter(); ?>" value="<?php echo $obj->get_call_filter(); ?>" title= "Filter insertions by specifying wanted calls for this block - single number or comma separated numbers, empty means all / no limits. Set Counter for filter to Auto if you are using only one insertion type." size="16" maxlength="20" />
        </span>
        <span style="display: table-cell;">
          &nbsp;&nbsp;&nbsp;Counter for filter
          <select style="border-radius: 5px; margin-bottom: 3px;" id="filter-type-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_FILTER_TYPE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_filter_type(); ?>" style="width:160px">
             <option value="<?php echo AI_OPTION_FILTER_AUTO; ?>" <?php echo ($obj->get_filter_type()==AI_OPTION_FILTER_AUTO) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_OPTION_FILTER_AUTO; ?></option>
             <option value="<?php echo AI_OPTION_FILTER_PHP_FUNCTION_CALLS; ?>" <?php echo ($obj->get_filter_type()==AI_OPTION_FILTER_PHP_FUNCTION_CALLS) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_OPTION_FILTER_PHP_FUNCTION_CALLS; ?></option>
             <option value="<?php echo AI_OPTION_FILTER_CONTENT_PROCESSING; ?>" <?php echo ($obj->get_filter_type()==AI_OPTION_FILTER_CONTENT_PROCESSING) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_OPTION_FILTER_CONTENT_PROCESSING; ?></option>
             <option value="<?php echo AI_OPTION_FILTER_EXCERPT_PROCESSING; ?>" <?php echo ($obj->get_filter_type()==AI_OPTION_FILTER_EXCERPT_PROCESSING) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_OPTION_FILTER_EXCERPT_PROCESSING; ?></option>
             <option value="<?php echo AI_OPTION_FILTER_BEFORE_POST_PROCESSING; ?>" <?php echo ($obj->get_filter_type()==AI_OPTION_FILTER_BEFORE_POST_PROCESSING) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_OPTION_FILTER_BEFORE_POST_PROCESSING; ?></option>
             <option value="<?php echo AI_OPTION_FILTER_AFTER_POST_PROCESSING; ?>" <?php echo ($obj->get_filter_type()==AI_OPTION_FILTER_AFTER_POST_PROCESSING) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_OPTION_FILTER_AFTER_POST_PROCESSING; ?></option>
             <option value="<?php echo AI_OPTION_FILTER_WIDGET_DRAWING; ?>" <?php echo ($obj->get_filter_type()==AI_OPTION_FILTER_WIDGET_DRAWING) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_OPTION_FILTER_WIDGET_DRAWING; ?></option>
             <option value="<?php echo AI_OPTION_FILTER_SUBPAGES; ?>" <?php echo ($obj->get_filter_type()==AI_OPTION_FILTER_SUBPAGES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_OPTION_FILTER_SUBPAGES; ?></option>
          </select>
        </span>
        <span style="display: table-cell;">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_ENABLE_FEED, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input style="border-radius: 5px; margin-left: 10px;" id="enable-feed-<?php echo $ad_number; ?>" type="checkbox" name="<?php echo AI_OPTION_ENABLE_FEED, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_enable_feed(); ?>" <?php if ($obj->get_enable_feed () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-feed-<?php echo $ad_number; ?>" title="Enable or disable insertion in feeds">Feed</label>
        </span>
        <span style="display: table-cell;">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_ENABLE_404, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input style="border-radius: 5px; margin-left: 10px;" id="enable-404-<?php echo $ad_number; ?>" type="checkbox" name="<?php echo AI_OPTION_ENABLE_404, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_enable_404(); ?>" <?php if ($obj->get_enable_404 () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-404-<?php echo $ad_number; ?>" title="Enable or disable insertion on page for Error 404: Page not found">404 page</label>
        </span>
      </div>
    </div>

    <div style="margin: 8px 0;">
      <select style="border-radius: 5px; margin-bottom: 0px;" id="scheduling-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_SCHEDULING, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_scheduling(); ?>">
        <option value="<?php echo AI_SCHEDULING_OFF; ?>" <?php echo ($obj->get_scheduling() == AI_SCHEDULING_OFF) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_TEXT_OFF; ?></option>
        <option value="<?php echo AI_SCHEDULING_DELAY; ?>" <?php echo ($obj->get_scheduling() == AI_SCHEDULING_DELAY) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_TEXT_DELAY_INSERTION; ?></option>
<?php if (function_exists ('ai_scheduling_options')) ai_scheduling_options ($obj); ?>
      </select>

      <span id="scheduling-delay-<?php echo $ad_number; ?>">
        for <input style="border-radius: 5px;" type="text" name="<?php echo AI_OPTION_AFTER_DAYS, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_ad_after_day(); ?>" value="<?php echo $obj->get_ad_after_day(); ?>" size="2" maxlength="3" /> days after publishing
      </span>
      <span id="scheduling-delay-warning-<?php echo $ad_number; ?>" style="color: #d00; display: none;">&nbsp;&nbsp; Not available</span>

<?php if (function_exists ('ai_scheduling_data')) ai_scheduling_data ($ad_number, $obj, $default); ?>
    </div>

  </div>

  <div id="device-detection-settings-<?php echo $ad_number; ?>" style="padding:8px 8px 8px 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px; <?php if (!$show_devices) echo 'display: none;'; ?>">
    <table>
      <tr>
        <td>
          <div style="margin-bottom: 5px;">
            <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DETECT_CLIENT_SIDE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
            <input id="client-side-detection-<?php echo $ad_number; ?>" style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_DETECT_CLIENT_SIDE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="1" default="<?php echo $default->get_detection_client_side(); ?>" <?php if ($obj->get_detection_client_side ()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
            <label for="client-side-detection-<?php echo $ad_number; ?>">Use client-side detection to show only on:</label>
          </div>

          <div style="margin: 5px 0 0 40px;">

      <?php
        for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
          $viewport_name = get_viewport_name ($viewport);
          if ($viewport_name != '') {
      ?>
            <div style="margin: 8px 0;">
              <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DETECT_VIEWPORT, '_', $viewport, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
              <input style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_DETECT_VIEWPORT, '_', $viewport, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="viewport-<?php echo $viewport, "-", $ad_number; ?>" value="1" default="<?php echo $default->get_detection_viewport ($viewport); ?>" <?php if ($obj->get_detection_viewport ($viewport)==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
              <label for="viewport-<?php echo $viewport, "-", $ad_number; ?>" title="Device min width <?php echo get_viewport_width ($viewport); ?> px"><?php echo $viewport_name; ?></label>
            </div>
      <?php
          }
        }
      ?>
          </div>
        </td><td style="padding-left: 40px; vertical-align: top;">
          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DETECT_SERVER_SIDE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" value="0" />
          <input style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_DETECT_SERVER_SIDE, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" id="server-side-detection-<?php echo $ad_number; ?>" value="1" default="<?php echo $default->get_detection_server_side(); ?>" <?php if ($obj->get_detection_server_side ()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="server-side-detection-<?php echo $ad_number; ?>">Use server-side detection to insert code only for </label>

          <div style="margin: 10px 0 10px 40px;">
            <select style="border-radius: 5px; margin-bottom: 3px;" id="display-for-devices-<?php echo $ad_number; ?>" name="<?php echo AI_OPTION_DISPLAY_FOR_DEVICES, WP_FORM_FIELD_POSTFIX, $ad_number; ?>" default="<?php echo $default->get_display_for_devices(); ?>" style="width:160px">
              <option value="<?php echo AD_DISPLAY_DESKTOP_DEVICES; ?>" <?php echo ($obj->get_display_for_devices() == AD_DISPLAY_DESKTOP_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_DEVICES; ?></option>
              <option value="<?php echo AD_DISPLAY_MOBILE_DEVICES; ?>" <?php echo ($obj->get_display_for_devices() == AD_DISPLAY_MOBILE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_MOBILE_DEVICES; ?></option>
              <option value="<?php echo AD_DISPLAY_TABLET_DEVICES; ?>" <?php echo ($obj->get_display_for_devices() == AD_DISPLAY_TABLET_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_TABLET_DEVICES; ?></option>
              <option value="<?php echo AD_DISPLAY_PHONE_DEVICES; ?>" <?php echo ($obj->get_display_for_devices() == AD_DISPLAY_PHONE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_PHONE_DEVICES; ?></option>
              <option value="<?php echo AD_DISPLAY_DESKTOP_TABLET_DEVICES; ?>" <?php echo ($obj->get_display_for_devices() == AD_DISPLAY_DESKTOP_TABLET_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_TABLET_DEVICES; ?></option>
              <option value="<?php echo AD_DISPLAY_DESKTOP_PHONE_DEVICES; ?>" <?php echo ($obj->get_display_for_devices() == AD_DISPLAY_DESKTOP_PHONE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_PHONE_DEVICES; ?></option>
            </select>
            devices
          </div>
        </td>
      </tr>
    </table>
  </div>

  <div id="no-wrapping-warning-<?php echo $ad_number; ?>" style="padding:8px; margin: 8px 0 8px 5px; border: 1px solid #ddd; border-radius: 5px; display: none;">
     <span id="" style="margin-top: 5px;"><strong><span style="color: red;">WARNING:</span> No Wrapping</strong> style has no HTML code for client-side device detection!</span>
  </div>
</div>
<?php
  }
?>
<div id="tab-0" style="padding: 0;<?php echo $tab_visible ? "" : " display: none;" ?>">
  <div style="margin: 16px 0 16px 4px;">
    <h3 style="margin: 0; float: left;"><?php echo AD_INSERTER_NAME ?> Settings <?php if (isset ($ai_db_options ['global']['VERSION'])) echo (int) ($ai_db_options ['global']['VERSION'][0].$ai_db_options ['global']['VERSION'][1]), '.',
                                        (int) ($ai_db_options ['global']['VERSION'][2].$ai_db_options ['global']['VERSION'][3]), '.',
                                        (int) ($ai_db_options ['global']['VERSION'][4].$ai_db_options ['global']['VERSION'][5]); ?></h3>
    <h4 style="margin: 0px; float: right;" title="Settings timestamp"><?php echo isset ($ai_db_options ['global']['TIMESTAMP']) ? date ("Y-m-d H:i:s", $ai_db_options ['global']['TIMESTAMP'] + get_option ('gmt_offset') * 3600) : ""; ?></h4>
    <div style="clear: both;"></div>
  </div>

  <div style="margin: 16px 0;">
    <div style="float: right;">
<?php if (function_exists ('ai_settings_global_buttons')) ai_settings_global_buttons (); ?>
      <input style="display: none; border-radius: 5px; font-weight: bold;" name="<?php echo AI_FORM_SAVE; ?>" value="Save Settings" type="submit" style="width:120px; font-weight: bold;" />
    </div>

    <div style="float: left; color: red;">
      <input onclick="if (confirm('Are you sure you want to reset all settings?')) return true; return false" name="<?php echo AI_FORM_CLEAR; ?>" value="Reset All Settings" type="submit" style="display: none; width:120px; font-weight: bold; color: #e44;" />
    </div>

    <div style="clear: both;"></div>
  </div>

<?php
  if (function_exists ('ai_global_settings')) ai_global_settings ();

  if ($enabled_h) $style_h = "font-weight: bold; color: #66f;"; else $style_h = "";
  if ($enabled_f) $style_f = "font-weight: bold; color: #66f;"; else $style_f = "";
  if (false) $style_d = "font-weight: bold; color: #e44;"; else $style_d = "";
?>

  <div id="ai-plugin-settings-tab-container" style="padding: 0; margin 8px 0 0 0; border: 0;">
    <ul id="ai-plugin-settings-tabs" style="display: none;">
      <li id="ai-g" class="ai-plugin-tab"><a href="#tab-general">General</a></li>
      <li id="ai-v" class="ai-plugin-tab"><a href="#tab-viewports">Viewports</a></li>
      <li id="ai-h" class="ai-plugin-tab"><a href="#tab-header"><span style="<?php echo $style_h ?>">Header</span></a></li>
      <li id="ai-f" class="ai-plugin-tab"><a href="#tab-footer"><span style="<?php echo $style_f ?>">Footer</span></a></li>
<?php if (function_exists ('ai_plugin_settings_tab')) ai_plugin_settings_tab (); ?>
      <li id="ai-d" class="ai-plugin-tab"><a href="#tab-debugging"><span style="<?php echo $style_d ?>">Debugging</span></a></li>
    </ul>

    <div id="tab-general" style="margin: 8px 0; padding: 0; border: 1px solid rgb(221, 221, 221); border-radius: 5px;">

      <table>
<?php if (function_exists ('ai_general_settings')) ai_general_settings (); ?>
      <tr>
        <td style="padding-left: 10px;">
          Syntax Highlighter Theme
        </td>
        <td>
          <select
              style="border-radius: 5px; width:220px"
              id="syntax-highlighter-theme"
              name="syntax-highlighter-theme"
              value="Value">
              <optgroup label="None">
                  <option value="<?php echo AI_OPTION_DISABLED; ?>" <?php echo ($syntax_highlighter_theme == AI_OPTION_DISABLED) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>No Syntax Highlighting</option>
              </optgroup>
              <optgroup label="Light">
                  <option value="chrome" <?php echo ($syntax_highlighter_theme == 'chrome') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Chrome</option>
                  <option value="clouds" <?php echo ($syntax_highlighter_theme == 'clouds') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Clouds</option>
                  <option value="crimson_editor" <?php echo ($syntax_highlighter_theme == 'crimson_editor') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Crimson Editor</option>
                  <option value="dawn" <?php echo ($syntax_highlighter_theme == 'dawn') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Dawn</option>
                  <option value="dreamweaver" <?php echo ($syntax_highlighter_theme == 'dreamweaver') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Dreamweaver</option>
                  <option value="eclipse" <?php echo ($syntax_highlighter_theme == 'eclipse') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Eclipse</option>
                  <option value="github" <?php echo ($syntax_highlighter_theme == 'github') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>GitHub</option>
                  <option value="katzenmilch" <?php echo ($syntax_highlighter_theme == 'katzenmilch') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Katzenmilch</option>
                  <option value="kuroir" <?php echo ($syntax_highlighter_theme == 'kuroir') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Kuroir</option>
                  <option value="solarized_light" <?php echo ($syntax_highlighter_theme == 'solarized_light') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Solarized Light</option>
                  <option value="textmate" <?php echo ($syntax_highlighter_theme == 'textmate') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Textmate</option>
                  <option value="tomorrow" <?php echo ($syntax_highlighter_theme == 'tomorrow') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Tomorrow</option>
                  <option value="xcode" <?php echo ($syntax_highlighter_theme == 'xcode') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>XCode</option>
              </optgroup>
              <optgroup label="Dark">
                  <option value="ad_inserter" <?php echo ($syntax_highlighter_theme == 'ad_inserter') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Ad Inserter</option>
                  <option value="chaos" <?php echo ($syntax_highlighter_theme == 'chaos') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Chaos</option>
                  <option value="clouds_midnight" <?php echo ($syntax_highlighter_theme == 'clouds_midnight') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Clouds Midnight</option>
                  <option value="cobalt" <?php echo ($syntax_highlighter_theme == 'cobalt') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Cobalt</option>
                  <option value="idle_fingers" <?php echo ($syntax_highlighter_theme == 'idle_fingers') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Idle Fingers</option>
                  <option value="kr_theme" <?php echo ($syntax_highlighter_theme == 'kr_theme') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>krTheme</option>
                  <option value="merbivore" <?php echo ($syntax_highlighter_theme == 'merbivore') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Merbivore</option>
                  <option value="merbivore_soft" <?php echo ($syntax_highlighter_theme == 'merbivore_soft') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Merbivore Soft</option>
                  <option value="mono_industrial" <?php echo ($syntax_highlighter_theme == 'mono_industrial') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Mono Industrial</option>
                  <option value="monokai" <?php echo ($syntax_highlighter_theme == 'monokai') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Monokai</option>
                  <option value="pastel_on_dark" <?php echo ($syntax_highlighter_theme == 'pastel_on_dark') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Pastel on Dark</option>
                  <option value="solarized_dark" <?php echo ($syntax_highlighter_theme == 'solarized_dark') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Solarized Dark</option>
                  <option value="terminal" <?php echo ($syntax_highlighter_theme == 'terminal') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Terminal</option>
                  <option value="tomorrow_night" <?php echo ($syntax_highlighter_theme == 'tomorrow_night') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Tomorrow Night</option>
                  <option value="tomorrow_night_blue" <?php echo ($syntax_highlighter_theme == 'tomorrow_night_blue') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Tomorrow Night Blue</option>
                  <option value="tomorrow_night_bright" <?php echo ($syntax_highlighter_theme == 'tomorrow_night_bright') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Tomorrow Night Bright</option>
                  <option value="tomorrow_night_eighties" <?php echo ($syntax_highlighter_theme == 'tomorrow_night_eighties') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Tomorrow Night 80s</option>
                  <option value="twilight" <?php echo ($syntax_highlighter_theme == 'twilight') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Twilight</option>
                  <option value="vibrant_ink" <?php echo ($syntax_highlighter_theme == 'vibrant_ink') ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>>Vibrant Ink</option>
              </optgroup>
          </select>
        </td>
      </tr>
      <tr>
        <td style="padding-left: 10px;">
          Block Class Name
        </td>
        <td>
          <input style="border-radius: 5px; margin-left: 0px;" title="CSS Class Name for the wrapping div" type="text" id="block-class-name" name="block-class-name" value="<?php echo $block_class_name; ?>" size="15" maxlength="40" />
        </td>
      </tr>
      <tr>
        <td style="padding: 0 10px;">
          Minimum User Role for Exceptions Editing
        </td>
        <td>
          <select style="border-radius: 5px; margin-bottom: 3px;" id="minimum-user-role" name="minimum-user-role" selected-value="1" style="width:300px">
            <?php wp_dropdown_roles (get_minimum_user_role ()); ?>
          </select>
        </td>
      </tr>
      <tr>
        <td style="padding-left: 10px;">
        Dynamic blocks
        </td>
        <td>
          <select style="border-radius: 5px; margin-bottom: 3px;" id="dynamic_blocks" name="dynamic_blocks">
            <option value="<?php echo AI_DYNAMIC_BLOCKS_SERVER_SIDE; ?>" <?php echo get_dynamic_blocks()      == AI_DYNAMIC_BLOCKS_SERVER_SIDE ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_TEXT_SERVER_SIDE; ?></option>
            <option value="<?php echo AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC; ?>" <?php echo get_dynamic_blocks() == AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_TEXT_SERVER_SIDE_W3TC; ?></option>
            <option value="<?php echo AI_DYNAMIC_BLOCKS_CLIENT_SIDE; ?>" <?php echo get_dynamic_blocks()      == AI_DYNAMIC_BLOCKS_CLIENT_SIDE ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AI_TEXT_CLIENT_SIDE; ?></option>
          </select>
        </td>
      </tr>
      <tr>
        <td style="padding-left: 10px;">
        Plugin priority
        </td>
        <td>
          <input style="border-radius: 5px;" type="text" name="plugin_priority" value="<?php echo get_plugin_priority (); ?>" size="6" maxlength="6" />
        </td>
      </tr>
      </table>
    </div>

    <div id="tab-viewports" style="margin: 8px 0; padding: 0; border: 1px solid rgb(221, 221, 221); border-radius: 5px;">
      <div style="margin: 8px;">
        Viewport Settings used for client-side device detection
      </div>
<?php
  for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
?>
      <div style="margin: 8px;">
          Viewport <?php echo $viewport; ?> name&nbsp;&nbsp;&nbsp;
            <input style="border-radius: 5px; margin-left: 0px;" type="text" id="option-name-<?php echo $viewport; ?>" name="viewport-name-<?php echo $viewport; ?>" value="<?php echo get_viewport_name ($viewport); ?>" size="15" maxlength="40" />
            <?php if ($viewport == AD_INSERTER_VIEWPORTS) echo '<span style="display: none;">' ?>
             &nbsp;&nbsp; min width
            <input style="border-radius: 5px;" type="text" id="option-length-<?php echo $viewport; ?>" name="viewport-width-<?php echo $viewport; ?>" value="<?php echo get_viewport_width ($viewport); ?>" size="4" maxlength="4" /> px
            <?php if ($viewport == AD_INSERTER_VIEWPORTS) echo '</span>' ?>
        </div>
<?php
  }
?>
    </div>

    <div id="tab-header" style="margin: 0px 0; padding: 0; ">
      <div style="margin: 8px 0;">
        <div style="float: right;">
          <input style="border-radius: 5px;" type="hidden"   name="<?php echo AI_OPTION_ENABLE_MANUAL, '_block_h'; ?>" value="0" />
          <input style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_ENABLE_MANUAL, '_block_h'; ?>" id="enable-header" value="1" <?php if ($adH->get_enable_manual () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-header" title="Enable or disable insertion of this code into HTML page header">Enable</label>

          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_ENABLE_404, '_block_h'; ?>" value="0" />
          <input style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_ENABLE_404, '_block_h'; ?>" id="enable-header-404" value="1" <?php if ($adH->get_enable_404 () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-header-404" title="Enable or disable insertion of this code into HTML page header on page for Error 404: Page not found">Insert on Error 404 page</label>

      <?php if (AI_SYNTAX_HIGHLIGHTING) : ?>
          <input type="checkbox" style="border-radius: 5px; margin-left: 10px;" value="0" id="simple-editor-h" />
          <label for="simple-editor-h" title="Simple editor">Simple editor</label>
      <?php endif; ?>

          <input style="border-radius: 5px;" type="hidden"   name="<?php echo AI_OPTION_PROCESS_PHP, '_block_h'; ?>" value="0" />
          <input style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_PROCESS_PHP, '_block_h'; ?>" value="1" id="process-php-h" <?php if ($adH->get_process_php () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="process-php-h" title="Process PHP code">Process PHP</label>
        </div>

        <div>
          <h3 style="margin: 8px 0 8px 2px;">HTML Page Header Code</h3>
        </div>
      </div>

      <div style="margin: 8px 0; width: 100%;">
        <div style="float: left;">
          Code in the <pre style="display: inline; color: blue;">&lt;head&gt;&lt;/head&gt;</pre> section of the HTML page
        </div>

        <div style="clear: both;"></div>
      </div>

      <div style="margin: 8px 0;">
        <textarea id="block-h" name="<?php echo AI_OPTION_CODE, '_block_h'; ?>" class="simple-editor" style="background-color:#F9F9F9; font-family: Courier, 'Courier New', monospace; font-weight: bold;"><?php echo esc_textarea ($adH->get_ad_data()); ?></textarea>
      </div>

      <div id="device-detection-settings-h" style="padding:8px 8px 8px 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;">
        <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DETECT_SERVER_SIDE, WP_FORM_FIELD_POSTFIX, AI_HEADER_OPTION_NAME; ?>" value="0" />
        <input style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_DETECT_SERVER_SIDE, WP_FORM_FIELD_POSTFIX, AI_HEADER_OPTION_NAME; ?>" id="server-side-detection-h" value="1" <?php if ($adH->get_detection_server_side ()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
        <label for="server-side-detection-h">Use server-side detection to insert code only for </label>
        <select style="border-radius: 5px; margin-bottom: 3px;" id="display-for-devices-h" name="<?php echo AI_OPTION_DISPLAY_FOR_DEVICES, WP_FORM_FIELD_POSTFIX, AI_HEADER_OPTION_NAME; ?>" >
          <option value="<?php echo AD_DISPLAY_DESKTOP_DEVICES; ?>" <?php echo ($adH->get_display_for_devices() == AD_DISPLAY_DESKTOP_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_MOBILE_DEVICES; ?>" <?php echo ($adH->get_display_for_devices() == AD_DISPLAY_MOBILE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_MOBILE_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_TABLET_DEVICES; ?>" <?php echo ($adH->get_display_for_devices() == AD_DISPLAY_TABLET_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_TABLET_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_PHONE_DEVICES; ?>" <?php echo ($adH->get_display_for_devices() == AD_DISPLAY_PHONE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_PHONE_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_DESKTOP_TABLET_DEVICES; ?>" <?php echo ($adH->get_display_for_devices() == AD_DISPLAY_DESKTOP_TABLET_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_TABLET_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_DESKTOP_PHONE_DEVICES; ?>" <?php echo ($adH->get_display_for_devices() == AD_DISPLAY_DESKTOP_PHONE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_PHONE_DEVICES; ?></option>
        </select>
        devices
      </div>
    </div>

    <div id="tab-footer" style="margin: 0px 0; padding: 0; ">
      <div style="margin: 8px 0;">
        <div style="float: right;">
          <input style="border-radius: 5px;" type="hidden"   name="<?php echo AI_OPTION_ENABLE_MANUAL, '_block_f'; ?>" value="0" />
          <input style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_ENABLE_MANUAL, '_block_f'; ?>" id="enable-footer" value="1" <?php if ($adF->get_enable_manual () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-footer" title="Enable or disable insertion of this code into HTML page footer">Enable</label>

          <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_ENABLE_404, '_block_f'; ?>" value="0" />
          <input style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_ENABLE_404, '_block_f'; ?>" id="enable-footer-404" value="1" <?php if ($adF->get_enable_404 () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="enable-footer-404" title="Enable or disable insertion of this code into HTML page footer on page for Error 404: Page not found">Insert on Error 404 page</label>

    <?php if (AI_SYNTAX_HIGHLIGHTING) : ?>
          <input type="checkbox" style="border-radius: 5px; margin-left: 10px;" value="0" id="simple-editor-f" />
          <label for="simple-editor-f" title="Simple editor">Simple editor</label>
    <?php endif; ?>

          <input style="border-radius: 5px;" type="hidden"   name="<?php echo AI_OPTION_PROCESS_PHP, '_block_f'; ?>" value="0" />
          <input style="border-radius: 5px; margin-left: 10px;" type="checkbox" name="<?php echo AI_OPTION_PROCESS_PHP, '_block_f'; ?>" value="1" id="process-php-f" <?php if ($adF->get_process_php () == AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="process-php-f" title="Process PHP code">Process PHP</label>
        </div>

        <div>
          <h3 style="margin: 8px 0 8px 2px;">HTML Page Footer Code</h3>
        </div>
      </div>

      <div style="margin: 8px 0; width: 100%;">
        <div style="float: left;">
          Code before the <pre style="display: inline; color: blue;">&lt;/body&gt;</pre> tag of the the HTML page
        </div>

        <div style="clear: both;"></div>
      </div>

      <div style="margin: 8px 0;">
        <textarea id="block-f" name="<?php echo AI_OPTION_CODE, '_block_f'; ?>" class="simple-editor" style="background-color:#F9F9F9; font-family: Courier, 'Courier New', monospace; font-weight: bold;"><?php echo esc_textarea ($adF->get_ad_data()); ?></textarea>
      </div>

      <div id="device-detection-settings-f" style="padding:8px 8px 8px 8px; margin: 8px 0; border: 1px solid #ddd; border-radius: 5px;">
        <input style="border-radius: 5px;" type="hidden" name="<?php echo AI_OPTION_DETECT_SERVER_SIDE, WP_FORM_FIELD_POSTFIX, AI_FOOTER_OPTION_NAME; ?>" value="0" />
        <input style="border-radius: 5px;" type="checkbox" name="<?php echo AI_OPTION_DETECT_SERVER_SIDE, WP_FORM_FIELD_POSTFIX, AI_FOOTER_OPTION_NAME; ?>" id="server-side-detection-f" value="1" <?php if ($adF->get_detection_server_side ()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
        <label for="server-side-detection-f">Use server-side detection to insert code only for </label>
        <select style="border-radius: 5px; margin-bottom: 3px;" id="display-for-devices-f" name="<?php echo AI_OPTION_DISPLAY_FOR_DEVICES, WP_FORM_FIELD_POSTFIX, AI_FOOTER_OPTION_NAME; ?>" >
          <option value="<?php echo AD_DISPLAY_DESKTOP_DEVICES; ?>" <?php echo ($adF->get_display_for_devices() == AD_DISPLAY_DESKTOP_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_MOBILE_DEVICES; ?>" <?php echo ($adF->get_display_for_devices() == AD_DISPLAY_MOBILE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_MOBILE_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_TABLET_DEVICES; ?>" <?php echo ($adF->get_display_for_devices() == AD_DISPLAY_TABLET_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_TABLET_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_PHONE_DEVICES; ?>" <?php echo ($adF->get_display_for_devices() == AD_DISPLAY_PHONE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_PHONE_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_DESKTOP_TABLET_DEVICES; ?>" <?php echo ($adF->get_display_for_devices() == AD_DISPLAY_DESKTOP_TABLET_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_TABLET_DEVICES; ?></option>
          <option value="<?php echo AD_DISPLAY_DESKTOP_PHONE_DEVICES; ?>" <?php echo ($adF->get_display_for_devices() == AD_DISPLAY_DESKTOP_PHONE_DEVICES) ? AD_SELECT_SELECTED : AD_EMPTY_VALUE; ?>><?php echo AD_DISPLAY_DESKTOP_PHONE_DEVICES; ?></option>
        </select>
        devices
      </div>
    </div>

<?php if (function_exists ('ai_plugin_settings')) ai_plugin_settings (); ?>

    <div id="tab-debugging" style="margin: 8px 0; padding: 0; border: 1px solid rgb(221, 221, 221); border-radius: 5px;">
      <div style="margin: 8px;">
        <input style="border-radius: 5px;" type="hidden" name="admin_toolbar_debugging" value="0" />
        <input style="border-radius: 5px;" type="checkbox" name="admin_toolbar_debugging" id="admin-toolbar-debugging" value="1" default="<?php echo DEFAULT_ADMIN_TOOLBAR_DEBUGGING; ?>" <?php if (get_admin_toolbar_debugging ()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
        <label for="admin-toolbar-debugging" title="Enable or disable debugging functions in admin toolbar">Debugging functions in admin toolbar</label>
      </div>

      <div style="margin: 8px;">
        <input style="border-radius: 5px;" type="hidden" name="remote_debugging" value="0" />
        <input style="border-radius: 5px;" type="checkbox" name="remote_debugging" id="remote-debugging" value="1" default="<?php echo DEFAULT_REMOTE_DEBUGGING; ?>" <?php if (get_remote_debugging ()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
        <label for="remote-debugging" title="Enable Debugger widget and code insertion debugging (blocks, positions, tags, processing) by url parameters for non-logged in users. Enable this option to allow other people to see Debugger widget, labeled blocks and positions in order to help you to diagnose problems. For logged in administrators debugging is always enabled.">Remote debugging</label>
      </div>

      <div id="system-debugging" style="display: none;">
        <div style="margin: 8px;">
          <input style="border-radius: 5px;" type="hidden" name="javascript_debugging" value="0" />
          <input style="border-radius: 5px;" type="checkbox" name="javascript_debugging"id="javascript-debugging" value="1" default="<?php echo DEFAULT_JAVASCRIPT_DEBUGGING; ?>" <?php if (get_javascript_debugging ()==AD_SETTINGS_CHECKED) echo 'checked '; ?> />
          <label for="javascript-debugging" title="Enable Javascript console output">Javascript debugging</label>
        </div>
      </div>
    </div>

  </div>
</div>

</div>

<input id="ai-active-tab" type="hidden" name="ai-active-tab" value="<?php echo $active_tab; ?>" />

<?php
    }  // Main subpage
    wp_nonce_field ('save_adinserter_settings');
?>
</form>

</div>

<?php
  if ($subpage == 'main') {
    if (function_exists ('ai_settings_side')) ai_settings_side (); else { ?>
    <div style="float: left;">
      <div class="ai-form header" style="margin: 8px 0; padding: 0 8px; border: 1px solid rgb(221, 221, 221); border-radius: 5px;">
        <div style="float: left;">
          <h2 style="display: inline-block; margin: 13px 0;">Ad Inserter Pro - 64 blocks, 6 viewports, GEO targeting, scheduling, import/export</h2>
        </div>

        <div id="header-buttons">
          <a style="text-decoration: none;" href="http://adinserter.pro/" target="_blank"><button type="button" style="display: none; margin: 0 10px 0 0; width: 62px;">Go&nbsp;Pro</button></a>
        </div>

        <div style="clear: both;"></div>
      </div>

      <div class="ai-form" style="padding: 2px 8px 6px 8px; margin: 8px 0 8px 0; border: 1px solid rgb(221, 221, 221); border-radius: 5px; background: #fff;">
        <a href="http://tinymonitor.com/" target="_blank"><img id="monitors-image" src="<?php echo AD_INSERTER_PLUGIN_IMAGES_URL; ?>monitors.png" alt="Tiny Monitor" /></a>
        <p style="text-align: justify;"><a href="http://tinymonitor.com/" target="_blank">Tiny Monitor</a> is a PHP application that can monitor your Google AdSense earnings,
           CJ earnings and PayPal transactions. The purpose of Tiny Monitor is to download data from original sources and present them in a compact way on a single web page.
           With Tiny Monitor you have all the data at one place so you dont have to log in to various pages just to check earnings.
           Tiny Monitor displays some data also in the page title and favicon so you still have simple access to current monitor status while you work with other applications.</p>
      </div>
    </div>
<?php
    }
  }
?>
<script type="text/javascript">
//  setTimeout (show_blocked_warning, 4000);

  jQuery(document).ready(function($) {
    setTimeout (show_blocked_warning, 400);
  });

  function show_blocked_warning () {
    jQuery("#blocked-warning.warning-enabled").show ();
    jQuery("#blocked-warning.warning-enabled .blocked-warning-text").css ('color', '#00f');

    var image = jQuery("#monitors-image");
    if (image.height () < 100) {
      image.hide ().after (image.clone ().attr ('class', '').attr ("id", 'monitors-image-ajax').attr ('src', '<?php echo wp_make_link_relative (get_site_url()); ?>/wp-admin/admin-ajax.php?action=ai_data&image=monitors.png&ai_check=<?php echo wp_create_nonce ('adinserter_data'); ?>').css ('display', 'block'));
    }
  }
</script>

<?php
  }
