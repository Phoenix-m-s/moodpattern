<link rel="stylesheet" type="text/css" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/DataTables/datatables.css"/>
<script type="text/javascript" src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/DataTables/datatables.js"></script>
<?php
//echo 'list=<pre>';print_r($list['list']);
$jsListTopic = '' ;
$typeTopic = array(1=>'فعالیت روزانه و رفتار',2=>'رابطه انسانی',3=>'انتخاب هدف',4=>'رسیدن به هدف',5=>'ایجاد عادت خوب',6=>'ترک عادت بد - اعتیاد') ;
foreach($list['list'] as $k=>$v){
    $link1 = ($v['save_graph']==0?"<a class='mr-2' href='/questionrange2/?topicId=".$v['id']."' title='ویرایش'> <i class='fa fa-edit'></i> </a>":'-') ;
    $link2 = ($v['save_graph']==1?"<a class='mr-2' href='/chart/?topicId=".$v['id']."' title='مشاهده گراف'> <i class='fa fa-bar-chart'></i> </a>":'-') ;
    $jsListTopic .= '["'.$v['title'].'","'.$typeTopic[$v['topic_type']].'","'.$link1.'","'.$link2.'"],' ;
}
$jsListTopic = substr($jsListTopic,0,strlen($jsListTopic)-1) ;
//echo $jsListTopic ;
?>
<script>
    var dataSet = [
        <?php echo $jsListTopic ; ?>
    ];

    $(document).ready(function() {
        $('#example').DataTable( {
            data: dataSet,
            columns: [
                { title: "عنوان" },
                { title: "نوع موضوع" },
                { title: "ویرایش" },
                { title: "مشاهده گراف" }
            ],
            "oLanguage": {
                "sSearch": "جستجو: " ,
                //"sLengthMenu": "Display _MENU_ records"
                "sLengthMenu": "نمایش _MENU_ گراف"
            },
            "language": {
                "paginate": {
                    "previous": "قبلی",
                    "next": "بعدی",
                    "Search": "جستجو: "
                }
            }
        } );
    } );
</script>
<main>
    <div id="form_container"  style="text-align: center;direction: rtl;height: auto;">
        <div class="row">
            <div class="col-md-12 mt-4">
                <h4 class="text-center text-white mb-3 bg-primary" style="height: 40px;line-height:40px;">
                    لیست گراف‌های حسی
                </h4>
            </div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <a href="/topic/?action=add" class="btn btn-primary" role="button"style="float: right;margin-right: 5px; background-color: #007bff;" >جدید</a>
            </div>
        </div>
        <!-- /row -->
        <div class="row">
            <div class="col-md-12 mt-4">
                <table id="example" class="display" width="100%" style="padding-left: 1px;padding-right: 1px;padding-top: 15px;"></table>
            </div>
        </div>
        <!-- /row -->
    </div><!-- /Form_container -->

