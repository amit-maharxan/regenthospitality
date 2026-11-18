<?php

/**
 * Template Name: Homepage Layout
 */

do_action('regent_header'); ?>

	<?php
    /**
     * regent_homepage_content hook
     *
     */
    do_action('regent_homepage_content');
    ?>

<?php do_action('regent_footer'); ?>