<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Ds_Xephang_ditich":
	case "Search_DS_Xephang":
	case "DS_lehoi":
	case "Search_Ds_lehoi":
	case "Add_lehoi":
	
	

    include("admin/modules/Hungha/DS_Xephang.php");
    break;

}

?>