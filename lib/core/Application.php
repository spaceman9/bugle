<?php


class Application {

	private $_config = [];
	private $_module = [];

	public static function run($config) {
		spl_autoload_register('Application::autoLoad');
		$app = new Application();
		$app->_config = include($config);
		$app->loadModule('core');
		$app->route();

	}

	public function route() {
		// Get the module, controller, action
		
		$mod = $this->_config['core']['main'];
		$ctl = 'index';
		$act = 'index';

		// Split the path up
		
		// Load the module

		$mod = $this->loadModule($mod);
		$mod->route($ctl,$act);
		

	}

	public function loadModule($name) {

		if( !isset($this->_config[$name]) )
			throw new Exception("Config missing for $name module");

		if( !isset($this->_module[$name]) ) {
			// Load any dependent modules
			if( isset( $this->_config[$name]['load'] ) ) {
				foreach( $this->_config[$name]['load'] as $module ) {
					$this->loadModule($module);
				}
			}

			$class = $this->_config[$name]['class']; 
			include "lib/$name/$class.php";
			$this->_module[$name] = new $class($this,$this->_config[$name]); 
		}

		return $this->_module[$name];

	} // loadModule()


	public static function autoload($class) {
	    $classFile = $_SERVER['DOCUMENT_ROOT'].'/lib/core/'.$class.'.php';
	    if(is_file($classFile)&&!class_exists($class)) include $classFile;
	}

	public function __get( $name ) {
		if( isset($this->_module[$name]) ) {
			return $this->_module[$name];
		}
		throw new Exception("Module $name Not Found");
	}

} // Application
