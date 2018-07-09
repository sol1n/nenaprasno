<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 

<main class="main-content">
    <div class="wrapper">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", Array(), false);?>

        <div class="page-title">
            Новости и события
        </div>

        <div class="main-wrapper">
            <aside class="main-sidebar main-sidebar-left">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "main-sidebar-menu", Array("ROOT_MENU_TYPE" => "aside"), false);?>
            </aside>
            <div class="main-wrapper-column">
                <div class="publications-block">
                    <?
                        global $filter;
                        $filter = ['PROPERTY_TOP_VALUE' => 'Y'];
                        $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-top-news-events-block", array(
                          "FILTER_NAME" => "filter",
                          "IBLOCK_ID" => "25",
                          "NEWS_COUNT" => "3",
                          "SORT_BY1" => "DATE_ACTIVE_FROM",
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

                    <?
                        global $filterSmallNews;
                        $filterSmallNews = ['!PROPERTY_TOP_VALUE' => 'Y'];
                        $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-small-news-events-block", array(
                          "FILTER_NAME" => "filterSmallNews",
                          "IBLOCK_ID" => "25",
                          "NEWS_COUNT" => "9",
                          "SORT_BY1" => "DATE_ACTIVE_FROM",
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
                    ?>

                <!-- closing div is placed in mainsite-small-newsblock template -->

            </div>
        </div>
    </div>

</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>