<?php
global $prefix;

if (!@eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
checkPrivateModule("Tudienhethong",$aid);
/*********************************************************/
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
/*********************************************************/
function Dictionary(){
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename;
	include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	
		echo '<div class="right_2" style="padding-right: 0px !important; padding-left: 5px !important;" id="page-content-wrapper">
                <div class=" col_right">
                    <div class="url_top">
                        <a href="#">Định nghĩa từ điển</a>  
                    </div>
                    <div class=" col-xs-12  ">
                        
                        <table width=96% style="border-collapse: collapse" bordercolor="#FFFFFF"  border="1" bgcolor=#f4f4f4>';
		$over = "onmouseover=\"if(this != current_row) {this.style.backgroundColor ='#D0DEF0';this.style.color='red'}\" onmouseout=\"if(this!=current_row){this.style.backgroundColor='#f4f4f4';;this.style.color='#111111'}\"";
			echo '<tr>';
			echo '<td align=center '.$over.' style= " font-size:13px;width:20%;height:50px;"><a href="admin.php?op=indexDictionary&table=name_disan" onmouseover="roll(\'xephang\', \'images/admin/publish.png\')" onmouseout="roll(\'xephang\', \'images/admin/publish_f2.png\')"><IMG SRC="images/admin/publish_f2.png"  BORDER="0"  NAME="xephang"> <br><br><strong>Tên di sản</strong></a></td>';
			echo '<td align=center '.$over.' style= " font-size:13px;width:20%;height:50px;"><a href="admin.php?op=indexDictionary&table=hientrang_vatthe" onmouseover="roll(\'hientrang\', \'images/admin/publish.png\')" onmouseout="roll(\'hientrang\', \'images/admin/publish_f2.png\')"><IMG SRC="images/admin/publish_f2.png"  BORDER="0"  NAME="hientrang"> <br><br><strong>Hiện trạng vật thể</strong></a></td>';
			echo '<td align=center '.$over.' style= " font-size:13px;width:20%;height:50px;"><a href="admin.php?op=indexDictionary&table=huong_xephang" onmouseover="roll(\'xephang\', \'images/admin/publish.png\')" onmouseout="roll(\'xephang\', \'images/admin/publish_f2.png\')"><IMG SRC="images/admin/publish_f2.png"  BORDER="0"  NAME="xephang"> <br><br><strong>Hướng tới xếp hạng</strong></a></td>';
			echo '<td align=center '.$over.' style= " font-size:13px;width:20%;height:50px;"><a href="admin.php?op=indexDictionary&table=xephang" onmouseover="roll(\'xephang\', \'images/admin/publish.png\')" onmouseout="roll(\'xephang\', \'images/admin/publish_f2.png\')"><IMG SRC="images/admin/publish_f2.png"  BORDER="0"  NAME="xephang"> <br><br><strong>Xếp hạng</strong></a></td>';
			echo '</tr>';
			echo '<tr>';
			
			echo '<td align=center '.$over.' style= " font-size:13px;width:20%;height:50px;"><a href="admin.php?op=indexDictionary&table=thotu" onmouseover="roll(\'thotu\', \'images/admin/publish.png\')" onmouseout="roll(\'thotu\', \'images/admin/publish_f2.png\')"><IMG SRC="images/admin/publish_f2.png"  BORDER="0"  NAME="thotu"> <br><br><strong>Đối tượng thờ tự</strong></a></td>';
			
			
			echo '</tr>';
		
		echo '
		
		<tr>';
		
			echo '</tr>';
			
		echo '</div></table>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
	
	include("bottom.php");
}
//====================================================================
function indexDictionary($table) {
    global $edit_id,$aid,  $pos,$prevIndex, $op,$prefix, $currentlang, $selectedLang,$maxRow,$maxPage,$current_parent_id,$selectedLang;
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename;
	include 'admin/include/Topmenu_header.php';
	include 'header.php';
	include 'admin/modules/Content_left.php';
	
	
	$ftable = '_'.$table;

	if($current_parent_id) $where_parent = "AND  parent_id = '$current_parent_id' ";
	if($selectedLang != '') $where_selectedLang = "AND language='$selectedLang'";
	else $where_parent="AND parent_id = '0'";
						$query = "SELECT id,name,sort_order,description
								  FROM $prefix".$ftable." 
								  ORDER BY name asc
								  ";
						$link = "&table=$table";
						$query_limit = split_pages($query,$link);
						$result = mysql_query($query_limit);
	
	
	
	
	
	echo '<div class="right_2" style="padding-right: 0px !important; padding-left: 5px !important;" id="page-content-wrapper">
                <div class=" col_right">
                    <div class="url_top">
                        <a href="'.$portalurl.'/tu-dien-he-thong">Định nghĩa từ điển</a>  
                    </div>
                    <div class=" col-xs-12  ">';
					
                        
                        
						if($edit_id){
						$res_edit = mysql_query("SELECT * from  $prefix".$ftable."  where  id = '$edit_id' ");
						$edit=mysql_fetch_array($res_edit);
						$hidden = "<input type=\"hidden\" name=\"edit_id\" value=\"$edit_id\">";
					}
echo "<form method=POST action=\"admin.php?op=AddDictionary\">";
		echo '<INPUT TYPE="hidden" NAME="table" value="'.$table.'">';
		echo $hidden;

					echo '<table width=100%  cellpadding=1 cellspacing=1 border=0 >';
						echo '<tr><td style="padding-left:5px;width:100px;">
						Tiều đề
						';
						
						echo '
						</td><td><INPUT TYPE="text" placeholder="Nhập tiêu đề" class="input_text" NAME="title" value="'.$edit[name].'" style="width:90%"></td></tr>';
						
						
						if($table=='chucvu'){
						echo '<tr><td>Ghi chú</td><td><TEXTAREA class="input_text" NAME="note" ROWS="2" style="width:90%">'.$edit[description].'</TEXTAREA></td></tr>';
						}
						
						
						
						echo '<tr><td>Ghi chú</td><td><TEXTAREA class="input_text" NAME="note" ROWS="2" style="width:90%">'.$edit[description].'</TEXTAREA></td></tr>';
					echo "</table>";
			echo'	
					
						<p align="center"><input type="submit" value="'._UPDATE.'" class="bot"  /></p>
						
					
		</form>	
            </div><!--end left option-->     
			<div style=" margin-left:10px;width:96%; float:left"><!--begin right option-->';
		echo'
		<form   method=POST action="admin.php?op=DeleteAllDictionary">
		
		<TABLE width="100%" cellpadding="5" bordercolor="#B2DAEE" border="1" style=" font-size:14px;border-collapse: collapse;">
		  <THEAD>
		  <TR bgcolor="#f5f5f5" height="30px;">
				<TD align="center"><strong>Xóa</strong></TD>
				
				<TD align="center"><strong>'._TITLE.'</strong></TD>
				
				<TD align="center"><strong>Ghi chú</strong></TD>
		  </TR>
		 </THEAD>
		  <TBODY >';
		   echo '<INPUT TYPE="hidden" NAME="table" value="'.$table.'">';
	    $counter = 0;			
	    while(list($id,$title,$sort_order,$description) = mysql_fetch_row($result)) {
			if($counter % 2 == 0){
				$tblColor = "tblColor1";
				$colorTD = "#ffffff";
			}else{
				$tblColor = "tblColor2";
				$colorTD = "#f4f4f4";
			}
			$counter++; global $bgcolor3;

		  $action_checkbox = "<INPUT TYPE=\"checkbox\" NAME=\"id[]\" value=\"$id\">";				
		  echo "<TR class=\"$tblColor\" height=\"30px\" >";	
		  echo '<TD align=center>'.$action_checkbox.'</TD>';
		 

			echo '<TD><a href="admin.php?op=indexDictionary&table='.$table.'&edit_id='.$id.'"> &nbsp;&nbsp;'.$title.'</a></TD>';
			
			 echo '<TD align=left> '.$description.'</TD>';
			echo'</TR>
			
			';
		}
		echo'</TBODY>';
		echo'
		<tr><td align=center><input class="bot" name="Delete" value="Xóa" type="submit" /></td><td colspan="2" align=left ></td></tr>
		</TABLE>';
			echo'	</form>
                        
                        
                    </div><div class="clear"></div>

	                </div>
				
				
            </div>
			
        </div>
    </div>
</div>';


	
	
	


?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 750 ;
	initTableWidget('myTable',UserWidth,0,Array(false));
	</SCRIPT>
<?		
    include("bottom.php");
}
//============================================================
function OrderDictionary($sort_orderrep, $sort_order, $pcidrep, $pcidori, $language, $parent_id) {
    global $selectedLang,$pos,$prevIndex, $prefix,$table,$current_parent_id;
	$ftable = '_'.$table;

	mysql_query("UPDATE $prefix".$ftable." 
	   		     SET sort_order='$sort_order' 
			     WHERE id='$pcidrep' ");

    mysql_query("UPDATE $prefix".$ftable." 
  			     SET sort_order='$sort_orderrep' 
				 WHERE id='$pcidori' ");

   Header("Location: admin.php?op=indexDictionary&table=$table&pos=$pos&prevIndex=$prevIndex&current_parent_id=$current_parent_id");
}
//====================================================================
function DeleteDictionary($id,$table){
    global  $prefix,$selectedLang, $current_parent_id,$prefix_admin,$aid;
	$ftable = '_'.$table;
	$result = mysql_query("SELECT sort_order 
						   FROM $prefix".$ftable." 
						   WHERE id = '$id'");
	list($sort_order) = mysql_fetch_row($result);
	mysql_query("DELETE FROM $prefix".$ftable." 
				 WHERE id = '$id'");	

	mysql_query("UPDATE $prefix".$ftable." 
				 SET sort_order = sort_order-1 
				 WHERE sort_order > '$sort_order'");

	//mysql_query("Insert into $prefix_admin"._system_log." values(NULL,'".time()."','Dictionary','DeleteDictionary ( Xóa từ điển )','Delete','$pid','$table','$aid')");

    Header("Location: admin.php?op=indexDictionary&table=$table");
}
//====================================================================
function AddDictionary() {
    global $aid,  $prefix, $selectedLang,$prefix_admin;
	$table = $_POST[table];
	$edit_id = $_POST[edit_id];
	$ftable = '_'.$table;
    $title = FixQuotes($_POST[title]);
if($table=='xe_chohang'){
	$heso = ",name_laixe = '$_POST[name_laixe]' ";

}

elseif($table=='nguoinhan'){
	$heso = ",phone = '$_POST[phone]' ";

}

elseif($table=='nguoigui'){
	$heso = ",phone = '$_POST[phone]' ";

}


elseif($table=='workofftype'){
	$heso = ",phucap = '$_POST[phucap]',value = '$_POST[value]' ";

}


	if(!$parent_id) $parent_id = 0;
IF($edit_id){
	mysql_query("UPDATE $prefix".$ftable."  SET name = '$title', description = '$_POST[note]' $heso  WHERE id = '$_POST[edit_id]' ");

}ELSE{
	if ($title) {	
   	$result = mysql_query("SELECT sort_order 
						   FROM $prefix".$ftable." 						   
						   ORDER BY sort_order DESC"
						  );
	list ($sort_order) = mysql_fetch_array($result);
	$sort_order++;
		if($table=='xe_chohang'){
			mysql_query("INSERT INTO $prefix".$ftable."  (id,name,sort_order,description,name_laixe)  VALUES (NULL,'$title', '$sort_order','$_POST[note]','$_POST[name_laixe]')");
		}elseif($table=='chucvu'){
			mysql_query("INSERT INTO $prefix".$ftable."  (id,name,sort_order,description)  VALUES (NULL,'$title', '$sort_order','$_POST[note]')");
		
		}elseif($table=='nguoinhan'){
			mysql_query("INSERT INTO $prefix".$ftable."  (id,name,sort_order,description,phone)  VALUES (NULL,'$title', '$sort_order','$_POST[note]','$_POST[phone]')");
		
		
		}elseif($table=='nguoigui'){
			mysql_query("INSERT INTO $prefix".$ftable."  (id,name,sort_order,description,phone)  VALUES (NULL,'$title', '$sort_order','$_POST[note]','$_POST[phone]')");
		
		
		
		
		}elseif($table=='dm_congvan_den'){
		mysql_query("INSERT INTO $prefix".$ftable."  (id,name,sort_order,description,code)  VALUES (NULL,'$title', '$sort_order','$_POST[note]','$_POST[code]')");
		
		
		}else{
			mysql_query("INSERT INTO $prefix".$ftable."  (id,name,sort_order,description)  VALUES (NULL,'$title', '$sort_order','$_POST[note]')");
		}
    }
}
	 Header("Location: admin.php?op=indexDictionary&table=$table");
}
//====================================================================
function DeleteAllDictionary(){
    global $aid,  $prefix, $selectedLang;
	$table = $_POST[table];
	$ftable = '_'.$table;

		if(count($_POST[id])>0){
			for($i=0;$i<sizeof($_POST[id]);$i++){							
				DeleteDictionary($_POST[id][$i],$table);
			}
		}
	 Header("Location: admin.php?op=indexDictionary&table=$table");
}
//====================================================================
function TemplateAdmin(){
	include("header.php");
	global $id,$prefix,$tempid;
	
	$res = mysql_query("Select name, header_temp, footer_temp,pagesetup,css from $prefix"._template." where id  = '$tempid' ");
	list($name, $header_temp, $footer_temp,$pagesetup,$css)=mysql_fetch_row($res);
	echo"<fieldset class=fieldset><legend class=legend>Quản lý template</legend>";

	echo "<table border=\"0\" width=\"100%\" align=\"center\" cellpadding=\"5\" cellspacing=\"0\">";
	echo "<form method=POST action=\"admin.php?op=TemplateAdmin\">";
	echo "<tr><td >Danh sách mẫu: </td><td>".SelectBox("tempid","Select id, name from $prefix"._template."",$tempid,1,$style='',$onclick='',$other='',$title=_SELECTONE)."</td></tr>";
	echo "</form>";	
	echo "<form method=\"post\" action=\"admin.php?op=UpdateTemplate\">";
	echo "<input type=\"hidden\" name=\"tmodule\" value=\"$tmodule\">";
	
	echo "<input type=\"hidden\" name=\"id\" value=\"$tempid\">";
	
	
		echo "<tr><td >Tên tempalte: </td><td><INPUT TYPE=\"text\" NAME=\"name\" size=45 value=\"$name\" class=CellTable></td></tr>";
	//	echo "<tr><td >Định dạng: </td><td><INPUT TYPE=\"text\" NAME=\"pagesetup\" size=45 value=\"$pagesetup\" class=CellTable></td></tr>";
	//	echo "<tr><td >Thuộc tính ( Style ): </td><td><INPUT TYPE=\"text\" NAME=\"css\" size=45 value=\"$css\" class=CellTable></td></tr>";

			echo "<tr><td>Đầu trang:</td><td>";
			 echo "<textarea name=\"header_temp\" cols=\"100%\" rows=\"5\" id=\"Webcontent\"  style=\"width:100%;height:300\">".$header_temp."</textarea>";
		echo "</td></tr>";	

		echo "<tr><td>Cuối trang:</td><td>";
			 echo "<textarea name=\"footer_temp\" cols=\"100%\" rows=\"5\" id=\"Webcontent1\"  style=\"width:100%;height:300\">".$footer_temp."</textarea>";
		echo "</td></tr>";		
		echo "</table>";
	echo ""
		."<center>"
		."<input type=\"submit\" value=\""._UPDATE."\" class=btnDefault> "
		."</center></form>";
echo "</fieldset>";


	include("footer.php");

}
//====================================================================
//====================================================================

//====================================================================
function UpdateTemplate(){
	global $prefix;
	$name = $_POST[name];
	$header = $_POST[header_temp];
	$footer = $_POST[footer_temp];
	IF($_POST[id]){
		mysql_query("UPdate  $prefix"._template." Set name='$name',header_temp='$header',footer_temp='$footer',pagesetup='$pagesetup',css='$css' where id='$_POST[id]' ");
		Header("Location: admin.php?op=TemplateAdmin&id=$_POST[id]");
	}ELSE{
		
		mysql_query ("INSERT INTO $prefix"._template."  SET 
					name                       = '$name',
					header_temp                       = '$header',
					footer_temp                       = '$footer'");
					
					
					
		//echo ("Insert into $prefix"._template." set ('','$name','$header','$footer','$pagesetup','$css')");
		Header("Location: admin.php?op=TemplateAdmin");
	}
}
//====================================================================
//====================================================================
//====================================================================
switch($op) {
	case "UpdateTemplate":
		UpdateTemplate();
		break;

	case "TemplateAdmin":
		TemplateAdmin();
		break;
		
	case "AddDictionary":
		AddDictionary();
		break;

	case "DeleteDictionary":
		DeleteDictionary($id,$table);
		break;

	case "DeleteAllDictionary":
		DeleteAllDictionary();
		break;

	case "OrderDictionary":
		OrderDictionary ($sort_orderrep, $sort_order, $pcidrep, $pcidori, $language, $current_parent_id);
		break;

    case "indexDictionary":
    	indexDictionary($table);
    break;

    case "Dictionary":
    	Dictionary();
    break;
	case "Thaisan":
    	Thaisan();
    break;

}


?>
