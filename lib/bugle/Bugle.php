<?php

class Bugle extends Module {

	public function index() {

		echo "Bugle";

		// get the data from the db.

		$stmt = $this->app->db->query("SELECT * FROM song;");
		var_dump($stmt);
		$data = $stmt->fetchAll();

		var_dump($data);

		// $this->render(); parent class method.

	}


} // class Bugle

