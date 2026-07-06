import { registerFormatType, toggleFormat } from '@wordpress/rich-text';
import { RichTextToolbarButton } from '@wordpress/block-editor';

const FORMAT_NAME = 'octave/thin-font';

registerFormatType( FORMAT_NAME, {
    title: 'Thin Font',
    tagName: 'span',
    className: 'has-thin-font',
    edit( { isActive, onChange, value } ) {
        return (
            <RichTextToolbarButton
                icon="editor-italic"
                title="Thin Font"
                isActive={ isActive }
                onClick={ () =>
                    onChange( toggleFormat( value, { type: FORMAT_NAME } ) )
                }
            />
        );
    },
} );