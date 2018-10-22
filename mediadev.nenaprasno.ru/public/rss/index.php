<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("RSS");
?>
<?$APPLICATION->IncludeComponent("bitrix:rss.out","",Array(
        "IBLOCK_TYPE" => "media",
        "IBLOCK_ID" => MEDIA_ARTICLES_IBLOCK,
        "SECTION_ID" => "",
        "SECTION_CODE" => "",
        "NUM_NEWS" => "",
        "NUM_DAYS" => "",
        "RSS_TTL" => "60",
        "YANDEX" => "N",
        "SORT_BY1" => "ACTIVE_FROM",
        "SORT_ORDER1" => "DESC",
        "SORT_BY2" => "SORT",
        "SORT_ORDER2" => "ASC",
        "FILTER_NAME" => "",
        "CACHE_TYPE" => "A",
        "CACHE_TIME" => "3600",
        "CACHE_GROUPS" => "Y",
        "CACHE_FILTER" => "N"
    )
);?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
