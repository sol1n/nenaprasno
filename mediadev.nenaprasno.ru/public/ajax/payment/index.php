<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
header('Content-Type: application/json');

CModule::IncludeModule('iblock');

if ($_REQUEST['project'] != 'common'){
  $projectID = $_REQUEST['project'];
  $res = CIBlockElement::GetByID($projectID);
  $project = $res->Fetch();
  $title = "Пожертвование: {$project[NAME]}";
}
else{
  $title = "Общее пожертвование";
}

//$gate = $_REQUEST['gate'] ? $_REQUEST['gate'] : 'robokassa';

if ($_REQUEST['type'] == 'regular')
{
  $gate = 'cp';//dr
  $nextdate = new DateTime;
  $nextdate = $nextdate->add(new DateInterval('P1M'))->format('d.m.Y');
}
else
{
  //$gate = 'robokassa';//dr
  $gate = $_REQUEST['gate'];
  $nextdate = '';
}

$el = new CIBlockElement;
$orderID = $el->Add([
  'IBLOCK_ID' => 15,
  'ACTIVE' => 'N',
  'NAME' => $title,
  'PROPERTY_VALUES' => [
    'SUM' => $_REQUEST['sum'],
    'EMAIL' => $_REQUEST['email'],
    'NAME' => $_REQUEST['name'],
    'LASTNAME' => $_REQUEST['lastname'],
    'PROJECT' => ($_REQUEST['project'] != 'common') ? $_REQUEST['project'] : '',
    'TYPE' => $gate,
    'NEXTPAYMENT' => $nextdate
  ]
]);



if ($gate == 'robokassa')
{
  $sum = $_REQUEST['sum'];

  $crc = md5(ROBOKASSA_SHOP_ID_MEDIA . ":$sum:$orderID:" . ROBOKASSA_PASSWORD_1_MEDIA);
  $response = [
    'success' => true,
    'href' => "https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=".ROBOKASSA_SHOP_ID_MEDIA."&OutSum=$sum&InvId=$orderID&Desc=$title&SignatureValue=$crc&Email={$_REQUEST[email]}",
    'gate' => 'robokassa'
  ];

  if ($nextdate)
  {
    $response['href'] .= '&Recurring=true';
  }
}
elseif ($gate == 'cp')
{
  $response = [
    'success' => true,
    'pubkey' => CP_PUBLIC_KEY_MEDIA,
    'gate' => 'cp',
    'sum' => floatval($_REQUEST['sum']),
    'email' => $_REQUEST['email'],
    'description' => $title,
    'firstname' => $_REQUEST['name'],
    'lastname' => $_REQUEST['lastname'],
    'regular' => $_REQUEST['type'] == 'regular',
    'order' => $orderID
  ];
}
else
{
  $response = [
    'success' => false
  ];
}


echo json_encode($response);

fastcgi_finish_request();

$arEventFields = [
  'NAME' => ($_REQUEST['name'] || $_REQUEST['lastname']) ? htmlspecialchars($_POST['lastname'] . ' ' . $_POST['name']) : 'Анонимное',
  'EMAIL' => htmlspecialchars($_REQUEST['email']),
  'PROJECT' => ($project) ? $project['NAME'] : 'Общее пожертвование',
  'TYPE' => $_REQUEST['type'] == 'regular' ? 'Регулярное' : 'Разовое',
  'GATE' => $gate,
  'SUM' => htmlspecialchars($_REQUEST['sum']),
  'UA' => $_SERVER['HTTP_USER_AGENT'],
  'IP' => $_SERVER['REMOTE_ADDR']
];

CEvent::Send("NEW_DONATION", 's1', $arEventFields);

?>
