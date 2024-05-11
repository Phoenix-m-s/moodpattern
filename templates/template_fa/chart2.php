<?php //echo '<pre>';print_r($list['list']);
if($list['list']['topic']['topic_type']==1){
    if($list['list']['topic']['verb_type']==1){
        $approach1 = 'انجام می دم و فکر می کنم با انجام دادنش' ;
        $approach2 = 'انجام می‌دم ولی فکر می‌کنم اگر انجام نـدهم' ;
        $label1 = 'رضایت' ;
        $label2 = 'خشم' ;
        $label3 = 'غم' ;
        $label4 = 'استرس' ;
        $bgColor1 = 'rgba(60,179,113, 0.2)' ;
        $bgbColor1= 'rgb(60,179,113)' ;
        $bgColor2 = 'rgba(255, 99, 132, 0.2)' ;
        $bgbColor2= 'rgb(255, 99, 132)' ;
        $bgColor4 = 'rgba(60,179,113, 0.2)' ;
        $bgbColor4= 'rgb(60,179,113)' ;
        $bgColor3 = 'rgba(255, 99, 132, 0.2)' ;
        $bgbColor3= 'rgb(255, 99, 132' ;
    }elseif($list['list']['topic']['verb_type']==2){
        $approach1 = 'انجام نمی‌دم ولی فکر می‌کنم با انجام دادنش' ;
        $approach2 = 'انجام نمی‌دم و فکر می‌کنم اگر انجام نـدهم' ;
        $label1 = 'غم' ;
        $label2 = 'رضایت' ;
        $label3 = 'خشم' ;
        $label4 = 'استرس' ;
        $bgColor1 = 'rgba(60,179,113, 0.2)' ;
        $bgbColor1= 'rgb(60,179,113)' ;
        $bgColor2 = 'rgba(255, 99, 132, 0.2)' ;
        $bgbColor2= 'rgb(255, 99, 132)' ;
        $bgColor4 = 'rgba(60,179,113, 0.2)' ;
        $bgbColor4= 'rgb(60,179,113)' ;
        $bgColor3 = 'rgba(255, 99, 132, 0.2)' ;
        $bgbColor3= 'rgb(255, 99, 132' ;
    }
}elseif($list['list']['topic']['topic_type']==2){
    if($list['list']['topic']['verb_type']==1){
        $approach1 = 'من درباره او فکر می کنم' ;
        $approach2 = 'او درباره من با خودش فکر می کند' ;
        $label1 = 'محبت' ;
        $label2 = 'خشم' ;
        $label3 = 'محبت' ;
        $label4 = 'استرس' ;
        $bgColor1 = 'rgba(60,179,113, 0.2)' ;
        $bgbColor1= 'rgb(60,179,113)' ;
        $bgColor2 = 'rgba(255, 99, 132, 0.2)' ;
        $bgbColor2= 'rgb(255, 99, 132)' ;
        $bgColor3 = 'rgba(60,179,113, 0.2)' ;
        $bgbColor3= 'rgb(60,179,113)' ;
        $bgColor4 = 'rgba(255, 99, 132, 0.2)' ;
        $bgbColor4= 'rgb(255, 99, 132)' ;
    }
}
$labels = '' ;
$data1 = '' ;
$data2 = '' ;
$data3 = '' ;
$data4 = '' ;
//echo'<pre>'; print_r($list['list']['score']);
$A = 0 ;
$B = 0 ;
$C = 0 ;
$D = 0 ;
foreach($list['list']['sensor'] as $k=>$v){
    $labels .= ',"'.$v['title'].'"'.',"'.$v['title'].'"' ;
    if($v['sensor_type']==1) {
        if ($list['list']['score'][1][$v['id']]) {
            $data1 .= ',' . pow($list['list']['score'][1][$v['id']],2);
            $data1 .= ',' . pow($list['list']['score'][1][$v['id']],2);
            $A += pow($list['list']['score'][1][$v['id']],2) ;
        }else {
            $data1 .= ',0';
            $data1 .= ',0';
        }
        if ($list['list']['score'][2][$v['id']]) {
            $data3 .= ',' . pow($list['list']['score'][2][$v['id']],2);
            $data3 .= ',' . pow($list['list']['score'][2][$v['id']],2);
            $C += pow($list['list']['score'][2][$v['id']],2) ;
        } else {
            $data3 .= ',0';
            $data3 .= ',0';
        }
        $data2 .= ',0';
        $data2 .= ',0';
        $data4 .= ',0';
        $data4 .= ',0';
    }
    if($v['sensor_type']==2){
        if ($list['list']['score'][1][$v['id']]) {
            $data2 .= ',' . pow($list['list']['score'][1][$v['id']],2);
            $data2 .= ',' . pow($list['list']['score'][1][$v['id']],2);
            $B += pow($list['list']['score'][1][$v['id']],2);
        } else {
            $data2 .= ',0';
            $data2 .= ',0';
        }
        if ($list['list']['score'][2][$v['id']]) {
            $data4 .= ',' . pow($list['list']['score'][2][$v['id']],2);
            $data4 .= ',' . pow($list['list']['score'][2][$v['id']],2);
            $D += pow($list['list']['score'][2][$v['id']],2);
        } else {
            $data4 .= ',0';
            $data4 .= ',0';
        }
        $data1 .= ',0' ;
        $data1 .= ',0' ;
        $data3 .= ',0' ;
        $data3 .= ',0' ;
    }
}
$labels = substr($labels,1,strlen($labels)) ;
$data1 = substr($data1,1,strlen($data1)) ;
$data2 = substr($data2,1,strlen($data2)) ;
$data3 = substr($data3,1,strlen($data3)) ;
$data4 = substr($data4,1,strlen($data4)) ;


$range_one_hundred = array(1=>array('min'=>0,'max'=>101),2=>array('min'=>101,'max'=>203),3=>array('min'=>203,'max'=>304),4=>array('min'=>304,'max'=>405),5=>array('min'=>405,'max'=>505),6=>array('min'=>505,'max'=>605)) ;
$range_two_hundred = array(1=>array('min'=>10,'max'=>210),2=>array('min'=>210,'max'=>410),3=>array('min'=>410,'max'=>610),4=>array('min'=>610,'max'=>810),5=>array('min'=>810,'max'=>1210)) ;
$percentMaxRange1_1 = 405 ;
//$percentMaxRange1_2 = 605 ;

$r = 0 ;
$result = array() ;
//$percent = (($A - $v['min']) / ($v['max'] - $v['min'])) * 100;
if($list['list']['topic']['topic_type']==1 && $list['list']['topic']['verb_type']==1){
    /////////////// A ///////////////////
    if($A >=  $range_one_hundred[1]['min'] && $A < $range_one_hundred[1]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "علاقه شما به انجام این کار $A واحد است که این «بسیار اندک» می باشد و این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید و با وجود اینکه شما را چندان سر شوق نمی آورد ولی هنوز به انجام کار علاقه مند هستید." ;
    }
    if($A >=  $range_one_hundred[2]['min'] && $A < $range_one_hundred[2]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "علاقه شما به انجام این کار $A واحد است که این «به میزان متوسط» می باشد و این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید ولی این میزان دوست داشتن شما را به اندازه کافی سر شوق نمی آورد." ;
    }
    if($A >=  $range_one_hundred[3]['min'] && $A < $range_one_hundred[3]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "علاقه شما به انجام این کار $A واحد است که این «به میزان قابل قبولی» می باشد و این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید." ;
    }
    if($A >=  $range_one_hundred[4]['min'] && $A < $range_one_hundred[4]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "علاقه شما به انجام این کار $A واحد است که این «به میزان خیلی زیادی» می باشد و این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید." ;
    }
    if($A >=  $range_one_hundred[5]['min'] && $A < $range_one_hundred[5]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "علاقه شما به انجام این کار $A واحد است که این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید که «بیش از حد نرمال» است." ;
    }
    if($A >=  $range_one_hundred[6]['min'] && $A < $range_one_hundred[6]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "علاقه شما به انجام این کار $A واحد است که این یعنی شما به میزان $percent درصد انجام این کار را دوست دارید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// B ///////////////////
    if($B >=  $range_one_hundred[1]['min'] && $B < $range_one_hundred[1]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این «بسیار اندک» می باشد و این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید و این شما را برای عدم انجام این کار چندان سر شوق نمی آورد." ;
    }
    if($B >=  $range_one_hundred[2]['min'] && $B < $range_one_hundred[2]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این «به میزان متوسط» می باشد و این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید واین به اندازه کافی شما را برای عدم انجام این کار سر شوق نمی آورد." ;
    }
    if($B >=  $range_one_hundred[3]['min'] && $B < $range_one_hundred[3]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این «به میزان قابل قبولی» می باشد و این یعنی شما به میزان $percent درصد از انجام این کار را بدتان می آید که این به اندازه خوبی شما را برای عدم انجام این کار سر شوق می آورد." ;
    }
    if($B >=  $range_one_hundred[4]['min'] && $B < $range_one_hundred[4]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این «به میزان خیلی زیادی» می باشد و این یعنی شما به میزان $percent درصد انجام این کار بدتان دارید که این به اندازه عالی شما را برای عدم انجام این کار سر شوق می آورد." ;
    }
    if($B >=  $range_one_hundred[5]['min'] && $B < $range_one_hundred[5]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که «بیش از حد نرمال» است." ;
    }
    if($B >=  $range_one_hundred[6]['min'] && $B < $range_one_hundred[6]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// C ///////////////////
    if($C >=  $range_one_hundred[1]['min'] && $C < $range_one_hundred[1]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد غم ایجاد می کند که «قابل توجه» نیست و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «قابل قبولی» می باشد و مانع از انجام کار نمی شود." ;
    }
    if($C >=  $range_one_hundred[2]['min'] && $C < $range_one_hundred[2]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد غم ایجاد می کند که «کمی زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «نسبتا زیادی» می باشد و می تواند تا حدی مانع برای انجام کار شود." ;
    }
    if($C >=  $range_one_hundred[3]['min'] && $C < $range_one_hundred[3]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد غم ایجاد می کند که «نسبتا زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «زیادی» می باشد و می تواند مانعی برای انجام کار شود." ;
    }
    if($C >=  $range_one_hundred[4]['min'] && $C < $range_one_hundred[4]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد غم ایجاد می کند که «زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «خیلی زیادی» می باشد و می تواند مانع جدی برای انجام کار شود." ;
    }
    if($C >=  $range_one_hundred[5]['min'] && $C < $range_one_hundred[5]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد غم ایجاد می کند که «بسیار زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که مقدار «بیش از حد زیادی» می باشد و می تواند مانعی اساسی برای انجام کار شود." ;
    }
    if($C >=  $range_one_hundred[6]['min'] && $C < $range_one_hundred[6]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد غم ایجاد می کند که این یعنی شما به میزان $percent درصد از انجام ندادن این کار رضایت دارید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// D ///////////////////
    if($D >=  $range_one_hundred[1]['min'] && $D < $range_one_hundred[1]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $D واحد استرس ایجاد می کند که «نرمال» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «چندان ناراحت کننده» نمی باشد." ;
    }
    if($D >=  $range_one_hundred[2]['min'] && $D < $range_one_hundred[2]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $D واحد استرس ایجاد می کند که «اندکی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «اندکی نگران کننده» می باشد." ;
    }
    if($D >=  $range_one_hundred[3]['min'] && $D < $range_one_hundred[3]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $D واحد استرس ایجاد می کند که «از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «باید مورد توجه» قرار بگیرد." ;
    }
    if($D >=  $range_one_hundred[4]['min'] && $D < $range_one_hundred[4]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $D واحد استرس ایجاد می کند که «به میزان قابل توجهی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «نگران کننده» می باشد." ;
    }
    if($D >=  $range_one_hundred[5]['min'] && $D < $range_one_hundred[5]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $D واحد استرس ایجاد می کند که «خیلی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که «باید به طور جدی مورد توجه» قرار بگیرد." ;
    }
    if($D >=  $range_one_hundred[6]['min'] && $D < $range_one_hundred[6]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $D واحد استرس ایجاد می کند که « به شکل غیر طبیعی زیاد» است و این یعنی شما به میزان $percent درصد نسبت به انجام ندادن کار احساس ناخوشایند دارید که نیاز به درمان دارد." ;
    }

}elseif($list['list']['topic']['topic_type']==1 && $list['list']['topic']['verb_type']==2){
    /////////////// A ///////////////////
    if($A >=  $range_one_hundred[1]['min'] && $A < $range_one_hundred[1]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $A واحد غم ایجاد می کند که «قابل توجه» نیست و این یعنی شما به میزان $percent درصد از انجام دادن این کار رضایت دارید که مقدار «قابل قبولی» می باشد و مانع از انجام ندادن کار نمی شود." ;
    }
    if($A >=  $range_one_hundred[2]['min'] && $A < $range_one_hundred[2]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $A واحد غم ایجاد می کند که «کمی زیاد» است و این یعنی شما به میزان $percent درصد از انجام دادن این کار رضایت دارید که مقدار «نسبتا زیادی» می باشد و می تواند تا حدی مانع برای انجام ندادن کار شود." ;
    }
    if($A >=  $range_one_hundred[3]['min'] && $A < $range_one_hundred[3]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $A واحد غم ایجاد می کند که «نسبتا زیاد» است و این یعنی شما به میزان $percent درصد از انجام دادن این کار رضایت دارید که مقدار «زیادی» می باشد و می تواند مانعی برای انجام ندادن کار شود." ;
    }
    if($A >=  $range_one_hundred[4]['min'] && $A < $range_one_hundred[4]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $A واحد غم ایجاد می کند که «زیاد» است و این یعنی شما به میزان $percent درصد از انجام دادن این کار رضایت دارید که مقدار «خیلی زیادی» می باشد و می تواند مانع جدی برای انجام ندادن این کار شود." ;
    }
    if($A >=  $range_one_hundred[5]['min'] && $A < $range_one_hundred[5]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $A واحد غم ایجاد می کند که «بسیار زیاد» است و این یعنی شما به میزان $percent درصد از انجام دادن این کار رضایت دارید که مقدار «بیش از حد زیادی» می باشد و می تواند مانعی اساسی برای انجام ندادن این کار شود." ;
    }
    if($A >=  $range_one_hundred[6]['min'] && $A < $range_one_hundred[6]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $A واحد غم ایجاد می کند که این یعنی شما به میزان $percent درصد از انجام دادن این کار رضایت دارید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// B ///////////////////
    if($B >=  $range_one_hundred[1]['min'] && $B < $range_one_hundred[1]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این «بسیار اندک» می باشد و این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید و این شما را برای عدم انجام این کار چندان سر شوق نمی آورد." ;
    }
    if($B >=  $range_one_hundred[2]['min'] && $B < $range_one_hundred[2]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این «به میزان متوسط» می باشد و این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید واین به اندازه کافی شما را برای عدم انجام این کار سر شوق نمی آورد." ;
    }
    if($B >=  $range_one_hundred[3]['min'] && $B < $range_one_hundred[3]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این «به میزان قابل قبولی» می باشد و این یعنی شما به میزان $percent درصد از انجام این کار را بدتان می آید که این به اندازه خوبی شما را برای عدم انجام این کار سر شوق می آورد." ;
    }
    if($B >=  $range_one_hundred[4]['min'] && $B < $range_one_hundred[4]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این «به میزان خیلی زیادی» می باشد و این یعنی شما به میزان $percent درصد انجام این کار بدتان دارید که این به اندازه عالی شما را برای عدم انجام این کار سر شوق می آورد." ;
    }
    if($B >=  $range_one_hundred[5]['min'] && $B < $range_one_hundred[5]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که «بیش از حد نرمال» است." ;
    }
    if($B >=  $range_one_hundred[6]['min'] && $B < $range_one_hundred[6]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "رضایت شما به انجام ندادن این کار $B واحد است که این یعنی شما به میزان $percent درصد از انجام این کار بدتان می آید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// C ///////////////////
    if($C >=  $range_one_hundred[1]['min'] && $C < $range_one_hundred[1]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد خشم ایجاد می کند که «چندان مهم» نمی باشد و این یعنی شما به میزان $percent درصد دوست دارید این کار را انجام ندهید که این مقدار «چندان آزار دهنده» نمی باشد." ;
    }
    if($C >=  $range_one_hundred[2]['min'] && $C < $range_one_hundred[2]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد خشم ایجاد می کند که «کمی از حد نرمال بیشتر» می باشد و این یعنی شما به میزان $percent درصد دوست دارید این کار را انجام ندهید که این مقدار که با وجود اینکه «چندان زیاد» نیست ولی باید مورد توجه قرار گیرد." ;
    }
    if($C >=  $range_one_hundred[3]['min'] && $C < $range_one_hundred[3]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد خشم ایجاد می کند که «می تواند به شما تقریبا آسیب برساند» و این یعنی شما به میزان $percent درصد دوست دارید این کار را انجام ندهید که این مقدار «نسبتا زیاد» می باشد و اگر می خواهید به عدم انجام این کار ادامه دهید برای مکالمات ذهنی خود چاره ای بیاندیشید." ;
    }
    if($C >=  $range_one_hundred[4]['min'] && $C < $range_one_hundred[4]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام این کار در شما $C واحد خشم ایجاد می کند که «می تواند به شما آسیب جدی برساند» و این یعنی شما به میزان $percent درصد دوست دارید این کار را انجام ندهید که این مقدار «زیاد» می باشد و اگر می خواهید با عدم انجام این کار ادامه دهید برای مکالمات ذهنی خود چاره ای بیاندیشید." ;
    }
    if($C >=  $range_one_hundred[5]['min'] && $C < $range_one_hundred[5]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام دادن این کار در شما $C واحد است خشم تولید می کند که این یعنی شما به میزان $percent درصد دوست دارید این کار را انجام ندهید که «بیش از حد نرمال» می باشد." ;
    }
    if($C >=  $range_one_hundred[6]['min'] && $C < $range_one_hundred[6]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام دادن این کار در شما $C واحد است خشم تولید می کند که این یعنی شما به میزان $percent درصد دوست دارید این کار را انجام ندهید که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// D ///////////////////
    if($D >=  $range_one_hundred[1]['min'] && $D < $range_one_hundred[1]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $D واحد استرس ایجاد می کند که «نرمال» است و این یعنی شما به میزان $percent درصداز انجام ندادن این کار بدتان می آید که «چندان ناراحت کننده» نمی باشد." ;
    }
    if($D >=  $range_one_hundred[2]['min'] && $D < $range_one_hundred[2]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $D واحد استرس ایجاد می کند که «اندکی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار بدتان می آید که «اندکی نگران کننده» می باشد." ;
    }
    if($D >=  $range_one_hundred[3]['min'] && $D < $range_one_hundred[3]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $D واحد استرس ایجاد می کند که «از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار بدتان می آید که «باید مورد توجه» قرار بگیرد." ;
    }
    if($D >=  $range_one_hundred[4]['min'] && $D < $range_one_hundred[4]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $D واحد استرس ایجاد می کند که «به میزان قابل توجهی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار بدتان می آید که «نگران کننده» می باشد." ;
    }
    if($D >=  $range_one_hundred[5]['min'] && $D < $range_one_hundred[5]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $D واحد استرس ایجاد می کند که «خیلی از حد نرمال بیشتر» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار بدتان می آید که «باید به طور جدی مورد توجه» قرار بگیرد." ;
    }
    if($D >=  $range_one_hundred[6]['min'] && $D < $range_one_hundred[6]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "انجام ندادن این کار در شما $D واحد استرس ایجاد می کند که « به شکل غیر طبیعی زیاد» است و این یعنی شما به میزان $percent درصد از انجام ندادن این کار بدتان می آید که نیاز به درمان دارد." ;
    }


}elseif($list['list']['topic']['topic_type']==2){
    /////////////// A ///////////////////
    if($A >=  $range_one_hundred[1]['min'] && $A < $range_one_hundred[1]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "محبت درونی شما $A واحد است که این «بسیار اندک» می باشد و این یعنی شما به میزان $percent درصد دوستش داری و با وجود اینکه شما را چندان سر شوق نمی آورد ولی هنوز این رابطه زنده است." ;
    }
    if($A >=  $range_one_hundred[2]['min'] && $A < $range_one_hundred[2]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "محبت درونی شما $A واحد است که این «به میزان متوسط» می باشد و این یعنی شما به میزان $percent درصد دوستش داری که نشان می دهد این رابطه هنوز امیدوار کننده است." ;
    }
    if($A >=  $range_one_hundred[3]['min'] && $A < $range_one_hundred[3]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "محبت درونی شما $A واحد است و این یعنی شما به میزان $percent درصد دوستش داری که این «تا حد خوبی» می باشد." ;
    }
    if($A >=  $range_one_hundred[4]['min'] && $A < $range_one_hundred[4]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_1,0);
        $result[$r++] = "محبت درونی شما $A واحد است و این یعنی شما به میزان $percent درصد دوستش داری که این «عالی» می باشد." ;
    }
    if($A >=  $range_one_hundred[5]['min'] && $A < $range_one_hundred[5]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_2,0);
        $result[$r++] = "محبت درونی شما $A واحد است که این یعنی شما به میزان $percent درصد دوستش داری که «بیش از حد نرمال» است." ;
    }
    if($A >=  $range_one_hundred[6]['min'] && $A < $range_one_hundred[6]['max']) {
        $percent =round(($A*100)/$percentMaxRange1_2,0);
        $result[$r++] = "محبت درونی شما $A واحد است که این یعنی شما به میزان $percent درصد دوستش داری که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// B ///////////////////
    if($B >=  $range_one_hundred[1]['min'] && $B < $range_one_hundred[1]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "خشم درونی شما $B واحد است که «چندان مهم» نمی باشد و این یعنی شما به میزان $percent درصد ازش بدتون میاد که این مقدار «چندان آزار دهنده» نمی باشد." ;
    }
    if($B >=  $range_one_hundred[2]['min'] && $B < $range_one_hundred[2]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "خشم درونی شما $B واحد است که «کمی از حد نرمال بیشتر» می باشد و این یعنی شما به میزان $percent درصد ازش بدتون میاد که با وجود اینکه «چندان زیاد» نیست ولی باید مورد توجه قرار گیرد." ;
    }
    if($B >=  $range_one_hundred[3]['min'] && $B < $range_one_hundred[3]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "خشم درونی شما $B واحد است که «می تواند به شما تقریبا آسیب برساند» و این یعنی شما به میزان $percent درصد ازش بدتون میاد که این مقدار «نسبتا زیاد» می باشد و اگر می خواهید به این رابطه ادامه دهید برای مکالمات ذهنی خود چاره ای بیاندیشید." ;
    }
    if($B >=  $range_one_hundred[4]['min'] && $B < $range_one_hundred[4]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_1,0);
        $result[$r++] = "خشم درونی شما $B واحد است که «می تواند به شما آسیب جدی برساند» و این یعنی شما به میزان $percent درصد ازش بدتون میاد که که این مقدار «زیاد» می باشد و اگر می خواهید به این رابطه ادامه دهید برای مکالمات ذهنی خود چاره ای بیاندیشید." ;
    }
    if($B >=  $range_one_hundred[5]['min'] && $B < $range_one_hundred[5]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_2,0);
        $result[$r++] = "خشم درونی شما $B واحد است که این یعنی شما به میزان $percent درصد ازش بدتون میاد که «بیش از حد نرمال» می باشد." ;
    }
    if($B >=  $range_one_hundred[6]['min'] && $B < $range_one_hundred[6]['max']) {
        $percent =round(($B*100)/$percentMaxRange1_2,0);
        $result[$r++] = "خشم درونی شما $B واحد است که این یعنی شما به میزان $percent درصد ازش بدتون میاد که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// C ///////////////////
    if($C >=  $range_one_hundred[1]['min'] && $C < $range_one_hundred[1]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "محبت او به شما $C واحد است که این «بسیار اندک» می باشد و این یعنی او به میزان $percent درصد دوست داره و با وجود اینکه میزان کمی است ولی نشان می دهد هنوز این رابطه زنده است." ;
    }
    if($C >=  $range_one_hundred[2]['min'] && $C < $range_one_hundred[2]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "محبت او به شما $C واحد است که این «به میزان متوسط» می باشد و این یعنی او به میزان $percent درصد دوست داره که این نشان می دهد این رابطه هنوز امیدوار کننده است." ;
    }
    if($C >=  $range_one_hundred[3]['min'] && $C < $range_one_hundred[3]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "محبت او به شما $C واحد است و این یعنی او به میزان $percent درصد دوست داره که این «تا حد خوبی» می باشد." ;
    }
    if($C >=  $range_one_hundred[4]['min'] && $C < $range_one_hundred[4]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_1,0);
        $result[$r++] = "محبت او به شما $C واحد است و این یعنی شما به میزان $percent درصد دوست داره که این «عالی» می باشد." ;
    }
    if($C >=  $range_one_hundred[5]['min'] && $C < $range_one_hundred[5]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_2,0);
        $result[$r++] = "محبت او به شما $C واحد است که این یعنی او به میزان $percent درصد دوست داره که «بیش از حد نرمال» است." ;
    }
    if($C >=  $range_one_hundred[6]['min'] && $C < $range_one_hundred[6]['max']) {
        $percent =round(($C*100)/$percentMaxRange1_2,0);
        $result[$r++] = "محبت او به شما $C واحد است که این یعنی او به میزان $percent درصد دوست داره که «به شکل غیر طبیعی زیاد» است." ;
    }
    /////////////// D ///////////////////
    if($D >=  $range_one_hundred[1]['min'] && $D < $range_one_hundred[1]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "این رابطه در شما $D واحد استرس ایجاد می کند که «نرمال» است و این یعنی شما فکر می کنی او به میزان $percent درصد ازت بدش میاد که «چندان ناراحت کننده» نمی باشد." ;
    }
    if($D >=  $range_one_hundred[2]['min'] && $D < $range_one_hundred[2]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "این رابطه در شما $D واحد استرس ایجاد می کند که «اندکی از حد نرمال بیشتر» است و این یعنی شما فکر می کنی او به میزان $percent درصد ازت بدش میاد که «اندکی نگران کننده» می باشد." ;
    }
    if($D >=  $range_one_hundred[3]['min'] && $D < $range_one_hundred[3]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "این رابطه در شما $D واحد استرس ایجاد می کند که «از حد نرمال بیشتر» است و این یعنی شما فکر می کنی او به میزان $percent درصد ازت بدش میاد که «باید مورد توجه» قرار بگیرد." ;
    }
    if($D >=  $range_one_hundred[4]['min'] && $D < $range_one_hundred[4]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_1,0);
        $result[$r++] = "این رابطه در شما $D واحد استرس ایجاد می کند که «به میزان قابل توجهی از حد نرمال بیشتر» است و این یعنی شما فکر می کنی او به میزان $percent درصد ازت بدش میاد که «نگران کننده» می باشد." ;
    }
    if($D >=  $range_one_hundred[5]['min'] && $D < $range_one_hundred[5]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_2,0);
        $result[$r++] = "این رابطه در شما $D واحد استرس ایجاد می کند که «خیلی از حد نرمال بیشتر» است و این یعنی شما فکر می کنی او به میزان $percent درصد ازت بدش میاد که «باید به طور جدی مورد توجه» قرار بگیرد." ;
    }
    if($D >=  $range_one_hundred[6]['min'] && $D < $range_one_hundred[6]['max']) {
        $percent =round(($D*100)/$percentMaxRange1_2,0);
        $result[$r++] = "این رابطه در شما $D واحد استرس ایجاد می کند که « به شکل غیر طبیعی زیاد» است و این یعنی شما فکر می کنی او به میزان $percent درصد ازت بدش میاد که نیاز به درمان دارد." ;
    }
}
?>
<main>

    <div id="form_container" style="text-align: center;direction: rtl;">
        <a href="#" class="text-dark text-left pull-left" id="printText" onclick="javascript:window.print()" title="چاپ">
            <i class="fa fa-print fa-2x text-center"></i>
        </a>
        <br/>
        <h6 class="list-group-item-primary">

                    <span class="text-dark text-center " dir="rtl">
                    <?php echo $list['list']['topic']['title']?>
                    </span>

            <label for="label" class="mt-2">
                <i class="fas fa-ed" style="margin-left: 10px;margin-top: 3px;"></i>
            </label>
        </h6>


        <h4 class="header-caption text-center" style="padding-top: 15px"></h4>
        <div id="wizard_container">

            <div class="row">

                <div class="col-md-8" style="margin: 0 auto;float: none;">

                    <h4 class="header-caption text-center" style="margin-bottom: 25px;margin-top: 25px"><?php echo $approach1?></h4>
                    <span class="badge badge-info badge-pill" style="width: 40px;height: 40px;line-height: 40px;"><?php echo $A ;?></span>
                    <canvas id="chartjs-3" class="chartjs" style="transform: rotate(0deg);direction: ltr;" width="770" height="385"
                            style="display: block; width: 770px; height: 385px;" ></canvas>

                    <script>new Chart(document.getElementById("chartjs-3"), {
                            "type": "radar",
                            "data": {
                                "labels": [<?php echo $labels ;?>],
                                "datasets": [{
                                    "label": "<?php echo $label1 ; ?>",
                                    "data": [<?php echo $data1 ; ?>],
                                    "fill": true,
                                    "backgroundColor": "<?php echo $bgColor1 ; ?>",
                                    "borderColor": "<?php echo $bgbColor1 ; ?>",
                                    "pointBackgroundColor": "<?php echo $bgbColor1 ; ?>",
                                    "pointBorderColor": "#fff",
                                    "pointHoverBackgroundColor": "#fff",
                                    "pointHoverBorderColor": "<?php echo $bgbColor1 ; ?>"
                                }, {
                                    "label": "<?php echo $label2 ; ?>",
                                    "data": [<?php echo $data2 ; ?>],
                                    "fill": true,
                                    "backgroundColor": "<?php echo $bgColor2 ; ?>",
                                    "borderColor": "<?php echo $bgbColor2 ; ?>",
                                    "pointBackgroundColor": "<?php echo $bgbColor2 ; ?>",
                                    "pointBorderColor": "#fff",
                                    "pointHoverBackgroundColor": "#fff",
                                    "pointHoverBorderColor": "<?php echo $bgbColor2 ; ?>"
                                }]
                            },
                            "options": {"elements": {"line": {"tension": 0, "borderWidth": 3}}}
                        });</script>
                    <span class="badge badge-info badge-pill" style="width: 40px;height: 40px;line-height: 40px;"><?php echo $B ;?></span>
                </div>
                <div class="col-md-12">

                    <hr style="border:1px solid #ccc;">
                    <h4 class="header-caption text-center" style="margin-bottom: 25px;margin-top: 25px"><?php echo $approach2?></h4>
                    <span class="badge badge-info badge-pill" style="width: 40px;height: 40px;line-height: 40px;"><?php echo $C ;?></span>

                    <canvas id="chartjs-4" class="chartjs" width="770" height="385"
                            style="display: block;direction: ltr; width: 770px; height: 385px;"></canvas>

                    <script>new Chart(document.getElementById("chartjs-4"), {
                            "type": "radar",

                            "data": {
                                "labels": [<?php echo $labels ;?>],
                                "datasets": [{
                                    "label": "<?php echo $label3 ; ?>",
                                    "data": [<?php echo $data3 ; ?>],
                                    "fill": true,
                                    "backgroundColor": "<?php echo $bgColor3 ; ?>",
                                    "borderColor": "<?php echo $bgbColor3 ?>",
                                    "pointBackgroundColor": "<?php echo $bgbColor3 ; ?>",
                                    "pointBorderColor": "#fff",
                                    "pointHoverBackgroundColor": "#fff",
                                    "pointHoverBorderColor": "<?php echo $bgbColor3 ;?>"
                                }, {
                                    "label": "<?php echo $label4 ; ?>",
                                    "data": [<?php echo $data4 ; ?>],
                                    "fill": true,
                                    "backgroundColor": "<?php echo $bgColor4 ; ?>",
                                    "borderColor": "<?php echo $bgbColor4 ;?>",
                                    "pointBackgroundColor": "<?php echo $bgbColor4 ;?>",
                                    "pointBorderColor": "#fff",
                                    "pointHoverBackgroundColor": "#fff",
                                    "pointHoverBorderColor": "<?php echo $bgbColor4 ;?>"
                                }]
                            },
                            "options": {"elements": {"line": {"tension": 0, "borderWidth": 3}}}

                        });</script>
                    <span class="badge badge-info badge-pill" style="width: 40px;height: 40px;line-height: 40px;"><?php echo $D ;?></span>

                </div>

            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="mt-5">
                            <li class="list-group-item  list-group-item-primary text-dark " style="text-align: right">
                                <i class="fa fa-sellsy"></i>     با واگویه های فعلی شما در حال حاضر :
                            </li>
                            <?php
                            foreach($result as $k=>$v){
                                echo '
                            <li class="list-group-item alert alert-info text-right text-dark">
                                <span style="font-size: 14px">'.$v.'</span>
                            </li>';
                            }
                            ?>
                        </ul>

                    </div>
                </div>
            </div>

        </div><!-- /Row -->
    </div>
    <!-- /Form_container -->
</main>

