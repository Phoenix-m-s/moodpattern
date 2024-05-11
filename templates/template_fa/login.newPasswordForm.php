
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

                    <!-- /top-wizard -->
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            <div class="card">
                                <div class="card-header">فراموش کردن رمز عبور</div>
                                <div class="card-body">
                                    <div class="col-xs-12 col-sm-12 col-12">
                                        <div class="login-edit">
                                            <?php if (strlen($list['msg']) > 0) { ?>
                                                <div class="alert alert-warning text-center"><?php echo $list['msg']; ?></div>
                                            <?php } ?>
                                            <form action="/index/newPassword" method="post" name="form1" id="form1" role="form" novalidate="novalidate" data-toggle="validator">
                                                <div class="form-group errorHandler-login errorHandler eror has-feedback mt">
                                                    <input name="password" id="password" lang="fa" type="password" class=" form-control center-block noPadding" required data-error="رمز عبور جدید را وارد نمایید" placeholder="رمز عبور" autofocus">
                                                </div>
                                                <div class="form-group errorHandler-login errorHandler eror has-feedback mt">
                                                    <input name="re_password" id="confirm-password" lang="fa" type="password" class=" form-control center-block noPadding" required data-error="رمز عبور را دوباره وارد نمایید" placeholder="تکرار رمز عبور" autofocus">
                                                </div>
                                                <input name="user_id" type="hidden" value="<?php echo $list['user_id']; ?>">
                                                <input name="token" type="hidden" value="<?php echo $list['token']; ?>">
                                                <button type="submit" class="btn btn-primary btn-block pull-left shadow-radial">                            تایید</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- /middle-wizard -->
                            </div>
                    </form>
                </div>
                <!-- /bottom-wizard -->
            </div>
            <!-- /Wizard container -->
        </div>
    </div><!-- /Row -->
        <div class="row">
            <!-- separator -->
            <div class="col-xs-12 col-md-12 text-center">
                <div class="row xxsmallSpace" style="margin-top:30px;"></div>
                <a href="<?php echo RELA_DIR;?>"> <i class="fa fa-home fa-2x" aria-hidden="true"></i>
                    بازکشت به صفحه اصلی
                </a>
            </div>
        </div>
    </div><!-- /Form_container -->
</main>
