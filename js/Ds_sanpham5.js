$(document).ready(function(){
	$("#name_sp_1").focus();
});
function laysoluong(e,soluong){
	var name_sp = $("#name_sp_"+e).val();
	if(soluong!=''){
	$.ajax({
							type: "GET",
							url: 'admin.php?op=Check_sanpham',
							data: "name_sp="+name_sp+"&soluong="+soluong,
							success: function (ketqua) {
								var mang = ketqua.split(',');
								if(mang[0] != 0){
									$(".giasanpham_"+e).html(accounting.formatMoney(mang[0], "", 2, ".", ","));
									document.getElementById("giasanpham_"+e).value = mang[0];
									$(".thanhtien_"+e).html(accounting.formatMoney(mang[1], "", 2, ".", ","));
									document.getElementById("thanhtien_"+e).value = mang[1];
									tinhtong();
								}else{
									$(".hien_tiep").append('');
								}
									
							}
	})
	 }
}
function laygiatri(e,name_sp){
	var soluong = $("#soluong_"+e).val();
	 if(name_sp!=''){
			if(e>1){
				var tong = $("#tong").val();
				for(var i = 1; i<=tong; i++){
					if($("#name_sp_"+i).val()==name_sp){
						document.getElementById("soluong_"+i).value = parseInt($("#soluong_"+i).val()) + 1;
						document.getElementById("thanhtien_"+i).value = (parseInt($("#soluong_"+i).val()))*$("#giasanpham_"+i).val();
						document.getElementById("name_sp_"+e).value = "";
						$(".thanhtien_"+i).html(accounting.formatMoney($("#thanhtien_"+i).val(), "", 2, ".", ","));
						tinhtong();
						$("#name_sp_"+i).focus();
						
					}else{

				}
				}
			}else{
						$.ajax({
													type: "GET",
													url: 'admin.php?op=Check_sanpham',
													data: "name_sp="+name_sp+"&soluong="+soluong,
													success: function (ketqua) {
														var mang = ketqua.split(',');
														if(mang[0] != 0){
															//accounting.formatMoney(mang[0], "€", 2, ".", ",");
															$(".giasanpham_"+e).html(accounting.formatMoney(mang[0], "", 2, ".", ","));
															document.getElementById("giasanpham_"+e).value = mang[0];
															$(".thanhtien_"+e).html(accounting.formatMoney(mang[1], "", 2, ".", ","));
															document.getElementById("thanhtien_"+e).value = mang[1];
															document.getElementById('tong').value = e;
															var lansau = parseInt(e) +1;
															var id = "name_sp_"+lansau;
															var table = "table_"+lansau;
															var so_luong = "soluong_"+lansau;
															var class_lansau = "giasanpham_"+lansau;
															var class_thanhtien = "thanhtien_"+lansau;
															tinhtong();
															$(".hien_tiep").append('<table width="100%" border="0" class="table table-striped table-bordered table-hover" id='+table+'><tr><td class="text-center"  width="5%">'+lansau+'</td><td class="text-center" width="30%">  <input type="text" placeholder="Ma san pham '+lansau+'" class="form-control" id='+id+' size="40" onkeypress="return laygiatri('+lansau+',this.value)"></td><td class="text-center"  width="10%"><input type="text" size="10" value="1" name='+so_luong+' id='+so_luong+'  class="form-control"  onkeypress="return laysoluong('+lansau+',this.value)"/></td><td class="text-right"  width="20%"> <span class='+class_lansau+'></span><input type="hidden" id='+class_lansau+' name='+class_lansau+' value=""/></td><td class="text-right"><span class='+class_thanhtien+'></span><input type="hidden" id='+class_thanhtien+' name='+class_thanhtien+' value="" /></td> <td  class="text-center"></td></tr></table>');
															$("#name_sp_"+lansau).focus();
														}else{
															$("#'+id+'").append('');
														}
															
													}
							})
		}
		}
}


function tinhtong(){
	var tong_sosp = $("#tong").val();
	var tong = 0;
	var tong2 = 0;
	for(i=1;i<=tong_sosp;i++){
		tong2 += parseInt($("#thanhtien_"+i).val());
		tong += parseInt($.trim($(".thanhtien_"+i).html()).replace(/\./g,''));
	
	}
	$("#tong_tien").html(accounting.formatMoney(tong, "", 2, ".", ","));
	document.getElementById("tong_tiens").value = tong2;
	//$("#tong_chu").html(inWords(tong2));
	//$("#tong_tiens").html(tong2);
	
}
function thanhtoan(){
	var tong_sosp = $("#tong").val();
	var code_bar = '';
	var soluong = '';
	var thanhtien = '';
	var dongia = '';
	for(i=1;i<=tong_sosp;i++){
		code_bar += $("#name_sp_"+i).val()+',';	
		soluong += $("#soluong_"+i).val()+',';
		thanhtien += $("#thanhtien_"+i).val()+',';
		dongia += $("#giasanpham_"+i).val()+',';
	}
	var tongtien = $("#tong_tiens").val();
	$.ajax({
							type: "GET",
							url: 'admin.php?op=Thanhtoan_sanpham',
							data: "code_bar="+code_bar+"&soluong="+soluong+"&thanhtien="+thanhtien+"&tongtien="+tongtien+"&tong_sosp="+tong_sosp+"&dongia="+dongia,
							success: function (ketqua) {
							}
	})
}
function tt(){
	return false;
}
/*function inWords( num ) {

    var a = ['','một ','hai ','ba ','bốn ', 'năm ','sáu ','bảy ','tám ','chín ','mười ','mười một ','mười hai ','mười ba ','mười bốn ','mười năm ','mười sáu ','mười bảy ','mười tám ','mười chín '];

    var b = ['', '', 'hai mưoi','ba mươi','bốn mưoi','năm mươi', 'sáu mươi','bảy mươi','tám mươi','chín mươi'];

    var c = ['nghìn', 'triệu', ''];

    num = num.toString();

    if ( num.length > 9 ) { 

        return ''; // Number is larger than what function can deal with

    }

    num = ( '000000000' + num ).substr( -9 ); // // Make number into a predictiable nine character string

    num = num.match( /.{3}/g ); // Split string into chuncks of three numbers then reverse order of returned array

    var words = '';

    for( var i = 0; i < c.length; i++ ) {

        var n = num[i];

        var str = '';

        str += ( words != '' ) ? ' ' + c[i] + ' ' : '';

        str += ( n[0] != 0 ) ? ( a[Number( n[0] )] + 'trăm ' ) : '';

        n = n.substr( 1 );

        str += ( n != 0 ) ? ( ( str != '' ) ? ' ' : '' ) + ( a[Number( n )] || b[n[0]] + ' ' + a[n[1]] ) : '';

        words += str;

    }

    return words;

};*/