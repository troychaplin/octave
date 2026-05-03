<?php
/**
 * Enqueue theme assets and register pattern categories.
 *
 * @package Octave
 */

namespace Octave;

/**
 * Class Enqueues
 */
class Enqueues {

	/**
	 * Initialize the module.
	 */
	public function init(): void {
		add_action( 'after_setup_theme', array( $this, 'setup' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ), 20 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'init', array( $this, 'enqueue_block_styles' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_scripts' ) );
	}

	/**
	 * Set up theme support for editor styles.
	 */
	public function setup(): void {
		add_theme_support( 'editor-styles' );
		add_editor_style( 'assets/css/styles.css' );
		add_editor_style( 'assets/css/editor.css' );

		$blocks_dir = get_theme_file_path( 'assets/css/blocks' );
		foreach ( glob( $blocks_dir . '/*.css' ) ?: array() as $file ) {
			add_editor_style( 'assets/css/blocks/' . basename( $file ) );
		}
	}

	/**
	 * Enqueue the frontend stylesheet with cache-busting.
	 */
	public function enqueue_styles(): void {
		$path    = get_theme_file_path( 'assets/css/styles.css' );
		$version = file_exists( $path ) ? filemtime( $path ) : wp_get_theme()->get( 'Version' );

		wp_enqueue_style(
			'octave-styles',
			get_theme_file_uri( 'assets/css/styles.css' ),
			array(),
			$version
		);
	}

	/**
	 * Enqueue the frontend script when it exists.
	 */
	public function enqueue_scripts(): void {
		$path    = get_theme_file_path( 'assets/js/script.js' );
		$version = file_exists( $path ) ? filemtime( $path ) : wp_get_theme()->get( 'Version' );

		if ( file_exists( $path ) ) {
			wp_enqueue_script(
				'octave-script',
				get_theme_file_uri( 'assets/js/script.js' ),
				array(),
				$version,
				true
			);
		}
	}

	/**
	 * Auto-register block stylesheets from the blocks/ directory.
	 */
	public function enqueue_block_styles(): void {
		$blocks_dir = get_theme_file_path( 'assets/css/blocks' );

		foreach ( glob( $blocks_dir . '/*.css' ) ?: array() as $file ) {
			$filename   = basename( $file, '.css' );
			$block_name = implode( '/', explode( '-', $filename, 2 ) );
			$version    = filemtime( $file );

			wp_enqueue_block_style(
				$block_name,
				array(
					'handle' => 'octave-block-' . $filename,
					'src'    => get_theme_file_uri( 'assets/css/blocks/' . $filename . '.css' ),
					'path'   => $file,
					'deps'   => array( 'octave-styles' ),
					'ver'    => $version,
				)
			);
		}
	}

	/**
	 * Enqueue block editor scripts.
	 */
	public function enqueue_block_scripts(): void {
		$path    = get_theme_file_path( 'assets/js/editor.js' );
		$version = file_exists( $path ) ? filemtime( $path ) : wp_get_theme()->get( 'Version' );

		if ( file_exists( $path ) ) {
			wp_enqueue_script(
				'octave-editor',
				get_theme_file_uri( 'assets/js/editor.js' ),
				array( 'wp-blocks', 'wp-dom-ready', 'wp-element', 'wp-server-side-render' ),
				$version,
				true
			);
		}
	}
}
