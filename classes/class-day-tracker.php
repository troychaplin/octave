<?php

namespace Octave;

class Day_Tracker {

    public function init(): void {
        add_action( 'init', array( $this, 'register_block' ) );
    }

    public function register_block(): void {
        register_block_type(
            'octave/day-tracker',
            array(
                'title'           => __( 'Day Tracker', 'octave' ),
                'category'        => 'theme',
                'attributes'      => array(
                    'prefix'   => array(
                        'type'    => 'string',
                        'default' => __( 'Day No.', 'octave' ),
                    ),
                    'showDate'   => array(
                        'type'    => 'boolean',
                        'default' => false,
                    ),
                    'dateFormat' => array(
                        'type'    => 'string',
                        'default' => 'j M Y',
                    ),
                    'separator'   => array(
                        'type'    => 'string',
                        'default' => __( ' • ', 'octave' ),
                    ),
                ),
                'render_callback' => array( $this, 'render' ),
                'supports'        => array( 'autoRegister' => true ),
            )
        );
    }

    public function render( array $attributes, string $content, \WP_Block $block ): string {
        $day       = (int) date( 'z' ) + 1;
        $prefix    = isset( $attributes['prefix'] ) ? $attributes['prefix'] : __( 'Day No.', 'octave' );
        $separator = isset( $attributes['separator'] ) ? $attributes['separator'] : __( ' • ', 'octave' );
        $show_date = ! empty( $attributes['showDate'] );

        $output = sprintf( '%s %d', esc_html( $prefix ), $day );

        if ( $show_date ) {
            $format  = ! empty( $attributes['dateFormat'] ) ? $attributes['dateFormat'] : 'j M Y';
            $output .= sprintf( ' %s %s', esc_html( $separator ), esc_html( date_i18n( $format ) ) );
        }

        return sprintf( '<span class="wp-block-octave-day-tracker">%s</span>', $output );
    }
}
