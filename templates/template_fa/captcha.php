<?php
		if(isset($_POST['submit'])) {
			$error = "N";
		if( ($_POST['captcha']) != ($_POST['user_captcha']) ){
			$error = "Y"; echo('<p class="error"> کد امنیتی را صحیح وارد نمایید!</p>'); 
		}
		else{
			// دریافت اطلاعات مربوط به فیلدهای فرم
			$name = $_POST['name'];
			$user_email= $_POST['email'];
			$message = $_POST['message'];
			
			#################################
			## آدرس ایمیل خود را برای دریافت#
			## پیام ها در زیر وارد نمایید   #
			#################################
			
			$email_to = " YOUR EMAIL ADDRESS "; // آدرس ایمیل گیرنده پیامها
			$title = "موضوع ایمیلهای دریافتی در اینجا";
			
			// بررسی صحت تکمیل فیلد ایمیل
			if (! preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $user_email))
				{$error = "Y"; echo('<p class="error">آدرس پست الکترونیک شما معتبر نمی باشد لطفا آن را بررسی نموده و دوباره امتحان کنید</p>'); }
			
			
			
			//بخش ارسال مشخصات به ایمیل شما
		$header = "From: $user_email\n"
		. "Reply-To: $user_email\n";
		$header .= "Content-Type: text/html; charset=UTF-8\n";
		$subject = '=?UTF-8?B?'.base64_encode($title).'?=';
		$message =  "نام و نام خانوادگی: $name\n"
					. "پست الکترونیک: $user_email\n"
					. "متن پیام: $message\n";
					
		if ( $error === "N" ) {
		@mail($email_to, $subject ,$message ,$header ) ;
		
		// نمایش پیام
		echo '<p class="true"> با تشکر ، پیام شما با موفقیت ارسال گردید </p>';}
		}
	}

	function Random(){
	$length=5; // تعداد حروف و اعداد که برای کاربر نمایش داده میشوند
	$str = "1234567890";
	$max = strlen($str)-1;
	$random="";
	for ($i=0; $i<$length; $i++){
    $number = mt_rand(0,$max);
    $random.= substr($str,$number,1);}
	return $random;
}
$random = Random();

?>


