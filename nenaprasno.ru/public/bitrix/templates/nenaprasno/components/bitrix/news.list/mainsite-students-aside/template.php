<? if (count($arResult['ITEMS'])): ?>
    <nav class="main-sidebar-menu">
        <ul>
            <? foreach ($arResult['ITEMS'] as $item): ?>
                <? if ($item['ID'] != $arParams['SELECTED']): ?>
                    <li>
                        <a href="/project/vsho/students/<?=$item['ID']?>/">
                            <?=$item['NAME']?>
                        </a>
                    </li>
                <? else: ?>
                    <li class="active">
                        <a href="/project/vsho/students/<?=$item['ID']?>/" class="selected">
                            <?=$item['NAME']?>
                        </a>
                    </li>
                <? endif ?>
            <? endforeach ?>
        </ul>
    </nav>
<? endif ?>
