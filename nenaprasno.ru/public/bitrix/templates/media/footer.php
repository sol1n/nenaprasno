<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
    </main>

    <a href="#" class="scroll-to-top" data-scroll-to-top>Наверх</a>

    <footer class="main-footer">
        <div class="wrapper">
            <a href="http://nenaprasno.ru/" target="_blank" class="main-footer-logo">
                <img src="/assets/images/fond-logo.svg" alt="Фонд профилактики рака. Живу не напрасно." width="175">
            </a>
            <a href="https://xn--80afcdbalict6afooklqi5o.xn--p1ai/" target="_blank" class="main-footer-additional-logo" >
                <img src="/assets/images/pgrants_logo.svg" alt="Фонд президентских грантов"  width="140">
            </a>

			<?$APPLICATION->IncludeComponent("bitrix:menu", "main-footer-menu", Array("ROOT_MENU_TYPE" => "bottom"), false);?>

            <div class="main-footer-socials">
                <a href="https://www.facebook.com/profilaktikamedia/" target="_blank" class="main-footer-socials-item">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-facebook.svg"); ?>
                </a>
                <a href="https://t.me/profilaktikamedia" target="_blank" class="main-footer-socials-item">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-telegram.svg"); ?>
                </a>
                <a href="https://vk.com/profilaktikamedia" target="_blank" class="main-footer-socials-item">
                    <?php echo file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/assets/images/icon-vk.svg"); ?>
                </a>
            </div>
        </div>
    </footer>

	<script src="https://widget.cloudpayments.ru/bundles/cloudpayments"></script>

    <script src="/assets/build/scripts.js"></script>

    <script type="text/javascript" >
        (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
        try {
        w.yaCounter48129917 = new Ya.Metrika({
        id:48129917,
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        trackHash:true
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
    <noscript><div><img src="https://mc.yandex.ru/watch/48129917" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

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
