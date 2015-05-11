  <script src="<?=base_url().JS;?>jquery-1.10.2.min.js"></script>
  <script src="<?=base_url().BOOTSTRAP;?>js/bootstrap.min.js"></script>
  <?php
  if(isset($include_plugin)){
    foreach($include_plugin as $plugin){
      if(strpos($plugin,'.js')){
        ?>
        <script type="text/javascript" src="<?=base_url().PLUGIN.$plugin;?>"></script>
        <?php
      }elseif(strpos($plugin,'.css')){
        ?>
        <link rel="stylesheet" type="text/css" href="<?=base_url().PLUGIN.$plugin;?>">
        <?php
      }
    }
  }
  ?>

  <script src="<?=base_url().JS;?>gcPlugin.js"></script>
  <?php
  $milliseconds = round(microtime(true) * 1000);
  if(isset($include_js)){
    foreach($include_js as $js){
      ?>
      <script type="text/javascript" src="<?=base_url().JS;?><?php if(ENVIRONMENT=='development')echo $js.'?'.$milliseconds;else echo $js; ?>"></script>
      <?php
    }
  }
  ?>
  
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-53419132-1', 'auto');
    ga('send', 'pageview');

  </script>
</body>
</html>