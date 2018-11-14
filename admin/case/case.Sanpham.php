<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {
 

	case "Sanpham":
	case "Check_sanpham":
	case "Thanhtoan_sanpham":
	case "Search_Sanpham":
	case "Check_soluong":
	case "Delete_sanpham":
    include("admin/modules/Sanpham/Sanpham.php");
    break;

}

?>