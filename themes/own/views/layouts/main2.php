<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/images/favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/jquery-1.11.1.js"></script>
    <script type="text/javascript" src="<?=Yii::app()->request->baseUrl?>/js/script.js"></script>
   <!-- <script type="text/javascript" src="<?/*=Yii::app()->request->baseUrl*/?>/js/jquery.dropdown.js"></script>
    <script type="text/javascript" src="<?/*=Yii::app()->request->baseUrl*/?>/js/modernizr.custom.63321.js"></script>-->

    <!--   my important css files -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style1.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dropdown_menu.css" />

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>



</head>

<body>

    <?php

    //public function getLanguageImageLinks($images = array(), $useBaseUrl=true, $imageHtmlOptions = array(), $linkHtmlOptions = array(), $params = array(), $ampersand = '&')
    $links = Yii::app()->urlManager->getLanguageImageLinks(array(), true, array(),array("class"=>"languages"));
    foreach($links as $link)
        echo $link;


    $link = Yii::app()->urlManager->createControllerLanguageUrl("am", array(), '/');

   //print_r($link);

    ?>

<div class="gloabal_main">

    <div class="header_part">

    <div class="logo_outer"><a href="<?=Yii::app()->baseUrl?>"><div class="logo"></div>
    </div></a>
    <div class="social_icons">
        <div class="g">
            <a href="#"><div class="soc facebook">f</div></a>
            <a href="#"><div class="soc google">g+</div></a>
            <a href="#"><div class="soc vkontakte">vk</div></a>
            <div class="clear"></div>
        </div>
    </div>

        <div class="menu">
            <div class="g">
                <a href="<?=$this->createUrl("about") ?>"><div class="menu_item about_us"><?=Yii::t("language", "about")?></div></a>
                <ul class="menu_item list">
                    <li><?=Yii::t("language", "products")?><br>
                        <ul>
                            <?php
                            $products = Products::model()->findAll("lang=:x", array(':x'=>Yii::app()->language));

                            foreach ($products as $product): ?>
                                <a href="<?=Yii::app()->baseUrl .'/'.Yii::app()->language."/site/products/".$product->alias?>"><li><?=$product->title?></li></a>
                            <?php endforeach; ?>
                        </ul></li>
                </ul>
                <a href="<?=$this->createUrl("blogs") ?>"><div class="menu_item blogs"><?=Yii::t("language", "blogs")?></div></a>
                <a href="<?=$this->createUrl("contacts") ?>"><div class="menu_item contacts"><?=Yii::t("language", "contacts")?></div></a>
                <a href="<?=$this->createUrl("fromwhere") ?>"><div class="menu_item from_where"><?=Yii::t("language", "from_where")?></div></a>
                <a href="<?=$this->createUrl("solutions") ?>"><div class="menu_item suggestions"><?=Yii::t("language", "Nail_solutions")?></div></a>
            </div>
        </div>
    </div>

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
    <div class="products_part">

        <?php echo $content; ?>

        <div id="footer2">
            Design & Development by <a href="http://gglaboratories.com" target="_blank" class="ggurl">gglaboratories</a>
            <br>
            &copy; Copyright Saninail 2014. All Rights Reserved.

        </div><!-- footer -->
    </div>


</div>

<!--</div> --> <!-- page -->

<script type="text/javascript">
/*
    $( function() {

        $( '#cd-dropdown' ).dropdown( {
            gutter : 5,
            delay : 40,
            rotated : 'left'
        } );

    });*/

    $(document).ready(function() {

        $(".icon").click(function(){
            // alert($(this).parent().attr("data-value"));
            window.location = "<?=Yii::app()->baseUrl."/".Yii::app()->language?>/site/products/alias/"+$(this).parent().attr("data-value");
        });

    });

</script>

    <script>
        $(document).ready(function(){
            $(".menu_item2").click(function(){
               // $(".sub_items_container2").hide();

                $.ajax({
                    type: 'POST',
                    url: '<?=$this->createUrl("getItems")?>',
                    data: {subid:$(this).children(".sub_id").val()},
                    // dataType: 'json',
                    // context: document.body,
                    //async: false,   //Send Synchronously
                    success: function (resp) {
                        $(".sub_items_container2").html(resp);
                        $(".sub_items_container2").show("slow");
                    }
                });
            });

        });

    </script>


</body>
</html>
