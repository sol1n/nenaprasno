<?php
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');

if ($USER->IsAuthorized()){
  $userData = getTestInfo($USER->GetID());
  if ($userData['accepted']){
    endTest($userData, $_REQUEST['answers']);
    LocalRedirect('/test/');
  }
  else{
    CHTTP::SetStatus("403 Forbidden");  
  }
}
else{
  CHTTP::SetStatus("404 Not Found");
}
?>
