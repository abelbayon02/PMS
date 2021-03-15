<?php 
function checkSession(){
	if(!isset($_SESSION['user_id'])){
	header("Location: ../login.php");
	}
}
function getCurrentDate(){
	ini_set('date.timezone','UTC');
	date_default_timezone_set('UTC');
	$today = date('H:i:s');
	$date = date('Y-m-d H:i:s', strtotime($today)+28800);
	
	return $date;
}

function clean($str) {
    $str = @trim($str);
    if(get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }
    return mysql_real_escape_string($str);
}
function SELECT_DATA($type , $table , $params=''){
    $inject = ($params == '')?"":" WHERE $params";
	$select_query = mysql_query("SELECT $type FROM $table $inject")or die(mysql_error());
	$fetch = mysql_fetch_array($select_query);
	return $fetch;

}
function SELECT_LOOP_DATA($type , $table , $params = ''){
    $inject = ($params=='')?"":"WHERE $params";
    $fetch = mysql_query("SELECT $type FROM $table $inject")or die(mysql_error());
    while ($row = mysql_fetch_array($fetch)) {
        $data[] = $row;
    }
    return $data;
}
function PMS_INSERT_DATA($table_name, $form_data , $last_id){
    $fields = array_keys($form_data);

    $sql = "INSERT INTO ".$table_name."
    (`".implode('`,`', $fields)."`)
    VALUES('".implode("','", $form_data)."')";

    $return_insert = mysql_query($sql)or die(mysql_error());
    $lastID = mysql_insert_id();

    if($last_id == 'Y'){
        if($return_insert){
            $val = $lastID;
        }else{
            $val = 0;
        }
    }else{
        if($return_insert){
            $val = 1;
        }else{
            $val = 0;
        }
    }

    return $val;
}

function PMS_DELETE_QUERY($table_name, $where_clause=''){
    $whereSQL = '';
    if(!empty($where_clause)){
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE'){
            $whereSQL = " WHERE ".$where_clause;
        }else{
            $whereSQL = " ".trim($where_clause);
        }
    }
    $sql = "DELETE FROM ".$table_name.$whereSQL;
    
    $return_delete = mysql_query($sql);
    
    if($return_delete){
    	echo 1;
    }else{
    	echo 0;
    }
}

function PMS_UPDATE_QUERY($table_name, $form_data, $where_clause=''){
    $whereSQL = '';
    if(!empty($where_clause)){
        if(substr(strtoupper(trim($where_clause)), 0, 5) != 'WHERE'){
            $whereSQL = " WHERE ".$where_clause;
        }else{
            $whereSQL = " ".trim($where_clause);
        }
    }
    $sql = "UPDATE ".$table_name." SET ";
    $sets = array();
    foreach($form_data as $column => $value)
    {
         $sets[] = "`".$column."` = '".$value."'";
    }
    $sql .= implode(', ', $sets);
    $sql .= $whereSQL;

    $return_query = mysql_query($sql);
    if($return_query){
    	echo 1;
    }else{
    	echo 0;
    }
}
function getUserFullname($user_id){
    $getfullname = SELECT_DATA("fullname","tbl_users"," user_id = $user_id");

    return $getfullname[0];
}
function getAllActiveUsers(){
    $data = "<option value=''>&mdash; Please select your members &mdash; </option>";
    $users = SELECT_LOOP_DATA("*","tbl_users"," user_access != 'SA'");
    foreach ($users as $user_details) {
       $data .= "<option value='".$user_details['user_id']."'>".$user_details['fullname']."</option>";
    }

    return $data;
}
function CHANNELMEMBERS($user_id){
    $data = "<option value=''>&mdash; Please select your members &mdash; </option>";
    $users = SELECT_LOOP_DATA("*","tbl_users"," user_access != 'SA' AND user_id != '$user_id'");
    foreach ($users as $user_details) {
       $data .= "<option value='".$user_details['user_id']."'>".$user_details['fullname']."</option>";
    }

    return $data;
}
function chatFooter($user_id){
    $data = "";
    $user = SELECT_DATA("*","tbl_users"," user_id = '$user_id'");

    $avatar = ($user['avatar'] != '')?"../assets/images/no_img.jpg":"../assets/images/no_img.jpg";

    $data .= '<a class="chat-avatar" href="#javascript:;">';
        $data .= '<img alt="" src="'.$avatar.'">';
    $data .= '</a>';
    $data .= '<div class="user-status">';
        $data .= '<i class="fa fa-circle text-success"></i>';
        $data .= 'Available';
    $data .= '</div>';

    return $data;
    
}
?>