<?foreach ($arResult['ITEMS'] as $item):?>
	<a href="<?=$item['DETAIL_PAGE_URL'];?>" style="margin-bottom: 10px; display: inline-block;"><?=$item['~NAME'];?></a>
	<br>
<?endforeach;?>