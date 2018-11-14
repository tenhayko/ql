// lấy tab_menu 
$(document).ready(function() {

	$(".tab_content2").hide();
	$(".tab_content2:first").show(); 

	$("ul.tabs2 li").click(function() {
		$("ul.tabs2 li").removeClass("active");
		$(this).addClass("active");
		$(".tab_content2").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn(); 
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

function ValidateForm(){
	
		var code_dv=document.form1.code_dv.value;
		alert(code_dv);
		var name_dv=document.form1.name_dv.value;
		var diachi_dv=document.form1.diachi_dv.value;
		var khoangcach_dv=document.form1.khoangcach_dv.value;
		var phone_dv=document.form1.phone_dv.value;
		var email=document.form1.email.value;
		var date_thanhlap=document.form1.date_thanhlap.value;
		var name_lv=document.form1.name_lv.value;
		var Lanhdao_dv=document.form1.Lanhdao_dv.value;
		var nangluc_taichinh=document.form1.nangluc_taichinh.value;
		var name_group_dv=document.form1.name_group_dv.value;
		//var giaodich=document.form1.giaodich.value;
		//alert(giaodich);
		if(code_dv ==''){
			alert('Bạn phải nhập mã đơn vị ');
			document.form1.code_dv.focus()
			return false;
		}else if(name_dv == ''){
			alert('Bạn phải nhập tên đơn vị ');
			document.form1.name_dv.focus()
			return false;
		}else if(diachi_dv == ''){
			alert('Bạn phải nhập địa chỉ đơn vị ');
			document.form1.diachi_dv.focus()
			return false;
		}else if(khoangcach_dv == ''){
			alert('Bạn phải nhập khoảng cách ');
			document.form1.khoangcach_dv.focus()
			return false;
		}else if(phone_dv == ''){
			alert('Bạn phải nhập số điện thoại ');
			document.form1.phone_dv.focus()
			return false;
		}else if(email == ''){
			alert('Bạn phải nhập email ');
			document.form1.email.focus()
			return false;
		}else if(name_group_dv == 0){
			alert('Bạn phải chọn nhóm đơn vị  ');
			document.form1.name_group_dv.focus()
			return false;
		}
			return true;
		
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
