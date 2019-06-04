<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Nisarg
 */
?>
<div id="secondary" class="col-md-12 cstm_sidebar sidebar widget-area" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'sports' ) ) : ?>
		<aside id="search" class="widget cstm_widget widget_search">
			<?php get_search_form(); ?>
		</aside>
		<aside class="widget cstm_widget"></aside>
	<?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->
