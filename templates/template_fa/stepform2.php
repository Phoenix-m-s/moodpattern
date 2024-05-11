<style>
    .wizard > .content > .body input{
        display:inline-block;
        text-align: center;
        margin: 6px;
    }
    .wizard > .content{
        background-color: #e4d2de !important;
    }
    .wizard > .steps .disabled a, .wizard > .steps .disabled a:hover, .wizard > .steps .disabled a:active{

        background: #e4e3e3  !important;
        color: #b9b3b3  !important;
    }
    .wizard > .actions .disabled a, .wizard > .actions .disabled a:hover, .wizard > .actions .disabled a:active{
        background: #e4e3e3 !important;
        color: #b9b3b3 !important;
    }
    .wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a:active
    {
        background: #e3b2e4 !important;
    }
    .wizard > .steps .done a, .wizard > .steps .done a:hover, .wizard > .steps .done a:active{
        background-color: #cc188c;
    }
    .wizard > .actions a, .wizard > .actions a:hover, .wizard > .actions a:active{
        background-color: #cc188c ;
        color: #f5ff48;
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
$approach = 2 ;

?>



<form id="regForm" action="" method="post">
    <input type="hidden" name="approach" id="approach" value="<?php echo $approach ;?>">
    <input type="hidden" name="user_topics_id" id="user_topics_id" value="<?php echo $list['list']['topic']['id'] ;?>">
    <input type="hidden" name="action" id="action" value="add">

    <div id="approach1" class="tab_ncontent text-center ">
        <h6 class="text-dark mb-5"><i class="fa fa-pencil-square-o text-dark"></i> <?php echo $approach2 ;?> </h6>

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
            <h4 class="text-center text-info"><?php echo 'موضوع: '.$list['list']['topic']['title']; ?></h4>
            <?php foreach ($list['list']['sensor'] as $k=>$v) {

                echo

                    '<h2>' . $v['title'] . '</h2>
                        <section>
                        <p>
                        ';
                if (isset($list['list']['sensor_words'][$v['id']])) {
                    foreach ($list['list']['sensor_words'][$v['id']] as $k2 => $v2) {
                        echo '
                         <div class="card-text">       
                         <h6 class="card-header">"' . $v2['word_title'] . '"</h6>
                         <div class="card-body text-center">
                    
                        <label><input type="radio"  name="' . $v2['word_id'] . '"  value="0">بدون مقدار</label>
                        <label><input type="radio"  name="' . $v2['word_id'] . '"  value="1">کم</label>
                        <label><input type="radio" name="' . $v2['word_id'] . '" checked value="2">متوسط</label>
                        <label><input type="radio" name="' . $v2['word_id'] . '"  value="3">زیاد</label>
                        <label><input type="radio" name="' . $v2['word_id'] . '"  value="4">خیلی زیاد</label>
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
