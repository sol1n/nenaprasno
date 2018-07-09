<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Profilaktika.Media");
?>

<div class="wrapper">

	<article class="article-block article-block-wrapper">
		<h1 class="article-block-title">Помочь проекту</h1>
		<p>
			 Фонд профилактики рака занимается системными проектами, которые меняют медицину России к лучшему: просвещением населения, образованием врачей, внедрением современных технологий и поддержкой действительно нужных медицинских исследований.
		</p>
		<br>
		 Просветительский проект Profilaktika.Media призван повысить осведомленность населения в вопросах, касающихся профилактики онкологических заболеваний и ответственного отношения к своему здоровью.<br>
		<br>
	</article>

</div>

<?
$APPLICATION->IncludeFile(
SITE_DIR."include/donations/donate-block.php",
Array(),
Array("MODE"=>"html", "SHOW_BORDER" => false)
);
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>
