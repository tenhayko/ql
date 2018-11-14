<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 


	case "Baocao_vatthe_hungha":
	case "Search_BCvatthe":
	case "Baocao_phivatthe":
	case "Search_BCphivatthe":
	
	case "Baocao_dacsac":
	case "Search_BCdacsac":
	

    include("admin/modules/Baocao/Baocao.php");
    break;

}

?>