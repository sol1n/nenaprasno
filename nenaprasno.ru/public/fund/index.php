<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?><main class="main-content">
<div class="wrapper m-b-lg">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	"",
Array()
);?>
	<div class="page-title">
		 Фонд
	</div>
	<div class="fund-catalog">
		<div class="row">
			<div class="col-xs-12 col-md-6">
 <a href="/fund/mission/" class="fund-catalog-item">
				Миссия и направления деятельности <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a> <a href="/fund/supervisors/" class="fund-catalog-item">
				Попечительский совет <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a> <a href="/fund/employees/" class="fund-catalog-item">
				Сотрудники Фонда <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a> <a href="/fund/documents/" class="fund-catalog-item">
				Учредительные документы <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a> <a href="/fund/reports/" class="fund-catalog-item">
				Отчеты Фонда <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a>
				<a href="/upload/nnp_policy.pdf" class="fund-catalog-item" target="_blank">
				Политика конфиденциальности <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a>


			</div>
			<div class="col-xs-12 col-md-6">
 <a href="/fund/requisites/" class="fund-catalog-item">
				Банковские реквизиты <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a> <a href="/fund/gratitudes/" class="fund-catalog-item">
				Благодарственные письма <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a> <a href="/fund/smi/" class="fund-catalog-item">
				СМИ о Фонде <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a> 
				<a href="/fund/news-and-events/" class="fund-catalog-item">
				Новости и события<?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-fund-catalog-item-arrow.svg" ;?> </a>
			</div>
		</div>
	</div>
</div>
 </main><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>