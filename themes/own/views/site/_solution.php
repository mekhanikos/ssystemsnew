<?php

/* @var $this SiteController */
/* @var $category Categories */



?>

<?php
//  echo "<pre>";
//  print_r($items);
//   exit;
?>

<?php foreach ($items as $item) :
    $img = "default";
    if($item['image'] == 1)
        $img = $item['item_id'];?>

    <div class="subitem">
        <a href="<?=Yii::app()->baseUrl."/".Yii::app()->language."/site/subitem/".$item['item_id'] ?>">
            <div class="subitem_content_header"><?=$item['name']?></div>
            <div class="subitem_image"><img src="<?=Yii::app()->baseUrl?>/images/items/<?=$img?>.png" width="206" height="206" /></div>
        </a>
        <div class="subitem_round"></div>
        <div class="subitem_content">

            <div class="subitem_content_text">

            </div>
        </div>
    </div>

<?php  endforeach ?>

<div class="clear"></div>
<div class="view_all">View All products</div>
<div class="clear"></div>