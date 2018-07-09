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
              <a href="/projects/vsho/students/">Студенты</a>
            </li>
            <li class="active"><?$APPLICATION->ShowTitle(false)?></li>
          </ul>
        </div>

        <div class="page-title">
            Студенты Высшей школы онкологии
        </div>

        <div class="main-wrapper">
            <aside class="main-sidebar main-sidebar-left">
              <?
                $APPLICATION->IncludeComponent("bitrix:news.list", "mainsite-students-aside", array(
                  "IBLOCK_ID" => "20",
                  "NEWS_COUNT" => "20",
                  "SORT_BY1" => "NAME",
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
                  "SELECTED" => $_REQUEST['id']
                ),
                false
              );
            ?>
            </aside>

            <div class="main-wrapper-column m-b-lg">
                <?
                      $APPLICATION->IncludeComponent("bitrix:news.detail", "mainsite-employees", Array(
                              "USE_SHARE" => "N",
                              "AJAX_MODE" => "N",
                              "IBLOCK_TYPE" => "hso",
                              "IBLOCK_ID" => "20",
                              "ELEMENT_ID" => $_REQUEST['id'],
                              "ELEMENT_CODE" => "",
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
                              "META_DESCRIPTION" => "-",
                              "SET_STATUS_404" => "Y",
                              "SET_LAST_MODIFIED" => "Y",
                              "INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
                              "ADD_SECTIONS_CHAIN" => "Y",
                              "ADD_ELEMENT_CHAIN" => "Y",
                              "ACTIVE_DATE_FORMAT" => "d.m.Y",
                              "USE_PERMISSIONS" => "N",
                              "GROUP_PERMISSIONS" => Array(),
                              "CACHE_TYPE" => "A",
                              "CACHE_TIME" => "3600",
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
        </div>
    </div>

</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>