<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

?>
<center style="margin: 200px 0">
  <h1>Страница не найдена</h1>
</center>

<?

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>