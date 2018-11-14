// lấy tab_menu 
$(document).ready(function() {

	$(".tab_content2").hide();
	$(".tab_content2:first").show(); 
	document.getElementById('giaodich').value = '';
	$("ul.tabs2 li").click(function() {
		$("ul.tabs2 li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content2").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
	});
});
// Kiểm tra email
$(document).ready(function(){

	$("#email").change(function() { 
	
		var usr = $("#email").val();
		if(usr == ''){
			$("#status2").html('<font color="red">Email không được để trống!.</font>');
			$("#email").removeClass('object_ok'); // if necessary
			$("#email").addClass("object_error");
		}else if(validateEmail(usr)){
			$("#status2").html('<img src="js/loader.gif" align="absmiddle">&nbsp;Hệ thống đang kiểm tra tài khoản...');
			
				$.ajax({  
				type: "POST",  
				url: "admin.php?op=check_emailDv",  
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
				}  
			   
			   });
			
			 } 
			   
			  }); 
			
		}else if(!validateEmail(usr)){
			$("#status2").html('<font color="red">Định dạng email không đúng!.</font>');
			$("#email").removeClass('object_ok'); // if necessary
			$("#email").addClass("object_error");
		}
		
	});
		
});
// Kiểm tra mã đơn vị
$(document).ready(function(){

	$("#code_dv").change(function() { 
	
		var code_dv = $("#code_dv").val();
		if(code_dv == ''){
			$("#status_code_dv").html('<font color="red">Mã đơn vị không được để trống!.</font>');
			$("#code_dv").removeClass('object_ok'); // if necessary
			$("#code_dv").addClass("object_error");
		}else if(code_dv != ''){
			$("#status_code_dv").html('<img src="js/loader.gif" align="absmiddle">&nbsp;Hệ thống đang kiểm tra tài khoản...');
			
				$.ajax({  
				type: "POST",  
				url: "admin.php?op=check_codeDv",  
				data: "code_dv="+ code_dv,  
				success: function(msg){  
			   
			   $("#status_code_dv").ajaxComplete(function(event, request, settings){ 
			
					if(msg == 'OK')
					{ 
						$("#code_dv").removeClass('object_error'); // if necessary
						$("#code_dv").addClass("object_ok");
						$(this).html('&nbsp;<img src="js/tick.gif" align="absmiddle"> Hợp lệ');
					}  
					else  
					{  
						$("#code_dv").removeClass('object_ok'); // if necessary
						$("#code_dv").addClass("object_error");
						$(this).html(msg);
					}  
			   
			   });
			
			 } 
			   
			  }); 
			
		}
		
	});
		
});
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

function Giaodich(){
	var giaodich=$("#giaodich").val();
	if(giaodich.length ==0){
			alert('Bạn phải nhập số người giao dịch ');
			return false;
		}else if(!phpvn_isDigit(giaodich)){
			alert('Số người giao dịch phải là số nguyên dương ');
			return false;
		}else{
				var strURL="admin.php?op=Giaodich&giaodich="+giaodich;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								document.getElementById('xuatnguoigiaodich').innerHTML=req.responseText;						
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}		
		}
}
function TtdvForm(){
		var code_dv = $("#code_dv").val();
		var name_dv=$("#name_dv").val();
		var diachi_dv=$("#diachi_dv").val();
		var khoangcach_dv=$("#khoangcach_dv").val();
		var phone_dv=$("#phone_dv").val();
		var email=$("#email").val();
		var date_thanhlap=$("#date_thanhlap").val();
		var name_lv=$("#name_lv").val();
		var Lanhdao_dv=$("#Lanhdao_dv").val();
		var nangluc_taichinh=$("#nangluc_taichinh").val();
		var name_group_dv=$("#name_group_dv").val();
		if(code_dv ==''){
			alert('Bạn phải nhập mã đơn vị ');
			$("#code_dv").focus();
			return false;
		}else if(name_dv == ''){
			alert('Bạn phải nhập tên đơn vị ');
			$("#name_dv").focus();
			return false;
		}else if(diachi_dv == ''){
			alert('Bạn phải nhập địa chỉ đơn vị ');
			$("#diachi_dv").focus();
			return false;
		}else if(khoangcach_dv == ''){
			alert('Bạn phải nhập khoảng cách ');
			$("#khoangcach_dv").focus();
			return false;
		}else if(phone_dv == ''){
			alert('Bạn phải nhập số điện thoại ');
			$("#phone_dv").focus();
			return false;
		}else if(email == ''){
			alert('Bạn phải nhập email ');
			$("#email").focus();
			return false;
		}else if(name_group_dv == 0){
			alert('Bạn phải chọn nhóm đơn vị  ');
			$("#name_group_dv").focus();
			return false;
		}else{
			var giaodich=$("#giaodich").val();
			var cogiaodich = $("#cogiaodich").val();
			//alert(cogiaodich);
			for(var i=0;i<giaodich;i++){
				//var nguoigiaodich_i=$("#giaodich"+i).val();
				if($("#nguoigiaodich_"+i).val() == ''){
					//alert('len khong');
					alert('Tên người giao dịch không được để trống');
					$("#nguoigiaodich_"+i).focus();
					return false;
				}else{
					//return false;
					document.getElementById("form1").submit();
				}
			}
		}
	}
	function xoagiaodich(id_giaodich,k,count){
		if (confirm('Bạn chắc chắn muốn xóa người giao dịch thứ '+k+' ?')) {
			if (confirm('Toàn bộ dữ liệu người giao dịch thứ '+k+' sẽ bị mất bạn chắc chắn muốn xóa chứ ?')) {
			 //$("#giaodichthu_"+k).html('');
			for(var i = 0;i<count;i++){
				$("#giaodichthu_"+k).html('');
			}
			document.getElementById('id_giaodichxoa').value = id_giaodich;
			document.getElementById("form1").submit();
/*				var strURL="admin.php?op=XoaNguoigiaodich&id_giaodich="+id_giaodich+"&k="+k+"&count="+count;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								document.getElementById('daxoagiaodich').innerHTML=req.responseText;						
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}		
*/
		}else{
				return false;
			}
		}else{
			return false;
		}
	}
	function xoadonvi(){
		if (confirm('Bạn chắc chắn muốn xóa đơn vị này?')) {
			if (confirm('Toàn bộ dữ liệu đơn vị và người giao dịch của đơn vị sẽ bị xóa?')) {
				//return false;
				document.getElementById("form1").submit();
			}
		}
	}
	function validateEmail(email) 
						{
							var re = /\S+@\S+\.\S+/;
							return re.test(email);
						}
	function phpvn_isDigit(myString)  // kiểm tra số nguyên dương
		{
			 var reg = /^\d+$/;
			 return (reg.test(myString));
		}
