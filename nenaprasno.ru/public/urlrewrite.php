<?
$arUrlRewrite = array(
  array(
    "CONDITION" => "#^/project/vsho/students/(.*)/.*#",
    "RULE" => "id=\$1",
    "ID" => "",
    "PATH" => "/projects/student.php",
  ),
  array(
    "CONDITION" => "#^/projects/vsho/students/.*#",
    "RULE" => "code=\$1",
    "ID" => "",
    "PATH" => "/projects/students.php",
  ),
  array(
    "CONDITION" => "#^/projects/(.*)/.*#",
    "RULE" => "code=\$1",
    "ID" => "",
    "PATH" => "/projects/detail.php",
  ),	
  array(
    "CONDITION" => "#^/publications/(.*)/(.*)/.*#",
    "RULE" => "section=\$1&code=\$2",
    "ID" => "",
    "PATH" => "/publications/detail.php",
  ),
  array(
		"CONDITION" => "#^/publications/(.*)/.*#",
		"RULE" => "section=\$1",
		"ID" => "",
		"PATH" => "/publications/section.php",
	),
  array(
    "CONDITION" => "#^/fund/news/(.*)/.*#",
    "RULE" => "code=\$1",
    "ID" => "",
    "PATH" => "/fund/news-and-events/detail.php",
  ),    
  array(
    "CONDITION" => "#^/fund/events/(.*)/.*#",
    "RULE" => "code=\$1",
    "ID" => "",
    "PATH" => "/fund/news-and-events/detail.php",
  ),
  array(
    "CONDITION" => "#^/fund/news-and-events/(.*)/.*#",
    "RULE" => "code=\$1",
    "ID" => "",
    "PATH" => "/fund/news-and-events/detail.php",
  ),
  array(
    "CONDITION" => "#^/partners/(.*)/.*#",
    "RULE" => "section=\$1",
    "ID" => "",
    "PATH" => "/partners/section.php",
  ),  
  array(
    "CONDITION" => "#^/fund/employees/(.*)/.*#",
    "RULE" => "id=\$1",
    "ID" => "",
    "PATH" => "/fund/employees/detail.php",
  ),  
  array(
    "CONDITION" => "#^/fund/supervisors/(.*)/.*#",
    "RULE" => "id=\$1",
    "ID" => "",
    "PATH" => "/fund/supervisors/detail.php",
  ),
  array(
    "CONDITION" => "#^/fund/reports/(.*)/.*#",
    "RULE" => "section=\$1",
    "ID" => "",
    "PATH" => "/fund/reports/section.php",
  ),

);

?>
