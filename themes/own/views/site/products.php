<?php

$this->layout = 'main2';

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/style5.css');
/**
 * Created by PhpStorm.
 * User: mushegh.Yeghiazaryan
 * Date: 5/7/14
 * Time: 6:24 PM
 */
?>

<div class="round"></div>
<div class="pink_text">
    <div style="color:#f26d86;margin-bottom:5px;">Nail enamel remover</div>
    <div style="color:#4f4f4f;">With grapes seed oil</div>
</div>

<div class="menu second">
    <div class="g">

<?php
        $i = 0;
        $width = 220;
        $top = 0;
        foreach($sub_products as $sub)
        {
            ?>
                <div style="width:<?=$width?>px; top:<?=$top?>px;" class="menu_item2"><?=$sub->name?>
                    <input type="hidden" class="sub_id" value="<?=$sub->id?>" />
                </div>
            <?php

            if($i < 2)
                $width+=15;
            else
                $width-=15;
            if($i == 1)
                $width-=10;
            if($i == 2)
                $width +=10;
            $top+=39;
            $i++;
        }
?>

       <!-- <a href="About us.html"><div style="width:240px;" class="menu_item about_us">About us</div></a>
        <a href="#"><div class="menu_item products">Products</div></a>
        <a href="#"><div class="menu_item blogs">Blogs</div></a>
        <a href="Contacts.html"><div class="menu_item contacts">Contacts</div></a>
        <a href="From where.html"><div class="menu_item from_where">From where</div></a>-->
    </div>
</div>


<div class="sub_items_container">
    <div class="sub_items_container2">
    <?php
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

     </div>
</div>
        <div class="clear"></div>




