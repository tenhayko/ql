<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Detail_khaisinh":
	
	case "Detail_kethon":
	
	case "Detail_nuoicon":
	
	case "Detail_khaitu":
	
	case "Detail_giamho":
	
	case "Detail_chame":
	
	


    include("admin/modules/Xa/Detail_Xa.php");
    break;

}

?>