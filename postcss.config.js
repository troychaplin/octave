import postcssImport from 'postcss-import';
import postcssNested from 'postcss-nested';
import postcssCustomMedia from 'postcss-custom-media';
import cssnano from 'cssnano';

export default {
  plugins: [
    postcssImport(),  // must be first — resolves @imports before anything else
    postcssNested(),  // unwraps Sass-style nesting and & selectors
    postcssCustomMedia(),
    cssnano({ preset: 'default' }),
  ],
};
