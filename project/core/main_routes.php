<?php 
switch ($access) {
	case 'dashboard':
		require 'views/dashboard.php';
		break;
	case 'projects':
		require 'views/projects.php';
		break;
	case 'messages':
		require 'views/chat.php';
		break;
	default:
		# code...
		break;
}