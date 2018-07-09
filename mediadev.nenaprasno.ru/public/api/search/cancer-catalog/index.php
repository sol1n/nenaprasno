<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Profilaktika.Media");
?>

<div class="wrapper">
	<div class="cancer-catalog-block">
		<h1 class="cancer-catalog-block-title">
			Поиск по справочнику
		</h1>
		<?$APPLICATION->IncludeComponent("bitrix:search.form","media-cancer-catalog-search",Array(
				"USE_SUGGEST" => "N",
				"PAGE" => "/api/search/cancer-catalog/index.php"
			)
		);?>

		<?if(!empty($_REQUEST['search'])):?>
			<div class="search-subtitle">Результаты поиска «<?=$_REQUEST['search']?>»:</div>
		<?
			CModule::IncludeModule('search');

			$filter = array(
				'MODULE_ID' => 'iblock',
				'PARAM1' => 'media',
				'PARAM2' => MEDIA_CANCER_CATALOG_IBLOCK
			);

			$obTitle = new CSearchTitle;

			$obTitle->Search(
				$_REQUEST['search'],
				20,
				$filter,
				false,
				['ID' => 'ASC']
			);

			while($arResult = $obTitle->GetNext()){
			  $searchResults[] = $arResult['ITEM_ID'];
			}

			if (count($searchResults))
			{
				global $programFilter;
				$programFilter = ['ID' => $searchResults];

				$APPLICATION->IncludeComponent("bitrix:news.list", "cancer-catalog-search-results", array(
					"FILTER_NAME" => "programFilter",
					"IBLOCK_ID" => MEDIA_CANCER_CATALOG_IBLOCK,
					"NEWS_COUNT" => "20",
					"SORT_BY1" => "SORT",
					"SORT_ORDER1" => "ASC",
					"FIELD_CODE" => array(),
					"PROPERTY_CODE" => array(),
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
					"CACHE_TIME" => "360",
					"CACHE_FILTER" => "Y",
					"CACHE_GROUPS" => "N",
					"LANG" => $_REQUEST['lang']
				), false);
			}
			else
			{
				echo "Поиск не дал результатов, попробуйте изменить поисковую фразу";
			}
		endif;
		?>
	</div>
	<div class="back-link">
		<a href="<?=$_SERVER['HTTP_REFERER'];?>">Вернуться назад</a>
	</div>
</div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>