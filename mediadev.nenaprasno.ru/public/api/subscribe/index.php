<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if (!isset($_POST['csrf']) || $_POST['csrf'] != $_SESSION['csrf']) 
{
  header('HTTP/1.0 403 Forbidden');
}
//elseif (!isset($_POST['name']) || !isset($_POST['email']))
elseif (!isset($_POST['email']))
{
  header('HTTP/1.1 400 Bad request');
}
else 
{
  CModule::IncludeModule('iblock');
  $el = new CIBlockElement;
  $el->Add([
    'IBLOCK_ID' => MEDIA_SUBSCRIBES_IBLOCK,
    'NAME' => 'Новый элемент',//$_POST['name'],
    'PREVIEW_TEXT' => $_POST['email']
  ]);

  $_SESSION['subscribe-success'] = true;

  LocalRedirect($_SERVER['HTTP_REFERER'].'?clear_cache=Y');
}
?>