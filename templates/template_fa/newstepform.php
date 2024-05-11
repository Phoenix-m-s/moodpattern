

<h4 class="text-right"><?php echo 'موضوع: '.$list['list']['topic']['title']; ?></h4>

<div class="container-fluid full-height">
    <div class="row row-height">
        <div class="col-lg-3 content-left">
            <div class="content-left-wrapper">

                <!-- /social -->
                <div>
                    <figure><img src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/info_graphic_5.svg" alt="" class="img-fluid"></figure>
                    <h2>فرم نظرسنجی</h2>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نافهم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>

                    <a href="#start" class="btn_1 rounded mobile_btn">شروع کن!</a>
                </div>
                <div class="copy">© 2018 Masome Nazem</div>
            </div>
            <!-- /content-left-wrapper -->
        </div>
        <!-- /content-left -->

        <div class="col-lg-9 content-right" id="start">
            <div id="wizard_container">
                <div id="top-wizard">
                    <div id="progressbar"></div>
                </div>
                <!-- /top-wizard -->
                <form id="wrapped" method="POST">
                    <input id="website" name="website" type="text" value="">
                    <!-- Leave for security protection, read docs for details -->
                    <div id="middle-wizard">

                        <div class="step">
                            <h3 class="main_question text-center">
                                <a href="#"  class="text-center"><img src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/logo.png" alt="" width="90" height="50"></a>
                            </h3>
                            <hr>
                            <h3 class="main_question"><strong>1/5</strong>لطفا از یک تا پنج به خدمات ما امتیاز دهید.</h3>


                            <div class="form-group rating_wp clearfix">
                                <label class="rating_type">سرویس ابری</label>
                                <span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-1-5" name="rating_input_1" value="5 ستاره" onchange="getVals(this, 'rating_input_1');">
												<label for="rating-input-1-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-1-4" name="rating_input_1" value="4 ستاره" onchange="getVals(this, 'rating_input_1');">
												<label for="rating-input-1-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-1-3" name="rating_input_1" value="3 ستاره" onchange="getVals(this, 'rating_input_1');">
												<label for="rating-input-1-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-1-2" name="rating_input_1" value="2 ستاره" onchange="getVals(this, 'rating_input_1');">
												<label for="rating-input-1-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-1-1" name="rating_input_1" value="تک ستاره" onchange="getVals(this, 'rating_input_1');">
												<label for="rating-input-1-1" class="rating-star"></label>
											</span>
                            </div>
                            <div class="form-group rating_wp clearfix">
                                <label class="rating_type">سرویس هاستینگ</label>
                                <span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-2-5" name="rating_input_2" value="5 ستاره" onchange="getVals(this, 'rating_input_2');">
												<label for="rating-input-2-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-2-4" name="rating_input_2" value="4 ستاره" onchange="getVals(this, 'rating_input_2');">
												<label for="rating-input-2-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-2-3" name="rating_input_2" value="3 ستاره" onchange="getVals(this, 'rating_input_2');">
												<label for="rating-input-2-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-2-2" name="rating_input_2" value="2 ستاره" onchange="getVals(this, 'rating_input_2');">
												<label for="rating-input-2-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-2-1" name="rating_input_2" value="تک ستاره" onchange="getVals(this, 'rating_input_2');">
												<label for="rating-input-2-1" class="rating-star"></label>
												</span>
                            </div>
                            <div class="form-group rating_wp clearfix">
                                <label class="rating_type">پشتیبانی</label>
                                <span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-3-5" name="rating_input_3" value="5 ستاره" onchange="getVals(this, 'rating_input_3');">
												<label for="rating-input-3-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-3-4" name="rating_input_3" value="4 ستاره" onchange="getVals(this, 'rating_input_3');">
												<label for="rating-input-3-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-3-3" name="rating_input_3" value="3 ستاره" onchange="getVals(this, 'rating_input_3');">
												<label for="rating-input-3-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-3-2" name="rating_input_3" value="2 ستاره" onchange="getVals(this, 'rating_input_3');">
												<label for="rating-input-3-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-3-1" name="rating_input_3" value="1 ستاره" onchange="getVals(this, 'rating_input_3');">
												<label for="rating-input-3-1" class="rating-star"></label>
												</span>
                            </div>
                            <div class="form-group rating_wp clearfix">
                                <label class="rating_type">مشاوره و فروش</label>
                                <span class="rating">
												<input type="radio" class="required rating-input" id="rating-input-4-5" name="rating_input_4" value="5 ستاره" onchange="getVals(this, 'rating_input_4');">
												<label for="rating-input-4-5" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-4-4" name="rating_input_4" value="4 ستاره" onchange="getVals(this, 'rating_input_4');">
												<label for="rating-input-4-4" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-4-3" name="rating_input_4" value="3 ستاره" onchange="getVals(this, 'rating_input_4');">
												<label for="rating-input-4-3" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-4-2" name="rating_input_4" value="2 ستاره" onchange="getVals(this, 'rating_input_4');">
												<label for="rating-input-4-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input-4-1" name="rating_input_4" value="1 ستاره" onchange="getVals(this, 'rating_input_4');">
												<label for="rating-input-4-1" class="rating-star"></label>
												</span>
                            </div>
                        </div>
                        <!-- /step-->
                        <div class="step">
                            <h3 class="main_question"><strong>4/5</strong>نظر خود را خیلی کوتاه بنویسید...</h3>
                            <div class="form-group add_top_30">
                                <textarea name="review_message" class="form-control review_message required" placeholder="توضیح و نظر شما در این قسمت ..." onkeyup="getVals(this, 'review_message');"></textarea>
                            </div>
                        </div>
                        <!-- /step-->
                        <div class="step">
                            <h3 class="main_question"><strong>4/5</strong>لطفا تمامی فیلد ها را با دقت پر کنید.</h3>
                            <div class="form-group">
                                <input type="text" name="firstname" class="form-control required" placeholder="نام">
                            </div>
                            <div class="form-group">
                                <input type="text" name="lastname" class="form-control required" placeholder="نام خانوادگی">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control required" placeholder="ایمیل">
                            </div>
                            <div class="form-group">
                                <input type="text" name="telephone" class="form-control" placeholder="تلفن">
                            </div>
                            <div class="form-group terms">
                                <label class="container_check">لطفا  <a href="#" data-toggle="modal" data-target="#terms-txt">قوانین و سیاست ها </a> را بادقت مطالعه کنید.
                                    <input type="checkbox" name="terms" value="Yes" class="required">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                        <!-- /step-->
                        <div class="submit step">
                            <h3 class="main_question"><strong>5/5</strong>نتایج نظر شما</h3>
                            <div class="summary">
                                <ul>
                                    <li><strong>1</strong>
                                        <h5>نظر شما در مورد خدمات ما</h5>
                                        <ul>
                                            <li><label>سرویس ابری</label> <span id="rating_input_1" class="float-right"></span></li>
                                            <li><label>سرویس هاستینگ</label> <span id="rating_input_2" class="float-right"></span></li>
                                            <li><label>پشتیبانی</label> <span id="rating_input_3" class="float-right"></span></li>
                                            <li><label>مشاوره و فروش</label> <span id="rating_input_4" class="float-right"></span></li>
                                        </ul>
                                    </li>
                                    <li><strong>2</strong>
                                        <h5>متن نظر شما</h5>
                                        <p id="review_message"></p>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- /step-->
                    </div>
                    <!-- /middle-wizard -->
                    <div id="bottom-wizard">
                        <button type="button" name="backward" class="backward">بازگشت</button>
                        <button type="button" name="forward" class="forward">ادامه</button>
                        <button type="submit" name="process" class="submit">ثبت درخواست</button>
                    </div>
                    <!-- /bottom-wizard -->
                </form>
            </div>
            <!-- /Wizard container -->
        </div>
        <!-- /content-right-->
    </div>
    <!-- /row-->
</div>
<!-- /container-fluid -->

<div class="cd-overlay-nav">
    <span></span>
</div>
<!-- /cd-overlay-nav -->

<div class="cd-overlay-content">
    <span></span>
</div>
<!-- /cd-overlay-content -->

<a href="#0" class="cd-nav-trigger">فهرست<span class="cd-icon"></span></a>
<!-- /menu button -->

<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="termsLabel">قوانین و سیاست ها</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نافهم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn_1" data-dismiss="modal">بستن</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
//print_r_debug($list);
?>