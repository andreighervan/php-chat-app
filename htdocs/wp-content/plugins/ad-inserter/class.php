<?php

require_once AD_INSERTER_PLUGIN_DIR.'constants.php';

abstract class ai_BaseCodeBlock {
  var $wp_options;
  var $fallback;
  var $client_side_ip_address_detection;
  var $w3tc_code;

  function __construct () {

    $this->wp_options = array ();
    $this->fallback = 0;
    $this->client_side_ip_address_detection = false;
    $this->w3tc_code = '';

    $this->wp_options [AI_OPTION_CODE]                = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_PROCESS_PHP]         = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_ENABLE_MANUAL]       = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_ENABLE_404]          = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_DETECT_SERVER_SIDE]  = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES] = AD_DISPLAY_DESKTOP_DEVICES;
  }

  public function load_options ($block) {
    global $ai_db_options;

    if (isset ($ai_db_options [$block])) $options = $ai_db_options [$block]; else $options = '';

    // Convert old options
    if (!$options) {
      if     ($block == "h") $options = ai_get_option (str_replace ("#", "Header", AD_ADx_OPTIONS));
      elseif ($block == "f") $options = ai_get_option (str_replace ("#", "Footer", AD_ADx_OPTIONS));
      else                   $options = ai_get_option (str_replace ("#", $block, AD_ADx_OPTIONS));

      if (is_array ($options)) {

        $old_name = "ad" . $block . "_data";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CODE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_enable_manual";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLE_MANUAL] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_process_php";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PROCESS_PHP] = $options [$old_name];
          unset ($options [$old_name]);
        }

        $old_name = "adH_data";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CODE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "adH_enable";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLE_MANUAL] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "adH_process_php";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PROCESS_PHP] = $options [$old_name];
          unset ($options [$old_name]);
        }

        $old_name = "adF_data";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CODE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "adF_enable";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLE_MANUAL] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "adF_process_php";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PROCESS_PHP] = $options [$old_name];
          unset ($options [$old_name]);
        }

        $old_name = "ad" . $block . "_name";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_NAME] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_displayType";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_paragraphNumber";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PARAGRAPH_NUMBER] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_minimum_paragraphs";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_MIN_PARAGRAPHS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_minimum_words";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_MIN_WORDS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_excerptNumber";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_EXCERPT_NUMBER] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_directionType";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DIRECTION_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_floatType";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ALIGNMENT_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_general_tag";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_GENERAL_TAG] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_after_day";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_AFTER_DAYS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_user";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DOMAIN_LIST] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_domain_list_type";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DOMAIN_LIST_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_cat";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CATEGORY_LIST] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_cat_type";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CATEGORY_LIST_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_tag";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_TAG_LIST] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_block_tag_type";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_TAG_LIST_TYPE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_home";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_HOMEPAGE] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_page";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_post";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_POSTS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_category";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_CATEGORY_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_search";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_SEARCH_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_widget_settings_archive";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_enabled_on_which_pages";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLED_ON_WHICH_PAGES] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_enabled_on_which_posts";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLED_ON_WHICH_POSTS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_enable_php_call";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_ENABLE_PHP_CALL] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_paragraph_text";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_PARAGRAPH_TEXT] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_custom_css";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_CUSTOM_CSS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_display_for_users";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_FOR_USERS] = $options [$old_name];
          unset ($options [$old_name]);
        }
        $old_name = "ad" . $block . "_display_for_devices";
        if (isset ($options [$old_name])) {
          $options [AI_OPTION_DISPLAY_FOR_DEVICES] = $options [$old_name];
          unset ($options [$old_name]);
        }
      }
    }

    if ($options != '') $this->wp_options = array_merge ($this->wp_options, $options);
    unset ($this->wp_options ['']);
  }

  public function get_ad_data(){
    $ad_data = isset ($this->wp_options [AI_OPTION_CODE]) ? $this->wp_options [AI_OPTION_CODE] : "";
    return $ad_data;
  }

  public function get_enable_manual (){
    $enable_manual = isset ($this->wp_options [AI_OPTION_ENABLE_MANUAL]) ? $this->wp_options [AI_OPTION_ENABLE_MANUAL] : "";
    if ($enable_manual == '') $enable_manual = AD_SETTINGS_NOT_CHECKED;
    return $enable_manual;
  }

  public function get_process_php (){
    $process_php = isset ($this->wp_options [AI_OPTION_PROCESS_PHP]) ? $this->wp_options [AI_OPTION_PROCESS_PHP] : "";
    if ($process_php == '') $process_php = AD_SETTINGS_NOT_CHECKED;
    return $process_php;
  }

  public function get_enable_404 (){
    $enable_404 = isset ($this->wp_options [AI_OPTION_ENABLE_404]) ? $this->wp_options [AI_OPTION_ENABLE_404] : "";
    if ($enable_404 == '') $enable_404 = AD_SETTINGS_NOT_CHECKED;
    return $enable_404;
  }

  public function get_detection_server_side(){
    // Check old settings for all devices
    if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES])) {
     $display_for_devices = $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES];
    } else $display_for_devices = '';
    if ($display_for_devices == AD_DISPLAY_ALL_DEVICES) $option = AD_SETTINGS_NOT_CHECKED; else

      $option = isset ($this->wp_options [AI_OPTION_DETECT_SERVER_SIDE]) ? $this->wp_options [AI_OPTION_DETECT_SERVER_SIDE] : AD_SETTINGS_NOT_CHECKED;
    return $option;
  }

  function check_server_side_detection () {
    global $ai_last_check;

    if ($this->get_detection_server_side ()) {
      $display_for_devices = $this->get_display_for_devices ();

      $ai_last_check = AI_CHECK_DESKTOP_DEVICES;
      if ($display_for_devices == AD_DISPLAY_DESKTOP_DEVICES && !AI_DESKTOP) return false;
      $ai_last_check = AI_CHECK_MOBILE_DEVICES;
      if ($display_for_devices == AD_DISPLAY_MOBILE_DEVICES && !AI_MOBILE) return false;
      $ai_last_check = AI_CHECK_TABLET_DEVICES;
      if ($display_for_devices == AD_DISPLAY_TABLET_DEVICES && !AI_TABLET) return false;
      $ai_last_check = AI_CHECK_PHONE_DEVICES;
      if ($display_for_devices == AD_DISPLAY_PHONE_DEVICES && !AI_PHONE) return false;
      $ai_last_check = AI_CHECK_DESKTOP_TABLET_DEVICES;
      if ($display_for_devices == AD_DISPLAY_DESKTOP_TABLET_DEVICES && !(AI_DESKTOP || AI_TABLET)) return false;
      $ai_last_check = AI_CHECK_DESKTOP_PHONE_DEVICES;
      if ($display_for_devices == AD_DISPLAY_DESKTOP_PHONE_DEVICES && !(AI_DESKTOP || AI_PHONE)) return false;
    }
    return true;
  }

  public function get_display_for_devices (){
    if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES])) {
     $display_for_devices = $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES];
    } else $display_for_devices = '';
    //                                convert old option
    if ($display_for_devices == '' || $display_for_devices == AD_DISPLAY_ALL_DEVICES) $display_for_devices = AD_DISPLAY_DESKTOP_DEVICES;
    return $display_for_devices;
  }

  public function clear_code_cache (){
    unset ($this->wp_options ['GENERATED_CODE']);
  }

  public function ai_getCode (){
    global $block_object, $ai_total_php_time;

    $obj = $this;
    if ($this->fallback != 0) {
      $obj = $block_object [$this->fallback];
    }

    $code = $obj->get_ad_data();

    if ($obj->get_process_php ()) {
      $start_time = microtime ();

      $global_name = 'GENERATED_CODE';
      if (isset ($obj->wp_options [$global_name])) return $obj->wp_options [$global_name];

      ob_start ();
      eval ("?>". $code . "<?php ");
      $code = ob_get_clean ();
      if (strpos ($code, __FILE__)) {
        if (preg_match ("/(.+) in ".str_replace ("/", "\/", __FILE__)."/", $code, $error_message))
          $code = "PHP error in " . AD_INSERTER_NAME . " code block ".$obj->number . " - " . $obj->get_ad_name() . "<br />\n" . $error_message [1];
      }

      // Cache generated code
      $obj->wp_options [$global_name] = $code;

      $ai_total_php_time += microtime () - $start_time;
    }

    return $code;
  }
}

abstract class ai_CodeBlock extends ai_BaseCodeBlock {

  var $number;

  function __construct () {

    $this->number = 0;

    parent::__construct();

    $this->wp_options [AI_OPTION_NAME]                       = AD_NAME;
    $this->wp_options [AI_OPTION_DISPLAY_TYPE]               = AD_SELECT_NONE;
    $this->wp_options [AI_OPTION_PARAGRAPH_NUMBER]           = AD_ONE;
    $this->wp_options [AI_OPTION_MIN_PARAGRAPHS]             = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MIN_WORDS]                  = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MAX_WORDS]                  = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MIN_PARAGRAPH_WORDS]        = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MAX_PARAGRAPH_WORDS]        = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_COUNT_INSIDE_BLOCKQUOTE]    = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_PARAGRAPH_TAGS]             = DEFAULT_PARAGRAPH_TAGS;
    $this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_ABOVE]     = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_BELOW]     = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_AVOID_TEXT_ABOVE]           = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_AVOID_TEXT_BELOW]           = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_AVOID_ACTION]               = AD_TRY_TO_SHIFT_POSITION;
    $this->wp_options [AI_OPTION_AVOID_TRY_LIMIT]            = AD_ONE;
    $this->wp_options [AI_OPTION_AVOID_DIRECTION]            = AD_BELOW_AND_THEN_ABOVE;
    $this->wp_options [AI_OPTION_EXCERPT_NUMBER]             = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_FILTER_TYPE]                = AI_OPTION_FILTER_AUTO;
    $this->wp_options [AI_OPTION_DIRECTION_TYPE]             = AD_DIRECTION_FROM_TOP;
    $this->wp_options [AI_OPTION_ALIGNMENT_TYPE]             = AD_ALIGNMENT_NONE;
    $this->wp_options [AI_OPTION_GENERAL_TAG]                = AD_GENERAL_TAG;
    $this->wp_options [AI_OPTION_SCHEDULING]                 = AI_SCHEDULING_OFF;
    $this->wp_options [AI_OPTION_AFTER_DAYS]                 = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_START_DATE]                 = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_END_DATE]                   = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_FALLBACK]                   = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_MAXIMUM_INSERTIONS]         = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_ID_LIST]                    = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_ID_LIST_TYPE]               = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_URL_LIST]                   = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_URL_LIST_TYPE]              = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_URL_PARAMETER_LIST]         = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_URL_PARAMETER_LIST_TYPE]    = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_DOMAIN_LIST]                = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_DOMAIN_LIST_TYPE]           = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_IP_ADDRESS_LIST]            = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_IP_ADDRESS_LIST_TYPE]       = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_COUNTRY_LIST]               = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_COUNTRY_LIST_TYPE]          = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_CATEGORY_LIST]              = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_CATEGORY_LIST_TYPE]         = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_TAG_LIST]                   = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_TAG_LIST_TYPE]              = AD_BLACK_LIST;
    $this->wp_options [AI_OPTION_DISPLAY_ON_POSTS]           = AD_SETTINGS_CHECKED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_PAGES]           = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_HOMEPAGE]        = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_CATEGORY_PAGES]  = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_SEARCH_PAGES]    = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES]   = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_ENABLE_FEED]                = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_ENABLED_ON_WHICH_PAGES]     = AD_ENABLED_ON_ALL;
    $this->wp_options [AI_OPTION_ENABLED_ON_WHICH_POSTS]     = AD_ENABLED_ON_ALL;
    $this->wp_options [AI_OPTION_ENABLE_PHP_CALL]            = AD_SETTINGS_NOT_CHECKED;
    $this->wp_options [AI_OPTION_ENABLE_WIDGET]              = AD_SETTINGS_CHECKED;
    $this->wp_options [AI_OPTION_PARAGRAPH_TEXT]             = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_PARAGRAPH_TEXT_TYPE]        = AD_DO_NOT_CONTAIN;
    $this->wp_options [AI_OPTION_CUSTOM_CSS]                 = AD_EMPTY_DATA;
    $this->wp_options [AI_OPTION_DISPLAY_FOR_USERS]          = AD_DISPLAY_ALL_USERS;
    $this->wp_options [AI_OPTION_DETECT_CLIENT_SIDE]         = AD_SETTINGS_NOT_CHECKED;
    for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
      $this->wp_options [AI_OPTION_DETECT_VIEWPORT . '_' . $viewport] = AD_SETTINGS_NOT_CHECKED;
    }
  }

  public function get_display_type(){
    $option = isset ($this->wp_options [AI_OPTION_DISPLAY_TYPE]) ? $this->wp_options [AI_OPTION_DISPLAY_TYPE] : "";
    if ($option == '') $option = AD_SELECT_NONE;
    elseif ($option == AD_SELECT_MANUAL) $option = AD_SELECT_NONE;
    elseif ($option == AD_SELECT_BEFORE_TITLE) $option = AD_SELECT_BEFORE_POST;
    elseif ($option == AD_SELECT_WIDGET) $option = AD_SELECT_NONE;
    return $option;
  }

   public function get_paragraph_number(){
     $option = isset ($this->wp_options [AI_OPTION_PARAGRAPH_NUMBER]) ? $this->wp_options [AI_OPTION_PARAGRAPH_NUMBER] : "";
     if ($option == '') $option = AD_ZERO;
     return $option;
    }

   public function get_paragraph_number_minimum(){
     $option = isset ($this->wp_options [AI_OPTION_MIN_PARAGRAPHS]) ? $this->wp_options [AI_OPTION_MIN_PARAGRAPHS] : "";
     return $option;
    }

   public function get_minimum_words(){
     $option = isset ($this->wp_options [AI_OPTION_MIN_WORDS]) ? $this->wp_options [AI_OPTION_MIN_WORDS] : "";
     return $option;
    }

   public function get_maximum_words(){
     $option = isset ($this->wp_options [AI_OPTION_MAX_WORDS]) ? $this->wp_options [AI_OPTION_MAX_WORDS] : "";
     return $option;
    }

  public function get_paragraph_tags(){
     $option = isset ($this->wp_options [AI_OPTION_PARAGRAPH_TAGS]) ? $this->wp_options [AI_OPTION_PARAGRAPH_TAGS] : DEFAULT_PARAGRAPH_TAGS;
     return $option;
  }

   public function get_minimum_paragraph_words(){
     $option = isset ($this->wp_options [AI_OPTION_MIN_PARAGRAPH_WORDS]) ? $this->wp_options [AI_OPTION_MIN_PARAGRAPH_WORDS] : "";
     return $option;
    }

   public function get_maximum_paragraph_words(){
     $option = isset ($this->wp_options [AI_OPTION_MAX_PARAGRAPH_WORDS]) ? $this->wp_options [AI_OPTION_MAX_PARAGRAPH_WORDS] : "";
     return $option;
    }

   public function get_count_inside_blockquote(){
     $option = isset ($this->wp_options [AI_OPTION_COUNT_INSIDE_BLOCKQUOTE]) ? $this->wp_options [AI_OPTION_COUNT_INSIDE_BLOCKQUOTE] : "";
     if ($option == '') $option = AD_SETTINGS_NOT_CHECKED;
     return $option;
    }

   public function get_avoid_paragraphs_above(){
     $option = isset ($this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_ABOVE]) ? $this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_ABOVE] : "";
     return $option;
    }

   public function get_avoid_paragraphs_below(){
     $option = isset ($this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_BELOW]) ? $this->wp_options [AI_OPTION_AVOID_PARAGRAPHS_BELOW] : "";
     return $option;
    }

   public function get_avoid_text_above(){
     $option = isset ($this->wp_options [AI_OPTION_AVOID_TEXT_ABOVE]) ? $this->wp_options [AI_OPTION_AVOID_TEXT_ABOVE] : "";
     return $option;
    }

   public function get_avoid_text_below(){
     $option = isset ($this->wp_options [AI_OPTION_AVOID_TEXT_BELOW]) ? $this->wp_options [AI_OPTION_AVOID_TEXT_BELOW] : "";
     return $option;
    }

   public function get_avoid_action(){
     $option = isset ($this->wp_options [AI_OPTION_AVOID_ACTION]) ? $this->wp_options [AI_OPTION_AVOID_ACTION] : "";
     if ($option == '') $option = AD_TRY_TO_SHIFT_POSITION;
     return $option;
    }

   public function get_avoid_try_limit(){
     $option = isset ($this->wp_options [AI_OPTION_AVOID_TRY_LIMIT]) ? $this->wp_options [AI_OPTION_AVOID_TRY_LIMIT] : "";
     if ($option == '') $option = AD_ZERO;
     return $option;
    }

   public function get_avoid_direction(){
     $option = isset ($this->wp_options [AI_OPTION_AVOID_DIRECTION]) ? $this->wp_options [AI_OPTION_AVOID_DIRECTION] : "";
     if ($option == '') $option = AD_BELOW_AND_THEN_ABOVE;
     return $option;
    }

   public function get_call_filter(){
     $option = isset ($this->wp_options [AI_OPTION_EXCERPT_NUMBER]) ? $this->wp_options [AI_OPTION_EXCERPT_NUMBER] : "";
     return $option;
    }

   public function get_filter_type(){
     $option = isset ($this->wp_options [AI_OPTION_FILTER_TYPE]) ? $this->wp_options [AI_OPTION_FILTER_TYPE] : "";
     if ($option == '') $option = AI_OPTION_FILTER_AUTO;
     return $option;
    }

   public function get_direction_type(){
     $option = isset ($this->wp_options [AI_OPTION_DIRECTION_TYPE]) ? $this->wp_options [AI_OPTION_DIRECTION_TYPE] : "";
     if ($option == '') $option = AD_DIRECTION_FROM_TOP;
     return $option;
    }

   public function get_alignment_type(){
     // Update old field names
     $option = isset ($this->wp_options [AI_OPTION_ALIGNMENT_TYPE]) ? $this->wp_options [AI_OPTION_ALIGNMENT_TYPE] : "";
     if ($option == 'Left'){
       $option = AD_ALIGNMENT_FLOAT_LEFT;
       $this->wp_options [AI_OPTION_ALIGNMENT_TYPE] = $option;
     }
     elseif ($option == 'Right'){
       $option = AD_ALIGNMENT_FLOAT_RIGHT;
       $this->wp_options [AI_OPTION_ALIGNMENT_TYPE] = $option;
     }
     elseif ($option == '') $option = AD_ALIGNMENT_NONE;
     return $option;
    }

  public function alignmet_style ($alignment_type, $margin = DEFAULT_MARGIN){
    if ($margin < 0) $margin = 0;


    if ($alignment_type == AD_ALIGNMENT_NONE) {
      $style = "margin: ".$margin."px 0px;";
    }
    elseif ($alignment_type == AD_ALIGNMENT_LEFT) {
      $style = "text-align: left; margin: ".$margin."px 0px;";
    }
    elseif ($alignment_type == AD_ALIGNMENT_RIGHT) {
      $style = "text-align: right; margin: ".$margin."px 0px;";
    }
    elseif ($alignment_type == AD_ALIGNMENT_CENTER) {
      $style = "text-align: center; margin: ".$margin."px auto;";
    }
    elseif ($alignment_type == AD_ALIGNMENT_FLOAT_LEFT) {
      $style = "float: left; margin: ".$margin."px ".$margin."px ".$margin."px 0px;";
    }
    elseif ($alignment_type == AD_ALIGNMENT_FLOAT_RIGHT) {
      $style = "float: right; margin: ".$margin."px 0px ".$margin."px ".$margin."px;";
    }
    elseif ($alignment_type == AD_ALIGNMENT_CUSTOM_CSS) {
      $style = $this->get_custom_css ();
    }
    else {
      $style = "";
    }

    return $style;
  }

  public function get_alignmet_style ($margin = DEFAULT_MARGIN){
    return $this->alignmet_style ($this->get_alignment_type(), $margin);
  }

   public function get_display_settings_post(){
     $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_POSTS]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_POSTS] : "";
     if ($option == '') $option = AD_SETTINGS_CHECKED;
     return $option;
   }

   public function get_display_settings_page(){
     $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_PAGES]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_PAGES] : "";
     if ($option == '') $option = AD_SETTINGS_NOT_CHECKED;
     return $option;
   }

    public function get_display_settings_home(){
      global $ai_db_options;

      $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_HOMEPAGE]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_HOMEPAGE] : "";
      if ($option == '') $option = AD_SETTINGS_NOT_CHECKED;

      if ($ai_db_options ['global']['VERSION'] < '010605') {
        if (isset ($this->wp_options [AI_OPTION_DISPLAY_TYPE])) {
          $display_type = $this->wp_options [AI_OPTION_DISPLAY_TYPE];
        } else $display_type = '';

        if ($display_type == AD_SELECT_BEFORE_PARAGRAPH ||
            $display_type == AD_SELECT_AFTER_PARAGRAPH ||
            $display_type == AD_SELECT_BEFORE_CONTENT ||
            $display_type == AD_SELECT_AFTER_CONTENT)
          $option = AD_SETTINGS_NOT_CHECKED;
      }

      return $option;
    }

    public function get_display_settings_category(){
      global $ai_db_options;

      $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_CATEGORY_PAGES]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_CATEGORY_PAGES] : "";
      if ($option == '') $option = AD_SETTINGS_NOT_CHECKED;

      if ($ai_db_options ['global']['VERSION'] < '010605') {
        if (isset ($this->wp_options [AI_OPTION_DISPLAY_TYPE])) {
          $display_type = $this->wp_options [AI_OPTION_DISPLAY_TYPE];
        } else $display_type = '';

        if ($display_type == AD_SELECT_BEFORE_PARAGRAPH ||
            $display_type == AD_SELECT_AFTER_PARAGRAPH ||
            $display_type == AD_SELECT_BEFORE_CONTENT ||
            $display_type == AD_SELECT_AFTER_CONTENT)
          $option = AD_SETTINGS_NOT_CHECKED;
      }

      return $option;
    }

    public function get_display_settings_search(){
      global $ai_db_options;

      $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_SEARCH_PAGES]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_SEARCH_PAGES] : "";
      if ($option == '') $option = AD_SETTINGS_NOT_CHECKED;

      if ($ai_db_options ['global']['VERSION'] < '010605') {
        if (isset ($this->wp_options [AI_OPTION_DISPLAY_TYPE])) {
          $display_type = $this->wp_options [AI_OPTION_DISPLAY_TYPE];
        } else $display_type = '';

        if ($display_type == AD_SELECT_BEFORE_PARAGRAPH ||
            $display_type == AD_SELECT_AFTER_PARAGRAPH ||
            $display_type == AD_SELECT_BEFORE_CONTENT ||
            $display_type == AD_SELECT_AFTER_CONTENT)
          $option = AD_SETTINGS_NOT_CHECKED;
      }

      return $option;
    }

    public function get_display_settings_archive(){
      global $ai_db_options;

      $option = isset ($this->wp_options [AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES]) ? $this->wp_options [AI_OPTION_DISPLAY_ON_ARCHIVE_PAGES] : "";
      if ($option == '') $option = AD_SETTINGS_NOT_CHECKED;

      if ($ai_db_options ['global']['VERSION'] < '010605') {
        if (isset ($this->wp_options [AI_OPTION_DISPLAY_TYPE])) {
          $display_type = $this->wp_options [AI_OPTION_DISPLAY_TYPE];
        } else $display_type = '';

        if ($display_type == AD_SELECT_BEFORE_PARAGRAPH ||
            $display_type == AD_SELECT_AFTER_PARAGRAPH ||
            $display_type == AD_SELECT_BEFORE_CONTENT ||
            $display_type == AD_SELECT_AFTER_CONTENT)
          $option = AD_SETTINGS_NOT_CHECKED;
      }

      return $option;
    }

  public function get_enable_feed (){
    $enable_feed = isset ($this->wp_options [AI_OPTION_ENABLE_FEED]) ? $this->wp_options [AI_OPTION_ENABLE_FEED] : "";
    if ($enable_feed == '') $enable_feed = AD_SETTINGS_NOT_CHECKED;
    return $enable_feed;
  }

   public function get_enable_manual (){
     $option = isset ($this->wp_options [AI_OPTION_ENABLE_MANUAL]) ? $this->wp_options [AI_OPTION_ENABLE_MANUAL] : "";
     if ($option == '') {
       $display_option = $this->get_display_type ();
       if ($display_option == AD_SELECT_MANUAL)
         $option = AD_SETTINGS_CHECKED; else
           $option = AD_SETTINGS_NOT_CHECKED;
     }
     return $option;
   }

    public function get_enable_widget (){
      global $ai_db_options;

      $enable_widget = isset ($this->wp_options [AI_OPTION_ENABLE_WIDGET]) ? $this->wp_options [AI_OPTION_ENABLE_WIDGET] : "";
      if ($enable_widget == '') $enable_widget = AD_SETTINGS_CHECKED;

      return $enable_widget;
    }

   public function get_enable_php_call (){
     $option = isset ($this->wp_options [AI_OPTION_ENABLE_PHP_CALL]) ? $this->wp_options [AI_OPTION_ENABLE_PHP_CALL] : "";
     if ($option == '') $option = AD_SETTINGS_NOT_CHECKED;
     return $option;
   }

   public function get_paragraph_text (){
     $paragraph_text = isset ($this->wp_options [AI_OPTION_PARAGRAPH_TEXT]) ? $this->wp_options [AI_OPTION_PARAGRAPH_TEXT] : "";
     return $paragraph_text;
   }

   public function get_paragraph_text_type (){
     $option = isset ($this->wp_options [AI_OPTION_PARAGRAPH_TEXT_TYPE]) ? $this->wp_options [AI_OPTION_PARAGRAPH_TEXT_TYPE] : "";
     if ($option == '') $option = AD_DO_NOT_CONTAIN;
     return $option;
   }

   public function get_custom_css (){
      global $ai_db_options;

      $option = isset ($this->wp_options [AI_OPTION_CUSTOM_CSS]) ? $this->wp_options [AI_OPTION_CUSTOM_CSS] : "";

      // Fix for old bug
      if ($ai_db_options ['global']['VERSION'] < '010605' && strpos ($option, "Undefined index")) $option = "";

      return $option;
   }

   public function get_display_for_users (){
     if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_USERS])) {
       $display_for_users = $this->wp_options [AI_OPTION_DISPLAY_FOR_USERS];
     } else $display_for_users = '';
     if ($display_for_users == '') $display_for_users = AD_DISPLAY_ALL_USERS;

     elseif ($display_for_users == 'all') $display_for_users = AD_DISPLAY_ALL_USERS;
     elseif ($display_for_users == 'logged in') $display_for_users = AD_DISPLAY_LOGGED_IN_USERS;
     elseif ($display_for_users == 'not logged in') $display_for_users = AD_DISPLAY_NOT_LOGGED_IN_USERS;

     return $display_for_users;
   }

   public function get_detection_client_side(){
     global $ai_db_options;

     $option = isset ($this->wp_options [AI_OPTION_DETECT_CLIENT_SIDE]) ? $this->wp_options [AI_OPTION_DETECT_CLIENT_SIDE] : AD_SETTINGS_NOT_CHECKED;

      if ($ai_db_options ['global']['VERSION'] < '010605') {
        if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES])) {
         $display_for_devices = $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES];
        } else $display_for_devices = '';

        if ($display_for_devices == AD_DISPLAY_ALL_DEVICES) $option = AD_SETTINGS_NOT_CHECKED;
      }

     return $option;
   }

  public function get_detection_viewport ($viewport){
    global $ai_db_options;

    $option_name = AI_OPTION_DETECT_VIEWPORT . '_' . $viewport;
    $option = isset ($this->wp_options [$option_name]) ? $this->wp_options [$option_name] : AD_SETTINGS_NOT_CHECKED;

    if ($ai_db_options ['global']['VERSION'] < '010605' && $this->get_detection_client_side()) {
      if (isset ($this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES])) {
       $display_for_devices = $this->wp_options [AI_OPTION_DISPLAY_FOR_DEVICES];
      } else $display_for_devices = '';

      if ($display_for_devices == AD_DISPLAY_DESKTOP_DEVICES ||
          $display_for_devices == AD_DISPLAY_DESKTOP_TABLET_DEVICES ||
          $display_for_devices == AD_DISPLAY_DESKTOP_PHONE_DEVICES) {
           switch ($viewport) {
             case 1:
               $option = AD_SETTINGS_CHECKED;
               break;
             default:
               $option = AD_SETTINGS_NOT_CHECKED;
           }
      }
      elseif ($display_for_devices == AD_DISPLAY_TABLET_DEVICES ||
              $display_for_devices == AD_DISPLAY_MOBILE_DEVICES ||
              $display_for_devices == AD_DISPLAY_DESKTOP_TABLET_DEVICES) {
           switch ($viewport) {
             case 2:
               $option = AD_SETTINGS_CHECKED;
               break;
             default:
               $option = AD_SETTINGS_NOT_CHECKED;
           }
      }
      elseif ($display_for_devices == AD_DISPLAY_PHONE_DEVICES ||
              $display_for_devices == AD_DISPLAY_MOBILE_DEVICES ||
              $display_for_devices == AD_DISPLAY_DESKTOP_PHONE_DEVICES) {
           switch ($viewport) {
             case 3:
               $option = AD_SETTINGS_CHECKED;
               break;
             default:
               $option = AD_SETTINGS_NOT_CHECKED;
           }
      }
      elseif ($display_for_devices == AD_DISPLAY_ALL_DEVICES) $option = AD_SETTINGS_NOT_CHECKED;
    }

    return $option;
  }

  public function ai_get_counters (&$title){
    global $ai_wp_data, $ad_interter_globals;

    $counters = '';
    $title = 'Counters:';

    if (isset ($ad_interter_globals [AI_CONTENT_COUNTER_NAME]) && ($ai_wp_data [AI_CONTEXT] == AI_CONTEXT_CONTENT || $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_SHORTCODE)) {
      $counters .= ' C='.$ad_interter_globals [AI_CONTENT_COUNTER_NAME];
      $title .= ' C= Content, ';
    }

    if (isset ($ad_interter_globals [AI_EXCERPT_COUNTER_NAME]) && $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_EXCERPT) {
      $counters .= ' X='.$ad_interter_globals [AI_EXCERPT_COUNTER_NAME];
      $title .= ' X = Excerpt, ';
    }

    if (isset ($ad_interter_globals [AI_LOOP_BEFORE_COUNTER_NAME]) && $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_BEFORE_POST) {
      $counters .= ' B='.$ad_interter_globals [AI_LOOP_BEFORE_COUNTER_NAME];
      $title .= ' B = Before post, ';
    }

    if (isset ($ad_interter_globals [AI_LOOP_AFTER_COUNTER_NAME]) && $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_AFTER_POST) {
      $counters .= ' A='.$ad_interter_globals [AI_LOOP_AFTER_COUNTER_NAME];
      $title .= ' A = After post, ';
    }

    if (isset ($ad_interter_globals [AI_WIDGET_COUNTER_NAME . $this->number]) && $ai_wp_data [AI_CONTEXT] == AI_CONTEXT_WIDGET) {
      $counters .= ' W='.$ad_interter_globals [AI_WIDGET_COUNTER_NAME . $this->number];
      $title .= ' W = Widget, ';
    }

    if (isset ($ad_interter_globals [AI_PHP_FUNCTION_CALL_COUNTER_NAME . $this->number])) {
      $counters .= ' P='.$ad_interter_globals [AI_PHP_FUNCTION_CALL_COUNTER_NAME . $this->number];
      $title .= ' P = PHP function call, ';
    }

    if (isset ($ad_interter_globals [AI_BLOCK_COUNTER_NAME . $this->number])) {
      $counters .= ' N='.$ad_interter_globals [AI_BLOCK_COUNTER_NAME . $this->number];
      $title .= ' N = Block';
    }

    return $counters;
  }

  public function ai_getProcessedCode ($hide_label = false, $force_server_side_code = false){
    global $ai_wp_data, $ad_interter_globals, $block_object;

    $processed_code = do_shortcode ($this->replace_ai_tags ($this->ai_getCode ()));
    $dynamic_blocks = get_dynamic_blocks ();
    if ($force_server_side_code || ($dynamic_blocks == AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC && defined ('AI_NO_W3TC'))) $dynamic_blocks = AI_DYNAMIC_BLOCKS_SERVER_SIDE;

    if (strpos ($processed_code, AD_ROTATE_SEPARATOR) !== false) {
      $ads = explode (AD_ROTATE_SEPARATOR, $processed_code);

      switch ($dynamic_blocks) {
        case AI_DYNAMIC_BLOCKS_SERVER_SIDE:
          $processed_code = $ads [rand (0, count ($ads) - 1)];
          break;
        case AI_DYNAMIC_BLOCKS_CLIENT_SIDE:
          $processed_code = "\n<div class='ai-rotate' style='position: relative;'>\n";
          foreach ($ads as $index => $ad) {
            switch ($index) {
              case 0:
                $processed_code .= "<div class='ai-rotate-option' style='visibility: hidden;'>\n".trim ($ad, "\n")."\n</div>\n";
                break;
              default:
                $processed_code .= "<div class='ai-rotate-option' style='visibility: hidden; position: absolute; top: 0; left: 0; width: 100%; height: 100%;'>".trim ($ad, "\n")."\n</div>\n";
                break;
            }
          }
          $processed_code .= "</div>\n";
          break;
        case AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC:
          $this->w3tc_code = '$ai_code = unserialize (base64_decode (\''.base64_encode (serialize ($ads)).'\')); $ai_code = $ai_code [rand (0, count ($ai_code) - 1)]; $ai_enabled = true;';
          $processed_code = '<!-- mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
          $processed_code .= $this->w3tc_code.' echo $ai_code;';
          $processed_code .= '<!-- /mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
          break;
      }
    }

    if ($dynamic_blocks != AI_DYNAMIC_BLOCKS_SERVER_SIDE) {
      $countries = trim (str_replace (' ', '', strtoupper ($this->get_ad_country_list (true))));
      $country_list_type = $this->get_ad_country_list_type ();

      $ip_addresses = trim (str_replace (' ', '', strtolower ($this->get_ad_ip_address_list ())));
      $ip_address_list_type = $this->get_ad_ip_address_list_type ();

      if ($countries != '' || $ip_addresses != '') {
        switch ($dynamic_blocks) {
          case AI_DYNAMIC_BLOCKS_CLIENT_SIDE:
            if ($countries != '' || $ip_addresses != '') {
              if ($country_list_type    == AD_BLACK_LIST) $country_list_type    = 'B'; else $country_list_type = 'W';
              if ($ip_address_list_type == AD_BLACK_LIST) $ip_address_list_type = 'B'; else $ip_address_list_type = 'W';

              if ($countries != '')     $country_attributes     = "countries='$countries' country-list='$country_list_type'";             else $country_attributes = '';
              if ($ip_addresses != '')  $ip_address_attributes  = "ip-addresses='$ip_addresses' ip-address-list='$ip_address_list_type'"; else $ip_address_attributes = '';

              $block_class_name = get_block_class_name ().'-'.$this->number;
              $this->client_side_ip_address_detection = true;

              $processed_code = "\n<div class='ai-ip-data' $ip_address_attributes $country_attributes class-name='$block_class_name' style='visibility: hidden; position: absolute; width: 100%; height: 100%; z-index: -9999;'>$processed_code</div>\n";
            }
            break;
          case AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC:
            if ($this->w3tc_code == '') $this->w3tc_code = '$ai_code = unserialize (base64_decode (\''.base64_encode (serialize ($processed_code)).'\')); $ai_enabled = true;';

            $this->w3tc_code .= ' require_once \''.AD_INSERTER_PLUGIN_DIR.'includes/geo/Ip2Country.php\';';

            if ($ip_addresses != '') {
              $this->w3tc_code .= ' if ($ai_enabled) $ai_enabled = check_ip_address_list (unserialize (base64_decode (\''.base64_encode (serialize ($this->get_ad_ip_address_list (true))).'\')), '.($this->get_ad_ip_address_list_type () == AD_WHITE_LIST ? 'true':'false').');';
            }

            if ($countries != '') {
              $this->w3tc_code .= ' if ($ai_enabled) $ai_enabled = check_country_list (unserialize (base64_decode (\''.base64_encode (serialize ($this->get_ad_country_list (true))).'\')), '.($this->get_ad_country_list_type () == AD_WHITE_LIST ? 'true':'false').');';
            }

            $processed_code = '<!-- mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
            $processed_code .= $this->w3tc_code.' if ($ai_enabled) echo $ai_code;';
            $processed_code .= '<!-- /mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
            break;
        }
      }
    }

    $title = '';
    $fallback_code = '';
    $color = '#e00';
    if ($this->fallback != 0) {
      $color = '#e0e';
      $fallback_block = $block_object [$this->fallback];
      if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($fallback_block->number); else $url_parameters = "";
      $url = admin_url ('options-general.php?page=ad-inserter.php') . $url_parameters . '&tab=' . $fallback_block->number;
      $fallback_code = ' &nbsp;&#8678;&nbsp; '.
      '<a style="text-decoration: none; color: white;" title="Click to go to block settings" href="'. $url . '"><kbd style="display: none">[AI]</kbd>' . $this->fallback . ' &nbsp; ' . $fallback_block->get_ad_name () .'</a>';
    }
    $counters = $this->ai_get_counters ($title);

    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0 && !$hide_label) {
      if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($this->number); else $url_parameters = "";
      $url = admin_url ('options-general.php?page=ad-inserter.php') . $url_parameters . '&tab=' . $this->number;

      $processed_code = '<section style="border: 1px solid '.$color.';"><section style="padding: 1px 0 1px 5px; background: '.$color.'; color: white; font-size: 12px; text-align: left;"><a style="text-decoration: none; color: white;" title="Click to go to block settings" href="'
      . $url . '"><kbd style="display: none">[AI]</kbd>' . $this->number . ' &nbsp; ' . $this->get_ad_name () .'</a>'.$fallback_code.'<a style="float: right; text-decoration: none; color: white; padding: 0px 10px 0 0;"><kbd title="'.$title.'">'.$counters.'</kbd><kbd style="display: none">[/AI]</kbd></a></section>' . $processed_code . '</section>';
    }

    return $processed_code;
  }

   public function get_ad_general_tag(){
     $option = isset ($this->wp_options [AI_OPTION_GENERAL_TAG]) ? $this->wp_options [AI_OPTION_GENERAL_TAG] : "";
     if ($option == '') $option = AD_GENERAL_TAG;
     return $option;
   }

  public function get_scheduling(){
     $option = isset ($this->wp_options [AI_OPTION_SCHEDULING]) ? $this->wp_options [AI_OPTION_SCHEDULING] : "";

     // Convert old option
     if ($option == '' && intval ($this->get_ad_after_day()) != 0) $option = AI_SCHEDULING_DELAY;

     if ($option == '') $option = AI_SCHEDULING_OFF;

     return $option;
  }

  public function get_ad_after_day(){
     $option = isset ($this->wp_options [AI_OPTION_AFTER_DAYS]) ? $this->wp_options [AI_OPTION_AFTER_DAYS] : "";
//     if ($option == '') $option = AD_ZERO;
     return $option;
  }

  public function get_schedule_start_date(){
     $option = isset ($this->wp_options [AI_OPTION_START_DATE]) ? $this->wp_options [AI_OPTION_START_DATE] : "";
     return $option;
  }

  public function get_schedule_end_date(){
     $option = isset ($this->wp_options [AI_OPTION_END_DATE]) ? $this->wp_options [AI_OPTION_END_DATE] : "";
     return $option;
  }

  public function get_fallback(){
     $option = isset ($this->wp_options [AI_OPTION_FALLBACK]) ? $this->wp_options [AI_OPTION_FALLBACK] : "";
     return $option;
  }

  public function get_maximum_insertions (){
     $option = isset ($this->wp_options [AI_OPTION_MAXIMUM_INSERTIONS]) ? $this->wp_options [AI_OPTION_MAXIMUM_INSERTIONS] : "";
     return $option;
  }

  public function get_id_list(){
     $option = isset ($this->wp_options [AI_OPTION_ID_LIST]) ? $this->wp_options [AI_OPTION_ID_LIST] : "";
     return $option;
  }

  public function get_id_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_ID_LIST_TYPE]) ? $this->wp_options [AI_OPTION_ID_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_url_list(){
     $option = isset ($this->wp_options [AI_OPTION_URL_LIST]) ? $this->wp_options [AI_OPTION_URL_LIST] : "";
     return $option;
  }

  public function get_ad_url_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_URL_LIST_TYPE]) ? $this->wp_options [AI_OPTION_URL_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_url_parameter_list(){
     $option = isset ($this->wp_options [AI_OPTION_URL_PARAMETER_LIST]) ? $this->wp_options [AI_OPTION_URL_PARAMETER_LIST] : "";
     return $option;
  }

  public function get_url_parameter_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_URL_PARAMETER_LIST_TYPE]) ? $this->wp_options [AI_OPTION_URL_PARAMETER_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_domain_list(){
     $option = isset ($this->wp_options [AI_OPTION_DOMAIN_LIST]) ? $this->wp_options [AI_OPTION_DOMAIN_LIST] : "";
     return $option;
  }

  public function get_ad_domain_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_DOMAIN_LIST_TYPE]) ? $this->wp_options [AI_OPTION_DOMAIN_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_ip_address_list (){
     $option = isset ($this->wp_options [AI_OPTION_IP_ADDRESS_LIST]) ? $this->wp_options [AI_OPTION_IP_ADDRESS_LIST] : "";
     return $option;
  }

  public function get_ad_ip_address_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_IP_ADDRESS_LIST_TYPE]) ? $this->wp_options [AI_OPTION_IP_ADDRESS_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_country_list ($expand = false){
     $option = isset ($this->wp_options [AI_OPTION_COUNTRY_LIST]) ? $this->wp_options [AI_OPTION_COUNTRY_LIST] : "";
     if ($expand && function_exists ('expanded_country_list')) return expanded_country_list ($option);
     return $option;
  }

  public function get_ad_country_list_type (){
     $option = isset ($this->wp_options [AI_OPTION_COUNTRY_LIST_TYPE]) ? $this->wp_options [AI_OPTION_COUNTRY_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

	public function get_ad_name(){
     $option = isset ($this->wp_options [AI_OPTION_NAME]) ? $this->wp_options [AI_OPTION_NAME] : "";
     if ($option == '') $option = AD_NAME. " " . $this->number;
     return $option;
  }

  public function get_ad_block_cat(){
     $option = isset ($this->wp_options [AI_OPTION_CATEGORY_LIST]) ? $this->wp_options [AI_OPTION_CATEGORY_LIST] : "";
     return $option;
  }

  public function get_ad_block_cat_type(){
     $option = isset ($this->wp_options [AI_OPTION_CATEGORY_LIST_TYPE]) ? $this->wp_options [AI_OPTION_CATEGORY_LIST_TYPE] : "";

     // Update old data
     if ($option == ''){
       $option = AD_BLACK_LIST;
       $this->wp_options [AI_OPTION_CATEGORY_LIST_TYPE] = AD_BLACK_LIST;
     }

     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
   }

  public function get_ad_block_tag(){
     $option = isset ($this->wp_options [AI_OPTION_TAG_LIST]) ? $this->wp_options [AI_OPTION_TAG_LIST] : "";
     return $option;
  }

  public function get_ad_block_tag_type(){
     $option = isset ($this->wp_options [AI_OPTION_TAG_LIST_TYPE]) ? $this->wp_options [AI_OPTION_TAG_LIST_TYPE] : "";
     if ($option == '') $option = AD_BLACK_LIST;
     return $option;
  }

  public function get_ad_enabled_on_which_pages (){
    $option = isset ($this->wp_options [AI_OPTION_ENABLED_ON_WHICH_PAGES]) ? $this->wp_options [AI_OPTION_ENABLED_ON_WHICH_PAGES] : "";
    if ($option == '') $option = AD_ENABLED_ON_ALL;
    return $option;
  }

  public function get_ad_enabled_on_which_posts (){
    $option = isset ($this->wp_options [AI_OPTION_ENABLED_ON_WHICH_POSTS]) ? $this->wp_options [AI_OPTION_ENABLED_ON_WHICH_POSTS] : "";
    if ($option == '') $option = AD_ENABLED_ON_ALL;
    return $option;
  }

  public function get_viewport_classes (){
    $viewport_classes = "";
    if ($this->get_detection_client_side ()) {
      $all_viewports = true;
      for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
        $viewport_name = get_viewport_name ($viewport);
        if ($viewport_name != '') {
          if ($this->get_detection_viewport ($viewport)) $viewport_classes .= " ai-viewport-" . $viewport; else $all_viewports = false;
        }
      }
      if ($viewport_classes == "") $viewport_classes = " ai-viewport-0";
        elseif ($all_viewports) $viewport_classes = "";
    }
    return ($viewport_classes);
  }

  public function get_code_for_insertion ($viewport_classes = true, $hidden_widgets = false) {
    global $ai_wp_data;

    if ($this->get_alignment_type() == AD_ALIGNMENT_NO_WRAPPING) return $this->ai_getProcessedCode ();

    $block_class_name = get_block_class_name ();

    $hidden_blocks = '';
    if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_BLOCKS) != 0 && $this->get_detection_client_side()) {

      $title = '';
      $counters = $this->ai_get_counters ($title);

      if (function_exists ('ai_settings_url_parameters')) $url_parameters = ai_settings_url_parameters ($this->number); else $url_parameters = "";
      $url = admin_url ('options-general.php?page=ad-inserter.php') . $url_parameters . '&tab=' . $this->number;

      $hidden_block_text = '<section style="text-align: center; font-weight: bold;">'.($hidden_widgets ? 'WIDGET':'BLOCK').' INSERTED BUT NOT VISIBLE</section>';

      $visible_blocks = '';
      for ($viewport = 1; $viewport <= AD_INSERTER_VIEWPORTS; $viewport ++) {
        $viewport_name = get_viewport_name ($viewport);
        if ($viewport_name != '') {
          if ($this->get_detection_viewport ($viewport))
            $visible_blocks .= '<section class="ai-viewport-' . $viewport .'" style=""><section style="padding: 1px 0 1px 5px; text-align: center; background: red; color: white; font-size: 12px;"><a style="float: left; text-decoration: none; color: white;" title="Click to go to block settings" href="' . $url . '"><kbd style="display: none">[AI]</kbd>' . $this->number . ' ' . $this->get_ad_name () .'</a><a style="text-decoration: none; color: white;">'.$viewport_name.'</a><a style="float: right; text-decoration: none; color: white; padding-right: 5px;" title="'.$title.'">'.$counters.'<kbd style="display: none">[/AI]</kbd></a></section><section>'; else
              $hidden_blocks .= '<section class="ai-viewport-' . $viewport .'" style="' . $this->get_alignmet_style() . '; border: 1px solid blue;"><section style="padding: 1px 0 1px 5px; text-align: center; background: blue; color: white; font-size: 12px;"><a style="float: left; text-decoration: none; color: white;" title="Click to go to block settings" href="' . $url . '"><kbd style="display: none">[AI]</kbd>' . $this->number . ' ' . $this->get_ad_name () .'</a><a style="text-decoration: none; color: white;">'.$viewport_name.'</a><a style="float: right; text-decoration: none; color: white; padding-right: 5px;" title="'.$title.'">'.$counters.'<kbd style="display: none">[/AI]</kbd></a></section>' . $hidden_block_text . '</section>';
        }
      }

      $code = "<div style='border: 1px solid red;'>".$visible_blocks.$this->ai_getProcessedCode (true).'</div>';
    } else $code = $this->ai_getProcessedCode ();

    if ($hidden_widgets) return $hidden_blocks; else {
      if ($this->client_side_ip_address_detection) $additional_block_style = 'visibility: hidden; position: absolute; width: 100%; height: 100%; z-index: -9999; '; else $additional_block_style = '';
      $wrapper_before = $hidden_blocks . "<div class='" . $block_class_name . " " . $block_class_name . "-" . $this->number . ($viewport_classes ? $this->get_viewport_classes () : "") . "' style='" . $additional_block_style . $this->get_alignmet_style() . "'>";
      $wrapper_after  = "</div>";

      if ($this->w3tc_code != '' && get_dynamic_blocks () == AI_DYNAMIC_BLOCKS_SERVER_SIDE_W3TC && !defined ('AI_NO_W3TC')) {
        $code = '<!-- mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
        $code .= $this->w3tc_code.' if ($ai_enabled) echo unserialize (base64_decode (\''.base64_encode (serialize ($wrapper_before)).'\')), $ai_code, unserialize (base64_decode (\''.base64_encode (serialize ($wrapper_after)).'\'));';
        $code .= '<!-- /mfunc '.W3TC_DYNAMIC_SECURITY.' -->';
        return $code;
      } else return $wrapper_before . $code . $wrapper_after;
    }
  }

  public function before_paragraph ($content, $position_preview = false) {
    global $ai_wp_data, $ai_last_check;

    $paragraph_positions = array ();

    $paragraph_tags = trim ($this->get_paragraph_tags());
    if ($paragraph_tags == '') return $content;

    $paragraph_start_strings = explode (",", $paragraph_tags);

    $ai_last_check = AI_CHECK_PARAGRAPH_TAGS;
    if (count ($paragraph_start_strings) == 0) return $content;

    foreach ($paragraph_start_strings as $paragraph_start_string) {
      if (trim ($paragraph_start_string) == '') continue;

      $last_position = - 1;

      $paragraph_start_string = trim ($paragraph_start_string);
      if ($paragraph_start_string == "#") {
        $paragraph_start = "\r\n\r\n";
        if (!in_array (0, $paragraph_positions)) $paragraph_positions [] = 0;
      } else $paragraph_start = '<' . $paragraph_start_string;

      $paragraph_start_len = strlen ($paragraph_start);

      while (stripos ($content, $paragraph_start, $last_position + 1) !== false) {
        $last_position = stripos ($content, $paragraph_start, $last_position + 1);
        if ($paragraph_start_string == "#") $paragraph_positions [] = $last_position + 4; else
        if ($content [$last_position + $paragraph_start_len] == ">" || $content [$last_position + $paragraph_start_len] == " ")
          $paragraph_positions [] = $last_position;
      }
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_WITH_TAGS;
    if (count ($paragraph_positions) == 0) return $content;

    sort ($paragraph_positions);

    if (!$this->get_count_inside_blockquote ()) {
      preg_match_all ('/<\/?blockquote/i', $content, $blockquotes, PREG_OFFSET_CAPTURE);

      $blockquote_offsets = array ();
      $blockquotes = $blockquotes [0];
      foreach ($blockquotes as $index => $blockquote) {
        if (strtolower ($blockquote [0]) == '<blockquote' && isset ($blockquotes [$index + 1][0]) && strtolower ($blockquotes [$index + 1][0]) == '</blockquote') {
          $blockquote_offsets []= array ($blockquote [1] + 11, $blockquotes [$index + 1][1]);
        }
      }

      if (count ($blockquote_offsets) != 0) {
        $filtered_paragraph_positions = array ();
        foreach ($blockquote_offsets as $blockquote_offset) {
          foreach ($paragraph_positions as $paragraph_position) {
            if ($paragraph_position >= $blockquote_offset [0] && $paragraph_position <= $blockquote_offset [1]) continue;
            $filtered_paragraph_positions []= $paragraph_position;
          }
        }
        $paragraph_positions = $filtered_paragraph_positions;
      }
    }

    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_BLOCKQUOTE;
    if (count ($paragraph_positions) == 0) return $content;

    $paragraph_min_words = intval ($this->get_minimum_paragraph_words());
    $paragraph_max_words = intval ($this->get_maximum_paragraph_words());

    if ($paragraph_min_words != 0 || $paragraph_max_words != 0) {
      $filtered_paragraph_positions = array ();
      foreach ($paragraph_positions as $index => $paragraph_position) {
        $paragraph_code = $index == count ($paragraph_positions) - 1 ? substr ($content, $paragraph_position) : substr ($content, $paragraph_position, $paragraph_positions [$index + 1] - $paragraph_position);
        if ($this->check_number_of_words_in_paragraph ($paragraph_code, $paragraph_min_words, $paragraph_max_words)) $filtered_paragraph_positions [] = $paragraph_position;
      }
      $paragraph_positions = $filtered_paragraph_positions;
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_MIN_MAX_WORDS;
    if (count ($paragraph_positions) == 0) return $content;


    $paragraph_texts = explode (",", html_entity_decode ($this->get_paragraph_text()));
    if ($this->get_paragraph_text() != "" && count ($paragraph_texts) != 0) {

      $filtered_paragraph_positions = array ();
      $paragraph_text_type = $this->get_paragraph_text_type ();

      foreach ($paragraph_positions as $index => $paragraph_position) {
        $paragraph_code = $index == count ($paragraph_positions) - 1 ? substr ($content, $paragraph_position) : substr ($content, $paragraph_position, $paragraph_positions [$index + 1] - $paragraph_position);

        if ($paragraph_text_type == AD_CONTAIN) {
          $found = true;
          foreach ($paragraph_texts as $paragraph_text) {
            if (stripos ($paragraph_code, trim ($paragraph_text)) === false) {
              $found = false;
              break;
            }
          }
          if ($found) $filtered_paragraph_positions [] = $paragraph_position;
        } elseif ($paragraph_text_type == AD_DO_NOT_CONTAIN) {
            $found = false;
            foreach ($paragraph_texts as $paragraph_text) {
              if (stripos ($paragraph_code, trim ($paragraph_text)) !== false) {
                $found = true;
                break;
              }
            }
            if (!$found) $filtered_paragraph_positions [] = $paragraph_position;
          }
      }

      $paragraph_positions = $filtered_paragraph_positions;
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_TEXT;
    if (count ($paragraph_positions) == 0) return $content;


    $position = $this->get_paragraph_number();

    if ($position > 0 && $position < 1) {
      $position = intval ($position * (count ($paragraph_positions) - 1) + 0.5);
    }
    elseif ($position <= 0) {
      $position = rand (0, count ($paragraph_positions) - 1);
    } else $position --;

    if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
      $paragraph_positions = array_reverse ($paragraph_positions);
    }


    $avoid_paragraphs_above = intval ($this->get_avoid_paragraphs_above());
    $avoid_paragraphs_below = intval ($this->get_avoid_paragraphs_below());

    if (($avoid_paragraphs_above != 0 || $avoid_paragraphs_below != 0) && count ($paragraph_positions) > $position) {
      $avoid_text_above = $this->get_avoid_text_above();
      $avoid_text_below = $this->get_avoid_text_below();
      $avoid_paragraph_texts_above = explode (",", html_entity_decode (trim ($avoid_text_above)));
      $avoid_paragraph_texts_below = explode (",", html_entity_decode (trim ($avoid_text_below)));

      $direction = $this->get_avoid_direction();
      $max_checks = $this->get_avoid_try_limit();

      $checks = $max_checks;
      $saved_position = $position;
      do {
        $found_above = false;
        if ($position != 0 && $avoid_paragraphs_above != 0 && $avoid_text_above != "" && is_array ($avoid_paragraph_texts_above) && count ($avoid_paragraph_texts_above) != 0) {
          $paragraph_position_above = $position - $avoid_paragraphs_above;
          if ($paragraph_position_above < 0) $paragraph_position_above = 0;
          $paragraph_code = substr ($content, $paragraph_positions [$paragraph_position_above], $paragraph_positions [$position] - $paragraph_positions [$paragraph_position_above]);
          foreach ($avoid_paragraph_texts_above as $paragraph_text_above) {
            if (stripos ($paragraph_code, trim ($paragraph_text_above)) !== false) {
              $found_above = true;
              break;
            }
          }
        }

        $found_below = false;
        if ($avoid_paragraphs_below != 0 && $avoid_text_below != "" && is_array ($avoid_paragraph_texts_below) && count ($avoid_paragraph_texts_below) != 0) {
          $paragraph_position_below = $position + $avoid_paragraphs_below;
          if ($paragraph_position_below > count ($paragraph_positions) - 1)
            $content_position_below = strlen ($content); else
              $content_position_below = $paragraph_positions [$paragraph_position_below];
          $paragraph_code = substr ($content, $paragraph_positions [$position], $content_position_below - $paragraph_positions [$position]);
          foreach ($avoid_paragraph_texts_below as $paragraph_text_below) {
            if (stripos ($paragraph_code, trim ($paragraph_text_below)) !== false) {
              $found_below = true;
              break;
            }
          }
        }


//        echo "position: $position = before #", $position + 1, "<br />\n";
//        echo "checks: $checks<br />\n";
//        echo "direction: $direction<br />\n";
//        if ($found_above)
//        echo "found_above<br />\n";
//        if ($found_below)
//        echo "found_below<br />\n";
//        echo "=================<br />\n";


        if ($found_above || $found_below) {
          $ai_last_check = AI_CHECK_DO_NOT_INSERT;
          if ($this->get_avoid_action() == AD_DO_NOT_INSERT) return $content;

          switch ($direction) {
            case AD_ABOVE: // Try above
              $ai_last_check = AI_CHECK_AD_ABOVE;
              if ($position == 0) return $content; // Already at the top - do not insert
              $position --;
              break;
            case AD_BELOW: // Try below
              $ai_last_check = AI_CHECK_AD_BELOW;
              if ($position >= count ($paragraph_positions) - 1) return $content; // Already at the bottom - do not insert
              $position ++;
              break;
            case AD_ABOVE_AND_THEN_BELOW: // Try first above and then below
              if ($position == 0 || $checks == 0) {
                // Try below
                $direction = AD_BELOW;
                $checks = $max_checks;
                $position = $saved_position;
                $ai_last_check = AI_CHECK_AD_BELOW;
                if ($position >= count ($paragraph_positions) - 1) return $content; // Already at the bottom - do not insert
                $position ++;
              } else $position --;
              break;
            case AD_BELOW_AND_THEN_ABOVE: // Try first below and then above
              if ($position >= count ($paragraph_positions) - 1 || $checks == 0) {
                // Try above
                $direction = AD_ABOVE;
                $checks = $max_checks;
                $position = $saved_position;
                $ai_last_check = AI_CHECK_AD_ABOVE;
                if ($position == 0) return $content; // Already at the top - do not insert
                $position --;
              } else $position ++;
              break;
          }
        } else break; // Text not found - insert

        // Try next position
        if ($checks <= 0) return $content; // Suitable position not found - do not insert
        $checks --;
      } while (true);
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_CLEARANCE;
    if (count ($paragraph_positions) == 0) return $content;

    if ($position_preview) {
      $offset = 0;
      foreach ($paragraph_positions as $counter => $paragraph_position) {
        $inserted_code = "[[AI_BP".($counter + 1)."]]";
        if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
          $content = substr_replace ($content, $inserted_code, $paragraph_position, 0);
        } else {
            $content = substr_replace ($content, $inserted_code, $paragraph_position + $offset, 0);
            $offset += strlen ($inserted_code);
          }
      }
      return $content;
    }

    $ai_last_check = AI_CHECK_PARAGRAPHS_MIN_NUMBER;
    if (count ($paragraph_positions) > $position && count ($paragraph_positions) >= intval ($this->get_paragraph_number_minimum())) {
      $this->increment_block_counter ();
      $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
      if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
        $content_position = $paragraph_positions [$position];
        $content = substr_replace ($content, $this->get_code_for_insertion (), $content_position, 0);
        $ai_last_check = AI_CHECK_INSERTED;
      }
    }

    return $content;
  }

  public function after_paragraph ($content, $position_preview = false) {
    global $ai_wp_data, $ai_last_check;

    $paragraph_positions = array ();
    $last_content_position = strlen ($content) - 1;

    $paragraph_tags = trim ($this->get_paragraph_tags());
    if ($paragraph_tags == '') return $content;

    $paragraph_end_strings = explode (",", $paragraph_tags);

    $ai_last_check = AI_CHECK_PARAGRAPH_TAGS;
    if (count ($paragraph_end_strings) == 0) return $content;

    foreach ($paragraph_end_strings as $paragraph_end_string) {
      if (trim ($paragraph_end_string) == '') continue;

      $last_position = - 1;

      $paragraph_end_string = trim ($paragraph_end_string);
      if ($paragraph_end_string == "#") {
        $paragraph_end = "\r\n\r\n";
        if (!in_array ($last_content_position, $paragraph_positions)) $paragraph_positions [] = $last_content_position;
      } else $paragraph_end = '</' . $paragraph_end_string . '>';

      while (stripos ($content, $paragraph_end, $last_position + 1) !== false) {
        $last_position = stripos ($content, $paragraph_end, $last_position + 1) + strlen ($paragraph_end) - 1;
        if ($paragraph_end_string == "#") $paragraph_positions [] = $last_position - 4; else
          $paragraph_positions [] = $last_position;
      }
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_WITH_TAGS;
    if (count ($paragraph_positions) == 0) return $content;

    sort ($paragraph_positions);

    if (!$this->get_count_inside_blockquote ()) {
      preg_match_all ('/<\/?blockquote/i', $content, $blockquotes, PREG_OFFSET_CAPTURE);

      $blockquote_offsets = array ();
      $blockquotes = $blockquotes [0];
      foreach ($blockquotes as $index => $blockquote) {
        if (strtolower ($blockquote [0]) == '<blockquote' && isset ($blockquotes [$index + 1][0]) && strtolower ($blockquotes [$index + 1][0]) == '</blockquote') {
          $blockquote_offsets []= array ($blockquote [1] + 11, $blockquotes [$index + 1][1]);
        }
      }

      if (count ($blockquote_offsets) != 0) {
        $filtered_paragraph_positions = array ();
        foreach ($blockquote_offsets as $blockquote_offset) {
          foreach ($paragraph_positions as $paragraph_position) {
            if ($paragraph_position >= $blockquote_offset [0] && $paragraph_position <= $blockquote_offset [1]) continue;
            $filtered_paragraph_positions []= $paragraph_position;
          }
        }
        $paragraph_positions = $filtered_paragraph_positions;
      }
    }

    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_BLOCKQUOTE;
    if (count ($paragraph_positions) == 0) return $content;

    $paragraph_min_words = intval ($this->get_minimum_paragraph_words());
    $paragraph_max_words = intval ($this->get_maximum_paragraph_words());

    if ($paragraph_min_words != 0 || $paragraph_max_words != 0) {
      $filtered_paragraph_positions = array ();
      foreach ($paragraph_positions as $index => $paragraph_position) {
        $paragraph_code = $index == 0 ? substr ($content, 0, $paragraph_position + 1) : substr ($content, $paragraph_positions [$index - 1] + 1, $paragraph_position - $paragraph_positions [$index - 1]);
        if ($this->check_number_of_words_in_paragraph ($paragraph_code, $paragraph_min_words, $paragraph_max_words)) $filtered_paragraph_positions [] = $paragraph_position;
      }
      $paragraph_positions = $filtered_paragraph_positions;
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_MIN_MAX_WORDS;
    if (count ($paragraph_positions) == 0) return $content;


    $paragraph_texts = explode (",", html_entity_decode ($this->get_paragraph_text()));
    if ($this->get_paragraph_text() != "" && count ($paragraph_texts) != 0) {

      $filtered_paragraph_positions = array ();
      $paragraph_text_type = $this->get_paragraph_text_type ();

      foreach ($paragraph_positions as $index => $paragraph_position) {
        $paragraph_code = $index == 0 ? substr ($content, 0, $paragraph_position + 1) : substr ($content, $paragraph_positions [$index - 1] + 1, $paragraph_position - $paragraph_positions [$index - 1]);

        if ($paragraph_text_type == AD_CONTAIN) {
          $found = true;
          foreach ($paragraph_texts as $paragraph_text) {
            if (stripos ($paragraph_code, trim ($paragraph_text)) === false) {
              $found = false;
              break;
            }
          }
          if ($found) $filtered_paragraph_positions [] = $paragraph_position;
        } elseif ($paragraph_text_type == AD_DO_NOT_CONTAIN) {
            $found = false;
            foreach ($paragraph_texts as $paragraph_text) {
              if (stripos ($paragraph_code, trim ($paragraph_text)) !== false) {
                $found = true;
                break;
              }
            }
            if (!$found) $filtered_paragraph_positions [] = $paragraph_position;
          }
      }

      $paragraph_positions = $filtered_paragraph_positions;
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_TEXT;
    if (count ($paragraph_positions) == 0) return $content;


    $position = $this->get_paragraph_number();

    if ($position > 0 && $position < 1) {
      $position = intval ($position * (count ($paragraph_positions) - 1) + 0.5);
    }
    elseif ($position <= 0) {
      $position = rand (0, count ($paragraph_positions) - 1);
    } else $position --;

    if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
      $paragraph_positions = array_reverse ($paragraph_positions);
    }


    $avoid_paragraphs_above = intval ($this->get_avoid_paragraphs_above());
    $avoid_paragraphs_below = intval ($this->get_avoid_paragraphs_below());

    if (($avoid_paragraphs_above != 0 || $avoid_paragraphs_below != 0) && count ($paragraph_positions) > $position) {
      $avoid_text_above = $this->get_avoid_text_above();
      $avoid_text_below = $this->get_avoid_text_below();
      $avoid_paragraph_texts_above = explode (",", html_entity_decode (trim ($avoid_text_above)));
      $avoid_paragraph_texts_below = explode (",", html_entity_decode (trim ($avoid_text_below)));

      $direction = $this->get_avoid_direction();
      $max_checks = $this->get_avoid_try_limit();

      $checks = $max_checks;
      $saved_position = $position;
      do {
        $found_above = false;
        if ($avoid_paragraphs_above != 0 && $avoid_text_above != "" && is_array ($avoid_paragraph_texts_above) && count ($avoid_paragraph_texts_above) != 0) {
          $paragraph_position_above = $position - $avoid_paragraphs_above;
          if ($paragraph_position_above <= 0)
            $content_position_above = 0; else
              $content_position_above = $paragraph_positions [$paragraph_position_above] + 1;

          $paragraph_code = substr ($content, $content_position_above, $paragraph_positions [$position] - $content_position_above);

          foreach ($avoid_paragraph_texts_above as $paragraph_text_above) {
            if (stripos ($paragraph_code, trim ($paragraph_text_above)) !== false) {
              $found_above = true;
              break;
            }
          }
        }

        $found_below = false;
        if ($avoid_paragraphs_below != 0 && $position != count ($paragraph_positions) - 1 && $avoid_text_below != "" && is_array ($avoid_paragraph_texts_below) && count ($avoid_paragraph_texts_below) != 0) {
          $paragraph_position_below = $position + $avoid_paragraphs_below;
          if ($paragraph_position_below > count ($paragraph_positions) - 1) $paragraph_position_below = count ($paragraph_positions) - 1;
          $paragraph_code = substr ($content, $paragraph_positions [$position] + 1, $paragraph_positions [$paragraph_position_below] - $paragraph_positions [$position]);
          foreach ($avoid_paragraph_texts_below as $paragraph_text_below) {
            if (stripos ($paragraph_code, trim ($paragraph_text_below)) !== false) {
              $found_below = true;
              break;
            }
          }
        }


//        echo "position: $position = after #", $position + 1, "<br />\n";
//        echo "checks: $checks<br />\n";
//        echo "direction: $direction<br />\n";
//        if ($found_above)
//        echo "found_above<br />\n";
//        if ($found_below)
//        echo "found_below<br />\n";
//        echo "=================<br />\n";


        if ($found_above || $found_below) {
          $ai_last_check = AI_CHECK_DO_NOT_INSERT;
          if ($this->get_avoid_action() == AD_DO_NOT_INSERT) return $content;

          switch ($direction) {
            case AD_ABOVE: // Try above
              $ai_last_check = AI_CHECK_AD_ABOVE;
              if ($position == 0) return $content; // Already at the top - do not insert
              $position --;
              break;
            case AD_BELOW: // Try below
              $ai_last_check = AI_CHECK_AD_BELOW;
              if ($position >= count ($paragraph_positions) - 1) return $content; // Already at the bottom - do not insert
              $position ++;
              break;
            case AD_ABOVE_AND_THEN_BELOW: // Try first above and then below
              if ($position == 0 || $checks == 0) {
                // Try below
                $direction = AD_BELOW;
                $checks = $max_checks;
                $position = $saved_position;
                $ai_last_check = AI_CHECK_AD_BELOW;
                if ($position >= count ($paragraph_positions) - 1) return $content; // Already at the bottom - do not insert
                $position ++;
              } else $position --;
              break;
            case AD_BELOW_AND_THEN_ABOVE: // Try first below and then above
              if ($position >= count ($paragraph_positions) - 1 || $checks == 0) {
                // Try above
                $direction = AD_ABOVE;
                $checks = $max_checks;
                $position = $saved_position;
                $ai_last_check = AI_CHECK_AD_ABOVE;
                if ($position == 0) return $content; // Already at the top - do not insert
                $position --;
              } else $position ++;
              break;
          }
        } else break; // Text not found - insert

        // Try next position
        if ($checks <= 0) return $content; // Suitable position not found - do not insert
        $checks --;
      } while (true);
    }

    // Nothing to do
    $ai_last_check = AI_CHECK_PARAGRAPHS_AFTER_CLEARANCE;
    if (count ($paragraph_positions) == 0) return $content;


    if ($position_preview) {
      $offset = 0;
      foreach ($paragraph_positions as $counter => $paragraph_position) {
        $inserted_code = "[[AI_AP".($counter + 1)."]]";
        if ($this->get_direction_type() == AD_DIRECTION_FROM_BOTTOM) {
          $content = substr_replace ($content, $inserted_code, $paragraph_position + 1, 0);
        } else {
            $content = substr_replace ($content, $inserted_code, $paragraph_position + $offset + 1, 0);
            $offset += strlen ($inserted_code);
          }
      }
      return $content;
    }

    $ai_last_check = AI_CHECK_PARAGRAPHS_MIN_NUMBER;
    if (count ($paragraph_positions) > $position && count ($paragraph_positions) >= intval ($this->get_paragraph_number_minimum())) {
      $this->increment_block_counter ();
      $ai_last_check = AI_CHECK_DEBUG_NO_INSERTION;
      if (($ai_wp_data [AI_WP_DEBUGGING] & AI_DEBUG_NO_INSERTION) == 0) {
        $content_position = $paragraph_positions [$position];
        if ($content_position >= strlen ($content) - 1)
          $content = $content . $this->get_code_for_insertion (); else
            $content = substr_replace ($content, $this->get_code_for_insertion (), $content_position + 1, 0);
        $ai_last_check = AI_CHECK_INSERTED;
      }
    }

    return $content;
  }

//  Deprecated
  function manual ($content){

    if (preg_match_all("/{adinserter (.+?)}/", $content, $tags)){

      $block_class_name = get_block_class_name ();

      $display_for_devices = $this->get_display_for_devices ();

      foreach ($tags [1] as $tag) {
         $ad_tag = strtolower (trim ($tag));
         $ad_name = strtolower (trim ($this->get_ad_name()));
         if ($ad_tag == $ad_name || $ad_tag == $this->number) {
          if ($this->get_alignment_type() == AD_ALIGNMENT_NO_WRAPPING) $ad_code = $this->ai_getProcessedCode (); else
            $ad_code = "<div class='" . $block_class_name . " " . $block_class_name . "-" . $this->number . $this->get_viewport_classes () . "' style='" . $this->get_alignmet_style() . "'>" . $this->ai_getProcessedCode () . "</div>";
          $content = preg_replace ("/{adinserter " . $tag . "}/", $ad_code, $content);
         }
      }
    }

    return $content;
  }

//  Deprecated
  function display_disabled ($content){

    $ad_name = $this->get_ad_name();

    if (preg_match ("/<!-- +Ad +Inserter +Ad +".($this->number)." +Disabled +-->/i", $content)) return true;

    if (preg_match ("/<!-- +disable +adinserter +\* +-->/i", $content)) return true;

    if (preg_match ("/<!-- +disable +adinserter +".($this->number)." +-->/i", $content)) return true;

    if (strpos ($content, "<!-- disable adinserter " . $ad_name . " -->") != false) return true;

    return false;
  }

  function check_category () {

    $categories = trim (strtolower ($this->get_ad_block_cat()));
    $cat_type = $this->get_ad_block_cat_type();

    if ($cat_type == AD_BLACK_LIST) {

      if($categories == AD_EMPTY_DATA) return true;

      $cats_listed = explode (",", $categories);

      foreach (get_the_category() as $post_category) {

        foreach ($cats_listed as $cat_disabled){

          $cat_disabled = trim ($cat_disabled);

          $post_category_name = strtolower ($post_category->cat_name);
          $post_category_slug = strtolower ($post_category->slug);

          if ($post_category_name == $cat_disabled || $post_category_slug == $cat_disabled) {
            return false;
          } else {
            }
        }
      }
      return true;

    } else {

        if ($categories == AD_EMPTY_DATA) return false;

        $cats_listed = explode (",", $categories);

        foreach (get_the_category() as $post_category) {

          foreach ($cats_listed as $cat_enabled) {

            $cat_enabled = trim ($cat_enabled);

            $post_category_name = strtolower ($post_category->cat_name);
            $post_category_slug = strtolower ($post_category->slug);

            if ($post_category_name == $cat_enabled || $post_category_slug == $cat_enabled) {
              return true;
            } else {
              }
          }
        }
        return false;
      }
  }

  function check_tag () {

    $tags = $this->get_ad_block_tag();
    $tag_type = $this->get_ad_block_tag_type();

    $tags = trim (strtolower ($tags));
    $tags_listed = explode (",", $tags);
    foreach ($tags_listed as $index => $tag_listed) {
      $tags_listed [$index] = trim ($tag_listed);
    }
    $has_any_of_the_given_tags = has_tag ($tags_listed);

    if ($tag_type == AD_BLACK_LIST) {

      if ($tags == AD_EMPTY_DATA) return true;

      if (is_tag()) {
        foreach ($tags_listed as $tag_listed) {
          if (is_tag ($tag_listed)) return false;
        }
        return true;
      }

      return !$has_any_of_the_given_tags;

    } else {

        if ($tags == AD_EMPTY_DATA) return false;

        if (is_tag()) {
          foreach ($tags_listed as $tag_listed) {
            if (is_tag ($tag_listed)) return true;
          }
          return false;
        }

        return $has_any_of_the_given_tags;
      }
  }

  function check_id () {
    global $ai_wp_data;

    $page_id = get_the_ID();

    $ids = trim ($this->get_id_list());
    $id_type = $this->get_id_list_type();

    if ($id_type == AD_BLACK_LIST) $return = false; else $return = true;

    if ($ids == AD_EMPTY_DATA || $page_id === false) {
      return !$return;
    }

    $ids_listed = explode (",", $ids);
    foreach ($ids_listed as $index => $id_listed) {
      if (trim ($id_listed) == "") unset ($ids_listed [$index]); else
        $ids_listed [$index] = trim ($id_listed);
    }

//    print_r ($ids_listed);
//    echo "<br />\n";
//    echo ' page id: ' . $page_id, "<br />\n";
//    echo ' listed ids: ' . $ids, "\n";
//    echo "<br />\n";

    if (in_array ($page_id, $ids_listed)) return $return;

    return !$return;
  }

  function check_url () {
    global $ai_wp_data;

    $page_url = $ai_wp_data [AI_WP_URL];

    $urls = trim ($this->get_ad_url_list());
    $url_type = $this->get_ad_url_list_type();

    if ($url_type == AD_BLACK_LIST) $return = false; else $return = true;

    if ($urls == AD_EMPTY_DATA) return !$return;

    $urls_listed = explode (" ", $urls);
    foreach ($urls_listed as $index => $url_listed) {
      if (trim ($url_listed) == "") unset ($urls_listed [$index]); else
        $urls_listed [$index] = trim ($url_listed);
    }

  //  print_r ($urls_listed);
  //  echo "<br />\n";
  //  echo ' page url: ' . $page_url, "<br />\n";
  //  echo ' listed urls: ' . $urls, "\n";
  //  echo "<br />\n";

    foreach ($urls_listed as $url_listed) {
      if ($url_listed == '*') return $return;

      if ($url_listed [0] == '*') {
        if ($url_listed [strlen ($url_listed) - 1] == '*') {
          $url_listed = substr ($url_listed, 1, strlen ($url_listed) - 2);
          if (strpos ($page_url, $url_listed) !== false) return $return;
        } else {
            $url_listed = substr ($url_listed, 1);
            if (substr ($page_url, - strlen ($url_listed)) == $url_listed) return $return;
          }
      }
      elseif ($url_listed [strlen ($url_listed) - 1] == '*') {
        $url_listed = substr ($url_listed, 0, strlen ($url_listed) - 1);
        if (strpos ($page_url, $url_listed) === 0) return $return;
      }
      elseif ($url_listed == $page_url) return $return;
    }
    return !$return;
  }

  function check_url_parameters () {
    global $ai_wp_data;

    $parameter_list = trim ($this->get_url_parameter_list());
    $parameter_list_type = $this->get_url_parameter_list_type();

    if ($parameter_list_type == AD_BLACK_LIST) $return = false; else $return = true;

    if ($parameter_list == AD_EMPTY_DATA || count ($_GET) == 0) {
      return !$return;
    }

    $parameters_listed = explode (",", $parameter_list);
    foreach ($parameters_listed as $index => $parameter_listed) {
      if (trim ($parameter_listed) == "") unset ($parameters_listed [$index]); else
        $parameters_listed [$index] = trim ($parameter_listed);
    }

//    print_r ($parameter_listed);
//    echo "<br />\n";
//    echo " parameters: <br />\n";
//    print_r ($_GET);
//    echo ' listed parameters: ' . $parameter_list, "\n";
//    echo "<br />\n";

    foreach ($parameters_listed as $parameter) {
      if (strpos ($parameter, "=") !== false) {
        $parameter_value = explode ("=", $parameter);
        if (array_key_exists ($parameter_value [0], $_GET) && $_GET [$parameter_value [0]] == $parameter_value [1]) return $return;
      } else if (array_key_exists ($parameter, $_GET)) return $return;
    }

    return !$return;
  }

  function check_scheduling () {

    switch ($this->get_scheduling()) {
      case AI_SCHEDULING_OFF:
        return true;
        break;

      case AI_SCHEDULING_DELAY:
        $after_days = trim ($this->get_ad_after_day());
        if ($after_days == '') return true;
        if (intval ($after_days) == AD_ZERO) return true;

        $post_date = get_the_date ('U');
        if ($post_date === false) return true;

        return (date ('U', current_time ('timestamp')) >= $post_date + $after_days * 86400);
        break;

      case AI_SCHEDULING_BETWEEN_DATES:
        if (!function_exists ('ai_scheduling_options')) return true;

        $current_time = current_time ('timestamp');
        $start_date   = strtotime ($this->get_schedule_start_date(), $current_time);
        $end_date     = strtotime ($this->get_schedule_end_date(), $current_time);

        $insertion_enabled = $current_time >= $start_date && $current_time < $end_date;

        if (!$insertion_enabled) {
          $fallback = intval ($this->get_fallback());
          if ($fallback != 0 && $fallback <= AD_INSERTER_BLOCKS) {
            $this->fallback = $fallback;
            return true;
          }
        }

        return ($insertion_enabled);
        break;

      default:
        return true;
        break;
    }
  }

  function check_referer () {

    $domain_list_type = $this->get_ad_domain_list_type ();

    if (isset ($_SERVER['HTTP_REFERER'])) {
        $referer_host = strtolower (parse_url ($_SERVER['HTTP_REFERER'], PHP_URL_HOST));
    } else $referer_host = '';

    if ($domain_list_type == AD_BLACK_LIST) $return = false; else $return = true;

    $domains = strtolower (trim ($this->get_ad_domain_list ()));
    if ($domains == AD_EMPTY_DATA) return !$return;
    $domains = explode (",", $domains);

    foreach ($domains as $domain) {
      $domain = trim ($domain);
      if ($domain == "") continue;

      if ($domain == "#") {
        if ($referer_host == "") return $return;
      } elseif ($domain == $referer_host) return $return;
    }
    return !$return;
  }

  function check_number_of_words (&$content) {
    global $ai_last_check;

    $number_of_words = number_of_words ($content);

    $maximum_words = intval ($this->get_maximum_words());
    if ($maximum_words <= 0) $maximum_words = 1000000;

    $ai_last_check = AI_CHECK_NUMBER_OF_WORDS;
    if ($number_of_words < intval ($this->get_minimum_words()) || $number_of_words > $maximum_words) return false;
    return true;
  }

  function check_number_of_words_in_paragraph ($content, $min, $max) {

    $number_of_words = number_of_words ($content);

    if ($max <= 0) $max = 1000000;

    if ($number_of_words < $min || $number_of_words > $max) return false;

    return true;
  }

  function check_page_types_lists_users ($ignore_page_types = false) {
    global $ai_last_check, $ai_wp_data;

    if (!$ignore_page_types) {
      if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_HOMEPAGE){
         $ai_last_check = AI_CHECK_PAGE_TYPE_FRONT_PAGE;
         if (!$this->get_display_settings_home()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC){
         $ai_last_check = AI_CHECK_PAGE_TYPE_STATIC_PAGE;
         if (!$this->get_display_settings_page()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST){
         $ai_last_check = AI_CHECK_PAGE_TYPE_POST;
         if (!$this->get_display_settings_post()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_CATEGORY){
         $ai_last_check = AI_CHECK_PAGE_TYPE_CATEGORY;
         if (!$this->get_display_settings_category()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_SEARCH){
         $ai_last_check = AI_CHECK_PAGE_TYPE_SEARCH;
         if (!$this->get_display_settings_search()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_ARCHIVE){
         $ai_last_check = AI_CHECK_PAGE_TYPE_ARCHIVE;
         if (!$this->get_display_settings_archive()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_FEED){
         $ai_last_check = AI_CHECK_PAGE_TYPE_FEED;
        if (!$this->get_enable_feed()) return false;
      }
      elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_404){
         $ai_last_check = AI_CHECK_PAGE_TYPE_404;
        if (!$this->get_enable_404()) return false;
      }
    }

    $ai_last_check = AI_CHECK_CATEGORY;
    if (!$this->check_category ()) return false;

    $ai_last_check = AI_CHECK_TAG;
    if (!$this->check_tag ()) return false;

    $ai_last_check = AI_CHECK_ID;
    if (!$this->check_id ()) return false;

    $ai_last_check = AI_CHECK_URL;
    if (!$this->check_url ()) return false;

    $ai_last_check = AI_CHECK_URL_PARAMETER;
    if (!$this->check_url_parameters ()) return false;

    $ai_last_check = AI_CHECK_REFERER;
    if (!$this->check_referer ()) return false;

    if (function_exists ('ai_check_lists')) {
      if (!ai_check_lists ($this)) return false;
    }

    $ai_last_check = AI_CHECK_SCHEDULING;
    if (!$this->check_scheduling ()) return false;

    $ai_last_check = AI_CHECK_CODE;
    if ($this->ai_getCode () == '') return false;

    $display_for_users = $this->get_display_for_users ();

    $ai_last_check = AI_CHECK_LOGGED_IN_USER;
    if ($display_for_users == AD_DISPLAY_LOGGED_IN_USERS && ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) != AI_USER_LOGGED_IN) return "";
    $ai_last_check = AI_CHECK_NOT_LOGGED_IN_USER;
    if ($display_for_users == AD_DISPLAY_NOT_LOGGED_IN_USERS && ($ai_wp_data [AI_WP_USER] & AI_USER_LOGGED_IN) == AI_USER_LOGGED_IN) return "";
    $ai_last_check = AI_CHECK_ADMINISTRATOR;
    if ($display_for_users == AD_DISPLAY_ADMINISTRATORS && ($ai_wp_data [AI_WP_USER] & AI_USER_ADMINISTRATOR) != AI_USER_ADMINISTRATOR) return "";

    return true;
  }

  function check_post_page_exceptions ($selected_blocks) {
    global $ai_last_check, $ai_wp_data;

    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST) {
      $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
      $selected_blocks = explode (",", $meta_value);

      $enabled_on_text = $this->get_ad_enabled_on_which_posts ();
      if ($enabled_on_text == AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED) {
        $ai_last_check = AI_CHECK_ENABLED_ON_ALL_EXCEPT_ON_SELECTED;
        if (in_array ($this->number, $selected_blocks)) return false;
      }
      elseif ($enabled_on_text == AD_ENABLED_ONLY_ON_SELECTED) {
        $ai_last_check = AI_CHECK_ENABLED_ONLY_ON_SELECTED;
        if (!in_array ($this->number, $selected_blocks)) return false;
      }
    } elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC) {
      $meta_value = get_post_meta (get_the_ID (), '_adinserter_block_exceptions', true);
      $selected_blocks = explode (",", $meta_value);

      $enabled_on_text = $this->get_ad_enabled_on_which_pages ();
      if ($enabled_on_text == AD_ENABLED_ON_ALL_EXCEPT_ON_SELECTED) {
        $ai_last_check = AI_CHECK_ENABLED_ON_ALL_EXCEPT_ON_SELECTED;
        if (in_array ($this->number, $selected_blocks)) return false;
      }
      elseif ($enabled_on_text == AD_ENABLED_ONLY_ON_SELECTED) {
        $ai_last_check = AI_CHECK_ENABLED_ONLY_ON_SELECTED;
        if (!in_array ($this->number, $selected_blocks)) return false;
      }
    }
    return true;
  }

  function check_filter ($counter_for_filter) {
    global $ai_last_check, $ad_interter_globals, $page;

    $ai_last_check = AI_CHECK_FILTER;
    $filter_settings = trim ($this->get_call_filter());
    if ($filter_settings == 0 || $filter_settings == '') return true;

    switch ($this->get_filter_type ()) {
      case AI_OPTION_FILTER_PHP_FUNCTION_CALLS:
        if (isset ($ad_interter_globals [AI_PHP_FUNCTION_CALL_COUNTER_NAME . $this->number]))
          $counter_for_filter = $ad_interter_globals [AI_PHP_FUNCTION_CALL_COUNTER_NAME . $this->number]; else return false;
        break;
      case AI_OPTION_FILTER_CONTENT_PROCESSING:
        if (isset ($ad_interter_globals [AI_CONTENT_COUNTER_NAME]))
          $counter_for_filter = $ad_interter_globals [AI_CONTENT_COUNTER_NAME]; else return false;
        break;
      case AI_OPTION_FILTER_EXCERPT_PROCESSING:
        if (isset ($ad_interter_globals [AI_EXCERPT_COUNTER_NAME]))
          $counter_for_filter = $ad_interter_globals [AI_EXCERPT_COUNTER_NAME]; else return false;
        break;
      case AI_OPTION_FILTER_BEFORE_POST_PROCESSING:
        if (isset ($ad_interter_globals [AI_LOOP_BEFORE_COUNTER_NAME]))
          $counter_for_filter = $ad_interter_globals [AI_LOOP_BEFORE_COUNTER_NAME]; else return false;
        break;
      case AI_OPTION_FILTER_AFTER_POST_PROCESSING:
        if (isset ($ad_interter_globals [AI_LOOP_AFTER_COUNTER_NAME]))
          $counter_for_filter = $ad_interter_globals [AI_LOOP_AFTER_COUNTER_NAME]; else return false;
        break;
      case AI_OPTION_FILTER_WIDGET_DRAWING:
        if (isset ($ad_interter_globals [AI_WIDGET_COUNTER_NAME . $this->number]))
          $counter_for_filter = $ad_interter_globals [AI_WIDGET_COUNTER_NAME . $this->number]; else return false;
        break;
      case AI_OPTION_FILTER_SUBPAGES:
        if (isset ($page))
          $counter_for_filter = $page; else return false;
        break;
    }

    $filter_values = array ();
    if (strpos ($filter_settings, ",") !== false) {
      $filter_values = explode (",", $filter_settings);
    } else $filter_values []= $filter_settings;

    return in_array ($counter_for_filter, $filter_values);
  }

  function check_and_increment_block_counter () {
    global $ad_interter_globals, $ai_last_check;

    $global_name = AI_BLOCK_COUNTER_NAME . $this->number;
    $max_insertions = intval ($this->get_maximum_insertions ());
    if (!isset ($ad_interter_globals [$global_name])) {
      $ad_interter_globals [$global_name] = 0;
    }
    $ai_last_check = AI_CHECK_MAX_INSERTIONS;
    if ($max_insertions != 0 && $ad_interter_globals [$global_name] >= $max_insertions) return false;
    $ad_interter_globals [$global_name] ++;

    return true;
  }

  function check_block_counter () {
    global $ad_interter_globals;

    $global_name = AI_BLOCK_COUNTER_NAME . $this->number;
    $max_insertions = intval ($this->get_maximum_insertions ());
    if (!isset ($ad_interter_globals [$global_name])) {
      $ad_interter_globals [$global_name] = 0;
    }
    $ai_last_check = AI_CHECK_MAX_INSERTIONS;
    if ($max_insertions != 0 && $ad_interter_globals [$global_name] >= $max_insertions) return false;
    return true;
  }

  function increment_block_counter () {
    global $ad_interter_globals;

    if ($this->number == 0) return;

    $global_name = AI_BLOCK_COUNTER_NAME . $this->number;
    if (!isset ($ad_interter_globals [$global_name])) {
      $ad_interter_globals [$global_name] = 0;
    }
    $ad_interter_globals [$global_name] ++;
    return;
  }


  function replace_ai_tags ($content){
    global $ai_wp_data;

    $general_tag = str_replace ("&amp;", " and ", $this->get_ad_general_tag());
    $title = $general_tag;
    $short_title = $general_tag;
    $category = $general_tag;
    $short_category = $general_tag;
    $tag = $general_tag;
    $smart_tag = $general_tag;
    if ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_CATEGORY) {
        $categories = get_the_category();
        if (!empty ($categories)) {
          $first_category = reset ($categories);
          $category = str_replace ("&amp;", "and", $first_category->name);
          if ($category == "Uncategorized") $category = $general_tag;
        } else {
            $category = $general_tag;
        }
        if (strpos ($category, ",") !== false) {
          $short_category = trim (substr ($category, 0, strpos ($category, ",")));
        } else $short_category = $category;
        if (strpos ($short_category, "and") !== false) {
          $short_category = trim (substr ($short_category, 0, strpos ($short_category, "and")));
        }

        $title = $category;
        $title = str_replace ("&amp;", "and", $title);
        $short_title = implode (" ", array_slice (explode (" ", $title), 0, 3));
        $tag = $short_title;
        $smart_tag = $short_title;
    } elseif (is_tag ()) {
        $title = single_tag_title('', false);
        $title = str_replace (array ("&amp;", "#"), array ("and", ""), $title);
        $short_title = implode (" ", array_slice (explode (" ", $title), 0, 3));
        $category = $short_title;
        if (strpos ($category, ",") !== false) {
          $short_category = trim (substr ($category, 0, strpos ($category, ",")));
        } else $short_category = $category;
        if (strpos ($short_category, "and") !== false) {
          $short_category = trim (substr ($short_category, 0, strpos ($short_category, "and")));
        }
        $tag = $short_title;
        $smart_tag = $short_title;
    } elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_SEARCH) {
        $title = get_search_query();
        $title = str_replace ("&amp;", "and", $title);
        $short_title = implode (" ", array_slice (explode (" ", $title), 0, 3));
        $category = $short_title;
        if (strpos ($category, ",") !== false) {
          $short_category = trim (substr ($category, 0, strpos ($category, ",")));
        } else $short_category = $category;
        if (strpos ($short_category, "and") !== false) {
          $short_category = trim (substr ($short_category, 0, strpos ($short_category, "and")));
        }
        $tag = $short_title;
        $smart_tag = $short_title;
    } elseif ($ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_STATIC || $ai_wp_data [AI_WP_PAGE_TYPE] == AI_PT_POST) {
        $title = get_the_title();
        $title = str_replace ("&amp;", "and", $title);

        $short_title = implode (" ", array_slice (explode (" ", $title), 0, 3));

        $categories = get_the_category();
        if (!empty ($categories)) {
          $first_category = reset ($categories);
          $category = str_replace ("&amp;", "and", $first_category->name);
          if ($category == "Uncategorized") $category = $general_tag;
        } else {
            $category = $short_title;
        }
        if (strpos ($category, ",") !== false) {
          $short_category = trim (substr ($category, 0, strpos ($category, ",")));
        } else $short_category = $category;
        if (strpos ($short_category, "and") !== false) {
          $short_category = trim (substr ($short_category, 0, strpos ($short_category, "and")));
        }

        $tags = get_the_tags();
        if (!empty ($tags)) {

          $first_tag = reset ($tags);
          $tag = str_replace (array ("&amp;", "#"), array ("and", ""), isset ($first_tag->name) ? $first_tag->name : '');

          $tag_array = array ();
          foreach ($tags as $tag_data) {
            if (isset ($tag_data->name))
              $tag_array [] = explode (" ", $tag_data->name);
          }

          $selected_tag = '';

          if (count ($tag_array [0]) == 2) $selected_tag = $tag_array [0];
          elseif (count ($tag_array) > 1 && count ($tag_array [1]) == 2) $selected_tag = $tag_array [1];
          elseif (count ($tag_array) > 2 && count ($tag_array [2]) == 2) $selected_tag = $tag_array [2];
          elseif (count ($tag_array) > 3 && count ($tag_array [3]) == 2) $selected_tag = $tag_array [3];
          elseif (count ($tag_array) > 4 && count ($tag_array [4]) == 2) $selected_tag = $tag_array [4];


          if ($selected_tag == '' && count ($tag_array) >= 2 && count ($tag_array [0]) == 1 && count ($tag_array [1]) == 1) {

            if (isset ($tag_array [0][0]) && isset ($tag_array [1][0])) {
              if (strpos ($tag_array [0][0], $tag_array [1][0]) !== false) $tag_array = array_slice ($tag_array, 1, count ($tag_array) - 1);
            }

            if (isset ($tag_array [0][0]) && isset ($tag_array [1][0])) {
              if (strpos ($tag_array [1][0], $tag_array [0][0]) !== false) $tag_array = array_slice ($tag_array, 1, count ($tag_array) - 1);
            }

            if (isset ($tag_array [0][0]) && isset ($tag_array [1][0])) {
              if (count ($tag_array) >= 2 && count ($tag_array [0]) == 1 && count ($tag_array [1]) == 1) {
                $selected_tag = array ($tag_array [0][0], $tag_array [1][0]);
              }
            }
          }

          if ($selected_tag == '') {
            $first_tag = reset ($tags);
            $smart_tag = implode (" ", array_slice (explode (" ", isset ($first_tag->name) ? $first_tag->name : ''), 0, 3));
          } else $smart_tag = implode (" ", $selected_tag);

          $smart_tag = str_replace (array ("&amp;", "#"), array ("and", ""), $smart_tag);

        } else {
            $tag = $category;
            $smart_tag = $category;
        }
    }

    $title = str_replace (array ("'", '"'), array ("&#8217;", "&#8221;"), $title);
    $title = html_entity_decode ($title, ENT_QUOTES, "utf-8");

    $short_title = str_replace (array ("'", '"'), array ("&#8217;", "&#8221;"), $short_title);
    $short_title = html_entity_decode ($short_title, ENT_QUOTES, "utf-8");

    $search_query = "";
    if (isset ($_SERVER['HTTP_REFERER'])) {
      $referrer = $_SERVER['HTTP_REFERER'];
    } else $referrer = '';
    if (preg_match ("/[\.\/](google|yahoo|bing|ask)\.[a-z\.]{2,5}[\/]/i", $referrer, $search_engine)){
       $referrer_query = parse_url ($referrer);
       $referrer_query = isset ($referrer_query ["query"]) ? $referrer_query ["query"] : "";
       parse_str ($referrer_query, $value);
       $search_query = isset ($value ["q"]) ? $value ["q"] : "";
       if ($search_query == "") {
         $search_query = isset ($value ["p"]) ? $value ["p"] : "";
       }
    }
    if ($search_query == "") $search_query = $smart_tag;

    $author = get_the_author_meta ('display_name');
    $author_name = get_the_author_meta ('first_name') . " " . get_the_author_meta ('last_name');
    if ($author_name == '') $author_name = $author;

    $ad_data = preg_replace ("/{title}/i",          $title,          $content);
    $ad_data = preg_replace ("/{short_title}/i",    $short_title,    $ad_data);
    $ad_data = preg_replace ("/{category}/i",       $category,       $ad_data);
    $ad_data = preg_replace ("/{short_category}/i", $short_category, $ad_data);
    $ad_data = preg_replace ("/{tag}/i",            $tag,            $ad_data);
    $ad_data = preg_replace ("/{smart_tag}/i",      $smart_tag,      $ad_data);
    $ad_data = preg_replace ("/{search_query}/i",   $search_query,   $ad_data);
    $ad_data = preg_replace ("/{author}/i",         $author,         $ad_data);
    $ad_data = preg_replace ("/{author_name}/i",    $author_name,    $ad_data);

    if (function_exists ('ai_tags')) ai_tags ($ad_data);

    return $ad_data;
  }
}


class ai_Block extends ai_CodeBlock {

    public function __construct ($number) {
      parent::__construct();

      $this->number = $number;
      $this->wp_options [AI_OPTION_NAME] = AD_NAME." ".$number;
    }
}

class ai_AdH extends ai_BaseCodeBlock {

  public function __construct () {
    parent::__construct();
  }
}

class ai_AdF extends ai_BaseCodeBlock {

  public function __construct () {
    parent::__construct();
  }
}
