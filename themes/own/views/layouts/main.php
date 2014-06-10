<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Omnicomm Armenia, Solid Systems">
    <meta name="keywords" content="Omnicomm,Armenia,Solid,Systems">
    <meta name="author" content="Omnicomm Armenia">
    <meta name="language" content="en" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/images/favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/jquery-1.11.1.js"></script>

    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/script.js"></script>

    <!-- from omn -->
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/layout.css" type="text/css" />
    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/style.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/jquery1.js"></script>

    <script type="text/javascript">var _siteRoot='index.php',_root='index.php';</script>
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/scripts.js"></script>

    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/jquery.validate.pack.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/jquery.contactable.min.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/jquery.contactable.js"></script>

    <link rel="stylesheet" href="<?=Yii::app()->request->baseUrl?>/css/contactable.css" type="text/css" />
    <!--   my important css files -->

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body id="top">

     //bbbb
<!--start contactable -->
<div id="contactable"></div>


<script>$(function(){$('#contactable').contactable({subject: 'feedback URL:'+location.href});});</script>
<!--end contactable -->
<div class="logo1">
    <div class='logo'>
        <a href="<?=Yii::app()->request->baseUrl?>"><img src="<?=Yii::app()->request->baseUrl?>/css/images/logoArm.png" class="logo" alt="" /></a>
    </div>

    <div class='contact_head'>
        <span class="name" style="margin:0px 30px 9px -2px; font-size:20px; font-weight:bold;">(+374) 77 44 77 11; (+374) 95 10 03 01</span><br />
        <div class="author_head" style="font-size: 12px">Адрес: <span class="name"> Армения,    0048, г.     Ереван,     Бекназарян   5 / 7</span></div><br />
        <div class="author_head" style="font-size: 12px">Телефон: <span class="name">(+374) 60 50 07 06</span></div>
        <div class="author_head" style="font-size:12px;margin-left:48px;">E-mail: <span class="name">info@ssystems.am</span></div>
    </div>


<?php


 //echo "<a href='".Yii::app()->createUrl("site/about", array('alias'=>'products1', ))."'>werw</a>";

$links = Yii::app()->urlManager->getLanguageImageLinks(array(), true, array(),array("class"=>"languages"));
foreach($links as $link)
    echo $link;


//$link = Yii::app()->urlManager->createControllerLanguageUrl("am", array(), '/');

//print_r($link);


?>

    <div class="clear"></div>


    <div id="footer">
        Design & Development by <?=Chtml::link("gglaboratories.", "http://gglaboratories.com", array('target'=>'_blank', 'class'=>'ggurl'))?>
        <br>
        &copy; Copyright Saninail 2014. All Rights Reserved.
    </div><!-- footer -->

</div>


<!--</div> --> <!-- page -->
</body>
</html>
