=== ZF WordPress Category Accordion ===
Contributors: ZuFusion
Tags: wordpress category accordion, woocommerce category accordion, toggle accordion, hover accordion, pages accordion, accordion menus
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

ZF WordPress Category Accordion allows you to display categories/pages as multilevel accordion category.

== Description ==

ZF WordPress Category Accordion allows you to display categories/pages as multilevel accordion category.

* Support WooCommerce category accordion
* Support WordPress category accordion
* Support Jigoshop, MarketPress Lite, Easy Digital Downloads category accordion
* Support WP eCommerce category accordion
* Pages accordion
* Translation ready
* Support ShortCode vs Widget
* Toggle Accordion
* Arrow alignment
* Expanded first level child of active category/page
* Open default any parent categories/pages
* Support 'click' or 'hover' event
* 7 default color schemes
* Show/Hide items count
* Hide empty category
* Exclude category/page
* Include category/page
* Limit number of categories


== Installation ==

This section describes how to install the plugin and get it working.

1. Upload the plugin through `Plugins > Add New > Upload` interface or upload `zf-wordpress-category-accordion` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the `Plugins` menu in WordPress

== How to use the plugin ==

= Using Widget =

1. Go to Appearance -> Widgets, Drag ZF WordPress Category Accordion widget in to your WordPress Sidebar
2. Save
3. You are done.

= Using Shortcode =

You can use this shortcode in your posts, pages and custom posts

1. The shortcode was commonly used in its most basic options:
    [zfwca title="" category_type="category"]
2. There are several options that may be specified using this syntax:
    [zfwca title="" speed="slow" event_type="click" arrow_alignment="right" color_scheme="dark" category_type="category" order_by="name" order="asc" exclude="" include="" open_default="" limit="" show_count="false" hide_empty="false"  allow_parent_links="false" ripple_effect="true" toggle="false"]

== Changelog ==

= 1.0 =
* First release
= 1.1 =
* Fixed duration when entering the number value.
* Fixed not found 'style.css.map' file
* Added classic color scheme.
* Added level class to each category link.
* Put javascript to footer of page for loading the plugin faster.
= 1.2 =
* Added pages accordion
* Fixed the antivirus doubts js file
* Support Jigoshop, MarketPress Lite, Easy Digital Downloads category accordion
* Support WP eCommerce category accordion
= 1.3 =
* Added arrow alignment (left or right)
* Expanded first level child of active category/page
* Open default any parent categories/pages
* Added german translation
= 1.4 =
* Fixed arrow css
* Fixed small bug of active category/page
= 1.5 =
* Added a shortcode button to the TinyMCE editor
* Open categories while viewing a single post
= 1.6 =
* Improved open categories while viewing a single post
= 1.7 =
* WordPress 4.1 ready
* Allows only include certain Category/Page IDs
* Fixed 'order by' field
= 1.8 =
* WordPress 4.2.2 ready
* Fixed duplicated arrow on widget in some cases
= 1.9 =
* Added google ripple effect when clicking on link
* Added choose IDs to exclude for widget
* Added choose IDs to include for widget