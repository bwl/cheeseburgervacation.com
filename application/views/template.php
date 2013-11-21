<!DOCTYPE html>
<html>
    <head>
        <title>Home - Cheeseburger Vacation</title>
        <link rel="stylesheet" href="<?=site_url('asset/styles/css/main.css')?>">
    </head>
    <body id="<?=$page_id?>">


<div class="social">
    <a href="https://twitter.com/cvacation" class="twitter-follow-button">Follow @cvacation</a>
    <script src="//platform.twitter.com/widgets.js" type="text/javascript"></script>
    <br />
    <a href="http://reddit.com/r/cheeseburgervacation">
        <img src="<?=site_url('asset/img/cv-reddit-logo.png')?>" width="120" height="40" alt="Reddit" />
    </a>
</div>


<div id="content">
    <a id="logo-wrap" href="<?php echo base_url(); ?>"><img id="logo" src="<?=site_url('asset/img/cv-logo-big.png')?>" alt="Cv Logo Big"></a>
    <h1 id="logotext"><span class="lighter">CHEESEBURGER</span> VACATION</h1>
    
    <div class="inn">

    <nav>
    <ul>
        <li class="navHome">
            <a href="<?php echo base_url(); ?>">Home</a>
        </li>
        <li class="navGallery">
            <a href="<?php echo site_url('gallery'); ?>"><i></i>Gallery</a>
        </li>
        <li class="navMaps">
            <a href="<?php echo site_url('maps'); ?>"><i></i>Maps</a>
        </li>
    </ul>
    </nav>        

    <?php echo $sidebar; ?>
    <?php echo $content; ?>
        
        </div>
    </div>

        <script type="text/javascript" src="<?=site_url('asset/js/vendor/jquery-1.10.2.min.js')?>"></script>
        <script type="text/javascript" src="<?=site_url('asset/js/vendor/bootstrap/tab.js')?>"></script>
        <script type="text/javascript" src="<?=site_url('asset/js/vendor/bootstrap/tooltip.js')?>"></script>
        <script type="text/javascript" src="<?=site_url('asset/js/vendor/plugins/jquery.fancybox.pack.js')?>"></script>
        
        <script>
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-24371812-1']);
          _gaq.push(['_trackPageview']);
        
          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-        analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
        
        </script>
        <script type="text/javascript" src="<?=site_url('asset/js/application/pages/home.js')?>"></script>
    </body>
</html>