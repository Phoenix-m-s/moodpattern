<?php //echo '<pre>'; print_r($list['list']) ?>
<main >
    <?php
    if($list['list']['ERR'] == 1) {
        ?>
        <div id="alert-device" class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>توجه!</strong>
            <ul>
                <?php
                foreach($list['list']['ERR-MSG'] AS $k=>$v){
                    echo "<li>$v</li>" ;
                }
                ?>
            </ul>
        </div>

        <?php
    }
    ?>
    <div id="form_container">
        <div class="row">
            <div class="col-lg-4">
                <div id="left_form" style="min-height: 730px !important;">
                    <h4 class="text-white">عضویت در سایت</h4>
                    <hr/>
                    <p  style="padding-top: 20px;font-weight: 700;font-size: 11pt">
                        ماموریت گراف های حسی از اینجا آغاز می شود:
                    </p>
                    <p>
                        انجام فعل زندگی با هماهنگی و بدون آزار
                    </p>
                    <hr>
                    <p style="padding-top: 20px;font-weight: 700;font-size: 11pt" >گراف حسی چیست؟</p>
                    <p>گراف حسی مدلی بسیار قدرتمند از توانمندی ها و ضعف های روان/تنی و ویژگی های حسی و عاطفی ما ارایه می دهد. آنچه که می دانم و نمی دانم، آنچه که دوست دارم و دوست ندارم و آنچه که می توانم و نمی توانم، شش اتفاق عقلی و حسی است که با همدیگر روان انسانی را شکل می دهند.</p>
                </div>
            </div>
            <div class="col-lg-8">

                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>
                    <!-- /top-wizard -->
                    <form name="register" id="register" role="form" data-validate="form" class="form-horizontal" autocomplete="off" novalidate="novalidate" method="post">

                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">

                            <div class="step">
                                <div class="row" style="padding-bottom: 20px;">
                                    <?php if($list['list']['ERR'] == 1) {
                                        echo '<h4 class="main_question" style="color: #d01311 ">اطلاعات ناقص می باشد، لطفا تکمیل نمایید.</h4>' ;
                                    }else{
                                        echo '<h4 class="main_question">لطفا اطلاعات فرم را به طور کامل و به دقت تکمیل نمایید.</h4>' ;
                                    } ?>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="fname" value="<?php echo(isset($list['list']['input']['fname'])?$list['list']['input']['fname']:'') ;?>" class="form-control" required placeholder="نام">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="lname" value="<?php echo(isset($list['list']['input']['lname'])?$list['list']['input']['lname']:'') ;?>" class="form-control " required placeholder="نام خانوادگی">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div data-tip="موبایل، به عنوان نام کاربری شما برای ورود به برنامه می باشد.">
                                                <input type="tel" name="mobile" dir='ltr'  value="<?php echo(isset($list['list']['input']['mobile'])?$list['list']['input']['mobile']:'') ;?>" class="form-control " required placeholder="موبایل">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <div data-tip="پست‌الکترونیک برای اطلاع رسانی و امکان بازیابی رمزعبور می‌باشد.">
                                                <input type="email" name="email" dir='ltr' value="<?php echo(isset($list['list']['input']['email'])?$list['list']['input']['email']:'') ;?>" class="form-control " required placeholder="پست الکترونیک">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control " required placeholder="رمز عبور">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" name="confirm_password" class="form-control" required placeholder="تکرار رمز عبور">
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="age" value="<?php echo(isset($list['list']['input']['age'])?$list['list']['input']['age']:'') ;?>" class="form-control" required placeholder="سن">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group radio_input">
                                            <label for="education_section" >مقطع تحصیلی:</label>
                                            <label>
                                                <select class="form-control" name="education_section" id="education_section" required>
                                                    <option name="education_section" <?php echo(isset($list['list']['input']['education_section']) && $list['list']['input']['education_section']==1?"selected":'') ;?> value="1">دیپلم</option>
                                                    <option name="education_section" <?php echo(isset($list['list']['input']['education_section']) && $list['list']['input']['education_section']==2?"selected":'') ;?> value="2">فوق دیپلم</option>
                                                    <option name="education_section" <?php echo(isset($list['list']['input']['education_section']) && $list['list']['input']['education_section']==3?"selected":'') ;?> value="3" >لیسانس</option>
                                                    <option name="education_section" <?php echo(isset($list['list']['input']['education_section']) && $list['list']['input']['education_section']==4?"selected":'') ;?> value="4">فوق لیسانس</option>
                                                    <option name="education_section" <?php echo(isset($list['list']['input']['education_section']) && $list['list']['input']['education_section']==5?"selected":'') ;?> value="5">دکترا</option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group radio_input">
                                            <label for="education_section" >کشور محل زندگی:</label>
                                            <label>
                                                <select class="form-control" id="country_id" name="country_id" onchange="checkit();">
                                                    <?php
                                                    $defaultVal = (isset($list['list']['input']['country_id'])?$list['list']['input']['country_id']:103) ;
                                                    foreach($list['list']['country']['export']['list'] as $k=>$v){
                                                        echo '<option value="'.$v['id'].'"'.($defaultVal==$v['id']?"selected":'').'>'.$v['title'].'</option>' ;

                                                    }
                                                    ?>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group radio_input">
                                            <label for="education_section" >استان:</label>
                                            <label>
                                                <select class="form-control" id="province_id" name="province_id" <?php echo (isset($list['list']['input']['country_id']) && $list['list']['input']['country_id'] != 103?'disabled':'') ;?> >
                                                    <?php
                                                    $defaultVal = (isset($list['list']['input']['province_id'])?$list['list']['input']['province_id']:0) ;
                                                    foreach($list['list']['province']['export']['list'] as $k=>$v){
                                                        echo '<option value="'.$v['id'].'"'.($defaultVal==$v['id']?"selected":'').'>'.$v['title'].'</option>' ;

                                                    }
                                                    ?>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group radio_input" style="padding-right: 0px;margin-right: 0px" >
                                            <label for="married_status">وضعیت تاهل:</label>
                                            <label><input type="radio" value="0" <?php echo(!isset($list['list']['input']['married_status']) || ($list['list']['input']['married_status'] ==0)?"checked":'') ;?> checked name="married_status" class="icheck" required>مجرد</label>
                                            <label><input type="radio" value="1" <?php echo(isset($list['list']['input']['married_status']) && ($list['list']['input']['married_status'] ==1)?"checked":'') ;?> name="married_status" class="icheck" required>متاهل</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group radio_input" >
                                            <label for="gender_status">جنسیت:</label>
                                            <label><input type="radio" value="0" <?php echo(!isset($list['list']['input']['gender_status']) || ($list['list']['input']['gender_status'] ==0)?"checked":'') ;?> name="gender_status" class="icheck" required>زن</label>
                                            <label><input type="radio" value="1" <?php echo(isset($list['list']['input']['gender_status']) && ($list['list']['input']['gender_status'] ==1)?"checked":'') ;?> name="gender_status" class="icheck" required>مرد</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group radio_input" >
                                            <label for="is_student">دانشجوی کلام زنده:</label>
                                            <label><input type="radio" value="1" <?php echo(!isset($list['list']['input']['is_student']) || ($list['list']['input']['is_student'] ==1)?"checked":'') ;?> name="is_student" class="icheck" required>هستم</label>
                                            <label><input type="radio" value="2" <?php echo(isset($list['list']['input']['is_student']) && ($list['list']['input']['is_student'] ==2)?"checked":'') ;?> name="is_student" class="icheck" required>نیستم</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-block" ><i class="fa fa-save"></i> ثبت نام </button>
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>
                        </div>



                        <input name="action" type="hidden" id="action" value="add">
                        <input name="user_privileges_id" type="hidden" id="user_privileges_id" value="2">
                        <input name="status" type="hidden" id="status" value="1">
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard">

                            <!--<button type="button" name="forward" class="btn btn-primary">ثبت نام</button>-->
                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
</main>
<script language="JavaScript">
    function checkit(){
        var obj = document.getElementById("country_id");
        var valc = obj.options[obj.selectedIndex].value;
        if(valc != 103)
        {
            document.getElementById("province_id").disabled = true ;
        } else {
            document.getElementById("province_id").disabled = false ;
        }
    }
</script>
<style>
    [data-tip] {
        position:relative;

    }
    [data-tip]:before {
        content:'';
        /* hides the tooltip when not hovered */
        display:none;
        content:'';
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-bottom: 5px solid #507aaa;
        position:absolute;
        top:30px;
        left:300px;
        z-index:8;
        font-size:0;
        line-height:0;
        width:0;
        height:0;
    }
    [data-tip]:after {
        display:none;
        content:attr(data-tip);
        position:absolute;
        top:35px;
        left:0;
        padding:5px 8px;
        background: #507aaa;
        color:#fff;
        z-index:9;
        font-size: 14px;
        height:35px;
        line-height:18px;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        white-space:nowrap;
        word-wrap:normal;
    }
    [data-tip]:hover:before,
    [data-tip]:hover:after {
        display:block;
    }
</style>