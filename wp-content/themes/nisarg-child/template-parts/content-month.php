<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>

	<?php nisarg_featured_image_disaplay(); ?>

	


	<div class="entry-content cstm_entry_content">

		

		<div class="home_entry_content_actualites cstm_entry_animation">
				
			<h2>
				<?php
				$title = get_field( "title_1" );

				if( $title ) {
				    echo $title;
				} else {
				    echo 'Les activités du mois !';
				}
				?>
			</h2>

			<header class=" entry-header ">
				<span class="screen-reader-text"><?php the_title();?></span>
					
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nisarg' ),
							'after'  => '</div>',
						) );
					?>

				<div class="entry-meta"></div><!-- .entry-meta -->
			</header><!-- .entry-header -->
			<section>
				
				<?php 
					$date = get_field('date', false, false);
					$the_query = new WP_Query( array( 
					'post_type' => array('culture', 'sport'),
					'post_status' => 'publish',
					'orderby' => array( 'featured_value' => 'DESC', $date => 'DESC' ),
					 ) ); ?>

					<!-- Start The WP Loop -->
					<?php while ( $the_query -> have_posts() ) : 
							$the_query -> the_post(); ?>

					       <!-- Display the post excerpt -->
							<?php $post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
							if ( 'post-excerpt' === $post_display_option ) {
								get_template_part( 'template-parts/content', 'excerpt_month' );
							} else {
								get_template_part( 'template-parts/content', get_post_format() );
							}
							?>
					<?php endwhile; wp_reset_query(); ?>

			</section>
		</div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'nisarg' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->