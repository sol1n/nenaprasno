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
		<!-- <lastBuildDate><?=date("r")?></lastBuildDate> -->
		<!-- <ttl><?=$arResult["RSS_TTL"]?></ttl> -->
		<!-- <?if(is_array($arResult["PICTURE"])):?>
			<?$image = substr($arResult["PICTURE"]["SRC"], 0, 1) == "/"? "http://".$arResult["SERVER_NAME"].$arResult["PICTURE"]["SRC"]: $arResult["PICTURE"]["SRC"];?>
			<?if($arParams["YANDEX"]):?>
				<yandex:logo><?=$image?></yandex:logo>
				<?
				$squareSize = min($arResult["PICTURE"]["WIDTH"], $arResult["PICTURE"]["HEIGHT"]);
				if ($squareSize > 0)
				{
					$squarePicture = CFile::ResizeImageGet(
						$arResult["PICTURE"],
						array("width" => $squareSize, "height" => $squareSize),
						BX_RESIZE_IMAGE_EXACT
					);
					if ($squarePicture)
					{
						$squareImage = substr($squarePicture["src"], 0, 1) == "/"? "http://".$arResult["SERVER_NAME"].$squarePicture["src"]: $squarePicture["src"];
						?><yandex:logo type="square"><?=$squareImage?></yandex:logo><?
					}
				}
				?>
			<?else:?>

				<image>
					<title><?=$arResult["NAME"]?></title>
					<url><?=$image?></url>
					<link><?="http://".$arResult["SERVER_NAME"]?></link>
					<width><?=$arResult["PICTURE"]["WIDTH"]?></width>
					<height><?=$arResult["PICTURE"]["HEIGHT"]?></height>
				</image>
			<?endif?>
		<?endif?> -->
<?//print_r($arResult["ITEMS"]);?>
        <?foreach($arResult["ITEMS"] as $arItem):?>
            <item>
                <guid><?=$arItem["ELEMENT"]["ID"]?></guid>
                <?if($arItem["category"]):?>
                    <category id="<?=$arItem["ELEMENT"]["IBLOCK_SECTION_ID"]?>"><?=substr($arItem["category"], 0, -1);?></category>
                <?endif?>
                <title><![CDATA[<?=$arItem["title"]?>]]></title>
                <description><![CDATA[<?=$arItem["description"]?>]]></description>
                <guid><?=$arItem["ELEMENT"]["ID"]?></guid>
                <link><?=$arItem["link"]?></link>
                <pubDate><?=$arItem["pubDate"]?></pubDate>
                <mailru:full-text><![CDATA[<?=$arItem["ELEMENT"]["DETAIL_TEXT"]?>]]></mailru:full-text>
                <?if(is_array($arItem["enclosure"])):?>
                    <enclosure url="<?=$arItem["enclosure"]["url"]?>" length="<?=$arItem["enclosure"]["length"]?>" type="<?=$arItem["enclosure"]["type"]?>"/>
                <?endif?>
            </item>
        <?endforeach?>
    </channel>
</rss>


******************************
<enclosure url="url_image" size="67495" type="image/jpeg" header="описание медиа объекта"/>
url - ссылка на картинку src
type - тип вставки type
header - описание медиа-объекта alt
<?
$text = $arResult["ITEMS"][0]["ELEMENT"]["DETAIL_TEXT"]; //получаем текст новости

function get_enclosure($text){
    preg_match_all('/<img[^>]+>/i',$text, $result); //находим в тексте все теги <img />

    $images = array();//массив изображений и их атрибутов
    $enclosure = array();
    foreach($result[0] as $key => $img){
        preg_match_all('/(alt|title|src)=("[^"]*")/i',$img, $images[$img]);//находим атрибуты изображения
        //получаем знаечние атрибута src
        $src = substr($images[$img][0][1],5);
        $src = substr($src, 0, -1);
        if(stristr($src, 'http') === FALSE) {
            $src = 'https://media.nenaprasno.ru'.$src;
        }
        $size = getimagesize($src);

        $enclosure[$key]['url'] = $src;            //получаем знаечние атрибута src
        $enclosure[$key]['width'] = $size[0];      //получаем ширину изображения
        $enclosure[$key]['height'] = $size[1];     //получаем высоту изображения
        $enclosure[$key]['type'] = $size['mime'];  //получаем mime-тип изображения

        $title = substr($images[$img][0][2],7);    //получаем значение атрибута title
        $title = substr($title, 0, -1);
        if(empty($title)){
            $title = substr($images[$img][0][0],5); //получаем значение атрибута alt
            $title = substr($title, 0, -1);
        }
        $enclosure[$key]['alt'] = $title;          //получаем описание изображения
    }
    return $enclosure;
}

$enc = get_enclosure($text);
?>
*-*-*-*-*-*-*-*-*-*-*-*-*-*-*
<?
print_r($enc);
?>
