<?php

/* @var $this SiteController */
/* @var $blog Blog */

$this->layout = 'main2';

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/style5.css');
$cs->registerCssFile($baseUrl.'/css/blog.css');

?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=162567763951620&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<div class="sub_items_container">
    <div class ="item_path"><?=Yii::t("language", "blogs")?></div>

    <?php
        $img = "default";
        if($blog->img == 1)
            $img = $blog->id;
        ?>

        <div class="item_container">
            <div class="date_place"><?=$blog->date?></div>
            <div class="subitem_single_image">
                <div class="item_image_wrapper">
                    <div class="sub_item_image_back">
                        <a href = "<?=Yii::app()->baseUrl."/".Yii::app()->language?>/site/blog/<?=$blog->alias?>"><img src="<?=Yii::app()->baseUrl?>/images/blog/<?=$img?>.png" width="206" height="206" /></a>
                    </div>
                </div>
            </div>
            <div class="item_content">
                <div class="item_header"><?=$blog->title?></div>
                <div class="item_description"> <?=$blog->content ?></div>

            </div>
            <div class="clear"></div>
            <a href = "<?=Yii::app()->baseUrl."/".Yii::app()->language?>/site/blogs"><div class="button_from">
                    <div class="pointer"></div>
                    <?=Yii::t("language", "go_back")?></div></a>
            <div class="clear"></div>

            <?php $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>

            <div class="line"></div>
            <div class="fb-comments" data-href="<?=$actual_link?>" data-width="940" data-numposts="5" data-colorscheme="light"></div>

        </div>

</div>
