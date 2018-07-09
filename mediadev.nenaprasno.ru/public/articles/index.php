<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Profilaktika.Media");
?>

<div class="wrapper">
	<?$APPLICATION->IncludeComponent(
	    "bitrix:news.list",
	    "media-articles",
	    Array(
			"AJAX_MODE" => "N",
	        "ADD_SECTIONS_CHAIN" => "N",
	        "CACHE_FILTER" => "N",
	        "CACHE_GROUPS" => "N",
	        "CACHE_TIME" => "3600",
	        "CACHE_TYPE" => "A",
	        "DISPLAY_BOTTOM_PAGER" => "Y",
	        "DISPLAY_TOP_PAGER" => "N",
	        "FIELD_CODE" => array(),
	        "IBLOCK_ID" => MEDIA_ARTICLES_IBLOCK,
	        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
	        "NEWS_COUNT" => "9",
	        "PAGER_SHOW_ALWAYS" => "N",
	        "PAGER_TEMPLATE" => "main",
	        "PARENT_SECTION" => "",
	        "PARENT_SECTION_CODE" => "",
	        "PROPERTY_CODE" => array("*"),
	        "SET_STATUS_404" => "N",
	        "SET_TITLE" => "N",
	        "SORT_BY1" => "SORT",
	        "SORT_ORDER1" => "ASC",
	        "SORT_BY2" => "ACTIVE_FROM",
	        "SORT_ORDER2" => "DESC",
	    )
	);?>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>