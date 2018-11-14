<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Add_slider":
	case "Ds_slider":
	case "Search_slider":


    include("admin/modules/Quanlyslider/Quanlyslider.php");
    break;

}

?>