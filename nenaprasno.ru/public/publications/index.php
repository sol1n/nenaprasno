<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 


<main class="main-content">
    <div class="wrapper m-b-lg">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", Array(), false);?>

        <div class="page-title">
            Публикации
        </div>

        <div class="main-wrapper">
            <aside class="main-sidebar main-sidebar-left">
                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "mainsite-publications-sections-list",
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
                            "CACHE_GROUPS" => "Y"
                        )
                    );?>
            </aside>
            <div class="main-wrapper-column">
                <?
                    global $filter;
                    $filter = ['PROPERTY_TOP_VALUE' => 'Y'];
                    $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-top-publications-inner-block", array(
                      //"FILTER_NAME" => "filter",
                      "IBLOCK_ID" => "6",
                      "NEWS_COUNT" => "6",
                      "SORT_BY1" => "ID",
                      "SORT_ORDER1" => "DESC",
                      "FIELD_CODE" => array('DATE_CREATE', 'DATE_ACTIVE_FROM'),
                      "PROPERTY_CODE" => array("*"),
                      "SET_TITLE" => "N",
                      "SET_STATUS_404" => "N",
                      "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                      "ADD_SECTIONS_CHAIN" => "N",
                      "PARENT_SECTION" => "",
                      "PARENT_SECTION_CODE" => "",
                      "DISPLAY_TOP_PAGER" => "N",
                      "DISPLAY_BOTTOM_PAGER" => "N",
                      "PAGER_SHOW_ALWAYS" => "N",
                      "PAGER_TEMPLATE" => "main",
                      "CACHE_TYPE" => "A",
                      "CACHE_TIME" => "360000",
                      "CACHE_FILTER" => "Y",
                      "CACHE_GROUPS" => "N",
                    ),
                    false
                  );
                ?>

                <?/*
                    global $filterSmallPublications;
                    $filterSmallPublications = ['!PROPERTY_TOP_VALUE' => 'Y'];
                    $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-small-publications-inner-block", array(
                      "FILTER_NAME" => "filterSmallPublications",
                      "IBLOCK_ID" => "6",
                      "NEWS_COUNT" => "9",
                      "SORT_BY1" => "ID",
                      "SORT_ORDER1" => "DESC",
                      "FIELD_CODE" => array('DATE_CREATE', 'DATE_ACTIVE_FROM'),
                      "PROPERTY_CODE" => array("*"),
                      "SET_TITLE" => "N",
                      "SET_STATUS_404" => "N",
                      "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                      "ADD_SECTIONS_CHAIN" => "N",
                      "PARENT_SECTION" => "",
                      "PARENT_SECTION_CODE" => "",
                      "DISPLAY_TOP_PAGER" => "N",
                      "DISPLAY_BOTTOM_PAGER" => "Y",
                      "PAGER_SHOW_ALWAYS" => "N",
                      "PAGER_TEMPLATE" => "main",
                      "CACHE_TYPE" => "A",
                      "CACHE_TIME" => "360000",
                      "CACHE_FILTER" => "Y",
                      "CACHE_GROUPS" => "N",
                    ),
                    false
                  );
                */?>
               
            </div>
        </div>

    </div>

</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>