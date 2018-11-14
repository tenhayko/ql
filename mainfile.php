<?php

/************************************************************************/
/* PHP-NUKE: Advanced Content Management System                         */
/* ============================================                         */
/*                                                                      */
/* Copyright (c) 2006 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/

// End the transaction
if(!defined('END_TRANSACTION')) {
  define('END_TRANSACTION', 2);
}

// Get php version
$phpver = phpversion();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('error_reporting', E_ERROR);
// convert superglobals if php is lower then 4.1.0
if ($phpver < '4.1.0') {
  $_GET = $HTTP_GET_VARS;
  $_POST = $HTTP_POST_VARS;
  $_SERVER = $HTTP_SERVER_VARS;
  $_FILES = $HTTP_POST_FILES;
  $_ENV = $HTTP_ENV_VARS;
  if($_SERVER['REQUEST_METHOD'] == "POST") {
    $_REQUEST = $_POST;
  } elseif($_SERVER['REQUEST_METHOD'] == "GET") {
    $_REQUEST = $_GET;
  }
  if(isset($HTTP_COOKIE_VARS)) {
    $_COOKIE = $HTTP_COOKIE_VARS;
  }
  if(isset($HTTP_SESSION_VARS)) {
    $_SESSION = $HTTP_SESSION_VARS;
  }
}

// override old superglobals if php is higher then 4.1.0
if($phpver >= '4.1.0') {
  $HTTP_GET_VARS = $_GET;
  $HTTP_POST_VARS = $_POST;
  $HTTP_SERVER_VARS = $_SERVER;
  $HTTP_POST_FILES = $_FILES;
  $HTTP_ENV_VARS = $_ENV;
  $PHP_SELF = $_SERVER['PHP_SELF'];
  if(isset($_SESSION)) {
    $HTTP_SESSION_VARS = $_SESSION;
  }
  if(isset($_COOKIE)) {
    $HTTP_COOKIE_VARS= $_COOKIE;
  }
}
// After doing those superglobals we can now use one
// and check if this file isnt being accessed directly
if (stristr(htmlentities($_SERVER['PHP_SELF']), "mainfile.php")) {
    header("Location: index.php");
    exit();
}


if (!function_exists("floatval")) {
    function floatval($inputval) {
        return (float)$inputval;
    }
}
if ($phpver >= '4.0.4pl1' && isset($_SERVER['HTTP_USER_AGENT']) && strstr($_SERVER['HTTP_USER_AGENT'],'compatible')) {
	if (extension_loaded('zlib')) {
    	@ob_end_clean();
    	ob_start('ob_gzhandler');
  	}
} elseif ($phpver > '4.0' && isset($_SERVER['HTTP_ACCEPT_ENCODING']) && !empty($_SERVER['HTTP_ACCEPT_ENCODING'])) {
  	if (strstr($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
    	if (extension_loaded('zlib')) {
      		$do_gzip_compress = true;
      		ob_start(array('ob_gzhandler',5));
      		ob_implicit_flush(0);
      		if (@ereg("MSIE", $_SERVER['HTTP_USER_AGENT'])) {
				header('Content-Encoding: gzip');
      		}
    	}
  	}
}

if (!ini_get('register_globals')) {
	@import_request_variables("GPC", "");
}

if(!isset($Cookie_id)){
	$time = microtime();
	$time = base64_encode($time);
	setcookie ("Cookie_id", $time);
}




//Union Tap
//Copyright Zhen-Xjell 2004 http://nukecops.com
//Beta 3 Code to prevent UNION SQL Injections
unset($matches);
unset($loc);
if(isset($_SERVER['QUERY_STRING'])) {
	if (preg_match("/([OdWo5NIbpuU4V2iJT0n]{5}) /", rawurldecode($loc=$_SERVER['QUERY_STRING']), $matches)) {
    	die('Illegal Operation');
  	}
}

// This block of code makes sure $admin and $user are COOKIES
if((isset($admin) && $admin != $_COOKIE['admin']) OR (isset($user) && $user != $_COOKIE['user'])) {
	die("Illegal Operation");
}

if(!function_exists('stripos')) {
	function stripos_clone($haystack, $needle, $offset=0) {
		$return = strpos(strtoupper($haystack), strtoupper($needle), $offset);
		if ($return === false) {
			return false;
		} else {
			return true;
		}
	}
} else {
	// But when this is PHP5, we use the original function
	function stripos_clone($haystack, $needle, $offset=0) {
		$return = stripos($haystack, $needle, $offset=0);
		if ($return === false) {
			return false;
		} else {
			return true;
		}
	}
} 

// Additional security (Union, CLike, XSS)
if(isset($_SERVER['QUERY_STRING']) && (!stripos_clone($_SERVER['QUERY_STRING'], "ad_click"))) {
	$queryString = $_SERVER['QUERY_STRING'];
    if (stripos_clone($queryString,'%20union%20') OR stripos_clone($queryString,'/*') OR stripos_clone($queryString,'*/union/*') OR stripos_clone($queryString,'c2nyaxb0') OR stripos_clone($queryString,'+union+') OR (stripos_clone($queryString,'cmd=') AND !stripos_clone($queryString,'&cmd')) OR (stripos_clone($queryString,'exec') AND !stripos_clone($queryString,'execu')) OR stripos_clone($queryString,'concat')) {
    	die('Illegal Operation');
    }
}

$postString = "";
foreach ($_POST as $postkey => $postvalue) {
    if ($postString > "") {
     $postString .= "&".$postkey."=".$postvalue;
    } else {
     $postString .= $postkey."=".$postvalue;
    }
}
str_replace("%09", "%20", $postString);
$postString_64 = base64_decode($postString);

if (stripos_clone($postString,'%20union%20') OR stripos_clone($postString,'*/union/*') OR stripos_clone($postString,' union ') OR stripos_clone($postString_64,'%20union%20') OR stripos_clone($postString_64,'*/union/*') OR stripos_clone($postString_64,' union ') OR stripos_clone($postString_64,'+union+')) {
	header("Location: index.php");
	die();
}

if(isset($admin)) {
	$admin = base64_decode($admin);
	$admin = addslashes($admin);
	$admin = base64_encode($admin);
}

if(isset($user)) {
	$user = base64_decode($user);
	$user = addslashes($user);
	$user = base64_encode($user);
}

// Die message for not allowed HTML tags
$htmltags = "<center><img src=\"images/logo.gif\"><br><br><b>";
$htmltags .= "The html tags you attempted to use are not allowed</b><br><br>";
$htmltags .= "[ <a href=\"javascript:history.go(-1)\"><b>Go Back</b></a> ]";

// Die message for empty HTTP_REFERER
$posttags = "<b>Warning:</b> your browser doesn't send the HTTP_REFERER header to the website.<br>";
$posttags .= "This can be caused due to your browser, using a proxy server or your firewall.<br>";
$posttags .= "Please change browser or turn off the use of a proxy<br>";
$posttags .= "or turn off the 'Deny servers to trace web browsing' in your firewall<br>";
$posttags .= "and you shouldn't have problems when sending a POST on this website.";

if (!defined('ADMIN_FILE')) {
  	foreach ($_GET as $sec_key => $secvalue) {
    	if ((@eregi("<[^>]*script*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*object*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*iframe*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*applet*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*meta*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*style*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*form*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*img*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*onmouseover*\"?[^>]*>", $secvalue)) ||
		(@eregi("<[^>]*body*\"?[^>]*>", $secvalue)) ||
		(@eregi("\([^>]*\"?[^)]*\)", $secvalue)) ||
		(@eregi("\"", $secvalue)) ||
		(@eregi("inside_mod", $sec_key))) {
        	die ($htmltags);
     	}
	}

	foreach ($_POST as $secvalue) {
    	if ((@eregi("<[^>]*onmouseover*\"?[^>]*>", $secvalue)) ||
    	(@eregi("<[^>]script*\"?[^>]*>", $secvalue)) ||
    	(@eregi("<[^>]*body*\"?[^>]*>", $secvalue)) ||
    	(@eregi("<[^>]style*\"?[^>]*>", $secvalue))) {
    		die ($htmltags);
    	}
  	}
}

// Posting from other servers in not allowed
// Fix by Quake
// Bug found by PeNdEjO

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	if (isset($_SERVER['HTTP_REFERER'])) {
    	if (!stripos_clone($_SERVER['HTTP_REFERER'], $_SERVER['HTTP_HOST'])) {
        	die('Posting from another server not allowed!');
    	}
  	} else {
    	die($posttags);
  	}
}
/*
global $cpanel;

// Define the INCLUDE PATH
if(defined('FORUM_ADMIN')) {
	define('INCLUDE_PATH', '../../../');
} elseif(defined('INSIDE_MOD')) {
	define('INCLUDE_PATH', '../../');
} else {
	define('INCLUDE_PATH', './');
}
*/

global $filename,$panel_admin_left;

global $cpanel;
if ($forum_admin == 1) {
    require_once("../../../config.php");
    require_once("../../../db/db.php");
} elseif ($inside_mod == 1) {
    require_once("../../config.php");
    require_once("../../db/db.php");
} else {
	if($cpanel=="left"){

		require_once("../config.php");
		//include("../includes/xtpl.php"); 
		require_once("../db/db.php");

		/* FOLLOWING TWO LINES ARE DEPRECATED BUT ARE HERE FOR OLD MODULES COMPATIBILITY */
		/* PLEASE START USING THE NEW SQL ABSTRACTION LAYER. SEE MODULES DOC FOR DETAILS */
		require_once("../includes/sql_layer.php");

		$dbi = sql_connect($dbhost, $dbuname, $dbpass, $dbname);			


	}else{
		//include("includes/xtpl.php"); 
		require_once("config.php");
		require_once("db/db.php");

		/* FOLLOWING TWO LINES ARE DEPRECATED BUT ARE HERE FOR OLD MODULES COMPATIBILITY */
		/* PLEASE START USING THE NEW SQL ABSTRACTION LAYER. SEE MODULES DOC FOR DETAILS */
		require_once("includes/sql_layer.php");
		
		
		$dbi = sql_connect($dbhost, $dbuname, $dbpass, $dbname);
	}
}

// Include the required files
//require_once(INCLUDE_PATH."config.php");
if(!$dbname) {
    die("<br><br><center><img src=images/logo.gif><br><br><b>There seems that PHP-Nuke isn't installed yet.<br>(The values in config.php file are the default ones)<br><br>You can proceed with the <a href='./install/index.php'>web installation</a> now.</center></b>");
}
	

if($display_errors) {
	ini_set('display_errors', 1);
  	error_reporting(E_ALL^E_NOTICE);
} else {
  	ini_set('display_errors', 0);
  	error_reporting(0);
}
define('NUKE_FILE', true);
//cau hinh he thong
$result = $db->sql_query("SELECT * FROM ".$prefix."_config");
$row = $db->sql_fetchrow($result);

$sitename = filter($row['sitename'], "nohtml");

$donvi_thuoc = filter($row['donvi'], "nohtml");
$dienthoai = filter($row['dienthoai'], "nohtml");
$diachi_thuoc = filter($row['diachi'], "nohtml");

$portalurl = filter($row['portalurl'], "nohtml");
$sitelogo = filter($row['site_logo'], "nohtml");
$slogan = filter($row['slogan'], "nohtml");
$startdate = filter($row['startdate'], "nohtml");
$adminmail = filter($row['adminmail'], "nohtml");
$anonpost = intval($row['anonpost']);
$Default_Theme = filter($row['Default_Theme'], "nohtml");
$foot1 = ($row['foot1']);
$foot2 = filter($row['foot2']);
$foot3 = filteR($row['foot3']);
$commentlimit = intval($row['commentlimit']);
$anonymous = filter($row['anonymous'], "nohtml");
$minpass = intval($row['minpass']);
$pollcomm = intval($row['pollcomm']);
$articlecomm = intval($row['articlecomm']);
$broadcast_msg = intval($row['broadcast_msg']);
$my_headlines = intval($row['my_headlines']);
$top = intval($row['top']);
$storyhome = intval($row['storyhome']);
$user_news = intval($row['user_news']);
$oldnum = intval($row['oldnum']);
$ultramode = intval($row['ultramode']);
$banners = intval($row['banners']);
$backend_title = filter($row['backend_title'], "nohtml");
$backend_language = filter($row['backend_language'], "nohtml");
$language = filter($row['language'], "nohtml");
$locale = filter($row['locale'], "nohtml");
$multilingual = intval($row['multilingual']);
$useflags = intval($row['useflags']);
$notify = intval($row['notify']);
$notify_email = filter($row['notify_email'], "nohtml");
$notify_subject = filter($row['notify_subject'], "nohtml");
$notify_message = filter($row['notify_message'], "nohtml");
$notify_from = filter($row['notify_from'], "nohtml");
$moderate = intval($row['moderate']);
$admingraphic = intval($row['admingraphic']);
$httpref = intval($row['httpref']);
$httprefmax = intval($row['httprefmax']);
$CensorMode = intval($row['CensorMode']);
$CensorReplace = filter($row['CensorReplace'], "nohtml");
$copyright = filter($row['copyright']);
$Version_Num = filter($row['Version_Num'], "nohtml");
$domain = @@eregi_replace("http://", "", $portalurl);
$mtime = microtime();
$mtime = explode(" ",$mtime);
$mtime = $mtime[1] + $mtime[0];
$start_time = $mtime;
$lang='vietnamese';
if (isset($newlang) AND !stripos_clone($newlang,".")) {
	if (file_exists("language/lang-".$newlang.".php")) {
		setcookie("lang",$newlang,time()+31536000);
		include_once("language/lang-".$newlang.".php");
		$currentlang = $newlang;
	} else {
		setcookie("lang",$language,time()+31536000);
		include_once("language/lang-".$language.".php");
		$currentlang = $language;
	}
} elseif (isset($lang)) {
	// include_once("language/lang-".$lang.".php");
	$currentlang = $lang;
} else {
	setcookie("lang",$language='vietnamese',time()+31536000);
	include_once("language/lang-".$language.".php");
	$currentlang = $language;
}

$currentlang='vietnamese';



//-------------------------
function makePass() {
	$cons = "bcdfghjklmnpqrstvwxyz";
	$vocs = "aeiou";
	for ($x=0; $x < 6; $x++) {
		mt_srand ((double) microtime() * 1000000);
		$con[$x] = substr($cons, mt_rand(0, strlen($cons)-1), 1);
		$voc[$x] = substr($vocs, mt_rand(0, strlen($vocs)-1), 1);
	}
	mt_srand((double)microtime()*1000000);
	$num1 = mt_rand(0, 9);
	$num2 = mt_rand(0, 9);
	$makepass = $con[0] . $voc[0] .$con[2] . $num1 . $num2 . $con[3] . $voc[3] . $con[4];
	return($makepass);
}

function get_lang($module) {
	global $currentlang, $language;
	if (file_exists("modules/$module/language/lang-".$currentlang.".php")) {
		if ($module == "admin") {
			include_once("admin/language/lang-".$currentlang.".php");
		} else {
			include_once("modules/$module/language/lang-".$currentlang.".php");
		}
	} else {
		if ($module == "admin") {
			include_once("admin/language/lang-".$currentlang.".php");
		} else {
			include_once("modules/$module/language/lang-".$language.".php");
		}
	}
}

function is_admin($admin) {
    if (!$admin) { return 0; }
    if (isset($adminSave)) return $adminSave;
    if (!is_array($admin)) {
        $admin = base64_decode($admin);
        $admin = addslashes($admin);
        $admin = explode(":", $admin);
    }
    $aid = $admin[0];
    $pwd = $admin[1];
    $aid = substr(addslashes($aid), 0, 25);
    if (!empty($aid) && !empty($pwd)) {
        global $prefix, $db;
        $sql = "SELECT pwd FROM ".$prefix."_authors WHERE aid='$aid'";
        $result = $db->sql_query($sql);
        $pass = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        if ($pass[0] == $pwd && !empty($pass[0])) {
            static $adminSave;
        	return $adminSave = 1;
        }
    }
    static $adminSave;
    return $adminSave = 0;
}

function is_user($user) {
    if (!$user) { return 0; }
    if (isset($userSave)) return $userSave;
    if (!is_array($user)) {
        $user = base64_decode($user);
        $user = addslashes($user);
        $user = explode(":", $user);
    }
    $uid = $user[0];
    $pwd = $user[2];
    $uid = intval($uid);
    if (!empty($uid) AND !empty($pwd)) {
        global $db, $user_prefix;
        $sql = "SELECT user_password FROM ".$user_prefix."_users WHERE user_id='$uid'";
        $result = $db->sql_query($sql);
        $row = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        if ($row[0] == $pwd && !empty($row[0])) {
            static $userSave;
        	return $userSave = 1;
        }
    }
    static $userSave;
    return $userSave = 0;
}

function is_group($user, $name) {
          global $prefix, $db, $user_prefix, $cookie, $user;
     if (is_user($user)) {
          if(!is_array($user)) {
          $cookie = cookiedecode($user);
          $uid = intval($cookie[0]);
          } else {
          $uid = intval($user[0]);
          }
          $result = $db->sql_query("SELECT points FROM ".$user_prefix."_users WHERE user_id='$uid'");
          list($points) = $db->sql_fetchrow($result);
          $points = intval($points);
          $db->sql_freeresult($result);
          $result2 = $db->sql_query("SELECT mod_group FROM ".$prefix."_modules WHERE title='$name'");
          list($mod_group) = $db->sql_fetchrow($result2);
          $mod_group = intval($mod_group);
          $db->sql_freeresult($result2);
          $result3 = $db->sql_query("SELECT points FROM ".$prefix."_groups WHERE id='$mod_group'");
          list($rpoints) = $db->sql_fetchrow($result3);
          $grp = intval($rpoints);
          $db->sql_freeresult($result3);
          if (($points >= 0 AND $points >= $grp) OR $mod_group == 0) {
        	return 1;
          }
     }
     return 0;
}

function update_points($id) {
  global $user_prefix, $prefix, $db, $user;
  if (is_user($user)) {
    if(!is_array($user)) {
      $cookie = cookiedecode($user);
      $username = trim($cookie[1]);
    } else {
      $username = trim($user[1]);
    }
    if ($db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_groups")) > '0') {
      $id = intval($id);
      $result = $db->sql_query("SELECT points FROM ".$prefix."_groups_points WHERE id='$id'");
      list($points) = $db->sql_fetchrow($result);
      $db->sql_freeresult($result);
      $rpoints = intval($points);
      $db->sql_query("UPDATE ".$user_prefix."_users SET points=points+".$rpoints." WHERE username='$username'");
    }
  }
}

function title($text) {
	OpenTable();
	echo "<center><span class=\"title\"><strong>$text</strong></span></center>";
	CloseTable();
	echo "<br>";
}

function is_active($module) {
    global $prefix, $db;
    static $save;
    if (is_array($save)) {
        if (isset($save[$module])) return ($save[$module]);
        return 0;
    }
    $sql = "SELECT title FROM ".$prefix."_modules WHERE active=1";
    $result = $db->sql_query($sql);
    while ($row = $db->sql_fetchrow($result)) {
        $save[$row[0]] = 1;
    }
    $db->sql_freeresult($result);
    if (isset($save[$module])) return ($save[$module]);
    return 0;
}
function render_blocks($side, $blockfile, $title, $content, $bid, $url) {
	global $prefix;
	if(!defined('BLOCK_FILE')) {
	  define('BLOCK_FILE', true);
	}
	if (empty($url)) {
		if (empty($blockfile)) {
	    if ($side == "c") {
		themecenterbox($title, $content);
	    } elseif ($side == "d") {
		themecenterbox($title, $content);
	    } else {
		themesidebox($title, $content);
	    }
	} else {
	    if ($side == "c") {
			blockfileinc($title, $blockfile, 1);
	    } elseif ($side == "d") {
			blockfileinc($title, $blockfile, 1);
	    } else {
			blockfileinc($title, $blockfile,0,$clip);
	    }
	}
    } else {
	if ($side == "c" OR $side == "d") {
	    headlines($bid,1);
	} else {
    	    headlines($bid);
	}
    }
}


function selectlanguage() {
	global $useflags, $currentlang;
	if ($useflags == 1) {
		$title = _SELECTLANGUAGE;
		$content = "<center><font class=\"content\">"._SELECTGUILANG."<br><br>";
		$langdir = dir("language");
		while($func=$langdir->read()) {
			if(substr($func, 0, 5) == "lang-") {
				$menulist .= "$func ";
			}
		}
		closedir($langdir->handle);
		$menulist = explode(" ", $menulist);
		sort($menulist);
		for ($i=0; $i < sizeof($menulist); $i++) {
			if($menulist[$i]!="") {
				$tl = str_replace("lang-","",$menulist[$i]);
				$tl = str_replace(".php","",$tl);
				$altlang = ucfirst($tl);
				$content .= "<a href=\"index.php?newlang=".$tl."\"><img src=\"images/language/flag-".$tl.".png\" border=\"0\" alt=\"$altlang\" title=\"$altlang\" hspace=\"3\" vspace=\"3\"></a> ";
			}
		}
		$content .= "</font></center>";
		themesidebox($title, $content);
	} else {
		$title = _SELECTLANGUAGE;
		$content = "<center><font class=\"content\">"._SELECTGUILANG."<br><br></font>";
		$content .= "<form action=\"index.php\" method=\"get\"><select name=\"newlanguage\" onChange=\"top.location.href=this.options[this.selectedIndex].value\">";
		$handle=opendir('language');
		while ($file = readdir($handle)) {
			if (preg_match("/^lang\-(.+)\.php/", $file, $matches)) {
				$langFound = $matches[1];
				$languageslist .= "$langFound ";
			}
		}
		closedir($handle);
		$languageslist = explode(" ", $languageslist);
		sort($languageslist);
		for ($i=0; $i < sizeof($languageslist); $i++) {
			if($languageslist[$i]!="") {
				$content .= "<option value=\"index.php?newlang=$languageslist[$i]\" ";
				if($languageslist[$i]==$currentlang) $content .= " selected";
				$content .= ">".ucfirst($languageslist[$i])."</option>\n";
			}
		}
		$content .= "</select></form></center>";
		themesidebox($title, $content);
	}
}

function cookiedecode($user) {
    global $cookie, $db, $user_prefix;
    static $pass;
    if(!is_array($user)) {
        $user = base64_decode($user);
        $user = addslashes($user);
        $cookie = explode(":", $user);
    } else {
        $cookie = $user;
    }
    if (!isset($pass)) {
       $sql = "SELECT user_password FROM ".$user_prefix."_users WHERE username='$cookie[1]'";
       $result = $db->sql_query($sql);
       list($pass) = $db->sql_fetchrow($result);
       $db->sql_freeresult($result);
    }
    if ($cookie[2] == $pass && !empty($pass)) { return $cookie; }
}

function getusrinfo($user) {
    global $user_prefix, $db, $userinfo, $cookie;
    if (!$user OR empty($user)) {
      return NULL; 
    }
    cookiedecode($user);
    $user = $cookie;
    if (isset($userrow) AND is_array($userrow)) {
        if ($userrow['username'] == $user[1] && $userrow['user_password'] == $user[2]) {
            return $userrow;
        }
    }
    $sql = "SELECT * FROM ".$user_prefix."_users WHERE username='$user[1]' AND user_password='$user[2]'";
    $result = $db->sql_query($sql);
    if ($db->sql_numrows($result) == 1) {
        static $userrow;
        $userrow = $db->sql_fetchrow($result);
        return $userinfo = $userrow;
    }
    $db->sql_freeresult($result);
    unset($userinfo);
}

function FixQuotes ($what = "") {
	//$what = @ereg_replace("'","''",$what);
	while (@eregi("\\\\'", $what)) {
		$what = @ereg_replace("\\\\'","'",$what);
	}
	return $what;
}

/*********************************************************/
/* text filter                                           */
/*********************************************************/

function check_words($Message) {
	global $CensorMode, $CensorReplace, $EditedMessage,$cpanel;
	if($cpanel=="left"){
		require_once("../config.php");
	}else{
		include("config.php");
	}
	//include("config.php");
	$EditedMessage = $Message;
	
	if ($CensorMode != 0) {
		if (is_array($CensorList)) {
			$Replace = $CensorReplace;
			if ($CensorMode == 1) {
				for ($i = 0; $i < count($CensorList); $i++) {
					$EditedMessage = @@eregi_replace("$CensorList[$i]([^a-zA-Z0-9])","$Replace\\1",$EditedMessage);
				}
			} elseif ($CensorMode == 2) {
				for ($i = 0; $i < count($CensorList); $i++) {
					$EditedMessage = @@eregi_replace("(^|[^[:alnum:]])$CensorList[$i]","\\1$Replace",$EditedMessage);
				}
			} elseif ($CensorMode == 3) {
				for ($i = 0; $i < count($CensorList); $i++) {
					$EditedMessage = @@eregi_replace("$CensorList[$i]","$Replace",$EditedMessage);
				}
			}
		}
	}
	
	return ($EditedMessage);
}

function delQuotes($string){
	/* no recursive function to add quote to an HTML tag if needed */
	/* and delete duplicate spaces between attribs. */
	$tmp="";    # string buffer
	$result=""; # result string
	$i=0;
	$attrib=-1; # Are us in an HTML attrib ?   -1: no attrib   0: name of the attrib   1: value of the atrib
	$quote=0;   # Is a string quote delimited opened ? 0=no, 1=yes
	$len = strlen($string);
	while ($i<$len) {
		switch($string[$i]) { # What car is it in the buffer ?
		case "\"": #"       # a quote.
		if ($quote==0) {
			$quote=1;
		} else {
			$quote=0;
			if (($attrib>0) && ($tmp != "")) { $result .= "=\"$tmp\""; }
			$tmp="";
			$attrib=-1;
		}
		break;
		case "=":           # an equal - attrib delimiter
		if ($quote==0) {  # Is it found in a string ?
		$attrib=1;
		if ($tmp!="") $result.=" $tmp";
		$tmp="";
		} else $tmp .= '=';
		break;
		case " ":           # a blank ?
		if ($attrib>0) {  # add it to the string, if one opened.
		$tmp .= $string[$i];
		}
		break;
		default:            # Other
		if ($attrib<0)    # If we weren't in an attrib, set attrib to 0
		$attrib=0;
		$tmp .= $string[$i];
		break;
		}
		$i++;
	}
	if (($quote!=0) && ($tmp != "")) {
		if ($attrib==1) $result .= "=";
		/* If it is the value of an atrib, add the '=' */
		$result .= "\"$tmp\"";  /* Add quote if needed (the reason of the function ;-) */
	}
	return $result;
}

function check_html ($str, $strip="") {
	global $cpanel;
	/* The core of this code has been lifted from phpslash */
	/* which is licenced under the GPL. */
	if($cpanel=="left"){
		require_once("../config.php");
	}else{
		include("config.php");
	}
	if ($strip == "nohtml")
	$AllowableHTML=array('');
	$str = stripslashes($str);
	$str = @@eregi_replace("<[[:space:]]*([^>]*)[[:space:]]*>",'<\\1>', $str);
	// Delete all spaces from html tags .
	$str = @@eregi_replace("<a[^>]*href[[:space:]]*=[[:space:]]*\"?[[:space:]]*([^\" >]*)[[:space:]]*\"?[^>]*>",'<a href="\\1">', $str);
	// Delete all attribs from Anchor, except an href, double quoted.
	$str = @@eregi_replace("<[[:space:]]* img[[:space:]]*([^>]*)[[:space:]]*>", '', $str);
	// Delete all img tags
	$str = @@eregi_replace("<a[^>]*href[[:space:]]*=[[:space:]]*\"?javascript[[:punct:]]*\"?[^>]*>", '', $str);
	// Delete javascript code from a href tags -- Zhen-Xjell @ http://nukecops.com
	$tmp = "";
	while (@ereg("<(/?[[:alpha:]]*)[[:space:]]*([^>]*)>",$str,$reg)) {
		$i = strpos($str,$reg[0]);
		$l = strlen($reg[0]);
		if ($reg[1][0] == "/") $tag = strtolower(substr($reg[1],1));
		else $tag = strtolower($reg[1]);
		if ($a = $AllowableHTML[$tag])
		if ($reg[1][0] == "/") $tag = "</$tag>";
		elseif (($a == 1) || ($reg[2] == "")) $tag = "<$tag>";
		else {
			# Place here the double quote fix function.
			$attrb_list=delQuotes($reg[2]);
			// A VER
			//$attrb_list = @ereg_replace("&","&amp;",$attrb_list);
			$tag = "<$tag" . $attrb_list . ">";
		} # Attribs in tag allowed
		else $tag = "";
		$tmp .= substr($str,0,$i) . $tag;
		$str = substr($str,$i+$l);
	}
	$str = $tmp . $str;
	return $str;
	exit;
	/* Squash PHP tags unconditionally */
	$str = @ereg_replace("<\?","",$str);
	return $str;
}

function filter_text($Message, $strip="") {
	global $EditedMessage;
	check_words($Message);
	$EditedMessage=check_html($EditedMessage, $strip);
	return ($EditedMessage);
}

function filter($what, $strip="", $save="", $type="") {

	if ($strip == "nohtml") {
		$what = check_html($what, $strip);
			

		$what = htmlentities(trim($what), ENT_QUOTES);
		
		// If the variable $what doesn't comes from a preview screen should be converted
		if ($type != "preview" AND $save != 1) {
			$what = html_entity_decode($what, ENT_QUOTES);
		}
		
	}
	if ($save == 1) {
		$what = check_words($what);
		$what = check_html($what, $strip);
		$what = addslashes($what);
	} else {
		$what = stripslashes(FixQuotes($what));
		
		$what = check_words($what);
		$what = check_html($what, $strip);
	}
	return($what);
}

/*********************************************************/
/* formatting stories                                    */
/*********************************************************/

function formatTimestamp($time) {
    global $datetime, $locale;
    setlocale(LC_TIME, $locale);
    if (!is_numeric($time)) {
        preg_match('/([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})/', $time, $datetime);
        $time = gmmktime($datetime[4],$datetime[5],$datetime[6],$datetime[2],$datetime[3],$datetime[1]);
    }
    $time -= date("Z");
    $datetime = strftime(_DATESTRING, $time);
    $datetime = ucfirst($datetime);
    return $datetime;
}

function get_author($aid) {
	global $prefix, $db;
    static $users;
    if (isset($users[$aid]) AND is_array($users[$aid])) {
        $row = $users[$aid];
    } else {
        $sql = "SELECT url, email FROM ".$prefix."_authors WHERE aid='$aid'";
        $result = $db->sql_query($sql);
        $row = $db->sql_fetchrow($result);
        $users[$aid] = $row;
        $db->sql_freeresult($result);
    }
	$aidurl = filter($row['url'], "nohtml");
	$aidmail = filter($row['email'], "nohtml");
    if (isset($aidurl)) {
        $aid = "<a href=\"".$aidurl."\">$aid</a>";
    } elseif (isset($aidmail)) {
        $aid = "<a href=\"mailto:".$aidmail."\">$aid</a>";
    } else {
        $aid = $aid;
    }
    return $aid;
}

function formatAidHeader($aid) {
  $AidHeader = get_author($aid);
  echo $AidHeader;
}

if(!function_exists("themepreview")) {
function themepreview($title, $hometext, $bodytext="", $notes="") {
	echo "<b>$title</b><br><br>$hometext";
	if (!empty($bodytext)) {
		echo "<br><br>$bodytext";
	}
	if (!empty($notes)) {
		echo "<br><br><b>"._NOTE."</b> <i>$notes</i>";
	}
  }
}

function adminblock() {
	global $admin, $prefix, $db, $admin_file;
	if (is_admin($admin)) {
	        $sql = "SELECT title, content FROM ".$prefix."_blocks WHERE bkey='admin'";
		$result = $db->sql_query($sql);
		while (list($title, $content) = $db->sql_fetchrow($result)) {
			$content = filter($content);
			$title = filter($title, "nohtml");
			$content = "<span class=\"content\">".$content."</span>";
			themesidebox($title, $content);
		}
		$title = _WAITINGCONT;
		$num = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_queue"));
		$content = "<span class=\"content\">";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=submissions\">"._SUBMISSIONS."</a>: $num<br>";
		$num = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_reviews_add"));
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=reviews\">"._WREVIEWS."</a>: $num<br>";
		$num = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_links_newlink"));
		$brokenl = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_links_modrequest WHERE brokenlink='1'"));
		$modreql = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_links_modrequest WHERE brokenlink='0'"));
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=Links\">"._WLINKS."</a>: $num<br>";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=LinksListModRequests\">"._MODREQLINKS."</a>: $modreql<br>";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=LinksListBrokenLinks\">"._BROKENLINKS."</a>: $brokenl<br>";
		$num = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_newdownload"));
		$brokend = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_modrequest WHERE brokendownload='1'"));
		$modreqd = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_downloads_modrequest WHERE brokendownload='0'"));
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=downloads\">"._UDOWNLOADS."</a>: $num<br>";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=DownloadsListModRequests\">"._MODREQDOWN."</a>: $modreqd<br>";
		$content .= "<strong><big>&middot;</big></strong>&nbsp;<a href=\"".$admin_file.".php?op=DownloadsListBrokenDownloads\">"._BROKENDOWN."</a>: $brokend<br></span>";
		themesidebox($title, $content);
	}
}

function loginbox() {
	global $user, $sitekey, $gfx_chk;
	mt_srand ((double)microtime()*1000000);
	$maxran = 1000000;
	$random_num = mt_rand(0, $maxran);
	$datekey = date("F j");
	$rcode = hexdec(md5($_SERVER['HTTP_USER_AGENT'] . $sitekey . $random_num . $datekey));
	$code = substr($rcode, 2, 6);
	if (!is_user($user)) {
		$title = _LOGIN;
		$boxstuff = "<form action=\"modules.php?name=Your_Account\" method=\"post\">";
		$boxstuff .= "<center><font class=\"content\">"._NICKNAME."<br>";
		$boxstuff .= "<input type=\"text\" name=\"username\" size=\"8\" maxlength=\"25\"><br>";
		$boxstuff .= ""._PASSWORD."<br>";
		$boxstuff .= "<input type=\"password\" name=\"user_password\" size=\"8\" maxlength=\"20\"><br>";
		if (extension_loaded("gd") AND ($gfx_chk == 2 OR $gfx_chk == 4 OR $gfx_chk == 5 OR $gfx_chk == 7)) {
			$boxstuff .= ""._SECURITYCODE.": <img src='?gfx=gfx&amp;random_num=$random_num' border='1' alt='"._SECURITYCODE."' title='"._SECURITYCODE."'><br>\n";
			$boxstuff .= ""._TYPESECCODE."<br><input type=\"text\" NAME=\"gfx_check\" SIZE=\"7\" MAXLENGTH=\"6\">\n";
			$boxstuff .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\"><br>\n";
		} else {
			$boxstuff .= "<input type=\"hidden\" name=\"random_num\" value=\"$random_num\">";
			$boxstuff .= "<input type=\"hidden\" name=\"gfx_check\" value=\"$code\">";
		}
		$boxstuff .= "<input type=\"hidden\" name=\"op\" value=\"login\">";
		$boxstuff .= "<input type=\"submit\" value=\""._LOGIN."\"></font></center></form>";
		$boxstuff .= "<center><font class=\"content\">"._ASREGISTERED."</font></center>";
		themesidebox($title, $boxstuff);
	}
}



function headlines($bid, $cenbox=0) {
	global $prefix, $db;
	$bid = intval($bid);
	$result = $db->sql_query("SELECT title, content, url, refresh, time FROM ".$prefix."_blocks WHERE bid='$bid'");
	list($title, $content, $url, $refresh, $otime) = $db->sql_fetchrow($result);
	$title = filter($title, "nohtml");
	$content = filter($content);
	$url = filter($url, "nohtml");
	$refresh = intval($refresh);
	$past = time()-$refresh;
	if ($otime < $past) {
		$btime = time();
		$rdf = parse_url($url);
		$fp = fsockopen($rdf['host'], 80, $errno, $errstr, 15);
		if (!$fp) {
			$content = "";
			$db->sql_query("UPDATE ".$prefix."_blocks SET content='$content', time='$btime' WHERE bid='$bid'");
			$cont = 0;
			if ($cenbox == 0) {
				themesidebox($title, $content);
			} else {
				themecenterbox($title, $content);
			}
			return;
		}
		if ($fp) {
			if (!empty($rdf['query']))
			$rdf['query'] = "?" . $rdf['query'];

			fputs($fp, "GET " . $rdf['path'] . $rdf['query'] . " HTTP/1.0\r\n");
			fputs($fp, "HOST: " . $rdf['host'] . "\r\n\r\n");
			$string	= "";
			while(!feof($fp)) {
				$pagetext = fgets($fp,300);
				$string .= chop($pagetext);
			}
			fputs($fp,"Connection: close\r\n\r\n");
			fclose($fp);
			$items = explode("</item>",$string);
			$content = "<font class=\"content\">";
			for ($i=0;$i<10;$i++) {
				$link = @ereg_replace(".*<link>","",$items[$i]);
				$link = @ereg_replace("</link>.*","",$link);
				$title2 = @ereg_replace(".*<title>","",$items[$i]);
				$title2 = @ereg_replace("</title>.*","",$title2);
				$title2 = stripslashes($title2);
				if (empty($items[$i]) AND $cont != 1) {
					$content = "";
					$db->sql_query("UPDATE ".$prefix."_blocks SET content='$content', time='$btime' WHERE bid='$bid'");
					$cont = 0;
					if ($cenbox == 0) {
						themesidebox($title, $content);
					} else {
						themecenterbox($title, $content);
					}
					return;
				} else {
					if (strcmp($link,$title2) AND !empty($items[$i])) {
						$cont = 1;
						$content .= "<strong><big>&middot;</big></strong><a href=\"$link\" target=\"new\">$title2</a><br>\n";
					}
				}
			}

		}
		$db->sql_query("UPDATE ".$prefix."_blocks SET content='$content', time='$btime' WHERE bid='$bid'");
	}
	$siteurl = str_replace("http://","",$url);
	$siteurl = explode("/",$siteurl);
	if (($cont == 1) OR (!empty($content))) {
		$content .= "<br><a href=\"http://$siteurl[0]\" target=\"blank\"><b>"._HREADMORE."</b></a></font>";
	} elseif (($cont == 0) OR (empty($content))) {
		$content = "<font class=\"content\">"._RSSPROBLEM."</font>";
	}
	if ($cenbox == 0) {
		themesidebox($title, $content);
	} else {
		themecenterbox($title, $content);
	}
}

function automated_news() {
	global $prefix, $multilingual, $currentlang, $db;
	if ($multilingual == 1) {
		$querylang = "WHERE (alanguage='$currentlang' OR alanguage='')";
	} else {
		$querylang = "";
	}
	$today = getdate();
	$day = $today['mday'];
	if ($day < 10) {
		$day = "0$day";
	}
	$month = $today['mon'];
	if ($month < 10) {
		$month = "0$month";
	}
	$year = $today['year'];
	$hour = $today['hours'];
	$min = $today['minutes'];
	$sec = "00";
	$result = $db->sql_query("SELECT anid, time FROM ".$prefix."_autonews $querylang");
	while (list($anid, $time) = $db->sql_fetchrow($result)) {
		@ereg ("([0-9]{4})-([0-9]{1,2})-([0-9]{1,2}) ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})", $time, $date);
		if (($date[1] <= $year) AND ($date[2] <= $month) AND ($date[3] <= $day)) {
			if (($date[4] < $hour) AND ($date[5] >= $min) OR ($date[4] <= $hour) AND ($date[5] <= $min)) {
				$result2 = $db->sql_query("SELECT * FROM ".$prefix."_autonews WHERE anid='$anid'");
				while ($row2 = $db->sql_fetchrow($result2)) {
					$num = $db->sql_numrows($db->sql_query("SELECT sid FROM ".$prefix."_stories WHERE title='$row2[title]'"));
					if ($num == 0) {
						$title = $row2['title'];
						$hometext = filter($row2['hometext']);
						$bodytext = filter($row2['bodytext']);
						$notes = filter($row2['notes']);
						$catid2 = intval($row2['catid']);
						$aid2 = filter($row2['aid'], "nohtml");
						$time2 = $row2['time'];
						$topic2 = intval($row2['topic']);
						$informant2 = filter($row2['informant'], "nohtml");
						$ihome2 = intval($row2['ihome']);
						$alanguage2 = $row2['alanguage'];
						$acomm2 = intval($row2['acomm']);
						$associated2 = $row2['associated'];
						// Prepare and filter variables to be saved
						$hometext = filter($hometext, "", 1);
						$bodytext = filter($bodytext, "", 1);
						$notes = filter($notes, "", 1);
						$aid2 = filter($aid2, "nohtml", 1);
						$informant2 = filter($informant2, "nohtml", 1);
						$db->sql_query("DELETE FROM ".$prefix."_autonews WHERE anid='$anid'");
						$db->sql_query("INSERT INTO ".$prefix."_stories VALUES (NULL, '$catid2', '$aid2', '$title', '$time2', '$hometext', '$bodytext', '0', '0', '$topic2', '$informant2', '$notes', '$ihome2', '$alanguage2', '$acomm2', '0', '0', '0', '0', '0', '$associated2')");
					}
				}
				$db->sql_freeresult($result2);
			}
		}
	}
	$db->sql_freeresult($result);
}

if(!function_exists("themecenterbox")) {
function themecenterbox($title, $content) {
	OpenTable();
	echo "<center><font class=\"option\"><b>$title</b></font></center><br>".$content;
	CloseTable();
	echo "<br>";
  }
}



function get_theme() {
    global $user, $userinfo, $Default_Theme, $name;
    if (isset($ThemeSelSave)) return $ThemeSelSave;
    if(is_user($user) && ($name != "Your_Account" || $op != "logout")) {
        getusrinfo($user);
        if(empty($userinfo['theme'])) $userinfo['theme']=$Default_Theme;
        if(file_exists("themes/".$userinfo['theme']."/theme.php")) {
            $ThemeSel = $userinfo['theme'];
        } else {
            $ThemeSel = $Default_Theme;
        }
    } else {
        $ThemeSel = $Default_Theme;
    }
    static $ThemeSelSave;
    $ThemeSelSave = $ThemeSel;
    return $ThemeSelSave;
}

function removecrlf($str) {
	// Function for Security Fix by Ulf Harnhammar, VSU Security 2002
	// Looks like I don't have so bad track record of security reports as Ulf believes
	// He decided to not contact me, but I'm always here, digging on the net
	return strtr($str, "\015\012", ' ');
}

function validate_mail($email) {
  if(strlen($email) < 7 || !preg_match("/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/", $email)) {
     //include_once("header.php");
     OpenTable();
     echo _ERRORINVEMAIL;
     CloseTable();
     //include_once("footer.php");
  }
  else {
     return $email;
  }
}





function redir($content) {
	global $portalurl;
	unset($location);
	$content = filter($content);
	$links = array();
	$hrefs = array();
	$pos = 0;
	while (!(($pos = strpos($content,"<",$pos)) === false)) {
		$pos++;
		$endpos = strpos($content,">",$pos);
		$tag = substr($content,$pos,$endpos-$pos);
		$tag = trim($tag);
		if (isset($location)) {
			if (!strcasecmp(strtok($tag," "),"/A")) {
				$link = substr($content,$linkpos,$pos-1-$linkpos);
				$links[] = $link;
				$hrefs[] = $location;
				unset($location);
			}
			$pos = $endpos+1;
		} else {
			if (!strcasecmp(strtok($tag," "),"A")) {
				if (@eregi("HREF[ \t\n\r\v]*=[ \t\n\r\v]*\"([^\"]*)\"",$tag,$regs));
				else if (@eregi("HREF[ \t\n\r\v]*=[ \t\n\r\v]*([^ \t\n\r\v]*)",$tag,$regs));
				else $regs[1] = "";
				if ($regs[1]) {
					$location = $regs[1];
				}
				$pos = $endpos+1;
				$linkpos = $pos;
			} else {
				$pos = $endpos+1;
			}
		}
	}
	for ($i=0; $i<sizeof($hrefs); $i++) {
		$url = urlencode($hrefs[$i]);
		$content = str_replace("<a href=\"$hrefs[$i]\">", "<a href=\"$portalurl/index.php?url=$url\" target=\"_blank\">", $content);
	}
	return($content);
}

if (isset($gfx)){
switch($gfx) {

	case "gfx":
	$datekey = date("F j");
	$rcode = hexdec(md5($_SERVER['HTTP_USER_AGENT'] . $sitekey . $random_num . $datekey));
	$code = substr($rcode, 2, 6);
	$ThemeSel = get_theme();
	if (file_exists("themes/".$ThemeSel."/images/code_bg.jpg")) {
		$image = ImageCreateFromJPEG("themes/".$ThemeSel."/images/code_bg.jpg");
	} else {
		$image = ImageCreateFromJPEG("images/code_bg.jpg");
	}
	$text_color = ImageColorAllocate($image, 80, 80, 80);
	Header("Content-type: image/jpeg");
	ImageString ($image, 5, 12, 2, $code, $text_color);
	ImageJPEG($image, '', 75);
	ImageDestroy($image);
	die();
	break;

	case "gfx_little":
	$datekey = date("F j");
	$rcode = hexdec(md5($_SERVER['HTTP_USER_AGENT'] . $sitekey . $random_num . $datekey));
	$code = substr($rcode, 2, 3);
	$ThemeSel = get_theme();
	if (file_exists("themes/".$ThemeSel."/images/code_bg_little.jpg")) {
		$image = ImageCreateFromJPEG("themes/".$ThemeSel."/images/code_bg_little.jpg");
	} else {
		$image = ImageCreateFromJPEG("images/code_bg_little.jpg");
	}
	$text_color = ImageColorAllocate($image, 80, 80, 80);
	Header("Content-type: image/jpeg");
	ImageString ($image, 5, 12, 2, $code, $text_color);
	ImageJPEG($image, '', 75);
	ImageDestroy($image);
	die();
	break;
   }
}
//============================================================

//doi tieng viet co dau sang khong dau
function vntolatin($cs, $tolower = false)
{
    /*Mảng chứa tất cả ký tự có dấu trong Tiếng Việt*/
    $marTViet=array("à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă",
        "ằ","ắ","ặ","ẳ","ẵ","è","é","ẹ","ẻ","ẽ","ê","ề",
        "ế","ệ","ể","ễ",
        "ì","í","ị","ỉ","ĩ",
        "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ",
        "ờ","ớ","ợ","ở","ỡ",
        "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
        "ỳ","ý","ỵ","ỷ","ỹ",
        "đ",
        "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă",
        "Ằ","Ắ","Ặ","Ẳ","Ẵ",
        "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
        "Ì","Í","Ị","Ỉ","Ĩ",
        "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
        "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
        "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
        "Đ"," ");

    /*Mảng chứa tất cả ký tự không dấu tương ứng với mảng $marTViet bên trên*/
    $marKoDau=array("a","a","a","a","a","a","a","a","a","a","a",
        "a","a","a","a","a","a",
        "e","e","e","e","e","e","e","e","e","e","e",
        "i","i","i","i","i",
        "o","o","o","o","o","o","o","o","o","o","o","o",
        "o","o","o","o","o",
        "u","u","u","u","u","u","u","u","u","u","u",
        "y","y","y","y","y",
        "d",
        "A","A","A","A","A","A","A","A","A","A","A","A",
        "A","A","A","A","A",
        "E","E","E","E","E","E","E","E","E","E","E",
        "I","I","I","I","I",
        "O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O","O",
        "U","U","U","U","U","U","U","U","U","U","U",
        "Y","Y","Y","Y","Y",
        "D","-");

    if ($tolower) {
        return strtolower(str_replace($marTViet,$marKoDau,$cs));
    }

    return str_replace($marTViet,$marKoDau,$cs);

}




//--------------


include "morefunc.php";

include_once('xtpl.php');
?>