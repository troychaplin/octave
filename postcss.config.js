import postcssImport from 'postcss-import';
import postcssNested from 'postcss-nested';
import postcssGlobalData from '@csstools/postcss-global-data';
import postcssCustomMedia from 'postcss-custom-media';
import cssnano from 'cssnano';

export default {
  plugins: [
    postcssImport(),  // must be first — resolves @imports before anything else
    postcssNested(),  // unwraps Sass-style nesting and & selectors
    postcssGlobalData({
      files: [ 'src/css/utils/tokens.css' ], // makes @custom-media definitions available to files processed independently (e.g. block CSS)
    }),
    postcssCustomMedia(),
    cssnano({ preset: 'default' }),
  ],
};
