<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

$orderID = $_REQUEST['InvId'];
$orderSum = $_REQUEST['OutSum'];

$SignatureValue = $_REQUEST['SignatureValue'];

$password2 = ROBOKASSA_PASSWORD_2;

$crc = md5("$orderSum:$orderID:$password2");

if ($crc == mb_strtolower($SignatureValue)){
  CModule::IncludeModule('iblock');

  $el = new CIBlockElement;
  $el->Update($orderID, ['ACTIVE' => 'Y']);

  $arOrder = array("SORT" => "ASC");
  $arFilter = array('IBLOCK_ID' => 15, 'ID' => $orderID);
  $arSelectFields = array("ID", "NAME", "IBLOCK_ID", 'PROPERTY_EMAIL', 'PROPERTY_NAME', 'PROPERTY_LASTNAME', 'PROPERTY_PROJECT');
  $orderRes = CIBlockElement::GetList($arOrder, $arFilter, FALSE, FALSE, $arSelectFields);
  $order = $orderRes->Fetch();

  if ($order['PROPERTY_PROJECT_VALUE']){
    $project = $order['PROPERTY_PROJECT_VALUE'];
    $res = CIBlockElement::GetByID($project);
    $project = $res->Fetch();
    

    $db_props = CIBlockElement::GetProperty($project['IBLOCK_ID'], $project['ID'], array("sort" => "asc"), Array("CODE"=>"COLLECTED"));
    $goal = $db_props->Fetch();
    $goal = $goal['VALUE'];

    $goal += $orderSum;

    CIBlockElement::SetPropertyValues($project['ID'], $project['IBLOCK_ID'], $goal, "COLLECTED");

    $project = $project['NAME'];
  }
  else{
    $project = 'Общее пожертвование';
  }

  echo "OK$orderID";

  fastcgi_finish_request();

  $arEventFields = [
    'ID' => htmlspecialchars($orderID),
    'NAME' => ($order['PROPERTY_LASTNAME_VALUE'] || $order['PROPERTY_FIRSTNAME_VALUE']) ? $order['PROPERTY_LASTNAME_VALUE'] . ' ' . $order['PROPERTY_FIRSTNAME_VALUE'] : 'Анонимное',
    'EMAIL' => $order['PROPERTY_EMAIL_VALUE'],
    'PROJECT' => $project,
    'TYPE' => 'Разовое',
    'GATE' => 'Robokassa',
    'SUM' => htmlspecialchars($orderSum),
    'UA' => $_SERVER['HTTP_USER_AGENT'],
    'IP' => $_SERVER['REMOTE_ADDR']
  ];

  CEvent::Send("DONATION_PAYD", 's1', $arEventFields);
}

?>
