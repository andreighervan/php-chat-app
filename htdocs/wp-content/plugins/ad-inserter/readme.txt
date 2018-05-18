=== Ad Inserter ===
Contributors: spacetime
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LHGZEMRTR7WB4
Tags: adsense, amazon, advertising, ad, advert, html, javascript, php, code, widget, sidebar, responsive, viewport, rotating, banner, ad rotation, geo targeting, multisite, contextual, shortcodes, widgets, header, footer, mobile, desktop, phone, tablet, custom css, category, tag, filter, url, caching support
Requires at least: 4.0
Tested up to: 4.7
Stable tag: 2.0.8
License: GPLv3

Insert any advert or HTML/Javascript/PHP code into Wordpress. Perfect for all kinds of ads. 16 code blocks, many insertion options and features.

== Description ==

A simple yet powerful plugin to insert any ad or code into Wordpress. **Perfect for all kinds of ads.** Simply enter any ad or HTML/Javascript/PHP code and select where and how you want to insert it.

> **Features**
>
> *   16 code blocks
> *   Syntax highlighting editor
> *   Code preview with visual CSS editor
> *   Automatic insertion: before/after post, content, paragraph or excerpt
> *   Insertion exceptions for posts and pages
> *   Manual insertion: widgets, shortcodes, PHP function call
> *   Custom block alignment and style
> *   Clearance options to avoid insertion near images or headers
> *   PHP code processing
> *   Ad rotation (server-side and client-side - works with caching)
> *   Device detection (server-side and client-side, 3 custom viewports)
> *   Black/White-list categories, tags, post IDs, urls, url parameters, referers
> *   Simple troubleshooting with many debugging functions
> *   Function to visualize inserted code blocks
> *   Function to visualize available insertion positions
> *   Function to visualize HTML tags

Ad Inserter plugin is simple to use but has many features. Please read user manual to get the most of it.

> *   Check <a href="http://adinserter.pro/documentation" target="_blank">Ad Inserter documentation page</a> for detailed description of all the features
> *   Download **PDF user guide** for Ad Inserter: go to <a href="http://adinserter.pro/" target="_blank">Ad Inserter Pro</a> page and below you can find button for free download of Ad Inserter User Guide

**Endorsed by Amazon**

> Amazon suggests to use Ad Inserter to add Native Shopping Ads to Wordpress posts. Native Shopping Ads provide highly relevant and dynamic product recommendations in a stylishly designed and responsive ad unit that can be placed at the end of your content or within your content to create a more compelling visitor experience and shopping opportunity.
>
> *   Check <a href="https://affiliate-program.amazon.com/help/topic/t405" target="_blank">Wordpress Integration Guide for Native Shopping Ads</a>
> *   On the <a href="https://wordpress.org/plugins/ad-inserter/faq/">FAQ</a> page you can also find an example of contextual Amazon Shopping Ads that show items related to the post content (using post tags)

There is also <a href="http://adinserter.pro/" target="_blank">Ad Inserter Pro</a> if you need more:

> *   64 code blocks
> *   GEO targeting (works also with caching)
> *   Black/White-list IP addresses or countries
> *   Scheduling with fallback option
> *   Export and import of settings
> *   Multisite options to limit settings on the sites
> *   6 viewports
> *   Support via email

**Quick Start**

Few very important things you need to know in order to <a href="http://adinserter.pro/documentation#quick-start">insert code and display some ad</a>:

*   Code block is any code (for example AdSense ad) that has to be inserted (and displayed) at some position. Each code block can be configured to insert code at almost any position supported by Wordpress
*   **Enable and use at least one insertion option** (Automatic insertion, Widget, Shortcode, PHP function call)
*   **Enable insertion on at least one Wordpress page type** (Posts, Static pages, Homepage, Category pages, Search Pages, Archive pages)
*   For Posts and static pages **select default value On all Posts / On all Static pages** unless you really know what are you doing
*   If you don't see inserted code block turn on **debugging functions**: Label inserted blocks, Show available positions for automatic insertion (Ad Inserter menu item in the Wordpress toolbar on the top of every post/page)

Few typical settings are described on the <a href="https://wordpress.org/plugins/ad-inserter/faq/">FAQ</a> page. Please make sure you have also read <a href="https://wordpress.org/plugins/ad-inserter/installation/">Docs</a> page.
For more detailed instructions please read <a href="http://adinserter.pro/documentation" target="_blank">Ad Inserter documentation page</a>.

Please *support the plugin* if you like it:

*   Write a nice <a href="https://wordpress.org/support/plugin/ad-inserter/reviews/">review</a>
*   <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LHGZEMRTR7WB4">Donate</a>


== Installation ==

**Automatic installation**: Go to Wordpress Plugins menu, click Add New button, search for "Ad Inserter" and click Install Now.

**Manual installation**:

1. Download the plugin,
2. Go to Wordpress Plugins, Add New, Upload Plugin
3. Choose file, click on Install Now, activate it
3. Go to Settings / Ad Inserter to configure it

**Ad Inserter Pro Installation**

If you are using free Ad Inserter simply uninstall it. The Pro version will automatically import existing settings from the free version.
After you receive the email with download link for the Ad Inserter Pro plugin, download it, go to Wordpress Plugins, Add New, Upload Plugin, Choose file, click on Install Now,
activate it and then click "Enter License Key" and enter license key you got in the email. If you need to edit license key go to Ad Inserter settings (tab *).

**Uninstall**

If you deactivate and delete Ad Inserter the settings will stay in the database. To completely remove the plugin and settings do the following:

1. Go to Ad Inserter Settings (tab *) and click on Reset All Settings
2. Deactivate Ad Inserter
3. Delete Ad Inserter plugin

**Quick Start**

Few very important things you need to know in order to <a href="http://adinserter.pro/documentation#quick-start">insert code and display some ad</a>:

*   Code block is any code (for example AdSense ad) that has to be inserted (and displayed) at some position. Each code block can be configured to insert code at almost any position supported by Wordpress
*   **Enable and use at least one insertion option** (Automatic insertion, Widget, Shortcode, PHP function call)
*   **Enable insertion on at least one Wordpress page type** (Posts, Static pages, Homepage, Category pages, Search Pages, Archive pages)
*   For Posts and static pages **select default value On all Posts / On all Static pages** unless you really know what are you doing
*   If you don't see inserted code block turn on **debugging functions**: Label inserted blocks, Show available positions for automatic insertion (Ad Inserter menu item in the Wordpress toolbar on the top of every post/page)

Few typical settings are described on the <a href="https://wordpress.org/plugins/ad-inserter/faq/">FAQ</a> page. Please make sure you have also read **WARNINGS** on the bottom of this page and instructions for **Debugging**.

**Settings**

Each code block has a name and settings which are divided into sections. Some settings depend also on automatic insertion used. To rename code block click on the block name.
Check **Simple editor** to switch to simple editor for mobile devices. If you have PHP code (surrounded with PHP tags `<?php … ?>`) in code block, you need to check **Process PHP** to enable PHP processing.
When you are finished with settings you need to save them by clicking on the button **Save Settings**.

Each code block has 4 insertion options:

*   Automatic Insertion
*   Widget
*   Shortcode
*   PHP function call

Normally for each code block you use only one insertion option.
Of course, you can use all 4 options simultaneously taking into account that all insertion options use the same block settings (with some exceptions mentioned below).

To insert code block and display ad at some position **you need to enable and use at least one insertion option**.

Automatic Insertion Options:

*   Insert Before Post (before post or posts on blog pages, previously named Before Title)
*   Insert Before Content (before post or static page text)
*   Insert Before Paragraph (on posts, static pages and blog pages)
*   Insert After Paragraph (on posts, static pages and blog pages)
*   Insert After Content (after post or static page text)
*   Insert After Post (after post or posts on blog pages)
*   Insert Before Excerpt (on blog pages)
*   Insert After Excerpt (on blog pages)

For single posts or static pages insertion position Before Post usually means position above the post/page title, for blog pages Before Post position means position above all the posts on the blog page.

For single posts or static pages insertion position After Post means position below the post/page after all the content, for blog pages After Post position means position below all the posts on the blog page.

Please use **Show positions** function to see available positions for automatic insertion (Ad Inserter menu item in the Wordpress toolbar on the top of every post/page).

Block Alignment and Style:

*   No Wrapping (leaves ad code as it is, otherwise it is wrapped by a div)
*   Custom CSS (You can enter custom CSS code for wrapping div)
*   None (simple div with thin margin)
*   Align Left
*   Align Right
*   Center
*   Float Left (ad on left with wrapped text on right)
*   Float Right (ad on right with wrapped text on left)

**[ Preview ]**

Ad Inserter has a very useful function that can help you to check if the ad code is working and to see how it will look like when it will be inserted. Click on the **Preview** button to open Preview window.
WARNING: Some adblockers may block code on the Ad Inserter preview window. If you see warning PAGE BLOCKED or you don't see your code and the widow elements are distorted, make sure you have disabled ad blockers.
On the top of the window there is visual CSS editor and four buttons and below there is CSS code of the wrapping div (which can be edited manually) and 'Block Alignment and Style' selection.

Below the settings there is a **preview of the saved code** between two dummy paragraphs. Here you can test various block alignments, visually edit margin and padding values of the wrapping div or write CSS code directly
and watch live preview. Highlight button highlights background, wrapping div margin and code area, while Reset button restores all the values to those of the current block.
You can resize the window (and refresh the page to reload ads) to check display with different screen widths. Once you are satisfied with alignment click on the Use button and the settings will be copied to the active block.

**Please note** that the code displayed here is the code that is saved for this block, while block name, alignment and style are taken from the current block settings (may not be saved).
No Wrapping style inserts the code as it is so margin and padding can't be set. However, you can use own HTML code for the block.

**Please note** that Preview window uses also Header and Footer code.

Check <a href="https://wordpress.org/plugins/ad-inserter/screenshots/">screenshots</a> for explanation on alignment.

**CACHING**

Keep in mind that just installing a caching plugin does not necessarily make your site faster. Doing a bit of optimization will get you a lot of speed increase without caching plugins.
To further combat slowness you may want to re-evaluate the performance of your hosting package. Maybe you've outgrown it. In that case, upgrade to a better hosting solution.

Caching on the frontend side (what visitors see) in some cases does speed up page loading but may also cause some unwanted behavior.
When you are using caching and visitor visits some page, Wordpress creates that page, Ad Inseter is called to do the job, the created page is sent to the visitor and it is also saved for quicker serving later.
The next time the page is visited **the visitor gets cached (saved) page**. Because of this some Ad Inserter functions can not work because Ad Inserter is not called when the page is cached:

*   Server-side block rotation with |rotate|
*   User check
*   Server-side device detection
*   Referer check
*   Server-side GEO targeting (country detection, Pro only)
*   Server-side IP address detection (Pro only)
*   Debugging functions

When you need the functions listed above you have to switch off caching (if possible only on selected pages where needed).

However, Ad Inserter also supports some of the functions above even when caching is enabled:

*   Client-side ad rotation with |rotate|
*   Client-side device detection
*   Client-side GEO targeting (country detection, Pro only)
*   Client-side IP address detection (Pro only)

All you have to do is to set enable and use client-side functions (executed in the visitor's browser). But you have to be careful as some adverts might not work properly or can't be used this way and you might violate their Terms of Service.

PLEASE NOTE: If you are using W3 Total Cache for caching then you can still use server-side ad rotation, IP address and country detection even when the pages are cached as Ad Inserter supports special features of this caching plugin.

**W3 Total Cache**

If you are using W3 Total Cache for caching then you can still use server-side ad rotation, IP address and country detection even when the pages are cached as Ad Inserter supports special features of this caching plugin.
To enable this mode go to Ad Inserter plugin settings tab * / tab General and set Dynamic blocks to Server-side with W3 Total Cache and configure  W3 Total Cache for dynamic content.

When Dynamic blocks is set to Server-side with W3 Total Cache and you are using ad rotation, IP address or country detection, Ad Inserter inserts short PHP code with special tags in place of code block. When W3 Total Cache plugin loads cached page it executes this code before it serves the pages. So the page is stills served from the cache but the Ad Inserter blocks are dynamically created just before the page is served. Therefore, pages are served from the cache and the Ad Inserter code is still generated on the server-side.

Configure W3 Total Cache

How to fully set up W3 Total Cache is beyond the scope of this page. Check the W3 Total Cache manuals or contact it's developer for help with that if you need it.

*   In General Settings set the Page Caching to Disk: Basic.
*   In Page Cache under Advanced enable Late Initialization.
*   If you use the Minify option add mfunc to the ignored comment stem field.

You need to flush the cache after making these changes.

Please note also the following:

*   Mixing static cached and dynamic content is a tricky thing to do and often causes all kinds of issues. Ad Inserter follows the guidelines from W3 Total Cache on this. If it doesn't work it's very likely you didn't configure W3 Total Cache correctly. Alternatively, you can decide to use client-side option for dynamic blocks - your adverts will show up just fine and rotation and GEO targeting will still work.
*   In order to use dynamic content with W3 Total Cache, W3TC_DYNAMIC_SECURITY PHP constant needs to be defined. Usually it is located in the wp-confing.php file. This is a security string used when generating PHP code for dynamic content. If this constant is not defined, Ad Inserter will define and use it.
*   Do not use debugging functions when caching is activated.
*   When you make changes in settings of the W3 Total Cache purge all caches before you check page.
*   After you activate W3 Total Cache plugin go to General Settings and Save all settings.

**Ad rotation**

To use client-side rotation you have to enable it first. Go to Ad Inserter plugin settings tab * / tab General and set Dynamic blocks to Client-side.

Configure blocks normally and separate different versions with |rotate| tag. When the page will be created and Ad Inserter called, it will generate hidden code for all block versions. When the page will be loaded in the browser, one randomly chosen version of the code will be displayed. For example, to rotate 3 images:

`<img style='height: 400px;' src="http://malsup.github.io/images/p1.jpg">
|rotate|
<img style='height: 400px;' src="http://malsup.github.io/images/p2.jpg">
|rotate|
<img style='height: 400px;' src="http://malsup.github.io/images/p3.jpg">`

Please note the following:

*   Client-side rotation works fine with banners, text ads and many ad networks including Amazon Associates. However, it should not be used with some ad networks including AdSense (hiding ad units is not allowed) because of the method used for client-side rotation: all options are present on the page but are hidden until the page is loaded and one option is made visible. Please check Terms of Service for your ad network.
*   Ad Inserter reserves space for code block based on the height of the first block version. If all the versions have the same height then you won't notice anything. However, if block versions have different heights then it makes sense to define fixed block height with Custom CSS to avoid content jumping when block option with different or initially unknown height is displayed. If the first option is some Javascript based ad (e.g. Amazon widget) you should wrap it with a div and define height, for example `<div style="height: 300px;"> ... </div>`
*   Since the code (block option) is displayed only when the page is loaded, you may notice a very short delay (few 100 ms) before the code (or ad) is displayed.
*   Client-side rotation uses div elements to wrap the code(s). This is not important unless you use No wrapping style.

WARNING: If you are using caching, the inserted code may not appear immediately on the page. Make sure you disable caching when you are testing or debugging.
Some caching plugins like WP Super Cache and W3 Total Cache have an option to disable caching for known (logged in) users.

**DEBUGGING**

Ad Inserter has many debugging functions that can help you to diagnose the problem when you don't see your ads at expected positions.

*   Code preview: click on the Preview button for each code block to see how the ad or code will look like. On the Preview window click on the Highlight button to highlight code. If you don't see the ad displayed here it is very likely that the code is not working properly.
*   Debugger Widget: Place Debugger widget in some widget area to see basic Wordpress page and Ad Inserter data (User status, Page Type, Post ID, Url, Referer, etc). With this widget you can also check saved block settings and client-side viewport name.
*   Debugger Shortcode: Place shortcode [adinserter block="0"] or [adinserter name="Debugger"] into post or static page to see basic Wordpress page and Ad Inserter data

Each post/page has a Wordpress toolbar on the top. Ad Inserter menu (visible only to administrators and can be hidden) item has the following debugging functions:

*   Label Blocks: Each inserted block is labeled with a thin red border and red bar with block number, name and counters. Blocks that use client-side detection and are hidden are shown with blue bar and viewport name - resize the browser to check display for other devices (or screen widths). If you see only red bar then this means that the block with your **code is inserted** but the code doesn't display anything.
*   Show Positions: Enable this function to show available positions for automatic insertion. Displayed positions are based on the theme layout and configured paragraph counting. You can choose between all paragraph tag lists (or counting parameters) used for blocks configured for Before or After paragraph. If you click on the Show Positions menu item you'll see default paragraph positions for p tags.
*   Show HTML tags: Enable this function to see HTML tags used in the post. Use this function to determine post structure in order to configure paragraph counting.
*   Disable insertion: Use this function to temporarily disable insertion of code blocks - everything else on the page will look like the code blocks were processed and inserted.
*   Log Processing: Use this function to log insertion process in order to determine why some code block was not inserted. The log is added as HTML comment at the end of the page - check page source

**WARNING:** Make sure **caching is disabled while debugging**! All debugging functions you enable will be visible only to you!

When browsing other pages on the website debugging settings are temporarily saved (in a cookie). To disable all debugging functions click on the 'Ad Inserter' top menu item in the toolbar (or use `ai-debug=0`)

If you enable **Remote debugging** you can also allow other people using url parameters to see post/page with debugging data. Remote debugging option is located on the Ad Inserter Settings tab - Debugging tab below.
**Remote debugging** enables other, non-logged in users by using url parameters to see Debugger widget and code insertion debugging (blocks, positions, tags, processing).
Enable this option (and disable caching) to allow other people to see Debugger widget, labeled blocks and positions in order to help you to diagnose problems. For logged in administrators debugging via url is always enabled.

Please **support the plugin** if you like it:

*   Write a nice <a href="https://wordpress.org/support/plugin/ad-inserter/reviews/">review</a>
*   <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LHGZEMRTR7WB4">Donate</a>


== Frequently Asked Questions ==

= I have activated Ad Inserter. How can I use it? =

1. After activation, click "Settings / Ad Inserter" to access the settings page
2. Put ad (or any other HTML/Javascript/PHP) code into the ad box
3. Set automatic insertion option
5. Enable at least one page type: Posts, Static pages, Homepage, Category pages, Search Pages, Archive pages (some insertion options don't work on all page types)
4. Save settings


= Settings for widget =

*   Nothing needed, just enter the code and save settings - widget is enabled by default
*   Go to Appearance / Widgets, drag Ad Inserter widget to the sidebar or any other widget position, select code block and click on Save


= Settings for ad before the first paragraph on all posts =

*   Automatic Insertion: Before Paragraph
*   On all Posts checked, other page types unchecked
*   Paragraph number: 1


= Settings for ad before the last paragraph on all posts =

*   Automatic Insertion: Before Paragraph
*   On all Posts checked, other page types unchecked
*   Paragraph number: 1
*   Count: From Bottom


= Settings for contextual Amazon Native Shopping Ads =

*   Automatic Insertion: After Content
*   On all Posts checked, other page types unchecked

Sign in to Amazon Associates, go to Widgets/Widget Source, choose ad type and set parameters.
For titles and search terms use tags. For example, the code below would display amazon products related to the post tags - check documentation for all possible tags.

`<script type="text/javascript">
amzn_assoc_placement = "adunit0";
amzn_assoc_search_bar = "true";
amzn_assoc_tracking_id = "ad-inserter-20";
amzn_assoc_search_bar_position = "top";
amzn_assoc_ad_mode = "search";
amzn_assoc_ad_type = "smart";
amzn_assoc_marketplace = "amazon";
amzn_assoc_region = "US";
amzn_assoc_title = "Search Results from Amazon";
amzn_assoc_default_search_phrase = "{smart_tag}";
amzn_assoc_default_category = "All";
amzn_assoc_linkid = "cf1873f027a57f63cede634cfd444bea";
</script>
<script src="//z-na.amazon-adsystem.com/widgets/onejs?MarketPlace=US"></script>`

Use your own tracking id! Please note `{smart_tag}` as default search phrase. This makes this widget contextual.


= Settings for ad before the second paragraph on all posts, but on the homepage only three ads in the first three post =

*   Automatic Insertion: Before Paragraph
*   On all Posts checked, Homepage checked, other page types unchecked
*   Paragraph number: 2
*   Filter: 1, 2, 3 (in some cases 2, 4, 6 - depends on the theme and needs some testing)


= Settings for ad wrapped with text of the third paragraph on all posts =

*   Automatic Insertion: Before Paragraph
*   On all Posts checked, other page types unchecked
*   Block Alignment and Style: Float Left
*   Paragraph number: 3


= Settings for centered ad in the middle of post paragraphs =

*   Automatic Insertion: Before Paragraph
*   On all Posts checked, other page types unchecked
*   Block Alignment and Style: Center
*   Paragraph number: 0.5


= Settings for ad above post excerpts on the Insurance category page =

*   Automatic Insertion: Before Post
*   Category pages checked, other page types unchecked
*   Click Lists button to display lists
*   Categories: Insurance, White List checked


= Settings for ad above the first and third post excerpts on the homepage =

*   Automatic Insertion: Before Excerpt
*   Homepage checked, other page types unchecked
*   Filter: 1, 3


= Settings for ad above the post excerpts on the Cars tag page =

*   Automatic Insertion: Before Post
*   Archive pages checked, other page types unchecked
*   Click Lists button to display lists
*   Tags: Cars, White List checked


= I wish to show ads side by side but not in the same block. How do I do this? =

Configure block 1 and 2 with ads using:

*   Automatic Insertion: None
*   Block Alignment and Style: No Wrapping
*   Enable shortcode: checked

Configure block 3 with

`[adinserter block="1"]
[adinserter block="2"]`

Use block 3 to insert ads and make sure all 3 blocks are enabled for the same page types (Posts, Pages, Homepage, etc.).


= I use After Content insertion position but the code is inserted after the stuff provided by other plugins. How can I insert directly after post content?

This happens because Ad Inserter processes posts last and therefore "sees" also content added by other plugins.

Try to set Ad Inserter plugin priority to 10 (early processing, Ad Inserter settings - tab *).


= How can I replace deprecated tags {adinserter n} for manual insertion with new ones [adinserter block="n"] in all posts? =

Use <a href="https://wordpress.org/plugins/search-regex/" target="_blank">Search Regex</a> plugin to replace tags in all posts with few clicks. If you are not familiar with regular expressions simply use search and replace text for each code block. Use **Replace** to test replacements and when it works as expected use **Replace & Save**.


= How can I add some text or title (e.g. Advertisement) above the ad? =

If this is a sidebar widget then you can simply name the widget. In other cases you can add title HTML code above ad code. For example:

`<h3>Advertisement</h3>

AD_CODE`

Change title tag according to the theme style.


= I like the plugin. How can I support it? =

*   Write a nice <a href="https://wordpress.org/support/plugin/ad-inserter/reviews/">review</a>
*   <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=LHGZEMRTR7WB4">Donate</a>


= How can I enable/disable ads on specific posts/pages? =

There are two possible approaches.

*   Approach with page/post exceptions - use this one if there are many exceptions:

1. Go to Ad Inserter settings page and define default insertion options for post/page.
2. Enable automatic insertion on posts/pages and choose default display: **On all**, **On all except selected** or **Only on selected**.
3. Go to post/page editor and open **Ad Inserter Exceptions** meta box below.
4. Check default insertion options for wanted code blocks.
5. Set exceptions for this post or page.

*   Approach with code block settings only - use this one if there are only few exceptions:

1. Go to Ad Inserter settings page and define default insertion options for post/page.
2. Enable automatic insertion On all Posts/Pages.
3. Click on Lists, enter url (or space separated urls) for Urls, e.g. `/permalink-url`, and white-list or black-list it.


= I'm using responsive theme. How can I show or hide some ads on mobile devices? =

Select device types (desktop, tablet or phone) for which you need to show ads and enable **only client-side** device detection.


= Which device type detection should I use? =

In most cases you should use ONLY client-side detection. All code blocks are generated, however, they are displayed according to settings and browser's screen width using CSS Media Queries. This works perfectly in responsive designs.


= How can I disable ads for direct visitors? =

Blacklist `#` as referer for visitors that enter web address directly into browser (no referer).
Blacklist `yourdomain.com` as referer for visitors that browse your website yourdomain.com.
To blacklist both enter `yourdomain.com, #`


= How can I disable ads on error 404 page? =

This is disabled by default. Uncheck Error 404 Page checkbox.


= Is there a way to display country flag of the visitor? =

Possible if you are using Ad Inserter Pro. In the header put the following code:

`<link rel='stylesheet' href='/wp-content/plugins/ad-inserter/css/flags.css' type='text/css' media='all' />`

In the code block use the following code for flag

`<span class="flag-icon flag-icon-{country_iso2}" style="width: 400px; height: 300px;"></span>`

Adjust width and height according to your needs. Please not that `{country_iso2}` tag works only server-side - it won't work on cached pages.
Of course, you can also use static code for flags. For example, for United States:

`<span class="flag-icon flag-icon-us" style="width: 400px; height: 300px;"></span>`


= How can I enable or disable ads on group of similar pages? =

If those pages have something in common in the url (page address) then you can block them with url patterns.
Use `*` to define url pattern to whitelist (enable) or blacklist (disable).

1. To filter all urls starting with **/url-start** use `/url-start*`
2. To filter all urls that contain **url-pattern** use `*url-pattern*`
3. To filter all urls ending with **url-end** use `*url-end`

For example, to exclude ads on pages that have /shop/ in url (page address) blacklist the following url: `*/shop/*`

**WARNING:** Separate urls with SPACES.


= How can I put an ad in the middle of the post regardless of the number of paragraphs? =

Put 0.5 as paragraph number. Value between 0 and 1 means relative position in post or page (e.g. 0.3 means paragraph 30% from top or bottom)


= I'd like to rotate my ad codes based on percentage, for example show one ad 75% of the time and another one 25% of the time. Is that possible? =

Yes, simply create block with 4 ads separated with |rotate|: 3 times ad1 and 1 time ad2.


= How can I show different ads to different visitors according to a url query parameter? =

Use Url parameters List to black/white-list certain url parameters. Leave url parameter list empty and set it to Black list to show ads for all url.
You can specify either parameters or parameters with values. For example for url `http://example.com?data=2&customer-id=22&device=0` you can define url parameters '`data, customer-id=22`' to insert ad only for urls where there is `data` parameter and `customer-id` parameter with value 22.
Separate parameters with comma.


= How can I use PHP code for code block? =

Enter PHP code surrounded by PHP tags and check Process PHP.
Example:

`<div style="width: 100%;">
Some HTML/Javascript code
</div>
<?php echo "PHP code by Ad Inserter"; ?>`


= How can I insert post category name into my ad code? =

1. Use {category} in the ad. This will be replaced with the post category name.
2. You can also use

*   {title} - Title of the post
*   {short_title} - Short title (first 3 words) of the post title
*   {category} - Category of the post (or short title if there is no category)
*   {short_category} - First words before "," or "and" of the category of the post (or short title if there is no category)
*   {tag} - The first tag or general tag if the post has no tags (**works only inside posts**)
*   {smart_tag} - Smart selection of post tag in the following order:
  *   If there is no tag then the category is used;
  *   If there is a two-word tag then it is used;
  *   If the first tag is a substring of the second (or vice versa) then the first tag is not taken into account
  *   If the first and second tags are single words then both words are used
  *   First three words of the first tag
  *   General tag
*   {search_query} - Search engine query that brought visitor to your website (supports Google, Yahoo, Bing and Ask search engines), {smart_tag} is used when there is no search query. You need to disable caching to use this tag. Please note that most search queries are now encrypted.
*   {author} - Post author username (**works only inside posts**)
*   {author_name} Post author name (**works only inside posts**)


= How can I rotate few versions of the same ad? =

Enter them into the ad box and separate them with |rotate| (vertical bars around text rotate). Ad Inserter will insert them randomly.
Example:

`ad_code_1
|rotate|
ad_code_2
|rotate|
ad_code_3`


= How can place ads below Read More tag? =

Configure ad block with the following options:

*   Automatic Insertion: After Paragraph
*   Paragraph Number: 1
*   Count only paragraphs that CONTAIN: `<span id="more-`

Check source code of your website for proper "read more" tag.


= How can I insert code block directly into template php file? =

Enable PHP function adinserter for code block and call adinserter function with code block number as parameter.
Example for block 3:

`<?php if (function_exists ('adinserter')) echo adinserter (3); ?>`

This would generate code as defined for the code block number 3.


= Center alignment does not work for some ads! =

Some iframe ads can not be centered using standard approach so some additional code is needed to put them in the middle.
Simply wrap ad code in a div with some style e.g. left padding. Example:

`<div style="padding-left: 200px;">
ad_code
</div>`


= How can I rotate between different alignments so I can test an ad aligned to the right against an ad aligned to the left? =

Set Block Alignment and Style to "No Wrapping" and create manual wrapping around both ads separated with |rotate|:

`<div style="float: left; margin: 0 8px 8px 0;">
AD CODE LEFT
</div>

|rotate|

<div style="float: right; margin: 0 0 8px 8px;">
AD CODE RIGHT
</div>`


== Screenshots ==

1. Settings for one code block (Before post). Up to 16 blocks can be configured (up to 64 in <a href="http://adinserter.pro/" target="_blank">Ad Inserter Pro</a>)
2. Code preview with visual CSS editor
3. Code preview with visual CSS editor - highlighted code
4. Post / Page Ad Inserter Exceptions
5. Some <a href="http://adinserter.pro/" target="_blank">Ad Inserter Pro</a> features: IP address and country lists, Scheduling between dates with fallback
6. Ad Inserter settings
7. Visualization of HTML tags in post
8. Visualization of positions for automatic insertion in post
9. Visualization of inserted block in post
10. Alignment **Left**, **None** - None means default (usually left) aligned ad block with thin margin around
11. Alignment **Right** - Right aligned ad block with thin margin around
12. Alignment **Center** - Center aligned ad block with thin margin around
13. Alignment **No Wrapping** - Default (usually left) aligned ad block **with no margin around**
14. Alignment **Custom CSS** - Ad block with custom CSS (no margin around). You can use it for special effects (border, background, padding, margin, floating, etc.)
15. Alignment **Float Left** - Left aligned ad block with thin margin around wrapped with text on the right
16. Alignment **Float Right** - Right aligned ad block with thin margin around wrapped with text on the left
17. Complete settings for one code block (Before Paragraph)


== Changelog ==

= 2.0.9 =
- Added support for uppercase {country_ISO2} and lowercase {country_iso2} tag (Pro only)
- Removed inclusion of dummy css and js file
- Bug fix: Client-side dynamic blocks were not enabled if not using W3 Total Cache

= 2.0.8 =
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

= 2.0.7 =
- Delayed display moved to Misc group
- Added option for scheduling to insert code only between specified dates (Pro only)
- Added option for Geo targeting (Pro only)
- Few minor bug fixes and cosmetic changes

= 2.0.6 =
- Added support to filter subpages created by the `<!--nextpage-->` tag
- Added option to import block name (Pro only)
- Cookie deleted only when it exists and debugging is disabled
- Few minor bug fixes

= 2.0.5 =
- Cookie created only when debugging is enabled
- Few minor bug fixes

= 2.0.4 =
- Bug fix: Cursor position always at the end of block name
- State of debugging functions saved to cookie
- Few minor bug fixes

= 2.0.3 =
- Debugging functions in admin toolbar available only for administrators
- Added option to hide debugging functions in admin toolbar
- Added shortcode for debugger
- Few minor bug fixes

= 2.0.2 =
- Changed javascript version check to get plugin version from the HTML page
- Added warning if old cached version of CSS file is loaded on the settings page
- Added warning if version query parameter for js/css files is removed due to inappropriate caching

= 2.0.1 =
- Bug fix: Shortcodes called by name were not displayed

= 2.0.0 =
- Redesigned user interface
- Added many debugging tools for easier troubleshooting
- New feature: Code preview tool with visual CSS editor
- New feature: Label inserted blocks
- New feature: Show available positions for automatic insertion
- New feature: Show HTML tags in posts/static pages
- New feature: Log Ad Inserter processing
- Improved loading speed of the settings page
- Improved block insertion processing speed
- Added support to avoid inserion near images, headers and other elements
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

= 1.7.0 =
- Bug fix: Shortcodes did not ignore post/static page exceptions
- Slightly redesigned user interface
- Excerpt/Post number(s) renamed to Filter as it now works on all display positions
- Widget setting removed from Automatic display to Manual display section
- Added support to disable widgets (standalone checkbox in Manual display)
- Added call counter/filter for widgets
- Added support to edit CSS for predefined styles
- Few other minor bug fixes, code improvements and cosmetic changes

= 1.6.7 =
- Bug fix: Block code textarea was not escaped
- Added checks for page types for shortcodes
- Added support for Before/After Post position call counter/filter
- Few minor cosmetic changes

= 1.6.6 =
- Bug fix: Display on Homepage and other blog pages might get disabled - important if you were using PHP function call or shortcode (import of settings from 1.6.4)
- Few minor cosmetic changes
- Requirements changed to WordPress 4.0 or newer
- Added initial support for Pro version

= 1.6.5 =
- Fixed bug: Wrong counting of max insertions
- Change: display position Before Title was renamed to Before Post
- Added support for display position After Post
- Added support for posts with no `<p>` tags (paragraphs separated with \r\n\r\n characters)
- Added support for paragraph processing on homepage, category, archive and search pages
- Added support for custom viewports
- Added support for PHP function call counter
- Added support to disable code block on error 404 pages
- Added support to debug paragraph tags

= 1.6.4 =
- Fixed bug: For shortcodes in posts the url was not checked
- Optimizations for device detection

= 1.6.3 =
- Removed deprecated code (fixes PHP 7 deprecated warnings)
- Added support for paragraphs with div and other HTML tags (h1, h2, h3,...)

= 1.6.2 =
- Removed deprecated code (fixes PHP Fatal error Call to a member function get_display_type)
- Added support to change plugin processing priority

= 1.6.1 =
* Fixed bug: For shortcodes in posts the date was not checked
* Fixed error with some templates "Call to undefined method is_main_query()"
* Added support for minumum number of page/post words for Before/After content display option
* Added support for {author} and {author_name} tags

= 1.6.0 =
* Added support for client-side device detection
* Many code improvements
* Improved plugin processing speed
* Removed support for deprecated tags for manual insertion {adinserter n}
* Few minor bug fixes

= 1.5.8 =
* Fixed notice "Undefined index: adinserter_selected_block_" when saving page or post

= 1.5.7 =
* Fixed notice "has_cap was called with an argument that is deprecated since version 2.0!"
* Few minor bug fixes and code improvements
* Added support to blacklist or whitelist url patterns: /url-start*. *url-pattern*, *url-end
* Added support to define minimum number of words in paragraphs
* Added support to define minimum user role for page/post Ad Inserter exceptions editing
* Added support to limit insertions of individual code blocks
* Added support to filter direct visits (no referer)

= 1.5.6 =
* Fixed Security Vulnerability: Plugin was vulnerable to Cross-Site Scripting (XSS)
* Few bug fixes and code improvements

= 1.5.5 =
* Few bug fixes and code improvements
* Added support to export and import all Ad Inserter settings

= 1.5.4 =
* Many code optimizations and cosmetic changes
* Header and Footer code blocks moved to settings tab (*)
* Added support to process shortcodes of other plugins used in Ad Inserter code blocks
* Added support to white-list or black-list individual urls
* Added support to export and import settings for code blocks
* Added support to specify excerpts for block insertion
* Added support to specify text that must be present when counting paragraphs

= 1.5.3 =
* Fixed Security Vulnerability: Plugin was vulnerable to a combination of CSRF/XSS attacks (credits to Kaustubh Padwad)
* Fixed bug: In some cases deprecated widgets warning reported errors
* Added support to white-list or black-list tags
* Added support for category slugs in category list
* Added support for relative paragraph positions
* Added support for individual code block exceptions on post/page editor page
* Added support for minimum number of words
* Added support to disable syntax highlighting editor (to allow using copy/paste on mobile devices)

= 1.5.2 =
* Fixed bug: Widget titles might be displayed at wrong sidebar positions
* Change: Default code block CSS class name was changed from ad-inserter to code-block to prevent Ad Blockers from blocking Ad Inserter divs
* Added warning message if deprecated widgets are used
* Added support to display blocks on desktop + tablet and desktop + phone devices

= 1.5.1 =
* Few fixes to solve plugin incompatibility issues
* Added support to disable all ads on specific page

= 1.5.0 =
* Added support to display blocks on all, desktop or mobile devices
* Added support for new widgets API - one widget for all code blocks with multiple instances
* Added support to change wrapping code CSS class name
* Fixed bug: Display block N days after post is published was not working properly
* Fixed bug: Display block after paragraph in some cases was not working propery

= 1.4.1 =
* Fixed bug: Code blocks configured as widgets were not displayed properly on widgets admin page

= 1.4.0 =
* Added support to skip paragraphs with specified text
* Added position After paragraph
* Added support for header and footer scripts
* Added support for custom CSS styles
* Added support to display blocks to all, logged in or not logged in users
* Added support for syntax highlighting
* Added support for shortcodes
* Added classes to block wrapping divs
* Few bugs fixed

= 1.3.5 =
* Fixed bug: missing echo for PHP function call example

= 1.3.4 =
* Added option for no code wrapping with div
* Added option to insert block codes from PHP code
* Changed HTML codes to disable display on specific pages
* Selected code block position is preserved after settings are saved
* Manual insertion can be enabled or disabled regardless of primary display setting
* Fixed bug: in some cases Before Title display setting inserted code into RSS feed

= 1.3.3 =
* Added option to insert ads also before or after the excerpt
* Fixed bug: in some cases many errors reported after activating the plugin
* Few minor bugs fixed
* Few minor cosmetic changes

= 1.3.2 =
* Fixed blank settings page caused by incompatibility with some themes or plugins

= 1.3.1 =
* Added option to insert ads also on pages
* Added option to process PHP code
* Few bugs fixed

= 1.3.0 =
* Number of ad slots increased to 16
* New tabbed admin interface
* Ads can be manually inserted also with {adinserter AD_NUMBER} tag
* Fixed bug: only the last ad block set to Before Title was displayed
* Few other minor bugs fixed
* Few cosmetic changes

= 1.2.1 =
* Fixed problem: || in ad code (e.g. asynchronous code for AdSense) causes only part of the code to be inserted (|| to rotate ads is replaced with |rotate|)

= 1.2.0 =
* Fixed bug: manual tags in posts lists were not removed
* Added position Before title
* Added support for minimum number of paragraphs
* Added support for page display options for Widget and Before title positions
* Alignment now works for all display positions

= 1.1.3 =
* Fixed bug for {search_query}: When the tag is empty {smart_tag} is used in all cases
* Few changes in the settings page

= 1.1.2 =
* Fixed error with multisite/network installations

= 1.1.1 =
* Fixed bug in Float Right setting display

= 1.1.0 =
* Added option to manually display individual ads
* Added new ad alignments: left, center, right
* Added {search_query} tag
* Added support for category black list and white list

= 1.0.4 =
* HTML entities for {title} and {short_title} are now decoded
* Added {tag} to display the first tag

= 1.0.3 =
* Fixed bug with rotating ads

= 1.0.2 =
* Added support for rotating ads

= 1.0.1 =
* Added support for different sidebar implementations

= 1.0.0 =
* Initial release


== Upgrade Notice ==

= 2.0.9 =
Bug fix: Client-side dynamic blocks were not enabled if not using W3 Total Cache;
Added support for uppercase and lowercase {country_iso2} tag (Pro only); Removed inclusion of dummy css and js file

= 2.0.8 =
Added support for client-side rotation (works with caching), added support for W3 Total Cache, client-side country detection (works with caching, Pro only),
bug fixed: Code preview did not work if Wordpress was installed in a folder, added flags to country list (Pro only)

= 2.0.7 =
Delayed display moved to Misc group, added option for scheduling to insert code only between specified dates (Pro only),
added option for Geo targeting (Pro only), few minor bug fixes and cosmetic changes

= 2.0.6 =
Added support to filter subpages created by the `<!--nextpage-->` tag, added option to import block name (Pro only),
cookie deleted only when it exists and debugging is disabled, few minor bug fixes

= 2.0.5 =
cookie created only when debugging is enabled, few minor bug fixes

= 2.0.4 =
Bug fix: Cursor position always at the end of block name, state of debugging functions saved to cookie, few minor bug fixes

= 2.0.3 =
Debugging functions in admin toolbar available only for administrators, added option to hide debugging functions in admin toolbar,
Added shortcode for debugger, few minor bug fixes

= 2.0.2 =
Changed javascript version check to get plugin version from the HTML page, added warning if old cached version of CSS file is loaded on the settings page,
added warning if version query parameter for js/css files is removed due to inappropriate caching,

= 2.0.1 =
Bug fix: Shortcodes called by name were not displayed

= 2.0.0 =
Redesigned user interface, added code preview and many debugging tools for easier troubleshooting and many new features
