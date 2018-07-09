<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');

if (! $USER->IsAuthorized()) {
    LocalRedirect('/');
}

CModule::IncludeModule('iblock');
$res = CIBlockElement::GetList(
    ['ID' => 'ASC'],
    ['IBLOCK_ID' => HSO_LETTERS_IBLOCK, 'PROPERTY_USER' => $USER->GetID()],
    false,
    false,
    ['ID', 'DETAIL_TEXT']
);
$letter = $res->Fetch();

if (isset($letter['DETAIL_TEXT']) && !empty($letter['DETAIL_TEXT'])) {
    $letter = $letter['DETAIL_TEXT'];
} else {
    $letter = '';
}

?>
<main class="main-content">
    <div class="wrapper">
        <div class="test-welcome">
            <div class="test-welcome-title">Мотивационное письмо</div>

            <div class="test-welcome-text active">
                <?$APPLICATION->IncludeFile(
                  SITE_DIR."include/letterHeader.php",
                  Array(),
                  Array("MODE"=>"html")
                  );
                ?>
                <? if ($_SESSION['letter-saved']): ?>
                    <p>&nbsp;</p>
                    <p>Письмо успешно сохранено, но вы можете его дополнить</p>
                <? endif ?>
            </div>
        </div>

        <form action="/ajax/letter/save.php" method="post" class="question-form">
            <div class="question-form-group">
                <label for="form-field-letter" class="question-form-label">Опишите, почему вы хотите участвовать в проекте</label>
                <textarea 
                    required 
                    name="letter" 
                    id="form-field-letter" 
                    class="question-form-textarea" 
                    cols="30" 
                    rows="18" 
                    style="height: auto"
                ><?=$letter?></textarea>
            </div>

            <div class="question-form-step-buttons">
                <button onclick="yaCounter24911267.reachGoal('letter'); return true;" class="button button-round button-orange">Сохранить</button>
            </div>
        </form>
    </div>
</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>