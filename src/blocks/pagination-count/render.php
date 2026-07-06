<?php
/**
 * Render the Pagination Count block.
 *
 * @package Octave
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

if ( ! isset( $block->context['query'] ) ) {
	return;
}

$page_key     = isset( $block->context['queryId'] )
	? 'query-' . $block->context['queryId'] . '-page'
	: 'query-page';
$current_page = empty( $_GET[ $page_key ] ) ? 1 : (int) $_GET[ $page_key ]; // phpcs:ignore WordPress.Security.NonceVerification.Recommended

if ( ! empty( $block->context['query']['inherit'] ) ) {
	global $wp_query;
	$max_pages = (int) $wp_query->max_num_pages;
} else {
	$custom_query = new WP_Query( build_query_vars_from_query_block( $block, $current_page ) );
	$max_pages    = (int) $custom_query->max_num_pages;
	wp_reset_postdata();
}

if ( $max_pages < 2 ) {
	return;
}

$format = isset( $attributes['format'] ) && '' !== $attributes['format']
	? $attributes['format']
	/* translators: 1: current page number, 2: total number of pages. */
	: __( 'Page %1$s of %2$s', 'octave' );
?>
<span <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php printf( esc_html( $format ), $current_page, $max_pages ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
