$(document).ready(function() {
	$("#them_lichlamviec").hide();
	$("#add_lichlamviec").click(function() {
		$("#search_lichlamviec").hide();
		$("#them_lichlamviec").show();
		document.getElementById("bietlichlamviec").value  = 1;
		$("#lichlamviecChu").hide();
	});
	
	
	$("#finsh").click(function() {
		$("#search_lichlamviec").hide();
		$(".lichlamviecChu").hide();
		
	});
	
	
});
function vesearlichlamviec(){
		$("#search_lichlamviec").show();
		$("#them_lichlamviec").hide();
		$("#lichlamviecChu").show();
		document.getElementById("bietlichlamviec").value  = 0;
}
function timkiemlichlamviec(){
	var portalurl = $("#portalurl").val();
	var name_lichlamviec = $("#name_lichlamviec").val();
	var start_date = $("#start_date").val();
	var end_date = $("#end_date").val();
				var strURL=portalurl+"/admin.php?op=Timlichlamviec&name_lichlamviec="+name_lichlamviec+ "&start_date="+start_date+ "&end_date="+end_date;  
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
									$("#dslichlamviec").hide()
									$("#search_lichlamviec").show();
									$("#them_lichlamviec").hide();
									$("#lichlamviecChu").hide();
									$("#lichlamviecChuSearch").show();
									document.getElementById("bietlichlamviec").value  = 0;
									document.getElementById("lichlamviecChuSearch").innerHTML=req.responseText;
													
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
function validateLichlamviec(){
	var portalurl = $("#portalurl").val();
	var tomta_congviec = $("#tomta_congviec").val();
	var nguoilamcung = $("#nguoilamcung").val();
	var ngaybatdau = $("#ngaybatdau").val();
	var giobatdau = $("#giobatdau").val();
	var ngayketthuc = $("#ngayketthuc").val();
	var gioketthuc = $("#gioketthuc").val();
	var noidungcv = $("#noidungcv").val();
	var diachi_lamviec = $("#diachi_lamviec").val();
	var bietlichlamviec = $("#bietlichlamviec").val();
	if(bietlichlamviec == 1){
	if(tomta_congviec == ""){
		$("#tomta_erro").html('Tên công việc không được bỏ trống');
		$("#tomta_congviec").focus();
		return false;
	}else if(ngaybatdau == ""){
		$("#ngaybatdau_erro").html('Ngày bắt đầu không được bỏ trống');
		$("#ngaybatdau").focus();
		return false;
	}else if(ngayketthuc == ""){
		$("#ngaybatdau_erro").html('Ngày kết thúc không được bỏ trống');
		$("#ngayketthuc").focus();
		return false;
	}else if(ngaybatdau > ngayketthuc){
		$("#ngaybatdau_erro").html('Ngày kết thúc không được nhỏ hơn ngày bắt đầu');
		$("#ngayketthuc").focus();
	}else if(noidungcv == ""){
		$("#noidung_erro").html('Nội dung công việc không được bỏ trống');
		$("#noidungcv").focus();
		return false;
	}else{
				var strURL=portalurl+"/admin.php?op=lichlamviec&tomta_congviec="+tomta_congviec+ "&ngayketthuc="+ngayketthuc+ "&bietlichlamviec="+bietlichlamviec+ "&nguoilamcung="+nguoilamcung+ "&ngaybatdau="+ngaybatdau+ "&giobatdau="+giobatdau+ "&gioketthuc="+gioketthuc+ "&noidungcv="+noidungcv+ "&diachi_lamviec="+diachi_lamviec;  
				var req = getXMLHTTP();
				
				if (req) {
					
					req.onreadystatechange = function() {
						if (req.readyState == 4) {
							// only if "OK"
							if (req.status == 200) {
									$("#dslichlamviec").show()
									$("#search_lichlamviec").show();
									$("#them_lichlamviec").hide();
									$("#lichlamviecChu").hide();
									$("#lichlamviecChuSearch").hide();
									document.getElementById("bietlichlamviec").value  = 0;
									document.getElementById('dslichlamviec').innerHTML=req.responseText;
													
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
	}
}