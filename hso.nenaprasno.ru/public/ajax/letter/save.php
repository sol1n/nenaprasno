<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if ($USER->IsAuthorized()) {
	if ($_POST['letter']) {
		CModule::IncludeModule('iblock');
		$res = CIBlockElement::GetList(
			['ID' => 'ASC'],
			['IBLOCK_ID' => HSO_LETTERS_IBLOCK, 'PROPERTY_USER' => $USER->GetID()],
			false,
			false,
			['ID', 'NAME', 'DETAIL_TEXT']
		);
		$element = $res->Fetch();
		$el = new CIblockElement;
		if ($element) {
			$el->Update($element['ID'], [
				'DETAIL_TEXT' => $_POST['letter']
			]);
		} else {
			$user = user();
			$element = $el->Add([
				'IBLOCK_ID' => HSO_LETTERS_IBLOCK,
				'NAME' => $user['DISPLAY_NAME'],
				'DETAIL_TEXT' => $_POST['letter'],
				'PROPERTY_VALUES' => [
					'USER' => $USER->GetID()
				]
			]);
			$testInfo = getTestInfo($USER->GetID());
			CIBlockElement::SetPropertyValues($testInfo['orderID'], SCHOOL_ORDERS_IBLOCK_ID, $element, 'LETTER');
			$_SESSION['letter-saved'] = true;
		}
		LocalRedirect('/letter/');
	} else {
		CHTTP::SetStatus(403);
	}
} else {
	CHTTP::SetStatus(403);
}
?>
