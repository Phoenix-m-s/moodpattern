<style>
    #left_form p{
        font-size: 14px !important;
    }

</style>
<main xmlns="http://www.w3.org/1999/html">
    <div id="form_container">
        <div class="row">
            <div class="col-lg-4">
                <div id="left_form">
                    <figure><img class="text-right" src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/logo.png" width="160px" height="50px" alt="گراف حسی"></figure>
                    <h5 class="text-white">ماموریت گراف های حسی
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
                    <a href="#0" id="more_info" data-toggle="modal" data-target="#more-info"><i class="pe-7s-info"></i></a>
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

                            <div class="step">
                                <h3 class="main_question">لطفااطلاعات فرم زیر را تکمیل نمایید.</h3>
                                <!-- /row -->
                                <div class="row"  style="border: 1px solid #8cb6b4; ">
                                    <div class="col-md-12">
                                        <div  class="form-group ">
                                            <label for="title">
                                                میشه برام بنویسی که در رابطه با چه فعالیتی یا چه شخصی می خوای با هام صحبت کنی؟
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="title" required class="form-control" placeholder="اینجا برام بنویس ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div  class="form-group radio_input">
                                            <label><input type="radio" value="1"  name="topic_type" checked   >می خوام در تحلیل فعالیتی کمکم کنی که الان اونو دارم انجام می دم.</label>
                                            <label><input type="radio" value="2"  name="topic_type"  >می خوام درباره فعالیتی بهم مشورت بدی که در حال حاضر اونو انجامش نمی دم.</label>
                                            <label><input type="radio" value="3"  name="topic_type"> می خوام درباره رابطه‌م با یه انسان دیگه مشورت بگیرم. </label>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- /row -->

                            <div class="row" style="display:none;" id="type-class1" >
                                <div class="col-md-12" style="border: 1px solid #8cb6b4; margin-top:25px;margin-bottom: 0;">
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
                                <div class="col-md-12" style="border: 1px solid #8cb6b4; margin-top:25px;margin-bottom: 0;">
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
                            <div class="row">
                                <button type="submit" name="submit" class="mt-5 btn btn-info btn-block mb-2" ><i class="fa fa-search"></i> ثبت موضوع </button>
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
                    if(ele[i].value == 1 || ele[i].value == 2){
                        divclass1.style.display = 'block' ;
                        divclass2.style.display = 'none' ;
                    }else if(ele[i].value == 3){
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