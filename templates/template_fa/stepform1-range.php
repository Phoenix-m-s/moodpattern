<?php
//echo '<pre>';print_r($list['list']);
$mainTabTitle1 = 'فکر می کنم به انجام دادن' ;
$mainTabTitle2 = 'فکر می کنم به انجام ندادن' ;
if($list['list']['topic']['topic_type']==1){
    $approach1 = 'وقتی این کار رو می کنم حس من نسبت به کارهایی که می کنم وچیزهایی که باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات اینکه...' ;
    $approach2 = 'اگه این کار رو نکنم حس من نسبت به کارهایی که می کنم و چیزهایی که هر روز باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات اینکه...' ;
}elseif($list['list']['topic']['topic_type']==2){
    $approach1 = 'من بعضی وقت ها از بعضی جهات  حس می کنم که اون ...' ;
    $approach2 = 'او احتمالا بعضی وقت ها از بعضی جهات با خودش درباره من می گه که...' ;
    $mainTabTitle1 = 'فکر من در مورد او' ;
    $mainTabTitle2 = 'فکر او در مورد من' ;
}elseif($list['list']['topic']['topic_type']==3){
    $approach1 = 'فکر می کنم اگه در نهایت به این هدف برسم حس من نسبت به چیزهایی که هر روز باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات اینکه...' ;
    $approach2 = 'فکر می کنم اگه در نهایت به این هدف نرسم حس من نسبت به چیزهایی که هر روز باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات اینکه...' ;
}elseif($list['list']['topic']['topic_type']==4){
    $approach1 = 'انجام دادن کارهایی که برای رسیدن به هدفم لازمه، بعضی وقت‌ها و از بعضی جهات باعث میشه حس کنم' ;
    $approach2 = 'اینکه خودم رو درگیر کارهایی که برای رسیدن به این هدف لازمه نمی‌کنم و مدام انجامشون نمی‌دم باعث میشه حس کنم' ;
}elseif($list['list']['topic']['topic_type']==5){
    $approach1 = 'اگه هر روز این کار رو بکنم حس من نسبت به کارهایی که می کنم وچیزهایی که باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات اینکه...' ;
    $approach2 = 'اگه این کار رو نکنم حس من نسبت به کارهایی که نمی کنم و چیزهایی که هر روز باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات اینکه...' ;
}elseif($list['list']['topic']['topic_type']==6){
    $approach1 = 'اگه به عادتم ادامه بدم حس من نسبت به کارهایی که هر روز می کنم وچیزهایی که باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات اینکه...' ;
    $approach2 = 'اگه عادتم رو کنار بزارم حس من نسبت به کارهایی که نمی کنم و چیزهایی که هر روز باهاش مواجه می شم، بعضی وقت ها و از بعضی جهات اینکه...' ;
}
$main_tab1 = array('title'=>$mainTabTitle1,'url'=>RELA_DIR . 'questionrange/?topicId='.$list['list']['topic']['id'].'&approach=1') ;
$main_tab2 = array('title'=>$mainTabTitle2,'url'=>RELA_DIR . 'questionrange/?topicId='.$list['list']['topic']['id'].'&approach=2') ;
$approach = $list['list']['approach'] ;
$finalStep = $list['list']['finalStep'] ;
//echo'<pre>';print_r($list['list']['last_score']) ;
$modalHeader = '' ;
$modalBody1 = '' ;
$modalBody2 = '' ;
if($finalStep==1){
    if($approach == 1) {
        $modalHeader = 'بیان میزان احساسات شما برای این موضوع ناقص است';
        $modalBody1 = 'شما در رویکرد فکر کردن به انجام دادن فعالیت‌های مربوط به رسیدن به هدف انتخابیتان هستید.<br>
پس از اینکه برای تمامی سنسورهای حسی (لذت، درد، اختیار، اجبار، به‌دست ‌آوردن، از‌دست دادن، امنیت، ناامنی، تایید، عد‌م‌تایید) میزان احساسات خود را مشخص کردید، دکمه «بعدی» را انتخاب نمایید.<br>
سپس شما وارد صفحه‌ای می‌شوید که با فکر کردن به <u>انجام ندادن</u> فعالیت‌های مربوط به رسیدن به هدف انتخابیتان می‌بایست میزان احساسات خود را برای تمام سنسورهای‌های حسی مشخص شده، تعیین نمایید.';
        $modalBody2 = '<strong>توجه: </strong> پس از ورود به صفحه رویکرد انجام ندادن، راهنمای نمایش داده شده را به دقت مطالعه نمایید و دکمه «متوجه شدم» را انتخاب کنید و پس از اینکه میزان احساسات خود برای تمام سنسورهای حسی مشخص نمودید، بر روی دکمه «مشاهده گراف حسی» کلیک کنید.';
    }elseif($approach == 2){
        $modalHeader = 'آیا از بیان احساسات خود مطمئن هستید؟';
        $modalBody1 = 'در صورتی‌که برای تمام سنسورهای حسی، میزان احساسات خود را مشخص کرده اید، مجدداً بر روی کلید «مشاهده گراف حسی» کلیک کنید.' ;
        $modalBody2 = '<strong>توجه: </strong> در صورتی که مجددا بر روی کلید «مشاهده گراف حسی» کلیک کنید، امکان ویرایش میزان احساسات خود را ندارید و بیان احساسات شما برای این موضوع نهایی می‌شود.' ;
    }
}
elseif($approach==1){
    if($list['list']['topic']['topic_type']==4){
        $modalHeader = 'فقط به کارهایی که لازم است انجام بدهی فکرکن' ;
        $modalBody1 = 'آیا تا به حال فکر کردی برای رسیدن به هدفت چه کارهایی لازم است که انجام دهی؟<br>
تا قبل از ورود به مرحله بعدی،  فقط به انجام دادن این دسته از کارها فکر کن.<br>
چه احساسی نسبت به انجام دادن آنها داری؟ درباره آنها چگونه فکر می کنی ؟<br>
<strong>دقت کن!</strong> منظور فکر کردن درباره رسیدن یا نرسیدن به هدف نیست بلکه منظور ‌فکر‌کردن درباره تمام کارهایی است که برای رسیدن به هدف لازم است که انجام دهی.<br>
پیشنهاد می کنم با خیال راحت به همه زمان‌ها ومکان‌هایی که این فعالیت ها را انجام می‌دهی، فکر کنی و همه‌ی شرایط را در‌نظر بگیری و نه فقط یک شرایط خاص. مثلا اگرحسی را تنها بعضی مواقع تجربه می کنی و در اکثر مواقع حس متضادش را داری، از آن صرف‌نظر‌نکن و اعلامش کن چراکه در مورد حس متضاد آن هم در مراحل بعدی، پرسش هایی مطرح خواهد شد.
' ;
        $modalBody2 = '<strong>مثال: </strong>هدف مشقلی یادگیری زبان انگلیسی است به طوریکه بتواند روان صحبت کند و بنویسد. او‌ برای رسیدن به این هدف لازم است کارهایی را انجام دهد که عبارتند از:<br>
من باید هر روز ده لغت جدید یاد بگیرم و حفظ کنم. روزی یک ساعت مطالعه کنم. هفته ای دو روز به آموزشگاه زبان بروم. شهریه ای را هم باید پرداخت کنم و زمان کمتری را برای دیدن فیلم خواهم داشت.<br>
<strong>مثال:</strong>  نازگلی می‌خواهد یک ورزشکار شود و صاحب اندامی ورزیده باشد. فعالیت هایی که لازم است در این راستا انجام دهد عبارتند از :<br>
من باید روزی یک ساعت و نیم ورزش کنم. باید صبح زودتر بیدار بشوم. بعد از ورزش باید دوش بگیرم. هفته ای دو الی سه بار باید به باشگاه بروم و زمان تفریحاتم را باید کم کنم.<br>
<strong>توجه:</strong> اگر هدف رژیم گرفتن یا ترک اعتیاد است لطفا گراف ترک عادت پر شود.
' ;
    }
}elseif($approach==2){
    if($list['list']['topic']['topic_type']==4) {
        $modalHeader = 'فکر کن کارهای لازم را انجام نمی دهی';
        $modalBody1 = 'چه کارهایی لازم است برای رسیدن به هدفت بصورت مرتب و مداوم انجام بدهی ؟<br>
حالا به این فکر کن که چه حسی دارد، اگر مجبور نباشی این کارها را انجام بدهی ؟<br>
دقت کن، منظورم حس ناشی از نرسیدن به هدفت نیست بلکه مجبور نبودن، موظف نبودن، انجام ندادن و بی خیال  شدن کارها چه حسی دارد ؟<br>
با چه شرایط مثبت و منفی مواجه میشوی؟<br>
برای پاسخ دادن با خیال راحت به همه زمان‌ها و مکان‌ها توجه کن نه فقط یک شرایط خاص. مثلا اگر حسی را فقط بعضی وقت ها داری یا بیشتر حس متضادش را داری، این حس را اعلام کن و خیالت تخت که درمورد حس متضادش هم ازت می پرسم.
';
        $modalBody2 = '<strong>مثال:</strong> هدف مشقلی یادگرفتن کامل زبان انگلیسی است.<br>
حالا فکر می کنه به اینکه مجبور نیست هر روز زبان بخونه و هر هفته کلاس بره. بجاش پولشو ذخیره می کنه و استراحت می کنه و البته باید غر زدن های مامانش رو هم تحمل کنه..
<strong>مثال:</strong> نازگلی می خواد ورزشکار بشه و صاحب بدن ورزیده ی بشه.<br>
اما هر روز ورزش نمی کنه،خسته نمیشه، زود بیدار نمیشه و عرق نمی نکنه. البته دوست های ورزشکارش رو هم کمتر می بینه. شایدم نبینه!
';
    }
}
?>
<style>
    .range-veryhigh{
        background: rgba(255,0,0,0.3);
    }
    .range-high{
        background: rgba(255,255,0,0.3);
    }
    .slider.slider-horizontal .slider-tick-label-container .slider-tick-label {
        width:18% !important;
    }
    .slider-tick-label-container{
        margin-right:-45px !important;
    }
    .slider.slider-horizontal{
        width: 400px !important;
    }

    font-size: 15px
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
    @media screen and (max-device-width:767px){
        .slider-tick-label-container{
            margin-right:-24px !important;
        }
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
    .modal-body{
        line-height: 1.7;
    }
</style>
<script type="text/javascript">


    $(document).ready(function() {

//        $('#submitIdTemp').click(function (e) {
//            e.preventDefault();
//            document.getElementById("save_temp").value = 1;
//            document.getElementById("regForm").submit();
//        });
        $('#submitIdFinal').click(function (e) {
            e.preventDefault();
            document.getElementById("save_final").value = 1;
            document.getElementById("regForm").submit();
        })
    });
    $(function () {
        //stepform
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            startIndex: <?php echo (isset($list['list']['topic']['save_step'])?$list['list']['topic']['save_step']:0) ?>,
            currentIndex: <?php echo (isset($list['list']['topic']['save_step'])?$list['list']['topic']['save_step']:0) ?>,
            onStepChanging: function(event, currentIndex, newIndex) {
                //console.log(currentIndex)
                document.getElementById("save_step").value = currentIndex;
                return true;
            }
        });
        //rangeslider
        $('[data-toggle="tooltip"]').tooltip();
        $('.range').each(function() {
            var $this = $(this),
                dataValue = $this.data('value');

            $this.sliderRange({
                ticks: [0, 20, 40, 60, 80, 100],
                ticks_snap_bounds: 0,
                //rangeHighlights:[{'start':80, 'end': 100, 'class': 'range-veryhigh'},{'start':60, 'end': 80, 'class': 'range-high'}]
            });

            $this.sliderRange('setValue', dataValue);

        });

        //for modal
        $(window).on('load',function(){
            $('#myModal').modal('show');
        });

    });
</script>
<style type="text/css">
    .wizard > .content > .body input{
        display:inline-block;
        text-align: center;
        margin: 6px;
    }
    .bg-info{
        background-color: #12d3cf !important;
    }
    .active_input{
        border:3px solid #41d32d;
        border: 3px solid #ccc;
        background-color: greenyellow;
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
    ?>
</style>


<div class="col-md-3 pull-right">


</div>

<div class="col-md-3 pull-left" style="z-index: 998;">
    <div class="dropdown text-left mt-2 " dir="rtl">
        <button type="submit" class="btn btn-info mt-2 mb-2" id="submitIdFinal" name="submitIdFinal" >
            <i class="fa fa-eye"></i> مشاهده گراف حسی
        </button>
<!--        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
<!--            <i class="fa fa-cog"></i> رویکرد-->
<!--        </button>-->
<!--        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">-->
<!--            <a class="dropdown-item text-right"  href="--><?php //echo $main_tab1['url']; ?><!--"><i class="fa fa-pencil-square text-dark"></i> --><?php //echo  $main_tab1['title'];?><!--</a>-->
<!--            <a class="dropdown-item text-right" href="--><?php //echo $main_tab2['url']; ?><!--"><i class="fa fa-pencil-square"></i> --><?php //echo   $main_tab2['title'];?><!--</a>-->
<!---->
<!--        </div>-->

    </div>
</div>
<div class="col-md-6 pull-left" style="z-index: 996;">
    <div id="approach1" class="tab_ncontent text-center ">
        <?php //echo '<input type="submit" class="btn btn-info mt-2 mb-2" id="submitIdTemp" name="submitIdTemp" value="ذخیره موقت">' ; ?>


    </div>
</div>

<div class="row">
    <div class="col-md-8 center-block text-center mb-2 float-none;" style="z-index: 996;float:none !important;margin:0 auto;width:50%;">

    </div>
</div>
<form id="regForm" action="" method="post">

    <input type="hidden" name="approach" id="approach" value="<?php echo $approach ;?>">
    <input type="hidden" name="user_topics_id" id="user_topics_id" value="<?php echo $list['list']['topic']['id'] ;?>">
    <input type="hidden" name="action" id="action" value="add">
    <input type="hidden" name="save_final" id="save_final" value="0">
    <input type="hidden" name="save_temp" id="save_temp" value="0">
    <input type="hidden" name="save_step" id="save_step" value="<?php echo (isset($list['list']['topic']['save_step'])?$list['list']['topic']['save_step']:'')?>">
    <input type="hidden" name="from_ajax" id="from_ajax" value="0" >


    <div class="content">
        <div id="wizard"  dir="rtl">
            <h4 class="text-center  text-info"><?php echo 'موضوع: '.$list['list']['topic']['title']; ?></h4>
            <?php foreach ($list['list']['sensor'] as $k=>$v) {
                echo '<h2>' . $v['title'] . '</h2>
                            <section>
                            <p>
                            ';
                if (isset($list['list']['sensor_words'][$v['id']])) {
                    //echo '<h6 class="card-header  text-white bg-info" style="font-size: 17px !important;" > <span class="text-right text-white">'.($approach==1?$approach1:($approach==2?$approach2:'')).'</span><span class="card-text text-right text-bold text-white bg-warning float-left" dir="rtl">امتیاز: '.(isset($list['list']['sum_score'][$approach][$v['id']])?$list['list']['sum_score'][$approach][$v['id']]:'نامشخص').'</span></h6>' ;
                    foreach ($list['list']['sensor_words'][$v['id']] as $k2 => $v2) {
                        echo '
                                <div class="card-text text-justify">

                                    <h6 class="card-header mt-5 mb-5" style="font-size: 15px !important;line-height: 30px!important;">"' . $v2['word_title'] . '"</h6>
                                    <div class="card-body text-justify text-center ">' ;
                                    if($v['sensor_type']==1) {
                                        echo '<input class="range" type="text" data-slider-ticks-labels=\'["هیچی","خیلی کم","کم و بیش","زیاد","خیلی زیاد","ذوق مرگ"]\' data-value="' . (isset($list['list']['last_score'][$approach][$v2['word_id']]) ? $list['list']['last_score'][$approach][$v2['word_id']] : 0) . '" name="' . $v2['word_id'] . '" >';
                                    }elseif($v['sensor_type']==2){
                                        echo '<input class="range" type="text" data-slider-ticks-labels=\'["هیچی","خیلی کم","کم و بیش","زیاد","خیلی زیاد","تا حد مرگ"]\' data-value="' . (isset($list['list']['last_score'][$approach][$v2['word_id']]) ? $list['list']['last_score'][$approach][$v2['word_id']] : 0) . '" name="' . $v2['word_id'] . '" >';
                                    }
                                    echo'</div>
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

<!-- Modal -->
<div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $modalHeader ; ?></h4>
            </div>
            <div class="modal-body text-justify">
<!--                <p>--><?php //echo $modalBody ; ?><!--</p>-->
                <div class="alert alert-info" role="alert">
                    <?php echo $modalBody1 ; ?>
                </div>
                <div class="alert alert-warning" role="alert">
                    <?php echo $modalBody2 ; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">متوجه شدم</button>
            </div>
        </div>

    </div>
</div>
