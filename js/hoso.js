 pic1 = new Image(16, 16); 
pic1.src = "js/loader.gif";

$(document).ready(function(){
	$("#thongtindangnhap").hide();
	//checkValidDate('12/12/1982');
$("#aid_check").change(function() { 
	check_codeNv();
});
$("#email").change(function() { 
	check_email();
});
$("#nhan_email").change(function() { 
	check_nhanemail();
});
});
function check_nhanemail(){
	var nhan_email = $("#nhan_email").val();
	if(nhan_email != 0)
{
    $.ajax({  
    type: "POST",  
    url: "admin.php?op=check_nhan_email",  
    data: "nhan_email="+ nhan_email,  
    success: function(msg){  
   
if(msg == 1){
			alert('Đã có người nhận email. Mời bạn chọn chi nhánh, bộ phận, phòng bạn khác hoặc xóa bỏ người nhận email chi nhánh, bộ phận, phòng ban này!');
		$("#nhan_email").focus();

}else
	{ 
	 
	}  
   

 } 
   
  }); 

}


}

function ValidateForm_hs(){
    var regex = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((1[6-9]|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((1[6-9]|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/;
	var code_nv = $("#code_nv").val();
	var full_name = $("#full_name").val();
	var ngaysinh = $("#ngaysinh").val();
	var email = $("#email").val();
	//alert(email);
	var codangnhap = $("#codangnhap").val();
	//alert(chkVND);
	var pass = $("#pass").val();
	var id_congty = $("#id_congty").val();
	var id_phong = $("#id_phong").val();
	var nhan_email = $("#nhan_email").val();
	if(code_nv == ''){
		alert('Mã cán bộ không được để trống');
		$("#code_nv").focus();
		return false;
	}else if(full_name == ''){
		alert('Tên cán bộ không được để trống');
		$("#full_name").focus();
		return false;
	}else if(aid == ''){
		alert('Tên đăng nhập');
		$("#aid").focus();
		return false;
	
    }else if(email == ''){
		alert('Email không được để trống');
		$("#email").focus();
		return false;
	}else if(!validateEmail(email)){
		alert('Email không đúng định dạng');
		$("#email").focus();
		return false;
	}else if(codangnhap == 1 && pass == ''){
		alert('Bạn phải nhập mật khẩu đăng nhập');
		$("#pass").focus();
		return false;
	}else if(id_congty == ''){
		alert("Nhân viên phải thuộc một chi nhánh nào đó");
		return false;
	}else if(id_phong == ''){
		alert("Nhân viên phải thuộc một phòng nào đó");
		return false;
	}else
	return true;
 }

 function CheckVND()
    {
        if(document.getElementById("chkVND").checked==true)
        {
           $("#thongtindangnhap").show();
			var email = jQuery("#email").val();
			document.getElementById("aid").value = email;
			document.getElementById("codangnhap").value = 1;
           
        }
        else
        {
			 $("#thongtindangnhap").hide();
           // document.getElementById("aid").style.display='none';
			document.getElementById("pass").value='';
           
        }
    }
function getXMLHTTP() { //fuction to return the xml http object
		var xmlhttp=false;	
		try{
			xmlhttp=new XMLHttpRequest();
		}
		catch(e)	{		
			try{			
				xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				try{
				xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e1){
					xmlhttp=false;
				}
			}
		}
		 	
		return xmlhttp;
    }
	
	function getState(countryId) {		
		
		var strURL="admin.php?op=Check_phong_nv&id_congty="+countryId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('statediv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}		
	}
	
	
	function getCity(countryId,stateId) {		
		var strURL="admin.php?op=Check_bophan&country="+countryId+"&state="+stateId;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {						
						document.getElementById('citydiv').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}
				
	}
	
	
 function check_codeNv(){
	var usr = $("#aid_check").val();

if(usr.length >2)
{
$("#status").html('<img src="js/loader.gif" align="absmiddle">&nbsp;Hệ thống đang kiểm tra tài khoản...');

    $.ajax({  
    type: "POST",  
    url: "admin.php?op=check_manv",  
    data: "aid_check="+ usr,  
    success: function(msg){  
   
   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#aid_check").removeClass('object_error'); // if necessary
		$("#aid_check").addClass("object_ok");
		$(this).html('&nbsp;<img src="js/tick.gif" align="absmiddle"> Hợp lệ');
	}  
	else  
	{  
		$("#aid_check").removeClass('object_ok'); // if necessary
		$("#aid_check").addClass("object_error");
		$(this).html(msg);
		//$("#code_nv").focus();
		//return false;
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status").html('<font color="red">Tên đăng nhập phải lớn hơn 2 ký tự.</font>');
	$("#aid_check").removeClass('object_ok'); // if necessary
	$("#aid_check").addClass("object_error");
	//$("#code_nv").focus();
	//return false;
	}
}
function check_email(){
	var usr = $("#email").val();
 if(!validateEmail(usr)){
	$("#status2").html('<font color="red">Email không đúng định dạng.</font>');
	$("#email").removeClass('object_ok'); // if necessary
	$("#email").addClass("object_error");
	//$("#email").focus();
	//return false;
 }else{
if(usr.length >1)
{
$("#status2").html('<img src="js/loader.gif" align="absmiddle">&nbsp;Hệ thống đang kiểm tra tài khoản...');

    $.ajax({  
    type: "POST",  
    url: "admin.php?op=check_email",  
    data: "email="+ usr,  
    success: function(msg){  
   
   $("#status2").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')
	{ 
        $("#email").removeClass('object_error'); // if necessary
		$("#email").addClass("object_ok");
		$(this).html('&nbsp;<img src="js/tick.gif" align="absmiddle"> Hợp lệ');
	}  
	else  
	{  
		$("#email").removeClass('object_ok'); // if necessary
		$("#email").addClass("object_error");
		$(this).html(msg);
		//$("#email").focus();
		//return false;
	}  
   
   });

 } 
   
  }); 

}
else
	{
	$("#status2").html('<font color="red">Mời bạn nhập email.</font>');
	$("#email").removeClass('object_ok'); // if necessary
	$("#email").addClass("object_error");
	//return false;
	}
 }
}
 function validateEmail(email) 
						{
							var re = /\S+@\S+\.\S+/;
							return re.test(email);
						}	