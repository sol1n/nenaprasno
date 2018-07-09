<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/cancer-catalog/additional-articles/(.*)/.*#",
		"RULE" => "id=\$1",
		"ID" => "",
		"PATH" => "/cancer-catalog/additional-articles/detail.php",
	),
	array(
		"CONDITION" => "#^/cancer-catalog/main-articles/(.*)/.*#",
		"RULE" => "code=\$1",
		"ID" => "",
		"PATH" => "/cancer-catalog/main-articles/detail.php",
	),
	array(
		"CONDITION" => "#^/articles/tags/(.*)/.*#",
		"RULE" => "tag=\$1",
		"ID" => "",
		"PATH" => "/articles/tags/index.php",
	),
	array(
		"CONDITION" => "#^/articles/(.*)/(.*)/.*#",
		"RULE" => "section=\$1&code=\$2",
		"ID" => "",
		"PATH" => "/articles/detail.php",
	),
	array(
		"CONDITION" => "#^/articles/(.*)/.*#",
		"RULE" => "section=\$1",
		"ID" => "",
		"PATH" => "/articles/section.php",
	),

);
?>
