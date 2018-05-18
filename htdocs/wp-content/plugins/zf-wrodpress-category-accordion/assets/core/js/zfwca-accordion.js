/**
 * @version    1.9
 * @package    ZF WordPress Category Accordion
 * @author     ZuFusion
 * @copyright  Copyright (C) 2014 ZuFusion.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 * Websites: http://zufusion.com
 */

(function ($) {

    $.fn.ZFCAccordion = function (options) {

        //set default options
        var defaults = {
            eventType: 'click',
            speed: 'slow', //The duration of the sliding animation. (slow, fast, or number)
            showCount: false, // Show/Hide items cout
            arrowClass: 'arrow', // arrow class
            allowParentLinks: true,	// Allow clickable links as parent elements.
            rippleEffect: true,
            toggle: false,  //Toggle a parent link or auto close other parents when clicking or hovering on a parent link.
            openIDs: '',  //Expand default parent category.
            currentCats: '',  //Expand current categories/pages.
            open: null, // Called after item or sub-item opened.
            close: null // Called after item or sub-item closed.
        };

        var options = $.extend(defaults, options);

        this.each(function () {

            var object = this;
            // open default categories/pages
            if (options.openIDs != '') {
                var open_ids = options.openIDs.split(',');
                if ($.isArray(open_ids)) {
                    $.each(open_ids, function(i, val) {
                        var li_item = $('.cat-item-' + val + ', .page-item-' + val, object);
                        li_item.parents('.has-sub').each(function() {
                                $(this).addClass('open');
                                $(this).find(' > ul').show();
                            }
                        );

                        if (li_item.hasClass('has-sub')) {
                            li_item.addClass('open');
                            li_item.find(' > ul').show();
                        }
                    })
                }
            }

            // highlight current categories/pages
            if (options.currentCats != '') {
                var current_ids = options.currentCats.split(',');
                if ($.isArray(current_ids)) {
                    $.each(current_ids, function(i, val) {
                        var li_item = $('.cat-item-' + val + ', .page-item-' + val, object);
                        li_item.parents('.has-sub').each(function() {
                                $(this).addClass('current-cat');
                        });
                        li_item.addClass('current-cat');
                    })
                }
            }

            var current_cat = $('li.current-cat', object);

            // append current-cat class to all parents
            current_cat.parents('.has-sub').each(function() {
                    $(this).addClass('current-cat');
                    $(this).addClass('open');
                    $(this).find(' > ul').show();
                }
            );

            current_cat.addClass('open');
            current_cat.find(' > ul').show();

            // append arrow to parent item
            $('li.has-sub > a', object).append('<a href="javascript:void(0);" class="' + options.arrowClass + '"></a>');

            if (options.eventType == 'click') {

                var selector = $('li.has-sub > a', object);

                if (!options.allowParentLinks) {
                    selector.attr('href', 'javascript:void(0)');
                }

                selector.on('click', function (e) {

                    if (!options.allowParentLinks) {
                        e.preventDefault();
                    }

                    var li = $(this).parent('li');

                    if ($('> ul', li).is(':visible')) {

                        $('ul', li).slideUp(options.speed, function () {
                            li.removeClass('open');
                            li.find('li').removeClass('open');

                            onClosed(options);

                        });

                    } else {

                        $(this).siblings('ul').slideDown(options.speed, function () {
                            onOpened(options);
                        });

                        li.addClass('open');

                        // close another when clicking on this element
                        if (!options.toggle) {

                            li.siblings('li').removeClass('open');
                            li.siblings('li').find('li').removeClass('open');
                            li.siblings('li').find('ul').slideUp(options.speed, function () {
                                onClosed(options);
                            });

                        }

                    }

                });

            } else if (options.eventType == 'hover') {

                var selector = $('li.has-sub', object);

                selector.hoverIntent(function () {
                    var li = $(this);

                    if (options.toggle) {

                        if (li.hasClass('open')) {

                            li.find('ul').slideUp(options.speed, function () {
                                li.removeClass('open');
                                li.find('li').removeClass('open');
                                onClosed(options);
                            });

                            return false;
                        }

                    }

                    li.find(' > ul').slideDown(options.speed, function () {
                        onOpened(options);
                    });

                    li.addClass('open');

                }, function () {

                    if (!options.toggle) {

                        var li = $(this);
                        li.find('ul').slideUp(options.speed, function () {
                            li.removeClass('open');
                            li.find('li').removeClass('open');
                            onClosed(options);
                        });
                    }

                });


            }

            // Ripple effect
            if (options.rippleEffect) {

                $(".cat-item .item-link", object).on('click', function(e){

                    var $this = $(this);

                    if($this.find(".ripple-effect").length == 0) {
                        $this.prepend("<span class='ripple-effect'></span>");
                    }

                    var ripple_effect = $this.find(".ripple-effect");

                    ripple_effect.removeClass("ripple-animate");

                    if(!ripple_effect.height() && !ripple_effect.width())
                    {
                        d = Math.max($this.outerWidth(), $this.outerHeight());
                        ripple_effect.css({height: d, width: d});
                    }

                    x = e.pageX - $this.offset().left - ripple_effect.width()/2;
                    y = e.pageY - $this.offset().top - ripple_effect.height()/2;

                    ripple_effect.css({top: y+'px', left: x+'px'}).addClass("ripple-animate");

                });
            }

            // Closed event
            function onClosed(options) {

                //Fire close callback
                if (options.close != null) {
                    options.close();
                }

            }

            // Opened event
            function onOpened(options) {

                //Fire close callback
                if (options.close != null) {
                    options.close();
                }

            }

        });

    }

})(jQuery);
