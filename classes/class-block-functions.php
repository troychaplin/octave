<?php
/**
 * Block-related filters and functions.
 *
 * @package Octave
 */

namespace Octave;

/**
 * Class Block_Functions
 */
class Block_Functions {

    /**
     * Initialize the module.
     */
    public function init(): void {
        add_action( 'init', array( $this, 'register_pattern_categories' ) );
    }

    /**
     * Register a custom block pattern category for the theme.
     */
    public function register_pattern_categories(): void {
        register_block_pattern_category(
            'octave-sections',
            array( 'label' => __( 'Octave Sections', 'octave' ) )
        );
    }
}
