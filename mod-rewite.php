<?



//==========================================================


function ReplaceUrl($titleUrl)
{


    $titleUrl = trim($titleUrl);

    $titleUrl = str_replace("  ", " ", $titleUrl);

    $titleUrl = filter_text($titleUrl, $strip = "");


    $titleUrl = str_replace(" ", "-", $titleUrl);


    return $titleUrl;


}


//==========================================================


function check_str($value) //kiem tra xem phai la khong dau hay khong?


{


    for ($i = 0; $i < strlen($value); $i++) {


        $ord = ord($value{$i});


        if (($ord == 32) || ($ord == 35) || ($ord == 37) || ($ord == 38) || ($ord == 39) || ($ord >= 48 and $ord <= 57) || ($ord >= 65 and $ord <= 90) || ($ord >= 97 and $ord <= 122)) //0-9 a-z A - Z


        {
        } else {
            echo FALSE;
        }
    }
    echo TRUE;
}


//==========================================================


function remove_accents($string)


{


    $trans = array(


        'à' => 'a', 'á' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',


        'ă' => 'a', 'ằ' => 'a', 'ắ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',


        'â' => 'a', 'ầ' => 'a', 'ấ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',


        'À' => 'a', 'Á' => 'a', 'Ả' => 'a', 'Ã' => 'a', 'Ạ' => 'a',


        'Ă' => 'a', 'Ằ' => 'a', 'Ắ' => 'a', 'Ẳ' => 'a', 'Ẵ' => 'a', 'Ặ' => 'a',


        'Â' => 'a', 'Ầ' => 'a', 'Ấ' => 'a', 'Ẩ' => 'a', 'Ẫ' => 'a', 'Ậ' => 'a',


        'đ' => 'd', 'Đ' => 'd',


        'è' => 'e', 'é' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',


        'ê' => 'e', 'ề' => 'e', 'ế' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',


        'È' => 'e', 'É' => 'e', 'Ẻ' => 'e', 'Ẽ' => 'e', 'Ẹ' => 'e',


        'Ê' => 'e', 'Ề' => 'e', 'Ế' => 'e', 'Ể' => 'e', 'Ễ' => 'e', 'Ệ' => 'e',


        'ì' => 'i', 'í' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',


        'Ì' => 'i', 'Í' => 'i', 'Ỉ' => 'i', 'Ĩ' => 'i', 'Ị' => 'i',


        'ò' => 'o', 'ó' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',


        'ô' => 'o', 'ồ' => 'o', 'ố' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',


        'ơ' => 'o', 'ờ' => 'o', 'ớ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',


        'Ò' => 'o', 'Ó' => 'o', 'Ỏ' => 'o', 'Õ' => 'o', 'Ọ' => 'o',


        'Ô' => 'o', 'Ồ' => 'o', 'Ố' => 'o', 'Ổ' => 'o', 'Ỗ' => 'o', 'Ộ' => 'o',


        'Ơ' => 'o', 'Ờ' => 'o', 'Ớ' => 'o', 'Ở' => 'o', 'Ỡ' => 'o', 'Ợ' => 'o',


        'ù' => 'u', 'ú' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',


        'ư' => 'u', 'ừ' => 'u', 'ứ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',


        'Ù' => 'u', 'Ú' => 'u', 'Ủ' => 'u', 'Ũ' => 'u', 'Ụ' => 'u',


        'Ư' => 'u', 'Ừ' => 'u', 'Ứ' => 'u', 'Ử' => 'u', 'Ữ' => 'u', 'Ự' => 'u',


        'ỳ' => 'y', 'ý' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',


        'Y' => 'y', 'Ỳ' => 'y', 'Ý' => 'y', 'Ỷ' => 'y', 'Ỹ' => 'y', 'Ỵ' => 'y', '?' => '', '<br>' => '', '/' => '-', '$' => '', 'd’' => 'd', '”' => '', '´' => '', '“' => ''


    );


    $string_remove = strtr($string, $trans);


    $string_remove = ReplaceUrl($string_remove);


    return strtolower($string_remove);


}


//==========================================================


function ModRewriteUrl($menu_category_url, $menu_category_title)
{


    global $nukeurl, $formatfile, $formatfile_english, $currentlang;


    if ($currentlang == "vietnamese") $format_file = $formatfile;


    else $format_file = $formatfile_english;


    $menu_category_url = str_replace("&opcase=viewcontent&mcid", "", $menu_category_url);
    $menu_category_url = str_replace("News", "", $menu_category_url);

    $menu_category_url = str_replace("&opcases", "", $menu_category_url);


    $menu_category_url = str_replace("&opcase", "", $menu_category_url);


    $menu_category_url = str_replace("&op", "", $menu_category_url);


    $menu_category_url = str_replace("&mid", "", $menu_category_url);


    $menu_category_url = str_replace("&mcid", "", $menu_category_url);


    $menu_category_url = str_replace("&pcid", "", $menu_category_url);


    $menu_category_url = str_replace("&prid", "", $menu_category_url);


    $menu_category_url = str_replace("&pid", "", $menu_category_url);


    $menu_category_url = str_replace("&ccid", "", $menu_category_url);


    $menu_category_url = str_replace("&menuid", "", $menu_category_url);


    $menu_category_url = str_replace("&subid", "", $menu_category_url);


    $menu_category_url = str_replace("&id", "", $menu_category_url);


    $menu_category_url = str_replace("&act", "", $menu_category_url);


    $menu_category_url = str_replace("&type", "", $menu_category_url);


    $menu_category_url = str_replace("&so", "", $menu_category_url);
    $menu_category_url = str_replace("&quyenso", "", $menu_category_url);

    $menu_category_url = str_replace("Catalog", "", $menu_category_url);

    $menu_category_url = str_replace("detailProduct", "detail", $menu_category_url);
    $menu_category_url = str_replace("viewcatalogcat", "cat", $menu_category_url);
    $menu_category_url = str_replace("viewnewscat", "New", $menu_category_url);

    $menu_category_url = str_replace("detailService", "web", $menu_category_url);

    $menu_category_url = str_replace("detailTemplate", "tem", $menu_category_url);


    $menu_category_url = str_replace("Add_DK_quatrinhcongtac", "qua-trinh-cong-tac", $menu_category_url);
    $menu_category_url = str_replace("Add_DK_lichsubanthan", "dac-diem-lich-su-ban-than", $menu_category_url);
    $menu_category_url = str_replace("Add_DK_giadinh", "quan-he-gia-dinh", $menu_category_url);
    $menu_category_url = str_replace("Add_DK_trinhdo", "trinh-do-chuyen-mon", $menu_category_url);
    $menu_category_url = str_replace("Add_DK_nhanxet", "nhan-xet-danh-gia", $menu_category_url);

    $menu_category_url = str_replace("Add_DK_daotao", "thong-tin-dao-tao", $menu_category_url);

    $menu_category_url = str_replace("Add_DK_canhan", "sua-thong-tin-ca-nhan", $menu_category_url);


//$menu_category_url = str_replace("op", "", $menu_category_url);


    $url_array = array();


    $url_array = explode('=', $menu_category_url);


    $module_name = $url_array[1];


    $id_content = $url_array[2];


    $id = $url_array[3];


    $id2 = $url_array[4];


    $id3 = $url_array[5];


    $id4 = $url_array[6];


    if ($module_name) $link_module = $module_name . "/";


    else $link_module = '';


    $group_name = remove_accents($menu_category_title) . $format_file . "";


    if ($id_content) $id_link = $id_content . "/";


    else $id_link = "";


    if ($id) $id = $id . "/";


    else



        $id = "";


    if ($id2) $id2 = $id2 . "/";


    else



        $id2 = "";


    if ($id3) $id3 = $id3 . "/";


    else



        $id3 = "";


    if ($id4) $id4 = $id4 . "/";


    else



        $id4 = "";


    $RewriteUrl = $nukeurl . "/" . $link_module . $id_link . $id . $id2 . $id3 . $id4 . $group_name;


    //echo $RewriteUrl ."<br>";


//$RewriteUrl = $menu_category_url;


    return $RewriteUrl;


}


function rewriteUrl($name, $opcase, $pcid = 0, $prid = 0, $title)


{

    $title = trim($title);

    global $nukeurl;


    echo $pcid;


    echo 'o ta';


    $st = $nukeurl . "/" . $name . "/" . $opcase . "/" . $pcid . "/" . $prid . "/" . $title . "/";


    return $st;


}


?>