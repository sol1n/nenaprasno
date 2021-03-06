<? if (count($arResult['SECTIONS'])): ?>
    <? foreach ($arResult['SECTIONS'] as $section): ?>
        <? if ($section['ELEMENT_CNT'] > 0): ?>
            <div class="staff-section-title">
                <a href="/projects/vsho/students/<?=$section['NAME']?>/">
                    <?=$section['NAME']?>
                </a>
            </div>
            <?
                $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-students-list", array(
                  "IBLOCK_ID" => "20",
                  "NEWS_COUNT" => "30",
                  "SORT_BY1" => "SORT",
                  "SORT_ORDER1" => "ASC",
                  "FIELD_CODE" => array('DATE_CREATE', 'DATE_ACTIVE_FROM'),
                  "PROPERTY_CODE" => array("*"),
                  "SET_TITLE" => "Y",
                  "SET_STATUS_404" => "N",
                  "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                  "ADD_SECTIONS_CHAIN" => "Y",
                  "PARENT_SECTION" => "",
                  "PARENT_SECTION_CODE" => $section['NAME'],
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
        <? endif ?>
    <? endforeach ?>
<? endif ?>
