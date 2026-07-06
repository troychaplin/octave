/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __, sprintf } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody, TextControl } from '@wordpress/components';

/**
 * The edit function shows a static "Page 1 of 3" preview, since the real page
 * numbers depend on the front-end query context.
 *
 * @param {Object}   props               Block props.
 * @param {Object}   props.attributes    Block attributes.
 * @param {Function} props.setAttributes Attribute setter.
 *
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { format } = attributes;

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'octave' ) }>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={ __( 'Text format', 'octave' ) }
						help={ __(
							'%1$s is the current page, %2$s is the total number of pages.',
							'octave'
						) }
						value={ format }
						onChange={ ( value ) =>
							setAttributes( { format: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<span { ...useBlockProps() }>
				{ sprintf(
					format || __( 'Page %1$s of %2$s', 'octave' ),
					1,
					3
				) }
			</span>
		</>
	);
}
