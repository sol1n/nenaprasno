<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>


    <main class="main-content">
        <div class="wrapper m-b-lg">
            <? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "", Array(), false); ?>

            <div class="page-title">
                <? $APPLICATION->ShowTitle() ?>
            </div>

            <div class="main-wrapper">
                <aside class="main-sidebar main-sidebar-left">
                    <? $APPLICATION->IncludeComponent("bitrix:catalog.section.list", "mainsite-publications-sections-list",
                        Array(
                            "VIEW_MODE" => "TEXT",
                            "SHOW_PARENT_NAME" => "N",
                            "IBLOCK_TYPE" => "mainsite",
                            "IBLOCK_ID" => "6",
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
                    ); ?>
                </aside>
                <div class="main-wrapper-column">

                    <?
                    $APPLICATION->IncludeComponent("bitrix:news.detail", "mainsite-publication", Array(
                        "USE_SHARE" => "N",
                        "AJAX_MODE" => "N",
                        "IBLOCK_TYPE" => "mainsite",
                        "IBLOCK_ID" => "6",
                        "ELEMENT_ID" => "",
                        "ELEMENT_CODE" => $_REQUEST['code'],
                        "CHECK_DATES" => "Y",
                        "FIELD_CODE" => Array("ID", "PREVIEW_PICTURE", "PREVIEW_TEXT", "DATE_CREATE"),
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
                    ),
                        false
                    );
                    ?>
                </div>
            </div>
        </div>

    </main>

<?
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php');
?>