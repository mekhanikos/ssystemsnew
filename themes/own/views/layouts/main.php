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


    <!--   my important css files -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style1.css" />


    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>


<?php


 //echo "<a href='".Yii::app()->createUrl("site/about", array('alias'=>'products1', ))."'>werw</a>";

$links = Yii::app()->urlManager->getLanguageImageLinks(array(), true, array(),array("class"=>"languages"));
foreach($links as $link)
    echo $link;


//$link = Yii::app()->urlManager->createControllerLanguageUrl("am", array(), '/');

//print_r($link);


?>

<div class="rounds">

    <div class="hand_animation">
        <div class="hand"></div>
        <div class="clear"></div>
        <div class="bottle">
            <div class="tear"></div>
        </div>

        <!--<div class="bottle_middle"></div>-->

        <!--<div class="bottom_all_wrap"></div>-->
    </div>
    <div class="bottle_bottom"></div>
    <div class="back_wrapper">
        <img src="<?=Yii::app()->request->baseUrl?>/css/images/4.png" width="754" height="520" />
    </div>
</div>


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
