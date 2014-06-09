

<?php
/* @var $this SiteController */
/* @var $item Items */
$i = 0;

foreach ($items as $item) :
    $img = "default";
    if($item->image == 1)
        $img = $item->id;

    $features = Features::model()->findAll("item_id=:pr_id", array(':pr_id'=>$item->id));
    //$features =  $item->subproduct;

    ?>

        <div class="subitem">
            <a href="<?=Yii::app()->baseUrl."/".Yii::app()->language."/site/subitem/".  $item->id?>" >
                <div class="subitem_image"><img src="<?=Yii::app()->baseUrl?>/images/items/<?=$img?>.png" width="206" height="206" /></div>
            </a>
            <div class="subitem_round"></div>
            <div class="subitem_content">
                <div class="subitem_content_header"><?=$item->name?></div>
                <div class="subitem_content_text">
                    <?php
                    $item_img = "13.png";
                    if($i%3 == 0)
                        $item_img = "14.png";
                    elseif($i%3 == 1)
                        $item_img = "15.png";

                    foreach ($features as $feature): ?>
                        <div><img src="<?=Yii::app()->baseUrl?>/css/images/<?=$item_img?>" width="8" height="10" /><?=$feature->name?></div>
                   <?php endforeach ?>

                </div>
            </div>
        </div>

 <?php $i++; endforeach ?>

