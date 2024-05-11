<style>
    .card-header{
        border-bottom: none !important;
    }
</style>
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
                    <p> گراف حسی، احساسات ما را درجه‌بندی می‌کند تا بدانیم با وجود اینه بارها با خود عهد بسته‌ایم، نتوانسته‌ایم سحرخیز باشیم!</br>(تصمیم‌گیری)
                    </p>
                    <p>
                        گراف حسی، احساسات ما را درجه‌بندی می‌کند تا بدانیم چرا باوجود عاقلانه بودن ترک سیگار، تن به این کار نمی‌دهیم. </br> (اصلاح عادت‌ها)
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
                    <div class="container" style="margin-top: 160px;">
                        <p class="text-center"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> لطفا نام کاربری را برای بازیابی گذرواژه خود وارد نمایید.</p>
                        <div class="row">
                            <div class="col-xs-12 col-md-12 login-container login-border registerPage container-floatinglabel ">
                                <div class="login-edit mt">
                                    <?php if ($msg['error'] == 1) { ?>
                                        <div class="alert alert-warning text-center"><?php echo $msg['msg']; ?></div>
                                    <?php } ?>
                                    <?php if (!empty($msg) & $msg['error'] == 0) { ?>
                                        <div class="alert alert-success text-center"><?php echo $msg['msg']; ?></div>
                                    <?php } ?>
                                    <form action="/index/sendEmail" method="post" name="form1" id="form1" role="form" novalidate="novalidate" data-toggle="validator">
                                        <div class="form-group has-feedback center-block">
                                            <label for="name" >شماره موبایل </label>
                                            <input value="<?php echo $list['mobile'] ?>" name="mobile" id="mobile" type="text" dir="ltr" align="left" class=" form-control center-block noPadding" required data-error="شماره موبایل را وارد نمایید"  autofocus>
                                        </div>

                                        <!-- separator -->
                                        <div class="row xxsmallSpace"></div>

                                        <button type="submit" class="btn btn-primary btn-block pull-left shadow-radial"> ثبت</button>
                                    </form>

                                    <!-- separator -->
                                    <div class="row xxsmallSpace"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!-- separator -->
                            <div class="col-xs-12 col-md-12 text-center">
                                <div class="row xxsmallSpace" style="margin-top:30px;"></div>
                                <a href="<?php echo RELA_DIR;?>"> <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                                    بازکشت به صفحه اصلی
                                </a>
                            </div>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
            <!-- /bottom-wizard -->
        </div>
        <!-- /Wizard container -->
    </div>
    </div><!-- /Row -->
    </div><!-- /Form_container -->
</main>
