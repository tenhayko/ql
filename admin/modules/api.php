<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2006 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}
global $prefix, $db, $admin_file, $admin;

/*********************************************************/
	/* Admin/Authors Functions                               */
/*********************************************************/
//====================================================
	function Change_Password_User($admin){
		global $prefix, $db;
		$aid = $admin[0];
		if (isset($_POST['old_password'])&& isset($_POST['new_password']) && $aid) {
			$result = $db->sql_query("SELECT * from " . $prefix . "_authors where aid='" . $aid . "' ");
			$row = $db->sql_fetchrow($result);
			if ($row && $row['pwd'] == md5($_POST['old_password'])) {
		mysql_query("UPDATE  ".$prefix."_authors SET pwd='".md5($_POST['new_password'])."' where aid='".$aid."' ");
				$pwd = md5($_POST['new_password']);
				$admlanguage = addslashes($admlanguage);
				$result = $db->sql_query("SELECT pwd, admlanguage FROM ".$prefix."_authors WHERE aid='".$aid."'");
				$db->sql_query("Update ".$prefix."_authors set status_log='1' WHERE aid='".$aid."'");
				list($rpwd, $admlanguage) = $db->sql_fetchrow($result);
				$admin = base64_encode("$aid:$pwd:$admlanguage");
				setcookie("admin",$admin);
				unset($op);
				echo "Đổi mật khẩu thành công";
			}else{
				echo "Mật khẩu không chính xác";
			}
		}
	}
	switch ($op) {

		case "Change_Password_User":
		Change_Password_User($admin);
		break;
	}

?>