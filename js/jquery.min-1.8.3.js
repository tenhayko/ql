// lấy  
$(document).ready(function() {
	 
var portalurl = $("#portalurl").val();
	$("#them_diendan").hide();
	$(".form-wrapper").show(); 
	$(".danhsachchiase").show(); 
	$("#xuatxemtinnong").hide();
	document.getElementById("bietchiase").value  = 0;
	$("#xuatxemtatcachiase").hide();
	$("#themchiase").click(function() {
		//$("#xuatxemtatcachiase").show();
		$("#them_diendan").show();
		$(".form-wrapper").hide(); 
		$(".danhsachchiase").hide();
		$("#hienchiase").hide();
		$("#xuatxemtinnong").hide(); 
		$("#xuatsuachiase").hide(); 
		document.getElementById("bietchiase").value  = 1;
		xemtatchiase();
	});
	$("#vedschiase").click(function() {
		$("#them_diendan").hide();
		$(".form-wrapper").show(); 
		$(".danhsachchiase").show();
		$("#xuatxemtinnong").hide();
		$("#hienchiase").hide(); 
		document.getElementById("bietchiase").value  = 0;
		$("#xuatxemtatcachiase").hide();
	});
	$("#vetrangchu").click(function() {
		$("#them_diendan").hide();
		$("#xuatxemtinnong").hide();
		$(".form-wrapper").show(); 
		$(".danhsachchiase").show();
		$("#hienchiase").hide();
		document.getElementById("bietchiase").value  = 0; 
		$("#xuatxemtatcachiase").hide();
	});
	$("#xemtatcachiase").click(function() {
		$("#them_diendan").hide();
		$(".form-wrapper").hide(); 
		$(".danhsachchiase").hide();
		$("#hienchiase").hide();
		$("#xuatxemtinnong").hide();
		document.getElementById("bietchiase").value  = 1; 
		xemtatchiase();
	});
	$("#xemtinnong").click(function() {
		$("#them_diendan").hide();
		$(".form-wrapper").hide(); 
		$(".danhsachchiase").hide();
		$("#hienchiase").hide();
		document.getElementById("bietchiase").value  = 1; 
		$("#xuatxemtatcachiase").hide();
		 xemtinnongchiase(1,2);
	});
    
   $('.paginate_button').click(function(){
        var $_this = $(this);
        if(!$_this.hasClass('disabled')){
            var $nuber_per_page = $('.paginate_length').val();
            var $page = $_this.attr('page');
			alert($page);
            xemtinnongchiase($page,$nuber_per_page);
        }
        return false;
    });
    $('.paginate_length').click(function(){
        var $_this = $(this);
        var $page = 1;
        var $number_per_page = $_this.val();
        xemtinnongchiase($page,$number_per_page);
    });	
});
function xemtinnongchiase($page, $number_per_page){
var portalurl = $("#portalurl").val();
var page = $page;
var number_per_page = $number_per_page;
		var strURL=portalurl+"/admin.php?op=xemtinnongchiase&page="+page+ "&number_per_page="+number_per_page;
		$("#xuatxemtinnong").show();
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
									document.getElementById('xuatxemtinnong').innerHTML=req.responseText;
													
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
								//document.getElementById("form2").submit();
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
	
	
}
function xemtatchiase(){
var portalurl = $("#portalurl").val();
		var strURL=portalurl+"/admin.php?op=xemtatcachiase";
		$("#xuatxemtatcachiase").show();
		
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
									document.getElementById('xuatxemtatcachiase').innerHTML=req.responseText;
													
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
								//document.getElementById("form2").submit();
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
}
function veds_chiase(){
		$("#them_diendan").hide();
		$(".form-wrapper").show(); 
		$(".danhsachchiase").show();
		$("#hienchiase").hide(); 
		$("#xuatsuachiase").hide();
		$("#xuatxemtinnong").hide();
		document.getElementById("bietchiase").value  = 0;
		$("#xuatxemtatcachiase").hide();
}
function suachiase(id_sua){
	//alert(id_sua);
	document.getElementById("suachiase").value  = id_sua;
	var portalurl = $("#portalurl").val();
	var strURL=portalurl+"/admin.php?op=suachiase&id_sua="+id_sua;
										$("#them_diendan").hide();
										$(".form-wrapper").hide(); 
										$(".danhsachchiase").hide();
										$("#hienchiase").hide();
										$("#xuatsuachiase").show(); 
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								
								document.getElementById('xuatsuachiase').innerHTML=req.responseText;
												CKEDITOR.replace( "des_diendan_sua");
							$("#vedschiase").click(function() {
								$("#them_diendan").hide();
								$(".form-wrapper").show(); 
								$(".danhsachchiase").show();
								$("#hienchiase").hide(); 
								document.getElementById("bietchiase").value  = 0;
								
							});

							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
}
	function ValidateFormDiendan(){
		var bietchiase = $("#bietchiase").val();
		var title_diendan = $("#title_diendan").val();
		var motangan = $("#motangan").val();
		if(bietchiase == 1){
			if(title_diendan == ''){
				alert('Bạn phải nhập tiêu đề bài viết!');
				$("#title_diendan").focus();
				return false;
			}else if(motangan == ''){
				alert('Bạn phải nhập mô tả ngắn về bài viết!');
				$("#motangan").focus();
				return false;
			}else if ( CKEDITOR.instances.des_diendan.getData() == '' ){
				alert('Bạn phải nhập nội dung bài viết!');
				return false;
			}
			return true;
		}else{
			disableEnterKey_chiase(e);	
		}
	}
	function ValidateSuaFormDiendan(){
		var bietchiase = $("#bietchiase").val();
		var title_diendan_sua = $("#title_diendan_sua").val();
		var motangan_sua = $("#motangan_sua").val();
		if(bietchiase == 1){
			if(title_diendan_sua == ''){
				alert('Bạn phải nhập tiêu đề bài viết!');
				$("#title_diendan").focus();
				return false;
			}else if(motangan_sua == ''){
				alert('Bạn phải nhập mô tả ngắn về bài viết!');
				$("#motangan").focus();
				return false;
			}else if ( CKEDITOR.instances.des_diendan_sua.getData() == '' ){
				alert('Bạn phải nhập nội dung bài viết!');
				return false;
			}
			//return false;
			return true;
			//alert('co roi');
		}else{
			disableEnterKey_chiase(e);	
		}
	}
	function ValidateTimkiemDiendan(){
		var title_dd = $("#title_dd").val();
		var luachon_group_search = $("#luachon_group_search").val();
		var luachon_chiase_search = $("#luachon_chiase_search").val();
		//alert(luachon_chiase_search);
		var portalurl = $("#portalurl").val();
		//alert(portalurl);
				var strURL=portalurl+"/admin.php?op=timkiem_chiase&title_dd="+title_dd+ "&luachon_group_search="+luachon_group_search+ "&luachon_chiase_search="+luachon_chiase_search;  
				var req = getXMLHTTP();
				
				if (req) {
					$(".danhsachchiase").hide();
					//$("#xuatdanhsachchiase").show();
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
									$("#xuatdanhsachchiase").show()
									document.getElementById('xuatdanhsachchiase').innerHTML=req.responseText;
													
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
								//document.getElementById("form2").submit();
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
	}
	function chitiet(a){
		//alert(a);
		$("#them_diendan").hide();
		$(".form-wrapper").hide(); 
		$(".danhsachchiase").hide(); 
		var portalurl = $("#portalurl").val();
				var strURL=portalurl+"/admin.php?op=hienthi_chiase&view="+a;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								$("#hienchiase").show();
								document.getElementById('hienchiase').innerHTML=req.responseText;						
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
	}
	function xoachiase(){
		if (confirm('Bạn chắc chắn muốn xóa chia sẻ này không?')) {
				//return false;
				document.getElementById("form2").submit();
/*		var portalurl = $("#portalurl").val();
		var values = $('input:checkbox:checked.xoachiase').map(function () {
		  return this.value;
		}).get();	
		//alert(values);
		var length = values.length;
		//alert(length);
				var strURL=portalurl+"/admin.php?op=xoachiase&values="+values+"&length="+length;
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
								alert('Chia sẻ đã bị xóa');
								$("#dschiase").html('');	
								document.getElementById('xuatchiase').innerHTML=req.responseText;					
							} else {
								alert("There was a problem while using XMLHTTP:\n" + req.statusText);
							}
						}				
					}			
					req.open("GET", strURL, true);
					req.send(null);
				}
*/		}
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

function disableEnterKey(e)
{
     var key;
	var portalurl = $("#portalurl").val();
     if(window.event)
          key = window.event.keyCode;     //IE
     else
          key = e.which;     //firefox
	var comment = document.getElementById("comment").value;
	var id = document.getElementById("id").value;
	var id_hoso = document.getElementById("id_hoso").value;
	var solantraloi = document.getElementById("solantraloi").value;
	var solanxem = document.getElementById("solanxem").value;
     if(comment != '' && key == 13){
		// alert(id);
		 $.ajax({  
			type: "POST",  
			url: portalurl+"/admin.php?op=add_comment",  
			data: "id="+ id+ "&comment="+comment+ "&id_hoso="+id_hoso+ "&solantraloi="+solantraloi+ "&solanxem="+solanxem,  
			success: function(ketqua){  
			}
		 });
	}else
          return true;
}
function disableEnterKey_chiase(e)
{
		//var title_diendan = $("#title_diendan").val();
		//var motangan = $("#motangan").val();
     var key;
	var portalurl = $("#portalurl").val();
     if(window.event)
          key = window.event.keyCode;     //IE
     else
          key = e.which;     //firefox
	var comment = document.getElementById("comment_chiase").value;
	var id = document.getElementById("id_chitiet").value;
	var id_hoso = document.getElementById("id_hosoChiase").value;
	var solantraloi = document.getElementById("solantraloiChiase").value;
     if(comment != '' && key == 13){
		// alert(id);
		 $.ajax({  
			type: "POST",  
			url: portalurl+"/admin.php?op=add_comment_trangchu",  
			data: "id="+ id+ "&comment="+comment+ "&id_hoso="+id_hoso+ "&solantraloi="+solantraloi,  
			success: function(ketqua){  
			}
		 });
	}else
          return true;
}
