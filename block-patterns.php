<?php
/**
 * Registers block patterns and categories.
 *
 * @since fse-starter 1.0
 */
if( ! function_exists( 'fse_starter_register_block_patterns' )){
function fse_starter_register_block_patterns() {
	$block_pattern_categories = array(
		'fse-starter-general'		 => array( 'label' => __( 'fse-starter General', 'fse-starter' ) )
	);

	/**
	 * Filters the theme block pattern categories.
	 *
	 * @since fse-starter 1.0
	 *
	 * @param array[] $block_pattern_categories {
	 *	 An associative array of block pattern categories, keyed by category name.
	 *
	 *	 @type array[] $properties {
	 *		 An array of block category properties.
	 *
	 *		 @type string $label A human-readable label for the pattern category.
	 *	 }
	 * }
	 */
	$block_pattern_categories = apply_filters( 'fse_starter_block_pattern_categories', $block_pattern_categories );

	foreach ( $block_pattern_categories as $name => $properties ) {
		if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
		 register_block_pattern_category( $name, $properties );
		}
	}

	$block_patterns = array(
		'home-banner'
		
	);

	/**
	 * Filters the theme block patterns.
	 *
	 * @since fse-starter 1.0
	 *
	 * @param $block_patterns array List of block patterns by name.
	 */
	$block_patterns = apply_filters( 'fse_starter_block_patterns', $block_patterns );

	foreach ( $block_patterns as $block_pattern ) {
		if( !function_exists('register_block_pattern')){
		register_block_pattern(		
			'fse-starter/' . $block_pattern,
			require __DIR__ . '/patterns/' . $block_pattern . '.php'
		);
	 }
	}
 }
}
add_action( 'init', 'fse_starter_register_block_patterns', 9 );


