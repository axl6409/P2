=== Same Category Posts ===
Contributors: kometschuh, mkrdip
Donate link: http://mkrdip.me/donate
Tags: similar posts, related posts, related, post list, recent posts, posts, same category
Requires at least: 3.0
Tested up to: 4.9
Stable tag: 1.1.0
License: GPLv2 or later 
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a widget that shows posts from the same category to the current post.

== Description ==

Same Category Posts shows a list of related posts with a same Post Type to the current post. The widget is only shown on single post pages. Forked from [Related Posts Widget](https://wordpress.org/plugins/related-posts-widget).

= Tip Top Press =
We're [Tip Top Press](http://tiptoppress.com/) and create widgets for Wordpress. If you want to know about what we're working on and you are interested in backgrounds then you can read all newes storys on our [blog](http://tiptoppress.com/blog/).

= Features =

* Shows a list of related posts.
* Option which Post Type should be the same (related) to the current post.
* Custom Post Types support.
* Option exclude one or multi categories or terms.
* Option to filter by popular posts (by comment count).
* Option [separate categories](http://tiptoppress.com/new-dynamic-layout-feature-separate-categories/) if more than one is assigned.
* Set how many posts to show (overall and by category).
* Option exclude current post.
* Placeholders in title string (e.g. "There are a lot of %cat%-News." -> "There are a lot of Tech-News.").
* Filter hook for the post titles 'widget_title'.
* Option to show post thumbnail and set width & height.
* Option to [crop thumbnails dimensions with CSS](http://tiptoppress.com/css-image-crop/).
* Option to put thumbnail on top.
* Option to make the widget title link to the category page.
* Option to show/hide the title.
* Option to show the post excerpt and how long (in words).
* Option change excerpt 'more' text.
* Option to show the post date, author and comment count.
* Multiple widgets.

= Placeholder =

In text boxes **%cat%** will replaced with the (first assigned) category name, e.g. "There are a lot of %cat%-News." -> "There are a lot of Tech-News."

And **%cat-all%** will replaced with all assigned category name, e.g. "Special offers for %cat-all%!" -> "Special offers for houses, flats, apartments."

= Contribute =
While using this plugin if you find any bug or any conflict, please submit an issue at 
[Github](https://github.com/DanielFloeter/same-category-posts) (If possible with a pull request). 

== Installation ==

= Automatic installation =

Automatic installation is the easiest option as WordPress handles the file transfers itself and you don’t need to leave your web browser. To do an automatic install of Related Posts Widget, log in to your WordPress dashboard, navigate to the Plugins menu and click Add New.

In the search field type “Same Category Posts” and click Search Plugins. Once you’ve found plugin, you can install it by simply clicking “Install Now”. Then, go to plugins page of WordPress admin activate the plugin. Now, goto the Widgets page of the Appearance section and configure the Related Posts widget.

= Manual installation =

1. Download the plugin.
2. Upload it to the plugins folder of your blog.
3. Goto the Plugins section of the WordPress admin and activate the plugin.
4. Now, goto the Widgets page of the Appearance section and configure the Related Posts widget.

Read more about installting plugins at [WordPress Codex](https://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== Frequently Asked Questions ==

= Post title filter example =
To use the the hook add a filter 'widget_title' in wp-content\Themes\[your-Theme]\functions.php:

function cruise_shortcode_iconship( $html ) {
	return "prefix-" . $html . "-suffix";
}
add_filter( 'widget_title', 'cruise_shortcode_iconship' );

= The feature image dimention are not correctly displayed? =
Enable the option "Use CSS cropping". This option don't care about stored setting (Settings > Media) or added image sizes. [What is 'CSS feature image cropping'](http://tiptoppress.com/css-image-crop/)?

= Excerpt length filter doesn't works =
When a post has no manual excerpt WordPress generates an excerpt automatically by selecting the first 55 words of the post or the first words number setted by the excerpt filter length. This means the excerpt length filter works only with automatic excerpt. If you manually added an excerpt, you'd want it all to be shown.
WordPress Codex: [Excerpt, automatic excerpt, and teaser](http://codex.wordpress.org/Excerpt#Excerpt.2C_automatic_excerpt.2C_and_teaser)

= I want the title as a link pointing to the selected Categorie page? =
Enable the check box "Make widget title link".

= Exclude (-terms) text area =
To multiselect or clear terms in the "exclude"-text area hold CTRL-key + mouse click

== Screenshots ==

1. Option to exclude categories (and terms) and filter by popular posts (by comment count).
2. Front end of the widget using a default WordPress Theme.
3. Option 'Separate categories' (If more than one assigned) will separate and link to all assigned categories.
4. The widget configuration dialog.

== Changelog ==

= 1.1.0 - November 02 2017  =
* Custom Post Type support

= 1.0.12 - June 15 2017  =
* Bugfix for if widget title as a link, there are HTML special characters in the rendered output
* Bugfix for no posts are displayed, if some categories are excluded

= 1.0.11 - May 20 2017  =
* Add a filter hook for the post titles 'widget_title'
* Add option to format the date

= 1.0.10 - January 01 2017  =
* Patch panels do not open

= 1.0.9 - December 31 2016  =
* Add option to exclude multi categories (pull-request from [arielcannal](https://github.com/arielcannal))
* Add panels on the admin sites

= 1.0.8 - Juli 07 2016 =
* Add option seperate categories if more than one is assigned
* Add option change excerpt 'more' text.
* Title show and link to all referenced categories
* Additional placeholder %cat-all% gets (show and link) all referenced categories

= 1.0.7 - June 26 2016 =
* Show all assigned categories

= 1.0.6 - June 05 2016 =
* Added option to show post author

= 1.0.5 - April 02 2016 =
* Added Custom Post Types support

= 1.0.4 - April 02 2016 =
* Add option CSS cropping for thumbnails.

= 1.0.3 =
* Placeholder in title string
* Added Option exclude current post
* CSS class for current post
* Bugfixes

= 1.0.2 =
* Added Option to change ordering of posts
* Added Option to make the widget title link to the category page
* Added Option to put thumbnail on top
* Added Option to show/hide the title
* Fixed no background bug.

= 1.0.1 =
* Option exclude a category.

= 1.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.2 =
* Added some features known from Category Posts Widget.

= 1.0.1 =
* Support question for a option that exclude a certain category.

= 1.0 =
* Designing a new widget, always a problem can be solved in the best possible.

== Upgrade Notice ==

= 1.0.4 =
CSS feature image cropping was added. Read more in our [blog](http://tiptoppress.com/same-category-posts-v1-0-5-gets-css-cropping-feature/).