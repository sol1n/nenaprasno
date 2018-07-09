<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/residents/(.*)/.*#",
		"RULE" => "id=\$1",
		"ID" => "",
		"PATH" => "/residents/detail.php",
	),
);
?>
