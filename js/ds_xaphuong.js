/**
 * Created with JetBrains PhpStorm.
 * User: Administrator
 * Date: 1/30/15
 * Time: 2:46 PM
 * To change this template use File | Settings | File Templates.
 */
function xoa_bt(){

    var answer = confirm("Bạn có chắc chắn xóa?");
    if(answer)
    {
        var table = $("#xa-portal").val();
        if(($('input:checkbox:checked').length)){
            var arr = new Array();
            var i=0;
            $('input:checkbox:checked').each(function () {
                arr[i] = $(this).val();
                i++;
            });
            $.ajax({
                type: "POST",
                url: "admin.php?op=Delete_xaphuong",
                data: "id="+arr+"&table="+table,
                cache: false,
                success: function(data) {

                    //Lay chi so index cua moi phan tu dang input:checkbox trong nhom duoc checked
                    $('input:checkbox:checked').each(function () {
                        var selectedIndex = $('input:checkbox').index($(this));
                        document.getElementById("xa-table").deleteRow(selectedIndex+1);
                    });

                }
            });
        }
    }
    else{

        $('input:checkbox').prop('checked',false);

    }
}

