<?php 
include('../core/config.php');

$curdate = getCurrentDate();
$user_id = $_SESSION['user_id'];
$channel_name = $_POST['channel_name'];
$channel_members = $_POST['channel_members'];

$checker = SELECT_DATA("count(*)","tbl_chat_group"," group_name LIKE '%$channel_name%'");

if($checker[0] > 0){
	echo 2;
}else{
	$data = array("group_name" => $channel_name, "user_id" => $user_id, "is_creator" => $user_id, "date_added" => $curdate);

	$query = PMS_INSERT_DATA("tbl_chat_group", $data, "N");
	if($query > 0){
		foreach ($channel_members as $member_id) {
			$data2 = array("group_name" => $channel_name, "user_id" => $member_id, "is_creator" => $user_id, "date_added" => $curdate);
			$query2 = PMS_INSERT_DATA("tbl_chat_group", $data2, "N");
		}
		echo $query2;
	}
}




