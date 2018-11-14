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

define('ADMIN_FILE', true);
if(isset($aid)) {
  if($aid AND (!isset($admin) OR empty($admin)) AND $op!='login') {
    unset($aid);
    unset($admin);
    die("Access Denied");
  }
}
// Uncomment the following block of code after editing the next line to match your site domain
/*$domainname = "www.yourdomainname.com";
if ($_SERVER['SERVER_NAME'] != $domainname ) {
echo "Access denied";
die();
}*/


require_once("mainfile.php");
$checkurl = $_SERVER['REQUEST_URI'];
if((stripos_clone($checkurl,'AddAuthor')) OR (stripos_clone($checkurl,'VXBkYXRlQXV0aG9y')) OR (stripos_clone($checkurl,'QWRkQXV0aG9y')) OR (stripos_clone($checkurl,'UpdateAuthor')) OR (stripos_clone($checkurl, "?admin")) OR (stripos_clone($checkurl, "&admin"))) {
  //die("Illegal Operation");
}
get_lang("admin");



global $admin_file,$nam_thang;

        //if (isset($aid) && (ereg("[^a-zA-Z0-9_-]",($aid)))) {
       //    die("Begone");
        //}
       // if (isset($aid)) { $aid = substr($aid, 0,25);}
       // if (isset($pwd)) { $pwd = substr($pwd, 0,40);}
        if ((isset($aid)) && (isset($pwd)) && (isset($op)) && ($op == "login")) {
	$datekey = date("F j");
	$rcode = hexdec(md5($_SERVER['HTTP_USER_AGENT'] . $sitekey . $_POST['random_num'] . $datekey));
	$code = substr($rcode, 2, 6);
	if (extension_loaded("gd") AND $code != $_POST['gfx_check'] AND ($gfx_chk == 1 OR $gfx_chk == 5 OR $gfx_chk == 6 OR $gfx_chk == 7)) {
		Header("Location: ".$admin_file.".php");
		die();
	}
	if(!empty($aid) AND !empty($pwd)) {
		if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

		$pwd = md5($pwd);
		$result = $db->sql_query("SELECT pwd, admlanguage FROM ".$prefix."_authors WHERE aid='$aid'");
		list($rpwd, $admlanguage) = $db->sql_fetchrow($result);
		$admlanguage = addslashes($admlanguage);
		if($rpwd == $pwd) {
			$admin = base64_encode("$aid:$pwd:$admlanguage");
			setcookie("admin",$admin);
			unset($op);
			 $nam_thang=$_POST['nam_thang'];
			
			setcookie("nam_thang",$nam_thang);
			$db->sql_query("Update ".$prefix."_authors set status_log='1' WHERE aid='$aid'");
			Header("Location: admin/");
		}else{
			Header("Location: admin/index.php?error=1");
		}
	}
}

$admintest = 0;

if(isset($admin) && !empty($admin)) {
	$admin = addslashes(base64_decode($admin));
	$admin = explode(":", $admin);
	$aid = addslashes($admin[0]);
	$pwd = $admin[1];
	$admlanguage = $admin[2];
	if (empty($aid) OR empty($pwd)) {
		$admintest=0;
		$alert = "<html>\n";
		$alert .= "<title>INTRUDER ALERT!!!</title>\n";
		$alert .= "<body bgcolor=\"#FFFFFF\" text=\"#000000\">\n\n<br><br><br>\n\n";
		$alert .= "<center><img src=\"images/eyes.gif\" border=\"0\"><br><br>\n";
		$alert .= "<font face=\"Verdana\" size=\"+4\"><b>Get Out!</b></font></center>\n";
		$alert .= "</body>\n";
		$alert .= "</html>\n";
		die($alert);
	}
	$aid = substr($aid, 0,25);
	$result2 = $db->sql_query("SELECT name, pwd FROM ".$prefix."_authors WHERE aid='$aid'");
	if (!$result2) {
		die("Selection from database failed!");
	} else {
		list($rname, $rpwd) = $db->sql_fetchrow($result2);
		if($rpwd == $pwd && !empty($rpwd)) {
			$admintest = 1;
		}
	}
}

if(!isset($op)) { 
	$op = "adminMain"; 
} elseif(($op=="mod_authors" OR $op=="modifyadmin" OR $op=="UpdateAuthor" OR $op=="AddAuthor" OR $op=="deladmin2" OR $op=="deladmin" OR $op=="assignstories" OR $op=="deladminconf") AND ($rname != "God")) {
//    die("Illegal Operation");
}
$pagetitle = "- "._ADMINMENU."";

/*********************************************************/
/* Login Function                                        */
/*********************************************************/

function login() {
	global $gfx_chk, $aid,$admin;
	if($aid=="admin")Header("Location:admin/index.php");
}

function deleteNotice($id) {
	global $prefix, $db, $admin_file;
	$id = intval($id);
	$db->sql_query("DELETE FROM ".$prefix."_reviews_add WHERE id = '$id'");
	Header("Location: ".$admin_file.".php?op=reviews");
}

/*********************************************************/
/* Administration Menu Function                          */
/*********************************************************/

function adminmenu($url, $title, $image) {
	global $counter, $admingraphic, $Default_Theme;
	AutoMessage_Contract('1');

}

function GraphicAdmin($module_admin='') {
	global $aid, $admingraphic, $language, $admin, $prefix, $db, $counter, $admin_file;
	AutoMessage_Contract('1');
}

/*********************************************************/
/* Administration Main Function                          */
/*********************************************************/



if($admintest) {

	switch($op) {

		case "do_gfx":
		do_gfx();
		break;

		case "deleteNotice":
		deleteNotice($id);
		break;

		case "GraphicAdmin":
		GraphicAdmin();
		break;

		

		case "logout":
		global $admin,$aid;
		setcookie($aid, false);
		setcookie("admin", false);
		$db->sql_query("Update ".$prefix."_authors set status_log='0' WHERE aid='$aid'");
		$logout=1;
		$aid = "";
		$admin = "";

		echo "<center><font class=\"title\"><b>"._YOUARELOGGEDOUT."</b></font></center>";
		echo '
			<script>
				window.parent.location="admin/";
			</script>
		';
		break;

		case "login";
		unset($op);

		default:
		if (!is_admin($admin)) {
			login();
		}
		$casedir = dir("admin/case");
		while($func=$casedir->read()) {
			if(substr($func, 0, 5) == "case.") {
		    include($casedir->path."/".$func);
			}
		}
		closedir($casedir->handle);
		$result = $db->sql_query("SELECT title FROM ".$prefix."_modules ORDER BY title ASC");
		while (list($mod_title) = $db->sql_fetchrow($result)) {
		  if (file_exists("modules/$mod_title/admin/index.php") AND file_exists("modules/$mod_title/admin/links.php") AND file_exists("modules/$mod_title/admin/case.php")) {
		    include("modules/$mod_title/admin/case.php");
		  }
		}
		break;

	}

} else {

	switch($op) {

		default:
		login();
		break;

	}

}

?>