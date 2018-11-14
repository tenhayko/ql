// lấy  
$(document).ready(function() {});
function tieptheo($page){
	var $number_per_page = $("#paginate_length").val();
     Timkiem($page, $number_per_page);
	 Timkiem_nangcao($page, $number_per_page);
}
function doiphantrang(){
	//alert('co toi');
        var $page = 1;
		var $number_per_page = $("#paginate_length").val();
        Timkiem($page, $number_per_page);
		 Timkiem_nangcao($page, $number_per_page);
}

function Timkiem_nangcao($page, $number_per_page){
	var name_disan = $("#ten_disan").val();
	var huyen = $("#huyen").val();
	var xaphuong =$("#xaphuong").val();
	var loai_ds = $("#loai_ds_nangcao").val();
	var chuyen_de = $("#chuyen_de").val();
	ham_chung($page, $number_per_page, name_disan, loai_ds, huyen, xaphuong, chuyen_de);
	
}
function Chitiet_timkiem($page, $number_per_page){
	
	var name_disan = "";
	var huyen = "";
	var xaphuong ="";
	var loai_ds = "";
	var chuyen_de = "";
	ham_chung($page, $number_per_page, name_disan, loai_ds, huyen, xaphuong, chuyen_de);
}
function ham_chung($page, $number_per_page, name_disan, loai_ds, huyen, xaphuong, chuyen_de){
	var portalurl = $("#portalurl").val();
	var page = $page;
	var number_per_page = $number_per_page;
	var strURL=portalurl+"/admin.php?op=Search_vatthe&name_disan="+name_disan+"&loai_ds="+loai_ds+"&huyen="+huyen+"&xaphuong="+xaphuong+"&chuyen_de="+chuyen_de+"&page="+page+ "&number_per_page="+number_per_page;
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