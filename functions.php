<?php
/**
 * Octave Block Theme Functions
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Include our bundled autoload if not loaded globally.
if ( file_exists( __DIR__ . '/vendor/autoload.php' ) ) {
	require_once __DIR__ . '/vendor/autoload.php';
}

// Instantiate our modules.
$octave_modules = array(
	new Octave\Enqueues(),
	new Octave\Post_Types(),
);

foreach ( $octave_modules as $octave_module ) {
	$octave_module->init();
}
