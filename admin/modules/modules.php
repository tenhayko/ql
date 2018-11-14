<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php

/************************************************************************/
/* PHP-NUKE: Web Portal System                                          */
/* ===========================                                          */
/*                                                                      */
/* Copyright (c) 2002 by Francisco Burzi                                */
/* http://phpnuke.org                                                   */
/*                                                                      */
/* This program is free software. You can redistribute it and/or modify */
/* it under the terms of the GNU General Public License as published by */
/* the Free Software Foundation; either version 2 of the License.       */
/************************************************************************/
if (!defined('ADMIN_FILE')) {
	die ("Access Denied");
}
$module_admin = 'modules';
global $prefix, $db, $admin_file,$aid,$module_name;
if (!@eregi("".$admin_file.".php", $_SERVER['PHP_SELF'])) { die ("Access Denied"); }
$aid = trim($aid);
// checkPrivateModule("Admin",$aid);
//mysql_query("Insert into $prefix"._system_log." values('','$aid','Modules','','','".time()."','Add')");

$admin_file="admin";
/*********************************************************/
/* Modules Functions                                     */
/*********************************************************/

function modules() {
    global $prefix, $db, $dbi, $multilingual, $admin_file,$id,$f,$module_admin;
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename;
    include ("header.php");
   
    $handle=opendir('modules');
    while ($file = readdir($handle)) {
	if ( (!ereg("[.]",$file)) ) {
		$modlist .= "$file ";
	}
    }
    closedir($handle);
    $modlist = explode(" ", $modlist);
    sort($modlist);
    for ($i=0; $i < sizeof($modlist); $i++) {
	if($modlist[$i] != "") {
	    $result = sql_query("select mid from ".$prefix."_modules where title='$modlist[$i]'", $dbi);
	    list ($mid) = sql_fetch_row($result, $dbi);
            $mid = intval($mid);
	    if ($mid == "") {
		sql_query("insert into ".$prefix."_modules values (NULL, '$modlist[$i]', '$modlist[$i]', '$modlist[$i]', '0', '0', '0', '0','1')", $dbi);
	    }
	}
    }
    $result = sql_query("select title from ".$prefix."_modules", $dbi);
    while (list($title) = sql_Fetch_row($result, $dbi)) {
	$a = 0;
	$handle=opendir('modules');
	while ($file = readdir($handle)) {
	    if ($file == $title) {
		$a = 1;
	    }
	}
	closedir($handle);
	if ($a == 0) {
	    sql_query("delete from ".$prefix."_modules where title='$title'", $dbi);
	}
    }


	echo '
	<div class="blockhome" style="min-height:300px">
<div class="titlehome">
<h3> Thông tin Phòng ban</h3>
</div>';
echo "<table width=\"100%\"  cellSpacing=0  border=\"1\" style=\"border-collapse: collapse\">";
		 echo""
			."<tr>"	
			."<td class=MenuCell align=\"center\"  height='23' colspan=2>"._POSITION."</td>"
			."<td class=MenuCell align=\"center\">Tên module</td>"
			."<td class=MenuCell align=\"center\">"._VIETNAMESE."</td>"
			."<td class=MenuCell align=\"center\">Tiếng anh</td>"
			."<td class=MenuCell align=\"center\">"._STATUS."</td>"
			."<td class=MenuCell align=\"center\">"._VIEW."</td>"
			."<td class=MenuCell align=\"center\">"._GROUP."</td>"
			."<td class=MenuCell align=\"center\" nowrap>"._FUNCTIONS."</td></tr>";
		$counter = 0;		
		$stt=1;

    $main_m = sql_query("select main_module from ".$prefix."_main", $dbi);
    list($main_module) = sql_fetch_row($main_m, $dbi);
    $result = sql_query("select mid, title, custom_title_vietnamese ,custom_title_english, active, view, inmenu, mod_group,sortorder  from ".$prefix."_modules order by sortorder", $dbi);
    while (list($mid, $title, $custom_title_vietnamese,$custom_title_english, $active, $view, $inmenu, $mod_group,$sortorder) = sql_fetch_row($result, $dbi)) {
        $mid = intval($mid);
				if ($custom_title == "") {
					$custom_title = ereg_replace("_"," ",$title);
					sql_query("update ".$prefix."_modules set custom_title='$custom_title' where mid='$mid'", $dbi);
				}
				if ($active == 1) {
					$active = "<img src=\"images/admin/active.gif\" alt=\""._ACTIVE."\" title=\""._ACTIVE."\" border=\"0\" width=\"16\" height=\"16\">";
					$change = "<img src=\"images/admin/inactive.gif\" alt=\""._DEACTIVATE."\" title=\""._DEACTIVATE."\" border=\"0\" width=\"16\" height=\"16\">";
					$act = 0;
				} else {
					$active = "<img src=\"images/admin/inactive.gif\" alt=\""._INACTIVE."\" title=\""._INACTIVE."\" border=\"0\" width=\"16\" height=\"16\">";
					$change = "<img src=\"images/admin/active.gif\" alt=\""._ACTIVATE."\" title=\""._ACTIVATE."\" border=\"0\" width=\"16\" height=\"16\">";
					$act = 1;
				}
				if ($custom_title == "") {
					$custom_title = ereg_replace("_", " ", $title);
				}
				if ($view == 0) {
					$who_view = _MVALL;
				} elseif ($view == 1) {
					$who_view = _MVUSERS;
				} elseif ($view == 2) {
					$who_view = _MVADMIN;
				}
				if ($title != $main_module AND $inmenu == 0) {
					$title = "[ <big><strong>&middot;</strong></big> ] $title";
				}
				if ($title == $main_module) {
					$title = "<b>$title</b>";
					$custom_title = "<b>$custom_title</b>";
					$active = "$active <img src=\"images/admin/checked.gif\" alt=\""._INHOME."\" title=\""._INHOME."\" border=\"0\" width=\"17\" height=\"17\">";
					$who_view = "<b>$who_view</b>";
					$puthome = "<img src=\"images/admin/unchecked.gif\" alt=\""._INHOME."\" title=\""._INHOME."\" border=\"0\" width=\"17\" height=\"17\">";
					$change_status = "$change";
					$background = "bgcolor=#D0DEF0";

				} else {
					$puthome = "<a href=\"".$admin_file.".php?op=home_module&mid=$mid\"><img src=\"images/admin/checked.gif\" alt=\""._PUTINHOME."\" title=\""._PUTINHOME."\" border=\"0\" width=\"17\" height=\"17\"></a>";
					$change_status = "<a href=\"".$admin_file.".php?op=module_status&mid=$mid&active=$act\">$change</a>";
					$background = "";
				}
				if ($mod_group != 0) {
					$grp = $db->sql_fetchrow($db->sql_query("SELECT name FROM ".$prefix."_groups WHERE id='$mod_group'"));
					$mod_group = $grp[name];
				} else {
					$mod_group = _NONE;
				}
				if($inmenu==1){
					$show_div = "<a href=\"admin.php?op=modules&mid=$mid&id=$stt\" ><img src=\"images/admin/pkg-closed.gif\" border=0></a>";
					$setup = "<a href=\"admin.php?op=SetupModule&mid=$mid&inmenu=0\"><img src=\"images/admin/hmenu-unlock.gif\" border=0 alt=\""._SETUPMODULE."\"></a>";
				}else{
					$show_div="<img src=\"images/admin/pkg-open.gif\" border=0>";
					$setup = "<a href=\"admin.php?op=SetupModule&mid=$mid&inmenu=1\"><img src=\"images/admin/hmenu-lock.gif\" border=0 alt=\""._SETUPMODULE."\"></a>";
	
				}
				if($counter % 2 == 0){


					$tblColor = "tblColor1";
					$colorTD = "#ffffff";
				}else{
					$tblColor = "tblColor2";
					$colorTD = "#f4f4f4";
				}

			$counter++; global $bgcolor3;
			IF($id==$stt){
				IF($f=="edit"){
					    $resultedit = sql_query("select custom_title_vietnamese, custom_title_english, view, active  from ".$prefix."_modules where mid='$mid'", $dbi);
						list($edit_title_vietnamese,$edit_title_english, $edit_view, $edit_active) = sql_fetch_row($resultedit, $dbi);
					echo "<form method=POST action=\"admin.php?op=module_edit_save\">";
					echo "<tr class=\"$tblColor\"  onmouseover=\"if(this != current_row) {this.style.backgroundColor ='#D0DEF0';this.style.color='red'}\" onmouseout=\"if(this!=current_row){this.style.backgroundColor='".$colorTD."';;this.style.color='#111111'}\">";
						echo "<td align=center $background>$show_div</td>";
						echo "<td align=center $background>$stt</td>";
						echo "<td $background>$title</td>";
						echo "<td $background><INPUT TYPE=\"text\" NAME=\"edit_title_vietnamese\" value=\"$edit_title_vietnamese\" style=\"width:100%\"></td>";
						echo "<td $background><INPUT TYPE=\"text\" NAME=\"edit_title_english\" value=\"$edit_title_english\" style=\"width:100%\"></td>";
						echo "<td $background><select name=\"edit_active\"><option value=\"1\" ".($edit_active == 1 ?  "checked" : "").">"._YES."</option><option value=\"0\" ".($edit_active == 0 ?  "checked" : "").">"._NO."</option></select></td>";
						echo "<td $background><select name=\"edit_view\"><option value=\"0\" ".($edit_view == 0 ?  "checked" : "").">"._MVALL."</option><option value=\"1\" ".($edit_view == q ?  "checked" : "").">"._MVUSERS."</option><option value=\"2\" ".($edit_view == 2 ?  "checked" : "").">"._MVADMIN."</option></select></td>";
						echo "<td $background>$mod_group</td>";
						echo '<td align=center '.$background.'>						
							<div class="rc_navigation">
							<div id="incomplete_button" >
								<div class="rc_btnicon_renew"><input type="button" value="'._UPDATE.'" class="rc_btnicon" onclick="submit();" /></div>
							</div>
							</div>	
						</td>';
						echo "</tr>";
							echo "<input type=\"hidden\" name=\"mid\" value=\"$mid\">";
					echo "</form>";
				}ELSE{
					echo "<tr class=\"$tblColor\"  onmouseover=\"if(this != current_row) {this.style.backgroundColor ='#D0DEF0';this.style.color='red'}\" onmouseout=\"if(this!=current_row){this.style.backgroundColor='".$colorTD."';;this.style.color='#111111'}\">";
						echo "<td align=center $background>$show_div</td>";
						echo "<td align=center $background>$stt</td>";
						echo "<td $background>$title</td>";
						echo "<td $background>$custom_title_vietnamese</td>";
						echo "<td $background>$custom_title_english</td>";
						echo "<td $background>$active</td>";
						echo "<td $background>$who_view</td>";
						echo "<td $background>$mod_group</td>";
						echo "<td align=center $background><a href=\"".$admin_file.".php?op=modules&mid=$mid&id=$stt&f=edit\"><img src=\"images/admin/edit.gif\" alt=\""._EDIT."\" title=\""._EDIT."\" border=\"0\" width=\"17\" height=\"17\"></a>  $change_status  $puthome &nbsp; <a href=\"admin.php?op=Help_module&mid=$title\"><img src=\"images/admin/menu_help.gif\" border=0></a></td>";
						echo "</tr>";
						echo "<tr >";
							echo "<td align=center colspan=2 class=testCell><a href=\"admin.php?op=modules\"><img src=\"images/admin/pkg-open.gif\" border=0></a></td>";
							echo "<td colspan=6>";
									echo "<table class=tableTiny id='table1'>";
									echo "<tr><td>"._STT."</td><td>"._FUNCSENGLISH."</td><td>"._FUNCSVIETNAMESE."</td><td>"._FUNCURL."</td></tr>";
									echo "<form method=POST action=\"admin.php?op=AddFuncsModule\" name=theForm>";
									for($j=0;$j<18;$j++){
										$k=$j+1;
										$res_funcs = mysql_query("Select fid,title_vietnamese ,title_english ,url,sort_order  from $prefix"._modules_functions." where mid = '$mid' order by sort_order limit $j,1 ");						
										list($fid,$title_vietnamese ,$title_english ,$url,$sort_order )=mysql_fetch_row($res_funcs);
										echo "<tr>
											<td><input TYPE=\"text\" NAME=\"sortorder[]\" value=\"$sort_order\" size=1></td>
											<td><input TYPE=\"text\" NAME=\"funcs_english[]\" value=\"$title_english \"></td>
											<td><INPUT TYPE=\"text\" NAME=\"funcs_vietnamese[]\" value=\"$title_vietnamese\"></td>
											<td><INPUT TYPE=\"text\" NAME=\"funcs_url[]\" size=40 value=\"$url\">
											
												<A HREF=\"admin.php?op=DelFuncsModule&mid=$mid&id=$id&fid=$fid\" 
												onmouseover=\"roll('Del$fid', 'images/admin/delete.gif')\" 
												onmouseout=\"roll('Del$fid', 'images/admin/delete_x.gif')\">
												<IMG SRC=\"images/admin/delete_x.gif\"  BORDER=\"0\" 
												ALT=\""._DELETE." $title_english\" NAME=\"Del$fid\">
												</A>									
											</td>
											</tr>";
									}
									echo "</table>";
							echo"</td>";
							echo '<td align=center>
									<div class="rc_navigation">
									<div id="incomplete_button" >
										<div class="rc_btnicon_renew"><input type="button" value="'._UPDATE.'" class="rc_btnicon" onclick="submit();" /></div>
									</div>
									</div>								
								</td>';
							echo "<input type=\"hidden\" name=\"mid\" value=\"$mid\">";
							echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
						echo "</form>";
						echo "</tr>";
				}
			}else{
			echo "<tr class=\"$tblColor\"  onmouseover=\"if(this != current_row) {this.style.backgroundColor ='#D0DEF0';this.style.color='red'}\" onmouseout=\"if(this!=current_row){this.style.backgroundColor='".$colorTD."';;this.style.color='#111111'}\">";
				echo "<td align=center $background>$show_div</td>";
				echo "<td align=center $background>$stt</td>";
				echo "<td $background>$title</td>";
				echo "<td $background>$custom_title_vietnamese</td>";
				echo "<td $background>$custom_title_english</td>";
				echo "<td $background>$active</td>";
				echo "<td $background>$who_view</td>";
				echo "<td $background>$mod_group</td>";
				echo "<td align=center $background><a href=\"".$admin_file.".php?op=modules&mid=$mid&id=$stt&f=edit\"><img src=\"images/admin/edit.gif\" alt=\""._EDIT."\" title=\""._EDIT."\" border=\"0\" width=\"17\" height=\"17\"></a>  $change_status  $puthome &nbsp; $setup <a href=\"admin.php?op=Help_module&mid=$title\"><img src=\"images/admin/menu_help.gif\" border=0></a></td>";
			echo "</tr>";
			}
			$stt++;

    }

    echo "</table>";

echo '</div>

	';

	

    
}
function AddFuncsModule(){
	global $prefix;
		if((count($_POST[funcs_english])>0 || count($_POST[funcs_vietnamese])>0) && count($_POST[funcs_url])>0){
			$res = mysql_query("Delete from $prefix"._modules_functions." where mid = '$_POST[mid]'");

			for($i=0;$i<sizeof($_POST[funcs_url]);$i++){			
				if($_POST[funcs_url][$i]){
					mysql_query("Insert into $prefix"._modules_functions." values(NULL,'$_POST[mid]','".$_POST[funcs_vietnamese][$i]."','".$_POST[funcs_english][$i]."','".$_POST[funcs_url][$i]."','".$_POST[sortorder][$i]."')");
				}
			}
		}

    Header("Location: admin.php?op=modules&mid=$_POST[mid]&id=$_POST[id]");
}
function DelFuncsModule($mid,$id,$fid){
	global $prefix;
	mysql_query("Delete from $prefix"._modules_functions." where fid = '$fid'  ");
    Header("Location: admin.php?op=modules&mid=$mid&id=$id");

}
function SetupModule($mid,$inmenu){
	global $prefix;
	mysql_query("update $prefix"._modules." set inmenu = '$inmenu' where mid = '$mid'  ");
    Header("Location: admin.php?op=modules&mid=$mid");
}
function home_module($mid, $ok=0) {
    global $prefix, $dbi;
    $mid = intval($mid);
    if ($ok == 0) {
	include ("header.php");
	GraphicAdmin();
	title(""._HOMECONFIG."");
	OpenTable();
	$result = sql_query("select title from ".$prefix."_modules where mid='$mid'", $dbi);
	list($new_m) = sql_fetch_row($result, $dbi);
	$result = sql_query("select main_module from ".$prefix."_main", $dbi);
	list($old_m) = sql_fetch_row($result, $dbi);
	echo "<center><b>"._DEFHOMEMODULE."</b><br><br>"
	    .""._SURETOCHANGEMOD." <b>$old_m</b> "._TO." <b>$new_m</b>?<br><br>"
	    ."[ <a href=\"admin.php?op=modules\">"._NO."</a> | <a href=\"admin.php?op=home_module&mid=$mid&ok=1\">"._YES."</a> ]</center>";
	CloseTable();
	include("footer.php");
    } else {
	$result = sql_query("select title from ".$prefix."_modules where mid='$mid'", $dbi);
	list($title) = sql_fetch_row($result, $dbi);
	$active = 1;
	$view = 0;
	$result = sql_query("update ".$prefix."_main set main_module='$title'", $dbi);
	$result = sql_query("update ".$prefix."_modules set active='$active', view='$view' where mid='$mid'", $dbi);
	Header("Location: admin.php?op=modules");
    }
}

function module_status($mid, $active) {
    global $prefix, $dbi;
    $mid = intval($mid);
    sql_query("update ".$prefix."_modules set active='$active' where mid='$mid'", $dbi);
    Header("Location: admin.php?op=modules");
}

function module_edit($mid) {
    global $prefix, $dbi, $db;
    $main_m = sql_query("select main_module from ".$prefix."_main", $dbi);
    list($main_module) = sql_fetch_row($main_m, $dbi);
    $mid = intval($mid);
    $result = sql_query("select title, custom_title, view, inmenu, mod_group from ".$prefix."_modules where mid='$mid'", $dbi);
    list($title, $custom_title, $view, $inmenu, $mod_group) = sql_fetch_row($result, $dbi);
    include ("header.php");
    GraphicAdmin();
    title(""._MODULEEDIT."");
    OpenTable();
    if ($view == 0) {
	$sel1 = "selected";
	$sel2 = "";
	$sel3 = "";
    } elseif ($view == 1) {
	$sel1 = "";
	$sel2 = "selected";
	$sel3 = "";
    } elseif ($view == 2) {
	$sel1 = "";
	$sel2 = "";
	$sel3 = "selected";    
    }
    if ($title == $main_module) {
	$a = " - "._INHOME."";
    } else {
	$a = "";
    }
    if ($inmenu == 1) {
	$insel1 = "checked";
	$insel2 = "";
    } elseif ($inmenu == 0) {
	$insel1 = "";
	$insel2 = "checked";
    }
    echo "<center><b>"._CHANGEMODNAME."</b><br>($title$a)</center><br><br>"
	."<form action=\"admin.php\" method=\"post\">"
	."<table border=\"0\"><tr><td>"
	.""._CUSTOMMODNAME."</td><td>"
	."<input type=\"text\" name=\"custom_title\" value=\"$custom_title\" size=\"50\"></td></tr>";
    if ($title == $main_module) {
	echo "<input type=\"hidden\" name=\"view\" value=\"0\">"
	    ."<input type=\"hidden\" name=\"inmenu\" value=\"$inmenu\">"
	    ."</table><br><br>";
    } else {
	echo "<tr><td>"._VIEWPRIV."</td><td><select name=\"view\">"
	    ."<option value=\"0\" $sel1>"._MVALL."</option>"
	    ."<option value=\"1\" $sel2>"._MVUSERS."</option>"
	    ."<option value=\"2\" $sel3>"._MVADMIN."</option>"
	    ."</select></tr></td>";
	$numrow = $db->sql_numrows($db->sql_query("SELECT * FROM ".$prefix."_groups"));
	if ($numrow > 0) {
	    echo "<tr><td>"._UGROUP."</td><td><select name=\"mod_group\">";
    	    $sql = "SELECT id, name FROM ".$prefix."_groups";
	    $result = $db->sql_query($sql);
	    while ($row = $db->sql_fetchrow($result)) {
		if ($row[id] == $mod_group) { $gsel = "selected"; } else { $gsel = ""; }
		if ($dummy != 1) {
		    if ($mod_group == 0) { $ggsel = "selected"; } else { $ggsel = ""; }
		    echo "<option value=\"0\" $ggsel>"._NONE."</option>";
		    $dummy = 1;
		}
		echo "<option value=\"$row[id]\" $gsel>$row[name]</option>";
		$gsel = "";
	    }
	    echo "</select>&nbsp;<i>("._VALIDIFREG.")</i></td></tr>";
	} else {
	    echo "<input type=\"hidden\" name=\"mod_group\" value=\"0\">";
	}
	echo "<tr><td>"._SHOWINMENU."</td><td>"
	    ."<input type=\"radio\" name=\"inmenu\" value=\"1\" $insel1> "._YES." &nbsp;&nbsp; <input type=\"radio\" name=\"inmenu\" value=\"0\" $insel2> "._NO.""
	    ."</td></tr></table><br><br>";
    }
    if ($title != $main_module) {
	
    }
    echo "<input type=\"hidden\" name=\"mid\" value=\"$mid\">"
	."<input type=\"hidden\" name=\"op\" value=\"module_edit_save\">"
	."<input type=\"submit\" value=\""._SAVECHANGES."\">"
	."</form>"
	."<br><br><center>"._GOBACK."</center>";
    CloseTable();
    include("footer.php");
}

function module_edit_save() {
    global $prefix, $dbi;
    $mid = $_POST[mid];
	$edit_title_vietnamese = $_POST[edit_title_vietnamese];
	$edit_title_english = $_POST[edit_title_english];
	$edit_active = $_POST[edit_active];
	$edit_view = $_POST[edit_view];
    $result = sql_query("update ".$prefix."_modules set custom_title_vietnamese='$edit_title_vietnamese',custom_title_english='$edit_title_english', view='$edit_view', active='$edit_active'  where mid='$mid'", $dbi);
    Header("Location: admin.php?op=modules");
}
//===============================================
function Help_module($mid){
	include("header.php");
	$res = mysql_query("select content from $prefix"._modules_help." where module = '$mid' ");
	echo '<form method=POST action="admin.php?op=Help_module">';
		echo '<div class=row_div>MODULES: '.SelectBox("mid","Select title, custom_title_vietnamese from $prefix"._modules." ",$mid,$onchange='1',$style='',$onclick='',$other='',$title=_SELECTONE).'</div>';
	echo '</form>';
	list($content)=mysql_fetch_row($res);
		echo '<form method="POST" action="admin.php?op=Update_Help_Module">';
		if(mysql_num_rows($res)){
			echo '<INPUT TYPE="hidden" NAME="action" value="Edit">';
		}
		echo '<INPUT TYPE="hidden" NAME="mid" value="'.$mid.'">';
			echo '<TEXTAREA NAME="content" style="width:99%;height:400px;" id=Webcontent>'.$content.'</TEXTAREA>';

echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage()" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	 <div style="clear:both"></div></form>
';	
include("footer.php");
}
//===============================================
function Update_Help_Module(){
	global $prefix;
	IF($_POST[action]){
		mysql_query("Update $prefix"._modules_help." set content =  '$_POST[content]' where module = '$_POST[mid]' ");
	}ELSE{
		mysql_query("Insert into $prefix"._modules_help." values('$_POST[mid]','$_POST[content]')");
	}
    Header("Location: admin.php?op=modules");

}
//===============================================
function Help(){

	global $prefix,$mid,$keyword;


	echo '<div style="float:left;background:url(\'images/admin/box1.png\');width:63px;height:80px;"></div>';
	echo '<div style="float:left;background:url(\'images/admin/box.png\');width:740px;height:80px;">';
	echo '<form method=POST action="admin.php?op=Help">';
			echo'
				<div style="float:left;padding-top:25px;">'.SelectBox("mid","Select title, custom_title_vietnamese from $prefix"._modules." ",$mid,$onchange='1',$style='height:33px;border: 2px solid #cccccc;color:#777;font-weight:bold',$onclick='',$other='',$title=_SELECTONE).'</div>
				<div style="float:left;padding-left:210px;padding-top:20px;"><INPUT TYPE="text" NAME="keyword"  style="width:200px;height:30px;border: 2px solid #cccccc;color:#777;font-weight:bold;padding-top:5px;" value="Tìm kiếm" onfocus="if (this.value==\'Tìm kiếm\') this.value=\'\'" onblur="if (this.value==\'\') this.value=\'Tìm kiếm\';"></div>
				<div style="float:left;padding-top:20px;"><INPUT TYPE="image" src="images/admin/searchM.png" style="height:58px;width:70px;"></div>
		 </form>	
	</div>';
	echo '<div style="float:left;background:url(\'images/admin/box2.png\');width:41px;height:80px;"></div>';
	echo ' <div style="clear:both"></div>';
	include('header.php');	
	if($keyword && $keyword != 'Tìm kiếm') $where = "AND content like '%$keyword%' ";
		$res = mysql_query("select content from $prefix"._modules_help." where module = '$mid' $where");
		list($content)=mysql_fetch_row($res);
		echo '<div style="padding:20px;overflow: auto;height:500px;">';
			echo $content;
		echo '</div>';
	include('footer.php');	

}
//===============================================
//===============================================
//===============================================
//===============================================
//===============================================
switch ($op){
    case "Help":
    Help();
    break;

    case "Update_Help_Module":
    Update_Help_Module();
    break;

    case "Help_module":
    Help_module($mid);
    break;

    case "modules":
    modules();
    break;

    case "module_status":
    module_status($mid, $active);
    break;

    case "module_edit":
    module_edit($mid);
    break;
    
    case "module_edit_save":
    module_edit_save();
    break;

    case "home_module":
    home_module($mid, $ok);
    break;

    case "AddFuncsModule":
    AddFuncsModule();
    break;

    case "DelFuncsModule":
    DelFuncsModule($mid,$id,$fid);
    break;

    case "SetupModule":
    SetupModule($mid,$inmenu);
    break;

}



?>