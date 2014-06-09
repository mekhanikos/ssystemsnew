<?php
/* @var $this ItemsController */
/* @var $model Items */
/* @var $cat Categories[] */



$this->breadcrumbs=array(
	'Items'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Items', 'url'=>array('index')),
	array('label'=>'Create Items', 'url'=>array('create')),
	array('label'=>'Update Items', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Items', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Items', 'url'=>array('admin')),
);
?>

<h1>View Items #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        'name',
        'description:html',
        'subproduct.name',
		'color',
		'image',
		'lang',
	),
)); ?>

<div class="categories_area">

    <?php foreach ($cat as $category) :?>

        <?php
                $checked = "";
                if(!empty($category->items)) {
                    foreach($category->items as $item) {
                        if($model->id == $item->id)
                            $checked = "checked";
                    }
                }
        ?>

        <input type="checkbox" class="cat_check" id="<?=$category->id?>" <?=$checked?> />
        <label for="<?=$category->id?>"><?=$category->title ?></label>

    <?php endforeach ?>

</div>

<script>

    $(document).ready(function() {

        $(".cat_check").click(function(){
            var checked = $(this).is(":checked")?1:0;


             $.ajax({
                 type: 'POST',
                 url: '<?=$this->createUrl("items/catresolve")?>',
                 data: {checked:checked, id:<?=$model->id?>, catid:$(this).attr("id")},
                 // dataType: 'json',
                 // context: document.body,
                 //async: false,   //Send Synchronously
                 success: function (resp) {
                    console.log(resp);
                 }
             });

        });
    });

    var getImageCrop = function(){


    }
</script>



























