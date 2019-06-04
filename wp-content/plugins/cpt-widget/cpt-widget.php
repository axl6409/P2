<?php
/*
Plugin Name: CPT WIDGET
Plugin URI: 
Description: Display Custom Post Type in a widget
Version: 1.0
Author: Alexandre Celier
Author URI: http://www.alexandre-celier.com
License: GPL
Text Domain: wp-cpt-widget
Domain Path: /lang

Original Author: Alexandre Celier

Copyright 2016  Alexandre Celier (email : alexandre.celier64@gmail.com)
*/





/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class WP_CPT_Culture extends WP_Widget {

	/**
	 * Sets up a new Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'                   => 'wp-cpt-widget',
			'description'                 => __( 'Display the custom post types in a widget.', 'wp-cpt-widget' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( 'wp-cpt-widget', __( 'Custom Post Type Widget', 'wp-cpt-widget' ), $widget_ops );
		$this->alt_option_name = 'widget_wp_cpt_widget';
	}

	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Custom Post Type' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filters the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 * @since 4.9.0 Added the `$instance` parameter.
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args     An array of arguments used to retrieve the recent posts.
		 * @param array $instance Array of settings for the current widget.
		 */
		$r = new WP_Query(
			apply_filters(
				'widget_posts_args',
				array(
					'post_type'	      	  => 'culture',
					'no_found_rows'       => true,
					'post_status'         => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);

		if ( ! $r->have_posts() ) {
			return;
		}
		?>
		<?php echo $args['before_widget']; ?>
		<?php
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		?>
		<ul>
			<?php foreach ( $r->posts as $recent_post ) : ?>
				<?php
				$post_title = get_the_title( $recent_post->ID );
				$title      = ( ! empty( $post_title ) ) ? $post_title : __( '(no title)' );
				?>
				<li>
					<a href="<?php the_permalink( $recent_post->ID ); ?>"><?php echo $title; ?></a>
					<?php if ( $show_date ) : ?>
						<span class="post-date"><?php echo get_the_date( '', $recent_post->ID ); ?></span>
					<?php endif; ?>
				</li>
			<?php endforeach; ?>
		</ul>
		<?php
		echo $args['after_widget'];
	}

	/**
	 * Handles updating the settings for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            WP_Widget::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	
	public function update( $new_instance, $old_instance ) {
		$instance              = $old_instance;
		$instance['title']     = sanitize_text_field( $new_instance['title'] );
		$instance['number']    = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		return $instance;
	}

	/**
	 * Outputs the settings form for the Recent Posts widget.
	 *
	 * @since 2.8.0
	 *
	 * @param array $instance Current settings.
	 */
	
	public function form( $instance ) {

		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		?>

		<p>
			<label 
				for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?>
			</label>
			
			<input 
				class="widefat" 
				id="<?php echo $this->get_field_id( 'title' ); ?>" 
				name="<?php echo $this->get_field_name( 'title' ); ?>" 
				type="text" 
				value="<?php echo $title; ?>" />
		</p>

		<p>
			<label 
				for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?>
			</label>
			
			<input 
				class="tiny-text" 
				id="<?php echo $this->get_field_id( 'number' ); ?>" 
				name="<?php echo $this->get_field_name( 'number' ); ?>" 
				type="number" step="1" min="1" value="<?php echo $number; ?>" size="3" />
		</p>

		<p>
			<input 
				class="checkbox" type="checkbox"<?php checked( $show_date ); ?> 
				id="<?php echo $this->get_field_id( 'show_date' ); ?>" 
				name="<?php echo $this->get_field_name( 'show_date' ); ?>" />

			<label 
				for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?>
			</label>
		</p>
		
		<?php

			$cpt 		= isset( $instance['cpt'] ) ? esc_attr( $instance['cpt'] ) : '';
			$args_cpt = array(
				'public'   => true,
				'_builtin' => false
			);

			$cpts = get_post_types($args_cpt);
			if (count($cpts)) :
		?>
				<p>
					<label for="<?php echo $this->get_field_id( 'cpt' ); ?>"><?php _e( 'CPT:', 'wp-cpt-widget' ); ?>
					</label>

				<select class="select" id="<?php echo $this->get_field_id( 'cpt' ); ?>" name="<?php echo $this->get_field_name( 'cpt' ); ?>">
					
				<option value=""><?php _e('Choice an option...', 'wp-cpt-widget'); ?></option>

		<?php
				foreach ($cpts as $posttype) {
					$selected = false;
					if ($posttype == $cpt)
						$selected = true;
		?>
					<option value="<?php echo $posttype; ?>" <?php echo $selected ? "selected" : ""; ?>><?php echo $posttype; ?></option>
		<?php
				}
		?>
				</select>
		<?php
			endif;
	}
}



// register BWP_CPT_Widget
function register_wp_cpt_widget() {
	register_widget( 'WP_CPT_Culture' );
}

// Start the widget
add_action( 'widgets_init', 'register_wp_cpt_widget' );