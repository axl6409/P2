<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );

if ( !function_exists( 'chld_thm_cfg_parent_css' ) ):
    function chld_thm_cfg_parent_css() {
        wp_enqueue_style( 'chld_thm_cfg_parent', trailingslashit( get_template_directory_uri() ) . 'style.css', array( 'bootstrap','font-awesome' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10 );

// END ENQUEUE PARENT ACTION


// CUSTOM SCRIPTS


function custom_enqueue_script() {
      wp_enqueue_script( 'main', get_bloginfo( 'stylesheet_directory' ) . '/js/main.js', 
      array( 'jquery' ), '', true );
}
add_action( 'wp_enqueue_scripts', 'custom_enqueue_script' );








// CUSTOM EXCERPT LENGHT

function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }



// CUSTOM SIDEBAR

function my_custom_sidebar_1() {
    register_sidebar(
        array(
            'name'              =>  __( 'Sidebar Culture', 'nisarg_child' ),
            'id'                =>  'culture',
            'description'       =>  __( 'Custom Sidebar', 'nisarg_child' ),
            'before-widget'     =>  '<aside id="%1$s" class="widget-content">',
            'after-widget'      =>  '</aside>',
            'before-title'      =>  '<h3 class="widget-title">',
            'after-widget'      =>  '</h3>',

        )
    );
}

add_action( 'widgets_init', 'my_custom_sidebar_1' );

function my_custom_sidebar_2() {
    register_sidebar(
        array(
            'name'              =>  __( 'Sidebar Sports', 'nisarg_child' ),
            'id'                =>  'sports',
            'description'       =>  __( 'Custom Sidebar', 'nisarg_child' ),
            'before-widget'     =>  '<aside id="%1$s" class="widget-content">',
            'after-widget'      =>  '</aside>',
            'before-title'      =>  '<h3 class="widget-title">',
            'after-widget'      =>  '</h3>',

        )
    );
}

add_action( 'widgets_init', 'my_custom_sidebar_2' );


add_filter('acf/format_value/type=textarea', 'do_shortcode');