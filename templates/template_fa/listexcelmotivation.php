<?php
// Headers for download
header("Content-Disposition: attachment; filename=\"motivational_phrases.xls\"");
header("Content-Type: application/vnd.ms-excel");
?>
<html lang="fa-IR">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<table style="direction: rtl">
<tr>
    <th>عنوان</th>
    <th>عبارت فارسی</th>
    <th>عبارت انگلیسی</th>
    <th>نویسنده</th>
    <th>دسته بندی</th>
    <th>کاربر ثبت کننده</th>
</tr>
    <?php
    //print_r_debug($list);
    foreach($list['list'] as $k=>$v){
        echo '<tr>';
        echo '<td>'.$v['title'].'</td>';
        echo '<td>'.$v['phrase_fa'].'</td>';
        echo '<td>'.$v['phrase_en'].'</td>';
        echo '<td>'.$v['author'].'</td>';
        echo '<td>'.$v['life_area'].'</td>';
        echo '<td>'.$v['fname'].'</td>';
        echo '</tr>';
    }
    ?>
</table>
</body>
</html>