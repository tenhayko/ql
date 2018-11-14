$(document).ready(function(){
	//document.getElementById("dulieu_tu").value  = 0;
	$("#dulieu").show();
	$("#bc_huyenxa").hide();
	$("#bc_chuyende").hide();
	$(".text-center").hide();
	$("#bc_namxh").hide();
	$("#bc_loaids").hide();
	$("#bc_hientrang").hide();
	
	$("#radio_huyenxa").click(function() {
		$("#bc_huyenxa").show();
		$(".text-center").show();
		$("#bc_chuyende").hide();
		$("#bc_namxh").hide();
		$("#bc_loaids").hide();
		$("#dulieu").show();
		$("#bc_hientrang").hide();
		document.getElementById("dulieu").value  = 1;
	});
	$("#radio_chuyende").click(function() {
		$("#bc_huyenxa").hide();
		$(".text-center").show();
		$("#bc_chuyende").show();
		$("#bc_namxh").hide();
		$("#bc_loaids").hide();
		$("#bc_hientrang").hide();
		document.getElementById("dulieu").value  = 2;
	});
	$("#radio_namxh").click(function() {
		$("#bc_huyenxa").hide();
		$(".text-center").show();
		$("#bc_chuyende").hide();
		$("#bc_namxh").show();
		$("#bc_loaids").hide();
		$("#bc_hientrang").hide();
		document.getElementById("dulieu").value  = 3;
	});
	$("#radio_loaids").click(function() {
		$("#bc_huyenxa").hide();
		$(".text-center").show();
		$("#bc_chuyende").hide();
		$("#bc_namxh").hide();
		$("#bc_loaids").show();
		$("#bc_hientrang").hide();
		document.getElementById("dulieu").value  = 4;
	});
	$("#radio_hientrang").click(function() {
		$("#bc_huyenxa").hide();
		$(".text-center").show();
		$("#bc_chuyende").hide();
		$("#bc_namxh").hide();
		$("#bc_loaids").hide();
		$("#bc_hientrang").show();
		document.getElementById("dulieu").value  = 5;
	});
	
});
function timkiembc(){
		var huyen = $("#huyen").val();
		var xaphuong = $("#xaphuong").val();
		if(xaphuong == null)
			xaphuong = "";
		var loai_ds = $("#loai_ds").val();
		var chuyende = $("#chuyende").val();
		var year_xh = $("#year_xh").val();
		var hientrang = $("#hientrang").val();
		
		var dulieu_tu = $("#dulieu").val();
		if(dulieu_tu == 1){
			loai_ds = "";
			chuyende = "";
			year_xh = "";
			hientrang = "";
		}
		if(dulieu_tu == 2){
			huyen = "";
			xaphuong = "";
			loai_ds = "";
			year_xh = "";
			hientrang = "";
		}
		if(dulieu_tu == 3){
			huyen = "";
			xaphuong = "";
			loai_ds = "";
			chuyende = "";
			hientrang = "";
		}
		if(dulieu_tu == 4){
			huyen = "";
			xaphuong = "";
			year_xh = "";
			chuyende = "";
			hientrang = "";
		}
		if(dulieu_tu == 5){
			huyen = "";
			xaphuong = "";
			year_xh = "";
			chuyende = "";
			loai_ds = "";
		}
		var strURL="admin.php?op=Search_BCvatthe&huyen="+huyen+"&xaphuong="+xaphuong+"&loai_ds="+loai_ds+"&chuyende="+chuyende+"&year_xh="+year_xh+"&hientrang="+hientrang;
		var req = getXMLHTTP();
		
		if (req) {
			
			req.onreadystatechange = function() {
				if (req.readyState == 4) {
					// only if "OK"
					if (req.status == 200) {	
					$("#danhsach_vatthe").show();					
						document.getElementById('danhsach_vatthe').innerHTML=req.responseText;						
					} else {
						alert("There was a problem while using XMLHTTP:\n" + req.statusText);
					}
				}				
			}			
			req.open("GET", strURL, true);
			req.send(null);
		}	
}
function Export_Xls2(){
	var huyen = $("#huyen").val();
		var xaphuong = $("#xaphuong").val();
		if(xaphuong == null)
			xaphuong = "";
		var loai_ds = $("#loai_ds").val();
		var chuyende = $("#chuyende").val();
		var year_xh = $("#year_xh").val();
		var hientrang = $("#hientrang").val();
		
		var dulieu_tu = $("#dulieu").val();
		if(dulieu_tu == 1){
			loai_ds = "";
			chuyende = "";
			year_xh = "";
			hientrang = "";
		}
		if(dulieu_tu == 2){
			huyen = "";
			xaphuong = "";
			loai_ds = "";
			year_xh = "";
			hientrang = "";
		}
		if(dulieu_tu == 3){
			huyen = "";
			xaphuong = "";
			loai_ds = "";
			chuyende = "";
			hientrang = "";
		}
		if(dulieu_tu == 4){
			huyen = "";
			xaphuong = "";
			year_xh = "";
			chuyende = "";
			hientrang = "";
		}
		if(dulieu_tu == 5){
			huyen = "";
			xaphuong = "";
			year_xh = "";
			chuyende = "";
			loai_ds = "";
		}
		

			window.location="admin.php?op=Export_Baocao_vt&huyen="+huyen+"&xaphuong="+xaphuong+"&loai_ds="+loai_ds+"&chuyende="+chuyende+"&year_xh="+year_xh+"&hientrang="+hientrang;
		}
