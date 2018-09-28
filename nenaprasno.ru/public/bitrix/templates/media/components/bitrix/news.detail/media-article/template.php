<div class="tip-popup">
	<div class="cross"></div>
	<div class="title"></div>
	<div class="text"></div>
</div>
<article class="article-block article-block-wrapper">
	<?if($arResult['PROPERTIES']['TYPE']['VALUE'] == 'Тип 2'):?>
		<!-- второй вариант детальной страницы-->
		<h1 class="article-block-title">
			<?=$arResult['NAME'];?>
		</h1>

		<div class="article-block-short-desc">
			<?=$arResult["~PREVIEW_TEXT"];?>
		</div>

		<?if($arResult['FIELDS']['SHOW_COUNTER']>0):?>
			<div class="article-block-views">
				<?=$arResult['FIELDS']['SHOW_COUNTER'];?>
			</div>
		<?endif;?>
		<?=$arResult["~DETAIL_TEXT"];?>
	<?else:?>
		<!-- первый вариант детальной страницы-->
		<div class="article-block-preview m-b-lg">
			<img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"];?>" class="article-block-preview-image" alt="">
			<?
			$color = 'c-black';
			$background = 'article-block-preview-background';
			$views_color = 'black-views';
			if($arResult['PROPERTIES']['TITLE_COLOR']['VALUE'] == 'белый'){
				$color = 'c-white';
				$views_color = '';
				$background = '';
			}
			?>
			<div class="article-block-preview-text <?=$background;?>">
				<h1 class="article-block-preview-title <?=$color;?>">
					<?=$arResult['NAME'];?>
				</h1>
				<div class="article-block-preview-desc <?=$color;?>">
					<?=$arResult["~PREVIEW_TEXT"];?>
				</div>
				<?if($arResult['FIELDS']['SHOW_COUNTER']>0):?>
					<div class="article-block-preview-views <?=$views_color;?>">
						<?=$arResult['FIELDS']['SHOW_COUNTER'];?>
					</div>
				<?endif;?>
			</div>
		</div>
		<?=$arResult["~DETAIL_TEXT"];?>
	<?endif;?>
</article>

<div class="article-block-meta">
	<div class="row">
		<div class="col-xs-12 col-md-6">
			<div class="article-block-author">
				<div class="article-block-author-photo">
					<img src="<?=CFile::GetPath($arResult['PROPERTIES']['AUTHOR_PHOTO']['VALUE'])?>" alt="<?=$arResult['PROPERTIES']['AUTHOR_NAME']['VALUE'];?>"/>
				</div>
				<div class="article-block-author-text">
					<div class="article-block-author-name">
						<?=$arResult['PROPERTIES']['AUTHOR_NAME']['VALUE'];?>
					</div>
					<div class="article-block-author-title">
						<?=$arResult['PROPERTIES']['AUTHOR_TITLE']['VALUE'];?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-md-6">
			<div class="article-block-share">
				<div class="article-block-share-title">
					Поделиться с друзьями
				</div>

				<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
				<script src="//yastatic.net/share2/share.js"></script>
				<div class="ya-share2" data-services="facebook,vkontakte,odnoklassniki,gplus,twitter" data-counter=""></div>
			</div>
		</div>
	</div>

	<div class="row">
		<?if(isset($arResult['PROPERTIES']['TAGS']['VALUE'])):?>
			<div class="col-xs-12 col-md-6">
				<div class="article-block-tags m-t-md m-b-md">
					<?foreach($arResult['PROPERTIES']['TAGS']['VALUE'] as $tag):?>
						<a href="/articles/tags/<?=$arResult["TAGS"][$tag]["FIELDS"]["CODE"];?>/" class="article-block-tags-item">
							<?=$arResult["TAGS"][$tag]["FIELDS"]["NAME"];?>
						</a>
					<?endforeach;?>
				</div>
			</div>
		<?endif;?>

		<div class="col-xs-12 col-md-6"><?//unset($_SESSION['subscribe-success']); ?>
			<form action="/api/subscribe/" method="POST" class="subscribe-block  m-t-md m-b-md">
				<? if ($_SESSION['subscribe-success']): ?>
					<p>Подписка на рассылку Profilaktika.Media оформлена, спасибо!</p>
					<?unset($_SESSION['subscribe-success']); ?>
				<?else:?>
					<input type="hidden" value="<?=$_SESSION['csrf']?>" name="csrf" />
					<div class="subscribe-block-title">
						Подписаться на лучшие материалы месяца
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-8">
							<input type="email" name="email" class="subscribe-block-input" placeholder="Email" required>
						</div>
						<div class="col-xs-12 col-sm-4">
							<input type="submit" class="subscribe-block-submit" value="Подписаться">
						</div>
					</div>
				<? endif ?>
			</form>
		</div>
	</div>

	<?
	CModule::IncludeModule('iblock');

	//получаем список всех партнеров
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT");
	$arFilter = Array("IBLOCK_ID"=>MEDIA_PARTNERS_IBLOCK, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arResult['PARTNERS'][$arFields["ID"]]["FIELDS"] = $arFields;
	}

	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "IBLOCK_SECTION_ID", "PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>MEDIA_ARTICLES_IBLOCK, "ACTIVE"=>"Y", "SECTION_ID" => $arResult["IBLOCK_SECTION_ID"]);
	$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$arSectionElements[$arFields["ID"]]["FIELDS"] = $arFields;
		$arSectionElements[$arFields["ID"]]["PROPERTIES"] = $arProps;
	}
	if (isset($arSectionElements[$arResult["ID"]]))//убираем текущий элемент из выборки
		unset($arSectionElements[$arResult["ID"]]);
	?>
	<?$same_sec_cnt = count($arSectionElements);?>
	<? if ($same_sec_cnt): ?>
		<section class="articles-block m-b-lg">
			<div class="articles-block-title m-b-md">
				Другие статьи по теме
			</div>
			<div class="row">
			<?$i = 0;?>
			<? foreach ($arSectionElements as $key => $section_element): ?>
				<?if($i>$arResult["SAME_SEC_CNT"]-1) break;?>
				<div class="col-xs-12 col-md-4">
				<?$img = CFile::GetFileArray($section_element["FIELDS"]["PREVIEW_PICTURE"]);?>
					<article class="articles-block-item">
						<a href="<?=$section_element["FIELDS"]["DETAIL_PAGE_URL"];?>" class="articles-block-item-link">
							<div class="articles-block-item-bg">
								<img src="<?=$img["SRC"];?>" alt="">
							</div>
							<?
							$partners_material = '';
							if (!empty($section_element['PROPERTIES']['PARTNER']['VALUE'])){
								$partners_material = 'partners-title';
							}
							?>
							<div class="articles-block-item-overlay <?=$partners_material;?>">
								<div class="articles-block-item-title title-c-black">
									<?=$section_element["FIELDS"]["NAME"];?>
								</div>
							</div>
						</a>
						<? if (!empty($section_element['PROPERTIES']['PARTNER']['VALUE'])): ?>
							<div class="article-block-item-partner">
								<div class="partners-col">
									<div class="article-partner-title">
										Партнерский материал
									</div>
								</div>
								<div class="partners-col">
									<? $partner_link = $arResult['PARTNERS'][$section_element['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['PREVIEW_TEXT'];?>
									<? if (!empty($partner_link)): ?>
										<? $partner_link = 'href="'.$partner_link.'"'; ?>
									<? else: ?>
										<? $partner_link = ""; ?>
									<? endif; ?>
									<a class="article-partner-logo" <?=$partner_link;?> target="_blank">
										<? $partner_img = CFile::ResizeImageGet($arResult['PARTNERS'][$section_element['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['PREVIEW_PICTURE'], array('width'=>80, 'height'=>32), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
										<img src="<?=$partner_img['src']?>" alt="<?=$arResult['PARTNERS'][$section_element['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['NAME']?>">
									</a>
								</div>
								<div class="partners-col">
									<? if (!empty($partner_link)): ?>
										<a <?=$partner_link;?> target="_blank" class="partners-link-icon">
											<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/partners-link.svg"); ?>
										</a>
									<? endif; ?>
								</div>
							</div>
						<? endif; ?>
					</article>
				</div>
				<? if (($i + 1) % 3 == 0 && $i != $same_sec_cnt - 1): ?>
					</div>
					<div class="row">
				<? endif ?>
				<?$i++;?>
			<? endforeach ?>
			</div>
			<?if($same_sec_cnt>$arResult["SAME_SEC_CNT"]):?>
				<?
					$res = CIBlockSection::GetByID($arResult["IBLOCK_SECTION_ID"]);
					if($arRes = $res->Fetch()){
						$section_code = $arRes["CODE"];
					}
				?>
				<div class="articles-block-loadmore">
					<a href="/articles/<?=$section_code;?>/">Ещё</a>
				</div>
			<?endif;?>
		</section>
	<? endif ?>

	<?
	CModule::IncludeModule('iblock');
	$arSelect = Array("ID", "IBLOCK_ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_PICTURE", "IBLOCK_SECTION_ID", "ACTIVE_FROM", "PROPERTY_*");
	$arFilter = Array("IBLOCK_ID"=>MEDIA_ARTICLES_IBLOCK, "ACTIVE"=>"Y");
	$res = CIBlockElement::GetList(Array("ACTIVE_FROM"=>"DESC"), $arFilter, false, Array("nPageSize"=>50), $arSelect);
	while($ob = $res->GetNextElement()){
		$arFields = $ob->GetFields();
		$arProps = $ob->GetProperties();
		$arNewElements[$arFields["ID"]]["FIELDS"] = $arFields;
		$arNewElements[$arFields["ID"]]["PROPERTIES"] = $arProps;
	}
	if (isset($arNewElements[$arResult["ID"]]))//убираем текущий элемент из выборки
		unset($arNewElements[$arResult["ID"]]);
	?>
	<?$new_cnt = count($arNewElements);?>
	<? if ($new_cnt): ?>
		<section class="articles-block">
			<div class="articles-block-title m-b-md">
				Новые материалы
			</div>
				<div class="row">
				<?
				$i = 0;
				?>
				<? foreach ($arNewElements as $key => $new_element): ?>
					<?if($i>$arResult["NEW_CNT"]-1) break;?>
					<div class="col-xs-12 col-md-4">
					<?$img = CFile::GetFileArray($new_element["FIELDS"]["PREVIEW_PICTURE"]);?>
						<article class="articles-block-item">
							<a href="<?=$new_element["FIELDS"]["DETAIL_PAGE_URL"];?>" class="articles-block-item-link">
								<div class="articles-block-item-bg">
									<img src="<?=$img["SRC"];?>" alt="">
								</div>
								<?
								$partners_material = '';
								if (!empty($new_element['PROPERTIES']['PARTNER']['VALUE'])){
									$partners_material = 'partners-title';
								}
								?>
								<div class="articles-block-item-overlay <?=$partners_material;?>">
									<div class="articles-block-item-title title-c-black">
										<?=$new_element["FIELDS"]["NAME"];?>
									</div>
								</div>
							</a>
							<? if (!empty($new_element['PROPERTIES']['PARTNER']['VALUE'])): ?>
								<div class="article-block-item-partner">
									<div class="partners-col">
										<div class="article-partner-title">
											Партнерский материал
										</div>
									</div>
									<div class="partners-col">
										<? $partner_link = $arResult['PARTNERS'][$new_element['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['PREVIEW_TEXT'];?>
										<? if (!empty($partner_link)): ?>
											<? $partner_link = 'href="'.$partner_link.'"'; ?>
										<? else: ?>
											<? $partner_link = ""; ?>
										<? endif; ?>
										<a class="article-partner-logo" <?=$partner_link;?> target="_blank">
											<? $partner_img = CFile::ResizeImageGet($arResult['PARTNERS'][$new_element['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['PREVIEW_PICTURE'], array('width'=>80, 'height'=>32), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
											<img src="<?=$partner_img['src']?>" alt="<?=$arResult['PARTNERS'][$new_element['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['NAME']?>">
										</a>
									</div>
									<div class="partners-col">
										<? if (!empty($partner_link)): ?>
											<a <?=$partner_link;?> target="_blank" class="partners-link-icon">
												<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/partners-link.svg"); ?>
											</a>
										<? endif; ?>
									</div>
								</div>
							<? endif; ?>
						</article>
					</div>
					<? if (($i + 1) % 3 == 0 && $i != $new_cnt - 1): ?>
						</div>
						<div class="row">
					<? endif ?>
					<?$i++;?>
				<? endforeach ?>
				</div>

			<? if ($new_cnt>$arResult["NEW_CNT"]): ?>
				<div class="articles-block-loadmore">
					<a href="/articles/">Ещё</a>
				</div>
			<? endif ?>
		</section>
	<? endif ?>
</div>
