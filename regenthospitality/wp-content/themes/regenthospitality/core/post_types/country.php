<?php

class regent_country_post_type
{

  /**
   * Constructor.
   */
  public function __construct()
  {
    add_action('init', array($this, 'country_init'));
  }

  /**
   * Register a custom post type called "country".
   * @return void
   */
  function country_init()
  {
    $labels = array(
      'name'                  => _x('Country', 'Post type general name', 'regent_country'),
      'singular_name'         => _x('Country', 'Post type singular name', 'regent_country'),
      'menu_name'             => _x('Country', 'Admin Menu text', 'regent_country'),
      'name_admin_bar'        => _x('Country', 'Add New on Toolbar', 'regent_country'),
      'add_new'               => __('Add New', 'regent_country'),
      'add_new_item'          => __('Add New Country', 'regent_country'),
      'new_item'              => __('New Country', 'regent_country'),
      'edit_item'             => __('Edit Country', 'regent_country'),
      'view_item'             => __('View Country', 'regent_country'),
      'all_items'             => __('All Country', 'regent_country'),
      'search_items'          => __('Search Country', 'regent_country'),
      'parent_item_colon'     => __('Parent Country:', 'regent_country'),
      'not_found'             => __('No Country found.', 'regent_country'),
      'not_found_in_trash'    => __('No Country found in Trash.', 'regent_country'),
      'featured_image'        => _x('Country Cover Image', 'Overrides the "Featured Image" phrase for this post type.', 'regent_country'),
      'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type.', 'regent_country'),
      'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type.', 'regent_country'),
      'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type.', 'regent_country'),
    );

    $args = array(
      'labels'               => $labels,
      'public'               => true,
      'publicly_queryable'   => true,
      'show_ui'              => true,
      'show_in_menu'         => true,
      'query_var'            => true,
      'rewrite'              => array('slug' => 'country'),
      'capability_type'      => 'post',
      'has_archive'          => true,
      'hierarchical'         => true,
      'menu_position'        => null,
      'supports'             => array('title', 'editor', 'thumbnail'),
      'menu_icon'          => 'dashicons-screenoptions',
    );

    register_post_type('country', $args);
  }
}
new regent_country_post_type();
