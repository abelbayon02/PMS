<?php
// Online
$dbHost = 'mysql.hostinger.com';
$dbUsername = 'u764488932_dams';
$dbPassword = 'dams2020!';
$dbName = 'u764488932_dams';

// Local
// $dbHost = 'localhost';
// $dbUsername = 'root';
// $dbPassword = '';
// $dbName = 'dams_2020';

date_default_timezone_set('Asia/Manila');
session_start();

@mysql_connect($dbHost,$dbUsername,$dbPassword)or die("Cannot connect to MySQL Server");
@mysql_select_db($dbName)or die("Cannot connect to Database");

include 'myFunctions.php';

/* Include Classes (When needed)*/
spl_autoload_register( function($class)	{
	switch ($class) {
		case 'Projects':
			require_once 'classes/project.class.php';
			break;
		case 'Globals':
			require_once 'classes/global.class.php';
			break;
	}
});