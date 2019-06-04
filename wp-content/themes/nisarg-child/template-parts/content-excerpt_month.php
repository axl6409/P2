<?php
/**
 * Template part for displaying posts.
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" class="cstm_post_main" <?php post_class( 'post-content' ); ?>>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'nisarg' ) );
	} ?>

	<div class="cstm_tab_post_content">
		
		<div class="cstm_tab_title">

			<span class="screen-reader-text"><?php the_title();?></span>

			<?php if ( is_single() ) : ?>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			<?php endif; // is_single() ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<h5 class="entry-date"><?php nisarg_posted_on(); ?></h5>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</div><!-- .entry-header -->

		<div class="cstm_tab_excerpt">
			<?php echo excerpt(25); ?>
		</div><!-- .entry-summary -->

		<div class="cstm_tab_date">
			<?php $date = get_field('date', false, false);

				$date = new DateTime($date);

				echo $date->format('j M Y');
			?>
			
		</div><!-- .entry-summary -->

		<div class="cstm_tab_subscription">
			<?php 
			$shortcode = get_post_meta($post->ID,'shortcode',true);
			echo do_shortcode($shortcode);
			?>
		</div>

	</div>

	
</article><!-- #post-## -->