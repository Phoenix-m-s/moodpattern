<?php
//echo '<pre>';print_r($list['list']);

$stepTitle1 = 'داشتن فعالیت';
$stepTitle2 = 'نداشتن فعالیت';
$stepTitle3 = 'مشاهده گراف';
if ($list['list']['topic']['topic_type'] == 2) {
    //$approach1 = 'من بعضی وقت ها از بعضی جهات  حس می کنم که اون ...';
    //$approach2 = 'او احتمالا بعضی وقت ها از بعضی جهات با خودش درباره من می گه که...';
    $approach1 = 'گاهی یا همیشه حس می کنم رابطه ما با هم  برای من یعنی:' ;
    $approach2 = 'حس می کنم، گاهی یا همیشه اگر ما وارد زندگی هم <span style="border-bottom: 2px solid #000;">نمی‌شدیم </span> این برای من یعنی:' ;
    $step3 = 'گراف و تحلیل رابطه با' .$list['list']['topic']['title'].'»';
    $stepTitle1 = 'بودن در رابطه';
    $stepTitle2 = 'نبودن در رابطه';
}
elseif ($list['list']['topic']['topic_type'] == 4) {
    $approach1 = 'گاهی یا همیشه حس می‌کنم <span style="border-bottom: 2px solid #000;">داشتن</span> این فعالیت برای من یعنی:' ;
    $approach2 = 'گاهی یا همیشه حس می‌کنم <span style="border-bottom: 2px solid #000;">نداشتن</span> این فعالیت برای من یعنی:' ;
    $step3 = 'گراف و تحلیل فعالیت «' .$list['list']['topic']['title'].'»';
}

$main_tab1 = array('title' => $mainTabTitle1, 'url' => RELA_DIR . 'questionrange/?topicId=' . $list['list']['topic']['id'] . '&approach=1');
$main_tab2 = array('title' => $mainTabTitle2, 'url' => RELA_DIR . 'questionrange/?topicId=' . $list['list']['topic']['id'] . '&approach=2');
$approach = $list['list']['approach'];
$finalStep = $list['list']['finalStep'];
//echo'<pre>';print_r($list['list']['last_score']) ;
$modalHeader = '';
$modalBody1 = '';
$modalBody2 = '';
if ($list['list']['topic']['topic_type'] == 4) {
    $modalHeader = 'فقط به کارهایی که لازم است برای داشتن این فعالیت انجام بدهی فکرکن';
    $modalBody1 = 'ترسیم گراف حسی برای شما کار بسیار آسانی است،  من تنها دو سوال ساده از شما خواهم پرسید. در هر سوال از شما پرسیده می شود که در باره یک وضعیت خاص، به  مکالمات ذهنی،  تصورات و احساسات خود توجه کنی و سپس،  تعدادی جعبه وجود دارد  که هر جعبه تعدادی جمله هست. تنها کاری که لازم است انجام دهید این است که با استفاده از نوار ابزاری که زیر جعبه است شدت احساس خود را نسبت به قوی ترین عبارت داخل جعبه مشخص کنی.
آیا تا به حال فکر کردی برای رسیدن به هدفت چه کارهایی لازم است که انجام دهی؟<br>
چه احساسی نسبت به انجام دادن آنها داری؟ درباره آنها چگونه فکر می کنی؟<br>
<strong>دقت کن!</strong> منظور فکر کردن درباره رسیدن یا نرسیدن به هدف نیست بلکه منظور ‌فکر‌کردن درباره تمام کارهایی است که برای رسیدن به هدف لازم است که انجام دهی.<br>
به احساسات و تجربه های درونی و بیرونی خودت  توجه کن،  درصفحه بعدی که نمایش داده می‌شود، پرسش بالای صفحه را از خود بپرس و با استفاده از نوار حس گر زیر هر جعبه به احساس برنگیزترین عبارت درون جعبه برای خودت واکنش نشان بده. ( دقت کن نیازی نیست به عبارت های ضعیف یا بی ربط توجه داشته باشی،  فقط به قوی ترین عبارت توجه کن. اگر همه عبارت های داخل جعبه را در پاسخ به سوال خیلی ضعیف یا بی ربط حس کردی شدت احساس شما ((هیچی)) خواهد بود ولی اگر نسبت به عبارتی از احساسی غیر طبیعی و بسیار شدید داشتی شدت احساس شما (( در حد مرگ یا ذوق مرگ)) خواهد بود.
';
    $modalBody2 = '<strong>مثال: </strong>هدف مشقلی یادگیری زبان انگلیسی است به طوریکه بتواند روان صحبت کند و بنویسد. او‌ برای رسیدن به این هدف لازم است کارهایی را انجام دهد که عبارتند از:<br>
من باید هر روز ده لغت جدید یاد بگیرم و حفظ کنم. روزی یک ساعت مطالعه کنم. هفته ای دو روز به آموزشگاه زبان بروم. شهریه ای را هم باید پرداخت کنم و زمان کمتری را برای دیدن فیلم خواهم داشت.<br>
<strong>مثال:</strong>  نازگلی می‌خواهد یک ورزشکار شود و صاحب اندامی ورزیده باشد. فعالیت هایی که لازم است در این راستا انجام دهد عبارتند از :<br>
من باید روزی یک ساعت و نیم ورزش کنم. باید صبح زودتر بیدار بشوم. بعد از ورزش باید دوش بگیرم. هفته ای دو الی سه بار باید به باشگاه بروم و زمان تفریحاتم را باید کم کنم.<br>
<strong>توجه:</strong> اگر هدف رژیم گرفتن یا ترک اعتیاد است لطفا گراف ترک عادت پر شود.
';
    $modalHeader2 = 'فقط به کارهایی که لازم است برای نداشتن این فعالیت انجام بدهی فکرکنی';
    $modal2Body1 = 'چه کارهایی لازم است برای رسیدن به هدفت بصورت مرتب و مداوم انجام بدهی ؟<br>
حالا به این فکر کن که چه حسی دارد، اگر مجبور نباشی این کارها را انجام بدهی ؟<br>
دقت کن، منظورم حس ناشی از نرسیدن به هدفت نیست بلکه مجبور نبودن، موظف نبودن، انجام ندادن و بی خیال  شدن کارها چه حسی دارد ؟<br>
با چه شرایط مثبت و منفی مواجه میشوی؟<br>
برای پاسخ دادن با خیال راحت به همه زمان‌ها و مکان‌ها توجه کن نه فقط یک شرایط خاص. مثلا اگر حسی را فقط بعضی وقت ها داری یا بیشتر حس متضادش را داری، این حس را اعلام کن و خیالت تخت که درمورد حس متضادش هم ازت می پرسم.
';
    $modal2Body2 = '<strong>مثال:</strong> هدف مشقلی یادگرفتن کامل زبان انگلیسی است.<br>
حالا فکر می کنه به اینکه مجبور نیست هر روز زبان بخونه و هر هفته کلاس بره. بجاش پولشو ذخیره می کنه و استراحت می کنه و البته باید غر زدن های مامانش رو هم تحمل کنه..
<strong>مثال:</strong> نازگلی می خواد ورزشکار بشه و صاحب بدن ورزیده ی بشه.<br>
اما هر روز ورزش نمی کنه،خسته نمیشه، زود بیدار نمیشه و عرق نمی نکنه. البته دوست های ورزشکارش رو هم کمتر می بینه. شایدم نبینه!
';
}
elseif ($list['list']['topic']['topic_type'] == 2) {
    $modalHeader = 'بودن در رابطه';
    $modalBody1 = 'ترسیم گراف حسی برای شما کار بسیار آسانی است،  من تنها دو سوال ساده از شما خواهم پرسید. در هر سوال از شما پرسیده می شود که در باره یک وضعیت خاص، به  مکالمات ذهنی،  تصورات و احساسات خود توجه کنی و سپس،  تعدادی جعبه وجود دارد  که هر جعبه تعدادی جمله هست. تنها کاری که لازم است انجام دهید این است که با استفاده از نوار ابزاری که زیر جعبه است شدت احساس خود را نسبت به قوی ترین عبارت داخل جعبه مشخص کنی.<br>
البته لازم است که این کار را برای تمام جعبه ها انجام دهی. <br>
به بودن در رابطه خودت با او فکر کن. به افکار،  احساسات و تجربه های درونی و بیرونی خودت  توجه کن،  در صفحه بعد که نمایش داده می‌شود، پرسش بالای صفحه را از خود بپرس و با استفاده از نوار حس گر زیر هر جعبه به احساس برنگیزترین عبارت درون جعبه برای خودت واکنش نشان بده. ( دقت کن نیازی نیست به عبارت های ضعیف یا بی ربط توجه داشته باشی،  فقط به قوی ترین عبارت توجه کن. اگر همه عبارت های داخل جعبه را در پاسخ به سوال خیلی ضعیف یا بی ربط حس کردی شدت احساس شما ((هیچی)) خواهد بود ولی اگر نسبت به عبارتی از احساسی غیر طبیعی و بسیار شدید داشتی شدت احساس شما (( در حد مرگ یا ذوق مرگ)) خواهد بود.
';
    $modalBody2 = '';
    $modalHeader2 = 'نبودن در رابطه';
    $modal2Body1 = 'در این مرحله، تصور کن ممکن بود اصلا وارد زندگی یکدیگر نمی شدید. به احساسات و تجربه های درونی و بیرونی خودت در این تصور توجه کن،  پرسش زیر را از خود بپرس و با استفاده از نوار حس گر زیر هر جعبه به احساس برانگیزترین عبارت درون جعبه برای خودت  واکنش نشان بده. ( اهمیتی به عبارت های ضعیف تر و بی ربط نده). به هر ٣٠ جعبه امتیاز بده. ';
    $modal2Body2 = '';
}

?>
<style type="text/css">
    .btn-group>.btn:last-child:not(:first-child), .btn-group>.dropdown-toggle:not(:first-child){
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        float: left !important;
        border-radius:25px !important;
    }
    .btn-group>.btn:first-child:not(:last-child):not(.dropdown-toggle){
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        float: right !important;
        border-radius: 25px !important;
    }
    .range-veryhigh {
        background: rgba(255, 0, 0, 0.3);
    }



    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        font-size: 24px;
        border: none;
        outline: none;
        background-color: red;
        color: white;
        cursor: pointer;
        padding: 10px;
        border-radius: 4px;
    }

    #myBtn:hover {
        background-color: #555;
    }



    .modal .show{
        z-index: 99999;
    }
    .range-high {
        background: rgba(255, 255, 0, 0.3);
    }

    .slider.slider-horizontal .slider-tick-label-container .slider-tick-label {
        width: 18% !important;
    }

    .slider-tick-label-container {
        margin-right: -45px !important;
    }

    .slider.slider-horizontal {
        width: 400px !important;
    }
    h6 {
        line-height: 30px !important;
    }

    @media screen and (max-device-width: 767px) {
        .slider-tick-label-container {
            margin-right: -24px !important;
        }

        h6 {
            line-height: 30px !important;
        }

        .slider.slider-horizontal {
            width: 85% !important;
        }

        .slider.slider-horizontal .slider-tick-label-container .slider-tick-label {
            width: 19% !important;
            font-size: 10px !important;
        }

        .slider-tick-label .label-in-selection {
            text-align: center !important;
        }

        .row {
            margin: 0 !important;
        }
    }

    .modal-body {
        line-height: 1.7;
    }
</style>

<style type="text/css">
  .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th{
        border: 1px solid #ccc !important;
      box-shadow: 0 0 2px #ccc;
    }

    h3.sticky {
        position: -webkit-sticky;
        position: sticky;
        z-index: 999;
        top: 0;
        background-color: #5bc0de;
        color: #2f0224;
        font-size: 16px;
        direction: rtl;
        text-align: right;
        padding-right: 13px;
        padding-left: 13px;
        line-height: 50px;
        height: 50px;
        border-radius: 5px !important
    }

    .bg-info {
        background-color: #5bc0de !important;
    }
    .panel-success .bg-footer-positive{
        background-color: #d8ecd0 !important;
    }
    .panel-danger .bg-footer-negative {
        background-color: #f3d8d8 !important;
    }
    .stickybg1{

        background-color: #778899 !important;
        background: #3a6b6b;
        background: -moz-linear-gradient(top, #f6e2ff 0%, #a0ffe1 5%, #3a6b6b  100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f6e2ff), color-stop(5%,#a0ffe1), color-stop(100%,#3a6b6b));
        background: -webkit-linear-gradient(top, #f6e2ff 0%,#a0ffe1 5%,#3a6b6b 100%);
        background: -o-linear-gradient(top, #f6e2ff 0%,#a0ffe1 5%,#3a6b6b 100%);
        background: -ms-linear-gradient(top, #f6e2ff 0%,#a0ffe1 5%,#3a6b6b 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3e0e4e', endColorstr='#ad32d6',GradientType=0 );
        background: linear-gradient(top, #f6e2ff 0%,#a0ffe1 5%,#3a6b6b 100%);
        box-shadow: 0px 2px 3px 1px #231823;
        border: 1px solid #c7c7be;
        color: #10165a !important;



    }
    .stickybg2{
        background-color: #778899 !important;
        background: #ad32d6;
        background: -moz-linear-gradient(top, #eeecef 0%, #d2cac8 18%, #bd7486  100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#eeecef), color-stop(18%,#d2cac8), color-stop(100%,#bd7486));
        background: -webkit-linear-gradient(top, #eeecef 0%,#d2cac8 18%,#bd7486 100%);
        background: -o-linear-gradient(top, #eeecef 0%,#d2cac8 18%,#bd7486 100%);
        background: -ms-linear-gradient(top, #eeecef 0%,#d2cac8 18%,#bd7486 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3e0e4e', endColorstr='#ad32d6',GradientType=0 );
        background: linear-gradient(top, #eeecef 0%,#d2cac8 18%,#bd7486 100%);
        box-shadow: 0px 2px 3px 1px #231823;
        border: 1px solid #c7c7be;
    }
    .active_input {
        border: 3px solid #41d32d;
        border: 3px solid #ccc;
        background-color: greenyellow;
    }
    .table_border_s1{
        vertical-align:middle !important;
        width:10%;
        color:#fff;
        background-color:#299a90;

    }
    .table_border_s2{
        vertical-align:middle !important;
        width:10%;
        color:#fff;
        background-color:#bd7486;

    }


</style>

<style>
    /* The heart of the matter */
    /*.testimonial-group > .row {*/
        /*display: flex;*/
        /*flex-wrap: nowrap;*/
        /*overflow-x: auto;*/
    /*}*/
    /*.testimonial-group > .row > .col-xs-4 {*/
        /*flex: 0 0 auto;*/
    /*}*/

</style>
<form id="regForm" action="" method="post">

    <input type="hidden" name="user_topics_id" id="user_topics_id" value="<?php echo $list['list']['topic']['id']; ?>">
    <input type="hidden" name="action" id="action" value="add">
    <input type="hidden" name="save_final" id="save_final" value="0">
    <div id="">

        <div class=" testimonial-group">
            <div class=" text-center">
                <div id="smartwizard">

                    <ul>
                        <li ><a href="#step-1">مرحله 1<br/>
                                <small><?php echo $stepTitle1 ; ?></small>
                            </a></li>
                        <li><a href="#step-2">مرحله 2<br/>
                                <small><?php echo $stepTitle2 ; ?></small>
                            </a></li>
                        <li><a href="#step-3">مرحله 3<br/>
                                <small><?php echo $stepTitle3 ; ?></small>
                            </a></li>
                    </ul>
                    <div>
                        <div id="step-1" class="">
                            <h3 class="border-bottom border-gray pb-2 sticky stickybg1">
                                <span style="float: right"> <i class="fa fa-check-square-o"> </i> <?php echo $approach1 ?></span>
                                <span style="float: left"> <i class="fa fa-pencil-square-o"> </i> <?php echo $list['list']['topic']['title']; ?></span>
                            </h3>
                            <!--panel 1-->
                            <?php foreach ($list['list']['sensor'] as $k=>$v) { ?>
                                <div  class="panel" dir="rtl">
                                    <div class="<?php echo ($v['sensor_type']==1?'panel-body alert-success':'panel-body alert-danger'); ?> text-center">

                                        <table class="table table-bordered">
                                            <?php
                                            if (isset($list['list']['sensor_words'][$v['id']])) {
                                                $i=1;
                                                foreach ($list['list']['sensor_words'][$v['id']] as $k2 => $v2) {
                                                    ?>
                                                    <tr><?php echo ($i==1?'<td rowspan="3" class="'.($v['sensor_type']==1?'table_border_s1':'table_border_s2').'">'.$v['title'].'</td>':'')?><td style="text-align: right"><?php echo $v2['word_title']; ?></td></tr>
                                                    <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </table>
                                        <?php
                                        if($v['sensor_type']==1) {
                                            echo '<input class="range" type="text" data-slider-ticks-labels=\'["هیچی","خیلی کم","کم و بیش","زیاد","خیلی زیاد","ذوق مرگ"]\' data-value="0" name="1_' . $v['id'] . '" >';
                                        }elseif($v['sensor_type']==2){
                                            echo '<input class="range" type="text" data-slider-ticks-labels=\'["هیچی","خیلی کم","کم و بیش","زیاد","خیلی زیاد","تا حد مرگ"]\' data-value="0" name="1_' . $v['id'] . '" >';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>



                        <div id="step-2" class="">
                            <h3 class="border-bottom border-gray pb-2 sticky stickybg2">
                                <span style="float: right"> <i class="fa fa-check-square-o"> </i> <?php echo $approach2 ?></span>
                                <span style="float: left"> <i class="fa fa-pencil-square-o"> </i> <?php echo $list['list']['topic']['title']; ?></span>
                            </h3>
                            <!--panel 1-->
                            <?php foreach ($list['list']['sensor'] as $k=>$v) { ?>
                                <div  class="panel" dir="rtl">
                                    <div class="<?php echo ($v['sensor_type']==1?'panel-body alert-success':'panel-body alert-danger'); ?> text-center">

                                        <table class="table table-bordered">
                                            <?php
                                            if (isset($list['list']['sensor_words'][$v['id']])) {
                                                $i=1;
                                                foreach ($list['list']['sensor_words'][$v['id']] as $k2 => $v2) {
                                                    ?>
                                                    <tr><?php echo ($i==1?'<td rowspan="3" class="'.($v['sensor_type']==1?'table_border_s1':'table_border_s2').'">'.$v['title'].'</td>':'')?><td style="text-align: right"><?php echo $v2['word_title']; ?></td></tr>
                                                    <?php
                                                    $i++;
                                                }
                                            }
                                            ?>
                                        </table>
                                        <?php
                                        if($v['sensor_type']==1) {
                                            echo '<input class="range" type="text" data-slider-ticks-labels=\'["هیچی","خیلی کم","کم و بیش","زیاد","خیلی زیاد","ذوق مرگ"]\' data-value="0" name="2_' . $v['id'] . '" >';
                                        }elseif($v['sensor_type']==2){
                                            echo '<input class="range" type="text" data-slider-ticks-labels=\'["هیچی","خیلی کم","کم و بیش","زیاد","خیلی زیاد","تا حد مرگ"]\' data-value="0" name="2_' . $v['id'] . '" >';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>

                        </div>
                        <div id="step-3" class="">

                            <div class="panel panel-success" dir="rtl">
                                <div class="panel-heading  ">
                                    <h4 class="panel-title text-center">ثبت نهایی و مشاهده گراف</h4>
                                </div>
                                <div class="panel-body text-justify text-right">
                                    در صورتی که از بیان شدت احساسات خود مطمئن هستی، دکمه «ثبت شود» را کلیک کن تا گراف و تحلیل مربوط به موضوع خود را مشاهده کنی.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</form>

<!-- Modal1 -->
<div class="modal" id="myModal1" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalHelpHeader" class="modal-title"><?php echo $modalHeader; ?></h4>
            </div>
            <div class="modal-body text-justify">
                <!--                <p>--><?php //echo $modalBody ; ?><!--</p>-->
                <div id="modalHelpBoby1" class="alert alert-info" role="alert">
                    <?php echo $modalBody1; ?>
                </div>
<!--                <div id="modalHelpBoby2" class="alert alert-warning" role="alert">-->
<!--                    --><?php //echo $modalBody2; ?>
<!--                </div>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="topFunction();" data-dismiss="modal">متوجه شدم</button>
            </div>
        </div>

    </div>
</div>
<!-- Modal1 -->
<div class="modal" id="myModal2" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="modalHelpHeader" class="modal-title"><?php echo $modalHeader2; ?></h4>
            </div>
            <div class="modal-body text-justify">
                <!--                <p>--><?php //echo $modalBody ; ?><!--</p>-->
                <div id="modalHelpBoby1" class="alert alert-info" role="alert">
                    <?php echo $modal2Body1; ?>
                </div>
<!--                <div id="modalHelpBoby2" class="alert alert-warning" role="alert">-->
<!--                    --><?php //echo $modal2Body2; ?>
<!--                </div>-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="topFunction();" data-dismiss="modal">متوجه شدم</button>
            </div>
        </div>

    </div>
</div>

<script>

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        //alert('xx');
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    $(document).ready(function () {
        //Get the button
        //rangeslider
        $('[data-toggle="tooltip"]').tooltip();
        $('.range').each(function () {
            var $this = $(this),
                dataValue = $this.data('value');

            $this.sliderRange({
                ticks: [0, 20, 40, 60, 80, 100],
                ticks_snap_bounds: 0
                //rangeHighlights:[{'start':80, 'end': 100, 'class': 'range-veryhigh'},{'start':60, 'end': 80, 'class': 'range-high'}]
            });

            $this.sliderRange('setValue', dataValue);

        });

        // Step show event
        $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
            //alert("You are on step "+stepNumber+" now");
            if (stepPosition === 'first') {
                $("#prev-btn").addClass('disabled');
            } else if (stepPosition === 'final') {
                $("#next-btn").addClass('disabled');
            } else {
                $("#prev-btn").removeClass('disabled');
                $("#next-btn").removeClass('disabled');
            }
            if(stepNumber == "0") {
                $('#myModal1').modal('show');
                $('.btn-info').attr("disabled", true);
                $('.btn-danger').attr("disabled", true);
                $( ".sw-toolbar-top" ).show();
            } else if(stepNumber == "1"){
                $('#myModal2').modal('show');
                $('.btn-info').attr("disabled", true);
                $('.btn-danger').attr("disabled", true);
                $( ".sw-toolbar-top" ).show();
            }else if(stepNumber == "2"){
                $('.btn-info').attr("disabled", false);
                $('.btn-danger').attr("disabled", true);
                $( ".sw-toolbar-top" ).hide();
            }
            topFunction();
        });

        // Toolbar extra buttons

        var btnFinish = $('<button></button>').text('ثبت شود')
            .addClass('btn btn-info')
            .attr("disabled", true)
            .on('click', function () {
                //alert('Finish Clicked');
                document.getElementById("regForm").submit();
            });
        var btnCancel = $('<button></button>').text('لغو')
            .addClass('btn btn-danger')
            .attr("disabled", true)
            .on('click', function () {
                $('#smartwizard').smartWizard("reset");
            });


        // Smart Wizard
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'circles',
            transitionEffect: 'fade',
            showStepURLhash: true,
            toolbarSettings: {
                toolbarPosition: 'both',
                toolbarButtonPosition: 'end',
                toolbarExtraButtons: [btnFinish, btnCancel]
            }
        });


        // External Button Events
        $("#reset-btn").on("click", function () {
            // Reset wizard
            $('#smartwizard').smartWizard("reset");
            return true;
        });

        $("#prev-btn").on("click", function () {
            // Navigate previous
            $('#smartwizard').smartWizard("prev");
            topFunction() ;
            return true;
        });

        $("#next-btn").on("click", function () {
            // Navigate next
            $('#smartwizard').smartWizard("next");
            topFunction() ;
            return true;
        });

//        $("#theme_selector").on("change", function () {
//            // Change theme
//            $('#smartwizard').smartWizard("theme", $(this).val());
//            return true;
//        });
//
//        // Set selected theme on page refresh
//        $("#theme_selector").change();

    });

</script>