<style>
    .card-header{
        border-bottom: none !important;
    }
</style>
<!--<script language="javascript">-->
<!--    if( navigator.userAgent.match(/Android/i)-->
<!--        || navigator.userAgent.match(/webOS/i)-->
<!--        || navigator.userAgent.match(/iPhone/i)-->
<!--        || navigator.userAgent.match(/iPad/i)-->
<!--        || navigator.userAgent.match(/iPod/i)-->
<!--        || navigator.userAgent.match(/BlackBerry/i)-->
<!--        || navigator.userAgent.match(/Windows Phone/i)-->
<!--    ){-->
<!--        //$("#alert-device").css("display", "block");-->
<!--        alert('در این نسخه از نرم افزار، برای نمایش و کاربری مناسب تر لطفا از کامپیوتر شخصی یا لپ تاپ استفاده نمایید.');-->
<!--        //document.getElementById("alert-device").style.display = "block";-->
<!--    }else{-->
<!--        //$("#alert-device").css("display", "none");-->
<!--    }-->
<!--</script>-->
<main>
    <div id="form_container">
        <div class="row">
            <div class="col-lg-5">
                <div id="left_formlogin">
                    <figure class="mt-3"><img src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/logo.png" alt=""></figure>
                    <hr>
                    <p>
                        گراف‌های حسی، مثل دماسنج هستند؛ ابزاری برای اندازه‌گیری حس‌های آدمی.
                    </p>
                    <p>
                         گراف حسی، احساسات ما را درجه‌بندی می‌کند تا بدانیم با وجود اینکه بارها با خود عهد بسته‌ایم، نتوانسته‌ایم سحرخیز باشیم!</br>(تصمیم‌گیری)
                    </p>
                    <p>
                        گراف حسی، احساسات ما را درجه‌بندی می‌کند تا بدانیم چرا باوجود علاقه مند بودن به ترک سیگار، تن به این کار نمی‌دهیم. </br> (اصلاح عادت‌ها)
                    </p>
                    <p>
                        گراف حسی، احساسات ما را درجه‌بندی می‌کند تا بدانیم بحران در روابط خانوادگی و زناشویی، واقعا از کجاها ناشی می‌شود . </br> (روابط انسانی)
                    </p>
                </div>
            </div>
            <div class="col-lg-7">

                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>

                    <!-- /top-wizard -->
                    <form name="login" id="login" role="form" data-validate="form" class="form-horizontal" autocomplete="off" novalidate="novalidate" method="post">
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">

                            <div class="step mb-4">
                                <h6 class="main_question text-dark text-center "><strong></strong> <i class="fa fa-users"></i> لطفا اطلاعات زیر را پر کنید. </h6>
                                <hr>
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control text-left required" name="mobile" dir='ltr' type="text" autocomplete="off" id="mobile"  placeholder="Mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input class="form-control text-left required" type="password" autocomplete="off" id="password" name="password"  placeholder="Password">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /row -->
<!--                            <div class="row mb-4">-->
<!--                                <div class="col-md-9">-->
<!--                                    <div class="form-group">-->
<!--                                        -->
<!--                                        <input type="text" class="form-control" name="user_captcha" style="font-size:12px !important;"  placeholder="کد امنیتی – عدد نمایش داده شده در تصویر را وارد نمایید"/>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-3">-->
<!--                                     <div id="html_element"></div>-->
<!--                                    <div class="list-group-item list-group-item-primary text-center" style="height: 50px; ">-->
<!--                                        --><?php //include 'captcha.php';?>
<!--                                        <p class="captcha">--><?php //echo $random;?><!--</p>-->
<!--                                    </div>-->
<!--                                    <input type="hidden" value="--><?php //echo $random; ?><!--" name="captcha" />-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
                            <div class="row ">
                                <div class="col-md-12 mb-2">
                                    <button type="submit" class=" btn btn-primary btn-block pull-left shadow-radial "> <i class="fa fa-lock"></i>  ورود</button>

                                </div>

                                <div class="col-md-12 ">
                                    <a href="<?php echo RELA_DIR;?>register/?action=add" class="btn btn-info shadow-radia btn-block " >
                                        <i class="fa fa-save"></i>
                                        ثبت نام   </a>

                                </div>
                            </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-12 text-center" style="float: none;">
                                                                <a href="/index/getUsername" class="text-dark text-center"> <i class="fa fa-key"></i>
                                                                    رمز عبور خود رو فراموش کرده ام
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-md-12 text-center" style="float: none;">
                                                                <a href="AppHelpV2.pdf" class="text-dark text-center" target="_blank"><i class="fa fa-download"></i>
                                                                    راهنمای استفاده از نرم‌افزار
                                                                </a>
                                                            </div>
                                                        </div>
                        </div>
                        <!-- /middle-wizard -->
                </div>
            </div>
            <input type="hidden" name="action" value="login">
            <!-- /bottom-wizard -->
            </form>
        </div>
        <!-- /Wizard container -->
    </div>
</main>
