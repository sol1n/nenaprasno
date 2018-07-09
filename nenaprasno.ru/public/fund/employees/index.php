<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>

<main class="main-content">
    <div class="wrapper">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", Array(), false);?>

        <div class="page-title">
            Сотрудники
        </div>

        <div class="main-wrapper">
            <aside class="main-sidebar main-sidebar-left">
                <?$APPLICATION->IncludeComponent("bitrix:menu", "main-sidebar-menu", Array("ROOT_MENU_TYPE" => "aside"), false);?>
            </aside>
            <div class="main-wrapper-column">
                
                <?
                    $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-employees-list", array(
                      "IBLOCK_ID" => "9",
                      "NEWS_COUNT" => "12",
                      "SORT_BY1" => "SORT",
                      "SORT_ORDER1" => "ASC",
                      "FIELD_CODE" => array('DATE_CREATE', 'DATE_ACTIVE_FROM'),
                      "PROPERTY_CODE" => array("*"),
                      "SET_TITLE" => "Y",
                      "SET_STATUS_404" => "N",
                      "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                      "ADD_SECTIONS_CHAIN" => "Y",
                      "PARENT_SECTION" => "",
                      "PARENT_SECTION_CODE" => $_REQUEST['section'],
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

            </div>
        </div>
    </div>

</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>