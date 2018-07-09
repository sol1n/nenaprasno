<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Главная");
?>
<main id="vue-app" class="main-content">
    <div class="wrapper">

        <? if (! $USER->IsAuthorized()): ?>
            <? include(__DIR__ . '/templates/login.php'); ?>
        <? else: ?>
        	<? if (array_key_exists('start', $_REQUEST)): ?>
        		<? include(__DIR__ . '/templates/beginTest.php'); ?>
        		<? die; ?>
        	<? endif ?>
        	<? $userData = getTestInfo($USER->GetID()); ?> 
            <? if ($userData['accepted']): ?> 
                <? 
                    $testInfo = getTest($userData); 
                    if (($testInfo == null) && array_key_exists('begin', $_REQUEST)){ 
                        $testInfo = beginTest($userData); 
                    } 
                ?> 
 
                <? if ($testInfo['begin']): ?> 
                    <? if (checkTestTime($testInfo)): ?> 
                        <? include(__DIR__ . '/templates/test.php'); ?> 
                    <? else: ?> 
                        <? include(__DIR__ . '/templates/testTimeIsOver.php'); ?> 
                    <? endif ?> 
 
                <? else: ?> 
                    <? include(__DIR__ . '/templates/testClosed.php'); ?>
                <? endif ?> 
                 
            <? else: ?> 
            	<? include(__DIR__ . '/templates/testClosed.php'); ?>
            <? endif ?> 
            
        <? endif ?>
    </div>
</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>