<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>
<section class="articles-block">
	<? if ($arResult['ON_MAIN']): ?>
		<?foreach($arResult['ON_MAIN'] as $on_main_element):?>
			<article class="articles-block-item articles-block-item-inverse articles-block-item-featured">
				<a href="<?=$on_main_element['FIELDS']["DETAIL_PAGE_URL"];?>" class="articles-block-item-link">
					<div class="articles-block-item-bg">
						<? $img = CFile::ResizeImageGet($on_main_element['FIELDS']['PREVIEW_PICTURE'], array('width'=>1140 * 2, 'height'=>440 * 2), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
						<img src="<?=$img['src']?>" alt="<?=$on_main_element['FIELDS']['NAME'];?>">
					</div>
					<div class="articles-block-item-overlay">
						<?
						$color1 = 'title-c-black';
						if($on_main_element['PROPERTIES']['TITLE_COLOR']['VALUE'] == 'белый'){
							$color1 = 'title-c-white';
						}
						?>
						<div class="articles-block-item-title <?=$color1;?>">
							<?=$on_main_element['FIELDS']['NAME'];?>
						</div>
						<?/* <div class="articles-block-item-subtitle <?=$color1;?>">
							<?=$on_main_element['PROPERTIES']['SUBTITLE']['VALUE'];?>
						</div> */?>
					</div>
				</a>
			</article>
		<?endforeach;?>
	<? endif ?>

	<?
	$length = count($arResult['ITEMS']);
	$row_num = 1;
	?>
    <? if ($length): ?>
        <div class="row n1">
        <? foreach ($arResult['ITEMS'] as $k => $item): ?>
            <div class="col-xs-12 col-md-4">
                <article class="articles-block-item">
                    <a href="<?=$item["DETAIL_PAGE_URL"];?>" class="articles-block-item-link">
                        <div class="articles-block-item-bg">
							<? $img = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array('width'=>369 * 2, 'height'=>230 * 2), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
                            <img src="<?=$img['src']?>" alt="<?=$item['NAME']?>">
							<? if (!empty($item['PROPERTIES']['ARTICLE_TYPE']['VALUE'])): ?>
								<div class="articles-block-tag"><?=$arResult['ARTICLE_TYPES'][$item['PROPERTIES']['ARTICLE_TYPE']['VALUE']]?></div>
							<? endif; ?>
                        </div>
						<?
						$partners_material = '';
						if (!empty($item['PROPERTIES']['PARTNER']['VALUE'])){
							$partners_material = 'partners-title';
						}
						?>
                        <div class="articles-block-item-overlay <?=$partners_material;?>">
                            <div class="articles-block-item-title" >
                                <?=$item['NAME']?>
                            </div>
                        </div>
                    </a>
					<? if (!empty($item['PROPERTIES']['PARTNER']['VALUE'])): ?>
						<div class="article-block-item-partner">
							<div class="partners-col">
								<div class="article-partner-title">
									Партнерский материал
								</div>
							</div>
							<div class="partners-col">
								<? $partner_link = $arResult['PARTNERS'][$item['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['PREVIEW_TEXT'];?>
								<? if (!empty($partner_link)): ?>
									<? $partner_link = 'href="'.$partner_link.'"'; ?>
								<? else: ?>
									<? $partner_link = ""; ?>
								<? endif; ?>
								<a class="article-partner-logo" <?=$partner_link;?> target="_blank">
									<? $partner_img = CFile::ResizeImageGet($arResult['PARTNERS'][$item['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['PREVIEW_PICTURE'], array('width'=>80, 'height'=>32), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
									<img src="<?=$partner_img['src']?>" alt="<?=$arResult['PARTNERS'][$item['PROPERTIES']['PARTNER']['VALUE']]['FIELDS']['NAME']?>">
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
            <? if (($k + 1) % $arParams["NEWS_COUNT"] == 0 && $k != $length - 1): ?>
                </div>
				<?$row_num++;?>
                <div class="row<?=$row_num;?>">
            <? endif ?>
        <? endforeach ?>
        </div>
    <? endif ?>
	<?=$arResult['NAV_STRING']?>
</section>
