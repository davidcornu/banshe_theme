<?php
	// post thumbnail support
	add_theme_support( 'post-thumbnails' );

	// adds the post thumbnail to the RSS feed
	function cwc_rss_post_thumbnail($content) {
	    global $post;
	    if(has_post_thumbnail($post->ID)) {
	        $content = '<p>' . get_the_post_thumbnail($post->ID) .
	        '</p>' . get_the_content();
	    }
	    return $content;
	}
	add_filter('the_excerpt_rss', 'cwc_rss_post_thumbnail');
	add_filter('the_content_feed', 'cwc_rss_post_thumbnail');

	// adds Post Format support
	// learn more: http://codex.wordpress.org/Post_Formats
	add_theme_support( 'post-formats', array( 'image', 'gallery' ) );

	// removes the WordPress version from your header for security
	function wb_remove_version() {
		return '';
	}
	add_filter('the_generator', 'wb_remove_version');


	// Removes Trackbacks from the comment cout
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count( $count ) {
		if ( ! is_admin() ) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}

	// custom excerpt ellipses for 2.9+
	function custom_excerpt_more($more) {
		return 'Read More &raquo;';
	}
	add_filter('excerpt_more', 'custom_excerpt_more');

	// no more jumping for read more link
	function no_more_jumping($post) {
		return ' <a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
	}
	add_filter('excerpt_more', 'no_more_jumping');

	// category id in body and post class
	function category_id_class($classes) {
		global $post;
		foreach((get_the_category($post->ID)) as $category)
			$classes [] = 'cat-' . $category->cat_ID . '-id';
			return $classes;
	}
	add_filter('post_class', 'category_id_class');
	add_filter('body_class', 'category_id_class');

	// adds a class to the post if there is a thumbnail
	function has_thumb_class($classes) {
		global $post;
		if( has_post_thumbnail($post->ID) ) { $classes[] = 'has_thumb'; }
			return $classes;
	}
	add_filter('post_class', 'has_thumb_class');

	// add_action( 'admin_init', 'theme_options_init' );
	// add_action( 'admin_menu', 'theme_options_add_page' );

	// Init plugin options to white list our options
	// function theme_options_init(){
	// 	register_setting( 'tat_options', 'tat_theme_options', 'theme_options_validate' );
	// }

	// Load up the menu page
	// function theme_options_add_page() {
	// 	add_theme_page( __( 'Theme Options', 'tat_theme' ), __( 'Theme Options', 'tat_theme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
	// }

?>