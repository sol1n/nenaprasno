<? 
	require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
	$_SESSION['csrf'] = md5(uniqid(rand(), true)); 
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=500">
    <title>Profilaktika Media — Ненапрасно</title>
    <link rel="icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="/assets/build/style.min.css">
	<meta property="og:title" content="Profilaktika.Media" />
	<meta property="og:description" content="Просветительский проект о доказательной медицине и онкологии">
	<meta property="og:image" content="/assets/images/logo.png">
	<meta property="og:image:url" content="/assets/images/logo.png">
</head>
<body style="background: url('/assets/images/background.jpg') repeat center;">

<main class="main-content">
    <div class="launch-teaser-wrapper">
        <div class="launch-teaser">
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="launch-teaser-logo">
                        <img src="/assets/images/logo.svg" alt="Profilactika Media — Ненапрасно">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="launch-teaser-text">
                        <p>
                            <strong>Profilaktika.Media</strong> &mdash; просветительский проект о доказательной медицине и онкологии. Здесь вы найдете только проверенную информацию от практикующих врачей и экспертов Фонда профилактики рака.
                        </p>
                    </div>
                </div>
            </div>

            <form action="/api/subscribe/" method="POST" class="launch-teaser-form">

            	<? if ($_SESSION['subscribe-success']): ?>
            		<p>Спасибо, что следите за своим здоровьем и здоровьем близких! Мы пришлем напоминание о старте проекта Profilaktika.Media на Вашу электронную почту</p>
            		<? unset($_SESSION['subscribe-success']); ?>
            	<? endif ?>

            	<input type="hidden" value="<?=$_SESSION['csrf']?>" name="csrf" />
                <div class="launch-teaser-form-title">
                    Оставьте свой e-mail и мы сообщим о запуске проекта
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="launch-teaser-form-group">
                            <input class="launch-teaser-form-input" type="text" name="name" placeholder="Имя" required>
                        </div>
                        <div class="launch-teaser-form-group">
                            <input class="launch-teaser-form-input" type="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="launch-teaser-form-group launch-teaser-form-group-hidden">
                            <!-- Проставка для отступа -->
                            <input type="text" class="launch-teaser-form-input">
                        </div>
                        <div class="launch-teaser-form-group">
                            <input type="submit" class="launch-teaser-form-button" value="Подписаться">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

</body>
</html>
