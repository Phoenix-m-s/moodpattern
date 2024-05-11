<main>
    <?php
    //echo 'list=<pre>';print_r($list['list']);
    ?>
    <div id="form_container"  style="text-align: center;direction: rtl;height: auto;">
        <!-- /row -->
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center text-white mb-3 bg-primary" style="height: 50px;line-height:50px;">
                    لیست گراف‌های حسی:
                </h4>
                <hr>
            </div>
        </div>
        <form method="post">
            <div class="container">
                <div class="row">

                    <div class="col-md-7 mt-3">
                        <div class="form-inline">
                            <label style="padding-left: 10px;"><input type="radio" value="1" name="topic_type" class="icheck">هدف نهایی</label>
                            <label style="padding-left: 10px;"><input type="radio" value="3" name="topic_type" class="icheck">فعالیت روزانه</label>
                            <label style="padding-left: 10px;"><input type="radio" value="4" name="topic_type" class="icheck">عادت</label>
                            <label style="padding-left: 10px;"><input type="radio" value="2" name="topic_type" class="icheck">رابطه انسانی</label>
                        </div>
                    </div>
                    <div class="input-group col-md-5">
                        <input  class="form-control py-2" name="title" id="title" type="search" placeholder="جستجو"  value="" id="موضوع">

                        <button class="btn btn-primary" type="submit">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
            </div>

        </form>
        <div class="row">
            <hr>
            <!-- /row -->
            <div class="col-md-12 mt-4 ">
                <table class="table" >
                    <thead>
                    <tr class="alert alert-info text-dark">
                        <th>عنوان</th>
                        <th>نوع موضوع</th>
                        <th>عملگر </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($list['list'] as $k=>$v){
                        $type = '' ;
                        if($v['topic_type']==1){
                            $type = 'فعالیت روزانه' ;
                        }elseif($v['topic_type']==2){
                            $type = 'رابطه انسانی' ;
                        }elseif($v['topic_type']==3){
                            $type = 'انتخاب هدف' ;
                        }elseif($v['topic_type']==4){
                            $type = 'رسیدن به هدف' ;
                        }elseif($v['topic_type']==5){
                            $type = 'ایجاد عادت' ;
                        }elseif($v['topic_type']==6){
                            $type = 'ترک عادت' ;
                        }
                        echo'
                    <tr>
                        <td>'.$v['title'].'</td>
                        <td>'.$type.'</td>
                        <td>
                            <a class="mr-2" href="/questionrange/?topicId='.$v['id'].'" title="تکمیل امتیازدهی"> <i class="fa fa-edit"></i> </a>
                            '.($v['save_graph']==1?'<a class="mr-2" href="/chart/?topicId='.$v['id'].'" title="نمایش گراف حسی"> <i class="fa fa-bar-chart"></i> </a>':'').'
                        </td>
                        <td>
                        
</td>
                         </tr>
                        ';
                    }
                    ?>
                    </tbody>
                </table>
                <!-- /Wizard container -->
            </div>
        </div><!-- /Row -->
    </div><!-- /Form_container -->
</main>

