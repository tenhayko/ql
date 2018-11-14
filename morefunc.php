<?
 function format_date($date){
     $weekday= date('l',strtotime($date)) ;
     switch($weekday) {
         case 'Monday':
             $weekday = 'Thứ hai';
             break;
         case 'Tuesday':
             $weekday = 'Thứ ba';
             break;
         case 'Wednesday':
             $weekday = 'Thứ tư';
             break;
         case 'Thursday':
             $weekday = 'Thứ năm';
             break;
         case 'Friday':
             $weekday = 'Thứ sáu';
             break;
         case 'Saturday':
             $weekday = 'Thứ bảy';
             break;
         default:
             $weekday = 'Chủ nhật';
             break;
			 

     }
	 return $weekday;
 }

//===========================


//---------------
function updateQuery( $p_sAction, $p_sTblName, $p_aValuesPairs, $p_sWhereClause = "" ) 
{//serimoth 
	$sFields = ""; 
	$sValues = ""; 
	$sPairs = ""; 
	if( !empty( $p_sWhereClause ) ) $sWhereClause = "where " . $p_sWhereClause; 
	else $sWhereClause = ""; 
	foreach( $p_aValuesPairs as $sField => $sValue ) { 
	if( $p_sAction == "Insert" ) { 
	if( !empty( $sFields ) ) $sFields .= ", "; 
	$sFields .= "`{$sField}`"; 
	if( !empty( $sValues ) ) $sValues .= ", "; 
	$sValues .= "'{$sValue}'"; 
	} 
	else if( $p_sAction == "Update" ) { 
	if( !empty( $sPairs ) ) $sPairs .= ", "; 
	$sPairs .= "`{$sField}` = '{$sValue}'"; 
	} 
	} 
	if( $p_sAction == "Insert" ) { 
	$sFields = "( " . $sFields . " )"; 
	$sValues = "( " . $sValues . " )"; 
	$sQuery = "insert into {$p_sTblName}{$sFields} values{$sValues} {$sWhereClause};"; /*echo $sQuery; exit;*/
	} 
	else if( $p_sAction == "Update" ) { 
	$sQuery = "update {$p_sTblName} set {$sPairs} {$sWhereClause};"; //echo $sQuery; exit;
	} 
	return mysql_query( $sQuery ); 
} 
function getOptionTags( ) {//serimoth 
	$iParNum = func_num_args(); 
	$aPar = func_get_args(); 
	global $oDb; 
	$detectSelected = false; 
	$selectedValues = array(); 
	$sOption = ""; 
	switch( $iParNum ) { 
	case 3: 
	$query = $aPar[0]; 
	$optionValue = $aPar[1]; 
	$optionText = $aPar[2]; 
	break; 
	case 4: 
	$query = $aPar[0]; 
	$optionValue = $aPar[1]; 
	$optionText = $aPar[2]; 
	$selectedValues = $aPar[3]; 
	$detectSelected = true; 
	break; 
	case 6: 
	$query = $aPar[0]; 
	$optionValue = $aPar[1]; 
	$optionText = $aPar[2]; 
	$selectedValues = $aPar[3]; 
	$detectSelected = true; 
	$sOption = "<option value=\"". $aPar[4] ."\">" . $aPar[5] . "</option>"; 
	break; 
	} 
	$sel = ""; 
	$iRs = mysql_query( $query ); 
	while( $rc = mysql_fetch_array( $iRs ) ) { 
	if( $detectSelected ) { 
	if( in_array( $rc[$optionValue], $selectedValues ) ) { 
	$sel = "selected=\"selected\""; 
	} else { 
	$sel = ""; 
	} 
	} 
	$sOption .= "<option value=\"".$rc[$optionValue]."\" {$sel} >".$rc[$optionText]."</option>"; 
	} 
	return $sOption; 
} 
function ymd($date) 
{ 
if($date=='') 
return '0000-00-00'; 
$a = explode("/",$date); 
return $a[2]."-".$a[1]."-".$a[0]; 
} 

function doingay($date) 
{ 
if($date=='') 
return '0000-00-00'; 
$a = explode("-",$date); 
return $a[2]."/".$a[1]."/".$a[0]; 
} 







function dmy($date) 
{ 
	$a = explode("/",$date);
	if($date) 
	return $a[2]."-".$a[1]."-".$a[0]; 
	else
	return '';
}



function dmy2($date) 
{ 
	$a = explode("-",$date);
	if($date) 
	return $a[2]."/".$a[1]."/".$a[0]; 
	else
	return '';
} 

//----------------------------------------------
function html_remove($document) {
	$search = array ("'<script[^>]*?>.*?</script>'si",  // Strip out javascript
					 "'<[\/\!]*?[^<>]*?>'si",           // Strip out HTML tags
					 "'([\r\n])[\s]+'",                 // Strip out tiny space
					 "'&(quot|#34);'i",                 // Replace HTML entities
					 "'&(amp|#38);'i",
					 "'&(lt|#60);'i",
					 "'&(gt|#62);'i",
					 "'&(nbsp|#160);'i",
					 "'&(iexcl|#161);'i",
					 "'&(cent|#162);'i",
					 "'&(pound|#163);'i",
					 "'&(copy|#169);'i",
					 "'&#(\d+);'e");                    // evaluate as php
	$replace = array ("",
					  "",
					  "\\1",
					  "\"",
					  "&",
					  "<",
					  ">",
					  " ",
					  chr(161),
					  chr(162),
					  chr(163),
					  chr(169),
					  "chr(\\1)");

	$text = preg_replace($search, $replace, $document);
	return $text;
}
//----------------------------------------------

//----------------------------------------------
function modifier_truncate($String, $NumberWord = 80, $Etc = '...')
{
	$String = str_replace(chr(13),'',$String);
	$String = str_replace("\n",'',$String);
	$String = str_replace('"','&quot',$String);
	$String = html_remove($String);
	while (strlen($String)>$NumberWord) {
		$pos = strrpos($String, " ");
		$String = substr($String,0,$pos);
		$String.=$Etc;
	}
	return $String;
}
//----------------------------------------------
function ratio_image($src, $alt = '', $required_width = 120, $required_height = 90 ,$popup='', $params = ' border="0" style="border-color: #000000"') {
	if (!($image_size = @getimagesize($src))) {
		$src="images/otherdoc.png";
	}
	$image_size = @getimagesize($src);
	$width = $image_size[0];
	$height = $image_size[1];
	$image = '';
	if(is_file($src)) {	
		if ($popup)
			$image.="<a href=\"javascript: popUpImage('$src',$width,$height)\">";
	    $image .= '<img src="' . $src . '" ';
    	if ($alt) {
	    	$image .= ' alt=" ' . $alt . ' "';
	    }
		$zoom_width = 1;
		$zoom_height = 1 ;
		if ($required_width && $required_height){
			$zoom_width = $required_width / $width;
			$zoom_height = $required_height / $height;
			if($zoom_width  < 1 || $zoom_height  < 1){
				if ($zoom_width > $zoom_height) $zoom = $zoom_height;
				else $zoom = $zoom_width;				
				$width = $width * $zoom;
				$height = $height * $zoom;
			}
		}		
		else if($required_width && !$required_height){
			$zoom_width = $width / $image_size[0];
			$width = $width * $zoom_width;
			$height = $height * $zoom_width;
		}else if(!$required_width && $required_height){
			$zoom_height = $height/ $image_size[1] ;
			$width = $width * $zoom_height;
			$height = $height * $zoom_height;
		}
		$image .= ' width="' . ceil($width) . '" height="' . ceil($height) . '"';
	    if ($params != '') {
		   	$image .= ' ' . $params .' class=resumebar>';
		}
   		if ($popup)
			$image .= '</a>';
	}
    return $image;
}

function langlist() {
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
	return($languageslist);
}

function filter_by_language($text_notice){
	global $op, $mod_name, $language, $currentlang, $selectedLang, $selectedItem;
	if($selectedLang && $selectedLang != '') $clang = $selectedLang;
	else $clang = '';
	echo '<form name="select_lang" action="admin.php?op='.$op.''.($mod_name != '' ? '&mod_name='.$mod_name : '').'&selectedItem='.$selectedItem.'"  method="post">'
		.'<table width="100%" align="center"><tr><td width="50%" align="right"><b>'.$text_notice.'</b>&nbsp;:</td>'
		.'<td width="50%"><SELECT name=selectedLang onChange="document.select_lang.submit()">';
	$languageslist=langlist();
	for($i=0; $i < sizeof($languageslist); $i++) {
	    if($languageslist[$i]!=""){
			echo "<option value=\"$languageslist[$i]\"".($languageslist[$i]==$clang ? selected : '').">".ucfirst($languageslist[$i])."</option>\n";
	    }
	}
	if($clang=="")
		echo "<option value=\"\" selected>"._ALL."</option></select>";
	else
		echo "<option value=\"\">"._ALL."</option>";
	echo '</select>'
			.'</td></tr>'
			.'</table>'
			.'</form>';
}

function split_query($query, $links='',$view=1){
	global $maxRow, $maxPage, $pos, $posS, $prevIndex, $maxRowSession, $post_file, $PHP_SELF, $op, $mod_name, $name, $file, $opcase, $selectedItem, $selectedLang,$current_parent_id,$pos1, $posX,$prevIndex1;
	$links = "".($selectedLang != '' ? "&selectedLang=$selectedLang" : '')."".($selectedItem != '' ? "&selectedItem=$selectedItem" : '').$links;		
	if(!isset($maxRowSession)) $maxRowSession = $maxRow;
	$rlt = mysql_query($query);
	$numRow = mysql_num_rows($rlt);
	//$maxRowSession=9;
	if(($numRow) && ($numRow > $maxRowSession)){
	?>
	<?	
		if(!isset($pos) || !$pos) $pos = 0;
		if(!isset($posS) || !$posS)	$posS = $pos; 
		else{
			if ($numRow > $posS + $maxRowSession) $posS = $numRow - $posS - $maxRowSession;
			else{
				if(($numRow - $maxRowSession - $posS) > 0) $posS = $numRow - $maxRowSession;
				else $posS = 0;
			}
		}
		if(!isset($prevIndex)) $prevIndex = 0;
		$query .= " LIMIT $posS, $maxRowSession";
		$result = mysql_query($query);
		$RowCount = mysql_num_rows($result);	
		
		?>
		
<?	
	}
	return $query;
}
function split_query1($query, $links='',$view=1){
	global $maxRow, $maxPage, $pos, $posS, $prevIndex, $maxRowSession, $post_file, $PHP_SELF, $op, $mod_name, $name, $file, $opcase, $selectedItem, $selectedLang,$current_parent_id,$pos1, $posX,$prevIndex1;
	$links = "".($selectedLang != '' ? "&selectedLang=$selectedLang" : '')."".($selectedItem != '' ? "&selectedItem=$selectedItem" : '').$links;		
	if(!isset($maxRowSession)) $maxRowSession = $maxRow;
	$rlt = mysql_query($query);
	$numRows = mysql_num_rows($rlt);
	//$maxRowSession=9;
	if(($numRows) && ($numRows > $maxRowSession)){
	?>
	<?	
		if(!isset($pos1) || !$pos1) $pos1 = 0;
		if(!isset($posX) || !$posX)	$posX = $pos1; 
		else{
			if ($numRows > $posX + $maxRowSession) $posX = $numRows - $posX - $maxRowSession;
			else{
				if(($numRows - $maxRowSession - $posX) > 0) $posX = $numRows - $maxRowSession;
				else $posX = 0;
			}
		}
		if(!isset($prevIndex1)) $prevIndex1 = 0;
		$query .= " LIMIT $posX, $maxRowSession";
		$result = mysql_query($query);
		$RowCount = mysql_num_rows($result);	
		
		?>
		
<?	
	}
	return $query;
}

function split_pages($query, $links='',$view=1,$font='',$pagecategory=''){
	global $maxRow, $maxPage, $pos, $posS, $prevIndex, $maxRowSession, $post_file, $PHP_SELF, $op, $mod_name, $name, $file, $opcase, $selectedItem, $selectedLang,$current_parent_id;
	$links = "".($selectedLang != '' ? "&selectedLang=$selectedLang" : '')."".($selectedItem != '' ? "&selectedItem=$selectedItem" : '').$links;		
	
	if(!isset($maxRowSession)) $maxRowSession = $maxRow;
	$rlt = mysql_query($query);
	$numRow = mysql_num_rows($rlt);
	if(($numRow) && ($numRow > $maxRowSession)){
	?>
		<!-- begin list -->
	<?	
		if(!isset($pos) || !$pos) $pos = 0;
		if(!isset($posS) || !$posS)	$posS = $pos; 
		else{
			if ($numRow > $posS + $maxRowSession) $posS = $numRow - $posS - $maxRowSession;
			else{
				if(($numRow - $maxRowSession - $posS) > 0) $posS = $numRow - $maxRowSession;
				else $posS = 0;
			}
		}
		if(!isset($prevIndex)) $prevIndex = 0;
		$query .= " LIMIT $posS, $maxRow";
		$result = mysql_query($query);
		$num1 = mysql_num_rows($result);
		$RowCount = mysql_num_rows($result);	

		$count =1;
		IF($view==1){
		?>
				<div>
					
			<? 
			
			if($pos>=50){
				$max2 = $pos+$num1;
				$pages = $pos+1;
				
			}else{
				$pages = $RowCount+$pos;
			}
//echo "pos=$pages2 / $RowCount <br>";

				echo "<b>$pages/ $numRow ]</b>";

				$i=$maxPage*$prevIndex;				
				if ($prevIndex>0) { ?>
        		    <a class=pagelink href="<? echo ($post_file =='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo ($prevIndex-1)*$maxPage*$maxRow ; ?>&prevIndex=<? echo $prevIndex-1; ?><? echo $links; ?>"><b><? echo _PAGEPREVIOUS; ?></b></a>
				<? } 
				if($pos>0){
					$postPrev = $pos-$maxRow;
				?>
					<a class=pagelink href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $current_parent_id != '' ? '&current_parent_id='.$current_parent_id : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $postPrev ; ?>&prevIndex=<? echo $prevIndex; ?><? echo $links; ?>">&nbsp;<b><?echo _PREVIOUS?></b></a> &nbsp;&nbsp;<a class=pagelink href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $current_parent_id != '' ? '&current_parent_id='.$current_parent_id : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $postPrev ; ?>&prevIndex=<? echo $prevIndex; ?><? echo $links; ?>"><img src="images/admin/center_r.gif" border=0 align=absmiddle>&nbsp;
				<?
				}
				while(($i < ceil($numRow / $maxRow)) && ($i < $maxPage*$prevIndex + $maxPage)){
                      if($i*$maxRow == $pos)
                      { ?>
					    <b><font class="fontSelected"><? echo $i+1; ?></font></b>&nbsp;&nbsp;
                <?    }
                      else
                      { ?>
					<a class=pagelink href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $current_parent_id != '' ? '&current_parent_id='.$current_parent_id : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $i*$maxRow ; ?>&prevIndex=<? echo $prevIndex; ?><? echo $links; ?>"><? echo $i+1; ?></a>&nbsp;&nbsp;
					
                <?    }
                $i++;
                }
				$postNext = $pos+$maxRow;
				
				if($postNext<=$numRow){
				?>
					<a class=pagelink href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $current_parent_id != '' ? '&current_parent_id='.$current_parent_id : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $postNext ; ?>&prevIndex=<? echo $prevIndex; ?><? echo $links; ?>"><img src="images/admin/center_l.gif" border=0 align=absmiddle>&nbsp;&nbsp;&nbsp;<a class=pagelink href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $current_parent_id != '' ? '&current_parent_id='.$current_parent_id : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $postNext ; ?>&prevIndex=<? echo $prevIndex; ?><? echo $links; ?>"><b><?echo _NEXT?></b></a>&nbsp;
				<?
				}
				if (ceil($numRow / $maxRow) > ($prevIndex+1)*$maxPage) { ?>
        		    <a href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $i*$maxRow ; ?>&prevIndex=<? echo $prevIndex+1; ?><? echo $links; ?>"><b><font color=\"$font\"><? echo _PAGENEXT; ?></b></a>
				<? } ?>
					</div>
				<?}?>
<?	
	}
	return $query;
}

function split_pages_array($message_array, $links='',$view=''){
	global $maxRow, $maxPage, $pos, $posS, $prevIndex, $maxRowSession, $post_file, $PHP_SELF, $op, $mod_name, $name, $file, $opcase, $selectedItem, $selectedLang;

	if(!isset($maxRowSession)) $maxRowSession = $maxRow;

	$numRow = sizeof($message_array);
	if(($numRow) && ($numRow > $maxRowSession)){ 
	?>
		<!-- begin list -->
			<table align="center">
	<?	
		if(!isset($pos) || !$pos) $pos = 0;
		$posF = $pos;
		if ($numRow > $posF + $maxRowSession) $posE = $posF + $maxRowSession;
		else
			$posE = $numRow;

		if(!isset($prevIndex)) $prevIndex = 0;
	
		$count =1;
		IF($view==''){
		?>
				<tr align="center">
					<td align="center">
			<? 
				$i=$maxPage*$prevIndex;				
				if ($prevIndex>0) { ?>
        		    <a href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo ($prevIndex-1)*$maxPage*$maxRow ; ?>&prevIndex=<? echo $prevIndex-1; ?><? echo $links; ?>"><b><? echo _PREVIOUS; ?></b></a>
				<? } 
				echo "<font class=titleTD>"._PAGE."</font>";
				while(($i < ceil($numRow / $maxRow)) && ($i < $maxPage*$prevIndex + $maxPage)){
                      if($i*$maxRow == $pos)
                      { ?>
					    <b><font class="titleTD"><? echo $i+1; ?></font></b>&nbsp;
                <?    }
                      else
                      { ?>
					<a href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $i*$maxRow ; ?>&prevIndex=<? echo $prevIndex; ?><? echo $links; ?>"><font size="2" face="Arial" ><? echo $i+1; ?></font></a>&nbsp;
                <?    }
                $i++;
                }
				if (ceil($numRow / $maxRow) > ($prevIndex+1)*$maxPage) { ?>
        		    <a href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $i*$maxRow ; ?>&prevIndex=<? echo $prevIndex+1; ?><? echo $links; ?>"><b><? echo _NEXT; ?></b></a>
				<? } ?>
					</td>
				</tr>	
		<?}?>
			</table>
<?	
	}
	if(!$posF) $posF = 0;
	if(!$posE) $posE = $numRow;
	return $posF . '_' . ($posE - 1); 
}

function my_del_confirm($id, $title, $confirm_str, $no_op, $yes_op, $extra_link=''){
	global $hlpfile, $mod_name, $selectedLang;
	include("header.php");
	if ($mod_name){
	  //  GraphicModAdmin($hlpfile);
	}
	else{
	    GraphicAdmin($hlpfile);
	}


	OpenTable();
	echo "<br>";	
	echo "<center><font class=\"title\">$title</font><br>".$confirm_str."<br><br>";
	if ($mod_name){
		echo "[ <a href=\"admin.php?op=".$no_op."&mod_name=".$mod_name."&selectedLang=$selectedLang".$extra_link."\">"._NO."</a> | <a href=\"admin.php?op=".$yes_op."&mod_name=".$mod_name."&id=$id&selectedLang=$selectedLang".$extra_link."\">"._YES." </a> ]</font></center>";
	}
	else{
		echo "[ <a href=\"admin.php?op=".$no_op."&selectedLang=$selectedLang".$extra_link."\">"._NO."</a> | <a href=\"admin.php?op=".$yes_op."&id=$id&selectedLang=$selectedLang".$extra_link."\">"._YES." </a> ]</font></center>";
	}
	CloseTable();
	include("footer.php");

}

function get_width_ratio_image($src, $required_width = '', $required_height = '') {

	if(is_file($src)){	
		$zoom_width = 1;
		$zoom_height = 1 ;


		if ($image_size = @getimagesize($src)) {
			$width = $image_size[0];
			$height = $image_size[1];

			if ($required_width && $required_height){
				$zoom_width = $required_width / $width;
				$zoom_height = $required_height / $height;

				if($zoom_width  < 1 || $zoom_height  < 1){
					if ($zoom_width > $zoom_height) $zoom = $zoom_height;
					else $zoom = $zoom_width;				
							
					$width = $width * $zoom;
					$height = $height * $zoom;
				}
			}		
			else if($required_width && !$required_height){
					$zoom_width = $width / $image_size[0];
					$width = $width * $zoom_width;
					$height = $height * $zoom_width;
				 }else if(!$required_width && $required_height){
						$zoom_height = $height/ $image_size[1] ;
						$width = $width * $zoom_height;
						$height = $height * $zoom_height;
				       }
		}
	
	}

	$width = $width + 10;
    return ceil($width);
}
function split_pages_second($message_array, $links=''){
	global $maxRow, $maxRowPro, $maxPage, $pos, $posS, $prevIndex, $maxRowSession, $post_file, $PHP_SELF, $op, $mod_name, $name, $file, $opcase, $selectedItem, $selectedLang,$pcid,$max_Page;

	$catalog = 1;
	if(!isset($maxRowSession)) $maxRowSession = $maxRowPro;

	$numRow = sizeof($message_array);
	if(($numRow) && ($numRow > $maxRowSession)){ 
	?>
			<table align="center"  cellpadding="0" cellspacing="0" width=90%>
	<?	
		if(!isset($pos) || !$pos) $pos = 0;
		$posF = $pos;
		if ($numRow > $posF + $maxRowSession) $posE = $posF + $maxRowSession;
		else
			$posE = $numRow;

		if(!isset($prevIndex)) $prevIndex = 0;

		$count =1;
		?>
				<tr align="center">
					<td align="center" nowrap>
			<? 
				$i=$maxPage*$prevIndex;		
				echo "<font class=titleTD>"._PAGE."</font> &nbsp;";
				while(($i < ceil($numRow / $maxRowPro)) && ($i < $maxPage*$prevIndex + $maxPage)){
                      if($i*$maxRowPro == $pos)
                      { ?>
					    <b><font class="catalogtitle"><? echo $i+1;?></font></b> | 
                <?    }
                      else
                      { ?>
						<a href="<? echo ($post_file=='' ? $PHP_SELF : $post_file); ?>?<? echo $op != '' ? 'op='.$op : ''; ?><? echo $mod_name != '' ? '&mod_name='.$mod_name : ''; ?><? echo $name != '' ? '&name='.$name : ''; ?><? echo $file != '' ? '&file='.$file : ''; ?><? echo $opcase != '' ? '&opcase='.$opcase : ''; ?>&pos=<? echo $i*$maxRowPro ; ?>&prevIndex=<? echo $prevIndex; ?><? echo $links; ?>" class=tiny><font size="2" face="Arial" ><? echo $i+1;?></font></a> | 
                <?    }
                $i++;
                }
//hic hic
				echo "...";
				?>
					</td>
				</tr>	
			</table>
		<?	
	}
	if(!$posF) $posF = 0;
	if(!$posE) $posE = $numRow;
	return $posF . '_' . ($posE - 1); 
}

function SetUTF8($content_content){
	$content_content =   str_replace("&aacute;", "á", $content_content); 
	$content_content =   str_replace("&agrave;", "à", $content_content); 
	$content_content =   str_replace("&atilde;", "ã", $content_content); 

	$content_content =   str_replace("&iacute;", "í", $content_content); 
	$content_content =   str_replace("&igrave;", "ì", $content_content); 

	$content_content =   str_replace("&ugrave;", "ù", $content_content); 
	$content_content =   str_replace("&uacute;", "ú", $content_content); 

	$content_content =   str_replace("&ocirc;", "ô", $content_content); 
	$content_content =   str_replace("&oacute;", "ó", $content_content);
	$content_content =   str_replace("&ograve;", "ò", $content_content); 
	$content_content =   str_replace("&otilde;", "õ", $content_content); 
	
	$content_content =   str_replace("&ecirc;", "ê", $content_content); 
	$content_content =   str_replace("&yacute;", "ý", $content_content); 
	$content_content =   str_replace("&eacute;", "é", $content_content); 
	$content_content =   str_replace("&egrave;", "è", $content_content); 
	$content_content =   str_replace("&acirc;", "â", $content_content); 

return $content_content;
}






function SubmitButton($name, $value, $style="", $disabled=0){
		if($disabled==0){
		  	  $str = "<INPUT TYPE=\"submit\" name = \"$name\" value = \"$value\"  style= \"$style\">";
		}else{
			  $str = "<INPUT TYPE=\"submit\" name = \"$name\" value = \"$value\"  disabled style = \"$style\">";
		}
		return $str;
	}
function ResetButton($name, $value){

		  $str = "<INPUT TYPE=\"reset\" name = \"$name\" value = \"$value\"  >";

	return $str;
	}


function Input($type,$name,$value='',$size='',$style='',$maxlength='',$other=''){
		$str = "<input type=\"$type\" name=\"$name\" ".($value != "" ?  "value=\"$value\"" : "")."  ".($size != "" ?  "size=$size" : "")."  ".($style != "" ?  "style=\"$style\"" : "")."  ".($maxlength != "" ?  "maxlength=$maxlength" : "")."   $other>";
		return $str;
}
function Inputs($type,$name,$value,$valuechecked='',$style='',$other=''){
		$str = "<input type=\"$type\" name=\"$name\" value=\"$value\" ".($valuechecked == $value ?  "checked" : "")." $other>";
		return $str;
}
function DateTime(){
	global $currentlang;
				$date = date("D");

				if($currentlang=="vietnamese"){
					if($date=="Mon"){
						$ngay = "Thứ hai";
					}
					if($date=="Tue"){
						$ngay = "Thứ ba";
					}
					if($date=="Wed"){
						$ngay = "Thứ tư";
					}
					if($date=="Thu"){
						$ngay = "Thứ năm";
					}
					if($date=="Fri"){
						$ngay = "Thứ sáu";
					}
					if($date=="Sat"){
						$ngay = "Thứ bảy";
					}
					if($date=="Sun"){
						$ngay = "Chủ nhật";
					}				
				}else{
					$ngay=$date;
				}
 return $ngay.",".date("d/m/Y")."" ;
}


function Open_shadowcontainer() {
    global $bgcolor1, $bgcolor2;
				echo'
				<div class="shiftcontainer" align=center>
				<div class="shadowcontainer">
				<div class="innerdiv">';
}

function Close_shadowcontainer() {
				echo'
				</div>
				</div>
				</div>';
}

function Get_parent_id($id){
	global $prefix;
	$res = mysql_query("Select catalog_categories_parent_id  from $prefix"._catalog_categories ." where catalog_categories_id  = '$id'  ");
	list($parentid)=mysql_fetch_row($res);
	return $parentid;
}
function ConvertContentUTF8($encodedString){
		$encodedString =   str_replace("&aacute;", "á", $encodedString); // 
		$encodedString =   str_replace("&agrave;", "à", $encodedString); // 
		$encodedString =   str_replace("&atilde;", "ã", $encodedString); // 
		$encodedString =   str_replace("&uacute;", "ú", $encodedString); // 
		$encodedString =   str_replace("&ugrave;", "ù", $encodedString); // 
		$encodedString =   str_replace("&yacute;", "ý", $encodedString); // 
		$encodedString =   str_replace("&iacute;", "í", $encodedString); // 
		$encodedString =   str_replace("&igrave;", "ì", $encodedString); // 
		$encodedString =   str_replace("&acirc;", "â", $encodedString); // 
		$encodedString =   str_replace("&ecirc;", "ê", $encodedString); // 
		$encodedString =   str_replace("&ocirc;", "ô", $encodedString); // 
		$encodedString =   str_replace("&ocirc;", "ô", $encodedString); //

	return $encodedString;
}
function GetMenuID($module,$mcid){
	global $prefix;
	$where = "and ( menu_category_url like '%$mcid' and menu_category_url like '%$module%' )";

	$res = mysql_query("Select menu_category_parent_id  from $prefix"._menu_category ." where menu_category_url like '%$module%'  $where");
	
	list($menu_category_id)=mysql_fetch_row($res);
	return $menu_category_id;
}
function selectbox_birthday($birthday='',$disabled=''){
	if($birthday){
			$file_array = array();
			$file_array = explode('/', $birthday);
	}
	$str='';
	$str .= '<select name="b_day" '.$disabled.' style="width:100px;">';
		$str .= '<option value="">'._DATE.'</option>';
		for($i=1;$i<=31;$i++){
			$str .= '<option value="'.$i.'" '.($file_array[0] == $i ?  "selected" : "").'>'.$i.'</option>';
		}
	$str .= '</select>';
	$str .= ' / ';

	$str .= '<select name="b_month" '.$disabled.' style="width:100px;">';
		$str .= '<option value="">'._MONTH.'</option>';

		for($i=1;$i<=12;$i++){
			$str .= '<option value="'.$i.'"  '.($file_array[1] == $i ?  "selected" : "").'>'.$i.'</option>';
		}
	$str .= '</select>';
	$str .= ' / ';
	$str .= '<select name="b_year" '.$disabled.' style="width:100px;">';
		$str .= '<option value="">'._YEAR.'</option>';

		for($i=1930;$i<=2000;$i++){
			if(!$file_array[2]){
			//	if($i==1980) $seleted = "selected";
			//	else $seleted='';
			}
			$str .= '<option value="'.$i.'" '.($file_array[2] == $i ?  "selected" : "").' '.$seleted.'  >'.$i.'</option>';
		}
	$str .= '</select>';

return $str;
}
//=========================================================
function DirLanguage($name,$dir,$value){
	global $currentlang;
	$box_language = "<select name=\"$name\" class=CellTable>";
		$handle=opendir($dir);
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
				$box_language .= "<option value=\"$languageslist[$i]\" ";
				if($languageslist[$i]==$value) $box_language .= "selected";
					$box_language .= ">".ucfirst($languageslist[$i])."</option>\n";
	    	}
		}
		$box_language .= "</select>";

	return $box_language;
}
//==========================================================
function DivTable($title){
	$div  = '<table width=100% cellpadding=0 cellspacing=0 border=0><tr>';
	$div .= '<td background="themes/Employers/images/admin/cssheader1.png" width=22 height=24></td>';
	$div .= '<td class=divHeader >'.$title.'</td>';
	$div .= '<td  width=21 height=24 background="themes/Employers/images/admin/cssheader2.png" ></td>';
	$div .= '</tr></table>';
return $div;
}
//==========================================================
function DatetoTime($date){
			$date =	explode('/',$date);
			$date = strtotime($date[2]."/".$date[1]."/".$date[0]);
	return $date;
}
function Date_format_Time($date){
		$date =	explode('/',$date);
		if(sizeof($date)==2) $datetime = strtotime($date[1]."/".$date[0]."/"."01");
		elseif(sizeof($date)==3) $datetime = strtotime($date[2]."/".$date[1]."/".$date[0]);
		else $datetime = time();

	return $datetime;
}
//==========================================================
function TableModules(){
	global $prefix,$currentlang;
	$res = mysql_query("Select mid,title,custom_title_".$currentlang." from $prefix"._modules." $where ");
	while(list($mid,$title,$custom_title)=mysql_fetch_row($res)){
	}
}
//==========================================================
function shortname($name){
			$name = str_replace("Đ", "D", $name);

			$name =	explode(' ',$name);
			$name0 = substr($name[0], 0, 1);
			$name1 = substr($name[1], 0, 1);
			$name2 = substr($name[2], 0, 1);

			$nameshort = strtolower($name0.$name1.$name2);

	return $nameshort;
}
//=======================================

//========================================

function checkPrivateModule($module,$aid){
	global $prefix;

	$result_02 = mysql_query("select module from $prefix"._modules_authors." where aid='$aid' and ( module = '$module' OR module = 'Admin' )");
	list($private_module) = mysql_fetch_row($result_02);
	if(!$private_module){
		
		echo "<script>alert('Bạn không có quyền vào chức năng này');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
		
	}else{
		return $private_module;
	}
}
function LanguageSelectBox($name="newlang",$dir_path="language"){
global $currentlang;

		$returnStr =  "<select name=\"$name\">";
		$handle=opendir($dir_path);
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
				$returnStr .= "<option value=\"$languageslist[$i]\" ";
				if($languageslist[$i]==$currentlang) $returnStr .= "selected";
					$returnStr .= ">".ucfirst($languageslist[$i])."</option>\n";
	    	}
		}
		$returnStr .="</select>";
		return $returnStr;
}

function SelectBox($name,$sql,$value='',$onchange='',$style='',$onclick='',$other='',$title=_SELECTONE){
	global $prefix,$db;
	$result=$db->sql_query($sql);
	$str = "<select name=\"$name\" ".($onchange == 1 ?  "onchange=\"submit()\"" : "")." ".($onclick != '' ?  "onclick=\"$onclick\"" : "")." style=\"".$style."\" ".$other." >";
		$str.= "<option value=\"\" >        ".$title."            </option>";
	while($row=$db->sql_fetchrow($result)){
		$str.= "<option value=\"$row[0]\" ".($value == $row[0] ?  "selected" : "")."> $row[1]</option>";
	}

	return $str."</SELECT>\n";

}
//----------------------------------------
function Getname($field,$table,$where){
	global $prefix;
	$res = mysql_query("Select $field from $table where $where ");
	list($title)=mysql_fetch_row($res);

	echo mysql_error();
	return $title;
}
//-----------------------------------------
function FormatCurrency($value){

    $keyCount = strlen($value);
	switch ($keyCount)
        {
        case 4: 
			$depan= substr($value,0,1);
			$belakang= substr($value,1,3);
			$currency = $depan.'.'.$belakang;
        break;
        case 5:
			$awal = substr($value, 0,2);
			$akhir = substr($value, 2, 3); 
			$currency = $awal .'.'. $akhir;
		break;
        case 6:
			$awal = substr($value, 0,3);
			$akhir = substr($value, 3, 3); 
			$currency = $awal .'.'. $akhir;
		break;
        case 7:
        	 $awal = substr($value, 0, 1);
			 $akhir = substr($value, 1, 3); 
 			 $end = substr($value, 4, 3); 
			 $currency = $awal.'.'.$akhir.'.'.$end;
        break;
        
        case 8:
        	$awal = substr($value, 0, 2);
			$akhir = substr($value, 2, 3);
			$tmp = $awal .'.'. $akhir;
			$awal = substr($value, 5, 3); 
			$currency = $tmp.'.'.$awal;
        break;
        case 9:
        	$awal = substr($value, 0, 3);               //933000 
			$akhir = substr($value, 3, 3);              //012345
			$tmp = $awal .'.'. $akhir;
			$awal = substr($value, 6, 3); 
			$currency = $tmp.'.'.$awal;
        break;

        case 10:                                         //2933000000
        	$awal = substr($value, 0, 1);                //2,933000000
			$akhir = substr($value, 1, 3);               //01234567890
			$tmp = $awal .'.'. $akhir;
			$awal = substr($value, 4, 3); 
			$end = substr($value, 7, 3); 
			$currency = $tmp.'.'.$awal.'.'.$end;

        break;
        case 11:
        	$awal = substr($value,0,2);                  //299330000000
			$akhir = substr($value,2,3);                 //012345678901
			$tmp = $awal .'.'. $akhir;
           	$awal = substr($value,5,3);
        	$end = substr($value,8,3);
			$currency = $tmp.'.'.$awal.'.'.$end;
        break;
        case 12:
        	$awal = substr($value,0,3);
			$akhir = substr($value,3,3);
			$tmp = $awal .'.'. $akhir;       
        		 $awal = substr($value,6,3);
        		 $tengah = substr($value,9,3);
			$currency = $tmp.'.'.$awal.'.'.$tengah;

        break;
    } 
	if(! $currency){
		$currency = $value;
	}
	return $currency;
}
//==============================================
function SelectBox_D($name,$sql,$value='',$onchange='',$style='',$onclick='',$other='',$title=_SELECTONE){
	global $prefix,$db;
	$result=$db->sql_query($sql);
	$str = "<select disabled=\"\" name=\"$name\" ".($onchange == 1 ?  "onchange=\"submit()\"" : "")." ".($onclick != '' ?  "onclick=\"$onclick\"" : "")." style=\"".$style."\" ".$other." >";
		$str.= "<option value=\"\" >        ".$title."            </option>";
	while($row=$db->sql_fetchrow($result)){
		$str.= "<option value=\"$row[0]\" ".($value == $row[0] ?  "selected" : "")."> $row[1]</option>";
	}

	return $str."</SELECT>\n";

}

//==================================================







//==============================================

function GenerateId()
{
	$sValidChars = '123'.time();

	//$id =  time();
	$nLength = strlen($sValidChars);
	for($i = 1; $i <= 3; $i++){
		$nPos = rand(0, $nLength - 1);		
		$id .= $sValidChars[$nPos];
	}
	return $id;
}

//======================================================
function encodeURL($url){
	$url_array =	explode('/',$url);
	$redirectURL = $url_array[2];
	return htmlentities(urlencode($redirectURL));
}
//=====================================================


//=====================================================
function Msg_error($error){
	include("header.php");
		echo '<fieldset style="width:99%;padding:20px;text-align:center">';
			echo ' <div class=msg><img src ="images/admin/Warning.png" align=absmiddle> '.$error.'</div>';
		echo '</fieldset>';
	include("footer.php");
}

//==========================================================

//==========================================================


//==========================================================
function box_mon($fname,$fvalue){
	$box = '<select name="'.$fname.'"  >';
		$box .= '<option value="" >---------</option>';
		for($m=1;$m<=12;$m++){
			$box .= '<option value="'.$m.'" '.($m == $fvalue ?  "selected" : "").'>Tháng '.$m.'</option>';
		}
	$box .= '</select>';
	return $box;
}
//==========================================================
function box_year($fname,$fvalue){
	global $min_year,$max_year;

	$box = '<select name="'.$fname.'" >';
		for($m=$min_year;$m<=$max_year;$m++){
			$box .= '<option value="'.$m.'" '.($m == $fvalue ?  "selected" : "").'> '.$m.'</option>';
		}
	$box .= '</select>';
	return $box;
}
//==========================================================
function box_day($fname,$fvalue){
	$box = '<select name="'.$fname.'" >';
		for($m=1;$m<=31;$m++){
			$box .= '<option value="'.$m.'" '.($m == $fvalue ?  "selected" : "").'> '.$m.'</option>';
		}
	$box .= '</select>';
	return $box;
}

//==============================================




//--------------------


function check_file($url){

			$filetype = substr($url, strrpos($url, '.'));
			$filetype = substr($filetype, 1); 
				if(file_exists("images/admin/".$filetype.".gif")){
					$file_image = "<img src=\"images/admin/".$filetype.".gif\" align=absmiddle border=0>";
				}else{
					$file_image="";
				}
			$filename = substr($url, strrpos($url, '/'));
			$filename = substr($filename, 1); 
	return '<a href="'.$url.'" target=_blank>'.$file_image.$filename.'</a>';
}



//ham doi so

function convert_number_to_words($number) {
$hyphen      = ' ';
$conjunction = '  ';
$separator   = ' ';
$negative    = 'negative ';
$decimal     = ' point ';
$dictionary  = array(
0                   => 'Không',
1                   => 'Một',
2                   => 'Hai',
3                   => 'Ba',
4                   => 'Bốn',
5                   => 'Năm',
6                   => 'Sáu',
7                   => 'Bảy',
8                   => 'Tám',
9                   => 'Chín',
10                  => 'Mười',
11                  => 'Mười một',
12                  => 'Mười hai',
13                  => 'Mười ba',
14                  => 'Mười bốn',
15                  => 'Mười năm',
16                  => 'Mười sáu',
17                  => 'Mười bảy',
18                  => 'Mười tám',
19                  => 'Mười chín',
20                  => 'Hai mươi',
30                  => 'Ba mươi',
40                  => 'Bốn mươi',
50                  => 'Năm mươi',
60                  => 'Sáu mươi',
70                  => 'Bảy mươi',
80                  => 'Tám mươi',
90                  => 'Chín mươi',
100                 => 'trăm',
1000                => 'ngàn',
1000000             => 'triệu',
1000000000          => 'tỷ',
1000000000000       => 'nghìn tỷ',
1000000000000000    => 'ngàn triệu triệu',
1000000000000000000 => 'tỷ tỷ'
);
if (!is_numeric($number)) {
return false;
}
if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
// overflow
trigger_error(
'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
E_USER_WARNING
);
return false;
}
if ($number < 0) {
return $negative . convert_number_to_words(abs($number));
}
$string = $fraction = null;
if (strpos($number, '.') !== false) {
list($number, $fraction) = explode('.', $number);
}
switch (true) {
case $number < 21:
$string = $dictionary[$number];
break;
case $number < 100:
$tens   = ((int) ($number / 10)) * 10;
$units  = $number % 10;
$string = $dictionary[$tens];
if ($units) {
$string .= $hyphen . $dictionary[$units];
}
break;
case $number < 1000:
$hundreds  = $number / 100;
$remainder = $number % 100;
$string = $dictionary[$hundreds] . ' ' . $dictionary[100];
if ($remainder) {
$string .= $conjunction . convert_number_to_words($remainder);
}
break;
default:
$baseUnit = pow(1000, floor(log($number, 1000)));
$numBaseUnits = (int) ($number / $baseUnit);
$remainder = $number % $baseUnit;
$string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
if ($remainder) {
$string .= $remainder < 100 ? $conjunction : $separator;
$string .= convert_number_to_words($remainder);
}
break;
}
if (null !== $fraction && is_numeric($fraction)) {
$string .= $decimal;
$words = array();
foreach (str_split((string) $fraction) as $number) {
$words[] = $dictionary[$number];
}
$string .= implode(' ', $words);
}
return $string;
}

function dateDiff($endDate, $beginDate){
		$a1=strtotime ($endDate);
		$b1=strtotime ($beginDate);
		// First we need to break these dates into their constituent parts:
		$gd_a = getdate( $a1 );
		$gd_b = getdate( $b1 );
		// Now recreate these timestamps, based upon noon on each day
		// The specific time doesn't matter but it must be the same each day
		$a_new = mktime( 12, 0, 0, $gd_a['mon'], $gd_a['mday'], $gd_a['year'] );
		$b_new = mktime( 12, 0, 0, $gd_b['mon'], $gd_b['mday'], $gd_b['year'] );

		// Subtract these two numbers and divide by the number of seconds in a
		// day. Round the result since crossing over a daylight savings time
		// barrier will cause this time to be off by an hour or two.
		return round( abs( $a_new - $b_new ) / 86400 );

}
function count_date($endDate, $beginDate){
		$a1=strtotime ($endDate);
		$b1=strtotime ($beginDate);
		// First we need to break these dates into their constituent parts:
		$gd_a = getdate( $a1 );
		$gd_b = getdate( $b1 );
		// Now recreate these timestamps, based upon noon on each day
		// The specific time doesn't matter but it must be the same each day
		$a_new = mktime( 12, 0, 0, $gd_a['mon'], $gd_a['mday'], $gd_a['year'] );
		$b_new = mktime( 12, 0, 0, $gd_b['mon'], $gd_b['mday'], $gd_b['year'] );

		// Subtract these two numbers and divide by the number of seconds in a
		// day. Round the result since crossing over a daylight savings time
		// barrier will cause this time to be off by an hour or two.
		return round(( $a_new - $b_new ) / 86400 );

}

//------------------------
	function pagination_ajax($total, $number_per_page, $current_page = 1, $class='paginate_button', $classCurrent = 'paginate_active'){
		$pagination_system = '';
		$pagination_stages = 2;
		//echo $current_page;
		$start_page = ($current_page - 1) * $number_per_page;
		
		//This initializes the page setup
		$previous_page = $current_page - 1;	
		$next_page = $current_page + 1;							
		$last_page = ceil($total/$number_per_page);
		$last_paged = $last_page - 1;
		// Start
		if($last_page > 1){
			$pagination_system .='<div class="dataTable_length">';
			$pagination_system .= 'Số bản ghi:';
			$pagination_system .= '<select class="paginate_length"  id="paginate_length"  onchange="doiphantrang()" style="width:45px;">';
			$pagination_system .= '<option '.($number_per_page==10?'selected="selected"':'').' value="10">10</option>';
			$pagination_system .= '<option '.($number_per_page==20?'selected="selected"':'').' value="20">20</option>';
			$pagination_system .= '<option '.($number_per_page==30?'selected="selected"':'').' value="30">30</option>';
			$pagination_system .= '<option '.($number_per_page==40?'selected="selected"':'').' value="40">40</option>';
			$pagination_system .= '<option '.($number_per_page==50?'selected="selected"':'').' value="50">50</option>';
			$pagination_system .= '<option '.($number_per_page==60?'selected="selected"':'').' value="60">60</option>';
			$pagination_system .= '<option '.($number_per_page==100?'selected="selected"':'').' value="100">100</option>';
			$pagination_system .= '</select>';
			$pagination_system .=' / trang';
			$pagination_system .= '</div>';
			$pagination_system .= '<div class="dataTable_paginate">';
			
			// Trang trước
			if($current_page > 1){
				$pagination_system.= "<a class=\"first paginate_button\"  page='".$previous_page."' onclick=\"tieptheo(".$previous_page.")\">Trước</a>"; }
			else{
				$pagination_system.= "<a class=\"first paginate_button disabled paginate_button_disabled\" >Trước</a>";
			}
			// Nếu không đủ trang tới điểm ngắt
			if ($last_page < 7 + ($pagination_stages * 2)){	
				$pagination_system .='<span>';
				for ($page_counter = 1; $page_counter <= $last_page; $page_counter++){
					if ($page_counter == $current_page) {
						$pagination_system.= "<a class='paginate_active'>$page_counter</a>";
					}else {
						$pagination_system.= "<a class='paginate_button' page=".$page_counter." onclick=\"tieptheo(".$page_counter.")\">$page_counter</a>";
					}
				}
				$pagination_system .='</span>';
			}elseif($last_page > 5 + ($pagination_stages * 2)){
				if($current_page < 1 + ($pagination_stages * 2)){
					$pagination_system .='<span>';
					for ($page_counter = 1; $page_counter < 4 + ($pagination_stages * 2); $page_counter++){
						if ($page_counter == $current_page) {
							$pagination_system.= "<a class=\"paginate_active\" >$page_counter</a>";
						}else {
							$pagination_system.= "<a class=\"paginate_button\"  page=".$page_counter." onclick=\"tieptheo(".$page_counter.")\">$page_counter</a>";
						}	
					}
					$pagination_system.= "<a class=\"paginate_button disabled\" >...</a>";
					$pagination_system.= "<a class=\"paginate_button\" page=".$last_paged." onclick=\"tieptheo(".$last_paged.")\">$last_paged</a>";
					$pagination_system.= "<a class=\"paginate_button\"  page=".$last_page." onclick=\"tieptheo(".$last_paged.")\">$last_page</a>";
					$pagination_system .='</span>';
				}elseif($last_page-($pagination_stages*2) > $current_page && $current_page > ($pagination_stages*2)){
					$pagination_system .='<span>';
					$pagination_system .= "<a class=\"paginate_button\"  page=\"1\" onclick=\"tieptheo(1)\">1</a>";
					$pagination_system .= "<a class=\"paginate_button\"  page=\"2\" onclick=\"tieptheo(2)\">2</a>";
					$pagination_system .= "<a class=\"paginate_button disabled\" >...</a>";
					for ($page_counter =($current_page-$pagination_stages);$page_counter<=($current_page+$pagination_stages); $page_counter++){
						if ($page_counter == $current_page) {
							$pagination_system.= "<a class=\"paginate_active\" >$page_counter</a>";
						}else {
							$pagination_system.= "<a class=\"paginate_button\"  page=".$page_counter." onclick=\"tieptheo(".$page_counter.")\">$page_counter</a>";
						}					
					}
					$pagination_system.= "<a class=\"paginate_button disabled\" >...</a>";
					$pagination_system.= "<a class=\"paginate_button\"  page=".$last_paged." onclick=\"tieptheo(".$last_paged.")\">$last_paged</a>";
					$pagination_system.= "<a class=\"paginate_button\" page=".$last_page." onclick=\"tieptheo(".$last_paged.")\">$last_page</a>";
					$pagination_system .='</span>';
				}else{
					$pagination_system .='<span>';
					$pagination_system.= "<a class=\"paginate_button\"  page=\"1\" onclick=\"tieptheo(1)\">1</a>";
					$pagination_system.= "<a class=\"paginate_button\"  page=\"2\" onclick=\"tieptheo(2)\">2</a>";
					$pagination_system.= "<a class=\"paginate_button disabled\">...</a>";
					for($page_counter = $last_page - (2+($pagination_stages*2)); $page_counter <= $last_page; $page_counter++){
						if ($page_counter == $current_page) {
							$pagination_system.= "<a class=\"paginate_active\" >$page_counter</a>";
						}else {
							$pagination_system.= "<a class=\"paginate_button\"  page='".$page_counter."'>$page_counter</a>";
						}					
					}
					$pagination_system .='</span>';
				}
			}
			//Trang tiếp
			if ($current_page < $page_counter - 1) {
				$pagination_system.= "<a class=\"next paginate_button\"  page=".$next_page." onclick=\"tieptheo(".$next_page.")\">Tiếp theo</a>"; 
			}else{
				$pagination_system.= "<a class=\"next paginate_button paginate_button_disabled\" >Tiếp theo</a>";
			}
			$pagination_system .='<input type="hidden" value="'.$current_page.'" name="paginate_current_page" class="paginate_current_page">';
			$pagination_system .= '</div>';
		}
		return $pagination_system;	
	}
	
	


//================ hien thi loai di san
function select_loaids($loai_ds) {
	global $prefix,$db;
	$md = $db->sql_query("SELECT id,name from " . $prefix . "_name_disan order by id ");
		while ($row = $db->sql_fetchrow($md)) {
		
		
			if ($row['id'] == $loai_ds) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
		
		$loai_vb_se .='<option value="'.$row['id'].'" '.$selected.' > '.$row['name'].' </option>';
		
		}
		
		
		
return $loai_vb_se;	
}


//-------------------------
function select_chuyende($chuyende) {
	global $prefix,$db;
	$md = $db->sql_query("SELECT id,name from " . $prefix . "_chuyende order by id ");
		while ($row = $db->sql_fetchrow($md)) {
		
		
			if ($row['id'] == $chuyende) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
		
		$loai_vb_cd .='<option value="'.$row['id'].'" '.$selected.'> '.$row['name'].' </option>';
		
		}
return $loai_vb_cd;	
}
//-------------------------
function select_dantoc($dantoc) {
	global $prefix,$db;
	$md = $db->sql_query("SELECT id,name from " . $prefix . "_dantoc order by id ");
		while ($row = $db->sql_fetchrow($md)) {
		
			if ($row['id'] == $dantoc) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
			
		
		$loai_vb_dt .='<option value="'.$row['id'].'" '.$selected.'> '.$row['name'].' </option>';
		
		}
return $loai_vb_dt;	
}


//-------------------------
function select_ngonngu($ngonngu) {
	global $prefix,$db;
	$md = $db->sql_query("SELECT id,name from " . $prefix . "_ngonngu order by id ");
		while ($row = $db->sql_fetchrow($md)) {
		
			if ($row['id'] == $ngonngu) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
		
		$loai_vb_nn .='<option value="'.$row['id'].'" '.$selected.'> '.$row['name'].' </option>';
		
		}
return $loai_vb_nn;	
}
//-------------------------
function select_hientrang($hientrang,$table) {
	global $prefix,$db;
	$md = $db->sql_query("SELECT id,name from " . $prefix . "".$table." order by id ");
		while ($row = $db->sql_fetchrow($md)) {
		
			if ($row['id'] == $hientrang) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
		
		$loai_vb_ht .='<option value="'.$row['id'].'" '.$selected.'> '.$row['name'].' </option>';
		
		}
return $loai_vb_ht;	
}


//------------------------------
function select_xephang($xephang) {
	global $prefix,$db;
	$md = $db->sql_query("SELECT id,name from " . $prefix . "_xephang order by id ");
		while ($row = $db->sql_fetchrow($md)) {
		
		
		if ($row['id'] == $xephang) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
		$loai_vb_ht .='<option value="'.$row['id'].'"  '.$selected.'> '.$row['name'].' </option>';
		
		}
return $loai_vb_ht;	
}

function select_thotu($thotu) {
	global $prefix,$db;
	$md = $db->sql_query("SELECT id,name from " . $prefix . "_thotu order by id ");
		while ($row = $db->sql_fetchrow($md)) {
		
		
		if ($row['id'] == $thotu) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
		$loai_vb_ht .='<option value="'.$row['id'].'"  '.$selected.'> '.$row['name'].' </option>';
		
		}
return $loai_vb_ht;	
}


function select_huong_xephang($huong_xephang) {
	global $prefix,$db;
	$md = $db->sql_query("SELECT id,name from " . $prefix . "_huong_xephang order by id ");
		while ($row = $db->sql_fetchrow($md)) {
		
		
		if ($row['id'] == $huong_xephang) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
		$loai_vb_ht .='<option value="'.$row['id'].'"  '.$selected.'> '.$row['name'].' </option>';
		
		}
return $loai_vb_ht;	
}

//----------------------------

function select_huyen($huyen) {
	global $prefix,$db;
	
		$xa .='
		<select class="form-control" name="huyen" onChange="get_xa(this.value)" id="huyen"><option value="">Lựa chọn</option>';
		
		
                                        
						$md = $db->sql_query("SELECT id,name from " . $prefix . "_xahuyen where id_xa='0'  order by name asc ");
						while ($row = $db->sql_fetchrow($md)) {
		
							
							
							if ($row['id'] == $huyen) {
							$selected = 'selected';
							} else {
							$selected = '';
							}
			
			
                                       
                                        $xa .='<option value="'.$row['id'].'"  '.$selected.' >'.$row['name'].'</option>';
										
                                       }
									   
                                   $xa .=' </select>';
									
									
		
		
		
return $xa;	
}
//------------------
function Upload_img_vt($num,$pid) {
	global $prefix,$db;
	
	
	$hienthi .='<form action="admin.php?op=Submit_vatthe_img&file='.$num.'" method="post" enctype="multipart/form-data">';
			
			for($i=1; $i <= $num; $i++) 
            { 
			$hienthi .='<input type="file" name="img[]" /><br>';
			}


$hienthi .='<input type="hidden" name="pid" value="'.$pid.'" >';

$hienthi .='<input type="submit" class="btn btn-primary btn-sm" name="ok_upload" value="Upload hình ảnh" />';

$hienthi .='</form>';




return $hienthi;	
}

//---------------------------------------
function Select_xaSelected($huyen,$xa_edit){
	global $prefix,$db;
	$result_xaEdit = $db->sql_query("SELECT * from " . $prefix . "_xahuyen where id_xa='" . intval($huyen) . "' order by name asc ");
        while($row_xaEdit = $db->sql_fetchrow($result_xaEdit)){
			if ($row_xaEdit['id'] == $xa_edit) {
							$selected = 'selected';
							} else {
							$selected = '';
							}
                                        $xa_select .='<option value="'.$row_xaEdit['id'].'"  '.$selected.' >'.$row_xaEdit['name'].'</option>';
		}
		return $xa_select;	
}
//-----------------------------------
function Convert_vi_to_en($str) {
$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
$str = preg_replace("/(đ)/", 'd', $str);
$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
$str = preg_replace("/(Đ)/", 'D', $str);
$str = preg_replace("/( )/", '_', $str);
//$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
 
return $str;
 
}

//----------------------
function Get_name_table($id, $table){
	global $prefix,$db;
$sgl_huyen = $db->sql_query("Select name from ".$prefix."".$table." 
				where id = '".intval($id)."'");
		list($name_huyen) = $db->sql_fetchrow($sgl_huyen);
	return $name_huyen;
}

function Get_name_vt_pvt($id, $table){
	global $prefix,$db;
$sgl_huyen = $db->sql_query("Select name from ".$prefix."".$table." 
				where id = '".intval($id)."'");
		list($name_huyen) = $db->sql_fetchrow($sgl_huyen);
	return $name_huyen;
}

//-----------------------
function Get_name_table_export($id, $table){
	global $prefix,$db;
$sgl_huyen = $db->sql_query("Select name from ".$prefix."".$table." 
				where id = '".intval($id)."'");
		list($name_huyen) = $db->sql_fetchrow($sgl_huyen);
		$name_huyen = Convert_vi_to_en($name_huyen);
		if($name_huyen != ""){
			$name_huyen = $name_huyen."_";
		}
	return $name_huyen;
}
//-----------

function Get_name_table_export_vn($id, $table){
	global $prefix,$db;
$sgl_huyen = $db->sql_query("Select name from ".$prefix."".$table." 
				where id = '".intval($id)."'");
		list($name_huyen) = $db->sql_fetchrow($sgl_huyen);
		//$name_huyen = Convert_vi_to_en($name_huyen);
		if($name_huyen != ""){
			$name_huyen = " ".$name_huyen." ";
		}
	return $name_huyen;
}
//===================
function exp_to_dec($float_str)
// formats a floating point number string in decimal notation, supports signed floats, also supports non-standard formatting e.g. 0.2e+2 for 20
// e.g. '1.6E+6' to '1600000', '-4.566e-12' to '-0.000000000004566', '+34e+10' to '340000000000'
// Author: Bob
{
    // make sure its a standard php float string (i.e. change 0.2e+2 to 20)
    // php will automatically format floats decimally if they are within a certain range
    $float_str = (string)((float)($float_str));

    // if there is an E in the float string
    if(($pos = strpos(strtolower($float_str), 'e')) !== false)
    {
        // get either side of the E, e.g. 1.6E+6 => exp E+6, num 1.6
        $exp = substr($float_str, $pos+1);
        $num = substr($float_str, 0, $pos);
        
        // strip off num sign, if there is one, and leave it off if its + (not required)
        if((($num_sign = $num[0]) === '+') || ($num_sign === '-')) $num = substr($num, 1);
        else $num_sign = '';
        if($num_sign === '+') $num_sign = '';
        
        // strip off exponential sign ('+' or '-' as in 'E+6') if there is one, otherwise throw error, e.g. E+6 => '+'
        if((($exp_sign = $exp[0]) === '+') || ($exp_sign === '-')) $exp = substr($exp, 1);
        else trigger_error("Could not convert exponential notation to decimal notation: invalid float string '$float_str'", E_USER_ERROR);
        
        // get the number of decimal places to the right of the decimal point (or 0 if there is no dec point), e.g., 1.6 => 1
        $right_dec_places = (($dec_pos = strpos($num, '.')) === false) ? 0 : strlen(substr($num, $dec_pos+1));
        // get the number of decimal places to the left of the decimal point (or the length of the entire num if there is no dec point), e.g. 1.6 => 1
        $left_dec_places = ($dec_pos === false) ? strlen($num) : strlen(substr($num, 0, $dec_pos));
        
        // work out number of zeros from exp, exp sign and dec places, e.g. exp 6, exp sign +, dec places 1 => num zeros 5
        if($exp_sign === '+') $num_zeros = $exp - $right_dec_places;
        else $num_zeros = $exp - $left_dec_places;
        
        // build a string with $num_zeros zeros, e.g. '0' 5 times => '00000'
        $zeros = str_pad('', $num_zeros, '0');
        
        // strip decimal from num, e.g. 1.6 => 16
        if($dec_pos !== false) $num = str_replace('.', '', $num);
        
        // if positive exponent, return like 1600000
        if($exp_sign === '+') return $num_sign.$num.$zeros;
        // if negative exponent, return like 0.0000016
        else return $num_sign.'0.'.$zeros.$num;
    }
    // otherwise, assume already in decimal notation and return
    else return $float_str;
}
// Tao so ngau nhien
function rand_string( $length ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
 }
return $str;
}

//===================
function getRealIpAddr()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//=============
function Get_ip($pid){
	global $prefix,$db,$aid,$nam_thang,$portalurl;
	 $result_dk = $db->sql_query("SELECT ip_mang from ".$prefix."_donvi_mua 
	 where id ='" . intval($pid) . "'  ");
    list($ip_mang) = $db->sql_fetchrow($result_dk);
		
	return $ip_mang;
}
//============
function download_page($url)
{
    $fp = fopen($url, 'r');
    $contents = stream_get_contents($fp);
    
    return $contents;
} 
//============
function url_exist($url){
        $c=curl_init();
        curl_setopt($c,CURLOPT_URL,$url);
        curl_setopt($c,CURLOPT_HEADER,1);
        curl_setopt($c,CURLOPT_NOBODY,1);
        curl_setopt($c,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($c,CURLOPT_FRESH_CONNECT,1);
        if(!curl_exec($c)){
        return 1;
        }else{
        return 2;
        }}
//===============
function ymd2($date) 
{ 
if($date=='') 
return '0000-00-00 00:00:00'; 
$a = explode("/",$date); 
return $a[2]."-".$a[1]."-".$a[0]." ".$a[3].":".$a4.":".$a5; 
} 
//============
function get_extente($name){
	global $prefix,$db,$aid,$nam_thang,$portalurl;
	
;	 $result_ip = $db->sql_query("SELECT ".$name." from ".$prefix."_extente");
    list($ip_mang) = $db->sql_fetchrow($result_ip);
	return $ip_mang;
}
//================
function swap_date2($date){
    if($date == null){
        $str = "";
    }else{
        // $new = strtotime('+3 day',strtotime($date));
        $str = date('Y-m-d H:i:s',strtotime($date));
    }
    return $str;
}
//====================================================
function select_colum_excel($fieldname,$defaulselect) {
	 global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	$selectform="<select name=".$fieldname."  onchange=\"Datmau(this, 'red', '#CCE2FC');\">";
	$selectform.='<option value="" > </option>';
	 $result = $db->sql_query("SELECT * from portal_bangexcel order by sort_order");
	  while($row= $db->sql_fetchrow($result)){
		 if($defaulselect == $row['name']){
			 $selected = 'selected';
		 }else{
			 $selected = '';
		 }
		  $selectform.='<option value="'.$row['sort_order'].'" '.$selected.'>'.$row['name'].'</option>';
	  }
	  $selectform.='</select>';
	return $selectform;
}
//----------------------
function Get_id_xahuyen($name,$id_huyen){
	global $prefix,$db;
	
		$sgl_huyen = $db->sql_query("Select id from ".$prefix."_xahuyen 
				where name2 = '".$name."' and id_xa = '".intval($id_huyen)."' order by name asc");
	
		list($id) = $db->sql_fetchrow($sgl_huyen);
	return $id;
}
//----------------------
function Get_idhuyen($name){
	global $prefix,$db;
	
		$sgl_huyen = $db->sql_query("Select id from ".$prefix."_xahuyen 
				where name2 = '".$name."' and id_xa = 0 order by name asc");
	
		list($id) = $db->sql_fetchrow($sgl_huyen);
	return $id;
}
//----------------------
function Get_id_loaids($name,$table){
	global $prefix,$db;
		$sgl_huyen = $db->sql_query("Select id from ".$prefix."".$table." 
				where name2 = '".$name."'");
		list($id) = $db->sql_fetchrow($sgl_huyen);
	return $id;
}
//----------------------
function get_name_ditich($pid){
	global $prefix,$db;
		$sgl_huyen = $db->sql_query("Select tenditich from ".$prefix."_vatthe 
				where id = '".$pid."'");
		list($id) = $db->sql_fetchrow($sgl_huyen);
	return $id;
}
function count_ditich_by_loai($loai_ds){
	global $prefix,$db;
		$sgl_huyen = $db->sql_query("Select count(id) from ".$prefix."_vatthe 
				where loai_ds = '".$loai_ds."'");
		list($id) = $db->sql_fetchrow($sgl_huyen);
	return $id;
}
//----------------------
function view_dk_vanban_sua($id_cv,$table,$bien_bang){
	global $prefix, $currentlang, $aid, $sortorder, $portalurl, $sitename, $db, $nam_thang, $cv_id_hs;
	$string = '<div"><table border="0" class="table table-striped table-bordered table-hover">';
	 $result_dk = $db->sql_query("SELECT * from ".$prefix."".$table."".$nam_thang."  
	 where id_cv ='" . intval($id_cv) . "' order by id ");
    while ($row_dk = $db->sql_fetchrow($result_dk)) {
		$string .= '<tr id="hien_'.$row_dk['id'].'"><td><a href="'.$portalurl.'/images/File/'.$row_dk['file_en'].'" title="Tải file về" >'.$row_dk['file_dk'].'</a></td><td align="center"><a onClick="xoa_dk('.$row_dk['id'].','.$bien_bang.')"><div class="btn btn-primary btn-xs">
                                            <strong>Xóa</strong>
                                            </div></a></td></tr>';
		
	}
	$string .= '</table></div>';
		return $string;
}
function get_fullname($aid){
	global $prefix,$db;
	$r_lvb = $db->sql_query("SELECT name from " . $prefix . "_authors where aid='" . $aid . "'");
    list($name_loai_vb)=mysql_fetch_array($r_lvb);
	
	return $name_loai_vb;
}
function get_msg_count_unread($aid,$id_rev){
      global $prefix,$db,$nam_thang;
   $today = strtotime('00:00:00');
    $mid = date('Y-m-d H:i:s', $today);

      $result = $db->sql_query("SELECT count(id) from " . $prefix . "_chat where username='" .$id_rev. "' and user_id='".$aid."' and has_read='0' and chatdate > '".$mid."' ");
      list($count_msg_unread)=$db->sql_fetchrow($result);
	  return $count_msg_unread;
}
function check_role($aid){
	 global $prefix,$db,$nam_thang;
	 $r_lvb = $db->sql_query("SELECT superadmin from " . $prefix . "_modules_authors where aid='" . $aid . "' and module = 'Admin'");
    list($superadmin_module) = mysql_fetch_row($r_lvb);
    return $superadmin_module;
}
function select_xathon($id_xa){
	global $prefix,$db,$nam_thang;
	$result = $db->sql_query("SELECT id,name from " . $prefix . "_xahuyen where id_xa >0 order by stt asc ");
		while ($row = $db->sql_fetchrow($result)) {
			
			if ($row['id'] == $id_xa) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
			
		$loai_vb_ht .='<option value="'.$row['id'].'"  '.$selected.'> '.$row['name'].' </option>';
			}
			return $loai_vb_ht;
	}
	//---------------------------------------
function Select_xaSelected2($huyen){
	global $prefix,$db;
	$result_xaEdit = $db->sql_query("SELECT * from " . $prefix . "_xahuyen where id_xa=0 order by id ");
        while($row_xaEdit = $db->sql_fetchrow($result_xaEdit)){
			if ($row_xaEdit['id'] == $huyen) {
							$selected = 'selected';
							} else {
							$selected = '';
							}
                                        $xa_select .='<option value="'.$row_xaEdit['id'].'"  '.$selected.' >'.$row_xaEdit['name'].'</option>';
		}
		return $xa_select;	
}
require_once("mod-rewite.php");
?>