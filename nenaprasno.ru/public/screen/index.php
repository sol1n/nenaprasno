<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

$obCache = new CPHPCache();
$cachePath = '/nenaprasno.ru/screen-users/';
if( $obCache->InitCache(600, 'screen-users', $cachePath) ) {
    $vars = $obCache->GetVars();
    $users = $vars['screen-users'];
}
elseif( $obCache->StartDataCache()  ) {
    $request = curl_init();
	curl_setopt($request, CURLOPT_URL, CABINET_URL . '/users');
	curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($request);
	curl_close ($request);
	$result = json_decode($result);
	$users = $result->users;
    $obCache->EndDataCache(array('screen-users' => $users));
}

?>

<div id="app" data-form-id="1">
 <main class="main-content">
	<div class="wrapper">
		<form-app :form="formData"></form-app>
	</div>
 </main>
</div>
 <section class="testers-counter-block">
<div class="wrapper">
	<div class="testers-counter-block-icon">
 <img src="/assets/images/icons-testers.png" alt="">
	</div>
	<div class="testers-counter-block-num">
		<?=number_format($users, 0, '', ' ')?>
	</div>
	<div class="testers-counter-block-desc">
		 людей протестировано
	</div>
</div>
 </section> <section class="how-test-works-block p-t-xxl p-b-xxl">
<div class="wrapper">
	<div class="block-title how-test-works-block-title">
		 Как работает тестирование?
	</div>
	<div class="how-test-works-block-items">
		<div class="how-test-works-block-item">
			<div class="how-test-works-block-item-icon">
				 <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-how-test-works-test.svg"); ?>
			</div>
			<div class="how-test-works-block-item-text">
				 Пройдите простой тест и узнайте свой риск рака
			</div>
			<div class="how-test-works-block-item-num">
				 1
			</div>
		</div>
		<div class="how-test-works-block-item">
			<div class="how-test-works-block-item-icon">
				 <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-how-test-works-calendar.svg"); ?>
			</div>
			<div class="how-test-works-block-item-text">
				 Получите индивидуальный график обследований
			</div>
			<div class="how-test-works-block-item-num">
				 2
			</div>
		</div>
		<div class="how-test-works-block-item">
			<div class="how-test-works-block-item-icon">
				 <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-how-test-works-clinic.svg"); ?>
			</div>
			<div class="how-test-works-block-item-text">
				 Узнайте проверенные клиники для прохождения обследований
			</div>
			<div class= "how-test-works-block-item-num">
				 3
			</div>
		</div>
		<div class="how-test-works-block-item">
			<div class="how-test-works-block-item-icon">
				 <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-how-test-works-email.svg"); ?>
			</div>
			<div class="how-test-works-block-item-text">
				 Получайте регулярные напоминания о необходимых обследованиях на почту
			</div>
			<div class="how-test-works-block-item-num">
				 4
			</div>
		</div>
	</div>
</div>
 </section>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section.list",
	"mainsite-logotypes",
	Array(
		"ADD_SECTIONS_CHAIN" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_NOTES" => "",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COUNT_ELEMENTS" => "Y",
		"IBLOCK_ID" => "21",
		"IBLOCK_TYPE" => "",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => "",
		"SECTION_ID" => "",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => "",
		"SHOW_PARENT_NAME" => "Y",
		"TOP_DEPTH" => "1",
		"VIEW_MODE" => "TEXT"
	)
);?><?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
