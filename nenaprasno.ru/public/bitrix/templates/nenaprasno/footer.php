<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
    <footer class="main-footer">
        <? if (CSite::InDir('/screen')): ?>
            <div class="wrapper">
                <div class="main-footer-copyright">
                    &copy; Фонд профилактики рака, <?php echo date("Y"); ?>
                </div>
                <nav class="main-footer-menu">
                    <ul>
                        <li>
                            <a target="_blank" href="/screen/about/">
                                О системе SCREEN
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/screen/experts/">
                                Экспертный совет
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/screen/faq/">
                                FAQ
                            </a>
                        </li>
                        <li>
                            <a target="_blank" href="/screen/privacy/">
                                Политика конфиденциальности
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        <? else: ?>
            &copy; Фонд профилактики рака, <?php echo date("Y"); ?>
        <? endif ?>
    </footer>

    <div id="recaptcha-placeholder"></div>

    <script src="/assets/build/scripts.js"></script>
    <? if (CSite::InDir('/screen/')): ?>
        <script src="/assets/screen/build/app.js"></script>
        <link rel="stylesheet" href="/assets/screen/css/nenaprasno-form.css">
        <link rel="stylesheet" href="/assets/screen/css/nenaprasno-form-1.css">
    <? else: ?>
        <script async src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>
    <? endif ?>

    <script src='https://www.google.com/recaptcha/api.js?onload=gCapthaInit&render=explicit'></script>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter24911267 = new Ya.Metrika({
                        id:24911267,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/24911267" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-M2WT6RQ');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M2WT6RQ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
	</body>
</html>
