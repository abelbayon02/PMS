<?php 
include('../core/config.php');

$email_address = $_POST['new_email'];
$username = $_POST['login_username'];

$check = SELECT_DATA("e_add.ea , u_name.un","(SELECT COUNT(email_address) as ea FROM `tbl_users` WHERE email_address = '$email_address') as e_add, (SELECT COUNT(username) as un FROM tbl_users WHERE username = '$username') as u_name","");

echo $check[0].",".$check[1];