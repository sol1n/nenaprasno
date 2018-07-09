<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Profilaktika.Media");
?>

<div class="wrapper">
	<?
	  $APPLICATION->IncludeComponent("bitrix:news.detail", "media-article", Array(
			  "USE_SHARE" => "N",
			  "AJAX_MODE" => "N",
			  "IBLOCK_TYPE" => "media",
			  "IBLOCK_ID" => MEDIA_ARTICLES_IBLOCK,
			  "ELEMENT_ID" => "",
			  "ELEMENT_CODE" => $_REQUEST['code'],
			  "CHECK_DATES" => "Y",
			  "FIELD_CODE" => Array("ID", "PREVIEW_PICTURE", "DETAIL_PICTURE", "PREVIEW_TEXT", "DETAIL_TEXT", "DATE_CREATE", "SHOW_COUNTER"),
			  "PROPERTY_CODE" => Array("*"),
			  "SET_TITLE" => "Y",
			  "SET_CANONICAL_URL" => "Y",
			  "SET_BROWSER_TITLE" => "Y",
			  "BROWSER_TITLE" => "NAME",
			  "SET_META_KEYWORDS" => "Y",
			  "META_KEYWORDS" => "-",
			  "SET_META_DESCRIPTION" => "Y",
			  "META_DESCRIPTION" => "-",
			  "SET_STATUS_404" => "Y",
			  "SET_LAST_MODIFIED" => "Y",
			  "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			  "ADD_SECTIONS_CHAIN" => "Y",
			  "ADD_ELEMENT_CHAIN" => "Y",
			  "ACTIVE_DATE_FORMAT" => "d.m.Y",
			  "USE_PERMISSIONS" => "N",
			  "GROUP_PERMISSIONS" => Array(),
			  "CACHE_TYPE" => "A",
			  "CACHE_TIME" => "3600",
			  "CACHE_GROUPS" => "Y",
			  "DISPLAY_TOP_PAGER" => "N",
			  "DISPLAY_BOTTOM_PAGER" => "N",
			  "SET_STATUS_404" => "Y",
			  "SHOW_404" => "Y",
			  "SAME_SEC_CNT" => 3,// сколько выводить связанных по теме материалов
			  "NEW_CNT" => 3,// сколько выводить новых материалов
		  ),
	  false
	  );
	?>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
