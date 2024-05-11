<main xmlns="http://www.w3.org/1999/html">
    <div id="form_container">
        <div class="row">
            <div class="col-lg-5">
                <div id="left_form">
                    <figure><img src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/logo.png" alt=""></figure>
                    <h3 class="text-white">ماموریت گراف های حسی
                    </h3>
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
            <div class="col-lg-7">

                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>
                    <!-- /top-wizard -->
                    <form name="topic" id="topic" role="form" data-validate="form" class="form-horizontal" autocomplete="off" novalidate="novalidate" method="post">

                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">

                            <div class="step mt-5">
                                <h3 class="main_question">لطفااطلاعات فرم زیر را با دقت پر کنید.</h3>
                                <!--step1-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="one">
                                                تایید
                                            </label>
                                            <input type="number" name="one"  min="1" max="12">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="two">
                                                عدم تایید
                                            </label>
                                            <input type="number" name="two"  min="1" max="12">
                                        </div>
                                    </div>
                                </div>
                                <!--step2-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tree">
                                                امنیت
                                            </label>
                                            <input type="number"  name="tree" min="1" max="12">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="four">
                                                نامنی
                                            </label>
                                            <input type="number" name="four"  min="1" max="12">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                        </div>


                        <input name="action" type="hidden" id="action" value="add">
                        <!-- /middle-wizard -->
                        <div class="container">
                            <div class="col-md-12 mt-5">
                                <button type="submit" name="submit" class="btn btn-info btn-block" ><i class="fa fa-search"></i> ثبت موضوع </button>
                            </div>

                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
</main>