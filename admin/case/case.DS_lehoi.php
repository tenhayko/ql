<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	
	case "DS_lehoi":
	case "Search_Ds_lehoi":
	case "Add_lehoi":
	case "Check_xa_lehoi":
	case "Check_thon_lehoi":
	case "Impor_lehoi":
	

    include("admin/modules/Hungha/DS_lehoi.php");
    break;

}

?>