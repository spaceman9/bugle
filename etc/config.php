<?php 

// main config file.

return [

	'core' => [
		'class'=> 'Core',
		'load' => ['db','bugle'],
		'main' => 'bugle'
	],

	'db' => [
		'class' => 'Database',
		'dsn'   => 'pgsql:dbname=music;user=www-data;password=;'
	],

	'bugle' => [
		'class' => 'Bugle',
	],

];
