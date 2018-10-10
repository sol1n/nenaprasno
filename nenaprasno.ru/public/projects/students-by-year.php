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
            <li>
              <a href="/projects/vsho/students/">Резиденты</a>
            </li>
            <li class="active"><?=$_REQUEST['section']?></li>
          </ul>
        </div>

        <div class="page-title">
            Резиденты Высшей школы онкологии
        </div>

        <div class="main-wrapper">
            <div class="main-wrapper-column m-b-lg">
                <div class="staff-section-title">
                    <a><?=$_REQUEST['section']?></a>
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
