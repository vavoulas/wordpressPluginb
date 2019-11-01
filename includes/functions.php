function cptui_register_my_cpts() {

/**
 * Post Type: Persons.
 */

$labels = array(
    "name" => __( "Persons", "twentyseventeen" ),
    "singular_name" => __( "Person", "twentyseventeen" ),
    "add_new" => __( "Add Person", "twentyseventeen" ),
    "add_new_item" => __( "Add New Person", "twentyseventeen" ),
    "insert_into_item" => __( "insert into page", "twentyseventeen" ),
);

$args = array(
    "label" => __( "Persons", "twentyseventeen" ),
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "delete_with_user" => false,
    "show_in_rest" => true,
    "rest_base" => "wp-contacts",
    "rest_controller_class" => "WP_REST_Posts_Controller",
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "exclude_from_search" => false,
    "capability_type" => "post",
    "map_meta_cap" => true,
    "hierarchical" => false,
    "rewrite" => array( "slug" => "wp-contacts", "with_front" => true ),
    "query_var" => true,
    "supports" => array( "title", "editor", "thumbnail", "custom-fields" ),
);

register_post_type( "wp_contacts", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {

/**
 * Taxonomy: other_items.
 */

$labels = array(
    "name" => __( "other_items", "twentyseventeen" ),
    "singular_name" => __( "other_item", "twentyseventeen" ),
);

$args = array(
    "label" => __( "other_items", "twentyseventeen" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'contacts_category', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "contacts_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    );
register_taxonomy( "contacts_category", array( "wp_contacts" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes' );


function cptui_register_my_taxes_contacts_category() {

/**
 * Taxonomy: other_items.
 */

$labels = array(
    "name" => __( "other_items", "twentyseventeen" ),
    "singular_name" => __( "other_item", "twentyseventeen" ),
);

$args = array(
    "label" => __( "other_items", "twentyseventeen" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => array( 'slug' => 'contacts_category', 'with_front' => true, ),
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "contacts_category",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
    );
register_taxonomy( "contacts_category", array( "wp_contacts" ), $args );
}
add_action( 'init', 'cptui_register_my_taxes_contacts_category' );


if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5d85596452c10',
	'title' => 'Person',
	'fields' => array(
		array(
			'key' => 'field_5d855a1a56232',
			'label' => 'Full Name',
			'name' => 'full_name',
			'type' => 'text',
			'instructions' => 'Give full name',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Full Name',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5d855bc156233',
			'label' => 'Image',
			'name' => 'image',
			'type' => 'image',
			'instructions' => 'upload personal photo',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '50',
				'class' => '',
				'id' => '',
			),
			'return_format' => 'url',
			'preview_size' => 'medium',
			'library' => 'all',
			'min_width' => '',
			'min_height' => '',
			'min_size' => '',
			'max_width' => '',
			'max_height' => '',
			'max_size' => '',
			'mime_types' => '',
		),
		array(
			'key' => 'field_5d855c3556234',
			'label' => 'Position',
			'name' => 'position',
			'type' => 'text',
			'instructions' => 'position in the company',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => 'Position',
			'prepend' => '',
			'append' => '',
			'maxlength' => '',
		),
		array(
			'key' => 'field_5d855ca756235',
			'label' => 'Short Description',
			'name' => 'short_description',
			'type' => 'textarea',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'placeholder' => '',
			'maxlength' => '',
			'rows' => '',
			'new_lines' => 'br',
		),
		array(
			'key' => 'field_5d855cec56236',
			'label' => 'Facebook',
			'name' => 'facebook',
			'type' => 'url',
			'instructions' => 'enter facebook url',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://',
			'placeholder' => 'Facebook link',
		),
		array(
			'key' => 'field_5d855d6656237',
			'label' => 'GitHub',
			'name' => 'github',
			'type' => 'url',
			'instructions' => 'enter Github url',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://',
			'placeholder' => 'Github link',
		),
		array(
			'key' => 'field_5d855dc956238',
			'label' => 'Linkedin',
			'name' => 'linkedin',
			'type' => 'url',
			'instructions' => 'enter Linkedin url',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://',
			'placeholder' => 'Linkedin link',
		),
		array(
			'key' => 'field_5d855df656239',
			'label' => 'Xing',
			'name' => 'xing',
			'type' => 'url',
			'instructions' => 'enter Xing url',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => 'https://',
			'placeholder' => 'Xing link',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'wp_contacts',
			),
		),
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'page',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => true,
	'description' => '',
));

endif;