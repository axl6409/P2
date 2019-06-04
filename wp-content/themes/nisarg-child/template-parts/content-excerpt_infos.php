<?php
/**
 * Template part for displaying posts.
 *
 * @package Nisarg
 *
 * Display excerpt on infos page
 */

?>

<article id="post-<?php the_ID(); ?>" class="cstm_post_infos" <?php post_class( 'post-content' ); ?>>

	<?php
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', __( 'Featured', 'nisarg' ) );
	} ?>

	<?php nisarg_featured_image_disaplay(); ?>

	<div class="cstm_post_content">
		
		<header class="entry-header">

			<span class="screen-reader-text"><?php the_title();?></span>

			<?php if ( is_single() ) : ?>
				<!-- Titre principal de la page si l'article est affiché avec single.php -->
				<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php else : ?>
				<!-- Titre secondaire de la page si l'article affiche une prévisualisiation sur une autre page -->
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
				</h2>
			<?php endif; // is_single() ?>

			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<h5 class="entry-date"><?php nisarg_posted_on(); ?></h5>
			</div><!-- .entry-meta -->
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary post_excerpt">
			<?php echo excerpt(25); ?>
		</div><!-- .entry-summary -->

		<footer class="entry-footer">
			<?php nisarg_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	</div>

	
</article><!-- #post-## -->