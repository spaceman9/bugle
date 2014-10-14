<?php

class Module {

	protected $app;
	protected $config; 

	public function __construct( $app, $config ) {
		$this->app = $app;
		$this->config = $config; 
	}


	public function route() {
		$this->index();
	}


	public function index() {
		
	}


} // class Module
