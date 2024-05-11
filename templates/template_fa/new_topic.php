<style>
    #left_form p{
        font-size: 14px !important;
    }
    .faqHeader {
        font-size: 13px;
        margin: 5px;
    }
    .panel {
        margin: 15px !important;
    }
    .panel-title{
        font-size: 12px !important;
    }
    .panel-heading [data-toggle="collapse"]:after {
        font-family: 'Glyphicons Halflings';
        content: "\e072"; /* "play" icon */
        float: left;
        color: #F58723;
        font-size: 11px;
        line-height: 22px;
        /* rotate "play" icon from > (right arrow) to down arrow */
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
    }

    .panel-heading [data-toggle="collapse"].collapsed:after {
        /* rotate "play" icon from > (right arrow) to ^ (up arrow) */
        -webkit-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -o-transform: rotate(90deg);
        transform: rotate(90deg);
        color: #454444;
    }
    .funkyradio div {
        clear: both;
        overflow: hidden;
    }

    .funkyradio label {
        width: 36px;
        border-radius: 3px;
        font-weight: bold;
        font-size: 12px;
    }

    .funkyradio input[type="radio"]:empty,
    .funkyradio input[type="checkbox"]:empty {
        display: none;
    }

    .funkyradio input[type="radio"]:empty ~ label,
    .funkyradio input[type="checkbox"]:empty ~ label {
        position: relative;
        line-height: 1.2em;
        text-indent: 3.25em;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .funkyradio input[type="radio"]:empty ~ label:before,
    .funkyradio input[type="checkbox"]:empty ~ label:before {
        position: absolute;
        display: block;
        top: 0;
        bottom: 0;
        right: 0;
        content: '';
        width: 2.5em;
        background: #D1D3D4;
        border-radius: 3px 0 0 3px;
    }

    .funkyradio input[type="radio"]:hover:not(:checked) ~ label,
    .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label {
        color: #888;
    }

    .funkyradio input[type="radio"]:hover:not(:checked) ~ label:before,
    .funkyradio input[type="checkbox"]:hover:not(:checked) ~ label:before {
        content: '\2714';
        text-indent: .9em;
        color: #C2C2C2;
    }

    .funkyradio input[type="radio"]:checked ~ label,
    .funkyradio input[type="checkbox"]:checked ~ label {
        color: #777;
    }

    .funkyradio input[type="radio"]:checked ~ label:before,
    .funkyradio input[type="checkbox"]:checked ~ label:before {
        content: '\2714';
        text-indent: .9em;
        color: #333;
        background-color: #ccc;
    }

    .funkyradio input[type="radio"]:focus ~ label:before,
    .funkyradio input[type="checkbox"]:focus ~ label:before {
        box-shadow: 0 0 0 3px #999;
    }

    .funkyradio-default input[type="radio"]:checked ~ label:before,
    .funkyradio-default input[type="checkbox"]:checked ~ label:before {
        color: #333;
        background-color: #ccc;
    }

    .funkyradio-primary input[type="radio"]:checked ~ label:before,
    .funkyradio-primary input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #337ab7;
    }

    .funkyradio-success input[type="radio"]:checked ~ label:before,
    .funkyradio-success input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #5cb85c;
    }

    .funkyradio-danger input[type="radio"]:checked ~ label:before,
    .funkyradio-danger input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #d9534f;
    }

    .funkyradio-warning input[type="radio"]:checked ~ label:before,
    .funkyradio-warning input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #f0ad4e;
    }

    .funkyradio-info input[type="radio"]:checked ~ label:before,
    .funkyradio-info input[type="checkbox"]:checked ~ label:before {
        color: #fff;
        background-color: #5bc0de;
    }
    span.disabled {
        color: #878a85;
        pointer-events: none;
        cursor: default;
    }
</style>
<main>
    <div id="form_container">
        <div class="row">
            <div class="col-lg-4">
                <div id="left_form" style="height: 97%;">
                    <p style="padding-top: 3px;font-weight: 700">
                        گراف حسی
                    </p>
                    <p style="padding-bottom: 5px;font-weight: 500;font-size: 11px;">
                        تحلیل آنچه که می‌خواهیم و نمی‌توانیم
                    </p>
                    <a href="<?php echo RELA_DIR;?>topic/?action=help" class="text-white">
                        <figure style="padding-bottom:0px; padding-top:0px; margin-top:0px;"><img class="text-right" src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/help.png" width="100px" height="100px" title="فلسفه گراف" alt="گراف حسی" ></figure>
                    </a>                    
                    <hr>
                    <p  style="padding-top: 3px;font-weight: 500;font-size: 13pt">
                        ماموریت گراف های حسی از اینجا آغاز می شود:
                    </p>
                    <p>
                        انجام فعل زندگی با هماهنگی و بدون‌آزار
                    </p>

                    <h5 class="text-white" style="padding-top: 5px;">ماموریت گراف های حسی
                    </h5>
                    <hr>
                    <p class="text-white text-justify">
                        چیزی را درست می دانم ( حفظ یا ترک یک فعالیت یا رابطه).
                    </p>
                    <p class="text-white text-justify">
                        بسیار خوب اما آیا قادر به انجام آن هم هستم یا هست؟
                    </p>
                    <p class="text-white text-justify">
                        و اگر بله، به چه قیمتی برای من (و او) تمام می شود؟
                    </p>
                    <p class="text-white text-justify">
                        پاسخ این پرسش یعنی کشف درجه هماهنگی حسی.
                    </p>
                </div>
            </div>
            <div class="col-lg-8">

                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>
                    <!-- /top-wizard -->
                    <form name="topic" id="topic" role="form" data-validate="form" class="form-horizontal" autocomplete="off" novalidate="novalidate" method="post">

                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            <div class="col-md-12 mb-4">
                                <div class="text-justify">
                                    <label for="title">
                                        <i class="fa fa-edit"></i>
                                        با ترسیم گراف حسی می‌تونم کیفت رابطه تو با هرچیزی یا هر هدف یا کاری را تحلیل کنم، مثل فایده و هزینه درونی که  برات داره یا میزان علاقه واقعی، نیاز حسی و توانمندی که نسبت بهش داری و خیلی چیزای دیگه، حالا به من بگو الان در مورد چه موضوعی می خوای بدونی؟
                                    </label>
                                </div>
                            </div>
                            <div class="step">

                                <!-- /row -->
                                <div class="row"  style="border: 1px solid #8cb6b4; ">

                                    <div class="col-md-12">
                                        <div class="panel-group" id="accordion">

                                            <div class="panel panel-default  mt-5">

                                                <!--section1-->
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <div class="form-group">
                                                            <input type="text" name="title" required class="form-control" placeholder="عنوان موضوع خود را وارد نمایید">
                                                        </div>
                                                    </h4>
                                                </div>
                                            </div>
                                            <div class="panel panel-default  mt-5">

                                                <!--section1-->
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">

                                                        <!--tilte-->
                                                        <div class="faqHeader">

                                                            <div class="funkyradio">
                                                                <div class="funkyradio-success">
                                                                    <input type="radio" name="topic_type" id="radio3" value="4" checked />
                                                                    <label for="radio3"> </label>
                                                                    <span class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false">

گراف برای رسیدن به هدف
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </h4>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel-body text-justify">
                                                        این گراف به تو کمک می‌کند تا بدانی که چقدر برای رسیدن به هدفت توانمند هستی و حرکت در این مسیر چقدر برای تو هزینه و یا سود دارد. به عبارتی دیگر چقدر برای طی کردن مسیر به سوی هدف، آمادگی داری و در هماهنگی با آن هستی.<br>
                                                        توجه داشته باش که اینجا صحبت از رابطه تو با هدف نیست بلکه رابطه تو با مسیر ‌‌و مجموعه فعالیت های لازم برای رسیدن به این هدف مورد بررسی و تحلیل قرار می گیرد که تمام اینها به مراتب از خود هدف مهمتر و البته تعیین کننده تر هستند.

                                                    </div>
                                                </div>
                                            </div>

                                            <!--section1-->
<!--                                            <div class="panel panel-default mt-5">-->
<!---->
<!--                                                <div class="panel-heading">-->
<!---->
<!--                                                    <h4 class="panel-title">-->
<!---->
<!--                                                        <!--tilte-->
<!--                                                        <div class="faqHeader">-->
<!--                                                            <div class="funkyradio">-->
<!--                                                                <div class="funkyradio-success">-->
<!--                                                                        <input type="radio" name="topic_type" id="radio1" value="1" disabled />-->
<!--                                                                        <label for="radio1"> </label>-->
<!--                                                                    <span class="accordion-toggle collapsed disabled" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">-->
<!--                                                                  -->
<!--                                                                        گراف برای فعالیت روزانه و رفتار-->
<!--                                                                    </span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div-->
<!--                                                    </h4>-->
<!--                                                </div>-->
<!--                                                <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">-->
<!--                                                    <div class="panel-body">-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <!--section1-->
<!--                                            <div class="panel panel-default mt-5">-->
<!--                                                <div class="panel-heading">-->
<!--                                                    <h4 class="panel-title">-->
<!---->
<!--                                                        <!--tilte-->
<!--                                                        <div class="faqHeader">-->
<!---->
<!--                                                            <div class="funkyradio">-->
<!--                                                                <div class="funkyradio-success">-->
<!--                                                                    <input type="radio" name="topic_type" id="radio2" value="3" disabled />-->
<!--                                                                        <label for="radio2"> </label>-->
<!--                                                                    <span class="accordion-toggle collapsed disabled" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">-->
<!---->
<!--گراف برای انتخاب هدف-->
<!--                                                                    </span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!---->
<!--                                                    </h4>-->
<!--                                                </div>-->
<!--                                                <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false">-->
<!--                                                    <div class="panel-body">-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->



<!--                                            <div class="panel panel-default  mt-5">-->
<!---->
<!--                                                <!--section1-->
<!--                                                <div class="panel-heading">-->
<!--                                                    <h4 class="panel-title">-->
<!---->
<!--                                                        <!--tilte-->
<!--                                                        <div class="faqHeader">-->
<!---->
<!--                                                            <div class="funkyradio">-->
<!--                                                                <div class="funkyradio-success">-->
<!--                                                                       <input type="radio" name="topic_type" id="radio4" value="5" disabled />-->
<!--                                                                        <label for="radio4"> </label>-->
<!--                                                                    <span class="accordion-toggle collapsed disabled" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false">-->
<!--                                                                     -->
<!--گراف برای ایجاد عادت خوب-->
<!--                                                                    </span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!---->
<!--                                                    </h4>-->
<!--                                                </div>-->
<!--                                                <div id="collapseFour" class="panel-collapse collapse disabled" aria-expanded="false">-->
<!--                                                    <div class="panel-body">-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!--                                            <div class="panel panel-default  mt-5">-->
<!---->
<!--                                                <!--section1-->
<!--                                                <div class="panel-heading">-->
<!--                                                    <h4 class="panel-title">-->
<!---->
<!--                                                        <!--tilte-->
<!--                                                        <div class="faqHeader">-->
<!---->
<!--                                                            <div class="funkyradio">-->
<!--                                                                <div class="funkyradio-success">-->
<!--                                                                     <input type="radio" name="topic_type" id="radio5" disabled value="6" />-->
<!--                                                                        <label for="radio5"> </label>-->
<!--                                                                    <span class="accordion-toggle collapsed disabled" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false">-->
<!--                                                                       -->
<!--گراف برای ترک عادت بد - اعتیاد-->
<!--                                                                    </span>-->
<!--                                                                </div>-->
<!--                                                            </div>-->
<!--                                                        </div>-->
<!---->
<!--                                                    </h4>-->
<!--                                                </div>-->
<!--                                                <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false">-->
<!--                                                    <div class="panel-body">-->
<!---->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
                                            <div class="panel panel-default mt-5 ">


                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <!--tilte-->
                                                        <div class="faqHeader">

                                                            <div class="funkyradio">
                                                                <div class="funkyradio-success">
                                                                     <input type="radio" name="topic_type" id="radio6" value="2" />
                                                                    <label for="radio6"> </label>
                                                                    <span class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false">
                                                                  رابطه انسانی</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </h4>
                                                </div>
                                                <!--section 1-->
                                                <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false">
                                                    <div class="panel-body">
                                                        <p>هدف از ترسیم این گراف،  بیشتر دانستن درباره رابطه تو با یک شخص دیگر است ( دوستی،  زناشوئی،  خانوادگی،  همکاری،  جنسی،...).</p>
                                                        <p> تحلیل این گراف کمک می کند تا بدانی که چقدر داشتن این رابطه و یا ماندن در آن برایت فایده و یا ضرر دارد. میزانی که این رابطه به تو شادی،  خشم،  غم و استرس می بخشد. روی اعتمادبفنس و عزت نفس تو اثر مثبت دارد یا منفی و بسیاری چیزهای دیگر و چه می توان کرد؟ <br>
                                                            ممکن است در حال حاضر دراین رابطه باشی یا اینکه نه. در هر صورت می توانی درباره آن بیشتر بدانی. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default mb-5">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <div class="row" style="display:none;" id="type-class1" >
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="topic_class_1" name="topic_class_1">
                                                                        <option value="">نوع فعالیت را انتخاب نمایید</option>
                                                                        <?php
                                                                        foreach($list['list']['topic_class'][1] as $k=>$v){
                                                                            echo '<option value="'.$v['id'].'">'.$v['title'].'</option>' ;

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row" style="display:none;" id="type-class2">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <select class="form-control" id="topic_class_2" name="topic_class_2">
                                                                        <option value="">نوع رابطه را انتخاب نمایید</option>
                                                                        <?php
                                                                        foreach($list['list']['topic_class'][2] as $k=>$v){
                                                                            echo '<option value="'.$v['id'].'">'.$v['title'].'</option>' ;

                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- /row -->

                            <div class="row">
                                <button type="submit" name="submit" class="mt-5 btn btn-info btn-block mb-2" ><i class="fa fa-hourglass-start"></i> شروع </button>
                            </div>


                        </div>

                </div>
                <input name="action" type="hidden" id="action" value="add">
                <!-- /middle-wizard -->


                <!-- /bottom-wizard -->
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
    </div><!-- /Row -->
    </div><!-- /Form_container -->
    <script language="JavaScript">
        function displaytypeclass() {
            //alert('test');
            var ele = document.getElementsByName('topic_type');
            var divclass1 = document.getElementById('type-class1') ;
            var divclass2 = document.getElementById('type-class2') ;
            for(i = 0; i < ele.length; i++) {
                //ele[i].addEventListener("click", displaytypeclass);
                ele[i].onclick = displaytypeclass ;
                ele[i].className = "iradio_square-grey" ;
                if(ele[i].checked){
                    //alert(ele[i].value) ;
                    if(ele[i].value == 1 || ele[i].value == 3 || ele[i].value == 4){
                        divclass1.style.display = 'block' ;
                        divclass2.style.display = 'none' ;
                    }else if(ele[i].value == 2){
                        divclass2.style.display = 'block' ;
                        divclass1.style.display = 'none' ;
                    }
                }
            }
        }
        displaytypeclass();
        //ele.onclick = displaytypeclass ;
    </script>
</main>