<?php 
include('../core/config.php');

$username = $_POST['login_username'];
$password = $_POST['login_password'];

$md5Password = md5($password);

$checker = SELECT_DATA("*","tbl_users","username = '$username' AND password = '$md5Password'");
$user_id = $checker['user_id'];
if(!empty($user_id)){
	$status_data = array("user_status" => 1);
	PMS_UPDATE_QUERY("tbl_users",$status_data," WHERE user_id = '$user_id'");
	$_SESSION['user_id'] = $user_id;
	$_SESSION['user_access'] = $checker['user_access'];
	$_SESSION['user_status'] = $checker['user_status'];

	echo 1;
}else{
	echo 0;
}