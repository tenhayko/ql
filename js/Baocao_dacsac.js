function timkiembc(){
		var huyen = $("#huyen").val();
		var xaphuong = $("#xaphuong").val();
		if(xaphuong == null)
			xaphuong = "";
		var strURL="admin.php?op=Search_BCdacsac&huyen="+huyen+"&xaphuong="+xaphuong;
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

