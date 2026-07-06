<?php
/**
 * Block registration.
 *
 * @package Octave
 */

namespace Octave;

/**
 * Class Register_Blocks
 */
class Register_Blocks {

    private string $build_dir;

    public function __construct() {
        $this->build_dir = get_theme_file_path( 'assets/blocks' );
    }

    /**
     * Initialize the module.
     */
    public function init(): void {
        add_action( 'init', array( $this, 'register_blocks' ) );
    }

    public function register_blocks(): void {
        $manifest = $this->build_dir . '/blocks-manifest.php';

        if ( ! file_exists( $manifest ) ) {
            return;
        }

        if ( function_exists( 'wp_register_block_types_from_metadata_collection' ) ) {
            wp_register_block_types_from_metadata_collection(
                $this->build_dir,
                $manifest
            );
            return;
        }

        // Fallback for WP < 6.7.
        if ( function_exists( 'wp_register_block_metadata_collection' ) ) {
            wp_register_block_metadata_collection(
                $this->build_dir,
                $manifest
            );
        }

        $manifest_data = require $manifest;

        foreach ( array_keys( $manifest_data ) as $block_type ) {
            register_block_type( $this->build_dir . '/' . $block_type );
        }
    }
}
