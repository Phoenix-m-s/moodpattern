
<?php
$label1 = 'رضایت' ;
$label2 = 'خشم' ;
$label3 = 'غم' ;
$label4 = 'استرس' ;
$bgColor2 = 'rgba(255, 0, 0,0.4)' ;
$bgColor1 = 'rgba(14, 255, 0,0.4)' ;
if($list['list']['topic']['topic_type']==1){
    $topicType = 'فعالیت روزانه و رفتار در رابطه با ' ;
    $approach1 = 'انجام دادن' ;
    $approach2 = 'انجان ندادن' ;
}elseif($list['list']['topic']['topic_type']==3){
    $topicType = 'نتیجه نهایی(هدف) در رابطه با ' ;
    $approach1 = 'انجام دادن' ;
    $approach2 = 'انجان ندادن' ;
}elseif($list['list']['topic']['topic_type']==2){
    $topicType = 'رابطه کلی من با ' ;
    $approach1 = 'حس من درباره او' ;
    $approach2 = 'فکر من درباره حس او به من' ;
    $label1 = 'محبت' ;
    $label2 = 'خشم' ;
    $label3 = 'محبت' ;
    $label4 = 'استرس' ;
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
            $data2 .= ',{ name:'."'".$v['title']."',color:'".($list['list']['topic']['topic_type']!=2?$bgColor2:$bgColor1)."',y:". pow($list['list']['score'][2][$v['id']],2).'}';
            $C += pow($list['list']['score'][2][$v['id']],2) ;
        }
    }
    if($v['sensor_type']==2){
        if (isset($list['list']['score'][1][$v['id']])) {
            $data1 .= ',{ name:'."'".$v['title']."',color:'$bgColor2',y:". pow($list['list']['score'][1][$v['id']],2).'}';
            $B += pow($list['list']['score'][1][$v['id']],2);
        }
        if(isset($list['list']['score'][2][$v['id']])) {
            $data2 .= ',{ name:'."'".$v['title']."',color:'".($list['list']['topic']['topic_type']!=2?$bgColor1:$bgColor2)."',y:". pow($list['list']['score'][2][$v['id']],2).'}';
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
if($list['list']['topic']['topic_type']==1 || $list['list']['topic']['topic_type']==3 || $list['list']['topic']['topic_type']==4 || $list['list']['topic']['topic_type']==5 || $list['list']['topic']['topic_type']==6){
    //////////////// دوست داشتن حسی/////////////////////////////
    /////////////// A ///////////////////
    if($A >=  $range_one_hundred[1]['min'] && $A < $range_one_hundred[1]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "علاقه شما به انجام این کار $A واحد از $percentMaxRange است که این «بسیار اندک» می باشد و این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید و با وجود اینکه شما را چندان سر شوق نمی آورد ولی هنوز به انجام کار علاقه مند هستید." ;
    }
    elseif($A >=  $range_one_hundred[2]['min'] && $A < $range_one_hundred[2]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "علاقه شما به انجام این کار $A واحد از $percentMaxRange است که این «به میزان متوسط» می باشد و این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید ولی این میزان دوست داشتن شما را به اندازه کافی سر شوق نمی آورد." ;
    }
    elseif($A >=  $range_one_hundred[3]['min'] && $A < $range_one_hundred[3]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "علاقه شما به انجام این کار $A واحد از $percentMaxRange است که این «به میزان قابل قبولی» می باشد و این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید." ;
    }
    elseif($A >=  $range_one_hundred[4]['min'] && $A < $range_one_hundred[4]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "علاقه شما به انجام این کار $A از $percentMaxRange واحد است که این «به میزان خیلی زیادی» می باشد و این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید." ;
    }
    elseif($A >=  $range_one_hundred[5]['min'] && $A < $range_one_hundred[5]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "علاقه شما به انجام این کار $A از $percentMaxRange واحد است که این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید که «بیش از حد نرمال» است." ;
    }
    elseif($A >=  $range_one_hundred[6]['min'] && $A < $range_one_hundred[6]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "علاقه شما به انجام این کار $A از $percentMaxRange واحد است که این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// B ///////////////////
    if($B >=  $range_one_hundred[1]['min'] && $B < $range_one_hundred[1]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم شما به انجام این کار $B واحد از $percentMaxRange است که «چندان مهم» نمی باشد و این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که این مقدار «چندان آزار دهنده» نمی باشد." ;
    }
    elseif($B >=  $range_one_hundred[2]['min'] && $B < $range_one_hundred[2]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم شما به انجام این کار $B واحد از $percentMaxRange است که «کمی از حد نرمال بیشتر» می باشد و این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که با وجود اینکه «چندان زیاد» نیست ولی باید مورد توجه قرار گیرد." ;
    }
    elseif($B >=  $range_one_hundred[3]['min'] && $B < $range_one_hundred[3]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم شما به انجام این کار $B واحد از $percentMaxRange است که «می تواند به شما تقریبا آسیب برساند» و این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که این مقدار «نسبتا زیاد» می باشد و اگر می خواهید با انجام این کار ادامه دهید برای مکالمات ذهنی خود چاره ای بیاندیشید." ;
    }
    elseif($B >=  $range_one_hundred[4]['min'] && $B < $range_one_hundred[4]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم شما به انجام این کار $B واحد از $percentMaxRange است که «می تواند به شما آسیب جدی برساند» و این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که این مقدار «زیاد» می باشد و اگر می خواهید با انجام این کار ادامه دهید برای مکالمات ذهنی خود چاره ای بیاندیشید." ;
    }
    elseif($B >=  $range_one_hundred[5]['min'] && $B < $range_one_hundred[5]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم شما به انجام این کار $B واحد از $percentMaxRange است که این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که «بیش از حد نرمال» می باشد." ;
    }
    elseif($B >=  $range_one_hundred[6]['min'] && $B < $range_one_hundred[6]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم شما به انجام این کار $B واحد از $percentMaxRange است که این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// C ///////////////////
    if($C >=  $range_one_hundred[1]['min'] && $C < $range_one_hundred[1]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $C واحد غم از $percentMaxRange واحد ایجاد می کند که «قابل توجه» نیست و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «قابل قبولی» می باشد و مانع از انجام کار نمی شود." ;
    }
    elseif($C >=  $range_one_hundred[2]['min'] && $C < $range_one_hundred[2]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $C واحد غم از $percentMaxRange واحد ایجاد می کند که «کمی زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «نسبتا زیادی» می باشد و می تواند تا حدی مانع برای انجام کار شود." ;
    }
    elseif($C >=  $range_one_hundred[3]['min'] && $C < $range_one_hundred[3]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $C واحد غم از $percentMaxRange واحد ایجاد می کند که «نسبتا زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «زیادی» می باشد و می تواند مانعی برای انجام کار شود." ;
    }
    elseif($C >=  $range_one_hundred[4]['min'] && $C < $range_one_hundred[4]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $C واحد غم از $percentMaxRange واحد ایجاد می کند که «زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «خیلی زیادی» می باشد و می تواند مانع جدی برای انجام کار شود." ;
    }
    elseif($C >=  $range_one_hundred[5]['min'] && $C < $range_one_hundred[5]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $C واحد غم از $percentMaxRange واحد ایجاد می کند که «بسیار زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «بیش از حد زیادی» می باشد و می تواند مانعی اساسی برای انجام کار شود." ;
    }
    elseif($C >=  $range_one_hundred[6]['min'] && $C < $range_one_hundred[6]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $C واحد غم از $percentMaxRange واحد ایجاد می کند که این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// D ///////////////////
    if($D >=  $range_one_hundred[1]['min'] && $D < $range_one_hundred[1]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $D واحد استرس از $percentMaxRange واحد ایجاد می کند که «نرمال» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «چندان ناراحت کننده» نمی باشد." ;
    }
    elseif($D >=  $range_one_hundred[2]['min'] && $D < $range_one_hundred[2]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $D واحد استرس از $percentMaxRange واحد ایجاد می کند که «اندکی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «اندکی نگران کننده» می باشد." ;
    }
    elseif($D >=  $range_one_hundred[3]['min'] && $D < $range_one_hundred[3]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $D واحد استرس از $percentMaxRange واحد ایجاد می کند که «از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «باید مورد توجه» قرار بگیرد." ;
        $result[3][$r++] = "توان واقعی شما برای انجام این کار «بیش تر» از توانی است که در حال حاضر از خود نشان می دهید." ;
    }
    elseif($D >=  $range_one_hundred[4]['min'] && $D < $range_one_hundred[4]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $D واحد استرس از $percentMaxRange واحد ایجاد می کند که «به میزان قابل توجهی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «نگران کننده» می باشد." ;
        $result[3][$r++] = "توان واقعی شما برای انجام این کار «به اندازه قابل توجه بیش تر» از توانی است که در حال حاضر از خود نشان می دهید." ;
    }
    elseif($D >=  $range_one_hundred[5]['min'] && $D < $range_one_hundred[5]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $D واحد استرس از $percentMaxRange واحد ایجاد می کند که «خیلی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «باید به طور جدی مورد توجه» قرار بگیرد." ;
        $result[3][$r++] = "توان واقعی شما برای انجام این کار «خیلی بیشتر» از توانی است که در حال حاضر از خود نشان می دهید." ;
    }
    elseif($D >=  $range_one_hundred[6]['min'] && $D < $range_one_hundred[6]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "انجام این کار در شما $D واحد استرس از $percentMaxRange واحد ایجاد می کند که « به شکل غیر طبیعی زیاد» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که نیاز به درمان دارد." ;
        $result[3][$r++] = "توان واقعی شما برای انجام این کار «خیلی بیشتر» از توانی است که در حال حاضر از خود نشان می دهید." ;
    }
    ////////////////    نیاز حسی    /////////////////////
    /////////////// A-B ///////////////////
    $x = $A - $B ;
    if($x < 0 ) {
        $percent =round(((-1*$x)*100)/$percentMaxRange,0);
        $result[2][$r++] = "از نظر حسی عدم تمایل شما به انجام این کار$percent  درصد است و این نشان می دهد شما از نظر حسی به انجام دادن این کار نیازی ندارید و این یعنی اینکه‌ انجام دادن این کار کمکی به ارضای‌حسی شما نمی کند و انجام اینکار در راستای تامین نیازهای حسی شما نیست. البته ممکن است شما به دلایل دیگری به انجام اینکار نیاز داشته باشید." ;
    }else {
        if ($x >= $range_one_hundred[1]['min'] && $x < $range_one_hundred[1]['max']) {
            $percent = round(($x * 100) / $percentMaxRange, 0);
            $result[2][$r++] = "نیاز حسی شما به انجام این کار به میزان $percent درصد است که این یعنی شما «نیاز محسوسی» به انجام این کار ندارید.";
        }
        elseif ($x >= $range_one_hundred[2]['min'] && $x < $range_one_hundred[2]['max']) {
            $percent = round(($x * 100) / $percentMaxRange, 0);
            $result[2][$r++] = "نیاز حسی شما به انجام این کار به میزان $percent درصد است که این یعنی شما «نیاز اندکی» به انجام این کار دارید.";
        }
        elseif ($x >= $range_one_hundred[3]['min'] && $x < $range_one_hundred[3]['max']) {
            $percent = round(($x * 100) / $percentMaxRange, 0);
            $result[2][$r++] = "نیاز حسی شما به انجام این کار به میزان $percent درصد است که این یعنی شما «نیاز محسوسی» به انجام این کار دارید.";
        }
        elseif ($x >= $range_one_hundred[4]['min'] && $x < $range_one_hundred[4]['max']) {
            $percent = round(($x * 100) / $percentMaxRange, 0);
            $result[2][$r++] = "نیاز حسی شما به انجام این کار به میزان $percent درصد است که این یعنی شما «نیاز زیادی» به انجام این کار دارید.";
        }
        elseif ($x >= $range_one_hundred[5]['min'] && $x < $range_one_hundred[5]['max']) {
            $percent = round(($x * 100) / $percentMaxRange, 0);
            $result[2][$r++] = "نیاز حسی شما به انجام این کار به میزان $percent درصد است که این یعنی شما «نیاز خیلی زیادی» به انجام این کار دارید.";
        }
        elseif ($x >= $range_one_hundred[6]['min'] && $x < $range_one_hundred[6]['max']) {
            $percent = round(($x * 100) / $percentMaxRange, 0);
            $result[2][$r++] = "نیاز حسی شما به انجام این کار به میزان $percent درصد است که این یعنی «نیاز غیر طبیعی زیاد» به انجام این کار دارید.";
        }
    }
    /////////////// C-D ///////////////////
    $x = $C - $D ;
    if($x < -200 ) {
        $percent =round(((-1*$x)*100)/$percentMaxRange,0);
        $result[2][$r++] = "شما از نظر حسی به انجام ندادن این کار نیازی نداریدو این یعنی اینکه‌ ترک این کار کمکی به ارضای‌حسی شما نمی کند و در راستای تامین نیازهای حسی شما نیست. البته ممکن است شما به دلایل دیگری به ترک این کار نیاز داشته باشید.
        توجه داشته باش  من اکنون از نیاز  ارضای حسی تو حرف می زنم.
        " ;
    }else {
        if ($x > -200 && $x <= 100) {
            if($x<0){
                $percent = round(((-1*$x) * 100) / $percentMaxRange, 0);
            }else{
                $percent = round(($x * 100) / $percentMaxRange, 0);
            }
            $result[2][$r++] = "نیاز حسی شما به انجام ندادن این کار «در حد قابل تحملی» است و مشکلی برای انجام کار ایجاد نمی کند.";
        }
        elseif ($x > 100 && $x <= 405) {
            $percent = round(($x * 100) / $percentMaxRange, 0);
            $result[2][$r++] = "نیاز حسی شما به انجام ندادن این کار $percent درصد است که «نسبتا زیاد» است و می تواند برای انجام کار مسئله ساز شود.";
        }
        elseif ($x >405 && $x <= 605) {
            $percent = round(($x * 100) / $percentMaxRange, 0);
            $result[2][$r++] = "نیاز حسی شما به انجام ندادن این کار $percent درصد است که «خیلی زیاد» است و می تواند برای انجام کار بحران ساز شود.";
        }
    }
    if (($A-$B) < 0 && ($C-B)<-200) {
        $percent = round(($x * 100) / $percentMaxRange, 0);
        $result[2][$r++] = "گراف حسی شما می گوید نه انجام دادن این کار به بهبود حسی شما کمکی می کند و نه ترک کردن آن و این یعنی هیچ یک از آنها در راستای نیازهای درونی شما نیست.
        دوست من این وضعت سختی است. معنی آن این است که در این حالت هیچ انتخابی در دنیای بیرون مشکل را حل نخواهد کرد.
        شما ابتدا نیاز داری قبل از هر اقدام عملی گراف خودت را تغییر بدهی. کاری که با تغییر واگویه ها و مکالمات ذهنی امکان پذیر است.
        اگه می خوای که این کار رو ادامه بدی لازمه حرف های مثبت نسبت به انجام دادن رو تقویت کنی و ناحیه های دیگه رو آروم کنی.
        و اگه می خوای این کار رو ترک کنی لازمه که حرف های منفی نسبت به انجام دادن رو تقویت کنی و بقیه ناحیه ها رو آروم کنی.
        البته بهتره که به تحلیل من درباره توانایی حسیت هم گوش کنی قبل از تصمیم گیری.
        ";
    }
    ////////////////   توانایی حسی /////////////////////
    /////////////// (A-D)-B ///////////////////
    $x = ($A - $D)-$B ;
    $percentMaxRange2 = 810 ;
    if ($x >= -605 && $x <= -405) {
        $x_neg = "<span style='direction: ltr' >$x</span>" ;
        $percent = round(((-1*$x) * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x_neg واحد از $percentMaxRange2 است که این یعنی برای انجام این کار از نظر حسی خیلی ناتوان هستی.";
    }
    elseif ($x >= -405 && $x < 0) {
        $x_neg = "<span style='direction: ltr' >$x</span>" ;
        $percent = round(((-1*$x) * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x_neg واحد از $percentMaxRange2 است که این یعنی اعتماد به نفس انجام این کار را نداری و در صورتی که این کار را انجام می دهی در حقیقت در حال انجام دادنش نیستی.";
    }elseif ($x >= 0 && $x <= 101) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی حسی شما برای انجام این کار $percent درصد ظرفیت شما است که «بسیار اندک» می باشد.";
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار دارای اعتماد به نفس «اندکی» هستید.";
    }elseif ($x > 101 && $x <= 203) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی حسی شما برای انجام این کار $percent درصد ظرفیت شما است که این یعنی شما «نسبتا» توانایی حسی انجام این کار را دارید.";
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار «نسبتا» دارای اعتماد به نفس هستید.";
    }elseif ($x > 203 && $x <= 304) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی حسی شما برای انجام این کار $percent درصد ظرفیت شما است که این یعنی شما توانایی حسی انجام این کار را دارید.";
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار اعتماد به نفس «نسبتا خوبی» دارید.";
    }elseif ($x > 304 && $x < 405) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی حسی شما برای انجام این کار $percent درصد ظرفیت شما است که این یعنی شما توانایی حسی «خوبی» برای انجام این کار را دارید.";
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار اعتماد به نفس «خوبی» دارید.";
    }elseif ($x > 405 && $x <= 505) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی حسی شما برای انجام این کار $percent درصد ظرفیت شما است که این یعنی شما توانایی حسی «عالی ای» برای انجام این کار را دارید.";
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار اعتماد به نفس «عالی» دارید.";
    }elseif ($x > 505 && $x <= 850) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی حسی شما برای انجام این کار $percent درصد ظرفیت شما است که این یعنی توانایی حسی «فوق العاده ای» برای انجام این کار دارید که بخشی از این توانایی حسی ناشی از استرس و التهاب است و این نشان می دهد این میزان ار توانایی حسی، همراه با حداکثر کارایی و بازدهی برای شما نیست.";
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x واحد از $percentMaxRange2 است که این یعنی بخشی از اعتماد به نفس شما کاذب است.";
    }elseif ($x > 850 && $x <= 1210) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی حسی شما برای انجام این کار $percent درصد ظرفیت شما است که این یعنی توانایی حسی شما برای انجام این کار «به شکل غیر طبیعی زیاد» است و با وجود این سطح از توانایی به خاطر التهاب و استرس زیاد، کارایی و بازدهی شما به شدت کاهش پیدا کرده است.";
        $result[3][$r++] = "اعتماد به نفس شما و قدرت اجرای این کار در شما $x واحد از $percentMaxRange2 است که این یعنی مقدار قابل توجهی از اعتماد به نفس شما واقعی نیست و باید مراقب این سطح از اعتماد به نفسی که حس می کنید باشد.";
    }
    /////////////// (A-D)-(B+C) ///////////////////
    $x = ($A-$D)-($B+$C) ;
    $percentMaxRange2 = 810 ;
    if ($x >= -1210 && $x <= -850) {
        $percent = round(((-1*$x) * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی شما برای انجام ندادن این کار $percent درصد است که به شکل نگران کننده ای ملتهب است و این یعنی شما در حال حاضر هم واقعا در حال انجام کار نیستید و اگر در حال انجام کار هم هستید یک اتفاق ظاهری و موقت است.";
    }
    elseif ($x >= -850 && $x < 0) {
        $percent = round(((-1*$x) * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "توانایی شما برای انجام ندادن این کار $percent درصد است که این یعنی شما کاملا قادر به انجام ندادن این کار هستید.";
    }elseif ($x >= 0 && $x <= 150) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "ناتوانایی شما برای انجام ندادن این کار $percent درصد است که «بسیار اندک» است و هیچ جای نگرانی ندارد و این یعنی اگر بخواهید کار را انجام ندهید با بحران مواجه نمی شوید.";
    }elseif ($x > 150 && $x <= 304) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "ناتوانایی شما برای انجام ندادن این کار $percent درصد است که «اندک» است و جای نگرانی ندارد و این یعنی اگر بخواهید کار را انجام ندهید با بحران مواجه نمی شوید.";
    }elseif ($x > 304 && $x <= 505) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "ناتوانایی شما برای انجام ندادن این کار $percent درصد است که «در حد نرمال» است و این یعنی اگر بخواهید کار را انجام ندهید با بحران مواجه نمی شوید.";
    }elseif ($x > 505 && $x <= 850) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "ناتوانایی شما برای انجام ندادن این کار $percent درصد است و این یعنی نمی توانید این کار را انجام ندهید و ترک این کار با شرایط ذهنی و واگویه هایی که اکنون دارید ممکن است موقت باشد و منجر به بازگشت به انجام کار شود؛ در نتیجه برای ترک این کار می بایست در واگویه های خود تجدید نظر کنید.";
    }elseif ($x > 850 && $x <= 1210) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[3][$r++] = "ناتوانایی شما برای انجام ندادن این کار $percent درصد است که به شکا عجیبی زیاد می باشد و این یعنی ناتوانی شدیدی برای ترک این کار در خود حس می کنید که بیانگر یک وابستگی ملتهب به انجام کار است و توصیه می شود با تجدید نظر در مکالمات ذهنی خود به دنبال ایجاد تعادل باشید.";
    }
    ////////////////   سود حسی /////////////////////
    /////////////// A - (B+C+D) ///////////////////
    $x = $A - ($B+$C+$D) ;
    $percentMaxRange2 = 405 ;
    if ($x >= -1815 && $x <= -1210) {
        $x_neg = "<span style='direction: ltr' >$x</span>" ;
        $result[4][$r++] = "انجام این کار از نظر حسی برای شما به «طرز وحشتناکی زیان ده» است و آسیب زیادی به وضعیت روحی روانی شما وارد می کند و این یعنی یا به فکر ترک کار باشید و یا می بایست مکالمات ذهنی خود را تغییر دهید.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار عزت نفس «فوق العاده پایینی» دارید.";
    }
    elseif ($x >= -1210 && $x <= -605) {
        $x_neg = "<span style='direction: ltr' >$x</span>" ;
        $result[4][$r++] = "انجام این کار از نظر حسی برای شما «به شدت زیان بار» است و این یعنی بار حسی انجام کار برای شما زیاد است یا به فکر ترک کار باشید و یا می بایست مکالمات ذهنی خود را تغییر دهید.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار عزت نفس «بسیار پایینی» دارید.";
    }elseif ($x > -605 && $x <= -200) {
        $x_neg = "<span style='direction: ltr' >$x</span>" ;
        $result[4][$r++] = "انجام این کار از نظر حسی برای شما «زیان ده» محسوب می شود و نیاز به تغییر در وضعیت فیزیکی و یا ذهنی خود در رابطه با انجام این کار دارید.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار عزت نفس «پایینی» دارید.";
    }elseif ($x > -200 && $x <= 0) {
        $x_neg = "<span style='direction: ltr' >$x</span>" ;
        $result[4][$r++] = "انجام این کار از نظر حسی برای شما «زیان بار» است و هیچ سودی از آن عاید شما نمی شود بهتر است به فکر بهبود در شرایط فیزیکی و یا ذهنی خود در رابطه با انجام این کار باشید.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار عزت نفس «اندکی» دارید.";
    }elseif ($x > 0  && $x <= 101) {
        $result[4][$r++] = "انجام این کار برای شما سود حسی «اندکی» دارد.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار «نسبتا» دارای عزت نفس هستید.";
    }elseif ($x > 101 && $x <= 203) {
        $result[4][$r++] = "انجام این کار برای شما سود حسی «نسبتا خوبی» دارد.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار عزت نفس «نسبتا خوبی» دارید.";
    }elseif ($x > 203 && $x <= 304) {
        $result[4][$r++] = "انجام این کار برای شما سود حسی «بسیار خوبی» دارد.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار عزت نفس «خوبی» دارید.";
    }elseif ($x > 304 && $x <= 405) {
        $result[4][$r++] = "انجام این کار برای شما سود حسی «عالی»ای دارد.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی برای انجام این کار عزت نفس «عالی»ای دارید.";
    }elseif ($x > 405 && $x <= 505) {
        $result[4][$r++] = "انجام این کار برای شما سود حسی «بیش از حدی» دارد که تا حدی بیانگر التهاب مثبت است.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی بخشی از عزت نفس شما کاذب است.";
    }elseif ($x > 505 && $x <= 605) {
        $result[4][$r++] = "انجام این کار برای شما سود حسی «غیر طبیعی» دارد که اگر چه فوق العاده است اما التهاب مثبت نسبتا زیادی را نشان می دهد و توصیه می شود برای جلوگیری از وابستگی به مرزهای تعادل بازگردید.";
        $result[4][$r++] = "عزت نفس شما در رابطه با انجام این کار $x واحد از $percentMaxRange2 است که این یعنی بخشی از عزت نفس شما کاذب است.";
    }
    ////////////////  انرژی حسی/////////////////////
    /////////////// A+B+C+D ///////////////////
    $x = $A+$B+$C+$D ;
    $percentMaxRange2 = 1620 ;
    if ($x >= 200  && $x <=700 ) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[5][$r++] = "میزان انرژی ذهنی شما برای انجام این کار $percent درصد است و این یعنی انجام این کار برای شما انرژی نرمالی به همراه دارد.";
    }elseif ($x < 200 ) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[5][$r++] = "میزان انرژی ذهنی شما برای انجام این کار $percent درصد است که این یعنی انجام این کار برای شما انرژی ای به همراه ندارد.";
    }elseif ($x > 700 ) {
        $percent = round(($x * 100) / $percentMaxRange2, 0);
        $result[5][$r++] = "میزان انرژی ذهنی شما برای انجام این کار $percent درصد است و این یعنی از انجام این کار به شکل ملتهبانه ای انرژی به دست میارید که به شکل غیر سازنده ای براتون عمل می کند.";
    }
}elseif($list['list']['topic']['topic_type']==2){
    /////////////// A ///////////////////
    if($A >=  $range_one_hundred[1]['min'] && $A < $range_one_hundred[1]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت درونی شما $A واحد از $percentMaxRange است که این «بسیار اندک» می باشد و این یعنی شما به میزان $percent درصد دوست اش داری و با وجود اینکه این میزان محبت درونی چندان شما را سر شوق نمی آورد ولی نشان می دهد این رابطه هنوز زنده است." ;
    }
    elseif($A >=  $range_one_hundred[2]['min'] && $A < $range_one_hundred[2]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت درونی شما $A واحد از $percentMaxRange است که این «به میزان متوسط» می باشد و این یعنی شما به میزان $percent درصد دوست اش داری که نشان می دهد این رابطه هنوز امیدوار کننده است." ;
    }
    elseif($A >=  $range_one_hundred[3]['min'] && $A < $range_one_hundred[3]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت درونی شما $A واحد از $percentMaxRange است و این یعنی شما به میزان $percent درصد دوست اش داری که این «تا حد خوبی» می باشد." ;
    }
    elseif($A >=  $range_one_hundred[4]['min'] && $A < $range_one_hundred[4]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت درونی شما $A واحد از $percentMaxRange است و این یعنی شما به میزان $percent درصد دوست اش داری که این «عالی» می باشد." ;
    }
    elseif($A >=  $range_one_hundred[5]['min'] && $A < $range_one_hundred[5]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت درونی شما $A واحد از $percentMaxRange است که این یعنی شما به میزان $percent درصد دوست اش داری که «بیش از حد نرمال» است." ;
    }
    elseif($A >=  $range_one_hundred[6]['min'] && $A < $range_one_hundred[6]['max']) {
        $percent =round(($A*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت درونی شما $A واحد از $percentMaxRange است که این یعنی شما به میزان $percent درصد دوست اش داری که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// B ///////////////////
    if($B >=  $range_one_hundred[1]['min'] && $B < $range_one_hundred[1]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم درونی شما $B واحد از $percentMaxRange است که «چندان مهم» نمی باشد و این یعنی شما به میزان $percent درصد ازش بدتون میاد که این مقدار «چندان آزار دهنده» نمی باشد." ;
    }
    elseif($B >=  $range_one_hundred[2]['min'] && $B < $range_one_hundred[2]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم درونی شما $B واحد از $percentMaxRange است که «کمی از حد نرمال بیشتر» می باشد و این یعنی شما به میزان $percent درصد ازش بدتون میاد که با وجود اینکه «چندان زیاد» نیست ولی باید مورد توجه قرار گیرد." ;
    }
    elseif($B >=  $range_one_hundred[3]['min'] && $B < $range_one_hundred[3]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم درونی شما $B واحد از $percentMaxRange است که «می تواند به شما تقریبا آسیب برساند» و این یعنی شما به میزان $percent درصد ازش بدتون میاد که این مقدار «نسبتا زیاد» می باشد و اگر می خواهید به این رابطه ادامه دهید برای مکالمات ذهنی خود چاره ای بیاندیشید." ;
    }
    elseif($B >=  $range_one_hundred[4]['min'] && $B < $range_one_hundred[4]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم درونی شما $B واحد از $percentMaxRange است که «می تواند به شما آسیب جدی برساند» و این یعنی شما به میزان $percent درصد ازش بدتون میاد که که این مقدار «زیاد» می باشد و اگر می خواهید به این رابطه ادامه دهید برای مکالمات ذهنی خود چاره ای بیاندیشید." ;
    }
    elseif($B >=  $range_one_hundred[5]['min'] && $B < $range_one_hundred[5]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم درونی شما $B واحد از $percentMaxRange است که این یعنی شما به میزان $percent درصد ازش بدتون میاد که «بیش از حد نرمال» می باشد." ;
    }
    elseif($B >=  $range_one_hundred[6]['min'] && $B < $range_one_hundred[6]['max']) {
        $percent =round(($B*100)/$percentMaxRange,0);
        $result[1][$r++] = "خشم درونی شما $B واحد از $percentMaxRange است که این یعنی شما به میزان $percent درصد ازش بدتون میاد که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// C ///////////////////
    if($C >=  $range_one_hundred[1]['min'] && $C < $range_one_hundred[1]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت او به شما $C واحد از $percentMaxRange است که این «بسیار اندک» می باشد و این یعنی او به میزان $percent درصد دوستت داره و با وجود اینکه میزان کمی است ولی نشان می دهد این رابطه هنوز زنده است." ;
    }
    elseif($C >=  $range_one_hundred[2]['min'] && $C < $range_one_hundred[2]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت او به شما $C واحد از $percentMaxRange است که این «به میزان متوسط» می باشد و این یعنی او به میزان $percent درصد دوستت داره که این نشان می دهد این رابطه هنوز امیدوار کننده است." ;
    }
    elseif($C >=  $range_one_hundred[3]['min'] && $C < $range_one_hundred[3]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت او به شما $C واحد از $percentMaxRange است و این یعنی او به میزان $percent درصد دوستت داره که این «تا حد خوبی» می باشد." ;
    }
    elseif($C >=  $range_one_hundred[4]['min'] && $C < $range_one_hundred[4]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت او به شما $C واحد از $percentMaxRange است و این یعنی او به میزان $percent درصد دوستت داره که این «عالی» می باشد." ;
    }
    elseif($C >=  $range_one_hundred[5]['min'] && $C < $range_one_hundred[5]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت او به شما $C واحد از $percentMaxRange است که این یعنی او به میزان $percent درصد دوستت داره که «بیش از حد نرمال» است." ;
    }
    elseif($C >=  $range_one_hundred[6]['min'] && $C < $range_one_hundred[6]['max']) {
        $percent =round(($C*100)/$percentMaxRange,0);
        $result[1][$r++] = "محبت او به شما $C واحد از $percentMaxRange است که این یعنی او به میزان $percent درصد دوستت داره که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// D ///////////////////
    if($D >=  $range_one_hundred[1]['min'] && $D < $range_one_hundred[1]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "استرس این رابطه در شما $D واحد از $percentMaxRange است که «نرمال» است و این یعنی شما فکر می کنی او به میزان $percent درصد از شما بدش میاد که «چندان ناراحت کننده» نمی باشد." ;
    }
    elseif($D >=  $range_one_hundred[2]['min'] && $D < $range_one_hundred[2]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "استرس این رابطه در شما $D واحد از $percentMaxRange است که «اندکی از حد نرمال بیشتر» است و این یعنی شما فکر می کنی او به میزان $percent درصد از شما بدش میاد که «اندکی نگران کننده» می باشد." ;
    }
    elseif($D >=  $range_one_hundred[3]['min'] && $D < $range_one_hundred[3]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "استرس این رابطه در شما $D واحد از $percentMaxRange است که «از حد نرمال بیشتر» است و این یعنی شما فکر می کنی او به میزان $percent درصد از شما بدش میاد که «باید مورد توجه» قرار بگیرد." ;
    }
    elseif($D >=  $range_one_hundred[4]['min'] && $D < $range_one_hundred[4]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "استرس این رابطه در شما $D واحد از $percentMaxRange است که «به میزان قابل توجهی از حد نرمال بیشتر» است و این یعنی شما فکر می کنی او به میزان $percent درصد از شما بدش میاد که «نگران کننده» می باشد." ;
    }
    elseif($D >=  $range_one_hundred[5]['min'] && $D < $range_one_hundred[5]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "استرس این رابطه در شما $D واحد از $percentMaxRange است که «خیلی از حد نرمال بیشتر» است و این یعنی شما فکر می کنی او به میزان $percent درصد از شما بدش میاد که «باید به طور جدی مورد توجه» قرار بگیرد." ;
    }
    elseif($D >=  $range_one_hundred[6]['min'] && $D < $range_one_hundred[6]['max']) {
        $percent =round(($D*100)/$percentMaxRange,0);
        $result[1][$r++] = "استرس این رابطه در شما $D واحد از $percentMaxRange است که « به شکل غیر طبیعی زیاد» است و این یعنی شما فکر می کنی او به میزان $percent درصد از شما بدش میاد که نیاز به درمان دارد." ;
    }

}
?>
<style>
    .card-header{
        height: 50px !important;

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
        <a href="#" class="text-dark text-left pull-left" id="printText" onclick="javascript:window.print()" title="چاپ">
            <i class="fa fa-print fa-2x text-center"></i>
        </a>
        <br/>
        <h4 class="card-header bg-primary text-white" >
                            <span class="text-center " dir="rtl">
                               <i class="fa fa-edit"></i> <?php echo $topicType.$list['list']['topic']['title']?>
                            </span>
        </h4>



        <div id="wizard_container">

            <div class="row">

                <div class="col-md-6">

                    <h4 class="header-caption text-center mt-5" ><?php echo $approach1 ; ?></h4>
                    <span class="badge badge-info badge-pill mt-5" style="width: 40px;height: 40px;line-height: 40px ;background-color: rgb(8, 191, 71);"><?php echo $A; ?></span>
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
                </div>

                <div class="col-md-6">
                    <h4 class="header-caption text-center mt-5" ><?php echo $approach2; ?></h4>
                    <span class="badge badge-info badge-pill mt-5" style="width: 40px;height: 40px;line-height: 40px;background-color: rgba(255, 0, 0, 0.64);"><?php echo $C; ?></span>
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

                </div>

            </div><!-- /Row -->
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="panel-group" id="accordion">
                        <!--section1-->
                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" class="text-white" data-parent="#accordion" href="#collapse1">
                                        با واگویه های فعلی شما در حال حاضر:<i class="fa fa-angle-down"></i></a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                    minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat.</div>
                            </div>
                        </div>
                        <!--section2-->
                        <div class="panel panel-default ">
                            <div class="panel-heading bg-primary">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" class="text-white" href="#collapse2">
                                                                                دوست داشتن حسی<i class="fa fa-angle-down"></i></a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    foreach($result[1] as $k=>$v) {
                                        echo '
                                <div class="text-right text-justify border-bottom border-light">
                                    ' . $v . '
                                </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!--section3-->
                        <div class="panel panel-default ">
                            <div class="panel-heading bg-primary ">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" class="text-white" data-parent="#accordion" href="#collapse3">
                                        نیاز حسی<i class="fa fa-angle-down"></i></a>
                                </h4>
                            </div>
                            <?php if($list['list']['topic']['topic_type']==1 || $list['list']['topic']['topic_type']==3 || $list['list']['topic']['topic_type']==4 || $list['list']['topic']['topic_type']==5 || $list['list']['topic']['topic_type']==6){ ?>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    foreach($result[2] as $k=>$v) {
                                    echo '
                                    <div class="text-right text-justify border-bottom border-light">
                                        ' . $v . '
                                    </div>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <!--section4-->
                        <div class="panel panel-default">
                            <div class="panel-heading bg-primary ">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" class="text-white" data-parent="#accordion" href="#collapse4">
                                         توانایی حسی<i class="fa fa-angle-down"></i></a>
                                </h4>
                            </div>

                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    foreach($result[3] as $k=>$v) {
                                    echo '
                                    <div class="text-right text-justify border-bottom border-light">
                                        ' . $v . '
                                    </div>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <!--section5-->
                        <div class="panel panel-default">
                            <div class="panel-heading bg-primary ">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" class="text-white" data-parent="#accordion" href="#collapse5">
                                           سود حسی <i class="fa fa-angle-down"></i></a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    foreach($result[4] as $k=>$v) {
                                    echo '
                                    <div class="text-right text-justify border-bottom border-light">
                                        ' . $v . '
                                    </div>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <!--section6-->
                        <div class="panel panel-default">
                            <div class="panel-heading bg-primary">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" class=" text-white" href="#collapse6">
                                        انرژی حسی<i class="fa fa-angle-down"></i></a>
                                </h4>
                            </div>

                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <?php
                                    foreach($result[5] as $k=>$v) {
                                    echo '
                                    <div class="text-right text-justify border-bottom border-light">
                                        ' . $v . '
                                    </div>';
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                       <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Form_container -->
</main>

