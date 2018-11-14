<?php
global $prefix,$aid;
if (!eregi("admin.php", $PHP_SELF)) { die ("Access Denied"); }
 checkPrivateModule("Quanlynhanvien",$aid);
global $prefix;
$multilingual=1;
$private_read=1;
$private_write=1;
$private_aproved=1;
$private_delete=1;
$private_copy=1;
$private_move=1;
/*********************************************************/
function navJob($id,$cmd){
$useragent = $_SERVER['HTTP_USER_AGENT'];

if(preg_match("/Chrome/i",$useragent) ){
	    $browser = 'Mozilla';
}elseif(preg_match("/MSIE/i",$useragent) ){
	    $browser = 'IE';
}elseif(preg_match("/Firefox/i",$useragent) ){
	    $browser = 'Firefox';
}
echo '<div style="float:left;width:16%;padding-top:18x;">';
	echo '<div id="btn_function" style="padding-left:50px;padding-top:5px;">';
	IF($browser=='IE'){
	
		echo '<div class="rc_btnicon_user"><input type="button" style="width:130px;text-align:left;padding-left:10px;"  name="Cmd_Infor" '.($cmd == "Cmd_Infor" ?  "disabled" : "").'  value="TT cá nhân" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Infor\')" /></div>';
		echo '<div class="rc_btnicon_user2"><input type="button"  style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Dependent" '.($cmd == "Cmd_Dependent" ?  "disabled" : "").' value="Gia đình" class="rc_btnicon"  onclick="OnCmd_function('.$id.',\'Dependent\')" /></div>';
		echo '<div class="rc_btnicon_home"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Address"  '.($cmd == "Cmd_Address" ?  "disabled" : "").' value="Địa chỉ" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Address\')" /></div>';
		echo '<div class="rc_btnicon_att"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_WorkInfor" '.($cmd == "Cmd_WorkInfor" ?  "disabled" : "").' value="Hợp đồng LĐ" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'WorkInfor\')" /></div>';
		echo '<div class="rc_btnicon_9"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_WorkHistory" '.($cmd == "Cmd_WorkHistory" ?  "disabled" : "").' value="Qtrình công tác" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'WorkHistory\');" /></div>';
	
		echo '<div class="rc_btnicon_edu"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Education" '.($cmd == "Cmd_Education" ?  "disabled" : "").' value="Trình độ chuyên môn" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Education\');" /></div>';
		echo '<div class="rc_btnicon_4"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Training" '.($cmd == "Cmd_Training" ?  "disabled" : "").' value="Các khoá ĐT" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Training\');" /></div>';
		echo '<div class="rc_btnicon_6"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Record" '.($cmd == "Cmd_Record" ?  "disabled" : "").' value="Danh mục hồ sơ" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Record\');" /></div>';
		echo '<div class="rc_btnicon_1"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Skill" '.($cmd == "Cmd_Skill" ?  "disabled" : "").' value="Các kỹ năng" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Skill\');" /></div>';
		echo '<div class="rc_btnicon_13"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Move" '.($cmd == "Cmd_Move" ?  "disabled" : "").' value="Điều chuyển nhân sự" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Move\');" /></div>';
		echo '<div class="rc_btnicon_salary"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Salary" '.($cmd == "Cmd_Salary" ?  "disabled" : "").' value="Lương " class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Salary\');" /></div>';

		echo '<div class="rc_btnicon_user3"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Baohiem" '.($cmd == "Cmd_Baohiem" ?  "disabled" : "").' value="Bảo hiểm" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Baohiem\');" /></div>';

		echo '<div class="rc_btnicon_12"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_TPChinhtri" '.($cmd == "Cmd_TPChinhtri" ?  "disabled" : "").' value="Lý lịch chính trị" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'TPChinhtri\');" /></div>';
		echo '<div class="rc_btnicon_11"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_KhenthuongKyluat" '.($cmd == "Cmd_KhenthuongKyluat" ?  "disabled" : "").' value="Khen thưởng - Kỷ luật" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'KhenthuongKyluat\');" /></div>';
		echo '<div class="rc_btnicon_folder"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Refer" '.($cmd == "Cmd_Refer" ?  "disabled" : "").' value="Nhận xét đánh giá" class="rc_btnicon" onclick="OnCmd_function('.$id.',\'Refer\');" /></div>';
	
	}ELSE{
		echo '<input type="button"   class=fn_button  name="Cmd_Infor" '.($cmd == "Cmd_Infor" ?  "disabled" : "").'  value="TT cá nhân"  onclick="OnCmd_function('.$id.',\'Infor\')" />';
		echo '<input type="button"   class=fn_button name="Cmd_Dependent" '.($cmd == "Cmd_Dependent" ?  "disabled" : "").' value="Gia đình"   onclick="OnCmd_function('.$id.',\'Dependent\')" />';
		echo '<input type="button"   class=fn_button name="Cmd_Address"  '.($cmd == "Cmd_Address" ?  "disabled" : "").' value="Địa chỉ"  onclick="OnCmd_function('.$id.',\'Address\')" />';
		echo '<input type="button"   class=fn_button name="Cmd_WorkInfor" '.($cmd == "Cmd_WorkInfor" ?  "disabled" : "").' value="Hợp đồng LĐ"  onclick="OnCmd_function('.$id.',\'WorkInfor\')" />';
		echo '<input type="button"   class=fn_button name="Cmd_WorkHistory" '.($cmd == "Cmd_WorkHistory" ?  "disabled" : "").' value="Qtrình công tác"  onclick="OnCmd_function('.$id.',\'WorkHistory\');" />';
	
		echo '<input type="button"   class=fn_button name="Cmd_Education" '.($cmd == "Cmd_Education" ?  "disabled" : "").' value="Trình độ chuyên môn"  onclick="OnCmd_function('.$id.',\'Education\');" />';
		echo '<input type="button"   class=fn_button name="Cmd_Training" '.($cmd == "Cmd_Training" ?  "disabled" : "").' value="Các khoá ĐT"  onclick="OnCmd_function('.$id.',\'Training\');" />';
		echo '<input type="button"   class=fn_button name="Cmd_Record" '.($cmd == "Cmd_Record" ?  "disabled" : "").' value="Danh mục hồ sơ"  onclick="OnCmd_function('.$id.',\'Record\');" />';
		echo '<input type="button"   class=fn_button name="Cmd_Skill" '.($cmd == "Cmd_Skill" ?  "disabled" : "").' value="Các kỹ năng"  onclick="OnCmd_function('.$id.',\'Skill\');" />';
		echo '<input type="button"   class=fn_button name="Cmd_Move" '.($cmd == "Cmd_Move" ?  "disabled" : "").' value="Điều chuyển nhân sự"  onclick="OnCmd_function('.$id.',\'Move\');" />';
		echo '<input type="button"   class=fn_button name="Cmd_Salary" '.($cmd == "Cmd_Salary" ?  "disabled" : "").' value="Lương"  onclick="OnCmd_function('.$id.',\'Salary\');" />';

		echo '<input type="button"   class=fn_button name="Cmd_Baohiem" '.($cmd == "Cmd_Baohiem" ?  "disabled" : "").' value="Bảo hiểm"  onclick="OnCmd_function('.$id.',\'Baohiem\');" />';

		echo '<input type="button"   class=fn_button name="Cmd_TPChinhtri" '.($cmd == "Cmd_TPChinhtri" ?  "disabled" : "").' value="Lý lịch chính trị"  onclick="OnCmd_function('.$id.',\'TPChinhtri\');" />';
		echo '<input type="button"   class=fn_button name="Cmd_KhenthuongKyluat" '.($cmd == "Cmd_KhenthuongKyluat" ?  "disabled" : "").' value="Khen thưởng - Kỷ luật"  onclick="OnCmd_function('.$id.',\'KhenthuongKyluat\');" />';
		echo '<input type="button"   class=fn_button name="Cmd_Refer" '.($cmd == "Cmd_Refer" ?  "disabled" : "").' value="Nhận xét đánh giá"  onclick="OnCmd_function('.$id.',\'Refer\');" />';

	}
	
	echo '</div>';
echo '</div>';	
?>
	<script>
		function OnCmd_function(id,cmd){
			window.location="admin.php?op=View_"+cmd+'&id='+id;
		}		
	</script>
<?
}
/*********************************************************/

function Form_search_Employee($numpro){
	global $prefix, $db, $user, $userinfo, $cookie, $module_name, $error,$currentlang,$portalurl,$id;
?>

<script language="javascript">
//var hide_empty_list=true; //uncomment this line to hide empty selection lists
var disable_empty_list=true; //uncomment this line to disable empty selection lists
addListGroup("SchoolAdmin", "car-makers");
addOption("car-makers", "---- Phòng ban -----", "", "", 1); //Empty starter option
<?
	$res1 = mysql_query("Select id, name from $prefix"._chinhanh." order by sort_order");	
	while(list($country_id,$country)=mysql_fetch_row($res1)){
		echo 'addList("car-makers", "'.$country.'", "'.$country_id.'", "'.$country.'");';
		$res_region = mysql_query("Select id, name from $prefix"._bophan." where  id_chinhanh= '$country_id' and parent_id='0' order by sort_order");

		echo 'addOption("'.$country.'", "--- Bộ phận ---", "", "", 1);'; ////Empty starter option
		while(list($region_id,$region)=mysql_fetch_row($res_region)){
			echo 'addList("'.$country.'", "'.$region.'", "'.$region_id.'", "'.$region.'");';


			$res_city = mysql_query("Select id, name from $prefix"._bophan." where  parent_id = '$region_id' order by sort_order");
			echo 'addOption("'.$region.'", "--- Tổ nhóm ---", "");';
			while(list($city_id,$city)=mysql_fetch_row($res_city)){
				echo 'addOption("'.$region.'", "'.$city.'", "'.$city_id.'");';
			}

		}
	}
?>
</script>
</head>
<?
$select_box = '
<select name="chinhanhid" style="width:160px;"></select>
<select name="bophanid" style="width:160px;"></select><br>
<select name="tonhomid" style="width:160px;"></select>
';
				
	echo '
		<fieldset>
					
					<table cellpadding=2 cellspacing=2  border=0>
						<tr>
							<td  style="padding-left:10px;width:12%">Chức danh: </td><td width=25%>'.SelectBox("nhanvien_type","Select id, name from $prefix"._chucvu ."",$value='',$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td>

							<td align=right width=13%>Mã nhân viên </td><td colspan=3><input type="text" id="employee_id" name="employee_id" class="inputBorder" value="" style="width:15%" /> 
							 Tên nhân viên : <input type="text" id="employee_name" name="employee_name" class="inputBorder" value="" style="width:40%"/></td>
						</tr>
						<tr>';
							
							echo '</td>
							<td rowspan="2" style="padding-left:10px;width:12%" >Phòng ban <br> Bộ phận:</td>
							<td rowspan="2">';
							echo $select_box;
							echo'</td>
							<td align=right  >Nơi làm việc: </td><td colspan=3> '.SelectBox("noilamviec","Select code, name from $prefix"._noilamviec ."",$value='',$onchange='',$style='width:50%',$onclick='',$other='',$title=_SELECTONE).'</td>

						</tr>
						<tr>
							<td align=right  >
							'._FROMDATE.':</td><td colspan=3> <input type="text" id="from_date" name="from_date" class="inputBorder1" value="" style="width:90px" /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.from_date);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a> 
							&nbsp;'._TODATE.': <input type="text" id="to_date" name="to_date" class="inputBorder1" value="" value="" style="width:90px"  /><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.to_date);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
							</td>
						</tr>
					</table>
				<div style="padding-left:130px;"><div class="rc_btnicon_search"><input type="submit" value="'._SEARCH.'" class="rc_btnicon" /></div></div>
		</fieldset>
';
	echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';

}
//==========================================================
function Employee_Index() {
    global $admin, $eshop_active,$prefix, $user_prefix, $dbi,$useractive,$maxRow,$maxPage,$sortby,$active,$nukeurl,$portalurl,$classification_id,$aid;
    include("header.php");
	?>
		
			<script>
			function DatGiatri(val)
			{
				document.form1.nhanvien_id.value=val;
			//	document.form1.cmd_xoa.disabled=false;

				document.form1.nhanvien_id.value=val;
				document.form1.Cmd_Infor.disabled=false;
				document.form1.Cmd_Dependent.disabled=false;

				document.form1.Cmd_Address.disabled=false;
			//	document.form1.Cmd_Emergency.disabled=false;

				document.form1.Cmd_WorkInfor.disabled=false;
				document.form1.Cmd_WorkHistory.disabled=false;

				document.form1.Cmd_Move.disabled=false;
				document.form1.Cmd_Training.disabled=false;

				document.form1.Cmd_Education.disabled=false;
				document.form1.Cmd_Record.disabled=false;
				document.form1.Cmd_Skill.disabled=false;
				document.form1.Cmd_Salary.disabled=false;
				document.form1.Cmd_Baohiem.disabled=false;
				document.form1.Cmd_KhenthuongKyluat.disabled=false;
				document.form1.Cmd_TPChinhtri.disabled=false;
				document.form1.Cmd_Refer.disabled=false;


			}

			function XoaGiatri()
			{
				document.form1.nhanvien_id.value='';
			//	document.form1.cmd_xoa.disabled=true;

				document.form1.nhanvien_id.value='';
				document.form1.Cmd_Infor.disabled=true;
				document.form1.Cmd_Dependent.disabled=true;

				document.form1.Cmd_Address.disabled=true;
		//		document.form1.Cmd_Emergency.disabled=true;

				document.form1.Cmd_WorkInfor.disabled=true;
				document.form1.Cmd_WorkHistory.disabled=true;
		//		document.form1.Cmd_Move.disabled=true;

				document.form1.Cmd_Education.disabled=true;
				document.form1.Cmd_Record.disabled=true;
				document.form1.Cmd_Training.disabled=true;
				document.form1.Cmd_Baohiem.disabled=true;
				document.form1.Cmd_KhenthuongKyluat.disabled=true;
				document.form1.Cmd_TPChinhtri.disabled=true;
				document.form1.Cmd_Refer.disabled=false;

			}
			function ShowForm(val){
			
				document.form1.nhanvien_id.value=val;
			//	document.form1.cmd_xoa.disabled=false;

				document.form1.nhanvien_id.value=val;
				document.form1.Cmd_Infor.disabled=false;
				document.form1.Cmd_Dependent.disabled=false;
				document.form1.Cmd_Address.disabled=false;
			//	document.form1.Cmd_Emergency.disabled=false;

				document.form1.Cmd_WorkInfor.disabled=false;
				document.form1.Cmd_WorkHistory.disabled=false;

				document.form1.Cmd_Move.disabled=false;
				document.form1.Cmd_Training.disabled=false;

				document.form1.Cmd_Education.disabled=false;
				document.form1.Cmd_Record.disabled=false;
				document.form1.Cmd_Skill.disabled=false;
				document.form1.Cmd_Salary.disabled=false;
				document.form1.Cmd_Baohiem.disabled=false;
				document.form1.Cmd_KhenthuongKyluat.disabled=false;
				document.form1.Cmd_TPChinhtri.disabled=false;
				document.form1.Cmd_Refer.disabled=false;

			}
			function Change(val)
			{
				document.form1.nhanvien_id.value=val;
				document.form1.Cmd_Infor.disabled=false;
			}

function SwapColor(id,val,bgcolor,max){
				document.form1.nhanvien_id.value=val;
				document.form1.Cmd_Infor.disabled=false;	
				document.form1.Cmd_Dependent.disabled=false;
				document.form1.Cmd_Address.disabled=false;
			//	document.form1.Cmd_Emergency.disabled=false;

				document.form1.Cmd_WorkInfor.disabled=false;
				document.form1.Cmd_WorkHistory.disabled=false;

				document.form1.Cmd_Move.disabled=false;
				document.form1.Cmd_Training.disabled=false;

				document.form1.Cmd_Education.disabled=false;
				document.form1.Cmd_Record.disabled=false;
				document.form1.Cmd_Skill.disabled=false;
				document.form1.Cmd_Salary.disabled=false;
				document.form1.Cmd_Baohiem.disabled=false;
				document.form1.Cmd_KhenthuongKyluat.disabled=false;
				document.form1.Cmd_TPChinhtri.disabled=false;
				document.form1.Cmd_Refer.disabled=false;

	for(i=1;i<=max;i++){
		
		if(i==id){
			document.getElementById(''+id+'').style.backgroundColor='#FF9999';
		}else{
			if(i % 2 == 0){
			document.getElementById(''+i+'').style.backgroundColor='#ffffff';
			}else{
			document.getElementById(''+i+'').style.backgroundColor='#f4f4f4';
			}
		}
	}
}
			function display_data(id) {  
				xmlhttp=GetXmlHttpObject(); 
				if (xmlhttp==null) { 
					alert ("Your browser does not support AJAX!"); 
					return; 
				}  
				var url="view_nhanvien.php"; 
				url=url+"?employ_id="+id; 
				xmlhttp.onreadystatechange=function() { 
					if (xmlhttp.readyState==4 || xmlhttp.readyState=="complete") { 
						document.getElementById('employ_data').innerHTML=xmlhttp.responseText; 
					} 
				} 
				xmlhttp.open("GET",url,true); 
				xmlhttp.send(null); 
			} 
			function GetXmlHttpObject() { 
				var xmlhttp=null; 
				try { 
					// Firefox, Opera 8.0+, Safari 
					xmlhttp=new XMLHttpRequest(); 
				} 
				catch (e) { 
					// Internet Explorer 
					try { 
						xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); 
					} 
					catch (e) { 
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
					} 
				} 
				return xmlhttp; 
			} 
		function CallPrint(strid)
		{
		var prtContent = document.getElementById(strid);
		var WinPrint =
			window.open('','','left=0,top=0,width=800px,height=600px,toolbar=0,scrollbars=0,status=0');
			WinPrint.document.write(prtContent.innerHTML);
			WinPrint.document.close();
			WinPrint.focus();
			WinPrint.print();
			WinPrint.close();
			//prtContent.innerHTML=strOldOne;
		}
		</script>

	<?
	global $nhanvien_type,$employee_id,$employee_name,$from_date,$to_date,$chinhanhid,$bophanid,$noilamviec,$tonhomid;
	if($nhanvien_type) $where_nhanvien_type = "AND nv.nhanvien_type= '$nhanvien_type' ";
	if($employee_id) $where_employee_id = "AND nv.id_employee= '$employee_id' ";
	if($employee_name) $where_employee_name = "AND ( nv.first_name like  '$employee_name' OR  nv.last_name like  '$employee_name' ) ";
	if($chinhanhid) $where_chinhanhid = "AND nv.id_chinhanh= '$chinhanhid' ";
	if($bophanid) $where_bophanid = "AND nv.bophan_id= '$bophanid' ";
	if($tonhomid) $where_tonhomid = "AND nv.tonhom_id= '$tonhomid' ";

	if($noilamviec) $where_noilamviec = "AND nv.noilamviec= '$noilamviec' ";

	$query = "select nv.id_employee, nv.id, nv.first_name, nv.last_name, nv.birthday, nv.bophan_id ,nv.nhanvien_type,nv.id_chinhanh,cn.sort_order,nv.ngayvaolam
									from $prefix"._nhanvien." nv	
									left join $prefix"._chinhanh." cn
									on(nv.id_chinhanh=cn.id)
									WHERE hd_chamdut <> '1' $where_nhanvien_type $where_employee_id $where_employee_name $where_chinhanhid $where_bophanid $where_noilamviec
									order by  nv.nhanvien_type ASC ,cn.sort_order ASC";


	$link = "&current_parent_id=$current_parent_id";
echo '<form method=POST action="admin.php?op=Employee_Index" name="demoform">';
echo '<div style="float:left;width:80%">';
	echo Form_search_Employee($numpro);
echo '</div>';
echo '<div style="float:left;width:20%">';
	echo'<div id="employ_data"></div>';
echo '</div>';
echo '</form>';
echo '<div style="clear:both"></div>';


echo '<div style="float:left;width:80%">';
		echo'
		<form   method=POST action="admin.php?op=DeleteAllEmployee">
			<div class="rc_btnicon_delete"><input type="button" value="'._DELETE.'" class="rc_btnicon" onclick="CheckDeleteAll(1);" /></div>
			<div class="rc_btnicon_print"><input type="button" value="In danh sách" class="rc_btnicon" onclick="CallPrint(\'printReady\');" /></div>
			<div class="rc_btnicon_xls"><input type="button" value="Export danh sách" class="rc_btnicon" onclick="CallExport();" /></div>

			<div class="rc_btnicon_add"><input type="button" value="Thêm mới" class="rc_btnicon" onclick="AddNew();" /></div>';
echo '<div style="float:right;padding-right:15px;">';
	$query_limit = split_pages($query,$link,1);
	$result = mysql_query($query_limit);
	$max = mysql_num_rows($result);
echo '</div>';
echo'<div style="clear:both"></div>
<div id="printReady" >
	<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
			    <TD>TT</TD>
			    <TD><input type="checkbox" name="checkall" onclick="toggleAll(this,1)" id="Checkbox1" /></TD>
				<TD>Mã nhân viên</TD>
				<TD>Tên nhân viên</TD>
				<TD>Chức danh</TD>
				<TD>Phòng ban</TD>
				<TD>Bộ phận</TD>

				<TD>Ngày vào làm</TD>
				
				

		  </TR>
		 </THEAD>
		  <TBODY >';
	    $counter = 0;			
		$stt=1;
	    while(list($id_employee, $id, $first_name, $last_name, $birthday, $bophan_id ,$id_nhanvien_type,$id_chinhanh,$sort,$ngayvaolam) = mysql_fetch_row($result)) {
			if($counter % 2 == 0){
				$tblColor = "tblColor1";
				$colorTD = "#ffffff";
			}else{
				$tblColor = "tblColor2";
				$colorTD = "#f4f4f4";
			}
			$counter++; global $bgcolor3;	
				
			$action_checkbox = "<INPUT TYPE=\"checkbox\" NAME=\"id[]\" value=\"$id\" >";
			//echo '<INPUT TYPE="hidden" NAME="id[]" value="'.$id.'">';
		
		if($aid=='admin'){
			$link_view  = 'admin.php?op=CV_Employee&id='.$id.'';
		}else{
			$link_view  = 'admin.php?op=View_Employee&id='.$id.'';
		}
		// mysql_query("Update $prefix"._nhanvien." set fullname = '$first_name $last_name ' where id='$id'");

		  echo "<TR class=\"$tblColor\"   id=\"$stt\" onclick=\"SwapColor('".$stt."',".$id.",'".$colorTD."',".$max.")\" >";	
			echo '<TD align=center>'.$stt.'</TD>';
		    echo '<TD align=center>'.$action_checkbox.'</TD>';
			echo'<TD style="padding-left:10px;" onclick="display_data('.$id.')">'.$id_employee.'</TD>';
			echo'<TD onclick="ShowForm(\''.$id.'\');"  ><a href="'.$link_view.'">'.$first_name.' '.$last_name.'</a></TD>';
			echo '<TD >'.Getname("name","$prefix"._chucvu ."","  id = '$id_nhanvien_type' ").'</TD>';
			echo '<TD >'.Getname("name","$prefix"._chinhanh  ."","  id = '$id_chinhanh' ").'  </TD>';
			echo '<TD >'.Getname("name","$prefix"._bophan  ."","  id = '$bophan_id' ").'</TD>';

			echo '<TD align=center   >'.$ngayvaolam.'</TD>';
			
			
			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></form>';
		echo '</div>';
		split_pages($query,$link,0);
echo '</div> ';
echo '</div> ';
$useragent = $_SERVER['HTTP_USER_AGENT'];

if(preg_match("/Chrome/i",$useragent) ){
	    $browser = 'Mozilla';
}elseif(preg_match("/MSIE/i",$useragent) ){
	    $browser = 'IE';
}elseif(preg_match("/Firefox/i",$useragent) ){
	    $browser = 'Firefox';
}

echo '<div style="float:left;width:20%;margin-top:22px;background:#fff">';

echo '<FORM name=form1 method="get">
		<input type="hidden" name="nhanvien_id" value="">';
		//		echo '<div class="rc_btnicon_folder"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Emergency" disabled value="Liên hệ khi cần thiết" class="rc_btnicon" onclick="OnCmd_function(\'Emergency\')" /></div>';
	echo '<div id="btn_function" style="padding-left:0px;padding-top:5px;">';
	IF($browser=='IE'){
		echo '<div class="rc_btnicon_user"><input type="button" style="width:130px;text-align:left;padding-left:10px;"  name="Cmd_Infor" disabled value="TT cá nhân" class="rc_btnicon" onclick="OnCmd_function(\'Infor\')" /></div>';
		echo '<div class="rc_btnicon_user2"><input type="button"  style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Dependent" disabled value="Gia đình" class="rc_btnicon"  onclick="OnCmd_function(\'Dependent\')" /></div>';
		echo '<div class="rc_btnicon_home"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Address"  disabled value="Địa chỉ" class="rc_btnicon" onclick="OnCmd_function(\'Address\')" /></div>';
		echo '<div class="rc_btnicon_att"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_WorkInfor" disabled value="Hợp đồng LĐ" class="rc_btnicon" onclick="OnCmd_function(\'WorkInfor\')" /></div>';
		echo '<div class="rc_btnicon_9"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_WorkHistory" disabled value="Qtrình công tác" class="rc_btnicon" onclick="OnCmd_function(\'WorkHistory\');" /></div>';
	
		echo '<div class="rc_btnicon_edu"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Education" disabled value="Trình độ chuyên môn" class="rc_btnicon" onclick="OnCmd_function(\'Education\');" /></div>';
		echo '<div class="rc_btnicon_4"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Training" disabled value="Các khoá ĐT" class="rc_btnicon" onclick="OnCmd_function(\'Training\');" /></div>';
		echo '<div class="rc_btnicon_6"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Record" disabled value="Danh mục hồ sơ" class="rc_btnicon" onclick="OnCmd_function(\'Record\');" /></div>';
		echo '<div class="rc_btnicon_1"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Skill" disabled value="Các kỹ năng" class="rc_btnicon" onclick="OnCmd_function(\'Skill\');" /></div>';
		echo '<div class="rc_btnicon_13"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Move"disabled value="Điều chuyển nhân sự" class="rc_btnicon" onclick="OnCmd_function(\'Move\');" /></div>';
		echo '<div class="rc_btnicon_salary"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Salary" disabled value="Lương" class="rc_btnicon" onclick="OnCmd_function(\'Salary\');" /></div>';
		echo '<div class="rc_btnicon_user3"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Baohiem" disabled value="Bảo hiểm" class="rc_btnicon" onclick="OnCmd_function(\'Baohiem\');" /></div>';
		echo '<div class="rc_btnicon_12"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_TPChinhtri" disabled value="Lý lịch chính trị" class="rc_btnicon" onclick="OnCmd_function(\'TPChinhtri\');" /></div>';
		echo '<div class="rc_btnicon_11"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_KhenthuongKyluat" disabled value="Khen thưởng - Kỷ luật" class="rc_btnicon" onclick="OnCmd_function(\'KhenthuongKyluat\');" /></div>';
		echo '<div class="rc_btnicon_folder"><input type="button" style="width:130px;text-align:left;padding-left:10px;" name="Cmd_Refer" disabled value="Nhận xét đánh giá" class="rc_btnicon" onclick="OnCmd_function(\'Refer\');" /></div>';
	}ELSE{
		echo '<input type="button"   class=fn_button name="Cmd_Infor" disabled    onclick="OnCmd_function(\'Infor\')" value=" TT cá nhân">';
		echo '<input type="button"   class=fn_button name="Cmd_Dependent" disabled  onclick="OnCmd_function(\'Dependent\')" value="Gia đình"> ';
		echo '<input type="button"   class=fn_button name="Cmd_Address" disabled  onclick="OnCmd_function(\'Address\')" value="Địa chỉ"> ';
		echo '<input type="button"   class=fn_button name="Cmd_WorkInfor" disabled  onclick="OnCmd_function(\'WorkInfor\')" value="Hợp đồng LĐ"> ';
		echo '<input type="button"   class=fn_button name="Cmd_WorkHistory" disabled  onclick="OnCmd_function(\'WorkHistory\')" value="Qtrình công tác"> ';
		echo '<input type="button"   class=fn_button name="Cmd_Education" disabled  onclick="OnCmd_function(\'Education\')" value="Trình độ chuyên môn"> ';
		echo '<input type="button"   class=fn_button name="Cmd_Training" disabled  onclick="OnCmd_function(\'Training\')" value="Các khoá ĐT"> ';
		echo '<input type="button"   class=fn_button name="Cmd_Record" disabled  onclick="OnCmd_function(\'Record\')" value="Danh mục hồ sơ"> ';
		echo '<input type="button"   class=fn_button name="Cmd_Skill" disabled  onclick="OnCmd_function(\'Skill\')" value="Các kỹ năng"> ';
		echo '<input type="button"   class=fn_button name="Cmd_Move" disabled  onclick="OnCmd_function(\'Move\')" value="Điều chuyển nhân sự"> ';
		echo '<input type="button"   class=fn_button name="Cmd_Salary" disabled  onclick="OnCmd_function(\'Salary\')" value="Lương"> ';
		echo '<input type="button"   class=fn_button name="Cmd_Baohiem" disabled  onclick="OnCmd_function(\'Baohiem\')" value="Bảo hiểm"> ';
		echo '<input type="button"   class=fn_button name="Cmd_TPChinhtri" disabled  onclick="OnCmd_function(\'TPChinhtri\')" value="Lý lịch chính trị"> ';
		echo '<input type="button"   class=fn_button name="Cmd_KhenthuongKyluat" disabled  onclick="OnCmd_function(\'KhenthuongKyluat\')" value="Khen thưởng - Kỷ luật"> ';
		echo '<input type="button"   class=fn_button  name="Cmd_Refer" disabled  onclick="OnCmd_function(\'Refer\')" value="Nhận xét đánh giá"> ';
	}
	/*
*/
	echo '</div>';
	echo '';
echo '</FORM>';

echo '</div>';
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 470 ;
	initTableWidget('myTable',UserWidth,430,Array(false,false,'S','S',false,false,false,false));


	function OnCmd_function(cmd){
		id=document.form1.nhanvien_id.value;
		//alert('admin.php?op=View_'+cmd+'&id='+id);
		
		//displayMessage('admin.php?op=View_'+cmd+'&id='+id,800,530);
		window.location="admin.php?op=View_"+cmd+'&id='+id;
	}
	function AddNew(){
		window.location="admin.php?op=Employee_AddNew";
	}
	function CallExport(){
		window.location="admin.php?op=Employee_Xls";
	}
	</SCRIPT>
<?

    include("footer.php");
}
//============================================================//
function Employee_Xls(){
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-Disposition: attachment;filename=Employee_Index.xls");
		header("Content-Transfer-Encoding: binary ");
global $prefix;
?>
<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
</head>
<table x:str border="0" cellpadding="0" cellspacing="0" width="3903" style="border-collapse:
 collapse;width:2933pt" id="table1">
	<colgroup>
		<col width="47" style="width: 35pt"><col width="62" style="width: 47pt">
		<col width="171" style="width: 128pt">
		<col width="56" style="width: 42pt">
		<col width="103" style="width: 77pt">
		<col width="98" style="width: 74pt">
		<col width="180" style="width: 135pt">
		<col width="204" style="width: 153pt">
		<col width="94" style="width: 71pt"><col width="94" style="width: 71pt">
		<col width="109" style="width: 82pt">
		<col width="109" style="width: 82pt">
		<col width="161" span="2" style="width:121pt">
		<col width="161" span="14" style="width:121pt">
	</colgroup>
	<tr  style="height: 20.25pt">
		<td  colspan="4" width="336" style="height: 20.25pt; width: 252pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: left; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">
		CÔNG TY C&#7892; PH&#7846;N &#272;&#7846;U T&#431; TAM &#272;&#7842;O</td>
		<td width="103" style="width: 77pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="98" style="width: 74pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td colspan="6" width="790" style="width: 594pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">
		C&#7896;NG HÒA XÃ H&#7896;I CH&#7910; NGH&#296;A Vi&#7878;T NAM</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
	</tr>
	<tr height="21" style="height:15.75pt">
		<td height="21" style="height: 15.75pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td colspan="6" style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">
		&#272;&#7897;c l&#7853;p - T&#7921; do - H&#7841;nh phúc</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
	</tr>
	<tr height="6" style="height: 4.5pt">
		<td height="6" style="height: 4.5pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">
		</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="109" style="width: 82pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
	</tr>
	<tr  style="height: 21.75pt">
		<td colspan="12"  style="height: 21.75pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">
		DANH SÁCH CÁN B&#7896; CÔNG NHÂN VIÊN</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
	</tr>
	<tr height="26" style="height: 19.5pt">
		<td colspan="12" height="26" style="height: 19.5pt; font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
	</tr>
	<tr height="17" style="height: 12.75pt">
		<td height="17" style="height: 12.75pt; font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">
		</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td width="109" style="width: 82pt; font-size: 12.0pt; font-style: italic; font-family: 'Times New Roman', serif; text-align: center; white-space: normal; color: windowtext; font-weight: 400; text-decoration: none; vertical-align: bottom; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
	</tr>
	<tr height="34" style="height: 25.5pt">
		<td rowspan="2" height="66" width="47" style="height: 49.5pt; width: 35pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		STT toàn Công ty</td>
		<td rowspan="2" width="62" style="width: 47pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		STT b&#7897; ph&#7853;n</td>
		<td rowspan="2" width="171" style="width: 128pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		H&#7885; và tên</td>
		<td rowspan="2" width="56" style="width: 42pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid black; padding: 0px">
		Gi&#7899;i tính</td>
		<td rowspan="2" width="103" style="width: 77pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid black; padding: 0px">
		Ngày sinh</td>
		<td rowspan="2" width="98" style="width: 74pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		Ngày b&#7855;t &#273;&#7847;u làm vi&#7879;c</td>
		<td rowspan="2" width="180" style="width: 135pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		Ch&#7913;c v&#7909;, công vi&#7879;c hi&#7879;n t&#7841;i</td>
		<td rowspan="2" width="204" style="width: 153pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		Trình &#273;&#7897; chuyên môn</td>
		<td rowspan="2" width="94" style="width: 71pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		Trình &#273;&#7897;</td>
		<td rowspan="2" width="94" style="width: 71pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		S&#7889; H&#272;L&#272;</td>
		<td rowspan="2" width="109" style="width: 82pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		Lo&#7841;i H&#272;L&#272;</td>
		<td rowspan="2" width="109" style="width: 82pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		Ngày h&#7871;t h&#7841;n H&#272;</td>
		<td rowspan="2" width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: .5pt solid windowtext; padding: 0px">
		Ghi chú</td>
		<td width="161" style="width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
	</tr>
	<tr height="32" style="height: 24.0pt">
		<td height="32" width="161" style="height: 24.0pt; width: 121pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; vertical-align: middle; white-space: normal; color: windowtext; font-style: normal; text-decoration: none; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		<td style="font-size: 12.0pt; font-family: 'Times New Roman', serif; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
	</tr>
<?
	$res_cn = mysql_query("Select a.id, a.name from $prefix"._chinhanh." a  where 1   $where_cn  order by a.sort_order" );

	while(list($id_chinhanh,$chinhanh)=mysql_fetch_row($res_cn)){
		?>
		<tr height="28" style="height: 21.0pt">
			<td height="28" style="height: 21.0pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">	
			</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">		
			<?echo $chinhanh?></td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; white-space: normal; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; white-space: normal; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		</tr>
		<?
							$query = "select nv.id_employee, nv.id, nv.first_name, nv.last_name, nv.birthday, nv.bophan_id ,nv.nhanvien_type,nv.id_chinhanh,cn.sort_order,nv.ngayvaolam,nv.sex
									from $prefix"._nhanvien." nv	
									left join $prefix"._chinhanh." cn
									on(nv.id_chinhanh=cn.id)
									WHERE hd_chamdut <> '1'  AND nv.id_chinhanh= '$id_chinhanh' $where_nhanvien_type $where_employee_id $where_employee_name $where_chinhanhid $where_bophanid
									order by  nv.nhanvien_type ASC ,cn.sort_order ASC";
							$result = mysql_query($query);
		$stt=1;
	    while(list($id_employee, $id, $first_name, $last_name, $birthday, $bophan_id ,$id_nhanvien_type,$id_chinhanh,$sort,$ngayvaolam,$sex) = mysql_fetch_row($result)) {
			?>
		<tr height="28" style="height: 21.0pt">
			<td height="28" style="height: 21.0pt; font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">	
			<?echo $stt?></td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">		
			<?echo $first_name.' '.$last_name?></td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			<?echo Getname("name","$prefix"._sex ."","  id = '$sex' ");?></td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			<?echo $birthday?></td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: right; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			<?echo $ngayvaolam?></td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			<?echo Getname("name","$prefix"._chucvu ."","  id = '$id_nhanvien_type' ");?></td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			Trình độ chuyên môn</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			Trình độ</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			Số HĐLĐ</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			Loại HĐLĐ</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; text-align: center; color: windowtext; font-style: normal; text-decoration: none; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			Ngày hết hạn HĐ</td>
			<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; white-space: normal; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
			&nbsp;</td>
			<td width="161" style="width: 121pt; font-size: 12.0pt; font-family: 'Times New Roman', serif; text-align: center; white-space: normal; color: windowtext; font-weight: 400; font-style: normal; text-decoration: none; vertical-align: bottom; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
			<td style="font-size: 12.0pt; font-weight: 700; font-family: 'Times New Roman', serif; color: windowtext; font-style: normal; text-decoration: none; text-align: general; vertical-align: bottom; white-space: nowrap; border: medium none; padding: 0px">&nbsp;</td>
		</tr>
			<?
				$stt++;
		}

	}
 
?>

</table>


<?
}

		/* View Functions Employee */
//============================================================//
function View_Infor($id){
/*
	global $prefix;
    include("header.php");
	
	$sql = "select * from $prefix"._nhanvien." where id='$id'";
	$result = mysql_query($sql);
	$userinfo=mysql_fetch_array($result);

echo '<div style="float:left;width:80%">';
	echo'
    <div class="folder">
        <div class="folder-title">THÔNG TIN CÁ NHÂN : '.$userinfo[first_name].' '.$userinfo[last_name].'</div>
        <div class="folder-content" id="list_option">
            <div style="width:100%; float:left"><!--begin left option-->';
	echo'<form name="demoform" method="post" action="admin.php?op=Insert_Infor" enctype="multipart/form-data">
		<input type="hidden" name="nhanvien_id" value="'.$id.'" >';
	echo '<INPUT TYPE="hidden" NAME="manhanvien" value="'.GenerateId().'">';

			echo '<div style="float:left;width:67%;">';
					echo '<fieldset style="height:230px;">
						<table width=100% cellpadding=2 cellspacing=2>
							<tr><td width=20%>Mã nhân viên</td><td><INPUT TYPE="text" NAME="" value="'.$userinfo[id_employee].'" style="width:90%"></td></tr>
							<tr><td>Họ đệm</td><td><INPUT TYPE="text" NAME="hodem" value="'.$userinfo[first_name].'" > &nbsp; Tên: <INPUT TYPE="text" NAME="ten" value="'.$userinfo[last_name].'" ></td></tr>
							<tr><td>Ngày sinh</td><td><INPUT TYPE="text" NAME="birthday" value="'.$userinfo[birthday].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.birthday);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
							<tr><td>Nơi sinh</td><td><INPUT TYPE="text" NAME="noisinh" style="width:90%" value="'.$userinfo[noisinh].'"></td></tr>
							<tr><td>Nguyên quán</td><td><INPUT TYPE="text" NAME="nguyenquan"  style="width:90%" value="'.$userinfo[nguyenquan].'"></td></tr>
							<tr><td>Loại nhân viên</td><td>'.SelectBox("loainhanvien","Select id, name from $prefix"._loainhanvien."",$userinfo[loainhanvien],$onchange='',$style='',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
						</table>
						 </fieldset>';
			echo '</div>';
			echo '<div style="float:left;width:30%;padding-left:10px;">';
		echo '<fieldset style="height:230px;">
					<div style="text-align:center;padding-top:5px;">';
			if($userinfo[anh_canhan] && file_exists($userinfo[anh_canhan])){
				echo '<img src="'.$userinfo[anh_canhan].'" width=140 style="border: 1px solid #c0c0c0;padding:2px;">';
			}else{
				echo'<img src="images/noimg.png">';
			}
		echo'		
						<INPUT TYPE="file" NAME="avatar" size=15>
					</div>
			 </fieldset>';
			echo '</div> <div style="clear:both"></div>';
				echo '<div style="float:left;width:50%">';
						echo '<fieldset  style="height:180px;">
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=30%>Dân tộc</td><td><INPUT TYPE="text" NAME="dantoc" style="width:90%" value="'.$userinfo[dantoc].'"></td></tr>
								<tr><td>Tôn giáo</td><td><INPUT TYPE="text" NAME="tongiao" style="width:90%" value="'.$userinfo[tongiao].'"></td></tr>
								<tr><td>Quốc tịch</td><td>'.SelectBox("quoctich","Select id, name from $prefix"._quoctich."",$userinfo[quoctich],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
								<tr><td>Giới tính</td><td>
									'.SelectBox("gender","Select id, name from $prefix"._sex."",$userinfo[sex],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).' 
								</td></tr>
								<tr><td>Tình trạng hôn nhân</td><td>
									'.SelectBox("marital_status","Select id, name from $prefix"._marital_status."",$userinfo[marital_status],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).' 
									</td></tr>
								<tr><td>Ngày vào làm:</td><td><INPUT TYPE="text" NAME="ngayvaolam" style="width:35%" value="'.$userinfo[ngayvaolam].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngayvaolam);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>

							</table>
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:48%;padding-left:5px;">';
						echo '<fieldset  style="padding:5px;height:172px;">';
									$chinhanhid = Getname("id_chinhanh","$prefix"._bophan."","id='".$userinfo[bophan_id]."'");
									echo select_phongban($userinfo[id_chinhanh],$userinfo[bophan_id]);
									echo'
									<table width=100% cellpadding=2 cellspacing=2>
										<tr><td width=30%>Chức vụ: </td><td>'.SelectBox("nhanvien_type","Select id, name from $prefix"._chucvu ."",$userinfo[nhanvien_type],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
										<tr><td>Số CMND:</td><td><INPUT TYPE="text" NAME="cmnd" size=6 value="'.$userinfo[id_card].'"> &nbsp;&nbsp;Ngày cấp : <INPUT TYPE="text" NAME="cmnd_ngaycap" style="width:25%" value="'.$userinfo[date_issue_id_card].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.cmnd_ngaycap);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
										<tr><td>Nơi cấp:</td><td><INPUT TYPE="text" NAME="cmnd_noicap" style="width:90%" value="'.$userinfo[who_issue_id_card].'"></td></tr>

									</table>
									
							 </fieldset>';
				echo '</div> <div style="clear:both"></div>';
  			echo'	
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>';
		echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:1px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	
		</form>	
		';
echo '</div>';
navJob($id,"Cmd_Infor");
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
    include("footer.php");
*/
Employee_AddNew($id);
}
//============================================
function Employee_Update(){
	global $prefix;
	$Hodem = $_POST[Hodem];
	$Ten = $_POST[Ten];
	$Ngaysinh = $_POST[Ngaysinh];
	$Gioitinh = $_POST[Gioitinh];
	$SoCMTND = $_POST[SoCMTND];
	$NgaycapCMTND = $_POST[NgaycapCMTND];
	$NoicapCMTND = $_POST[NoicapCMTND];
	$SoTaikhoan = $_POST[SoTaikhoan];
	$SoTheNhanvien = $_POST[SoTheNhanvien];
	$TinhtrangHonnhan = $_POST[TinhtrangHonnhan];
	$TenVochong = $_POST[TenVochong];
	$Ngaycuoi = $_POST[Ngaycuoi];
	$Ghichu = $_POST[Ghichu];
	$nhanvien_id = $_POST[nhanvien_id];

	if($Hodem && $Ten){
		$sql = "update $prefix"._nhanvien." set 
					first_name='$Hodem',
					last_name='$Ten',
					birthday='$Ngaysinh',
					sex='$Gioitinh',
					id_card='$SoCMTND',
					date_issue_id_card='$NgaycapCMTND',
					who_issue_id_card='$NoicapCMTND',
					bank_account='$SoTaikhoan',
					id_employee ='$SoTheNhanvien',

					marital_status = '$TinhtrangHonnhan',
					spouse_name = '$TenVochong',
					date_married = '$Ngaycuoi',
					note = '$Ghichu'
				where id='$nhanvien_id' ";
		mysql_query($sql);
	}
		if($_FILES['anh_canhan']['tmp_name'] != 'none' && $_FILES['anh_canhan']['tmp_name'] != ''){

			@unlink("images/anh_nhanvien/".$_FILES['banner']['name']);
			$ten_anh = $nhanvien_id."_".$_FILES[anh_canhan][name];
			@copy($_FILES[anh_canhan][tmp_name], "images/anh_nhanvien/$ten_anh");
			$sql = "update $prefix"._nhanvien." set 
						anh_canhan='$ten_anh'
					where id='$nhanvien_id' ";
			mysql_query($sql);
		}
	//Header("Location: admin.php?op=Employee_Index");
	echo "asdas";
	?>
		<script>
			displayMessage('admin.php?op=View_Info&id=90691245',800,530);
		</script>
	<?
}
//============================================
function View_Dependent($id){
	include("header.php");
	global $prefix,$eid;
	$sql = "select first_name,last_name from $prefix"._nhanvien." where id='$id'";
	$result = mysql_query($sql);
	$myrow=mysql_fetch_array($result);
echo '<div style="float:left;width:80%">';
	echo'
    <div class="folder">
        <div class="folder-title">THÔNG TIN GIA ĐÌNH : '.$myrow[first_name].' '.$myrow[last_name].'</div>
        <div class="folder-content" id="list_option">
            <div style="width:100%;"><!--begin left option-->';
			if($eid){
			$res = mysql_query("Select * from $prefix"._nhanvien_giadinh." where gid =  '$eid' ");
			$giadinh=mysql_fetch_array($res);
			$hidden = '<INPUT TYPE="hidden" NAME="eid" value="'.$eid.'">';
			}
             ?>
				<form name="demoform" method="post" action="admin.php?op=Insert_Dependent">
				<?echo $hidden?>
					<input type="hidden" name="nhanvien_id" value="<?echo $id ?>">	
					<div style="float:left;width:49%">
					<fieldset>
					  <table border='0' cellspacing='0' cellpadding='2' align="center" width=100%>									 
							  <tr>
								<td>&nbsp;Họ đệm</td>
								<td><input type='text' name='Hodem'  maxlength='255' size='10' value="<?echo $giadinh[firstname]?>">
									Tên: </font>
									<input type='text' name='Ten'  maxlength='255' size='8' value="<?echo $giadinh[lastname]?>">
								</td>
							  </tr>
							  <tr>
								<td width='80'>&nbsp;Quan hệ</td>
								<td><input type='text' name='Dependent'  maxlength='255' style="width:90%" value="<?echo $giadinh[relationship]?>"></td>
							  </tr>	
							 
							  <tr>
								<td>&nbsp;Ngày sinh</td>
								<td>					
									<input type='text' name='Ngaysinh'  maxlength='255' size='12' value="<?echo $giadinh[birthday]?>"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.Ngaysinh);return false;" ><img name="popcal" style="padding-bottom:7px;" style="padding-bottm:10px;" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
								</td>
							  </tr>			
							  <tr>
								<td width='80'>&nbsp;Email</td>
								<td><input type='text' name='email'  maxlength='255' style="width:90%" value="<?echo $giadinh[email]?>"></td>
							  </tr>		
							  <tr>
								<td width='80' align=right>&nbsp;<input type='checkbox' name='giamtru'  value="1" <? ($giadinh[giamtru] == 1 ?  "checked" : "") ?>></td>
								<td>Giảm trừ gia cảnh</td>
							  </tr>								  
							</table>
						</fieldset>
						</div>
						<div style="float:left;width:5px;"></div>

						<div style="float:left;width:49%">
							<fieldset>
								  <table border='0' cellspacing='0' cellpadding='2' align="center" width=100%>						
																		  
										  <tr>
											<td>&nbsp;Địa chỉ</td>
											<td><input type='text' name='Address'  size='40' value="<?echo $giadinh[address]?>"></td>
										  </tr>					  		
										  <tr>
											<td>&nbsp;Điện thoại</td>
											<td><input type='text' name='phone'  maxlength='30' size='40' value="<?echo $giadinh[phone]?>"></td>
										  </tr>
										  <tr>
											<td>&nbsp;Nghề nghiệp</td>
											<td><input type='text' name='job'  size='40' value="<?echo $giadinh[job]?>"></td>
										  </tr>
										  <tr>
											<td>&nbsp;Nơi làm việc</td>
											<td><input type='text' name='job_address'   size='40' value="<?echo $giadinh[job_address]?>"></td>
										  </tr>	
										
										</table>
							</fieldset>
						</div><div style="clear:both"></div>
							<fieldset><legend>Thông tin thêm</legend>
										<TEXTAREA NAME="note" style="width:90%;height:40px;"><?echo $giadinh[note]?></TEXTAREA>
							</fieldset>
					
		 <?
			echo'	
		<div class="rc_navigation" style="padding-left:200px;padding-top:1px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_Address&id='.$id.'\'" /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		
            </div><!--end left option-->          
            </div><div style="clear:both"></div>
			
	</div></form>	';

			$sql= "SELECT gid,firstname,lastname,sex,relationship,
						  birthday,address,job,job_address,phone,note,giamtru
				   FROM $prefix"._nhanvien_giadinh." WHERE id='$id' ORDER BY gid";

			$i=1;
			$res=mysql_query($sql);

		echo'
<div  style="padding-left:10px;padding-top:0px;height:220px;">
		<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD></TD>
				<TD>'._STT.'</TD>				
				<TD>'._FULLNAME.'</TD>
				<TD>'._QUANHE.'</TD>
				<TD>'._PHONE.'</TD>
				<TD>'._ADDRESS.'</TD>
		  </TR>
		 </THEAD>
		  <TBODY  >';
				$counter = 0;			
				$stt=1;
				$i=0;
			while(list($eid, $fname, $lname, $sex, $rela,$birth,$addr,$job,$job_addr,$phone,$note,$giamtru)=mysql_fetch_row($res)){
				if($phone=="0")$phone=""; 						
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;	
					if($giamtru) $giamtru_giacanh = '<img src="images/admin/panel-close.gif" alt="Giảm trừ gia cảnh">';
					else $giamtru_giacanh = '';
		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9'); \">";	
			echo'<TD style="text-align:center"><a href="admin.php?op=Delete_Dependent&eid='.$eid.'&id='.$id.'"><img src="images/admin/deleted.png" border=0></a> &nbsp; <a href="admin.php?op=View_Dependent&eid='.$eid.'&id='.$id.'"><img src="images/admin/edit.gif" border=0></a></TD>';

			echo'<TD style="padding-left:10px;">'.$stt.'</TD>';
			echo'<TD ><a href="admin.php?op=View_Dependent&eid='.$eid.'&id='.$id.'">'.$fname.' '.$lname.'</a> '.$giamtru_giacanh.'</TD>';
			echo '<TD >'.$rela.'</TD>';
			echo '<TD >'.$phone.'</TD>';
			echo '<TD >'.$addr.'</TD>';

			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></div>';
		echo'

		';
echo '</div>';
navJob($id,"Cmd_Dependent");
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 470 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';

	include("footer.php");
}
//============================================
function View_Address($id){
	include("header.php");
?>
<script>
					function CheckForm(){
						  var error = 0;
						  var error_message = "Vui lòng điền thông tin vào các trường thông tin bắt buộc :\n\n";  

					      var Hokhau = document.demoform.Hokhau.value;   
					      var DiachiNR = document.demoform.DiachiNR.value;   
					      var DienthoaiNR = document.demoform.DienthoaiNR.value;   
						

						  if (Hokhau == "" ) {
							  error_message = error_message + "- Hộ khẩu thường trú chưa điền thông tin \n";
							  error = 1;
						  }
						  if (DiachiNR == "" ) {
							  error_message = error_message + "- Nơi ở hiện nay chưa điền thông tin \n";
							  error = 1;
						 
						  if (error == 1) {
							alert(error_message);
							return false;
						  } else {
							return true;
						  }
					}


</script>
<?
	global $prefix;
	$sql = "select first_name,last_name from $prefix"._nhanvien." where id='$id'";
	$result = mysql_query($sql);
	$info=mysql_fetch_array($result);

echo '<div style="float:left;width:80%">';
	$sql = "select * from $prefix"._nhanvien_address." 
			where (id_nhanvien='$id')";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);
	echo'
    <div class="folder">
        <div class="folder-title">ĐỊA CHỈ NHÂN VIÊN : '.$info[first_name].' '.$info[last_name].'</div>
        <div class="folder-content" id="list_option">
            <div style="width:100%; float:left"><!--begin left option-->';
             ?>
		<form name="demoform" method="post" action="admin.php?op=Insert_Address" onSubmit="return CheckForm();">
		<input type="hidden" name="id" value="<?= $id ?>">

		  <table border='0' cellspacing='2' cellpadding='2' width=90%>
 		 	  <tr>
				<td width=30%>Hộ khẩu thường trú</td>
				<td><textarea name='Hokhau' cols='50' rows=2 style="font-family: Arial; font-size: 9pt;" ><?= $myrow[permament_address]?></textarea> <?echo _REQUIRED?></td>
			  </tr>
 		 	  <tr>
				<td  nowrap>Nơi ở hiện nay</td>
				<td><textarea name='DiachiNR' cols='50' rows=2 style="font-family: Arial; font-size: 9pt;" ><?= $myrow[current_address]?></textarea>  <?echo _REQUIRED?></td>
			  </tr>
			  <tr>
				<td>&nbsp;Tel NR</td>
				<td><input type='text' name='DienthoaiNR' value="<?= $myrow[home_phone]?>" maxlength='255' size='12' >  </td>
			  </tr>	
			  <tr>
				<td>&nbsp;Mobile</td>
				<td><input type='text' name='Mobile' value="<?= $myrow[mobile]?>" maxlength='255' size='12' ></td>
			  </tr>	
			  <tr>
				<td>&nbsp;Fax</td>
				<td><input type='text' name='Fax' value="<?= $myrow[home_fax]?>" maxlength='255' size='12' ></td>
			  </tr>	
			  <tr>
			  	<td width='80'>&nbsp;Email</td>
				<td><input type='text' name='Email' value="<?= $myrow[email]?>" maxlength='255' size='40' ></td>
			  </tr>
		  </table>
		 <?
			echo'	
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>';
		echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	
		</form>	
		';

		
echo '</div>';
navJob($id,"Cmd_Address");
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 530 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
	include("footer.php");
}
//============================================
function View_Emergency($id){
	include("header.php");
	global $prefix;
	$sql = "select * from $prefix"._nhanvien_emergency_contact." where id_nhanvien='$id'";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);
	echo'
    <div class="folder">
        <div class="folder-title">ĐỊA CHỈ LIÊN LẠC KHI CẦN THIẾT : '.$myrow[first_name].' '.$myrow[last_name].'</div>
        <div class="folder-content" id="list_option">
            <div style="width:100%; float:left"><!--begin left option-->';
             ?>
		<form name="form_Emergency" method="post" action="thongtin_diachi_content.php">
		<input name="nhanvien_id" type="hidden" value="<?= $nhanvien_id?>" >

	  <table border='0' cellspacing='0' cellpadding='3' align="center" width="100%">
		<tr>
		  <td>&nbsp;<img src="images/form_logon_user.gif"></td>
		  <td>Người liên hệ </td>
		  <td><input type="text" name="NguoiLienhe" size="40" value="<?= $myrow[name]?>"></td>
		</tr>
		<tr>
		  <td align="center"><img border="0" name="imgHomeFax" src="images/form_sex.gif"></td>
		  <td>&nbsp;Quan hệ</td>
		  <td><select name='Quanhe'>
				<option value=""></option>
				<option value="Vợ/Chồng" <?= ($myrow[relative]=="Vợ/Chồng")? "selected":"" ?> >Vợ/Chồng</option>
				<option value="Bố/Mẹ" <?= ($myrow[relative]=="Bố/Mẹ")? "selected":"" ?> >Bố/Mẹ</option>
				<option value="Anh/Chị" <?= ($myrow[relative]=="Anh/Chị")? "selected":"" ?> >Anh/Chị</option>
				<option value="Em trai/Em gái" <?= ($myrow[relative]=="Em trai/Em gái")? "selected":"" ?> > Em trai/Em gái</option>
				<option value="Con" <?= ($myrow[relative]=="Con")? "selected":"" ?> >Con trai/Con gái</option>
			  </select>
		  </td>
		</tr>	
 	    <tr>
		  <td width='1%' align='center'><img name=imgHomeAddress border='0' src='images/form_companyaddress.gif'></td>
		  <td  nowrap>Địa chỉ liên hệ</td>
		  <td><textarea name='DiachiLienhe' cols='50' rows=3 ><?= $myrow[contact_address] ?></textarea></td>
	    </tr>
			  <tr>
				<td align="center"><img border="0" name="imgHomePhone" src="images/form_homephone.gif"></td>
				<td>&nbsp;Điện thoại</td>
				<td><input type='text' name='DienthoaiNR' value="<?= $myrow[phone]?>" maxlength='255' size='12' ></td>
			  </tr>

			  <tr>
				<td align="center"><img border="0" name="imgMobile" src="images/form_mobile.gif"></td>
				<td>&nbsp;Mobile</td>
				<td><input type='text' name='Mobile' value="<?= $myrow[mobile]?>" maxlength='255' size='12' ></td>
			  </tr>	
			  <tr>
				<td align="center"><img border="0" name="imgHomeFax" src="images/form_homefax.gif"></td>
				<td>&nbsp;Fax</td>
				<td><input type='text' name='Fax' value="<?= $myrow[fax]?>" maxlength='255' size='12' ></td>
			  </tr>	
			  <tr>
				<td width='1%' align='center'><img name=imgEmail border='0' src='images/form_email.gif'></td>
			  	<td width='80'>&nbsp;Email</td>
				<td><input type='text' name='Email' value="<?= $myrow[email]?>" maxlength='255' size='40' ></td>
			  </tr>
	  </table>
		<input type="hidden" name="action" value="">
		 <?
			echo'	
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>';
		echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	
		</form>	
		';

	include("footer.php");
}
//============================================
function View_WorkInfor($id){
	include("header.php");
	global $prefix;
	$sql = "select * from $prefix"._nhanvien_hopdong." 
			where (id_nhanvien='$id')";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);

echo '<div style="float:left;width:80%">';
	echo'
    <div class="folder">
        <div class="folder-title">THÔNG TIN HĐ LAO ĐỘNG : '.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->';

        ?>
		<form name="demoform" method="post" action="admin.php?op=Insert_WorkInfor">
		<input type=hidden name="id" value="<?echo $id;?>">

		<input type=hidden name="hopdong_id" value="<?echo $myrow[id];?>">
		<fieldset >
			<table border='0' cellspacing='0' cellpadding='2' align="center" width=100%>
		 	  <tr>
				<td width='20%'>&nbsp;Bộ phận</td>
				<td colspan="2">
				  <select name="BoPhan" onchange="Set_Supervisors(this.options.selectedIndex)" style="width:90%">
					<?
					$result_cn = mysql_query("select id_chinhanh from $prefix"._nhanvien." where id='$id'");
					list($cnid) = mysql_fetch_row($result_cn);

						$result = mysql_query("select id, name from $prefix"._chinhanh." order by name");
							while(list($chinhanh_id, $chinhanh_name) = mysql_fetch_row($result) ){
								if($chinhanh_id == $cnid) {
									$selected =  "selected";
									$chinhanh = $chinhanh_id;
								}else{
									$selected =  "";
								}
								echo "<option value=\"$chinhanh_id\" $selected>$chinhanh_name  $bophan_name</option>\n";
							}

					
					?>
					
					</select>

					<script>
						var staff_list = document.demoform.BoPhan.options.length ;
						var supervisors = new Array(staff_list);
						for(i=0; i < staff_list; i++){supervisors[i] = new Array();
							supervisors[i][0] = new Option('', '');
							
						}
						<?
						for($i = 1; $i < count($arrChinhanh); $i++){
							$sql = "select nv.id, nv.first_name, nv.last_name from $prefix"._nhanvien." nv
										left join $prefix"._bophan." bp on (nv.bophan_id=bp.id)
										left join $prefix"._chinhanh." cn on (bp.id_chinhanh=cn.id)
									where bp.id_chinhanh=".$arrChinhanh[$i-1] ."
									order by  nv.last_name, nv.first_name";

							$result = mysql_query($sql);
							$j=1;
							while(list($id_nhanvien, $fname, $lname) = mysql_fetch_row($result) ){
								echo "\n supervisors[$i][$j] = new Option('$fname $lname', '$id_nhanvien')";
								$j++;
							}
						}
						?>

						function Set_Supervisors(x){
							for ( m=document.demoform.NguoiDieuhanh.options.length-1; m>0; m--){
								document.demoform.NguoiDieuhanh.options[m]=null;
							}
							for (i=0; i<supervisors[x].length; i++){
								document.demoform.NguoiDieuhanh.options[i]=new Option(supervisors[x][i].text, supervisors[x][i].value);
							}
							document.demoform.NguoiDieuhanh.options[0].selected=true;
						}
					</script>
				</td>
			  </tr>
					  <tr>						
						<td nowrap>&nbsp;Chức vụ   &nbsp;</td>
						<td><input type='hidden' name='KieuNV_new' value="" maxlength='255'>
							<select name=KieuNV onchange="Set_Bacluong(this.options.selectedIndex); document.demoform.KieuNV_new.value=this.options[this.options.selectedIndex].text" style="width:90%">
								<option value=""></option>
							<?
						$id_nhanvien_type = Getname("nhanvien_type","$prefix"._nhanvien."","  id = '$id' ");
								$result = mysql_query("select id, name from $prefix"._chucvu." order by name"); 
								$arrKieuNV = array();
								while(list($type_id, $type_name) = mysql_fetch_row($result) ){
									array_push($arrKieuNV, $type_id);

									$selected=($id_nhanvien_type==$type_id) ? "selected":"";
									echo "<option value=\"$type_id\" $selected> ".$type_name."</option>\n";
								}
							?>
							</select>
							<script>
								var employee_type = document.demoform.KieuNV.options.length ;
								var fee_degree = new Array(employee_type);
								for(i=0; i < employee_type; i++){
									fee_degree[i] = new Array();
									fee_degree[i][0] = new Option('', '');
								}
								<?
								for($i = 1; $i < count($arrKieuNV); $i++){
									$sql = "select id_bacluong, name from $prefix"._bacluong."
											where id_nhanvien_type=".$arrKieuNV[$i-1];
									$result = mysql_query($sql);

									$j=1;
									while(list($id_bacluong, $bacluong) = mysql_fetch_row($result) ){
										echo "\nfee_degree[$i][$j] = new Option('$bacluong', '$id_bacluong')";
										$j++;
									}
								}
								?>

								//var temp=document.demoform.Bacluong;
								function Set_Bacluong(x){
									for ( m=document.demoform.Bacluong.options.length-1; m>0; m--){
										document.demoform.Bacluong.options[m]=null;
									}
									for (i=0; i < fee_degree[x].length; i++){
										document.demoform.Bacluong.options[i]=new Option(fee_degree[x][i].text,fee_degree[x][i].value);
									}
									document.demoform.Bacluong.options[0].selected=true;
								}
							</script>
						</td>
					  </tr>
	
					  <tr>				
						<td nowrap>&nbsp;Kiểu HĐ</td>
						<td><input type='hidden' name='KieuHD_new' value="" maxlength='255'>
							<select name="KieuHD" onchange="document.demoform.KieuHD_new.value=this.options[this.options.selectedIndex].text" style="width:90%">
								<option value=""></option>
							<?	
								$result = mysql_query("select id, name,hieu_luc,hieuluc_type from $prefix"._hopdong_type." order by name");
								while(list($type_id, $type_name,$hl,$hl_type) = mysql_fetch_row($result) ){
									$selected = ($myrow[hopdong_type_id]==$type_id) ? "selected":"";
									if($hl){
										echo "<option value=\"$type_id\" $selected>$type_name-$hl&nbsp;$hl_type</option>\n";
									}
									else{
										echo "<option value=\"$type_id\" $selected>$type_name</option>\n";
									}
									
								}
							?>
							</select>
						</td>
					  </tr>
				  <tr>
					
					<td nowrap>&nbsp;Tình trạng hợp đồng</td>								
					<td><select name="JobStatus" size="1" onchange="Job_Status(this.value);"  style="width:90%">
					<?				
						echo"<option value=\"\" selected> Lựa chọn </option><option value=\"1\" > Hợp đồng mới </option>"
							."<option value=\"2\" > Ký lại hợp đồng</option>" 
							."<option value=\"3\" > Chấm dứt HĐLĐ </option>"; 

					?>
					</td>
				  </tr> 			</table>
		</fieldset>
		<div style="float:left;width:50%;padding-top:2px;" >
			<fieldset style="background:#f4f4f4">
			<table border='0' cellspacing='0' cellpadding='2' align="center" width=100% height=130>
					  <tr>
						
						<td nowrap>&nbsp;Số hợp đồng</td> 
						<td nowrap><input type='text' name='hopdong_code' value="<?= $myrow[hopdong_code] ?>" maxlength='255' size='12'>
					  </tr>	
					  <tr>					
						<td nowrap>&nbsp;Ngày kí HĐ</td>
						<td>
							<?
								$sql = "select nv_hd.ngay_ky, nv_hd.ngay_ketthuc, hd_type.id, hd_type.name
										from $prefix"._nhanvien_hopdong." nv_hd
										  left join $prefix"._hopdong_type." hd_type on(nv_hd.hopdong_type_id = hd_type.id)
										where (nv_hd.id_nhanvien='$nhanvien_id')";

								$result = mysql_query($sql);
								list($ngay_ky, $ngay_ketthuc, $hd_type_id, $hd_type_name) = mysql_fetch_row($result);
								if($myrow[ngay_ky]) $dateky = strftime( _DATESTRING, $myrow[ngay_ky]);
								if($myrow[ngay_ketthuc]) $dateketthuc = strftime( _DATESTRING, $myrow[ngay_ketthuc]);
							?>

							<input type='text' name='NgaykyHD' value="<?= $dateky; ?>" maxlength='255' size='12'><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.NgaykyHD);return false;" ><img name="popcal" style="padding-bottom:7px;" src="WeekPicker/calbtn.gif" border="0" alt="" ></a>
						</td>
					  </tr>
					  <tr>
						<td nowrap>&nbsp;Ngày kết thúc HĐ</td>
						<td>
							<input type='text' name='NgaykethucHD' value="<?= $dateketthuc; ?>" maxlength='255' size='12'><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.NgaykethucHD);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
						</td>
					  </tr>		
					  <tr>						
						<td nowrap>&nbsp;Thời gian làm việc</td>
						<td>
							<input type='text' name='ThoigianLV' value="<?= $myrow[thoigian_lamviec] ?>" maxlength='255' size='12'>
						</td>
					  </tr>	

			  </table>
			</fieldset>
		</div>	
		<div style="float:left;width:5px;"></div>
		<div style="float:left;width:50%;padding-top:2px;">
			<fieldset style="background:#f4f4f4">
			
				<table border='0' cellspacing='0' cellpadding='2' align="center" width=100% height=130>				
				<tr>	
					<td nowrap>&nbsp;Lương cơ bản</td>								
					<td><INPUT TYPE="text" NAME="luongcoban" onkeypress="maskMoney_New(this.value,demoform,this.name)" value="<?echo $myrow[luong] ?>" style="width:60%" >
					</td>
				  </tr>
				<tr>
					<td nowrap>&nbsp;Người trực tiếp quản lý</td>
					<td><select name="NguoiDieuhanh">
							<option></option>
						<?
							$sql = "select nv.id, nv.first_name, nv.last_name from $prefix"._nhanvien." nv
									where  (nv.id !='$nhanvien_id')
									order by nv.last_name, nv.first_name";
							$result = mysql_query($sql);
							while(list($id_nhanvien, $fname, $lname) = mysql_fetch_row($result) ){
								$selected = ($myrow[supervisor]==$id_nhanvien) ? "selected":"";
								echo "<option value=\"$id_nhanvien\" $selected>$fname $lname</option>\n";
							}

					?>
						</select>
					</td>
				  </tr>	
				<tr>	
					<td nowrap>&nbsp;Địa điểm làm việc</td>								
					<td><input type="text" name="address" value="<?echo $myrow[address]?>" style="width:90%;height:19px;">
					</td>
				<tr>		
				<tr>	
					<td nowrap>&nbsp;Ngày phép</td>								
					<td><input type="text" name="ngayphep" value="<?echo $myrow[ngayphep]?>" style="width:30%;height:19px;">
					</td>
				<tr>				
				</table>
			</fieldset>
		</div>	 <div style="clear:both"></div>
	


		 <?

			echo'	

			<input type="checkbox" name="thamgia_baohiem" value="1"> &nbsp; Tham gia bảo hiểm 
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>	';
echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_WorkHistory&id='.$id.'\'" /></div>
					</div>
		</div>	 <div style="clear:both"></div></form>
';

		$sql = "select * 
				from $prefix"._nhanvien_hopdong_history." 
				where id_nhanvien='$id'
				order by ngay_ky, ngay_ketthuc";
		$result = mysql_query($sql);
echo mysql_error();
		echo'
<div class=title style="padding-left:10px;"> &#187; LƯU VẾT HỢP ĐỒNG</div>
<div  style="padding-left:10px;padding-top:0px;height:135px;">
		<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD>TT</TD>
				<TD>Ngày kí HĐ</TD>
				<TD>Ngày kết thúc HĐ</TD>
				<TD>Kiểu HĐ</TD>
				<TD>Thời gian làm việc</TD>
				<TD>Phòng - Ban</TD>
				<TD>Vị trí công việc</TD>
				<TD>Chức vụ</TD>
				<TD>Bậc lương</TD>
		  </TR>
		 </THEAD>
		  <TBODY  >';
				$counter = 0;			
				$stt=1;
				$i=0;
		 while($myrow = mysql_fetch_array($result) ){
				
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;
		if($myrow[ngay_ky]) $ngay_ky = 	strftime( _DATESTRING,$myrow[ngay_ky]);
		else $ngay_ky='';

		if($myrow[ngay_ketthuc]>0) $ngay_ketthuc = 	strftime( _DATESTRING,$myrow[ngay_ketthuc]);
		else $ngay_ketthuc='Không xác định thời hạn';

		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9'); \">";	
			echo'<TD >'.$stt.'</TD>';
			echo'<TD align=center>'.$ngay_ky.'</TD>';
			echo'<TD align=center>'.$ngay_ketthuc.'</TD>';
			echo '<TD >'.Getname("name","$prefix"._hopdong_type."","id=".$myrow[hopdong_type_id]."").'</TD>';
			echo '<TD >'.$myrow[thoigian_lamviec].'</TD>';
			echo '<TD >'.$myrow[phong_ban].'</TD>';
			echo '<TD >'.$myrow[kieu_nhanvien].'</TD>';
			echo '<TD >'.$myrow[chucvu].'</TD>';
			echo '<TD align=center>'.$myrow[bacluong].'</TD>';

			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></div></form>';
	
echo '</div>';
navJob($id,"Cmd_WorkInfor");
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 480 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	function Display_Salary(){
		Bacluong = document.demoform.Bacluong.value;
		var a_array=Bacluong.split(":");
		document.demoform.luongcoban.value =  a_array[1];
		document.demoform.donvi.value =  a_array[2];


	}
	</SCRIPT>
<?
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
	include("footer.php");
}
//============================================
function View_WorkHistory($id){
	include("header.php");
	global $prefix,$eid;
	/*
	$res = mysql_query("Select wid,date_end  from   $prefix"._nhanvien_working_history."   ");
	while(list($wid,$timework)=mysql_fetch_row($res)){
		$datework = Date_format_Time($timework);
		mysql_query("Update  $prefix"._nhanvien_working_history." set timework  = '$datework' where wid='$wid' ");
		//echo "Update  $prefix"._nhanvien_working_history." set timework  = '$datework' <br> ";
		//echo $timework.' = '.$datework.'<br>';
	}
	*/

echo '<div style="float:left;width:80%">';
	$sql = "select * from $prefix"._nhanvien_hopdong." 
			where (id_nhanvien='$id')";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);

	echo'
    <div class="folder">
        <div class="folder-title">QUÁ TRÌNH CÔNG TÁC CỦA : '.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->';
			if($eid){
				$res = mysql_query("Select * from $prefix"._nhanvien_working_history." where wid = '$eid' ");	
				$working = mysql_fetch_array($res);
				$hidden = '<input type="hidden" name="eid" value="'.$eid.'">';
			}
             ?>
	<form name="demoform" method="post" action="admin.php?op=Insert_WorkHistory">
		<input type="hidden" name="id" value="<?echo $id ?>">	  	
		<?echo $hidden?>
		<div style="float:left;width:50%">
			<fieldset>
				<table border="0" cellspacing="2" cellpadding="2"  width=100%>    			  
				 
				  <tr>
					<td >Tên công ty </td>
					<td><input type='text' name='c_name'   size='30' value="<?echo $working[companyname]?>">						
					</td>
				  </tr>
				  
				  <tr>
					<td>Ngày bắt đầu </td>
					<td><font class=content>					
						<input type='text' name='date_b'   size='12' value="<?echo $working[date_begin]?>"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.date_b);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					</td>
				  </tr>			
				  <tr>
					<td>Ngày kết thúc </td>
					<td><font class=content>					
						<input type='text' name='date_e'   size='12' value="<?echo $working[date_end]?>" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.date_e);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					</td>
				  </tr>	

				  <tr>
					<td>Vị trí</td>
					<td><input type='text' name='functions'   size='30' value="<?echo $working[functions]?>" ></td>
				  </tr>	
				  				  				  
				  <tr>
					<td>Tên người tham khảo</td>
					<td><input type='text' name='d_name'  size='30' value="<?echo $working[referent_name]?>" ></td>
				  </tr>
			</table>	  		
			</fieldset>
</div>
	<div style="float:left;width:5px"></div>
	<div style="float:left;width:49%">
			<fieldset>
			<table border="0" cellspacing="2" cellpadding="2"  width=100%>  
				  <tr>
					<td>SĐT</td>
					<td><input type='text' name='phone'   size='30' value="<?echo $working[phone]?>" ></td>
				  </tr>				  
				  <tr>
					<td>Websie</td>
					<td><input type='text' name='website'   size='30' value="<?echo $working[website]?>" ></td>
				  </tr>		
				  <tr>
					<td>Địa chỉ</td>
					<td><input type='text' name='address'   size='30' value="<?echo $working[address]?>" ></td>
				  </tr>						  
				  <tr>
					<td>Mô tả công việc</td>
					<td><textarea rows="2" name="mota" cols="32" ><?echo $working[duty]?></textarea></td>
				  </tr>
				  
				  <tr>
					<td>Mức lương</td>
					<td><input type='text' name='payment'   size='30' value="<?echo $working[payment]?>" ></td> 
				  </tr>	
		  					
				</table>
			</fieldset>
			</div><div style="clear:both"></div>
		<fieldset><legend>Lý do chuyển công tác</legend>
				<textarea name="reason" style="width:90%;height:50px;"><?echo $working[reason_change]?></textarea>
		</fieldset>
		
		     <?
			echo'	
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_Education&id='.$id.'\'" /></div>
					</div>
		</div>	 <div style="clear:both"></div>
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div></form>';


			$sql= "SELECT wid,companyname,referent_name,date_begin,date_end,functions,payment
				   FROM $prefix"._nhanvien_working_history."	
				   WHERE nid='$id'
				   ";
	
			$res=mysql_query($sql);

		echo'
<div  style="padding-left:10px;padding-top:0px;">
		<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD></TD>
				<TD>TT</TD>
				<TD>Ngày bắt đầu  </TD>
				<TD>Ngày kết thúc  </TD>
				<TD>Tên công ty </TD>
				<TD>Tên người tham khảo </TD>
				<TD>Chức vụ </TD>
				<TD>Mức lương  </TD>
				
		  </TR>
		 </THEAD>
		  <TBODY  >';
				$counter = 0;			
				$stt=1;
				$i=0;
		while(list($wid, $c_name,$referent_name,$date_b,$date_e,$functions,$payment)=mysql_fetch_row($res)){
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;	
		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9');\">";	
			echo'<TD width=5%><a href="admin.php?op=Delete_WorkHistory&id='.$id.'&wid='.$wid.'"><img src="images/admin/deleted.png" border=0 alt="delete"></a><a href="admin.php?op=View_WorkHistory&id='.$id.'&eid='.$wid.'"><img src="images/admin/edit.gif" border=0 alt="Edit"></a></TD>';
			echo'<TD >'.$stt.'</TD>';
			echo'<TD align=center>'.$date_b.'</TD>';
			echo'<TD align=center>'.$date_e.'</TD>';
			echo '<TD >'.$c_name.'</TD>';
			echo '<TD >'.$referent_name.'</TD>';
			echo '<TD >'.$functions.'</TD>';
			echo '<TD >'.$timework.'</TD>';
			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></div></form>';
		echo'

		
		';
echo '</div>';
navJob($id,"Cmd_WorkHistory");
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 490 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
	include("footer.php");
}
//============================================
function View_Education($id){
	include("header.php");
	global $prefix,$editid;
echo '<div style="float:left;width:80%">';
	$sql = "select * from $prefix"._nhanvien_hopdong." 
			where (id_nhanvien='$id')";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);

	echo'
    <div class="folder">
        <div class="folder-title">TRÌNH ĐỘ CHUYÊN MÔN CỦA : '.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->';
			if($editid){
				$res = mysql_query("Select * from $prefix"._nhanvien_education ." where eid = '$editid' ");
				$education = mysql_fetch_array($res);
				$hidden = '<input type="hidden" name="editid" value="'.$editid.'">	 ';
			}
             ?>
	<form name="demoform" method="post" action="admin.php?op=Insert_Education">
		<input type="hidden" name="id" value="<?echo $id ?>">	  	
		<?echo$hidden?>		
				<table border="0" cellspacing="2" cellpadding="2"  align="center" width=90%>    			  
				 
				  <tr>
					<td width=25%>Trình độ </td>
					<td><?echo SelectBox("degree","Select id, name from $prefix"._edu_level."",$education[degree],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE)?>
					</td>
				  </tr>  				  
				  				  				  
				  <tr>
					<td>Chuyên nghành</td>
					<td><input type='text' name='Pro' maxlength='255' style='width:90%' value="<?echo $education[professional]?>"></td>
				  </tr>					  		

				  <tr>
					<td>Xếp loại</td>
					<td><select size="1" name="level"  style='width:90%'>
					<?
						$value=array();
						$value[]="Chọn một";
						$value[]="Xuất sắc";
						$value[]="Giỏi";	
						$value[]="Khá";	
						$value[]="Trung bình khá";
						$value[]="Trung bình";	

						for($i=0;$i<sizeof($value);$i++){
							echo"<option value=\"$value[$i]\" ".($education[level] == $value[$i] ?  "selected" : "").">$value[$i]</option>";
						}
					?>
					    	
						 </select>
				  </td>
				  </tr>
				  <tr>
					<td>Ngày nhập học</td>
					<td><font class=content>					
						<input type='text' name='DateBegin'  maxlength='255' size='12' value="<?echo $education[date_begin]?>"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateBegin);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					</td>
				  </tr>
				  <tr>
					<td>Ngày tốt nghiệp</td>
					<td><font class=content>					
						<input type='text' name='DateEnd'  maxlength='255' size='12' value="<?echo $education[date_end]?>"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateEnd);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					</td>
				  </tr>					      

				  <tr>
					<td>Tại trường</td>
					<td><input type='text' name='school'    style='width:90%' value="<?echo $education[school]?>"></td>
				  </tr>

				  <tr>
					<td>Địa chỉ</td>
					<td><textarea rows="1" name="Addr"  style='width:90%'><?echo $education[address]?></textarea></td>
				  </tr>
				  <tr>
					<td valign="top">Thông tin thêm</td>	
					<td><textarea rows="3" name="note"  style='width:90%'><?echo $education[note]?></textarea></td>
				  </tr>		 		  					
				</table>
		     <?

			echo'	
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_Training&id='.$id.'\'" /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div></form>	';


			$sql="SELECT eid,degree,professional,level,date_begin,date_end,school,address,note 
			  		FROM $prefix"._nhanvien_education." where nid='$id'";
			$rls=mysql_query($sql);
			$i=1;	
			
		echo'
<div  style="padding-left:10px;padding-top:0px;height:145px;">
		<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD></TD>
				<TD>TT</TD>
				<TD>Trình độ</TD>
				<TD>Trường</TD>
				<TD>Chuyên ngành  </TD>
				<TD>Năm tốt nghiệp  </TD>
				<TD>Loại </TD>
				
			
				
		  </TR>
		 </THEAD>
		  <TBODY  >';
				$counter = 0;			
				$stt=1;
				$i=0;
		while(list($eid,$degree,$pro,$level,$date_b,$date_e,$sch,$addr,$note)=mysql_fetch_row($rls)){	
				
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;	
		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9');window.location='admin.php?op=View_Education&id=".$id."&editid=".$eid."' \">";	
			echo'<TD ><a href="admin.php?op=Delete_Education&id='.$id.'&eid='.$eid.'"><img src="images/admin/deleted.png" border=0 alt="Delete"></a>&nbsp;<a href="admin.php?op=View_Education&id='.$id.'&editid='.$eid.'"><img src="images/admin/edit.gif" border=0 alt="Delete"></a></TD>';
			echo'<TD >'.$stt.'</TD>';
			echo'<TD align=center>'.Getname("name","$prefix"._edu_level."","id='$degree'").'</TD>';
			echo'<TD align=center>'.$sch.'</TD>';
			echo '<TD >'.$pro.'</TD>';
			echo '<TD >'.$date_e.'</TD>';
			echo '<TD >'.$level.'</TD>';
			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></div></form>';
		
echo '</div>';
navJob($id,"Cmd_Education");
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 480 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
	include("footer.php");
}
//============================================
function View_Training($id){
	include("header.php");
	global $prefix,$eid;
echo '<div style="float:left;width:80%">';
	$sql = "select * from $prefix"._nhanvien." 
			where (id='$id')";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);

	echo'
    <div class="folder">
        <div class="folder-title">CÁC KHÓA ĐÀO TẠO CỦA : '.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->';
			if($eid){
				$res = mysql_query("Select * from $prefix"._nhanvien_training." where tid = '$eid' ");
				$training = mysql_fetch_array($res);
				$hidden = '<INPUT TYPE="hidden" NAME="editid" value="'.$eid.'">';
			}
             ?>
	<form name="demoform" method="post" action="admin.php?op=Insert_Training">
		<input type="hidden" name="id" value="<?echo $id ?>">	 
		<?echo $hidden?>
		<div style="float:left;width:50%;">
		<fieldset>
				<table border="0" cellspacing="2" cellpadding="2"  align="center" width=96%>    			  				 
				  <tr>
					<td >Tên khóa đào tạo </td>
					<td><input type='text' name='Title'   size='30' value="<?echo $training[training_title]?>">						
					</td>
				  </tr>
				  <tr>
					<td >Chi phí đào tạo </td>
					<td><input type='text' name='chiphi'   size='30'  value="<?echo $training[chiphi]?>">						
					</td>
				  </tr>				  
				  <tr>
					<td>Ngày bắt đầu </td>
					<td><font class=content>					
						<input type='text' name='DateBegin'   size='12' value="<?echo $training[date_begin]?>" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateBegin);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					</td>
				  </tr>			
				  <tr>
					<td>Ngày kết thúc </td>
					<td><font class=content>					
						<input type='text' name='DateEnd'   size='12' value="<?echo $training[date_end]?>" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateEnd);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					</td>
				  </tr>	
		  </table>				  				  
		</fieldset>
		</div>
		<div style="float:left;width:5px"></div>
		<div style="float:left;width:49%;">
		<fieldset>
				<table border="0" cellspacing="3" cellpadding="3"  align="center" width=96%>    			  				 

				  <tr>
					<td>Kết quả</td>
					<td><input type='text' name='Result'  size='30' value="<?echo $training[result]?>"></td>
				  </tr>
				  <tr>
					<td>Tên chứng chỉ</td>
					<td><input type='text' name='Instructor'   size='30' value="<?echo $training[instructor]?>"></td>
				  </tr>	
					
                  <tr>
					<td>Nơi cấp bằng</td>
					<td><input type='text' name='Certificate'   size='30' value="<?echo $training[certificate]?>"></td>
				  </tr>
			  		
				  <tr>
					<td>Nơi cử đi đào tạo</td>
					<td><input type='text' name='place'   size='30' value="<?echo $training[training_place]?>"></td>
				  </tr>			  	
				 	 		  					
				</table>
			</fieldset>
			</div><div style="clear:both"></div>
		<fieldset><legend>Thông tin thêm</legend>
				<textarea name="note" style="width:90%;height:50px;"><?echo $training[note]?></textarea>
		</fieldset>
		     <?

			echo'	
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_Skill&id='.$id.'\'" /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div></form>	';


			$sql= "SELECT tid,training_title,date_begin,date_end,result,
						  training_place,instructor,certificate,note
				   FROM $prefix"._nhanvien_training." WHERE nid='$id' 
				   ORDER BY date_begin,date_end";
	
			$i=1;
			$res=mysql_query($sql);
			
		echo'
<div  style="padding-left:10px;padding-top:0px;">
		<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD></TD>
				<TD>TT</TD>
				<TD>Khóa đào tạo</TD>
				<TD>Ngày bắt đầu</TD>
				<TD>Ngày kết thúc  </TD>
				<TD>Kết quả  </TD>
				<TD>Nơi đào tạo </TD>
		  </TR>
		 </THEAD>
		  <TBODY  >';
				$counter = 0;			
				$stt=1;
				$i=0;
			while(list($tid, $title, $date_b, $date_e,$rls,$place,$instructor,$certificate,$note)=mysql_fetch_row($res)){
				$note=ereg_replace("\r\n" , "\\n", $note);
				
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;	
		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9'); window.location='admin.php?op=View_Training&id=".$id."&eid=".$tid."'\">";	
			echo'<TD ><a href="admin.php?op=Delete_Training&id='.$id.'&eid='.$tid.'"><img src="images/admin/deleted.png" border=0 alt="Delete"></a>&nbsp;<a href="admin.php?op=View_Training&id='.$id.'&eid='.$tid.'"><img src="images/admin/edit.gif" border=0 alt="Delete"></a></TD>';
			echo'<TD >'.$stt.'</TD>';
			echo'<TD align=left>'.$title.'</TD>';
			echo'<TD align=center>'.$date_b.'</TD>';
			echo '<TD >'.$date_e.'</TD>';
			echo '<TD >'.$rls.'</TD>';
			echo '<TD >'.$place.'</TD>';
			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></div>';
	
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
echo '</div>';
navJob($id,"Cmd_Training");
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 480 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
	include("footer.php");
}
//=======================================================
function View_Move($id){
	include("header.php");
	global $prefix,$edit_id;
echo '<div style="float:left;width:80%">';
	$sql = "select id_employee,first_name,last_name,bophan_id,nhanvien_type,id_chinhanh, noilamviec from $prefix"._nhanvien." 
			where (id='$id')";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);
IF($edit_id){
	$res = mysql_query("Select chinhanh_id_new,bophan_id_new,chucvu_id_new,date_begin,date_end,note,soquyetdinh,ngay_quyetdinh from $prefix"._nhanvien_move." where id='$edit_id' ");
	list($chinhanh_id_edit,$bophan_id_edit,$chucvu_id_edit,$date_begin_edit,$date_end_edit,$note_edit,$soquyetdinh,$ngay_quyetdinh)=mysql_fetch_row($res);
	$hidden = '<INPUT TYPE="hidden" NAME="edit_id" value="'.$edit_id.'">';
}
	echo'
    <div class="folder">
        <div class="folder-title">ĐIỀU CHUYỂN NHÂN SỰ : '.$myrow[first_name].' '.$myrow[last_name].' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->';
             ?>
	<form name="demoform" method="post" action="admin.php?op=Insert_Move">
		<input type="hidden" name="id" value="<?echo $id ?>">	  	
		<input type="hidden" name="id_chinhanh_old" value="<?echo $myrow[id_chinhanh] ?>">	  	
		<input type="hidden" name="bophan_id_old" value="<?echo $myrow[bophan_id] ?>">	  	
		<input type="hidden" name="nhanvien_type_old" value="<?echo $myrow[nhanvien_type] ?>">	  	
		<input type="hidden" name="noilamviec_old" value="<?echo $myrow[noilamviec] ?>">	  	

	
		<div style="float:left;width:50%">
		<fieldset>
			<table border='0' cellspacing='2' cellpadding='2' align="center" width=100%>
				 <tr>
					<td width=30%>&nbsp;Phòng ban hiện tại</td>
					<td><INPUT TYPE="text" NAME="luongcoban" disabled value="<?echo Getname("name","$prefix"._chinhanh ."","id='".$myrow[id_chinhanh]."'")?>" style="width:90%">
					</td>
				  </tr>	
				 <tr>
					<td >&nbsp;Đội nhóm hiện tại</td>
					<td><INPUT TYPE="text" NAME="luongcoban" disabled value="<?echo Getname("name","$prefix"._bophan ."","id='".$myrow[bophan_id]."'")?>" style="width:90%">
					</td>
				  </tr>	
				 <tr>
					<td >&nbsp;Nơi l.việc hiện tại</td>
					<td><INPUT TYPE="text" NAME="noilamviec" disabled value="<?echo Getname("name","$prefix"._noilamviec ."","code='".$myrow[noilamviec]."'")?>" style="width:90%">
					</td>
				  </tr>	
				 <tr>
					<td nowrap>&nbsp;Chức danh hiện tại</td>
					<td><INPUT TYPE="text" NAME="luongcoban" disabled value="<?echo Getname("name","$prefix"._chucvu ."","id='".$myrow[nhanvien_type]."'")?>" style="width:90%">
					</td>
				  </tr>	
			</table>
			</fieldset>
		</div>
		<div style="float:left;width:10px;"></div>
		<div style="float:left;width:48%">
			<fieldset  style="height:115px;">
			<table border='0' cellspacing='2' cellpadding='2' align="center" width=100%>
			<?echo select_phongban($chinhanh_id_edit,$bophan_id_edit);?>
				 <tr>
					<td width=31%>Nơi l.việc  mới</td>
					<td><?echo SelectBox("noilamviec_moi","Select code, name from $prefix"._noilamviec ."",$chucvu_id_edit,$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE)?>
					</td>
				  </tr>					
				 <tr>
					<td width=31%>Chức danh mới</td>
					<td><?echo SelectBox("nhanvien_type","Select id, name from $prefix"._chucvu ."",$chucvu_id_edit,$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE)?>
					</td>
				  </tr>	
			</table>
			</fieldset>	
		</div> <div style="height:5px;clear:both"></div>
		<div>
			<fieldset>
			<table border='0' cellspacing='2' cellpadding='2' align="center" width=100%>
				 <tr>
					<td width=20%>&nbsp;Số quyết định</td>
					<td>
						<INPUT TYPE="text" NAME="soquyetdinh"  value="<?echo $soquyetdinh?>" style="width:40%">
						&nbsp;Ngày quyết định
					<input type='text' name='date_quyetdinh' value="<?= $ngay_quyetdinh ?>" maxlength='255' size='12'><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.date_quyetdinh);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>


					</td>
				  </tr>	
				 <tr>
					<td width=20%>&nbsp;Nhân viên</td>
					<td><INPUT TYPE="text" NAME="nhanvien" disabled value="<?echo $myrow[id_employee].':'.$myrow[first_name] .' '. $myrow[last_name]?>" style="width:90%">
					</td>
				  </tr>	
				 <tr>
					<td >&nbsp;Ngày bắt đầu</td>
					<td><input type='text' name='date_begin' value="<?= $date_begin_edit ?>" maxlength='255' size='12'><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.date_begin);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					&nbsp;Ngày kết thúc
					<input type='text' name='date_end' value="<?= $date_end_edit ?>" maxlength='255' size='12'><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.date_end);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
					</td>
				  </tr>	
				
			</table>			
			</fieldset>
			</div>
			 <div style="clear:both"></div>
					<fieldset><legend>Ghi chú</legend>
							<TEXTAREA NAME="note" style="width:90%;height:50px;"><?echo $note_edit?></TEXTAREA>
					</fieldset>
		     <?

			echo'
				<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
							<div id="incomplete_button" >
								<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
								<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_Salary&id='.$id.'\'" /></div>
							</div>
				</div>	 <div style="clear:both"></div>
						
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div></form>	';


				$sql="SELECT * FROM $prefix"._nhanvien_move ."   WHERE nhanvien_id ='$id'";
				$rls=mysql_query($sql);
			
		echo'
<div  style="padding-left:10px;padding-top:0px;height:145px;">
<form   method=POST action="admin.php?op=DeleteAll_Move_Emp">
<INPUT TYPE="hidden" NAME="id" value="'.$id.'">
		<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD><input type="checkbox" name="checkall" onclick="toggleAll(this,1)" id="Checkbox1" /></TD>
				<TD>TT</TD>
				<TD>Phòng ban cũ</TD>
				<TD>Chức vụ cũ</TD>
				<TD>Phòng ban hiện tại</TD>
				<TD>Chức vụ hiện tại</TD>
				<TD>Ngày bắt đầu</TD>
				<TD>Ngày kết thúc</TD>
		  </TR>
		 </THEAD>
		  <TBODY  >';
				$counter = 0;			
				$stt=1;
				$i=0;
			while($myrow=mysql_fetch_array($rls)){
				
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;	
		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9'); \">";	
		    echo '<TD align=center><INPUT TYPE="checkbox" NAME="mid[]" value="'.$myrow[id].'"></TD>';
			echo'<TD ><a href="admin.php?op=View_Move&id='.$id.'&edit_id='.$myrow[id].'"><img src="images/admin/edit.gif" border=0></a></TD>';
			echo'<TD align=center>'.Getname("name","$prefix"._chinhanh ."","id='".$myrow[chinhanh_id_old]."'").' / '.Getname("name","$prefix"._bophan ."","id='".$myrow[bophan_id_old]."'").'</TD>';
			echo'<TD align=center>'.Getname("name","$prefix"._chucvu  ."","id='".$myrow[chucvu_id_old]."'").'</TD>';
			echo'<TD align=center>'.Getname("name","$prefix"._chinhanh ."","id='".$myrow[chinhanh_id_new]."'").' / '.Getname("name","$prefix"._bophan ."","id='".$myrow[bophan_id_new]."'").'</TD>';
			echo'<TD align=center>'.Getname("name","$prefix"._chucvu  ."","id='".$myrow[chucvu_id_new]."'").'</TD>';
			echo'<TD >'.$myrow[date_begin].'</TD>';
			echo'<TD >'.$myrow[date_end].'</TD>';

			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV>
		<div class="rc_btnicon_delete"><input type="button" value="'._DELETE.'" class="rc_btnicon" onclick="CheckDeleteAll(1);" /></div>
		</div></form>';
	
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
echo '</div>';
navJob($id,"Cmd_Move");
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 480 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
	include("footer.php");
}
//=======================================================
function View_Record($id){
	include("header.php");
	global $prefix;
echo '<div style="float:left;width:80%">';


	echo'
    <div class="folder">
        <div class="folder-title">DANH MỤC HỒ SƠ NHÂN VIÊN : '.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").' </div>
     ';
			$sql="SELECT  b.id,b.name
						FROM $prefix"._danhmuc_hoso." b
						WHERE 1";
			$rls=mysql_query($sql);		
			
		echo'
<div >
		<DIV class=widget_tableDiv>
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD>Đã nộp</TD>
				<TD>Tên hồ sơ</TD>
				<TD>Loại</TD>
				<TD>Số lượng </TD>
				<TD>File đính kèm </TD>
		  </TR>
		 </THEAD>
		  <TBODY  >';
		  echo '<form method=POST action="admin.php?op=Insert_Record" enctype="multipart/form-data">';
		  echo '<INPUT TYPE="hidden" NAME="id" value="'.$id.'">';
				$counter = 0;			
				$stt=1;
				$i=0;
			while(list($did,$name,$d_nop,$type,$soluong)=mysql_fetch_row($rls)){
				
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;	
					$res = mysql_query("Select did, da_nop,  kieu , soluong,  file from $prefix"._nhanvien_hoso." where did= '$did' and nid  = '$id' ");
					list($fid,$nop,$kieu,$sl,$file)=mysql_fetch_row($res);

			if($file && file_exists($file)){
				$att =  '<a href="'.$file.'" target=_blank><img src="images/admin/attach.gif" border=0></a>';
			}else{
				$att = '';
			}

		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9'); \">";	
			echo'<TD ><INPUT TYPE="checkbox" NAME="fid[]" value="'.$did.'" '.($fid == $did ?  "checked" : "").' > '.$att.'</TD>';
			echo'<TD style="padding-left:10px;">'.$name.'</TD>';
			echo'<TD align=center>
					<select size="1" name="loaihs[]">					
							<option value="0"  > </option>
				    		<option value="2"  '.($kieu == '2' ?  "selected" : "").'> Bản chính</option>
    						<option value="1"  '.($kieu == '1' ?  "selected" : "").'> Sao y bản chính</option>
    						<option value="3"  '.($kieu == '3' ?  "selected" : "").'> Bản phôtô</option>
    						<option value="4" '.($kieu == '4' ?  "selected" : "").'> File mềm</option>

  						</select>			
			</TD>';
			echo'<TD align=center><input type="text" name="soluong[]" size="10" value="'.$sl.'"></TD>';
			echo'<TD align=center><input type="file" name="file[]" size="10" ></TD>';

			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></div>';

			echo'	
        						
	</div>';
		echo'
		<div class="rc_navigation" style="padding-left:10px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		</form>	
	</div>	';
echo '</div>';
echo '<div style="padding-top:10px;">';
navJob($id,"Cmd_Record");
echo '</div>';
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 470 ;
	initTableWidget('myTable',UserWidth,440,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
	include("footer.php");
}
//=======================================================
function View_Baohiem($id){
	include("header.php");
	global $prefix;
	$sql = mysql_query("select * from $prefix"._nhanvien_baohiem_xahoi ." where nhanvien_id='$id'") ;
	$myrow_hbxh = mysql_fetch_array($sql);
	if($myrow_hbxh[ngaythamgia]) $ngaythamgia = strftime(_DATESTRING,$myrow_hbxh[ngaythamgia]);
	if($myrow_hbxh[ngayhethan]) $ngayhethan = strftime(_DATESTRING,$myrow_hbxh[ngayhethan]);
echo '<form name="demoform" method=POST action="admin.php?op=InsertBaohiem">';
echo '<div style="float:left;width:80%">';
echo '<INPUT TYPE="hidden" NAME="id" value="'.$id.'">';

echo'<div id="dhtmlgoodies_tabView1">';
	echo'<div class="dhtmlgoodies_aTab">';
				echo '<div style="float:left;width:50%">';
						echo '<fieldset>
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=30%>Số sổ BHXH:</td><td><INPUT TYPE="text" NAME="so_bhxh" style="width:90%" value="'.$myrow_hbxh[idso].'"></td></tr>
								<tr><td>Tên nhân viên:</td><td><INPUT TYPE="text" disabled NAME="" style="width:90%" value="'.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").'"></td></tr>								

							</table>
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:48%;padding-left:10px;">';
						echo '<fieldset >';
									echo'
									<table width=100% cellpadding=2 cellspacing=2>
										<tr><td width=25%>Ngày tham gia: </td><td><input type="text" name="DateBegin_bhxh"  style="width:40%" value="'.$ngaythamgia.'" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateBegin_bhxh);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
										<tr><td>Ngày hết hạn:</td><td><input type="text"  name="DateEnd_bhxh"   style="width:40%" value="'.$ngayhethan.'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateEnd_bhxh);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
									</table>									
							 </fieldset>';
				echo '</div> ';
				echo '<fieldset><legend>Ghi chú</legend>
							<TEXTAREA NAME="note_bhxh" style="width:90%;height:90px;">'.$myrow_hbxh[note].'</TEXTAREA>
					</fieldset>';
	echo '</div>';

	$sql = mysql_query("select * from $prefix"._nhanvien_baohiem_yte ." where nhanvien_id='$id'") ;
	$myrow_bhyt = mysql_fetch_array($sql);
	if($myrow_bhyt[ngaythamgia]) $ngaythamgia = strftime(_DATESTRING,$myrow_bhyt[ngaythamgia]);
	if($myrow_bhyt[ngayhethan]) $ngayhethan = strftime(_DATESTRING,$myrow_bhyt[ngayhethan]);

	echo'<div class="dhtmlgoodies_aTab">';
				echo '<div style="float:left;width:50%">';
						echo '<fieldset style="height:100px;">
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=30%>Số sổ BHYT:</td><td><INPUT TYPE="text" NAME="so_bhyt" style="width:90%" value="'.$myrow_bhyt[idso].'"></td></tr>
								<tr><td>Tên nhân viên</td><td><INPUT TYPE="text" disabled NAME="" style="width:90%" value="'.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").'"></td></tr>								
								<tr><td>Nơi đăng kí KCB :</td><td><INPUT TYPE="noikham"  NAME="address_kcb" style="width:90%" value="'.$myrow_bhyt[noikham].'"></td></tr>								
							</table>
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:48%;padding-left:10px;">';
						echo '<fieldset style="height:100px;">';
									echo'
									<table width=100% cellpadding=2 cellspacing=2>
										<tr><td width=25%>Ngày tham gia: </td><td><input type="text" name="DateBegin_bhyt"  value="'.$ngaythamgia.'" style="width:40%"  ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateBegin_bhyt);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
										<tr><td>Ngày hết hạn:</td><td><input type="text"  name="DateEnd_bhyt"  value="'.$ngayhethan.'"  style="width:40%" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateEnd_bhyt);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
									</table>									
							 </fieldset>';
				echo '</div> ';
				echo '<fieldset><legend>Ghi chú</legend>
							<TEXTAREA NAME="note_bhyt" style="width:90%;height:90px;">'.$myrow_bhyt[note].'</TEXTAREA>
					</fieldset>';
	echo '</div>';
	$sql = mysql_query("select * from $prefix"._nhanvien_baohiem_tn ." where nhanvien_id='$id'") ;
	$myrow_bhtn = mysql_fetch_array($sql);
	if($myrow_bhtn[ngaythamgia]) $ngaythamgia = strftime(_DATESTRING,$myrow_bhtn[ngaythamgia]);
	if($myrow_bhtn[ngayhethan]) $ngayhethan = strftime(_DATESTRING,$myrow_bhtn[ngayhethan]);

	echo'<div class="dhtmlgoodies_aTab">';
				echo '<div style="float:left;width:50%">';
						echo '<fieldset>
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td>Tên nhân viên:</td><td><INPUT TYPE="text" disabled NAME="" style="width:90%" value="'.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").'"></td></tr>								
							</table>
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:48%;padding-left:10px;">';
						echo '<fieldset >';
									echo'
									<table width=100% cellpadding=2 cellspacing=2>
										<tr><td width=25%>Ngày tham gia: </td><td><input type="text" name="DateBegin" value="'.$ngaythamgia.'"  style="width:40%"  ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateBegin);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
										<tr><td>Ngày hết hạn:</td><td><input type="text"  name="DateEnd" value="'.$ngayhethan.'"  style="width:40%" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.DateEnd);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
									</table>									
							 </fieldset>';
				echo '</div> ';
				echo '<fieldset><legend>Ghi chú</legend>
							<TEXTAREA NAME="note_bhtn" style="width:90%;height:90px;">'.$myrow_bhtn[note].'</TEXTAREA>
					</fieldset>';
	echo '</div>';
echo '</div>';


		
		echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_TPChinhtri&id='.$id.'\'" /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		
		';
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
echo '</div></form>	';
navJob($id,"Cmd_Baohiem");
             ?>				
					<script type="text/javascript">
					initTabs('dhtmlgoodies_tabView1',Array('Bảo hiểm XH','Bảo hiểm YT','BH Trợ cấp thất nghiệp'),0,800,250);
					</script>
		     <?
	include("footer.php");
}
//===========================================================
function InsertBaohiem(){
	global $prefix;
	$id = $_POST[id];
	$so_bhxh = $_POST[so_bhxh];
	$DateBegin_bhxh = $_POST[DateBegin_bhxh]; if($DateBegin_bhxh) $DateBegin_bhxh = DatetoTime($DateBegin_bhxh);
	$DateEnd_bhxh = $_POST[DateEnd_bhxh]; if($DateEnd_bhxh) $DateEnd_bhxh = DatetoTime($DateEnd_bhxh);
	$note_bhxh = $_POST[note_bhxh];

	mysql_query("Insert into $prefix"._nhanvien_baohiem_xahoi." values('$so_bhxh','$id','$DateBegin_bhxh','$DateEnd_bhxh','$note_bhxh') ");

	$so_bhyt = $_POST[so_bhyt];
	$address_kcb = $_POST[address_kcb];
	$DateBegin_bhyt = $_POST[DateBegin_bhyt]; if($DateBegin_bhyt) $DateBegin_bhyt = DatetoTime($DateBegin_bhyt);
	$DateEnd_bhyt = $_POST[DateEnd_bhyt]; if($DateEnd_bhyt) $DateEnd_bhyt = DatetoTime($DateEnd_bhyt);
	$note_bhyt = $_POST[note_bhyt];

	mysql_query("Insert into $prefix"._nhanvien_baohiem_yte." values('$so_bhxh','$address_kcb','$id','$DateBegin_bhyt','$DateEnd_bhyt','$note_bhyt') ");

	$DateBegin = $_POST[DateBegin]; if($DateEnd) $DateBegin = DatetoTime($DateBegin);
	$DateEnd = $_POST[DateEnd];   if($DateEnd) $DateEnd = DatetoTime($DateEnd);
	$note_bhtn = $_POST[note_bhtn];

	mysql_query("Insert into $prefix"._nhanvien_baohiem_tn." values('','$id','$DateEnd','$DateEnd','$note_bhtn') ");
	Header("Location: admin.php?op=View_Baohiem&id=$id");

}
//============================================================
function View_TPChinhtri($id){
	include("header.php");
	global $prefix;
	$res = mysql_query("Select first_name,last_name from $prefix"._nhanvien." where id = '$id' ");
	$info = mysql_fetch_array($res);

	$res = mysql_query("Select * from $prefix"._nhanvien_chinhtri." where nhanvien_id = '$id' ");
	$ct = mysql_fetch_array($res);
	if($ct[ngayvaodang]) $ngayvaodang =  strftime( _DATESTRING, $ct[ngayvaodang]);
	if($ct[ngayvaodoan]) $ngayvaodoan =  strftime( _DATESTRING, $ct[ngayvaodoan]);
echo '<div style="float:left;width:80%">';
	echo'
    <div class="folder">
        <div class="folder-title">LÝ LỊCH NHÂN VIÊN : '.$info[first_name].' '.$info[last_name].' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->';
	echo '<form   method=POST action="admin.php?op=InsertChinhtri"  name="demofrom" >';
	echo '<INPUT TYPE="hidden" NAME="id" value="'.$id.'">';
					echo '<fieldset>
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=20%>Ngày vào đảng</td><td><INPUT TYPE="text" NAME="ngayvaodang" style="width:80%" value="'.$ngayvaodang.'" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngayvaodang);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td><td>Ngày chính thức</td><td><input type="text" name="ngaychinhthuc" value="'.$ct[ngaychinhthuc].'" ></td></tr>
								<tr><td>Ngày vào đoàn</td><td><INPUT TYPE="text" NAME="ngayvaodoan" style="width:80%" value="'.$ngayvaodoan.'" ><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngayvaodoan);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td><td>) Ngày tham gia tổ chức chính trị - xã hội</td><td><input type="text" name="thamgiatochuc" value="'.$ct[thamgiatochuc].'" ></td></tr>
								<tr><td >TP.Gia đình</td><td colspan=3>'.SelectBox("thanhphan_giadinh","Select id, name from $prefix"._thanhphan_giadinh."",$ct[thanhphan_giadinh],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
								<tr><td>TP.Bản thân</td><td colspan=3>'.SelectBox("thanhphan_xahoi","Select id, name from $prefix"._thanhphan_xahoi."",$ct[thanhphan_xahoi],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
								<tr><td>Ngày nhập ngũ</td><td><INPUT TYPE="text" NAME="ngaynhapngu" style="width:80%" value="'.$ct[ngaynhapngu].'" ></td><td>Danh hiệu được phong tặng cao nhất:</td><td><input type="text" name="danhhieu" value="'.$ct[danhhieu].'" ></td></tr>
								<tr><td>Là thương binh hạng</td><td><INPUT TYPE="text" NAME="thuongbinh" style="width:80%" value="'.$ct[thuongbinh].'"></td><td>Là con gia đình chính sách :</td><td><input type="text" name="conchinhsach"  value="'.$ct[conchinhsach].'" ></td></tr>

							</table>
							 </fieldset>';
			echo'	
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>';
		echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_KhenthuongKyluat&id='.$id.'\'" /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		</form>	
		';
	echo'
	<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
	</iframe>';
echo '</div>';
navJob($id,"Cmd_TPChinhtri");
	include("footer.php");
}
//============================================================
function View_Salary($id){
	include("header.php");
	global $prefix,$eid;
$eid = $id;
$luongtoithieu_nn = Getname("luongtoithieu","$prefix"._luong_config."","1");
$luongtoithieu_dn = Getname("luongtoithieu_dn","$prefix"._luong_config."","1");

IF($id){
	$resedit = mysql_query("Select * from $prefix"._nhanvien_luonggoc." where id_nhanvien  = '$eid' ");
	$luong = mysql_fetch_array($resedit);

	$tongpc = $luong[hsluong_nn]+$luong[pccv_nn];
	$luongtoithieunn = str_replace(".", "",$luong[luongtoithieu_nn]);
	$luongtoithieudn = str_replace(".", "",$luong[luongtoithieu_dn]);
	
	$hidden = '<input type="hidden" name="eid" value="'.$eid.'">';
	$thanhtien_ndcp = FormatCurrency(($luong[hsluong_nn]+$luong[pc_chucvu])*$luongtoithieu_nn);
	if($luongtoithieunn) $luongtoithieu_nn = $luongtoithieunn;
	if($luongtoithieudn) $luongtoithieu_dn = $luongtoithieudn;

}ELSE{
	$tongpc =1;
}
	$res_bh = mysql_query("select bhxh_nhanvien , bhyt_nhanvien ,bhtn_nhanvien  from $prefix"._baohiem."");
	list($bhxh_nhanvien , $bhyt_nhanvien ,$bhtn_nhanvien)=mysql_fetch_row($res_bh);
	
	$luongNN = str_replace(".", "",$luongtoithieu_nn);

	$BHXH = round(($tongpc* $luongNN )*($bhxh_nhanvien/100));
	$BHYT = round(($tongpc* $luongNN )*($bhyt_nhanvien/100));
	$BHTN = round(($tongpc* $luongNN )*($bhtn_nhanvien/100));
	$BHNV = $BHXH+$BHYT+$BHTN;




$resnv = mysql_query("Select first_name, last_name,anh_canhan ,id_employee,id_chinhanh,nhanvien_type,bophan_id  from $prefix"._nhanvien." where id='$eid' ");
list($first_name, $last_name,$anh_canhan ,$id_employee,$id_chinhanh,$nhanvien_type,$bophan_id)=mysql_fetch_row($resnv);
$phongban = Getname("name","$prefix"._chinhanh."","id='$id_chinhanh'");
$chucvu = Getname("name","$prefix"._chucvu."","id='$nhanvien_type'");
$lanhdao = Getname("description","$prefix"._chucvu."","id='$nhanvien_type'");


echo '<form name="demoform" method=POST action="admin.php?op=Insert_Hoso_LuongGoc">';		
echo '<input type="hidden" name="nhanvien_id" value="'.$id.'">';
echo '<input type="hidden" name="bophan_id" value="'.$bophan_id.'">';
echo '<input type="hidden" name="chinhanh_id" value="'.$id_chinhanh.'">';
echo '<input type="hidden" name="lanhdao" value="'.$lanhdao.'">';
echo '<input type="hidden" name="chucvu_id" value="'.$nhanvien_type.'">';

echo $hidden;
echo '<div style="float:left;width:80%">';
echo'
    <div class="folder">
        <div class="folder-title"><div style="float:left">HỒ SƠ LƯƠNG : '.$first_name.' '.$last_name.' </div></div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->
					<div style="float:left;width:70%">
						<fieldset>
							<table width=100% cellpadding=1 cellspacing=1>
								<tr><td width=20% height=29><label class=legend>Nhân viên:</label> </td><td><div style=\'float:left;\'><INPUT TYPE="text" NAME="code" size=15 value="'.$id_employee.'"><INPUT TYPE="text" NAME="nhanvien" id="nhanvien" style="width:200px" value="'.$first_name.' '.$last_name.'"></div></td></tr>
								<tr><td>Phòng ban:</td><td><INPUT TYPE="text" NAME="bp"  style="width:99%" value="'.$phongban.'"></td></tr>
								<tr><td>Chức vụ:</td><td><INPUT TYPE="text" NAME="cv"  style="width:99%" value="'.$chucvu.'"></td></tr>
							</table>
						</fieldset>
					</div>
					<div style="float:left;width:10px;"></div>
					<div style="float:left;width:28%">
							<div id="avatar">';
						if($anh_canhan && file_exists($anh_canhan)){
							echo '<img src="'.$anh_canhan.'" width=80 height=90 style="border: 1px solid #c0c0c0;padding:2px;">';
						}else{
							echo'<img src="images/noimage.png" height=90 name="img_name">';
						}
							
							echo'</div>
					</div>
			</div>';
echo ' <div style="clear:both"></div>';
echo'<div id="dhtmlgoodies_tabView1">';
	echo'<div class="dhtmlgoodies_aTab">';
				echo '<div style="float:left;width:50%">';
						echo '<fieldset><legend class=legend>Lương</legend>
								<table width=100% border=0>
									<tr>

										<td>Bậc lương ( Hệ số lương) :</td>
										<td>'.SelectBox("bacluong","Select id, name from $prefix"._bacluong ."",$luong[id_hsluong],$onchange='',$style='width:120px;',$onclick='',$other='',$title=_SELECTONE).'</td>
										<td></td>
										<td></td>
									</tr>
									<tr>
										<td>Lương cơ bản: </td>
										<td colspan=2><INPUT TYPE="text" NAME="luongtoithieu_dn" size=25 value="'.FormatCurrency($luongtoithieu_dn).'"  onkeypress=maskMoney_New(this.value,demoform,this.name) onkeyup="Thanhtien1()"> </td>										
									</tr>
									
									<tr>
										<td>Ngày bắt đầu hưởng lương: </td>
										<td  colspan=2><INPUT TYPE="text" NAME="thoigian_huongluong" size=25 value="'.$luong[thoigian_huongluong].'"></td>
									</tr>
									
								</table>
							 </fieldset>';
				echo '</div>';
				



				echo '<div style="float:left;width:50%">';
						echo '<fieldset><legend class=legend>BH nhân viên đóng</legend>
								<table width=100%>
									<tr>
										<td>% BHXH</td>
										<td><INPUT TYPE="text" NAME="bhxh_nhanvien" size=5 value="'.$bhxh_nhanvien.'"></td>
										<td>Tiền BHXH</td>
										<td><INPUT TYPE="text" NAME="tien_bhxh" size=20 value="'.FormatCurrency($BHXH).'"></td>
									</tr>
									<tr>
										<td>% BHYT</td>
										<td><INPUT TYPE="text" NAME="bhyt_nhanvien" size=5 value="'.$bhyt_nhanvien.'"></td>
										<td>Tiền BHYT</td>
										<td><INPUT TYPE="text" NAME="tien_bhyt" size=20  value="'.FormatCurrency($BHYT).'"></td>
									</tr>
									<tr>
										<td>% BHTN</td>
										<td><INPUT TYPE="text" NAME="bhtn_nhanvien" size=5 value="'.$bhtn_nhanvien.'"></td>
										<td>Tiền BHTN</td>
										<td><INPUT TYPE="text" NAME="tien_bhtn" size=20  value="'.FormatCurrency($BHTN).'"></td>
									</tr>
									<tr>
										<td colspan=3>Tổng khoản nhân viên đóng</td>
										<td><INPUT TYPE="text" NAME="baohiem_nv" size=20 value="'.FormatCurrency($BHNV).'"></td>
									</tr>
								</table>
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:100%">';
										echo '<fieldset><legend class=legend>Các khoản phụ cấp</legend>
										<ul class="checklist" style="overflow: auto;height:80px;background:#fff;">';
											$respc=mysql_query("Select id, name from $prefix"._phucap." ");
											while(list($pc_id,$pc)=mysql_fetch_row($respc)){
												$res1 = mysql_query("Select giatri,phucap_id from $prefix"._nhanvien_phucap." where nhanvien_id = '$id' and phucap_id='$pc_id' ");
												list($giatri,$phucap_id)=mysql_fetch_row($res1);
												echo'<li>
														<div style="width:150px;float:left;padding:3px;">'.$pc.'</div> <div style="padding:3px;float:left;"><INPUT TYPE="text" NAME="phucap[]" size=25 value="'.FormatCurrency($giatri).'" onkeypress=maskMoney_New(this.value,main,this.name)  ></div><div style="padding:5px;"><INPUT TYPE="checkbox" NAME="phucap_id[]" value="'.$pc_id.'" '.($pc_id == $phucap_id? "checked" : "").'></div>
													</li>';
											}
  										echo '</ul></fieldset>';
				echo '</div>';
			

	echo'</div>';
		echo'<div class="dhtmlgoodies_aTab">';
			$res = mysql_query("Select * from $prefix"._bangluong." where id_nhanvien = '$eid' ");
			$row = mysql_fetch_array($res);
		echo '</div>';
echo'</div> <div style="clear:both"></div>';
echo'
	
			<div class="rc_navigation" style="float:left;padding-left:10px;padding-top:6px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="Cập nhật" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	 <div style="clear:both"></div>
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>
	</form>';
		echo'	
		</div>		
	</div>';
	
echo '</div>';
navJob($id,"Cmd_Salary");

?>
	<script type="text/javascript">
	UserWidth = window.screen.width - 530 ;
	initTabs('dhtmlgoodies_tabView1',Array('Thông tin chi tiết lương','Diễn biến lương'),0,UserWidth,280);
		function SearchUser(){
			displayMessage('admin.php?op=TimHSNhansu',500,400);
		}	
			function formatCurrency(num) {
				num = num.toString().replace(/\$|\,/g,'');
				if(isNaN(num))
				num = "0";
				sign = (num == (num = Math.abs(num)));
				num = Math.floor(num*100+0.50000000001);
				cents = num%100;
				num = Math.floor(num/100).toString();
				if(cents<10)
				cents = "0" + cents;
				for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
				num = num.substring(0,num.length-(4*i+3))+'.'+
				num.substring(num.length-(4*i+3));
				return (((sign)?'':'-') + '' + num );
			}
			function replaceAll(strText){			
				var strReplaceAll = strText;
				var intIndexOfMatch = strReplaceAll.indexOf( "." );
				// Loop over the string value replacing out each matching
				// substring.
				while (intIndexOfMatch != -1){
				// Relace out the current instance.
					strReplaceAll = strReplaceAll.replace( ".", "" )
				// Get the index of any next matching substring.
					intIndexOfMatch = strReplaceAll.indexOf( "." );
				}			 
				return strReplaceAll;
			}
		function Thanhtien1(){
			pc_chucvu = document.demoform.pc_chucvu.value;
			hsluong_nn = document.demoform.hsluong_nn.value;
	
			luongtoithieu = Math.floor(replaceAll(document.demoform.luongtoithieu_nn.value));

			thanhtien1 = luongtoithieu*hsluong_nn;
			thanhtien2 = luongtoithieu*pc_chucvu;
			thanhtien = thanhtien1+thanhtien2;
			document.demoform.thanhtien_ndcp.value = formatCurrency(thanhtien);

			bhxh_nhanvien = document.demoform.bhxh_nhanvien.value;
			bhxh = luongtoithieu*(bhxh_nhanvien/100);
			document.demoform.tien_bhxh.value = formatCurrency(bhxh);

			bhyt_nhanvien = document.demoform.bhyt_nhanvien.value;
			bhyt = luongtoithieu*(bhyt_nhanvien/100);
			document.demoform.tien_bhyt.value = formatCurrency(bhyt);

			bhtn_nhanvien = document.demoform.bhtn_nhanvien.value;
			bhtn = luongtoithieu*(bhtn_nhanvien/100);
			tongbh = bhxh+bhyt+bhtn;
			document.demoform.tien_bhtn.value = formatCurrency(bhtn);
			document.demoform.baohiem_nv.value = formatCurrency(tongbh);

			
		}
		function Thanhtien2(){
			hs_htcn = document.demoform.hs_htcn.value;
			hsluong_dn = document.demoform.hsluong_dn.value;

			luongcobandn = Math.floor(replaceAll(document.demoform.luongcoban_dn.value));
			tonghs = hs_htcn*hsluong_dn;

			thanhtien1 = luongcobandn*tonghs;
			document.demoform.thanhtien_luongdn.value = formatCurrency(thanhtien1);
		}
	</script>
<?

	include("footer.php");
}
//============================================================
function View_Salary_Customize($id){
	include("header.php");
	global $prefix;
if(!$id) $id = $_POST[id];
	$sql = "select * from $prefix"._nhanvien_hopdong." 
			where (id_nhanvien='$id')";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);

echo '<div style="float:left;width:80%">';
	echo'
    <div class="folder">
        <div class="folder-title">THÔNG TIN HỒ SƠ LƯƠNG GỐC THEO DOANH NGHIỆP : '.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%; float:left"><!--begin left option-->';
	       ?>
		<form name="demoform" method="post" action="admin.php?op=Insert_Luong_Customize">
		<input type="hidden" name="id_bacluong" value="<?echo $myrow[id_bacluong]?>">
		<input type=hidden name="nhanvien_id" value="<?echo $id;?>">
		<fieldset>
			<table border='0' cellspacing='0' cellpadding='2' align="center" width=100%>
		 	  <tr>
				<td width='20%'>&nbsp;Bộ phận</td>
				<td colspan="2">
				  <select name="BoPhan" disabled style="width:90%">
					<?
					$result_cn = mysql_query("select id_chinhanh from $prefix"._nhanvien." where id='$id'");
					list($cnid) = mysql_fetch_row($result_cn);

						$result = mysql_query("select id, name from $prefix"._chinhanh." order by name");
							while(list($chinhanh_id, $chinhanh_name) = mysql_fetch_row($result) ){
								if($chinhanh_id == $cnid) {
									$selected =  "selected";
									$chinhanh = $chinhanh_id;
								}else{
									$selected =  "";
								}
								echo "<option value=\"$chinhanh_id\" $selected>$chinhanh_name  $bophan_name</option>\n";
							}
					?>
					</select>					
				</td>
			  </tr>
					  <tr>						
						<td nowrap>&nbsp;Chức vụ &nbsp;</td>
						<td><input type='hidden' name='KieuNV_new' value="" maxlength='255'>
							<select name=KieuNV disabled style="width:90%">
								<option value=""></option>
							<?
								$result = mysql_query("select id, name from $prefix"._chucvu." order by name"); 
								$arrKieuNV = array();
								while(list($type_id, $type_name) = mysql_fetch_row($result) ){
									array_push($arrKieuNV, $type_id);

									$selected=($myrow[id_nhanvien_type]==$type_id) ? "selected":"";
									echo "<option value=\"$type_id\" $selected> ".$type_name."</option>\n";
								}
							?>
							</select>
				
						</td>
					  </tr>
	
					  <tr>				
						<td nowrap>&nbsp;Kiểu HĐ</td>
						<td><input type='hidden' name='KieuHD_new' value="" maxlength='255'>
							<select name="KieuHD" disabled style="width:90%">
								<option value=""></option>
							<?	
								$result = mysql_query("select id, name,hieu_luc,hieuluc_type from $prefix"._hopdong_type." order by name");
								while(list($type_id, $type_name,$hl,$hl_type) = mysql_fetch_row($result) ){
									$selected = ($myrow[hopdong_type_id]==$type_id) ? "selected":"";
									if($hl){
										echo "<option value=\"$type_id\" $selected>$type_name-$hl&nbsp;$hl_type</option>\n";
									}
									else{
										echo "<option value=\"$type_id\" $selected>$type_name</option>\n";
									}
									
								}
							?>
							</select>
						</td>
					  </tr>
				 <tr>
					<td nowrap>&nbsp;Bậc lương</td>
					<td>
						<select name="Bacluong" disabled>
							<option value=""></option>
					<?
							$sql = "select id_bacluong, name from $prefix"._bacluong."
									where id_nhanvien_type='$myrow[id_nhanvien_type]' ";
							$result = mysql_query($sql);
							while( list($id_bacluong, $bacluong) = mysql_fetch_row($result) ){
								$selected=($myrow[id_bacluong] == $id_bacluong)? "selected":"";
								echo "<option value=\"$id_bacluong\" $selected>$bacluong</option>\n";
							}
					?>
						</select>
					</td>
				  </tr>		
				  </table>
				  </fieldset>
		<div style="float:left;width:50%">
		<fieldset>
			<table border='0' cellspacing='2' cellpadding='2' align="center" width=100%>
				 <tr>
					<td width=30%>&nbsp;Mức lương cơ bản</td>
					<td><INPUT TYPE="text" NAME="luongcoban" onkeypress="maskMoney_New(this.value,demoform,this.name)"  value="1.100.000" style="width:90%" >
					</td>
				  </tr>	
				 <tr>
					<td >&nbsp;Hệ số lương</td>
					<td><INPUT TYPE="text" NAME="hesoluong" style="width:90%">
					</td>
				  </tr>	
				 <tr>
					<td nowrap>&nbsp;Mốc nâng lương</td>
					<td><INPUT TYPE="text" NAME="mocnangluong" style="width:39%">
						<select name="dv">
							<option value="Tháng">Tháng</option>
							<option value="Năm">Năm</option>
						</select>
					</td>
				  </tr>	
				  <tr>						
					<td nowrap>&nbsp;Ngày hiệu lực</td> 
					<td nowrap><input type='text' name='ngayhieuluc' value="<?= $myrow[ngay_tinh_tham_nien] ?>" maxlength='255' size='12'><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngayhieuluc);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>
				  </tr>		
			</table>
			</fieldset>
		</div>
		<div style="float:left;width:10px;"></div>
		<div style="float:left;width:48%">
			<fieldset>Ghi chú
					<TEXTAREA NAME="note" style="width:90%;height:105px;"><?= $myrow[phu_cap] ?></TEXTAREA>
			</fieldset>	
		</div>
		<div style="clear:both"></div>
		
		 <?
  			echo'	
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>';
		echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:1px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_Baohiem&id='.$id.'\'" /></div>
					</div>
		</div>	
		</form>	
		';
		$sql = "select * 
				from $prefix"._nhanvien_luong_customize." 
				where id_nhanvien='$id'
				order by ngayhieuluc";
		$result = mysql_query($sql);

		echo'
<div style="clear:both"></div>
<div class=title style="padding-left:10px;"> &#187; DIỄN BIẾN LƯƠNG</div>
<div  style="padding-left:10px;padding-top:0px;height:140px;">
		<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD></TD>
				<TD>TT</TD>
				<TD>Vị trí công việc</TD>
				<TD>Bậc lương</TD>
				<TD>Lương cơ bản</TD>
				<TD>Hệ số lương</TD>
				<TD>Mốc nâng lương</TD>
				<TD>Ngày có hiệu lực</TD>
				<TD>Ngày nâng lương</TD>

		  </TR>
		 </THEAD>
		  <TBODY  >';
				$counter = 0;			
				$stt=1;
				$i=0;
		 while($myrow = mysql_fetch_array($result) ){
				
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;	
			$res = mysql_query("Select id_nhanvien_type,id_chucvu from $prefix"._nhanvien_hopdong . " where id_nhanvien = '$id' ");
			list($id_nhanvien_type,$id_chucvu)=mysql_fetch_row($res);

			if($myrow[ngayhieuluc]){
				$ngayhieuluc = $myrow[ngayhieuluc];
				$ngaynangluong=(2592000*$myrow[mocnangluong])+$myrow[ngayhieuluc ];
				$ngaynangluong=strftime( _DATESTRING, $ngaynangluong);
				$ngayhieuluc= strftime( _DATESTRING, $ngayhieuluc);
			}else{	 
				$ngayhieuluc = 'Không xác định';
				$ngaynangluong='Không xác định';
			}

			
	


		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9'); \">";	
			echo'<TD align=center><a href="admin.php?op=Delete_Salary_Customize&sid='.$myrow[id].'&id='.$id.'"><img src="images/admin/delete.gif" border=0></a>&nbsp;<a href="admin.php?op=View_Salary&id='.$id.'&eid='.$myrow[id].'"><img src="images/admin/edit.gif"  border=0></a></TD>';
			echo'<TD >'.$stt.'</TD>';
			echo'<TD >'.Getname("name","$prefix"._chucvu."","id='".$id_nhanvien_type."'").'</TD>';
			echo'<TD align=center>'.Getname("name","$prefix"._bacluong."","id_bacluong='".$myrow[id_bacluong]."'").'</TD>';
			echo '<TD align=right>'.FormatCurrency($myrow[luongcoban]).'</TD>';
			echo '<TD align=center>'.$myrow[hesoluong].'</TD>';
			echo '<TD align=center>'.$myrow[mocnangluong].' '.$myrow[donvi].'</TD>';
			echo '<TD  align=center>'.$ngayhieuluc.'</TD>';
			echo'<TD align=center>'.$ngaynangluong.'</TD>';

			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></div></form>';
echo '</div>';
navJob($id,"Cmd_Salary");
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 470 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
	include("footer.php");
}
//=============================================================
function Delete_Salary($sid,$id){
	global $prefix;
	mysql_query("Delete  from $prefix"._nhanvien_luong." where id='$sid' and id_nhanvien='$id' ");
	Header("Location: admin.php?op=View_Salary&id=$id");

}
function Delete_Salary_Customize($sid,$id){
	mysql_query("Delete  from $prefix"._nhanvien_luong_customize." where id='$sid' and id_nhanvien='$id' ");
	Header("Location: admin.php?op=View_Salary_Customize&id=$id");
}
//============================================================
function View_KhenthuongKyluat($id){
	include("header.php");
	global $prefix,$editid;
echo '<div style="float:left;width:80%">';


	echo'
    <div class="folder">
        <div class="folder-title">KHEN THƯỞNG && KỶ LUẬT : '.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->';
           echo '<form name="demoform" method=POST action="admin.php?op=Insert_KhenthuongKyluat">';
		   echo '<INPUT TYPE="hidden" NAME="id" value="'.$id.'">';
		   if($editid){
			   $res = mysql_query("Select * from $prefix"._nhanvien_khenthuong_kyluat." where id = '$editid' ");
			   $info = mysql_fetch_array($res);
			   if($info[ngayky]) $ngayky = strftime( _DATESTRING3, $info[ngayky]);
			   if($info[ngayhieuluc]) $ngayhieuluc = strftime( _DATESTRING3, $info[ngayhieuluc]);
				echo  '<INPUT TYPE="hidden" NAME="editid" value="'.$editid.'">';
		   }
				echo '<div style="float:left;width:50%">';
						echo '<fieldset>
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=30%>Số quyết định</td><td><INPUT TYPE="text" NAME="soquyetdinh" style="width:90%" value="'.$info[soquyetdinh].'"></td></tr>
								<tr><td>Loại quyết định</td><td>
										<select NAME="hinhthuc" style="width:90%">
											<option value="1" '.($info[hinhthuc]==1 ? "selected" : "").'>Khen thưởng</option>
											<option value="0" '.($info[hinhthuc]==0 ? "selected" : "").'>Kỷ luật</option>
										</select>
									</td></tr>								
							</table>
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:48%;padding-left:10px;">';
						echo '<fieldset >';
									echo'
									<table width=100% cellpadding=2 cellspacing=2>
										<tr><td width=25%>Số tiền: </td><td><INPUT TYPE="text" NAME="sotien" style="width:90%" value="'.$info[sotien].'"></td></tr>
										<tr><td>Đơn vị tiền tệ:</td><td><INPUT TYPE="text" NAME="dvtien" style="width:90%" value="'.$info[dvtien].'"></td></tr>
									</table>									
							 </fieldset>';
				echo '</div> <div style="clear:both"></div>';



				echo '<div style="float:left;width:50%">';
						echo '<fieldset  style="padding:5px;">';
									echo'
									<table width=100% cellpadding=2 cellspacing=2>
										<tr><td width=35%>Ngày kí: </td><td><INPUT TYPE="text" NAME="ngayky" style="width:80%" value="'.$ngayky.'"> <a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngayky);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
										<tr><td>Ngày có hiệu lực:</td><td><INPUT TYPE="text" NAME="ngayhieuluc" style="width:80%" value="'.$ngayhieuluc.'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngayhieuluc);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
										<tr><td>Người kí quyết định:</td><td><INPUT TYPE="text" NAME="nguoiky" style="width:90%" value="'.$info[nguoiky].'"></td></tr>
									</table>									
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:48%;padding-left:10px;">';
					echo '<fieldset><legend>Ghi chú</legend>
							<TEXTAREA NAME="note" style="width:90%;height:78px;">'.$info[note].'</TEXTAREA>
					</fieldset>';
				echo '</div> <div style="clear:both"></div>';

			echo'	
		<div class="rc_navigation" style="padding-left:200px;padding-top:5px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div></form>	';


			$sql= "SELECT id,hinhthuc,soquyetdinh,ngayquyetdinh,ngayhieuluc,sotien,dvtien,ngayky						 
				   FROM $prefix"._nhanvien_khenthuong_kyluat." WHERE nhanvien_id='$id' 
				   ORDER BY lastupdate";
	
			$i=1;
			$res=mysql_query($sql);
			
		echo'
<div  style="padding-left:10px;padding-top:0px;height:145px;">
		<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
				<TD></TD>
				<TD>TT</TD>
				<TD>Loại quyết định</TD>
				<TD>Số quyết định</TD>
				<TD>Ngày kí </TD>
				<TD>Ngày có hiệu lực  </TD>
				<TD>Số tiền</TD>
		  </TR>
		 </THEAD>
		  <TBODY  >';
				$counter = 0;			
				$stt=1;
				$i=0;
			while(list($eid,$hinhthuc,$soquyetdinh,$ngayquyetdinh,$ngayhieuluc,$sotien,$dvtien,$ngayky	)=mysql_fetch_row($res)){
				
					if($counter % 2 == 0){
						$tblColor = "tblColor1";
						$colorTD = "#ffffff";
					}else{
						$tblColor = "tblColor2";
						$colorTD = "#f4f4f4";
					}
					$counter++; global $bgcolor3;	
		  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'red', '#fef7e9');window.location='admin.php?op=View_KhenthuongKyluat&id=".$id."&editid=".$eid."' \">";	
			echo'<TD ><a href="admin.php?op=Delete_KhenthuongKyluat&id='.$id.'&eid='.$eid.'"><img src="images/admin/deleted.png" border=0 alt="Delete"></a>&nbsp; <a href="admin.php?op=View_KhenthuongKyluat&id='.$id.'&editid='.$eid.'"><img src="images/admin/edit.gif" border=0 alt="Edit"></a></TD>';
			echo'<TD >'.$stt.'</TD>';
			echo'<TD align=center>'.($hinhthuc == 1 ?  "Khen thưởng" : "Kỉ luật").' </TD>';
			echo'<TD align=center>'.$soquyetdinh.'</TD>';
			echo '<TD >'.strftime( _DATESTRING3, $ngayky).'</TD>';
			echo '<TD >'.strftime( _DATESTRING3, $ngayhieuluc).'</TD>';
			echo '<TD >'.$sotien.' '.$dvtien.'</TD>';
			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></div>';
	
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
echo '</div>';
navJob($id,"Cmd_KhenthuongKyluat");
	include("footer.php");

?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 480 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
}
///===========================================================
function Check_Skill($table,$id,$language_skill_id){
	global $prefix;
	$res = mysql_query("Select skill_id from $prefix"._nhanvien_.$table ." where nhanvien_id = '$id' and skill_id  = '$language_skill_id' ");
	if(mysql_num_rows($res)) return 'selected';
	else return '';
}
//============================================================
function View_Skill($id){
	include("header.php");
	global $prefix,$editid;
echo '<div style="float:left;width:80%">';

	echo'
    <div class="folder">
        <div class="folder-title"> KỸ NĂNG CỦA: '.Getname("first_name","$prefix"._nhanvien."","  id = '$id' ").' '.Getname("last_name","$prefix"._nhanvien."","  id = '$id' ").' </div>
        <div class="folder-content" id="list_option">
            <div style="width:100%"><!--begin left option-->';
			
             ?>
	<form name="demoform" method="post" action="admin.php?op=Insert_Skill">
		<input type="hidden" name="id" value="<?echo $id ?>">	  	
		<?echo$hidden?>		
		<div style="float:left;width:33%">
		<fieldset><legend>Trình Độ Ngoại Ngữ </legend>
			<?
				 for($i=1;$i<=10;$i++){
					 $res_language = mysql_query("Select skill_id,skill_level from $prefix"._nhanvien_skill_language ." where nhanvien_id = '$id' and stt = '$i' ");
					 list($language_skill_id,$language_skill_leve)=mysql_fetch_row($res_language);
					 if($language_skill_id) $bk = 'background:#FFCCFF';
					 else $bk = 'background:#fff';
					 echo '<div style="padding-top:5px;padding-bottom:5px;'.$bk.'">';
						echo SelectBox("skill_language[]","Select id, name from $prefix"._skills_language."",$language_skill_id,$onchange='',$style='width:70%',$onclick='',$other='',$title=_SELECTONE);
						echo '<INPUT TYPE="text" NAME="skill_language_level[]" size=4 value="'.$language_skill_leve.'">';
					echo '</div>';

				 }
			?>
		</fieldset>			
		</div>
		<div style="float:left;width:33%">
		<fieldset><legend>Kỹ năng vi tính</legend>
			<?
				 for($i=1;$i<=10;$i++){
					 $res_language = mysql_query("Select skill_id,skill_level from $prefix"._nhanvien_skill_computer  ." where nhanvien_id = '$id' and stt = '$i' ");
					 list($computer_skill_id,$computer_skill_level)=mysql_fetch_row($res_language);
					 if($computer_skill_id) $bk = 'background:#CCFFCC';
					 else $bk = 'background:#fff';

					 echo '<div style="padding-top:5px;padding-bottom:5px;'.$bk.'">';
						echo SelectBox("skill_computer[]","Select id, name from $prefix"._skills_computer."",$computer_skill_id,$onchange='',$style='width:70%',$onclick='',$other='',$title=_SELECTONE);
						echo '<INPUT TYPE="text" NAME="skill_computer_level[]" size=4 value="'.$computer_skill_level.'">';
					echo '</div>';
				 }
			?>
		</fieldset>			
		</div>
		<div style="float:left;width:33%">
		<fieldset><legend>Kỹ năng mềm</legend>
			<?
				 for($i=1;$i<=10;$i++){
					 $res_language = mysql_query("Select skill_id from $prefix"._nhanvien_skill  ." where nhanvien_id = '$id' and stt = '$i' ");
					 list($skill_id)=mysql_fetch_row($res_language);
					 if($skill_id) $bk = 'background:#FFFF99';
					 else $bk = 'background:#fff';

					 echo '<div style="padding-top:5px;padding-bottom:5px;'.$bk.'">';
					echo '<div style="padding-top:2px;">'.SelectBox("skill_other[]","Select id, name from $prefix"._skills."",$skill_id,$onchange='',$style='width:90%;',$onclick='',$other='',$title=_SELECTONE).'</div>';
					echo '</div>';

				 }
			?>
		</fieldset>			
		</div>
				
		     <?

			echo'	
		<div style="clear:both"></div>
		<div class="rc_navigation" style="padding-left:200px;padding-top:10px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\'admin.php?op=View_Move&id='.$id.'\'" /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div></form>	';


		
echo '</div>';
navJob($id,"Cmd_Skill");

	include("footer.php");
}
//=============================================================
function Employee_AddNew($id){
include("header.php");
global $aid;
?>

<script language="javascript">
//var hide_empty_list=true; //uncomment this line to hide empty selection lists
var disable_empty_list=true; //uncomment this line to disable empty selection lists
addListGroup("SchoolAdmin", "car-makers");
addOption("car-makers", "---- Phòng ban -----", "", "", 1); //Empty starter option
<?
	$res1 = mysql_query("Select id, name from $prefix"._chinhanh." order by sort_order");	
	while(list($country_id,$country)=mysql_fetch_row($res1)){
		echo 'addList("car-makers", "'.$country.'", "'.$country_id.'", "'.$country.'");';
		$res_region = mysql_query("Select id, name from $prefix"._bophan." where  id_chinhanh= '$country_id' and parent_id='0' order by sort_order");

		echo 'addOption("'.$country.'", "--- Bộ phận ---", "", "", 1);'; ////Empty starter option
		while(list($region_id,$region)=mysql_fetch_row($res_region)){
			echo 'addList("'.$country.'", "'.$region.'", "'.$region_id.'", "'.$region.'");';


			$res_city = mysql_query("Select id, name from $prefix"._bophan." where  parent_id = '$region_id' order by sort_order");
			echo 'addOption("'.$region.'", "--- Tổ nhóm ---", "");';
			while(list($city_id,$city)=mysql_fetch_row($res_city)){
				echo 'addOption("'.$region.'", "'.$city.'", "'.$city_id.'");';
			}

		}
	}
?>
</script>
</head>
<script>
					function CheckForm(){
						  var error = 0;
						  var error_message = "Vui lòng điền thông tin vào các trường thông tin bắt buộc :\n\n";
						  var hodem = document.demoform.hodem.value; 
						  var ten = document.demoform.ten.value;   
					      var birthday = document.demoform.birthday.value;   
					      var noisinh = document.demoform.noisinh.value;   
					      var nguyenquan = document.demoform.nguyenquan.value;   
					      var loainhanvien = document.demoform.loainhanvien.value;   
					      var dantoc = document.demoform.dantoc.value;   
					      var tongiao = document.demoform.tongiao.value;   
					      var quoctich = document.demoform.quoctich.value;   
					      var gender = document.demoform.gender.value;   
					      var marital_status = document.demoform.marital_status.value;   
					      var ngayvaolam = document.demoform.ngayvaolam.value;   
					      var cmnd = document.demoform.cmnd.value;   
					      var cmnd_ngaycap = document.demoform.cmnd_ngaycap.value;   
					      var cmnd_noicap = document.demoform.cmnd_noicap.value;   

					      var Hokhau = document.demoform.Hokhau.value;   
					      var DiachiNR = document.demoform.DiachiNR.value;   
					      var DienthoaiNR = document.demoform.DienthoaiNR.value;   
						
							
							
							
						  if (hodem == "" ) {
							  error_message = error_message + "- Ho đệm chưa điền thông tin \n";
							  error = 1;
						  }

						  if (ten == "" ) {
							  error_message = error_message + "- Tên chưa điền thông tin \n";
							  error = 1;
						  }

						  if (birthday == "" ) {
							  error_message = error_message + "- Ngày sinh chưa điền thông tin \n";
							  error = 1;
						  }						
						  if (noisinh == "" ) {
							  error_message = error_message + "- Nơi sinh chưa điền thông tin \n";
							  error = 1;
						  }				
						  if (nguyenquan == "" ) {
							  error_message = error_message + "- Nguyên quán chưa điền thông tin \n";
							  error = 1;
						  }		
						  if (loainhanvien == "" ) {
							  error_message = error_message + "- Loại nhân viên chưa điền thông tin \n";
							  error = 1;
						  }			
						  if (dantoc == "" ) {
							  error_message = error_message + "- Dân tộc chưa điền thông tin \n";
							  error = 1;
						  }								  
						  if (tongiao == "" ) {
							  error_message = error_message + "- Tôn giáo chưa điền thông tin \n";
							  error = 1;
						  }
						  if (quoctich == "" ) {
							  error_message = error_message + "- Quốc tịch chưa điền thông tin \n";
							  error = 1;
						  }
						  if (gender == "" ) {
							  error_message = error_message + "- Giới tính chưa điền thông tin \n";
							  error = 1;
						  }
						  if (marital_status == "" ) {
							  error_message = error_message + "- Tình trạng hôn nhân chưa điền thông tin \n";
							  error = 1;
						  }
						  if (ngayvaolam == "" ) {
							  error_message = error_message + "- Ngày vào làm chưa điền thông tin \n";
							  error = 1;
						  }
						  if (cmnd == "" ) {
							  error_message = error_message + "- CMND chưa điền thông tin \n";
							  error = 1;
						  }
						  if (cmnd_ngaycap == "" ) {
							  error_message = error_message + "- Ngày cấp CMND chưa điền thông tin \n";
							  error = 1;
						  }
						  if (cmnd_noicap == "" ) {
							  error_message = error_message + "- Nơi cấp CMND chưa điền thông tin \n";
							  error = 1;
						  }
						  if (Hokhau == "" ) {
							  error_message = error_message + "- Hộ khẩu thường trú chưa điền thông tin \n";
							  error = 1;
						  }
						  if (DiachiNR == "" ) {
							  error_message = error_message + "- Nơi ở hiện nay chưa điền thông tin \n";
							  error = 1;
						  }
						  if (DienthoaiNR == "" ) {
							  error_message = error_message + "- Tel NR chưa điền thông tin \n";
							  error = 1;
						  }
						  if (error == 1) {
							alert(error_message);
							return false;
						  } else {
							return true;
						  }
					}


</script>
<?
		global $aid;
		if($aid != 'admin'){
			$id = Getname("id","$prefix"._nhanvien."","id_employee  = '$aid' ");
		}
			$res = mysql_query("SELECT * FROM $prefix"._nhanvien."  WHERE id  = '$id' ");
			$userinfo =mysql_fetch_array($res);
if(!$userinfo[id_employee]) $manhanvien = GenerateId();
else $manhanvien = $userinfo[id_employee];

//if($userinfo[ngayvaolam]>0) $ngayvaolam = strftime( _DATESTRING, $userinfo[ngayvaolam]);
if($userinfo[ngayvaodang]>0) $ngayvaodang = strftime( _DATESTRING, $userinfo[ngayvaodang]);
if($userinfo[ngayvaodoan]>0) $ngayvaodoan = strftime( _DATESTRING, $userinfo[ngayvaodoan]);

 IF($aid !='admin') $check_form = ' onSubmit="return CheckForm();"';
 ELSE $check_form = '';

$select_box = '
<select name="chinhanhid" style="width:160px;"></select>
<select name="bophanid" style="width:160px;"></select><br>
<select name="tonhomid" style="width:160px;"></select>
';

echo '<form name="demoform" method=POST action="admin.php?op=Employee_Insert_Data"  enctype="multipart/form-data" '.$check_form.'>';
echo '

';
echo '<INPUT TYPE="hidden" NAME="manhanvien" value="'.$manhanvien.'">';
echo '<INPUT TYPE="hidden" NAME="nhanvien_id" value="'.$id.'">';

	echo'
	<div class="folder">
        <div class="folder-title">CẬP NHẬT HỒ SƠ NHÂN VIÊN '.$userinfo[first_name].' '.$userinfo[last_name].'</div>
        <div class="folder-content" id="list_option">
            <div style="width:100%;"><!--begin left option-->';

echo '<INPUT TYPE="hidden" NAME="old_id_chinhanh" value="'.$userinfo[id_chinhanh].'">';
echo '<div style="float:left;width:73%">';
		echo '<fieldset>
			<table width=100% cellpadding=2 cellspacing=2>
				<tr><td width=20%>Mã nhân viên</td><td><INPUT TYPE="text" name="manhanvien" disabled  value="'.$manhanvien.'" style="width:80%">
				<a href="#" onclick="SearchEmp();" ><img src="images/contact.png" border=0 alt="Tìm kiếm nhân sự"></a> </td></tr>
				<tr><td>Họ đệm</td><td><INPUT TYPE="text" NAME="hodem" value="'.$userinfo[first_name].'" > &nbsp; Tên: <INPUT TYPE="text" NAME="ten" value="'.$userinfo[last_name].'" >  '._REQUIRED.'</td></tr>
				<tr><td>Ngày sinh</td><td><INPUT TYPE="text" NAME="birthday" value="'.$userinfo[birthday].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.birthday);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>  '._REQUIRED.'</td></tr>
				<tr><td>Nơi sinh</td><td><INPUT TYPE="text" NAME="noisinh" style="width:90%" value="'.$userinfo[noisinh].'">  '._REQUIRED.'</td></tr>
				<tr><td>Nguyên quán</td><td><INPUT TYPE="text" NAME="nguyenquan"  style="width:90%" value="'.$userinfo[nguyenquan].'">  '._REQUIRED.'</td></tr>
				<tr><td>Loại nhân viên</td><td>'.SelectBox("loainhanvien","Select id, name from $prefix"._loainhanvien."",$userinfo[loainhanvien],$onchange='',$style='',$onclick='',$other='',$title=_SELECTONE).'  '._REQUIRED.'</td></tr>
			</table>
			 </fieldset>';
echo '</div>';
echo '<div style="float:left;width:25%;padding-left:2px;">';
		echo '<fieldset>
					<div style="text-align:center;padding-top:5px;">';
			if($userinfo[anh_canhan] && file_exists($userinfo[anh_canhan])){
				echo '<img src="'.$userinfo[anh_canhan].'" width=150 height=155  style="border: 1px solid #c0c0c0;padding:2px;">';
			}else{
				echo'<img src="images/noimg.png" width=150 height=155 >';
			}
		echo'			<br>
					<div style="float:left"><INPUT TYPE="file" NAME="avatar" size=18></div>';
			/*
			if($userinfo[file_att] && file_exists($userinfo[file_att])){
				echo 'File hồ sơ &nbsp;&nbsp;&nbsp;<a href="'.$userinfo[file_att].'" target=_blank><img src="images/admin/page_attach.png" border=0 align=absmiddle></a> &nbsp; ';
				echo '<a href="admin.php?op=Employee_Delete_fileAtt&id='.$id.'">Xóa</a> | <a href="#" onclick="displayMessage(\'admin.php?op=Employee_Change_fileAtt&id='.$id.'\');return false">Thay đổi file</a>';

			}else{			
					echo'	File hồ sơ &nbsp;&nbsp;&nbsp;: <INPUT TYPE="file" NAME="file" size=15>';
			}
			*/
			echo'
					</div>
			 </fieldset>';
echo '</div> <div style="clear:both"></div>';
echo'<div id="dhtmlgoodies_tabView1">';
	echo'<div class="dhtmlgoodies_aTab">';
				echo '<div style="float:left;width:50%;">';
						echo '<fieldset>
							<table width=100% cellpadding=2 cellspacing=2 style="height:180px;">
								<tr><td width=30%>Dân tộc</td><td><INPUT TYPE="text" NAME="dantoc" style="width:90%" value="'.$userinfo[dantoc].'">  '._REQUIRED.'</td></tr>
								<tr><td>Tôn giáo</td><td><INPUT TYPE="text" NAME="tongiao" style="width:90%" value="'.$userinfo[tongiao].'">  '._REQUIRED.'</td></tr>
								<tr><td>Quốc tịch</td><td>'.SelectBox("quoctich","Select id, name from $prefix"._quoctich."",$userinfo[quoctich],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'  '._REQUIRED.'</td></tr>
								<tr><td>Tỉnh/ thành phố</td><td>'.SelectBox("city","Select id, name from $prefix"._city."",$userinfo[city],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'  '._REQUIRED.'</td></tr>

								<tr><td>Giới tính</td><td>
								'.SelectBox("gender","Select id, name from $prefix"._sex."",$userinfo[sex],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).' 
								'._REQUIRED.'
									</td></tr>
								<tr><td>Tình trạng hôn nhân</td><td>
								'.SelectBox("marital_status","Select id, name from $prefix"._marital_status."",$userinfo[marital_status],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).' 
								 '._REQUIRED.'
								</td></tr>

							</table>
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:49%;padding-left:5px;">';
						echo '<fieldset  style="padding:5px;">';
									$chinhanhid = Getname("id_chinhanh","$prefix"._bophan."","id='".$userinfo[bophan_id]."'");
								//	echo select_phongban($userinfo[id_chinhanh],$userinfo[bophan_id]);
									echo'
									<table width=100% cellpadding=2 cellspacing=2>
										<tr><td width=25%>Nơi làm việc: </td><td>'.SelectBox("noilamviec","Select code, name from $prefix"._noilamviec ."",$userinfo[noilamviec],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td></tr>

										<tr><td width=25%>Phòng ban <br>Bộ phận: </td><td>'.$select_box.'</td></tr>


										<tr><td width=25%>Chức vụ: </td><td>'.SelectBox("nhanvien_type","Select id, name from $prefix"._chucvu ."",$userinfo[nhanvien_type],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
										<tr><td>Số CMND:</td><td><INPUT TYPE="text" NAME="cmnd" style="width:20%" value="'.$userinfo[id_card].'"> &nbsp;&nbsp;Ngày cấp : <INPUT TYPE="text" NAME="cmnd_ngaycap" style="width:30%" value="'.$userinfo[date_issue_id_card].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.cmnd_ngaycap);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>  '._REQUIRED.'</td></tr>
										<tr><td>Nơi cấp:</td><td><INPUT TYPE="text" NAME="cmnd_noicap" style="width:90%" value="'.$userinfo[who_issue_id_card].'">  '._REQUIRED.'</td></tr>
										<tr><td>Ngày vào làm:</td><td><INPUT TYPE="text" NAME="ngayvaolam" style="width:35%" value="'.$userinfo[ngayvaolam].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngayvaolam);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a>  '._REQUIRED.'</td></tr>
										
									</table>
									
							 </fieldset>';
				echo '</div> <div style="clear:both"></div>';
	echo'</div>';
	echo'
	<div class="dhtmlgoodies_aTab">';
			$res = mysql_query("SELECT * FROM $prefix"._nhanvien_suckhoe ."  WHERE nhanvien_id  = '$id' ");
			$suckhoeinfo =mysql_fetch_array($res);
			if($suckhoeinfo[ngaykham]>0) $ngaykham = strftime( _DATESTRING, $suckhoeinfo[ngaykham]);

	echo '<div style="float:left;width:47%">';
					echo '<fieldset>
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=30%>Ngày khám</td><td><INPUT TYPE="text" NAME="ngaykham" style="width:80%" value="'.$ngaykham.'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngaykham);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
								<tr><td >Chiều cao</td><td><INPUT TYPE="text" NAME="chieucao" style="width:30%" value="'.$suckhoeinfo[chieucao].'"> &nbsp;Cân nặng  &nbsp;<INPUT TYPE="text" NAME="cannang" style="width:30%" value="'.$suckhoeinfo[cannang].'"></td></tr>
								<tr><td>Nhóm máu</td><td><INPUT TYPE="text" NAME="nhommau" style="width:90%" value="'.$suckhoeinfo[nhommau].'"></td></tr>
								<tr><td>Số con</td><td><INPUT TYPE="text" NAME="socon" style="width:90%" value="'.$suckhoeinfo[socon].'"></td></tr>

							</table>
							 </fieldset>';
	echo '</div>';
	echo '<div style="float:left;width:10px;"></div>';
	echo '<div style="float:left;width:47%">';
					echo '<fieldset>
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=30%>Thị lực</td><td><INPUT TYPE="text" NAME="thiluc" style="width:90%"  value="'.$suckhoeinfo[thiluc].'"></td></tr>
								<tr><td>Dị tật</td><td><INPUT TYPE="text" NAME="ditat" style="width:90%" value="'.$suckhoeinfo[ditat].'"></td></tr>
								<tr><td>Di truyền</td><td><INPUT TYPE="text" NAME="ditruyen" style="width:90%" value="'.$suckhoeinfo[ditruyen].'"></td></tr>
								<tr><td>Dị ứng thuốc</td><td><INPUT TYPE="text" NAME="diungthuoc" style="width:90%" value="'.$suckhoeinfo[diungthuoc].'"></td></tr>
							</table>
					</fieldset>';
	echo '</div><div style="clear:both"></div>';
					echo '<fieldset><legend>Ghi chú</legend>
							<TEXTAREA NAME="note_suckhoe" style="width:90%;height:50px;">'.$suckhoeinfo[note].'</TEXTAREA>
					</fieldset>';
	echo'</div>';

	echo'<div class="dhtmlgoodies_aTab">';
			echo '<fieldset><legend></legend>
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=15%>Chủ tài khoản: </td><td><INPUT TYPE="text" NAME="chutaikhoan" style="width:90%"  value="'.$userinfo[chutaikhoan].'"></td></tr>
								<tr><td>Số tài khoản: </td><td><INPUT TYPE="text" NAME="sotaikhoan" style="width:90%" value="'.$userinfo[sotaikhoan].'"></td></tr>
								<tr><td>Ngân hàng: </td><td><INPUT TYPE="text" NAME="nganhang" style="width:90%" value="'.$userinfo[nganhang].'"></td></tr>
								<tr><td>Thông tin khác:</td><td><TEXTAREA NAME="note" style="width:90%;height:100px;">'.$userinfo[note].'</TEXTAREA></td></tr>
							</table>
							
				</fieldset>';
	echo'</div>';

echo'</div>';
		echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	 <div style="clear:both"></div>
		</form>	
		';
	echo'	
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>';
?>
	<script type="text/javascript">
	UserWidth = window.screen.width - 290 ;
	initTabs('dhtmlgoodies_tabView1',Array('<font color=red>Thông tin chi tiết</font>','<font color=#006600>Tình trạng sức khỏe </font>','<font color=#111111>Thông tin khác</font> '),0,UserWidth,250);
	
		function OnCmd_function(id,cmd){
			window.location="admin.php?op=View_"+cmd+'&id='+id;
		}		
		function SearchEmp(){
			manhanvien = document.demoform.manhanvien.value;
			displayMessage('admin.php?op=SearchCode_Employee&manhanvien='+manhanvien,500,400);
		}
	</script>
<?
echo'
<iframe width=199 height=178 name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
</iframe>';
	include("footer.php");
}
//============================================
function SearchCode_Employee(){
	global $prefix,$maxRow,$maxPage,$manhanvien;
	$maxRow=200;
	$res = mysql_query("Select id, name from $prefix"._chinhanh." order by sort_order");

echo '<div style="float:center;width:99%">';		
echo'
		<DIV class=widget_tableDiv style="overflow: auto;height:360px;width:500px;">
		<TABLE  width=100%>
		  <TBODY class=scrollingContent >';
	    $counter = 0;			
		$stt=1;
		while(list($id,$phongban)=mysql_fetch_row($res)){
				$query = "select nv.id, nv.id_employee,nv.first_name, nv.last_name, nv.nhanvien_type
												from $prefix"._nhanvien." nv	
												where nv.id_chinhanh='$id' and nv.id_employee like '%$manhanvien%'
												";

				$result = mysql_query($query);
			echo '<tr><td><img src="images/admin/pkg-open.gif"></td><td colspan=3><b>'.$phongban.'</b></td></tr>';
			while(list($id, $id_employee,$first_name, $last_name,$id_nhanvien_type) = mysql_fetch_row($result)) {
				if($counter % 2 == 0){
					$tblColor = "tblColor1";
					$colorTD = "#ffffff";
				}else{
					$tblColor = "tblColor2";
					$colorTD = "#f4f4f4";
				}
				$counter++; global $bgcolor3;	
				$email = Getname("email","$prefix"._nhanvien_address."","id_nhanvien='$id'");		
			
			  echo "<TR class=\"$tblColor\" onclick=\"Datmau(this, 'green', '#fef7e9'); DatGiatri(".$id.");\">";	
				echo'<TD style="padding-left:20px;width:36px;"><img src="images/admin/join.gif"></TD>';
				echo'<TD style="font-weight:bold;">'.$id_employee.'</TD>';
				echo'<TD ><a href="#" onclick="ReturnEmpCode(\''.$id.'\')">'.$first_name.' '.$last_name.'</a></TD>';
				echo '<TD>'.Getname("name","$prefix"._chucvu ."","  id = '$id_nhanvien_type' ").'</TD>';
				echo'<TD style="padding-left:10px;">'.$chucvu.'</TD>';				
				echo'</TR>';
				$stt++;
			}
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></form>';
		split_pages($query,$link,0);
		echo'
					<div id="incomplete_button" >
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage()" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>';
echo '</div>';
?>
	<script>
		UserWidth = window.screen.width - 250 ;
		initTableWidget('myTable',UserWidth,0,Array(false,'S','S',false,false,false,false));
		function ReturnEmpCode(id){
			
			document.demoform.hodem.value="test"
			closeMessage();
		}
	</script>
<?
}
//==================================================
function Employee_Thamnien_Index(){
	include("header.php");
	?>
<script>
	function Submit_Form(){
		for(i=0;i<document.theform.Bophan.length;i++){
			if(document.theform.Bophan.options[i].selected==true){
				if(document.theform.Bophan.options[i].id==0){
					document.theform.chinhanh_id_selected.value=document.theform.Bophan.options[i].value;
					document.theform.phongban_id_selected.value='';

				}
				else {
					document.theform.chinhanh_id_selected.value=document.theform.Bophan.options[i].id;
					document.theform.phongban_id_selected.value=document.theform.Bophan.options[i].value;					

				}
			}
		}	
		document.theform.submit();
	}
</script>
<form action="admin.php?op=Employee_Thamnien_Index" method="post" name="theform">

<table border="0" width="100%" bgcolor="silver"  cellpadding="0" cellspacing="0">
    <tr>
      <td valign="top" align="left" >
        <div align="center">
          <table border="0" width="100%" cellpadding="3" cellspacing="1">
            <tr>
              <td valign="middle" align="center" colspan="2" bgcolor="#FFFFFF">
						<select size="1" name="Bophan" onchange="Submit_Form();">
						<?
				            echo $pb_id=$HTTP_POST_VARS[phongban_id_selected];           
				            echo $cn_id=$HTTP_POST_VARS[chinhanh_id_selected];  
							if($pb_id){
								$cn_id="";
							}		
							$result = mysql_query("select id, name from $prefix"._chinhanh." order by sort_order");	
			    			while(list($chinhanh_id, $chinhanh_name) = mysql_fetch_row($result) ){
								if ($chinhanh_id==$cn_id){
									$selected="selected";
									$namepb=$chinhanh_name;	
								}	
								else{
									$selected="";
								}
								if($chinhanh_id==0){ 
									echo "<option value=\"$chinhanh_id\" $selected id=\"0\">$chinhanh_name </option>\n";
								
								}
								else{
									echo "<option value=\"$chinhanh_id\" $selected id=\"0\">&nbsp;&nbsp;&nbsp;$chinhanh_name </option>\n";
								}
								
								$result2 = mysql_query("select id, name from $prefix"._bophan." where id_chinhanh='$chinhanh_id' order by sort_order");
								while( list($bophan_id, $bophan_name) = mysql_fetch_row($result2) ){				
									if ($bophan_id==$pb_id){
										$selected="selected";								
										$namepb=$chinhanh_name."-".$bophan_name;							}	
									else{
										$selected="";
									}
									echo "<option value=\"$bophan_id\" $selected id=\"$chinhanh_id\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$bophan_name</option>\n";
								}
							}
						?> 
                </select></td>
              <td valign="middle" align="center" colspan="2" bgcolor="#FFFFFF" ><?echo $namepb;?></td>
              <td valign="middle" align="center" colspan="5" bgcolor="#FFFFFF" nowrap>Ngày hiện tại:&nbsp;
					<?    $unix_time = time();
			      		   $date_cur1 = strftime("%d/%m/%Y",$unix_time); 
			               echo $date_cur1;
						   $date_arr=explode("/",$date_cur1);
						   $date_cur=$date_arr[2]."-".$date_arr[1]."-".$date_arr[0];	
            		?>
			  </td>
            </tr>
            <tr>
              <td valign="middle" align="center" rowspan="2" bgcolor="#FFFFFF" nowrap><b>STT</b></td>
              <td valign="middle" align="center" rowspan="2" bgcolor="#FFFFFF" ><b>Họ tên<b> </td>
              <td valign="middle" align="center" colspan="4" bgcolor="#FFFFFF" ><b>Quá trình công tác </b></td>
			  <td vAlign="center" align="middle" bgColor="#ffffff" rowSpan="2" nowrap><b>Ngày tính <br> thâm niên</b></td>

			  <td valign="middle" align="center" rowspan="2" bgcolor="#FFFFFF" nowrap><b>Năm <br> thâm niên</b></td>
              <td valign="middle" align="center" rowspan="2" bgcolor="#FFFFFF" nowrap><b>Tiền <br>Thâm niên</b></td>
            </tr>
            <tr>
              <td valign="middle" align="center" bgcolor="#FFFFFF" nowrap>Vị  trí công việc</td>
              <td valign="middle" align="center" bgcolor="#FFFFFF" nowrap>Chức vụ</td>
<!--               <td valign="middle" align="center" bgcolor="#FFFFFF" nowrap>Kiểu HĐ</td>-->
              <td valign="middle" align="center" bgcolor="#FFFFFF" nowrap>Ngày ký HĐ</td>
              <td valign="middle" align="center" bgcolor="#FFFFFF" nowrap>Ngày <br> kết thúc HĐ</td>
            </tr>

<?
       	$id_chinhanh=$HTTP_POST_VARS[chinhanh_id_selected];
		$id_bophan=$HTTP_POST_VARS[phongban_id_selected];

		if(!($id_bophan)){
			if(!($id_chinhanh)){
				$sql="SELECT a.id,a.first_name,a.last_name,a.birthday,a.sex,h.ngay_ky,h.ngay_ketthuc   
	
    	         FROM $prefix"._nhanvien." a                  
        	     LEFT JOIN $prefix"._bophan." f
            	 ON (a.bophan_id=f.id)
	             LEFT JOIN $prefix"._chinhanh." g
    	         ON (g.id=f.id_chinhanh)
				 LEFT JOIN $prefix"._nhanvien_hopdong." h
				 ON (a.id=h.id_nhanvien)
				 WHERE (h.hd_chamdut='0')";	

			}
			else{
	       		$sql="SELECT a.id,a.first_name,a.last_name,a.birthday,a.sex,
							 h.ngay_tinh_tham_nien,h.tien_tham_nien,
							 h.update_done,h.ngay_ky,h.ngay_ketthuc 
    	    	     FROM $prefix"._nhanvien." a                  
        	    	 LEFT JOIN $prefix"._bophan." f
	            	 ON (a.bophan_id=f.id)
		             LEFT JOIN $prefix"._chinhanh." g
    		         ON (g.id=f.id_chinhanh)
					 LEFT JOIN $prefix"._nhanvien_hopdong." h
					 ON (a.id=h.id_nhanvien)
        		     WHERE (g.id='$id_chinhanh')and(h.hd_chamdut='0')";
			}

		}
		else{
			$sql="SELECT a.id,a.first_name,a.last_name,a.birthday,a.sex,
						 h.ngay_tinh_tham_nien,h.tien_tham_nien,
						 h.update_done,h.ngay_ky,h.ngay_ketthuc 
    	         FROM $prefix"._nhanvien." a                  
        	     LEFT JOIN $prefix"._bophan." f
            	 ON (a.bophan_id=f.id)
	             LEFT JOIN $prefix"._chinhanh." g
    	         ON (g.id=f.id_chinhanh)
				 LEFT JOIN $prefix"._nhanvien_hopdong." h
				 ON (a.id=h.id_nhanvien)	
        	     WHERE (f.id='$id_bophan')and(g.id='$id_chinhanh')and((h.hd_chamdut='0'))";			
		}

       $rls=mysql_query($sql); 
       echo mysql_error();

       $i=0; 
       if(mysql_num_rows($rls)!=0){

       while($myrow=mysql_fetch_row($rls)){
			
			if($myrow[5]){
	            $result=mysql_query("SELECT ngay_ky,ngay_ketthuc,kieu_hopdong,thoigian_lamviec,
    	                                    kieu_nhanvien,chucvu,bacluong,hd_type 
        	                         FROM $prefix"._nhanvien_hopdong_history." 
									 WHERE nhanvien_id='$myrow[0]'
									 ORDER BY ngay_ky,ngay_ketthuc");
	            echo mysql_error();            
    	        $thamnien=0;
				$row_span=0;
    	        $thamnien_exist=0;
				$remain=0;
				$date_b=array();
				$date_e=array();
				$type_hopdong=array();
				$chv=array();
				$cv=array();
				$date1=array(); 
	            $date1=explode("/",$myrow[5]);				 
    	        $date_bd_thamnien = $date1[2]."-".$date1[1]."-".$date1[0];                 
				$start=1;
				$end=mysql_num_rows($result);	
    	        while($myrow1=mysql_fetch_row($result)){        				
					  	
	                 $date=array(); 
    	             $date=explode("/",$myrow1[0]);
        	         $date_signed=$date[2]."-".$date[1]."-".$date[0];
					 
					 $date=array(); 
    	             $date=explode("/",$myrow1[1]);
        	         $date_end=$date[2]."-".$date[1]."-".$date[0];
						
					 if($start==1){
						if(Date_Sub($date_bd_thamnien,$date_signed)>=0){
							$date_signed=$date_bd_thamnien;
						}						
					 }
					
					 if($start==$end){						
						$date_end=$date_cur;				
					 }	
					    
					 $start++;
            	     $remain=Date_Sub($date_end,$date_signed); 
					   	 
	                 if(($remain>=365)||($myrow1[7]==1)){               			
    	                $thamnien+=$remain;                                        
        	            $thamnien_exist=1; 	
						$row_span++;
						$date_b[]=$myrow1[0];
						$date_e[]=$myrow1[1];
						$type_hopdong[]=$myrow1[2];
						$chv[]=$myrow1[5];
						$cv[]=$myrow1[4];
	                 }
					 
				$remain=0;
            	}     			
    	        if ($thamnien_exist==1){ 
//					echo $thamnien; 
	                $i++;  
					$thang_thamnien=floor($thamnien/30);
					$ngay_thamnien=$thamnien%30;
					$so_du=$thang_thamnien%12;			
					$update_done=$myrow[7];
					$tien_tham_nien=$myrow[6];
					$name_nv=$myrow[1]." ".$myrow[2];
					$kt=0;
					if($thang_thamnien>24){	
						if((($thang_thamnien%12==1)||($update_done==0)||($tien_tham_nien==0))){
//							echo "<script> tien_tham_nien=window.showModalDialog(\"tien_tham_nien.php?nhanvien_id=$myrow[0]&thangthamnien=$thang_thamnien&name_nv=$name_nv\",\"\",\"dialogHeight: 140px; dialogWidth: 330px; dialogTop: 300px; dialogLeft: 250px; edge: Sunken; center: No; help: No; resizable: No; status: No;\")</script>";
							echo "<script> 
										name=\"$name_nv\"
										if(confirm('Bạn có muốn nhập số tiền thâm niên cho nhân viên '+name+' không?')){
											tien_tham_nien=window.showModalDialog(\"tien_tham_nien.php?nhanvien_id=$myrow[0]&thangthamnien=$thang_thamnien&name_nv=$name_nv\",\"\",\"dialogHeight: 140px; dialogWidth: 330px; dialogTop: 300px; dialogLeft: 250px; edge: Sunken; center: No; help: No; resizable: No; status: No;\");
										}
										else{
											tien_tham_nien='?';			
										}
								</script>";						
							$kt=1;						
						}					
					}											
					if($kt==1){					
						$tien_tham_nien="<script>document.write(tien_tham_nien)</script>";
					}
					for($j=0;$j<sizeof($cv);$j++){
						if($j==0){
							echo "<tr >"
        	            	   ."<td valign=\"middle\" align=\"center\" rowspan=\"$row_span\" bgcolor=\"#FFFFFF\">$i</td>"
	            	           ."<td valign=\"middle\" align=\"left\" rowspan=\"$row_span\" bgcolor=\"#FFFFFF\" bgColor=#ffffff style=\"cursor:hand\"
									onclick=\"Datmau(this, 'red', '#fef7e9'); DatGiaTri();\"
									onmouseover=\"if(this != current_row) {this.style.backgroundColor ='#f7f7f7'}\"
									onmouseout=\"if(this!=current_row){this.style.backgroundColor='#ffffff';}\"
									onDblClick=\"window.open('tien_thamnien_index.php?nhanvien_id=$myrow[0]&thangthamnien=$thang_thamnien&name_nv=$name_nv', '', 'width=330, height=150, top=100, left=50, resizable=yes');\">$myrow[1]&nbsp$myrow[2]</td>";
						}
						if ($j%2==1){
							echo "<tr>"; 
						}
            	        echo"" 	
                	       ."<td valign=\"middle\" align=\"left\" bgcolor=\"#FFFFFF\" >$cv[$j]&nbsp</td>"
                    	   ."<td valign=\"middle\" align=\"left\" bgcolor=\"#FFFFFF\">$chv[$j]&nbsp</td>"      						   
    	                   ."<td valign=\"middle\" align=\"left\" bgcolor=\"#FFFFFF\">$date_b[$j]&nbsp</td>"
						   ."<td valign=\"middle\" align=\"left\" bgcolor=\"#FFFFFF\">$date_e[$j]&nbsp</td>";
						if ($j%2==1){
							echo "</tr>";	
						}
						if($j==0){
							echo" <td valign=\"middle\" align=\"left\" rowspan=\"$row_span\" bgcolor=\"#FFFFFF\" nowrap>$myrow[5]</td>
								 <td valign=\"middle\" align=\"center\" rowspan=\"$row_span\" bgcolor=\"#FFFFFF\" nowrap>$thang_thamnien&nbsptháng&nbsp;</td>"                       
    		               		."<td valign=\"middle\" align=\"right\" rowspan=\"$row_span\" bgcolor=\"#FFFFFF\">$tien_tham_nien</td>"
	 		               		."</tr>";		
						}	    	                   
					}
				}
				            
           }
      }   
     }

    ?>            
          </table>
        </div>
      </td>
    </tr>
  </table>
	<input type="hidden" name="phongban_id_selected" value="">
    <input type="hidden" name="chinhanh_id_selected" value="">
</form>
	<?
	include("footer.php");
}
//=======================================================
function Employee_Out_Index(){
   global $admin, $eshop_active,$prefix, $user_prefix, $dbi,$useractive,$maxRow,$maxPage,$sortby,$active,$nukeurl,$portalurl,$classification_id;
    include("header.php");
	global $nhanvien_type,$employee_id,$employee_name,$from_date,$to_date,$chinhanhid,$bophanid;
	if($nhanvien_type) $where_nhanvien_type = "AND nv.nhanvien_type= '$nhanvien_type' ";
	if($employee_id) $where_employee_id = "AND nv.id_employee= '$employee_id' ";
	if($employee_name) $where_employee_name = "AND ( nv.first_name like  '$employee_name' OR  nv.last_name like  '$employee_name' ) ";
	if($chinhanhid) $where_chinhanhid = "AND nv.id_chinhanh= '$chinhanhid' ";
	if($bophanid) $where_bophanid = "AND nv.bophan_id= '$bophanid' ";

	$query = "select nv.id_employee, nv.id, nv.first_name, nv.last_name, nv.birthday, nv.bophan_id ,nv.nhanvien_type,nv.id_chinhanh,cn.sort_order,nv.ngayvaolam,hd.ngayhieuluc,hd.lydo
									from $prefix"._nhanvien." nv	
									left join $prefix"._chinhanh." cn
									on(nv.id_chinhanh=cn.id)
									left join $prefix"._nhanvien_hopdong_cancel." hd
									on(nv.id=hd.id_nhanvien)
									WHERE hd_chamdut = '1' $where_nhanvien_type $where_employee_id $where_employee_name $where_chinhanhid $where_bophanid
									order by  nv.nhanvien_type ASC ,cn.sort_order ASC";


	$link = "&current_parent_id=$current_parent_id";
echo '<form method=POST action="admin.php?op=Employee_Out_Index" name="demoform">';
echo Form_search_Employee($numpro);
echo '</form>';
echo '<div style="float:left;width:99%">';
		echo'
		<form   method=POST action="admin.php?op=DeleteAll_Employee_Out_Index">
			<div class="rc_btnicon_delete"><input type="button" value="'._DELETE.'" class="rc_btnicon" onclick="CheckDeleteAll(1);" /></div>
			<div class="rc_btnicon_print"><input type="button" value="In danh sách" class="rc_btnicon" onclick="CallPrint(\'printReady\');" /></div>';
echo '<div style="float:right;padding-right:15px;">';
	$query_limit = split_pages($query,$link,1);
	$result = mysql_query($query_limit);
echo '</div>';
echo'<div style="clear:both"></div>
<div style="overflow:scroll; overflow-x:hidden; height=215px" id="printReady" >
	<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
			    <TD><input type="checkbox" name="checkall" onclick="toggleAll(this,1)" id="Checkbox1" /></TD>
			    <TD>TT</TD>
				<TD>Mã nhân viên</TD>
				<TD>Tên nhân viên</TD>
				<TD>Chức danh</TD>
				<TD>Phòng ban</TD>
				<TD>Ngày vào làm</TD>
				<TD>Ngày kết thúc</TD>
				<TD>Ghi chú</TD>				
				
		  </TR>
		 </THEAD>
		  <TBODY >';
	    $counter = 0;			
		$stt=1;
	    while(list($id_employee, $id, $first_name, $last_name, $birthday, $bophan_id ,$id_nhanvien_type,$id_chinhanh,$sort,$ngayvaolam,$ngayhieuluc,$note) = mysql_fetch_row($result)) {
			if($counter % 2 == 0){
				$tblColor = "tblColor1";
				$colorTD = "#ffffff";
			}else{
				$tblColor = "tblColor2";
				$colorTD = "#f4f4f4";
			}
			$counter++; global $bgcolor3;	
				
		  if($ngayhieuluc>0) $ngayhieuluc  = strftime( _DATESTRING,$ngayhieuluc);
		  else $ngayhieuluc  = '-';
		  $note = modifier_truncate($note, $NumberWord = 30, $Etc = '...');
		  $action_checkbox = "<INPUT TYPE=\"checkbox\" NAME=\"id[]\" value=\"$id\" >";

		  echo "<TR class=\"$tblColor\"    onclick=\"Datmau(this, 'red', '#fef7e9','".$stt."'); DatGiatri(".$id.");\" id=\"$stt\">";	
		   echo '<TD align=center>'.$action_checkbox.'</TD>';
			echo '<TD align=center>'.$stt.'</TD>';
			echo'<TD style="padding-left:10px;" >'.$id_employee.'</TD>';
			echo'<TD onclick="ShowForm('.$id.')" onclick="Change()"><a href="admin.php?op=CV_Employee&id='.$id.'">'.$first_name.' '.$last_name.'</a></TD>';
			echo '<TD >'.Getname("name","$prefix"._chucvu ."","  id = '$id_nhanvien_type' ").'</TD>';
			echo '<TD >'.Getname("name","$prefix"._chinhanh  ."","  id = '$id_chinhanh' ").'  '.Getname("name","$prefix"._bophan  ."","  id = '$bophan_id' ").'</TD>';
			echo '<TD align=center >'.$ngayvaolam.'</TD>';
		    echo '<TD align=center>'.$ngayhieuluc.'</TD>';
		    echo '<TD align=center>'.$note.'</TD>';			
			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></form>';
		echo '</div>';
		split_pages($query,$link,0);
echo '</div> ';
echo '</div> ';

?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 270 ;
	initTableWidget('myTable',UserWidth,100,Array(false,false,'S','S',false,false,false,false));
		function CallPrint(strid)
		{
		var prtContent = document.getElementById(strid);
		var WinPrint =
			window.open('','','left=0,top=0,width=1000px,height=600px,toolbar=0,scrollbars=0,status=0');
			WinPrint.document.write(prtContent.innerHTML);
			WinPrint.document.close();
			WinPrint.focus();
			WinPrint.print();
			WinPrint.close();
			//prtContent.innerHTML=strOldOne;
		}
	</SCRIPT>
<?

    include("footer.php");
}
//=======================================================
function Insert_Infor(){
	global $prefix,$aid;
	$GenerateId = $_POST[manhanvien];
	$hodem = $_POST[hodem];
	$ten = $_POST[ten];
	$birthday = $_POST[birthday];
	$loainhanvien = $_POST[loainhanvien]; if(!$loainhanvien) $loainhanvien=0;
	$noisinh = $_POST[noisinh];
	$nguyenquan = $_POST[nguyenquan];
	$dantoc = $_POST[dantoc];
	$tongiao = $_POST[tongiao];
	$quoctich = $_POST[quoctich]; if(!$quoctich) $quoctich=0;
	$gender = $_POST[gender];
	$marital_status = $_POST[marital_status];
	$ngayvaolam = $_POST[ngayvaolam]; 
	
	$chinhanhid = $_POST[chinhanhid];


$res = mysql_query("Select short_name from $prefix"._chinhanh." where id='$chinhanhid'");
list($short_name)=mysql_fetch_row($res);



	$bophanid = $_POST[bophanid]; if(!$bophanid) $bophanid=0;
	$nhanvien_type = $_POST[nhanvien_type];
	$cmnd = $_POST[cmnd];
	$cmnd_ngaycap = $_POST[cmnd_ngaycap];
	$cmnd_noicap = $_POST[cmnd_noicap];
// TT Dia chi
	$Hokhau = $_POST[Hokhau];
	$DiachiNR = $_POST[DiachiNR];
	$DienthoaiNR = $_POST[DienthoaiNR];
	$Mobile = $_POST[Mobile];
	$Fax = $_POST[Fax];
	$Email = $_POST[Email];
	$NgayBatdau = $_POST[NgayBatdau];
// TT Suckhoe
	$ngaykham = DatetoTime($_POST[ngaykham]);
	$chieucao = $_POST[chieucao];
	$cannang = $_POST[cannang];
	$nhommau = $_POST[nhommau];
	$socon = $_POST[socon];
	$thiluc = $_POST[thiluc];
	$ditruyen = $_POST[ditruyen];
	$diungthuoc = $_POST[diungthuoc];
	$ditat = $_POST[ditat];
	$note_suckhoe = $_POST[note_suckhoe];
// TT Chinh tri
	$ngayvaodang = DatetoTime($_POST[ngayvaodang]); if(!$ngayvaodang) $ngayvaodang=0;
	$ngayvaodoan = DatetoTime($_POST[ngayvaodoan]); if(!$ngayvaodoan) $ngayvaodoan=0;
	$tp_giadinh = $_POST[thanhphan_giadinh]; if(!$tp_giadinh) $tp_giadinh=0;
	$tp_xahoi = $_POST[thanhphan_xahoi]; if(!$tp_xahoi) $tp_xahoi=0;
	$note = $_POST[note];
//die("ngayvaodang=$ngayvaodang / ngayvaodoan=$ngayvaodoan");
	if(!$nhanvien_type) $nhanvien_type=0;
$nhanvien_id=$_POST[nhanvien_id];
$shortname = remove_accents(shortname($hodem));

$tenID = remove_accents($ten);
$manhanvien = $short_name.'_'.$tenID.$shortname;

//$manhanvien = remove_accents($manhanvien);
$old_id_chinhanh = $_POST[old_id_chinhanh];

IF($nhanvien_id){ 
	if($old_id_chinhanh != $chinhanhid){
		$update_ma = "id_employee = '$manhanvien',";
		IF($aid != 'admin'){
			mysql_query("Update $prefix"._authors." set aid  = '$manhanvien' where aid='$aid' ");
		}
	}else{
		$update_ma = '';
	}
	mysql_query("UPDATE $prefix"._nhanvien." SET 
						first_name = '$hodem',
						last_name = '$ten',
						birthday = '$birthday',
						sex = '$gender',
						id_card = '$cmnd',
						date_issue_id_card = '$cmnd_ngaycap',
						who_issue_id_card = '$cmnd_noicap',
						bank_account = '$bank_account',
						bophan_id = '$bophanid',
						".$update_ma."
						marital_status  ='$marital_status',
						note = '$note',
						quoctich = '$quoctich',
						dantoc = '$dantoc',
						tongiao = '$tongiao',
						noisinh = '$noisinh',
						nguyenquan = '$nguyenquan',
						loainhanvien = '$loainhanvien',
						ngayvaolam = '$ngayvaolam',
						nhanvien_type = '$nhanvien_type',
						id_chinhanh='$chinhanhid'
					WHERE id='$nhanvien_id'
				");

	if($_FILES['avatar']['tmp_name'] != 'none' && $_FILES['avatar']['tmp_name'] != ''){
		if ( ($_FILES["avatar"]["type"] == "image/gif")|| ($_FILES["avatar"]["type"] == "image/jpeg") || ($_FILES["avatar"]["type"] == "image/pjpeg") || ($_FILES["avatar"]["type"] == "image/x-png")){

			$image_location = 'images/anh_nhanvien/' . $nhanvien_id . strtolower($_FILES['avatar']['name']);
			@unlink($image_location);
			@copy($_FILES['avatar']['tmp_name'], $image_location);
			mysql_query("UPDATE $prefix"._nhanvien." 
						 SET anh_canhan ='$image_location' 
						 WHERE id = '". $nhanvien_id ."'");
		}else{
			Msg_error("File Ảnh không hợp lệ. Không đúng định dạng file image : ".$_FILES["avatar"]["type"]."");
			die();
		}
	}



	if($_FILES['file']['tmp_name'] != 'none' && $_FILES['file']['tmp_name'] != ''){
		if (($_FILES["file"]["type"] == "application/msword")|| ($_FILES["file"]["type"] == "application/pdf")){

			$image_location = 'images/anh_nhanvien/HS_' . $nhanvien_id . strtolower($_FILES['file']['name']);
			@unlink($image_location);
			@copy($_FILES['file']['tmp_name'], $image_location);
			mysql_query("UPDATE $prefix"._nhanvien." 
						 SET file_att ='$image_location' 
						 WHERE id = '". $nhanvien_id ."'");
		}else{
			Msg_error("File đính kèm không hợp lệ. Không đúng định dạng file Word hoặc PDF ");
			die();

		}
	}

//	Header("location: admin.php?op=Employee_AddNew&id=$nhanvien_id");
	Header("location: admin.php?op=Done_Step&id=$nhanvien_id&step=1");
}
}
//========================================================
function Employee_Insert_Data(){
	global $prefix,$aid,$company_code;
	$GenerateId = $_POST[manhanvien];
	$hodem = $_POST[hodem];
	$ten = $_POST[ten];
	$birthday = $_POST[birthday];
	$loainhanvien = $_POST[loainhanvien]; if(!$loainhanvien) $loainhanvien=0;
	$noisinh = $_POST[noisinh];
	$nguyenquan = $_POST[nguyenquan];
	$dantoc = $_POST[dantoc];
	$tongiao = $_POST[tongiao];
	$quoctich = $_POST[quoctich]; if(!$quoctich) $quoctich=0;
	$gender = $_POST[gender];
	$marital_status = $_POST[marital_status];
	$ngayvaolam = $_POST[ngayvaolam];
	
	$chinhanhid = $_POST[chinhanhid];
	$city = $_POST[city];
	$chutaikhoan = $_POST[chutaikhoan];
	$sotaikhoan = $_POST[sotaikhoan];
	$nganhang = $_POST[nganhang];
	$noilamviec= $_POST[noilamviec];
	$bophanid = $_POST[bophanid]; if(!$bophanid) $bophanid=0;
	$tonhomid = $_POST[tonhomid]; if(!$tonhomid) $tonhomid=0;


//die("chinhanhid=$chinhanhid/$bophanid /$tonhomid");


$res = mysql_query("Select short_name from $prefix"._chinhanh." where id='$chinhanhid'");
list($short_name_cn)=mysql_fetch_row($res);

$res = mysql_query("Select ma from $prefix"._chinhanh." where id='$chinhanhid'");
list($qdma)=mysql_fetch_row($res);

$res = mysql_query("Select code from $prefix"._bophan." where id='$bophanid'");
list($short_name_bophan)=mysql_fetch_row($res);

$res = mysql_query("Select code from $prefix"._bophan." where id='$tonhomid'");
list($short_name_tonhom)=mysql_fetch_row($res);


	$nhanvien_type = $_POST[nhanvien_type];
	$cmnd = $_POST[cmnd];
	$cmnd_ngaycap = $_POST[cmnd_ngaycap];
	$cmnd_noicap = $_POST[cmnd_noicap];
// TT Dia chi
	$Hokhau = $_POST[Hokhau];
	$DiachiNR = $_POST[DiachiNR];
	$DienthoaiNR = $_POST[DienthoaiNR];
	$Mobile = $_POST[Mobile];
	$Fax = $_POST[Fax];
	$Email = $_POST[Email];
	$NgayBatdau = $_POST[NgayBatdau];
// TT Suckhoe
	$ngaykham = DatetoTime($_POST[ngaykham]);
	$chieucao = $_POST[chieucao];
	$cannang = $_POST[cannang];
	$nhommau = $_POST[nhommau];
	$socon = $_POST[socon];
	$thiluc = $_POST[thiluc];
	$ditruyen = $_POST[ditruyen];
	$diungthuoc = $_POST[diungthuoc];
	$ditat = $_POST[ditat];
	$note_suckhoe = $_POST[note_suckhoe];
// TT Chinh tri
	$ngayvaodang = DatetoTime($_POST[ngayvaodang]); if(!$ngayvaodang) $ngayvaodang=0;
	$ngayvaodoan = DatetoTime($_POST[ngayvaodoan]); if(!$ngayvaodoan) $ngayvaodoan=0;
	$tp_giadinh = $_POST[thanhphan_giadinh]; if(!$tp_giadinh) $tp_giadinh=0;
	$tp_xahoi = $_POST[thanhphan_xahoi]; if(!$tp_xahoi) $tp_xahoi=0;
	$note = $_POST[note];
//die("ngayvaodang=$ngayvaodang / ngayvaodoan=$ngayvaodoan");
	if(!$nhanvien_type) $nhanvien_type=0;
$nhanvien_id=$_POST[nhanvien_id];
//$manhanvien = $short_name.'_'.$GenerateId;


$shortname = remove_accents(shortname($hodem));
$tenID = remove_accents($ten);
//$manhanvien = $short_name.'_'.$tenID.$shortname;
$manhanvien = $short_name.'_'.GenerateId();

//$manhanvien = remove_accents($manhanvien);
$old_id_chinhanh = $_POST[old_id_chinhanh];

$manhanvien = $_POST[manhanvien];

IF($nhanvien_id){ 
	$id_nv  = substr($manhanvien,-4);
	$id_nv = str_replace("_",'',$id_nv);

	IF($qdma=='1'){ 	
		$manhanvien =  $company_code.'_'.$noilamviec;

		if($short_name_bophan) $manhanvien = $manhanvien.'_'.$short_name_bophan;
		if($short_name_tonhom) $manhanvien = $manhanvien.'_'.$short_name_tonhom;
		$manhanvien = $manhanvien.'_'.$id_nv;
	}ELSE{
		$manhanvien =  $company_code.'_'.$short_name_cn.'_'.$noilamviec;
		if($short_name_bophan) $manhanvien = $manhanvien.'_'.$short_name_bophan;
		//if($short_name_tonhom) $manhanvien = $manhanvien.'_'.$short_name_tonhom;

		$manhanvien = $manhanvien.'_'.$id_nv;
	}

	if($old_id_chinhanh != $chinhanhid){
		$update_ma = "id_employee = '$manhanvien',";
		IF($aid != 'admin'){
			mysql_query("Update $prefix"._authors." set aid  = '$manhanvien' where aid='$aid' ");
		}
	}else{
		$update_ma = '';
	}
	mysql_query("UPDATE $prefix"._nhanvien." SET 
						first_name = '$hodem',
						last_name = '$ten',
						birthday = '$birthday',
						sex = '$gender',
						id_card = '$cmnd',
						date_issue_id_card = '$cmnd_ngaycap',
						who_issue_id_card = '$cmnd_noicap',
						bank_account = '$bank_account',
						bophan_id = '$bophanid',
						id_employee = '$manhanvien',
						marital_status  ='$marital_status',
						note = '$note',
						quoctich = '$quoctich',
						dantoc = '$dantoc',
						tongiao = '$tongiao',
						noisinh = '$noisinh',
						nguyenquan = '$nguyenquan',
						loainhanvien = '$loainhanvien',
						ngayvaolam = '$ngayvaolam',
						nhanvien_type = '$nhanvien_type',
						id_chinhanh  ='$chinhanhid',
						tp_giadinh = '$tp_giadinh',
						tp_xahoi = '$tp_xahoi',
						ngayvaodang = '$ngayvaodang',
						ngayvaodoan = '$ngayvaodoan',
						chutaikhoan='$chutaikhoan',
						sotaikhoan='$sotaikhoan',
						nganhang='$nganhang',
						city='$city',
						fullname = '$hodem $ten',
						noilamviec='$noilamviec',
						tonhom_id = '$tonhomid'
					WHERE id='$nhanvien_id'
				");

	if($_FILES['avatar']['tmp_name'] != 'none' && $_FILES['avatar']['tmp_name'] != ''){
		if ( ($_FILES["avatar"]["type"] == "image/gif")|| ($_FILES["avatar"]["type"] == "image/jpeg")|| ($_FILES["avatar"]["type"] == "image/pjpeg")){

			$image_location = 'images/anh_nhanvien/' . $nhanvien_id . strtolower($_FILES['avatar']['name']);
			@unlink($image_location);
			@copy($_FILES['avatar']['tmp_name'], $image_location);
			mysql_query("UPDATE $prefix"._nhanvien." 
						 SET anh_canhan ='$image_location' 
						 WHERE id = '". $nhanvien_id ."'");
		}else{
			Msg_error("File Ảnh không hợp lệ. Không đúng định dạng file image : ".$_FILES["avatar"]["type"]."");
			die();
		}
	}



	if($_FILES['file']['tmp_name'] != 'none' && $_FILES['file']['tmp_name'] != ''){
		if (($_FILES["file"]["type"] == "application/msword")|| ($_FILES["file"]["type"] == "application/pdf")){

			$image_location = 'images/anh_nhanvien/HS_' . $nhanvien_id . strtolower($_FILES['file']['name']);
			@unlink($image_location);
			@copy($_FILES['file']['tmp_name'], $image_location);
			mysql_query("UPDATE $prefix"._nhanvien." 
						 SET file_att ='$image_location' 
						 WHERE id = '". $nhanvien_id ."'");
		}else{
			Msg_error("File đính kèm không hợp lệ. Không đúng định dạng file Word hoặc PDF ");
			die();

		}
	}
/*
	$res_1 = mysql_query("select id_nhanvien from $prefix"._nhanvien_address." where  id_nhanvien = '$nhanvien_id'");
	IF(mysql_num_rows($res_1)){
		mysql_query("Update $prefix"._nhanvien_address." set
						permament_address ='$Hokhau' ,
						current_address = '$DiachiNR',
						home_phone = '$DienthoaiNR',
						mobile = '$Mobile',
						home_fax = '$Fax',
						email = '$Email'
						where id_nhanvien = '$nhanvien_id'
					");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_address." values('$nhanvien_id','$Hokhau','$DiachiNR','$DienthoaiNR','$Mobile','$Fax','$Email','".time()."') ");
	}
*/
	$res_2 = mysql_query("select nhanvien_id from $prefix"._nhanvien_suckhoe." where  nhanvien_id = '$nhanvien_id'");
	IF(mysql_num_rows($res_2)){
		mysql_query("Update $prefix"._nhanvien_suckhoe ." set
							ngaykham = '$ngaykham',
							chieucao = '$chieucao',
							cannang = '$cannang',
							nhommau = '$nhommau',
							thiluc  ='$thiluc',
							socon = '$socon',
							ditat = '$ditat',
							ditruyen = '$ditruyen',
							diungthuoc = '$diungthuoc',
							note = '$note_suckhoe',
							lastupdate = '".time()."'
						where nhanvien_id= '$nhanvien_id'
					");
	}ELSE{

		mysql_query("INSERT INTO $prefix"._nhanvien_suckhoe ." (id,nhanvien_id,ngaykham,chieucao,cannang,nhommau,thiluc,socon,ditat,ditruyen,diungthuoc,note,lastupdate)
							values(NULL,'$nhanvien_id','$ngaykham','$chieucao','$cannang','$nhommau','$thiluc','$socon','$ditat','$ditruyen','$diungthuoc','$note_suckhoe','".time()."');
					");
	}

	Header("location: admin.php?op=Employee_AddNew&id=$nhanvien_id");
//	Header("location: admin.php?op=Done_Step&id=$nhanvien_id&step=1");
}ELSE{

	IF($qdma=='1'){ 	
		$manv =  $company_code.'_'.$noilamviec;
		if($short_name_bophan) $manv = $manv.'_'.$short_name_bophan;
		if($short_name_tonhom) $manv = $manv.'_'.$short_name_tonhom;
		$manv = $manv.'_'.$manhanvien;
	}ELSE{
		$manv =  $company_code.'_'.$short_name_cn.'_'.$noilamviec;
		if($short_name_bophan) $manv = $manv.'_'.$short_name_bophan;
		if($short_name_tonhom) $manv = $manv.'_'.$short_name_tonhom;
		$manv = $manv.'_'.$manhanvien;
		//$manhanvien = $manv;
	}

	mysql_query("INSERT INTO $prefix"._nhanvien." (id,first_name,last_name,birthday,sex,id_card,date_issue_id_card,who_issue_id_card,bank_account,bophan_id,id_employee,marital_status,note,quoctich,dantoc,tongiao,tp_giadinh,tp_xahoi,ngayvaodang,ngayvaodoan,noisinh,nguyenquan,loainhanvien,ngayvaolam,nhanvien_type,id_chinhanh,fullname,chutaikhoan,sotaikhoan,nganhang,city,noilamviec,tonhom_id)
						values(NULL,'$hodem','$ten','$birthday','$gender','$cmnd','$cmnd_ngaycap','$cmnd_noicap','$bank_account','$bophanid','$manv','$marital_status','$note','$quoctich','$dantoc','$tongiao','$tp_giadinh','$tp_xahoi','$ngayvaodang','$ngayvaodoan','$noisinh','$nguyenquan','$loainhanvien','$ngayvaolam','$nhanvien_type','$chinhanhid','$hodem $ten','$chutaikhoan','$sotaikhoan','$nganhang','$city','$noilamviec','$tonhomid')	
				");
	$eid = mysql_insert_id();


			if($_FILES['avatar']['tmp_name'] != 'none' && $_FILES['avatar']['tmp_name'] != ''){
				if ( ($_FILES["avatar"]["type"] == "image/gif")|| ($_FILES["avatar"]["type"] == "image/jpeg")|| ($_FILES["avatar"]["type"] == "image/pjpeg")){
					$image_location = 'images/anh_nhanvien/' . $eid . strtolower($_FILES['avatar']['name']);
					@unlink($image_location);
					@copy($_FILES['avatar']['tmp_name'], $image_location);
					mysql_query("UPDATE $prefix"._nhanvien." 
								 SET anh_canhan ='$image_location' 
								 WHERE id = '". $eid ."'");
				}else{
					Msg_error("File Ảnh không hợp lệ. Không đúng định dạng file image");
					die();
				}

			}


			if($_FILES['file']['tmp_name'] != 'none' && $_FILES['file']['tmp_name'] != ''){
				if (($_FILES["file"]["type"] == "application/msword")|| ($_FILES["file"]["type"] == "application/pdf")){

					$image_location = 'images/anh_nhanvien/HS_' . $eid . strtolower($_FILES['file']['name']);
					@unlink($image_location);
					@copy($_FILES['file']['tmp_name'], $image_location);
					mysql_query("UPDATE $prefix"._nhanvien." 
								 SET file_att ='$image_location' 
								 WHERE id = '". $eid ."'");
				}else{
							Msg_error("File đính kèm không hợp lệ. Không đúng định dạng file Word hoặc PDF ");
							die();
				}
			}
		
/*

	mysql_query("INSERT INTO $prefix"._nhanvien_address." (id_nhanvien,permament_address,current_address,home_phone,mobile,home_fax,email,date)
						values('$eid','$Hokhau','$DiachiNR','$DienthoaiNR','$Mobile','$Fax','$Email','$NgayBatdau')
				");
*/
	mysql_query("INSERT INTO $prefix"._nhanvien_suckhoe ." (id,nhanvien_id,ngaykham,chieucao,cannang,nhommau,thiluc,socon,ditat,ditruyen,diungthuoc,note,lastupdate)
						values(NULL,'$eid','$ngaykham','$chieucao','$cannang','$nhommau','$thiluc','$socon','$ditat','$ditruyen','$diungthuoc','$note_suckhoe','".time()."')
				");
	Header("location: admin.php?op=Done_Step&id=$eid&step=1");

}

}
//=======================================================
function Insert_Dependent(){
	global $prefix;
	$Hodem = $_POST[Hodem];
	$Ten = $_POST[Ten];
	$Dependent = $_POST[Dependent];
	$Ngaysinh = $_POST[Ngaysinh];
	$email  =$_POST[email];
	$Address = $_POST[Address];
	$phone = $_POST[phone];
	$job = $_POST[job];
	$job_address = $_POST[job_address];
	$note = $_POST[note];
	$nhanvien_id = $_POST[nhanvien_id];
	$eid =  $_POST[eid];
	$giamtru = $_POST[giamtru];
	IF($eid){
		mysql_query("UPDATE $prefix"._nhanvien_giadinh ." Set firstname = '$Hodem',lastname='$Ten',sex='$sex',relationship='$Dependent',birthday='$Ngaysinh',address='$Address',job='$job',job_address='$job_address',phone='$phone',note='$note',email='$email',giamtru='$giamtru' where gid='$eid'");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_giadinh ." values(NULL,'$nhanvien_id','$Hodem','$Ten','$sex','$Dependent','$Ngaysinh','$Address','$job','$job_address','$phone','$email','$note','$giamtru')");
	}
	Header("location: admin.php?op=View_Dependent&id=$nhanvien_id");

}
//=======================================================
function Delete_Dependent($id,$eid){
	global $prefix;
	mysql_query("DELETE FROM  $prefix"._nhanvien_giadinh ."  where gid='$eid'");
	Header("location: admin.php?op=View_Dependent&id=$id");
}
//=======================================================
function Insert_Luong(){
	global $prefix;
	$id_bacluong = $_POST[id_bacluong];
	$nhanvien_id = $_POST[nhanvien_id];
	$hesoluong = $_POST[hesoluong];
	$mocnangluong = $_POST[mocnangluong];
	$dv = $_POST[dv];
	$ngayhieuluc = DatetoTime($_POST[ngayhieuluc]);
	$note = $_POST[note];
	mysql_query("Insert into $prefix"._nhanvien_luong." values('NULL','$nhanvien_id','$id_bacluong','$hesoluong','$mocnangluong','$dv' ,'$ngayhieuluc','$note')");
	Header("Location: admin.php?op=View_Salary&id=$nhanvien_id");
}
//=======================================================
function Insert_Luong_Customize(){
	global $prefix;
	$id_bacluong = $_POST[id_bacluong];
	$nhanvien_id = $_POST[nhanvien_id];
	$hesoluong = $_POST[hesoluong];
	$mocnangluong = $_POST[mocnangluong];
	$dv = $_POST[dv];
	$ngayhieuluc = DatetoTime($_POST[ngayhieuluc]);
	$note = $_POST[note];
	$luongcoban = $_POST[luongcoban];
	$luongcoban = str_replace(".","",$luongcoban);

	mysql_query("Insert into $prefix"._nhanvien_luong_customize." values('NULL','$nhanvien_id','$id_bacluong','$luongcoban','$hesoluong','$mocnangluong','$dv' ,'$ngayhieuluc','$note')");
	Header("Location: admin.php?op=View_Salary_Customize&id=$nhanvien_id");
}
//=======================================================
function Insert_Address(){
	global $prefix;
	$id = $_POST[id];
	$Hokhau = $_POST[Hokhau];
	$DiachiNR = $_POST[DiachiNR];
	$DienthoaiNR = $_POST[DienthoaiNR];
	$Mobile = $_POST[Mobile];
	$Fax = $_POST[Fax];
	$Email  = $_POST[Email];
	$res = mysql_query("Select id_nhanvien from $prefix"._nhanvien_address." where id_nhanvien = '$id' ");
	IF(mysql_num_rows($res)){
		mysql_query("UPDATE $prefix"._nhanvien_address." SET permament_address = '$Hokhau', current_address='$DiachiNR', home_phone='$DienthoaiNR',mobile='$Mobile', home_fax='$Fax', email = '$Email' where id_nhanvien='$id' ");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_address." values('$id','$Hokhau','$DiachiNR','$DienthoaiNR','$Mobile','$Fax','$Email','".time()."') ");
	}
	Header("Location: admin.php?op=View_Address&id=$id");
	//Header("location: admin.php?op=Done_Step&id=$id&step=2");

}
//=======================================================
//=======================================================
//=======================================================
//=======================================================
//=======================================================
//=======================================================
//=======================================================
//=======================================================
//=======================================================
//=======================================================
function Employee_Import_Xls(){
global $prefix;
	include("header.php");

	if (isset($_FILES[userfile])) {
		if (($_FILES['userfile']['error']==0)&(strstr($_FILES['userfile']['name'],'.')=='.xls')) {

			
//-------------------------------------			
				require_once 'admin/functions/func.reader.php';
				require_once 'standalib.php';
				$data = new Spreadsheet_Excel_Reader();
				$data->setOutputEncoding('utf-8');
				$data->read($_FILES['userfile']['tmp_name']);
				error_reporting(E_ALL ^ E_NOTICE);
				for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
					for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
						if($j==2){
							$cellcontent[$i][$j]=ut($data->sheets[0]['cells'][$i][$j]);
						}else{
							$cellcontent[$i][$j]=ut($data->sheets[0]['cells'][$i][$j]);
						}
						
					}
				}
			

				for ($i = $_POST[datastartfrom]; $i<=sizeof($cellcontent); $i++) {
								$first_name= FixQuotes($cellcontent[$i][$_POST[first_name]]);
								$last_name =  FixQuotes($cellcontent[$i][$_POST[last_name]]);
								$id_employee =  FixQuotes($cellcontent[$i][$_POST[id_employee]]);
								$birthday =  FixQuotes($cellcontent[$i][$_POST[birthday]]);
								$sex =  FixQuotes($cellcontent[$i][$_POST[sex]]);
								$nguyenquan =  FixQuotes($cellcontent[$i][$_POST[nguyenquan]]);
								$loainhanvien =  FixQuotes($cellcontent[$i][$_POST[loainhanvien]]);
								$nguyenquan =  FixQuotes($cellcontent[$i][$_POST[nguyenquan]]);
								$dantoc =  FixQuotes($cellcontent[$i][$_POST[dantoc]]);
								$tongiao =  FixQuotes($cellcontent[$i][$_POST[tongiao]]);
								$quoctich =  FixQuotes($cellcontent[$i][$_POST[quoctich]]);
								$noisinh =  FixQuotes($cellcontent[$i][$_POST[noisinh]]);
								$marital_status =  FixQuotes($cellcontent[$i][$_POST[marital_status]]);
						
							
								$ngayvaolam =  FixQuotes($cellcontent[$i][$_POST[ngayvaolam]]);
								$chinhanh_id =  FixQuotes($cellcontent[$i][$_POST[chinhanh_id]]);
								$bophan_id =  FixQuotes($cellcontent[$i][$_POST[bophan_id]]);
								$chucvu_id =  FixQuotes($cellcontent[$i][$_POST[chucvu_id]]);
								$id_card =  FixQuotes($cellcontent[$i][$_POST[id_card]]);
								$date_issue_id_card =  FixQuotes($cellcontent[$i][$_POST[date_issue_id_card]]);						
								$who_issue_id_card =  FixQuotes($cellcontent[$i][$_POST[who_issue_id_card]]);						
								$ngayvaodang =  DatetoTime(FixQuotes($cellcontent[$i][$_POST[ngayvaodang]]));						
								$ngayvaodoan =  FixQuotes($cellcontent[$i][$_POST[ngayvaodoan]]);						
								$tp_giadinh =  FixQuotes($cellcontent[$i][$_POST[tp_giadinh]]);						
								$tp_xahoi =  FixQuotes($cellcontent[$i][$_POST[tp_xahoi]]);		
								$short_name =  FixQuotes($cellcontent[$i][$_POST[short_name]]);	
								$DiachiNR =  FixQuotes($cellcontent[$i][$_POST[DiachiNR]]);	
								$ngaychinhthuc = FixQuotes($cellcontent[$i][$_POST[ngaychinhthuc]]);	
								$thamgiatochuc = FixQuotes($cellcontent[$i][$_POST[thamgiatochuc]]);	
								$ngaynhapngu = FixQuotes($cellcontent[$i][$_POST[ngaynhapngu]]);	
								$thuongbinh =  FixQuotes($cellcontent[$i][$_POST[thuongbinh]]);	
								$danhhieu =   FixQuotes($cellcontent[$i][$_POST[danhhieu]]);	
								$conchinhsach = FixQuotes($cellcontent[$i][$_POST[conchinhsach]]);	

						if($first_name){
						$shortname = remove_accents(shortname($first_name));
						$tenID = remove_accents($last_name);
						$manhanvien = $id_employee;
						$current_address = FixQuotes($cellcontent[$i][$_POST[current_address]]);	
						$permament_address = FixQuotes($cellcontent[$i][$_POST[home_phone]]);	
						$home_phone  = FixQuotes($cellcontent[$i][$_POST[permament_address]]);	
						$mobile  = FixQuotes($cellcontent[$i][$_POST[mobile]]);	
						$email  = FixQuotes($cellcontent[$i][$_POST[email]]);	
						$chutaikhoan  = FixQuotes($cellcontent[$i][$_POST[chutaikhoan]]);	
						$sotaikhoan  = FixQuotes($cellcontent[$i][$_POST[sotaikhoan]]);	
						$date_begin  = FixQuotes($cellcontent[$i][$_POST[date_begin]]);	
						$date_end  = FixQuotes($cellcontent[$i][$_POST[date_end]]);	
						$companyname  = FixQuotes($cellcontent[$i][$_POST[companyname]]);	
						$sobhxh = FixQuotes($cellcontent[$i][$_POST[sobhxh]]);	
						$hopdong_type_id = FixQuotes($cellcontent[$i][$_POST[hopdong_type_id]]);
						$noilamviec= FixQuotes($cellcontent[$i][$_POST[noilamviec]]);
						//	$datework = Date_format_Time($date_e);
						$macongty= FixQuotes($cellcontent[$i][$_POST[macongty]]);
						$macn= FixQuotes($cellcontent[$i][$_POST[macn]]);
						$mapb= FixQuotes($cellcontent[$i][$_POST[mabophan]]);
						$mabophan= FixQuotes($cellcontent[$i][$_POST[mapb]]);
						$id_cn = Getname("id","$prefix"._chinhanh."","short_name like '$chinhanh_id' ");
						if($id_employee){
							$manv = $macongty.'_'.$macn.'_'.$mapb.'_'.$mabophan.'_'.$id_employee;
						mysql_query("INSERT into $prefix"._nhanvien ." (id,first_name,last_name,birthday,sex,id_card,date_issue_id_card,who_issue_id_card,bophan_id,id_employee,marital_status,quoctich,dantoc,tongiao,tp_giadinh,tp_xahoi,ngayvaodang,ngayvaodoan,noisinh,nguyenquan,loainhanvien,id_chinhanh ,nhanvien_type,ngayvaolam,chutaikhoan,sotaikhoan,noilamviec )
											values(NULL,'$first_name','$last_name','$birthday','$sex','$id_card','$date_issue_id_card','$who_issue_id_card','$bophan_id','$manv','$marital_status','$quoctich','$dantoc','$tongiao','$tp_giadinh','$tp_xahoi','$ngayvaodang','$ngayvaodoan','$noisinh','$nguyenquan','$loainhanvien','$id_cn','$chucvu_id','$ngayvaolam','$chutaikhoan','$sotaikhoan','$noilamviec')");
						$eid = mysql_insert_id();
						mysql_query("INSERT into $prefix"._nhanvien_chinhtri ." (id,nhanvien_id,ngayvaodang,ngaychinhthuc,ngayvaodoan,thamgiatochuc,thanhphan_giadinh,thanhphan_xahoi,ngaynhapngu,thuongbinh,conchinhsach,danhhieu )
											values(NULL, '$eid','$ngayvaodang','$ngaychinhthuc','$ngayvaodoan','$thamgiatochuc','$thanhphan_giadinh','$thanhphan_xahoi','$ngaynhapngu','$thuongbinh','$conchinhsach','$danhhieu' ) ");

						}
						if($permament_address){
							mysql_query("INSERT INTO $prefix"._nhanvien_address." (id_nhanvien,permament_address,current_address,home_phone,mobile,home_fax,email,date)
												values('$eid','$home_phone','$current_address','$permament_address','$mobile','$Fax','$email','$NgayBatdau') ");
						}
						$date_end_school_1 = FixQuotes($cellcontent[$i][$_POST[date_end_school_1]]);	
						$date_end_school_2 = FixQuotes($cellcontent[$i][$_POST[date_end_school_2]]);	

						$date_begin_school_1 = FixQuotes($cellcontent[$i][$_POST[date_begin_school_1]]);	
						$date_begin_school_2 = FixQuotes($cellcontent[$i][$_POST[date_begin_school_2]]);	

						$school_1  = FixQuotes($cellcontent[$i][$_POST[school_1]]);	
						$school_2  = FixQuotes($cellcontent[$i][$_POST[school_2]]);	
						$level_1  = FixQuotes($cellcontent[$i][$_POST[level_1]]);	
						$level_2  = FixQuotes($cellcontent[$i][$_POST[level_2]]);	

						$professional_1 =  FixQuotes($cellcontent[$i][$_POST[professional_1]]);	
						$professional_2 =  FixQuotes($cellcontent[$i][$_POST[professional_2]]);	
						$degree_1=  FixQuotes($cellcontent[$i][$_POST[degree_1]]);	
						$degree_2=  FixQuotes($cellcontent[$i][$_POST[degree_2]]);	

						if($degree_1 || $degree_2){
							mysql_query("INSERT INTO $prefix"._nhanvien_education." (eid,nid,degree,professional,school,date_begin,date_end,level )
												values(NULL,'$eid','$degree_1','$professional_1','$school_1','$date_begin_school_1','$date_end_school_1','$level_1') ");
							mysql_query("INSERT INTO $prefix"._nhanvien_education." (eid,nid,degree,professional,school,date_begin,date_end,level )
												values(NULL,'$eid','$degree_2','$professional_2','$school_2','$date_begin_school_2','$date_end_school_2','$level_2') ");

						}
						if($sobhxh){
							mysql_query("INSERT INTO $prefix"._nhanvien_baohiem." (id,id_nhanvien,maso_bhxh,nhanvien)
												values(NULL,'$eid','$sobhxh','$first_name $last_name') ");
						}

						$ngay_ky  = DatetoTime(FixQuotes($cellcontent[$i][$_POST[ngay_ky]]));	
						$ngay_ketthuc  = DatetoTime(FixQuotes($cellcontent[$i][$_POST[ngay_ketthuc]]));	
						$hopdong_code  = FixQuotes($cellcontent[$i][$_POST[hopdong_code]]);	
						$luong  = FixQuotes($cellcontent[$i][$_POST[luong]]);	
						if($hopdong_code){
							mysql_query("INSERT INTO $prefix"._nhanvien_hopdong." (id,id_nhanvien,hopdong_type_id,ngay_ky,ngay_ketthuc,hopdong_code,luong)
												values(NULL,'$eid','$hopdong_type_id','$ngay_ky','$ngay_ketthuc','$hopdong_code','$luong') ");
						}
						if($luong){
							$luong = str_replace(",","",$luong);
							mysql_query("INSERT INTO $prefix"._nhanvien_luonggoc ." (id,id_nhanvien,luongtoithieu_dn)
												values(NULL,'$eid','$luong') ");
						}
						$company_array = array();
						$from_array = array();
						$to_array = array();

						$company_array = explode('-', $companyname);
						$from_array = explode('-', $date_begin);
						$to_array = explode('-', $date_end);

							for($id = 0; $id < sizeof($company_array); $id++){
								/*
								mysql_query("INSERT INTO $prefix"._nhanvien_working_history." (wid, nid, companyname,date_begin,date_end)
											values(NULL,'$eid','".$news_array[$id]."','$date_begin','$date_end') ");
								*/
							if($company_array[$id]){
								mysql_query( "INSERT INTO $prefix"._nhanvien_working_history." (wid, nid, companyname,date_begin,date_end)
											values(NULL,'$eid','".$company_array[$id]."','".$from_array[$id]."','".$to_array[$id]."') ");
							}

							}
						}
					}
				 $upload_ok = "Đã Import dữ liệu thành công";
//-------------------------------------
		} else {
			echo "UPLOAD ERROR!!! INVALID URL XLS FILE: ";

		}
	}
echo'<form enctype="multipart/form-data" action="admin.php?op=Employee_Import_Xls" method="post" name="theForm">';

	echo'
    <div class="folder">
        <div class="folder-title">NHẬP DỮ LIỆU TỪ FILE EXCEL: '.$upload_ok.'</div>
        <div class="folder-content" id="list_option">
            <div style="width:100%;"><!--begin left option-->';
				echo '<div style="float:left;width:60%">';

					echo'<fieldset><legend>File dữ liệu</legend>';
						echo '<table border="0" cellpadding="2" cellspacing="2" >';	
							echo'		
								<tr><td width=20%>Chọn file nguồn: </td><td><input name="userfile" type="file" /></td></tr>
								<tr><td>Dòng dữ liệu: </td><td> <input type="text" name="datastartfrom" size="2" value="3"></td></tr>		
								';	
						echo "</table>";
						echo'
							<div class="rc_navigation" style="padding-left:100px;padding-top:0px;">
										<div id="incomplete_button" >
											<div class="rc_btnicon_xls"><input type="submit" value="'._IMPORT.'" class="rc_btnicon"  /></div>
											<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
										</div>
							</div>	 <div style="clear:both"></div>	';
					echo'</fieldset>';


					echo'<fieldset><legend>Thông tin cá nhân</legend>';
					echo '<table width=100%><tr><td width=33% align=top>';
						echo '<table border="0" cellpadding="2" cellspacing="2" >';	
							echo'<tr><td>Mã nhân viên :</td><td>'.select_colum('macongty','A').'_'.select_colum('macn','B').'_'.select_colum('mapb','C').'_'.select_colum('mabophan','D').'_'.select_colum('id_employee','E').'</td></tr>
								<tr><td>Họ đệm:</td><td>'.select_colum('first_name','B').'</td></tr>
								<tr><td>Tên:</td><td>'.select_colum('last_name','C').'</td></tr>
								<tr><td>Ngày sinh:</td><td>'.select_colum('birthday','G').'</td></tr>
								<tr><td>Nơi sinh :</td><td>'.select_colum('noisinh','').'</td></tr>
								<tr><td>Nguyên quán :</td><td>'.select_colum('nguyenquan','').'</td></tr>
								<tr><td>Giới tính :</td><td>'.select_colum('sex','f').'</td></tr>
								<tr><td>Tình trạng hôn nhân :</td><td>'.select_colum('marital_status','').'</td></tr>	
								<tr><td>Chỗ ở hiện nay:</td><td>'.select_colum('current_address','').'</td></tr>
								<tr><td>Địa chỉ thường trú:</td><td>'.select_colum('permament_address','').'</td></tr>
								<tr><td>Điện thoại nhà riêng:</td><td>'.select_colum('home_phone','').'</td></tr>
								<tr><td>Di động:</td><td>'.select_colum('mobile','').'</td></tr>
								<tr><td>Email:</td><td>'.select_colum('email','P').'</td></tr>										
								';	
						echo "</table>";
						echo '</td><td valign=top width=33%> ';
						echo '<table border="0" cellpadding="2" cellspacing="2" >';	
							echo'
								<tr><td>Dân tộc :</td><td>'.select_colum('dantoc','').'</td></tr>
								<tr><td>Tôn giáo :</td><td>'.select_colum('tongiao','').'</td></tr>
								<tr><td>Quốc tịch :</td><td>'.select_colum('quoctich','').'</td></tr>
								<tr><td>Loại nhân viên :</td><td>'.select_colum('loainhanvien','').'</td></tr>
								<tr><td>Ngày vào làm :</td><td>'.select_colum('ngayvaolam','').'</td></tr>
								<tr><td>Phòng ban :</td><td>'.select_colum('chinhanh_id','D').'</td></tr>
								<tr><td>Đội nhóm :</td><td>'.select_colum('bophan_id','E').'</td></tr>
								<tr><td>Nơi làm việc :</td><td>'.select_colum('noilamviec','F').'</td></tr>

								<tr><td>Chức vụ :</td><td>'.select_colum('chucvu_id','').'</td></tr>
								<tr><td>Số CMND:</td><td>'.select_colum('id_card','I').'</td></tr>
								<tr><td>Ngày cấp:</td><td>'.select_colum('date_issue_id_card','J').'</td></tr>
								<tr><td>Nơi cấp:</td><td>'.select_colum('who_issue_id_card','K').'</td></tr>
								<tr><td>Mã Đơn vị:</td><td>'.select_colum('short_name','D').'</td></tr>
								';	
						echo "</table>";
						echo '</td>';
						echo '<td valign=top>
						<table border="0" cellpadding="2" cellspacing="2" >';	
							echo'
								<tr><td>Ngày vào đảng :</td><td>'.select_colum('ngayvaodang','').'</td></tr>
								<tr><td>Ngày chính thức :</td><td>'.select_colum('ngaychinhthuc','').'</td></tr>
								<tr><td>Ngày vào đoàn :</td><td>'.select_colum('ngayvaodoan','').'</td></tr>
								<tr><td>Ngày tham gia tổ chức chính trị - xã hội :</td><td>'.select_colum('thamgiatochuc','').'</td></tr>
								<tr><td>Ngày nhập ngũ :</td><td>'.select_colum('ngaynhapngu','').'</td></tr>
								<tr><td>Thương binh hạng :</td><td>'.select_colum('thuongbinh','').'</td></tr>
								<tr><td>Danh hiệu được phong tặng cao nhất :</td><td>'.select_colum('danhhieu','').'</td></tr>
								<tr><td>Là con gia đình chính sách : :</td><td>'.select_colum('conchinhsach','').'</td></tr>
								
								';	
						echo "</table>";						
						
						echo'</td>';
						echo'</tr></table>';
					echo'</fieldset>';
				echo'<fieldset><legend>Bảo hiểm</legend>';
						echo '<table border="0" cellpadding="2" cellspacing="2" >';	
							echo'
								 <tr><td>Số sổ BHXH :</td><td>'.select_colum('sobhxh','').'</td> <td>Số phiếu BHYT :</td><td>'.select_colum('sophieu_bhyt','').'</td></tr>
								 <tr><td>Mã số thuế cá nhân :</td><td>'.select_colum('masothue','').'</td> <td>Bệnh viện: </td><td>'.select_colum('benhvien','').'</td></tr>		
								 <tr><td>Ngày cấp :</td><td>'.select_colum('ngaycap_sobhxh','').'</td></tr>		
								 <tr><td> Tham gia BHTN: </td><td>'.select_colum('bhtn','').'</td> <td> Ngày tham gia: </td><td>'.select_colum('ngaythamgia_bhtn','').'</td></tr>		
								';	
						echo "</table>";
						echo '</td></tr></table>';
					echo'</fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:40%">';
					echo'<fieldset><legend>Thông tin HĐLĐ</legend>';
						echo '<table border="0" cellpadding="2" cellspacing="2" >';	
							echo'			
								 <tr><td> Kiểu HĐ :</td><td>'.select_colum('hopdong_type_id','').'</td></tr>	
								 <tr><td>Số hợp đồng :</td><td>'.select_colum('hopdong_code','').'</td></tr>
								 <tr><td>Ngày kí HĐ :</td><td>'.select_colum('ngay_ky','U').'</td></tr>	
								 <tr><td>Ngày kết thúc HĐ :</td><td>'.select_colum('ngay_ketthuc','').'</td></tr>	
								 <tr><td>Lương cơ bản :</td><td>'.select_colum('luong','').'</td></tr>	
								<tr><td>Tên chủ tài khoản:</td><td>'.select_colum('chutaikhoan','').'</td></tr>
								<tr><td>Số Tài khoản:</td><td>'.select_colum('sotaikhoan','').'</td></tr>
								<tr><td>Ngân hàng:</td><td>'.select_colum('ngahang','').'</td></tr>
								';	
						echo "</table>";
					echo'</fieldset>';
					echo'<fieldset><legend>Quá trình công tác / Kinh nghiệm</legend>';
						echo '<table border="0" cellpadding="2" cellspacing="2" >';	
							echo'		
								<tr><td>Tên công ty :</td><td>'.select_colum('companyname','').'</td><td>Vị trí làm việc:</td><td>'.select_colum('companyname','').'</td></tr>								
								<tr><td>Ngày bắt đầu :</td><td colspan=3>'.select_colum('date_begin','').'</td></tr>
								<tr><td>Ngày kết thúc :</td><td colspan=3>'.select_colum('date_end','').'</td></tr>
								';	
						echo "</table>";
					echo'</fieldset>';
					echo'<fieldset><legend>Trình độ chuyên môn </legend>';
						echo '<table border="0" cellpadding="2" cellspacing="2" >';	
							echo'		
								<tr><td>Trình độ chuyên môn 1:</td><td>'.select_colum('degree_1','').'</td>
									<td>Trình độ chuyên môn 2:</td><td>'.select_colum('degree_2','').'</td>
								</tr>
								<tr><td>Trường đào tạo 1:</td><td>'.select_colum('school_1','').'</td>
									<td>Trường đào tạo 2:</td><td>'.select_colum('school_2','').'</td>
								</tr>
								<tr><td>Chuyên ngành 1:</td><td>'.select_colum('professional_1','').'</td>
									<td>Chuyên ngành 2:</td><td>'.select_colum('professional_2','').'</td>
								</tr>
								<tr><td>Xếp loại 1:</td><td>'.select_colum('level_1','').'</td>
									<td>Xếp loại 2:</td><td>'.select_colum('level_2','').'</td>
								</tr>
								<tr><td>Năm bắt đầu 1:</td><td>'.select_colum('date_begin_school_1','').'</td>
									<td>Năm bắt đầu 2:</td><td>'.select_colum('date_begin_school_2','').'</td>
								</tr>	
								<tr><td>Năm kết thúc 1:</td><td>'.select_colum('date_end_school_1','').'</td>
									<td>Năm kết thúc 2:</td><td>'.select_colum('date_end_school_2','').'</td>
								</tr>			
								
								';	
						echo "</table>";
					echo'</fieldset>';
				echo '</div>';

				
			echo '</div></div></div>';


	echo'</form>';
	include("footer.php");
}
//=======================================================
function Insert_WorkHistory(){
	global $prefix;
	$c_name = $_POST[c_name];
	$date_b = $_POST[date_b];
	$date_e = $_POST[date_e];
	$functions = $_POST[functions];
	$d_name = $_POST[d_name];
	$phone = $_POST[phone];
	$website = $_POST[website];
	$address = $_POST[address];
	$mota = $_POST[mota];
	$payment = $_POST[payment];
	$reason = $_POST[reason];
	$id = $_POST[id];
	$eid = $_POST[eid];
	$datework = Date_format_Time($date_e);
	IF($eid){
		mysql_query("UPDATE $prefix"._nhanvien_working_history." SET companyname = '$c_name', address='$address',phone='$phone',website='$website',referent_name='$d_name',date_begin='$date_b',date_end='$date_e',functions='$functions',duty ='$mota',reason_change='$reason',payment='$payment'
							WHERE wid = '$eid'
					");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_working_history." values(NULL,'$id','$c_name','$address','$phone','$website','$d_name','$date_b','$date_e','$functions','$mota','$reason','$payment','')");
	}
	Header("Location: admin.php?op=View_WorkHistory&id=$id");
}
//=======================================================
function Delete_WorkHistory($id,$wid){
	global $prefix;

	mysql_query("DELETE FROM $prefix"._nhanvien_working_history."  WHERE wid = '$wid' ");
	Header("Location: admin.php?op=View_WorkHistory&id=$id");
}
//=======================================================
function Insert_Education(){
	global $prefix;
	$degree= $_POST[degree];
	$Pro = $_POST[Pro];
	$level = $_POST[level];
	$DateBegin = $_POST[DateBegin];
	$DateEnd = $_POST[DateEnd];
	$school = $_POST[school];
	$Addr = $_POST[Addr];
	$note = $_POST[note];
	$id = $_POST[id];
	$editid = $_POST[editid];
	IF($editid){
		mysql_query("UPDATE $prefix"._nhanvien_education." set degree = '$degree',professional='$Pro',level='$level',date_begin='$DateBegin',date_end='$DateEnd',school='$school',address='$Addr',note='$note' where eid='$editid'	 ");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_education." values(NULL, '$id','$degree','$Pro','$level','$DateBegin','$DateEnd','$school','$Addr','$note') ");
	}
	Header("Location: admin.php?op=View_Education&id=$id");
}
//=======================================================
function Delete_Education($eid,$id){
	global $prefix;
	mysql_query("DELETE FROM  $prefix"._nhanvien_education." where eid='$eid' ");
	Header("Location: admin.php?op=View_Education&id=$id");

}
//=======================================================
function Insert_Training(){
	global $prefix;
	$Title = $_POST[Title];
	$chiphi = $_POST[chiphi];
	$DateBegin = $_POST[DateBegin];
	$DateEnd = $_POST[DateEnd];
	$Result = $_POST[Result];
	$Instructor = $_POST[Instructor];
	$Certificate = $_POST[Certificate];
	$place = $_POST[place];
	$note = $_POST[note];
	$id = $_POST[id];
	$editid = $_POST[editid];
	IF($editid){
		mysql_query("UPDATE $prefix"._nhanvien_training." set training_title  = '$Title',date_begin ='$DateBegin',date_end ='$DateEnd',result ='$Result',training_place ='$place',instructor ='$Instructor',certificate ='$Certificate',note='$note',chiphi ='$chiphi ' where tid='$editid'	 ");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_training ." values(NULL, '$id','$Title','$DateBegin','$DateEnd','$Result','$Certificate','$Instructor','$place','$note','$chiphi') ");
	}
	Header("Location: admin.php?op=View_Training&id=$id");
}
//=======================================================
function Delete_Training($id,$eid){
	global $prefix;

	mysql_query("DELETE FROM  $prefix"._nhanvien_training."  where tid='$eid'	 ");
	Header("Location: admin.php?op=View_Training&id=$id");
}
//=======================================================
function Insert_Skill(){
	global $prefix;
	$id = $_POST[id];
		if(count($_POST[skill_language])>0){
			mysql_query("Delete from $prefix"._nhanvien_skill_language." where nhanvien_id = '$id' ");
			for($i=0;$i<sizeof($_POST[skill_language]);$i++){		
				$j=$i+1;
				if($_POST[skill_language][$i]) mysql_query("Insert into $prefix"._nhanvien_skill_language." values('$id','".$_POST[skill_language][$i]."','".$_POST[skill_language_level][$i]."','$j')");
			}
		}
		if(count($_POST[skill_computer])>0){
			mysql_query("Delete from $prefix"._nhanvien_skill_computer." where nhanvien_id = '$id' ");
			for($i=0;$i<sizeof($_POST[skill_computer]);$i++){			
				$j=$i+1;
				if($_POST[skill_computer][$i]) mysql_query("Insert into $prefix"._nhanvien_skill_computer." values('$id','".$_POST[skill_computer][$i]."','".$_POST[skill_computer_level][$i]."','$j')");
			}
		}
		if(count($_POST[skill_other])>0){
					mysql_query("Delete from $prefix"._nhanvien_skill." where nhanvien_id = '$id' ");
			for($i=0;$i<sizeof($_POST[skill_other]);$i++){		
				$j=$i+1;				
				if($_POST[skill_other][$i]) mysql_query("Insert into $prefix"._nhanvien_skill." values('$id','".$_POST[skill_other][$i]."','$j')");
			}
		}
	Header("Location: admin.php?op=View_Skill&id=$id");
}
//=======================================================
function Insert_Move(){
	global $prefix;
	$id_chinhanh_old = $_POST[id_chinhanh_old];
	$bophan_id_old  = $_POST[bophan_id_old];
	$nhanvien_type_old = $_POST[nhanvien_type_old];
	$nhanvien_type = $_POST[nhanvien_type];
	$date_begin = $_POST[date_begin];
	$date_end = $_POST[date_end];
	$note = $_POST[note];
	$id = $_POST[id];
	$chinhanhid = $_POST[chinhanhid];
	$bophanid = $_POST[bophanid];
	$edit_id = $_POST[edit_id];
	$date_quyetdinh = $_POST[date_quyetdinh];
	$soquyetdinh = $_POST[soquyetdinh];
	$noilamviec = $_POST[noilamviec_moi];
	$noilamviec_old = $_POST[noilamviec_old];

	

$res = mysql_query("Select short_name from $prefix"._chinhanh." where id='$chinhanhid'");
list($short_name_cn)=mysql_fetch_row($res);

$res = mysql_query("Select code from $prefix"._bophan." where id='$bophanid'");
list($short_name_bophan)=mysql_fetch_row($res);

$manhanvien = $noilamviec.'_'.$short_name_cn.'_'.$short_name_bophan.'_'.GenerateId();


	IF($edit_id){
		mysql_query("UPDATE $prefix"._nhanvien_move." SET chinhanh_id_new='$chinhanhid', bophan_id_new='$bophanid',chucvu_id_new='$nhanvien_type',date_begin='$date_begin',date_end='$date_end',note='$note',soquyetdinh='$soquyetdinh',ngayquyetdinh='$date_quyetdinh', noilamviec='$noilamviec_old',noilamviec_moi='$noilamviec' where id='$edit_id'");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_move." values(NULL,'$id_chinhanh_old','$bophan_id_old','$chinhanhid','$bophanid','$nhanvien_type_old','$nhanvien_type','$id','$date_begin','$date_end','$note','$soquyetdinh','$date_quyetdinh' ,'$noilamviec_old','$noilamviec')");
	}
	mysql_query("UPDATE $prefix"._nhanvien." set bophan_id='$bophanid',id_chinhanh='$chinhanhid',nhanvien_type='$nhanvien_type',noilamviec='$noilamviec',id_employee ='$manhanvien' where id='$id' ");
	Header("Location: admin.php?op=View_Move&id=$id");
}
//=======================================================
function InsertChinhtri(){
	global $prefix;
	$ngayvaodang = DatetoTime($_POST[ngayvaodang]); if(!$ngayvaodang) $ngayvaodang=0;
	$ngayvaodoan = DatetoTime($_POST[ngayvaodoan]); if(!$ngayvaodoan) $ngayvaodoan=0;

	$thanhphan_giadinh = $_POST[thanhphan_giadinh];
	$thanhphan_xahoi = $_POST[thanhphan_xahoi];
	$id = $_POST[id];
	$ngaychinhthuc = $_POST[ngaychinhthuc];
	$thamgiatochuc = $_POST[thamgiatochuc];
	$ngaynhapngu = $_POST[ngaynhapngu];
	$thuongbinh = $_POST[thuongbinh];
	$conchinhsach = $_POST[conchinhsach];
	$danhhieu = $_POST[danhhieu];

//	mysql_query("UPDATE $prefix"._nhanvien." set ngayvaodang='$ngayvaodang',ngayvaodoan='$ngayvaodoan',tp_giadinh='$thanhphan_giadinh' ,tp_xahoi='$thanhphan_xahoi' where id='$id' ");
	$res = mysql_query("Select id from $prefix"._nhanvien_chinhtri." where nhanvien_id= '$id' ");
	IF(mysql_num_rows($res)){
		mysql_query("UPDATE $prefix"._nhanvien_chinhtri." set ngayvaodang='$ngayvaodang',ngayvaodoan='$ngayvaodoan',thanhphan_giadinh='$thanhphan_giadinh' ,thanhphan_xahoi='$thanhphan_xahoi',ngaychinhthuc='$ngaychinhthuc',thamgiatochuc='$thamgiatochuc',ngaynhapngu='$ngaynhapngu',thuongbinh='$thuongbinh',conchinhsach='$conchinhsach',danhhieu='$danhhieu' where nhanvien_id='$id' ");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_chinhtri." VALUES(NULL, '$id','$ngayvaodang','$ngaychinhthuc','$ngayvaodoan','$thamgiatochuc','$thanhphan_giadinh','$thanhphan_xahoi','$ngaynhapngu','$thuongbinh','$conchinhsach','$danhhieu') ");
	}
	Header("Location: admin.php?op=View_TPChinhtri&id=$id");
}
//=======================================================
function Insert_KhenthuongKyluat(){
	global $prefix;
	$soquyetdinh = $_POST[soquyetdinh];
	$hinhthuc  = $_POST[hinhthuc];
	$sotien = $_POST[sotien];
	$dvtien = $_POST[dvtien];
	$ngayky = DatetoTime($_POST[ngayky]);
	$ngayhieuluc = DatetoTime($_POST[ngayhieuluc]);
	$nguoiky = $_POST[nguoiky];
	$id = $_POST[id];
	$note = $_POST[note];
	$editid = $_POST[editid];
	IF($editid){
		mysql_query("Update $prefix"._nhanvien_khenthuong_kyluat." set hinhthuc= '$hinhthuc',soquyetdinh='$soquyetdinh',ngayquyetdinh='$ngayquyetdinh',ngayhieuluc='$ngayhieuluc',lydo='$note',sotien='$sotien',dvtien='$dvtien',nguoiky='$nguoiky',ngayky='$ngayky',lastupdate='".time()."' where id='$editid' ");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_khenthuong_kyluat." values(NULL,'$id','$hinhthuc','$soquyetdinh','$ngayquyetdinh','$ngayhieuluc','$note','$sotien','$dvtien','$nguoiky','$ngayky','".time()."')");
	}
	Header("Location: admin.php?op=View_KhenthuongKyluat&id=$id");
}
//=======================================================
function Delete_KhenthuongKyluat($eid,$id){
	global $prefix;
	mysql_query("DELETE FROM  $prefix"._nhanvien_khenthuong_kyluat."  where id='$eid'	 ");
	Header("Location: admin.php?op=View_KhenthuongKyluat&id=$id");
}
//=======================================================
function Insert_WorkInfor(){
	global $prefix;
	$BoPhan = $_POST[BoPhan];
	$KieuNV  = $_POST[KieuNV];
	$KieuHD = $_POST[KieuHD];
	$JobStatus = $_POST[JobStatus];
	$NgaykyHD = DatetoTime($_POST[NgaykyHD]);
	if($_POST[NgaykethucHD]) $NgaykethucHD = DatetoTime($_POST[NgaykethucHD]);
	else $NgaykethucHD=0;
	$NgayTN = DatetoTime($_POST[NgaykethucHD]);
	$ThoigianLV = $_POST[ThoigianLV];
	$id = $_POST[id];
	$Bacluong = $_POST[Bacluong];
	$Chucvu = $_POST[Chucvu];
	$NguoiDieuhanh = $_POST[NguoiDieuhanh];
	$note = $_POST[note];
	$phu_cap = $_POST[phu_cap];
	$hopdong_code = $_POST[hopdong_code];
	$address = $_POST[address];
	$thamgia_baohiem = $_POST[thamgia_baohiem];
	$ngayphep = $_POST[ngayphep];

$Bacluong =	explode(':',$Bacluong);
$Bacluong = $Bacluong[0];
	$luongcoban = $_POST[luongcoban];
	$luongcoban = str_replace(".", "", $luongcoban);

	$hopdong_id = $_POST[hopdong_id];
//	IF($JobStatus==1){
		IF($hopdong_id){
			mysql_query("UPDATE $prefix"._nhanvien_hopdong." SET 
									hopdong_type_id = '$KieuHD',
									ngay_ky = '$NgaykyHD',
									ngay_ketthuc = '$NgaykethucHD',
									id_nhanvien_type = '$KieuNV',
									thoigian_lamviec = '$ThoigianLV',
									id_bacluong = '$Bacluong',
									id_chucvu = '$Chucvu',
									supervisor = '$NguoiDieuhanh',
									dieu_khoan = '$note',
									phu_cap = '$phu_cap',
									hopdong_code = '$hopdong_code',
									address='$address',luong='$luongcoban',
									thamgia_baohiem = '$thamgia_baohiem',
									ngayphep = '$ngayphep'
							WHERE id = '$hopdong_id' ");
		}ELSE{
			mysql_query("INSERT INTO $prefix"._nhanvien_hopdong." (id,id_nhanvien,hopdong_type_id,ngay_ky,ngay_ketthuc,id_nhanvien_type,thoigian_lamviec,id_bacluong,id_chucvu,supervisor,dieu_khoan,phu_cap,hopdong_code,address,luong,thamgia_baohiem,ngayphep)
								values(NULL,'$id','$KieuHD','$NgaykyHD','$NgaykethucHD','$KieuNV','$ThoigianLV','$Bacluong','$Chucvu','$NguoiDieuhanh','$note','$phu_cap','$hopdong_code','$address','$luongcoban','$thamgia_baohiem','$ngayphep')");
		}
//	}
	Header("Location: admin.php?op=View_WorkInfor&id=$id");
}
//=======================================================
function DeleteAllEmployee(){
	global $prefix;
		if(count($_POST[id])>0){
			for($i=0;$i<sizeof($_POST[id]);$i++){			
				mysql_query("Delete from $prefix"._nhanvien." where id='".$_POST[id][$i]."'");
				//echo "Delete from $prefix"._nhanvien." where id='".$_POST[id][$i]."' <br>";
			}
		}
	Header("Location: admin.php?op=Employee_Index");
}
//=======================================================
function Employee_Delete_fileAtt($id){
	global $prefix;
	
	$result = mysql_query("SELECT file_att 
						   FROM $prefix"._nhanvien." 
						   WHERE id = '$id'");
	list($file_att) = mysql_fetch_row($result);
	@unlink($file_att);	

	mysql_query("UPDATE $prefix"._nhanvien." 
				 SET file_att = '' 
				 WHERE id = '$id'");				
	Header("Location: aadmin.php?op=Employee_AddNew&id=$id");
}
//=======================================================
function Employee_Change_fileAtt($id){
	global $prefix, $db;
		if($_FILES['fileatt']['tmp_name'] != 'none' && $_FILES['fileatt']['tmp_name'] != ''){
			if (($_FILES["fileatt"]["type"] == "application/msword")|| ($_FILES["fileatt"]["type"] == "application/pdf")){
				$image_location = 'images/anh_nhanvien/HS_' . $id . strtolower($_FILES['fileatt']['name']);
				@unlink($image_location);
				@copy($_FILES['banner_image']['tmp_name'], $image_location);
				mysql_query("UPDATE $prefix"._nhanvien ." 
							 SET file_att ='$image_location'
							 WHERE id = '". $id ."'");
				Header("Location: admin.php?op=Employee_AddNew&id=$id");
			}else{
				Msg_error("File đính kèm không hợp lệ. Không đúng định dạng file Word hoặc PDF ");
				die();
			}
		}else{
			echo "<form action=\"admin.php\" method=\"post\" name=theForm  enctype=\"multipart/form-data\">\n";
			echo'
			<div class="folder">
				<div class="folder-title">THAY ĐỔI FILE</div>
				<div class="folder-content" id="list_option">
					<div style="width:380px; float:left"><!--begin left option-->
					   
						<p style="width:100px; float:left;" class="spaceMargin">'._BANNERIMAGE.' :</p>
						<p class="spaceMargin">
							<input type="file" name="fileatt" id="fileatt" value="" class="inputBorder" size="42" />
						</p>
					   
						

					</div><!--end left option-->          
					<div style="clear:both"></div>
				</div>							
			</div>';
				echo'
				<div class="rc_navigation" style="padding-left:200px;padding-top:10px;">
							<div id="incomplete_button" >
								<div class="rc_btnicon_renew"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
								<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
							</div>
				</div>	';
					  echo"<input type=\"hidden\" name=\"op\" value=\"Employee_Change_fileAtt\">";
					  echo"<input type=\"hidden\" name=\"id\" value=\"$id\">";

				echo "</form>";
		}
}
//=======================================================
function DeleteAll_Move_Emp(){
    global $aid,  $prefix, $selectedLang;
	$id=$_POST[id];
		if(count($_POST[mid])>0){
			for($i=0;$i<sizeof($_POST[mid]);$i++){							
				mysql_query("Delete from $prefix"._nhanvien_move ." where id='".$_POST[mid][$i]."'");
			}
		}
	 Header("Location: admin.php?op=View_Move&id=$id");
}
//=======================================================
function Insert_Record(){
	global $prefix,$_FILE;
	$id=$_POST[id];
		if(count($_POST[fid])>0){
			for($i=0;$i<sizeof($_POST[fid]);$i++){							
				if($_POST[fid][$i] && $_POST[loaihs][$i]){
					mysql_query("INSERT into  $prefix"._nhanvien_hoso." values('".$_POST[fid][$i]."','$id','1','".$_POST[loaihs][$i]."','".$_POST[soluong][$i]."','') ");
						if($_FILES['file']['tmp_name'][$i] != 'none' && $_FILES['file']['tmp_name'][$i] != ''){
						//	if (($_FILES["file"]["type"][$i] == "application/msword")|| ($_FILES["file"]["type"][$i] == "application/pdf") || ( ($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") )){

								$image_location = 'images/anh_nhanvien/HS_' . $nhanvien_id . strtolower($_FILES['file']['name'][$i]);
								@unlink($image_location);
								@copy($_FILES['file']['tmp_name'][$i], $image_location);
								mysql_query("UPDATE $prefix"._nhanvien_hoso." 
											 SET file ='$image_location' 
											 WHERE nid  = '". $id ."' and did  = '".$_POST[fid][$i]."' ");
						//	}else{
								//Msg_error("File đính kèm không hợp lệ. Không đúng định dạng file Word hoặc PDF ");
						//		die();

						//	}
						}

				}
			}
		}
	 Header("Location: admin.php?op=View_Record&id=$id");
}
//=======================================================
function Done_Step($id,$step){
	global $prefix;
	include("header.php");
	if($step==1) $location='admin.php?op=View_Dependent&id='.$id.'';
	if($step==2) $location='admin.php?op=View_WorkInfor&id='.$id.'';

		echo '<div style="text-align:center;padding-top:20px;">Bạn đã hoàn thành phần cập nhật thông tin cá nhân, vui lòng click vào nút tiếp theo để cập nhật thông tin về <b>Gia đình </b>
		<br><br>
		<div class="rc_navigation" style="padding-left:400px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_next"><input type="button" value="Tiếp theo" class="rc_btnicon" onclick="javascript:window.location=\''.$location.'\'" /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	 <div style="clear:both"></div>	
		</div>';

	include("footer.php");
}
//=======================================================
function CV_Employee($id){
	global $prefix,$sitename,$sitelogo;
	include("header.php");
			$res = mysql_query("SELECT * FROM $prefix"._nhanvien."  WHERE id  = '$id' ");
			$userinfo =mysql_fetch_array($res);

			if(!$userinfo[id_employee]) $manhanvien = GenerateId();
			else $manhanvien = $userinfo[id_employee];
			if($userinfo[ngayvaodang]>0) $ngayvaodang = strftime( _DATESTRING, $userinfo[ngayvaodang]);
			if($userinfo[ngayvaodoan]>0) $ngayvaodoan = strftime( _DATESTRING, $userinfo[ngayvaodoan]);
$fullname= $userinfo[first_name].' '.$userinfo[last_name];


			$res = mysql_query("SELECT * FROM $prefix"._nhanvien_address ."  WHERE id_nhanvien  = '$id' ");
			$addressinfo =mysql_fetch_array($res);

			$res = mysql_query("SELECT * FROM $prefix"._nhanvien_suckhoe ."  WHERE nhanvien_id  = '$id' ");
			$suckhoeinfo =mysql_fetch_array($res);
			if($suckhoeinfo[ngaykham]>0) $ngaykham = strftime( _DATESTRING, $suckhoeinfo[ngaykham]);


			$res_bh = mysql_query("Select maso_bhxh  from $prefix"._nhanvien_baohiem." where id_nhanvien  = '$id' ");
			list($maso_bhxh)=mysql_fetch_row($res_bh);

			$res_khenthuong = mysql_query("Select lydo  from $prefix"._nhanvien_khenthuong_kyluat." where nhanvien_id  = '$id' and hinhthuc ='1'");
			$arr_khenthuong = '';
			while(list($khenthuong)=mysql_fetch_row($res_khenthuong)){
					$arr_khenthuong = $khenthuong.', ';
			}
			$res_kyluat = mysql_query("Select lydo  from $prefix"._nhanvien_khenthuong_kyluat." where nhanvien_id  = '$id' and hinhthuc ='0' ");
			$arr_kyluat= '';
			while(list($kyluat)=mysql_fetch_row($res_kyluat)){
					$arr_kyluat = $kyluat.', ';
			}

		$res = mysql_query("Select * from $prefix"._nhanvien_chinhtri." where nhanvien_id = '$id' ");
		$ct = mysql_fetch_array($res);
		if($ct[ngayvaodang]) $ngayvaodang =  strftime( _DATESTRING, $ct[ngayvaodang]);
		if($ct[ngayvaodoan]) $ngayvaodoan =  strftime( _DATESTRING, $ct[ngayvaodoan]);

		$res = mysql_query("Select * from $prefix"._nhanvien_refer." where nhanvien_id = '$id' ");
		$refer = mysql_fetch_array($res);

echo'<div class="rc_btnicon_print"><input type="button" value=" In " class="rc_btnicon" onclick="CallPrint(\'printReady\');" /></div><div style="clear:both"></div><hr>';
echo'<div id="printReady" width="600px;" align="center">
<table border="0" width="800" height="80" cellspacing="0" cellpadding="0">
	<tr>
		<td height="80" width="280" align=left><img src="'.$sitelogo.'"></td>

		<td height="80" width="508" align="right">
		<p style="line-height: 200%" class="MsoNormal">
		<span style="COLOR: black">Tên Cán bộ: '.$fullname.'<br>
		Đơn vị: Phòng Tổ chức - Hành chính<br>
		Cơ quan đơn vị sử dụng CBCC : '.$sitename.'</span></td>
	</tr>
</table>
				<p style="TEXT-ALIGN: center; LINE-HEIGHT: 150%" class="MsoNormal" align="center">
				<b><span style="COLOR: black">SƠ YẾU LÝ LỊCH CÁN BỘ, CÔNG NHÂN VIÊN</span></b></p>
				<div align="center">
				<table id="table22" border="1" cellSpacing="0" borderColor="#f4f4f4" width="753" cellpadding="5">
					<tr>
						<td width="234" colSpan="2" align="left">&nbsp;<span style="COLOR: black">1) 
						Họ và tên khai sinh </span>
						<span style="LINE-HEIGHT: 130%; COLOR: black; FONT-SIZE: 10pt">
						(viết chữ in hoa)</span><span style="COLOR: black">:</span></td>
						<td width="346" colSpan="3" align="left"><b>
						<span style="color:black;text-transform:uppercase;">'.$fullname.'</span></b></td>
						<td rowSpan="6" width="147" align="left">';
			if($userinfo[anh_canhan] && file_exists($userinfo[anh_canhan])){
				echo '<img src="'.$userinfo[anh_canhan].'" width=145 height=147 style="border: 1px solid #c0c0c0;padding:2px;">';
			}else{
				echo'<img src="images/noimg.png" width=145 height=147 >';
			}
					echo'</td>
					</tr>
					<tr>
						<td width="106" align="left">&nbsp;<span style="COLOR: black">2) 
						Tên gọi khác:</span></td>
						<td width="473" colSpan="4" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td width="106" align="left">&nbsp;<span style="COLOR: black">3) 
						Sinh ngày:</span></td>
						<td width="226" colSpan="2" align="left">'.$userinfo[birthday].' 
						</td>
						<td width="240" align="left" colspan="2"><span style="COLOR: black">
						Giới tính </span>
						<span style="LINE-HEIGHT: 130%; COLOR: black; FONT-SIZE: 10pt">
						(nam, nữ)</span><span style="COLOR: black">: </span>'.Getname("name","$prefix"._sex."","id='".$userinfo[sex]."'").'</td>
					</tr>
					<tr>
						<td width="106" align="left">&nbsp;<span style="COLOR: black">4) 
						Nơi sinh:</span></td>
						<td width="458" colSpan="4" align="left">'.$userinfo[noisinh].'</td>
					</tr>
					<tr>
						<td width="106" align="left"><span style="COLOR: black">
						&nbsp;5) Quê quán: </span></td>
						<td width="458" colSpan="4" align="left">'.$userinfo[nguyenquan].'</td>
					</tr>
					<tr>
						<td width="106" align="left"><span style="COLOR: black">
						&nbsp;6) Dân tộc:</span></td>
						<td width="120" align="left">'.$userinfo[dantoc].'</td>
						<td width="99" align="left">&nbsp;</td>
						<td width="233" align="left" colspan="2"><span style="COLOR: black">
						7) Tôn giáo:</span> '.$userinfo[tongiao].'</td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">&nbsp;8) Nơi đăng ký 
						hộ khẩu thường trú:</td>
						<td width="500" colSpan="4" align="left">'.$addressinfo[permament_address].'</td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">&nbsp;9) Nơi ở hiện 
						nay:</td>
						<td width="500" colSpan="4" align="left">'.$addressinfo[current_address].'</td>
					</tr>
					<tr>
						<td width="734" colSpan="6" align="left">
						<span style="COLOR: black">&nbsp;10) Nghề nghiệp khi được 
						tuyển dụng:&nbsp; </span></td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">11) Ngày tuyển dụng:</span></td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left"><span style="COLOR: black">
						Cơ quan tuyển dụng: </span></td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td colSpan="4" align="left">12) Chức vụ&nbsp; hiện tại: 
						 '.Getname("name","$prefix"._chucvu."","id='".$userinfo[nhanvien_type]."'").'</td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">13) Công việc chính được giao</span></td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left">&nbsp;</td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">14) Ngạch:</span></td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left"><span style="COLOR: black">
						Mã ngạch:</span></td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td height="26" width="106" align="left">
						<span style="COLOR: black">Bậc lương:</span></td>
						<td height="26" width="120" align="left">&nbsp;</td>
						<td height="26" width="99" align="left">
						<span style="COLOR: black">Bậc lương:</span></td>
						<td height="26" width="229" align="left">
						<span style="COLOR: black">Ngày hưởng:</span></td>
						<td height="26" width="151" align="left" colspan="2">
						<span style="COLOR: black">Phụ cấp chức vụ:</span></td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">15.1 - Trình độ giáo dục phổ 
						thông :</span></td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left">&nbsp;</td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">15.2 - Trình độ chuyên môn 
						cao nhất: </span></td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left">&nbsp;</td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">15.3 - Lý luận chính trị:
						</span></td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left"><span style="COLOR: black">
						15.4 - Quản lý nhà nước:</span></td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>';
	$res_language = mysql_query("Select skill_id, skill_level from $prefix"._nhanvien_skill_language." where nhanvien_id= '$id' ");
	$ngoaingu='';
	while(list($skill_id, $skill_level)=mysql_fetch_row($res_language)){
		$ngoaingu .=  Getname("name","$prefix"._skills_language."","id='$skill_id'").', '.$skill_level.'; ';
	}
	$res_computer = mysql_query("Select skill_id, skill_level from $prefix"._nhanvien_skill_computer." where nhanvien_id= '$id' ");
	$tinhoc='';
	while(list($skill_id, $skill_level)=mysql_fetch_row($res_computer)){
		$tinhoc .=  Getname("name","$prefix"._skills_computer."","id='$skill_id'").', '.$skill_level.'; ';
	}
					echo'
					<tr>
						<td width="340" colSpan="3" align="left">
						<span style="COLOR: black">15.5 - Ngoại ngữ:</span> 
						&nbsp; '.$ngoaingu.'</td>
						<td width="229" align="left"><span style="COLOR: black">
						15.6 - Tin học: </span></td>
						<td width="158" colSpan="2" align="left">'.$tinhoc.'</td>
					</tr>
					<tr>
						<td width="340" colSpan="3" align="left">
						<span style="COLOR: black">16) Ngày vào đảng cộng sản 
						Việt Nam:</span></td>
						<td width="229" align="left"><span style="COLOR: black">
						Ngày chính thức</span></td>
						<td width="158" colSpan="2" align="left">'.$ct[ngaychinhthuc].'</td>
					</tr>
					<tr>
						<td width="340" colSpan="3" align="left">
						<span style="COLOR: black">17) Ngày tham gia tổ chức 
						chính trị - xã hội:</span></td>
						<td width="229" align="left"><span style="COLOR: black">
						Vào đoàn TNCSHCM ngày:</span></td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">18) Ngày nhập ngũ: </span>
						</td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left">&nbsp;</td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td width="727" colSpan="6" align="left">
						<span style="COLOR: black">19) Danh hiệu được phong tặng 
						cao nhất:</span></td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">20) Sở trường công tác:
						</span></td>
						<td width="486" align="left" colspan="4">&nbsp;</td>
					</tr>
					<tr>
						<td width="340" colSpan="3" align="left">
						<span style="COLOR: black">21) Khen thưởng:</span> &nbsp;'.$arr_khenthuong.'<</td>
						<td colSpan="3" align="left"><span style="COLOR: black">
						22) Kỷ luật:</span> &nbsp; '.$arr_kyluat.'
						</td>
					</tr>
					<tr>
						<td width="720" colSpan="6" align="left">
						<span style="COLOR: black">23) Tình trạng sức khoẻ:
						Chiều cao:</span> '.$suckhoeinfo[chieucao].' . <span style="COLOR: black">
						Cân nặng:</span> '.$suckhoeinfo[cannang].' <span style="COLOR: black">Nhóm máu:</span></td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">24) Là thương binh hạng:</span></td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left"><span style="COLOR: black">
						Là con gia đình chính sách</span></td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">25) Số CMND: </span>012584765</td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left"><span style="COLOR: black">
						Ngày cấp: </span>17/03/2003 
						</td>
						<td width="158" colSpan="2" align="left">
						<span style="COLOR: black">Nơi cấp: </span></td>
					</tr>
					<tr>
						<td width="234" colSpan="2" align="left">
						<span style="COLOR: black">26) Số sổ BHXH : 8.31E+09
						</span></td>
						<td width="99" align="left">&nbsp;</td>
						<td width="229" align="left">&nbsp;</td>
						<td width="158" colSpan="2" align="left">&nbsp;</td>
					</tr>
				</table>
			</div>
			</div>
			<p style="TEXT-ALIGN: center" class="MsoNormal" align="center"><b>
			<span style="COLOR: black">27. ĐÀO TẠO, BỒI DƯỠNG VỀ CHUYÊN MÔN, 
			NGHIỆP VỤ,</span></b></p>
			<p style="TEXT-ALIGN: center; MARGIN-BOTTOM: 12pt" class="MsoNormal" align="center">
			<b><span style="COLOR: black">LÝ LUẬN CHÍNH TRỊ, NGOẠI NGỮ, TIN HỌC</span></b></p>
			<div align="center">
				<table style="border:medium none; WIDTH: 745px; BORDER-COLLAPSE: collapse; MARGIN-LEFT: 5.4pt; " id="table23" class="MsoNormalTable" border="1" cellSpacing="0" cellPadding="0">
					<tr>
						<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 4cm; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="351">
						<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
						<span style="COLOR: black">Tên trường hoặc cơ quan đào 
						tạo bồi dưỡng</span></td>
						<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 106.35pt; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="142">
						<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
						<span style="COLOR: black">Chuyên ngành đào tạo, bồi dưỡng</span></p></td>
						<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 3cm; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="113">
						<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
						<span style="COLOR: black">Từ tháng, năm Đến tháng, năm</span></p></td>
						<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 92.1pt; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="123">
						<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
						<span style="COLOR: black">Hình thức đào tạo, bồi dưỡng</span></td>
						<td style="BORDER-BOTTOM: 1pt solid windowtext; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 159px; PADDING-RIGHT: 5.4pt; BORDER-TOP: 1pt solid windowtext; BORDER-RIGHT: 1pt solid windowtext; PADDING-TOP: 0cm" vAlign="top">
						<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
						<span style="COLOR: black">Văn bằng, chứng chỉ</span></p></td>
					</tr>';
			$sql="SELECT eid,degree,professional,level,date_begin,date_end,school,address,note 
			  		FROM $prefix"._nhanvien_education." where nid='$id'";
			$rls=mysql_query($sql);
			$i=1;

				$counter = 0;			
				$stt=1;
				$i=0;
		while(list($eid,$degree,$pro,$level,$date_b,$date_e,$sch,$addr,$note)=mysql_fetch_row($rls)){	
		echo'
					<tr>
						<td style="BORDER-BOTTOM: windowtext 1pt dotted; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 4cm; PADDING-RIGHT: 5.4pt; HEIGHT: 23px; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="151">'.$sch.'</td>
						<td style="BORDER-BOTTOM: windowtext 1pt dotted; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 106.35pt; PADDING-RIGHT: 5.4pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="142">'.$pro.'</td>
						<td style="BORDER-BOTTOM: windowtext 1pt dotted; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 3cm; PADDING-RIGHT: 5.4pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="113">'.$date_b.' - '.$date_e.'</td>
						<td style="BORDER-BOTTOM: windowtext 1pt dotted; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 92.1pt; PADDING-RIGHT: 5.4pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="123">'.Getname("name","$prefix"._edu_level."","id='$degree'").'</td>
						<td style="BORDER-BOTTOM: 1pt dotted windowtext; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 159px; PADDING-RIGHT: 5.4pt; BORDER-TOP: medium none; BORDER-RIGHT: 1pt solid windowtext; PADDING-TOP: 0cm">'.$level.'</td>
					</tr>';
		}
		echo'
					<tr>
						<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 4cm; PADDING-RIGHT: 5.4pt; HEIGHT: 23px; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="151">&nbsp;</td>
						<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 106.35pt; PADDING-RIGHT: 5.4pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="142">&nbsp;</td>
						<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 3cm; PADDING-RIGHT: 5.4pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="113">&nbsp;</td>
						<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 92.1pt; PADDING-RIGHT: 5.4pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="123">&nbsp;</td>
						<td style="BORDER-BOTTOM: 1pt solid windowtext; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 159px; PADDING-RIGHT: 5.4pt; BORDER-TOP: medium none; BORDER-RIGHT: 1pt solid windowtext; PADDING-TOP: 0cm" vAlign="top">&nbsp;</td>
					</tr>
				</table>
				<p style="LINE-HEIGHT: 20pt" class="MsoNormal" align="center">
								<p style="TEXT-ALIGN: center; MARGIN-BOTTOM: 6pt" class="MsoNormal" align="center">
								<b><span style="COLOR: black">28. TÓM TẮT QUÁ 
								TRÌNH CÔNG TÁC</span></b></p>
								<div align="center">
									<table style="border:medium none; WIDTH: 745px; BORDER-COLLAPSE: collapse; MARGIN-LEFT: 5.4pt; " id="table24" class="MsoNormalTable" border="1" cellSpacing="0" cellPadding="0">
										<tr>
											<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 108.65pt; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="145">
											<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
											<span style="COLOR: black">Thời gian</span></p>
											<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
											<span style="COLOR: black">tuyển 
											dụng</span></td>
											<td style="BORDER-BOTTOM: 1pt solid windowtext; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 566px; PADDING-RIGHT: 5.4pt; BORDER-TOP: 1pt solid windowtext; BORDER-RIGHT: 1pt solid windowtext; PADDING-TOP: 0cm">
											<p class="MsoNormal">
											<span style="COLOR: black">&nbsp;Được 
											tuyển dụng vào đơn vị nào (đơn vị 
											chủ quản, đơn vị trực thuộc)? Công 
											việc chính được phân công đảm trách 
											( chức danh công việc hoặc chức vụ 
											công tác) là gì? được xếp vào ngạch, 
											bậc lương nào và phụ cấp (nếu có) là 
											bao nhiêu)?</span></td>
										</tr>';
			$sql= "SELECT wid,companyname,referent_name,date_begin,date_end,functions,payment
				   FROM $prefix"._nhanvien_working_history."	
				   WHERE nid='$id'
				   ";
	
			$res=mysql_query($sql);
		while(list($wid, $c_name,$referent_name,$date_b,$date_e,$functions,$payment)=mysql_fetch_row($res)){
										echo'
										<tr>
											<td style="BORDER-BOTTOM: 1pt dotted windowtext; BORDER-LEFT: 1pt solid windowtext; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 108.65pt; PADDING-RIGHT: 5.4pt; HEIGHT: 26px; BORDER-TOP: medium none; BORDER-RIGHT: 1pt solid windowtext; PADDING-TOP: 0cm" width="145">'.$date_b.' -  '.$date_e.'</td>
											<td style="BORDER-BOTTOM: 1pt dotted windowtext; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 566px; PADDING-RIGHT: 5.4pt; HEIGHT: 26px; BORDER-TOP: medium none; BORDER-RIGHT: 1pt solid windowtext; PADDING-TOP: 0cm">'.$c_name.', '.$referent_name.' '.$functions.' '.$payment.'</td>
										</tr>';
		}
		echo'
									</table>
								</div>
								<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">&nbsp;</p>
								<div align="center">
									<table style="BORDER-COLLAPSE: collapse" id="table25" class="MsoNormalTable" border="0" cellSpacing="0" cellPadding="0" width="749">
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
											<b><span style="COLOR: black">29) 
											ĐẶC ĐIỂM LỊCH SỬ BẢN THÂN</span></b></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">- Khai 
											rõ: bị bắt, bị tù </span>
											<span style="COLOR: black; FONT-SIZE: 9pt">
											(từ ngày tháng năm nào đến ngày 
											tháng năm nào, ở đầu), </span>
											<span style="COLOR: black">đã khai 
											báo cho ai, những vấn đề gì? Bản 
											thân có làm việc trong chế độ cũ
											</span>
											<span style="COLOR: black; FONT-SIZE: 9pt">
											(cơ quan, đơn vị nào, địa điểm, chức 
											vụ, thời gian làm việc …)</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">
											................................................................................................................................................................
											</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">
											................................................................................................................................................................
											</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">
											................................................................................................................................................................
											</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">- Tham 
											gia hoặc có quan hệ với các tổ chức 
											chính trị, kinh tế, xã hội nào ở 
											nước ngoài </span>
											<span style="COLOR: black; FONT-SIZE: 9pt">
											(làm gì, tổ chức nào, đặt trụ sở ở 
											đâu…?)</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">
											................................................................................................................................................................
											</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">
											................................................................................................................................................................
											</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">- Có thân 
											nhân </span>
											<span style="COLOR: black; FONT-SIZE: 9pt">
											(Cha mẹ, Vợ, Chồng, con, anh chị em 
											ruột) </span>
											<span style="COLOR: black">ở nước 
											ngoài </span>
											<span style="COLOR: black; FONT-SIZE: 9pt">
											(làm gì, địa chỉ…) </span>
											<span style="COLOR: black">?</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">
											................................................................................................................................................................
											</span></td>
										</tr>
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 735px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: justify" class="MsoNormal">
											<span style="COLOR: black">
											................................................................................................................................................................
											</span></td>
										</tr>
									</table>
								</div>
								<p style="TEXT-ALIGN: justify" class="MsoNormal">
								<span style="COLOR: black">&nbsp;</span></p>
								<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
								<b><span style="COLOR: black">30. QUAN HỆ GIA 
								ĐÌNH</span></b></p>
								<p style="TEXT-ALIGN: center; TEXT-INDENT: 36pt" class="MsoNormal">
								<b><span style="COLOR: black">a) Về bản thân: 
								Cha, Mẹ, Vợ </span></b>
								<span style="COLOR: black">(hoặc chồng)<b>, các 
								con, anh chị em ruột</b></span></p>
								<div align="center">
									<table style="border:medium none; WIDTH: 745px; BORDER-COLLAPSE: collapse; MARGIN-LEFT: 5.4pt; " id="table26" class="MsoNormalTable" border="1" cellSpacing="0" cellPadding="0">
										<tr>
											<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="88">
											<p style="TEXT-ALIGN: center; LINE-HEIGHT: 18pt" class="MsoNormal" align="center">
											<span style="COLOR: black">Mối quan 
											hệ</span></td>
											<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 4cm; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="151">
											<p style="TEXT-ALIGN: center; LINE-HEIGHT: 18pt" class="MsoNormal" align="center">
											<span style="COLOR: black">Họ và tên</span></td>
											<td style="BORDER-BOTTOM: windowtext 1pt solid; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 2cm; PADDING-RIGHT: 5.4pt; BORDER-TOP: windowtext 1pt solid; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" vAlign="top" width="76">
											<p style="TEXT-ALIGN: center; LINE-HEIGHT: 18pt" class="MsoNormal" align="center">
											<span style="COLOR: black">Năm sinh</span></td>
											<td style="BORDER-BOTTOM: 1pt solid windowtext; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 373px; PADDING-RIGHT: 5.4pt; BORDER-TOP: 1pt solid windowtext; BORDER-RIGHT: 1pt solid windowtext; PADDING-TOP: 0cm" vAlign="top">
											<p style="TEXT-ALIGN: center; LINE-HEIGHT: 18pt" class="MsoNormal" align="center">
											<span style="COLOR: black">Quê quán, 
											nghề nghiệp, chức danh, chức vụ, đơn 
											vị công tác, học tập, nơi ở (trong, 
											ngoài nước); thành viên các tổ chức 
											chính trị-Xã hội…?</span></td>
										</tr>';
			$sql= "SELECT gid,firstname,lastname,sex,relationship,
						  birthday,address,job,job_address,phone,note
				   FROM $prefix"._nhanvien_giadinh." WHERE id='$id' ORDER BY gid";

			$i=1;
			$res=mysql_query($sql);
		while(list($eid, $fname, $lname, $sex, $rela,$birth,$addr,$job,$job_addr,$phone,$note)=mysql_fetch_row($res)){				
			echo'
										<tr style="HEIGHT: 17.8pt">
											<td style="BORDER-BOTTOM: windowtext 1pt dotted; BORDER-LEFT: windowtext 1pt solid; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 49.65pt; PADDING-RIGHT: 5.4pt; HEIGHT: 17.8pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="66">'.$rela.'</td>
											<td style="BORDER-BOTTOM: windowtext 1pt dotted; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 4cm; PADDING-RIGHT: 5.4pt; HEIGHT: 17.8pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="151">'.$fname.' '.$lname.'</td>
											<td style="BORDER-BOTTOM: windowtext 1pt dotted; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 2cm; PADDING-RIGHT: 5.4pt; HEIGHT: 17.8pt; BORDER-TOP: medium none; BORDER-RIGHT: windowtext 1pt solid; PADDING-TOP: 0cm" width="76">'.$birth.'</td>
											<td style="BORDER-BOTTOM: 1pt dotted windowtext; BORDER-LEFT: medium none; PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 373px; PADDING-RIGHT: 5.4pt; HEIGHT: 17.8pt; BORDER-TOP: medium none; BORDER-RIGHT: 1pt solid windowtext; PADDING-TOP: 0cm">'.$addr.'</td>
										</tr>';
		}
			echo'
									</table>
								</div>
								
							
								<div align="center">
									<table style="BORDER-COLLAPSE: collapse; MARGIN-LEFT: 5.4pt" id="table28" class="MsoNormalTable" border="0" cellPadding="0" width="745">
										<tr>
											<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 690px; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top">
											<p class="MsoNormal">
											<span style="COLOR: black">&nbsp;</span></p>
											<p class="MsoNormal"><b>
											<span style="COLOR: black">31) NHẬN 
											XÉT ĐÁNH GIÁ CỦA CƠ QUAN , ĐƠN VỊ 
											QUẢN LÝ SỬ DỤNG CÁN BỘ</span></b></p>
											<p align="justify">'.$refer[content].'</p>
											</td>
										</tr>
									</table>
							

					<div align="center">
						<table style="BORDER-COLLAPSE: collapse" id="table22" class="MsoNormalTable" border="0" cellSpacing="0" cellPadding="0" width=700>
							<tr>
								<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 235.35pt; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top" width="314">
								</td>
								<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 259.1pt; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top" width="345">
								<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
								<span style="COLOR: black">Vĩnh Phúc, ngày&nbsp;&nbsp;&nbsp;&nbsp; tháng&nbsp;&nbsp;&nbsp; năm 20….</span></td>
							</tr>
							<tr>
								<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 235.35pt; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top" width="314">
								<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
								<b><span style="COLOR: black">Người khai</b></span><br>Tôi xin cam đoan về những lời khai trong CB, CNV quyển lý lịch này là đúng sự thật

								<div style="float:right;margin-top:-10px;">Vĩnh Phúc, ngày  &nbsp;&nbsp;  tháng &nbsp;&nbsp;    năm 20… <br><br> <br> <br> <br>  <b>'.$fullname.'</b>		</div>
								</td>
								<td style="PADDING-BOTTOM: 0cm; PADDING-LEFT: 5.4pt; WIDTH: 259.1pt; PADDING-RIGHT: 5.4pt; PADDING-TOP: 0cm" vAlign="top" width="345">
								<p style="TEXT-ALIGN: center" class="MsoNormal" align="center">
								<b><span style="COLOR: black; FONT-SIZE: 11pt">
								Thủ trưởng cơ quan, đơn vị quản lý và sử dụng <br>CB, CNV</span></b> <br>(Ký tên, đóng dấu)</td>
							</tr>
							
						</table>

	</div>
';


?>
	<SCRIPT type=text/javascript>

		function CallPrint(strid)
		{
		var prtContent = document.getElementById(strid);
		var WinPrint =
			window.open('','','left=0,top=0,width=1000px,height=600px,toolbar=0,scrollbars=0,status=0');
			WinPrint.document.write(prtContent.innerHTML);
			WinPrint.document.close();
			WinPrint.focus();
			WinPrint.print();
			WinPrint.close();
			//prtContent.innerHTML=strOldOne;
		}

	</SCRIPT>
<?
include("footer.php");
}
//=======================================================
function Employee_Danhsach_1() {
    global $admin, $eshop_active,$prefix, $user_prefix, $dbi,$useractive,$maxRow,$maxPage,$sortby,$active,$nukeurl,$portalurl,$classification_id,$aid;
    include("header.php");
	
    ?>
			<script>
			function DatGiatri(val)
			{
				document.form1.nhanvien_id.value=val;
			//	document.form1.cmd_xoa.disabled=false;

				document.form1.nhanvien_id.value=val;
				document.form1.Cmd_Infor.disabled=false;
				document.form1.Cmd_Dependent.disabled=false;

				document.form1.Cmd_Address.disabled=false;
			//	document.form1.Cmd_Emergency.disabled=false;

				document.form1.Cmd_WorkInfor.disabled=false;
				document.form1.Cmd_WorkHistory.disabled=false;

				document.form1.Cmd_Move.disabled=false;
				document.form1.Cmd_Training.disabled=false;

				document.form1.Cmd_Education.disabled=false;
				document.form1.Cmd_Record.disabled=false;
				document.form1.Cmd_Skill.disabled=false;
				document.form1.Cmd_Salary.disabled=false;
				document.form1.Cmd_Baohiem.disabled=false;
				document.form1.Cmd_KhenthuongKyluat.disabled=false;
				document.form1.Cmd_TPChinhtri.disabled=false;


			}

			function XoaGiatri()
			{
				document.form1.nhanvien_id.value='';
			//	document.form1.cmd_xoa.disabled=true;

				document.form1.nhanvien_id.value='';
				document.form1.Cmd_Infor.disabled=true;
				document.form1.Cmd_Dependent.disabled=true;

				document.form1.Cmd_Address.disabled=true;
		//		document.form1.Cmd_Emergency.disabled=true;

				document.form1.Cmd_WorkInfor.disabled=true;
				document.form1.Cmd_WorkHistory.disabled=true;
		//		document.form1.Cmd_Move.disabled=true;

				document.form1.Cmd_Education.disabled=true;
				document.form1.Cmd_Record.disabled=true;
				document.form1.Cmd_Training.disabled=true;
				document.form1.Cmd_Baohiem.disabled=true;
				document.form1.Cmd_KhenthuongKyluat.disabled=true;
				document.form1.Cmd_TPChinhtri.disabled=true;

			}
			function ShowForm(val){
				document.form1.nhanvien_id.value=val;
			//	document.form1.cmd_xoa.disabled=false;

				document.form1.nhanvien_id.value=val;
				document.form1.Cmd_Infor.disabled=false;
				document.form1.Cmd_Dependent.disabled=false;
				document.form1.Cmd_Address.disabled=false;
			//	document.form1.Cmd_Emergency.disabled=false;

				document.form1.Cmd_WorkInfor.disabled=false;
				document.form1.Cmd_WorkHistory.disabled=false;

				document.form1.Cmd_Move.disabled=false;
				document.form1.Cmd_Training.disabled=false;

				document.form1.Cmd_Education.disabled=false;
				document.form1.Cmd_Record.disabled=false;
				document.form1.Cmd_Skill.disabled=false;
				document.form1.Cmd_Salary.disabled=false;
				document.form1.Cmd_Baohiem.disabled=false;
				document.form1.Cmd_KhenthuongKyluat.disabled=false;
				document.form1.Cmd_TPChinhtri.disabled=false;
			}
		</script>

	<?
	global $nhanvien_type,$employee_id,$employee_name,$from_date,$to_date,$chinhanhid,$bophanid;
		global $aid;
		if($aid != 'admin'){
			$bophanid = Getname("bophan_id","$prefix"._nhanvien."","id_employee  = '$aid' ");
		}
			


	if($bophanid) $where_bophanid = "AND nv.bophan_id= '$bophanid' ";

	$query = "select nv.id_employee, nv.id, nv.first_name, nv.last_name, nv.birthday, nv.bophan_id ,nv.nhanvien_type,nv.id_chinhanh,cn.sort_order,nv.ngayvaolam
									from $prefix"._nhanvien." nv	
									left join $prefix"._chinhanh." cn
									on(nv.id_chinhanh=cn.id)
									WHERE 1 $where_nhanvien_type $where_employee_id $where_employee_name $where_chinhanhid $where_bophanid
									order by  nv.nhanvien_type ASC ,cn.sort_order ASC";


	$link = "&current_parent_id=$current_parent_id";

		echo'
		<form   method=POST action="admin.php?op=DeleteAllEmployee">
			<div class="rc_btnicon_delete"><input type="button" value="'._DELETE.'" class="rc_btnicon" onclick="CheckDeleteAll(1);" /></div>
			<div class="rc_btnicon_print"><input type="button" value="In danh sách" class="rc_btnicon" onclick="CallPrint(\'printReady\');" /></div>
			';
echo '<div style="float:right;padding-right:15px;">';
	$query_limit = split_pages($query,$link,1);
	$result = mysql_query($query_limit);
echo '</div>';
echo'<div style="clear:both"></div>
<div style="overflow:scroll; overflow-x:hidden; height=215px" >
	<DIV class=widget_tableDiv >
		<TABLE id=myTable>
		  <THEAD>
		  <TR>
			    <TD>TT</TD>
			    <TD><input type="checkbox" name="checkall" onclick="toggleAll(this,1)" id="Checkbox1" /></TD>
				<TD>Mã nhân viên</TD>
				<TD>Tên nhân viên</TD>
				<TD>Chức danh</TD>
				<TD>Phòng ban</TD>
				<TD>Ngày vào làm</TD>
				
				

		  </TR>
		 </THEAD>
		  <TBODY >';
	    $counter = 0;			
		$stt=1;
	    while(list($id_employee, $id, $first_name, $last_name, $birthday, $bophan_id ,$id_nhanvien_type,$id_chinhanh,$sort,$ngayvaolam) = mysql_fetch_row($result)) {
			if($counter % 2 == 0){
				$tblColor = "tblColor1";
				$colorTD = "#ffffff";
			}else{
				$tblColor = "tblColor2";
				$colorTD = "#f4f4f4";
			}
			$counter++; global $bgcolor3;	
				
			$action_checkbox = "<INPUT TYPE=\"checkbox\" NAME=\"id[]\" value=\"$id\">";
			//echo '<INPUT TYPE="hidden" NAME="id[]" value="'.$id.'">';
		if($aid=='admin'){
			$link_view  = 'admin.php?op=CV_Employee&id='.$id.'';
		}else{
			$link_view  = 'admin.php?op=View_Employee&id='.$id.'';
		}
		 
		  echo "<TR class=\"$tblColor\"    onclick=\"Datmau(this, 'red', '#fef7e9','".$stt."'); DatGiatri(".$id.");\" id=\"$stt\">";	
			echo '<TD align=center>'.$stt.'</TD>';
		    echo '<TD align=center>'.$action_checkbox.'</TD>';
			echo'<TD style="padding-left:10px;" >'.$id_employee.'</TD>';
			echo'<TD onclick="ShowForm('.$id.')"><a href="'.$link_view.'">'.$first_name.' '.$last_name.'</a></TD>';
			echo '<TD >'.Getname("name","$prefix"._chucvu ."","  id = '$id_nhanvien_type' ").'</TD>';
			echo '<TD >'.Getname("name","$prefix"._chinhanh  ."","  id = '$id_chinhanh' ").'  '.Getname("name","$prefix"._bophan  ."","  id = '$bophan_id' ").'</TD>';
			echo '<TD align=center >'.$ngayvaolam.'</TD>';

			
			
			echo'</TR>';
			$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV></form>';
		echo '</div>';
		split_pages($query,$link,0);
echo '</div> ';
echo '</div> ';

echo '</FORM>';
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 280 ;
	initTableWidget('myTable',UserWidth,100,Array(false,false,'S','S',false,false,false,false));


	function OnCmd_function(cmd){
		id=document.form1.nhanvien_id.value;
		//alert('admin.php?op=View_'+cmd+'&id='+id);
		
		//displayMessage('admin.php?op=View_'+cmd+'&id='+id,800,530);
		window.location="admin.php?op=View_"+cmd+'&id='+id;
	}
	function AddNew(){
		window.location="admin.php?op=Employee_AddNew";
	}
	</SCRIPT>
<?

    include("footer.php");
}
//=======================================================
function View_Employee($id){
	global $prefix;
    include("header.php");
	
	$sql = "select * from $prefix"._nhanvien." where id='$id'";
	$result = mysql_query($sql);
	$userinfo=mysql_fetch_array($result);

echo '<div style="float:left;width:80%">';
	echo'
    <div class="folder">
        <div class="folder-title">THÔNG TIN CÁ NHÂN : '.$userinfo[first_name].' '.$userinfo[last_name].'</div>
        <div class="folder-content" id="list_option">
            <div style="width:100%; float:left"><!--begin left option-->';
			echo '<div style="float:left;width:67%;">';
					echo '<fieldset style="height:230px;">
						<table width=100% cellpadding=2 cellspacing=2>
							<tr><td width=20%>Mã nhân viên</td><td><INPUT TYPE="text" NAME="" value="'.$userinfo[id_employee].'" style="width:90%"></td></tr>
							<tr><td>Họ đệm</td><td><INPUT TYPE="text" NAME="hodem" value="'.$userinfo[first_name].'" > &nbsp; Tên: <INPUT TYPE="text" NAME="ten" value="'.$userinfo[last_name].'" ></td></tr>
							<tr><td>Ngày sinh</td><td><INPUT TYPE="text" NAME="birthday" value="'.$userinfo[birthday].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.birthday);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
							<tr><td>Nơi sinh</td><td><INPUT TYPE="text" NAME="noisinh" style="width:90%" value="'.$userinfo[noisinh].'"></td></tr>
							<tr><td>Nguyên quán</td><td><INPUT TYPE="text" NAME="nguyenquan"  style="width:90%" value="'.$userinfo[nguyenquan].'"></td></tr>
							<tr><td>Loại nhân viên</td><td>'.SelectBox("loainhanvien","Select id, name from $prefix"._loainhanvien."",$userinfo[loainhanvien],$onchange='',$style='',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
						</table>
						 </fieldset>';
			echo '</div>';
			echo '<div style="float:left;width:30%;padding-left:10px;">';
		echo '<fieldset style="height:230px;">
					<div style="text-align:center;padding-top:5px;">';
			if($userinfo[anh_canhan] && file_exists($userinfo[anh_canhan])){
				echo '<img src="'.$userinfo[anh_canhan].'" width=140 style="border: 1px solid #c0c0c0;padding:2px;">';
			}else{
				echo'<img src="images/noimg.png">';
			}
		echo'		
					</div>
			 </fieldset>';
			echo '</div> <div style="clear:both"></div>';
				echo '<div style="float:left;width:50%">';
						echo '<fieldset  style="height:180px;">
							<table width=100% cellpadding=2 cellspacing=2>
								<tr><td width=30%>Dân tộc</td><td><INPUT TYPE="text" NAME="dantoc" style="width:90%" value="'.$userinfo[dantoc].'"></td></tr>
								<tr><td>Tôn giáo</td><td><INPUT TYPE="text" NAME="tongiao" style="width:90%" value="'.$userinfo[tongiao].'"></td></tr>
								<tr><td>Quốc tịch</td><td>'.SelectBox("quoctich","Select id, name from $prefix"._quoctich."",$userinfo[quoctich],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
								<tr><td>Giới tính</td><td>
									'.SelectBox("gender","Select id, name from $prefix"._sex."",$userinfo[sex],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).' 
								</td></tr>
								<tr><td>Tình trạng hôn nhân</td><td>
									'.SelectBox("marital_status","Select id, name from $prefix"._marital_status."",$userinfo[marital_status],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).' 
									</td></tr>
								<tr><td>Ngày vào làm:</td><td><INPUT TYPE="text" NAME="ngayvaolam" style="width:35%" value="'.$userinfo[ngayvaolam].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.ngayvaolam);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>

							</table>
							 </fieldset>';
				echo '</div>';
				echo '<div style="float:left;width:48%;padding-left:5px;">';
						echo '<fieldset  style="padding:5px;height:172px;">';
									$chinhanhid = Getname("id_chinhanh","$prefix"._bophan."","id='".$userinfo[bophan_id]."'");
									echo select_phongban($userinfo[id_chinhanh],$userinfo[bophan_id]);
									echo'
									<table width=100% cellpadding=2 cellspacing=2>
										<tr><td width=30%>Chức vụ: </td><td>'.SelectBox("nhanvien_type","Select id, name from $prefix"._chucvu ."",$userinfo[nhanvien_type],$onchange='',$style='width:90%',$onclick='',$other='',$title=_SELECTONE).'</td></tr>
										<tr><td>Số CMND:</td><td><INPUT TYPE="text" NAME="cmnd" size=6 value="'.$userinfo[id_card].'"> &nbsp;&nbsp;Ngày cấp : <INPUT TYPE="text" NAME="cmnd_ngaycap" style="width:25%" value="'.$userinfo[date_issue_id_card].'"><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fPopCalendar(document.demoform.cmnd_ngaycap);return false;" ><img name="popcal" style="padding-bottom:7px;" align="absmiddle" src="WeekPicker/calbtn.gif" width="34" height="22" border="0" alt=""></a></td></tr>
										<tr><td>Nơi cấp:</td><td><INPUT TYPE="text" NAME="cmnd_noicap" style="width:90%" value="'.$userinfo[who_issue_id_card].'"></td></tr>

									</table>
									
							 </fieldset>';
				echo '</div> <div style="clear:both"></div>';
  			echo'	
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>';
	echo '</div>';
    include("footer.php");
}
//=======================================================
function DeleteAll_Employee_Out_Index(){
    global $aid,  $prefix, $selectedLang;
	$id=$_POST[id];
		if(count($_POST[id])>0){
			for($i=0;$i<sizeof($_POST[id]);$i++){							
				mysql_query("Delete from $prefix"._nhanvien." where id='".$_POST[id][$i]."'");
			}
		}
	 Header("Location: admin.php?op=Employee_Out_Index");
}
//=======================================================
function View_Refer($id){
include("header.php");
	global $prefix;
	$sql = "select first_name,last_name from $prefix"._nhanvien." where id='$id'";
	$result = mysql_query($sql);
	$info=mysql_fetch_array($result);

echo '<div style="float:left;width:80%">';
	$sql = "select * from $prefix"._nhanvien_refer." 
			where (nhanvien_id='$id')";
	$result = mysql_query($sql);
	$myrow = mysql_fetch_array($result);
	echo'
    <div class="folder">
        <div class="folder-title">NHẬN XÉT ĐÁNH GIÁ CỦA CƠ QUAN: '.$info[first_name].' '.$info[last_name].'</div>
        <div class="folder-content" id="list_option">
            <div style="width:100%; float:left"><!--begin left option-->';
             ?>
		<form name="demoform" method="post" action="admin.php?op=Insert_Refer" >
		<input type="hidden" name="id" value="<?= $id ?>">
		<input type="hidden" name="editid" value="<?= $id ?>">

		  <table border='0' cellspacing='2' cellpadding='2' width=90%>
 		 	  <tr>
				<td width=30%>Nhận xét đánh giá: </td>
				<td><textarea name='content' cols='70' rows=7 style="font-family: Arial; font-size: 9pt;" ><?= $myrow[content]?></textarea> <?echo _REQUIRED?></td>
			  </tr>
 		 	 
		  </table>
		 <?
			echo'	
            </div><!--end left option-->          
            <div style="clear:both"></div>
        </div>							
	</div>';
		echo'
		<div class="rc_navigation" style="padding-left:200px;padding-top:0px;">
					<div id="incomplete_button" >
						<div class="rc_btnicon_save"><input type="submit" value="'._UPDATE.'" class="rc_btnicon"  /></div>
						<div class="rc_btnicon_inactive"><input type="button" onclick="closeMessage_Form(\'Employee_Index\')" value="'._CLOSE.'" class="rc_btnicon"  /></div>
					</div>
		</div>	
		</form>	
		';

		
echo '</div>';
navJob($id,"Cmd_Address");
?>
	<SCRIPT type=text/javascript>
	UserWidth = window.screen.width - 530 ;
	initTableWidget('myTable',UserWidth,0,Array('S','S',false,false,false,false));
	</SCRIPT>
<?
	include("footer.php");
}
//=======================================================
function Insert_Refer(){
	global $prefix;
	$editid = $_POST[editid];
	$res = mysql_query("Select * from  $prefix"._nhanvien_refer ." where nhanvien_id='$_POST[id]' ");
	list($nhanvien_id)=mysql_fetch_row($res);
	IF($nhanvien_id){
		mysql_query("UPDATE $prefix"._nhanvien_refer ." set content  = '$_POST[content]'  where nhanvien_id='$_POST[id]'	 ");
	}ELSE{
		mysql_query("INSERT INTO $prefix"._nhanvien_refer ." values('$_POST[id]','$_POST[content]') ");
	}
	Header("Location: admin.php?op=View_Refer&id=$_POST[id]");
}
//=======================================================


switch($op) {
  case "View_Refer":
    View_Refer($id);
    break;

  case "Insert_Refer":
    Insert_Refer();
    break;

  case "DeleteAll_Employee_Out_Index":
    DeleteAll_Employee_Out_Index();
    break;


  case "View_Employee":
    View_Employee($id);
    break;

  case "CV_Employee":
    CV_Employee($id);
    break;

  case "Done_Step":
    Done_Step($id,$step);
    break;

  case "Employee_Change_fileAtt":
    Employee_Change_fileAtt($id);
    break;

  case "Employee_Delete_fileAtt":
    Employee_Delete_fileAtt($id);
    break;

  case "DeleteAllEmployee":
    DeleteAllEmployee();
    break;


  case "Employee_Import_Xls":
    Employee_Import_Xls();
    break;

  case "Insert_Luong":
    Insert_Luong();
    break;

  case "Insert_Dependent":
    Insert_Dependent();
    break;

  case "Employee_Insert_Data":
    Employee_Insert_Data();
    break;

  case "Employee_Thamnien_Index":
    Employee_Thamnien_Index();
    break;

  case "Employee_Out_Index":
    Employee_Out_Index();
    break;

  case "Employee_Index":
    Employee_Index();
    break;

  case "View_Infor":
    View_Infor($id);
    break;
  
  case "Employee_Update":
    Employee_Update();
    break;

  case "View_Dependent":
    View_Dependent($id);
    break;

  case "View_Address":
    View_Address($id);
    break;

  case "View_Emergency":
    View_Emergency($id);
    break;

  case "View_WorkInfor":
    View_WorkInfor($id);
    break;

  case "View_WorkHistory":
    View_WorkHistory($id);
    break;

  case "View_Education":
    View_Education($id);
    break;

  case "View_Training":
    View_Training($id);
    break;

  case "View_Record":
    View_Record($id);
    break;

  case "View_Move":
    View_Move($id);
    break;

  case "View_Skill":
    View_Skill($id);
    break;

  case "View_Salary":
    View_Salary($id);
    break;

  case "View_Baohiem":
    View_Baohiem($id);
    break;

  case "View_BaohiemYT":
    View_BaohiemYT($id);
    break;

  case "View_BaohiemTN":
    View_BaohiemTN($id);
    break;

  case "View_TPChinhtri":
    View_TPChinhtri($id);
    break;

  case "View_KhenthuongKyluat":
    View_KhenthuongKyluat($id);
    break;

  case "View_Skill":
    View_Skill($id);
    break;

  case "Employee_AddNew":
    Employee_AddNew($id);
    break;

  case "Form_Address":
    Form_Address();
    break;

  case "Form_Suckhoe":
    Form_Suckhoe();
    break;

  case "Form_Chinhtri":
    Form_Chinhtri();
    break;

  case "Form_Other":
    Form_Other();
    break;

  case "Insert_Dependent":
    Insert_Dependent();
    break;

  case "Delete_Dependent":
    Delete_Dependent($id,$eid);
    break;

  case "Insert_Address":
    Insert_Address();
    break;

  case "Insert_WorkHistory":
    Insert_WorkHistory();
    break;


  case "Delete_WorkHistory":
    Delete_WorkHistory($id,$wid);
    break;

  case "Insert_Education":
    Insert_Education();
    break;

  case "Delete_Education":
    Delete_Education($eid,$id);
    break;

  case "Insert_Training":
    Insert_Training();
    break;

  case "Delete_Training":
    Delete_Training($id,$eid);
    break;

  case "Insert_Skill":
    Insert_Skill();
    break;

  case "Insert_Move":
    Insert_Move();
    break;

  case "InsertChinhtri":
    InsertChinhtri();
    break;

  case "Insert_KhenthuongKyluat":
    Insert_KhenthuongKyluat();
    break;

  case "Delete_KhenthuongKyluat":
    Delete_KhenthuongKyluat($eid,$id);
    break;

  case "Insert_WorkInfor":
    Insert_WorkInfor();
    break;

  case "DeleteAll_Move_Emp":
    DeleteAll_Move_Emp();
    break;

  case "Delete_Salary":
    Delete_Salary($sid,$id);
    break;

  case "Insert_Record":
    Insert_Record();
    break;

  case "InsertBaohiem":
    InsertBaohiem();
    break;

  case "Insert_Infor":
    Insert_Infor();
    break;

  case "View_Salary_Customize":
    View_Salary_Customize($id);
    break;

  case "Insert_Luong_Customize":
    Insert_Luong_Customize();
    break;

  case "Delete_Salary_Customize":
    Delete_Salary_Customize($sid,$id);
    break;

  case "Employee_Danhsach":
    Employee_Danhsach();
    break;

  case "Employee_Xls":
    Employee_Xls();
    break;

  case "SearchCode_Employee":
    SearchCode_Employee();
    break;

}

?>