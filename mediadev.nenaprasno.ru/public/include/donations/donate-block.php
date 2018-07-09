<?define('ED_ACTIVITIES', 1160);//ID проекта "Просветительская деятельность"?> 
<section id="donate" class="donate-block p-t-xl p-b-xl">
    <div class="wrapper">
        <div class="block-title">
            <span>Помогите проекту прямо сейчас</span>
        </div>

        <div class="donate-block-row">
            <div class="donate-block-row-col donate-block-row-col-form">
                <form action="#" method="POST" class="donate-block-form">
                    <div class="donate-block-form-tabs">
                        <a href="#donate-block-internet" data-toggle data-toggle-group="donate-block-type" class="donate-block-form-tabs-item active">
                            <div class="donate-block-form-tabs-item-title">
                                Через интернет
                            </div>
                            Банковской картой или через интернет
                        </a>
                        <a href="#donate-block-sberbank" data-toggle data-toggle-group="donate-block-type" class="donate-block-form-tabs-item">
                            <div class="donate-block-form-tabs-item-title">
                                Через «Сбербанк»
                            </div>
                            Распечатать квитанцию и оплатить в банке
                        </a>
                    </div>
                    <div id="donate-block-internet" class="donate-block-form-tab active">
                        <div class="donate-block-form-padding">
                            <label class="donate-block-form-label">Тип платежа</label>

                            <div class="donate-block-form-payment-type">
                                <div class="donate-block-form-custom-radio donate-block-form-payment-type-item">
                                    <input id="donate-block-payment-type-1" type="radio" checked value="once" name="payment-type">
                                    <label for="donate-block-payment-type-1">Разовое</label>
                                </div>
                                <div class="donate-block-form-custom-radio donate-block-form-payment-type-item">
                                    <input id="donate-block-payment-type-2" type="radio" value="regular" name="payment-type">
                                    <label for="donate-block-payment-type-2">Ежемесячно</label>
                                </div>
                            </div>
<!--
                            <label class="donate-block-form-label">Платежная система</label>

                            <div class="donate-block-form-payment-type">
                                <div class="donate-block-form-custom-radio donate-block-form-payment-type-item">
                                    <input id="donate-block-payment-gate-1" type="radio" checked value="robokassa" name="payment-gate">
                                    <label for="donate-block-payment-gate-1">Robokassa</label>
                                </div>
                                <div class="donate-block-form-custom-radio donate-block-form-payment-type-item">
                                    <input id="donate-block-payment-gate-2" type="radio" value="cp" name="payment-gate">
                                    <label for="donate-block-payment-gate-2">Cloud Payments</label>
                                </div>
                            </div>
-->

                            <label class="donate-block-form-label">Сумма пожертвования</label>
                            <div class="donate-block-form-payment-value">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <div class="donate-block-form-custom-radio donate-block-form-payment-value-item">
                                            <input id="donate-block-payment-100" type="radio" name="payment-value" value="100" checked>
                                            <label for="donate-block-payment-100">100 руб.</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="donate-block-form-custom-radio donate-block-form-payment-value-item">
                                            <input id="donate-block-payment-500" type="radio" name="payment-value" value="500">
                                            <label for="donate-block-payment-500">500 руб.</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="donate-block-form-custom-radio donate-block-form-payment-value-item">
                                            <input id="donate-block-payment-1000" type="radio" name="payment-value" value="1000">
                                            <label for="donate-block-payment-1000">1 000 руб.</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="donate-block-form-custom-radio donate-block-form-payment-value-item">
                                            <input id="donate-block-payment-2000" type="radio" name="payment-value" value="2000">
                                            <label for="donate-block-payment-2000">2 000 руб.</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="donate-block-form-custom-radio donate-block-form-payment-value-item">
                                            <input id="donate-block-payment-5000" type="radio" name="payment-value" value="5000">
                                            <label for="donate-block-payment-5000">5 000 руб.</label>
                                        </div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="donate-block-form-custom-radio donate-block-form-payment-value-item">
                                            <input id="donate-block-payment-10000" type="radio" name="payment-value" value="10000">
                                            <label for="donate-block-payment-10000">10 000 руб.</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-sm-6 m-b-md">
                                    <label class="donate-block-form-label">Другая сумма</label>
                                    <input type="text" class="form-input donate-block-form-input" pattern="^[ 0-9]+$" name="other-sum" placeholder="руб.">
                                </div>
                                <div class="col-xs-12 col-sm-6 m-b-md">
                                    <label class="donate-block-form-label">Поддержать проект</label>
                                    <div class="donate-block-form-select">
										<select name="donate-project" disabled>
											<option value="<?=ED_ACTIVITIES;?>">Просветительская деятельность</option>
										</select>
                                    </div>
                                </div>
                            </div>

                            <div class="m-b-md">
                                <label class="donate-block-form-label">E-mail</label>
                                <input type="email" name="email" class="form-input donate-block-form-input" required placeholder="example@domain.com">
                            </div>

                            <div class="donate-block-form-user">
                                <div class="donate-block-form-user-select">
                                    <div class="donate-block-form-user-select-item">
                                        <div class="form-control-radio">
                                            <input id="donate-block-user-0" type="radio" name="user-select" value="0" checked autocomplete="off" onchange="if($(this).val() == 0) { $('#js-donate-block-user').hide().find('input').attr('disabled', true); } else { $('#js-donate-block-user').show();} ">
                                            <label for="donate-block-user-0">Анонимно</label>
                                        </div>
                                    </div>
                                    <div class="donate-block-form-user-select-item">
                                        <div class="form-control-radio">
                                            <input id="donate-block-user-1" type="radio" name="user-select" value="1" autocomplete="off" onchange="if($(this).val() == 1) { $('#js-donate-block-user').show().find('input').attr('disabled', false); } else { $('#js-donate-block-user').hide();} ">
                                            <label for="donate-block-user-1">Представьтесь</label>
                                        </div>
                                    </div>
                                </div>

                                <div id="js-donate-block-user" class="row" style="display: none;">
                                    <div class="col-xs-12 col-sm-6 m-t-md m-b-md">
                                        <label class="donate-block-form-label">Имя</label>
                                        <input type="text" name="name" class="form-input donate-block-form-input" required disabled placeholder="Как вас зовут?">
                                    </div>
                                    <div class="col-xs-12 col-sm-6 m-t-md m-b-md">
                                        <label class="donate-block-form-label">Фамилия</label>
                                        <input type="text" name="lastname" class="form-input donate-block-form-input" required disabled placeholder="Как ваша фамилия?">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="donate-block-form-footer">
                            <div class="donate-block-form-padding">
                                <div class="row">
                                    <div class="col-xs-6 col-sm-7">
                                        <div class="donate-block-form-agreement">
                                            <div class="form-control-checkbox">
                                                <input id="donate-block-agreement" type="checkbox" name="agreement" value="ch">
                                                <label for="donate-block-agreement">
                                                    Согласен с <a target="_blank" href="/upload/Oferta.pdf">офертой</a>
                                                </label>
												<p class="oferta-error">Пожалуйста, подтвердите свое согласие с офертой</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-5 text-right">
                                        <button class="button button-orange button-round donate-block-form-submit">Продолжить</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

					<div id="donate-block-internet-once-payment" class="donate-block-form-tab active" style="display: none;">
						<div class="donate-block-form-padding" >
							<div class="internet-payment-text">Перевсети N руб. на пожертвование</div>
							<div class="donate-block-form-once-payment-type">
								<div class="once-left">
									<button class="button button-pay-once button-round donate-block-form-submit" id="once-card">Банковские карты</button>
									<div class="bank-card"></div>
								</div>
								<div class="once-right">
									<button class="button button-pay-once button-round donate-block-form-submit" id="once-emoney">Электронные деньги</button>
									<div class="e-money"></div>
								</div>
							</div>
							<a class="donate-form-back" href="#donate-block-internet">Вернуться назад</a>
						</div>
					</div>

					<div id="donate-block-internet-monthly-payment" class="donate-block-form-tab active" style="display: none;">
						<div class="donate-block-form-padding" >
							<div class="internet-payment-text">
								Перевсети N руб. на пожертвование
								<br>
								<br>
								<span>
									Ежемесячное пожертвование возможно только с банковской карты. По карты Maestro нельзя оформить регулярный платеж.
								</span>
							</div>
							<div class="donate-block-form-monthly-payment-type">
									<button class="button button-pay-monthly button-round donate-block-form-submit">Банковские карты</button>
									<div class="bank-card"></div>
							</div>
							<a class="donate-form-back" href="#donate-block-internet">Вернуться назад</a>
						</div>
					</div>


                    <div id="donate-block-sberbank" class="donate-block-form-tab">
                        <div class="donate-block-form-padding">
                            <div class="donate-block-form-bank">
                                <div class="donate-block-form-bank-icon">
                                    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-donate-download.svg"; ?>
                                </div>
                                <div class="donate-block-form-bank-desc">
                                    Скачайте и распечатайте квитанцию, <br>
                                    заполните необходимые поля и оплатите ее <br>
                                    в любом банке.
                                </div>

                                <div class="donate-block-form-bank-buttons">
                                    <a target="_blank" href="/upload/pd4.pdf" class="button button-orange button-round">
                                        Скачать квитанцию
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="donate-block-form-footer">
                        <div class="donate-block-form-padding">
                            Пожертвование осуществляется на условиях <a href="/upload/Oferta.pdf" target="_blank">Публичной оферты</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="donate-block-row-col donate-block-row-col-comment">
                <div class="donate-block-comment">
                    <?$APPLICATION->IncludeFile(
                      SITE_DIR."include/donations/donate-block-targets.php",
                      Array(),
                      Array("MODE"=>"html")
                      );
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
