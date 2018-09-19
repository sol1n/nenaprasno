<?
	//получаем список всех партнеров
	CModule::IncludeModule('iblock');
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
