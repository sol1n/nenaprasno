<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty("keywords", "ординатура по онкологии, резидентура по онкологии, высшая школа онкологии, онколог, обучение онкологии, образовательный проект, фонд профилактики рака, профилактика рака, лечение рака");
$APPLICATION->SetPageProperty("description", "Конкурс в высшую школу онкологии - проект Фонда профилактики рака");
$APPLICATION->SetPageProperty("title", "Высшая школа онкологии");
$APPLICATION->SetTitle("Главная");
?> 

<main id="vue-app" class="main-content">
    <section class="homepage-welcome">
        <div class="wrapper">
            <div class="wrapper-small">
                <div class="homepage-welcome-title">
                    <? $APPLICATION->IncludeFile('/include/mainpage/homepage-welcome-title.php'); ?>
                </div>

                <div class="homepage-welcome-description">
                    <? $APPLICATION->IncludeFile('/include/mainpage/homepage-welcome-description.php'); ?>
                </div>

                <div class="homepage-welcome-buttons">
                    <a href="/registration/" class="button button-orange button-round" style="width: 220px;">Принять участие</a>
                    <? $APPLICATION->IncludeFile('/include/mainpage/homepage-welcome-buttons.php'); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="homepage-grants b-light-orange section-padding-top section-padding-bottom">
        <div class="wrapper-small">
            <? $APPLICATION->IncludeFile('/include/mainpage/homepage-grants.php'); ?>
        </div>
    </section>

    <section class="homepage-about-hso section-padding-top section-padding-bottom">
        <div class="wrapper-small">
            <? $APPLICATION->IncludeFile('/include/mainpage/homepage-about-hso.php'); ?>
        </div>
    </section>

    <section class="homepage-hso-is b-light-orange section-padding-top section-padding-bottom">
        <? $APPLICATION->IncludeFile('/include/mainpage/homepage-hso-is.php'); ?>
    </section>

    <section class="homepage-additional-program section-padding-top section-padding-bottom">
        <div class="wrapper">
            <? $APPLICATION->IncludeFile('/include/mainpage/homepage-additional-program.php'); ?>
        </div>
    </section>

    <div class="section-gray section-padding-top section-padding-bottom">
        <div class="wrapper">
            <div class="competition-conditions">
                <? $APPLICATION->IncludeFile('/include/mainpage/tours.php'); ?>
            </div>
        </div>
    </div>

    <section class="partners section-padding-top section-padding-bottom">
        <div class="partners-title">
            Партнеры
        </div>

        <?
        $APPLICATION->IncludeComponent("bitrix:news.list", "hso-partners", array(
            "IBLOCK_ID" => "2",
            "NEWS_COUNT" => "8",
            "SORT_BY1" => "SORT",
            "SORT_ORDER1" => "ASC",
            "FIELD_CODE" => array(),
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
            "CACHE_TIME" => "3600",
            "CACHE_FILTER" => "N",
            "CACHE_GROUPS" => "N",
        ),
            false
        );
        ?>
    </section>

    <section class="homepage-about-fund">
        <div class="wrapper">
            <div class="homepage-about-fund-title">
                О фонде
            </div>

            <div class="row">
                <div class="homepage-about-fund-desc">
                    <? $APPLICATION->IncludeFile('/include/mainpage/homepage-about-fund-desc.php'); ?>
                </div>
                <div class="homepage-about-fund-logo">
                    <a target="_blank" href="http://nenaprasno.ru/">
                        <img src="images/nenaprasno-logo.svg" alt="Фонд профилактики рака «Не напрасно»" width="273">
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>


<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>