<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Profilaktika.Media");

$results = [];
if (isset($_GET['search']) && $_GET['search']) {
	CModule::IncludeModule('search');

	$obSearch = new CSearch;
	$obSearch->Search(array(
	    "QUERY" => $_GET['search'],
		"PARAM1" => 'media',
		"PARAM2" => 23
	));
	while ($element = $obSearch->GetNext()){
		$results[] = $element;
	}
}
?>

<div class="wrapper">
	<div class="cancer-catalog-block">
		<h1 class="cancer-catalog-block-title">
			Поиск по сайту
		</h1>
		<?$APPLICATION->IncludeComponent("bitrix:search.form","media-cancer-catalog-search",Array(
				"USE_SUGGEST" => "N",
				"PAGE" => "/search/index.php"
			)
		);?>

		<? if($results): ?>
			<div class="search-subtitle">Результаты поиска «<?=htmlspecialchars($_GET['search'])?>»:</div>
			<? foreach ($results as $result): ?>
				<a href="<?=$result["URL"]?>"><?=$result["TITLE_FORMATED"]?></a>
				<hr size="1" color="#DFDFDF">
			<? endforeach ?>
		<? else: ?>
			<div class="search-subtitle">По вашему запросу ничего не найдено</div>
		<? endif ?>
	</div>
	<div class="back-link">
		<a href="<?=$_SERVER['HTTP_REFERER'];?>">Вернуться назад</a>
	</div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
