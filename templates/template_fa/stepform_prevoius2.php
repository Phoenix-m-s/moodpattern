<style>
    .wizard > .content > .body input{
        display:inline-block;
        text-align: center;
        margin: 6px;
    }
</style>
<?php
//echo '<pre>';print_r($list['list']['topic']);
if($list['list']['topic']['topic_type']==1){
    if($list['list']['topic']['verb_type']==1){
        $approach1 = 'انجام دادن' ;
        $approach2 = 'انجام ندادن' ;
    }elseif($list['list']['topic']['verb_type']==2){
        $approach1 = 'انجام ندادن' ;
        $approach2 = 'انجام دادن' ;
    }
}elseif($list['list']['topic']['topic_type']==2){
    if($list['list']['topic']['verb_type']==1){
        //        $approach1 = 'در رابطه ماندن' ;
        //        $approach2 = 'در رابطه نماندن' ;
        $approach1 = 'من درباره او فکر می کنم' ;
        $approach2 = 'او درباره من فکر می کند' ;
    }
    //    elseif($list['list']['topic']['verb_type']==2){
    //        $approach1 = 'در رابطه نماندن' ;
    //        $approach2 = 'در رابطه ماندن' ;
    //    }
}
//$approach = $list['list']['approach'] ;
$approach = 1 ;
?>


<h4 class="text-right text-info"><?php echo 'موضوع: '.$list['list']['topic']['title']; ?></h4>
<form id="regForm" action="" method="post">
    <input type="hidden" name="approach" id="approach" value="<?php echo $approach ;?>">
    <input type="hidden" name="user_topics_id" id="user_topics_id" value="<?php echo $list['list']['topic']['id'] ;?>">
    <input type="hidden" name="action" id="action" value="add">

    <div id="approach1" class="tab_ncontent text-center ">
        <h6 class="text-dark mb-5"><i class="fa fa-pencil-square-o text-dark"></i> <?php echo $approach1 ;?> </h6>

    </div>
    <div class="content">
        <script>
            $(function ()
            {
                $("#wizard").steps({
                    headerTag: "h2",
                    bodyTag: "section",
                    transitionEffect: "slideLeft"
                });
            });
        </script>
        <div id="wizard" dir="rtl">
            <?php foreach ($list['list']['sensor'] as $k=>$v) {
                echo '<h2>' . $v['title'] . '</h2>
                        <section>
                        <p>
                        ';
                if (isset($list['list']['sensor_words'][$v['id']])) {
                    foreach ($list['list']['sensor_words'][$v['id']] as $k2 => $v2) {
                        echo '
                         <div class="card-text">       
                         <h6 class="card-header">"' . $v2['word_title'] . '"</h6>
                         <div class="card-body text-center">
                    
                        <label class="mr-2"><input type="radio"  name="' . $v2['word_id'] . '" checked value="0">بدون مقدار</label>
                        <label class="mr-2"><input type="radio"  name="' . $v2['word_id'] . '"  value="1">کم</label>
                        <label class="mr-2"><input type="radio" name="' . $v2['word_id'] . '"  value="2">متوسط</label>
                        <label class="mr-2"><input type="radio" name="' . $v2['word_id'] . '"  value="3">زیاد</label>
                        <label class="mr-2"><input type="radio" name="' . $v2['word_id'] . '"  value="4">خیلی زیاد</label>
                </div>
                </div>
               ';
                    }
                }
                else{
                    echo '<div>
اطلاعات وجود ندارد
                    </div>
                ';
                }?>

                <?php echo '</h6></p>
        </section>';

            }
            ?>
        </div>
    </div>

</form>
