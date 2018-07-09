<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>

<center style="margin: 190px 0">
  <h2>Запрашиваемая страница не найдена</h2>
</center>

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>