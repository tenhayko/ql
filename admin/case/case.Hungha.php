<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Add_vatthe_hungha":
	case "Ds_vatthe_hungha":
	
	case "Sub_xahuyen_hungha":
	case "Search_vatthe_hungha":
	case "Add_vatthe_img_hungha":
	case "Submit_vatthe_img_hungha":
	case "View_vatthe_hungha":
	case "Add_vatthe_img_popup_hungha":
	case "Submit_vatthe_img_popup_hungha":
	case "Add_vatthe_imgs_hungha":
	case "Add_vatthe_video_hungha":
	case "Import_execel_ds":
	case "Get_excel":
	case "Delete_dinhkem_cv":
	
	case "Xephang_ditich":
	
	

    include("admin/modules/Hungha/Vatthe_hungha.php");
    break;

}

?>