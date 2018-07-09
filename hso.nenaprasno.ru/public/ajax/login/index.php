<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

global $USER;
$arAuthResult = $USER->Login($_REQUEST['email'], $_REQUEST['password'], "Y");

if ($arAuthResult != 1){
	$_SESSION['message'] = $arAuthResult['MESSAGE'];
}

LocalRedirect('/login/');

?>
