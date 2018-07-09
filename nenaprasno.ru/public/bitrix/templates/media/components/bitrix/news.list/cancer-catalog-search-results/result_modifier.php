<?
    foreach ($arResult['ITEMS'] as $k => $item) {
        if ($arParams['URL_PREFIX']) {
            $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'] = $arParams['URL_PREFIX'] . $item['DETAIL_PAGE_URL'];
        }
        if ($arParams['LANG'] == 'en') {
            $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'] = '/en' . $arResult['ITEMS'][$k]['DETAIL_PAGE_URL'];
        }
    }
?>