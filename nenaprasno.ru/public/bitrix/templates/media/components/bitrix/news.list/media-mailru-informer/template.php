<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>

<?
$months = array("01" => "Января", "02" => "Февраля",
"03" => "Марта", "04" => "Апреля", "05" => "Мая", "06" => "Июня",
"07" => "Июля", "08" => "Августа", "09" => "Сентября",
"10" => "Октября", "11" => "Ноября", "12" => "Декабря");

//логотип для информера
$informer = array();
$informer["logo"] = 'https://media.nenaprasno.ru/assets/images/logo-informer.png';

if (count($arResult['ITEMS'])){
    foreach ($arResult['ITEMS'] as $key => $item){
        if (!empty($item['DETAIL_TEXT'])){
            //первые две новости с превью
            if ($key <= 1){
                $img = CFile::ResizeImageGet($item['PREVIEW_PICTURE'], array('width'=>320, 'height'=>240), BX_RESIZE_IMAGE_PROPORTIONAL, true);
                $informer["news"][$key]["img_retina"] = 'https://media.nenaprasno.ru'.$img['src'];
            }
            //обрезаем заголовок по 75 символов и добавляем ... в конце
            $title = substr($item['NAME'], 0, 75);
            $title = rtrim($title, "!,.-");
            $title = substr($title, 0, strrpos($title, ' '));
            $title .= "…";
            $informer["news"][$key]["title"] = $title;
            //преобразуем дату в формат D MONTH на русском языке
            date_default_timezone_set('Europe/Moscow');
            $day = date("j", strtotime($item['ACTIVE_FROM']));
            $month = $months[date("m", strtotime($item['ACTIVE_FROM']))];
            $informer["news"][$key]["datetime"] = $day.' '.$month;
            //ссылка на новость
            $informer["news"][$key]["url"] = 'https://media.nenaprasno.ru'.$item['DETAIL_PAGE_URL'];
        }
    }
    echo json_encode($informer);
}
?>
