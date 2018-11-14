<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 


	case "Add_phivatthe":
	
	case "Ds_phivatthe":
	case "Search_phivatthe":
	case "View_phivatthe":
	case "Add_phivatthe_video":
	case "Add_phivatthe_imgs":
	

  


    include("admin/modules/Phivatthe/Phivatthe.php");
    break;

}

?>