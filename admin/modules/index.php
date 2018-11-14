<?php
if (!@eregi("modules.php", $PHP_SELF)) {
    die ("You can't access this file directly...");
}
require_once("mainfile.php");
$module_name="FAQs";
function titlemodule(){
	global $prefix,$mcid;
		$query = "SELECT content_category_title 
				  FROM $prefix"._content_category." 
				  WHERE content_category_id = '$mcid'";

		$result = mysql_query($query);
		list($content_category_title) = mysql_fetch_row($result);
		if($content_category_title){
			$contenttitle = " > $content_category_title";
		}

			echo"<table width=\"100%\" cellpadding=0 cellspacing=0 border=0>
			<tr>
				<td width=\"3%\" height=33><font color=\"#000080\"><img src=\"images/arrow.gif\" align=absmiddle>&nbsp;</td>
				<td><font class=titleMN>"._FAQ."&nbsp; $contenttitle</font></td>
			</tr>
			<tr>
				<td colspan=2 height=1 background='images/line.gif'></td>
			</tr>
		 </table>
		";
}
/*-----------------------------------------------------------------*/



function main(){
include("header.php");
global $currentlang,$prefix,$mcid,$cid,$maxRow,$maxPage,$pos,$ThemeSel,$lang;

if($cid) $where_cid = "AND id_cat = '$cid' ";


	$sl_sub = "select qid,title,question,date,user_name,user_email 
			from  $prefix"._faq_question ." 
			where is_active  ='1' $where_cid";
	$links = "&menuid=$menuid&catid=$catid#$catid";	
	$query_limit = split_pages($sl_sub, $links,1);
	$rs = mysql_query($query_limit);
	$max_row = mysql_num_rows($rs);

echo"
              <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"98%\" id=\"AutoNumber11\" align=center>
                <tr>
                  <td height=\"19\">
				<form method=POST action=\"\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"100%\" id=\"AutoNumber12\">
                    <tr>
                      <td width=\"25%\" height=\"19\" >
                      <a name=\"$catid\"><img border=\"0\" src=\"images/icon/faqfolder.gif\" align=absmiddle></a>&nbsp;<font class=msg>"._FAQS."</font></td>
                      <td align=right><font style=\"font-size: 9pt; font-weight: 700\" face=\"Arial\" color=\"#800000\">
					".SelectBox("cid","Select id_cat,categories from $prefix"._faqcategories." where flanguage= '$currentlang' ",$cid,1,"font-family: Arial; font-size: 8.5pt; color: #808080; border: 1px solid #C0C0C0; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px; background-color: #FFFCF9",$onclick='',$other='')."</font></td>
                    </tr>
						<tr><td colspan=2 background='images/e_dot.gif' height=2></td></tr>
                  </table>
				</form>
                  </td>
                </tr>
                <tr>
                  <td style=\"border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: solid; border-bottom-width: 1\" bordercolor=\"#B7CDE4\" bgcolor=\"#F1F2F3\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"100%\" id=\"AutoNumber13\">";
				  $i=1;
					while(list($id,$title,$question,$date,$username,$email)=mysql_fetch_row($rs)){
						if($max_row>=10){
							$maxQ = $i+$pos;
						}else{
							$maxQ = $i;
						}
							echo"
								<tr>
								  <td>
									<table width=100% cellpadding=0 cellspacing=0 border=0>
										<tr>
											<td  valign=top><p style=\"line-height: 150%; margin-top: 3; margin-left: 3\"><font class=navMenu> "._QUESTIONNAME."</font>:  
												<a href='modules.php?name=FAQs&op=details&id=$id&mcid=$cid' class=titlenews>$title</a><br>".modifier_truncate($question,200,'...')."
											</td>
										</tr>
										<tr><td height=30 ><p style=\"line-height: 150%; margin-left: 5\">&nbsp;<i><font class='answer'>"._USERASK.": </font><font color=#0000CC>$username. "._EMAIL.": <a href='mailto: $email' class=answer>$email</a></font></i></td></tr>
										<tr>
											<td  valign=top><p style=\"line-height: 150%; margin-top: 3; margin-left: 3\">".viewanswer($id)."
											</td>
										</tr>
									</table>							
									
								 </td>
								</tr>";

							echo "<tr><td height=1 background=\"images/e_dot.gif\"></td></tr>";

							$i++;
					}
					echo"

                    <tr>
                      <td height=\"35\" valign=\"bottom\">
						<table width=100%>	
							<tr>
								<td></td>
								<td>";
									split_pages($sl_sub, $links);
						echo"</td>
							</tr>
						</table>
					";
						  
					echo"	
					 </td>
                    </tr>
                  </table>
                  </td>
                </tr>
              </table><br>
";

$form_block = "
    <center>
    <FORM METHOD=\"post\" ACTION=\"modules.php?name=$module_name\">";
?>
<SCRIPT language=JavaScript>
function CheckSubmit(){
document.ContactUs.fName.value = document.ContactUs.fName.value;
	if (document.ContactUs.fName.value == '')
	{
		alert('<?echo _INSERTNAME?>');
		document.ContactUs.fName.focus();
		return;
	}

	if ((SEmail = CheckEmailAddress(document.ContactUs.fEmail.value))=='')
	{
		alert('<?echo _INVALIDEMAIL?>');
		document.ContactUs.fEmail.focus();
		return;
	}

	document.ContactUs.fEmail.value = SEmail;

	if (document.ContactUs.category.value == '')
	{
		alert('<?echo _SELECTCATEGORY?>');
		document.ContactUs.category.focus();
		return;
	}

	if (document.ContactUs.title.value == '')
	{
		alert('<?echo _INSERTTITLE?>');
		document.ContactUs.title.focus();
		return;
	}

	document.ContactUs.submit();

}
</SCRIPT>

<form method="post" action="modules.php?name=FAQs&op=sendfaq" name="ContactUs">
<table border="0"  cellpadding="0" cellspacing="0" style="border-collapse: collapse" bordercolor="#CCCCCC" width="90%" id="AutoNumber9" align="center" class=table002>
	<tr><td align="center" height='25' ><?echo _SENDQUESTION?></td></tr>
              <tr>                
                <td align="center"><br>
				<TABLE  borderColor=#FFFFFF border=0 width="100%" cellpadding=0 cellspacing=0 align="center" class=table002>
				<TR><TD>
					<table width="100%%" border=0 cellpadding=0 cellspacing=0 class=table002>	
						<tr><td height="29" width="20%">&nbsp;&nbsp;<font class='faq'><? echo _FULLNAME ?> : </td><td><INPUT type="text" NAME="fName"  SIZE=30> <font class="footer">( * )</font></td></tr>
						<tr><td height="35">&nbsp;&nbsp;<font class='faq'><? echo _EMAIL ?>: </td><td><INPUT type="text" NAME="fEmail"  SIZE=25> <font class="footer">( * )</font></td></tr>
						<tr><td height="25">&nbsp;&nbsp;<font class='faq'><?echo _CATEGORY?></td><td>
						<select name = 'category'>
						<?
							$sl = "select id_cat,categories from $prefix"._faqcategories."	 ";
							$res = mysql_query($sl);
							while(list($c_id,$c_title)=mysql_fetch_row($res)){
								echo "<option value=\"$c_id\" ".($cid == $c_id ?  "selected" : "").">$c_title</option>";
							}
						?>
						</select> <font class="footer">( * )</font>
						</td></tr>
						<tr>
						<td height="25" valign=top>&nbsp;&nbsp;<font class='faq'><?echo _QUESTIONNAME?></td>
						<td><INPUT type="text" NAME="title"  SIZE=50> <font class="footer">( * )</font></td></tr>
						<tr>
						<td height="25" valign=top>&nbsp;&nbsp;<font class='faq'><?echo _CONTENT?> <font class="footer">( * )</font></td>
						<td height="25" >

							<?
								echo composerBasic("fContent",$fContent);
							?>
						</td>
						</tr>
						<tr><td colspan=2 align="center" height=30>
						<BUTTON 
		                    class=block
			                name=cmdOK onclick=CheckSubmit()><?echo _SEND?></BUTTON> 
						&nbsp;&nbsp;
						<BUTTON 
		                    class=block
			                >&nbsp;<?echo _RESET?></BUTTON> 
						</td></tr>
					</table>
					</TD>
					</TR></TABLE>									
				</td>
                
              </tr>
              
            </table>    
			<input type="hidden" name="checkform" value="question">
<?
echo" </FORM></center>";
include("footer.php");
}
//====================================
function viewanswer($id){
	global $prefix;
						$sl = "select aid,answer,date,user_name,user_email
								from $prefix"._faq_answer." 
								where qid= '$id' and is_active  ='1'  ";

						$rs = mysql_query($sl);
						if(mysql_num_rows($rs)){
							$str = "<table width='100%' align='center' border=0 cellpadding=2 cellspacing=2>";
							list($aid,$answer,$date_a,$usera,$emaila)=mysql_fetch_row($rs);
									$str .= "<tr><td align='left' ><img src='images/user.gif'></td><td > <font class='title'>"._USERANWER.": $usera</font> < <a href='mailto: $emaila'>$emaila</a> ></td></tr>";
									$str .= "<tr><td colspan=2>$answer</td></tr>";
									$str .= "<tr><td align=right colspan=2> <i>".strftime( _DATESTRING3, $date_a)."</i></font></td></tr>";					
							$str .= "</table>";
						}
	return $str;
}
//==================================
function details(){
include("header.php");
global $currentlang,$prefix,$id,$cid,$maxRow,$maxPage,$mcid;

IF($cid){
	$maxRow=5;
	$res_title = mysql_query("Select categories  from $prefix"._faqcategories ." where  id_cat  ='$cid' ");
	list($categories)=mysql_fetch_row($res_title);
	$sl1 = "select qid,title,question,date,user_name,user_email 
			from  $prefix"._faq_question." 
			where is_active  ='1'  and  id_cat  = '$cid' ";
	$links = "&cid=$cid";	
	$query_limit_1 = split_pages($sl1, $links,1);

	$rs1 = mysql_query($query_limit_1);

	echo"
              <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"98%\" id=\"AutoNumber11\" align=center>
                <tr>
                  <td height=\"24\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"100%\" id=\"AutoNumber12\">
                    <tr>
                      <td width=\"15%\" height=\"24\" >
                      <img border=\"0\" src=\"images/icon/faqfolder.gif\"align=absmiddle></td>
                      <td >
                      <font color=\"#B7CDE4\">&nbsp;</font><font style=\"font-size: 9pt; font-weight: 700\" face=\"Arial\" color=\"#800000\">
					$categories</font></td>
                    </tr>
					<tr ><td height=2 background=\"images/e_dot.gif\" colspan=2></td></tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td style=\"border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: solid; border-bottom-width: 1\" bordercolor=\"#B7CDE4\" bgcolor=\"#F1F2F3\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"100%\" id=\"AutoNumber13\">";
				while(list($id,$title,$question,$date,$username,$email)=mysql_fetch_row($rs1)){
						echo "<tr><td><table width=100%>
							<tr>
								<td valign=top width=85><p style=\"line-height: 150%; margin-top: 5\"><img src='images/icon/question.button.gif' align=absmiddle>&nbsp;<font class=tiny>"._QUESTION."</font>:</td>
								<td><p style=\"line-height: 150%; margin-top: 5\"><b>$title</b><br>	 $question</td>
							</tr>
							</table>	
						</td></tr>";	
						echo "<tr><td align='left'><p style=\"line-height: 150%; margin: 5\"><img src='images/icon/ico_18_2.gif'> <i><font class='answer'>"._USERASK.":</font><font color=#0000CC> $username </font>< <a href='mailto: $email' class=answer>$email</a> > <i>".strftime( _DATESTRING3, $date)."</i></font></td></tr>";

						echo "<tr><td bgcolor='#FFF5E8'>";
						$sl = "select aid,answer,date,user_name,user_email
								from $prefix"._faq_answer." 
								where qid= '$id' and is_active  ='1'  ";

						$rs = mysql_query($sl);
						echo "<table width='100%' align='center' border=0 cellpadding=2 cellspacing=2>";
						while(list($aid,$answer,$date_a,$usera,$emaila)=mysql_fetch_row($rs)){
								echo "<tr><td></td></tr>";
								echo "<tr><td align='left' ><img src='images/user.gif'></td><td > <font class='title'>"._USERANWER.": $usera</font> < <a href='mailto: $emaila'>$emaila</a> ></td></tr>";
								echo "<tr><td></td><td><font class=tiny>"._ANSWER."</font>: $answer</td></tr>";
								echo "<tr><td></td><td align=right> <i>".strftime( _DATESTRING3, $date_a)."</i></font></td></tr>";
								echo "<tr><td colspan=2 bgcolor='#e4e4e4' height='1'></td></tr>";

						}
						echo "</table>";
					echo "</td></tr>";			
				}
	echo "</td></tr>";
		echo "<tr><td>";
			 split_pages($sl1, $links);
		echo "</td></tr>";
	echo"</table>";
		echo"</table>";
}ELSE{
	$res_title = mysql_query("Select categories  from $prefix"._faqcategories ." where  id_cat  ='$mcid' ");
	list($categories)=mysql_fetch_row($res_title);
	$sl1 = "select qid,question,date,user_name,user_email 
			from  $prefix"._faq_question." 
			where is_active  ='1'  and qid = '$id' ";
	$links = "";	
	$query_limit_1 = split_pages($sl1, $links);
	$rs1 = mysql_query($sl1);

	$sl = "select aid,answer,date,user_name,user_email
			from $prefix"._faq_answer." 
			where qid= '$id' and is_active  ='1'  ";

	$rs = mysql_query($sl);
	echo"
              <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"96%\" id=\"AutoNumber11\" align=center>
                <tr>
                  <td height=\"24\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"100%\" id=\"AutoNumber12\">
                    <tr>
                      <td width=\"5%\" height=\"24\" >
                      <img border=\"0\" src=\"images/icon/faqfolder.gif\" align=absmiddle></td>
                      <td >
                      <font color=\"#B7CDE4\">&nbsp;</font><font style=\"font-size: 9pt; font-weight: 700\" face=\"Arial\" color=\"#800000\">
					$categories</font></td>
                    </tr>
                  </table>
                  </td>
                </tr>
                <tr>
                  <td style=\"border-left-style: solid; border-left-width: 1; border-right-style: solid; border-right-width: 1; border-bottom-style: solid; border-bottom-width: 1\" bordercolor=\"#B7CDE4\" bgcolor=\"#F1F2F3\">
                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" width=\"100%\" id=\"AutoNumber13\">";

					list($id,$question,$date,$username,$email)=mysql_fetch_row($rs1);
							echo "<tr><td><p style=\"line-height: 150%; margin: 5\"><img src='images/icon/question.button.gif'>&nbsp;<font class=question>"._QUESTION.":</font> $question</td></tr>";
							echo "<tr><td ><p style=\"line-height: 150%; margin: 5\"><img src='images/icon/ico_18_2.gif'> <font class='tiny'>"._USERASK.":</font> $username < <a href='mailto: $email'>$email</a> > <i>".strftime( _DATESTRING3, $date)."</i></font></td></tr>";
							echo "<tr><td bgcolor='#FFF5E8'>";
							echo "<table width='99%' align='center' border=0 cellpadding=2 cellspacing=2>";
							while(list($aid,$answer,$date_a,$usera,$emaila)=mysql_fetch_row($rs)){
									echo "<tr><td></td></tr>";
									echo "<tr><td align='left'><img src='images/icon/ico_18_2.gif'></td><td> <font class='title'>"._USERANWER.": $usera</font> < <a href='mailto: $emaila'>$emaila</a> ></font></td></tr>";
									echo "<tr><td></td><td><font class=tiny>"._ANSWER.":</font> $answer</td></tr>";
									echo "<tr><td></td><td align=right> <i>".strftime( _DATESTRING3, $date_a)."</i></font></td></tr>";
									echo "<tr><td colspan=2 bgcolor='#e4e4e4' height='1'></td></tr>";

							}
							echo "</table>";
							echo "</td></tr>";

			echo "</table>";
			echo "</td></tr></table>";
}

include("footer.php");
}
//==============================================
function sendfaq(){
include("header.php");


global $checkform,$fContent,$category,$fEmail,$fName,$prefix,$currentlang,$qid,$title;
$date=time();

if($checkform=="question"){
	mysql_query("Insert into $prefix"._faq_question." (qid,id_cat,title,question,date,is_active,user_name,user_email)
											values('','$category','$title','$fContent','$date','0','$fName','$fEmail')
				");
	echo "<center><br><br>"._QHAVESEND."</center>";
}
if($checkform=="answer"){
	mysql_query("Insert into $prefix"._faq_answer." (aid,qid,answer,date,is_active,user_name,user_email)
											values('','$qid','$fContent','$date','0','$fName','$fEmail')
				");
	echo "<center><br><br>"._AHAVESEND."</center>";

}
	echo "<center><br><br>"._GOBACK."</center>";

include("footer.php");
}
//==============================================

//==============================================
switch($op) {

    case "details":
    details();
    break;

    case "sendfaq":
    sendfaq();
    break;

    default:
    main();
    break;

    case "viewanswer":
    viewanswer($id);
    break;

}

?>
