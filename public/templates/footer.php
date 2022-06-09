<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/src/Core/required.php';
?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo GOOGLE_ANALYTICS_GTAG; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){window.dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo GOOGLE_ANALYTICS_GTAG; ?>');
    </script>

  </body>
</html>