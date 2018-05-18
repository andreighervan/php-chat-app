var javascript_version = "2.0.9";
var ignore_key = true;
var start = 1;
var end = 16;
var active_tab = 1;
var tabs_to_configure = new Array();

var current_tab = 0;
var next_tab = 0;

var syntax_highlighting = false;
var settings_page = "";

var dateFormat = "yy-mm-dd";

var shSettings = {
  "tab_size":"4",
  "use_soft_tabs":"1",
  "word_wrap":"1",
  "highlight_curr_line":"0",
  "key_bindings":"default",
  "full_line_selection":"1",
  "show_line_numbers":"0"};

function SyntaxHighlight (id, block, settings) {
  var textarea, editor, form, session, editDiv;

  this.textarea = textarea = jQuery(id);
  this.settings = settings || {};

  if (textarea.length === 0 ) { // Element does not exist
    this.valid = false;
    return;
  }

  this.valid = true;
  editDiv = jQuery('<div>', {
    position: 'absolute',
//    width: textarea.width() + 14,
//    width: 733,
//    height: textarea.height() + 4,
//    height: 384,
    'class': textarea.attr('class'),
    'id':  'editor-' + block
  }).insertBefore (textarea);

  textarea.css('display', 'none');
  this.editor = editor = ace.edit(editDiv[0]);
  this.form = form = textarea.closest('form');
  this.session = session = editor.getSession();
  session.setValue(textarea.val());

  // copy back to textarea on form submit...
  form.submit (function () {
    var block = textarea.attr ("id").replace ("block-","");
    var editor_disabled = jQuery("#simple-editor-" + block).is(":checked");
    if (!editor_disabled) {
      textarea.val (session.getValue());
    }
    if (textarea.val () == "") {
      textarea.removeAttr ("name");
    }

    jQuery("#ai-active-tab").attr ("value", active_tab);
  });

  session.setMode ("ace/mode/html");

  this.applySettings();
}

SyntaxHighlight.prototype.applySettings = function () {
  var editor = this.editor,
    session = this.session,
    settings = this.settings;

  editor.renderer.setShowGutter(settings['show_line_numbers'] == 1);
  editor.setHighlightActiveLine(settings['highlight_curr_line'] == 1);
  editor.setSelectionStyle(settings['full_line_selection'] == 1 ? "line" : "text");
  editor.setTheme("ace/theme/" + settings['theme']);
  session.setUseWrapMode(settings['word_wrap'] == 1);
  session.setTabSize(settings['tab_size']);
  session.setUseSoftTabs(settings['use_soft_tabs'] == 1);
};

function change_block_alignment (block) {
  jQuery("select#block-alignment-" + block).change ();
}

jQuery(document).ready(function($) {

  shSettings ['theme'] = $('#data').attr ('theme');

  var debug = parseInt ($('#data').attr ('javascript_debugging'));
  var debug_title = false;

  if (debug) {
    var start_time = new Date().getTime();
    var last_time = start_time;
    debug_title = true;
  }

  syntax_highlighting = typeof shSettings ['theme'] != 'undefined' && shSettings ['theme'] != 'disabled';

  var header = $('#ai-settings-' + 'header').length != 0;
  var header_id = 'name';
  var preview_top = (screen.height / 2) - (820 / 2);

  function remove_default_values (block) {
    $("#tab-" + block + " input:checkbox").each (function() {
      var default_value = $(this).attr ("default");
      var current_value = $(this).is (':checked');

      if (typeof default_value != 'undefined') {
        default_value = Boolean (parseInt (default_value));
//        console.log ($(this).attr ("name"), ": default_value: ", $(this).attr ("default"), " = ", default_value, ", current_value: ", current_value);

        if (current_value == default_value) {
          var name = $(this).attr ("name");
          $(this).removeAttr ("name");
          $("#tab-" + block + " [name='" + name + "']").removeAttr ("name");
//          console.log ("REMOVED: ", name);
        }
      }
//      else console.log ("NO DEFAULT VALUE:", $(this).attr ("name"));
    });

    $("#tab-" + block + " input:text").each (function() {
      var default_value = $(this).attr ("default");
      var current_value = $(this).val ();

      if (typeof default_value != 'undefined') {
//        console.log ($(this).attr ("name"), ": default_value: ", default_value, ", current_value: ", current_value);

        if (current_value == default_value) {
          var name = $(this).attr ("name");
          $(this).removeAttr ("name");
//          console.log ("REMOVED: ", name);
        }
      }
//      else console.log ("NO DEFAULT VALUE: ", $(this).attr ("name"));
    });

    $("#tab-" + block + " select").each (function() {
      var default_value = $(this).attr ("default");
      var current_value = $(this).children ("option:selected");

      var childern = $(this).children ();
      if (childern.prop ("tagName") == "OPTGROUP") {
        var current_value = "";
        childern.each (function() {
          var selected = $(this).children ("option:selected");
          if (selected.length != 0) {
            current_value = selected;
            return false;
          }
        });
      }

      if ($(this).attr ("selected-value") == 1) current_value = current_value.attr("value"); else current_value = current_value.text();

      if (typeof default_value != 'undefined') {
//        console.log ($(this).attr ("name"), ": default_value: ", default_value, ", current_value: ", current_value);

        if (current_value == default_value) {
          var name = $(this).attr ("name");
          $(this).removeAttr ("name");
//          console.log ("REMOVED: ", name);
        }
      }
//      else console.log ("NO DEFAULT VALUE: ", $(this).attr ("name"));
    });

    $("#tab-" + block + " input:radio:checked").each (function() {
      var default_value = $(this).attr ("default");
      var current_value = $(this).is (':checked');

      if (typeof default_value != 'undefined') {
        default_value = Boolean (parseInt (default_value));
//        console.log ($(this).attr ("name"), ": default_value: ", $(this).attr ("default"), " = ", default_value, ", current_value: ", current_value);

        if (current_value == default_value) {
          var name = $(this).attr ("name");
          $("#tab-" + block + " [name='" + name + "']").removeAttr ("name");
//          console.log ("REMOVED: ", name);
        }
      }
//      else console.log ("NO DEFAULT VALUE: ", $(this).attr ("name"));
    });
  }

  function configure_editor_language (block) {

    var editor = ace.edit ("editor-" + block);

    if ($("input#process-php-"+block).is(":checked")) {
      editor.getSession ().setMode ("ace/mode/php");
    } else editor.getSession ().setMode ("ace/mode/html");
  }

  function getDate (element) {
    var date;
    try {
      date = $.datepicker.parseDate (dateFormat, element.val ());
    } catch (error) {
      date = null;
    }

    return date;
  }

  function process_scheduling_dates (block) {
    var start_date_picker = $("#scheduling-on-"+block);
    var end_date_picker   = $("#scheduling-off-"+block);
    var start_date = getDate (start_date_picker);
    var end_date   = getDate (end_date_picker);

    end_date_picker.attr ('title', '');
    end_date_picker.css ("border-color", "#ddd");

    if (start_date == null) {
      end_date_picker.attr ('title', '');
    } else
    if (end_date == null) {
      end_date_picker.attr ('title', '');
    } else
    if (end_date > start_date) {
      var now = new Date();
      var today_date = new Date (now.getFullYear(), now.getMonth(), now.getDate(), 0, 0, 0, 0);
      if (end_date <= today_date) {
        var expiration = Math.round ((today_date - end_date) / 1000 / 3600 / 24);
//        end_date_picker.attr ('title', 'Invalid end date - insertion already expired ');
        end_date_picker.attr ('title', 'Insertion expired');
        end_date_picker.css ("border-color", "#d00");
      } else {
          var duration = Math.round ((end_date - start_date) / 1000 / 3600 / 24);
          end_date_picker.attr ('title', ' Duration: ' + duration + ' day' + (duration == 1 ? '' : 's'));
        }
    } else {
        end_date_picker.attr ('title', 'Invalid end date - must be after start date');
        end_date_picker.css ("border-color", "#d00");
      }
  }

  function process_display_elements (block) {

    $("#paragraph-settings-"+block).hide();
    $("#content-settings-"+block).hide();

//    var display_type = '';
//    $("select#display-type-"+block+" option:selected").each(function() {
//      display_type += $(this).text();
//    });
    var display_type = $("select#display-type-"+block+" option:selected").text();

    if (display_type == "Before Paragraph" || display_type == "After Paragraph") {
      $("#paragraph-settings-"+block).show();
    } else {
        $("#paragraph-counting-"+block).hide();
        $("#paragraph-clearance-"+block).hide();
      }

    var content_settings = display_type == "Before Paragraph" || display_type == "After Paragraph" || display_type == "Before Content" || display_type == "After Content";
    if (content_settings) {
      $("#content-settings-"+block).show();
    }

    $("#css-label-"+block).css('display', 'table-cell');
    $("#edit-css-button-"+block).css('display', 'table-cell');

    $("#css-none-"+block).hide();
    $("#custom-css-"+block).hide();
    $("#css-left-"+block).hide();
    $("#css-right-"+block).hide();
    $("#css-center-"+block).hide();
    $("#css-float-left-"+block).hide();
    $("#css-float-right-"+block).hide();
    $("#css-no-wrapping-"+block).hide();

    $("#no-wrapping-warning-"+block).hide();

    var alignment = $("select#block-alignment-"+block+" option:selected").text();

    if (alignment == "No Wrapping") {
      $("#css-no-wrapping-"+block).css('display', 'table-cell');
      $("#css-label-"+block).hide();
      $("#edit-css-button-"+block).hide();
      if ($("#client-side-detection-"+block).is(":checked")) {
        $("#no-wrapping-warning-"+block).show();
      }
    } else
    if (alignment == "None") {
      $("#css-none-"+block).css('display', 'table-cell');
    } else
    if (alignment == "Custom CSS") {
      $("#css-code-" + block).show();
      $("#custom-css-"+block).show();
    } else
    if (alignment == "Align Left") {
      $("#css-left-"+block).css('display', 'table-cell');
    } else
    if (alignment == "Align Right") {
      $("#css-right-"+block).css('display', 'table-cell');
    } else
    if (alignment == "Center") {
      $("#css-center-"+block).css('display', 'table-cell');
    } else
    if (alignment == "Float Left") {
      $("#css-float-left-"+block).css('display', 'table-cell');
    } else
    if (alignment == "Float Right") {
      $("#css-float-right-"+block).css('display', 'table-cell');
    }

    if ($('#css-code-'+block).is(':visible')) {
        $("#show-css-button-"+block+" span").text ("Hide CSS");
    } else {
        $("#show-css-button-"+block+" span").text ("Show CSS");
      }

    var avoid_action = $("select#avoid-action-"+block+" option:selected").text();

    if (avoid_action == "do not insert")
      $("#check-up-to-"+block).hide (); else
        $("#check-up-to-"+block).show ();


    $("#scheduling-delay-"+block).hide();
    $("#scheduling-between-dates-"+block).hide();
    $("#scheduling-delay-warning-"+block).hide();

    var scheduling = $("select#scheduling-"+block).val();

    if (scheduling == "1") {
      if (content_settings) {
        $("#scheduling-delay-"+block).show();
      } else {
          $("#scheduling-delay-warning-"+block).show();
        }
    } else
    if (scheduling == "2") {
      $("#scheduling-between-dates-"+block).show();
      process_scheduling_dates (block);
    }

    if (syntax_highlighting) configure_editor_language (block);
  }

  function configure_editor (block) {

    if (debug) console.log ("configure_editor: " + block);

    if (syntax_highlighting) {
      var syntax_highlighter = new SyntaxHighlight ('#block-' + block, block, shSettings);
      syntax_highlighter.editor.setPrintMarginColumn (1000);

      $('input#simple-editor-' + block).change (function () {

        var block = $(this).attr ("id").replace ("simple-editor-","");
        var editor_disabled = $(this).is(":checked");
        var editor = ace.edit ("editor-" + block);
        var textarea = $("#block-" + block);
        var ace_editor = $("#editor-" + block);

        if (editor_disabled) {
          textarea.val (editor.session.getValue());
          textarea.css ('display', 'block');
          ace_editor.css ('display', 'none');
        } else {
            editor.session.setValue (textarea.val ())
            editor.renderer.updateFull();
            ace_editor.css ('display', 'block');
            textarea.css ('display', 'none');
          }
      });
    }

    if (block != 'h' && block != 'f' && !header) {
      if ((block - 1) >> 4) {
        $('#block'   + '-' + block).removeAttr(header_id);
        $('#display' + '-type-' + block).removeAttr(header_id);
      }

      if (block >> 2) {
        $('#option' + '-name-' + block).removeAttr(header_id);
        $('#option' + '-length-' + block).removeAttr(header_id);
      }
    }
  }

  function configure_tab_0 () {

    if (debug) console.log ("configure_tab_0");

    $('#tab-0').addClass ('configured');

    $('#tab-0 input[type=submit], #tab-0 button').button().show ();

    configure_editor ('h');
    configure_editor ('f');

    $('#ai-plugin-settings-tab-container').tabs();
    $('#ai-plugin-settings-tabs').show();

    $("#export-switch-0").button ({
      icons: {
        primary: "ui-icon-gear",
        secondary: "ui-icon-triangle-1-s"
      },
      text: false
    }).show ().click (function () {
      $("#export-container-0").toggle ();

      if ($("#export-container-0").is(':visible') && !$(this).hasClass ("loaded")) {
        var nonce = $(this).attr ('nonce');
        var site_url = $(this).attr ('site-url');
        $("#export_settings_0").load (site_url+"/wp-admin/admin-ajax.php?action=ai_data&export=0&ai_check=" + nonce, function() {
          $("#export_settings_0").attr ("name", "export_settings_0");
          $("#export-switch-0").addClass ("loaded");
        });
      }
    });

    $("input#process-php-h").change (function() {
      if (syntax_highlighting) configure_editor_language ('h');
    });

    $("input#process-php-f").change (function() {
      if (syntax_highlighting) configure_editor_language ('f')
    });

    if (syntax_highlighting) configure_editor_language ('h');
    if (syntax_highlighting) configure_editor_language ('f');

    for (var index = 1; index <= 6; index ++) {
      generate_country_list ('group-country', index);
    }
  }

  function configure_tab (tab) {

    $('#tab-' + tab).addClass ('configured');

    $('#tab-' + tab + ' input[type=submit], #tab-' + tab + ' button').button().show ();

    configure_editor (tab);

    $("select#display-type-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-type-", "");
      process_display_elements (block);
    });
    $("select#block-alignment-"+tab).change (function() {
      var block = $(this).attr('id').replace ("block-alignment-", "");
      process_display_elements (block);
    });
    $("input#process-php-"+tab).change (function() {
      var block = $(this).attr('id').replace ("process-php-", "");
      process_display_elements (block);
    });
    $("#enable-shortcode-"+tab).change (function() {
      var block = $(this).attr('id').replace ("enable-shortcode-", "");
      process_display_elements (block);
    });
    $("#enable-php-call-"+tab).change (function() {
      var block = $(this).attr('id').replace ("enable-php-call-", "");
      process_display_elements (block);
    });
    $("select#display-for-devices-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-for-devices-", "");
      process_display_elements (block);
    });
    $("select#scheduling-"+tab).change (function() {
      var block = $(this).attr('id').replace ("scheduling-", "");
      process_display_elements (block);
    });

    $("#display-homepage-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-homepage-", "");
      process_display_elements (block);
    });
    $("#display-category-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-category-", "");
      process_display_elements (block);
    });
    $("#display-search-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-search-", "");
      process_display_elements (block);
    });
    $("#display-archive-"+tab).change (function() {
      var block = $(this).attr('id').replace ("display-archive-", "");
      process_display_elements (block);
    });

    $("#client-side-detection-"+tab).change (function() {
      var block = $(this).attr('id').replace ("client-side-detection-", "");
      process_display_elements (block);
    });

    $("#scheduling-on-"+tab).change (function() {
      var block = $(this).attr('id').replace ("scheduling-on-", "");
      process_scheduling_dates (block);
    });

    $("#scheduling-off-"+tab).change (function() {
      var block = $(this).attr('id').replace ("scheduling-off-", "");
      process_scheduling_dates (block);
    });

    $("select#avoid-action-"+tab).change (function() {
      var block = $(this).attr('id').replace ("avoid-action-", "");
      process_display_elements (block);
    });

    process_display_elements (tab);

    $("#widgets-button-"+tab).button ({
    }).click (function () {
      window.location.href = "widgets.php";
    });

    $("#show-css-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id").replace ("show-css-button-","");
      $("#css-code-" + block).toggle ();

      if ($('#css-code-'+block).is(':visible')) {
          $("#show-css-button-"+block+" span").text ("Hide CSS");
      } else {
          $("#show-css-button-"+block+" span").text ("Show CSS");
        }
    });

    $("#counting-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id").replace ("counting-button-","");
      $("#paragraph-counting-" + block).toggle ();
    });

    $("#clearance-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id").replace ("clearance-button-","");
      $("#paragraph-clearance-" + block).toggle ();
    });

    $("#scheduling-on-"+tab).datepicker ({dateFormat: dateFormat, autoSize: true});
    $("#scheduling-off-"+tab).datepicker ({dateFormat: dateFormat, autoSize: true});

    $("#edit-css-button-"+tab).button ({
    }).click (function () {
      var block = $(this).attr('id').replace ("edit-css-button-", "");

      $("#css-left-"+block).hide();
      $("#css-right-"+block).hide();
      $("#css-center-"+block).hide();
      $("#css-float-left-"+block).hide();
      $("#css-float-right-"+block).hide();

      var alignment = $("select#block-alignment-"+block+" option:selected").text();

      if (alignment == "None") {
        $("#css-none-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-none-"+block).text ());
        $("select#block-alignment-"+block).val ("Custom CSS").change();
      } else
      if (alignment == "Align Left") {
        $("#css-left-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-left-"+block).text ());
        $("select#block-alignment-"+block).val ("Custom CSS").change();
      } else
      if (alignment == "Align Right") {
        $("#css-right-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-right-"+block).text ());
        $("select#block-alignment-"+block).val ("Custom CSS").change();
      } else
      if (alignment == "Center") {
        $("#css-center-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-center-"+block).text ());
        $("select#block-alignment-"+block).val ("Custom CSS").change();
      } else
      if (alignment == "Float Left") {
        $("#css-float-left-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-float-left-"+block).text ());
        $("select#block-alignment-"+block).val ("Custom CSS").change();
      } else
      if (alignment == "Float Right") {
        $("#css-float-right-"+block).hide();
        $("#custom-css-"+block).show().val ($("#css-float-right-"+block).text ());
        $("select#block-alignment-"+block).val ("Custom CSS").change();
      }
    });

    $("#name-label-"+tab).click (function () {
      var block = $(this).attr('id').replace ("name-label-", "");
      if (!$('#name-edit-'+block).is(':visible')) {
        $("#name-edit-"+block).css('display', 'table-cell').val ($("#name-label-"+block).text ()).focus ();
        $("#name-label-"+block).hide();
      }
    });

    $("#name-label-container-"+tab).click (function () {
      var block = $(this).attr('id').replace ("name-label-container-", "");
      if (!$('#name-edit-'+block).is(':visible')) {
        $("#name-edit-"+block).css('display', 'table-cell').val ($("#name-label-"+block).text ()).focus ();
        $("#name-label-"+block).hide();
      }
    });

    $("#name-edit-"+tab).on('keyup keypress', function (e) {
      var keyCode = e.keyCode || e.which;
      ignore_key = true;
      if (keyCode == 27) {
        var block = $(this).attr('id').replace ("name-edit-", "");
        $("#name-label-"+block).show();
        $("#name-edit-"+block).hide();
        ignore_key = false;
      } else if (keyCode == 13) {
          var block = $(this).attr('id').replace ("name-edit-", "");
          $("#name-label-"+block).show().text ($("#name-edit-"+block).val ());
          $("#name-edit-"+block).hide();
          ignore_key = false;
          e.preventDefault();
          return false;
      }
    }).focusout (function() {
      if (ignore_key) {
        var block = $(this).attr('id').replace ("name-edit-", "");
        $("#name-label-"+block).show().text ($("#name-edit-"+block).val ());
        $("#name-edit-"+block).hide();
      }
      ignore_key = true;
    });

    $("#export-switch-"+tab).button ({
      icons: {
        secondary: "ui-icon-triangle-1-s"
      },
      text: false
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("export-switch-","");
      $("#export-container-" + block).toggle ();

      if ($("#export-container-" + block).is(':visible') && !$(this).hasClass ("loaded")) {
        var nonce = $(this).attr ('nonce');
        var site_url = $(this).attr ('site-url');
        $("#export_settings_" + block).load (site_url+"/wp-admin/admin-ajax.php?action=ai_data&export=" + block + "&ai_check=" + nonce, function() {
          $("#export_settings_" + block).attr ("name", "export_settings_" + block);
          $("#export-switch-"+block).addClass ("loaded");
        });
      }
    });

    $("#device-detection-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("device-detection-button-","");
      $("#device-detection-settings-" + block).toggle ();
    });

    $("#lists-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("lists-button-","");
      $("#list-settings-" + block).toggle ();
    });

    $("#manual-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("manual-button-","");
      $("#manual-settings-" + block).toggle ();
    });

    $("#misc-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("misc-button-","");
      $("#misc-settings-" + block).toggle ();
    });

    $("#scheduling-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("scheduling-button-","");
      $("#scheduling-settings-" + block).toggle ();
    });

    $("#preview-button-"+tab).button ({
    }).show ().click (function () {
      var block = $(this).attr ("id");
      block = block.replace ("preview-button-","");

      $(this).blur ();


      var alignment = $("select#block-alignment-"+block+" option:selected").text();

      var css = "";
      if (alignment == "None") {
        css = $("#css-none-"+block).text ();
      } else
      if (alignment == "Custom CSS") {
        css = $("#custom-css-"+block).val();
      } else
      if (alignment == "Align Left") {
        css = $("#css-left-"+block).text ();
      } else
      if (alignment == "Align Right") {
        css = $("#css-right-"+block).text ();
      } else
      if (alignment == "Center") {
        css = $("#css-center-"+block).text ();
      } else
      if (alignment == "Float Left") {
        css = $("#css-float-left-"+block).text ();
      } else
      if (alignment == "Float Right") {
        css = $("#css-float-right-"+block).text ();
      }

      var name = $("#name-label-"+block).text ();

      var window_width = 820;
      var window_height = 820;
      var nonce = $(this).attr ('nonce');
      var site_url = $(this).attr ('site-url');
      var page = site_url+"/wp-admin/admin-ajax.php?action=ai_data&preview=" + block + "&ai_check=" + nonce + "&alignment=" + encodeURI (alignment) + "&css=" + encodeURI (css) + "&name=" + encodeURI (name);
      var window_left  = 120;
      var window_top   = (screen.height / 2) - (820 / 2);
      var preview_window = window.open (page, 'preview','width='+window_width+',height='+window_height+',top='+window_top+',left='+window_left+',resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no,menubar=no');
    });

    generate_country_list ('country', tab);
  }

  function generate_country_list (element_name_prefix, index) {
    if ($('#'+element_name_prefix+'-select-'+index).length !== 0) {

      $('#'+element_name_prefix+'-list-'+index).click (function () {
        if (!$('#'+element_name_prefix+'-select-'+index).hasClass ('multi-select')) {
          $('#'+element_name_prefix+'-select-'+index).addClass ('multi-select');
          $('#'+element_name_prefix+'-select-'+index).multiSelect({
            selectableHeader: "<input type='text' class='search-input' autocomplete='off' placeholder='Search...'>",
            selectedHeader: "Selected Countries",
            afterInit: function(ms){
              var that = this,
                  $selectableSearch = that.$selectableUl.prev(),
                  $selectionSearch = that.$selectionUl.prev(),
                  selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                  selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

              that.qs1 = $selectableSearch.quicksearch (selectableSearchString)
              .on('keydown', function(e){
                if (e.which === 40){
                  that.$selectableUl.focus();
                  return false;
                }
              });

              that.qs2 = $selectionSearch.quicksearch (selectionSearchString)
              .on('keydown', function(e){
                if (e.which == 40){
                  that.$selectionUl.focus();
                  return false;
                }
              });
            },
            afterSelect: function(values){
              update_country_list (this, element_name_prefix);
            },
            afterDeselect: function(values){
              update_country_list (this, element_name_prefix);
            }
          });
          $('#ms-'+element_name_prefix+'-select-'+index).hide();
        }
        update_country_selection ($(this), element_name_prefix, true)
      }).focusout (function () {
        update_country_selection ($(this), element_name_prefix)
      });
    }
  }

  function update_country_list (select_element, element_name_prefix) {
    var ms = select_element.$element;
    var ms_val = ms.val();
    var index = ms.attr ('id').replace (element_name_prefix+'-select-','');
    $('#'+element_name_prefix+'-list-'+index).attr ('value', ms_val);
    select_element.qs1.cache();
    select_element.qs2.cache();
  }

  function update_country_selection (select_element, element_name_prefix, toggle = false) {
    var index = select_element.attr ('id');
    var index = index.replace (element_name_prefix+'-list-','');
    if (toggle) $('#ms-'+element_name_prefix+'-select-'+index).toggle();
    if ($('#ms-'+element_name_prefix+'-select-'+index).is(':visible')) {
      var country_array = $('#'+element_name_prefix+'-list-'+index).attr ('value').replace(/ /g , '').toUpperCase().split (',');
      $('#'+element_name_prefix+'-select-'+index).multiSelect ('deselect_all').multiSelect ('select', country_array).multiSelect('refresh');
    }
  }

  function configure_hidden_tab () {
    var current_tab;
    var tab;

    if (debug) console.log ("");
    if (debug) {
      var current_time_start = new Date().getTime();
      console.log ("since last time: " + ((current_time_start - last_time) / 1000).toFixed (3));
    }
    if (debug) console.log ("configure_hidden_tab");
    if (debug) console.log ("tabs_to_configure: " + tabs_to_configure);

    do {
      if (tabs_to_configure.length == 0) {
        if (debug_title) $("#plugin_name").css ("color", "#000");
        if (debug) console.log ("configure_hidden_tab: DONE");
        return;
      }
      current_tab = tabs_to_configure.pop();
      tab = $("#tab-" + current_tab);
    } while (tab.hasClass ('configured'));

    if (debug) console.log ("Configuring tab: " + current_tab);

    if (current_tab != 0) configure_tab (current_tab); else configure_tab_0 ();

    if (debug) {
      var current_time = new Date().getTime();
      console.log ("time: " + ((current_time - current_time_start) / 1000).toFixed (3));
      console.log ("TIME: " + ((current_time - start_time) / 1000).toFixed (3));
      last_time = current_time;
    }

    if (tabs_to_configure.length != 0) setTimeout (configure_hidden_tab, 10); else if (debug_title) $("#plugin_name").css ("color", "#000");
  }



  if (debug) console.log ("READY");
  if (debug_title) $("#plugin_name").css ("color", "#f00");
  if (debug) {
    var current_time_ready = new Date().getTime();
    console.log ("TIME: " + ((current_time_ready - start_time) / 1000).toFixed (3));
  }

  $("#blocked-warning").removeClass ('warning-enabled');
  $("#blocked-warning").hide ();

  start       = parseInt ($('#ai-form').attr('start'));
  end         = parseInt ($('#ai-form').attr('end'));
  active_tab  = parseInt ($("#ai-active-tab").attr ("value"));

  if (debug) console.log ("active_tab: " + active_tab);

  var tabs_array = new Array ();
  if (active_tab != 0) tabs_array.push (0);
  for (var tab = end; tab >= start; tab --) {
    if (tab != active_tab) tabs_array.push (tab);
  }
  // Concate existing tabs_to_configure (if tab was clicked before page was loaded)
  tabs_to_configure = tabs_array.concat (tabs_to_configure);

  setTimeout (configure_hidden_tab, 700);

  var plugin_version = $('#data').attr ('version');
  if (javascript_version != plugin_version) {

    // Check page HTML
    var javascript_version_parameter = $("script[src*='ad-inserter.js']").attr('src');
    if (typeof javascript_version_parameter == 'undefined') $("#javascript-version-parameter-missing").show (); else {
      javascript_version_parameter_string = javascript_version_parameter.split('=')[1];
      if (typeof javascript_version_parameter_string == 'undefined') {
        $("#javascript-version-parameter-missing").show ();
      }
      else if (javascript_version_parameter_string != plugin_version) {
        $("#javascript-version-parameter").show ();
      }
    }

    $("#javascript-version").html ("&nbsp;javascript " + javascript_version);
    $("#javascript-warning").show ();
  }

  var css_version = $('#data').css ('font-family').replace(/\"/g, '');
  if (css_version.indexOf ('.') == - 1) $("#blocked-warning").show (); else
    if (css_version != plugin_version) {

      // Check page HTML
      var css_version_parameter = $("link[href*='ad-inserter.css']").attr('href');
      if (typeof css_version_parameter == 'undefined') $("#css-version-parameter-missing").show (); else {
        css_version_parameter_string = css_version_parameter.split('=')[1];
        if (typeof css_version_parameter_string == 'undefined') {
          $("#css-version-parameter-missing").show ();
        }
        else if (css_version_parameter_string != plugin_version) {
          $("#css-version-parameter").show ();
        }
      }

      $("#css-version").html ("&nbsp;CSS " + css_version);
      $("#css-warning").show ();
    }

  var index = 16;
  if (active_tab != 0) index = active_tab - start;
  var block_tabs = $("#ai-tab-container").tabs ({active: index});

  $('#ai-settings').tooltip({
    show: {effect: "blind",
           delay: 400,
           duration: 100}
  });

  if (debug_title) $("#plugin_name").css ("color", "#00f");

  if (active_tab == 0) configure_tab_0 (); else configure_tab (active_tab);

  $('#dummy-ranges').hide();
  $('#ai-ranges').show();

  $('#dummy-tabs').hide();
  $('#ai-tabs').show();

  $('.header button').button().show ();

  $("#ai-form").submit (function (event) {
    for (var tab = start; tab <= end; tab ++) {
      remove_default_values (tab);
    }
  });

  if (syntax_highlighting) {
    $('.ai-tab').click (function () {
      tab_block = $(this).attr ("id");
      tab_block = tab_block.replace ("ai-tab","");
      active_tab = tab_block;

      if (!$("#tab-" + tab_block).hasClass ('configured')) {
        if (debug) console.log ("");
        if (debug) console.log ("Empty tab: " + tab_block);
        tabs_to_configure.push (tab_block);
        setTimeout (configure_hidden_tab, 10);
        if (debug) console.log ("tabs_to_configure: " + tabs_to_configure);
      } else if (tab_block != 0) {
          var editor = ace.edit ("editor-" + tab_block);
          editor.getSession ().highlightLines (10000000);
        }
    });

    $('.ai-plugin-tab').click (function () {
      tab_block = $(this).attr ("id");
      tab_block = tab_block.replace ("ai-","");

      if (tab_block == 'h') {
          var editor = ace.edit ("editor-h");
          editor.getSession ().highlightLines (10000000);
      } else
      if (tab_block == 'f') {
          editor = ace.edit ("editor-f");
          editor.getSession ().highlightLines (10000000);
      }
    });
  }

  $('#plugin_name').dblclick (function () {
    $("#system-debugging").toggle();
  });

  if (debug) console.log ("");
  if (debug) console.log ("READY END");
  if (debug) {
    var current_time = new Date().getTime();
    console.log ("main time: " + ((current_time - current_time_ready) / 1000).toFixed (3));
  }
});
