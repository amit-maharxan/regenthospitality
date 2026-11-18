<?php

/**
 * REGENT functions and definitions
 *
 * @package REGENT
 * 
 * @since REGENT 1.0
 *
 */

if (! defined('ABSPATH')) {
	exit; // disable direct access 
}

/*
 * Load theme constants
 */
require trailingslashit(get_template_directory()) . 'core/theme-constants.php';

/**
 * Theme setup functions
 */
require_once(REGENT_CORE . '/theme-setup.php');

/**
 * Register widget area and nav.
 */
require_once(REGENT_CORE . '/theme-register.php');

/**
 * Enqueue scripts and styles.
 */
require_once(REGENT_CORE . '/enqueue.php');

/**
 * Theme functions
 */
require_once(REGENT_FUNCTION . '/theme-functions.php');

/**
 * Custom functions that act independently of the theme templates.
 */
require_once(REGENT_FUNCTION . '/extras.php');
require_once(REGENT_FUNCTION . '/ajax-functions.php');

require_once(REGENT_CORE . '/post_types/application.php');
require_once(REGENT_CORE . '/post_types/country.php');
require_once(REGENT_CORE . '/post_types/vacancy.php');

/**
 * Theme Hooks
 */
require_once(REGENT_CORE . '/theme-hooks.php');

/**
 * Aqua Resizer
 */
require_once(REGENT_CORE . '/lib/aq_resizer.php');

/**
 * Customizer additions.
 */
require_once(REGENT_CORE . '/lib/bs4navwalker.php');
