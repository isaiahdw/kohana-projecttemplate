<?php defined('SYSPATH') or die('No direct script access.');

return array
(
	'save_path' => APPPATH.'cache',
	'native' => array
	(
		// @TODO change this to be project-specific
		'name' => 'project_template',
	),
	'database' => array
	(
		'group' => 'default',
		'table' => 'sessions',
	),
	'cookie' => array
	(
		'encrypted' => TRUE,
	),
);