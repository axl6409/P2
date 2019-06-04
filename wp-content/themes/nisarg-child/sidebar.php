<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Nisarg
 */
?>
<div id="secondary" class="col-md-12 cstm_sidebar sidebar widget-area" role="complementary">
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
		<aside id="search" class="widget cstm_widget widget_search">
			<?php get_search_form(); ?>
		</aside>
		<aside id="archives" class="widget cstm_widget">
		    <h3 class="widget-title cstm_widget_title"><?php _e( 'Archives', 'nisarg' ); ?></h3>
		    <ul>
		        <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		    </ul>
		</aside>
		<aside id="meta" class="widget cstm_widget">
		    <h3 class="widget-title"><?php _e( 'Meta', 'nisarg' ); ?></h3>
		    <ul>
		        <?php wp_register(); ?>
		        <li><?php wp_loginout(); ?></li>
		        <?php wp_meta(); ?>
		    </ul>
		</aside>
	<?php endif; // end sidebar widget area ?>
</div><!-- #secondary .widget-area -->

