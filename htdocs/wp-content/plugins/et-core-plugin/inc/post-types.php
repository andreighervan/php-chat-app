<?php 

class ET_Theme_Post_Types {

	public $domain = 'xstore-core';

	public function init() {
		add_action('init', array($this, 'register_post_types'), 1);
	}

	public function register_post_types() {

		// **********************************************************************// 
		// ! Static Blocks Post Type
		// **********************************************************************// 

        $static_blocks_labels = array(
            'name' => _x( 'Static Blocks', 'post type general name', $this->domain ),
            'singular_name' => _x( 'Block', 'post type singular name', $this->domain ),
            'add_new' => _x( 'Add New', 'static block', $this->domain ),
            'add_new_item' => sprintf( __( 'Add New %s', $this->domain ), __( 'Static Blocks', $this->domain ) ),
            'edit_item' => sprintf( __( 'Edit %s', $this->domain ), __( 'Static Blocks', $this->domain ) ),
            'new_item' => sprintf( __( 'New %s', $this->domain ), __( 'Static Blocks', $this->domain ) ),
            'all_items' => sprintf( __( 'All %s', $this->domain ), __( 'Static Blocks', $this->domain ) ),
            'view_item' => sprintf( __( 'View %s', $this->domain ), __( 'Static Blocks', $this->domain ) ),
            'search_items' => sprintf( __( 'Search %a', $this->domain ), __( 'Static Blocks', $this->domain ) ),
            'not_found' =>  sprintf( __( 'No %s Found', $this->domain ), __( 'Static Blocks', $this->domain ) ),
            'not_found_in_trash' => sprintf( __( 'No %s Found In Trash', $this->domain ), __( 'Static Blocks', $this->domain ) ),
            'parent_item_colon' => '',
            'menu_name' => __( 'Static Blocks', $this->domain )

        );

        $static_blocks_args = array(
            'labels' => $static_blocks_labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'staticblocks' ),
            'capability_type' => 'post',
            'has_archive' => 'staticblocks',
            'hierarchical' => false,
            'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'menu_icon' => 'dashicons-welcome-widgets-menus',
            'menu_position' => 8
        );

        register_post_type( 'staticblocks', $static_blocks_args );

		
		// **********************************************************************// 
		// ! Portfolio Post Type
		// **********************************************************************// 

		$portfolio_labels = array(
			'name' => _x('Projects', 'post type general name', $this->domain),
			'singular_name' => _x('Project', 'post type singular name', $this->domain),
			'add_new' => _x('Add New', 'project', $this->domain),
			'add_new_item' => __('Add New Project', $this->domain),
			'edit_item' => __('Edit Project', $this->domain),
			'new_item' => __('New Project', $this->domain),
			'view_item' => __('View Project', $this->domain),
			'search_items' => __('Search Projects', $this->domain),
			'not_found' =>  __('No projects found', $this->domain),
			'not_found_in_trash' => __('No projects found in Trash', $this->domain),
			'parent_item_colon' => '',
			'menu_name' => 'Portfolio'
		
		);
		
		$portfolio_args = array(
			'labels' => $portfolio_labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'capability_type' => 'post',
			'has_archive' => false,
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','author','thumbnail','excerpt','comments'),
			'menu_icon' => 'dashicons-images-alt2',
			'rewrite' => array('slug' => 'project')
		);
		
		register_post_type('etheme_portfolio',$portfolio_args);

		
		$tags_labels = array(
			'name' => _x( 'Tags', 'taxonomy general name', $this->domain ),
			'singular_name' => _x( 'Tag', 'taxonomy singular name', $this->domain ),
			'search_items' =>  __( 'Search Types', $this->domain ),
			'all_items' => __( 'All Tags', $this->domain ),
			'parent_item' => __( 'Parent Tag', $this->domain ),
			'parent_item_colon' => __( 'Parent Tag:', $this->domain ),
			'edit_item' => __( 'Edit Tags', $this->domain ),
			'update_item' => __( 'Update Tag', $this->domain ),
			'add_new_item' => __( 'Add New Tag', $this->domain ),
			'new_item_name' => __( 'New Tag Name', $this->domain ),
		);
		
		$categ_labels = array(
			'name' => _x( 'Portfolio Categories', 'taxonomy general name', $this->domain ),
			'singular_name' => _x( 'Portfolio Category', 'taxonomy singular name', $this->domain ),
			'search_items' =>  __( 'Search Types', $this->domain ),
			'all_items' => __( 'All Categories', $this->domain ),
			'parent_item' => __( 'Parent Category', $this->domain ),
			'parent_item_colon' => __( 'Parent Category:', $this->domain ),
			'edit_item' => __( 'Edit Categories', $this->domain ),
			'update_item' => __( 'Update Category', $this->domain ),
			'add_new_item' => __( 'Add New Category', $this->domain ),
			'new_item_name' => __( 'New Category Name', $this->domain ),
		);
		
		
		register_taxonomy('portfolio_category',array('etheme_portfolio'), array(
			'hierarchical' => true,
			'labels' => $categ_labels,
			'show_ui' => true, 
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'projects_cat' ),
		));
		
		// **********************************************************************// 
		// ! Testimonials Post Type
		// **********************************************************************// 

		$testimonials_labels = array(
			'name' => _x( 'Testimonials', 'post type general name', $this->domain ),
			'singular_name' => _x( 'Testimonial', 'post type singular name', $this->domain ),
			'add_new' => _x( 'Add New', 'testimonial', $this->domain ),
			'add_new_item' => sprintf( __( 'Add New %s', $this->domain ), __( 'Testimonial', $this->domain ) ),
			'edit_item' => sprintf( __( 'Edit %s', $this->domain ), __( 'Testimonial', $this->domain ) ),
			'new_item' => sprintf( __( 'New %s', $this->domain ), __( 'Testimonial', $this->domain ) ),
			'all_items' => sprintf( __( 'All %s', $this->domain ), __( 'Testimonials', $this->domain ) ),
			'view_item' => sprintf( __( 'View %s', $this->domain ), __( 'Testimonial', $this->domain ) ),
			'search_items' => sprintf( __( 'Search %a', $this->domain ), __( 'Testimonials', $this->domain ) ),
			'not_found' =>  sprintf( __( 'No %s Found', $this->domain ), __( 'Testimonials', $this->domain ) ),
			'not_found_in_trash' => sprintf( __( 'No %s Found In Trash', $this->domain ), __( 'Testimonials', $this->domain ) ),
			'parent_item_colon' => '',
			'menu_name' => __( 'Testimonials', $this->domain )

		);

		$testimonials_args = array(
			'labels' => $testimonials_labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'testimonial' ),
			'capability_type' => 'post',
			'has_archive' => 'testimonials',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
			'menu_position' => 5,
			'menu_icon' => 'dashicons-format-status'
		);

		register_post_type( 'testimonials', $testimonials_args );

		$testimonials_cats_labels = array(
			'name'                => sprintf( _x( '%s', 'taxonomy general name', $this->domain ), 'Categories' ),
			'singular_name'       => sprintf( _x( '%s', 'taxonomy singular name', $this->domain ), 'Category' ),
			'search_items'        => sprintf( __( 'Search %s', $this->domain ), 'Categories' ),
			'all_items'           => sprintf( __( 'All %s', $this->domain ), 'Categories' ),
			'parent_item'         => sprintf( __( 'Parent %s', $this->domain ), 'Category' ),
			'parent_item_colon'   => sprintf( __( 'Parent %s:', $this->domain ), 'Category' ),
			'edit_item'           => sprintf( __( 'Edit %s', $this->domain ), 'Category' ),
			'update_item'         => sprintf( __( 'Update %s', $this->domain ), 'Category' ),
			'add_new_item'        => sprintf( __( 'Add New %s', $this->domain ), 'Category'),
			'new_item_name'       => sprintf( __( 'New %s Name', $this->domain ), 'Category' ),
			'menu_name'           => sprintf( __( '%s', $this->domain ), 'Categories' )
		);
		
		$testimonials_cats_args = array( 
			'labels' => $testimonials_cats_labels, 
			'public' => true, 
			'hierarchical' => true, 
			'show_ui' => true, 
			'show_admin_column' => true,
			'query_var' => true, 
			'show_in_nav_menus' => false, 
			'show_tagcloud' => false 
		);

		register_taxonomy( 'testimonial-category', 'testimonials', $testimonials_cats_args );


		$labels = array(
			'name'              => esc_html__( 'Brands', 'xstore' ),
			'singular_name'     => esc_html__( 'Brand', 'xstore' ),
			'search_items'      => esc_html__( 'Search Brands', 'xstore' ),
			'all_items'         => esc_html__( 'All Brands', 'xstore' ),
			'parent_item'       => esc_html__( 'Parent Brand', 'xstore' ),
			'parent_item_colon' => esc_html__( 'Parent Brand:', 'xstore' ),
			'edit_item'         => esc_html__( 'Edit Brand', 'xstore' ),
			'update_item'       => esc_html__( 'Update Brand', 'xstore' ),
			'add_new_item'      => esc_html__( 'Add New Brand', 'xstore' ),
			'new_item_name'     => esc_html__( 'New Brand Name', 'xstore' ),
			'menu_name'         => esc_html__( 'Brands', 'xstore' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
            'capabilities'			=> array(
            	'manage_terms' 		=> 'manage_product_terms',
				'edit_terms' 		=> 'edit_product_terms',
				'delete_terms' 		=> 'delete_product_terms',
				'assign_terms' 		=> 'assign_product_terms',
            ),
			'rewrite'           => array( 'slug' => 'brand' ),
		);

		register_taxonomy( 'brand', array( 'product' ), $args );

	}
}

$et_post_types = new ET_Theme_Post_Types();
$et_post_types->init();