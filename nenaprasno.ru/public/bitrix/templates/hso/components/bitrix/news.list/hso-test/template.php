<? if ($arResult['ITEMS']): ?>
  <? foreach ($arResult['ITEMS'] as $k => $item): ?>
    <?
      if ($arParams['answers'] && isset($arParams['answers'][$item['ID']]['answers'])){
        $answers = $arParams['answers'][$item['ID']]['answers'];
      } else {
        $answers = null;
      }
    ?>
    <div class="question-form-title-2">Вопрос <?=$k + 1?></div>

    <div class="question-form-group">
        <div class="question-form-text-description">
            <?=$item['PREVIEW_TEXT']?>
        </div>
        <label class="question-form-label question-form-label-small">
            Варианты ответа:
        </label>

        <? $variants = explode(PHP_EOL, $item['~DETAIL_TEXT']); ?>

        <? foreach ($variants as $j => $variant): ?>
            <div class="question-form-checkbox question-form-checkbox-variants">
                <input 
                    <? if (!is_null($answers) && in_array($j, $answers)): ?>
                        checked
                    <? endif ?>
                    name="answers[<?=$item['ID']?>][]" 
                    id="variant-<?=$item['ID']?>-<?=$j?>" 
                    type="checkbox" 
                    value="<?=$j?>" 
                />
                <label for="variant-<?=$item['ID']?>-<?=$j?>"><?=$variant?></label>
            </div>
        <? endforeach ?>
    </div>

  <? endforeach ?>
<? endif ?>