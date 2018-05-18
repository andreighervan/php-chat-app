<?php

if (!defined ('AD_INSERTER_PLUGIN_DIR'))
  define ('AD_INSERTER_PLUGIN_DIR', plugin_dir_path (__FILE__));

if (file_exists (AD_INSERTER_PLUGIN_DIR.'functions.php')) {
  include_once AD_INSERTER_PLUGIN_DIR.'functions.php';
}

if (!defined( 'AD_INSERTER_NAME'))
  define ('AD_INSERTER_NAME', 'Ad Inserter');

if (!defined( 'AD_INSERTER_VERSION'))
  define ('AD_INSERTER_VERSION', '2.0.9');

if (!defined ('AD_INSERTER_PLUGIN_BASENAME'))
  define ('AD_INSERTER_PLUGIN_BASENAME', plugin_basename (__FILE__));

if (!defined ('AD_INSERTER_PLUGIN_DIRNAME'))
  define ('AD_INSERTER_PLUGIN_DIRNAME', dirname (AD_INSERTER_PLUGIN_BASENAME));

if (!defined ('AD_INSERTER_PLUGIN_URL'))
  define ('AD_INSERTER_PLUGIN_URL', plugin_dir_url ( __FILE__));

if (!defined ('AD_INSERTER_PLUGIN_IMAGES_URL'))
  define ('AD_INSERTER_PLUGIN_IMAGES_URL', AD_INSERTER_PLUGIN_URL. 'images/');

define ('AD_EMPTY_DATA', '');
define ('AD_ZERO', '0');
define ('AD_ONE',  '1');
define ('AD_TWO',  '2');
define ('AD_GENERAL_TAG', 'electronics');
define ('AD_NAME', 'Block');

// Old options
define ('AD_OPTIONS',     'AdInserterOptions');   // general plugin options
define ('AD_ADx_OPTIONS', 'AdInserter#Options');

// Options
define ('WP_OPTION_NAME',                        'ad_inserter');
define ('AI_GLOBAL_OPTION_NAME',                 'global');
define ('AI_EXTRACT_OPTION_NAME',                'extract');
define ('WP_FORM_FIELD_POSTFIX',                 '_block_');
define ('AI_HEADER_OPTION_NAME',                 'h');
define ('AI_FOOTER_OPTION_NAME',                 'f');

define ('AI_OPTION_CODE',                        'code');
define ('AI_OPTION_ENABLE_MANUAL',               'enable_manual');
define ('AI_OPTION_ENABLE_WIDGET',               'enable_widget');
define ('AI_OPTION_PROCESS_PHP',                 'process_php');
define ('AI_OPTION_ENABLE_FEED',                 'enable_feed');
define ('AI_OPTION_ENABLE_404',                  'enable_404');
define ('AI_OPTION_NAME',                        'name');
define ('AI_OPTION_DISPLAY_TYPE',                'display_type');
define ('AI_OPTION_PARAGRAPH_NUMBER',            'paragraph_number');
define ('AI_OPTION_MIN_PARAGRAPHS',              'min_paragraphs');
define ('AI_OPTION_COUNT_INSIDE_BLOCKQUOTE',     'count_inside_blockquote');
define ('AI_OPTION_MIN_WORDS',                   'min_words');
define ('AI_OPTION_MAX_WORDS',                   'max_words');
define ('AI_OPTION_MIN_PARAGRAPH_WORDS',         'min_paragraph_words');
define ('AI_OPTION_MAX_PARAGRAPH_WORDS',         'max_paragraph_words');
define ('AI_OPTION_PARAGRAPH_TAGS',              'paragraph_tags');
define ('AI_OPTION_AVOID_PARAGRAPHS_ABOVE',      'avoid_paragraphs_above');
define ('AI_OPTION_AVOID_PARAGRAPHS_BELOW',      'avoid_paragraphs_below');
define ('AI_OPTION_AVOID_TEXT_ABOVE',            'avoid_text_above');
define ('AI_OPTION_AVOID_TEXT_BELOW',            'avoid_text_below');
define ('AI_OPTION_AVOID_ACTION',                'avoid_action');
define ('AI_OPTION_AVOID_TRY_LIMIT',             'avoid_try_limit');
define ('AI_OPTION_AVOID_DIRECTION',             'avoid_direction');
define ('AI_OPTION_EXCERPT_NUMBER',              'excerpt_number'); // needs to be renamed
define ('AI_OPTION_FILTER_TYPE',                 'filter_type');
define ('AI_OPTION_DIRECTION_TYPE',              'direction_type');
define ('AI_OPTION_ALIGNMENT_TYPE',              'alignment_type');
define ('AI_OPTION_GENERAL_TAG',                 'general_tag');
define ('AI_OPTION_SCHEDULING',                  'scheduling');
define ('AI_OPTION_AFTER_DAYS',                  'after_days');
define ('AI_OPTION_START_DATE',                  'start_date');
define ('AI_OPTION_END_DATE',                    'end_date');
define ('AI_OPTION_FALLBACK',                    'fallback');
define ('AI_OPTION_MAXIMUM_INSERTIONS',          'maximum_insertions');
define ('AI_OPTION_ID_LIST',                     'id_list');
define ('AI_OPTION_ID_LIST_TYPE',                'id_list_type');
define ('AI_OPTION_URL_LIST',                    'url_list');
define ('AI_OPTION_URL_LIST_TYPE',               'url_list_type');
define ('AI_OPTION_URL_PARAMETER_LIST',          'url_parameter_list');
define ('AI_OPTION_URL_PARAMETER_LIST_TYPE',     'url_parameter_list_type');
define ('AI_OPTION_DOMAIN_LIST',                 'domain_list');
define ('AI_OPTION_DOMAIN_LIST_TYPE',            'domain_list_type');
define ('AI_OPTION_IP_ADDRESS_LIST',             'ip_address_list');
define ('AI_OPTION_IP_ADDRESS_LIST_TYPE',        'ip_address_list_type');
define ('AI_OPTION_COUNTRY_LIST',                'country_list');
define ('AI_OPTION_COUNTRY_LIST_TYPE',           'country_list_type');
define ('AI_OPTION_CATEGORY_LIST',               'category_list');
define ('AI_OPTION_CATEGORY_LIST_TYPE',          'category_list_type');
define ('AI_OPTION_TAG_LIST',                    'tag_list');
define ('AI_OPTION_TAG_LIST_TYPE',               'tag_list_type');
define ('AI_OPTION_DISPLAY_ON_HOMEPAGE',         'display_on_homepage');
define ('AI_OPTION_DISPLAY_ON_PAGES',            'display_on_pages');
define ('AI_OPTION_DISPLAY_ON_POSTS',            'display_on_posts');
define ('AI_OPTION_DISPLAY_ON_CATEGORY_PAGES',   'display_on_category_pages');
define ('AI_OPTION_DISPLAY_ON_SEARCH_PAGES',     'display_on_search_pages');
define ('AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES',    'display_on_archive_pages');
define ('AI_OPTION_ENABLED_ON_WHICH_PAGES',      'enabled_on_which_pages');
define ('AI_OPTION_ENABLED_ON_WHICH_POSTS',      'enabled_on_which_posts');
define ('AI_OPTION_ENABLE_PHP_CALL',             'enable_php_call');
define ('AI_OPTION_PARAGRAPH_TEXT',              'paragraph_text');
define ('AI_OPTION_PARAGRAPH_TEXT_TYPE',         'paragraph_text_type');
define ('AI_OPTION_CUSTOM_CSS',                  'custom_css');
define ('AI_OPTION_DISPLAY_FOR_USERS',           'display_for_users');
define ('AI_OPTION_DISPLAY_FOR_DEVICES',         'display_for_devices');
define ('AI_OPTION_DETECT_SERVER_SIDE',          'detect_server_side');
define ('AI_OPTION_DETECT_CLIENT_SIDE',          'detect_client_side');
define ('AI_OPTION_DETECT_VIEWPORT',             'detect_viewport');
define ('AI_OPTION_DISABLED',                    'disabled');

define ('AI_OPTION_IMPORT',                      'import');
define ('AI_OPTION_IMPORT_NAME',                 'import_name');

//misc
define('AD_EMPTY_VALUE','');

//define constant variable form
define('AI_FORM_SAVE','ai_save');
define('AI_FORM_CLEAR','ai_clear');

define('AD_AUTHOR_SITE', '<!-- Powered by Ad Inserter Plugin By Spacetime -->');
define('AD_ROTATE_SEPARATOR', '|rotate|');

//form select options
define('AD_SELECT_SELECTED','selected');

//Position options
define('AD_SELECT_NONE','None');
define('AD_SELECT_BEFORE_POST','Before Post');
define('AD_SELECT_AFTER_POST','After Post');
define('AD_SELECT_BEFORE_PARAGRAPH','Before Paragraph');
define('AD_SELECT_AFTER_PARAGRAPH','After Paragraph');
define('AD_SELECT_BEFORE_CONTENT','Before Content');
define('AD_SELECT_AFTER_CONTENT','After Content');
define('AD_SELECT_BEFORE_EXCERPT','Before Excerpt');
define('AD_SELECT_AFTER_EXCERPT','After Excerpt');

define('AD_SELECT_WIDGET','Widget');              // Deprecated
define('AD_SELECT_BEFORE_TITLE','Before Title');  // Deprecated
define('AD_SELECT_MANUAL','Manual');              // Deprecated

//Display options
define('AD_DISPLAY_ALL_USERS','all users');
define('AD_DISPLAY_LOGGED_IN_USERS','logged in users');
define('AD_DISPLAY_NOT_LOGGED_IN_USERS','not logged in users');
define('AD_DISPLAY_ADMINISTRATORS','administrators');

define('AD_DISPLAY_ALL_DEVICES','all');
define('AD_DISPLAY_DESKTOP_DEVICES','desktop');
define('AD_DISPLAY_MOBILE_DEVICES','mobile');
define('AD_DISPLAY_TABLET_DEVICES','tablet');
define('AD_DISPLAY_PHONE_DEVICES','phone');
define('AD_DISPLAY_DESKTOP_TABLET_DEVICES','desktop and tablet');
define('AD_DISPLAY_DESKTOP_PHONE_DEVICES','desktop and phone');

//Direction options
define('AD_DIRECTION_FROM_TOP','From Top');
define('AD_DIRECTION_FROM_BOTTOM','From Bottom');

//Post-Page options
define('AD_ENABLED_ON_ALL',                     'On all');
define('AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED',  'On all except selected');
define('AD_ENABLED_ONLY_ON_SELECTED',           'Only on selected');

//Alignment options
define('AD_ALIGNMENT_NO_WRAPPING','No Wrapping');
define('AD_ALIGNMENT_CUSTOM_CSS','Custom CSS');
define('AD_ALIGNMENT_NONE','None');
define('AD_ALIGNMENT_LEFT','Align Left');
define('AD_ALIGNMENT_RIGHT','Align Right');
define('AD_ALIGNMENT_CENTER','Center');
define('AD_ALIGNMENT_FLOAT_LEFT','Float Left');
define('AD_ALIGNMENT_FLOAT_RIGHT','Float Right');

//List Type
define('AD_BLACK_LIST','Black List');
define('AD_WHITE_LIST','White List');

//Filter Type
define ('AI_OPTION_FILTER_AUTO',                    'Auto');
define ('AI_OPTION_FILTER_PHP_FUNCTION_CALLS',      'PHP function calls');
define ('AI_OPTION_FILTER_CONTENT_PROCESSING',      'Content processing');
define ('AI_OPTION_FILTER_EXCERPT_PROCESSING',      'Excerpt processing');
define ('AI_OPTION_FILTER_BEFORE_POST_PROCESSING',  'Before post processing');
define ('AI_OPTION_FILTER_AFTER_POST_PROCESSING',   'After post processing');
define ('AI_OPTION_FILTER_WIDGET_DRAWING',          'Widget drawing');
define ('AI_OPTION_FILTER_SUBPAGES',                'Subpages');

//Counter names
define ('AI_BLOCK_COUNTER_NAME',                    'AI_BLOCK_COUNTER_');
define ('AI_PHP_FUNCTION_CALL_COUNTER_NAME',        'AI_PHP_FUNCTION_CALL_COUNTER_');
define ('AI_CONTENT_COUNTER_NAME',                  'AI_CONTENT_COUNTER');
define ('AI_EXCERPT_COUNTER_NAME',                  'AI_EXCERPT_COUNTER');
define ('AI_LOOP_BEFORE_COUNTER_NAME',              'AI_LOOP_BEFORE_COUNTER');
define ('AI_LOOP_AFTER_COUNTER_NAME',               'AI_LOOP_AFTER_COUNTER');
define ('AI_WIDGET_COUNTER_NAME',                   'AI_WIDGET_COUNTER_');

//Text List Type
define('AD_CONTAIN','contain');
define('AD_DO_NOT_CONTAIN','do not contain');

//Avoid text action
define('AD_DO_NOT_INSERT','do not insert');
define('AD_TRY_TO_SHIFT_POSITION','try to shift position');

define('AD_ABOVE','above');
define('AD_BELOW','below');
define('AD_ABOVE_AND_THEN_BELOW','above and then below');
define('AD_BELOW_AND_THEN_ABOVE','below and then above');

// Scheduling
define('AI_SCHEDULING_OFF',             0);
define('AI_SCHEDULING_DELAY',           1);
define('AI_SCHEDULING_BETWEEN_DATES',   2);

define('AI_TEXT_OFF',                   'Insert immediately');
define('AI_TEXT_DELAY_INSERTION',       'Delay insertion');
define('AI_TEXT_INSERT_BETWEEN_DATES',  'Insert between dates');

// Dynamic blocks
define('AI_DYNAMIC_BLOCKS_SERVER_SIDE',       0);
define('AI_DYNAMIC_BLOCKS_CLIENT_SIDE',       1);
define('AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC',  2);

define('AI_TEXT_SERVER_SIDE',           'Server-side');
define('AI_TEXT_CLIENT_SIDE',           'Client-side');
define('AI_TEXT_SERVER_SIDE_W3TC',      'Server-side using W3 Total Cache');

//Settings
define('AD_SETTINGS_CHECKED',     '1');
define('AD_SETTINGS_NOT_CHECKED', '0');

define('DEFAULT_MARGIN', 8);
define('AI_COOKIE_TIME', 3600);

define ('DEFAULT_SYNTAX_HIGHLIGHTER_THEME', 'ad_inserter');
define ('DEFAULT_BLOCK_CLASS_NAME', 'code-block');
define ('DEFAULT_MINIMUM_USER_ROLE', 'administrator');
define ('DEFAULT_PLUGIN_PRIORITY', 99999);
define ('DEFAULT_DYNAMIC_BLOCKS', AI_DYNAMIC_BLOCKS_SERVER_SIDE);
define ('DEFAULT_PARAGRAPH_TAGS', 'p');
define ('DEFAULT_ADMIN_TOOLBAR_DEBUGGING', AD_SETTINGS_CHECKED);
define ('DEFAULT_REMOTE_DEBUGGING', AD_SETTINGS_NOT_CHECKED);
define ('DEFAULT_JAVASCRIPT_DEBUGGING', AD_SETTINGS_NOT_CHECKED);
define ('DEFAULT_MULTISITE_SETTINGS_PAGE', AD_SETTINGS_CHECKED);
define ('DEFAULT_MULTISITE_WIDGETS', AD_SETTINGS_CHECKED);
define ('DEFAULT_MULTISITE_EXCEPTIONS', AD_SETTINGS_CHECKED);
define ('DEFAULT_MULTISITE_MAIN_FOR_ALL_BLOGS', AD_SETTINGS_NOT_CHECKED);

define ('DEFAULT_VIEWPORT_NAME_1', "Desktop");
define ('DEFAULT_VIEWPORT_NAME_2', "Tablet");
define ('DEFAULT_VIEWPORT_NAME_3', "Phone");

define ('DEFAULT_VIEWPORT_WIDTH_1', 980);
define ('DEFAULT_VIEWPORT_WIDTH_2', 768);
define ('DEFAULT_VIEWPORT_WIDTH_3', 0);

define ('DEFAULT_COUNTRY_GROUP_NAME', "Group");

define ('CONTENT_HOOK_BLOCKS',    'content_hook');
define ('EXCERPT_HOOK_BLOCKS',    'excerpt_hook');
define ('LOOP_START_HOOK_BLOCKS', 'loop_start_hook');
define ('LOOP_END_HOOK_BLOCKS',   'loop_end_hook');

define ('AI_CHECK_NONE',                  - 1);
define ('AI_CHECK_INSERTED',              0);

define ('AI_CHECK_PAGE_TYPE_FRONT_PAGE',  1);
define ('AI_CHECK_PAGE_TYPE_STATIC_PAGE', 2);
define ('AI_CHECK_PAGE_TYPE_POST',        3);
define ('AI_CHECK_PAGE_TYPE_CATEGORY',    4);
define ('AI_CHECK_PAGE_TYPE_SEARCH',      5);
define ('AI_CHECK_PAGE_TYPE_ARCHIVE',     6);
define ('AI_CHECK_PAGE_TYPE_FEED',        7);
define ('AI_CHECK_PAGE_TYPE_404',         8);

define ('AI_CHECK_DESKTOP_DEVICES',       9);
define ('AI_CHECK_MOBILE_DEVICES',        10);
define ('AI_CHECK_TABLET_DEVICES',        11);
define ('AI_CHECK_PHONE_DEVICES',         12);
define ('AI_CHECK_DESKTOP_TABLET_DEVICES',13);
define ('AI_CHECK_DESKTOP_PHONE_DEVICES', 14);

define ('AI_CHECK_CATEGORY',              15);
define ('AI_CHECK_TAG',                   16);
define ('AI_CHECK_URL',                   17);
define ('AI_CHECK_REFERER',               18);
define ('AI_CHECK_SCHEDULING',            19);
define ('AI_CHECK_CODE',                  20);
define ('AI_CHECK_LOGGED_IN_USER',        21);
define ('AI_CHECK_NOT_LOGGED_IN_USER',    22);
define ('AI_CHECK_ADMINISTRATOR',         23);

define ('AI_CHECK_ENABLED_ON_ALL_EXCEPT_ON_SELECTED', 24);
define ('AI_CHECK_ENABLED_ONLY_ON_SELECTED',          25);
define ('AI_CHECK_DISABLED_MANUALLY',     26);
define ('AI_CHECK_MAX_INSERTIONS',        27);
define ('AI_CHECK_FILTER',                28);
define ('AI_CHECK_PARAGRAPH_COUNTING',    29);
define ('AI_CHECK_ENABLED',               30);
define ('AI_CHECK_PARAGRAPHS_MIN_NUMBER', 31);
define ('AI_CHECK_NUMBER_OF_WORDS',       32);
define ('AI_CHECK_DEBUG_NO_INSERTION',    33);
define ('AI_CHECK_PARAGRAPH_TAGS',        34);
define ('AI_CHECK_PARAGRAPHS_WITH_TAGS',  35);
define ('AI_CHECK_PARAGRAPHS_AFTER_BLOCKQUOTE',    36);
define ('AI_CHECK_PARAGRAPHS_AFTER_MIN_MAX_WORDS', 37);
define ('AI_CHECK_PARAGRAPHS_AFTER_TEXT', 38);
define ('AI_CHECK_PARAGRAPHS_AFTER_CLEARANCE',     39);
define ('AI_CHECK_ID',                    40);
define ('AI_CHECK_URL_PARAMETER',         41);
define ('AI_CHECK_DO_NOT_INSERT',         42);
define ('AI_CHECK_AD_ABOVE',              43);
define ('AI_CHECK_AD_BELOW',              44);
define ('AI_CHECK_SHORTCODE_ATTRIBUTES',  45);
define ('AI_CHECK_COUNTRY',               46);
define ('AI_CHECK_IP_ADDRESS',            47);

define ('AI_PT_NONE',                   - 1);
define ('AI_PT_ANY',                      0);
define ('AI_PT_STATIC',                   1);
define ('AI_PT_POST',                     2);
define ('AI_PT_HOMEPAGE',                 3);
define ('AI_PT_CATEGORY',                 4);
define ('AI_PT_ARCHIVE',                  5);
define ('AI_PT_SEARCH',                   6);
define ('AI_PT_404',                      7);
define ('AI_PT_FEED',                     8);
define ('AI_PT_ADMIN',                    9);

define ('AI_USER_NOT_SET',                - 1);
define ('AI_USER_NOT_LOGGED_IN',          0);
define ('AI_USER_LOGGED_IN',              1);
define ('AI_USER_ADMINISTRATOR',          2);

define ('AI_WP_PAGE_TYPE',                0);
define ('AI_WP_USER',                     1);
define ('AI_WP_DEBUGGING',                2);
define ('AI_WP_DEBUG_BLOCK',              3);
define ('AI_WP_URL',                      4);
define ('SERVER_SIDE_DETECTION',          5);
define ('CLIENT_SIDE_DETECTION',          6);
define ('AI_CONTEXT',                     7);

define ('AI_CONTEXT_NONE',                0);
define ('AI_CONTEXT_CONTENT',             1);
define ('AI_CONTEXT_EXCERPT',             2);
define ('AI_CONTEXT_BEFORE_POST',         3);
define ('AI_CONTEXT_AFTER_POST',          4);
define ('AI_CONTEXT_WIDGET',              5);
define ('AI_CONTEXT_PHP_FUNCTION',        6);
define ('AI_CONTEXT_SHORTCODE',           7);
define ('AI_CONTEXT_HEADER',              8);
define ('AI_CONTEXT_FOOTER',              9);

define ('AI_URL_DEBUG',               'ai-debug');
define ('AI_URL_DEBUG_PROCESSING',    'ai-debug-processing');
define ('AI_URL_DEBUG_BLOCKS',        'ai-debug-blocks');
define ('AI_URL_DEBUG_USER',          'ai-debug-user');
define ('AI_URL_DEBUG_TAGS',          'ai-debug-tags');
define ('AI_URL_DEBUG_POSITIONS',     'ai-debug-positions');
define ('AI_URL_DEBUG_NO_INSERTION',  'ai-debug-no-insertion');
define ('AI_URL_DEBUG_PHP',           'ai-debug-php');
define ('AI_URL_DEBUG_COUNTRY',       'ai-debug-country');

define ('AI_DEBUG_PROCESSING',            0x01);
define ('AI_DEBUG_BLOCKS',                0x02);
define ('AI_DEBUG_TAGS',                  0x04);
define ('AI_DEBUG_POSITIONS',             0x08);
define ('AI_DEBUG_NO_INSERTION',          0x10);

if (!defined ('AD_INSERTER_BLOCKS'))
  define ('AD_INSERTER_BLOCKS', 16);

if (!defined ('AD_INSERTER_VIEWPORTS'))
  define ('AD_INSERTER_VIEWPORTS', 3);

define ('AI_DEBUG_TAGS_STYLE',           'font-weight: bold; color: white; padding: 2px;');
define ('AI_DEBUG_POSITIONS_STYLE',      'text-align: center; padding: 10px 0; font-weight: bold; border: 1px solid blue; color: blue; background: #eef;');
define ('AI_DEBUG_WIDGET_STYLE',         'margin: 0; padding: 0 5px; font-size: 10px; white-space: pre; overflow-x: auto; overflow-y: hidden;');

