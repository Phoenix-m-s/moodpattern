<?php
//echo '<pre>';print_r($list['list']);
$mainTabTitle1 = 'فکر می کنم به انجام دادن' ;
$mainTabTitle2 = 'فکر می کنم به انجام ندادن' ;
if($list['list']['topic']['topic_type']==1){
    $approach1 = 'فکر می کنم اگه در نهایت به این هدف برسم حس من نسبت به چیزهایی که هر روز باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات این است که :' ;
    $approach2 = 'فکر می کنم اگه در نهایت به این هدف نرسم حس من به چیزهایی که هر روز باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات این است که :' ;
}elseif($list['list']['topic']['topic_type']==2){
    $approach1 = 'من بعضی وقت ها از بعضی جهات حس می کنم که اون : ' ;
    $approach2 = 'او احتمالا بعضی وقت ها از بعضی جهات با خودش درباره من میگه که : ' ;
    $mainTabTitle1 = 'فکر من در مورد او' ;
    $mainTabTitle2 = 'فکر او در مورد من' ;
}elseif($list['list']['topic']['topic_type']==3){
    $approach1 = 'اگر هر روز این کارها را انجام بدم حس من نسبت به انجام دادنشون بعضی وقت ها و از بعضی جهات این است که :' ;
    $approach2 = 'اگر هر روز این کارها را انجام ندم حس من نسبت به انجام ندادنشون بعضی وقت ها و از بعضی جهات این است که :' ;
}elseif($list['list']['topic']['topic_type']==4){
    $approach1 = 'اگر هر روز به کارها و رفتارهای مربوط به انجام این عادت بپردازم حس من نسبت به انجام دادنشون بعضی وقت ها و از بعضی جهات این است که :' ;
    $approach2 = 'اگر هر روز به کارها و رفتارهای مربوط به انجام این عادت نپردازم حس من نسبت به انجام ندادنشون بعضی وقت ها و از بعضی جهات این است که :' ;
}
$main_tab1 = array('title'=>$mainTabTitle1,'url'=>RELA_DIR . 'question/?topicId='.$list['list']['topic']['id'].'&approach=1') ;
$main_tab2 = array('title'=>$mainTabTitle2,'url'=>RELA_DIR . 'question/?topicId='.$list['list']['topic']['id'].'&approach=2') ;
$approach = $list['list']['approach'] ;
$rngsldrJsStr = '$(function() {' ;
$rngsldrCssStr = '' ;
$sensor_score = array() ;
foreach($list['list']['sensor'] as $k=>$v) {
    $score_word_sum = 0;
    $isScore = false ;
    foreach ($list['list']['sensor_words'][$v['id']] as $k2 => $v2) {
        $rngsldrJsStr .= '
        $("#range'.$v2['word_id'].'").rangeRover({
            range: false,
            mode: "categorized", // default plain

            data: [
                {
                    name: "خیلی کم",
                    start: 0,
                    end: 20,
                    color: "#6d99ff",
                    size: 10
                },
                {
                    name: "کم",
                    start: 20,
                    end: 40,
                    color: "#ff0000",
                    size: 10
                },
                {
                    name: "متوسط",
                    start: 40,
                    end: 60,
                    color: "#ffcc66",
                    size: 10
                },
                {
                    name: "زیاد",
                    start: 60,
                    end: 80,
                    color: "#6bf442",
                    size: 10
                },
                {
                    name: "تا حدودی",
                    start: 80,
                    end: 100,
                    color: "#cccccc",
                    size: 30
                }],
            onChange : function(val) {
                $("#val'.$v2['word_id'].'").val(val.start.value) ;
            }
        });
        ' ;
        $rngsldrCssStr .= '
            #range'.$v2['word_id'].' {
                direction: ltr;
                max-width: 500px;
                margin: 0 auto;
                margin-top: 100px;
                height: 50px;
            }
        ';
    }
    
}
$rngsldrJsStr .= '});' ;
//echo'<pre>';print_r($list['list']['last_score']) ;
?>
<script type="text/javascript">
    <?php //echo $rngsldrJsStr ; ?>
    $(document).ready(function() {
        $('#submitIdTemp').click(function (e) {
            e.preventDefault();
            document.getElementById("save_temp").value = 1;
            document.getElementById("regForm").submit();
        });
        $('#submitIdFinal').click(function (e) {
            e.preventDefault();
            document.getElementById("save_final").value = 1;
            document.getElementById("regForm").submit();
        })
    });
</script>
<style type="text/css">
 .wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a:active{
             text-align:center !important;
        }
        .wizard > .steps .disabled a, .wizard > .steps .disabled a:hover, .wizard > .steps .disabled a:active{
              text-align:center !important;
        }
        .wizard > .steps .done a, .wizard > .steps .done a:hover, .wizard > .steps .done a:active{
            text-align:center !important;
        }
          @media screen and (max-device-width:767px){
 
        h6{
            line-height:30px !important;
        }
        .wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a:active{
             text-align:center !important;
        }
        .wizard > .steps .disabled a, .wizard > .steps .disabled a:hover, .wizard > .steps .disabled a:active{
              text-align:center !important;
        }
        .wizard > .steps .done a, .wizard > .steps .done a:hover, .wizard > .steps .done a:active{
            text-align:center !important;
        }
        .slider.slider-horizontal{
            width: 85% !important;
        }
        .slider.slider-horizontal .slider-tick-label-container .slider-tick-label {
            margin:0 !important;
            width:18% !important;
            font-size:12px !important;
        }
        
        .slider-tick-label label-in-selection{
            text-align:center !important;
        }
        .row{
            margin:0 !important;
        }
    }
      @media screen and (max-device-width:767px){
 
        h6{
            line-height:30px !important;
        }
        .wizard > .steps .current a, .wizard > .steps .current a:hover, .wizard > .steps .current a:active{
             text-align:center !important;
        }
        .wizard > .steps .disabled a, .wizard > .steps .disabled a:hover, .wizard > .steps .disabled a:active{
              text-align:center !important;
        }
        .wizard > .steps .done a, .wizard > .steps .done a:hover, .wizard > .steps .done a:active{
            text-align:center !important;
        }
        .slider.slider-horizontal{
            width: 85% !important;
        }
        .slider.slider-horizontal .slider-tick-label-container .slider-tick-label {
            margin:0 !important;
            width:18% !important;
            font-size:12px !important;
        }
        
        .slider-tick-label label-in-selection{
            text-align:center !important;
        }
        .row{
            margin:0 !important;
        }
    }
        .wizard > .content > .body input{
            display:inline-block;
            text-align: center;
            margin: 6px;
        }
        .bg-info{
            background-color: #12d3cf !important;
        }
    <?php if($approach==2) {?>
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
                background-color: #bb7fa6;
            }
            .wizard > .actions a, .wizard > .actions a:hover, .wizard > .actions a:active{
                background-color: #bb7fa6 ;
                color: #f5ff48;
            }
            .bg-info{
                background-color: #bb7fa6 !important;
            }
    <?php }
        //echo $rngsldrCssStr;
    ?>
</style>

<div class="col-md-3 pull-right">


</div>

<div class="col-md-3 pull-left" style="z-index: 998;">
    <div class="dropdown text-center mt-2 " dir="rtl">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i> رویکرد
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item text-right"  href="<?php echo $main_tab1['url']; ?>"><i class="fa fa-pencil-square text-dark"></i> <?php echo  $main_tab1['title'];?></a>
            <a class="dropdown-item text-right" href="<?php echo $main_tab2['url']; ?>"><i class="fa fa-pencil-square"></i> <?php echo   $main_tab2['title'];?></a>

        </div>

    </div>
</div>
<div class="col-md-6 pull-left" style="z-index: 996;">
    <div id="approach1" class="tab_ncontent text-center ">
        <input type="submit" class="btn btn-info mt-2 mb-2" id="submitIdTemp" name="submitIdTemp" value="ذخیره موقت">
        <input type="submit" class="btn btn-primary mt-2 mb-2" id="submitIdFinal" name="submitIdFinal" value="ذخیره نهایی">

    </div>
</div>

<div class="row">
    <div class="col-md-8 center-block text-center mb-2 float-none;" style="z-index: 996;float:none !important;margin:0 auto;width:50%;">

    </div>
</div>
<div class="col-md-12">
    <form id="regForm" action="" method="post">

        <input type="hidden" name="approach" id="approach" value="<?php echo $approach ;?>">
        <input type="hidden" name="user_topics_id" id="user_topics_id" value="<?php echo $list['list']['topic']['id'] ;?>">
        <input type="hidden" name="action" id="action" value="add">
        <input type="hidden" name="save_final" id="save_final" value="0">
        <input type="hidden" name="save_temp" id="save_temp" value="0">


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

            <div id="wizard"  dir="rtl">
                <h4 class="text-center  text-info"><?php echo 'موضوع: '.$list['list']['topic']['title']; ?></h4>
                <?php foreach ($list['list']['sensor'] as $k=>$v) {
                    echo '<h2>' . $v['title'] . '</h2>
                            <section>
                            <p>
                            ';
                    if (isset($list['list']['sensor_words'][$v['id']])) {
                        echo '<h6 class="card-header  text-white bg-info" > <span class="text-right text-white">'.($approach==1?$approach1:($approach==2?$approach2:'')).'</span><span class="card-text text-right text-bold text-white bg-warning float-left" dir="rtl">امتیاز: '.(isset($list['list']['sum_score'][$approach][$v['id']])?$list['list']['sum_score'][$approach][$v['id']]:'نامشخص').'</span></h6>' ;
                        foreach ($list['list']['sensor_words'][$v['id']] as $k2 => $v2) {
                                echo '
                                <div class="card-text text-justify">

                                    <h6 class="card-header">"' . $v2['word_title'] . '"</h6>
                                    <div class="card-body text-justify text-center ">
                                        <label class="mr-2"><input type="radio"  name="' . $v2['word_id'] . '" ' . (isset($list['list']['last_score'][$approach][$v2['word_id']]) && ($list['list']['last_score'][$approach][$v2['word_id']] == 0) ? "checked" : "") . ' value=0>اصلاً</label>
                                        <label class="mr-2"><input type="radio"  name="' . $v2['word_id'] . '" ' . (isset($list['list']['last_score'][$approach][$v2['word_id']]) && ($list['list']['last_score'][$approach][$v2['word_id']] == 1) ? "checked" : "") . ' value=1>اندکی</label>
                                        <label class="mr-2"><input type="radio"  name="' . $v2['word_id'] . '" ' . (isset($list['list']['last_score'][$approach][$v2['word_id']]) && ($list['list']['last_score'][$approach][$v2['word_id']] == 3) ? "checked" : "") . ' value=3 >تا حدی</label>
                                        <label class="mr-2"><input type="radio" name="' . $v2['word_id'] . '"  ' . (isset($list['list']['last_score'][$approach][$v2['word_id']]) && ($list['list']['last_score'][$approach][$v2['word_id']] == 5) ? "checked" : "") . ' value=5 >زیاد</label>
                                        <label class="mr-2"><input type="radio" name="' . $v2['word_id'] . '"  ' . (isset($list['list']['last_score'][$approach][$v2['word_id']]) && ($list['list']['last_score'][$approach][$v2['word_id']] == 7) ? "checked" : "") . ' value=7  >خیلی زیاد</label>
                                        <label class="mr-2"><input type="radio" name="' . $v2['word_id'] . '"  ' . (isset($list['list']['last_score'][$approach][$v2['word_id']]) && ($list['list']['last_score'][$approach][$v2['word_id']] == 11) ? "checked" : "") . ' value=11 >بیش از حد</label>
                                    </div>
                                </div>';
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
</div>

</section>