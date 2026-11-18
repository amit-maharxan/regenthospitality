<?php

/**
 * REGENT enqueue functions and definitions
 *
 * @package REGENT
 */

if (! defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Enqueue scripts and styles.
 */
function regent_scripts()
{
	wp_enqueue_style('regent-main-css', REGENT_CSS . '/main.css');
	wp_enqueue_style('regent-custom-css', REGENT_CSS . '/custom.css');

	// Enqueue script starts
	// Remove default jQuery.
	wp_deregister_script('jquery');

	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.1.js', array(), 'v3.6.1', false);

	wp_enqueue_script('regent-main-js', REGENT_JS . '/main.js', array('jquery'), 'null', true);
	wp_enqueue_script('regent-custom-js', REGENT_JS . '/custom.js', array('jquery'), 'null', true);
}
add_action('wp_enqueue_scripts', 'regent_scripts');
