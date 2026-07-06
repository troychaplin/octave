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
	ToggleControl,
} from '@wordpress/components';
import { dateI18n } from '@wordpress/date';

/**
 * PHP-style date formats offered in the sidebar. Labels are rendered with
 * today's date so the user picks by example.
 */
const DATE_FORMATS = [ 'j M Y', 'F j, Y', 'l, F j, Y', 'd/m/Y', 'm/d/Y', 'Y-m-d' ];

/**
 * Current day of the year (Jan 1 = 1), matching PHP's date( 'z' ) + 1.
 *
 * @return {number} Day of the year.
 */
function dayOfYear() {
	const now = new Date();
	const startOfYear = Date.UTC( now.getFullYear(), 0, 1 );
	const today = Date.UTC( now.getFullYear(), now.getMonth(), now.getDate() );
	return Math.floor( ( today - startOfYear ) / 86400000 ) + 1;
}

/**
 * The edit function renders a live preview of the day counter using the
 * editor's clock, mirroring the server-side output in render.php.
 *
 * @param {Object}   props               Block props.
 * @param {Object}   props.attributes    Block attributes.
 * @param {Function} props.setAttributes Attribute setter.
 *
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { prefix, showDate, dateFormat, separator } = attributes;

	let preview = `${ prefix } ${ dayOfYear() }`;

	if ( showDate ) {
		preview += ` ${ separator } ${ dateI18n(
			dateFormat || 'j M Y',
			new Date()
		) }`;
	}

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
					<ToggleControl
						__nextHasNoMarginBottom
						label={ __( 'Show date', 'octave' ) }
						checked={ showDate }
						onChange={ ( value ) =>
							setAttributes( { showDate: value } )
						}
					/>
					{ showDate && (
						<>
							<TextControl
								__next40pxDefaultSize
								__nextHasNoMarginBottom
								label={ __( 'Separator', 'octave' ) }
								value={ separator }
								onChange={ ( value ) =>
									setAttributes( { separator: value } )
								}
							/>
							<SelectControl
								__next40pxDefaultSize
								__nextHasNoMarginBottom
								label={ __( 'Date format', 'octave' ) }
								value={ dateFormat }
								options={ DATE_FORMATS.map( ( format ) => ( {
									value: format,
									label: dateI18n( format, new Date() ),
								} ) ) }
								onChange={ ( value ) =>
									setAttributes( { dateFormat: value } )
								}
							/>
						</>
					) }
				</PanelBody>
			</InspectorControls>
			<span { ...useBlockProps() }>{ preview }</span>
		</>
	);
}
