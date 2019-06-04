<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" class="cstm_entry_animation" <?php post_class( 'post-content' ); ?>>

	<?php nisarg_featured_image_disaplay(); ?>

	<header class="entry-header">
		<span class="screen-reader-text"><?php the_title();?></span>
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta"></div><!-- .entry-meta -->
	</header><!-- .entry-header -->


	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'nisarg' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<div class="iframe">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10557.818658903754!2d7.7499313!3d48.5819927!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe0d9c4df12f29683!2sOffice+de+Tourisme+Strasbourg+et+sa+R%C3%A9gion!5e0!3m2!1sfr!2sfr!4v1558348994894!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'nisarg' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

