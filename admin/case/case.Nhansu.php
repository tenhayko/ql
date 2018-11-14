<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "HS_Nhansu":
	
	case "DS_Nhansu":
	
	case "Ds_canbo_search":
	
	

	case "Chucvu":
	
	
	case "BH_hs":
	
	case "Ds_canbo":
	
	
	
	

    include("admin/modules/Canbo/Hoso.php");
    break;

}

?>