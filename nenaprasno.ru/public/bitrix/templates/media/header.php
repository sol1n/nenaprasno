<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();

$meta_image = $APPLICATION->GetPageProperty("image");
if(!$meta_image)
	$APPLICATION->SetPageProperty('image', '/assets/images/logo.png');
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=500">
	<?$APPLICATION->ShowHead();?>
    <title><?$APPLICATION->ShowTitle();?></title>
    <link rel="icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="/assets/build/style.min.css">
	<meta property="og:title" content="<?$APPLICATION->ShowTitle();?>" />
	<meta property="og:description" content="<?$APPLICATION->ShowProperty("description");?>">
	<meta property="og:image" content="<?$APPLICATION->ShowProperty("image");?>">
	<meta property="og:image:url" content="<?$APPLICATION->ShowProperty("image");?>">
</head>
<body class="header-fixed">

<? if ($USER->IsAdmin()): ?>
	<? $APPLICATION->ShowPanel(); ?>
<? endif ?>

<header class="main-header">
    <div class="wrapper">
        <a href="/" class="main-header-toggler js-offcanvas">
			<img src="/assets/images/icon-menu.svg">
        </a>

        <a href="/" class="main-header-logo">
            <img src="/assets/images/logo.svg" alt="Profilaktika Media — Ненапрасно" width="230">
        </a>

        <a href="/" class="main-header-logo-mobile">
            <img src="/assets/images/logo-mobile.svg" alt="Profilaktika Media — Ненапрасно" width="120">
        </a>

		<?$APPLICATION->IncludeComponent("bitrix:menu", "main-header-menu", Array("ROOT_MENU_TYPE" => "top", "USE_EXT" => "Y"), false);?>

        <div class="main-header-right">
            <form action="" class="main-header-search">
                <a href="/search/" class="main-header-search-toggle js-search">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-search.svg"); ?>
                </a>
            </form>
            <?if(0)://скрыть вход/регистрацию?>
            <? $user = getAppercodeUser();?>
            <div class="main-header-userarea">
                <div class="main-header-userarea-links">
					<? if (is_null($user)): ?>
						<a href="<?=CABINET_URL?>/login">Вход</a>
						<br>
						<a href="<?=CABINET_URL?>/registration">Регистрация</a>
					<? else: ?>
						<a href="<?=CABINET_URL?>">
							<span style="margin-right: 20px">
								<? if (isset($user->userName)): ?>
									<?=$user->userName?>
								<? else: ?>
									Личный кабинет
								<? endif ?>
							</span>
						</a>
						<br>
						<a href="<?=CABINET_URL?>/logout">Выход</a>
					<? endif ?>
                </div>
            </div>
            <?endif;?>
        </div>

        <div class="main-header-right-mobile">
            <a href="/search/" class="main-header-search-toggle">
				<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-search.svg"); ?>
            </a>
            <?if(0)://скрыть вход/регистрацию?>
	            <a href="#" class="main-header-user-toggle">
					<?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-lock.svg"); ?>
	            </a>
            <?endif;?>
        </div>

    </div>
</header>

<div id="offcanvas" class="main-offcanvas-overlay">
	<nav class="main-offcanvas">
		<?$APPLICATION->IncludeComponent("bitrix:menu", "main-offcanvas-menu", Array("ROOT_MENU_TYPE" => "top", "USE_EXT" => "Y"), false);?>
		<?if(0)://скрыть вход/регистрацию?>
			<div class="main-offcanvas-padding">
				<? if (is_null($user)): ?>
					<a href="<?=CABINET_URL?>/login">Войти</a>
					&nbsp;|&nbsp;
					<a href="<?=CABINET_URL?>/registration">Зарегистрироваться</a>
				<? else: ?>
					<a href="<?=CABINET_URL?>">
						<span style="margin-right: 20px">
							<? if (isset($user->userName)): ?>
								<?=$user->userName?>
							<? else: ?>
								Личный кабинет
							<? endif ?>
						</span>
					</a>
					 &nbsp;|&nbsp;
					<a href="<?=CABINET_URL?>/logout">Выход</a>
				<? endif ?>
			</div>
		<?endif;?>
	</nav>
</div>

<div id="search-overlay" class="main-search-overlay">
    <nav class="main-search-wrapper">
        <?$APPLICATION->IncludeComponent("bitrix:search.form","media-overlay-search",Array(
                "USE_SUGGEST" => "N",
                "PAGE" => "/search/index.php"
            )
        );?>
    </nav>
</div>

<main class="main-content m-t-lg m-b-lg">
