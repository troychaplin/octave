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

$separators = array(
	'of'           => ' ' . __( 'of', 'octave' ) . ' ',
	'slash'        => '/',
	'slash-spaced' => ' / ',
	'dash'         => ' – ',
);

$separator = $separators[ $attributes['numberFormat'] ?? 'of' ] ?? $separators['of'];
$prefix    = $attributes['prefix'] ?? __( 'Page', 'octave' );
$text      = ( '' !== $prefix ? $prefix . ' ' : '' ) . $current_page . $separator . $max_pages;
?>
<span <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( $text ); ?></span>
