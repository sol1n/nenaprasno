<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 


<main class="main-content">
    <div class="wrapper m-b-lg">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", Array(), false);?>

        <div class="page-title">
            Партнеры
        </div>

        <div class="main-wrapper">
			<aside class="main-sidebar main-sidebar-left">
				<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "mainsite-partners-sections-list",
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
						)       
					);?>
			</aside>
            <div class="main-wrapper-column">
                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "mainsite-partners-sections-grid",
                    Array(
                            "VIEW_MODE" => "TEXT",
                            "SHOW_PARENT_NAME" => "N",
                            "IBLOCK_TYPE" => "mainsite",
                            "IBLOCK_ID" => "8",
                            "SECTION_ID" => "",
                            "SECTION_CODE" => "",
                            "SECTION_URL" => "",
                            "COUNT_ELEMENTS" => "Y",
                            "TOP_DEPTH" => "1",
                            "SECTION_FIELDS" => "",
                            "SECTION_USER_FIELDS" => "",
                            "ADD_SECTIONS_CHAIN" => "N",
                            "CACHE_TYPE" => "A",
                            "CACHE_TIME" => "360000",
                            "CACHE_NOTES" => "",
                            "CACHE_GROUPS" => "Y",
                        )       
                    );?>
            </div>
        </div>
    </div>

</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>