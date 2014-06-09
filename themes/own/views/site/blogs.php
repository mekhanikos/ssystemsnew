<?php

/* @var $this SiteController */
/* @var $blogs Blog[] */

$this->layout = 'main2';

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/style5.css');
$cs->registerCssFile($baseUrl.'/css/blog.css');

    /*echo "<pre>";
    print_r($blog);
    exit;*/


?>

<div class="round"></div>
<div class="pink_text">
    <div style="color:#f26d86;margin-bottom:5px;">Saninail-<?=Yii::t("language", "blogs")?></div>
</div>

<div class="sub_items_container">
    <div class ="item_path"><?=Yii::t("language", "blogs")?></div>

<?php foreach($blogs as $blog ):

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
            <div class="item_description"> <?=$blog->description ?></div>

        </div>
        <div class="clear"></div>
        <a href = "<?=Yii::app()->baseUrl."/".Yii::app()->language?>/site/blog/<?=$blog->alias?>"><div class="button_from">
                <div class="pointer"></div>
               More...</div></a>
        <div class="clear"></div>



    </div>

    <div class="line"></div>

<?php endforeach ?>


    <?php $this->widget('CLinkPager', array(
        'pages' => $pages,
        'header' => '<div class="pagination pagination-right">',
        'footer' => '</div>',
        'nextPageLabel' => '&gt;',
        'firstPageLabel'=> '&lt;&lt;',
        'lastPageLabel'=> '&gt;&gt;',
        'prevPageLabel' => '&lt;',
        'selectedPageCssClass' => 'active',
        'hiddenPageCssClass' => 'disabled',
        'htmlOptions' => array(
                                'class' => '',   )
    )) ?>
</div>
