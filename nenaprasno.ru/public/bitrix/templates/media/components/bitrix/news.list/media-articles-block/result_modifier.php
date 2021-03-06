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

	//получаем список всех партнеров
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT");
	$arFilter = Array("IBLOCK_ID"=>MEDIA_PARTNERS_IBLOCK, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arResult['PARTNERS'][$arFields["ID"]]["FIELDS"] = $arFields;
	}
	//получаем список всех типов
	$arSelect = Array("ID", "IBLOCK_ID", "NAME");
	$arFilter = Array("IBLOCK_ID"=>MEDIA_ARTICLE_TYPES_IBLOCK, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arResult['ARTICLE_TYPES'][$arFields["ID"]] = $arFields["NAME"];
	}
?>
