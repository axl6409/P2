<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>

	<?php nisarg_featured_image_disaplay(); ?>

	<section class="infos_the_content cstm_entry_animation">
		<span class="screen-reader-text"><?php the_title();?></span>
			
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nisarg' ),
					'after'  => '</div>',
				) );
			?>
	</section>

	<div class="infos_buttons_categ">	
		<button onclick="javascript:visibilite('Culture'); return false;">Activités Culturelles</button>
		<button onclick="javascript:visibilite('Sports'); return false;">Activités Sportives</button>
	</div>


	<div id="Culture" class="entry-content infos_content">	

		<div class="infos_content_posts">

			<?php get_sidebar( 'culture' ); ?>

			<section>
				
				<?php $the_query = new WP_Query( array( 'post_type' => 'culture' ) ); ?>

					<!-- Start The WP Loop -->
					<?php while ( $the_query -> have_posts() ) : 
							$the_query -> the_post(); ?>

					       <!-- Display the post excerpt -->
							<?php $post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
							if ( 'post-excerpt' === $post_display_option ) {
								get_template_part( 'template-parts/content', 'excerpt_infos' );
							} else {
								get_template_part( 'template-parts/content', get_post_format() );
							}
							?>
					<?php endwhile; wp_reset_query(); ?>

			</section>
		</div>

	</div><!-- .entry-content -->


	<div id="Sports" class="entry-content infos_content">


		<div class="infos_content_posts">

			<?php get_sidebar( 'sports' ); ?>

			<section>
				
				<?php $the_query = new WP_Query( array( 'post_type' => 'sport' ) ); ?>

					<!-- Start The WP Loop -->
					<?php while ( $the_query -> have_posts() ) : 
							$the_query -> the_post(); ?>

					       <!-- Display the post excerpt -->
							<?php $post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
							if ( 'post-excerpt' === $post_display_option ) {
								get_template_part( 'template-parts/content', 'excerpt_infos' );
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