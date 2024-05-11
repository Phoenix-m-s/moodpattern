<?php
$arrayAnalyze = "";
//$arrayAnalyze .= "var objAnalyze = {
//    'row1' : {
//        'key1' : 'input',
//        'key2' : 'input',
//        'key3' : 'input',
//        'key4' : 'input'
//    }
//};";
$arrayAnalyze .= "var analyze = [[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3],[0,1,2,3]]; ";
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
            $data2 .= ',{ name:'."'".$v['title']."',color:'".$bgColor1."',y:". pow($list['list']['score'][2][$v['id']],2).'}';
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
$result = array(1=>array('A'=>array(),'B'=>array(),'C'=>array(),'D'=>array()),2=>array(1=>array(),2=>array(),3=>array())) ;

$percentArray = array();
if($list['list']['topic']['topic_type']==2){
    //////////////// دوست داشتن حسی/////////////////////////////
    /////////////// A ///////////////////
    $percent =round(($A*100)/$percentMaxRange,0);
    $percentArray['A'] = $percent ;
    $result[1]['A'][1] = "میزان این رضایت شما از در این رابطه $A (<span dir='ltr'>%$percent</span>) است.";

    /////////////// B ///////////////////
    $percent =round(($B*100)/$percentMaxRange,0);
    $percentArray['B'] = $percent ;
    $result[1]['B'][1] = "میزان خشم شما از در این رابطه $B (<span dir='ltr'>%$percent</span>) است.";

    /////////////// C ///////////////////
    $percent =round(($C*100)/$percentMaxRange,0);
    $percentArray['C'] = $percent ;
    $result[1]['C'][1] = "میزان غم شما از در این رابطه $C (<span dir='ltr'>%$percent</span>) است.";
    /////////////// D ///////////////////
    $percent =round(($D*100)/$percentMaxRange,0);
    $percentArray['D'] = $percent ;
    $result[1]['D'][1] = "میزان استرس شما از در این رابطه $D (<span dir='ltr'>%$percent</span>) است.";
    ////////////////    نیاز حسی    /////////////////////
    /////////////// A-B ///////////////////
    $x = $A - $B ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A-B'] = $percent ;
    $result[2][1][1] = "میزان این رضایت شما از در این رابطه <span dir='ltr'>$x</span> (<span dir='ltr'>%$percent</span>) است.";
    /////////////// C-D ///////////////////
    $x = $C - $D ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['C-D'] = $percent ;
    $result[2][2][1] = "میزان احساس نیاز شما به ترک این رابطه <span dir='ltr'>$x</span> (<span dir='ltr'>%$percent</span>) است.";
    /////////////// توانایی حسی ///////////////////
    /////////////// (A+D)- B ///////////////////
    /////////////// (A+D)-(B+C) ///////////////////
    $x = ($A + $D)- $B ;
    $percentMaxRange = 810 ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A+D-B'] = $percent ;
    $result[3][1][1] = "اعتماد به نفسی که این رابطه در من ایجاد می‌کند <span dir='ltr'>$x</span> (<span dir='ltr'>%$percent</span>) است.";
//////////////   پشتکار و پایداری   ///////////////////
/////////////// (A+D)-(B+C) ///////////////////
    $x = ($A + $D)- ($B + $C) ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A+D-B+C'] = $percent ;
    $result[3][2][1] = "پایداری این رابطه از طرف من <span dir='ltr'>$x</span> (<span dir='ltr'>%$percent</span>) است.";

    ////////////////  انرژی حسی/////////////////////
    /////////////// A - (B+C+D) ///////////////////
    /////////////// A+B+C+D ///////////////////
    $percentMaxRange = 810 ;
    $x = $A - ($B + $C + $D) ;
    $percentMaxRange = 405 ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A-B+C+D'] = $percent ;
    $result[4][1][1] = "عزت به نفسی که این رابطه در من ایجاد می‌کند <span dir='ltr'>$x</span> (<span dir='ltr'>%$percent</span>) است.";
/////////////// A+B+C+D ///////////////////
    $percentMaxRange = 1620 ;
    $x = $A + $D + $B + $C ;
    $percent = round(($x * 100) / $percentMaxRange, 0);
    $percentArray['A+B+C+D'] = $percent ;
    $result[4][2][1] = "میزان انرژی حسی این رابطه <span dir='ltr'>$x</span> (<span dir='ltr'>%$percent</span>) است.";
    //print_r($percentArray);
}


?>
<style>
    .card-header{
        height: 50px !important;
        margin-right: 0px;
        padding-right: 0px;
    }

    .list-group-item h5 {
        margin-right: 25px;
    }
    .list-group-item h6 {
        margin-right: 5px;
        margin-bottom: 20px;
    }
    .list-group-item p {
        margin-right: 25px;
        margin-left: 5px;
    }
    .card-header h5{
        margin-right: 5px;
        padding-right: 0px;
    }
</style>
<script>
    var categoryLinks = {<?php echo $labels; ?>};
</script>
<main>
    <div id="form_container" style="text-align: center;direction: rtl;">
        <a href="#" class="text-dark text-left pull-left text-white" id="printText" onclick="javascript:window.print()" title="چاپ">
            <i class="fa fa-print fa-2x text-center text-white" style="margin-top: 7px;margin-left: 5px;"></i>
            <span class="text-white print-text" >
            چاپ گزارش
            </span>
        </a>
<!--        <br/>-->
        <h4 class="card-header bg-primary radius_border text-white" >
                            <span class="text-right" dir="rtl">
                               <i class="fa fa-edit"></i> <?php echo $topicType ; ?>
                            </span>
                            <span class="text-right" dir="rtl">
                               <i class="fa fa-edit"></i> <?php echo $list['list']['topic']['title'] ;?>
                            </span>
        </h4>



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

            <div class="row">
                <div class="col-md-12 mt-4 mb-4">
                    <div class="card">
                        <div class="card-header bg-transparent no-border">
                            <h5 class="text-center"><i class="fa fa-edit"></i>  با واگویه های فعلی شما در حال حاضر:</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header text-right bg-primary text-white ">
                            <h5 class="text-white"><i class="fa fa-edit"></i> دوست داشتن حسی</h5>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-primary text-right">
                                <h6>
                                    علاقه
                                </h6>
                                <h5>
چقدر این رابطه را دوست دارم
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[1]['A'][1] ; ?>
                                </p>
                            </li>
                            <li class="list-group-item list-group-item-primary text-right">
                                <h6>
                                    خشم
                                </h6>
                                <h5>
                                    چقدر از این رابطه بدم می‌آید
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[1]['B'][1] ; ?>
                                </p>
                            </li>

                            <li class="list-group-item list-group-item-primary  text-right">
                                <h6>
                                    غم
                                </h6>
                                <h5>
                                    چقدر ترک این رابطه را دوست دارم
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[1]['C'][1] ; ?>
                                </p>
                            </li>
                            <li class="list-group-item list-group-item-primary text-right">
                                <h6>
                                    استرس
                                </h6>
                                <h5>
                                    چقدر از ترک این رابطه بدم می‌آید
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[1]['D'][1] ; ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!--         Section2           -->
                    <div class="card">
                        <div class="card-header text-right bg-warning text-white ">
                            <h5 class="text-white"><i class="fa fa-edit"></i> نیاز حسی</h5>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-warning text-right">
                                <h6>
رضایت
                                </h6>
                                <h5>
                                    احساس نیاز به رابطه
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[2][1][1] ; ?>
                                </p>
                            </li>

                            <li class="list-group-item list-group-item-warning  text-right">
                                <h6>
نارضایتی
                                </h6>
                                <h5>
                                    احساس نیاز به ترک رابطه
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[2][2][1] ; ?>
                                </p>
                            </li>

                        </ul>
                    </div>
                    <!--         End Section2           -->
                    <!--         Section3           -->
                    <div class="card">
                        <div class="card-header text-right bg-info text-white ">
                            <h5 class="text-white"><i class="fa fa-edit"></i>
                                توانایی حسی
                            </h5>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-info text-right">
                                <h6>
                                    اعتماد به نفس
                                </h6>
                                <h5>
                                    توانایی ادامه دادن به رابطه (منفی: نمی‌توانم ادامه بدهم)
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[3][1][1] ; ?>
                                </p>
                            </li>
                            <li class="list-group-item list-group-item-info  text-right">
                                <h6>
پایداری
                                </h6>
                                <h5>
                                    نمی‌توان رابطه را ترک کنم(منفی: می‌توانم رابطه را ترک کنم)
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[3][2][1] ; ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!--         End Section2           -->

                    <!--         Section3           -->
                    <div class="card">
                        <div class="card-header text-right bg-success text-white ">
                            <h5 class="text-white"><i class="fa fa-edit"></i>
سود حسی
                            </h5>
                        </div>
                        <ul class="list-group">
                            <li class="list-group-item list-group-item-success text-right">
                                <h6>
عزت نفس
                                </h6>
                                <h5>
                                    میزان فایده(منفی:ضرر) این رابطه برای شما
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[4][1][1] ; ?>
                                </p>
                            </li>
                            <li class="list-group-item list-group-item-success  text-right">
                                <h6>
                                    انرژی حسی
                                </h6>
                                <h5>
میزان انرژی رابطه
                                </h5>
                                <p class="text-justify">
                                    <?php echo $result[4][2][1] ; ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <!--         End Section3           -->
                </div>
                <!--                --><?php //if($list['list']['topic']['topic_type']==1 || $list['list']['topic']['topic_type']==3 || $list['list']['topic']['topic_type']==4 || $list['list']['topic']['topic_type']==5 || $list['list']['topic']['topic_type']==6){ ?>
                <!--                    <div class="col-md-12 mt-4">-->
                <!--                        <div class="card">-->
                <!--                            <div class="card-header text-right bg-info text-white ">-->
                <!--                                <h5 class="text-white"> <i class="fa fa-edit"></i> نیاز حسی</h5>-->
                <!--                            </div>-->
                <!--                            --><?php
                //                            foreach($result[2] as $k=>$v) {
                //                                echo '
                //                                               <div class="card-body text-right text-justify border-bottom border-light">
                //                                                    ' . $v . '
                //                                                </div>';
                //                            }
                //                            ?>
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                    -->
                <!--                --><?php //}
                //                ?>
            </div>

        </div>
    <!-- /Form_container -->
</main>
<!--<script language="JavaScript">-->
<!--    window.print();-->
<!--</script>-->