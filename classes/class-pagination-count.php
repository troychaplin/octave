<?php
/**
 * Register the Pagination Status block (PHP-only registration).
 *
 * @package Octave
 */

namespace Octave;

/**
 * Class PaginationCount
 */
class PaginationCount {

    /**
     * Initialize the module.
     */
    public function init(): void {
        add_action( 'init', array( $this, 'register_block' ) );
    }

    /**
     * Register the pagination count block.
     */
    public function register_block(): void {
        register_block_type(
            'octave/pagination-count',
            array(
                'title'           => __( 'Pagination Count', 'octave' ),
                'category'        => 'theme',
                'ancestor'        => array( 'core/query' ),
                'uses_context'    => array( 'queryId', 'query' ),
                'attributes'      => array(
                    'format' => array(
                        'label'   => __( 'Text format', 'octave' ),
                        'type'    => 'string',
                        // %1$s = current page, %2$s = total pages.
                        'default' => __( 'Page %1$s of %2$s', 'octave' ),
                    ),
                ),
                'render_callback' => array( $this, 'render' ),
                'supports'        => array(
                    'autoRegister' => true,
                ),
            )
        );
    }

    /**
     * Render the pagination count block.
     *
     * @param array    $attributes Block attributes.
     * @param string   $content    Block default content.
     * @param \WP_Block $block     Block instance.
     * @return string
     */
    public function render( array $attributes, string $content, \WP_Block $block ): string {
        if ( ! isset( $block->context['query'] ) ) {
            // No query context available (e.g. editor canvas render) — show a placeholder.
            $current_page = 1;
            $max_pages    = 3;
        } else {
            $page_key     = isset( $block->context['queryId'] )
                ? 'query-' . $block->context['queryId'] . '-page'
                : 'query-page';
            $current_page = empty( $_GET[ $page_key ] ) ? 1 : (int) $_GET[ $page_key ]; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

            if ( ! empty( $block->context['query']['inherit'] ) ) {
                global $wp_query;
                $max_pages = (int) $wp_query->max_num_pages;
            } else {
                $custom_query = new \WP_Query( build_query_vars_from_query_block( $block, $current_page ) );
                $max_pages    = (int) $custom_query->max_num_pages;
                wp_reset_postdata();
            }

            if ( $max_pages < 2 ) {
                return '';
            }
        }

        $format = isset( $attributes['format'] ) ? $attributes['format'] : __( 'Page %1$s of %2$s', 'octave' );

        return sprintf(
            '<span class="wp-block-octave-pagination-count">%s</span>',
            sprintf(
                esc_html( $format ),
                $current_page,
                $max_pages
            )
        );
    }
}