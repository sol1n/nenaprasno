<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?><main class="main-content">
<div class="wrapper">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
Array()
);?>
	<div class="page-title">
		 Как помочь
	</div>
	<div class="fund-catalog p-b-xxl">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h3>КОРПОРАТИВНЫЕ ПРОГРАММЫ</h3>
			</div>
			<div class="col-xs-12 col-md-6">
 <a href="/help/corporate/" class="fund-catalog-item">
				Корпоративные пожертвования <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a>
			</div>
			<div class="col-xs-12 col-md-6">
 <a href="/help/friends/" class="fund-catalog-item">
				Клуб друзей Фонда <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a>
			</div>
			<div class="col-xs-12 col-md-12">
				<h3>ЧАСТНЫМ ЛИЦАМ</h3>
			</div>
			<div class="col-xs-12 col-md-6">
 <a href="/help/club/" class="fund-catalog-item">
				Клуб "Живу не напрасно" <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a>
			</div>
			<div class="col-xs-12 col-md-6">
 <a href="/help/volunteers/" class="fund-catalog-item">
				Стать волонтером Фонда <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a>
			</div>
			<div class="col-xs-12 col-md-6">
 <a href="/help/pozhertvovanie-cherez-sms/" class="fund-catalog-item">
				Пожертвование через СМС<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a>
			</div>
			<div class="col-xs-12 col-md-6">
				 &nbsp;
			</div>
 <a href="/#donate" class="button button-orange" style="border-color: #EC7361; background-color: #EC7361;">Помочь прямо сейчас</a>
		</div>
	</div>
</div>
 </main><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>