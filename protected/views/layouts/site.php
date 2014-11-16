<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
    <head>
        <title>Your Store</title>
        <meta name="description" content="My Store" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/css/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/css/slideshow.css" media="screen" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/jquery-1.6.1.min.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/ui/jquery-ui-1.8.9.custom.min.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.9.custom.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/ui/external/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/tabs.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/common.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/nivo-slider/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/jquery/jquery.cookie.js"></script>
        <!--[if IE 7]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/css/ie7.css" />
        <![endif]-->
        <!--[if lt IE 7]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/css/ie6.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/site/js/DD_belatedPNG_0.0.8a-min.js"></script>
        <script type="text/javascript">
            DD_belatedPNG.fix('#logo img');
        </script>
        <![endif]-->
    </head>
    <body>
        <!-- COntainer Starts -->
        <div id="container">
            <!-- Header Wrap Starts -->
            <?php $this->renderPartial('_header', array()); ?>
            <!-- Header Wrap Ends -->
            <!-- Notification Bar Starts Starts -->
            <div id="notification"></div>
            <!-- Notification Bar Starts Ends -->	 
            <?php echo $content; ?>
            <!-- Powered Starts -->
            <div id="powered" class="clearfix">
                <p class="floatleft">Powered By Mby E-Commerce &copy; 2014</p>
            </div>
            <!-- Powered Ends -->
        </div>
        <!-- Container Ends -->
    </body>
</html>
