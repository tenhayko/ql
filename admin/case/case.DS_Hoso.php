<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "DS_DK_canbo":
	
	case "DS_DK_canbo_search":



    include("admin/modules/Hoso/DS_Hoso.php");
    break;

}

?>