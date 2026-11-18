<?php

/**
 * Header Template
 * 
 * @package REGENT
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<?php
	/**
	 * regent_meta hook
	 *
	 * @hooked regent_add_meta
	 */
	do_action('regent_meta');

	/**
	 * regent_links hook
	 *
	 * @hooked regent_add_links
	 */
	do_action('regent_links');

	// Keep it for plugins.
	wp_head(); ?>

</head>

<body>
	<div class="topbar">
		<div class="container">
			<span data-i18n="topline">International hospitality internships · Learn, grow, experience</span>
		</div>
	</div>

	<?php

	/**
	 * regent_header_content hook
	 *
	 * @hooked regent_output_header_content()
	 *
	 */
	do_action('regent_header_content');

	?>

	<main id="app">