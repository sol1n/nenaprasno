<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 


<main class="main-content">
    <div class="wrapper m-b-lg">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", Array(), false);?>

        <div class="page-title">
            <?$APPLICATION->ShowTitle()?>
        </div>

        <div class="main-wrapper">
			<aside class="main-sidebar main-sidebar-left">
				<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "mainsite-publications-sections-list",
					Array(
							"VIEW_MODE" => "TEXT",
							"SHOW_PARENT_NAME" => "N",
							"IBLOCK_TYPE" => "mainsite",
							"IBLOCK_ID" => "8",
							"SECTION_ID" => "",
							"SECTION_CODE" => "",
							"SECTION_URL" => "",
							"COUNT_ELEMENTS" => "N",
							"TOP_DEPTH" => "1",
							"SECTION_FIELDS" => "",
							"SECTION_USER_FIELDS" => "",
							"ADD_SECTIONS_CHAIN" => "N",
							"CACHE_TYPE" => "A",
							"CACHE_TIME" => "360000",
							"CACHE_NOTES" => "",
							"CACHE_GROUPS" => "Y",
							"OPENED" => $_REQUEST['section']
						)       
					);?>
			</aside>
            <div class="main-wrapper-column">
                <?
                    $APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"mainsite-partners-list", 
	array(
		"IBLOCK_ID" => "8",
		"NEWS_COUNT" => "30",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC",
		"FIELD_CODE" => array(
			0 => "DATE_ACTIVE_FROM",
			1 => "DATE_CREATE",
			2 => "",
		),
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "*",
			2 => "",
		),
		"SET_TITLE" => "Y",
		"SET_STATUS_404" => "N",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => $_REQUEST["section"],
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "360000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "N",
		"COMPONENT_TEMPLATE" => "mainsite-partners-list",
		"IBLOCK_TYPE" => "-",
		"SORT_BY2" => "SORT",
		"SORT_ORDER2" => "ASC",
		"FILTER_NAME" => "",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"SET_BROWSER_TITLE" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_META_DESCRIPTION" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"PAGER_TITLE" => "Новости",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => ""
	),
	false
);
                ?>
            </div>
        </div>
    </div>

</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>