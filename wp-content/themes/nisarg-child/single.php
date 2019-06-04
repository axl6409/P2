<?php
/**
 * The template for displaying all single posts.
 * Template pour afficher les articles
 * @package Nisarg
 */

get_header(); ?>

	<div class="container">
		<div class="row">
			<div id="primary" class="col-md-12 content-area">
				<main id="main" role="main">

				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'template-parts/content',get_post_format() ); ?>
				</main><!-- #main -->
				<div class="post-navigation">
					<?php nisarg_post_navigation(); ?>
				</div>
				
				<?php endwhile; // End of the loop. ?>
			</div><!-- #primary -->

		</div> <!--.row-->
	</div><!--.container-->
	<?php get_footer(); ?>
