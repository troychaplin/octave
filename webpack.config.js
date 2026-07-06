import { fileURLToPath } from 'url';
import { dirname, resolve } from 'path';
import defaultConfig from '@wordpress/scripts/config/webpack.config.js';

const __dirname = dirname( fileURLToPath( import.meta.url ) );

export default {
	...defaultConfig,
	entry: {
		script: resolve( __dirname, 'src/script.js' ),
		editor: resolve( __dirname, 'src/editor.js' ),
	},
	output: {
		...defaultConfig.output,
		path: resolve( __dirname, 'assets/js' ),
	},
};
