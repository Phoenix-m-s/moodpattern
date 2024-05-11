<link rel="stylesheet" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/all.css">
<link rel="stylesheet" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/brands.css">
<link rel="stylesheet" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/fontawesome.css">
<link rel="stylesheet" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/regular.css">
<link rel="stylesheet" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/svg-with-js.css">
<link rel="stylesheet" href="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/css/v4-shims.css">


<link href="<?php echo RELA_DIR .'templates/' . CURRENT_SKIN; ?>/assets/css/jQuery-plugin-progressbar.css" rel="stylesheet">
<script src="<?php echo RELA_DIR .'templates/' . CURRENT_SKIN; ?>/assets/js/jQuery-plugin-progressbar.js"></script>

<style>
    .rowcenter{
        border:2px solid #ccc;
        background-color:transparent;
        width: 95%!important;
        float:none;
        margin: 10px auto !important;
        padding: 10px;
    }
    .rowrow{
        border:2px solid #ccc;
        background-color:transparent;
        width:47%!important;
        margin-left: 24px;
        float:left
    }
    @media only screen and (max-width:767px) {
        .rowrow{
            border:2px solid #ccc;
            background-color:transparent;
            width: 95%!important;
            float:none;
            margin: 10px auto !important;
            padding: 10px;
        }
    }
    .modal-title{
        line-height:0 !important;
        margin-bottom:23px !important;
        height:0 !important;
        border-radius:0 !important;
        text-align:center !important;
        width: 100%;
        font-size: small;
    }
    .modal-header{
        border-radius:0 !important;
    }
    .btn{
        border-radius: 24px;
        font-size: small;
    }
    a.disabled {
        pointer-events: none;
        cursor: default;
    }
</style>
<?php
//echo '<pre>'; print_r($list['list']);
$arrayAnalyze = "";
//$arrayAnalyze .= "var objAnalyze = {
//    'row1' : {
//        'key1' : 'input',
//        'key2' : 'input',
//        'key3' : 'input',
//        'key4' : 'input'
//    }
//};";
$arrayAnalyze .= "var analyze = [[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3]]; ";
$label1 = 'رضایت' ;
$label2 = 'خشم' ;
$label3 = 'غم' ;
$label4 = 'استرس' ;
$bgColor2 = 'rgba(255, 0, 0,0.4)' ;
$bgColor1 = 'rgba(14, 255, 0,0.4)' ;
if($list['list']['topic']['topic_type']==2){
    $topicType = 'رابطه ما باهم یعنی ' ;
    $approach1 = 'بودن در رابطه با او' ;
    $approach2 = 'نبودن در رابطه با او' ;
}
$degree = array(0,36,72,108,144,180,216,252,288,324) ;
$labels = '' ;
$data1 = '' ;
$data2 = '' ;
//echo'<pre>'; print_r($list['list']['score']);
$A = 0 ;
$B = 0 ;
$C = 0 ;
$D = 0 ;
foreach($list['list']['sensor'] as $k=>$v){
    $labels .= ','.$degree[$k].":'".$v['title']."'" ;
    if($v['sensor_type']==1) {
        if (isset($list['list']['score'][1][$v['id']])) {
            $data1 .= ',{ name:'."'".$v['title']."',color:'$bgColor1',y:". pow($list['list']['score'][1][$v['id']],2).'}';
            $A += pow($list['list']['score'][1][$v['id']],2) ;
        }
        if (isset($list['list']['score'][2][$v['id']])) {
            $data2 .= ',{ name:'."'".$v['title']."',color:'".$bgColor2."',y:". pow($list['list']['score'][2][$v['id']],2).'}';
            $C += pow($list['list']['score'][2][$v['id']],2) ;
        }
    }
    if($v['sensor_type']==2){
        if (isset($list['list']['score'][1][$v['id']])) {
            $data1 .= ',{ name:'."'".$v['title']."',color:'$bgColor2',y:". pow($list['list']['score'][1][$v['id']],2).'}';
            $B += pow($list['list']['score'][1][$v['id']],2);
        }
        if(isset($list['list']['score'][2][$v['id']])) {
            $data2 .= ',{ name:'."'".$v['title']."',color:'".$bgColor1
                ."',y:". pow($list['list']['score'][2][$v['id']],2).'}';
            $D += pow($list['list']['score'][2][$v['id']],2);
        }
    }
}
$labels = substr($labels,1,strlen($labels)) ;
$data1 = substr($data1,1,strlen($data1)) ;
$data2 = substr($data2,1,strlen($data2)) ;
//echo $labels ;
//echo '$data1='.$data1 ;
//echo "A=$A,B=$B,C=$C,D=$D" ;
/////////////////////////// ANALYS //////////////////////////////////////
$range_one_hundred = array(1=>array('min'=>0,'max'=>101),2=>array('min'=>101,'max'=>203),3=>array('min'=>203,'max'=>304),4=>array('min'=>304,'max'=>405),5=>array('min'=>405,'max'=>505),6=>array('min'=>505,'max'=>605)) ;
$range_two_hundred = array(1=>array('min'=>10,'max'=>210),2=>array('min'=>210,'max'=>410),3=>array('min'=>410,'max'=>610),4=>array('min'=>610,'max'=>810),5=>array('min'=>810,'max'=>1210)) ;
$percentMaxRange = 405 ;
//$percentMaxRange = 605 ;

$r = 0 ;
$result = array(1=>array(),2=>array(),3=>array(),4=>array()) ;

$percentArray = array();
if($list['list']['topic']['topic_type']==2){
    //////////////// دوست داشتن حسی/////////////////////////////
    /////////////// A ///////////////////
    $percent =round(($A*100)/$percentMaxRange,0);
    $percentArray['A'] = $percent ;

    /////////////// B ///////////////////
    $percent =round(($B*100)/$percentMaxRange,0);
    $percentArray['B'] = $percent ;

    /////////////// C ///////////////////
    $percent =round(($C*100)/$percentMaxRange,0);
    $percentArray['C'] = $percent ;
    /////////////// D ///////////////////
    $percent =round(($D*100)/$percentMaxRange,0);
    $percentArray['D'] = $percent ;
    //echo '<pre>';print_r($percentArray);
    ////////////////    نیاز حسی    /////////////////////
    /////////////// A-B ///////////////////
    $x = $A - $B ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A-B'] = $percent ;

    /////////////// C-D ///////////////////
    $x = $C - $D ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['C-D'] = $percent ;
    /////////////// A-B و C-D ///////////////////
    $x1 = $A - $B ;
    $x2 = $C - $D ;

    /////////////// توانایی حسی ///////////////////
    /////////////// (A+D)- B ///////////////////
    /////////////// (A+D)-(B+C) ///////////////////
    $x = ($A + $D)- $B ;
    $percentMaxRange = 810 ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A+D-B'] = $percent ;

//////////////   پشتکار و پایداری   ///////////////////
/////////////// (A+D)-(B+C) ///////////////////
    $x = ($A + $D)- ($B + $C) ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A+D-B+C'] = $percent ;

    ////////////////  انرژی حسی/////////////////////
    /////////////// A - (B+C+D) ///////////////////
    /////////////// A+B+C+D ///////////////////
    $percentMaxRange = 810 ;
    $x = $A - ($B + $C + $D) ;
    $percentMaxRange = 405 ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A-B+C+D'] = $percent ;
/////////////// A+B+C+D ///////////////////
    $percentMaxRange = 1620 ;
    $x = $A + $D + $B + $C ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A+B+C+D'] = $percent ;

    //print_r($percentArray);
}
?>
<style>
    .radius_border{
        height: 40px !important;
        border-radius:25px !important;

    }
    .card-header>h4{
        line-height: 20px !important;
    }
</style>
<script>
    var categoryLinks = {<?php echo $labels; ?>};
</script>
<main>

    <div id="form_container" style="text-align: center;direction: rtl;">
        <div class="row" style="width: 100%;margin: 0 auto;padding: 0;float: none">
            <div class="col-md-8"></div>
            <div class="col-md-4 float-left">
                <div class="btn-group mt-2 float-left" dir="ltr">
                    <button type="button" class="btn btn-secondary disabled "title="تعیین وقت مشاوره">وقت مشاوره</button>
                    <button type="button" class="btn btn-secondary disabled" title="دریافت گزارش مخصوص مشاور">گزارش مشاور</button>
                    <a  href="/chart2/?topicId=<?php echo $list['list']['topic']['id'] ?>" class="btn btn-primary active"  title="چاپ گزارش جاری" >
                        صفحه چاپ
                    </a>
                </div>
            </div>
        </div>
        <!--        <a href="#" class="text-dark text-left pull-left" id="printText" onclick="javascript:window.print()" title="چاپ">-->
        <!--            <i class="fa fa-print fa-2x text-center"></i>-->
        <!--        </a>-->
        <!--        <br/>-->
        <div class="row" style="width: 100%;margin: 0 auto;padding: 0;float: none">
            <div class="col-md-12">
                <h4 class="card-header bg-primary radius_border text-white" >
                            <span class="text-right title-chart-type" dir="rtl">
                               <i class="fa fa-edit"></i> <?php echo $topicType ; ?>
                            </span>
                            <span class="text-right title-chart" dir="rtl">
                               <i class="fa fa-edit"></i> <?php echo $list['list']['topic']['title'] ;?>
                            </span>
                </h4>
            </div>

        </div>

        <div id="wizard_container">

            <div class="row mb-4">

                <div class="col-md-6">

                    <h4 class="header-caption text-center mt-5" ><?php echo $approach1 ; ?></h4>

                    <span class="badge badge-info badge-pill mt-5" style="width: 40px;height: 40px;line-height: 40px ;background-color: rgb(8, 191, 71);"><?php echo $A; ?></span>
                    <span style="font-size:20px;font-weight: bold;">A</span>
                    <div class="mt-5" id="container1" ></div>
                    <script language="JavaScript">
                        Highcharts.chart('container1', {

                            chart: {
                                polar: true
                            },

                            credits: {
                                enabled: false
                            },

                            title: {
                                text: ''
                            },

                            subtitle: {
                                text: ''
                            },

                            pane: {
                                startAngle: -90
                            },

                            xAxis: {
                                tickmarkPlacement: 'on',
                                startOnTick: true,
                                tickInterval: 36,
                                min: 0,
                                max: 360,
                                labels: {
                                    formatter: function() {
                                        return categoryLinks[this.value] ;
                                    },
                                    rotation: 0,
                                    reserveSpace: false,
                                    y: 0,
                                    x: 0,
                                    style: {
                                        align: 'right',
                                        verticalAlign: 'middle',
                                        fontSize: '10pt',
                                        fontWeight: 'bold'
                                    }
                                },
                                offset: 39
                            },
                            yAxis: {
                                min: 0,
                                max: 81
                            },

                            plotOptions: {
                                series: {
                                    pointStart: 0,
                                    pointInterval: 36,
                                    lineWidth: 10,
                                    fillOpacity: 0.1,
                                    dataLabels: {
                                        enabled: true,
                                        verticalAlign:'middle',
                                        align:'center',
                                        inside: false
                                    }
                                },
                                column: {
                                    pointPadding: 0,
                                    groupPadding: 0
                                }
                            },

                            series: [{
                                type: 'column',
                                name: 'Value',
                                data: [<?php echo $data1 ?>],
                                pointPlacement: 'between'
                                ,showInLegend : false
                            }
                            ]
                        });
                    </script>
                    <span class="badge badge-info badge-pill" style="width: 40px;height: 40px;line-height: 40px;background-color: rgba(255, 0, 0, 0.64)"><?php echo $B ?></span>

                    <span style="font-size:20px;font-weight: bold;">B</span>
                </div>

                <div class="col-md-6">
                    <h4 class="header-caption text-center mt-5" ><?php echo $approach2; ?></h4>

                    <span class="badge badge-info badge-pill mt-5" style="width: 40px;height: 40px;line-height: 40px;background-color: rgba(255, 0, 0, 0.64);"><?php echo $C; ?></span>
                    <span style="font-size:20px;font-weight: bold;">C</span>
                    <div class="mt-5" id="container2"></div>
                    <script language="JavaScript">
                        Highcharts.chart('container2', {

                            chart: {
                                polar: true
                            },

                            credits: {
                                enabled: false
                            },

                            title: {
                                text: ''
                            },

                            subtitle: {
                                text: ''
                            },

                            pane: {
                                startAngle: -90
                            },

                            xAxis: {
                                tickmarkPlacement: 'on',
                                startOnTick: true,
                                tickInterval: 36,
                                min: 0,
                                max: 360,
                                labels: {
                                    formatter: function() {
                                        return categoryLinks[this.value] ;
                                    },
                                    rotation: 0,
                                    reserveSpace: false,
                                    y: 5,
                                    x: 0,
                                    style: {
                                        align: 'right',
                                        verticalAlign: 'middle',
                                        fontSize: '10pt',
                                        fontWeight: 'bold'
                                    }
                                },
                                offset: 39
                            },
                            yAxis: {
                                min: 0,
                                max: 81
                            },

                            plotOptions: {
                                series: {
                                    pointStart: 0,
                                    pointInterval: 36,
                                    lineWidth: 10,
                                    fillOpacity: 0.1,
                                    dataLabels: {
                                        enabled: true,
                                        verticalAlign:'middle',
                                        align:'center',
                                        inside: false
                                    }
                                },
                                column: {
                                    pointPadding: 0,
                                    groupPadding: 0
                                }
                            },

                            series: [{
                                type: 'column',
                                name: 'Value',
                                data: [<?php echo $data2 ?>],
                                pointPlacement: 'between'
                                ,showInLegend : false
                            }
                            ]
                        });
                    </script>

                    <span class="badge badge-info badge-pill" style="width: 40px;height: 40px;line-height: 40px;"></span><span class="badge badge-info badge-pill" style="width: 40px;height: 40px;line-height: 40px;background-color: rgb(8, 191, 71)"><?php echo $D ?></span>
                    <span style="font-size:20px;font-weight: bold;">D</span>
                </div>
            </div>
            <!--section 1-->
            <div class="row rowcenter" >
                <div class="col-md-12 mb-2">
                    <div>
                        <div class="card-header "  style="padding:5px;border-bottom: none !important;">
                            <!--                            <h5 class="text-center text-danger"><i class="fa fa-users"></i>  با واگویه های فعلی شما در حال حاضر:</h5>-->
                            <h5  class="text-center text-dark" style="line-height: 20px;padding-right: 5px;margin-bottom: 25px;" >
                                دوست داشتن حسی
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-1 ">
                    <div class="card"  >
                        <!-- <center><img style="width: 32px;height: 32px;" src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/love.png" class="card-img-top" alt="..."></center>-->
                        <div class="card-header">
                            <i class="fa fa-heart-o fa-2x"></i>

                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-edit"></i>
علاقه
                            </h5>
                            <p class="card-text">
                                چقدر این رابطه را دوست‌دارم
                            </p>
                            <div class="progress-bar" data-percent="<?php echo $percentArray['A'] ; ?>" data-duration="1000" data-color="#ccc,#67eb34"></div>

                        </div>
                        <div class="card-footer">
                            <a href="#"  class="btn btn-secondary btn-block openBtn disabled" data-id="0" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                        </div>
                    </div>
                </div>
                <!--section2-->
                <div class="col-md-3 mb-1 ">
                    <div class="card" >
                        <div class="card-header">
                            <i class="far fa-angry fa-2x"></i>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-edit"></i>
                                خشم
                            </h5>
                            <p class="card-text">
                                چقدر از این رابطه بدم‌می‌آید
                            </p>
                            <div class="progress-bar" data-percent="<?php echo $percentArray['B'] ; ?>" data-duration="1000" data-color="#ccc,red"></div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="1" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                        </div>
                    </div>
                </div>
                <!--section 3-->
                <div class="col-md-3 mb-1">
                    <div class="card" >
                        <div class="card-header">
                            <i class="far fa-frown fa-2x"></i>

                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-edit"></i>
                                غم
                            </h5>
                            <p class="card-text" data-toggle="modal" data-target="#myModal">
                                چقدر ترک این رابطه را دوست‌دارم
                            </p>
                            <div class="progress-bar" data-percent="<?php echo $percentArray['C'] ; ?>" data-duration="1000" data-color="#ccc,yellow"></div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="2" data-toggle="modal" data-target="#myModal"><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>
                        </div>
                    </div>
                </div>
                <!--section 4-->
                <div class="col-md-3 mb-1">
                    <div class="card" >
                        <div class="card-header">
                            <i class="far fa-meh fa-2x"></i>

                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><i class="fa fa-edit"></i>
                                استرس
                            </h5>
                            <p class="card-text">
                                چقدر از ترک این رابطه بدم‌می‌آید
                            </p>
                            <div class="progress-bar" data-percent="<?php echo $percentArray['D'] ; ?>" data-duration="1000" data-color="#ccc,blue"></div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="3" ><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                        </div>
                    </div>
                </div>
            </div>
            <!--section 2-->
            <div class="row rowcenter">
                <div class="col-md-12 mb-2">
                    <div>
                        <div class="card-header "  style="padding:5px;border-bottom: none !important;">
                            <!--                            <h5 class="text-center text-danger"><i class="fa fa-users"></i>  با واگویه های فعلی شما در حال حاضر:</h5>-->
                            <h5  class="text-center text-dark" style="line-height: 20px;padding-right: 5px;margin-bottom: 25px;" >
                                نیاز حسی
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-1 ">
                    <div class="card"  >
                        <!-- <center><img style="width: 32px;height: 32px;" src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/love.png" class="card-img-top" alt="..."></center>-->
                        <div class="card-header">
                            <h5 class="card-title"><i class="fa fa-edit"></i>
                                رضایت
                            </h5>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
میزان احساس نیاز به رابطه
                            </p>
                            <div class="progress-bar" data-percent="<?php echo $percentArray['A-B'] ; ?>" data-duration="1000" data-color="#ccc,#67eb34"></div>

                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="4" data-toggle="modal" data-target="#myModal_s2"><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                        </div>
                    </div>
                </div>
                <!--section2-->
                <div class="col-md-4 mb-1 ">
                    <div class="card" >
                        <div class="card-header">
                            <h5 class="card-title"><i class="fa fa-edit"></i>
                                نارضایتی
                            </h5>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
میزان احساس نیاز به ترک رابطه
                            </p>
                            <div class="progress-bar" data-percent="<?php echo $percentArray['C-D'] ; ?>" data-duration="1000" data-color="#ccc,red"></div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="5" data-toggle="modal" data-target="#myModal_s2"><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                        </div>
                    </div>
                </div>

            </div>
            <!--section 3-->
            <div class="row rowcenter">
                <div class="col-md-12 mb-2">
                    <div>
                        <div class="card-header "  style="padding:5px;border-bottom: none !important;">
                            <!--                            <h5 class="text-center text-danger"><i class="fa fa-users"></i>  با واگویه های فعلی شما در حال حاضر:</h5>-->
                            <h5  class="text-center text-dark" style="line-height: 20px;padding-right: 5px;margin-bottom: 25px;" >
توانایی حسی
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-1 ">
                    <div class="card"  >
                        <!-- <center><img style="width: 32px;height: 32px;" src="<?php echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/love.png" class="card-img-top" alt="..."></center>-->
                        <div class="card-header">
                            <h5 class="card-title"><i class="fa fa-edit"></i>
اعتماد به نفس
                            </h5>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
توانایی ادامه دادن به رابطه
                            </p>
                            <div class="progress-bar" data-percent="<?php echo $percentArray['A+D-B'] ; ?>" data-duration="1000" data-color="#ccc,#67eb34"></div>

                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="7" data-toggle="modal" data-target="#myModal_s3"><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                        </div>
                    </div>
                </div>
                <!--section2-->
                <div class="col-md-4 mb-1 ">
                    <div class="card" >
                        <div class="card-header">
                            <h5 class="card-title"><i class="fa fa-edit"></i>
پایداری
                            </h5>
                        </div>
                        <div class="card-body">

                            <p class="card-text">
نمی توانم رابطه را ترک کنم
                            </p>
                            <div class="progress-bar" data-percent="<?php echo $percentArray['A+D-B+C'] ; ?>" data-duration="1000" data-color="#ccc,#ffbf00"></div>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="8" data-toggle="modal" data-target="#myModal_s2_3"><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                        </div>
                    </div>
                </div>

            </div>
            <!--section 4-->
            <div class="row rowcenter">
                            <div class="col-md-12 mb-2">
                                <div>
                                    <div class="card-header "  style="padding:5px;border-bottom: none !important;">
                                        <!--                            <h5 class="text-center text-danger"><i class="fa fa-users"></i>  با واگویه های فعلی شما در حال حاضر:</h5>-->
                                        <h5  class="text-center text-dark" style="line-height: 20px;padding-right: 5px;margin-bottom: 25px;" >
                                            سود حسی
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-1">
                                <div class="card"  >
                                    <!-- <center><img style="width: 32px;height: 32px;" src="<?php   echo RELA_DIR . 'templates/' . CURRENT_SKIN; ?>/assets/img/love.png" class="card-img-top" alt="..."></center>-->
                                    <div class="card-header">
                                        <h5 class="card-title"><i class="fa fa-edit"></i>
                                            عزت نفس
                                        </h5>
                                    </div>
                                    <div class="card-body">

                                        <p class="card-text">
میزان فایده و ضرر رابطه برای شما
                                        </p>
                                            <div class="progress-bar" data-percent="<?php echo $percentArray['A-B+C+D'] ; ?>" data-duration="1000" data-color="#ccc,#67eb34"></div>

                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="2" ><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                                    </div>
                                </div>
                            </div>
                            <!--section2-->
                            <div class="col-md-4 mb-1 ">
                                <div class="card" >
                                    <div class="card-header">
                                        <h5 class="card-title"><i class="fa fa-edit"></i>
انرژی حسی
                                        </h5>
                                    </div>
                                    <div class="card-body">

                                        <p class="card-text">
میزان انرژی رابطه
                                        </p>
                                            <div class="progress-bar" data-percent="<?php echo $percentArray['A+B+C+D'] ; ?>" data-duration="1000" data-color="#ccc,red"></div>
                                    </div>
                                    <div class="card-footer">
                                        <a href="#" class="btn btn-secondary btn-block openBtn disabled" data-id="2" ><i class="fa fa-question-circle"></i> مشاهده تحلیل </a>

                                    </div>
                                </div>
                            </div>

            </div>

                        <!--section 4-->

        </div>
        <!-- /Form_container -->
</main>
<!-- Modal 4 Section -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-lg ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h6 class="modal-title">
                    با واگویه‌های فعلی شما در حال حاضر:
                </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h6 class="modal-title" >
                    تحلیل ابتدایی گراف
                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div class="modal-header">
                    <div id="modal-body-content-1" class="panel-body"></div>
                </div>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-success">
                <h6 class="modal-title">
                    نتیجه فعلی گراف برای شما
                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div id="modal-body-content-2" class="panel-body"></div>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-info">
                <h6 class="modal-title">
                    چرا اینگونه است؟
                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div id="modal-body-content-3" class="panel-body"></div>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-warning">
                <h6 class="modal-title">
                    پاسخ ما
                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div id="modal-body-content-4" class="panel-body"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>
<script>
    $(".progress-bar").loading();


</script>
<!-- Modal 2_1_2 Section -->
<div id="myModal_s2" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-lg ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h6 class="modal-title">
                    با واگویه‌های فعلی شما در حال حاضر:
                </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h6 class="modal-title" id="modal-title-s2-content-1">

                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div class="modal-header">
                    <div id="modal-body-s2-content-1" class="panel-body"></div>
                </div>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-success">
                <h6 class="modal-title" id="modal-title-s2-content-2">

                </h6>
            </div
                    <!-- Modal body -->
            <div class="modal-body text-justify">
                <div id="modal-body-s2-content-2" class="panel-body"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div><!-- Modal 2_1_3 Section -->
<div id="myModal_s2_3" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-lg ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h6 class="modal-title">
                    با واگویه‌های فعلی شما در حال حاضر:
                </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h6 class="modal-title" id="modal-title-s2_3-content-1">

                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div id="modal-body-s2_3-content-1" class="panel-body"></div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>
<!-- Modal 4 Section - Tavanaei Hesi -->
<div id="myModal_s3" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl modal-lg ">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header text-center">
                <h6 class="modal-title">
                    با واگویه‌های فعلی شما در حال حاضر:
                </h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h6 class="modal-title" >
                    توانایی حسی چیست
                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div class="modal-header">
                    <div id="modal-body-s3-content-1" class="panel-body"></div>
                </div>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-success">
                <h6 class="modal-title">
                    تحلیل ابتدایی گراف
                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div id="modal-body-s3-content-2" class="panel-body"></div>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-info">
                <h6 class="modal-title">
نتیجه فعلی گراف برای شما
                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div id="modal-body-s3-content-3" class="panel-body"></div>
            </div>
            <!-- Modal Header -->
            <div class="modal-header bg-warning">
                <h6 class="modal-title">
پیشنهاد ما
                </h6>
            </div>
            <!-- Modal body -->
            <div class="modal-body text-justify">
                <div id="modal-body-s3-content-4" class="panel-body"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
            </div>
        </div>

    </div>
</div>



<?php
$scriptModalStr = "
    $('.openBtn').on('click',function(){
        //alert($(this).data('id'));
        var tmp = $(this).data('id');
        if (tmp == 0 || tmp == 1 || tmp == 2 || tmp == 3  ){
            $('#modal-body-content-1').html(analyze[tmp][0]);
            $('#modal-body-content-2').html(analyze[tmp][1]);
            $('#modal-body-content-3').html(analyze[tmp][2]);
            $('#modal-body-content-4').html(analyze[tmp][3]);
            $('#myModal').modal({show:true});
            //$('.modal-body').load('".RELA_DIR."templates/template_fa/AnalyzePages/content'+$(this).data('id')+'.html',function(){
                //$('#myModal').modal({show:true});
            //});
        } else if (tmp == 4 || tmp == 5 ) {
            $('#modal-title-s2-content-1').html(analyze[tmp][0]);
            $('#modal-body-s2-content-1').html(analyze[tmp][1]);
            $('#modal-title-s2-content-2').html(analyze[tmp][2]);
            $('#modal-body-s2-content-2').html(analyze[tmp][3]);
            $('#myModal_s2').modal({show:true});
        } else if (tmp == 6 || tmp == 8 || tmp == 9) {
            $('#modal-title-s2_3-content-1').html(analyze[tmp][0]);
            $('#modal-body-s2_3-content-1').html(analyze[tmp][1]);
            $('#myModal_s2_3').modal({show:true});
        } else if (tmp == 7) {
            $('#modal-body-s3-content-1').html(analyze[tmp][0]);
            $('#modal-body-s3-content-2').html(analyze[tmp][1]);
            $('#modal-body-s3-content-3').html(analyze[tmp][2]);
            $('#modal-body-s3-content-4').html(analyze[tmp][3]);
            $('#myModal_s3').modal({show:true});
        }
    });
" ;
//echo '<script>'.$arrayAnalyze.$scriptModalStr.'</script>';
?>
