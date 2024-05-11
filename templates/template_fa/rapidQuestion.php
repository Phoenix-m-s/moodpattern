<style>
    .panel{
        font-size: small;
        font-weight: bold;
        direction: rtl;
        text-align: right;
    }
    .panel>.panel-heading{
        color: white;
        font-size:medium ;
        font-weight: bold;
        padding:5px !important;
    }
    .panel>.panel-body{
        padding-top:10px !important;
        padding-bottom:0px !important;
    }
    .panel>.panel-heading.headcolor1 {
        background-color: #12d3cf;
    }
    .panel.bodycolor1 {
        background-color: #d7f7f0;
    }
    .panel>.panel-heading.headcolor2 {
        background-color: #bb7fa6;
    }
    .panel.bodycolor2 {
        background-color: #e4d2de;
    }
    #form_container{
        margin:0 auto !important;
    }
</style>
<main >
    <?php
    //echo'<pre>';print_r($list);
    if($list['list']['ERR'] == 1) {
        ?>
    <div class="alert alert-warning" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong style='margin-right:10px'>توجه!</strong>
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
            <div class="col-lg-12">

                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>
                    <!-- /top-wizard -->
                    <form name="rapid" id="rapid" role="form" data-validate="form" class="form-horizontal" autocomplete="off" novalidate="novalidate" method="post">

                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">

                            <div class="step">
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 float-none" style="margin: 0 auto !important;">
                                        <h4 class="text-center text-white mb-3 bg-primary" style="height: 40px;line-height:40px;">
                                            گراف حسی به روش سریع
                                        </h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8 float-none" style="margin: 0 auto !important;">
                                        <div class="panel panel-default" style="background-color: #f7f7f7">
<!--                                            <div class="panel-heading text-right">نوع موضوع گراف:</div>-->
                                            <div class="panel-body">
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group" >
                                                        <input type="text" name="title" value="<?php echo(isset($list['list']['input']['title'])?$list['list']['input']['title']:'') ;?>" <?php echo(isset($list['list']['input']['action']) && $list['list']['input']['action']=='edit'?'disabled':'') ; ?> class="form-control" required placeholder="موضوع">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group" >
<!--                                                        <label for="sensor1" >نوع گراف:</label>-->
                                                        <label>
                                                            <select class="form-control" name="topic_type" id="topic_type" <?php echo(isset($list['list']['input']['action']) && $list['list']['input']['action']=='edit'?'disabled':'') ; ?> required>
                                                                <option <?php echo(isset($list['list']['input']['topic_type']) && $list['list']['input']['topic_type']=='0'?"selected":'') ;?>  value="0">نوع گراف</option>
                                                                <option <?php echo(isset($list['list']['input']['topic_type']) && $list['list']['input']['topic_type']=='1'?"selected":'') ;?> value="1">فعالیت روزانه و رفتار</option>
                                                                <option <?php echo(isset($list['list']['input']['topic_type']) && $list['list']['input']['topic_type']=='3'?"selected":'') ;?> value="3">انتخاب هدف</option>
                                                                <option <?php echo(isset($list['list']['input']['topic_type']) && $list['list']['input']['topic_type']=='4'?"selected":'') ;?> value="4">رسیدن به هدف</option>
                                                                <option <?php echo(isset($list['list']['input']['topic_type']) && $list['list']['input']['topic_type']=='5'?"selected":'') ;?>  value="5">ایجاد عادت خوب</option>
                                                                <option <?php echo(isset($list['list']['input']['topic_type']) && $list['list']['input']['topic_type']=='6'?"selected":'') ;?>  value="6">ترک عادت بد - اعتیاد</option>
                                                                <option <?php echo(isset($list['list']['input']['topic_type']) && $list['list']['input']['topic_type']=='2'?"selected":'') ;?>  value="2">رابطه انسانی</option>
                                                            </select>
                                                        </label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 float-none" style="margin: 0 auto !important;">
                                        <div class="panel bodycolor1">
                                            <div class="panel-heading headcolor1 text-right">A</div>
                                            <div class="panel-body text-right">
                                                <div class="col-xs-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="A1" style="margin-right:20px;" >تایید:</label>
                                                        <label>
                                                            <select class="form-control" name="A1" id="A1" required>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['A1']) && $list['list']['input']['A1']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="A3" >امنیت:</label>
                                                        <label>
                                                            <select class="form-control" name="A3" id="A3" required>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['A3']) && $list['list']['input']['A3']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group">
                                                        <label for="A5" >به‌دست‌آوردن:</label>
                                                        <label>
                                                            <select class="form-control" name="A5" id="A5" required>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['A5']) && $list['list']['input']['A5']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="A7" >اختیار:</label>
                                                        <label>
                                                            <select class="form-control" name="A7" id="A7" required>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['A7']) && $list['list']['input']['A7']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="A8" >لذت:</label>
                                                        <label>
                                                            <select class="form-control" name="A8" id="A8" required>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['A8']) && $list['list']['input']['A8']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 float-none" style="margin: 0 auto !important;">
                                        <div class="panel bodycolor1">
                                            <div class="panel-heading headcolor1 text-right">B</div>
                                            <div class="panel-body text-right">
                                                <div class="col-xs-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="B2" >عدم‌تایید:</label>
                                                        <label>
                                                            <select class="form-control" name="B2" id="B2" required>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['B2']) && $list['list']['input']['B2']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="B4" >ناامنی:</label>
                                                        <label>
                                                            <select class="form-control" name="B4" id="B4" required>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['B4']) && $list['list']['input']['B4']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group">
                                                        <label for="B6" >از‌دست‌دادن:</label>
                                                        <label>
                                                            <select class="form-control" name="B6" id="B6" required>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['B6']) && $list['list']['input']['B6']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="B9" >اجبار:</label>
                                                        <label>
                                                            <select class="form-control" name="B9" id="B9" required>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['B9']) && $list['list']['input']['B9']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="B10" >درد:</label>
                                                        <label>
                                                            <select class="form-control" name="B10" id="B10" required>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['B10']) && $list['list']['input']['B10']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 float-none" style="margin: 0 auto !important;">
                                        <div class="panel bodycolor2">
                                            <div class="panel-heading headcolor2 text-right">C</div>
                                            <div class="panel-body">
                                                <div class="col-xs-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="C1" style="margin-right:20px;" >تایید:</label>
                                                        <label>
                                                            <select class="form-control" name="C1" id="C1" required>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['C1']) && $list['list']['input']['C1']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="C3" >امنیت:</label>
                                                        <label>
                                                            <select class="form-control" name="C3" id="C3" required>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['C3']) && $list['list']['input']['C3']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group">
                                                        <label for="C5" >به‌دست‌آوردن:</label>
                                                        <label>
                                                            <select class="form-control" name="C5" id="C5" required>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['C5']) && $list['list']['input']['C5']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="C7" >اختیار:</label>
                                                        <label>
                                                            <select class="form-control" name="C7" id="C7" required>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['C7']) && $list['list']['input']['C7']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="C8" >لذت:</label>
                                                        <label>
                                                            <select class="form-control" name="C8" id="C8" required>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['C8']) && $list['list']['input']['C8']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 float-none" style="margin: 0 auto !important;">
                                        <div class="panel bodycolor2">
                                            <div class="panel-heading headcolor2 text-right">D</div>
                                            <div class="panel-body">
                                                <div class="col-xs-12 col-md-3">
                                                    <div class="form-group">
                                                        <label for="D2" >عدم‌تایید:</label>
                                                        <label>
                                                            <select class="form-control" name="D2" id="D2" required>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['D2']) && $list['list']['input']['D2']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="D4" >ناامنی:</label>
                                                        <label>
                                                            <select class="form-control" name="D4" id="D4" required>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['D4']) && $list['list']['input']['D4']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="form-group">
                                                        <label for="D6" >از‌دست‌دادن:</label>
                                                        <label>
                                                            <select class="form-control" name="D6" id="D6" required>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['D6']) && $list['list']['input']['D6']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="D9" >اجبار:</label>
                                                        <label>
                                                            <select class="form-control" name="D9" id="D9" required>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['D9']) && $list['list']['input']['D9']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-2">
                                                    <div class="form-group">
                                                        <label for="D10" >درد:</label>
                                                        <label>
                                                            <select class="form-control" name="D10" id="D10" required>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='0'?"selected":'') ;?>  value="0">0</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='1'?"selected":'') ;?> value="1">1</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='2'?"selected":'') ;?> value="2">2</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='3'?"selected":'') ;?> value="3">3</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='4'?"selected":'') ;?> value="4">4</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='5'?"selected":'') ;?> value="5">5</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='6'?"selected":'') ;?> value="6">6</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='7'?"selected":'') ;?> value="7">7</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='8'?"selected":'') ;?> value="8">8</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='9'?"selected":'') ;?> value="9">9</option>
                                                                <option <?php echo(isset($list['list']['input']['D10']) && $list['list']['input']['D10']=='11'?"selected":'') ;?> value="11">11</option>
                                                            </select>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="row">
                                    <div class="col-xs-12 col-md-8 float-none" style="margin: 0 auto !important;">
                                        <button type="submit" name="submit" class="btn btn-success btn-block" ><i class="fa fa-save"></i> تحلیل گراف</button>
                                    </div>
                                </div>
                                <?php
                                    if(isset($list['list']['input']['action']) && $list['list']['input']['action']=='edit'){
                                        echo '<input name="action" type="hidden" id="action" value="edit">' ;
                                        if(isset($list['list']['input']['topic_id'])) {
                                            echo '<input name="topic_id" type="hidden" id="action" value="'.$list['list']['input']['topic_id'].'">';
                                        }
                                    }else{
                                        echo '<input name="action" type="hidden" id="action" value="add">' ;
                                    }
                                ?>
                                <!-- /middle-wizard -->
                                <div id="bottom-wizard">
                                </div>
                                <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
</main>
