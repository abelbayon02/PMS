<?php 
/*
	----------------------------
	|THIS CLASS IF FOR PROJECTS|
	----------------------------
*/

class Projects{
	function __construct()
	{
		$user_id = $_SESSION['user_id'];

		$this->user_id = $user_id;
	}

	public function GET_ALL_PROJECTS()
	{
		$test = $this->user_id;

		return $test;
	}
}