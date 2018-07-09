<?
	CModule::IncludeModule('iblock');
	$APPLICATION->SetPageProperty('logo', '/assets/images/logo.png');

	$element = CIblockElement::GetByID($arResult['ID'])->Fetch();
	//$APPLICATION->SetPageProperty('name', $element['NAME']);
	//$APPLICATION->SetPageProperty('code', $element['CODE']);
	$APPLICATION->SetPageProperty('description', $element['PREVIEW_TEXT']);

	if ($element['PREVIEW_PICTURE']) {
		$APPLICATION->SetPageProperty('image', CFile::GetPath($element['PREVIEW_PICTURE']));
	}
?>
