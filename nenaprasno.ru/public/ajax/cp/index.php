<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if ($_POST['publicId'] == CP_PUBLIC_KEY)
{
  CModule::IncludeModule('iblock');

  $el = new CIBlockElement;
  $el->Update($_POST['invoiceId'], ['ACTIVE' => 'Y']);

  $arOrder = array("SORT" => "ASC");
  $arFilter = array('IBLOCK_ID' => 15, 'ID' => $_POST['invoiceId']);
  $arSelectFields = array("ID", "NAME", "IBLOCK_ID", 'PROPERTY_EMAIL', 'PROPERTY_NAME', 'PROPERTY_LASTNAME', 'PROPERTY_PROJECT', 'PROPERTY_NEXTPAYMENT');
  $orderRes = CIBlockElement::GetList($arOrder, $arFilter, FALSE, FALSE, $arSelectFields);
  $order = $orderRes->Fetch();

  if ($order['PROPERTY_PROJECT_VALUE']){
    $project = $order['PROPERTY_PROJECT_VALUE'];
    $res = CIBlockElement::GetByID($project);
    $project = $res->Fetch();
    

    $db_props = CIBlockElement::GetProperty($project['IBLOCK_ID'], $project['ID'], array("sort" => "asc"), Array("CODE"=>"COLLECTED"));
    $goal = $db_props->Fetch();
    $goal = $goal['VALUE'];

    $goal += $_POST['amount'];

    CIBlockElement::SetPropertyValues($project['ID'], $project['IBLOCK_ID'], $goal, "COLLECTED");

    $project = $project['NAME'];
  }
  else{
    $project = 'Общее пожертвование';
  }

  $arEventFields = [
    'ID' => htmlspecialchars($orderID),
    'NAME' => ($order['PROPERTY_LASTNAME_VALUE'] || $order['PROPERTY_FIRSTNAME_VALUE']) ? $order['PROPERTY_LASTNAME_VALUE'] . ' ' . $order['PROPERTY_FIRSTNAME_VALUE'] : 'Анонимное',
    'EMAIL' => $order['PROPERTY_EMAIL_VALUE'],
    'PROJECT' => $project,
    'TYPE' => $order['PROPERTY_NEXTPAYMENT_VALUE'] ? 'Регулярное' : 'Разовое',
    'GATE' => 'Cloudpayments',
    'SUM' => htmlspecialchars($_POST['amount']),
    'UA' => $_SERVER['HTTP_USER_AGENT'],
    'IP' => $_SERVER['REMOTE_ADDR']
  ];

  CEvent::Send("DONATION_PAYD", 's1', $arEventFields);
}
else
{
  CHTTP::SetStatus('403 forbidden');
}


?>
