<?php
/*
Plugin Name: Ad Inserter
Version: 2.0.9
Description: Insert any ad or code into Wordpress. Perfect for all kinds of ads. Simply enter any ad or HTML/Javascript/PHP code and select where and how you want to display it.
Author: Igor Funa
Author URI: http://igorfuna.com/
Plugin URI: http://adinserter.pro/documentation
*/

/*
Change Log

Ad Inserter 2.0.9 - 8 January 2017
- Added support for uppercase and lowercase {country_iso2} tag (Pro only)
- Removed inclusion of dummy css and js file
- Bug fix: Client-side dynamic blocks were not enabled if not using W3 Total Cache

Ad Inserter 2.0.8 - 6 January 2017
- Added support for client-side rotation (works with caching)
- Added support for server-side rotation with W3 Total Cache
- Added support for client-side country detection (works with caching, Pro only)
- Added support for server-side country detection with W3 Total Cache (Pro only)
- Added debugging functions to measure plugin processing time
- Added option to black/white-list IP addresses (Pro only)
- Added option for fallback code when scheduling between dates expires (Pro only)
- On multisite installations Ad Inserter debug menu item on sites is available only if settings page is enabled
- Added option for multisite installations to use Ad Inserter settings of main site for all blogs
- Added flags to country list (Pro only)
- Bug fix: Code preview did not work if Wordpress was installed in a folder
- Few minor bug fixes and cosmetic changes

Ad Inserter 2.0.7 - 23 December 2016
- Delayed display moved to Misc group
- Added option for scheduling to insert code only between specified dates (Pro only)
- Added option for Geo targeting (Pro only)
- Few minor bug fixes and cosmetic changes

Ad Inserter 2.0.6 - 25 November 2016
- Added support to filter subpages created by the <!--nextpage--> tag
- Added option to import block name (Pro only)
- Cookie deleted only when it exists and debugging is disabled
- Few minor bug fixes

Ad Inserter 2.0.5 - 8 october 2016
- Cookie created only when debugging is enabled
- Few minor bug fixes

Ad Inserter 2.0.4 - 30 September 2016
- Bug fix: Cursor position always at the end of block name
- State of debugging functions saved to cookie
- Few minor bug fixes

Ad Inserter 2.0.3 - 26 September 2016
- Debugging functions in admin toolbar available only for administrators
- Added option to hide debugging functions in admin toolbar
- Added shortcode for debugger
- Few minor bug fixes

Ad Inserter 2.0.2 - 25 September 2016
- Changed javascript version check to get plugin version from the HTML page
- Added warning if old cached version of CSS file is loaded on the settings page
- Added warning if version query parameter for js/css files is removed due to inappropriate caching

Ad Inserter 2.0.1 - 24 September 2016
- Bug fix: Shortcodes called by name were not displayed

Ad Inserter 2.0.0 - 23 September 2016
- Redesigned user interface
- Added many debugging tools for easier troubleshooting
- New feature: Code preview tool with visual CSS editor
- New feature: Label inserted blocks
- New feature: Show available positions for automatic insertion
- New feature: Show HTML tags in posts/static pages
- New feature: Log Ad Inserter processing
- Improved loading speed of the settings page
- Improved block insertion processing speed
- Added support to avoid insertion near images, headers and other elements
- Added option to avoid insertion in feeds
- Added option to display code blocks only to administrators
- Added option for publishig date check for display positions Before/After Content
- Added option for server-side device check for header and footer code
- Added option for maximum page/post words
- Added option for maximum paragraph words
- Added option to black/white-list post IDs
- Added option to black/white-list url query parameters
- Added warning if the settings page is blocked by ad blocker
- Added warning if old cached version of javascript is loaded on the settings page
- Added support for multisite installations to disable settings, widgets and exceptions on network sites (Pro only)
- Block names can be edited by clicking on the name
- Filters now work also on posts and single pages
- CSS code for client-side detection moved to inline CSS
- Bug fix: Minimum user roles for exception editing was not calculated properly
- Bug fix: Server-side detection checkbox was not saved properly
- Many other minor bug fixes, code improvements and cosmetic changes

Ad Inserter 1.7.0 - 16 August 2016
- Bug fix: Shortcodes did not ignore post/static page exceptions
- Slightly redesigned user interface
- Excerpt/Post number(s) renamed to Filter as it now works on all display positions
- Widget setting removed from Automatic display to Manual display section
- Added support to disable widgets (standalone checkbox in Manual display)
- Added call counter/filter for widgets
- Added support to edit CSS for predefined styles
- Few other minor bug fixes, code improvements and cosmetic changes

Ad Inserter 1.6.7 - 9 August 2016
- Bug fix: Block code textarea was not escaped
- Added checks for page types for shortcodes
- Added support for Before/After Post position call counter/filter
- Few minor cosmetic changes

Ad Inserter 1.6.6 - 5 August 2016
- Bug fix: Display on Homepage and other blog pages might get disabled - important if you were using PHP function call or shortcode (import of settings from 1.6.4)
- Few minor cosmetic changes
- Requirements changed to WordPress 4.0 or newer
- Added initial support for Pro version

Ad Inserter 1.6.5 - 1 August 2016
- Fixed bug: Wrong counting of max insertions
- Change: display position Before Title was renamed to Before Post
- Added support for display position After Post
- Added support for posts with no <p> tags (paragraphs separated with \r\n\r\n characters)
- Added support for paragraph processing on homepage, category, archive and search pages
- Added support for custom viewports
- Added support for PHP function call counter
- Added support to disable code block on error 404 pages
- Added support to debug paragraph tags

Ad Inserter 1.6.4 - 15 May 2016
- Fixed bug: For shortcodes in posts the url was not checked
- Optimizations for device detection

Ad Inserter 1.6.3 - 6 April 2016
- Removed deprecated code (fixes PHP 7 deprecated warnings)
- Added support for paragraphs with div and other HTML tags (h1, h2, h3,...)

Ad Inserter 1.6.2 - 2 April 2016
- Removed deprecated code (fixes PHP Fatal error Call to a member function get_display_type)
- Added support to change plugin processing priority

Ad Inserter 1.6.1 - 28 February 2016
- Fixed bug: For shortcodes in posts the date was not checked
- Fixed error with some templates "Call to undefined method is_main_query()"
- Added support for minumum number of page/post words for Before/After content display option
- Added support for {author} and {author_name} tags

Ad Inserter 1.6.0 - 9 January 2016
- Added support for client-side device detection
- Many code improvements
- Improved plugin processing speed
- Removed support for deprecated tags for manual insertion {adinserter n}
- Few minor bug fixes

Ad Inserter 1.5.8 - 20 December 2015
- Fixed notice "Undefined index: adinserter_selected_block_" when saving page or post

Ad Inserter 1.5.7 - 20 December 2015
- Fixed notice "has_cap was called with an argument that is deprecated since version 2.0!"
- Few minor bug fixes and code improvements
- Added support to blacklist or whitelist url patterns: /url-start*. *url-pattern*, *url-end
- Added support to define minimum number of words in paragraphs
- Added support to define minimum user role for page/post Ad Inserter exceptions editing
- Added support to limit insertions of individual code blocks
- Added support to filter direct visits (no referer)

Ad Inserter 1.5.6 - 14 August 2015
- Fixed Security Vulnerability: Plugin was vulnerable to Cross-Site Scripting (XSS)
- Few bug fixes and code improvements

Ad Inserter 1.5.5 - 6 June 2015
- Few bug fixes and code improvements
- Added support to export and import all Ad Inserter settings

Ad Inserter 1.5.4 - 31 May 2015
- Many code optimizations and cosmetic changes
- Header and Footer code blocks moved to settings tab (#)
- Added support to process shortcodes of other plugins used in Ad Inserter code blocks
- Added support to white-list or black-list individual urls
- Added support to export and import settings for code blocks
- Added support to specify excerpts for block insertion
- Added support to specify text that must be present when counting paragraphs

Ad Inserter 1.5.3 - 2 May 2015
- Fixed Security Vulnerability: Plugin was vulnerable to a combination of CSRF/XSS attacks (credits to Kaustubh Padwad)
- Fixed bug: In some cases deprecated widgets warning reported errors
- Added support to white-list or black-list tags
- Added support for category slugs in category list
- Added support for relative paragraph positions
- Added support for individual code block exceptions on post/page editor page
- Added support for minimum number of words
- Added support to disable syntax highlighting editor (to allow using copy/paste on mobile devices)

Ad Inserter 1.5.2 - 15 March 2015
- Fixed bug: Widget titles might be displayed at wrong sidebar positions
- Change: Default code block CSS class name was changed from ad-inserter to code-block to prevent Ad Blockers from blocking Ad Inserter divs
- Added warning message if deprecated widgets are used
- Added support to display blocks on desktop + tablet and desktop + phone devices

Ad Inserter 1.5.1 - 3 March 2015
- Few fixes to solve plugin incompatibility issues
- Added support to disable all ads on specific page

Ad Inserter 1.5.0 - 2 March 2015
- Added support to display blocks on all, desktop or mobile devices
- Added support for new widgets API - one widget for all code blocks with multiple instances
- Added support to change wrapping code CSS class name
- Fixed bug: Display block N days after post is published was not working properly
- Fixed bug: Display block after paragraph in some cases was not working propery

Ad Inserter 1.4.1 - 29 December 2014
- Fixed bug: Code blocks configured as widgets were not displayed properly on widgets admin page

Ad Inserter 1.4.0 - 21 December 2014
- Added support to skip paragraphs with specified text
- Added position After paragraph
- Added support for header and footer scripts
- Added support for custom CSS styles
- Added support to display blocks to all, logged in or not logged in users
- Added support for syntax highlighting
- Added support for shortcodes
- Added classes to block wrapping divs
- Few bugs fixed

Ad Inserter 1.3.5 - 18 March 2014
- Fixed bug: missing echo for PHP function call example

Ad Inserter 1.3.4 - 15 March 2014
- Added option for no code wrapping with div
- Added option to insert block codes from PHP code
- Changed HTML codes to disable display on specific pages
- Selected code block position is preserved after settings are saved
- Manual insertion can be enabled or disabled regardless of primary display setting
- Fixed bug: in some cases Before Title display setting inserted code into RSS feed

Ad Inserter 1.3.3 - 8 January 2014
- Added option to insert ads also before or after the excerpt
- Fixed bug: in some cases many errors reported after activating the plugin
- Few minor bugs fixed
- Few minor cosmetic changes

Ad Inserter 1.3.2 - 4 December 2013
- Fixed blank settings page caused by incompatibility with some themes or plugins

Ad Inserter 1.3.1 - 3 December 2013
- Added option to insert ads also on pages
- Added option to process PHP code
- Few bugs fixed

Ad Inserter 1.3.0 - 27 November 2013
- Number of ad slots increased to 16
- New tabbed admin interface
- Ads can be manually inserted also with {adinserter AD_NUMBER} tag
- Fixed bug: only the last ad block set to Before Title was displayed
- Few other minor bugs fixed
- Few cosmetic changes

Ad Inserter 1.2.1 - 19 November 2013
- Fixed problem: || in ad code (e.g. asynchronous code for AdSense) causes only part of the code to be inserted (|| to rotate ads is replaced with |rotate|)

Ad Inserter 1.2.0 - 15/05/2012
- Fixed bug: manual tags in posts lists were not removed
- Added position Before title
- Added support for minimum number of paragraphs
- Added support for page display options for Widget and Before title positions
- Alignment now works for all display positions

Ad Inserter 1.1.3 - 07/04/2012
- Fixed bug for {search_query}: When the tag is empty {smart_tag} is used in all cases
- Few changes in the settings page

Ad Inserter 1.1.2 - 16/07/2011
- Fixed error with multisite/network installations

Ad Inserter 1.1.1 - 16/07/2011
- Fixed bug in Float Right setting display

Ad Inserter 1.1.0 - 05/06/2011
- Added option to manually display individual ads
- Added new ad alignments: left, center, right
- Added {search_query} tag
- Added support for category black list and white list

Ad Inserter 1.0.4 - 19/12/2010
- HTML entities for {title} and {short_title} are now decoded
- Added {tag} to display the first tag

Ad Inserter 1.0.3 - 05/12/2010
- Fixed bug for rotating ads

Ad Inserter 1.0.2 - 04/12/2010
- Added support for rotating ads

Ad Inserter 1.0.1 - 17/11/2010
- Added support for different sidebar implementations

Ad Inserter 1.0.0 - 14/11/2010
- Initial release

*/


if (!defined ('AD_INSERTER_PLUGIN_DIR'))
  define ('AD_INSERTER_PLUGIN_DIR', plugin_dir_path (__FILE__));

/* Version check */
global $wp_version, $version_string;
$exit_msg = 'Ad Inserter requires WordPress 4.0 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a>';

if (version_compare ($wp_version, "4.0", "<")) {
  exit ($exit_msg);
}

global $block_object, $ai_wp_data, $ad_interter_globals, $ai_last_check, $ai_last_time, $ai_total_plugin_time, $ai_total_php_time, $ai_processing_log, $ai_db_options_extract, $ai_db_options;

//include required files
require_once AD_INSERTER_PLUGIN_DIR.'class.php';
require_once AD_INSERTER_PLUGIN_DIR.'constants.php';
require_once AD_INSERTER_PLUGIN_DIR.'settings.php';
require_once AD_INSERTER_PLUGIN_DIR.'preview.php';

if (isset ($_GET [AI_URL_DEBUG_PHP]) && $_GET [AI_URL_DEBUG_PHP] != '') {
  if (isset ($_COOKIE ['AI_WP_DEBUGGING'])) {
    ini_set ('display_errors', 1);
    error_reporting (E_ALL);
  }
}

$version_array = explode (".", AD_INSERTER_VERSION);
$version_string = "";
foreach ($version_array as $number) {
  $version_string .= sprintf ("%02d", $number);
}

$ai_wp_data [AI_WP_DEBUGGING] = 0;
$ai_wp_data [AI_WP_URL] = remove_parameters_from_url ($_SERVER ['REQUEST_URI']);

if (!is_admin()) {
  if (!isset ($_GET [AI_URL_DEBUG]))
    if (isset ($_GET [AI_URL_DEBUG_PROCESSING]) || (isset ($_COOKIE ['AI_WP_DEBUGGING']) && ($_COOKIE ['AI_WP_DEBUGGING'] & AI_DEBUG_PROCESSING) != 0))  {
      if (!isset ($_GET [AI_URL_DEBUG_PROCESSING]) || $_GET [AI_URL_DEBUG_PROCESSING] == 1) {
        $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_PROCESSING;

        $ai_total_plugin_time = 0;
        $start_time = microtime ();
        $ai_total_php_time = 0;
        $ai_last_time = microtime ();
        $ai_processing_log = array ();
        ai_log ("INITIALIZATION START");
      }
    }
}

$ad_interter_globals = array ();
$block_object = array ();

ai_load_settings ();

if (isset ($_GET [AI_URL_DEBUG_PHP]) && $_GET [AI_URL_DEBUG_PHP] != '') {
  if (get_remote_debugging ()) {
    ini_set ('display_errors', 1);
    error_reporting (E_ALL);
  }
}

if (function_exists ('ai_load_globals')) ai_load_globals ();

if (get_dynamic_blocks ()) {
  if (!in_array ('w3-total-cache/w3-total-cache.php', get_option ('active_plugins'))) {
    define ('AI_NO_W3TC', true);
    if (!defined ('W3TC_DYNAMIC_SECURITY')) define ('W3TC_DYNAMIC_SECURITY', 'W3 Total Cache plugin not active');
  }
  if (!defined ('W3TC_DYNAMIC_SECURITY')) {
    $string = AD_INSERTER_PLUGIN_DIR;
    if (defined ('AUTH_KEY'))      $string .= AUTH_KEY;
    if (defined ('LOGGED_IN_KEY')) $string .= LOGGED_IN_KEY;

    define ('W3TC_DYNAMIC_SECURITY', md5 ($string));
  }
}

$ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_NONE;
$ai_wp_data [AI_WP_USER]      = AI_USER_NOT_SET;
$ai_wp_data [AI_CONTEXT]      = AI_CONTEXT_NONE;
$ai_wp_data [SERVER_SIDE_DETECTION] = false;
$ai_wp_data [CLIENT_SIDE_DETECTION] = false;

for ($counter = 1; $counter <= AD_INSERTER_BLOCKS; $counter ++) {
  $obj = $block_object [$counter];

  if ($obj->get_detection_server_side())  $ai_wp_data [SERVER_SIDE_DETECTION] = true;
  if ($obj->get_detection_client_side ()) $ai_wp_data [CLIENT_SIDE_DETECTION] = true;
}

$adH  = $block_object [AI_HEADER_OPTION_NAME];
$adF  = $block_object [AI_FOOTER_OPTION_NAME];
if ($adH->get_detection_server_side())  $ai_wp_data [SERVER_SIDE_DETECTION] = true;
if ($adF->get_detection_server_side())  $ai_wp_data [SERVER_SIDE_DETECTION] = true;


if ($ai_wp_data [SERVER_SIDE_DETECTION]) {
  require_once AD_INSERTER_PLUGIN_DIR.'includes/Mobile_Detect.php';

  $detect = new ai_Mobile_Detect;

  define ('AI_MOBILE',   $detect->isMobile ());
  define ('AI_TABLET',   $detect->isTablet ());
  define ('AI_PHONE',    AI_MOBILE && !AI_TABLET);
  define ('AI_DESKTOP',  !AI_MOBILE);
} else {
    define ('AI_MOBILE',   true);
    define ('AI_TABLET',   true);
    define ('AI_PHONE',    true);
    define ('AI_DESKTOP',  true);
  }

if (isset ($_POST [AI_FORM_SAVE]))
  define ('AI_SYNTAX_HIGHLIGHTING', isset ($_POST ["syntax-highlighter-theme"]) && $_POST ["syntax-highlighter-theme"] != AI_OPTION_DISABLED); else
    define ('AI_SYNTAX_HIGHLIGHTING', $ai_db_options [AI_GLOBAL_OPTION_NAME]["SYNTAX_HIGHLIGHTER_THEME"] != AI_OPTION_DISABLED);

add_action ('admin_menu',         'ai_admin_menu_hook');

add_action ('init',               'ai_init_hook');
//add_action ('admin_notices',      'ai_admin_notice_hook');

add_action( 'wp',                 'ai_wp_hook');

if ($adH->get_enable_manual () ||
    $ai_wp_data [CLIENT_SIDE_DETECTION] ||
    get_remote_debugging () ||
    ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != 0)
  add_action ('wp_head',            'ai_wp_head_hook');

if ($adF->get_enable_manual () || get_dynamic_blocks () == AI_DYNAMIC_BLOCKS_CLIENT_SIDE)
  add_action ('wp_footer',          'ai_wp_footer_hook');

if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0)
  add_action ('shutdown',          'ai_shutdown_hook');

add_action ('widgets_init',       'ai_widgets_init_hook');
add_action ('add_meta_boxes',     'ai_add_meta_box_hook');
add_action ('save_post',          'ai_save_meta_box_data_hook');

if (function_exists ('ai_hooks')) ai_hooks ();

add_filter ('plugin_action_links_'.plugin_basename (__FILE__), 'ai_plugin_action_links');
add_filter ('plugin_row_meta',            'ai_set_plugin_meta', 10, 2);
add_action ('wp_ajax_ai_data',            'ai_data');
add_action ('wp_ajax_nopriv_ai_data',     'ai_data');

if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
  $ai_total_plugin_time += microtime () - $start_time;
  ai_log ("INITIALIZATION END\n");
}



function ai_toolbar ($wp_admin_bar) {
  global $block_object, $ai_wp_data;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) == 0) $debug_blocks = 1; else $debug_blocks = 0;
  $debug_blocks_class = $debug_blocks == 0 ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) == 0) $debug_positions = 0; else $debug_positions = '';
  $debug_positions_class = $debug_positions === '' ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_TAGS) == 0) $debug_tags = 1; else $debug_tags = 0;
  $debug_tags_class = $debug_tags == 0 ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) == 0) $debug_processing = 1; else $debug_processing = 0;
  $debug_processing_class = $debug_processing == 0 ? ' on' : '';

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) $debug_no_insertion = 1; else $debug_no_insertion = 0;
  $debug_no_insertion_class = $debug_no_insertion == 0 ? ' on' : '';

  $debug_settings_on = $debug_blocks == 0 || $debug_positions === '' || $debug_tags == 0 || $debug_processing == 0 || $debug_no_insertion == 0;

  $debug_settings_class = $debug_settings_on ? ' on' : '';
  $top_menu_url = $debug_settings_on ? add_query_arg (AI_URL_DEBUG, '0', remove_parameters_from_url ($_SERVER ['REQUEST_URI'])) :
                                       add_query_arg (array (AI_URL_DEBUG_BLOCKS => '1', AI_URL_DEBUG_POSITIONS => '0', AI_URL_DEBUG_TAGS => '1'), remove_parameters_from_url ($_SERVER ['REQUEST_URI']));

  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar',
    'group' => true
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-settings',
    'parent' => 'ai-toolbar',
    'title' => '<span class="ab-icon'.$debug_settings_class.'"></span>'.AD_INSERTER_NAME,
    'href' => $top_menu_url,
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-blocks',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_blocks_class.'"></span>Label Blocks',
    'href' => set_url_parameter (AI_URL_DEBUG_BLOCKS, $debug_blocks),
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-positions',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_positions_class.'"></span>Show Positions',
    'href' => set_url_parameter (AI_URL_DEBUG_POSITIONS, $debug_positions),
  ));

  $paragraph_blocks = array ();
  for ($block = 0; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $obj = $block_object [$block];
    $display = $obj->get_display_type();
    if ($block == 0 || $display == AD_SELECT_BEFORE_PARAGRAPH || $display == AD_SELECT_AFTER_PARAGRAPH) {

      $block_tags = trim ($block_object [$block]->get_paragraph_tags ());
      $direction = $block_object [$block]->get_direction_type() == AD_DIRECTION_FROM_TOP ? 't' : 'b';
      $paragraph_min_words = intval ($obj->get_minimum_paragraph_words());
      $paragraph_max_words = intval ($obj->get_maximum_paragraph_words());
      $paragraph_text_type = $obj->get_paragraph_text_type ();
      $paragraph_text = trim (html_entity_decode ($obj->get_paragraph_text()));
      $inside_blockquote = $obj->get_count_inside_blockquote ();

      if ($block_tags != '') {
        $found = false;
        foreach ($paragraph_blocks as $index => $paragraph_block) {
          if ($paragraph_block ['tags']       == $block_tags &&
              $paragraph_block ['direction']  == $direction &&
              $paragraph_block ['min']        == $paragraph_min_words &&
              $paragraph_block ['max']        == $paragraph_max_words &&
              $paragraph_block ['text_type']  == $paragraph_text_type &&
              $paragraph_block ['text']       == $paragraph_text &&
              $paragraph_block ['blockquote'] == $inside_blockquote
             ) {
            $found = true;
            break;
          }
        }
        if ($found) array_push ($paragraph_blocks [$index]['blocks'], $block); else
          $paragraph_blocks []= array ('blocks' => array ($block),
            'tags'        => $block_tags,
            'direction'   => $direction,
            'min'         => $paragraph_min_words,
            'max'         => $paragraph_max_words,
            'text_type'   => $paragraph_text_type,
            'text'        => $paragraph_text,
            'blockquote'  => $inside_blockquote,
          );
      }
    }
  }

  foreach ($paragraph_blocks as $index => $paragraph_block) {
    $block_class = $debug_positions === '' && in_array ($ai_wp_data [AI_WP_DEBUG_BLOCK], $paragraph_block ['blocks']) ? ' on' : '';
    $wp_admin_bar->add_node (array (
      'id' => 'ai-toolbar-positions-'.$index,
      'parent' => 'ai-toolbar-positions',
      'title' => '<span class="ab-icon'.$block_class.'"></span>'.
         $paragraph_block ['tags'].
        ($paragraph_block ['direction'] == 'b' ? ' <span class="dashicons dashicons-arrow-up-alt up-icon"></span>' : '').
        ($paragraph_block ['min'] != 0 ? ' min '.$paragraph_block ['min']. ' ' : '').
        ($paragraph_block ['max'] != 0 ? ' max '.$paragraph_block ['max']. ' ' : '').
        ($paragraph_block ['blockquote']  ? ' blockquote ' : '').
        ($paragraph_block ['text'] != '' ? ($paragraph_block ['text_type'] == AD_DO_NOT_CONTAIN ? ' NC ' : ' C ').' '.$paragraph_block ['text'] : ''),
      'href' => set_url_parameter (AI_URL_DEBUG_POSITIONS, $paragraph_block ['blocks'][0]),
    ));
  }

  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-tags',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_tags_class.'"></span>Show HTML Tags',
    'href' => set_url_parameter (AI_URL_DEBUG_TAGS, $debug_tags),
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-no-insertion',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_no_insertion_class.'"></span>Disable Insertion',
    'href' => set_url_parameter (AI_URL_DEBUG_NO_INSERTION, $debug_no_insertion),
  ));
  $wp_admin_bar->add_node (array (
    'id' => 'ai-toolbar-processing',
    'parent' => 'ai-toolbar-settings',
    'title' => '<span class="ab-icon'.$debug_processing_class.'"></span>Log Processing',
    'href' => set_url_parameter (AI_URL_DEBUG_PROCESSING, $debug_processing),
  ));
}

function set_user () {
  global $ai_wp_data;

  if ($ai_wp_data [AI_WP_USER] != AI_USER_NOT_SET) return;

  $ai_wp_data [AI_WP_USER] = AI_USER_NOT_LOGGED_IN;

  if (is_user_logged_in ())       $ai_wp_data [AI_WP_USER] |= AI_USER_LOGGED_IN;
  if (current_user_role () >= 5)  $ai_wp_data [AI_WP_USER] |= AI_USER_ADMINISTRATOR;

//  if (isset ($_GET [AI_URL_DEBUG_USER]) && $_GET [AI_URL_DEBUG_USER] != 0) $ai_wp_data [AI_WP_USER] = $_GET [AI_URL_DEBUG_USER];
}

function set_page_type () {
  global $ai_wp_data;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_NONE) return;

  if (is_admin())           $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_ADMIN;
  elseif (is_feed())        $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_FEED;
  elseif (is_404())         $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_404;
  elseif (is_front_page ()) $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_HOMEPAGE;
  elseif (is_page())        $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_STATIC;
  elseif (is_single())      $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_POST;
  elseif (is_category())    $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_CATEGORY;
  elseif (is_search())      $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_SEARCH;
  elseif (is_archive())     $ai_wp_data [AI_WP_PAGE_TYPE] = AI_PT_ARCHIVE;
}

function ai_log_message ($message) {
  global $ai_last_time, $ai_processing_log;
  $ai_processing_log []= rtrim (sprintf ("%4d  %-50s", (microtime () - $ai_last_time) * 1000, $message));
}

function ai_log_filter_content ($content_string) {

  $content_string = preg_replace ("/\[\[AI_[A|B]P([\d].?)\]\]/", "", $content_string);
  return str_replace (array ("<!--", "-->", "\n", "\r"), array ("[!--", "--]", "*n", "*r"), $content_string);
}

function ai_log_content (&$content) {
  if (strlen ($content) < 100) ai_log (ai_log_filter_content ($content) . '  ['.number_of_words ($content).']'); else
    ai_log (ai_log_filter_content (substr ($content, 0, 60)) . ' ... ' . ai_log_filter_content (substr ($content, - 60)) . '  ['.number_of_words ($content).']');
}

function ai_log_block_status ($block, $ai_last_check) {
  global $block_object;

  if ($block < 1 || $block > AD_INSERTER_BLOCKS) $block = 0;

  if ($ai_last_check == AI_CHECK_INSERTED) return "BLOCK $block INSERTED";
  $status = "BLOCK $block FAILED CHECK: ";
  $obj = $block_object [$block];
  switch ($ai_last_check) {
    case AI_CHECK_PAGE_TYPE_FRONT_PAGE:  $status .= "ENABLED ON HOMEPAGE"; break;
    case AI_CHECK_PAGE_TYPE_STATIC_PAGE: $status .= "ENABLED ON STATIC PAGE"; break;
    case AI_CHECK_PAGE_TYPE_POST:        $status .= "ENABLED ON POST"; break;
    case AI_CHECK_PAGE_TYPE_CATEGORY:    $status .= "ENABLED ON CATEGORY"; break;
    case AI_CHECK_PAGE_TYPE_SEARCH:      $status .= "ENABLED ON SEARCH"; break;
    case AI_CHECK_PAGE_TYPE_ARCHIVE:     $status .= "ENABLED ON ARCHIVE"; break;
    case AI_CHECK_PAGE_TYPE_FEED:        $status .= "ENABLED ON FEED"; break;
    case AI_CHECK_PAGE_TYPE_404:         $status .= "ENABLED ON 404"; break;


    case AI_CHECK_DESKTOP_DEVICES:          $status .= "DESKTOP DEVICES"; break;
    case AI_CHECK_MOBILE_DEVICES:           $status .= "MOBILE DEVICES"; break;
    case AI_CHECK_TABLET_DEVICES:           $status .= "TABLET DEVICES"; break;
    case AI_CHECK_PHONE_DEVICES:            $status .= "PHONE DEVICES"; break;
    case AI_CHECK_DESKTOP_TABLET_DEVICES:   $status .= "DESKTOP TABLET DEVICES"; break;
    case AI_CHECK_DESKTOP_PHONE_DEVICES:    $status .= "DESKTOP PHONE DEVICES"; break;

    case AI_CHECK_CATEGORY:                 $status .= "CATEGORY"; break;
    case AI_CHECK_TAG:                      $status .= "TAG"; break;
    case AI_CHECK_ID:                       $status .= "ID"; break;
    case AI_CHECK_URL:                      $status .= "URL"; break;
    case AI_CHECK_URL_PARAMETER:            $status .= "URL PARAMETER"; break;
    case AI_CHECK_REFERER:                  $status .= "REFERER ". $obj->get_ad_domain_list(); break;
    case AI_CHECK_IP_ADDRESS:               $status .= "IP ADDRESS ". $obj->get_ad_ip_address_list(); break;
    case AI_CHECK_COUNTRY:                  $status .= "COUNTRY ". $obj->get_ad_country_list (true); break;
    case AI_CHECK_SCHEDULING:               $status .= "SCHEDULING"; break;
    case AI_CHECK_CODE:                     $status .= "CODE NOT EMPTY"; break;
    case AI_CHECK_LOGGED_IN_USER:           $status .= "LOGGED-IN USER"; break;
    case AI_CHECK_NOT_LOGGED_IN_USER:       $status .= "NOT LOGGED-IN USER"; break;
    case AI_CHECK_ADMINISTRATOR:            $status .= "ADMINISTRATOR"; break;

    case AI_CHECK_ENABLED_ON_ALL_EXCEPT_ON_SELECTED: $status .= "ENABLED ON ALL EXCEPT ON SELECTED"; break;
    case AI_CHECK_ENABLED_ONLY_ON_SELECTED:          $status .= "ENABLED ONLY ON SELECTED"; break;
    case AI_CHECK_DISABLED_MANUALLY:        $status .= "DISABLED BY HTML COMMENT"; break;

    case AI_CHECK_MAX_INSERTIONS:           $status .= "MAX INSERTIONS " . $obj->get_maximum_insertions (); break;
    case AI_CHECK_FILTER:                   $status .= "FILTER " . $obj->get_call_filter(); break;
    case AI_CHECK_PARAGRAPH_COUNTING:       $status .= "PARAGRAPH COUNTING"; break;
    case AI_CHECK_NUMBER_OF_WORDS:          $status .= "NUMBER OF WORDS"; break;
    case AI_CHECK_DEBUG_NO_INSERTION:       $status .= "DEBUG NO INSERTION"; break;
    case AI_CHECK_PARAGRAPH_TAGS:           $status .= "PARAGRAPH TAGS"; break;
    case AI_CHECK_PARAGRAPHS_WITH_TAGS:     $status .= "PARAGRAPHS WITH TAGS"; break;
    case AI_CHECK_PARAGRAPHS_AFTER_BLOCKQUOTE:       $status .= "PARAGRAPHS AFTER BLOCKQUOTE"; break;
    case AI_CHECK_PARAGRAPHS_AFTER_MIN_MAX_WORDS:    $status .= "PARAGRAPHS AFTER MIN MAX WORDS"; break;
    case AI_CHECK_PARAGRAPHS_AFTER_TEXT:             $status .= "PARAGRAPHS AFTER TEXT"; break;
    case AI_CHECK_PARAGRAPHS_AFTER_CLEARANCE:        $status .= "PARAGRAPHS AFTER CLEARANCE"; break;
    case AI_CHECK_PARAGRAPHS_MIN_NUMBER:             $status .= "PARAGRAPHS MIN NUMBER"; break;

    case AI_CHECK_DO_NOT_INSERT:            $status .= "PARAGRAPH CLEARANCE"; break;
    case AI_CHECK_AD_ABOVE:                 $status .= "PARAGRAPH CLEARANCE ABOVE"; break;
    case AI_CHECK_AD_BELOW:                 $status .= "PARAGRAPH CLEARANCE BELOW"; break;
    case AI_CHECK_SHORTCODE_ATTRIBUTES:     $status .= "SHORTCODE ATTRIBUTES"; break;

    case AI_CHECK_ENABLED:                  $status .= "ENABLED"; break;
    case AI_CHECK_NONE:                     $status = "BLOCK $block"; break;
    default: $status .= "?"; break;
  }
  $ai_last_check = AI_CHECK_NONE;
  return $status;
}

function ai_log ($message = "") {
  global $ai_last_time, $ai_processing_log;

  if ($message != "") {
    if ($message [strlen ($message) - 1] == "\n") {
      ai_log_message (str_replace ("\n", "", $message));
      $ai_processing_log []= "";
    } else ai_log_message ($message);
  } else $ai_processing_log []= "";
  $ai_last_time = microtime ();
}

function remove_parameters_from_url ($url, $parameter = '') {
  if ($parameter == '')
    $parameters = array (AI_URL_DEBUG, AI_URL_DEBUG_PROCESSING, AI_URL_DEBUG_BLOCKS, AI_URL_DEBUG_USER, AI_URL_DEBUG_TAGS, AI_URL_DEBUG_POSITIONS, AI_URL_DEBUG_NO_INSERTION); else
      $parameters = array ($parameter);

  foreach ($parameters as $parameter) {
    if (stripos ($url, '?'.$parameter.'=') !== false) {
      $url = preg_replace ("/".$parameter."=[^&]*/", "", $url);
      $url = rtrim (str_replace ('?&', '?', $url), "?");
    }
    elseif (stripos ($url, "&".$parameter."=") !== false)
      $url = preg_replace ("/&".$parameter."=[^&]*/", "", $url);
  }

  return $url;
}

function current_url () {
  if (isset ($_SERVER ["HTTPS"]) && $_SERVER ["HTTPS"] == "on")
    $url = "https://"; else
      $url = "http://";
  $url .= $_SERVER ['SERVER_NAME'];
  if($_SERVER['SERVER_PORT'] != 80)
    $url .= ":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
      $url .= $_SERVER["REQUEST_URI"];
  return $url;
}

function set_url_parameter ($parameter, $value) {
  $url = remove_parameters_from_url (current_url ());

  if (stripos ($url, $parameter) !== false) {
    $url = preg_replace ("/($parameter=[^&]*)/", $parameter .'=' . $value, $url);
  } else {
      if (strpos ($url, '?') !== false)
        $url .= '&' . $parameter .'=' . $value; else
          $url .= '?' . $parameter .'=' . $value;
    }
  return $url;
}

function number_of_words (&$content) {
  $text = str_replace ("\r", "", $content);
  $text = str_replace (array ("\n", "  "), " ", $text);
  $text = str_replace ("  ", " ", $text);
  $text = strip_tags ($text);
  return count (explode (" ", $text));
}

function ai_wp_hook () {
  global $ai_wp_data, $ai_db_options_extract, $ai_total_plugin_time;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    ai_log ("WP HOOK START");
    $start_time = microtime ();
  }

  set_page_type ();
  set_user ();

  if ($ai_wp_data [AI_WP_PAGE_TYPE] != AI_PT_ADMIN &&
      ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != 0 &&
      get_admin_toolbar_debugging () &&
      (!is_multisite() || is_main_site () || multisite_settings_page_enabled ()))
    add_action ('admin_bar_menu', 'ai_toolbar', 20);

  $url_debugging = get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != 0;

  if (!is_admin()) {
    if (isset ($_GET [AI_URL_DEBUG]) && $_GET [AI_URL_DEBUG] == 0) {
      if (isset ($_COOKIE ['AI_WP_DEBUGGING'])) {
        unset ($_COOKIE ['AI_WP_DEBUGGING']);
        setcookie ('AI_WP_DEBUGGING', '', time() - (15 * 60), COOKIEPATH);
      }
      if (isset ($_COOKIE ['AI_WP_DEBUG_BLOCK'])) {
        unset ($_COOKIE ['AI_WP_DEBUG_BLOCK']);
        setcookie ('AI_WP_DEBUG_BLOCK', '', time() - (15 * 60), COOKIEPATH);
      }
    } else {
        $ai_wp_data [AI_WP_DEBUGGING]   = isset ($_COOKIE ['AI_WP_DEBUGGING'])   ? $ai_wp_data [AI_WP_DEBUGGING] | ($_COOKIE ['AI_WP_DEBUGGING'] & ~AI_DEBUG_PROCESSING) : $ai_wp_data [AI_WP_DEBUGGING];
        $ai_wp_data [AI_WP_DEBUG_BLOCK] = isset ($_COOKIE ['AI_WP_DEBUG_BLOCK']) ? $_COOKIE ['AI_WP_DEBUG_BLOCK'] : 0;

        if (isset ($_GET [AI_URL_DEBUG_BLOCKS]))
          if ($_GET [AI_URL_DEBUG_BLOCKS] && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_BLOCKS; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_BLOCKS;

        if (isset ($_GET [AI_URL_DEBUG_TAGS]))
          if ($_GET [AI_URL_DEBUG_TAGS] && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_TAGS; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_TAGS;

        if (isset ($_GET [AI_URL_DEBUG_NO_INSERTION]))
          if ($_GET [AI_URL_DEBUG_NO_INSERTION] && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_NO_INSERTION; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_NO_INSERTION;

        if (isset ($_GET [AI_URL_DEBUG_POSITIONS])) {
          if ($_GET [AI_URL_DEBUG_POSITIONS] !== '' && $url_debugging) $ai_wp_data [AI_WP_DEBUGGING] |= AI_DEBUG_POSITIONS; else $ai_wp_data [AI_WP_DEBUGGING] &= ~AI_DEBUG_POSITIONS;
          if (is_numeric ($_GET [AI_URL_DEBUG_POSITIONS])) $ai_wp_data [AI_WP_DEBUG_BLOCK] = intval ($_GET [AI_URL_DEBUG_POSITIONS]);
          if ($ai_wp_data [AI_WP_DEBUG_BLOCK] < 0 || $ai_wp_data [AI_WP_DEBUG_BLOCK] > AD_INSERTER_BLOCKS) $ai_wp_data [AI_WP_DEBUG_BLOCK] = 0;
        }

        if ($ai_wp_data [AI_WP_DEBUGGING] != 0)
          setcookie ('AI_WP_DEBUGGING',   $ai_wp_data [AI_WP_DEBUGGING],   time() + AI_COOKIE_TIME, COOKIEPATH); else
             if (isset ($_COOKIE ['AI_WP_DEBUGGING'])) setcookie ('AI_WP_DEBUGGING', '', time() - (15 * 60), COOKIEPATH);

        if ($ai_wp_data [AI_WP_DEBUG_BLOCK] != 0)
          setcookie ('AI_WP_DEBUG_BLOCK', $ai_wp_data [AI_WP_DEBUG_BLOCK], time() + AI_COOKIE_TIME, COOKIEPATH); else
            if (isset ($_COOKIE ['AI_WP_DEBUG_BLOCK'])) setcookie ('AI_WP_DEBUG_BLOCK', '', time() - (15 * 60), COOKIEPATH);
      }
  }

  $debug_positions             = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0;
  $debug_tags_positions        = ($ai_wp_data [AI_WP_DEBUGGING] & (AI_DEBUG_POSITIONS | AI_DEBUG_TAGS)) != 0;
  $debug_tags_positions_blocks = ($ai_wp_data [AI_WP_DEBUGGING] & (AI_DEBUG_POSITIONS | AI_DEBUG_TAGS | AI_DEBUG_BLOCKS)) != 0;

  $plugin_priority = get_plugin_priority ();
  if (isset ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_tags_positions)
    add_filter ('the_content',        'ai_content_hook', $plugin_priority);

  if (isset ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_tags_positions_blocks)
    add_filter ('the_excerpt',        'ai_excerpt_hook', $plugin_priority);

  if (isset ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_positions)
    add_action ('loop_start',         'ai_loop_start_hook');

  if (isset ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) && count ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) != 0 || $debug_positions)
    add_action ('loop_end',           'ai_loop_end_hook');

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    $ai_total_plugin_time += microtime () - $start_time;
    ai_log ("WP HOOK END\n");
  }
};

function ai_init_hook() {
  global $block_object, $ai_wp_data;

  add_shortcode ('adinserter', 'process_shortcodes');
}

function ai_admin_menu_hook () {
  global $ai_settings_page;

  if (is_multisite() && !is_main_site () && !multisite_settings_page_enabled ()) return;

  $ai_settings_page = add_submenu_page ('options-general.php', AD_INSERTER_NAME.' Options', AD_INSERTER_NAME, 'manage_options', basename(__FILE__), 'ai_settings');
  add_action ('admin_enqueue_scripts', 'ai_admin_enqueue_scripts');
}


function ai_admin_enqueue_scripts ($hook_suffix) {
  global $ai_settings_page;

  if ($hook_suffix == $ai_settings_page) {
    wp_enqueue_script ('ai-admin-js',        plugins_url ('js/ad-inserter.js', __FILE__), array (
      'jquery',
      'jquery-ui-tabs',
      'jquery-ui-button',
      'jquery-ui-tooltip',
      'jquery-ui-datepicker',
     ), AD_INSERTER_VERSION);
    wp_enqueue_style  ('ai-admin-jquery-ui',    plugins_url ('css/jquery-ui-1.10.3.custom.min.css', __FILE__),        array (), null);

    if (function_exists ('ai_admin_enqueue_scripts_1')) ai_admin_enqueue_scripts_1 ();

    wp_enqueue_style  ('ai-admin',              plugins_url ('css/ad-inserter.css', __FILE__),                        array (), AD_INSERTER_VERSION);

//    wp_add_inline_style ('ai-admin', AI_SETTINGS_STYLE);

    if (function_exists ('ai_admin_enqueue_scripts_2')) ai_admin_enqueue_scripts_2 ();

    if (AI_SYNTAX_HIGHLIGHTING) {
      wp_enqueue_script ('ai-ace',                plugins_url ('includes/ace/src-min-noconflict/ace.js', __FILE__ ),          array (), AD_INSERTER_VERSION, true);
      wp_enqueue_script ('ai-ace-ext-modelist',   plugins_url ('includes/ace/src-min-noconflict/ext-modelist.js', __FILE__ ), array (), AD_INSERTER_VERSION, true);
    }
  }
}

function add_head_inline_styles_and_scripts () {
  global $ai_wp_data;

  if ($ai_wp_data [CLIENT_SIDE_DETECTION] || get_admin_toolbar_debugging () && (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != 0)) {
    echo "<style type='text/css'>\n";

  if ($ai_wp_data [CLIENT_SIDE_DETECTION])
    echo get_viewport_css ();

  if (get_admin_toolbar_debugging () && (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != 0))
    echo "#wp-admin-bar-ai-toolbar-settings .ab-icon:before {
  content: '\\f111';
  top: 2px;
  color: rgba(240,245,250,.6)!important;
}
#wp-admin-bar-ai-toolbar-settings-default .ab-icon:before {
  top: 0px;
}
#wp-admin-bar-ai-toolbar-settings .ab-icon.on:before {
  color: #00f200!important;
}
#wp-admin-bar-ai-toolbar-settings-default li, #wp-admin-bar-ai-toolbar-settings-default a,
#wp-admin-bar-ai-toolbar-settings-default li:hover, #wp-admin-bar-ai-toolbar-settings-default a:hover {
  border: 1px solid transparent;
}
#wp-admin-bar-ai-toolbar-blocks .ab-icon:before {
  content: '\\f135';
}
#wp-admin-bar-ai-toolbar-positions .ab-icon:before {
  content: '\\f207';
}
#wp-admin-bar-ai-toolbar-positions-default .ab-icon:before {
  content: '\\f522';
}
#wp-admin-bar-ai-toolbar-tags .ab-icon:before {
  content: '\\f475';
}
#wp-admin-bar-ai-toolbar-no-insertion .ab-icon:before {
  content: '\\f214';
}
#wp-admin-bar-ai-toolbar-processing .ab-icon:before {
  content: '\\f464';
}
#wp-admin-bar-ai-toolbar-positions span.up-icon {
  padding-top: 2px;
}
#wp-admin-bar-ai-toolbar-positions .up-icon:before {
  font: 400 20px/1 dashicons;
}
";

    echo "</style>\n";
  }
}

function add_footer_inline_scripts () {

  if (get_dynamic_blocks () == AI_DYNAMIC_BLOCKS_CLIENT_SIDE) {
    echo "<script type='text/javascript'>\n";

//  $rotation_script = '  jQuery (function ($) {
//    $("div.ai-rotate").each (function () {
//      var rotate_options = $(".ai-rotate-option", this);
//      var random_index = Math.floor (Math.random () * rotate_options.length);
//      rotate_options.hide ();
//      $(rotate_options [random_index]).css ({"display": "", "visibility": "", "position": "", "width": "", "height": "", "top": "", "left": ""});
//      $(this).css ({"position": ""});
//    });
//  });
//';

    echo 'jQuery(function($){$("div.ai-rotate").each(function(){var rotate_options=$(".ai-rotate-option",this);var random_index=Math.floor(Math.random()*rotate_options.length);rotate_options.hide();$(rotate_options[random_index]).css({"display":"","visibility":"","position":"","width":"","height":"","top":"","left":""});$(this).css({"position":""})})});';

//  $ip_address_detection_script = '  jQuery (function ($) {
//    function getParameterByName (name, url) {
//      if (!url) {
//        url = window.location.href;
//      }
//      name = name.replace(/[\[\]]/g, "\\$&");
//      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
//          results = regex.exec(url);
//      if (!results) return null;
//      if (!results[2]) return "";
//      return decodeURIComponent(results[2].replace(/\+/g, " "));
//    }

//    var nonce = "'.wp_create_nonce ("adinserter_data").'";
//    var site_url = "'.wp_make_link_relative (get_site_url()).'";
//    var page = site_url+"/wp-admin/admin-ajax.php?action=ai_data&ip-data=ip-address-country&ai_check=" + nonce;

//    var debug_ip_address = getParameterByName ("ai-debug-ip-address");
//    if (debug_ip_address != null) page += "&ai-debug-ip-address=" + debug_ip_address;
//    var debug_ip_address = getParameterByName ("ai-debug-country");
//    if (debug_ip_address != null) page += "&ai-debug-country=" + debug_ip_address;

//    var enable_block = false;

//    $.get (page, function (ip_data) {

//      $("div.ai-ip-data").each (function () {
//        var ip_data_array = ip_data.split (",");
//        var ip_address  = ip_data_array [0];
//        var country     = ip_data_array [1];
//        var block_div = $("." + $(this).attr ("class-name"));

//        enable_block = true;
//        var found = false;

//        var ip_addresses_list = $(this).attr ("ip-addresses");
//        if (typeof ip_addresses_list != "undefined") {
//          var ip_address_array      = ip_addresses_list.split (",");
//          var ip_address_list_type  = $(this).attr ("ip-address-list");

//          $.each (ip_address_array, function (index, list_ip_address) {
//            if (list_ip_address.charAt (0) == "*") {
//              if (list_ip_address.charAt (list_ip_address.length - 1) == "*") {
//                list_ip_address = list_ip_address.substr (1, list_ip_address.length - 2);
//                if (ip_address.indexOf (list_ip_address) != - 1) {
//                  found = true;
//                  return false;
//                }
//              } else {
//                  list_ip_address = list_ip_address.substr (1);
//                  if (ip_address.substr (- list_ip_address.length) == list_ip_address) {
//                    found = true;
//                    return false;
//                  }
//                }
//            }
//            else if (list_ip_address.charAt (list_ip_address.length - 1) == "*") {
//              list_ip_address = list_ip_address.substr (0, list_ip_address.length - 1);
//              if (ip_address.indexOf (list_ip_address) == 0) {
//                found = true;
//                return false;
//              }
//            }
//            else if (list_ip_address == "#" && ip_address == "") {
//              found = true;
//              return false;
//            }

//            else if (list_ip_address == ip_address) {
//              found = true;
//              return false;
//            }
//          });

//          switch (ip_address_list_type) {
//            case "B":
//              if (found) enable_block = false;
//              break;
//            case "W":
//              if (!found) enable_block = false;
//              break;
//          }
//        }

//        if (enable_block) {
//          var countries_list = $(this).attr ("countries");
//          if (typeof countries_list != "undefined") {
//            var country_array         = countries_list.split (",");
//            var country_list_type     = $(this).attr ("country-list");

//            var found = false;

//            $.each (country_array, function (index, list_country) {
//              if (list_country == country) {
//                found = true;
//                return false;
//              }
//            });
//            switch (country_list_type) {
//              case "B":
//                if (found) enable_block = false;
//                break;
//              case "W":
//                if (!found) enable_block = false;
//                break;
//            }
//          }
//        }

//        $(this).css ({"visibility": "", "position": "", "width": "", "height": "", "z-index": ""});
//        block_div.css ({"visibility": "", "position": "", "z-index": ""});
//        if (!enable_block) {
//          $(this).hide ();
//          block_div.hide ();
//        }
//      });
//    }).fail (function() {
//      $("div.ai-ip-data").each (function () {
//        $(this).css ({"display": "none", "visibility": "", "position": "", "width": "", "height": "", "z-index": ""});
//      });
//    });
//  });
//';

    echo 'jQuery(function($){function getParameterByName(name,url){if(!url)url=window.location.href;name=name.replace(/[\[\]]/g,"\\$&");var regex=new RegExp("[?&]"+name+"(=([^&#]*)|&|#|$)"),results=regex.exec(url);if(!results)return null;if(!results[2])return"";return decodeURIComponent(results[2].replace(/\+/g," "))}var nonce="'.wp_create_nonce ("adinserter_data").'";var site_url="'.wp_make_link_relative (get_site_url()).'";var page=site_url+"/wp-admin/admin-ajax.php?action=ai_data&ip-data=ip-address-country&ai_check="+nonce;var debug_ip_address=getParameterByName("ai-debug-ip-address");
if(debug_ip_address!=null)page+="&ai-debug-ip-address="+debug_ip_address;var debug_ip_address=getParameterByName("ai-debug-country");if(debug_ip_address!=null)page+="&ai-debug-country="+debug_ip_address;var enable_block=false;$.get(page,function(ip_data){$("div.ai-ip-data").each(function(){var ip_data_array=ip_data.split(",");var ip_address=ip_data_array[0];var country=ip_data_array[1];var block_div=$("."+$(this).attr("class-name"));enable_block=true;var found=false;var ip_addresses_list=$(this).attr("ip-addresses");
if(typeof ip_addresses_list!="undefined"){var ip_address_array=ip_addresses_list.split(",");var ip_address_list_type=$(this).attr("ip-address-list");$.each(ip_address_array,function(index,list_ip_address){if(list_ip_address.charAt(0)=="*")if(list_ip_address.charAt(list_ip_address.length-1)=="*"){list_ip_address=list_ip_address.substr(1,list_ip_address.length-2);if(ip_address.indexOf(list_ip_address)!=-1){found=true;return false}}else{list_ip_address=list_ip_address.substr(1);if(ip_address.substr(-list_ip_address.length)==
list_ip_address){found=true;return false}}else if(list_ip_address.charAt(list_ip_address.length-1)=="*"){list_ip_address=list_ip_address.substr(0,list_ip_address.length-1);if(ip_address.indexOf(list_ip_address)==0){found=true;return false}}else if(list_ip_address=="#"&&ip_address==""){found=true;return false}else if(list_ip_address==ip_address){found=true;return false}});switch(ip_address_list_type){case "B":if(found)enable_block=false;break;case "W":if(!found)enable_block=false;break}}if(enable_block){var countries_list=
$(this).attr("countries");if(typeof countries_list!="undefined"){var country_array=countries_list.split(",");var country_list_type=$(this).attr("country-list");var found=false;$.each(country_array,function(index,list_country){if(list_country==country){found=true;return false}});switch(country_list_type){case "B":if(found)enable_block=false;break;case "W":if(!found)enable_block=false;break}}}$(this).css({"visibility":"","position":"","width":"","height":"","z-index":""});block_div.css({"visibility":"",
"position":"","z-index":""});if(!enable_block){$(this).hide();block_div.hide()}})}).fail(function(){$("div.ai-ip-data").each(function(){$(this).css({"display":"none","visibility":"","position":"","width":"","height":"","z-index":""})})})});';


    echo "\n</script>\n";
  }
}

function ai_admin_notice_hook () {
  global $current_screen, $ai_db_options;

//  $sidebar_widgets = wp_get_sidebars_widgets();
//  $sidebars_with_deprecated_widgets = array ();

//  foreach ($sidebar_widgets as $sidebar_widget_index => $sidebar_widget) {
//    if (is_array ($sidebar_widget))
//      foreach ($sidebar_widget as $widget) {
//        if (preg_match ("/ai_widget([\d]+)/", $widget, $widget_number)) {
//          if (isset ($widget_number [1]) && is_numeric ($widget_number [1])) {
//            $is_widget = $ai_db_options [$widget_number [1]][AI_OPTION_DISPLAY_TYPE] == AD_SELECT_WIDGET;
//          } else $is_widget = false;
//          $sidebar_name = $GLOBALS ['wp_registered_sidebars'][$sidebar_widget_index]['name'];
//          if ($is_widget && $sidebar_name != "")
//            $sidebars_with_deprecated_widgets [$sidebar_widget_index] = $sidebar_name;
//        }
//      }
//  }

//  if (!empty ($sidebars_with_deprecated_widgets)) {
//    echo "<div class='error' style='padding: 11px 15px; font-size: 14px;'><strong>Warning</strong>: You are using deprecated Ad Inserter widgets in the following sidebars: ",
//    implode (", ", $sidebars_with_deprecated_widgets),
//    ". Please replace them with the new 'Ad Inserter' code block widget. See <a href='https://wordpress.org/plugins/ad-inserter/faq/' target='_blank'>FAQ</a> for details.</div>";
//  }
}

function ai_plugin_action_links ($links) {
  if (is_multisite() && !is_main_site () && !multisite_settings_page_enabled ()) return $links;

  $settings_link = '<a href="'.admin_url ('options-general.php?page=ad-inserter.php').'">Settings</a>';
  array_unshift ($links, $settings_link);
  return $links;
}

function ai_set_plugin_meta ($links, $file) {
  if ($file == plugin_basename (__FILE__)) {
    if (is_multisite() && !is_main_site ()) {
      foreach ($links as $index => $link) {
        if (stripos ($link, "update") !== false) unset ($links [$index]);
      }
    }
//    if (stripos (AD_INSERTER_NAME, "pro") === false) {
//      $new_links = array ('donate' => '<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LHGZEMRTR7WB4" target="_blank">Donate</a>');
//      $links = array_merge ($links, $new_links);
//    }
  }
  return $links;
}


function current_user_role ($user_role_name = "") {
  $role_values = array ("super-admin" => 6, "administrator" => 5, "editor" => 4, "author" => 3, "contributor" => 2, "subscriber" => 1);
  global $wp_roles;

  if ($user_role_name != "") {
    return isset ($role_values [$user_role_name]) ? $role_values [$user_role_name] : 0;
  }

  $user_role = 0;
  $current_user = wp_get_current_user();
  $roles = $current_user->roles;

  // Fix for empty roles
  if (isset ($current_user->caps) && count ($current_user->caps) != 0) {
    $caps = $current_user->caps;
    foreach ($role_values as $role_name => $role_value) {
      if (isset ($caps [$role_name]) && $caps [$role_name]) $roles []= $role_name;
    }
  }

  foreach ($roles as $role) {
    $current_user_role = isset ($role_values [$role]) ? $role_values [$role] : 0;
    if ($current_user_role > $user_role) $user_role = $current_user_role;
  }

  return $user_role;
}


function ai_current_user_role_ok () {
  return current_user_role () >= current_user_role (get_minimum_user_role ());
}


function ai_add_meta_box_hook() {

  if (!ai_current_user_role_ok ()) return;

  if (is_multisite() && !is_main_site () && !multisite_exceptions_enabled ()) return;

  $screens = array ('post', 'page');

  foreach ($screens as $screen) {
    add_meta_box (
      'adinserter_sectionid',
      AD_INSERTER_NAME.' Exceptions',
      'ai_meta_box_callback',
      $screen
    );
  }
}

function ai_meta_box_callback ($post) {
  global $block_object;

  // Add an nonce field so we can check for it later.
  wp_nonce_field ('adinserter_meta_box', 'adinserter_meta_box_nonce');

  $post_type = get_post_type ($post);

  /*
   * Use get_post_meta() to retrieve an existing value
   * from the database and use the value for the form.
   */
  $post_meta = get_post_meta ($post->ID, '_adinserter_block_exceptions', true);
  $selected_blocks = explode (",", $post_meta);

  echo '<table>';
  echo '<thead style="font-weight: bold;">';
    echo '  <td>Block</td>';
    echo '  <td style="padding: 0 10px 0 10px;">Name</td>';
    echo '  <td style="padding: 0 10px 0 10px;">Automatic Insertion</td>';
    echo '  <td style="padding: 0 5px 0 5px;">Posts</td>';
    echo '  <td style="padding: 0 5px 0 5px;">Pages</td>';
    echo '  <td style="padding: 0 5px 0 5px;">Widget</td>';
    echo '  <td style="padding: 0 5px 0 5px;">Shortcode</td>';
    echo '  <td style="padding: 0 5px 0 5px;">PHP</td>';
    echo '  <td style="padding: 0 10px 0 10px;">Default</td>';
    echo '  <td style="padding: 0 10px 0 10px;">For this ', $post_type, '</td>';
  echo '</thead>';
  echo '<tbody>';
  $rows = 0;
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $obj = $block_object [$block];

    if ($post_type == 'post') {
      $enabled_on_text  = $obj->get_ad_enabled_on_which_posts ();
      $general_enabled  = $obj->get_display_settings_post();
    } else {
        $enabled_on_text = $obj->get_ad_enabled_on_which_pages ();
        $general_enabled = $obj->get_display_settings_page();
      }

    $individual_option_enabled  = $general_enabled && ($enabled_on_text == AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED || $enabled_on_text == AD_ENABLED_ONLY_ON_SELECTED);
    $individual_text_enabled    = $enabled_on_text == AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED;

    $display_type = $obj->get_display_type();
    if ($rows % 2 != 0) $background = "#F0F0F0"; else $background = "#FFF";
    echo '<tr style="background: ', $background, ';">';
    echo '  <td style="text-align: right;">', $obj->number, '</td>';
    if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($block); else $url_parameters = "";
    echo '  <td style="padding: 0 10px 0 10px;"><a href="', admin_url ('options-general.php?page=ad-inserter.php'), $url_parameters, '&tab=', $block, '" target="_blank">', $obj->get_ad_name(), '</a></td>';
    echo '  <td style="padding: 0 10px 0 10px;">', $display_type, '</td>';

    echo '  <td style="padding: 0 10px 0 10px; text-align: center;">';
    if ($obj->get_display_settings_post ()) echo '&check;';
    echo '  </td>';
    echo '  <td style="padding: 0 10px 0 10px; text-align: center;">';
    if ($obj->get_display_settings_page ()) echo '&check;';
    echo '  </td>';
    echo '  <td style="padding: 0 10px 0 10px; text-align: center;">';
    if ($obj->get_enable_widget ()) echo '&check;';
    echo '  </td>';
    echo '  <td style="padding: 0 10px 0 10px; text-align: center;">';
    if ($obj->get_enable_manual ()) echo '&check;';
    echo '  </td>';
    echo '  <td style="padding: 0 10px 0 10px; text-align: center;">';
    if ($obj->get_enable_php_call ()) echo '&check;';
    echo '  </td>';

    echo '  <td style="padding: 0 10px 0 10px; text-align: left;">';

    if ($individual_option_enabled) {
      if ($individual_text_enabled) echo 'Enabled'; else echo 'Disabled';
    } else {
        if ($general_enabled) echo 'Enabled on all ', $post_type, 's'; else
          echo 'Disabled on all ', $post_type, 's';
      }
    echo '  </td>';

    echo '  <td style="padding: 0 10px 0 10px; text-align: left;">';
    if ($individual_option_enabled)
      echo '<input type="checkbox" style="border-radius: 5px;" name="adinserter_selected_block_', $block, '" id="ai-selected-block-', $block, '" value="1"', in_array ($block, $selected_blocks) ? ' checked': '', ' />';
//      else echo 'No exceptions';
    echo '<label for="ai-selected-block-', $block, '">';
    if ($individual_option_enabled) {
      if (!$individual_text_enabled) echo 'Enabled'; else echo 'Disabled';
    }
    echo '</label>';
    echo '  </td>';

    echo '</tr>';
    $rows ++;
  }

  echo '</tbody>';
  echo '</table>';

  echo '<p>Default insertion for all code blocks for ', $post_type, 's can be configured on <a href="', admin_url ('options-general.php?page=ad-inserter.php'), '" target="_blank">', AD_INSERTER_NAME, ' Settings page</a>: enabled or disabled on all ', $post_type, 's (exceptions ignored), enabled or disabled with exceptions set here.';
  echo '<br /><strong>Enabled on all ', $post_type, 's</strong> or <strong>Disabled on all ', $post_type, 's</strong> means that exceptions are not enabled. Use <strong>On all except selected</strong> or <strong>Only on selected</strong> to enable exceptions for each block.</p>';

}

function ai_save_meta_box_data_hook ($post_id) {
  // Check if our nonce is set.
  if (!isset ($_POST ['adinserter_meta_box_nonce'])) return;

  // Verify that the nonce is valid.
  if (!wp_verify_nonce ($_POST ['adinserter_meta_box_nonce'], 'adinserter_meta_box')) return;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if (defined ('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  // Check the user's permissions.

  if (isset ($_POST ['post_type'])) {
    if ($_POST ['post_type'] == 'page') {
      if (!current_user_can ('edit_page', $post_id)) return;
    } else {
      if (!current_user_can ('edit_post', $post_id)) return;
    }
  }

  /* OK, it's safe for us to save the data now. */

  $selected = array ();
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $option_name = 'adinserter_selected_block_' . $block;
    if (isset ($_POST [$option_name]) && $_POST [$option_name]) $selected []= $block;
  }

  // Update the meta field in the database.
  update_post_meta ($post_id, '_adinserter_block_exceptions', implode (",", $selected));
}

function ai_widgets_init_hook () {
  if (is_multisite() && !is_main_site () && !multisite_widgets_enabled ()) return;
  register_widget ('ai_widget');
}

function ai_wp_head_hook () {
  global $block_object, $ai_wp_data, $ai_total_plugin_time;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    ai_log ("HEAD HOOK START");
    $start_time = microtime ();
  }

  add_head_inline_styles_and_scripts ();

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_NONE;

  $obj = $block_object [AI_HEADER_OPTION_NAME];
  $obj->clear_code_cache ();

  if (!$obj->check_server_side_detection ()) return;

  if ($obj->get_enable_manual ()) {
    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_404 && !$obj->get_enable_404()) return;
    echo $obj->ai_getCode ();
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    $ai_total_plugin_time += microtime () - $start_time;
    ai_log ("HEAD HOOK END\n");
  }
}

function ai_wp_footer_hook () {
  global $block_object, $ai_wp_data, $ai_total_plugin_time;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    ai_log ("FOOTER HOOK START");
    $start_time = microtime ();
  }

  add_footer_inline_scripts ();

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_FOOTER;

  $obj = $block_object [AI_FOOTER_OPTION_NAME];
  $obj->clear_code_cache ();

  if (!$obj->check_server_side_detection ()) return;

  if ($obj->get_enable_manual ()) {
    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_404 && !$obj->get_enable_404()) return;
    echo $obj->ai_getCode ();
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) {
    $ai_total_plugin_time += microtime () - $start_time;
    ai_log ("FOOTER HOOK END\n");
  }
}

function ai_write_debug_info ($write_processing_log = false) {
  global $block_object, $ai_last_time, $ai_total_plugin_time, $ai_total_php_time, $ai_processing_log, $ai_db_options_extract, $ai_wp_data, $ai_db_options;

  echo sprintf ("%-25s%s\n\n", AD_INSERTER_NAME, AD_INSERTER_VERSION);
  echo "GENERATED (WP time):     ", date ("Y-m-d H:i:s", time() + get_option ('gmt_offset') * 3600), "\n";
  echo "GENERATED (Server time): ", date ("Y-m-d H:i:s", time()), "\n";
  echo "PLUGIN CODE PROCESSING:  ", number_format (($ai_total_plugin_time - $ai_total_php_time) * 1000, 2) , " ms\n";
  echo "USER   CODE PROCESSING:  ", number_format ($ai_total_php_time * 1000, 2), " ms\n";
  echo "TOTAL PROCESSING TIME:   ", number_format ($ai_total_plugin_time * 1000, 2), " ms\n";

  echo "SETTINGS:                ";
  if (isset ($ai_db_options ['global']['VERSION']))
    echo (int) ($ai_db_options ['global']['VERSION'][0].$ai_db_options ['global']['VERSION'][1]), '.',
         (int) ($ai_db_options ['global']['VERSION'][2].$ai_db_options ['global']['VERSION'][3]), '.',
         (int) ($ai_db_options ['global']['VERSION'][4].$ai_db_options ['global']['VERSION'][5]);

  echo "\n";
  echo "SETTINGS TIMESTAMP:      ";
  echo isset ($ai_db_options ['global']['TIMESTAMP']) ? date ("Y-m-d H:i:s", $ai_db_options ['global']['TIMESTAMP'] + get_option ('gmt_offset') * 3600) : "", "\n";
  echo "MULTISITE:               ", is_multisite() ? "YES" : "NO", "\n";
  if (is_multisite()) {
    echo "MAIN SITE:               ", is_main_site () ? "YES" : "NO", "\n";
  }

  echo "USER:                    ";
  if (($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN)     == AI_USER_LOGGED_IN) echo "LOGGED-IN "; else echo "NOT LOGGED-IN ";
  if (($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) == AI_USER_ADMINISTRATOR) echo "ADMINISTRATOR";
  echo "\n";
  echo "PAGE TYPE:               ";
  switch ($ai_wp_data [AI_WP_PAGE_TYPE]) {
    case AI_PT_STATIC:    echo "STATIC PAGE"; break;
    case AI_PT_POST:      echo "POST"; break;
    case AI_PT_HOMEPAGE:  echo "HOMEPAGE"; break;
    case AI_PT_CATEGORY:  echo "CATEGORY PAGE"; break;
    case AI_PT_ARCHIVE:   echo "ARCHIVE PAGE"; break;
    case AI_PT_SEARCH:    echo "SEARCH PAGE"; break;
    case AI_PT_404:       echo "404 PAGE"; break;
    case AI_PT_FEED:      echo "FEED"; break;
    default:              echo "?"; break;
  }
  echo "\n";
  echo 'ID:                      ', get_the_ID(), "\n";
  echo 'URL:                     ', $ai_wp_data [AI_WP_URL], "\n";
  echo 'REFERER:                 ', isset ($_SERVER['HTTP_REFERER']) ? strtolower (parse_url ($_SERVER['HTTP_REFERER'], PHP_URL_HOST)) . ' ('. remove_parameters_from_url ($_SERVER['HTTP_REFERER']).')' : "", "\n";
  if (function_exists ('ai_debug')) ai_debug ();
  echo 'CLIENT-SIDE DETECTION:   ', $ai_wp_data [CLIENT_SIDE_DETECTION] ? 'USED' : "NOT USED", "\n";
  if ($ai_wp_data [CLIENT_SIDE_DETECTION] || 1) {
    for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
      $viewport_name  = get_viewport_name ($viewport);
      $viewport_width = get_viewport_width ($viewport);
      if ($viewport_name != '') {
        echo 'VIEWPORT ', $viewport, ':              ', sprintf ("%-16s min width %s", $viewport_name.' ', $viewport_width), " px\n";
      }
    }
  }
  echo 'SERVER-SIDE DETECTION:   ', $ai_wp_data [SERVER_SIDE_DETECTION] ? 'USED' : "NOT USED", "\n";
  if ($ai_wp_data [SERVER_SIDE_DETECTION]) {
    echo 'SERVER-SIDE DEVICE:      ';
    if (AI_DESKTOP) echo "DESKTOP\n";
    elseif (AI_TABLET) echo "TABLET\n";
    elseif (AI_PHONE) echo "PHONE\n";
    else echo "?\n";
  }

  echo "\n";

  $default = new ai_Block (1);

  echo "BLOCK SETTINGS           Po Pa Hp Cp Ap Sp Fe 404 Wi Sh PHP\n";
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $obj = $block_object [$block];

    $settings = "";
    $display_settings = '';
    $alignment_settings = '';
    $default_settings = true;
    $display_type = '';
    foreach (array_keys ($default->wp_options) as $key){
      switch ($key) {
        case AI_OPTION_CODE:
        case AI_OPTION_NAME:
          continue 2;
        case AI_OPTION_DISPLAY_ON_PAGES:
        case AI_OPTION_DISPLAY_ON_POSTS:
        case AI_OPTION_DISPLAY_ON_HOMEPAGE:
        case AI_OPTION_DISPLAY_ON_CATEGORY_PAGES:
        case AI_OPTION_DISPLAY_ON_SEARCH_PAGES:
        case AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES:
        case AI_OPTION_ENABLE_FEED:
        case AI_OPTION_ENABLE_404:
        case AI_OPTION_ENABLE_MANUAL:
        case AI_OPTION_ENABLE_WIDGET:
        case AI_OPTION_ENABLE_PHP_CALL:
          if ($obj->wp_options [$key] != $default->wp_options [$key]) $default_settings = false;
          continue 2;
      }
      if ($obj->wp_options [$key] != $default->wp_options [$key]) {
        $default_settings = false;
        switch ($key) {
          case AI_OPTION_DISPLAY_TYPE:
            $display_settings = $obj->wp_options [$key];
            break;
          case AI_OPTION_ALIGNMENT_TYPE:
            $alignment_settings = " " . $obj->wp_options [$key];
            break;
          case AI_OPTION_PARAGRAPH_TEXT:
          case AI_OPTION_AVOID_TEXT_ABOVE:
          case AI_OPTION_AVOID_TEXT_BELOW:
            if ($write_processing_log)
              $settings .= " " . $key . ": " . ai_log_filter_content (html_entity_decode ($obj->wp_options [$key])); else
                $settings .= " " . $key . ": " . $obj->wp_options [$key];
            break;
          default:
            $settings .= " " . $key . ": " . $obj->wp_options [$key];
            break;
        }
      } else
        switch ($key) {
          case AI_OPTION_DISPLAY_TYPE:
            $display_settings = $obj->wp_options [$key];
            break;
          case AI_OPTION_ALIGNMENT_TYPE:
            $alignment_settings = " " . $obj->wp_options [$key];
            break;
        }
    }
    if ($default_settings && $settings == '') continue;
    $settings = $display_settings . $alignment_settings . $settings;

    echo sprintf ("%2d %-21s ", $block, substr ($obj->get_ad_name(), 0, 21));

    echo $obj->get_display_settings_post() ? "o" : ".", "  ";
    echo $obj->get_display_settings_page() ? "o" : ".", "  ";
    echo $obj->get_display_settings_home() ? "o" : ".", "  ";
    echo $obj->get_display_settings_category() ? "o" : ".", "  ";
    echo $obj->get_display_settings_archive() ? "o" : ".", "  ";
    echo $obj->get_display_settings_search() ? "o" : ".", "  ";
    echo $obj->get_enable_feed() ? "o" : ".", "  ";
    echo $obj->get_enable_404() ? "o" : ".", "   ";
    echo $obj->get_enable_widget() ? "x" : ".", "  ";
    echo $obj->get_enable_manual() ? "x" : ".", "  ";
    echo $obj->get_enable_php_call() ? "x" : ".", "  ";

    echo $settings, "\n";
  }
  echo "\n";

  echo "TOTAL BLOCKS\n";
  if (count ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][AI_PT_ANY]))
    echo "CONTENT HOOK BLOCKS:     ", implode (", ", $ai_db_options_extract [CONTENT_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][AI_PT_ANY]))
    echo "EXCERPT HOOK BLOCKS:     ", implode (", ", $ai_db_options_extract [EXCERPT_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][AI_PT_ANY]))
    echo "LOOP START HOOK BLOCKS:  ", implode (", ", $ai_db_options_extract [LOOP_START_HOOK_BLOCKS][AI_PT_ANY]), "\n";
  if (count ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][AI_PT_ANY]))
    echo "LOOP END HOOK BLOCKS:    ", implode (", ", $ai_db_options_extract [LOOP_END_HOOK_BLOCKS][AI_PT_ANY]), "\n";


  echo "\nPAGE TYPE BLOCKS\n";
  if (count ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "CONTENT HOOK BLOCKS:     ", implode (", ", $ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (count ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "EXCERPT HOOK BLOCKS:     ", implode (", ", $ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (count ($ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "LOOP START HOOK BLOCKS:  ", implode (", ", $ai_db_options_extract [LOOP_START_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";
  if (count ($ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]))
    echo "LOOP END HOOK BLOCKS:    ", implode (", ", $ai_db_options_extract [LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]), "\n";

  if ($write_processing_log) {
    echo "\nTIME  EVENT\n";
    echo "======================================\n";

    foreach ($ai_processing_log as $log_line) {
      echo $log_line, "\n";
    }

    echo "PHP:                     ", phpversion(), "\n";
    global $wp_version;
    echo "Wordpress:               ", $wp_version, "\n";
    $current_theme = wp_get_theme();

    echo "Current Theme:           ", $current_theme->get ('Name') . " " . $current_theme->get ('Version'), "\n";
    echo "\n";
    echo "A INSTALLED PLUGINS\n";
    echo "======================================\n";

    if ( ! function_exists( 'get_plugins' ) ) {
      require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    $all_plugins = get_plugins();
    $active_plugins = get_option ('active_plugins');
    foreach ($all_plugins as $plugin_path => $plugin) {
      echo in_array ($plugin_path, $active_plugins) ? '* ' : '  ', html_entity_decode ($plugin ["Name"]), ' ', $plugin ["Version"], "\n";
    }
  }
}

function ai_shutdown_hook () {
  global $ai_wp_data;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) == 0 || !(get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != 0)) return;
  echo "\n<!--\n\n";
  ai_write_debug_info (true);
  echo "\n-->\n";
}

function ai_check_multisite_options (&$multisite_options) {
  if (!isset ($multisite_options ['MULTISITE_SETTINGS_PAGE']))      $multisite_options ['MULTISITE_SETTINGS_PAGE']      = DEFAULT_MULTISITE_SETTINGS_PAGE;
  if (!isset ($multisite_options ['MULTISITE_WIDGETS']))            $multisite_options ['MULTISITE_WIDGETS']            = DEFAULT_MULTISITE_WIDGETS;
  if (!isset ($multisite_options ['MULTISITE_EXCEPTIONS']))         $multisite_options ['MULTISITE_EXCEPTIONS']         = DEFAULT_MULTISITE_EXCEPTIONS;
  if (!isset ($multisite_options ['MULTISITE_MAIN_FOR_ALL_BLOGS'])) $multisite_options ['MULTISITE_MAIN_FOR_ALL_BLOGS'] = DEFAULT_MULTISITE_MAIN_FOR_ALL_BLOGS;
}

function ai_check_plugin_options ($plugin_options = array ()) {
  global $version_string;

  $plugin_options ['VERSION'] = $version_string;

  if (!isset ($plugin_options ['SYNTAX_HIGHLIGHTER_THEME']))  $plugin_options ['SYNTAX_HIGHLIGHTER_THEME']  = DEFAULT_SYNTAX_HIGHLIGHTER_THEME;

  if (!isset ($plugin_options ['BLOCK_CLASS_NAME']) ||
      $plugin_options ['BLOCK_CLASS_NAME'] == '')             $plugin_options ['BLOCK_CLASS_NAME']          = DEFAULT_BLOCK_CLASS_NAME;

  if (!isset ($plugin_options ['MINIMUM_USER_ROLE']))         $plugin_options ['MINIMUM_USER_ROLE']         = DEFAULT_MINIMUM_USER_ROLE;

  if (!isset ($plugin_options ['PLUGIN_PRIORITY']))           $plugin_options ['PLUGIN_PRIORITY']           = DEFAULT_PLUGIN_PRIORITY;
  $plugin_priority = $plugin_options ['PLUGIN_PRIORITY'];
  if (!is_numeric ($plugin_priority)) {
    $plugin_priority = DEFAULT_PLUGIN_PRIORITY;
  }
  $plugin_priority = intval ($plugin_priority);
  if ($plugin_priority < 0) {
    $plugin_priority = 0;
  }
  if ($plugin_priority > 999999) {
    $plugin_priority = 999999;
  }
  $plugin_options ['PLUGIN_PRIORITY'] = $plugin_priority;


  if (!isset ($plugin_options ['DYNAMIC_BLOCKS']))            $plugin_options ['DYNAMIC_BLOCKS']            = DEFAULT_DYNAMIC_BLOCKS;
  if (!isset ($plugin_options ['ADMIN_TOOLBAR_DEBUGGING']))   $plugin_options ['ADMIN_TOOLBAR_DEBUGGING']   = DEFAULT_ADMIN_TOOLBAR_DEBUGGING;
  if (!isset ($plugin_options ['REMOTE_DEBUGGING']))          $plugin_options ['REMOTE_DEBUGGING']          = DEFAULT_REMOTE_DEBUGGING;
  if (!isset ($plugin_options ['JAVASCRIPT_DEBUGGING']))      $plugin_options ['JAVASCRIPT_DEBUGGING']      = DEFAULT_JAVASCRIPT_DEBUGGING;

  for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
    $viewport_name_option_name   = 'VIEWPORT_NAME_'  . $viewport;
    $viewport_width_option_name  = 'VIEWPORT_WIDTH_' . $viewport;

    if (!isset ($plugin_options [$viewport_name_option_name]))     $plugin_options [$viewport_name_option_name] =
      defined ("DEFAULT_VIEWPORT_NAME_" . $viewport) ? constant ("DEFAULT_VIEWPORT_NAME_" . $viewport) : "";

    if ($viewport == 1 && $plugin_options [$viewport_name_option_name] == '')
      $plugin_options [$viewport_name_option_name] = constant ("DEFAULT_VIEWPORT_NAME_1");

    if ($plugin_options [$viewport_name_option_name] != '') {
      if (!isset ($plugin_options [$viewport_width_option_name]))  $plugin_options [$viewport_width_option_name] =
        defined ("DEFAULT_VIEWPORT_WIDTH_" . $viewport) ? constant ("DEFAULT_VIEWPORT_WIDTH_" . $viewport) : 0;

      $viewport_width = $plugin_options [$viewport_width_option_name];

      if ($viewport > 1) {
        $previous_viewport_option_width = $plugin_options ['VIEWPORT_WIDTH_' . ($viewport - 1)];
      }

      if (!is_numeric ($viewport_width)) {
        if ($viewport == 1)
          $viewport_width = constant ("DEFAULT_VIEWPORT_WIDTH_1"); else
            $viewport_width = $previous_viewport_option_width - 1;

      }
      if ($viewport_width > 9999) {
        $viewport_width = 9999;
      }

      if ($viewport > 1) {
        if ($viewport_width >= $previous_viewport_option_width)
          $viewport_width = $previous_viewport_option_width - 1;
      }

      $viewport_width = intval ($viewport_width);
      if ($viewport_width < 0) {
        $viewport_width = 0;
      }

      $plugin_options [$viewport_width_option_name] = $viewport_width;
    } else $plugin_options [$viewport_width_option_name] = '';
  }

  if (function_exists ('ai_check_options')) ai_check_options ($plugin_options);

  return ($plugin_options);
}

function option_stripslashes (&$options) {
  if (is_array ($options)) {
    foreach ($options as $key => $option) {
      option_stripslashes ($options [$key]);
    }
  } else if (is_string ($options)) $options = stripslashes ($options);
}

// Deprecated
function ai_get_option ($option_name) {
  $options = get_option ($option_name);
  option_stripslashes ($options);
  return ($options);
}

function ai_load_options () {
  global $ai_db_options, $ai_db_options_multisite, $ai_wp_data;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("LOAD OPTIONS START");

  if (is_multisite()) {
    $ai_db_options_multisite = get_site_option (WP_OPTION_NAME);
    option_stripslashes ($ai_db_options_multisite);

  }

  if (is_multisite() && multisite_main_for_all_blogs () && defined ('BLOG_ID_CURRENT_SITE')) {
    $ai_db_options = get_blog_option (BLOG_ID_CURRENT_SITE, WP_OPTION_NAME);
    option_stripslashes ($ai_db_options);
  } else {
      $ai_db_options = get_option (WP_OPTION_NAME);
      option_stripslashes ($ai_db_options);
    }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("LOAD OPTIONS END");
}

function get_viewport_css () {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS); // Old options

  if (!isset ($plugin_db_options ['VIEWPORT_CSS'])) $plugin_db_options ['VIEWPORT_CSS'] = generate_viewport_css ();

  return ($plugin_db_options ['VIEWPORT_CSS']);
}

function get_syntax_highlighter_theme () {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  if (!isset ($plugin_db_options ['SYNTAX_HIGHLIGHTER_THEME']) || $plugin_db_options ['SYNTAX_HIGHLIGHTER_THEME'] == '') {
    $plugin_db_options ['SYNTAX_HIGHLIGHTER_THEME'] = DEFAULT_SYNTAX_HIGHLIGHTER_THEME;
  }

  return ($plugin_db_options ['SYNTAX_HIGHLIGHTER_THEME']);
}

function get_block_class_name () {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  if (!isset ($plugin_db_options ['BLOCK_CLASS_NAME']) || $plugin_db_options ['BLOCK_CLASS_NAME'] == '') {
    $plugin_db_options ['BLOCK_CLASS_NAME'] = DEFAULT_BLOCK_CLASS_NAME;
  }

  return ($plugin_db_options ['BLOCK_CLASS_NAME']);
}

function get_minimum_user_role () {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  if (!isset ($plugin_db_options ['MINIMUM_USER_ROLE']) || $plugin_db_options ['MINIMUM_USER_ROLE'] == '') {
    $plugin_db_options ['MINIMUM_USER_ROLE'] = DEFAULT_MINIMUM_USER_ROLE;
  }

  return ($plugin_db_options ['MINIMUM_USER_ROLE']);
}

function get_plugin_priority () {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  if (!isset ($plugin_db_options ['PLUGIN_PRIORITY']) || $plugin_db_options ['PLUGIN_PRIORITY'] == '') {
    $plugin_db_options ['PLUGIN_PRIORITY'] = DEFAULT_PLUGIN_PRIORITY;
  }

  return ($plugin_db_options ['PLUGIN_PRIORITY']);
}

function get_dynamic_blocks(){
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  if (!isset ($plugin_db_options ['DYNAMIC_BLOCKS']) || $plugin_db_options ['DYNAMIC_BLOCKS'] == '') {
    $plugin_db_options ['DYNAMIC_BLOCKS'] = DEFAULT_DYNAMIC_BLOCKS;
  }

  return ($plugin_db_options ['DYNAMIC_BLOCKS']);
}

function get_admin_toolbar_debugging () {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';

  if (!isset ($plugin_db_options ['ADMIN_TOOLBAR_DEBUGGING']) || $plugin_db_options ['ADMIN_TOOLBAR_DEBUGGING'] == '') {
    $plugin_db_options ['ADMIN_TOOLBAR_DEBUGGING'] = DEFAULT_ADMIN_TOOLBAR_DEBUGGING;
  }

  return ($plugin_db_options ['ADMIN_TOOLBAR_DEBUGGING']);
}

function get_remote_debugging () {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';

  if (!isset ($plugin_db_options ['REMOTE_DEBUGGING']) || $plugin_db_options ['REMOTE_DEBUGGING'] == '') {
    $plugin_db_options ['REMOTE_DEBUGGING'] = DEFAULT_REMOTE_DEBUGGING;
  }

  return ($plugin_db_options ['REMOTE_DEBUGGING']);
}

function get_javascript_debugging () {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';

  if (!isset ($plugin_db_options ['JAVASCRIPT_DEBUGGING']) || $plugin_db_options ['JAVASCRIPT_DEBUGGING'] == '') {
    $plugin_db_options ['JAVASCRIPT_DEBUGGING'] = DEFAULT_JAVASCRIPT_DEBUGGING;
  }

  return ($plugin_db_options ['JAVASCRIPT_DEBUGGING']);
}

function multisite_settings_page_enabled () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE']) || $ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE'] == '') {
      $ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE'] = DEFAULT_MULTISITE_SETTINGS_PAGE;
    }

    if (multisite_main_for_all_blogs ()) $ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE'] = AD_SETTINGS_NOT_CHECKED;

    return ($ai_db_options_multisite ['MULTISITE_SETTINGS_PAGE']);
  }

  return DEFAULT_MULTISITE_SETTINGS_PAGE;
}

function multisite_widgets_enabled () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_WIDGETS']) || $ai_db_options_multisite ['MULTISITE_WIDGETS'] == '') {
      $ai_db_options_multisite ['MULTISITE_WIDGETS'] = DEFAULT_MULTISITE_WIDGETS;
    }

    return ($ai_db_options_multisite ['MULTISITE_WIDGETS']);
  }

  return DEFAULT_MULTISITE_WIDGETS;
}

function multisite_exceptions_enabled () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_EXCEPTIONS']) || $ai_db_options_multisite ['MULTISITE_EXCEPTIONS'] == '') {
      $ai_db_options_multisite ['MULTISITE_EXCEPTIONS'] = DEFAULT_MULTISITE_EXCEPTIONS;
    }

    return ($ai_db_options_multisite ['MULTISITE_EXCEPTIONS']);
  }

  return DEFAULT_MULTISITE_EXCEPTIONS;
}

function multisite_main_for_all_blogs () {
  global $ai_db_options_multisite;

  if (is_multisite()) {
    if (!isset ($ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS']) || $ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS'] == '') {
      $ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS'] = DEFAULT_MULTISITE_MAIN_FOR_ALL_BLOGS;
    }

    return ($ai_db_options_multisite ['MULTISITE_MAIN_FOR_ALL_BLOGS']);
  }

  return DEFAULT_MULTISITE_MAIN_FOR_ALL_BLOGS;
}

function get_viewport_name ($viewport_number) {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  $viewport_settins_name = 'VIEWPORT_NAME_' . $viewport_number;

  if (!isset ($plugin_db_options [$viewport_settins_name])) {
    $plugin_db_options [$viewport_settins_name] = defined ("DEFAULT_VIEWPORT_NAME_" . $viewport_number) ? constant ("DEFAULT_VIEWPORT_NAME_" . $viewport_number) : "";
  }

  return ($plugin_db_options [$viewport_settins_name]);
}

function get_viewport_width ($viewport_number) {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  $viewport_settins_name = 'VIEWPORT_WIDTH_' . $viewport_number;

  if (!isset ($plugin_db_options [$viewport_settins_name])) {
    $plugin_db_options [$viewport_settins_name] = defined ("DEFAULT_VIEWPORT_WIDTH_" . $viewport_number) ? constant ("DEFAULT_VIEWPORT_WIDTH_" . $viewport_number) : 0;
  }

  return ($plugin_db_options [$viewport_settins_name]);
}

function get_country_group_name ($group_number) {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  $country_group_settins_name = 'COUNTRY_GROUP_NAME_' . $group_number;

  if (!isset ($plugin_db_options [$country_group_settins_name])) {
    $plugin_db_options [$country_group_settins_name] = DEFAULT_COUNTRY_GROUP_NAME . ' ' . $group_number;
  }

  return ($plugin_db_options [$country_group_settins_name]);
}

function get_group_country_list ($group_number) {
  global $ai_db_options;

  if (isset ($ai_db_options [AI_GLOBAL_OPTION_NAME])) $plugin_db_options = $ai_db_options [AI_GLOBAL_OPTION_NAME]; else $plugin_db_options = '';
  if (!$plugin_db_options) $plugin_db_options = get_option (AD_OPTIONS);

  $group_countries_settins_name = 'GROUP_COUNTRIES_' . $group_number;

  if (!isset ($plugin_db_options [$group_countries_settins_name])) {
    $plugin_db_options [$group_countries_settins_name] = '';
  }

  return ($plugin_db_options [$group_countries_settins_name]);
}

function filter_html_class ($str){

  $str = str_replace (array ("\\\""), array ("\""), $str);
  $str = sanitize_html_class ($str);

  return $str;
}

function filter_string ($str){

  $str = str_replace (array ("\\\""), array ("\""), $str);
  $str = str_replace (array ("\"", "<", ">"), "", $str);
  $str = trim (esc_html ($str));

  return $str;
}

function filter_option ($option, $value, $delete_escaped_backslashes = true){
  if ($delete_escaped_backslashes)
    $value = str_replace (array ("\\\""), array ("\""), $value);

  if ($option == AI_OPTION_DOMAIN_LIST ||
      $option == AI_OPTION_IP_ADDRESS_LIST ||
      $option == AI_OPTION_COUNTRY_LIST) {
    $value = str_replace (array ("\\", "/", "?", "\"", "'", "<", ">", "[", "]"), "", $value);
    $value = esc_html ($value);
  }
  elseif (
    $option == AI_OPTION_PARAGRAPH_TEXT ||
    $option == AI_OPTION_AVOID_TEXT_ABOVE ||
    $option == AI_OPTION_AVOID_TEXT_BELOW
  ) {
    $value = esc_html ($value);
  }
  elseif ($option == AI_OPTION_NAME ||
          $option == AI_OPTION_GENERAL_TAG ||
          $option == AI_OPTION_DOMAIN_LIST ||
          $option == AI_OPTION_CATEGORY_LIST ||
          $option == AI_OPTION_TAG_LIST ||
          $option == AI_OPTION_ID_LIST ||
          $option == AI_OPTION_URL_LIST ||
          $option == AI_OPTION_URL_PARAMETER_LIST ||
          $option == AI_OPTION_PARAGRAPH_TEXT_TYPE ||
          $option == AI_OPTION_PARAGRAPH_NUMBER ||
          $option == AI_OPTION_MIN_PARAGRAPHS ||
          $option == AI_OPTION_AVOID_PARAGRAPHS_ABOVE ||
          $option == AI_OPTION_AVOID_PARAGRAPHS_BELOW ||
          $option == AI_OPTION_AVOID_TRY_LIMIT ||
          $option == AI_OPTION_MIN_WORDS ||
          $option == AI_OPTION_MAX_WORDS ||
          $option == AI_OPTION_MIN_PARAGRAPH_WORDS ||
          $option == AI_OPTION_MAX_PARAGRAPH_WORDS ||
          $option == AI_OPTION_MAXIMUM_INSERTIONS ||
          $option == AI_OPTION_AFTER_DAYS ||
          $option == AI_OPTION_START_DATE ||
          $option == AI_OPTION_END_DATE ||
          $option == AI_OPTION_FALLBACK ||
          $option == AI_OPTION_EXCERPT_NUMBER ||
          $option == AI_OPTION_CUSTOM_CSS) {
            $value = str_replace (array ("\"", "<", ">", "[", "]"), "", $value);
            $value = esc_html ($value);
          }

  return $value;
}

function filter_option_hf ($option, $value){
  $value = str_replace (array ("\\\""), array ("\""), $value);

        if ($option == AI_OPTION_CODE ) {
  } elseif ($option == AI_OPTION_ENABLE_MANUAL) {
  } elseif ($option == AI_OPTION_PROCESS_PHP) {
  } elseif ($option == AI_OPTION_ENABLE_404) {
  } elseif ($option == AI_OPTION_DETECT_SERVER_SIDE) {
  } elseif ($option == AI_OPTION_DISPLAY_FOR_DEVICES) {
  }

  return $value;
}

function ai_data () {
  global $ai_db_options, $block_object;

  check_admin_referer ("adinserter_data", "ai_check");

  if (isset ($_GET ["preview"])) {
    $block = $_GET ["preview"];
    if (is_numeric ($block) && $block >= 1 && $block <= AD_INSERTER_BLOCKS) {
      generate_code_preview ($block);
    }
  }

  elseif (isset ($_GET ["export"])) {
    $block = $_GET ["export"];
    if (is_numeric ($block)) {
      if ($block == 0) echo base64_encode (serialize ($ai_db_options));
        elseif ($block >= 1 && $block <= AD_INSERTER_BLOCKS) {
          $obj = $block_object [$block];
          echo base64_encode (serialize ($obj->wp_options));
        }
    }
  }

  elseif (isset ($_GET ["image"])) {
    header ("Content-Type: image/png");
    header ("Content-Length: " . filesize (AD_INSERTER_PLUGIN_DIR.'images/'.$_GET ["image"]));
    readfile  (AD_INSERTER_PLUGIN_DIR.'images/'.$_GET ["image"]);
  }

  elseif (isset ($_GET ["ip-data"])) {
    $client_ip_address = get_client_ip_address ();
    if ($_GET ["ip-data"] == 'country') {
      echo ip_to_country ($client_ip_address);
    }
    elseif ($_GET ["ip-data"] == 'ip-address') {
      echo $client_ip_address;
    }
    elseif ($_GET ["ip-data"] == 'ip-address-country') {
      echo $client_ip_address, ',', ip_to_country ($client_ip_address);
    }
  }

  die ();
}

function ai_generate_extract (&$settings) {

  $obj = new ai_Block (1);

  $extract = array ();
  $content_hook_blocks    = array ();
  $excerpt_hook_blocks    = array ();
  $loop_start_hook_blocks = array ();
  $loop_end_hook_blocks   = array ();

  $content_hook_blocks    = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array());
  $excerpt_hook_blocks    = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array());
  $loop_start_hook_blocks = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array());
  $loop_end_hook_blocks   = array (AI_PT_ANY => array (), AI_PT_HOMEPAGE => array(), AI_PT_CATEGORY => array(), AI_PT_SEARCH => array(), AI_PT_ARCHIVE => array(), AI_PT_STATIC => array(), AI_PT_POST => array(), AI_PT_404 => array(), AI_PT_FEED => array());

  // Generate extracted data
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {

    if (!isset ($settings [$block])) continue;

    $obj->number = $block;
    $obj->wp_options = $settings [$block];

    $page_types = array ();
    if ($obj->get_display_settings_home())     $page_types []= AI_PT_HOMEPAGE;
    if ($obj->get_display_settings_page())     $page_types []= AI_PT_STATIC;
    if ($obj->get_display_settings_post())     $page_types []= AI_PT_POST;
    if ($obj->get_display_settings_category()) $page_types []= AI_PT_CATEGORY;
    if ($obj->get_display_settings_search())   $page_types []= AI_PT_SEARCH;
    if ($obj->get_display_settings_archive())  $page_types []= AI_PT_ARCHIVE;
    if ($obj->get_enable_feed())               $page_types []= AI_PT_FEED;
    if ($obj->get_enable_404())                $page_types []= AI_PT_404;

    if ($page_types) {
      switch ($obj->get_display_type()) {
        case AD_SELECT_BEFORE_PARAGRAPH:
        case AD_SELECT_AFTER_PARAGRAPH:
        case AD_SELECT_BEFORE_CONTENT:
        case AD_SELECT_AFTER_CONTENT:
          foreach ($page_types as $block_page_type) $content_hook_blocks [$block_page_type][]= $block;
          $content_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AD_SELECT_BEFORE_EXCERPT:
        case AD_SELECT_AFTER_EXCERPT:
          foreach ($page_types as $block_page_type) $excerpt_hook_blocks [$block_page_type][]= $block;
          $excerpt_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AD_SELECT_BEFORE_POST:
          foreach ($page_types as $block_page_type) $loop_start_hook_blocks [$block_page_type][]= $block;
          $loop_start_hook_blocks [AI_PT_ANY][]= $block;
          break;
        case AD_SELECT_AFTER_POST:
          foreach ($page_types as $block_page_type) $loop_end_hook_blocks [$block_page_type][]= $block;
          $loop_end_hook_blocks [AI_PT_ANY][]= $block;
          break;
      }
    }
  }

  $extract [CONTENT_HOOK_BLOCKS]    = $content_hook_blocks;
  $extract [EXCERPT_HOOK_BLOCKS]    = $excerpt_hook_blocks;
  $extract [LOOP_START_HOOK_BLOCKS] = $loop_start_hook_blocks;
  $extract [LOOP_END_HOOK_BLOCKS]   = $loop_end_hook_blocks;

  return ($extract);
}

function ai_load_settings () {
  global $ai_db_options, $block_object, $ai_db_options_extract, $ai_wp_data, $version_string;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("LOAD SETTINGS START");

  ai_load_options ();

  if (isset ($ai_db_options [AI_EXTRACT_OPTION_NAME]) && $ai_db_options ['global']['VERSION'] == $version_string)
    $ai_db_options_extract = $ai_db_options [AI_EXTRACT_OPTION_NAME]; else
      $ai_db_options_extract = ai_generate_extract ($ai_db_options);

  $obj = new ai_Block (0);
  $obj->wp_options [AI_OPTION_NAME] = 'Default';
  $block_object [0] = $obj;
  for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
    $obj = new ai_Block ($block);
    $obj->load_options ($block);
    $block_object [$block] = $obj;
  }

  $adH  = new ai_AdH();
  $adF  = new ai_AdF();
  $adH->load_options (AI_HEADER_OPTION_NAME);
  $adF->load_options (AI_FOOTER_OPTION_NAME);
  $block_object [AI_HEADER_OPTION_NAME] = $adH;
  $block_object [AI_FOOTER_OPTION_NAME] = $adF;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("LOAD SETTINGS END");
}


function generate_viewport_css () {

  $viewports = array ();
  for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
    $viewport_name  = get_viewport_name ($viewport);
    $viewport_width = get_viewport_width ($viewport);
    if ($viewport_name != '') {
      $viewports []= array ('index' => $viewport, 'name' => $viewport_name, 'width' => $viewport_width);
    }
  }

  $viewport_styles = '';
  if (count ($viewports) != 0) {
//    $viewport_styles .= "/* " . AD_INSERTER_NAME . " version " . AD_INSERTER_VERSION ." - viewport classes */\n\n";
//    $viewport_styles .= "/* DO NOT MODIFY - This file is automatically generated when you save ".AD_INSERTER_NAME." settings */\n";
    foreach ($viewports as $index => $viewport) {
//      $viewport_styles .= "\n/* " . $viewport ['name'] . " */\n\n";
      if ($viewport ['index'] == 1) {
        foreach (array_reverse ($viewports) as $index2 => $viewport2) {
          if ($viewport2 ['index'] != 1) {
            $viewport_styles .= ".ai-viewport-" . $viewport2 ['index'] . "                { display: none !important;}\n";
          }
        }
        $viewport_styles .= ".ai-viewport-1                { display: inherit !important;}\n";
        $viewport_styles .= ".ai-viewport-0                { display: none !important;}\n";
      } else {
          $viewport_styles .= "@media ";
          if ($index != count ($viewports) - 1)
            $viewport_styles .= "(min-width: " . $viewport ['width'] . "px) and ";
          $viewport_styles .= "(max-width: " . ($viewports [$index - 1]['width'] - 1) . "px) {\n";
          foreach ($viewports as $index2 => $viewport2) {
            if ($viewport2 ['index'] == 1)
              $viewport_styles .= ".ai-viewport-" . $viewport2 ['index'] . "                { display: none !important;}\n";
            elseif ($viewport ['index'] == $viewport2 ['index'])
              $viewport_styles .= ".ai-viewport-" . $viewport2 ['index'] . "                { display: inherit !important;}\n";

          }
          $viewport_styles .= "}\n";
        }
    }
  }
  return ($viewport_styles);
}


function ai_settings () {
  global $ai_db_options, $block_object;

  if (isset ($_POST [AI_FORM_SAVE])) {

//    echo count ($_POST);
//    print_r ($_POST);

    check_admin_referer ('save_adinserter_settings');

    $subpage = 'main';
    $start =  1;
    $end   = 16;
    if (function_exists ('ai_settings_parameters')) ai_settings_parameters ($subpage, $start, $end);

    $invalid_blocks = array ();

    $import_switch_name = AI_OPTION_IMPORT . WP_FORM_FIELD_POSTFIX . '0';
    if (isset ($_POST [$import_switch_name]) && $_POST [$import_switch_name] == "1") {
      // Import Ad Inserter settings
      $saved_settings = $ai_db_options;
      $ai_options = @unserialize (base64_decode (str_replace (array ("\\\""), array ("\""), $_POST ["export_settings_0"])));
      if ($ai_options === false) {
        $ai_options = $saved_settings;
        $invalid_blocks []= 0;
      }
    } else {
        // Try to import individual settings
        $ai_options = array ();

        for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
          $ad = new ai_Block ($block);

          if (isset ($ai_db_options [$block])) $saved_settings = $ai_db_options [$block]; else
            $saved_settings = $ad->wp_options;

          if ($block < $start || $block > $end) {
            $ai_options [$block] = $saved_settings;
            continue;
          }

//          $block_settings = 0;
          $import_switch_name      = AI_OPTION_IMPORT      . WP_FORM_FIELD_POSTFIX . $block;
          $import_name_switch_name = AI_OPTION_IMPORT_NAME . WP_FORM_FIELD_POSTFIX . $block;
          if (isset ($_POST [$import_switch_name]) && $_POST [$import_switch_name] == "1") {

            $exported_settings = @unserialize (base64_decode (str_replace (array ("\\\""), array ("\""), $_POST ["export_settings_" . $block])));

            if ($exported_settings !== false) {
              foreach (array_keys ($ad->wp_options) as $key){
                if ($key == AI_OPTION_NAME && isset ($_POST [$import_name_switch_name]) && $_POST [$import_name_switch_name] != "1") {
                  $form_field_name = $key . WP_FORM_FIELD_POSTFIX . $block;
                  if (isset ($_POST [$form_field_name])){
                    $ad->wp_options [$key] = filter_option ($key, $_POST [$form_field_name]);
                  }
                } else {
                    if (isset ($exported_settings [$key])) {
                      $ad->wp_options [$key] = filter_option ($key, $exported_settings [$key], false);
//                      $block_settings ++;
                    }
                  }
              }
            } else {
                $ad->wp_options = $saved_settings;
                $invalid_blocks []= $block;
              }
          } else {
              foreach (array_keys ($ad->wp_options) as $key){
                $form_field_name = $key . WP_FORM_FIELD_POSTFIX . $block;
                if (isset ($_POST [$form_field_name])){
                  $ad->wp_options [$key] = filter_option ($key, $_POST [$form_field_name]);
//                  $block_settings ++;
                }
              }
            }

          $ai_options [$block] = $ad->wp_options;
          delete_option (str_replace ("#", $block, AD_ADx_OPTIONS));
        }

        $adH  = new ai_AdH();
        $adF  = new ai_AdF();

        foreach(array_keys ($adH->wp_options) as $key){
          $form_field_name = $key . WP_FORM_FIELD_POSTFIX . AI_HEADER_OPTION_NAME;
          if(isset ($_POST [$form_field_name])){
              $adH->wp_options [$key] = filter_option_hf ($key, $_POST [$form_field_name]);
          }
        }

        foreach(array_keys($adF->wp_options) as $key){
          $form_field_name = $key . WP_FORM_FIELD_POSTFIX . AI_FOOTER_OPTION_NAME;
          if(isset ($_POST [$form_field_name])){
              $adF->wp_options [$key] = filter_option_hf ($key, $_POST [$form_field_name]);
          }
        }

        $ai_options [AI_HEADER_OPTION_NAME] = $adH->wp_options;
        $ai_options [AI_FOOTER_OPTION_NAME] = $adF->wp_options;

        $options = array ();

        if (function_exists ('ai_filter_global_settings')) ai_filter_global_settings ($options);

        $options ['SYNTAX_HIGHLIGHTER_THEME']  = filter_string ($_POST ['syntax-highlighter-theme']);
        $options ['BLOCK_CLASS_NAME']          = filter_html_class ($_POST ['block-class-name']);
        $options ['MINIMUM_USER_ROLE']         = filter_string ($_POST ['minimum-user-role']);
        $options ['PLUGIN_PRIORITY']           = filter_option ('plugin_priority', $_POST ['plugin_priority']);
        $options ['DYNAMIC_BLOCKS']            = filter_option ('dynamic_blocks', $_POST ['dynamic_blocks']);
        $options ['ADMIN_TOOLBAR_DEBUGGING']   = filter_option ('admin_toolbar_debugging', $_POST ['admin_toolbar_debugging']);
        $options ['REMOTE_DEBUGGING']          = filter_option ('remote_debugging', $_POST ['remote_debugging']);
        $options ['JAVASCRIPT_DEBUGGING']      = filter_option ('javascript_debugging', $_POST ['javascript_debugging']);

        for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
          if (isset ($_POST ['viewport-name-'.$viewport]))
            $options ['VIEWPORT_NAME_'.$viewport]   = filter_string ($_POST ['viewport-name-'.$viewport]);
          if (isset ($_POST ['viewport-width-'.$viewport]))
            $options ['VIEWPORT_WIDTH_'.$viewport]  = filter_option ('viewport_width', $_POST ['viewport-width-'.$viewport]);
        }

        $options ['VIEWPORT_CSS'] = generate_viewport_css ();

        $ai_options [AI_GLOBAL_OPTION_NAME] = ai_check_plugin_options ($options);
      }

    if (!empty ($invalid_blocks)) {
      if ($invalid_blocks [0] == 0) {
             echo "<div class='error' style='margin: 5px 15px 2px 0px; padding: 10px;'>Error importing ", AD_INSERTER_NAME, " settings.</div>";
      } else echo "<div class='error' style='margin: 5px 15px 2px 0px; padding: 10px;'>Error importing settings for block", count ($invalid_blocks) == 1 ? "" : "s:", " ", implode (", ", $invalid_blocks), ".</div>";
    }

    // Generate and save extract
    $ai_options [AI_EXTRACT_OPTION_NAME] = ai_generate_extract ($ai_options);

    $ai_options [AI_GLOBAL_OPTION_NAME]['TIMESTAMP'] = time ();

    update_option (WP_OPTION_NAME, $ai_options);

    // Multisite
    if (is_multisite () && is_main_site ()) {
      $options = array ();
      $options ['MULTISITE_SETTINGS_PAGE']      = filter_option ('multisite_settings_page', $_POST ['multisite_settings_page']);
      $options ['MULTISITE_WIDGETS']            = filter_option ('multisite_widgets', $_POST ['multisite_widgets']);
      $options ['MULTISITE_EXCEPTIONS']         = filter_option ('multisite_exceptions', $_POST ['multisite_exceptions']);
      $options ['MULTISITE_MAIN_FOR_ALL_BLOGS'] = filter_option ('multisite_main_for_all_blogs', $_POST ['multisite_main_for_all_blogs']);

      ai_check_multisite_options ($options);
      update_site_option (WP_OPTION_NAME, $options);
    }

    ai_load_settings ();

    if (function_exists ('ai_load_globals')) ai_load_globals ();

    delete_option (str_replace ("#", "Header", AD_ADx_OPTIONS));
    delete_option (str_replace ("#", "Footer", AD_ADx_OPTIONS));
    delete_option (AD_OPTIONS);

    echo "<div class='updated' style='margin: 5px 15px 2px 0px; padding: 10px;'><strong>Settings saved.</strong></div>";

  } elseif (isset ($_POST [AI_FORM_CLEAR])) {

      check_admin_referer ('save_adinserter_settings');

      for ($block = 1; $block <= AD_INSERTER_BLOCKS; $block ++) {
        delete_option (str_replace ("#", $block, AD_ADx_OPTIONS));
      }

      delete_option (str_replace ("#", "Header", AD_ADx_OPTIONS));
      delete_option (str_replace ("#", "Footer", AD_ADx_OPTIONS));
      delete_option (AD_OPTIONS);

      delete_option (WP_OPTION_NAME);
      delete_option (WP_AD_INSERTER_PRO_LICENSE);
      if (is_multisite () && is_main_site ()) {
        delete_site_option (WP_OPTION_NAME, $options);
      }

      ai_load_settings ();

      echo "<div class='error' style='margin: 5px 15px 2px 0px; padding: 10px;'>Settings cleared.</div>";
  }

  generate_settings_form ();
}


function ai_adinserter ($ad_number = '', $ignore = ''){
  global $block_object, $ad_interter_globals, $ai_wp_data, $ai_last_check;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;

  if ($ad_number == "") return "";
  if (!is_numeric ($ad_number)) return "";
  $ad_number = (int) $ad_number;
  if ($ad_number < 1 || $ad_number > AD_INSERTER_BLOCKS) return "";

  $globals_name = AI_PHP_FUNCTION_CALL_COUNTER_NAME . $ad_number;

  if (!isset ($ad_interter_globals [$globals_name])) {
    $ad_interter_globals [$globals_name] = 1;
  } else $ad_interter_globals [$globals_name] ++;

  if ($debug_processing) ai_log ("PHP FUNCTION CALL adinserter ($ad_number".($ignore == '' ? '' : ', \''.$ignore)."') [" . $ad_interter_globals [$globals_name] . ']');

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_PHP_FUNCTION;

  $ignore_array = array ();
  if (trim ($ignore) != '') {
    $ignore_array = explode (",", str_replace (" ", "", $ignore));
  }

  $obj = $block_object [$ad_number];
  $obj->clear_code_cache ();

  $ai_last_check = AI_CHECK_ENABLED;
  if (!$obj->get_enable_php_call ()) return "";
  if (!$obj->check_server_side_detection ()) return "";
  if (!$obj->check_page_types_lists_users (in_array ("page_type", $ignore_array))) return "";
  if (!$obj->check_filter ($ad_interter_globals [$globals_name])) return "";

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
    $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
    $selected_blocks = explode (",", $meta_value);

    if (!$obj->check_post_page_exceptions ($selected_blocks)) return "";
  }

  // Last check before insertion
  if (!$obj->check_and_increment_block_counter ()) return "";

  $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) != 0) return "";

  $ai_last_check = AI_CHECK_INSERTED;
  return $obj->get_code_for_insertion ();
}

function adinserter ($block = '', $ignore = '') {
  global $ai_last_check, $ai_wp_data, $ai_total_plugin_time;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) $start_time = microtime ();

  $ai_last_check = AI_CHECK_NONE;
  $code = ai_adinserter ($block, $ignore);

  if ($debug_processing) {
    $ai_total_plugin_time += microtime () - $start_time;
    if ($ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($block, $ai_last_check));
    ai_log ("PHP FUNCTION CALL END\n");
  }

  return $code;
}



function ai_content_hook ($content = '') {
  global $block_object, $ad_interter_globals, $ai_db_options_extract, $ai_wp_data, $ai_last_check, $ai_total_plugin_time;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ADMIN) return;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  $globals_name = AI_CONTENT_COUNTER_NAME;

  if (!isset ($ad_interter_globals [$globals_name])) {
    $ad_interter_globals [$globals_name] = 1;
  } else $ad_interter_globals [$globals_name] ++;

  if ($debug_processing) {
    ai_log ("CONTENT HOOK START [" . $ad_interter_globals [$globals_name] . ']');
    $start_time = microtime ();
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_CONTENT;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {
    $content_words = number_of_words ($content);

    $positions_inserted = false;
    if ($ai_wp_data [AI_WP_DEBUG_BLOCK] == 0) {
      $preview = $block_object [0];
      $content = $preview->before_paragraph ($content, true);
      $content = $preview->after_paragraph ($content, true);
      $positions_inserted = true;
    }
  }

  if ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]]) {
    if ($debug_processing) ai_log_content ($content);

    $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
    $selected_blocks = explode (",", $meta_value);

    $ai_last_check = AI_CHECK_NONE;
    $current_block = 0;

    foreach ($ai_db_options_extract [CONTENT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
      if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

      if (!isset ($block_object [$block])) continue;

      $current_block = $block;

      $obj = $block_object [$block];
      $obj->clear_code_cache ();

      if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0 && !$positions_inserted && $ai_wp_data [AI_WP_DEBUG_BLOCK] <= $block) {
        $preview = $block_object [$ai_wp_data [AI_WP_DEBUG_BLOCK]];
        $content = $preview->before_paragraph ($content, true);
        $content = $preview->after_paragraph ($content, true);
        $positions_inserted = true;
      }

      if (!$obj->check_server_side_detection ()) continue;
      if (!$obj->check_page_types_lists_users ()) continue;
      if (!$obj->check_post_page_exceptions ($selected_blocks)) continue;
      if (!$obj->check_filter ($ad_interter_globals [$globals_name])) continue;
      if (!$obj->check_number_of_words ($content)) continue;

//    Deprecated
      $ai_last_check = AI_CHECK_DISABLED_MANUALLY;
      if ($obj->display_disabled ($content)) continue;

      // Last check before insertion
      if (!$obj->check_block_counter ()) continue;

      $display_type = $obj->get_display_type();

      if ($display_type == AD_SELECT_BEFORE_PARAGRAPH) {
        $ai_last_check = AI_CHECK_PARAGRAPH_COUNTING;
        $content = $obj->before_paragraph ($content);
      }
      elseif ($display_type == AD_SELECT_AFTER_PARAGRAPH) {
        $ai_last_check = AI_CHECK_PARAGRAPH_COUNTING;
        $content = $obj->after_paragraph ($content);
      }
      elseif ($display_type == AD_SELECT_BEFORE_CONTENT) {
        $obj->increment_block_counter ();

        $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
        if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
          $content = $obj->get_code_for_insertion () . $content;
          $ai_last_check = AI_CHECK_INSERTED;
        }
      }
      elseif ($display_type == AD_SELECT_AFTER_CONTENT) {
        $obj->increment_block_counter ();

        $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
        if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
          $content = $content . $obj->get_code_for_insertion ();
          $ai_last_check = AI_CHECK_INSERTED;
        }
      }
    }
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_TAGS) != 0) {
    $style = AI_DEBUG_TAGS_STYLE;

    $content = preg_replace ("/\r\n\r\n/", "\r\n\r\n<kbd style='$style background: #0ff; color: #000;'>\\r\\n\\r\\n</kbd>", $content);

    $content = preg_replace ("/<p>/i", "<p><kbd style='$style background: #0a0;'>&lt;p&gt;</kbd>", $content);
//    $content = preg_replace ("/<p ([^>]*?)>/i", "<p$1><kbd style='$style background: #0a0;'>&lt;p$1&gt;</kbd>", $content);          // Full p tags
    $content = preg_replace ("/<p ([^>]*?)>/i", "<p$1><kbd style='$style background: #0a0;'>&lt;p&gt;</kbd>", $content);
//      $content = preg_replace ("/<div([^>]*?)>/i", "<div$1><kbd style='$style background: #46f;'>&lt;div$1&gt;</kbd>", $content);  // Full div tags
    $content = preg_replace ("/<div([^>]*?)>/i", "<div$1><kbd style='$style background: #46f;'>&lt;div&gt;</kbd>", $content);
    $content = preg_replace ("/<h([1-6])([^>]*?)>/i", "<h$1$2><kbd style='$style background: #d4e;'>&lt;h$1&gt;</kbd>", $content);
    $content = preg_replace ("/<img([^>]*?)>/i", "<img$1><kbd style='$style background: #ee0; color: #000'>&lt;img$1&gt;</kbd>", $content);
    $content = preg_replace ("/<pre([^>]*?)>/i", "<pre$1><kbd style='$style background: #222;'>&lt;pre&gt;</kbd>", $content);
    $content = preg_replace ("/<(?!section|ins|script|kbd|a|strong|pre|p|div|h[1-6]|img)([a-z0-9]+)([^>]*?)>/i", "<$1$2><kbd style='$style background: #fb0; color: #000;'>&lt;$1$2&gt;</kbd>", $content);

    $content = preg_replace ("/<\/p>/i", "<kbd style='$style background: #0a0;'>&lt;/p&gt;</kbd></p>", $content);
    $content = preg_replace ("/<\/div>/i", "<kbd style='$style background: #46f;'>&lt;/div&gt;</kbd></div>", $content);
    $content = preg_replace ("/<\/h([1-6])>/i", "<kbd style='$style background: #d4e;'>&lt;/h$1&gt;</kbd></h$1>", $content);
    $content = preg_replace ("/<\/pre>/i", "<kbd style='$style background: #222;'>&lt;/pre&gt;</kbd></pre>", $content);
    $content = preg_replace ("/<\/(?!section|ins|script|kbd|a|strong|pre|p|div|h[1-6])([a-z0-9]+)>/i", "<kbd style='$style background: #fb0; color: #000;'>&lt;/$1&gt;</kbd></$1>", $content);
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {
    $style = AI_DEBUG_POSITIONS_STYLE;

    if (!$positions_inserted) {
      $preview = $block_object [$ai_wp_data [AI_WP_DEBUG_BLOCK]];
      $content = $preview->before_paragraph ($content, true);
      $content = $preview->after_paragraph ($content, true);
    }

    $content = preg_replace ("/\[\[AI_BP([\d]+?)\]\]/", "<section style='$style'>BEFORE PARAGRAPH $1</section>", $content);
    $content = preg_replace ("/\[\[AI_AP([\d]+?)\]\]/", "<section style='$style'>AFTER PARAGRAPH $1</section>", $content);

    $counter = $ad_interter_globals [$globals_name];
    if ($counter == 1) $counter = '';

    $content = "<section style='$style'><a style='float: left; font-size: 10px; text-decoration: none; color: transparent; padding: 0px 10px 0 0;'>".$content_words." words</a>BEFORE CONTENT ".$counter."<a style='float: right; font-size: 10px; text-decoration: none; color: #88f; padding: 0px 10px 0 0;'>".$content_words." words</a></section>". $content;

    $content = $content . "<section style='".AI_DEBUG_POSITIONS_STYLE."'>AFTER CONTENT ".$counter."</section>";
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_TAGS) != 0) {
    $content = '<kbd style="display: none">[HTML TAGS REMOVED]</kbd>' . $content;
  }

  if ($debug_processing) {
    $ai_total_plugin_time += microtime () - $start_time;
    ai_log ("CONTENT HOOK END\n");
  }

  return $content;
}

// Process Before/After Excerpt postion
function ai_excerpt_hook ($content = '') {
  global $ad_interter_globals, $block_object, $ai_db_options_extract, $ai_wp_data, $ai_last_check, $ai_total_plugin_time;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ADMIN) return;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  $globals_name = AI_EXCERPT_COUNTER_NAME;

  if (!isset ($ad_interter_globals [$globals_name])) {
    $ad_interter_globals [$globals_name] = 1;
  } else $ad_interter_globals [$globals_name] ++;

  if ($debug_processing) {
    ai_log ("EXCERPT HOOK START [" . $ad_interter_globals [$globals_name] . ']');
    $start_time = microtime ();
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_EXCERPT;

  $ai_last_check = AI_CHECK_NONE;
  $current_block = 0;

  foreach ($ai_db_options_extract [EXCERPT_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

    if (!isset ($block_object [$block])) continue;

    $current_block = $block;
    $obj = $block_object [$block];
    $obj->clear_code_cache ();

    if (!$obj->check_server_side_detection ()) continue;
    if (!$obj->check_page_types_lists_users ()) continue;
    if (!$obj->check_filter ($ad_interter_globals [$globals_name])) continue;

    // Deprecated
    $ai_last_check = AI_CHECK_DISABLED_MANUALLY;
    if ($obj->display_disabled ($content)) continue;

    // Last check before insertion
    if (!$obj->check_and_increment_block_counter ()) continue;

    $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {

      $display_type = $obj->get_display_type ();
      if ($display_type == AD_SELECT_BEFORE_EXCERPT)
        $content = $obj->get_code_for_insertion () . $content; else
          $content = $content . $obj->get_code_for_insertion ();

      $ai_last_check = AI_CHECK_INSERTED;
    }
  }

  if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {
    $style = AI_DEBUG_POSITIONS_STYLE;

    $content = "<section style='$style'>BEFORE EXCERPT ".$ad_interter_globals [$globals_name]."</section>". $content . "<section style='$style'>AFTER EXCERPT ".$ad_interter_globals [$globals_name]."</section>";

    // Color positions from the content hook
    $content = preg_replace ("/((BEFORE|AFTER) (CONTENT|PARAGRAPH) ?[\d]*)/", "<span style='color: blue;'> [$1] </span>", $content);
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_TAGS) != 0) {
    // Remove marked tags from the content hook
    $content = preg_replace ("/&lt;(.+?)&gt;/", "", $content);

    // Color text to mark removed HTML tags
    $content = str_replace ('[HTML TAGS REMOVED]', "<span style='color: red;'>[HTML TAGS REMOVED]</span>", $content);
  }

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0) {
    // Remove block labels from the content hook
    if (strpos ($content, '>[AI]<') === false)
      $content = preg_replace ("/\[AI\](.+?)\[\/AI\]/", "", $content);
  }

  if ($debug_processing) {
    $ai_total_plugin_time += microtime () - $start_time;
    ai_log ("EXCERPT HOOK END\n");
  }

  return $content;
}

// Process Before / After Post postion

function ai_before_after_post ($query, $display_type) {
  global $block_object, $ad_interter_globals, $ai_db_options_extract, $ai_wp_data, $ai_last_check;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ADMIN) return;

  if (!method_exists ($query, 'is_main_query')) return;
  if (!$query->is_main_query()) return;

  $globals_name = $display_type == AD_SELECT_BEFORE_POST ? AI_LOOP_BEFORE_COUNTER_NAME : AI_LOOP_AFTER_COUNTER_NAME;

  if (!isset ($ad_interter_globals [$globals_name])) {
    $ad_interter_globals [$globals_name] = 1;
  } else $ad_interter_globals [$globals_name] ++;

  $ai_wp_data [AI_CONTEXT] = $display_type == AD_SELECT_BEFORE_POST ? AI_CONTEXT_BEFORE_POST : AI_CONTEXT_AFTER_POST;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_POSITIONS) != 0) {

    $style = AI_DEBUG_POSITIONS_STYLE;

    $counter = $ad_interter_globals [$globals_name];
    if ($counter == 1) $counter = '';

    echo "<section style='$style'>".($display_type == AD_SELECT_BEFORE_POST ? "BEFORE" : "AFTER")." POST ".$counter."</section>";
  }

  $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
  $selected_blocks = explode (",", $meta_value);

  $ad_code = "";

  $ai_last_check = AI_CHECK_NONE;
  $current_block = 0;

  foreach ($ai_db_options_extract [$display_type == AD_SELECT_BEFORE_POST ? LOOP_START_HOOK_BLOCKS : LOOP_END_HOOK_BLOCKS][$ai_wp_data [AI_WP_PAGE_TYPE]] as $block) {
    if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

    if (!isset ($block_object [$block])) continue;

    $current_block = $block;

    $obj = $block_object [$block];
    $obj->clear_code_cache ();

    if (!$obj->check_server_side_detection ()) continue;
    if (!$obj->check_page_types_lists_users ()) continue;
    if (!$obj->check_post_page_exceptions ($selected_blocks)) continue;
    if (!$obj->check_filter ($ad_interter_globals [$globals_name])) continue;

    // Last check before insertion
    if (!$obj->check_and_increment_block_counter ()) continue;

    $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
      $ad_code .= $obj->get_code_for_insertion ();
      $ai_last_check = AI_CHECK_INSERTED;
    }
  }
  if ($debug_processing && $ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($current_block, $ai_last_check));

  echo $ad_code;
}

// Process Before Post postion
function ai_loop_start_hook ($query) {
  global $ai_wp_data, $ai_total_plugin_time;
  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    ai_log ("LOOP START HOOK START");
    $start_time = microtime ();
  }
  ai_before_after_post ($query, AD_SELECT_BEFORE_POST);
  if ($debug_processing) {
    $ai_total_plugin_time += microtime () - $start_time;
    ai_log ("LOOP START HOOK END\n");
  }
}


// Process After Post postion
function ai_loop_end_hook ($query){
  global $ai_wp_data, $ai_total_plugin_time;
  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    ai_log ("LOOP END HOOK START");
    $start_time = microtime ();
  }
  ai_before_after_post ($query, AD_SELECT_AFTER_POST);
  if ($debug_processing) {
    $ai_total_plugin_time += microtime () - $start_time;
    ai_log ("LOOP END HOOK END\n");
  }
}

function process_shortcode (&$block, $atts) {
  global $block_object, $ai_last_check, $ai_wp_data;

  $parameters = shortcode_atts (array (
    "block" => "",
    "name" => "",
    "ignore" => "",
  ), $atts);

  $block = - 1;
  if (is_numeric ($parameters ['block'])) {
    $block = intval ($parameters ['block']);
  } elseif ($parameters ['name'] != '') {
      $shortcode_name = strtolower ($parameters ['name']);
      if ($shortcode_name == 'debugger') $block = 0; else {
        for ($counter = 1; $counter <= AD_INSERTER_BLOCKS; $counter ++) {
          $obj = $block_object [$counter];
          $ad_name = strtolower (trim ($obj->get_ad_name()));
          if ($shortcode_name == $ad_name) {
            $block = $counter;
            break;
          }
        }
      }
    }

  if ($block == 0) {
    if (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != 0) {
      ob_start ();
      echo "<pre style='", AI_DEBUG_WIDGET_STYLE, "'>\n";
      ai_write_debug_info ();
      echo "</pre>";
      return ob_get_clean ();
    }
    return "";
  }

  $ai_last_check = AI_CHECK_SHORTCODE_ATTRIBUTES;
  if ($block < 1 || $block > AD_INSERTER_BLOCKS) return "";

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("SHORTCODE $block (".($parameters ['block'] != '' ? 'block="'.$parameters ['block'].'"' : '').($parameters ['name'] != '' ? 'name="'.$parameters ['name'].'"' : '').")");

//  IGNORE SETTINGS
//  page_type
//  *block_counter

  $ignore_array = array ();
  if (trim ($parameters ['ignore']) != '') {
    $ignore_array = explode (",", str_replace (" ", "", $parameters ['ignore']));
  }

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_SHORTCODE;

  $obj = $block_object [$block];
  $obj->clear_code_cache ();

  $ai_last_check = AI_CHECK_ENABLED;
  if (!$obj->get_enable_manual ()) return "";

  if (!$obj->check_server_side_detection ()) return "";
  if (!$obj->check_page_types_lists_users (in_array ("page_type", $ignore_array))) return "";

  // Last check before insertion
  if (!$obj->check_and_increment_block_counter ()) return "";

  $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
    $ai_last_check = AI_CHECK_INSERTED;
    return $obj->get_code_for_insertion ();
  }
}


function process_shortcodes ($atts) {
  global $ai_last_check, $ai_wp_data, $ai_total_plugin_time;

  $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
  if ($debug_processing) {
    $atts_string = '';
    if (is_array ($atts))
      foreach ($atts as $index => $att) {
        $atts_string .= $index . '="'.$att.'" ';
      }
    ai_log ("PROCESS SHORTCODES [adinserter ".trim ($atts_string).']');
    $start_time = microtime ();
  }
  $ai_last_check = AI_CHECK_NONE;
  $block = - 1;
  $shortcode = process_shortcode ($block, $atts);

  if ($debug_processing) {
    $ai_total_plugin_time += microtime () - $start_time;
    if ($ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($block, $ai_last_check));
    ai_log ("SHORTCODE END\n");
  }

  return $shortcode;
}


class ai_widget extends WP_Widget {

  function __construct () {
    parent::__construct (
      false,                                  // Base ID
      AD_INSERTER_NAME,                       // Name
      array (                                 // Args
        'classname'   => 'ai_widget',
        'description' => AD_INSERTER_NAME.' code block widget.')
    );
  }

  function form ($instance) {
    global $block_object;

    // Output admin widget options form

    $widget_title = !empty ($instance ['widget-title']) ? $instance ['widget-title'] : '';
    $block = isset ($instance ['block']) ? $instance ['block'] : 1;

    if ($block == 0) $title = 'Debugger'; else {
      $obj = $block_object [$block];

      $title = '[' . $block . '] ' . $obj->get_ad_name();
      if (!empty ($widget_title)) $title .= ' - ' . $widget_title;
      if (!$obj->get_enable_widget ()) $title .= ' - DISABLED';
    }

    ?>
    <input id="<?php echo $this->get_field_id ('title'); ?>" name="<?php echo $this->get_field_name ('title'); ?>" type="hidden" value="<?php echo esc_attr ($title); ?>">

    <p>
      <label for="<?php echo $this->get_field_id ('widget-title'); ?>">Title:</label>
      <input id="<?php echo $this->get_field_id ('widget-title'); ?>" name="<?php echo $this->get_field_name ('widget-title'); ?>" type="text" value="<?php echo esc_attr ($widget_title); ?>" style="width: 90%;">
    </p>

    <p>
      <label for="<?php echo $this->get_field_id ('block'); ?>">Block:</label>
      <select id="<?php echo $this->get_field_id ('block'); ?>" name="<?php echo $this->get_field_name('block'); ?>" style="width: 88%;">
        <?php
          for ($block_index = 1; $block_index <= AD_INSERTER_BLOCKS; $block_index ++) {
            $obj = $block_object [$block_index];
        ?>
        <option value='<?php echo $block_index; ?>' <?php if ($block_index == $block) echo 'selected="selected"'; ?>><?php echo $block_index, ' - ', $obj->get_ad_name(), !$obj->get_enable_widget ()? ' - DISABLED' : ''; ?></option>
        <?php } ?>
        <option value='0' <?php if ($block == 0) echo 'selected="selected"'; ?>>Debugger</option>
      </select>
    </p>

    <?php
    $url_parameters = "";
    if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($block);

    echo "<p><a href='", admin_url ('options-general.php?page=ad-inserter.php'), $url_parameters, "&tab=", $block, "'>Settings</a></p>";
  }

  function update ($new_instance, $old_instance) {
    // Save widget options
    $instance = $old_instance;

    $instance ['widget-title'] = (!empty ($new_instance ['widget-title'])) ? strip_tags ($new_instance ['widget-title']) : '';
    $instance ['title'] = (!empty ($new_instance ['title'])) ? strip_tags ($new_instance ['title']) : '';
    $instance ['block'] = (isset ($new_instance ['block'])) ? $new_instance ['block'] : 1;

    return $instance;
  }

  function widget ($args, $instance) {
    global $ai_last_check, $ai_wp_data, $ai_total_plugin_time;

    $debug_processing = ($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0;
    if ($debug_processing) $start_time = microtime ();

    $ai_last_check = AI_CHECK_NONE;

    $block = 0;
    ai_widget_draw ($args, $instance, $block);

    if ($debug_processing) {
      $ai_total_plugin_time += microtime () - $start_time;
      if ($ai_last_check != AI_CHECK_NONE) ai_log (ai_log_block_status ($block, $ai_last_check));
      ai_log ("WIDGET END\n");
    }
  }
}


function ai_widget_draw ($args, $instance, &$block) {
  global $block_object, $ad_interter_globals, $ai_wp_data, $ai_last_check;

  $block = isset ($instance ['block']) ? $instance ['block'] : 1;

  if ($block == 0) {
    if (get_remote_debugging () || ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != 0)
      ai_widget_draw_debugger ($args, $instance, $block);
    return;
  }

  if ($block < 1 || $block > AD_INSERTER_BLOCKS) return;

  $title = !empty ($instance ['widget-title']) ? $instance ['widget-title'] : '';

  $obj = $block_object [$block];
  $obj->clear_code_cache ();

  $globals_name = AI_WIDGET_COUNTER_NAME . $block;

  if (!isset ($ad_interter_globals [$globals_name])) {
    $ad_interter_globals [$globals_name] = 1;
  } else $ad_interter_globals [$globals_name] ++;

  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_PROCESSING) != 0) ai_log ("WIDGET (". $obj->number . ') ['.$ad_interter_globals [$globals_name] . ']');

  $ai_wp_data [AI_CONTEXT] = AI_CONTEXT_WIDGET;

  $ai_last_check = AI_CHECK_ENABLED;
  if (!$obj->get_enable_widget ()) return;
  if (!$obj->check_server_side_detection ()) return;
  if (!$obj->check_page_types_lists_users ()) return;
  if (!$obj->check_filter ($ad_interter_globals [$globals_name])) return;

  if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
    $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
    $selected_blocks = explode (",", $meta_value);

    if (!$obj->check_post_page_exceptions ($selected_blocks)) return;
  }

  // Last check before insertion
  if (!$obj->check_and_increment_block_counter ()) return;

  $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
  if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
    $viewport_classes = trim ($obj->get_viewport_classes ());
    if ($viewport_classes != "") echo "<div class='" . $viewport_classes . "'>";
    echo $args ['before_widget'];

    if (!empty ($title)) {
      echo $args ['before_title'], apply_filters ('widget_title', $title), $args ['after_title'];
    }

    echo $obj->get_code_for_insertion (false);

    echo $args ['after_widget'];
    if ($viewport_classes != "") echo "</div>";

    $ai_last_check = AI_CHECK_INSERTED;

    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0 && $obj->get_detection_client_side())
      echo $obj->get_code_for_insertion (false, true);
  }
}

function ai_widget_draw_debugger ($args, $instance, &$block) {
  global $ai_wp_data, $ai_db_options, $block_object;

  echo $args ['before_widget'];

  $title = !empty ($instance ['widget-title']) ? $instance ['widget-title'] : '';

  if (!empty ($title)) {
    echo $args ['before_title'], apply_filters ('widget_title', $title), $args ['after_title'];
  }

  echo "<pre style='", AI_DEBUG_WIDGET_STYLE, "'>\n";
  ai_write_debug_info ();
  echo "</pre>";

  if ($ai_wp_data [CLIENT_SIDE_DETECTION]) {
    for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
      $viewport_name = get_viewport_name ($viewport);
      if ($viewport_name != '') {
        echo "<pre class='ai-viewport-" . $viewport ."' style='", AI_DEBUG_WIDGET_STYLE, "'>\n";
        echo "CLIENT-SIDE DEVICE:      ", $viewport_name;
        echo "</pre>";
      }
    }
  }

  echo $args ['after_widget'];
}
