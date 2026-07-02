<?php
/**
 * Post type support registration.
 *
 * @package Octave
 */

namespace Octave;

/**
 * Class Post_Types
 */
class Post_Types {

	/**
	 * Initialize the module.
	 */
	public function init(): void {
		add_action( 'init', array( $this, 'add_post_type_support' ) );
	}

	/**
	 * Add support for features not enabled by default on core post types.
	 */
	public function add_post_type_support(): void {
		add_post_type_support( 'page', 'excerpt' );
	}
}
