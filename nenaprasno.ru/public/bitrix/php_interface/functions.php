<?php

if (!function_exists('checkReCaptcha')) {
	function checkReCaptcha($token) {
		if (is_null($token) or empty($token)) {
			return false;
		}
		
		$curl = curl_init();
	    curl_setopt($curl, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
	    curl_setopt($curl, CURLOPT_FAILONERROR, 1);
	    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl, CURLOPT_POST, 1);
	    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query([
	        'secret' => CAPTCHA_SECRET,
	        'response' => $token,
	        'remoteip' => $_SERVER['REMOTE_ADDR']
	    ]));
	    $result = curl_exec($curl);
	    curl_close($curl);
	    
	    $parsed = json_decode($result);
	    if (!isset($parsed->success) || !$parsed->success) {
	    	return false;
	    }

	    return true;
	}
}

if (!function_exists('sendEmail')) {
	function sendEmail($to, $theme, $template, $data = [], $cc = [], $bcc = []) {

		include_once('Mail.php');

		$headers = [];
		$headers['To']          = $to;
		$headers['From']        = "Nenaprasno.ru <" . SMTP_USER . ">";
		$headers['Subject']     = $theme;

		if (count($cc)){
			$cc = implode(', ', $cc);
			$headers['Cc'] = $cc;
		}
		if (count($bcc)){
			$bcc = implode(', ', $bcc);
			$realto = $to . ', ' . $bcc;
		}
		else
		{
			$realto = $to;
		}

		$headers['MIME-Version']        = '1.0';
		$headers['Content-type']        = 'text/html; charset=utf-8';

		$content = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/templates/' . $template . '.html');
		foreach($data as $key => $value){
			$content = str_replace('#' . mb_strtoupper($key) . '#', htmlspecialchars($value), $content);
		}

		$content = str_replace('#IP#', $_SERVER['REMOTE_ADDR'], $content);
		$content = str_replace('#UA#', $_SERVER['HTTP_USER_AGENT'], $content);
		$content = str_replace('#IP_COUNTRY#', $_SERVER['GEOIP_COUNTRY_NAME'], $content);
		$content = str_replace('#IP_CITY#', $_SERVER['GEOIP_CITY'], $content);

		$params = [];
		$params['host'] = SMTP_HOST;
		$params['port'] = 25;
		if (SMTP_AUTH == true) {
			$params['username'] = SMTP_USER;
			$params['password'] = SMTP_PASSWORD;
			$params['auth'] = true;
		}

		$mail_object =& Mail::factory('smtp', $params);
		return $mail_object->send($realto, $headers, $content);
	}
}
