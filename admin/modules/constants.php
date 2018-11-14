<?php
if (!@eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
// checkPrivateModule("Admin",$aid);

	include("admin/language/lang-$currentlang.php");
	function backuprotate($file_path,$num_backup_files) {
		$dir_name = dirname($file_path);
		$file_name = basename($file_path);
		if (!is_dir($dir_name."/backup")) {
			if (!mkdir($dir_name."/backup",0777)) {
				return 0;
			}
		}
		for ($i=$num_backup_files;$i>0;$i--) {
			if(is_file($dir_name."/backup/".($i-1)."-".$file_name)) {
				if (!rename($dir_name."/backup/".($i-1)."-".$file_name,$dir_name."/backup/".($i)."-".$file_name))
					return 0;
			} else {
				if (!copy($file_path,$dir_name."/backup/".($i)."-".$file_name))
					return 0;
			}
		}
		return 1;
	}

	function langFile2array($filename,$sortField=0) {
		$arrDefine = array();
		if (!is_file($filename)) {
			return $arrDefine;
		}

//		$inc_pattern = "define[^\(]*\([^\"]*\"([^\"]*)\"[^,]*,[^\"]*\"(.*)\"\);";
		$inc_pattern = "define[^\(]*\(([^,]+),[^\"]*\"(.*)\"\);";
		$arrFile = file($filename);
		if (count($arrFile) > 0) {
			for ($i=0;$i<count($arrFile);$i++) {
				if (@eregi($inc_pattern, $arrFile[$i],$founds)) {
//					$arrDefineNames[] = $founds[1];
					$arrDefineNames[] = trim($founds[1],"\"");
					$arrDefineValues[] = $founds[2];
				}
			}
			if (count($arrDefineNames) > 0) {
				if ($sortField) {
					array_multisort($arrDefineValues,$arrDefineNames);
				} else {
					array_multisort($arrDefineNames,$arrDefineValues);
				}
				for ($i=0;$i<count($arrDefineNames);$i++) {
					$arrDefine[] = $arrDefineNames[$i];
					$arrDefine[] = htmlspecialchars(stripslashes($arrDefineValues[$i]));
				}
			}
		}
		return $arrDefine;
	}


	function synLangDirDb() {
		global $prefix, $dbi, $mod_name, $adminFile;

		$handle=opendir('modules');
		readdir($handle);
		readdir($handle);
		while ($file = readdir($handle)) {
			if (is_dir("modules/$file")) {
				$modlist .= "$file ";
			}
		}
		closedir($handle);
		$modlist = explode(" ", $modlist);
		sort($modlist);
		for ($i=0; $i < sizeof($modlist); $i++) {
			if($modlist[$i] != "") {
				$result = mysql_query("select constdir_id from ".$prefix."_constants_dirs where constdir_title='".$modlist[$i]."' AND constdir_static='0'", $dbi);
				list ($constdir_id) = mysql_fetch_row($result);
				if ($constdir_id == "") {
					mysql_query("insert into ".$prefix."_constants_dirs SET constdir_path='modules/".$modlist[$i]."/language', constdir_title='".$modlist[$i]."'", $dbi);
				}
			}
		}
		$result = mysql_query("select constdir_title from ".$prefix."_constants_dirs", $dbi);
		while (list($title) = mysql_fetch_row($result)) {
			if (!in_array($title,$modlist)) {
				mysql_query("delete from ".$prefix."_constants_dirs where constdir_title='$title' AND constdir_static='0'", $dbi);
			}
		}
		Header("Location: $adminFile?mod_name=$mod_name&op=mod_constants");
	}



	function mod_constants() {
		global $prefix, $dbi, $mod_name, $adminFile;
		include ("header.php");

		$dynamic_constdir = "";
		$static_constdir = "";
		$result = mysql_query("SELECT constdir_id, constdir_path, constdir_title FROM ".$prefix."_constants_dirs WHERE constdir_static='0' ORDER BY constdir_title", $dbi);
		while(list($constdir_id, $constdir_path, $constdir_title) = mysql_fetch_row($result)) {
			$dynamic_constdir .= "<OPTION VALUE=\"$constdir_id\">$constdir_title</OPTION>";
		} 
		$result = mysql_query("SELECT constdir_id, constdir_path, constdir_title FROM ".$prefix."_constants_dirs WHERE constdir_static='1' ORDER BY constdir_title", $dbi);
		while(list($constdir_id, $constdir_path, $constdir_title) = mysql_fetch_row($result)) {
			$static_constdir .= "<OPTION VALUE=\"$constdir_id\">$constdir_title</OPTION>";
		} 


		if (($dynamic_constdir != "") || ($static_constdir != "")) {
		GraphicAdmin(_DEFINELANGUAGE);
				Open_shadowcontainer();
				echo""
				."<form action='$adminFile?mod_name=$mod_name' method='post'>"
				.""._SELECTDIRLANGUAGE.": <SELECT NAME=\"constdir_id\">\n"
				.$dynamic_constdir
				.$static_constdir
				."</SELECT><INPUT TYPE=\"submit\" VALUE=\""._GO."\">"
				."<INPUT TYPE=\"hidden\" NAME=\"op\" VALUE=\"editLangFile\">"
				."</form></center>";
				Close_shadowcontainer();				


		}
		
		include ("footer.php");
	}

	function editLangFile($constdir_id, $langFile="") {
		global $prefix, $dbi, $mod_name, $adminFile;
		include ("header.php");
		$result = mysql_query("SELECT constdir_title, constdir_path FROM ".$prefix."_constants_dirs WHERE constdir_id='$constdir_id'", $dbi);
		list($constdir_title, $constdir_path) = mysql_fetch_row($result);

		//GraphicAdmin(_DEFINELANGUAGE."/".$constdir_title);

		if (isset($langFile) && ($langFile != "")) {
			if (is_file($constdir_path."/lang-".$langFile.".php")) {
				$langArray = langFile2array($constdir_path."/lang-".$langFile.".php");
				$n=count($langArray);
				if($n>0){	
					echo '<iframe id="langMain" src="admin.php?op=FrameLanguage&constdir_id='.$constdir_id.'&langFile='.$langFile.'" style="width: 100%; height: 450px;" ></iframe>';
				}else{
					echo MsgBox(_NOEXITLANGUAGE);
				}
				Open_shadowcontainer();
				echo "<table border=0 >";
					echo "<form method=POST action=\"admin.php?op=ActionLanguage\" >";					
					echo"<tr><td >"._CONSTNAME.": <input TYPE=\"text\" NAME=\"add_constdir_name\"  size=30></td><td >"._CONSTVALUE.":</td><td width=300>
										<DIV id=querywindowcontainer>
											<TEXTAREA id=sqlquery   NAME=\"add_constdir_value\" ROWS=\"1\" cols=\"40\"  ></TEXTAREA>
										</DIV>
					</td><td><input type=\"submit\" value=\""._ADD."\" name=\"addnew\"></td></tr>"
					."<input type=\"hidden\" name=\"constdir_id\" value=\"$constdir_id\">"
					."<input type=\"hidden\" name=\"langFile\" value=\"$langFile\">"
					."<input type=\"hidden\" name=\"n\" value=\"$n\">";
					for ($i=0;$i<$n;$i+=2) {
						echo "<input type=\"hidden\" NAME=\"const_names[]\" VALUE=\"".$langArray[$i]."\" readonly>";
						echo "<input type=\"hidden\" NAME=\"const_values[]\" VALUE=\"".$langArray[$i+1]."\" >";						
					}
				echo "</form>";	
				echo"</table>";	

				Close_shadowcontainer();
			}
		} else {
				Open_shadowcontainer();

				echo"<form action=\"$adminFile?mod_name=$mod_name\" method=\"post\">"
				.$constdir_path
				."/"
				.LanguageSelectBox("langFile",$constdir_path)
				//.fileSelectBox("langFile",$constdir_path,"^lang\-(.+)\.php\$")
				."<input type=\"hidden\" name=\"op\" value=\"editLangFile\">"
				."<input type=\"hidden\" name=\"constdir_id\" value=\"$constdir_id\">"
				."<input type=\"submit\" value=\""._GO."\">"
				."</form>";
			Close_shadowcontainer();		
				
			}
		include ("footer.php");
	}

	function editConstdir($constdir_id) {
		global $dbi, $prefix, $mod_name, $adminFile;
		include ("header.php");
		GraphicAdmin();
		$result = mysql_query("SELECT constdir_path, constdir_title FROM ".$prefix."_constants_dirs WHERE constdir_static='1' AND constdir_id='$constdir_id'", $dbi);
		list($constdir_path, $constdir_title) = mysql_fetch_row($result);
		OpenTable();
		echo "<center><font class=\"option\"><b>"._ADDCONSTANTDIR."</b></font></center>"
			."<FORM ACTION=\"$adminFile?mod_name=$mod_name\" METHOD=\"post\">"
			."<table>"
			."<tr><td ALIGN=\"right\">"._TITLE."</td><td><INPUT TYPE=\"text\" NAME=\"constdir_title\" VALUE=\"$constdir_title\"></td></tr>\n"
			."<tr><td ALIGN=\"right\">"._PATH."</td><td><INPUT TYPE=\"text\" NAME=\"constdir_path\" VALUE=\"$constdir_path\"></td></tr>\n"
			."<input type=\"hidden\" name=\"constdir_id\" value=\"$constdir_id\">"
			."<input type=\"hidden\" name=\"op\" value=\"saveConstdir\">"
			."<tr><td>&nbsp;</td><td><input type=\"submit\" value=\""._SAVECHANGES."\"></td></tr>"
			."</table>"
			."</form>";
		CloseTable();
	    include ("footer.php");
	}

	function constConfig() {
		global $dbi, $prefix, $mod_name, $adminFile;
		include ("header.php");
		GraphicAdmin();
		$result = mysql_query("SELECT const_key, const_delimiter, const_readonly FROM ".$prefix."_constants_config", $dbi);
		$readonly_consts = array();
		if (mysql_num_rows($result)) {
			list($const_key, $const_delimiter, $const_readonly)= mysql_fetch_row($result);
			if (($const_key != "") && ($const_delimiter != "")) {
				$rconsts = explode($const_delimiter,$const_key);
				$num_consts = count($rconsts)+10;
				$rconsts = implode("\n",$rconsts);
			}
			if ($const_readonly) {
				$rcheck = "checked";
				$wcheck = "";
			} else {
				$rcheck = "";
				$wcheck = "checked";
			}

			OpenTable();
			echo "<center><font class=\"option\"><b>"._ADDCONSTANTDIR."</b></font></center>"
				."<FORM ACTION=\"$adminFile?mod_name=$mod_name\" METHOD=\"post\">"
				."<table>"
				."<tr><td ALIGN=\"right\">"._DELIMITER."</td><td>"
				."<INPUT TYPE=\"text\" NAME=\"const_delimiter\" VALUE=\"$const_delimiter\" SIZE=\"1\" MAXLENGTH=\"1\">"
				."</td></tr>\n"
				."<tr><td ALIGN=\"right\">"._READONLYMODE."</td><td>"
				.""._YES."<INPUT TYPE=\"radio\" NAME=\"const_readonly\" value=\"1\" $rcheck>"
				.""._NO."<INPUT TYPE=\"radio\" NAME=\"const_readonly\" value=\"0\" $wcheck>"
				."</td></tr>\n"
				."<tr><td ALIGN=\"right\">"._READONLYCONSTS."</td><td>"
				."<TEXTAREA NAME=\"const_key\" ROWS=\"$num_consts\" COLS=\"50\">$rconsts</TEXTAREA>"
				."</td></tr>\n"
				."<input type=\"hidden\" name=\"op\" value=\"saveConstConfig\">"
				."<tr><td>&nbsp;</td><td><input type=\"submit\" value=\""._SAVECHANGES."\"></td></tr>"
				."</table>"
				."</form>";
			CloseTable();
		}

	    include ("footer.php");
	}

	function fixConstants($const,$const_delimiter="") {
		$constStr = "";
		$patterns = array("/[^a-z|^A-Z|^0-9]+/"
							,"/^[0-9]+/");
		$replace = "";

		if(!is_array($const))
			$const = array($const);
		for ($i=0;$i<count($const);$i++) {
			if ($const[$i] != "") {
				$constStr .= $const_delimiter."_".strtoupper(preg_replace($patterns,$replace,$const[$i]));
			}
		}
		if ($constStr != "") 
			$constStr = substr($constStr,1);
		return $constStr;
	}
	//=====================================================
	function FrameLanguage($constdir_id,$langFile=''){
		include("header.php");

		global $prefix,$dbi,$pos_search;
		$result = mysql_query("SELECT constdir_title, constdir_path FROM ".$prefix."_constants_dirs WHERE constdir_id='$constdir_id'", $dbi);
		list($constdir_title, $constdir_path) = mysql_fetch_row($result);
		if (isset($langFile) && ($langFile != "")) {
			if (is_file($constdir_path."/lang-".$langFile.".php")) {

				$langArray = langFile2array($constdir_path."/lang-".$langFile.".php");
				$n=count($langArray);

				if ($n>0) {
					$result = mysql_query("SELECT const_key, const_delimiter, const_readonly FROM ".$prefix."_constants_config", $dbi);
					$readonly_consts = array();
					if (mysql_num_rows($result)) {
						list($const_key, $const_delimiter, $const_readonly)= mysql_fetch_row($result);
						if (($const_key != "") && ($const_delimiter != "") && $const_readonly)
							$readonly_consts = explode($const_delimiter,$const_key);
					}
				echo "<table id=mytable cellSpacing=0  border=\"1\" style=\"border-collapse: collapse\">"
					."<tr>"	
					."<td class=MenuCell align=\"center\"  height='23'><font class=\"titleTD\">"._POSITION."</font></td>"
					."<td class=MenuCell align=\"center\"><font class=\"titleTD\">"._CONSTNAME."</font></td>"
					."<td class=MenuCell align=\"center\"><font class=\"titleTD\">"._CONSTVALUE."</font></td>"
					."<td class=MenuCell align=\"center\" nowrap><font class=\"titleTD\">"._FUNCTIONS."</font></td></tr>";
					echo "<form method=POST action=\"admin.php?op=SearchConst\">";					
					echo "<tr><td>&nbsp;</td>"
						."<td><INPUT TYPE=\"text\" NAME=\"search_const_name\" size=\"30\"></td>"
						."<td><INPUT TYPE=\"text\" NAME=\"search_const_value\" size=\"60\"></td>"
						."<td><INPUT TYPE=\"submit\" value=\""._SEARCH."\"></td>"
						."</tr>";
						echo "<input type=\"hidden\" name=\"constdir_id\" value=\"$constdir_id\">";
						echo "<input type=\"hidden\" name=\"langFile\" value=\"$langFile\">";
					echo "</form>";
					echo "<form method=POST action=\"admin.php?op=ActionLanguage\" name=\"Form4\">";					
				
					$j=0;
					for ($i=0;$i<$n;$i+=2) {
						if (in_array($langArray[$i],$readonly_consts)) {
							$ronly = "readonly";
							$r = 1;
						} else {
							$ronly = "";
							$r = 0;
						}
						
						echo "<tr id=$j><td>".($j+1)." $icon_row</td><td ><INPUT TYPE=\"text\" NAME=\"const_names[]\" VALUE=\"".$langArray[$i]."\" readonly size=\"30\"  class=mytextBox></td>"
							."<td>
										<DIV id=querywindowcontainer>
											<TEXTAREA id=sqlquery  $ronly NAME=\"const_values[]\" ROWS=\"1\"   onkeyup=\"CheckBoxSelected($j,'Form4');\">".$langArray[$i+1]."</TEXTAREA>
										</DIV>
							</td>"
							."<td><INPUT TYPE=\"checkbox\" NAME=\"const_checks[]\" VALUE=\"".($j)."\" onclick=\"SelectRow(this,".$j.");\"></td></tr>"
							."<input type=\"hidden\" name=\"rs[]\" value=\"$r\">";
							$j++;
					}
					echo "<tr><td colspan=4 class=MenuTable align=right><input type=\"submit\" value=\""._SAVE."\"  name=\"save\">&nbsp;<input type=\"submit\" value=\""._DELETE."\"  name=\"delete\"></td></tr>";
					echo "</table>";
				}				
						echo "<input type=\"hidden\" name=\"constdir_id\" value=\"$constdir_id\">";
						echo "<input type=\"hidden\" name=\"langFile\" value=\"$langFile\">";
					echo "</form>";
			}
		}
	}
	//=====================================================
	function SearchConst(){
		include("header.php");
			global $prefix,$dbi;
			$const_name = $_POST[search_const_name];
			$const_value = $_POST[search_const_value];
			$constdir_id = $_POST[constdir_id];
			$langFile = $_POST[langFile];

		$result = mysql_query("SELECT constdir_title, constdir_path FROM ".$prefix."_constants_dirs WHERE constdir_id='$constdir_id'", $dbi);
		list($constdir_title, $constdir_path) = mysql_fetch_row($result);
		if (isset($langFile) && ($langFile != "")) {
			if (is_file($constdir_path."/lang-".$langFile.".php")) {
					$result = mysql_query("SELECT const_key, const_delimiter, const_readonly FROM ".$prefix."_constants_config", $dbi);
					$readonly_consts = array();
					if (mysql_num_rows($result)) {
						list($const_key, $const_delimiter, $const_readonly)= mysql_fetch_row($result);
						if (($const_key != "") && ($const_delimiter != "") && $const_readonly)
							$readonly_consts = explode($const_delimiter,$const_key);
					}
				echo "<table id=mytable cellSpacing=0  border=\"1\" style=\"border-collapse: collapse\">"
					."<tr>"	
					."<td class=MenuCell align=\"center\"  height='23'><font class=\"titleTD\">"._POSITION."</font></td>"
					."<td class=MenuCell align=\"center\"><font class=\"titleTD\">"._CONSTNAME."</font></td>"
					."<td class=MenuCell align=\"center\"><font class=\"titleTD\">"._CONSTVALUE."</font></td>"
					."<td class=MenuCell align=\"center\" nowrap><font class=\"titleTD\">"._FUNCTIONS."</font></td></tr>";
				$counter = 0;		
				$stt=1;
				$langArray = langFile2array($constdir_path."/lang-".$langFile.".php");
				$n=count($langArray);
				$k=1;
				$j=0;
					echo "<tr><td colspan=4> <img src=\"admin/admin_files/search.png\" align=absmiddle>"._RESULTAYPOS."&nbsp;";
					for ($i=0;$i<$n;$i+=2) {
						if(preg_match("/$const_value/i",$langArray[$i+1]) ){
							echo "<a href=\"#$k\" class=cssbutton > ".$k."</a>";								
						}
						$k++;
					}
					echo "</td></tr>";
					echo "<form method=POST action=\"admin.php?op=SearchConst\">";					
					echo "<tr><td>"._SEARCHLANGUAGE."</td>"
						."<td><INPUT TYPE=\"text\" NAME=\"search_const_name\" size=\"30\"></td>"
						."<td><INPUT TYPE=\"text\" NAME=\"search_const_value\" size=\"60\"></td>"
						."<td><INPUT TYPE=\"submit\" value=\""._SEARCH."\"></td>"
						."</tr>";
						echo "<input type=\"hidden\" name=\"constdir_id\" value=\"$constdir_id\">";
						echo "<input type=\"hidden\" name=\"langFile\" value=\"$langFile\">";
					echo "</form>";			

					echo "<form method=POST action=\"admin.php?op=ActionLanguage\" name=\"Form4\">";					
					for ($i=0;$i<$n;$i+=2) {
						if (in_array($langArray[$i],$readonly_consts)) {
							$ronly = "readonly";
							$r = 1;
						} else {
							$ronly = "";
							$r = 0;
						}
						if(preg_match("/$const_value/i",$langArray[$i+1]) ){
						echo "<tr class=RowSelected id=$j><td><a name=$j>".($j+1)."</a></td><td ><INPUT TYPE=\"text\"   NAME=\"const_names[]\" VALUE=\"".$langArray[$i]."\" readonly size=\"30\" class=mytextBox></td>"
							."<td>
										<DIV id=querywindowcontainer>
											<TEXTAREA id=sqlquery  $ronly NAME=\"const_values[]\" ROWS=\"1\"   onkeyup=\"CheckBoxSelected($j,'Form4');\">".$langArray[$i+1]."</TEXTAREA>
										</DIV>
							</td>"
							."<td><INPUT TYPE=\"checkbox\" NAME=\"const_checks[]\" VALUE=\"".$j."\"></tr>";
						}else{
							echo "<tr id=$j><td>$j $icon_row</td><td ><INPUT TYPE=\"text\" NAME=\"const_names[]\" VALUE=\"".$langArray[$i]."\" readonly size=\"30\" class=mytextBox></td>"
							."<td>
										<DIV id=querywindowcontainer>
											<TEXTAREA id=sqlquery  $ronly NAME=\"const_values[]\" ROWS=\"1\"   onkeyup=\"CheckBoxSelected($j,'Form4');\">".$langArray[$i+1]."</TEXTAREA>
										</DIV>
							</td>"
							."<td><INPUT TYPE=\"checkbox\" NAME=\"const_checks[]\" VALUE=\"".$j."\" onclick=\"SelectRow(this,".$j.");\"></tr>";
						}
						$j++;
							echo "<input type=\"hidden\" name=\"rs[]\" value=\"$r\">";
					}
					echo "<tr><td colspan=4 class=MenuTable align=right><input type=\"submit\" value=\""._SAVE."\"  name=\"save\">&nbsp;<input type=\"submit\" value=\""._DELETE."\"  name=\"delete\"></td></tr>";
						echo "<input type=\"hidden\" name=\"constdir_id\" value=\"$constdir_id\">";
						echo "<input type=\"hidden\" name=\"langFile\" value=\"$langFile\">";
				echo "</form>";
				echo "</table>";
			}
		}


	}
	//=====================================================
	function ActionLanguage(){
		global $prefix,$dbi,$adminFile;

		$save = $_POST[save];
		$delete = $_POST[delete];
		$addnew = $_POST[addnew];
		$langFile  = $_POST[langFile];
		$constdir_id  = $_POST[constdir_id];
		$const_names =$_POST[const_names];
		$const_values = $_POST[const_values];
		$const_checks = $_POST[const_checks];
		$rs = $_POST[rs];
		$max_row = $_POST[n];
			$tmp_str = "";
			if (!isset($const_names))
				$const_names = array();
			$n=count($const_names);
if(!$n) $n=$max_row;
else $n = count($const_names);
			$result = mysql_query("SELECT constdir_path FROM ".$prefix."_constants_dirs WHERE constdir_id='$constdir_id'", $dbi);
			list($constdir_path) = mysql_fetch_row($result);

IF($n>0){
		IF($save){

				for ($i=0;$i<$n;$i++) {
					$tmp_str .= "define(\"".addcslashes($const_names[$i],"\"")."\",\"".addcslashes($const_values[$i],"\"")."\");\n";
				}

		}

		IF($delete){

				for ($i=0;$i<$n;$i++) {
					if (!in_array($i,$const_checks) || ($rs[$i] == 1)){

						$tmp_str .= "define(\"".addcslashes($const_names[$i],"\"")."\",\"".addcslashes($const_values[$i],"\"")."\");\n";
					}
				
				}
		}

		IF($addnew){
			$add_constdir_name = $_POST[add_constdir_name];
			$add_constdir_value = $_POST[add_constdir_value];

					if (($add_constdir_name != "") && ($add_constdir_value != "")) {
						$const_names[$n] = $add_constdir_name;
						$const_values[$n] = $add_constdir_value;
						$n++;
					}
					for ($i=0;$i<$n;$i++) {
						$tmp_str .= "define(\"".addcslashes($const_names[$i],"\"")."\",\"".addcslashes($const_values[$i],"\"")."\");\n";

					}
		}
			if (is_file($constdir_path."/lang-".$langFile.".php")) {
					$fp = fopen ($constdir_path."/lang-".$langFile.".php", "w");
					fwrite( $fp,"<?php\n\n".$tmp_str."\n?>\n");
			}
}ELSE{
		IF($addnew){
			$tmp_str="";
			$add_constdir_name = $_POST[add_constdir_name];
			$add_constdir_value = $_POST[add_constdir_value];

					if (($add_constdir_name != "") && ($add_constdir_value != "")) {
						$const_names[$n] = $add_constdir_name;
						$const_values[$n] = $add_constdir_value;
						$n++;
					}
					die("n=".$n);
					for ($i=0;$i<$n;$i++) {
						$tmp_str .= "define(\"".addcslashes($const_names[$i],"\"")."\",\"".addcslashes($const_values[$i],"\"")."\");\n";

					}

		}
		if (is_file($constdir_path."/lang-".$langFile.".php")) {
					$fp = fopen ($constdir_path."/lang-".$langFile.".php", "w");
					fwrite( $fp,"<?php\n\n".$tmp_str."\n?>\n");
		}
}
		IF($addnew){
			Header("Location: $adminFile?mod_name=$mod_name&op=editLangFile&constdir_id=$constdir_id&langFile=$langFile");
		}ELSE{
			Header("Location: admin.php?op=FrameLanguage&constdir_id=$constdir_id&langFile=$langFile");
		}
		

	}
	//=====================================================
	switch($op) {
		case "saveConstConfig":
			$const_key = explode(chr(13).chr(10),$const_key);
			$const_key = fixConstants($const_key,$const_delimiter);
			$q = "UPDATE ".$prefix."_constants_config SET  const_key ='$const_key', const_delimiter='$const_delimiter', const_readonly='$const_readonly'";
//			die($q);
			mysql_query($q,$dbi);
			Header("Location: $adminFile?mod_name=$mod_name&op=constConfig");

		break;

		case "mod_constants":
			mod_constants();
		break;

		case "constConfig":
			constConfig();
		break;

		case "addConstdir":
			if (is_dir($constdir_path) && ($constdir_title != "")) {
				mysql_query("INSERT INTO ".$prefix."_constants_dirs SET constdir_path='$constdir_path', constdir_title='$constdir_title', constdir_static='1'", $dbi);
			}
			Header("Location: $adminFile?mod_name=$mod_name&op=mod_constants");
		break;
		
		case "editConstdir":
			editConstdir($constdir_id);
		break;
		
		case "saveConstdir":
			if (is_dir($constdir_path) && ($constdir_title != "")) {
				mysql_query("UPDATE ".$prefix."_constants_dirs SET constdir_path='$constdir_path', constdir_title='$constdir_title' WHERE constdir_id='$constdir_id' AND constdir_static='1'", $dbi);
			}
			Header("Location: $adminFile?mod_name=$mod_name&op=mod_constants");
		break;

		case "delConstdir":
			mysql_query("DELETE FROM ".$prefix."_constants_dirs WHERE constdir_id='$constdir_id' AND constdir_static='1'", $dbi);
			Header("Location: $adminFile?mod_name=$mod_name&op=mod_constants");
		break;

		case "editLangFile":
			editLangFile($constdir_id, $langFile);
		break;

		case "saveLangFile":
			$tmp_str = "";
			if (!isset($const_names))
				$const_names = array();
			$n=count($const_names);
			if ($act == "del") {
				for ($i=0;$i<$n;$i++) {
					if (!in_array($i,$const_checks) || ($rs[$i] == 1))
						$tmp_str .= "define(\"".addcslashes($const_names[$i],"\"")."\",\"".addcslashes($const_values[$i],"\"")."\");\n";
				}
			} elseif ($act == "add") {
				if (($add_constdir_name != "") && ($add_constdir_value != "")) {
					$const_names[$n] = $add_constdir_name;
					$const_values[$n] = $add_constdir_value;
					$n++;
				}
				for ($i=0;$i<$n;$i++) {
					$tmp_str .= "define(\"".addcslashes($const_names[$i],"\"")."\",\"".addcslashes($const_values[$i],"\"")."\");\n";

				}
			} elseif ($act == "all") {
					$const_names[$n] = $add_constdir_name;
					$const_values[$n] = $add_constdir_value;
					$n++;
				for ($i=0;$i<$n;$i++) {
					if (!in_array($i,$const_checks))
						$tmp_str .= "define(\"".addcslashes($const_names[$i],"\"")."\",\"".addcslashes($const_values[$i],"\"")."\");\n";
				}

			} else {
				for ($i=0;$i<$n;$i++) {
					$tmp_str .= "define(\"".addcslashes($const_names[$i],"\"")."\",\"".addcslashes($const_values[$i],"\"")."\");\n";
				}
			}
			$result = mysql_query("SELECT constdir_path FROM ".$prefix."_constants_dirs WHERE constdir_id='$constdir_id'", $dbi);
			list($constdir_path) = mysql_fetch_row($result);

			if (is_file($constdir_path."/lang-".$langFile.".php")) {
				//if (backuprotate($constdir_path."/lang-".$langFile.".php",3)) {
					$fp = fopen ($constdir_path."/lang-".$langFile.".php", "w");
					fwrite( $fp,"<?php\n\n".$tmp_str."\n?>\n");

				//}
			}
			Header("Location: $adminFile?mod_name=$mod_name&op=editLangFile&constdir_id=$constdir_id&langFile=$langFile");
		break;
		case "synLangDirDb":
			synLangDirDb();
		break;

		case "SearchConst":
			SearchConst();
		break;

		case "ActionLanguage":
			ActionLanguage();
		break;

		case "FrameLanguage":
			FrameLanguage($constdir_id,$langFile);
		break;

	}

?>