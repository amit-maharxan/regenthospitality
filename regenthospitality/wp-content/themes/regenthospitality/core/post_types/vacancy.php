<?php

class regent_vacancy_post_type
{

	/**
	 * Constructor.
	 */
	public function __construct()
	{
		add_action('init', array($this, 'vacancy_init'));
	}

	/**
	 * Register a custom post type called "vacancy".
	 * @return void
	 */
	function vacancy_init()
	{
		$labels = array(
			'name'                  => _x('Vacancy', 'Post type general name', 'regent_vacancy'),
			'singular_name'         => _x('Vacancy', 'Post type singular name', 'regent_vacancy'),
			'menu_name'             => _x('Vacancy', 'Admin Menu text', 'regent_vacancy'),
			'name_admin_bar'        => _x('Vacancy', 'Add New on Toolbar', 'regent_vacancy'),
			'add_new'               => __('Add New', 'regent_vacancy'),
			'add_new_item'          => __('Add New Vacancy', 'regent_vacancy'),
			'new_item'              => __('New Vacancy', 'regent_vacancy'),
			'edit_item'             => __('Edit Vacancy', 'regent_vacancy'),
			'view_item'             => __('View Vacancy', 'regent_vacancy'),
			'all_items'             => __('All Vacancy', 'regent_vacancy'),
			'search_items'          => __('Search Vacancy', 'regent_vacancy'),
			'parent_item_colon'     => __('Parent Vacancy:', 'regent_vacancy'),
			'not_found'             => __('No Vacancy found.', 'regent_vacancy'),
			'not_found_in_trash'    => __('No Vacancy found in Trash.', 'regent_vacancy'),
			'featured_image'        => _x('Vacancy Cover Image', 'Overrides the "Featured Image" phrase for this post type.', 'regent_vacancy'),
			'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type.', 'regent_vacancy'),
			'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type.', 'regent_vacancy'),
			'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type.', 'regent_vacancy'),
		);

		$args = array(
			'labels'             	=> $labels,
			'public'             	=> true,
			'publicly_queryable' 	=> true,
			'show_ui'            	=> true,
			'show_in_menu'       	=> true,
			'query_var'          	=> true,
			'rewrite'            	=> array('slug' => 'vacancy'),
			'capability_type'    	=> 'post',
			'has_archive'        	=> true,
			'hierarchical'       	=> true,
			'menu_position'      	=> null,
			'supports'           	=> array('title', 'editor', 'thumbnail', 'excerpt'),
			'menu_icon'      		=> 'dashicons-screenoptions',
		);

		register_post_type('vacancy', $args);
	}
}
new regent_vacancy_post_type();
