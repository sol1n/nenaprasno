<div class="test-welcome">
    <div class="test-welcome-title">Авторизация</div>

    <div class="test-welcome-text active">
        <p>Введите данные, указанные при регистрации, чтобы начать тестирование</p>
    </div>
</div>

<form action="/ajax/login/" method="post" class="question-form">

    <? if ($_SESSION['message']): ?>
        <p><?=$_SESSION['message']?></p>
        <? unset($_SESSION['message']) ?>
    <? endif ?>

    <div @submit.prevent class="question-form-step active">

        <div class="question-form-group">
            <label for="form-field-email" class="question-form-label">
                Электронная почта
                <sup class="question-form-required">*</sup>
            </label>
            <input
                    id="form-field-email"
                    name="email"
                    type="text"
                    placeholder="email@domain"
                    class="question-form-input"
            >
        </div>

        <div class="question-form-group">
              <label class="question-form-label">
                  Пароль
                  <sup class="question-form-required">*</sup>
              </label>

              <div class="question-form-subgroup">
                  <input
                          id="form-field-password-1"
                          name="password"
                          type="password"
                          placeholder="Введите пароль"
                          class="question-form-input"
                >
              </div>
        </div>

        <div class="question-form-step-buttons">
            <button type="submit" class="button button-round button-orange">Войти</button>
        </div>
    </div>
</form>