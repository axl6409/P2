<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-content' ); ?>>

	<?php nisarg_featured_image_disaplay(); ?>

	<header class=" entry-header cstm_entry_animation">
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


	<div class="entry-content">
			
			<div class="home_entry_content_actualites">
				
				<div class="home_actualites_head">
					<h2>
						<?php
						$actualites = get_field( "actualites" );

						if( $actualites ) {
						    echo $actualites;
						} else {
						    echo 'Actualités';
						}
						?>
					</h2>
					<button class="home_actualites_head_button pulse">
						<a href="https://projets.alexandre-celier.fr/P2/actualites/">Voir tout</a>
					</button>
				</div>
				

				<section>
					
					<?php $the_query = new WP_Query( 'post_per_page=1' ); ?>

					<!-- Start The WP Loop -->
					<?php if ( $the_query -> have_posts() ) : ?>
						<?php $the_query -> the_post(); ?>

						<!-- Display the post excerpt -->
						<?php $post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
						if ( 'post-excerpt' === $post_display_option ) {
							get_template_part( 'template-parts/content', 'excerpt_home' );
						} else {
							get_template_part( 'template-parts/content', get_post_format() );
						}
						?>
						
					<?php endif; wp_reset_query(); ?>

				</section>

			</div>

			<div class="home_activites">
				
				<div class="home_entry_content">
				
					<h2>
						<?php
						$activ_sp = get_field( "activites_sportives" );

						if( $activ_sp ) {
						    echo $activ_sp;
						} else {
						    echo 'empty';
						}
						?>
					</h2>

					<section>
						
						<?php $the_query = new WP_Query( array( 'post_type' => 'sport', 'posts_per_page' => '1' ) ); ?>

						<!-- Start The WP Loop -->
						<?php while ( $the_query -> have_posts() ) : 
								$the_query -> the_post(); ?>

						       <!-- Display the post excerpt -->
								<?php $post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
								if ( 'post-excerpt' === $post_display_option ) {
									get_template_part( 'template-parts/content', 'excerpt_home' );
								} else {
									get_template_part( 'template-parts/content', get_post_format() );
								}
								?>
						<?php endwhile; wp_reset_query(); ?>

					</section>

				</div>

				<div class="home_entry_content">
					
					<h2>
						<?php
						$activ_cl = get_field( "activites_culturelles" );

						if( $activ_cl ) {
						    echo $activ_cl;
						} else {
						    echo 'empty';
						}
						?>
					</h2>

					<section>
						
						<?php $the_query = new WP_Query( array( 'post_type' => 'culture', 'posts_per_page' => '1' ) ); ?>

						<!-- Start The WP Loop -->
						<?php while ( $the_query -> have_posts() ) : 
								$the_query -> the_post(); ?>

						       <!-- Display the post excerpt -->
								<?php $post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
								if ( 'post-excerpt' === $post_display_option ) {
									get_template_part( 'template-parts/content', 'excerpt_home' );
								} else {
									get_template_part( 'template-parts/content', get_post_format() );
								}
								?>
						<?php endwhile; wp_reset_query(); ?>

					</section>

				</div>
				
				
			</div>

			<div class="home_activites_button">
				<button class="home_actualites_head_button">
					<a href="https://projets.alexandre-celier.fr/P2/plus-dinfos/">Voir tout</a>
				</button>
			</div>

			
			<div class="home_month_activites">

				<div class="home_entry_content">
					
					<h2>
						<?php
						$this_month = get_field( "ce_mois-ci" );

						if( $this_month ) {
						    echo $this_month;
						} else {
						    echo 'empty';
						}
						?>
					</h2>

					<section class="home_entry_this_month">
						
						<?php $the_query1 = new WP_Query( array( 
								'post_type' => array( 'culture', 'sport' ), 
								'posts_per_page' => '2' ) ); ?>

						<!-- Start The WP Loop -->
						<?php while ( 
								$the_query1 -> have_posts() ) :

								$the_query1 -> the_post(); ?>

						       <!-- Display the post excerpt -->
								<?php $post_display_option = get_theme_mod( 'post_display_option', 'post-excerpt' );
								if ( 'post-excerpt' === $post_display_option ) {
									get_template_part( 'template-parts/content', 'excerpt_home' );
								} else {
									get_template_part( 'template-parts/content', get_post_format() );
								}
								?>
						<?php endwhile; wp_reset_query(); ?>

					</section>

				</div>

				<div class="home_activites_button">
					<button class="home_actualites_head_button">
						<a href="https://projets.alexandre-celier.fr/P2/activites-du-mois/">Voir tout</a>
					</button>
				</div>
			</div>

			<div class="home_entry_content">
				
				<h2 class="home_entry_contact">
					<?php
					$contact = get_field( "contactez_nous" );

					if( $contact ) {
					    echo $contact;
					} else {
					    echo 'empty';
					}
					?>
				</h2>

				<p class="home_entry_contact">
					<?php $phone = get_field( "telephone" );

					if ($phone) {
						echo $phone;
					} else {
						echo 'empty';
					}
					?>
				</p>

				<p class="home_entry_contact">
					<?php $adresse = get_field( "adresse" );

					if ($adresse) {
						echo $adresse;
					} else {
						echo 'empty';
					}
					?>
				</p>

		</div>


	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'nisarg' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

