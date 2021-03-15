<?php
include('../core/config.php');
$user_id = $_SESSION['user_id'];
$status_data = array("user_status" => 0);
PMS_UPDATE_QUERY("tbl_users",$status_data," WHERE user_id = '$user_id'");
unset($user_id);
session_destroy();

header("Location: ../index.php")
?>