<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?><main class="main-content">

    <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"mainsite-slider",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(),
		"IBLOCK_ID" => "4",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "10",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PROPERTY_CODE" => array("*"),
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "SORT",
		"SORT_ORDER1" => "ASC"
	)
);?>

    <section class="about-fund b-gray">
        <div class="wrapper">
            <div class="block-title">
                <a href="/fund/" style="text-decoration: none; color: black;">О фонде</a>
            </div>

            <div class="about-fund-blocks">
                <div class="about-fund-blocks-col">
                    <a href="/fund/mission/" class="about-fund-block b-green">
                        <div class="about-fund-block-icon">
                            <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-about-fund-1.svg"; ?>
                        </div>
                        <div class="about-fund-block-text">
                            Что такое Фонд
                            профилактики рака
                            и зачем ему помощь?
                        </div>
                        <div class="about-fund-block-arrow">
                            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/assets/images/about-fund-arrow.svg"; ?>
                        </div>
                    </a>
                </div>
                <div class="about-fund-blocks-col">
                    <a href="/help/" class="about-fund-block b-blue">
                        <div class="about-fund-block-icon">
                            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-about-fund-2.svg"; ?>
                        </div>
                        <div class="about-fund-block-text">
                            Как можно помочь
                            деятельности Фонда?
                        </div>
                        <div class="about-fund-block-arrow">
                            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/assets/images/about-fund-arrow.svg"; ?>
                        </div>
                    </a>
                </div>
                <div class="about-fund-blocks-col">
                    <a href="/projects/" class="about-fund-block b-orange">
                        <div class="about-fund-block-icon">
                            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-about-fund-3.svg"; ?>
                        </div>
                        <div class="about-fund-block-text">
                            Куда будут потрачены
                            собранные средства?
                        </div>
                        <div class="about-fund-block-arrow">
                            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/assets/images/about-fund-arrow.svg"; ?>
                        </div>
                    </a>
                </div>
                <div class="about-fund-blocks-col">
                    <a href="/fund/reports/" class="about-fund-block b-red">
                        <div class="about-fund-block-icon">
                            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-about-fund-4.svg"; ?>
                        </div>
                        <div class="about-fund-block-text">
                            Где можно увидеть отчет
                            о деятельности Фонда?
                        </div>
                        <div class="about-fund-block-arrow">
                            <?php include  $_SERVER['DOCUMENT_ROOT'] . "/assets/images/about-fund-arrow.svg"; ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="projects-block p-t-xxl p-b-xxl b-gray">
        <div class="wrapper">
            <div class="block-title">
                 <a href="/projects/" style="text-decoration: none; color: black;">Проекты</a>
            </div>
            <?
              global $projectFilter;
              $projectFilter = ['PROPERTY_MAINPAGE_VALUE' => 'Y'];
            ?>

            <?$APPLICATION->IncludeComponent(
            	"bitrix:news.list",
            	"mainsite-projects-block",
            	Array(
                "FILTER_NAME" => "projectFilter",
            		"ADD_SECTIONS_CHAIN" => "N",
            		"CACHE_FILTER" => "N",
            		"CACHE_GROUPS" => "N",
            		"CACHE_TIME" => "60",
            		"CACHE_TYPE" => "A",
            		"DISPLAY_BOTTOM_PAGER" => "N",
            		"DISPLAY_TOP_PAGER" => "N",
            		"FIELD_CODE" => array(),
            		"IBLOCK_ID" => "7",
            		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
            		"NEWS_COUNT" => "3",
            		"PAGER_SHOW_ALWAYS" => "N",
            		"PAGER_TEMPLATE" => "main",
            		"PARENT_SECTION" => "",
            		"PARENT_SECTION_CODE" => "",
            		"PROPERTY_CODE" => array("*"),
            		"SET_STATUS_404" => "N",
            		"SET_TITLE" => "N",
            		"SORT_BY1" => "SORT",
            		"SORT_ORDER1" => "ASC"
            	)
            );?>

            <div class="project-block-load-more">
                <a href="/projects/" class="button button-gray-hollow button-round" style="width: 240px;">Ещё проекты</a>
            </div>
        </div>
    </section>

    <section class="news-block p-b-xxl p-t-xxl">
        <div class="wrapper">
            <div class="block-title">
                <a href="/fund/news-and-events/" style="text-decoration: none; color: black;">Новости и события</a>
            </div>

            <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"mainsite-newsblock",
	array(
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "360000",
		"CACHE_TYPE" => "A",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "DATE_ACTIVE_FROM",
			1 => "DATE_CREATE",
			2 => "",
		),
		"IBLOCK_ID" => "25",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"NEWS_COUNT" => "4",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "*",
			2 => "",
		),
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_ORDER1" => "DESC",
		"COMPONENT_TEMPLATE" => "mainsite-newsblock",
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
);?>

            <div class="project-block-load-more">
                <a href="/fund/news-and-events/" class="button button-gray-hollow button-round" style="width: 240px;">Ещё новости и события</a>
            </div>
        </div>
    </section>

  <? if (0): ?>
    <section class="publications-block p-t-xxl p-b-xxl">
        <div class="wrapper">
            <div class="block-title">
              <a href="/publications/" style="text-decoration: none; color: black;">Публикации</a>
            </div>

            <?
                global $filter;
                $filter = ['PROPERTY_TOP_VALUE' => 'Y'];
                $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-top-publications-block", array(
                  //"FILTER_NAME" => "filter",
                  "IBLOCK_ID" => "6",
                  "NEWS_COUNT" => "4",
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
                $filterSmallNews = ['!PROPERTY_TOP_VALUE' => 'Y'];
                $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-small-publications-block", array(
                  "FILTER_NAME" => "filterSmallNews",
                  "IBLOCK_ID" => "6",
                  "NEWS_COUNT" => "8",
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

            <div class="publications-block-load-more">
                <a href="/publications/" class="button button-gray-hollow button-round" style="width: 240px;">Все публикации</a>
            </div>
        </div>
    </section>
  <? endif ?>

    <?$APPLICATION->IncludeFile(
      SITE_DIR."include/donations/donate-block.php",
      Array(),
      Array("MODE"=>"html", "SHOW_BORDER" => false)
      );
    ?>
</main><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
