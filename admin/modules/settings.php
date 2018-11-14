<?php
session_start(); 
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
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}

global $prefix, $db, $admin_file;
$aid = substr("$aid", 0,25);
$row = $db->sql_fetchrow($db->sql_query("SELECT radminsuper FROM " . $prefix . "_authors WHERE aid='$aid'"));
if ($row['radminsuper'] == 1) {

/*********************************************************/
	/* Configuration Functions to Setup all the Variables    */
/*********************************************************/
function Configure() {
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$aid;
		global $prefix, $db, $admin_file,$sitekey;
		include 'admin/include/Topmenu_header.php';
	
	include 'header.php';
		
	echo '<div class="header">

<div style=" height:auto;margin:auto; width:80%">';

		$row = $db->sql_fetchrow($db->sql_query("SELECT *  from ".$prefix."_config"));
		$sitename = $row['sitename'];
		$portalurl = $row['portalurl'];
		$site_logo = $row['site_logo'];
		$slogan = $row['slogan'];
		$startdate = $row['startdate'];
		$adminmail = $row['adminmail'];
		$anonpost = intval($row['anonpost']);
		$Default_Theme = $row['Default_Theme'];
		$foot1 = $row['foot1'];
		$foot2 = $row['foot2'];
		$foot3 = $row['foot3'];
		$commentlimit = intval($row['commentlimit']);
		$minpass = intval($row['minpass']);
		$pollcomm = intval($row['pollcomm']);
		$articlecomm = intval($row['articlecomm']);
		$broadcast_msg = intval($row['broadcast_msg']);
		$my_headlines = intval($row['my_headlines']);
		$language = $row['language'];
		$locale = $row['locale'];
		$multilingual = intval($row['multilingual']);
		$useflags = intval($row['useflags']);
		$notify = intval($row['notify']);
		$notify_email = $row['notify_email'];
		$notify_subject = $row['notify_subject'];
		$notify_message = $row['notify_message'];
		$notify_from = $row['notify_from'];
		$moderate = intval($row['moderate']);
		$admingraphic = intval($row['admingraphic']);
		$httpref = intval($row['httpref']);
		$httprefmax = intval($row['httprefmax']);
		//------------------------------------
		$SiteOffline = $row['SiteOffline'];
		$OfflineMessage = $row['OfflineMessage'];
		$favicon = $row['favicon'];
		$WYSIWYGEditor = $row['WYSIWYGEditor'];
		$ActiveLogFile = $row['ActiveLogFile'];
		$UseCapcha = $row['UseCapcha'];
		$DebugSystem = $row['DebugSystem'];
		$Cache = $row['Cache'];
		$CacheTime = $row['CacheTime'];
		$SessionLifetime = $row['SessionLifetime'];
		$LocaleTimeSettings = $row['LocaleTimeSettings'];
		$MaxLogSystem = $row['MaxLogSystem'];
		$MetaDescription = $row['MetaDescription'];
		$MetaKeywords = $row['MetaKeywords'];
		$SearchEngineFriendlyURLs = $row['SearchEngineFriendlyURLs'];
		$UseApachemod_rewrite = $row['UseApachemod_rewrite'];
		$AddsuffixtoURLs = $row['AddsuffixtoURLs'];
		$donvi = $row['donvi'];
		$masothue = $row['masothue'];
		$dienthoai = $row['dienthoai'];
		$diachi = $row['diachi'];
		
		

		
if($site_logo && file_exists($site_logo)) $logo = '<img src="'.$site_logo.'" height=50><br>';
else  $logo = '';

echo'
<div class="blockhome" style="min-height:300px">
<div class="titlehome" style="padding-top:4px">
<strong>&nbsp;&nbsp;Quản trị hệ thống</strong>

<div style="float:right; padding-top:1px;"><img src="'.$portalurl.'/images/arrow_left.gif" border="0"  /><a href="javascript:window.history.back();"> Trở lại&nbsp; </a></div>
</div>
<form action="admin.php?op=ConfigSave" method="post" enctype="multipart/form-data" name="main">';

echo'<div id="dhtmlgoodies_tabView1">';
	echo'
		<div class="dhtmlgoodies_aTab">';
		echo'
		<table  cellSpacing="1" id="table11">
			<tr>
				<td class="key">Tên công ty </td>
				<td>
				<input class="input_text"  style="width:500px" size="50" value="'.$sitename.'" name="xsitename"> 
				</td>
			</tr>
			<tr>
				<td class="key">Đơn vị : </td>
				<td>
				<input class="text_area"  size="20" value="'.$donvi.'" name="donvi">&nbsp;
				<strong>Mã số thuế</strong>:&nbsp;&nbsp;<input class="input_text"  size="20" value="'.$masothue.'" name="masothue">
				<strong>Điện thoại</strong>:&nbsp;&nbsp;<input class="input_text"  size="20" value="'.$dienthoai.'" name="dienthoai">    
				</td>
				
			</tr>
			
			<tr>
				<td class="key">Địa chỉ </td>
				<td>
				<input class="input_text"   size="50" value="'.$diachi.'" name="diachi"> 
				</td>
			</tr>
			<tr>
				<td class="key">URL</td>
				<td>
				<input class="input_text"  size="50" value="'.$portalurl.'" name="xportalurl"> 
				</td>
			</tr>

			<tr>
				<td class="key">'._LOGO.'</td>
				<td>'.$logo.'
				<input class="input_text"  size="30" name="xsite_logo" type="file"></td>
			</tr>
			<tr>
				<td class="key">Sơ lược Công ty:</td>
				<td>
				<TEXTAREA class="input_text" style="width:500px"  NAME="xContent" ROWS="5" COLS="70">'.$foot3.'</TEXTAREA></td>
			</tr>
			<tr>
				<td class="key">'._FOOTER.'</td>
				<td>
				<TEXTAREA class="input_text" style="width:500px"  NAME="xFooter" ROWS="2" COLS="70">'.$foot1.'</TEXTAREA></td>
			</tr>
			<tr>
				<td class="key">'._FOOTER.'</td>
				<td>
				<TEXTAREA class="input_text" style="width:500px"  NAME="xFooter" ROWS="2" COLS="70">'.$foot1.'</TEXTAREA></td>
			</tr>
		</table>';				
	echo'</div>';

	
	

echo'</div>';
							echo'
							<div class="rc_navigation" style="padding-left:300px;">
							<div id="incomplete_button" >
								<div class="rc_btnicon_renew"><input type="button" value="'._UPDATE.'" class="rc_btnicon" onclick="submit();" /></div>
								<div class="rc_btnicon_inactive"><input type="button" value="'._CLOSE.'" class="rc_btnicon" onclick="CloseModule();" /></div>
							</div>
							</div>		
	
</form></div>
';
?>
	
<?
		include ("footer.php");
}
/*********************************************************/
function ConfigSave(){
		global $prefix, $db, $admin_file;
	$xsitename = $_POST[xsitename];
	$xportalurl = $_POST[xportalurl];
	$xslogan = $_POST[xslogan];
	$xstartdate = $_POST[xstartdate];
	$xadminmail = $_POST[xadminmail];
	$xDefault_Theme = $_POST[xDefault_Theme];
	$xfoot1 = $_POST[xFooter];
	$xfoot2 = $_POST[xHeader];
	$xContent = $_POST[xContent];
	
	$donvi = $_POST[donvi];
	$masothue = $_POST[masothue];
	$dienthoai = $_POST[dienthoai];
	$diachi = $_POST[diachi];
	
	$xminpass = $_POST[xminpass];
if(!$xminpass) $xminpass=5;

	$xbackend_title = $_POST[xbackend_title];
	$xbackend_language = $_POST[xbackend_language];
	$xlanguage = $_POST[xlanguage];
	$xlocale = $_POST[xlocale];
	$xmultilingual = $_POST[xmultilingual];
if(!$xmultilingual) $xmultilingual=0;
	$xhttpref = $_POST[xhttpref];
if(!$httpref) $httpref=0;
	$xhttprefmax = $_POST[xhttprefmax];
if(!$xhttprefmax) $xhttprefmax=0;
	$xbackend_title = htmlentities($xbackend_title, ENT_QUOTES);
	
	$xSiteOffline = $_POST[xSiteOffline];
	$xOfflineMessage = $_POST[xOfflineMessage];
	$xEditor = $_POST[xEditor];

		$db->sql_query("UPDATE ".$prefix."_config SET sitename='$xsitename', portalurl='$xportalurl', site_logo='$xsite_logo', slogan='$xslogan', startdate='$xstartdate', adminmail='$xadminmail', anonpost='$xanonpost', foot1='$xfoot1', foot2='$xfoot2', foot3='$xContent', commentlimit='$xcommentlimit', anonymous='$xanonymous',  pollcomm='$xpollcomm', articlecomm='$xarticlecomm', broadcast_msg='$xbroadcast_msg', my_headlines='$xmy_headlines', top='$xtop', storyhome='$xstoryhome', user_news='$xuser_news', oldnum='$xoldnum', ultramode='$xultramode', banners='$xbanners', backend_title='$xbackend_title', backend_language='$xbackend_language', language='$xlanguage', locale='$xlocale', multilingual='$xmultilingual', useflags='$xuseflags', notify='$xnotify', notify_email='$xnotify_email', notify_subject='$xnotify_subject', notify_message='$xnotify_message', notify_from='$xnotify_from', moderate='$xmoderate', admingraphic='$xadmingraphic', httpref='$xhttpref', httprefmax='$xhttprefmax', CensorMode='$xCensorMode', CensorReplace='$xCensorReplace',SiteOffline='$xSiteOffline',OfflineMessage='$xOfflineMessage',WYSIWYGEditor='$xEditor',donvi='$donvi',masothue='$masothue',dienthoai='$dienthoai',diachi='$diachi' ");

	if($_FILES['xsite_logo']['tmp_name'] != 'none' && $_FILES['xsite_logo']['tmp_name'] != ''){
		if ( ($_FILES["xsite_logo"]["type"] == "image/gif")|| ($_FILES["xsite_logo"]["type"] == "image/jpeg")|| ($_FILES["xsite_logo"]["type"] == "image/pjpeg" || $_FILES["xsite_logo"]["type"] == "image/x-png") ){

			$image_location = 'images/uploaded/' .  strtolower($_FILES['xsite_logo']['name']);
			@unlink($image_location);
			@copy($_FILES['xsite_logo']['tmp_name'], $image_location);
			mysql_query("UPDATE $prefix"._config." 
						 SET site_logo ='$image_location' 
						");
		}else{
			Msg_error("File Ảnh không hợp lệ. Không đúng định dạng file image : ".$_FILES["xsite_logo"]["type"]."");
			die();
		}
	}

	// CAU HINH THAM SO HE THONG
	$xtime_expdate = $_POST[xtime_expdate];
	$xtime_update_salary = $_POST[xtime_update_salary];
	$xtime_work = $_POST[xtime_work];
		mysql_query("Update $prefix"._config_constant."  set time_expdate = '$xtime_expdate', time_update_salary='$xtime_update_salary',time_work='$xtime_work' where 1 ");
		

		Header("Location: admin.php?op=Configure");
}
/*********************************************************/
function SystemSave(){
		global $prefix, $db, $admin_file;
			$xActiveLogFile = $_POST[xActiveLogFile];
			$xUseCapcha = $_POST[xUseCapcha];
			$xDebugSystem = $_POST[xDebugSystem];
			$xCache = $_POST[xCache];
			$xCacheTime = $_POST[xCacheTime];
		if(!$xCacheTime) $xCacheTime=15;
			$xSessionLifetime = $_POST[xSessionLifetime];
		if(!$xSessionLifetime) $xSessionLifetime=15;
			$xDateTime = $_POST[xDateTime];
			$xMinPassword = $_POST[xMinPassword];
		if(!$xMinPassword) $xMinPassword=5;
			$xMaxLogSystem = $_POST[xMaxLogSystem];
		if(!$xMaxLogSystem) $xMaxLogSystem=5;

			$xMetaDesc = stripslashes(FixQuotes($_POST[xMetaDesc]));
			$xMetaKeys = stripslashes(FixQuotes($_POST[xMetaKeys]));
			$xSeo = $_POST[xSeo];
			$xrewrite = $_POST[xrewrite];
			$xSuffix = $_POST[xSuffix];
		$db->sql_query("UPDATE ".$prefix."_config SET ActiveLogFile='$xActiveLogFile',UseCapcha='$xUseCapcha',DebugSystem='$xDebugSystem',Cache='$xCache',CacheTime='$xCacheTime',SessionLifetime='$xSessionLifetime',LocaleTimeSettings='$xLocaleTimeSettings',MaxLogSystem='$xMaxLogSystem',MetaDescription='$xMetaDesc',MetaKeywords='$xMetaKeys',SearchEngineFriendlyURLs='$xSeo',UseApachemod_rewrite='$xrewrite',AddsuffixtoURLs='$xSuffix' ");
		Header("Location: admin.php?op=Configure");
}
/*********************************************************/
function SeoTag(){
include("header.php");
    global $edit_id,$aid,  $pos,$prevIndex, $op,$prefix, $currentlang, $selectedLang,$maxRow,$maxPage,$current_parent_id,$selectedLang;

						$query = "SELECT id,tag,link ,counter 
								  FROM $prefix"._seo_tag ." 								 
								  ORDER BY counter
								  ";
						$link = "&table=$table";
						$query_limit = split_pages($query,$link);
						$result = mysql_query($query_limit);
		echo'
		<DIV class=widget_tableDiv>
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD>'._POSITION.'</TD>
				<TD>'._TAG_NAME.'</TD>
				<TD>'._URL.'</TD>
				<TD>'._COUNTER.'</TD>
				<TD width=25%>'._FUNCTIONS.'</TD>

		  </TR>
		 </THEAD>
		  <TBODY >';

	    $counter = 0;		
		$stt=1;
	    while(list($id,$title,$link,$counter) = mysql_fetch_row($result)) {
			if($counter % 2 == 0){
				$tblColor = "tblColor1";
				$colorTD = "#ffffff";
			}else{
				$tblColor = "tblColor2";
				$colorTD = "#f4f4f4";
			}
			$counter++; global $bgcolor3;

		  echo "<TR class=\"$tblColor\" >";	
		    echo'<TD align=center>'.$stt.'</TD>';
			echo '<TD>'.$title.'</TD>';
			echo '<TD align=center>'.$link.'</TD>';
			echo '<TD align=center>'.$counter.'</TD>';

			echo '<TD align=center nowrap>
				<a href="admin.php?op=SeoTag&edit_id='.$id.'"><img src="images/admin/btn_edit_over.gif" border=0 alt="'._EDIT.'"></a>&nbsp;
				<a href="admin.php?op=DelSeoTag&id='.$id.'"><img src="images/admin/btn_delete_over.gif" border=0 alt="'._DELETE.'"></a></TD>';
			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'
		<TR>
		<TD align=center></TD>
			<TD colspan=7>&nbsp;';
			split_pages($query,$link);
		echo'</TD></TR>';
		echo'</TABLE></DIV>';


echo "<form method=POST action=\"admin.php?op=UpdateTagSeo\">";
		echo $hidden;
echo '
<div id="nifty" style="width:98%;">
<b class="rtop"><b class="r1"></b><b class="r2"></b><b class="r3"></b><b class="r4"></b></b>
';
					if($edit_id){
						$res_edit = mysql_query("SELECT tag, link from  $prefix"._seo_tag."  where  id = '$edit_id' ");
						list($tag_edit,$link_edit)=mysql_fetch_row($res_edit);
						$hidden = "<input type=\"hidden\" name=\"edit_id\" value=\"$edit_id\">";
						$btn = '<div class="rc_btnicon_renew"><input type="button" value="'._UPDATE.'" class="rc_btnicon" onclick="submit();" /></div>';
					}else{
						$btn = '<div class="rc_btnicon_add"><input type="button" value="'._ADDNEW.'" class="rc_btnicon" onclick="submit();" /></div>';
					}
					echo '<table width=100%  cellpadding=1 cellspacing=1 border=0 style="height:100px;">';
					echo '<tr>';
						echo '<td style="padding-left:5px;"><font class=title>'._TAGNAME.'</font></td>';
						echo '<td><font class=title>'._TAGURL.'</font></td>';
						echo '<td></td>';						
					echo '</tr>';
						echo "<tr>
							<td style=\"padding-left:5px;\" valign=top><input type=\"text\" size=30 name=\"tag_name\" value=\"$tag_edit\"></td>
							<td valign=top><input type=\"text\" size=30 name=\"tag_url\" value=\"$link_edit\"></td>
							<td align=center valign=top>";
									echo'
									<div class="rc_navigation" >
									<div id="incomplete_button" >
										'.$btn.'
									</div>
									</div>	';
							echo"
							</td></tr>";
					echo "</table>";			
					echo '
					<b class="rbottom"><b class="r4"></b><b class="r3"></b><b class="r2"></b><b class="r1"></b></b>
					</div>
					';
echo "</form>";
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 240 ;
	initTableWidget('myTable',UserWidth,0,Array(false));
	</SCRIPT>
<?		
include("footer.php");
}
/*********************************************************/
function UpdateTagSeo(){
		global $prefix, $db, $admin_file;
		$tag_name = $_POST[tag_name];
		$tag_url = $_POST[tag_url];
IF(!$_POST[edit_id]){
		$db->sql_query("INSERT INTO ".$prefix."_seo_tag VALUES(NULL, '$tag_name', '$tag_url',0)");
}else{
		$db->sql_query("UPDATE ".$prefix."_seo_tag SET  tag= '$tag_name', link = '$tag_url' where id= '$_POST[edit_id]' )");
}
		Header("Location: admin.php?op=SeoTag");
}
/*********************************************************/
function DelSeoTag($id){
		global $prefix, $db, $admin_file;
		$db->sql_query("DELETE FROM  ".$prefix."_seo_tag  where id= '$id' )");
		Header("Location: admin.php?op=SeoTag");
}
/*********************************************************/
function LogSystem(){
include("header.php");
global $prefix_admin,$currentlang,$aid_log,$module,$maxRow,$maxPage;

if($aid_log){
	$where_aid = "AND aid= '$aid_log' ";
}
if($module){
	$where_module = "AND module like  '$module' ";
}
	$query = "SELECT id,aid, module,lastupdate,logaction
			  FROM $prefix_admin"._system_log." 			  
			  WHERE 1 $where_aid $where_module
			  ORDER BY lastupdate DESC";
	
	$query_limit = split_pages($query,$link,0);
	$result = mysql_query($query_limit);
	echo mysql_error();
	if(mysql_num_rows($result)){
	echo DivTable(_LOGSYSTEM);
	echo '<div class=DivTable >';
			echo '<form name="demoform" action="admin.php?op=LogSystem" method=POST>';
			echo '<table cellpadding=3 cellspacing=3 width=98% align=center border=0 class=CellSearch>';
				echo '<tr><td height=21 align=right>'._SELECTTOFILTER.':</td><td colspan=4>';
						echo SelectBox("aid_log",'aid_log',"Select aid, aid from $prefix_employer"._authors."",$aid_log,0,$style='',$onclick='',$other='',_SELECTUSERNAME);
						echo '&nbsp;&nbsp;';
						echo SelectBox("module",'module',"Select title, title from $prefix_employer"._modules."",$module,0,$style='',$onclick='',$other='',_SELECTMODULE);						
				echo '</td>';
				echo '</tr>';
				echo '<tr>
				<td align=right>'._CREATEDATE.'</td><td>
					<input type="text" name="date_from"  size="12" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.date_from);return false;" HIDEFOCUS><img name="popcal" align="absmiddle" src="images/icon/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					'._TO.'
					<input type="text" name="date_to"  size="12" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.date_to);return false;" HIDEFOCUS><img name="popcal" align="absmiddle" src="images/icon/calbtn.gif" width="34" height="22" border="0" alt=""></a>
				</td>
				</tr>';
				echo '<tr><td></td><td><button  class=btnButton onclick="submit();"><img src="themes/Employers/images/admin/24-zoom-fill.png" align=absmiddle> '._SEARCH.'</button></td></tr>';
			echo '</form>';
			echo '</table>';
			echo"
			<iframe width=199 height=178 name=\"gToday:normal:agenda.js\" id=\"gToday:normal:agenda.js\" src=\"WeekPicker/ipopeng.htm\" scrolling=\"no\" frameborder=\"0\" style=\"visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;\">
			</iframe>"
		  .'<table class=SmallTable align=center >';
		 echo "<form name=\"frmCheckAll\" method=\"POST\" action=\"admin.php?op=DeleteAllSystemLog\">";
		 echo""
			."<tr>"	
			."<td class=tdTable height='23'><font class=\"titleTD\">"._POSITION."</font></td>"
			."<td class=tdTable><font class=\"titleTD\">"._WEBADMIN."</font></td>"
			."<td class=tdTable><font class=\"titleTD\">"._MODULE."</font></td>"
			."<td class=tdTable><font class=\"titleTD\">"._MODULEFUNC."</font></td>"
			."<td class=tdTable><font class=\"titleTD\">"._LASTUPDATE."</font></td>"
			."<td class=tdTable nowrap><a href=\"javascript:SelectAll()\" ><img src=\"images/icon/checkall.bmp\" border=0 alt =\"Check All\"></a><a href=\"javascript:UnSelectAll()\" ><img src=\"images/icon/uncheckall.bmp\" border=0 alt =\"UnCheck All\"></a></td>"
			."<td class=tdTable nowrap><font class=\"titleTD\">"._FUNCTIONS."</font></td></tr>";
		$counter = 0;
		$tt=1;
	    while(list($id,$aid,$module, $lastupdate,$logaction) = mysql_fetch_row($result)) {
			if($counter % 2 == 0){
				$tblColor = "tblColor1";
				$colorTD = "#ffffff";
			}else{
				$tblColor = "tblColor2";
				$colorTD = "#f4f4f4";
			}
			$counter++; global $bgcolor3;

			echo "<tr class=\"$tblColor\"  onmouseover=\"if(this != current_row) {this.style.backgroundColor ='#D0DEF0';this.style.color='red'}\" onmouseout=\"if(this!=current_row){this.style.backgroundColor='".$colorTD."';;this.style.color='#111111'}\">";				
			echo "<td align=\"center\">$tt</td>";
	
			echo "<td align=\"left\">$aid</td>";
			echo "<td align=\"left\">$module</td>";
			echo "<td align=\"left\">$logaction</td>";

			echo "<td align=\"center\">".strftime(_DATETIME, $lastupdate)."</td>";
			echo "<td align=\"center\"><INPUT TYPE=\"checkbox\" NAME=\"id[]\" value=\"$id\"></td>";
		    echo "<td align=\"center\" nowrap>		
					<A HREF=\"admin.php?mod_name=$mod_name&op=DeleteSystemLog&id=$id\" onclick = \"return deleteConfirm('"._SUREDELETE."  $title ?')\"
					onmouseover=\"roll('Del$id', 'images/icon/btn_delete_over.gif')\" 
					onmouseout=\"roll('Del$id', 'images/icon/btn_delete_down.gif')\">
					<IMG SRC=\"images/icon/btn_delete_down.gif\"  BORDER=\"0\" 
					ALT=\""._DELETE." $title\" NAME=\"Del$id\">
					</A>
			</td></tr>";
			$tt++;	
    	}
echo "</form>";
		echo "<tr><td class=footerCell align=\"left\" colspan=\"5\" height='23'>";
			split_pages($query,$link);
		echo"</td>";
		echo "<td  align=\"center\"  height='23'><BUTTON style=\"height: 20;BORDER-TOP-WIDTH: 1px; BORDER-LEFT-WIDTH: 1px; FONT-SIZE: 10px; BACKGROUND: #fef7e9; BORDER-BOTTOM-WIDTH: 1px; FONT-FAMILY: 'Verdana'; BORDER-RIGHT-WIDTH: 1px\" name=cmdsubmit onclick=\"CheckSubmit()\">"._DELETESELECTED."</BUTTON></td></tr>";
	    echo "</table></div>";
	}	
include("footer.php");
}
//====================================================================
function DeleteSystemLog($id){
	global $prefix_admin;
	mysql_query("Delete from $prefix_admin"._system_log." where id= '$id' ");
	Header("Location: admin.php?op=SystemLog");
}
//====================================================================
function DeleteAllSystemLog(){
	global $prefix_admin;
		if(count($_POST[id])>0){
			for($i=0;$i<sizeof($_POST[id]);$i++){			
				DeleteSystemLog($_POST[id][$i]);
			}
		}
	Header("Location: admin.php?op=SystemLog");
}

function Changepass(){
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$aid;
	include("header.php");
	
	if($_POST['UpdatePass']){
	$passold=$_POST['passold'];
	$passnew=$_POST['passnew'];
	
	
	if($passold == $passnew){
		
		mysql_query("UPDATE portal_authors SET pwd='".(md5($passold))."'
					 
					,email='".$_POST['email']."' 
					WHERE aid='$aid'");
				
				cookiedecode($user);
	$r_uid = $cookie[0];
	$r_username = $cookie[1];
	setcookie("user", false);
	setcookie("user", "");

	$db->sql_query("DELETE FROM ".$prefix."_session WHERE uname='$r_username'");
	$db->sql_query("DELETE FROM ".$prefix."_bbsessions WHERE session_client_id='$r_uid'");
	$user = "";
	Header("Location: index.php");
		

					
				 
				
		
	}else{
	
	echo "<script>alert('Mật khẩu của bạn không khớp . Xin mời nhập lại');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
	
	}
	
	}
	
	
	$sql_user=mysql_query("Select aid,email from  portal_authors where aid='$aid'");
	list($aid,$email)=mysql_fetch_array($sql_user);
	
	echo '
	<div class="blockhome" style="min-height:300px">
<div class="titlehome">
<h3>Cập nhật công việc</h3>
</div>

	<form method="post" action="">
	<div style="height:30px"></div>
<table width="750" cellpadding="8" bordercolor="#B2DAEE" border="1" style="border-collapse: collapse;" align="center">
	 <tr id="tieude" bgcolor="#f6f6f6"><td  colspan="2" align="center">&nbsp;&nbsp;&nbsp;<span id="TextLeftCenter2m"><b>Đổi mật khẩu</b></span> </td>  </tr>

  <tr>
    <td width="30%" height="32" align="right"><div align="right">Mật khẩu mới</div></td>
    <td width="70%"><label>
    <input type="password" name="passold">
    </label></td>
  </tr>
  <tr>
    <td height="32" align="right"><div align="right">Nhập lại mật khẩu</div></td>
    <td><input type="password" name="passnew"></td>
  </tr>
  
 
  
   <tr>
    <td  class="height_row"><div align="right">Email</div></td>
    <td  class="height_row"><label>
      <input type="text" name="email" size="40"  value="'.$email.'"   />
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="UpdatePass" value="Đổi mật khẩu">
   
    </label></td>
  </tr>
  <tr><td colspan="2"><i><font color="blue">Chú ý để đảm bảo tính bảo mật thông tin . Sau khi đổi mật khẩu, bạn hãy xóa cookie (lịch sử) của trình duyệt bằng cách <br>
  Bạn làm như sau : Bạn chọn 3 phím 1 lúc <b>Ctrl + Shift + Delete </b>-- > hiện lên hộp hội thoại -- > bạn chọn xóa lịch sử hôm nay </font></i>
   </td></tr>
  
</table>
</form></div>';


include("footer.php");
}

//===================thiet lap nam
function Setup_year(){
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename,$db;
	include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	
	
	$xtpl = new XTemplate('admin/htmls/Setting/Setup_year.html');
	$xtpl->assign("portalurl",$portalurl);	
	
	
	
	include 'cofix.php';


$sql = "SHOW TABLES FROM $dbname";
$result = mysql_query($sql);

if (!$result) {
    echo "DB Error, could not list tables\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
$stt=0;
while ($row = mysql_fetch_row($result)) {
	$stt++;
	
	$bang=$row[0];
	
	$xtpl->assign("stt",$stt); 
	
	$xtpl->assign("bang",$bang); 
	
	$xtpl->parse("MAIN.tables");
    //echo "Table: {$row[0]}\n"."<br>";
}

mysql_free_result($result);
	//
	
	
	if($_POST['Send_setup']){
	
	
	




// Create table
$sql="
CREATE TABLE portal_".$_POST['tables']."
(
id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id)
)";

// Execute query
if (mysqli_query($con,$sql)) {
  //echo "Table persons created successfully";
} else {
 // echo "Error creating table: " . mysqli_error($con);
}




	
	Header("Location: thiet-lap-nam-van-ban");
	}
	
	$xtpl->parse('MAIN');
	$xtpl->out('MAIN');	
	
	
	include 'bottom.php';
	}

/*********************************************************/

	switch($op) {

		case "Configure":
		Configure();
		break;


	

		case "Setup_year":
		Setup_year();
		break;
		
		case "Changepass":
		Changepass();
		break;

		case "ConfigSave":
		ConfigSave();
		break;

		case "SystemSave":
		SystemSave();
		break;

		case "SeoTag":
		SeoTag();
		break;

		case "UpdateTagSeo":
		UpdateTagSeo();
		break;

		case "DelSeoTag":
		DelSeoTag($id);
		break;

    case "LogSystem":
    LogSystem();
    break;

    case "DeleteSystemLog":
    DeleteSystemLog($id);
    break;


    case "DeleteAllSystemLog":
    DeleteAllSystemLog();
    break;


	}

} else {
	echo "Access Denied";
}

?>