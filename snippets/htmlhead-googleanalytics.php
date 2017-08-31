	<?php 
    $htmlhead_googleanalytics = c::get('plugin.htmlhead.googleanalytics', 'UA-');
    $htmlhead_googleanalytics_anonymizeIp = c::get('plugin.htmlhead.googleanalytics.anonymizeIp', true);

    if(!KirbyHTMLHead::is_localhost() && strlen($gakey) > strlen("UA-") ): ?>
    <!-- Google Analytics -->
    <script type="text/javascript">
    var gaProperty = '<?php echo $gakey ?>';
    var disableStr = 'ga-disable-' + gaProperty;
    if (document.cookie.indexOf(disableStr + '=true') > -1) { window[disableStr] = true;
    }
    function gaOptout() {
    document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
    window[disableStr] = true; }
    </script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', '<?php echo $gakey ?>', 'auto');
      <?php if($htmlhead_googleanalytics_anonymizeIp): ?>
      ga('set', 'anonymizeIp', true);
      <?php endif; ?>
      ga('send', 'pageview');
    </script>
    <?php endif; ?>