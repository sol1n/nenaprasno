<?
	CModule::IncludeModule('iblock');
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "DETAIL_PAGE_URL", "PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>MEDIA_ADDITIONAL_ARTICLES_IBLOCK, "ACTIVE"=>"Y", 'PROPERTY_DISEASE' => $arResult['NAME']);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$arResult['ADDITIONAL_ARTICLES'][$arFields["ID"]]["FIELDS"] = $arFields;
		$arResult['ADDITIONAL_ARTICLES'][$arFields["ID"]]["PROPERTIES"] = $arProps;
	}
?>
