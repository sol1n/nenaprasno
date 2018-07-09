<?php
define('STOP_STATISTICS', true);
define('REQUESTS_IBLOCK', 3);
define('TEMPLATE', '/var/www/websites/school-landing/public/assets/templates/notification.html');

$_SERVER["DOCUMENT_ROOT"] = "/var/www/websites/main/public";

define("NO_KEEP_STATISTIC", true);
define("NOT_CHECK_PERMISSIONS",true); 
define('CHK_EVENT', true);

require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

ob_end_flush();
set_time_limit(0);

$message = file_get_contents(TEMPLATE);

include('Mail.php');

$headers['From']		= "Higher School of Oncology <hso@nenaprasno.ru>";
$headers['MIME-Version']		= '1.0';
$headers['Content-type']		= 'text/html; charset=utf-8';
$headers['Subject']		= 'Последние часы второго тура конкурса ВШО';

$params = [];
$params['host'] = 'smtp.yandex.ru';
$params['port'] = 25;

$mail_object =& Mail::factory('smtp', $params);

CModule::IncludeModule('iblock');

$sended = 0;

$filter = ['IBLOCK_ID' => REQUESTS_IBLOCK, 'ACTIVE' => 'Y', '!PROPERTY_EMAIL' => false, 'PROPERTY_TEST' => false, "PROPERTY_ACCEPTED_VALUE" => "Y"];
$select = ['ID', 'NAME', 'PROPERTY_EMAIL', 'PROPERTY_ACCEPTED'];
$res = CIBlockElement::GetList([], $filter, false, false, $select);

while ($element = $res->Fetch()){
	$email = $element['PROPERTY_EMAIL_VALUE'];

	$sended++;
	$mail_object->send($email, $headers, $message);
	echo "Отправлено уведомление для {$element[PROPERTY_EMAIL_VALUE]}" . PHP_EOL;

}

echo "Отправлено уведомлений: $sended" . PHP_EOL;

?>
