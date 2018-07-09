<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
    <footer class="footer">
        <div class="wrapper">
            <div class="footer-copyright">
                &copy; Фонд профилактики рака «Не напрасно», <?php echo date("Y"); ?>
            </div>
        </div>
    </footer>
    <script src="/assets/scripts.js"></script>
    <? if (CSite::InDir('/test/')): ?>
        <script>vueApp.activateForm();</script>
    <? endif ?>

    <!-- Yandex.Metrika counter -->
    <script src="https://mc.yandex.ru/metrika/watch.js" type="text/javascript"></script>
    <script type="text/javascript">
    try {
        var yaCounter24911267 = new Ya.Metrika({
            id:24911267,
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    } catch(e) { }
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/24911267" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MGW2BMG');</script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MGW2BMG"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

	</body>
</html>