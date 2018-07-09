<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

CModule::IncludeModule('iblock');

if (strpos(' ', $_POST['fio'])){
	$t = explode(' ', $_POST['fio']);
	$firstname = $t[0];
	$lastname  = $t[1];
	$midlename = $t[2];
}
else{
	$firstname = $_POST['fio'];
	$lastname  = '';
	$midlename = '';
}

$englishPool = [
	0 => 'Начальный',
	1 => 'Средний',
	2 => 'Высокий',
	3 => 'Продвинутый'
];

$rating = floatval($_POST['average-score']);
foreach (['anatomy-score', 'biochemistry-score', 'pharma-score', 'pathophysiology-score', 'commonwealth-score'] as $curs){
	switch (intval($_POST[$curs])) {
		case 5:
			$rating += 1;
			break;
		case 4:
			$rating += 0.5;
		
		default:
			break;
	}
}

if ($_POST['volunteer'] == 'on'){
	$rating += 2;
}

switch (intval($_POST['english'])) {
	case 3:
		$rating += 3;
		break;
	case 2:
		$rating += 2;
		break;
	case 1:
		$rating += 1;
		break;
	default:
		break;
}

if ($_POST['birthdate-day'] < 10){
	$birthday = '0' . $_POST['birthdate-day'] . '.';
}
else{
	$birthday = $_POST['birthdate-day'] . '.';
}

if ($_POST['birthdate-month'] < 10){
	$birthday .= '0' . $_POST['birthdate-month'] . '.';
}
else{
	$birthday .= $_POST['birthdate-month'] . '.';
}

$birthday .= $_POST['birthdate-year'];


$rsUsers = CUser::GetList(($by="id"), ($order="desc"), ['LOGIN' => $_POST['email']]);
if ($u = $rsUsers->Fetch()) {
	$user = $u['ID'];
	$arUser = new CUser;
	$arUser->Update($user, ['PASSWORD' => $_POST['password-1']]);
} else{
	$arResult = $USER->Register($_POST['email'], $firstname, $lastname, $_POST['password-1'], $_POST['password-2'], $_REQUEST['email']);
	$user = $USER->GetID();
	$USER->Logout();
}

$el = new CIBlockElement;
$el->Add([
	'IBLOCK_ID' => 3,
	'NAME' => $_POST['fio'],
	'PROPERTY_VALUES' => [
		'FIO' => $_POST['fio'],
		'BIRTHDAY' => $birthday,
		'STUDY_STAGE' => ($_POST['student-stage'] == 'student') ? 'Студент 6 курса' : 'Интерн',
		'UNIVERSITY' => $_POST['university'],
		'FACULTY' => $_POST['faculty'],
		'CITY' => $_POST['city'],
		'PHONE' => $_POST['phone'],
		'SOCIAL_PAGE' => $_POST['social-page'],
		'AVERAGE_SCORE' => $_POST['average-score'],
		'ANATOMY_SCORE' => $_POST['anatomy-score'],
		'BIOCHEMISTRY_SCORE' => $_POST['biochemistry-score'],
		'PHARMA_SCORE' => $_POST['pharma-score'],
		'PATHOPHYSIOLOGY_SCORE' => $_POST['pathophysiology-score'],
		'COMMONWEALTH_SCORE' => $_POST['commonwealth-score'],
		'ENGLISH' => (isset($englishPool[$_POST['english']])) ? $englishPool[$_POST['english']] : 'Не указано',
		'AWARDS' => $_POST['awards'],
		'VOLUNTEER' => ($_POST['volunteer'] == 'on') ? 'Да' : 'Нет',
		'VOLUNTEER_EXP' => $_POST['volunteer-exp'],
		'PUBLICATIONS' => $_POST['publications'],
		'PERSONAL_QUALITIES' => $_POST['personal-qualities'],
		'EMAIL' => $_POST['email'],
		'USER' => $user,
		'RATING' => $rating
	]
]);

fastcgi_finish_request();

$template = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/assets/templates/registration.html');

foreach ($_POST as $k => $v){
	$value = ($v) ? htmlspecialchars($v) : '';
	$template = str_replace("#$k#", $value, $template);
}

$arEventFields = [
  'NAME' => htmlspecialchars($_POST['fio']),
  'BIRTHDAY' => $birthday,
  'STUDY_STAGE' => ($_POST['student-stage'] == 'student') ? 'Студент 6 курса' : 'Интерн',
  'UNIVERSITY' => $_POST['university'],
  'FACULTY' => $_POST['faculty'],
  'CITY' => $_POST['city'],
  'PHONE' => $_POST['phone'],
  'SOCIAL_PAGE' => $_POST['social-page'],
  'AVERAGE_SCORE' => $_POST['average-score'],
  'ANATOMY_SCORE' => $_POST['anatomy-score'],
  'BIOCHEMISTRY_SCORE' => $_POST['biochemistry-score'],
  'PHARMA_SCORE' => $_POST['pharma-score'],
  'PATHOPHYSIOLOGY_SCORE' => $_POST['pathophysiology-score'],
  'COMMONWEALTH_SCORE' => $_POST['commonwealth-score'],
  'ENGLISH' => (isset($englishPool[$_POST['english']])) ? $englishPool[$_POST['english']] : 'Не указано',
  'AWARDS' => $_POST['awards'],
  'VOLUNTEER' => ($_POST['volunteer'] == 'on') ? 'Да' : 'Нет',
  'VOLUNTEER_EXP' => $_POST['volunteer-exp'],
  'PUBLICATIONS' => $_POST['publications'],
  'PERSONAL_QUALITIES' => $_POST['personal-qualities'],
  'EMAIL' => $_POST['email'],
  'RATING' => $rating,
  'UA' => $_SERVER['HTTP_USER_AGENT'],
  'IP' => $_SERVER['REMOTE_ADDR']
];

CEvent::Send("NEW_SCHOOL_REGISTRATION", 's1', $arEventFields);

$arEventFields = [
  'EMAIL' => $_POST['email'],
  'PASSWORD' => $_POST['password-1']
];

CEvent::Send("NEW_SCHOOL_USER_INFO", 's1', $arEventFields);

?>
