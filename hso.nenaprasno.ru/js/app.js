var validateConfig = {
    locale: 'ru',
    dictionary: {
        ru: {
            messages: messagesRu
        }
    },
    errorBagName: 'formErrors',
    fieldsBagName: 'formFields'
};

Vue.use(VeeValidate, validateConfig);

Vue.config.debug = true;

Vue.component('Modal', {
    template: '#modal-template',
    props: ['show', 'onClose'],
    methods: {
        close: function () {
            this.onClose();
        }
    },
    ready: function () {
        document.addEventListener("keydown", function(e) {
            if (this.show && e.keyCode == 27) {
                this.onClose();
            }
        });
    }
});

Vue.component('LoginModal', {
    template: '#login-modal-template',
    props: ['show'],
    data: function () {
        return {

        }
    },
    methods: {
        close: function () {
            this.$parent.showLoginModal = false;
        },
        loginPost: function () {
            //TODO: Ajax login, validation
            alert('Login complete');
            this.close();
        }
    }
});

var vueApp = new Vue({
    el: '#vue-app',
    data: {
        formActive: false,
        currentStep: 1,
        showLoginModal: false,
        timer: 0,
        birthdayMonth: 1,
        birthdayYear: 1,
        months: [
            "Январь", "Февраль", "Март", "Апрель", "Май", "Июнь", "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь"
        ],
        volunteer: 0
    },
    computed: {
        years: function () {
            var years = [],
            currentYear = new Date().getFullYear();

            for (var i=currentYear-50; i<currentYear; i++) {
                years.push(i);
            }

            return years;
        },
        daysInMonth: function(month,year) {
            return new Date(this.birthdayYear, this.birthdayMonth, 0).getDate();
        }
    },
    methods: {
        activateForm: function (e) {
            var _this = this;

            _this.formActive = true;

            if (e && e.target) {
                $(e.target).removeClass('button-blue-hollow').addClass('button-blue');
            }

            if ( $(_this.$el).find('[data-remaining]').length ) {
                _this.timer = $(_this.$el).find('[data-remaining]').data('remaining');

                var timeoutInterval = setInterval(function () {
                    _this.timer > 0 ? _this.timer += - 1 : clearInterval(timeoutInterval);
                }, 1000);
            }
        },
        downloadAndActivateForm: function (url, block) {
            var _this = this;
        },
        scrollTop: function () {
            $('html, body').animate({
                scrollTop: $('.question-form').offset().top - 30
            }, 1000);
        },
        changeStep: function (step) {
            var _this = this,
                currentScope = 'form-' + _this.currentStep;

            _this.$validator.validateAll(currentScope).then(function (success) {
                if (success) {
                    _this.scrollTop();
                    _this.currentStep = step;
                }
            }, function (error) {
                alert('Пожалуйста, проверьте все поля на правильность заполнения');
                var currentScopeErrors = _this.formErrors.errors.map(function(fieldError) {
                    return fieldError.scope == currentScope ? fieldError : false
                });

                //Scroll to first error field
                $('html, body').animate({
                    scrollTop: $('input[name="' + currentScopeErrors[0].field  + '"]').offset().top - 35
                }, 1000);
            });
        },
        stepBack: function () {
            this.scrollTop();
            this.currentStep--;
        },
        submitForm: function(event) {
            var _this = this,
                currentScope = 'form-' + _this.currentStep;

            var formUrl = event.target.getAttribute('action'),
                formMethod = event.target.getAttribute('method') || 'post',
                formData = $(event.target).serialize();

            // Validate All returns a promise and provides the validation result.
            this.$validator.validateAll(currentScope).then(function (success) {
                if (!success) {
                    return;
                }

                $.ajax({
                    method: formMethod,
                    url: formUrl,
                    data: formData
                }).done(function( msg ) {
                    //TODO: check msg!
                    alert('Данные были успешно отправлены!');
                    window.location.reload();
                }).fail(function (jqXHR, textStatus, e) {
                    alert('Возникла ошибка отправки данных! Пожалуйста, попробуйте отправить форму еще раз, либо свяжитесь с нами.');
                    console.log(jqXHR, textStatus, e);
                });

            }, function (error) {
                alert('Пожалуйста, проверьте все поля на правильность заполнения');
            });
        }
    },
    mounted: function () {
        $('.js-date-picker').flatpickr({
            dateFormat: 'd.m.Y',
            locale: 'ru',
            maxDate: new Date()
        });

        $(":input").inputmask();
    }
});

