<?php
function get_pagging($num_page, $page, $url)
{
    $str_pagging = "<ul class='pagination'>";
    if ($page > 1) {
        $page_prev = $page - 1;

        $str_pagging .= "<li><a href='$url&page=$page_prev' class='prev' title='previous page'>&#10094;</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if ($page == $i) {
            $active = "class = 'active'";
        }
        $str_pagging .= "<li><a href='$url&page=$i' $active>$i</a></li>";
        unset($active);
    }

    if ($page < $num_page) {
        $page_next = $page + 1;
        $str_pagging .= "<li><a href='$url&page=$page_next' class='next' title='next page'>&#10095;</a></li>";
    }
    $str_pagging .= "</ul>";

    return $str_pagging;
}

function dangxuat(){
    if (isset($_SESSION['user'])) {
        unset($_SESSION['role']);
        unset($_SESSION['user']);
    }
}
?>