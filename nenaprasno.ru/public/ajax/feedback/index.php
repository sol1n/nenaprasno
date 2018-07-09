<?
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if (($_REQUEST['email']) && ($_REQUEST['name']) && checkReCaptcha($_REQUEST['captcha-token'])){
  CModule::IncludeModule('iblock');

  $el = new CIBlockElement;
  $el->Add([
    'IBLOCK_ID' => 16,
    'NAME' => $_REQUEST['name'],
    'PREVIEW_TEXT' => $_REQUEST['message'],
    'PROPERTY_VALUES' => [
      'EMAIL' => $_REQUEST['email'],
      'THEME' => $_REQUEST['subject'],
      'PHONE' => $_REQUEST['phone'],
      'SOCIAL' => $_REQUEST['social'],
      'PROFESSION' => $_REQUEST['profession'],
      'PLACE' => $_REQUEST['place'],
      'LASTNAME' => $_REQUEST['lastname'],
      'MIDDLENAME' => $_REQUEST['middlename'],
      'TYPE' => $_REQUEST['type'],
    ]
  ]);
};

$types = [
  'contacts' => 'Обратная связь',
  'volunteers' => 'Стать волонтером фонда',
  'club' => 'Клуб "Живу не напрасно"'
];

$arEventFields = [
  'NAME' => ($_REQUEST['lastname']) ? htmlspecialchars($_POST['lastname'] . ' ' . $_POST['name'] . ' ' . $_POST['middlename']) : htmlspecialchars($_POST['name']),
  'EMAIL' => htmlspecialchars($_REQUEST['email']),
  'PHONE' => htmlspecialchars($_REQUEST['phone']),
  'SOCIAL' => htmlspecialchars($_REQUEST['social']),
  'PROFESSION' => htmlspecialchars($_REQUEST['profession']),
  'PLACE' => htmlspecialchars($_REQUEST['place']),
  'THEME' => htmlspecialchars($_REQUEST['subject']),
  'MESSAGE' => htmlspecialchars($_REQUEST['message']),
  'TYPE' => $types[$_REQUEST['type']],
  'UA' => $_SERVER['HTTP_USER_AGENT'],
  'IP' => $_SERVER['REMOTE_ADDR']
];

CEvent::Send("FORM_SUBMIT", 's1', $arEventFields);
  
LocalRedirect('/#success');


?>