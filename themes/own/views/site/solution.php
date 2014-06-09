<?php

/* @var $this SiteController */
/* @var $solutions Categories[] */
/* @var $category Categories */

$this->layout = 'main2';

Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/solution.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/dropdown_menu.css');

Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/jquery.dropdown.js");
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . "/js/modernizr.custom.63321.js");

?>

<div class="s_container">
    <div class="fleft">
        <select id="cd-dropdown" name="cd-dropdown" class="cd-select">
            <option value="-1" selected>My Nails are ...</option>
            <?php foreach($solutions as $solution): ?>
                <option value="<?=$solution->id?>" class="ic"><?=$solution->title?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
<div class="pink_text">
    <div><?=Yii::t("language", "my_nails_are")?></div>
    <!--<div style="color:#4f4f4f;">With grapes seed oil</div>-->
</div>


<div class="sub_items_container">
    <div class ="item_path">Nail Solutions - <?=$category->title?></div>
    <div class="line"></div>
    <div class="item_header">Choose Your Prescription</div>
    <div class="item_header_below">Select a product below to find out more</div>

    <div class="sub_items_container2">

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

    </div>

    <div class="category_content">
        <div class="subitem_single_image">
            <div class="item_image_wrapper">
                <div class="sub_item_image_back">
                    <img src="/saninail/images/items/3.png" width="206" height="206">
                </div>
            </div>
        </div>
        <div class="item_content">
            <div class="cat_header"><?=$category->title?></div>
            <div class="item_description"> <p><?=$category->desctiption?></p></div>

        </div>
    </div>

</div>

<div class="clear"></div>



<script type="text/javascript">

       var down = false;

       $( function() {
            $( '#cd-dropdown' ).dropdown( {
           gutter : 5
       } );


       $(document).ready(function() {

            var category = <?=$category->id?>;

           /* $(".first_ic").click(function(){
                if(down == true)
                    down = false;
                else
                    down = true;
                console.log(down);
            });*/

            $(".ic").click(function(){
                //$(".sub_items_container").hide();
                if(down == true) {

                    category = $(this).parent().attr("data-value");

                    $.ajax({
                        type: 'POST',
                        url: '<?=$this->createUrl("getitemssbycat")?>',
                        data: {catid:category, all:0},
                        // dataType: 'json',
                        // context: document.body,
                        //async: false,   //Send Synchronously
                        success: function (resp) {

                            $(".sub_items_container2").html(resp);
                           // $(".sub_items_container2").show("slow");
                        }
                    });
                }

            });

           $(document).on('click', '.view_all', function () {
               $.ajax({
                   type: 'POST',
                   url: '<?=$this->createUrl("getitemssbycat")?>',
                   data: {catid:category, all:1},
                   // dataType: 'json',
                   // context: document.body,
                   //async: false,   //Send Synchronously
                   success: function (resp) {

                       $(".sub_items_container2").html(resp);
                       // $(".sub_items_container2").show("slow");
                   }
               });
           });

        });
    });

</script>