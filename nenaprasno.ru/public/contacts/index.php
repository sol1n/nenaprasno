<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
?> 


<main class="main-content">
    <div class="wrapper m-b-lg">
        <?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "", Array(), false);?>

        <div class="page-title">
            Контакты
        </div>

        <div class="contacts-page">
            <?$APPLICATION->IncludeFile(
              SITE_DIR."include/contacts/address.php",
              Array(),
              Array("MODE"=>"html")
              );
            ?>

            <div class="row contacts-map-feedback">
                <div class="col-xs-12 col-md-6">
                    <div class="contacts-map">
                        <?$APPLICATION->IncludeFile(
                          SITE_DIR."include/contacts/map.php",
                          Array(),
                          Array("MODE"=>"html")
                          );
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <form action="/ajax/feedback/" method="post" class="contacts-feedback" data-captcha="<?=CAPTCHA_CODE?>">
                        <input type="hidden" value="contacts" name="type">
                        <input type="hidden" name="captcha-token" value="">
                        <div class="contacts-feedback-title">
                            Обратная связь
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="contacts-feedback-control">
                                    <label class="contacts-feedback-control-label">
                                        Ваше имя <sup>*</sup>
                                    </label>

                                    <input type="text" name="name" class="contacts-feedback-control-input" required placeholder="Например: Иван">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="contacts-feedback-control">
                                    <label class="contacts-feedback-control-label">
                                        Email <sup>*</sup>
                                    </label>

                                    <input type="email" name="email" class="contacts-feedback-control-input" required placeholder="ivan@example.ru">
                                </div>
                            </div>
                        </div>
                        <div class="contacts-feedback-control">
                            <label class="contacts-feedback-control-label">
                                Тема сообщения <sup>*</sup>
                            </label>

                            <input type="text" name="subject" class="contacts-feedback-control-input" required placeholder="Тема сообщения даст понимание о чем вы напишете">
                        </div>
                        <div class="contacts-feedback-control">
                            <label class="contacts-feedback-control-label">
                                Сообщение
                            </label>

                            <textarea required name="message" class="contacts-feedback-control-textarea" placeholder="Что бы вы хотели донести до нас?"></textarea>
                        </div>

                        <button type="submit" class="button button-round button-orange contacts-feedback-submit-button">
                            Отправить сообщение
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</main>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>