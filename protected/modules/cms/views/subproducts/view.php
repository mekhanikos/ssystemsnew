<?php
/* @var $this SubProductsController */
/* @var $model SubProducts */

$this->breadcrumbs=array(
	'Sub Products'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SubProducts', 'url'=>array('index')),
	array('label'=>'Create SubProducts', 'url'=>array('create')),
	array('label'=>'Update SubProducts', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubProducts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubProducts', 'url'=>array('admin')),
);
?>

<h1>View SubProducts #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product.title',
		'name',
		'lang',
	),
)); ?>
