<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 


	case "Export_Baocao_vt":
	case "Export_Baocao_pvt":
	case "Export_Baocao_dacsac":

    include("admin/modules/Baocao/Export.php");
    break;

}

?>