<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<? if (count($arResult['ITEMS'])): ?>
	<section class="articles-block">
		<div class="row n1">
		<? $length = count($arResult['ITEMS']); ?>
		<? foreach ($arResult['ITEMS'] as $k => $item): ?>
			<div class="col-xs-6 col-md-4">
				<article class="articles-block-item">
					<a href="<?=$item["DETAIL_PAGE_URL"];?>" class="articles-block-item-link">
						<div class="articles-block-item-bg">
							<? $img = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array('width'=>369 * 2, 'height'=>230 * 2), BX_RESIZE_IMAGE_PROPORTIONAL, true); ?>
							<img src="<?=$img['src']?>" alt="<?=$item['NAME']?>">
						</div>
						<div class="articles-block-item-overlay">
							<?
							$color = 'title-c-black';
							if($item['PROPERTIES']['TITLE_COLOR']['VALUE'] == 'белый'){
								$color = 'title-c-white';
							}
							?>
							<div class="articles-block-item-title <?=$color;?>">
								<?=$item['NAME']?>
							</div>
							<div class="articles-block-item-subtitle <?=$color;?>">
								<?=$item['PROPERTIES']['SUBTITLE']['VALUE']?>
							</div>
						</div>
					</a>
				</article>
			</div>
			<? if (($k + 1) % 3 == 0 && $k != $length - 1): ?>
				</div>
				<div class="row">
			<? endif ?>
		<? endforeach ?>
		</div>
		<?=$arResult['NAV_STRING']?>
	</section>
<? endif ?>
