<?php
/**
 * Render the Day Tracker block.
 *
 * @package Octave
 *
 * @var array    $attributes Block attributes.
 * @var string   $content    Block default content.
 * @var WP_Block $block      Block instance.
 */

// wp_date() respects the site timezone, unlike date().
$day       = (int) wp_date( 'z' ) + 1;
$prefix    = isset( $attributes['prefix'] ) ? $attributes['prefix'] : __( 'Day No.', 'octave' );
$separator = isset( $attributes['separator'] ) ? $attributes['separator'] : __( ' • ', 'octave' );
$show_date = ! empty( $attributes['showDate'] );

$output = sprintf( '%s %d', esc_html( $prefix ), $day );

if ( $show_date ) {
	$format  = ! empty( $attributes['dateFormat'] ) ? $attributes['dateFormat'] : 'j M Y';
	$output .= sprintf( ' %s %s', esc_html( $separator ), esc_html( date_i18n( $format ) ) );
}
?>
<span <?php echo get_block_wrapper_attributes(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?></span>
