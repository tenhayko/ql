$(document).ready(function(){
	
	var id = $("#huyen").val();
	
	var edit_xa = $("#edit_xa").val();
	var edit_thon = $("#edit_thon").val();
	 $.ajax({
			type: "POST",
			url: 'admin.php?op=Check_xa_lehoi',
			data: "id="+id+"&xa="+edit_xa,
			success: function (ketqua2) {
				$("#statediv").html(ketqua2);
			}
		 });
	$.ajax({
			type: "POST",
			url: 'admin.php?op=Check_thon_lehoi',
			data: "id="+edit_xa+"&thon="+edit_thon,
			success: function (ketqua2) {
				$("#div_thon").html(ketqua2);
			}
		 });
});
function get_xa(id){
	var xa = 0;
	 $.ajax({
			type: "POST",
			url: 'admin.php?op=Check_xa_lehoi',
			data: "id="+id+"&xa="+xa,
			success: function (ketqua2) {
				$("#statediv").html(ketqua2);
			}
		 });
	}
function get_thon(id){
	var thon = 0;
	 $.ajax({
			type: "POST",
			url: 'admin.php?op=Check_thon_lehoi',
			data: "id="+id+"&thon="+thon,
			success: function (ketqua2) {
				$("#div_thon").html(ketqua2);
			}
		 });
	}