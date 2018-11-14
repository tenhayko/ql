<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	
	
	case "Add_xahuyen":
	case "Add_xathon":
	case "Ds_thon":
	case "Ds_thon_Search":
	

    include("admin/modules/Cocautochuc/Cocautochuc.php");
    break;

}

?>