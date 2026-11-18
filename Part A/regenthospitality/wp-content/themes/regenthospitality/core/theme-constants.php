<?php

/**
 * REGENT
 *
 * @package REGENT
 * 
 * @since REGENT 1.0
 *
 */

$get_theme = wp_get_theme();

define('REGENT_THEME_NAME', $get_theme);
define('REGENT_THEME_VERSION', '1.0.0');
define('REGENT_THEME_SLUG', 'REGENT');
define('REGENT_PREFIX', 'REGENT_');

define('REGENT_BASE_URL', get_template_directory_uri());
define('REGENT_BASE', wp_normalize_path(get_template_directory()));

define('REGENT_CORE', REGENT_BASE . '/core');
define('REGENT_FUNCTION', REGENT_BASE . '/core/functions');
define('REGENT_ADMIN_DIR', REGENT_CORE . '/admin');

define('REGENT_THEME_ADMIN_URL', REGENT_BASE_URL . '/core/admin');
define('REGENT_THEME_LIBS_URL', REGENT_BASE_URL . '/core/lib');

define('REGENT_ASSEST_URI', REGENT_BASE_URL . '/assets');
define('REGENT_VENDOR', REGENT_BASE_URL . '/assets/vendor');
define('REGENT_JS', REGENT_BASE_URL . '/assets/js');
define('REGENT_CSS', REGENT_BASE_URL . '/assets/css');
define('REGENT_DIST_CSS', REGENT_BASE_URL . '/assets/dist/css');
define('REGENT_IMG', REGENT_BASE_URL . '/assets/images');
define('REGENT_FILE', REGENT_BASE_URL . '/assets/files');
