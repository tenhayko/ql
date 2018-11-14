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
global $prefix, $db, $admin_file;

/*********************************************************/
	/* Admin/Authors Functions                               */
/*********************************************************/
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
function displayadmins() {
		global $admin, $prefix, $db, $language, $multilingual, $admin_file, $bgcolor2,$currentlang;
		global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename;
		include 'admin/include/Topmenu_header.php';
	
	include 'header.php';
		
	echo '<div class="header">

<div style=" height:auto;margin:auto; width:80%">';

?>
<script>
		function SuperAdmin(){
		
		}
		function CheckAdmin(){
			  var error = 0;
			  var error_message = "_PLSENTERBLANKFIELD :\n\n";
			  var add_name = document.theForm.add_name.value; 
 			  var add_aid = document.theForm.add_aid.value;   
			  var add_email = document.theForm.add_email.value;  
			  var add_radminsuper = document.theForm.add_radminsuper.checked;
				  fiel = document.theForm.elements['mid[]'];
					notok=true;
					if(fiel.checked==true){
						notok=false;
					}		
					for (i = 0; i < fiel.length; i++)
						if(fiel[i].checked == true){
							notok=false;
						}
				

			  var add_pwd = document.theForm.add_pwd.value;  
			  var add_pwd2 = document.theForm.add_pwd2.value;  

			  if ((add_name == "" || add_name.length < 6)) {
				  error_message = error_message + "* Fullname have at least 6 character \n";
				  error = 1;
			  }

			  if (add_aid == "" ) {
				  error_message = error_message + "* Username have at least 6 character \n";
				  error = 1;
			  }
			  if ((add_email == "" || add_email.length < 6)) {
				error_message = error_message + "* Email address have at least 6 character \n";
				error = 1;
				document.theForm.add_email.focus();
			  }else{	
				SMail = CheckEmailAddress(add_email);
				if(SMail==''){
				 error_message = error_message + "* Email address invalid .\n";
				 error = 1;
				 document.theForm.add_email.focus();
				}
			  }	
		
			 if(add_radminsuper==false ){ 
			  if(notok==true){
				  error_message = error_message + "* Pls, choose any permistion \n";
				  error = 1;
			  }
			 }
			  if ((add_pwd == "" || add_pwd.length < 6)) {
				  error_message = error_message + "* Password have at least 6 character \n";
				  error = 1;
			  }
			  if ((add_pwd2 == "" || add_pwd2.length < 6)) {
				  error_message = error_message + "* Retype Password have at least 6 character \n";
				  error = 1;
			  }
			  if (add_pwd2 != add_pwd ) {
				  error_message = error_message + "* Passwodr and Retype Password is not the same \n";
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
echo'
<div style="height:20px"></div>
		<DIV  style=" height:230px;overflow:auto;">
		<TABLE width="100%" cellpadding="8" bordercolor="#B2DAEE" border="1" style="border-collapse: collapse;">
		  <THEAD>
		  <TR bgcolor="#f6f6f6" align="center" style="font-weight:bold">
				<TD>STT</TD>
				<TD>Tài khoản</TD>
				
				<TD>Email</TD>
				<TD>'._CREATEDATE.'</TD>
				<TD>'._PRIVATES.'</TD>
				<TD>'._FUNCTIONS.'</TD>

		  </TR>
		 </THEAD>
		  <TBODY class=scrollingContent>';

		$stt=1;
		$result = $db->sql_query("SELECT a.aid, a.name, a.email,a.createdate from " . $prefix . "_authors a  where aid <>'admin'
		
		");
		while ($row = $db->sql_fetchrow($result)) {
			if($counter % 2 == 0){
					$tblColor = "tblColor1";
				}else{
					$tblColor = "tblColor2";
				}
				$counter++; 
			$a_aid = trim($row[aid]);
			$name = trim($row[name]);
			$email = trim($row[email]);
			$createdate = $row['createdate'];
		if($a_aid=="admin"){
			$superadmin = '<font class=msg>'._SUPERADMIN.'</font>';
			$btn_delete = '';
		}else{
			
			
			
			
			$superadmin=$name;
			$btn_delete="
			
			
			<a href=\"admin.php?op=DeleteAuthor&amp;uid=$a_aid\" onclick = \"return deleteConfirm('"._SUREDELETE."  $name ?')\"><IMG SRC=\"images/admin/delete.gif\"  BORDER=\"0\" alT=\""._DELETE." $name\" NAME=\"Del$fid\"></a>";
		}
        echo "<tr class=\"$tblColor\" onmouseover=\"if(this != current_row) {this.style.backgroundColor ='#D0DEF0';this.style.color='red'}\" onmouseout=\"if(this!=current_row){this.style.backgroundColor='".$colorTD."';;this.style.color='#111111'}\">
				<td align=\"center\">$stt</td>
				<td align=\"center\">$a_aid</td>
				
				<td align=\"center\"><a href=\"mailto:$email\">$email</a></td>
				<td align=\"center\"> ".date("d/m/Y",$createdate)."</td>
				<td >".Privates($a_aid)."</td>";

				echo "<td align=center>
				<a href=\"admin.php?op=modifyadmin&amp;chng_aid=$a_aid\"><img src=\"images/admin/edit.gif\" alt=\""._EDIT."\" title=\""._EDIT."\" border=\"0\" width=\"17\" height=\"17\"></a>
				
				&nbsp;".$btn_delete."
				
				
				</td>";
				echo "</tr>";
				$stt++;
		}
		echo'</TBODY>';
		echo'</TABLE></DIV>';

		echo"<form action=\"admin.php\" method=\"post\" name=\"theForm\" onSubmit=\"return CheckAdmin();\">";
		echo '<INPUT TYPE="hidden" NAME="add_aid" >';
		echo '<INPUT TYPE="hidden" NAME="fullname" >';

		
		echo "<input type=\"hidden\" name=\"op\" value=\"AddAuthor\">";
		echo'<fieldset ><legend class=legend><img src="images/admin/cn0004-32.gif" align=absmiddle> '._ADDNEWAUTHOR.'</legend>';
		echo "<table border=\"0\" align=center width=100%>"
		.'<tr><td class=key valign=top width=40%>'
			.'<table border=0 width=100%>'
			."<tr><td width=30%>"._FULLNAME." "._REQUIRED.":</td>"
			."<td style='text-align:left'><div style='float:left;'><input type=\"text\" class=\"input_text\" name=\"add_name\"  value=\"$chng_name\" style=\"width:200\" maxlength=\"50\" ></div> <div style='float:left;' class=\"rc_btnicon_search\"></td></tr>"
			."<tr><td>Tài khoản "._REQUIRED.":</td>"
			."<td style='text-align:left'><input type=\"text\" name=\"code\" class=\"input_text\" value=\"$chng_aid\"  style=\"width:99%\" maxlength=\"30\" class=CellTable> </td></tr>"
			."<tr><td>Email:</td>"
			."<td style='text-align:left'><input type=\"text\" name=\"add_email\" class=\"input_text\" value=\"$chng_email\" style=\"width:99%\" maxlength=\"60\" class=CellTable></td></tr>"
			
			."<tr><td>Phone:</td>"
			."<td style='text-align:left'><input type=\"text\" name=\"admlanguage\" class=\"input_text\" value=\"$admlanguage\" style=\"width:99%\" maxlength=\"60\" class=CellTable></td></tr>"
			
			
			."<tr><td>Mật khẩu "._REQUIRED."</td>"
			."<td style='text-align:left'><input type=\"password\" name=\"add_pwd\" class=\"input_text\" style=\"width:99%\" maxlength=\"12\" class=CellTable> </td></tr>"
			
			."<tr><td>"._RETYPEPASSWD." "._REQUIRED.": </td>"
			."<td style='text-align:left'><input type=\"password\" name=\"add_pwd2\" style=\"width:99%\" maxlength=\"12\" class=CellTable></td></tr>"


			.'</table>'
			.'<td>'
			.'<td valign=top width=60%>';
				echo '<table  width=100% cellSpacing=0  border="1" style="border-collapse: collapse">';
					echo '<tr><td class=MenuCell >'._ADMINISTRATOR.'</td>
						<td class=MenuCell width=24%><input type="checkbox" name="add_radminsuper" '.($chng_radminsuper?' checked':'').' value="Admin"  onClick="SuperAdmin()" ></td>
						
					</tr>';	
				echo '</table>';
				echo '<div style="overflow: auto;height:220px;width:100%;">';
				echo '<table width=96%  cellSpacing=0  border="1" style="border-collapse: collapse">';

					$res = mysql_query("select mid,title,custom_title_vietnamese from $prefix"._modules." where inmenu ='1' order by sortorder ");
					while(list($mid,$title_module,$module_name)=mysql_fetch_row($res)){
						echo '<tr style="background:#f4f4f4;">';
							echo '<td style="padding-left:5px;height=21" ><img src="images/open.gif" align=absmiddle>&nbsp;<font class=msg>'.$module_name.'</font></td>';
							
							
							echo '<td align=center width=20%><INPUT TYPE="checkbox" NAME="modules[]" value="'.$title_module.'" '.CheckPrivate($chng_aid,$title_module,'private_read').'></td>';
							
							
							
							
						echo '</tr>';
						$res_sub = mysql_query("select fid,title_vietnamese,url from $prefix"._modules_functions ." where mid ='$mid' order by sort_order");
						while(list($fid,$funcs)=mysql_fetch_row($res_sub)){
							echo '<tr onclick="Datmau(this, \'green\', \'#fef7e9\');">';
								echo '<td style="padding-left:15px;"><img src="images/admin/join.gif" align=absmiddle>&nbsp;'.$funcs.'</td>';
								
								
								
								
								
								echo '<td align=center width=16%>  <INPUT TYPE="checkbox" NAME="funcs[]" value="'.$fid.'" '.CheckPrivate($chng_aid,$title_module,'private_read').'></td>';
								
								
							echo '</tr>';
						}

					}
				echo '</table>';
				echo '</div>';
			echo'</td>'
		.'</tr></table></fieldset >';
									echo'
									<div class="rc_navigation" style="padding-left:300px;">
									<div id="incomplete_button" >
										<input type="button" value="'._ADDNEW.'" class="bot" onclick="submit();" />
										<a href="'.$portalurl.'/vnadmin" class="bot" style="padding:3px">Quay lại trang chủ</a>
									</div>
									</div>	';

		echo"</form>";	
?>
	<script>
		UserWidth = window.screen.width - 250 ;
		initTableWidget('myTable',UserWidth,0,Array(false,'S','S',false,false,false,false));
		function SearchUser(){
			displayMessage('admin.php?op=Search_User',500,400);
		}
	</script>
<?
    include("footer.php");    
}
//===============================================================
function Search_User(){
	global $prefix,$maxRow,$maxPage;
	$maxRow=200;
	$res = mysql_query("Select id, name from $prefix"._chinhanh." order by sort_order");

echo '<div style="float:center;width:99%">';		
echo'
		<DIV class=widget_tableDiv style="overflow: auto;height:360px;width:500px;">
		<TABLE  width=100%>
		  <THEAD>
		  <TR>
				<TD></TD>
				<TD>Họ tên</TD>
				<TD>Chức danh</TD>
				<TD></TD>
		  </TR>
		 </THEAD>
		  <TBODY class=scrollingContent >';
	    $counter = 0;			
		$stt=1;
		while(list($id,$phongban)=mysql_fetch_row($res)){
				$query = "select nv.id, nv.id_employee,nv.first_name, nv.last_name, nv.nhanvien_type
												from $prefix"._nhanvien." nv	
												where nv.id_chinhanh='$id'
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
				echo'<TD ><a href="#" onclick="ReturnCode(\''.$email.'\',\''.$first_name.' '.$last_name.'\',\''.$email.'\')">'.$first_name.' '.$last_name.'</a></TD>';
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
		function ReturnCode(id_employee,fullname,email){
			document.theForm.add_aid.value=id_employee;
			document.theForm.code.value=id_employee;
			document.theForm.add_name.value=fullname;
			document.theForm.fullname.value=fullname;
			document.theForm.add_email.value=email;

			closeMessage();
		}
	</script>
<?
}
//===============================================================
function AddAuthor(){
	global $prefix,$db,$language,$adminmail,$portalurl;
    $add_aid = $_POST[code];
    $add_name = $_POST[add_name];
    $add_pwd = $_POST[add_pwd];
    $addpwd = md5($add_pwd);
	$add_pwd2 = $_POST[add_pwd2];
	$add_email = $_POST[add_email];
	$radminsuper= $_POST[add_radminsuper];
	$fullname = $_POST[fullname];
	$private_modules ='';
	$res = mysql_query("Select aid,email from $prefix"._authors." where aid = '$add_aid' ");
	list($username,$email)=mysql_fetch_row($res);
	IF($username==$add_name){
		$str = " * "._DUPLICATEUSERNAME."";
	}
	IF($email==$add_email){
		$str .= "<br> * "._DUPLICATEEMAIL."";
	}
	
	
	if($addpwd != $add_pwd2){
		
	}
	
	//if(!mysql_num_rows($res)){
		
		if($add_pwd == $add_pwd2){
		$result = $db->sql_query("insert into " . $prefix . "_authors(aid,name,email,pwd,admlanguage,createdate) values ('$add_aid', '$add_name', '$add_email', '$addpwd', '$language','".time()."')");
		IF($radminsuper){
			$result = $db->sql_query("insert into " . $prefix . "_modules_authors(aid,superadmin,module) values ('$add_aid',1,'Admin')");
			$private_modules  = 'Administrator';
		}ELSE{
			$private_modules = '';
			for($i=0;$i<sizeof($_POST[modules]);$i++){	
						mysql_query ("Insert into $prefix"._modules_authors."(aid,module,view) values('$add_aid','".$_POST[modules][$i]."','1')");			
						$private_modules .= Getname("custom_title_vietnamese","$prefix"._modules." ", "title = '".$_POST[modules][$i]."' ");
						$private_modules .= '<br>';
			}
			$private_funcs = '';
			for($i=0;$i<sizeof($_POST[funcs]);$i++){	
						mysql_query ("Insert into $prefix"._modules_authors."(aid,funcs,view,edit_mod) values('$add_aid','".$_POST[funcs][$i]."','1','".$_POST[edit_mod][$i]."')");
						
						$private_funcs .= Getname("title_vietnamese","$prefix"._modules_functions." "," fid = '".$_POST[funcs][$i]."' ");
						$private_funcs .= '<br>';

			}
		}

		/*	$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "To: $fullname <$add_email>\r\n";
			$headers .= "From: pvpowerland@gmail.com\r\n";
			 
			$contentEmail =  '<div style="padding:10px;">
			<fieldset  style="width:500; height:158; padding:10px">
				<b>Xin chào: '.$fullname.'</b> <br>
				Xin vui lòng đăng nhập <a href="'.$portalurl.'"><b><u>Hệ thống Quản trị nhân sự</u></b></a> : 

				với tài khoản sau đây: <br>
				Tên đăng nhập: '.$add_aid.' <br>
				Mật khẩu: '.$add_pwd.' <br>
				<hr style="border: 1px dotted #808080">
				Quyền thao tác trong hệ thống: <br>
				'.$private_modules.' <br>
				'.$private_funcs.' <br>
				URL: <a href="'.$portalurl.'"><b>'.$portalurl.'</b></a>
			</fieldset>	
			</div>
			';
			if(mail($add_email, "TAI KHOAN DANG NHAP HE THONG NHAN SU", $contentEmail, $headers)){
			}else{
				die("Gửi email bị lỗi");
			}*/

		Header("Location: admin.php?op=mod_authors");
		
		
	}else{
		echo "<script>alert('Mật khẩu không trùng nhau');location.href='".$_SERVER['HTTP_REFERER']."';</script>";
	}
}
//===============================================================
function phan_quyen() {
	global $admin, $prefix, $db, $multilingual, $admin_file,$language;
	include("header.php");
	
	if($_GET['aid']){
		
		$aid=$_GET['aid'];
		 $del=$_GET['del'];
		$sql=mysql_query("Update ".$prefix."_modules_authors
										SET edit_mod ='0',view_mod='0' where funcs='$del' and aid='$aid'  ");
		
	}
	if($_POST['Submit']){
	for($i=0;$i<sizeof($_POST['edit_mod']);$i++){
	
	   $edit_mod =$_POST['edit_mod'][$i];
		$aid=$_POST['aid'];
	$s2=mysql_query ("Update ".$prefix."_modules_authors
										SET edit_mod ='$edit_mod' where funcs='$edit_mod' and aid='$aid'  ");
	
	}
	//----------------------------------------------------
	
	for($i=0;$i<sizeof($_POST['view_mod']);$i++){
	
	   $view_mod =$_POST['view_mod'][$i];
		$aid=$_POST['aid'];
	$s1=mysql_query("Update ".$prefix."_modules_authors
										SET view_mod ='$view_mod' where funcs='$view_mod' and aid='$aid' ");
	
	}
	//----------------------------------------------------
	}
	
		

	$aid_se=$_POST['aid'];
	echo '
	<div style="height:30px"></div>
	
	<FORM  id=demoform name=demoform method=POST action="admin.php?op=phan_quyen" enctype="multipart/form-data"   >
	<div style=" margin-left:100px">
	Tên đăng nhập :<input name="aid"  size="30"  type="text" />
	 <input type="submit" class="btn_c_form" name="search" value="Tìm kiếm" > 
	 </div>
	</form>
	
	
	<FORM  id=demoform name=demoform method=POST action="admin.php?op=phan_quyen"  enctype="multipart/form-data"  >
	
	
	<table width="100%" cellpadding="8" bordercolor="#B2DAEE" border="1" style="border-collapse: collapse;">
  <tr bgcolor="#f5f5f5" align="center" style="font-weight:bold">
    <td>Tên đăng nhập</td>
    <td>Email</td>
    <td>Module</td>
    <td>&nbsp;</td>
  </tr>
  ';
  $sql=mysql_query("Select aid,email  FROM $prefix"._authors." where name='' and aid='$aid_se' ");
 
  while(list($aid,$email)=mysql_fetch_array($sql)){
  echo '
  
  <input type="hidden" value="'.$aid_se.'" name="aid" >
  <tr align="center">
    <td>'.$aid.'</td>
    <td>'.$email.'</td>
	
	';
	 $s=mysql_query("Select a.funcs,a.edit_mod,a.view_mod,b.title_vietnamese  FROM $prefix"._modules_authors." a
	 
	 								LEFT JOIN $prefix"._modules_functions." b
									ON (a.funcs=b.fid)
									
	  where a.aid='$aid' and a.funcs <>0 order by b.fid asc  ");
 
 
 

	 
    echo '<td>';
   
	 while(list($funcs,$edit_mod,$view_mod,$title_vietnamese)=mysql_fetch_array($s)){
		 
		
		 
	echo ' <div style=" width:200px;float:left"><a href="admin.php?op=phan_quyen&aid='.$aid.'&del='.$funcs.'">'.$title_vietnamese.'</a></div>
	<INPUT  type="checkbox"  name="edit_mod[]" value="'.$funcs.'" '.($edit_mod == $funcs ?  "checked" : "").'>Quản lý
	<INPUT  type="checkbox"  name="view_mod[]" value="'.$funcs.'" '.($view_mod == $funcs ?  "checked" : "").'>Xem
	
	  </div><div>  </div>'; 
	 }
	 echo '
	</td>';
  
	echo'
    <td>&nbsp;</td>
  </tr>';
  }
  echo '
  <input type="submit" class="btn_c_form" name="Submit" value="Thiết lập" > 
  </form>
</table>

	
	';
	
	include("footer.php");
}
//===============================================================
function modifyadmin($chng_aid) {
	global $admin, $prefix, $db, $multilingual, $admin_file,$language;
	global $prefix,$currentlang,$aid,$sortorder,$portalurl,$sitename;
	
	
	include 'admin/include/Topmenu_header.php';
	
	include 'header.php';
		
	echo '<div class="header">

<div style=" height:auto;margin:auto; width:80%">';
	$res_edit = mysql_query("Select name,email,admlanguage  from ".$prefix."_authors where aid = '$chng_aid' ");
	list($chng_name,$chng_email,$admlanguage)=mysql_fetch_row($res_edit);
	$res = mysql_query("Select superadmin from $prefix"._modules_authors ." where aid  = '$chng_aid' ");
	list($chng_radminsuper)=mysql_fetch_row($res);
	
		echo"<form action=\"admin.php\" method=\"post\" name=\"theForm\" onSubmit=\"return CheckAdmin();\">";
		echo "<input type=\"hidden\" name=\"op\" value=\"UpdateAuthor\">";
		echo "<input type=\"hidden\" name=\"add_aid\" value=\"$chng_aid\">";
		echo "<input type=\"hidden\" name=\"fullname\" value=\"$first_name $last_name\">";
		echo'<fieldset ><legend class=legend><img src="images/admin/cn0004-32.gif" align=absmiddle> Sửa đổi thông tin</legend>';
		echo "<table border=\"0\" align=center width=100%>"
		.'<tr><td class=key valign=top>'
			.'<table width=100%>'

			

			."<tr><td>Họ và Tên:</td>"
			."<td style='text-align:left'><input type=\"text\" name=\"chng_name\"   value=\"$chng_name\" size=\"30\" maxlength=\"30\" class=input_text> </td></tr>"
				
			."<tr><td>"._NICKNAME." "._REQUIRED.":</td>"
			."<td style='text-align:left'><input type=\"text\"  name=\"add_aid\" disabled  value=\"$chng_aid\" size=\"30\" maxlength=\"30\" class=input_text> </td></tr>"
			."<tr><td>"._EMAIL." "._REQUIRED.":</td>"
			."<td style='text-align:left'><input type=\"text\" name=\"add_email\" value=\"$chng_email\" size=\"30\" maxlength=\"60\" class=input_text></td></tr>"
			
			."<tr><td>Phone:</td>"
			."<td style='text-align:left'><input type=\"text\" name=\"admlanguage\" class=\"input_text\" value=\"$admlanguage\" size=\"30\" maxlength=\"60\" class=CellTable></td></tr>"
			
			
			."<tr><td>"._PASSWORD." "._REQUIRED."</td>"
			."<td style='text-align:left'><input type=\"password\" name=\"add_pwd\" size=\"15\" maxlength=\"12\" class=input_text> </td></tr>"
			."<tr><td>"._RETYPEPASSWD." "._REQUIRED.": </td>"
			."<td style='text-align:left'><input type=\"password\" name=\"add_pwd2\" size=\"15\" maxlength=\"12\" class=input_text></td></tr>"
			.'</table>'
			.'</td>'
			.'<td valign=top width=65%>';
				echo '<table width=100% id=mytable cellSpacing=0  border="1" style="border-collapse: collapse">';
					echo '<tr><td class=MenuCell >'._ADMINISTRATOR.'</td>
						<td class=MenuCell width=24%><input type="checkbox" name="add_radminsuper" '.($chng_radminsuper?' checked':'').' value="Admin"  onClick="SuperAdmin()" ></td>

					</tr>';	
				echo '</table>';
				echo '<div style="overflow: auto;height:400px;width:100%;">';
				echo '<table width=96%  cellSpacing=0  border="1" style="border-collapse: collapse">';

					$res = mysql_query("select mid,title, custom_title_vietnamese from $prefix"._modules." where inmenu ='1' order by sortorder ");
					while(list($mid,$title_module,$module_name)=mysql_fetch_row($res)){
						echo '<tr style="background:#f4f4f4;">';
							echo '<td style="padding-left:5px;height=21" ><img src="images/open.gif" align=absmiddle>&nbsp;<font class=msg>'.$module_name.'</font></td>';
							
							echo '<td align="center">Quản lý</td>';
							echo '<td align=center width=20%><INPUT TYPE="checkbox" NAME="modules[]" value="'.$title_module.'" '.CheckPrivate($chng_aid,$title_module).'>
							
							<a href="admin.php?op=delete_chaquyen&chng_aid='.$chng_aid.'&fid='.$title_module.'"><img title="Xóa dữ liệu" src="images/admin/16_close.gif" border="0" ></a>
							
							</td>';
							
							
						echo '</tr>';
						$res_sub = mysql_query("select fid,title_vietnamese,url from $prefix"._modules_functions ." where mid ='$mid' order by sort_order");
						while(list($fid,$funcs)=mysql_fetch_row($res_sub)){
							
							
							echo '<tr onclick="Datmau(this, \'green\', \'#fef7e9\');">';
								echo '<td style="padding-left:15px;"><img src="images/admin/join.gif" align=absmiddle>&nbsp;'.$funcs.'</td>';
								
								echo '<td align=center width=20%><INPUT TYPE="checkbox" NAME="edit_mod[]" value="'.$fid.'" '.CheckPrivateFuncs1($chng_aid,$fid).'>
								<a href="admin.php?op=delete_phanquyen&chng_aid='.$chng_aid.'&fid='.$fid.'"><img src="images/cmd_xoa.gif" border="0" ></a>
								
								
								</td>';
								
								echo '<td align=center width=20%><INPUT TYPE="checkbox" NAME="funcs[]" value="'.$fid.'" '.CheckPrivateFuncs($chng_aid,$fid).'>
								<a href="admin.php?op=delete_moquyen&chng_aid='.$chng_aid.'&fid='.$fid.'"><img title="Xóa dữ liệu" src="images/cmd_xoa.gif" border="0" ></a>
								</td>';
								
								
							
							echo '</tr>';
						}

					}
				echo '</table>';
				
			echo'</td>'
		.'</tr></table></fieldset >';
									echo'
									<div class="rc_navigation" style="padding-left:300px;">
									<div id="incomplete_button" >
										<div class="rc_btnicon_renew"><input type="button" value="'._UPDATE.'" class="rc_btnicon" onclick="submit();" /></div>
										<div class="rc_btnicon_back"><a href="javascript:history.go(-1)"><input type="button" value="'._BACK.'" class="rc_btnicon" onclick="Goback();" /></a></div>
										
									</div>
									</div>	';

		echo"</form>";			
	include("footer.php");
}
//===============================================================

function delete_phanquyen($chng_aid,$fid){
	 global $prefix,$db,$language,$portalurl;
	 $sql=mysql_query("Update ".$prefix."_modules_authors
										SET edit_mod ='0' where funcs='$fid' and aid='$chng_aid'  ");
										
		Header("Location: admin.php?op=modifyadmin&chng_aid=$chng_aid");
										
}
//------------------------------------------
function delete_moquyen($chng_aid,$fid){
	 global $prefix,$db,$language,$portalurl;
	 
	 
	 mysql_query("DELETE FROM ".$prefix."_modules_authors WHERE funcs='$fid' and aid='$chng_aid'   "); 
	 
	 
	 
										
		Header("Location: admin.php?op=modifyadmin&chng_aid=$chng_aid");
										
}
//------------------------------------------
function delete_chaquyen($chng_aid,$fid){
	 global $prefix,$db,$language,$portalurl;
	 
	 
	 mysql_query("DELETE FROM ".$prefix."_modules_authors WHERE module='$fid' and aid='$chng_aid'   "); 
	 
	 
	 
										
		Header("Location: admin.php?op=modifyadmin&chng_aid=$chng_aid");
										
}
//===============================================================
function UpdateAuthor(){
	global $prefix,$db,$language,$portalurl;
    $add_aid = $_POST[add_aid];
    $add_name = $_POST[add_name];


	$chng_name = $_POST[chng_name];
	$admlanguage=$_POST['admlanguage'];

	$add_pwd2 = $_POST[add_pwd2];
	$add_email = $_POST[add_email];
	$radminsuper= $_POST[add_radminsuper];
	$fullname = $_POST[fullname];

	$res = mysql_query("Select email from $prefix"._authors." where aid <> '$add_aid' and email = '$add_email'  ");

	if(!mysql_num_rows($res)){
		$add_pwd = $_POST[add_pwd];
		if($add_pwd){
			$addpwd = md5($add_pwd);
			$update_Passwd = "pwd = '$addpwd',";
		}
		$result = $db->sql_query("Update " . $prefix . "_authors 
										SET name ='$add_name',
											email = '$add_email',
											name = '$chng_name',
											".$update_Passwd."
											admlanguage = '$admlanguage',
											createdate  ='".time()."' 
										Where aid = '$add_aid'
								");
		IF($radminsuper){
			$result = $db->sql_query("Delete from  " . $prefix . "_modules_authors where aid='$add_aid'");
			
			$res = mysql_query("Select superadmin from ".$prefix."_modules_authors where aid = '$add_aid' ");
			if(mysql_num_rows($res)){
				$result = $db->sql_query("Update " . $prefix . "_modules_authors Set module ='Admin', superadmin=1 where aid = '$add_aid' ");
			}else{
				$result = $db->sql_query("insert into " . $prefix . "_modules_authors(aid,module,superadmin) values ('$add_aid','Admin',1)");
			}
			$private_modules  = 'Administrator';

			}ELSE{
			
			$result = $db->sql_query("Delete from  " . $prefix . "_modules_authors where aid='$add_aid' and module='Admin'");
			$private_modules = '';
			for($i=0;$i<sizeof($_POST[modules]);$i++){				
				//mysql_query("Insert into $prefix"._modules_authors."(aid,module,view) values('$add_aid','".$_POST[modules][$i]."','1')");
				
				mysql_query ("Insert into $prefix"._modules_authors."(aid,module,view) values('$add_aid','".$_POST[modules][$i]."','1')");
				
				
				$private_modules .= Getname("custom_title_vietnamese","$prefix"._modules." where title = '".$_POST[modules][$i]."' ");
			}
			
			//---------------phan quyen nho hon-----------------------------------
			for($i=0;$i<sizeof($_POST['edit_mod']);$i++){
					
					   $edit_mod =$_POST['edit_mod'][$i];
						
						$funcs=$_POST['funcs'][$i];
						
					mysql_query ("Update ".$prefix."_modules_authors
														SET edit_mod ='$edit_mod' where funcs='$edit_mod' and aid='$add_aid'  ");
					
					}
			//-----------------------------------------------
			/*for($i=0;$i<sizeof($_POST['funcs']);$i++){
					
					   $funcs =$_POST['funcs'][$i];
						
						$funcs=$_POST['funcs'][$i];
						
					mysql_query ("Update ".$prefix."_modules_authors
														SET funcs ='$funcs' where funcs='$funcs' and aid='$add_aid'  ");
					
					}	
					*/
					
				$private_funcs = '';	
			for($i=0;$i<sizeof($_POST[funcs]);$i++){	
				
					
			mysql_query("Insert into $prefix"._modules_authors."(aid,funcs,view) values('$add_aid','".$_POST['funcs'][$i]."','1')");
						
						$private_funcs .= Getname("title_vietnamese","$prefix"._modules_functions." where fid = '".$_POST[funcs][$i]."' ");
			}
		
		
		}
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=utf-8\r\n";
			$headers .= "To: $fullname <$add_email>\r\n";
			$headers .= "From: trungtv@qts.com.vn\r\n";
			 
			$contentEmail =  '<div style="padding:10px;">
			<fieldset  style="width:500; height:158; padding:10px">
				<b>Xin chào: '.$fullname.'</b> <br>
				Xin vui lòng đăng nhập <a href="'.$portalurl.'index.php?active=1"><b><u>Hệ thống Quản trị nhân sự</u></b></a> : 

				với tài khoản sau đây: <br>
				Tên đăng nhập: '.$add_aid.' <br>
				Mật khẩu: '.$add_pwd.' <br>
				<hr style="border: 1px dotted #808080">
				Quyền thao tác trong hệ thống: <br>
				'.$private_modules.' <br>
				'.$private_funcs.' <br>
				URL: <a href="'.$portalurl.'"><b>'.$portalurl.'index.php?active=1</b></a>
			</fieldset>	
			</div>
			';
			mail($add_email, "TAI KHOAN DANG NHAP HE THONG ", $contentEmail, $headers);

		Header("Location: admin.php?op=modifyadmin&chng_aid=$add_aid");
	}else{
		$str = _ERROR;
		$str .= "<br> * "._DUPLICATEEMAIL."";
		msg_box($str);
	}
}
//=================================================================

//===============================================================

//===============================================================

function DeleteAuthor($uid){
	global $prefix,$db;
	$result = $db->sql_query("Delete from  " . $prefix . "_authors where aid='$uid'");
	$result = $db->sql_query("Delete from  " . $prefix . "_modules_authors where aid='$uid'");
	Header("Location: admin.php?op=mod_authors");

}
//====================================================
function CheckPrivate($chng_aid,$title_module){
	global $prefix;
	if($chng_aid){
	$res = mysql_query("Select view from  $prefix"._modules_authors." where aid = '$chng_aid' and module = '$title_module'  ");
	echo mysql_error();
	list($checkPrivate) = mysql_fetch_row($res);
	if($checkPrivate==1) return 'checked disabled="disabled"';
	else return '';
	}
}
function CheckPrivateFuncs($chng_aid,$fid){
	global $prefix;
	if($chng_aid){
	$res = mysql_query("Select view from  $prefix"._modules_authors." where aid = '$chng_aid' and funcs  = '$fid'  ");
	echo mysql_error();
	list($checkPrivate) = mysql_fetch_row($res);
	if($checkPrivate==1) return 'checked disabled="disabled"';
	else return '';
	}
}
//------------------------------------------
function CheckPrivateFuncs1($chng_aid,$fid){
	global $prefix;
	if($chng_aid){
	$res = mysql_query("Select edit_mod from  $prefix"._modules_authors." where aid = '$chng_aid' and funcs  = '$fid'  ");
	echo mysql_error();
	
	list($checkPrivate) = mysql_fetch_row($res);
	
	
	if($checkPrivate==$fid) return 'checked';
	else return '';
	}
}
//====================================================
function Privates($a_aid){
	global $prefix;
	$res = mysql_query("Select module from  $prefix"._modules_authors." where aid = '$a_aid'   ");
	$private_module='';
	while(list($module) = mysql_fetch_row($res)){
		if($module){
		$private_module.= $module.',&nbsp;';
		}
	}
return $private_module;

}

//====================================================
	switch ($op) {

		case "Search_User":
		Search_User();
		break;

		case "CheckPrivate":
		CheckPrivate($aid,$module,$private);
		break;

		case "mod_authors":
		displayadmins();
		break;

		case "modifyadmin":
		modifyadmin($chng_aid);
		break;
		
		
		case "modify_phanquyen":
		modify_phanquyen($chng_aid);
		break;


		case "delete_phanquyen":
		delete_phanquyen($chng_aid,$fid);
		break;
		
		
		case "delete_moquyen":
		delete_moquyen($chng_aid,$fid);
		break;
		
		case "delete_chaquyen":
		delete_chaquyen($chng_aid,$fid);
		break;




		case "UpdateAuthor":
		UpdateAuthor();
		break;

		case "AddAuthor":
		AddAuthor();
		break;
		
		case "phan_quyen":
		phan_quyen();
		break;

		case "DeleteAuthor":
		DeleteAuthor($uid);
		break;

	}

?>