<?php 
/*
	------------------------------------
	|THIS CLASS IF FOR GLOBAL FUNCTIONS|
	------------------------------------
*/

class Globals{
	function __construct()
	{
		$user_id = $_SESSION['user_id'];

		$this->user_id = $user_id;
	}

	public function GET_CHAT_GROUPS()
	{
		$groups = mysql_query("SELECT * FROM `tbl_chat_group` WHERE user_id = '$this->user_id' GROUP BY group_name ORDER BY group_id DESC");
		while($row = mysql_fetch_array($groups)){
			$data[] = array(
					"id" => $row['group_id'],
					"name" => $row['group_name']
					);
		}

		return $data;
	}
	public function GET_DIRECT_MESSAGES_USERS()
	{
		$direct_messages = mysql_query("SELECT * FROM tbl_users WHERE user_access != 'SA' AND user_id != '$this->user_id'");
		while($row = mysql_fetch_array($direct_messages)){
			$data[] = array(
					"id" => $row['user_id'],
					"fullname" => $row['fullname'],
					"status" => $row['user_status']
					);
		}
		return $data;
	}
}