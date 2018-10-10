<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?>

<main class="main-content">
    <div class="wrapper">
        <div class="breadcrumbs">
          <ul>
            <li>
              <a href="/">Главная</a>
            </li>
            <li>
              <a href="/projects/">Проекты</a>
            </li>
            <li>
              <a href="/projects/vsho/">Высшая школа онкологии</a>
            </li>
            <li class="active">Резиденты</li>
          </ul>
        </div>

        <div class="page-title">
            Резиденты Высшей школы онкологии
        </div>

        <div class="main-wrapper">
            <div class="main-wrapper-column">
                <?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "mainsite-residents-sections",
                    Array(
                            "VIEW_MODE" => "TEXT",
                            "SHOW_PARENT_NAME" => "N",
                            "IBLOCK_TYPE" => "mainsite",
                            "IBLOCK_ID" => "20",
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
