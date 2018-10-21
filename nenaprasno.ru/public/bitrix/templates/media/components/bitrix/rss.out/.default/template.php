<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);

function get_enclosure($txt){
    preg_match_all('/<img[^>]+>/i',$txt, $imgs_tags); //находим в тексте все теги <img />

    $images = array();//массив изображений и их атрибутов
    $enclosure = array();
    foreach($imgs_tags[0] as $key => $img){
        preg_match_all('/(alt|title|src)=("[^"]*")/i',$img, $images[$key]);//находим атрибуты изображения
        //получаем знаечние атрибута src
        $src = substr($images[$key][0][1],5);
        $src = substr($src, 0, -1);

        if(stristr($src, 'http') === FALSE) {
            $src = $_SERVER['DOCUMENT_ROOT'].$src;
        }
        $size = getimagesize($src);

        $enclosure[$key]['url'] = $src;            //получаем знаечние атрибута src
        //$enclosure[$key]['width'] = $size[0];      //получаем ширину изображения
        //$enclosure[$key]['height'] = $size[1];     //получаем высоту изображения
        $enclosure[$key]['type'] = $size['mime'];  //получаем mime-тип изображения

        $title = substr($images[$key][0][2],7);    //получаем значение атрибута title
        $title = substr($title, 0, -1);
        if(empty($title)){
            $title = substr($images[$key][0][0],5); //получаем значение атрибута alt
            $title = substr($title, 0, -1);
        }
        $enclosure[$key]['header'] = $title;          //получаем описание изображения
    }
    return $enclosure;
}
?>

<?='<?xml version="1.0" encoding="'.SITE_CHARSET.'"?>'?>
<rss version="2.0" xmlns:mailru="http://news.mail.ru/">
    <channel>
        <title>Фонд профилактики рака</title>
        <description>Новости</description>
        <link>https://media.nenaprasno.ru/</link>
        <language>ru</language>
        <generator>rss generator</generator>
        <managingEditor>email_manager</managingEditor>
        <webMaster>email_webmaster</webMaster>
        <? foreach($arResult["ITEMS"] as $arItem): ?>
            <?  $description_text = html_entity_decode($arItem["ELEMENT"]["PREVIEW_TEXT"]);
                $text = html_entity_decode($arItem["ELEMENT"]["DETAIL_TEXT"]);
                $full_text = preg_replace('/<img(?:\\s[^<>]*)?>/i', '', $text);
                $full_text = preg_replace('#<p class="pic-caption">.*?</p>#s', "", $full_text);
            ?>
            <? if (!empty($full_text)): ?>
                <item>
                    <guid><?=$arItem["ELEMENT"]["ID"]?></guid>
                    <? if($arItem["category"]): ?>
                        <category id="<?=$arItem["ELEMENT"]["IBLOCK_SECTION_ID"]?>"><?=substr($arItem["category"], 0, -1);?></category>
                    <? endif ?>
                    <title><![CDATA[<?=$arItem["title"]?>]]></title>
                    <description><![CDATA[<?=$description_text?>]]></description>
                    <link><?=$arItem["link"]?></link>
                    <pubDate><?=$arItem["pubDate"]?></pubDate>
                    <mailru:full-text><![CDATA[<?=$full_text?>]]></mailru:full-text>
                    <? if(is_array($arItem["enclosure"])): ?>
                        <enclosure url="<?=$arItem["enclosure"]["url"]?>" type="<?=$arItem["enclosure"]["type"]?>" header="Превью"/>
                    <? endif ?>
                    <?  $enc_data = get_enclosure($text);
                        $enc_diplay = '';
                        foreach($enc_data as $enc_item){
                            $enc_diplay = '<enclosure ';
                            foreach($enc_item as $attr => $value){
                                $enc_diplay .= (!empty($value)) ? ' '.$attr.'="'.$value.'"' : '';
                            }
                            $enc_diplay .= ' />';
                            echo $enc_diplay;
                        }
                    ?>
                </item>
            <? endif ?>
        <? endforeach ?>
    </channel>
</rss>
?>
