<?
/*-----------------------------------------------------------------*/
function get_real_link_from_top ($cid){
	global $prefix;
	$str = '';

		$result = mysql_query("SELECT cid 
					FROM $prefix"._links_categories."  
					WHERE parentid = '$cid'
					ORDER BY title");
	
	while(list($pcid)=mysql_fetch_row($result)){
		$str .= $pcid . '_' . get_real_link_from_top ($pcid, $check_links_categories_active);					
	}

	return $str;
}
/*-----------------------------------------------------------------*/
function get_links_from_top ($cid){
	$str = get_real_link_from_top ($cid);
	if($str[strlen($str) - 1] == '_') return substr($str, 0, strlen($str) - 1);
	else return $str;
}
/*-----------------------------------------------------------------*/
function get_links_list_in_links_categories($cid, $extra_condition=''){
	global $prefix;
	$cat_str = get_links_from_top ($cid);
	$links_categories_array = array();
	$links_categories_array = explode('_', $cat_str);
	$condition = "WHERE (cid = '$cid' ";
	if(sizeof($links_categories_array)  && $links_categories_array[0] != ''){
		for($idx=0; $idx < sizeof($links_categories_array); $idx++){
			$condition .= "OR cid = '".$links_categories_array[$idx]."' ";
		}
	}
	$condition .= ') ';
	$links_str = '';
	$result = mysql_query("SELECT lid 
						   FROM $prefix"._links_links." 
						   $condition $extra_condition 
						   ");

	if(mysql_num_rows($result)){
		list($pid) = mysql_fetch_row($result);
		$links_str = $pid;
		while(list($pid) = mysql_fetch_row($result)){
			$links_str = $links_str . "_" . $pid;
		}
	}

	return $links_str;
}
/*-----------------------------------------------------------------*/
function show_link_in_category_selectbox($parent_id, $level, $exclude_array, $selected_id){
	global $prefix;
	$str = '';
	$result = mysql_query("SELECT cid, title 
						   FROM $prefix"._downloads_categories." 
						   WHERE parentid='$parent_id' 
						   ORDER BY title ");
	while(list($category_id, $category_title)=mysql_fetch_row($result)){
		if(!in_array($category_id, $exclude_array)){
			$select1 = ($selected_id == $category_id)?"selected":"";
			$str .= "<option value=\"$category_id\" $select1>";
			for($i=1; $i<= $level*3;$i++){
				$str .= '&nbsp;';
			}
			if($level) $str .= '|---';
			$str .= $category_title;
				$res = mysql_query("Select lid, title from $prefix"._downloads_downloads." where cid = '$category_id' ");
				while(list($lid,$links)=mysql_fetch_row($res)){
					$str .= "|----->".$links;	
				}

			$str .= "</option>\n";
			$str .= show_options_in_category_selectbox($category_id, $level+1, $exclude_array, $selected_id);					
		}
	}
	return $str;
}
//=====================================================================================================================
// MODULE DOWNLOAD
/*-----------------------------------------------------------------*/
function show_downloads_categories_link($current_parent_id) {
    global $prefix, $op, $selectedLang, $mod_name;

	if($current_parent_id == '') $current_parent_id=0;
	if($current_parent_id != 0){
		$get_curent_id = $current_parent_id;
		$result = mysql_query("SELECT title, parentid   
							   FROM $prefix"._downloads_categories." 
							   WHERE cid  = '$get_curent_id'");
		list($news_category_title, $news_category_parent_id) = mysql_fetch_row($result);
		$category_path = " <font class=navMenu> &#187; ".$news_category_title."</font>";
		$get_curent_id=$news_category_parent_id;
		while($get_curent_id != 0) {
			$result = mysql_query("SELECT cid,title, parentid  
								   FROM $prefix"._downloads_categories." 
								   WHERE cid = '$get_curent_id'");
			list($id,$news_category_title, $news_category_parent_id) = mysql_fetch_row($result);
			$category_path = " > "."<a href=\"modules.php?name=Database&ViewDatabase&cid=$id\" class=bigtitle>$news_category_title</a>".$category_path;
			$get_curent_id=$news_category_parent_id;
		}
		

		return $category_path;

	}
}
/*-----------------------------------------------------------------*/

function total_database($cid){
	global $prefix;
	$totalcontent='';
	
		$result = mysql_query("SELECT count(*) as total 
							   FROM $prefix"._downloads_downloads."  
							   WHERE cid = '$cid'");
		$tmp = mysql_fetch_array($result);
		
		$totalcontent += $tmp[total];
		
	
	$result = mysql_query("SELECT cid 
						   FROM $prefix"._downloads_categories." 
						   WHERE parentid  = '$cid'");
	if(mysql_num_rows($result)){
		while(list($cid) = mysql_fetch_row($result)){
			$totalcontent = $totalcontent + total_database($cid);
		}
		return $totalcontent;
	} 
	else{
		return $totalcontent;
	}
}
/*-----------------------------------------------------------------*/

function module_show_database_category($parentid, $level, $exclude_array, $query){
	global $prefix,$currentlang;
	$str = '';
		$sql = "SELECT cid, title 
						   FROM $prefix"._downloads_categories." 
						   WHERE parentid='$parentid' 
						   ORDER BY  title";

	$result = mysql_query($sql);
	while(list($cid, $title)=mysql_fetch_row($result)){
			$str .= "<table width=\"80%\" cellpadding=0 cellspacing=0 align=center><tr><td height=20>";
			for($i=1; $i<= $level*3;$i++){
				$str .= '&nbsp;';
			}
			if($level) $str .= '<img src="images/tree.gif" align=absmiddle>';
			if($level==0){
				$str .= "<img src=\"images/icon_open_folder.gif\" align=absmiddle>&nbsp;<a href=\"modules.php?name=Database&op=ViewDatabase&cid=$cid\" class=menutitle>".$title."</a>"." ( " .total_database($cid,$country_id,$province_id)." )";;
			}else{
				$str .= "<a href=\"modules.php?name=Database&op=ViewDatabase&cid=$parentid&sid=$cid\">".$title ." </a> ( " .total_database($cid,$country_id,$province_id)." )";
			}
			$str .= "</td></tr></table>\n";
			$str .= module_show_database_category($cid, $level+1, $exclude_array, $query);					
	
	}
	return $str;
}
/*-----------------------------------------------------------------*/
function show_options_in_category_selectbox($parent_id, $level, $exclude_array, $selected_id){
	global $prefix;
	$str = '';
	$result = mysql_query("SELECT cid, title 
						   FROM $prefix"._downloads_categories." 
						   WHERE parentid='$parent_id' 
						   ORDER BY title ");
	while(list($category_id, $category_title)=mysql_fetch_row($result)){

		if(!in_array($category_id, $exclude_array)){		
			$select1 = ($selected_id == $category_id)?"selected":"";
			$str .= "<option value=\"$category_id\" $select1>";
			for($i=1; $i<= $level*3;$i++){
				$str .= '&nbsp;';
			}
			if($level) $str .= '|---';
			$str .= $category_title;
			$str .= "</option>\n";
			$str .= show_options_in_category_selectbox($category_id, $level+1, $exclude_array, $selected_id);					
		}
	}
	return $str;
}
//=================================================================
function show_links_in_category_selectbox($parent_id, $level, $exclude_array, $selected_id){
	global $prefix;
	$str = '';
	$result = mysql_query("SELECT cid, title 
						   FROM $prefix"._downloads_categories." 
						   WHERE parentid='$parent_id' 
						   ORDER BY title ");
	while(list($category_id, $category_title)=mysql_fetch_row($result)){
		$res = mysql_query("select lid,title from $prefix"._downloads_downloads." where	cid='$category_id'	");
		if(!in_array($category_id, $exclude_array)){		
			$select1 = ($selected_id == $category_id)?"selected":"";
			$str .= "<option $select1 style=\"color: red;text-decoration: underline\" >";
			for($i=1; $i<= $level*3;$i++){
				$str .= '&nbsp;';
			}
			if($level) $str .= '&nbsp;|---';
			$str .= $category_title;
			$str .= "</option>\n";
				$str_list='';
				while(list($lid,$title)=mysql_fetch_row($res)){
						$str_list .= '<option value="'.$lid.'" '.($selected_id == $lid ?"selected":"").' >|---->> '.$title.'</option>';
				}
			$str .= $str_list;
			$str .= show_links_in_category_selectbox($category_id, $level+1, $exclude_array, $selected_id);					
		}
	}
	return $str;
}
/*-----------------------------------------------------------------*/
function get_downloads_category_id_from_top ($cid, $check_news_category_active=0){
	$str = get_real_downloads_category_id_from_top ($cid, $check_news_category_active);
	if($str[strlen($str) - 1] == '_') return substr($str, 0, strlen($str) - 1);
	else return $str;
}

/*-----------------------------------------------------------------*/
function get_real_downloads_category_id_from_top ($cid, $check_news_category_active=0){
	global $prefix;
	$str = '';
		$result = mysql_query("SELECT cid 
							   FROM $prefix"._downloads_categories."  
							   WHERE parentid ='$cid'
								");

	while(list($pcid)=mysql_fetch_row($result)){
		$str .= $pcid . '_' . get_real_downloads_category_id_from_top ($pcid, $check_news_category_active);					
	}

	return $str;
}
/*-----------------------------------------------------------------*/
function get_downloads_list_in_downloads_categories($cid, $extra_condition=''){
	global $prefix;
	$cat_str = get_downloads_category_id_from_top ($cid);
	$downloads_categories_array = array();
	$downloads_categories_array = explode('_', $cat_str);
	$condition = "WHERE (cid = '$cid' ";
	if(sizeof($downloads_categories_array)  && $downloads_categories_array[0] != ''){
		for($idx=0; $idx < sizeof($downloads_categories_array); $idx++){
			$condition .= "OR cid = '".$downloads_categories_array[$idx]."' ";
		}
	}
	$condition .= ') ';
	$downloads_str = '';
	$result = mysql_query("SELECT lid 
						   FROM $prefix"._downloads_downloads." 
						   $condition $extra_condition 
						   order by ngaybh DESC
						   ");

	if(mysql_num_rows($result)){
		list($pid) = mysql_fetch_row($result);
		$downloads_str = $pid;
		while(list($pid) = mysql_fetch_row($result)){
			$downloads_str = $downloads_str . "_" . $pid;
		}
	}

	return $downloads_str;
}
/*-----------------------------------------------------------------*/

function show_options_in_downloads_category_selectbox($downloads_category_parent_id, $level, $exclude_array, $selected_id){
	global $prefix;
	$str = '';
	$result = mysql_query("SELECT cid, title 
						   FROM $prefix"._downloads_categories." 
						   WHERE parentid ='$downloads_category_parent_id' 
						   ");
	while(list($cid, $title)=mysql_fetch_row($result)){
		if(!in_array($cid, $exclude_array)){
			$select1 = ($selected_id == $cid)?"selected":"";
			$str .= "<option value=\"$cid\" $select1>";
			for($i=1; $i<= $level*3;$i++){
				$str .= '&nbsp;';
			}
			if($level) $str .= '|---';
			$str .= $title;
			$str .= "</option>\n";
			$str .= show_options_in_downloads_category_selectbox($cid, $level+1, $exclude_array, $selected_id);					
		}
	}
	return $str;
}
/*-----------------------------------------------------------------*/

/*-----------------------------------------------------------------*/

 function downloads_category_pull_down($parameters, $exclude) {
	global $prefix, $exclude_array;
	$str_top = get_downloads_category_id_from_top($exclude);
	$str =  $exclude . '_' . $str_top;
	$exclude_array = explode('_', $str);

	$result = mysql_query("SELECT parentid 
						   FROM $prefix"._downloads_categories ."  
						   WHERE  cid ='$exclude'");
	list($downloads_category_parent_exclude_id)=mysql_fetch_row($result);	

    $select_string = '<select " ' . $parameters . '>';
	$select_string .= '<option value="0">'._MAINCATEGORIESdownloads.'</option>';
	$select_string .= '<optgroup label="-----------------">';
	$select_string .= show_options_in_downloads_category_selectbox(0, 0, $exclude_array, $downloads_category_parent_exclude_id);
    $select_string .= '</select>';
    return $select_string;
  }
?>