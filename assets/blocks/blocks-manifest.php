<?php
// This file is generated. Do not modify it manually.
return array(
	'day-tracker' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'octave/day-tracker',
		'version' => '1.0.0',
		'title' => 'Day Tracker',
		'category' => 'theme',
		'icon' => 'calendar',
		'description' => 'Displays the current day number of the year, with an optional formatted date.',
		'textdomain' => 'octave',
		'attributes' => array(
			'prefix' => array(
				'type' => 'string',
				'default' => 'Day No.'
			),
			'showDate' => array(
				'type' => 'boolean',
				'default' => false
			),
			'dateFormat' => array(
				'type' => 'string',
				'default' => 'j M Y'
			),
			'separator' => array(
				'type' => 'string',
				'default' => ' • '
			)
		),
		'supports' => array(
			'html' => false,
			'typography' => array(
				'fontSize' => true
			),
			'color' => array(
				'text' => true,
				'background' => false
			),
			'spacing' => array(
				'margin' => true
			)
		),
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	),
	'pagination-count' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'octave/pagination-count',
		'version' => '1.0.0',
		'title' => 'Pagination Count',
		'category' => 'theme',
		'icon' => 'admin-page',
		'description' => 'Displays the current page and total page count for a Query Loop.',
		'textdomain' => 'octave',
		'ancestor' => array(
			'core/query'
		),
		'usesContext' => array(
			'queryId',
			'query'
		),
		'attributes' => array(
			'format' => array(
				'type' => 'string',
				'default' => 'Page %1$s of %2$s'
			)
		),
		'supports' => array(
			'html' => false,
			'typography' => array(
				'fontSize' => true
			),
			'color' => array(
				'text' => true,
				'background' => false
			),
			'spacing' => array(
				'margin' => true
			)
		),
		'editorScript' => 'file:./index.js',
		'render' => 'file:./render.php'
	)
);
