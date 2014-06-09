<?php
/* @var $this SiteController */
/* @var $item Items */
$this->layout = 'main2';

$baseUrl = Yii::app()->baseUrl;
$cs = Yii::app()->getClientScript();
$cs->registerCssFile($baseUrl.'/css/style5.css');

?>

<div class="round"></div>
<div class="pink_text">
    <div style="color:#f26d86;margin-bottom:5px;"><?=$item->name?></div>
    <div style="color:#4f4f4f;"></div>
</div>


<div class="menu second">
    <div class="g">

        <?php
        $sub_products = SubProducts::model()->findAll("product_id=:pr_id", array(':pr_id'=>$item->subproduct->product_id));

       // print_r($sub_products);

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

<?php

    /*echo "<pre>";
    print_r($item);
    exit;*/
    $img = "default";
    if($item->image == 1)
        $img = $item->id;


?>



<div class="sub_items_container">

    <div class ="item_path"><?=Yii::t("language", "products")."  -  ".$item->name?></div>

    <div class="item_container">
            <div class="subitem_single_image">
                <div class="item_image_wrapper">
                    <div class="sub_item_image_back">
                        <img src="<?=Yii::app()->baseUrl?>/images/items/<?=$img?>.png" width="206" height="206" />
                    </div>
                </div>
            </div>
        <div class="item_content">
            <div class="item_header"><?=$item->name?></div>
            <div class="item_description"> <?=$item->description ?></div>

        </div>
        <div class="clear"></div>
        <a href = "<?=Yii::app()->baseUrl."/".Yii::app()->language?>/site/fromWhere"><div class="button_from">
                <div class="pointer"></div>
                Where To Buy</div></a>
        <div class="clear"></div>



     </div>

    <div class="line"></div>

    <div class ="also_like_header">You might also Like</div>
<div class="item_cont">
    <?php


    $items = Items::model()->findAll("subproduct_id=:pr_id", array(':pr_id'=>$item->subproduct->id));

    $this->renderPartial("_products", array('items'=>$items), false, true);

    ?>

    <div class="clear"></div>
</div>
</div>

