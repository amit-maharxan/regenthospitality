<?php

class regent_application_post_type
{

  /**
   * Constructor.
   */
  public function __construct()
  {
    add_action('init', array($this, 'application_init'));
  }

  /**
   * Register a custom post type called "application".
   * @return void
   */
  function application_init()
  {
    $labels = array(
      'name'                  => _x('Application', 'Post type general name', 'regent_application'),
      'singular_name'         => _x('Application', 'Post type singular name', 'regent_application'),
      'menu_name'             => _x('Application', 'Admin Menu text', 'regent_application'),
      'name_admin_bar'        => _x('Application', 'Add New on Toolbar', 'regent_application'),
      'add_new'               => __('Add New', 'regent_application'),
      'add_new_item'          => __('Add New Application', 'regent_application'),
      'new_item'              => __('New Application', 'regent_application'),
      'edit_item'             => __('Edit Application', 'regent_application'),
      'view_item'             => __('View Application', 'regent_application'),
      'all_items'             => __('All Application', 'regent_application'),
      'search_items'          => __('Search Application', 'regent_application'),
      'parent_item_colon'     => __('Parent Application:', 'regent_application'),
      'not_found'             => __('No Application found.', 'regent_application'),
      'not_found_in_trash'    => __('No Application found in Trash.', 'regent_application'),
      'featured_image'        => _x('Application Cover Image', 'Overrides the "Featured Image" phrase for this post type.', 'regent_application'),
      'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type.', 'regent_application'),
      'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type.', 'regent_application'),
      'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type.', 'regent_application'),
    );

    $args = array(
      'labels'               => $labels,
      'public'               => true,
      'publicly_queryable'   => true,
      'show_ui'              => true,
      'show_in_menu'         => true,
      'query_var'            => true,
      'rewrite'              => array('slug' => 'application'),
      'capability_type'      => 'post',
      'has_archive'          => true,
      'hierarchical'         => true,
      'menu_position'        => null,
      'supports'             => array('title', 'editor', 'thumbnail'),
      'menu_icon'          => 'dashicons-screenoptions',
    );

    register_post_type('application', $args);
  }
}
new regent_application_post_type();
