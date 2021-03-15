<?php 
include('../core/config.php');

$new_fullname = $_POST['fullname'];
$new_email = $_POST['new_email'];
$login_username = $_POST['login_username'];
$login_password = $_POST['login_password'];

$md5Password = md5($login_password);

$data = array("fullname" => $new_fullname, "username" => $login_username, "email_address" => $new_email, "password" => $md5Password, "avatar" => "", "user_access" => "U", "user_status" => 0);

$query = PMS_INSERT_DATA("tbl_users", $data, "N");

echo $query;