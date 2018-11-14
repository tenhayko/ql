<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Print_khaisinh":

    case "Print_khaitu":

    case "Print_kethon":

    case "Print_nuoicon":

    case "Print_giamho":

    case "Print_chame":

    include("admin/modules/Xa/Print_Xa.php");
    break;

}

?>