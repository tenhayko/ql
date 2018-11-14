<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Get_list_msg":
	case "Send_list_msg":
	case "Get_message_from_to":
	case "Get_count_msg_unread":
    include("admin/modules/Chat/chat.php");
    break;

}

?>