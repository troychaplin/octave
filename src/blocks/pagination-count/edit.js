/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	SelectControl,
	TextControl,
} from '@wordpress/components';

/**
 * Separator for each number format key, mirroring the map in render.php.
 * Option labels show sample output so the user picks by example.
 */
const NUMBER_FORMATS = {
	of: ` ${ __( 'of', 'octave' ) } `,
	slash: '/',
	'slash-spaced': ' / ',
	dash: ' – ',
};

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
	const { prefix, numberFormat } = attributes;

	const separator = NUMBER_FORMATS[ numberFormat ] ?? NUMBER_FORMATS.of;
	const preview = `${ prefix ? `${ prefix } ` : '' }1${ separator }3`;

	return (
		<>
			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'octave' ) }>
					<TextControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={ __( 'Prefix', 'octave' ) }
						value={ prefix }
						onChange={ ( value ) =>
							setAttributes( { prefix: value } )
						}
					/>
					<SelectControl
						__next40pxDefaultSize
						__nextHasNoMarginBottom
						label={ __( 'Number format', 'octave' ) }
						value={ numberFormat }
						options={ Object.entries( NUMBER_FORMATS ).map(
							( [ value, sep ] ) => ( {
								value,
								label: `1${ sep }3`,
							} )
						) }
						onChange={ ( value ) =>
							setAttributes( { numberFormat: value } )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<span { ...useBlockProps() }>{ preview }</span>
		</>
	);
}
