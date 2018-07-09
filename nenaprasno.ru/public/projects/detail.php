<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 

<main class="main-content">
    <div class="wrapper">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", Array(), false);?>

        <?
            $APPLICATION->IncludeComponent("bitrix:news.detail", "mainsite-project", Array(
                    "USE_SHARE" => "N",
                    "AJAX_MODE" => "N",
                    "IBLOCK_TYPE" => "mainsite",
                    "IBLOCK_ID" => "7",
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
                    "META_DESCRIPTION" => "PREVIEW_TEXT",
                    "SET_STATUS_404" => "Y",
                    "SET_LAST_MODIFIED" => "Y",
                    "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
                    "ADD_SECTIONS_CHAIN" => "Y",
                    "ADD_ELEMENT_CHAIN" => "Y",
                    "ACTIVE_DATE_FORMAT" => "d.m.Y",
                    "USE_PERMISSIONS" => "N",
                    "GROUP_PERMISSIONS" => Array(),
                    "CACHE_TYPE" => "A",
                    "CACHE_TIME" => "60",
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
</main>

<?$APPLICATION->IncludeFile(
  SITE_DIR."include/donations/donate-block.php",
  Array(),
  Array("MODE"=>"html", "SHOW_BORDER" => false)
  );
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>