<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Add_dacsac":
	case "View_dacsac":
	
	case "Ds_dacsac":
	case "Search_dacsac":


    include("admin/modules/Dacsac/Dacsac.php");
    break;

}

?>