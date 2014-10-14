<?php 

class Database extends PDO {

	public function __construct( $app, $config ) {
		echo "DB Connect";
		parent::__construct( $config['dsn'] );

	}

	

}
