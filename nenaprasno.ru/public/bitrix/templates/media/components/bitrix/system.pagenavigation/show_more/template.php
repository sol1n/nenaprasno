<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin("Загрузка навигации");
?>

<?if($arResult["NavPageCount"] > 1):?>

	<?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>
		<?
			$plus = $arResult["NavPageNomer"]+1;
			$url = $arResult["sUrlPathParams"] . "PAGEN_1=" . $plus
		?>

		<div class="articles-block-loadmore" data-url="<?=$url?>">
			<a>Ещё</a>
		</div>
	<?else:?>
<?/*
		<div class="articles-block-loadmore">
			<a>Загружено все</a>
		</div>
*/?>
	<?endif?>

<?endif?>