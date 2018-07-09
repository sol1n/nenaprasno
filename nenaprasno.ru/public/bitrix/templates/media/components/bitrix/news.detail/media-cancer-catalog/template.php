<article class="article-block article-block-wrapper">
	<h1 class="article-block-title"><?=$arResult['NAME'];?></h1>
	<p><?=$arResult['~DETAIL_TEXT'];?></p>
</article>

<div class="article-block-share cancer-catalog-share">
	<div class="article-block-share-title">
		Поделиться с друзьями
	</div>
	<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
	<script src="//yastatic.net/share2/share.js"></script>
	<div class="ya-share2" data-services="facebook,vkontakte,odnoklassniki,gplus,twitter" data-counter=""></div>
</div>

<?if(isset($arResult['PROPERTIES']['ADDITIONAL_ARTICLES']['VALUE'])):?>
	<div class="cancer-catalog-block-categories">
		<?foreach($arResult['PROPERTIES']['ADDITIONAL_ARTICLES']['VALUE'] as $aricle_id):?>
            <a href="<?=$arResult['ADDITIONAL_ARTICLES'][$aricle_id]['FIELDS']['DETAIL_PAGE_URL'];?>" class="cancer-catalog-block-category">
                <div class="cancer-catalog-block-category-title">
                    <?=$arResult['ADDITIONAL_ARTICLES'][$aricle_id]['FIELDS']['NAME'];?>
                </div>
                <div class="cancer-catalog-block-category-desc">
                    <?=$arResult['ADDITIONAL_ARTICLES'][$aricle_id]['PROPERTIES']['SUBTITLE']['VALUE'];?>
                </div>
            </a>
		<?endforeach;?>
	</div>
<?endif;?>

<div class="back-link">
	<a href="/cancer-catalog/">К справочнику</a>
</div>
