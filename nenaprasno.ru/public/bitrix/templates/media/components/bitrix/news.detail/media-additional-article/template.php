<article class="article-block article-block-wrapper">
	<h1 class="article-block-title"><?=$arResult['NAME'];?></h1>
	<h2 class="c-orange"><?=$arResult['PROPERTIES']['SUBTITLE']['VALUE'];?></h2>
	<p><?=$arResult['~PREVIEW_TEXT'];?></p>
</article>

<div class="article-block-share cancer-catalog-share">
	<div class="article-block-share-title">
		Поделиться с друзьями
	</div>
	<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
	<script src="//yastatic.net/share2/share.js"></script>
	<div class="ya-share2" data-services="facebook,vkontakte,odnoklassniki,gplus,twitter" data-counter=""></div>
</div>

<div class="back-link">
	<a href="/cancer-catalog/main-articles/<?=$arResult['SECTION']['PATH'][0]['CODE'];?>/">Вернуться к основной статье</a>
</div>

<?/*if(isset($arResult['ADDITIONAL_ARTICLES'])):?>
	<div class="cancer-catalog-block-categories">
		<?foreach($arResult['ADDITIONAL_ARTICLES'] as $aricle):?>
			<?
			$active_link = '';
			if($aricle['FIELDS']['ID'] == $arResult['ID']){
				$active_link = 'active';
			}
			?>
				<a href="<?=$aricle['FIELDS']['DETAIL_PAGE_URL'];?>" class="cancer-catalog-block-category <?=$active_link?>">
                    <div class="cancer-catalog-block-category-title">
                        <?=$aricle['FIELDS']['NAME'];?>
                    </div>
                    <div class="cancer-catalog-block-category-desc">
                        <?=$aricle['PROPERTIES']['SUBTITLE']['VALUE'];?>
                    </div>
				</a>
		<?endforeach;?>
	</div>
<?endif;*/?>

<?
	$i = 0;

	foreach($arResult['ADDITIONAL_ARTICLES'] as $key => $add_article){
		if($arResult['ID'] == $key)
			$curr_num = $i;
		$arr_add_numer[$i]['NAME'] = $add_article['FIELDS']['NAME'];
		$arr_add_numer[$i]['URL'] = $add_article['FIELDS']['DETAIL_PAGE_URL'];
		$i++;
	}

	$add_articles_cnt = count($arr_add_numer);
?>

<?if($add_articles_cnt>1):?>
	<div class="article-block-navigator article-block-navigator-with-border m-t-lg m-b-lg">
		<?if($add_articles_cnt>2):?>
			<?if($curr_num == 0):?>
				<a href="<?=$arr_add_numer[$add_articles_cnt-1]['URL'];?>" class="article-block-navigator-prev">
					Предыдущая статья
					<span class="article-block-navigator-title">
						<?=$arr_add_numer[$add_articles_cnt-1]['NAME'];?>
					</span>
				</a>
			<?else:?>
				<a href="<?=$arr_add_numer[$curr_num-1]['URL'];?>" class="article-block-navigator-prev">
					Предыдущая статья
					<span class="article-block-navigator-title">
						<?=$arr_add_numer[$curr_num-1]['NAME'];?>
					</span>
				</a>
			<?endif;?>
			<hr>
			<?if($curr_num == ($add_articles_cnt-1)):?>
				<a href="<?=$arr_add_numer[0]['URL'];?>" class="article-block-navigator-next">
					Следующая статья
					<span class="article-block-navigator-title">
						<?=$arr_add_numer[0]['NAME'];?>
					</span>
				</a>
			<?else:?>
				<a href="<?=$arr_add_numer[$curr_num+1]['URL'];?>" class="article-block-navigator-next">
					Следующая статья
					<span class="article-block-navigator-title">
						<?=$arr_add_numer[$curr_num+1]['NAME'];?>
					</span>
				</a>
			<?endif;?>
		<?else:?>
			<hr>
			<?if($curr_num == 0):?>
				<a href="<?=$arr_add_numer[1]['URL'];?>" class="article-block-navigator-next">
					Следующая статья
					<span class="article-block-navigator-title">
						<?=$arr_add_numer[1]['NAME'];?>
					</span>
				</a>
			<?else:?>
				<a href="<?=$arr_add_numer[0]['URL'];?>" class="article-block-navigator-prev">
					Предыдущая статья
					<span class="article-block-navigator-title">
						<?=$arr_add_numer[0]['NAME'];?>
					</span>
				</a>
			<?endif;?>
		<?endif;?>
	</div>
<?endif;?>
