<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Add_vatthe":
	case "Ds_vatthe":
	
	case "Sub_xahuyen":
	case "Search_vatthe":
	case "Add_vatthe_img":
	case "Submit_vatthe_img":
	case "View_vatthe":
	case "Add_vatthe_img_popup":
	case "Submit_vatthe_img_popup":
	case "Add_vatthe_imgs":
	case "Add_vatthe_video":

    include("admin/modules/Vatthe/Vatthe.php");
    break;

}

?>