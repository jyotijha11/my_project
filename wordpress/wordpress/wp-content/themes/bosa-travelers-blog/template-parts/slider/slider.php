<?php
/**
 * Template part for displaying slider section
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @since Bosa Travelers Blog 1.0.0
 */

if( get_theme_mod( 'main_slider_layout', 'main_slider_two' ) == '' || get_theme_mod( 'main_slider_layout', 'main_slider_two' ) == 'main_slider_one' ){
	get_template_part( 'template-parts/slider/slider', 'one' );
}elseif( get_theme_mod( 'main_slider_layout', 'main_slider_two' ) == 'main_slider_two' ){
	get_template_part( 'template-parts/slider/slider', 'two' );
}