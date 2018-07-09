<?
	CModule::IncludeModule('iblock');
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "DETAIL_PAGE_URL", "PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>MEDIA_ARTICLES_IBLOCK, "ACTIVE"=>"Y", 'PROPERTY_ON_MAIN_VALUE' => 'Y');
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$arResult['ON_MAIN'][$arFields["ID"]]["FIELDS"] = $arFields;
		$arResult['ON_MAIN'][$arFields["ID"]]["PROPERTIES"] = $arProps;
	}
?>