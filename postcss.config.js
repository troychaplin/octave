import postcssImport from 'postcss-import';
import postcssCustomMedia from 'postcss-custom-media';
import cssnano from 'cssnano';

export default {
  plugins: [
    postcssImport(),  // must be first — resolves @imports before anything else
    postcssCustomMedia(),
    cssnano({ preset: 'default' }),
  ],
};
