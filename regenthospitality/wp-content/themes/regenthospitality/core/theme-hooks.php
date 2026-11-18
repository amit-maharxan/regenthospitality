<?php

/**
 * Regent Template Hooks
 *
 * Action/filter hooks used for Regent functions/templates
 *
 * @package 	Regent
 *
 * @since     	Regent 1.0
 */

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/*==================================================================================================
  Functions
  ==================================================================================================*/

if (!function_exists('regent_output_header')) {
	function regent_output_header()
	{
		get_header();
	}
}

if (!function_exists('regent_output_header_content')) {
	function regent_output_header_content()
	{
		get_template_part('template-parts/header/content', 'header');
	}
}

if (!function_exists('regent_output_footer')) {
	function regent_output_footer()
	{
		get_footer();
	}
}

if (!function_exists('regent_output_footer_content')) {
	function regent_output_footer_content()
	{
		get_template_part('template-parts/footer/content', 'footer');
	}
}

// Regent Homepage Content Hooks
if (!function_exists('regent_homepage_contents')) {
	function regent_homepage_contents()
	{
		get_template_part('template-parts/pages/homepage/page', 'contents');
	}
}

/*==================================================================================================
  Hooks
  ==================================================================================================*/


/**
 * Metas and Links
 * @see  regent_add_meta()
 * @see  regent_add_links()
 */
add_action('regent_meta', 'regent_add_meta');
add_action('regent_links', 'regent_add_links');

/**
 * Header / Footer Content
 * @see regent_output_header_content()
 * @see regent_output_footer_content()
 */
add_action('regent_header_content', 'regent_output_header_content', 10);
add_action('regent_footer_content', 'regent_output_footer_content', 10);

/**
 * Header / Footer  
 */
add_action('regent_header', 'regent_output_header');
add_action('regent_footer', 'regent_output_footer');

/**
 * Homepage Hook
 */
add_action('regent_homepage_content', 'regent_homepage_contents', 10);
