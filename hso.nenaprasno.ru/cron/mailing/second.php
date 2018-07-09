<?php
define('STOP_STATISTICS', true);
define('REQUESTS_IBLOCK', 3);
define('ACCEPTED_TEMPLATE', '/var/www/nenaprasno/hso.nenaprasno.ru/public/assets/templates/accepted.html');
define('DECLINED_TEMPLATE', '/var/www/nenaprasno/hso.nenaprasno.ru/public/assets/templates/declined.html');

$_SERVER["DOCUMENT_ROOT"] = "/var/www/nenaprasno/hso.nenaprasno.ru/public";

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true); 
define('CHK_EVENT', true);

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

ob_end_flush();
set_time_limit(0);

$acceptedMessage = file_get_contents(ACCEPTED_TEMPLATE);
$declinedMessage = file_get_contents(DECLINED_TEMPLATE);

include('Mail.php');

$headers['From']		= "Higher School of Oncology <hso@nenaprasno.ru>";
$headers['MIME-Version']		= '1.0';
$headers['Content-type']		= 'text/html; charset=utf-8';

$params = [];
$params['host'] = 'smtp.yandex.ru';
$params['port'] = 25;
$params['username'] = "hso@nenaprasno.ru";
$params['password'] = HSO_SMTP_PASSWORD;
$params['auth'] = true;

$mail_object =& Mail::factory('smtp', $params);

CModule::IncludeModule('iblock');

$accepted = $declined = 0;

$date = "01.01.2018";
$filter = ['IBLOCK_ID' => REQUESTS_IBLOCK, 'ACTIVE' => 'Y', '!PROPERTY_EMAIL' => false, ">DATE_CREATE" => $date];
$select = ['ID', 'NAME', 'PROPERTY_EMAIL', 'PROPERTY_ACCEPTED'];
$res = CIBlockElement::GetList([], $filter, false, false, $select);

$badMails = [
	'vintorias@mail.ru',
	'kisurina.kseniya@mail.ru',
	'smirnovartem.94@mail.ru'
];

while ($element = $res->Fetch()){
	$email = $element['PROPERTY_EMAIL_VALUE'];
	if (in_array($email, $badMails)) {
		continue;
	}
	//$email = 'is.perfect.possible@gmail.com';

	if ($element['PROPERTY_ACCEPTED_VALUE'] == 'Y'){
		$accepted++;
		$headers['Subject']		= "Хорошие новости от ВШО";
		$mail_object->send($email, $headers, $acceptedMessage);
		echo "Отправлено сообщение для {$element[NAME]} ($email) о положительном решении" . PHP_EOL;
	}
	else{
		$declined++;
		$headers['Subject']		= "Статус вашей заявки в конкурсе ВШО 2018";
		$mail_object->send($email, $headers, $declinedMessage);
		echo "Отправлено сообщение для {$element[NAME]} ($email) об отрицательном решении" . PHP_EOL;
	}
}

echo "Принятых заявок: $accepted" . PHP_EOL;
echo "Отклоненных заявок: $declined" . PHP_EOL; 

?>
