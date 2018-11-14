<?php

if (!@eregi("admin.php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }

switch($op) {

    case "Add_Xa":
    case "Delete_xaphuong":

    include("admin/modules/Xaphuong/Xaphuong.php");
    break;

}

?>