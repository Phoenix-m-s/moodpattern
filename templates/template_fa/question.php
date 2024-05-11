<?php
//echo '<pre>';print_r($list['list']['topic']);
if($list['list']['topic']['topic_type']==1){
    if($list['list']['topic']['verb_type']==1){
        $approach1 = 'انجام دادن' ;
        $approach2 = 'انجام ندادن' ;
    }elseif($list['list']['topic']['verb_type']==2){
        $approach1 = 'انجام ندادن' ;
        $approach2 = 'انجام دادن' ;
    }
}elseif($list['list']['topic']['topic_type']==2){
    if($list['list']['topic']['verb_type']==1){
        $approach1 = 'من درباره او فکر می کنم' ;
        $approach2 = 'او درباره من فکر می کند' ;
    }
//    elseif($list['list']['topic']['verb_type']==2){
//        $approach1 = 'در رابطه نماندن' ;
//        $approach2 = 'در رابطه ماندن' ;
//    }
}

?>
<form name="example-1" id="wrapped" method="POST">
    <div class="tab-menu ">

        <!-- Nav tabs -->

        <ul class="nav nav-tabs" role="tablist">

            <li class="active pull-right">
                <a class="text-center text-success" href="#info1" aria-controls="info1" data-toggle="tab">
                    <i class="fa fa-pencil-square-o text-primary"></i><?php echo $approach1 ;?>
                </a>
            </li>

            <li class="pull-right text-bold">
                <a class="text-center text-danger" href="#info2" aria-controls="info2" data-toggle="tab">
                    <i class="fa fa-pencil-square-o text-warning"></i><?php echo $approach2 ;?>
                </a>
            </li>

        </ul>

        <!-- Tab panes -->

        <div class="tab-content">
            <!--section 1-->

            <div class="tab-pane active" id="info1">

                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>
                    <!-- /top-wizard -->
                    <!-- Leave for security protection, read docs for details -->
                    <div id="middle-wizard">


                        <div class="step card">
                            <div class="card-header">
                                <h6 class="main_question"><?php echo $approach1 ;?></h6>
                            </div>

                            <div class="row card-body">
                                    <!--section 1-->
                                    <?php foreach ($list['list']['sensor'] as $k=>$v){
                                    echo'<div class="col-md-12">
                                        <p>
                                            <a class="text-dark" data-toggle="collapse" href="#collapseExample'.$v['id'].'"  aria-expanded="false" aria-controls="collapseExample2-1-1">
                                             '.$v['title'].' <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                                            </a>
                                        </p>';
                                        if(isset($list['list']['sensor_words'][$v['id']])){
                                            echo '<div class="collapse" id="collapseExample'.$v['id'].'">';
                                            foreach($list['list']['sensor_words'][$v['id']] as $k2=>$v2){
                                                    echo '<div class="card card-body">
                                                <div class="form-group clearfix">
                                                    <label class="rating_type">'.$v2['word_title'].'</label>
                                                    <span class="rating">
												<input type="radio" class="required rating-input" id="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'" name="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'" value="1"><label for="name="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'"" class="rating-star"></label>
												<input type="radio" class="required rating-input"  id="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'" name="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'" value="2"><label for="name="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'"" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'" name="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'" value="3"><label for="name="rating-'.'1-'.$v['id'].'-'.$v2['word_id'].'"" class="rating-star"></label>
												</span>
                                                </div>
                                            </div>
                                        ';
                                                }
                                            echo '</div>' ;
                                            }
                                    echo'</div>' ;
                                     } ?>
                                    <!--section 2-->
                                    <div class="col-md-12">
                                        <p>
                                            <a class="text-dark" data-toggle="collapse" href="#collapseExample2-2-2"  aria-expanded="false" aria-controls="collapseExample2-2-2">
                                                    آیا ورزش کردن برای سلامتی بدن نشاطی به ارمغان می اورد؟ <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                                            </a>
                                        </p>
                                        <div class="collapse" id="collapseExample2-2-2">
                                            <div class="card card-body">
                                                <div class="form-group clearfix">
                                                    <label class="rating_type">نحوه برخورد پرسنل</label>
                                                    <span class="rating">
												<input type="radio" class="required rating-input" id="rating-input2_2_1" name="rating_input2_2_1" value="1"><label for="rating-input2_2_1" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input2_2_2" name="rating_input2_2_2" value="2"><label for="rating-input2_2_2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input2_2_3" name="rating_input2_2_3" value="3"><label for="rating-input2_2_3" class="rating-star"></label>
												</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <!-- /row -->
                            <!--footer-->
                            <div class="card-footer">
                                <button type="button" class=" col-md-3 center-blok btn btn-md btn-primary pull-left" > <i class="fa fa-save"></i> ثبت   </button>
                            </div>
                    </div>
                </div>
            </div>
        </div>
<!--section 2-->

<div class="tab-pane" id="info2">
    <div id="wizard_container">
        <div id="top-wizard">
            <div id="progressbar"></div>
        </div>
        <!-- /top-wizard -->
        <div id="middle-wizard">
            <!--tab one-->
            <div class="step card">
                <div class="card-header">
                    <h6 class="main_question"><?php echo $approach2 ;?></h6>
                </div>
                <div class="row card-body">
                    <!--section 1-->
                    <div class="col-md-12">
                        <p>
                            <a class="text-dark" data-toggle="collapse" href="#collapseExample1-1-1"  aria-expanded="false" aria-controls="collapseExample1-1-1">
                                آیا ورزش کردن برای سلامتی بدن نشاطی به ارمغان می اورد؟ <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample1-1-1">
                            <div class="card card-body">
                                <div class="form-group clearfix">
                                    <label class="rating_type">نحوه برخورد پرسنل</label>
                                    <span class="rating">
												<input type="radio" class=" rating-input" id="rating-input1_1_1" name="rating_input1_1_1" value="1"><label for="rating-input-1-1" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input1_1_2" name="rating_input1_1_2" value="2"><label for="rating-input-1-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input1-1-3" name="rating_input1_3_1" value="3"><label for="rating-input-1-3" class="rating-star"></label>
												</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--section 2-->
                    <div class="col-md-12">
                        <p>
                            <a class="text-dark" data-toggle="collapse" href="#collapseExample1-1-2"  aria-expanded="false" aria-controls="collapseExample1-1-2">
                                آیا ورزش کردن برای سلامتی بدن نشاطی به ارمغان می اورد؟ <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>
                            </a>
                        </p>
                        <div class="collapse" id="collapseExample1-1-2">
                            <div class="card card-body">
                                <div class="form-group clearfix">
                                    <label class="rating_type">نحوه برخورد پرسنل</label>
                                    <span class="rating">2
												<input type="radio" class="required rating-input" id="rating-input1-2-1" name="rating-input1-2-1" value="1"><label for="rating-input-1-1" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input1-2-2" name="rating-input1-2-2" value="2"><label for="rating-input-1-2" class="rating-star"></label>
												<input type="radio" class="required rating-input" id="rating-input1-2-3" name="rating-input1-2-3" value="3"><label for="rating-input-1-3" class="rating-star"></label>
												</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>

                <!--footer-->
                <div class="card-footer">
                    <button type="button" class=" col-md-3 center-blok btn btn-md btn-success pull-left" ><i class="fa fa-save"></i>   ثبت  </button>
                </div>
            </div>
        </div>

    </div>

</div>

</div>
</form>





