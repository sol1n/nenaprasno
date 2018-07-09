<?
$arResult["SAME_SEC_CNT"] = $arParams["SAME_SEC_CNT"];
$arResult["NEW_CNT"] = $arParams["NEW_CNT"];

$arSelect = Array("ID", "IBLOCK_ID", "NAME", "CODE", "PROPERTY_*");
$arFilter = Array("IBLOCK_ID"=>MEDIA_TAGS_IBLOCK, "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement()){
	$arFields = $ob->GetFields();
	$arProps = $ob->GetProperties();
	$arResult['TAGS'][$arFields["ID"]]["FIELDS"] = $arFields;
	$arResult['TAGS'][$arFields["ID"]]["PROPERTIES"] = $arProps;
}
?>
