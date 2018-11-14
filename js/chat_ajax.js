//var t = setInterval(function(){get_chat_msg()},5000);
//var t2 = setInterval(function(){get_list_user_online()},2500);

//
// General Ajax Call



var oxmlHttp;
var oxmlHttpSend;

function get_message_from_to(name,id){
    //clearInterval(t2);
    var portalurl = $("#portalurl").val();
    //alert(id);
    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttp == null)
    {
        alert("Browser does not support XML Http Request");
       return;
    }
      //var id = sessionStorage.getItem("idmessagechat");

    oxmlHttp.onreadystatechange=function(){
        if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
        {
        if (document.getElementById(id) != null)
        {
            document.getElementById(id).innerHTML =  oxmlHttp.responseText;
            oxmlHttp = null;
        }
        
        }
    }
    
    //var scrollDiv = document.getElementById(id);
    //scrollDiv.scrollTop = scrollDiv.scrollHeight;
    oxmlHttp.open("GET",portalurl+"/admin.php?op=Get_message_from_to&name="+name,true);
    oxmlHttp.send(null);
}

function get_count_msg_unread(){
         var portalurl = $("#portalurl").val();
    //alert(id);
    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttp == null)
    {
        alert("Browser does not support XML Http Request");
       return;
    }
      //var id = sessionStorage.getItem("idmessagechat");

    oxmlHttp.onreadystatechange=function(){
        if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
        {
           $(".divchat").text(oxmlHttp.responseText);
      
        
        }
    }
 
    oxmlHttp.open("GET",portalurl+"/admin.php?op=Get_count_msg_unread",true);
    oxmlHttp.send(null);
}   
function get_chat_msg()
{
    var portalurl = $("#portalurl").val();

    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttp = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttp = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttp == null)
    {
        alert("Browser does not support XML Http Request");
       return;
    }
    
    oxmlHttp.onreadystatechange = get_chat_msg_result;
    oxmlHttp.open("GET",portalurl+"/admin.php?op=Get_list_msg",true);
    oxmlHttp.send(null);
}

function get_chat_msg_result()
{
    if(oxmlHttp.readyState==4 || oxmlHttp.readyState=="complete")
    {
        if (document.getElementById("DIV_CHAT") != null)
        {
            document.getElementById("DIV_CHAT").innerHTML =  oxmlHttp.responseText;
            oxmlHttp = null;
        }
        

        $(".Choose_user").click(function(){
            var name = $(this).attr("data-user");
            var id = $(this).find(".wrap-message").attr("data-id");
            $(".Choose_user").removeClass("active");
            $(this).addClass("active");
            $(".wrap-message").hide();
            $(".form-post-message").hide();
            //$(".wrap-message").hide();
            $(this).find(".wrap-message").css("display","inline-block");
            $(this).find(".form-post-message").show();
            

            $(".hdduserchosse").val(name);
            var t2 = setInterval(function(){get_message_from_to(name,id)},2500);
            //var t3 = setInterval(function(){get_count_msg_unread(name,id)},2500);
             setTimeout(function(){
                var scrollDiv = document.getElementById(id);
                scrollDiv.scrollTop = scrollDiv.scrollHeight;
            
            },3500);
            
        });
        
    }
}


function set_chat_msg(sender)
{
    var url = "";
    var strname="";
    var strmsg="";
    var rnames="";
    strname = $(".hdduserchosse").val();
   var portalurl = $("#portalurl").val();
   if($(sender).parent().find("#txtmsg").val()==""){
        alert("Bạn chưa nhập nội dung");
        return;
   }
   else{
        strmsg=$(sender).parent().find("#txtmsg").val();
   }

    


    if(typeof XMLHttpRequest != "undefined")
    {
        oxmlHttpSend = new XMLHttpRequest();
    }
    else if (window.ActiveXObject)
    {
       oxmlHttpSend = new ActiveXObject("Microsoft.XMLHttp");
    }
    if(oxmlHttpSend == null)
    {
       alert("Browser does not support XML Http Request");
       return;
    }
    rnames = "tdc";
    url = portalurl+"/admin.php?op=Send_list_msg&name=" + strname + "&msg=" + strmsg + "&rname=" + rnames;
    oxmlHttpSend.open("GET",url,true);
    oxmlHttpSend.send(null);
    $(sender).parent().find("#txtmsg").val("");
    var id = $(sender).closest(".Choose_user").find(".wrap-message").attr("id");
    var scrollDiv = document.getElementById(id);
         scrollDiv.scrollTop = scrollDiv.scrollHeight;
}

 function process(e) {
    var code = (e.keyCode ? e.keyCode : e.which);
    if (code == 13) { //Enter keycode
        //var sender = $(this).parent().find(".btn-send");
        //set_chat_msg(sender);
        //$(this).val("");
        $(".btn-send").click();
    }
}
