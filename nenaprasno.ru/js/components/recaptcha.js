$(function(){
    $(document).on('submit', '[data-captcha]', function(){
        $('body').append('<div class="spinner-overlay"></div>');
        $('.spinner-overlay').spin('large', '#000');
        var form = $(this)[0];
        var code = $(this).data('captcha');
        var input = $(this).find('[name=captcha-token]');
        var verifyCallback = function(token){
            input.val(token);
            form.submit();
        }
        grecaptcha.render('recaptcha-placeholder', {
          'sitekey' : code,
          'callback' : verifyCallback,
          'size' : 'invisible'
        });
        grecaptcha.execute(window.captchaID);
        return false; 
    })
});