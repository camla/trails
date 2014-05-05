<?php

function enqueue_theme_scripts() {

    $themeStyle = get_bloginfo('stylesheet_directory') . '/style.css';
    wp_register_style('themeStyle',$themeStyle);
    wp_enqueue_style( 'themeStyle');

	wp_enqueue_script( 'jquery');

	// Masonry
    $respondjs = get_bloginfo('stylesheet_directory') . '/js/respond.min.js';
	wp_register_script('respondjs',$respondjs);
	wp_enqueue_script( 'respondjs');

	// Masonry
    $masonryjs = get_bloginfo('stylesheet_directory') . '/js/jquery.masonry.min.js';
	wp_register_script('masonryjs',$masonryjs);
	wp_enqueue_script( 'masonryjs',array('jquery'));

	// Heights
    $heightsjs = get_bloginfo('stylesheet_directory') . '/js/heights.js';
	wp_register_script('heightsjs',$heightsjs);
	wp_enqueue_script( 'heightsjs',array('jquery'));

	// Media Element
    $mediaStyle = get_bloginfo('stylesheet_directory') . '/mediaelement/mediaelementplayer.css';
    wp_register_style('mediaStyle',$mediaStyle);
    wp_enqueue_style( 'mediaStyle');

    $mediaelementjs = get_bloginfo('stylesheet_directory') . '/mediaelement/mediaelement-and-player.min.js';
	wp_register_script('mediaelementjs',$mediaelementjs);
	wp_enqueue_script( 'mediaelementjs',array('jquery'));

    $mediajs = get_bloginfo('stylesheet_directory') . '/js/media.js';
	wp_register_script('mediajs',$mediajs);
	wp_enqueue_script( 'mediajs',array('jquery','mediaelementjs', 'masonryjs'));



}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function custom_excerpt_more( $more ) {
	$url = get_permalink($post->ID);
	return '... <a href="' . $url . '">more</a>';
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );


?>