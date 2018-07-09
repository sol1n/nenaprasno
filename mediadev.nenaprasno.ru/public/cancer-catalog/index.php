<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Profilaktika.Media");
?>

    <div class="wrapper">

        <div class="cancer-catalog-block">
            <h1 class="cancer-catalog-block-title">
                Справочник видов рака
            </h1>

            <div class="cancer-catalog-block-desc">
				<?
				$APPLICATION->IncludeComponent("bitrix:main.include", ".default", array(
				   "AREA_FILE_SHOW" => "file",
				   "PATH" => "/include/cancer-catalog-intro.php",
				   "EDIT_TEMPLATE" => ""
				   ),
				   false
				);
				?>
            </div>

			<?$APPLICATION->IncludeComponent("bitrix:search.form","media-cancer-catalog-search",Array(
					"USE_SUGGEST" => "N",
					"PAGE" => "/api/search/cancer-catalog/index.php"
				)
			);?> 

			<div class="cancer-catalog-block-sections m-t-lg">
				<?
				CModule::IncludeModule('iblock');
				$arFilter = Array('IBLOCK_ID'=>MEDIA_CANCER_CATALOG_IBLOCK, 'GLOBAL_ACTIVE'=>'Y');
				$db_list = CIBlockSection::GetList(Array("NAME"=>"ASC"), $arFilter, true);
				while($ar_result = $db_list->GetNext())
				{	if($ar_result["ELEMENT_CNT"]>0)
						$ar_sections[$ar_result["ID"]]["NAME"] = $ar_result["NAME"];
				}

				$arSelect = Array("ID", "IBLOCK_ID", "NAME", "IBLOCK_SECTION_ID", "DETAIL_PAGE_URL", "PROPERTY_*");
				$arFilter = Array("IBLOCK_ID"=>MEDIA_CANCER_CATALOG_IBLOCK, "ACTIVE"=>"Y");
				$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
				while($ob = $res->GetNextElement()){
					$arFields = $ob->GetFields();
					$arProps = $ob->GetProperties();
					$ar_sections[$arFields["IBLOCK_SECTION_ID"]]["ELEMENTS"][$arFields["ID"]]["FIELDS"] = $arFields;
					$ar_sections[$arFields["IBLOCK_SECTION_ID"]]["ELEMENTS"][$arFields["ID"]]["PROPERTIES"] = $arProps;
				}
				?>
				<?foreach($ar_sections as $section):?>
					<div class="cancer-catalog-block-section">
						<div class="cancer-catalog-block-section-letter">
							<?=$section["NAME"];?>
						</div>
						<?foreach($section["ELEMENTS"] as $element):?>
							<div class="cancer-catalog-block-section-item">
								<a href="<?=$element["FIELDS"]["DETAIL_PAGE_URL"];?>"><?=$element["FIELDS"]["NAME"];?></a>
							</div>
						<?endforeach;?>
					</div>
				<?endforeach;?>
			</div>

        </div>

    </div>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>