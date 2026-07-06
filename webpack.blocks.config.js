import { fileURLToPath } from 'url';
import { dirname, resolve } from 'path';
import defaultConfig from '@wordpress/scripts/config/webpack.config.js';

const __dirname = dirname( fileURLToPath( import.meta.url ) );

/**
 * Recursively patch postcss-loader in a rules array to disable config file
 * autodiscovery. Required because cosmiconfig@7 (bundled with postcss-loader
 * in @wordpress/scripts) cannot load ESM postcss.config.js files.
 */
function disablePostcssConfigDiscovery( rules ) {
	return rules.map( ( rule ) => {
		if ( rule.oneOf ) {
			return { ...rule, oneOf: disablePostcssConfigDiscovery( rule.oneOf ) };
		}
		if ( ! rule.use ) return rule;
		const use = Array.isArray( rule.use ) ? rule.use : [ rule.use ];
		return {
			...rule,
			use: use.map( ( loader ) => {
				if ( typeof loader !== 'object' || ! loader.loader?.includes( 'postcss-loader' ) ) {
					return loader;
				}
				return {
					...loader,
					options: {
						...loader.options,
						postcssOptions: {
							...( loader.options?.postcssOptions ?? {} ),
							config: false,
						},
					},
				};
			} ),
		};
	} );
}

export default {
	...defaultConfig,
	output: {
		...defaultConfig.output,
		path: resolve( __dirname, 'assets/blocks' ),
	},
	module: {
		...defaultConfig.module,
		rules: [
			// The theme's package.json sets "type": "module", which makes webpack
			// treat block .js files as strict ESM and reject the extensionless
			// relative imports (./edit, ./save) that create-block scaffolds use.
			{
				test: /\.m?jsx?$/,
				resolve: { fullySpecified: false },
			},
			...disablePostcssConfigDiscovery( defaultConfig.module.rules ),
		],
	},
};
