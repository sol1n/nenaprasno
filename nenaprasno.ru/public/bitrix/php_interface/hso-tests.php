<?php 
define('SCHOOL_ORDERS_IBLOCK_ID', 3);
define('SCHOOL_ANSWERS_IBLOCK_ID', 18);
define('SCHOOL_QUESTIONS_IBLOCK_ID', 17);
define('SCHOOL_TEST_DURATION', 40 * 60);

function getTest($userData){
  CModule::IncludeModule('iblock');

  $user = user($userData['userID']);

  $arOrder = array("SORT" => "ASC");
  $arFilter = array("IBLOCK_ID" => SCHOOL_ANSWERS_IBLOCK_ID, "ACTIVE" => "Y", "PROPERTY_USER" => $userData['userID'], "PROPERTY_ORDER" => $userData['orderID']);
  $arSelectFields = array("ID","ACTIVE", "NAME", "PROPERTY_BEGIN", "PROPERTY_END", "DETAIL_TEXT", "PROPERTY_QUESTIONS");
  $rsElements = CIBlockElement::GetList($arOrder, $arFilter, FALSE, FALSE, $arSelectFields);
  if($answer = $rsElements->Fetch()){
    return [
      'new' => false,
      'testID' => $answer['ID'],
      'userID' => $userData['userID'],
      'begin' => $answer['PROPERTY_BEGIN_VALUE'],
      'end' => $answer['PROPERTY_END_VALUE'],
      'questions' => json_decode($answer['PROPERTY_QUESTIONS_VALUE']),
      'data' => json_decode($answer['DETAIL_TEXT'], 1),
    ];
  }
  else{
    return null;
  }
}

function getQuestions($userID){
  CModule::IncludeModule('iblock');

  $result = $raw = $old = [];
  $arOrder = array("SORT" => "ASC");
  $arFilter = array("IBLOCK_ID" => SCHOOL_ANSWERS_IBLOCK_ID, "ACTIVE" => "N", "PROPERTY_USER" => $userID);
  $arSelectFields = array("ID","ACTIVE", "NAME", "PROPERTY_BEGIN", "PROPERTY_END", "PROPERTY_USER", "PROPERTY_VARIANT");
  $rsElements = CIBlockElement::GetList($arOrder, $arFilter, FALSE, FALSE, $arSelectFields);
  while ($answer = $rsElements->Fetch()){
    $old = json_decode($answer['PROPERTY_QUESTIONS_VALUE']);
  }

  if (! count($old)) {
    $sections = [];

    $arFilter = Array('IBLOCK_ID'=> SCHOOL_QUESTIONS_IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y');
    $db_list = CIBlockSection::GetList(Array('ID' => 'DESC'), $arFilter, true);
    while($section = $db_list->Fetch()){
      $sections[] = $section['ID'];
    }

    foreach ($sections as $section) {
      $res = CIBlockElement::GetList(
        ['rand' => 'ASC'],
        ['IBLOCK_ID'=> SCHOOL_QUESTIONS_IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y', 'SECTION_ID' => $section],
        false,
        ['nPageSize' => 1],
        ['ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT']
      );
      if ($question = $res->Fetch()) {
        $raw[] = $question;
      }
    }
  } else {
    $res = CIBlockElement::GetList(
      ['rand' => 'ASC'],
      ['IBLOCK_ID'=> SCHOOL_QUESTIONS_IBLOCK_ID, 'GLOBAL_ACTIVE'=>'Y', 'ID' => $old],
      false,
      ['nPageSize' => 1],
      ['ID', 'NAME', 'PREVIEW_TEXT', 'DETAIL_TEXT']
    );
    while ($question = $res->Fetch()) {
      $raw[] = $question;
    }
  }

  foreach ($raw as $question) {
    $result[$question['ID']] = [
      'TITLE' => $question['PREVIEW_TEXT'],
      'VARIANTS' => explode(PHP_EOL, $question['DETAIL_TEXT'])
    ];
  }

  return $result;
}

function getTestInfo($userID){
  CModule::IncludeModule('iblock');

  $date = "01.01.2018";

  $arOrder = array("SORT" => "ASC");
  $arFilter = array("IBLOCK_ID" => SCHOOL_ORDERS_IBLOCK_ID, ">DATE_CREATE" => $date, "PROPERTY_USER" => $userID, "PROPERTY_ACCEPTED_VALUE" => 'Y');
  $arSelectFields = array("ID","ACTIVE", "NAME", "PROPERTY_RATING");
  $rsElements = CIBlockElement::GetList($arOrder, $arFilter, FALSE, FALSE, $arSelectFields);
  if($order = $rsElements->Fetch()){
      $userData = [
        'accepted' => true,
        'orderID' => $order['ID'],
        'userID' => $userID,
        'firstTour' => $order['PROPERTY_RATING_VALUE']
      ];

      return $userData;
  }
  else{
      return [
        'accepted' => false
      ];
  }
}

function beginTest($userData){
  $test = getTest($userData);
  if ($test == null){
    CModule::IncludeModule('iblock');

    $questions = getQuestions($userData['userID']);
    
    $user = user($userData['userID']);
    $time = new \Bitrix\Main\Type\DateTime();
    $el = new CIBlockElement;
    $newTestID = $el->Add([
      'IBLOCK_ID' => SCHOOL_ANSWERS_IBLOCK_ID,
      'NAME' => $user['DISPLAY_NAME'],
      'PROPERTY_VALUES' => [
        'USER' => $userData['userID'],
        'ORDER' => $userData['orderID'],
        'BEGIN' => $time,
        'QUESTIONS' => json_encode(array_keys($questions))
      ]
    ]);

    CIBlockElement::SetPropertyValues($userData['orderID'], SCHOOL_ORDERS_IBLOCK_ID, $newTestID, 'TEST');
    
    $test = [
      'new' => true,
      'testID' => $newTestID,
      'userID' => $userData['userID'],
      'begin' => $time,
      'questions' => array_keys($questions)
    ];
  }
  return $test;
}

function getTestTime($testInfo){
  $now = new \Bitrix\Main\Type\DateTime();
  $begin = new \Bitrix\Main\Type\DateTime($testInfo['begin']);

  return ($now->getTimestamp() - $begin->getTimestamp());
}

function getReminingTime($testInfo){

  return SCHOOL_TEST_DURATION - getTestTime($testInfo);
}

function checkTestTime ($testInfo){

  return (getReminingTime($testInfo) > 0) || (! $testInfo['end']);
}

function setTestEndTime($testInfo){
  if (checkTestTime($testInfo)){
    $now = new \Bitrix\Main\Type\DateTime();
    CIBlockElement::SetPropertyValues($testInfo['testID'], SCHOOL_ANSWERS_IBLOCK_ID, $now, 'END');
    $testInfo['notify'] = !isset($testInfo['end']);
    $testInfo['end'] = $now->toString();
    return $testInfo;
  }
  else{
    // если время сдачи теста уже записано, а новое выходит за продолжительность - ничего не делаем
    if ($testInfo['end']){
      return false;
    }
    // иначе - сохраняем время сдачи и пометку о  том, что тест просрочен
    else{
      $now = new \Bitrix\Main\Type\DateTime();
      CIBlockElement::SetPropertyValues($testInfo['testID'], SCHOOL_ANSWERS_IBLOCK_ID, $now, 'END');
      CIBlockElement::SetPropertyValues($testInfo['testID'], SCHOOL_ANSWERS_IBLOCK_ID, 1, 'OVERHEAD');
      return true;
    }
  }
}

function setTestAnswers($testInfo, $answers){
  CModule::IncludeModule('iblock');

  $user = user($testInfo['userID']);
  $testTime = round(getTestTime($testInfo) / 60);

  $html  = '<h2>Результаты тестирования</h2>';
  $html .= '<p>Участник: ' . $user['DISPLAY_NAME'] . ', (' . $user['EMAIL'] .')</p>';
  $html .= '<p>Время прохождения теста: ' . $testTime . ' мин. (c' . $testInfo['begin'] .' до ' . $testInfo['end'] .')</p>';

  $str  = 'Результаты тестирования' . PHP_EOL;
  $str .= 'Участник: ' . $user['DISPLAY_NAME'] . ', (' . $user['EMAIL'] .')' . PHP_EOL;
  $str .= 'Время прохождения теста: ' . $testTime . ' мин. (с ' . $testInfo['begin'] .' до ' . $testInfo['end'] .')' . PHP_EOL . PHP_EOL;

  $json = [];
  $total = 0;

  $arOrder = array("SORT" => "ASC");
  $arFilter = array("IBLOCK_ID" => SCHOOL_QUESTIONS_IBLOCK_ID, "ACTIVE" => "Y", "ID" => $testInfo['questions']);
  $arSelectFields = array("ID","ACTIVE", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "PROPERTY_CORRECT");
  $rsElements = CIBlockElement::GetList($arOrder, $arFilter, FALSE, FALSE, $arSelectFields);
  while ($question = $rsElements->Fetch()){
    $correctAnswer = [];
    $correctAnsersStr = str_replace(' ', '', $question['PROPERTY_CORRECT_VALUE']);
    $correctAnswerTmp = explode(',', $correctAnsersStr);

    if (is_array($correctAnswerTmp)) {
      foreach ($correctAnswerTmp as $k => $value) {
        $correctAnswer[$value - 1] = true;
      }
    }

    $variants = explode(PHP_EOL, $question['DETAIL_TEXT']);

    $correctCount = count($correctAnswer);
    $incorrectCount = count($variants) - $correctCount;
    $perCorrect = round(1 / $correctCount, 3);
    $perIncorrect = round(1 / $incorrectCount, 3);
    $correctVariansCount = 0;
    $incorrectVariansCount = 0;

    foreach ($answers[$question['ID']] as $value) {
      if (isset($correctAnswer[$value])) {
        $correctVariansCount++;
      } else {
        $incorrectVariansCount++;
      }
    }

    $sum = round($correctVariansCount * $perCorrect - $incorrectVariansCount * $perIncorrect, 2);
    $total += $sum;

    $json['test'][$question['ID']] = [
      'id' => $question['ID'],
      'title' => $question['NAME'],
      'text' => $question['PREVIEW_TEXT'],
      'variants' => $variants,
      'answers' => $answers[$question['ID']],
      'correct' => $correctAnswer,
      'correctCount' => $correctCount,
      'incorrectCount' => $incorrectCount,
      'perCorrect' => $perCorrect,
      'perIncorrect' => $perIncorrect,
      'correctVariansCount' => $correctVariansCount,
      'incorrectVariansCount' => $incorrectVariansCount,
      'total' => $sum
    ];
  }

  $counter = 1;
  foreach ($json['test'] as $k => $value){
      $answers = [];
      foreach ($value['answers'] as $a) {
        $answers[] = trim($value['variants'][$a]);
      }
      $answers = implode(', ', $answers);
      $html .= "<h3>Вопрос $counter</h3>";
      $html .= "<p>{$value['text']}</p>";
      $html .= "<p><b>Ответы:</b> {$answers}</p>";
      $html .= "<p><b>Правильных ответов:</b> {$value['correctVariansCount']} (+" . $value['correctVariansCount'] * $value['perCorrect'] . "), <b>неправильных:</b> {$value['incorrectVariansCount']} (-" . $value['incorrectVariansCount'] * $value['perIncorrect'] . ")</p>";
      $html .= "<p><b>Баллы за вопрос:</b> {$value['total']}</p>";
      $html .= "<hr/>";

      $str .= "Вопрос $counter" . PHP_EOL;
      $str .= "{$value['text']}" . PHP_EOL;
      $str .= "Ответы: {$answers}" . PHP_EOL;
      $str .= "Правильных ответов: {$value['correctVariansCount']} (+" . $value['correctVariansCount'] * $value['perCorrect'] . "), неправильных: {$value['incorrectVariansCount']} (-" . $value['incorrectVariansCount'] * $value['perIncorrect'] . ")" . PHP_EOL;
      $str .= "Баллы за вопрос: {$value['total']}" . PHP_EOL . PHP_EOL;

      $counter++;
  }

  $el = new CIblockElement;
  $el->Update($testInfo['testID'], [
    'PREVIEW_TEXT' => $str,
    'DETAIL_TEXT' => json_encode($json),
  ]);

  CIBlockElement::SetPropertyValues($testInfo['testID'], SCHOOL_ANSWERS_IBLOCK_ID, $total, 'MARK');

  $request = getTestInfo($testInfo['userID']);
  CIBlockElement::SetPropertyValues($request['orderID'], SCHOOL_ORDERS_IBLOCK_ID, $total, 'SECOND_MARK');
  CIBlockElement::SetPropertyValues($request['orderID'], SCHOOL_ORDERS_IBLOCK_ID, $total + $request['firstTour'], 'TOTAL_MARK');

  if ($testInfo['notify']){
    CEvent::Send("SCHOOL_TEST_SUBMIT", 's1', ['HTML' => $html]);
  }

  return true;
}

function endTest($userData, $answers){
  CModule::IncludeModule('iblock');

  $arOrder = array("SORT" => "ASC");
  $arFilter = array("IBLOCK_ID" => SCHOOL_ANSWERS_IBLOCK_ID, "ACTIVE" => "Y", "PROPERTY_USER" => $userData['userID'], "PROPERTY_ORDER" => $userData['orderID']);
  $arSelectFields = array("ID","ACTIVE", "NAME", "PROPERTY_BEGIN", "PROPERTY_END", "PROPERTY_QUESTIONS");
  $rsElements = CIBlockElement::GetList($arOrder, $arFilter, FALSE, FALSE, $arSelectFields);
  if($answer = $rsElements->Fetch()){
    $testInfo = [
      'userID' => $userData['userID'],
      'testID' => $answer['ID'],
      'begin' => $answer['PROPERTY_BEGIN_VALUE'],
      'end' => $answer['PROPERTY_END_VALUE'],
      'questions' => json_decode($answer['PROPERTY_QUESTIONS_VALUE'])
    ];

    if ($testInfo = setTestEndTime($testInfo)){

      return setTestAnswers($testInfo, $answers);
    }
    return false;
  }
  else{
    return false;
  }
}

?>