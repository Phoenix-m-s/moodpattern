<?php
//echo 'action='.$list['list']['input']['action'];
//echo '<pre>';print_r($list);
$title = '' ;
$phrase_fa = '' ;
$phrase_en = '' ;
$author = '' ;
$lifeArea = array() ;
$lifeAreaLists = $list['life_areas'] ;
if($list['list']['input']['action'] == 'edit'){
    $title = $list['list']['input']['title'] ;
    $phrase_fa = $list['list']['input']['phrase_fa'] ;
    $phrase_en = $list['list']['input']['phrase_en'] ;
    $author = $list['list']['input']['author'] ;
    $lifeArea = $list['list']['input']['lifeArea'] ;
    $lifeAreaLists = $list['list']['life_areas'] ;
}
//echo '<pre>';print_r($list['list']['life_areas']);
//echo '<pre>';print_r($list['list']['input']['lifeArea'] );

?>
<!--style-->
<style type="text/css">
    ul.ks-cboxtags {
        list-style: none;
        padding: 20px;
    }
    ul.ks-cboxtags li{
        display: inline;
    }
    ul.ks-cboxtags li label{
        display: inline-block;
        background-color: rgba(255, 255, 255, .9);
        border: 2px solid rgba(139, 139, 139, .3);
        color: #adadad;
        border-radius: 25px;
        white-space: nowrap;
        margin: 3px 0;
        -webkit-touch-callout: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        -webkit-tap-highlight-color: transparent;
        transition: all .2s;
        font-size:13px !important; ;
    }

    ul.ks-cboxtags li label {
        padding: 8px 12px;
        cursor: pointer;
    }

    ul.ks-cboxtags li label::before {
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        -webkit-font-smoothing: antialiased;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        font-size: 12px;
        padding: 2px 6px 2px 2px;
        content: "\f067";
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
        content: "\f00c";
        transform: rotate(-360deg);
        transition: transform .3s ease-in-out;
    }

    ul.ks-cboxtags li input[type="checkbox"]:checked + label {
        border: 2px solid #1bdbf8;
        background-color: #12bbd4;
        color: #fff;
        transition: all .2s;
    }

    ul.ks-cboxtags li input[type="checkbox"] {
        position:absolute;
    }
    ul.ks-cboxtags li input[type="checkbox"] {
        position: absolute;
        opacity: 0;
    }
    ul.ks-cboxtags li input[type="checkbox"]:focus + label {
        border: 2px solid #e9a1ff;
    }
    .panel-heading
    {
        font-weight: bold;
        height: 65px;
        color: #fff !important;
        background-color: #68a4a0 !important;
    }
    .panel-success > .panel-heading
    {
        border-bottom: 3 px solid #c4dbd8;
    }
    .btn-primary{
        color: #fff !important;
        background-color: #84c2bb !important;
    }
    .btn-danger{
        color: #fff !important;
        background-color: #ff8e71 !important;
    }
    @media only screen and (max-width: 767px) {
        ul.ks-cboxtags li label{
            font-size: 10px !important;
        }
        ul.ks-cboxtags{
        padding: 0 !important;
        }
    }
</style>
<!--end style-->
<main>
    <div id="form_container">

        <div class="row">

            <div class="col-md-12">

                <div id="wizard_container">

                    <!--start panel form-->

                    <div class="panel panel-success">
                        <div class="panel-heading"> <i class="fa fa-flag fa-2x" aria-hidden="true"></i> عبارات انگیزشی</div>

                        <div class="panel-body">

                            <form method="post">
                                <div class="form-group">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control" name="title" id="title" value="<?php echo $title ?>"  placeholder="کلیدی‌ترین کلمه عبارت رو وارد نمایید">

                                </div>
                                <div class="form-group">
                                    <label for="phrase_fa">عبارت فارسی</label>
                                    <textarea  class="form-control" id="phrase_fa" name="phrase_fa" placeholder="عبارت را به فارسی وارد نمایید" style="max-height: 100px;"><?php echo $phrase_fa ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="phrase_en">عبارت انگلیسی</label>
                                    <textarea dir="ltr" class="form-control" id="phrase_en" name="phrase_en" placeholder="Enter the phrase in English" style="max-height: 100px;"><?php echo $phrase_en ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="author">نویسنده</label>
                                    <input type="text" class="form-control" id="author" name="author" value="<?php echo $author ?>" placeholder="نویسنده عبارت را وارد نمایید" >
                                </div>
                                <div class="form-check">
                                    <ul class="ks-cboxtags">
                                        <?php
                                        foreach($lifeAreaLists as $k=>$v){
                                            $checked = '' ;
                                            if(in_array($k,$lifeArea)){
                                                $checked = 'checked' ;
                                            }
                                            echo '<li><input type="checkbox" id="'.$k.'" name="lifeArea[]" value="'.$k.'" '.$checked.'><label for="'.$k.'">'.$v.'</label></li>' ;
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="col-md-4" style="float:none !important;margin: 0 auto;">
                                    <button type="submit" class="btn btn-primary btn-block"> <i class="fa fa-save" aria-hidden="true"></i> ثبت</button>
                                    <?php
                                    if($list['list']['input']['action'] == 'edit'){
                                        echo '<button type="button" class="btn btn-danger btn-block" onclick="javascript:history.go(-1);"> <i class="fa fa-remove" aria-hidden="true"></i> انصراف</button>' ;
                                    }

                                    ?>

                                </div>
                                <?php
                                if($list['list']['input']['action'] == 'edit'){
                                    echo '
                                    <input type="hidden" name="action" value="edit">
                                    <input type="hidden" name="id" value="'.$list['list']['input']['id'].'">
                                    ' ;
                                }else{
                                    echo '<input type="hidden" name="action" value="add">' ;
                                }
                                ?>
                            </form>


                        </div>





                    </div>

                    <!--end panel form-->
                </div>
                <!-- /Wizard container -->
            </div><!-- /col -->
        </div><!-- /Row -->
    </div><!-- /Form_container -->
</main>