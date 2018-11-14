<?php
if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
    case "Dictionary":
    case "indexDictionary":
	case "AddDictionary":
	case "DeleteDictionary":
	case "DeleteAllDictionary":
	case "OrderDictionary":
	case "TemplateAdmin":
	case "UpdateTemplate":
	case "Thaisan":

    include("admin/modules/dictionary.php");

    break;

}

?>
