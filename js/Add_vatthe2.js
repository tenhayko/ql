function ValidateForm(){
	alert(1);
	var name_vt = $("#name_vt").val();
	var huyen = $("#huyen").val();
	var diachi = $("#diachi").val();
	var xaphuong = $("#xaphuong").val();
	var loai_ds = $("#loai_ds").val();
	//var _validFileExtensions = [".doc", ".docx", ".pdf", ".zip", ".zar", ".xls", ".xlsx"];
	//var files_dk = $("#files_dk").val();
	//alert(files_dk);
	/*var files_dk = document.getElementById('files_dk');
	if(!validate_dk(files_dk)){
		alert(1);
		return false;
	}else{
		alert(2);
		return false;
	}*/
	var uploadImg = document.getElementById('files_dk');
    //uploadImg.files: FileList
    for (var i = 0; i < uploadImg.files.length; i++) {
       var f = uploadImg.files[i];
	   alert(f);
       if (!endsWith(f.name, 'xls') && !endsWith(f.name,'xlsx')) {
           alert(f.name + " is not a valid file!");
           return false;
       } else {
		   alert(hople);
           return false;

       }
    }
	if(name_vt == ''){
		alert("Bạn phải nhập tên vật thể");
		$("#name_vt").focus();
		return false;
	}else if(diachi == ''){
		alert("Bạn phải nhập địa chỉ");
		$("#diachi").focus();
		return false;
	}else if(huyen == ''){
		alert("Bạn phải chọn huyện");
		$("#huyen").focus();
		return false;
	}else if(xaphuong == ''){
		alert("Bạn phải chọn xã phường");
		$("#xaphuong").focus();
		return false;
	}else if(loai_ds == ''){
		alert("Bạn phải chọn thuộc loại nào");
		$("#loai_ds").focus();
		return false;
	}else if(loai_ds == ''){
		alert("Bạn phải chọn thuộc loại nào");
		$("#loai_ds").focus();
		return false;
	}else
   return false;

	
}
function endsWith(str, suffix) {
   return str.indexOf(suffix, str.length - suffix.length) !== -1;
}
function popitup(url) {
	newwindow=window.open(url,'name','height=500,width=620,scrollbars=yes');
	if (window.focus) {newwindow.focus()}
	return false;
}
$(document).ready(function(){
	var pid = $("#pid").val();
	//alert(pid);
	var video = $("#video").val();
	if(pid == ""){
		$("#add_xa").show();
		$("#edit_xa").hide();
		$("#video_add").show();
		$("#video_sua").hide();
			$("#dong_vieo").hide();
	$("#dongvideo").hide();
	$("#xemvideo").hide();
	$("#video_dak").hide();

	}else{
		$("#add_xa").hide();
		$("#edit_xa").show();
	}
	if(pid != "" && video == ""){
		$("#video_add").show();
		$("#video_sua").hide();
	}else{
		$("#video_add").show();
		$("#video_sua").show();
			$("#dong_vieo").hide();
		$("#dongvideo").hide();
		$("#xemvideo").show();
		$("#xemvideo").click(function() {
		$("#dong_vieo").show();
		$("#dongvideo").show();
		$("#xemvideo").hide();
	});
	$("#dongvideo").click(function() {
		$("#dong_vieo").hide();
		$("#dongvideo").hide();
		$("#xemvideo").show();
	});

	}
});
function chkallClick(o) {
  	var form = document.frmList;
	for (var i = 0; i < form.elements.length; i++) {
		if (form.elements[i].type == "checkbox" && form.elements[i].name!="checkall") {
			form.elements[i].checked = document.frmList.checkall.checked;
		}
	}
}